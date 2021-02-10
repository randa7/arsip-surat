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
            font-size: 16;
           
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
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">Nomor &emsp;&emsp;&emsp;: {{$request["nomor_surat"]}}</p></td>
			<td colspan="5" style="padding-right = 100px;">{{$tgl.' '. $bln .' '.$thn}}</td>
			<td>&emsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">Lampiran&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$request["lampiran"]}} </p></td>
		</tr>
		
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">Hal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   : <b><u>Panggilan Orang Tua</u></b> </p></td>
		</tr>

		<tr>
				<td><br></td>
		</tr>
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">Kepada.</p></td>
		</tr>
		
		
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">Yth.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : Orang Tua / Wali Murid </p></td>
		</tr>
		
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    {{$request["nama"]}} </p></td>
		</tr>			
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Di- </p></td>
		</tr>	
		<tr>
			<td colspan="4" align="justify" class="nomor2"><p style="text-align: justify-all; padding-left: 55px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Tempat </p></td>
		</tr>			
		
		<tr>
				<td>
				<br> 
				</td>
		</tr>
		<tr>
			<td colspan="12" class="nomor2" style="padding-left: 120px; padding-right: 70px;">Dengan hormat,dengan ini kami wali kelas {{$request["nama"]}} dan Guru Bimbingan dan
			Konseling (BK) SMK Negeri 2 Teluk Kuantan mengharapkan kehadiran
			Bapak/Ibu/Sdr pada :
			</td>
		</tr>

		</table>
		
		<table style="width : 100%;">
		<tr>
			<td >
			</td>
			<td colspan="4" style="width: 100%;">
			
			</td>
			<td >
				
			</td>
		</tr>
		
		<tr>
			<td colspan="4" class="nomor2" style="padding-left: 120px; padding-right: 70px;">Hari/Tanggal 
			</td>
			<td>: {{$request["htl"]}} </td>
		</tr>
		<tr>
			<td colspan="4" class="nomor2" style="padding-left: 120px; padding-right: 70px;">Waktu 
			</td>
			<td>: {{$request["waktu"]}}</td>
		</tr>
		<tr>
			<td colspan="4" class="nomor2" style="padding-left: 120px; padding-right: 70px;">T e m p a t 
			</td>
			<td>: {{$request["tempat"]}}</td>
		</tr>		
		<tr>
			<td colspan="4" class="nomor2" style="padding-left: 120px; padding-right: 70px;">Acara 
			</td>
			<td>: {{$request["acara"]}}</td>
		</tr>		
		<tr>
			<td>
				<br>
			</td>
		</tr>
		<tr>
			<td colspan="12" class="nomor2" style="padding-left: 120px; padding-right: 70px;">Demikianlah Surat ini disampaikan, atas kehadiran Bapak/Ibu/Sdr tepat pada
			waktunya diucapkan terima Kasih.
			</td>
		</tr>
		<tr>
			<td colspan="12"><br> <br> <br><br> 
			</td>
		</tr>	
		<tr style ="width : 100%;">
			<td style="padding-left: 120px; width : 50%">
				<p style="text-align: left;" class="nomor2">
					Guru BP/BK,
				<br>
				<br>
				<br>
				<br>
				<br>
				<b>{{$request["guru1"]}}</b>
				<br>
				</p>			
			</td>
			<td colspan="5">
			<p style="margin-left: 100px;" class="nomor2">
					Wali Kelas,
				<br>
				<br>
				<br>
				<br>
				<br>
				<b>{{$request["guru2"]}}</b>
		
				
				</p>
			</td>
		</tr>	

		</table>


<p style="text-align: center; padding-right: 40px" class="nomor2">
    Mengetahui,
<br><b>Kepala Sekolah<b><br>
<br>
<br>
<br>
<br>
<u><b>Drs. ARMAN YULIS, MM</b></u>
<br>
NIP. 19640524 199103 1 002
</p>


		
	 <script type="text/javascript">
		window.print();
	</script> 
</body>
</html>