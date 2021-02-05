<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratmasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $primaryKey = 'idsuratmasuk';
    public $timestamps = false;
    
    protected $fillable = [
        'idbagian',
        'iduser',
        'iddisposisi',
        'nomor_surat',
        'perihal',
        'lampiran',
        'pengirim',
        'file_surat',
        'tanggalsurat',
        'tanggalsuratmasuk'
    ];

    public function bagian(){
        return $this->belongsTo('App\Models\bagian');
    }
}
