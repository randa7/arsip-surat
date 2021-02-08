<?php

namespace App\Http\Controllers;

use App\Models\suratmasuk;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\LaporansuratmasukExport;
use Excel;

use PDF;

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
                    $suratmasuk = DB::table('surat_masuk')
                    ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
                    ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$from, $to])
                    ->get();
                }

                elseif($request->filled('start') && !$request->filled('end')){
                    $suratmasuk = DB::table('surat_masuk')
                    ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
                    ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$from, Carbon::now()])
                    ->get();
                }

                elseif(!$request->filled('start') && $request->filled('end')){
                    $suratmasuk = DB::table('surat_masuk')
                    ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
                    ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$begin, $to])
                    ->get();
                }
                else{
                    $suratmasuk = DB::table('surat_masuk')
                    ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
                    ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
                    ->get();
                }

                return view('content.laporansuratmasuk.index',compact('suratmasuk','role'));

                break;
    
            case 'pdf':

                
                if($request->filled('start') && $request->filled('end')){
                    $suratmasuk = DB::table('surat_masuk')
                    ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
                    ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$from, $to])
                    ->get();
                }

                elseif($request->filled('start') && !$request->filled('end')){
                    $suratmasuk = DB::table('surat_masuk')
                    ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
                    ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$from, Carbon::now()])
                    ->get();
                }

                elseif(!$request->filled('start') && $request->filled('end')){
                    $suratmasuk = DB::table('surat_masuk')
                    ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
                    ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
                    ->whereBetween('tanggalsurat', [$begin, $to])
                    ->get();
                }
                else{
                    $suratmasuk = DB::table('surat_masuk')
                    ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
                    ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
                    ->get();
                }


                $pdf = PDF::loadView('pdf2',compact('suratmasuk'));
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

                return Excel::download(new LaporansuratmasukExport($from,$to), 'laporansuratmasuk.xlsx');

                break;
        }
    }

}
