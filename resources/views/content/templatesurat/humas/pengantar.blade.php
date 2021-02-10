@extends('dashboard.global')

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Buat Surat Pengantar PKL</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/humas">Template Surat Humas </a></li>
      <li class="breadcrumb-item active" aria-current="page">Surat Pengantar PKL</li>
  </ol>
  </div>

<br>
<div class="card mb-4">
  <div class="container col-md-12">
    <br>
    <h3 class="card-title text-center">Surat Pengantar PKL</h3>
            <!-- membuat form  -->
            <!-- gunakan tanda [] untuk menampung array  -->
            <form enctype="multipart/form-data" role="form" action="/humas/suratpengantar" method="POST" target="_blank">
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
                <label for="instansi">Instansi</label>
                <input type="text" class="form-control" id="instansi" name="instansi" value="{{ old ('instansi','')}}"
                    placeholder="Instansi" autocomplete="off">
                @error('instansi')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Instansi</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old ('alamat','')}}"
                    placeholder="alamat" autocomplete="off">
                @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="ajaran">Tahun Pelajaran</label>
                <input type="text" class="form-control" id="ajaran" name="ajaran" value="{{ old ('ajaran','')}}"
                    placeholder="Tahun Pelajaran" autocomplete="off">
                @error('ajaran')
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
            

              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover">
                    <thead>
                        <tr>
                            <th width="100px">Nama</th>
                            <th width="10px">Jurusan</th>
                            <th width="10px">Pembimbing</th>
                            <th width="8px"></th>
                        </tr>
                    </thead>
                    <!--elemet sebagai target append-->
                    <tbody id="itemlist">
                        <tr>
                            <td><input name="nama_input[0]" class="form-control" /></td>
                            <td><input name="jurusan_input[0]" class="form-control" /></td>
                            <td><input name="pembimbing_input[0]" class="form-control" /></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-small btn-primary" onclick="additem(); return false"><i class="fas fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
              <button class="btn btn-success" type="submit">Buat</button>
              <a href="/humas" type="button" class="btn btn-secondary">Kembali</a>
              </div>
              <br><br>
            </form>
              <!-- class hide membuat form disembunyikan  -->
              <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
        
@endsection

@push('scripts')
<script>
  var i = 1;
  function additem() {
      var itemlist = document.getElementById('itemlist');
      
//                membuat element
      var row = document.createElement('tr');
      var jenis = document.createElement('td');
      var jumlah = document.createElement('td');
      var merk = document.createElement('td');
      var aksi = document.createElement('td');

//                meng append element
      itemlist.appendChild(row);
      row.appendChild(jenis);
      row.appendChild(jumlah);
      row.appendChild(merk);
      row.appendChild(aksi);

//                membuat element input
      var jenis_input = document.createElement('input');
      jenis_input.setAttribute('name', 'nama_input[' + i + ']');
      jenis_input.setAttribute('class', 'form-control');

      var jumlah_input = document.createElement('input');
      jumlah_input.setAttribute('name', 'jurusan_input[' + i + ']');
      jumlah_input.setAttribute('class', 'form-control');

      var merk_input = document.createElement('input');
      merk_input.setAttribute('name', 'pembimbing_input[' + i + ']');
      merk_input.setAttribute('class', 'form-control');

      var hapus = document.createElement('span');

      jenis.appendChild(jenis_input);
      jumlah.appendChild(jumlah_input);
      merk.appendChild(merk_input);
      aksi.appendChild(hapus);

      hapus.innerHTML = '<button class="btn btn-small"><i class="fas fa-trash"></i></button>';
//                Aksi Delete
      hapus.onclick = function () {
          row.parentNode.removeChild(row);
      };

      i++;
  }
</script>
@endpush