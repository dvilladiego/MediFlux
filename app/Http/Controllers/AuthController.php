<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Models\Usuario;
use Carbon\Carbon;



class AuthController extends Controller
{
    // REGISTRO
    public function showLoginForm()
    {
        return view('autenticación');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'password' => 'required|string|min:2',
            'role' => 'required|in:Administrador,Personal_de_enfermería,Personal_médico',
        ]);

        if ($request->role === 'Administrador' && Usuario::where('Rol', 'Administrador')->exists()) {
            Alert::error('Error', 'Ya existe un administrador registrado.');
            return redirect()->back();
        }

        $usuarios = Usuario::all();
        foreach ($usuarios as $usuario) {
            if (Hash::check($request->password, $usuario->password)) {
                Alert::error('Error', 'La contraseña ya está en uso. Por favor, elige otra.');
                return redirect()->back();
            }
        }

        $usuario = new Usuario();
        $usuario->Nombre_Usuario = $request->nombre_completo;
        $usuario->password = bcrypt($request->password);
        $usuario->Rol = $this->mapRole($request->role);
        $usuario->save();

        Alert::success('Éxito', 'Registro exitoso');
        return redirect()->route('autenticación');
    }

    // INICIO DE SESION
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:2',
            'role' => 'required|in:Administrador,Personal_de_enfermería,Personal_médico',
        ]);

        $usuario = Usuario::where('Rol', $request->role)->first();

        if ($usuario && Hash::check($request->password, $usuario->password)) {

            Auth::login($usuario);

            return redirect()->route('inicio');
        }

        Alert::error('Error', 'Credenciales incorrectas');
        return back();
    }

    
    private function mapRole($role)
    {
        $roles = [
            'Administrador' => 'administrador',
            'Personal_de_enfermería' => 'Personal_de_enfermería',
            'Personal_médico' => 'Personal_médico'
        ];

        return $roles[$role] ?? $role;
    }

    // RESTABLECER CONTRASEÑA
    public function generateResetToken(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        // Verificar que el usuario exista
        $usuario = DB::table('usuario')->where('Nombre_Usuario', $request->nombre)->first();

        if (!$usuario) {
            Alert::error('Error', 'Usuario no encontrado.');
            return redirect()->back();
        }

        // Generar y guardar el token en `password_resets`
        $token = Str::random(60);
        DB::table('password_resets')->insert([
            'Nombre_Usuario' => $request->nombre,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Alert::success('Éxito', "Token generado: $token. Úsalo para restablecer la contraseña.");
        return redirect()->back();
    }
    
    public function resetPasswordWithToken(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'nueva_password' => 'required|string|min:8|confirmed',
        ]);

        // Verificar el token en la tabla `password_resets`
        $resetRequest = DB::table('password_resets')->where('token', $request->token)->first();

        if (!$resetRequest) {
            Alert::error('Error', 'Token inválido o expirado.');
            return redirect()->back();
        }

        // Verificar si el token ha expirado (opcional)
        if (Carbon::parse($resetRequest->created_at)->addMinutes(60)->isPast()) {
            Alert::error('Error', 'Token expirado.');
            return redirect()->back();
        }

        // Actualizar la contraseña en la tabla `usuario`
        $nuevaPasswordHasheada = Hash::make($request->nueva_password);
        $affectedRows = DB::table('usuario')
            ->where('Nombre_Usuario', $resetRequest->Nombre_Usuario)
            ->update(['password' => $nuevaPasswordHasheada]);

        if ($affectedRows > 0) {
            // Borrar el token una vez usado
            DB::table('password_resets')->where('token', $request->token)->delete();

            Alert::success('Éxito', 'Contraseña restablecida correctamente.');
            return redirect()->route('restablecer_contraseña'); // Redireccionar al inicio de sesión
        } else {
            Alert::error('Error', 'Error al restablecer la contraseña.');
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('autenticación')->with('status', 'Sesión cerrada correctamente.');
    }
        
}
