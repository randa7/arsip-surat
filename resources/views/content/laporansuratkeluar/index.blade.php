
@extends('dashboard.global')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Laporan Surat Keluar</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Laporan Surat Keluar</li>
  </ol>
  </div>
<!-- DataTable with Hover -->
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h3 class="text-center">Data Laporan Surat Keluar</h3>
      </div>
    

          <form role="form" action="/laporansuratkeluar" class="form-horizontal" method="POST">
            @csrf
              <div class="form-row">
                <div class="col-md-5 form-group" style="margin-left: 1%">
                  <div class="input-daterange input-group">
                    <input type="date" class="input-sm form-control" name="start" id="start" value="{{ old ('start','')}}" autocomplete="off"/>
                    <div class="input-group-prepend">
                      <span class="input-group-text">to</span>
                    </div>
                    <input type="date" class="input-sm form-control" name="end" id="end" value="{{ old ('end','')}}"  autocomplete="off" />
                  </div>
                </div>
                <div class="col-md">
                  <button type="submit" class="btn btn-primary" name="action" value="cari" ><i class="fas fa-search"></i> Sort</button>
                  <a href="#" onClick ="$('#dataTableHover').tableExport({type:'excel'});" class="btn btn-success"><i class="fas fa-file-csv"></i> Export Excel</a>
                  <button type="submit" class="btn btn-success" name="action" value="pdf"><i class="fas fa-file-pdf"></i> Export PDF</a>
                </div>
              </div>
          </tr>
          </form>
  
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
  <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('export/libs/FileSaver/FileSaver.min.js')}}"></script>
  <script src="{{asset('export/libs/js-xlsx/xlsx.core.min.js')}}"></script>
  <script src="{{asset('export/tableExport.min.js')}}"></script>

  <script>
    $(function () {

      $(" #dataTableHover").DataTable(); // ID From dataTable with Hover


      $('#simple-date4 .input-daterange').datepicker({        
        format: 'dd/mm/yyyy',        
        autoclose: true,     
        todayHighlight: true,   
        todayBtn: 'linked',
      });  
    });

  </script>


@endpush