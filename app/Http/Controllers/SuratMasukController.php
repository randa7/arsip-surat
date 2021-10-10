<?php

namespace App\Http\Controllers;

use App\Http\Requests\ErrorFormMasukRequest;
use App\Http\Requests\ErrorUpdateMasukRequest;
use App\Models\suratkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\suratmasuk;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratmasuk = DB::table('surat_masuk')
        ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
        ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
        ->where('surat_masuk.iduser', '=', Auth::id())
        ->get();

        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('roles.name')
            ->where('model_has_roles.model_id', '=', Auth::id())
            ->first();

        return view('content.suratMasuk.index',compact('suratmasuk' ,'role'));
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

    return view('content.suratMasuk.create',compact('role','bagian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ErrorFormMasukRequest $request)
    {
        $request->validate([
            "idbagian" =>'required',
            "iddisposisi" =>'nullable',
            "nomor_surat" => 'required|unique:surat_masuk',
            "perihal" => 'required',
            "lampiran" =>'required',
            "pengirim" => 'required',
            "file_surat" =>['nullable', 'mimetypes:image/*,application/pdf'],
            "tanggalsurat" => 'required',
            "tanggalsuratmasuk" => 'nullable',
            
        ]);

        $date = Carbon::now()->toDateString();
        

        
        if($request->hasFile('file_surat')) {
            $insertQ = DB::table('surat_masuk')->insert([
                "iduser" =>Auth::id(),
                "idbagian" =>$request["idbagian"],
                "nomor_surat" => $request["nomor_surat"],
                "perihal" => $request["perihal"],
                "lampiran" =>$request["lampiran"],
                "pengirim" => $request["pengirim"],
                "file_surat" =>$request["file_surat"]->store('public/suratmasuk'),
                "tanggalsurat" => $request["tanggalsurat"],
                "tanggalsuratmasuk" => $date,
            ]);
    
        }
        else{
            $insertQ = DB::table('surat_masuk')->insert([

                "iduser" =>Auth::id(),
                "idbagian" =>$request["idbagian"],
                "nomor_surat" => $request["nomor_surat"],
                "perihal" => $request["perihal"],
                "lampiran" =>$request["lampiran"],
                "pengirim" => $request["pengirim"],
                "tanggalsurat" => $request["tanggalsurat"],
                "tanggalsuratmasuk" => $date,
            ]);
    
        }


        return redirect('/suratmasuk')->with('toast_success','Surat Berhasil ditambahkan');
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

        $surat = DB::table('surat_masuk')
        ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
        ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
        ->where('surat_masuk.idsuratmasuk', '=', $id)
        ->first();

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        $bagian = DB::table('bagian')
        ->select('bagian.*')
        ->get();


    return view('content.suratMasuk.edit',compact('surat','role' , 'bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ErrorUpdateMasukRequest $request, $id)
    {
        

        if($request->hasFile('file_surat')){

            $updateQ = DB::table('surat_masuk')
                ->where('idsuratmasuk',$id)
                ->update([
                    'nomor_surat' => $request["nomor_surat"],
                    'idbagian' => $request["idbagian"],
                    'perihal' => $request["perihal"],
                    'lampiran' =>$request["lampiran"],
                    'pengirim' => $request["pengirim"],
                    'file_surat' =>$request["file_surat"]->store('public/suratmasuk'),
                    'tanggalsurat' => $request["tanggalsurat"],
                    'tanggalsuratmasuk' => $request["tanggalsuratmasuk"],
            ]);

        }   
        else{
            $updateQ = DB::table('surat_masuk')
                ->where('idsuratmasuk',$id)
                ->update([
                    'nomor_surat' => $request["nomor_surat"],
                    'idbagian' => $request["idbagian"],
                    'perihal' => $request["perihal"],
                    'lampiran' =>$request["lampiran"],
                    'pengirim' => $request["pengirim"],
                    'tanggalsurat' => $request["tanggalsurat"],
                    'tanggalsuratmasuk' => $request["tanggalsuratmasuk"],
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

        suratmasuk::destroy($id);
        
        return redirect('/suratmasuk');
    }

    public function detail($id)
    {

        

        $surat = DB::table('surat_masuk')
        ->join('bagian', 'surat_masuk.idbagian', '=', 'bagian.id')
        ->select('surat_masuk.*', 'bagian.nama_bagian as bagian')
        ->where('surat_masuk.idsuratmasuk', '=', $id)
        ->first();

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        $bagian = DB::table('bagian')
        ->select('bagian.*')
        ->get();

        if( Auth::id() == $surat->iduser ){
            return view('content.suratMasuk.detail',compact('surat','role' , 'bagian'));
        }
        else{
            return redirect('403');
        }

    
    }

    public function disposisi($id)
    {
        
        $surat = suratmasuk::find($id);

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        $users = DB::table('users')
        ->select('users.*')
        ->where('users.id', '<>' , Auth::id())
        ->get();

    return view('content.suratmasuk.disposisi',compact('surat','role' ,'users'));
    }

    public function kirim(Request $request , $id)
    {
        $request->validate([
            "iduser" =>'required', 
        ]);

        $surat = suratmasuk::find($id);
        $date = Carbon::now()->toDateString();
        $user = User::find($request["iduser"]);


        $disposisi = DB::table('disposisi')->insertGetId([

            "pengirim" =>Auth::user()->name,
            "penerima" =>$user->name,
        ]);



        $suratmasukbaru = suratmasuk::create([
            "iduser" =>$request["iduser"],
            "idbagian" =>$surat->idbagian,
            "iddisposisi" =>$disposisi,
            "nomor_surat" => $surat->nomor_surat,
            "perihal" => $surat->perihal,
            "lampiran" =>$surat->lampiran,
            "pengirim" => $surat->pengirim,
            "file_surat" =>$surat->file_surat,
            "tanggalsurat" => $surat->tanggalsurat,
            "tanggalsuratmasuk" => $date,
        ]);

        // $suratkeluarbaru = suratkeluar::create([
        //     "iduser" => Auth::id(),
        //     "idbagian" =>$surat->idbagian,
        //     "iddisposisi" =>$disposisi,
        //     "nomor_surat" => $surat->nomor_surat,
        //     "perihal" => $surat->perihal,
        //     "lampiran" =>$surat->lampiran,
        //     "pengirim" => Auth::user()->name,
        //     "kepada" => $user->name,
        //     "file_surat" =>$surat->file_surat,
        //     "tanggalsurat" => $surat->tanggalsurat,
        //     "tanggalsuratkeluar" => $date,
        // ]);


        return redirect('/suratmasuk')->with('toast_success','Surat Berhasil didistribusikan');

    }

}
