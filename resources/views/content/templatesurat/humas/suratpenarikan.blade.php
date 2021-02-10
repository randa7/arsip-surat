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
            font-size: 15px;
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
            font-size: 18;
           
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
			<td><br><br>
			<td >
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
        @php
        if($request["tanggalsurat"] == ''){
            $thn = $bln = $tgl = ' ';
        }
        else{
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
            }
        @endphp


		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">Nomor&emsp;&emsp;: {{$request["nomor_surat"]}}</p></td>
			<td colspan="5" style="padding-right = 100px;">Teluk Kuantan, {{$tgl.' '.$bln.' '.$thn }}</td>
			<td>&emsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">Lampiran&nbsp;&nbsp;&nbsp;&nbsp;: {{$request["lampiran"]}} </p></td>
		</tr>
		
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">Hal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Penarikan Siswa Praktik Kerja Lapangan </p></td>
		</tr>

		<tr>
				<td><br></td>
		</tr>
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px"><b>Kepada.</b></p></td>
		</tr>
		
		
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px"><b>Yth.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>Bapak/Ibu Pimpinan</b> </p></td>
		</tr>
		
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <b> {{$request["instansi"]}}</b> </p></td>
		</tr>			
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <b> Di- </b></p></td>
		</tr>	
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <b>{{$request["alamat"]}}</b> </p></td>
		</tr>			
		
		<tr>
				<td>
				<br> 
				</td>
		</tr>
		<tr>
			<td colspan="12" class="nomor2" align="justify" style="padding-left: 140px; padding-right: 70px;">Dengan hormat. Sehubungan dengan sedang dilaksanakannya Praktik Kerja Lapangan (PKL) TP.{{$request["ajaran"]}}, dengan ini kami mohon maaf kepada Bapak/Ibu bahwa nama siswa yang tersebut dibawah ini dengan berat hati akan kami tarik kembali ke sekolah.
			
			</td>
		</tr>
			<tr>
				<td>
				<br> 
				</td>
		</tr>
	</table>
	<table class="nilai"  style="margin-left: 145px; width: 73%; padding-right: 140px; border-collapse: collapse; " border="1px">
            <col style="width:5%; text-align:center;">
            <col style="width:35%;">
            <col style="width:30%;">
            <col style="width:30%;">
            <thead>
               <tr>
                  <th class ="nomer2">No.</th>
                  <th class ="nomer2">Nama</th>
                  <th class ="nomer2">Jurusan</th>
				  <th class ="nomer2">Guru Pembimbing</th>
               </tr>
            </thead>
            <tbody>
            @foreach ($nama as $key => $j)
			<tr>
			<td class ="number1 nomer2" >{{$key + 1}}</td>
			<td class ="nomer2">{{$j}}</td>
			<td class ="nomer2">{{$jurusan[$key]}}</td>
			<td class ="nomer2">{{$pembimbing[$key]}}</td>
			</tr>
            @endforeach
			</tbody>
			
		</table
	
<div>
<p style="margin-left:140px; padding-right:70px;" class="nomor2" align="justify">Demikianlah surat penarikan ini kami buat dengan sebenarnya semoga Bapak/Ibu dapat memakluminya, atas kerjasama yang baik kami ucapkan terima kasih.</p>
<div>
<div style ="">  
	<p style="text-align: left;  margin-left:500px" class="nomor2">
	<br><br>Kepala Sekolah,<br>
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
</div>
	 <script type="text/javascript">
		window.print();
	</script> 

</body>
</html>