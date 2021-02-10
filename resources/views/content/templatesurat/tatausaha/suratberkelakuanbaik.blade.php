<html>
<head>
<title></title>

    <style>
        /* table, th, td {
            border: 1px solid black;
        } */



        .kop {
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
            font-weight: bold;
        }
        .kop2 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 17px;
            font-weight: bold;
        }
        .smk{
            font-family:'Bookman Old Style';
            font-size: 21px;
            font-weight: bold;
        }
        .akreditasi{
            font-family:'Bookman Old Style';
            font-size: 15px;
            font-weight: bold;
        }
        .alamat{
            font-family:'Agency FB';
            font-size: 13px;
        }
        .surat{
            font-family: 'Century Gothic';
            font-size: 14;
            font-weight: 600;
            margin-left: -20px;
        }
        .nomor{
            font-family: 'Century Gothic';
            font-size: 14;
            margin-left: -20px;
        }
        .nomor2{
            font-family: 'Century Gothic';
            font-size: 14;
           
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
			<td><br> </td>
		</tr>
		<tr>
		<tr>
			<td><br> </td>
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
			<td colspan="12" align="center"><span class="surat"><u>SURAT BERKELAKUAN BAIK</span></u></td>
		</tr>
		<tr>
			<td colspan="12" align="center"><span class="nomor"> Nomor : {{$request["nomor_surat"]}}</span></td>
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
			<td colspan="12" align="justify" class="nomor2"><p style="text-align: justify-all; padding-right: 65px; padding-left: 55px">Kepala SMK Negeri 2 Teluk Kuantan, Kabupaten Kuantan Singingi Provinsi Riau dengan ini menerangkan bahwa	:</p></td>
		</tr>

        <tr>
			<td>
				<br>
			</td>
			<td></td>
			<td style="width: 50px;"></td>
			<td colspan="12"></td>
		</tr>

		<tr class="nomor2">
			<td colspan="3" style="">&emsp;&emsp;&emsp;&emsp;Nama </td>
			<td>: <b>{{$request["nama"]}}</b></td>
			
		</tr>
		<tr class="nomor2">
			<td colspan="3"style="" >&emsp;&emsp;&emsp;&emsp;Tempat Tanggal Lahir</td>
			<td>: {{$request["ttl"]}}</td>
			
		</tr>
		<tr class="nomor2">
			<td colspan="3"style="" >&emsp;&emsp;&emsp;&emsp;NISN</td>
			<td>: {{$request["nisn"]}}</td>
			
		</tr>
		<tr class="nomor2">
			<td colspan="3" style="">&emsp;&emsp;&emsp;&emsp;Jurusan</td>
			<td class="nomor2">: {{$request["jurusan"]}}</td>
		</tr>
		<tr class="nomor2">
			<td colspan="3" style="">&emsp;&emsp;&emsp;&emsp;Alamat</td>
			<td>: {{$request["alamat"]}}</td>
		</tr>

		<tr>
			<td>
				<br>
			</td>
			<td></td>
			<td style="width: 50px;"></td>
			<td colspan="12"></td>
		</tr>

		<tr class="nomor2">
			<td colspan="12" align="justify" ><p style="text-align: justify-all; padding-right: 65px; padding-left: 55px">Selama menjadi siswa SMK Negeri 2 Teluk Kuantan dari Tahun Pelajaran {{$request["tahunajaran"]}} yang bersangkutan memiliki kepribadian dan berkelakuan <b><u>BAIK.</u></b></p></td>
		</tr >

		<tr>
			<td>
				<br>
			</td>
			<td></td>
			<td style="width: 50px;"></td>
			<td colspan="12"></td>
		</tr>

		<tr class="nomor2">
			<td colspan="12" align="justify" ><p style="text-align: justify-all; padding-right: 50px; padding-left: 55px">Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p></td>
		</tr >
	
	
		
	</table>
<br>
<br>
@php

list($thn, $bln, $tgl) = explode('-', $request["tanggalsurat"]);

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
<p style="text-align: left; padding-left: 60%" class="nomor2">
    Teluk Kuantan, {{$tgl.' '.$bln.' '.$thn}}<br>Kepala Sekolah,<br>
<br>
<br>
<br>
<br>
<br>
<br>
<u><b>Drs. ARMAN YULIS, MM</b></u>
<br>
NIP. 19640524 199103 1 002
</p>
</body>
<script type="text/javascript">
		window.print();
	</script> 
</html>