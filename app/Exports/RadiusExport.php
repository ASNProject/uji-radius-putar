<?php

namespace App\Exports;

use App\Models\Radius;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RadiusExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Radius::select('mode', 'calcMode', 'radius', 'result', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'Mode',
            'Mode Perhitungan',
            'Radius',
            'Hasil',
            'Waktu',
        ];
    }
}
