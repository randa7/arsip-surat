<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratkeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $primaryKey = 'idsuratkeluar';
    public $timestamps = false;

    protected $fillable = [
        'idbagian',
        'iduser',
        'iddisposisi',
        'nomor_surat',
        'perihal',
        'lampiran',
        'kepada',
        'file_surat',
        'tanggalsurat',
        'tanggalsuratkeluar',
    ];

}
