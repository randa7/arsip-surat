@extends('dashboard.global')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/suratkeluar">Surat keluar</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Surat Keluar</li>
  </ol>
  </div>

<br>
<div class="card mb-4">
    <div class="container col-md-12">
        <br>
        <h3 class="card-title text-center">Tambah Surat Keluar</h3>
        <form enctype="multipart/form-data" role="form" action="/suratkeluar" method="POST">
            @csrf
           
            <div class="form-group">
                <br><br>
                <label for="nomor_surat">No Surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ old ('nomor_surat','')}}"
                    placeholder="No Surat" autocomplete="off">
                @error('nomor_surat')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
				
				
            </div>

            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" value="{{ old ('perihal','')}}"
                    placeholder="Perihal" autocomplete="off">
                @error('perihal')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="lampiran">Lampiran</label>
                <input type="text" class="form-control" id="lampiran" name="lampiran"
                    value="{{ old ('lampiran','')}}" placeholder="Isi - jika tidak ada lampiran">
                @error('lampiran')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kepada">Kepada</label>
                <input type="text" class="form-control" id="kepada" name="kepada"
                    value="{{ old ('kepada','')}}" placeholder="Kepada">
                @error('kepada')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="form-group">
                <label for="select2SinglePlaceholder">Bagian</label>
                <select class="select2-single-placeholder form-control" name="idbagian" id="idbagian" value="{{ old ('bagian','')}}">
                    <option></option>
                    @forelse($bagian  as $key => $bag)
                    {{$key+1}}       
                    <option value="{{$bag->id}}">{{$bag->nama_bagian}}</option>    
                    @empty
                    <option value="1">Tidak Ada Bagian</option> 
                  @endforelse        
                </select>
                @error('idbagian')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
              <label for="tanggalsurat">Tanggal Surat</label>
              <input type="date" class="form-control" name="tanggalsurat" id="tanggalsurat" value="{{ old ('tanggalsurat','')}}"  >
              @error('tanggalsurat')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <label for="file_surat">File Surat</label>
                    <input type="file" class="form-control-file" name="file_surat" id="file_surat" value="{{ old ('file_surat','')}}" accept="image/*,application/pdf">
                </div>
                @error('file_surat')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/suratkeluar" type="button" class="btn btn-secondary">Kembali</a>
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