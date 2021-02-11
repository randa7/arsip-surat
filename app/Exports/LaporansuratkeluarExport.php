<?php

namespace App\Exports;

use App\Models\suratkeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

class LaporansuratkeluarExport implements FromCollection,  WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    private $start;
    private $end;
    private $now;

    public function __construct($start ,$end) 
    {
        $this->start = $start;
        $this->end = $end;
        $this->now = new Carbon();
    }


    public function collection()
    {
        $suratkeluar = DB::table('surat_keluar')
        ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
        ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' )
        ->whereBetween('tanggalsurat', [$this->start, $this->end])
        ->get();

        return $suratkeluar;
    }

    public function map($suratkeluar): array
    {
        return ([
            $suratkeluar->nomor_surat,
            $suratkeluar->perihal,
            $suratkeluar->lampiran,
            $suratkeluar->pengirim,
            $suratkeluar->kepada,
            $suratkeluar->bagian,
            $suratkeluar->tanggalsurat,
            $suratkeluar->tanggalsuratkeluar,

        ]);
    }

    public function headings(): array
    {
        return [
            [
                ' ',
                ' ',
                ' ',
                'Laporan Surat Keluar',
                ' ',
            ], [
                ' ',
                ' ',
                ' ',
                'Tanggal Cetak ' . $this->now->isoFormat('DD MMMM YYYY'),
                ' ',
            ], [
                ' ',
                
                ' ',
            ], [
                ' ',
                
                ' ',
            ],[
                'Nomor Surat',
                'Perihal',
                'Lampiran',
                'pengirim',
                'Kepada',
                'Bagian',
                'Tanggal Surat',
                'Tanggal Surat Keluar',
            ]
        ];
    }

    public function styles($sheet)
    {
        $centerAlignment = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];

        $titleStyles = [
            'font' => [
                'bold' => true
            ],
        ] + $centerAlignment;

        return [
            1 => $titleStyles,
            2 => $titleStyles,
            3 => $centerAlignment,
            5 => $titleStyles,
        ];
    }
}