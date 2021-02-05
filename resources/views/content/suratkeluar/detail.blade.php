@extends('dashboard.global')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Detail Surat Keluar</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/suratkeluar">Surat Keluar</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Surat</li>
  </ol>
  </div>

  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h3 class="text-center">Detail Surat</h3>
      </div>
      <div class="table-responsive p-3 table-striped">
        <table class="table align-items-center table-flush table-hover">
          <tbody>
            
            <tr>
              <td width="40%">No Surat </td>
              <td>{{ $surat->nomor_surat }} </td>
            </tr>
            <tr>
              <td width="40%">Perihal </td>
              <td>{{ $surat->perihal }} </td>
            </tr>
            <tr>
              <td width="40%">Lampiran </td>
              <td>{{ $surat->lampiran }} </td>
            </tr>
            <tr>
              <td width="40%">Kepada </td>
              <td>{{ $surat->kepada }} </td>
            </tr>
            <tr>
              <td width="40%">Bagian </td>
              <td>{{ $surat->bagian }} </td>
            </tr>
            <tr>
                <?php 
                    list($thn, $bln, $tgl) = explode('-',$surat->tanggalsurat)    
                ?>
              <td width="40%">Tanggal Surat </td>
              <td>{{$tgl.'/'.$bln.'/'.$thn }}</td>
            </tr>
            <tr>
                <?php 
                list($thn, $bln, $tgl) = explode('-',$surat->tanggalsuratkeluar)    
                ?>
              <td width="40%">Tanggal Surat Keluar </td>
              <td>{{$tgl.'/'.$bln.'/'.$thn }}</td>
            </tr>
            @if($surat->file_surat == NULL)
            
            @else
              <?php 
              list($a, $b, $c) = explode('/',$surat->file_surat);    
              
              list($q, $w) = explode('.',$c);    
              ?>
              @if($w == 'pdf')
              <tr>
                <td width="40%">Preview File Surat </td>
              </tr>
              <tr>
  
                <td colspan="2" class="class='embed-responsive'" ><iframe src="{{ Storage::url($surat->file_surat) }}"  width="100%" height="875" 
                    type="application/pdf"> </iframe></td>
              </tr>
              @else()
              
              <tr>
                <td width="40%">Preview File Surat </td>
                <td colspan><img src="{{ Storage::url($surat->file_surat) }}" width="80%" height="auto" 
                  > </td>
              </tr>
              @endif
            @endif
         
            

            


          </tbody>
        </table>
        <br><br><br>
        <a href="/suratkeluar" type="button" class="btn btn-primary float-left"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
      </div>
    </div>
  </div>
</div>





@endsection