
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
        @if ($role->name == 'user')
          {{-- <li></li> --}}
        @else
          <a href="suratkeluar/create" class="btn btn-primary float-right m" title="Tambahkan Surat Keluar"><i class="fas fa-plus"></i></a>
        @endif
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
                @if($surat->file_surat =='')
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#downloadModal" class="btn btn-info btn-sm mr-2" title="Download"><i class="fas fa-download"></i></a>
                
                @else
                  <a href="{{Storage::url($surat->file_surat)}}" target="_blank" class="btn btn-info btn-sm mr-2" title="Download"><i class="fas fa-download"></i></a>
                @endif
                
                <a href="/suratkeluar/{{$surat->idsuratkeluar}}/detail" class="btn btn-success btn-sm mr-2" title="Detail"><i class="fas fa-eye"></i></a>
                <a href="/suratkeluar/{{$surat->idsuratkeluar}}/disposisi" class="btn btn-primary btn-sm mr-2" title="Disposisi"><i class="fas fa-paper-plane"></i></a>
                <a href="/suratkeluar/{{$surat->idsuratkeluar}}/edit" class="btn btn-warning btn-sm mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#hapusModal" class="btn btn-danger btn-sm mr-2" title="Hapus"><i class="fas fa-trash"></i></a>
             </td>
            </tr>
            
            <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Hapus Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Yakin akan menghapus data ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <form action="/suratkeluar/{{$surat->idsuratkeluar}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" value="delete" class="btn btn-outline-danger " title="Hapus">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

            <div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">File Surat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Tidak Ada File Surat</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kembali</button></button>
                </div>
              </div>
            </div>
          </div>

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


          <!-- Hapus Logout -->

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