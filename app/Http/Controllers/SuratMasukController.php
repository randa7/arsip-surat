<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\suratmasuk;
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
    public function store(Request $request)
    {
        $request->validate([
            "idbagian" =>'required',
            "nomor_surat" => 'required|unique:surat_masuk',
            "perihal" => 'required',
            "lampiran" =>'required',
            "pengirim" => 'required',
            "file_surat" =>['required', 'mimetypes:image/*,application/pdf'],
            "tanggalsurat" => 'required',
            "tanggalsuratmasuk" => 'nullable',
            
        ]);

        $date = Carbon::now()->toDateString();
        
        $filenameWithExt = $request["file_surat"]->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request["file_surat"]->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.time().'.'.$extension;
        

        $insertQ = DB::table('surat_masuk')->insert([

            "iduser" =>Auth::id(),
            "idbagian" =>$request["idbagian"],
            "nomor_surat" => $request["nomor_surat"],
            "perihal" => $request["perihal"],
            "lampiran" =>$request["lampiran"],
            "pengirim" => $request["pengirim"],
            "file_surat" =>$request["file_surat"]->storeAs('public/suratmasuk', $filenameSimpan),
            "tanggalsurat" => $request["tanggalsurat"],
            "tanggalsuratmasuk" => $date,
        ]);


        return redirect('/suratmasuk');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            "idbagian" =>'nullable',
            "nomor_surat" => 'required',
            "perihal" => 'required',
            "lampiran" =>'required',
            "pengirim" => 'required',
            "file_surat" =>['nullable', 'mimetypes:image/*,application/pdf'],
            "tanggalsurat" => 'required',
            "tanggalsuratmasuk" => 'required',
            
        ]);

      
        

        if($request->hasFile('file_surat')){

            $filenameWithExt = $request["file_surat"]->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request["file_surat"]->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            
            $updateQ = DB::table('surat_masuk')
                ->where('idsuratmasuk',$id)
                ->update([
                    'nomor_surat' => $request["nomor_surat"],
                    'idbagian' => $request["idbagian"],
                    'perihal' => $request["perihal"],
                    'lampiran' =>$request["lampiran"],
                    'pengirim' => $request["pengirim"],
                    'file_surat' =>$request["file_surat"]->storeAs('public/suratmasuk', $filenameSimpan),
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

        return back();
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


}
