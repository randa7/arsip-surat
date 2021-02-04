
@extends('dashboard.global')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Laporan Surat Masuk</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Laporan Surat Masuk</li>
  </ol>
  </div>
<!-- DataTable with Hover -->
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h3 class="text-center">Data Laporan Surat Masuk</h3>
        <a href="suratmasuk/create" class="btn btn-success float-right m" title="Export Excel"><i class="fas fa-file-csv"></i> Export Excel</a>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th style="width: 5px">No</th>
              <th>No Surat</th>
              <th>Perihal</th>
              <th>Lampiran</th>
              <th>Pengirim</th>
              <th>Bagian</th>
              <th>Tanggal Surat</th>
              <th>Tanggal Surat Masuk</th>
            </tr>
          </thead>
          <tbody>
            @forelse($suratmasuk as $key => $surat)
            <tr>
              <td>{{ $key + 1 }} </td>
              <td>{{ $surat->nomor_surat }} </td>
              <td>{{ $surat->perihal }}</td>
              <td>{{ $surat->lampiran }}</td>
              <td>{{ $surat->pengirim }}</td>
              <td>{{ $surat->bagian }}</td>
              <?php
                list($thn, $bln, $tgl) = explode('-',$surat->tanggalsurat)
              ?>
              <td>{{$tgl.'/'.$bln.'/'.$thn }}</td>
              <?php
                list($thn, $bln, $tgl) = explode('-',$surat->tanggalsuratmasuk)
              ?>
              <td>{{$tgl.'/'.$bln.'/'.$thn }}</td>

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