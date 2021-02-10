<html>
<head>
<title></title>
    <style>
        /* table, th, td {
            border: 1px solid black;
        } */

        .kop {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            font-weight: bold;
        }
        .kop2 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 16px;
            font-weight: bold;
        }
        .smk{
			font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            font-weight: bold;
        }
        .akreditasi{
            font-family: 'Times New Roman', Times, serif;
            font-size: 13px;
            font-weight: bold;
        }
        .alamat{
            font-family: 'Times New Roman', Times, serif;
            font-size: 9px;
        }
        .surat{
            font-family: 'Times New Roman', Times, serif;
            font-size: 15;
            font-weight: 600;
            margin-left: -20px;
        }
        .nomor{
            font-family: 'Times New Roman', Times, serif;
            font-size: 13;
            margin-left: -20px;
        }
        .nomor2{
            font-family: 'Times New Roman', Times, serif;
            font-size: 14;
           
        }
		.number{
         text-align: center;
		}

        .nilai td {
         padding: 5px;
        }

        .number,
        .marks {
            text-align: center;
        }
            
    </style>
            <style type="text/css" media="print">
                @page {
                    size: auto;   /* auto is the initial value */
                    margin: 0;  /* this affects the margin in the printer settings */
                }
                </style>
</head>
<body>
	 
	<table style="width: 100%;">
        <tr>
            <td><br></td>
            <td><br></td>
        </tr>
        <tr>
            <td><br></td>
            <td><br></td>
        </tr>
		<tr>
			<td>
			<td >
				<img src="{{asset('assets/img/smk.jpg')}}" width="70px" height="100px" style="padding-left: 15px; padding-right: 10px; margin-left: 35px;">
			</td>
			<td colspan="6" style="width: 100%;">
				<p align="center">
				
                <span class="kop">PEMERINTAH PROVINSI RIAU </span><br>
                <span class="kop2">DINAS PENDIDIKAN </span><br>
				<span class ="smk"> SMK NEGERI 2 TELUK KUANTAN </span><br>

				<span class="alamat">Alamat : Jln.Raja Ali Haji (Perumnas) Teluk Kuantan, Riau, Kode Pos 29562, Telp/Fax (0760) 20231
                <br>E-mail : smknegeri2_telukkuantan@yahoo.com, NSS : 341090405001, NIS : 173891, NPSN : 10403679 </span>
                <br>
				<span class="akreditasi">AKREDITASI : A</span>
				</p>
			</td>
			<td >
				<img src="{{asset('assets/img/prov.png')}}" width="80px" height="100px" style="padding-right: 55px; !important">
			</td>
		</tr>

        
		<tr>
			<td colspan="12"><hr color="black" height="120px" align="center" style="width: 85%;"></td>
		</tr>

        <tr>
            <td>
                <br>
            </td>
        </tr>
		<tr>
			<td colspan="12" align="center"><span class="surat"><u>KARTU PEMINJAMAN ALAT/BARANG</span></u></td>
		</tr>
		<tr>
			<td>
				<br>
                <br>
			</td>
			<td></td>
			<td style="width: 50px;"></td>
			<td colspan="12"></td>
		</tr>
		<tr>
        </table>
			

        <table class="nilai" style="margin-left: 65px; border-collapse: collapse; margin-right:60px;" border="1px">
            <col style="width:5%; text-align:center;">
            <col style="width:25%;">
            <col style="width:8%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:15%">
            <col style="width:20%">
            <thead>
               <tr>
                  <th style=" font-size:12px;">No.</th>
                  <th style=" font-size:12px;">Nama Alat/Barang</th>
                  <th style="font-size:12px;">Jumlah</th>
                  <th style=" font-size:12px;">Merek/Type</th>
                  <th style=" font-size:12px;">Hari Peminjaman</th>
                  <th style=" font-size:12px;">Hari Pengembalian</th>
                  <th style=" font-size:12px;">Keterangan</th>
               </tr>
            </thead>
            <tbody>
                @foreach ($jenis as $key => $j)
                    <tr>
                        <td class="number">{{$key + 1}}</td>
                        <td>{{$j}}</td>
                        <td class="marks">{{$jumlah[$key]}}</td>
                        <td > {{$merk[$key]}}</td>
                        @if($peminjaman[$key] == '')
                            <td> </td>
                        
                        @else
                        <td>
                            @php
                            list($thn, $bln, $tgl) = explode('-', $peminjaman[$key]);

                                if($bln == '01'){
                                    $bln = 'Januari';
                                }
                                elseif ($bln == '02') {
                                    $bln = 'Februari';
                                }
                                elseif ($bln == '03') {
                                    $bln = 'Maret';
                                }
                                elseif ($bln == '04') {
                                    $bln = 'April';
                                }
                                elseif ($bln == '05') {
                                    $bln = 'Mei';
                                }
                                elseif ($bln == '06') {
                                    $bln = 'Juni';
                                }
                                elseif ($bln == '07') {
                                    $bln = 'Juli';
                                }
                                elseif ($bln == '08') {
                                    $bln = 'Agustus';
                                }
                                elseif ($bln == '09') {
                                    $bln = 'September';
                                }
                                elseif ($bln == '10') {
                                    $bln = 'Oktober';
                                }
                                elseif ($bln == '11') {
                                    $bln = 'November';
                                }
                                else {
                                    $bln = 'Desember';
                                }
                            @endphp
                             {{$tgl.' '.$bln.' '.$thn}}
                            </td>
                            @endif
                            
                            @if($pengembalian[$key] == '')
                                <td> </td>
                            
                            @else
                            <td>
                            @php

                            list($thn, $bln, $tgl) = explode('-', $peminjaman[$key]);

                                if($bln == '01'){
                                    $bln = 'Januari';
                                }
                                elseif ($bln == '02') {
                                    $bln = 'Februari';
                                }
                                elseif ($bln == '03') {
                                    $bln = 'Maret';
                                }
                                elseif ($bln == '04') {
                                    $bln = 'April';
                                }
                                elseif ($bln == '05') {
                                    $bln = 'Mei';
                                }
                                elseif ($bln == '06') {
                                    $bln = 'Juni';
                                }
                                elseif ($bln == '07') {
                                    $bln = 'Juli';
                                }
                                elseif ($bln == '08') {
                                    $bln = 'Agustus';
                                }
                                elseif ($bln == '09') {
                                    $bln = 'September';
                                }
                                elseif ($bln == '10') {
                                    $bln = 'Oktober';
                                }
                                elseif ($bln == '11') {
                                    $bln = 'November';
                                }
                                else {
                                    $bln = 'Desember';
                                }
                            @endphp
                             {{$tgl.' '.$bln.' '.$thn}}
                        </td>
                        @endif
                        <td > {{$keterangan[$key]}}</td>
                    </tr>
                 @endforeach
            </tbody>
         </table>

      	
		
	
<br>
<br>

@php

list($thn, $bln, $tgl) = explode('-', $date);

	if($bln == '01'){
		$bln = 'Januari';
	}
	elseif ($bln == '02') {
		$bln = 'Februari';
	}
	elseif ($bln == '03') {
		$bln = 'Maret';
	}
	elseif ($bln == '04') {
		$bln = 'April';
	}
	elseif ($bln == '05') {
		$bln = 'Mei';
	}
	elseif ($bln == '06') {
		$bln = 'Juni';
	}
	elseif ($bln == '07') {
		$bln = 'Juli';
	}
	elseif ($bln == '08') {
		$bln = 'Agustus';
	}
	elseif ($bln == '09') {
		$bln = 'September';
	}
	elseif ($bln == '10') {
		$bln = 'Oktober';
	}
	elseif ($bln == '11') {
		$bln = 'November';
	}
	else {
		$bln = 'Desember';
	}
@endphp

<table style="margin-left: 65px; margin-right:60px;">
    <col style="width:40%;">
    <col style="width:20%;">
    <col style="width:10%;">
    <col style="width:60%">
    <tr>
        <td>
            <p style="text-align: left; padding-right: 40px" class="nomor2">
                Pengelola Gudang<br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <u><b>NAPOLEON, SP</b></u>
            <br>
            </p>
        </td>
        <td></td>
        <td></td>
        <td>
            <p style="text-align: center ; float: right; " class="nomor2">
                Teluk Kuantan, {{$tgl.' '.$bln.' '.$thn}}
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            ( {{$peminjam}} )
            <br>
            </p>
        </td>
    </tr>
</table>



		
	 <script type="text/javascript">
		window.print();
	</script> 
</body>
</html>