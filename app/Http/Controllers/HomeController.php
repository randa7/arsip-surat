<?php

namespace App\Http\Controllers;

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
        $role = DB::table('model_has_roles')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('roles.name')
        ->where('model_has_roles.model_id', '=', Auth::id())
        ->first();

        return view('dashboard.dash',compact('role'));
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
    



        
        

        return back();
    }

}
