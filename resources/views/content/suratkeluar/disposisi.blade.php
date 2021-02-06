@extends('dashboard.global')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Disposisi Surat</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/suratkeluar">Surat keluar</a></li>
      <li class="breadcrumb-item active" aria-current="page">Disposisi Surat</li>
  </ol>
  </div>

<br>
<div class="card mb-4">
    <div class="container col-md-12">
        <br>
        <h3 class="card-title text-center">Disposisi Surat</h3>
        <form enctype="multipart/form-data" role="form" action="/suratkeluar/disposisi/{{$surat->idsuratkeluar}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <br><br>
                <label for="nomor_surat">No Surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ old ('nomor_surat',$surat->nomor_surat)}}"
                    placeholder="No Surat" disabled>
	
            </div>

            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" value="{{ old ('perihal',$surat->perihal)}}"
                    placeholder="Perihal" disabled>

            </div>

            <div class="form-group">
                <label for="lampiran">Lampiran</label>
                <input type="text" class="form-control" id="lampiran" name="lampiran"
                    value="{{ old ('lampiran',$surat->lampiran)}}" disabled>

            </div>

            <?php
            list($thn, $bln, $tgl) = explode('-',$surat->tanggalsurat)
            ?>
            
            <div class="form-group">
              <label for="tanggalsurat">Tanggal Surat</label>
              <input type="text" class="form-control" name="tanggalsurat" id="tanggalsurat" value="{{ old ('tanggalsurat',$tgl.'/'.$bln.'/'.$thn)}} " disabled >
            </div>

            <div class="form-group">
                <label for="select2SinglePlaceholder">Kirim Kepada</label>
                <select class="select2-single-placeholder form-control" name="iduser" id="iduser" value="{{ old ('iduser','')}}" required>
                    <option></option>
                    @forelse($users  as $user => $key)     
                    <option value="{{$key->id}}">{{$key->name}}</option>    
                    @empty
                    <option value="1">Tidak Ada User</option> 
                  @endforelse 
                  @error('iduser')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror       
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Disposisi</button>
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