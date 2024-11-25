<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactoController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email',
            'mensaje' => 'required|string'
        ]);

        $data = [
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'correo' => $request->input('correo'),
            'mensaje' => $request->input('mensaje')
        ];

        Mail::send('email', $data, function ($message) use ($data) {
            $message->to(env('MAIL_TO_ADDRESS', 'MediFlux@Contacto.com'))
                    ->subject('Nuevo mensaje de contacto');
        });

        Alert::success('Éxito', 'Tu mensaje ha sido enviado con éxito.');
        return back();
    }
}
