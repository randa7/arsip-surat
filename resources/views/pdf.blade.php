<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<style>
    table, td, th {  
        border: 1px solid black;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 15px;
    }

    h1{
        text-align: center;
    }
</style>

   <body>
    <h1>Laporan Surat Keluar</h1>
    
    <table class="rtable">
      <thead>
        <tr>
          <th>No</th>
          <th>No Surat</th>
          <th>Perihal</th>
     
          <th>Kepada</th>
          <th>Bagian</th>
          <th>Tanggal Surat</th>
        </tr>
      </thead>
      <tbody>
        @forelse($suratkeluar as $key => $surat)
        <tr>
          <td>{{ $key + 1 }} </td>
          <td>{{ $surat->nomor_surat }} </td>
          <td>{{ $surat->perihal }}</td>
  
          <td>{{ $surat->kepada }}</td>
          <td>{{ $surat->bagian }}</td>
          <?php
            list($thn, $bln, $tgl) = explode('-',$surat->tanggalsurat)
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