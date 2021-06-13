@extends('dashboard.global')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/kesiswaan">Template Surat Kesiswaan </a></li>
      <li class="breadcrumb-item active" aria-current="page">Surat Pemanggilan Orang Tua</li>
  </ol>
  </div>

<br>
<div class="card mb-4">
    <div class="container col-md-12">
        <br>
        <h3 class="card-title text-center">Surat Pemanggilan Orang Tua</h3>
        <form enctype="multipart/form-data" role="form" action="/kesiswaan/suratpemanggilan" method="POST" target="_blank">
            @csrf
           
            <div class="form-group">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ old ('nomor_surat','')}}"
                    placeholder="No Surat" autocomplete="off">
                @error('nomor_surat')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="lampiran">Lampiran</label>
                <input type="text" class="form-control" id="lampiran" name="lampiran" value="{{ old ('lampiran','')}}"
                    placeholder="Lampiran" autocomplete="off">
                @error('lampiran')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="nama">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old ('nama','')}}"
                    placeholder="Nama" autocomplete="off">
                @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="htl">Hari / Tanggal</label>
                <input type="text" class="form-control" id="htl" name="htl"
                    value="{{ old ('htl','')}}" placeholder="Hari / Tanggal" autocomplete="off">
                @error('htl')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="text" class="form-control" id="waktu" name="waktu"
                    value="{{ old ('waktu','')}}" placeholder="Waktu" autocomplete="off">
                @error('waktu')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tempat">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat"
                    value="{{ old ('tempat','')}}" placeholder="Tempat" autocomplete="off">
                @error('tempat')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="acara">Acara</label>
                <input type="text" class="form-control" id="acara" name="acara"
                    value="{{ old ('acara','')}}" placeholder="Acara" autocomplete="off">
                @error('acara')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="guru1">Guru BK/BP</label>
                <input type="text" class="form-control" id="guru1" name="guru1"
                    value="{{ old ('guru1','')}}" placeholder="Guru BK/BP" autocomplete="off">
                @error('acara')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="guru2">Wali Kelas</label>
                <input type="text" class="form-control" id="guru2" name="guru2"
                    value="{{ old ('guru2','')}}" placeholder="Guru BK/BP" autocomplete="off">
                @error('acara')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>




            
            <div class="form-group">
              <label for="tanggalsurat">Tanggal Surat</label>
              <input type="date" class="form-control" name="tanggalsurat" id="tanggalsurat" value="{{ old ('tanggalsurat','')}}"  autocomplete="off">
              @error('tanggalsurat')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>




            <button type="submit" class="btn btn-primary">Buat</button>
            <a href="/kesiswaan" type="button" class="btn btn-secondary">Kembali</a>
            <br><br><br>
        </form>
    </div>
</div>
<br>
@endsection

@push('scripts')
    <script>

    </script>
@endpush