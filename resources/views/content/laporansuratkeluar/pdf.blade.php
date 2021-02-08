<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body>

    <table class="table table-bordered">
        <div class="align-middle">
            <br><br>
            <h3 class="text-center">Data Laporan Surat Keluar</h3>
            <br><br>
        </div>
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">No Surat</th>
            <th scope="col">Perihal</th>
            <th scope="col">Lampiran</th>
            <th scope="col">Kepada</th>
            <th scope="col">Bagian</th>
            <th scope="col">Tanggal Surat</th>
            <th scope="col">Tanggal Surat Keluar</th>
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
</body>

</html>