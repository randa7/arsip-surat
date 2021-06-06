@extends('dashboard.global')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
    </div>
<br><br>
    <h1 class="mx-auto" style="width: 45%;">Selamat Datang, {{ Auth::user()->name }} </h1>
<br><br>

  
@if ($role->name == 'admin')
<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Keluar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suratkeluar}}</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Telah diarsipkan</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-paper-plane fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Masuk</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suratmasuk}}</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Telah diarsipkan</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-inbox fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Annual) Card Example -->

    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Pengguna</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$user}}</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Pengguna Web</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Bagian</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bagian}}</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Divisi</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-friends fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
@else

<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Keluar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$srtkeluar}}</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Telah diarsipkan</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-paper-plane fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Masuk</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$srtmasuk}}</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span>Telah diarsipkan</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-inbox fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  

@endif

@endsection