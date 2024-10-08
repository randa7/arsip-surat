<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
    ];

    public function model_has_roles(){
        return $this->belongsTo('App\Models\modelRole');
    }
}
