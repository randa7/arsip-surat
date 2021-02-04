<?php

namespace App\Http\Controllers;

use App\Models\suratmasuk;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class laporansuratmasukController extends Controller
{
    public function index()
    {
        $suratmasuk = DB::table('surat_masuk')
            ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
            ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
            ->get();

        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

       
            return view('content.laporansuratmasuk.index',compact('suratmasuk','role'));
    }
}
