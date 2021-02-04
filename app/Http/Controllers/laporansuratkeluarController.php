<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class laporansuratkeluarController extends Controller
{
    public function index()
    {
            
        $suratkeluar = DB::table('surat_keluar')
            ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
            ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
            ->get();

        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();


        return view('content.laporansuratkeluar.index',compact('suratkeluar','role'));
    }
}
