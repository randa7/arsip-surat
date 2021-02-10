<?php

namespace App\Http\Controllers;

use App\Models\suratkeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\LaporansuratkeluarExport;
use Excel;
use PDF;


class laporansuratkeluarController extends Controller
{
    public function index()
    {
            
        $suratkeluar = DB::table('surat_keluar')
            ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
            ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
            ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
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
                    ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
                    ->whereBetween('tanggalsurat', [$from, $to])
                    ->get();
                }

                elseif($request->filled('start') && !$request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
                    ->whereBetween('tanggalsurat', [$from, Carbon::now()])
                    ->get();
                }

                elseif(!$request->filled('start') && $request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
                    ->whereBetween('tanggalsurat', [$begin, $to])
                    ->get();
                }
                else{
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
                    ->get();
                }

                return view('content.laporansuratkeluar.index',compact('suratkeluar','role'));

                break;
            case 'pdf':
                if($request->filled('start') && $request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
                    ->whereBetween('tanggalsurat', [$from, $to])
                    ->get();
                }

                elseif($request->filled('start') && !$request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
                    ->whereBetween('tanggalsurat', [$from, Carbon::now()])
                    ->get();
                }

                elseif(!$request->filled('start') && $request->filled('end')){
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
                    ->whereBetween('tanggalsurat', [$begin, $to])
                    ->get();
                }
                else{
                    $suratkeluar = DB::table('surat_keluar')
                    ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
                    ->join('disposisi', 'surat_keluar.iddisposisi', '=', 'disposisi.id')
                    ->select('surat_keluar.*', 'bagian.nama_bagian as bagian' , 'disposisi.pengirim as pengirim')
                    ->get();
                }

                $pdf = PDF::loadView('pdf',compact('suratkeluar'));
                return $pdf->download('laporan.pdf');

                break;

            case 'csv':

                if($request->filled('start') && $request->filled('end')){
                    $from = $from;
                    $to = $to;
                }

                elseif($request->filled('start') && !$request->filled('end')){
                    $from = $from;
                    $to = Carbon::now();

                }

                elseif(!$request->filled('start') && $request->filled('end')){
                    $from = $begin;
                    $to = $to;
                    
                }
                else{
                    $from = $begin;
                    $to = Carbon::now();
                }   
                
                return Excel::download(new LaporansuratkeluarExport($from,$to), 'laporansuratkeluar.xlsx');

                break;
        }
    }

}
