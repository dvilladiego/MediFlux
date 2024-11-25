<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ReporteExport implements FromCollection, WithHeadings, WithStyles, WithEvents, WithColumnWidths
{
    protected $data;
    protected $tipo_reporte;

    public function __construct($data, $tipo_reporte)
    {
        $this->data = $data;
        $this->tipo_reporte = $tipo_reporte;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        switch ($this->tipo_reporte) {
            case 'medicamentos':
                return [
                    'ID', 
                    'Nombre',
                    'Codigo',
                    'Descripción',
                    'Cantidad',
                    'Unidades',
                    'Fecha de Vencimiento',
                    'created_at',
                    'updated_at',
                ];
            case 'stock':
                return [
                    'ID Stock',
                    'ID Medicamento',
                    'Cantidad Disponible',
                    'Cantidad Mínima Requerida',
                    'created_at',
                    'updated_at',
                ];
            case 'alertas':
                return [
                    'ID Alerta',
                    'ID Medicamento',
                    'Codigo',
                    'Dias Restantes',
                    'created_at',
                    'updated_at',
                ];
            default:
                return [];
        }
    }

    public function styles(Worksheet $sheet)
    {
        
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFF']],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => '4CAF50'],
            ],
        ]);

        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 15,
            'D' => 30,
            'E' => 15,
            'F' => 15,
            'G' => 20,
            'H' => 30,
            'I' => 30,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function($event) {
               
                $cellRange = 'A1:I' . ($event->sheet->getHighestRow());
                
                $event->sheet->getStyle($cellRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                
                $event->sheet->getStyle($cellRange)->getAlignment()->setHorizontal('center');
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_NUMBER,          
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,   
            'H' => NumberFormat::FORMAT_DATE_DATETIME,   
            'I' => NumberFormat::FORMAT_DATE_DATETIME,   
        ];
    }
}
