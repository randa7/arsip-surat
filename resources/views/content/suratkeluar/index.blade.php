
@extends('dashboard.global')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Surat Keluar</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Surat Keluar</li>
  </ol>
  </div>
<!-- DataTable with Hover -->
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h3 class="text-center">Data Surat Keluar</h3>
        <a href="suratkeluar/create" class="btn btn-primary float-right m" title="Tambahkan Surat Masuk"><i class="fas fa-plus"></i></a>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th style="width: 5px">No</th>
              <th>No Surat</th>
              <th>Perihal</th>
              <th>Lampiran</th>
              <th>Kepada</th>
              <th>Bagian</th>
              <th>Tanggal Surat</th>
              <th>Tanggal Surat Keluar</th>
              <th style="width: 40px">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($suratkeluar as $key => $surat)
            <tr>
              <td>{{ $key + 1 }} </td>
              <td>{{ $surat->nomor_surat }} </td>
              <td>{{ $surat->perihal }}</td>
              <td>{{ $surat->lampiran }}</td>
              <td>{{ $surat->kepada }}</td>
              <td>{{ $surat->bagian }}</td>
              <?php
                list($thn, $bln, $tgl) = explode('-',$surat->tanggalsurat)
              ?>
              <td>{{$tgl.'/'.$bln.'/'.$thn }}</td>
              <?php
                list($thn, $bln, $tgl) = explode('-',$surat->tanggalsuratkeluar)
              ?>
              <td>{{$tgl.'/'.$bln.'/'.$thn }}</td>

              <td style="display: flex;">
                <a href="/suratmasuk/{{$surat->idsuratkeluar}}/disposisi" class="btn btn-primary btn-sm mr-2" title="Disposisi"><i class="fas fa-paper-plane"></i></a>
                <a href="{{Storage::url($surat->file_surat)}}" target="_blank" class="btn btn-info btn-sm mr-2" title="Download"><i class="fas fa-download"></i></a>
                <a href="/suratmasuk/{{$surat->idsuratkeluar}}/edit" class="btn btn-warning btn-sm mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                <form action="/suratmasuk/{{$surat->idsuratkeluar}}" method="post">
                   @csrf
                   @method('DELETE')
                   <button type="submit" value="delete" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                </form>
             </td>
            </tr>
            @empty
            <tr>
               <td colspan="8" align="center">Data Tidak Ditemukan</td>
            </tr>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection


@push('scripts')
  <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
      <!-- Page level custom scripts -->
  <script>
    $(function () {

      $(" #dataTableHover").DataTable(); // ID From dataTable with Hover
    });
  </script>

@endpush