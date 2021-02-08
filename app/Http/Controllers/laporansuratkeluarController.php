<?php

namespace App\Http\Controllers;

use App\Models\suratkeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;


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


    public function excel(Request $request)
    {
        $from = $request["start"];
        $to = $request["end"];
        $date = Carbon::now()->toDateString();
        $begin = Carbon::createFromFormat('d-m-Y', '00-00-0000');

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        switch ($request->input('action')) {
            case 'cari':
                if($request->filled('start') && $request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$from, $to])
                    ->get();
                }

                elseif($request->filled('start') && !$request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$from, Carbon::now()])
                    ->get();
                }

                elseif(!$request->filled('start') && $request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$begin, $to])
                    ->get();
                }
                else{
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
                    ->get();
                }

                return view('content.laporansuratkeluar.index',compact('suratkeluar','role'));

                break;
            case 'pdf':
                if($request->filled('start') && $request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$from, $to])
                    ->get();
                }

                elseif($request->filled('start') && !$request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$from, Carbon::now()])
                    ->get();
                }

                elseif(!$request->filled('start') && $request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$begin, $to])
                    ->get();
                }
                else{
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
                    ->get();
                }

                $pdf = PDF::loadView('pdf',compact('suratkeluar'));
                return $pdf->download('laporan.pdf');

                break;
        }
    }

}
