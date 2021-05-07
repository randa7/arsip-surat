<?php

namespace App\Http\Controllers;

use App\Models\suratkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\suratmasuk;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ErrorFormRequest;
use App\Http\Requests\ErrorUpdateRequest;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratkeluar = DB::table('surat_keluar')
        ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
        ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
        ->where('surat_keluar.iduser', '=', Auth::id())
        ->get();

        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.suratkeluar.index',compact('suratkeluar' ,'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        $bagian = DB::table('bagian')
            ->select('bagian.*')
            ->get();

    return view('content.suratkeluar.create',compact('role','bagian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ErrorFormRequest $request)
    {

        $date = Carbon::now()->toDateString();
        

        if($request->hasFile('file_surat')) {

            $insertQ = DB::table('surat_keluar')->insert([

                "iduser" =>Auth::id(),
                "idbagian" =>$request["idbagian"],
                "nomor_surat" => $request["nomor_surat"],
                "perihal" => $request["perihal"],
                "lampiran" =>$request["lampiran"],
                "pengirim" => Auth::user()->name,
                "kepada" => $request["kepada"],
                "file_surat" =>$request["file_surat"]->store('public/suratkeluar'),
                "tanggalsurat" => $request["tanggalsurat"],
                "tanggalsuratkeluar" => $date,
            ]);
        }
        else{

            $insertQ = DB::table('surat_keluar')->insert([

                "iduser" =>Auth::id(),
                "idbagian" =>$request["idbagian"],
                "nomor_surat" => $request["nomor_surat"],
                "perihal" => $request["perihal"],
                "lampiran" =>$request["lampiran"],
                "pengirim" => Auth::user()->name,
                "kepada" => $request["kepada"],
                "tanggalsurat" => $request["tanggalsurat"],
                "tanggalsuratkeluar" => $date,
            ]);
        }
        


        return redirect('/suratkeluar')->with('toast_success','Surat Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $surat = DB::table('surat_keluar')
        ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
        ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
        ->where('surat_keluar.idsuratkeluar', '=', $id)
        ->first();

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        $bagian = DB::table('bagian')
        ->select('bagian.*')
        ->get();


    return view('content.suratkeluar.edit',compact('surat','role' , 'bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ErrorUpdateRequest $request, $id)
    {


      
        

        if($request->hasFile('file_surat')){

            
            $updateQ = DB::table('surat_keluar')
                ->where('idsuratkeluar',$id)
                ->update([
                    'nomor_surat' => $request["nomor_surat"],
                    'idbagian' => $request["idbagian"],
                    'perihal' => $request["perihal"],
                    'lampiran' =>$request["lampiran"],
                    'kepada' => $request["kepada"],
                    'file_surat' =>$request["file_surat"]->store('public/suratkeluar'),
                    'tanggalsurat' => $request["tanggalsurat"],
                    'tanggalsuratkeluar' => $request["tanggalsuratkeluar"],
            ]);

        }   
        else{
            $updateQ = DB::table('surat_keluar')
                ->where('idsuratkeluar',$id)
                ->update([
                    'nomor_surat' => $request["nomor_surat"],
                    'idbagian' => $request["idbagian"],
                    'perihal' => $request["perihal"],
                    'lampiran' =>$request["lampiran"],
                    'kepada' => $request["kepada"],
                    'tanggalsurat' => $request["tanggalsurat"],
                    'tanggalsuratkeluar' => $request["tanggalsuratkeluar"],
            ]);

        }

        return back()->with('toast_success','Data Surat Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        suratkeluar::destroy($id);
        
        return redirect('/suratkeluar')->with('toast_success','Surat Berhasil dihapus');
    }

    public function detail($id)
    {
        
        $surat = DB::table('surat_keluar')
        ->join('bagian', 'surat_keluar.idbagian', '=', 'bagian.id')
        ->select('surat_keluar.*', 'bagian.nama_bagian as bagian')
        ->where('surat_keluar.idsuratkeluar', '=', $id)
        ->first();

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        $bagian = DB::table('bagian')
        ->select('bagian.*')
        ->get();


    return view('content.suratkeluar.detail',compact('surat','role' , 'bagian' ));
    }

    public function disposisi($id)
    {
        
        $surat = suratkeluar::find($id);

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        $users = DB::table('users')
        ->select('users.*')
        ->where('users.id', '<>' , Auth::id())
        ->get();


    return view('content.suratkeluar.disposisi',compact('surat','role' ,'users'));
    }

    public function kirim(Request $request , $id)
    {
        $request->validate([
            "iduser" =>'required', 
        ]);

        $surat = suratkeluar::find($id);
        $date = Carbon::now()->toDateString();
        $user = User::find($request["iduser"]);


        $disposisi = DB::table('disposisi')->insertGetId([
        
            "pengirim" =>Auth::user()->name,
            "penerima" =>$user->name,
        ]);



        // $suratmasukbaru = suratmasuk::create([
        //     "iduser" =>$request["iduser"],
        //     "idbagian" =>$surat->idbagian,
        //     "iddisposisi" =>$disposisi,
        //     "nomor_surat" => $surat->nomor_surat,
        //     "perihal" => $surat->perihal,
        //     "lampiran" =>$surat->lampiran,
        //     "pengirim" => Auth::user()->name,
        //     "file_surat" =>$surat->file_surat,
        //     "tanggalsurat" => $surat->tanggalsurat,
        //     "tanggalsuratmasuk" => $date,
        // ]);

        $suratkeluarbaru = suratkeluar::create([
            "iduser" => $request["iduser"],
            "idbagian" =>$surat->idbagian,
            "iddisposisi" =>$disposisi,
            "nomor_surat" => $surat->nomor_surat,
            "perihal" => $surat->perihal,
            "lampiran" =>$surat->lampiran,
            "pengirim" => Auth::user()->name,
            "kepada" => $surat->kepada,
            "file_surat" =>$surat->file_surat,
            "tanggalsurat" => $surat->tanggalsurat,
            "tanggalsuratkeluar" => $date,
        ]);


        return redirect('/suratkeluar')->with('toast_success','Surat Berhasil didistribusikan');

    }   



}
