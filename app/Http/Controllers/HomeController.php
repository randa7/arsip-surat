<?php

namespace App\Http\Controllers;

use App\Models\bagian;
use App\Models\suratmasuk;
use App\Models\suratkeluar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $suratmasuk = suratmasuk::count();
        $suratkeluar = suratkeluar::count();
        $user = User::count();
        $bagian = bagian::count();

        $srtmasuk = DB::table('surat_masuk')
        ->where('iduser', '=' , Auth::id() )
        ->count();

        $srtkeluar = DB::table('surat_keluar')
        ->where('iduser', '=' , Auth::id() )
        ->count();

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        return view('dashboard.dash',compact('role' , 'suratmasuk' ,'suratkeluar' ,'user','bagian' ,'srtmasuk' ,'srtkeluar'));
    }

    public function operator()
    {
        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        return view('dashboard.global',compact('role'));
    }

    public function user()
    {
        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        return view('dashboard.global',compact('role'));
    }

    public function profile(){

      
        $editQ = User::find(Auth::id());

        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();


        return view('content.profile.index',compact('role' , 'editQ'));
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" =>'required',
            "email" => 'required',
            "image" => ['nullable', 'mimetypes:image/*'],
            "password" => 'nullable',

        ]);

        if($request->filled('password') && $request->hasFile('image')) {
            $updateQ = User::where('id',Auth::id())->update([
                'name' => $request["name"],
                'email' => $request["email"],
                "image" =>$request["image"]->store('public/profile'),
                "password" => Hash::make($request["password"]),
            ]);
        }
        elseif($request->filled('password') && !$request->hasFile('image')){
            $updateQ = User::where('id',Auth::id())->update([
                'name' => $request["name"],
                'email' => $request["email"],
                "password" => Hash::make($request["password"]),
            ]);
        }
        elseif(!$request->filled('password') && $request->hasFile('image')){
            $updateQ = User::where('id',Auth::id())->update([
                'name' => $request["name"],
                'email' => $request["email"],
                "image" =>$request["image"]->store('public/profile'),
            ]);
        }
        else{
            $updateQ = User::where('id',Auth::id())->update([
                'name' => $request["name"],
                'email' => $request["email"],
            ]);
        }

        return back()->with('toast_success','Data Profile Berhasil diubah');
    }

}
