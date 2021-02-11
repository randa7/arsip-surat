@extends('dashboard.global')

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Buat Kartu Peminjaman</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/sarana">Template Surat Sarana & Gudang </a></li>
      <li class="breadcrumb-item active" aria-current="page">Kartu Peminjaman Alat/Barang</li>
  </ol>
  </div>

<br>
<div class="card mb-4">
  <div class="container col-md-12">
    <br>
    <h3 class="card-title text-center">Kartu Peminjaman Alat dan Barang</h3>
            <!-- membuat form  -->
            <!-- gunakan tanda [] untuk menampung array  -->
            <form enctype="multipart/form-data" role="form" action="/sarana/kartupeminjaman" method="POST" target="_blank">
              @csrf
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover">
                    <thead>
                        <tr>
                            <th width="100px">Nama Alat/Barang</th>
                            <th width="10px">Jumlah</th>
                            <th width="10px">Merk/Type</th>
                            <th width="10px">Hari Peminjaman</th>
                            <th width="10px">Hari Pengembalian</th>
                            <th width="10px">Keterangan</th>
                            <th width="10px">Peminjam</th>
                            <th width="8px"></th>
                        </tr>
                    </thead>
                    <!--elemet sebagai target append-->
                    <tbody id="itemlist">
                        <tr>
                            <td><input name="jenis_input[0]" class="form-control" /></td>
                            <td><input name="jumlah_input[0]" class="form-control" /></td>
                            <td><input name="merk_input[0]" class="form-control" /></td>
                            <td><input type="date" name="peminjaman_input[0]" class="form-control" /></td>
                            <td><input type="date" name="pengembalian_input[0]" class="form-control" /></td>
                            <td><input name="keterangan_input[0]" class="form-control" /></td>
                            <td><input name="peminjam" class="form-control" /></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
              <a href="/sarana" type="button" class="btn btn-secondary">Kembali</a>
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
      var peminjaman = document.createElement('td');
      var pengembalian = document.createElement('td');
      var keterangan = document.createElement('td');
      var aksi = document.createElement('td');

//                meng append element
      itemlist.appendChild(row);
      row.appendChild(jenis);
      row.appendChild(jumlah);
      row.appendChild(merk);
      row.appendChild(peminjaman);
      row.appendChild(pengembalian);
      row.appendChild(keterangan);
      row.appendChild(aksi);

//                membuat element input
      var jenis_input = document.createElement('input');
      jenis_input.setAttribute('name', 'jenis_input[' + i + ']');
      jenis_input.setAttribute('class', 'form-control');

      var jumlah_input = document.createElement('input');
      jumlah_input.setAttribute('name', 'jumlah_input[' + i + ']');
      jumlah_input.setAttribute('class', 'form-control');

      var merk_input = document.createElement('input');
      merk_input.setAttribute('name', 'merk_input[' + i + ']');
      merk_input.setAttribute('class', 'form-control');
      
      var peminjaman_input = document.createElement('input');
      peminjaman_input.setAttribute('name', 'peminjaman_input[' + i + ']');
      peminjaman_input.setAttribute('class', 'form-control');
      peminjaman_input.setAttribute('type', 'date');

      var pengembalian_input = document.createElement('input');
      pengembalian_input.setAttribute('name', 'pengembalian_input[' + i + ']');
      pengembalian_input.setAttribute('class', 'form-control');
      pengembalian_input.setAttribute('type', 'date');
      
      var keterangan_input = document.createElement('input');
      keterangan_input.setAttribute('name', 'keterangan_input[' + i + ']');
      keterangan_input.setAttribute('class', 'form-control');

      var hapus = document.createElement('span');

      jenis.appendChild(jenis_input);
      jumlah.appendChild(jumlah_input);
      merk.appendChild(merk_input);
      peminjaman.appendChild(peminjaman_input);
      pengembalian.appendChild(pengembalian_input);
      keterangan.appendChild(keterangan_input);
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