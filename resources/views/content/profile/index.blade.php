@extends('dashboard.global')

@section('content')
    
<div class="container rounded bg-white">
    <div class="row">
        <div class="col-md-3 ">
            @if(Auth::user()->image == NULL)
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="{{asset('assets/img/boy.png')}}" width="100%"><span class="font-weight-bold"><br>{{Auth::user()->name}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
            @else
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="{{ Storage::url(Auth::user()->image) }}" width="100%"><span class="font-weight-bold"><br>{{Auth::user()->name}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
            
            @endif
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form enctype="multipart/form-data" role="form" action="/profile/update" method="POST">
                    @csrf
                    @method('PUT')
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old ('name',$editQ->name)}}"
                            placeholder="Enter Name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old ('email',$editQ->email)}}" placeholder="writer@bloggy.com">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="password">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ old ('password', )}}" >
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="custom-file">
                            <label for="file_surat">Ubah Foto Profile</label>
                            <input type="file" class="form-control-file" name="image" id="image" value="{{ old ('image','')}}" accept="image/*">
                            @error('image')
                            <div class="alert alert-danger">File harus bertype img</div>
                            @enderror
                        </div>
                    </div>
                </div>

                
                
                
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection