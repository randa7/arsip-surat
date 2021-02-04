<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bagian extends Model
{
    use HasFactory;

    protected $table = 'bagian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_bagian',
    ];

    public function suratmasuk(){
        return $this->hasMany('App\Models\suratmasuk');
    }
}
