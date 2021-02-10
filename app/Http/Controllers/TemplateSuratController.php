<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class TemplateSuratController extends Controller
{
    public function tatausaha(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.tatausaha',compact('role'));
    }

    public function kesiswaan(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.kesiswaan',compact('role'));
    }

    public function kurikulum(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.kurikulum',compact('role'));
    }

    public function sarana(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.sarana',compact('role'));
    }

    public function humas(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.humas',compact('role'));
    }

    public function rekomendasi(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.tatausaha.rekomendasi',compact('role'));
    }

    public function buatrekomendasi(Request $request){

        $request->validate([
            "nomor_surat" => 'required',
            "isi" => 'required',
            "nama" => 'required',
            "ttl" =>'required',
            "jurusan" => 'required',
            "tamatan" => 'required',
            "tanggalsurat" => 'required',
        ]);
        
        return view('content.templatesurat.tatausaha.suratrekomendasi',compact('request'));
        
    }

    public function berkelakuanbaik(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.tatausaha.berkelakuanbaik',compact('role'));
    }

    public function buatberkelakuanbaik(Request $request){

        $request->validate([
            "nomor_surat" => 'required',
            "nama" => 'required',
            "ttl" =>'required',
            "nisn" =>'required',
            "jurusan" =>'required',
            "alamat" => 'required',
            "tahunajaran" => 'required',
            "tanggalsurat" => 'required',
        ]);
        
        return view('content.templatesurat.tatausaha.suratberkelakuanbaik',compact('request'));
        
    }

    public function permintaan(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.sarana.permintaan',compact('role'));
    }

    public function kartupermintaan(Request $request){


        $date = Carbon::now()->toDateString();
        
        $jenis = $request["jenis_input"];
        $jumlah = $request["jumlah_input"];
        $merk = $request["merk_input"];
        $kegunaan = $request["kegunaan_input"];
        $keterangan = $request["keterangan_input"];
        $peminta = $request["peminta"];
        
        return view('content.templatesurat.sarana.kartupermintaan',compact('jenis' ,'jumlah' , 'merk' ,'kegunaan', 'keterangan','peminta','date'));
    }

    public function peminjaman(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.sarana.peminjaman',compact('role'));
    }

    public function kartupeminjaman(Request $request){


        $date = Carbon::now()->toDateString();
        
        $jenis = $request["jenis_input"];
        $jumlah = $request["jumlah_input"];
        $merk = $request["merk_input"];
        $peminjaman = $request["peminjaman_input"];
        $pengembalian = $request["pengembalian_input"];
        $keterangan = $request["keterangan_input"];
        $peminjam = $request["peminjam"];
        
        return view('content.templatesurat.sarana.kartupeminjaman',compact('jenis' ,'jumlah' , 'merk' ,'peminjaman','pengembalian', 'keterangan','peminjam','date'));
    }

    public function pemanggilan(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.kesiswaan.pemanggilan',compact('role'));
    }

    public function suratpemanggilan(Request $request){
        
        return view('content.templatesurat.kesiswaan.suratpemanggilan',compact('request'));
    }

    public function pengantar(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.humas.pengantar',compact('role'));
    }

    public function suratpengantar(Request $request){

        $nama = $request["nama_input"];
        $jurusan = $request["jurusan_input"];
        $pembimbing = $request["pembimbing_input"];

        return view('content.templatesurat.humas.suratpengantar',compact('request' , 'nama' , 'jurusan' , 'pembimbing'));
    }

    public function penarikan(){
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.templatesurat.humas.penarikan',compact('role'));
    }

    public function suratpenarikan(Request $request){

        $nama = $request["nama_input"];
        $jurusan = $request["jurusan_input"];
        $pembimbing = $request["pembimbing_input"];

        return view('content.templatesurat.humas.suratpenarikan',compact('request' , 'nama' , 'jurusan' , 'pembimbing'));
    }
}
