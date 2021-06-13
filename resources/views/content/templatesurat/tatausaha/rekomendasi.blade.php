@extends('dashboard.global')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/tatausaha">Template Surat Tata Usaha </a></li>
      <li class="breadcrumb-item active" aria-current="page">Surat Rekomendasi</li>
  </ol>
  </div>

<br>
<div class="card mb-4">
    <div class="container col-md-12">
        <br>
        <h3 class="card-title text-center">Surat Rekomendasi</h3>
        <form enctype="multipart/form-data" role="form" action="/tatausaha/suratrekomendasi" method="POST" target="_blank">
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
           
                <label for="nomor_surat">Keterangan Surat</label>
                <input type="text" class="form-control" id="isi" name="isi" value="{{ old ('isi','')}}"
                    placeholder="Isi Surat" autocomplete="off">
                @error('isi')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old ('nama','')}}"
                    placeholder="Nama" autocomplete="off">
                @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ttl">Tempat Tanggal Lahir</label>
                <input type="text" class="form-control" id="ttl" name="ttl"
                    value="{{ old ('ttl','')}}" placeholder="Tempat Tanggal Lahir" autocomplete="off">
                @error('ttl')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan"
                    value="{{ old ('jurusan','')}}" placeholder="Jurusan" autocomplete="off">
                @error('jurusan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tamatan">Tamatan</label>
                <input type="text" class="form-control" id="tamatan" name="tamatan"
                    value="{{ old ('tamatan','')}}" placeholder="Tamatan" autocomplete="off">
                @error('tamatan')
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
            <a href="/tatausaha" type="button" class="btn btn-secondary">Kembali</a>
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