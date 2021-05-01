<?php

namespace App\Exports;

use App\Models\suratmasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

use function PHPSTORM_META\map;

class LaporansuratmasukExport implements FromCollection,  WithMapping, WithHeadings, ShouldAutoSize, WithStyles
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
        $suratmasuk = DB::table('surat_masuk')
        ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
        ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
        ->where('surat_masuk.iduser', '=', Auth::id())
        ->whereBetween('tanggalsurat', [$this->start, $this->end])
        ->get();

        return $suratmasuk;
    }

    public function map($suratmasuk): array
    {
        return ([
            $suratmasuk->nomor_surat,
            $suratmasuk->perihal,
            $suratmasuk->lampiran,
            $suratmasuk->pengirim,
            $suratmasuk->bagian,
            $suratmasuk->tanggalsurat,
            $suratmasuk->tanggalsuratmasuk,

        ]);
    }

    public function headings(): array
    {
        return [
            [
                ' ',
                ' ',
                ' ',
                'Laporan Surat Masuk',
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
                'Pengirim',
                'Bagian',
                'Tanggal Surat',
                'Tanggal Surat Masuk',
            ],[
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

        $headStyles = [
            'font' => [
                'bold' => true
            ],
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
            5 => $headStyles,
        ];
    }
}
