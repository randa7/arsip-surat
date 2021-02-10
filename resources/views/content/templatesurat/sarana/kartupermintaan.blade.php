<html>
<head>
<title></title>
</head>
<body>

    @php
    
    foreach ($jenis as $key => $j) {
        echo "<p>" . $j . " : " . $jumlah[$key] . " : " . $merk[$key] . " : " . $kegunaan[$key] . " : " . $keterangan[$key] . "</p>";
    }
    

    @endphp

</body>


</html>