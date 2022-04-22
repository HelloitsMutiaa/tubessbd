<?php 

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "bookr";

    $dtb = mysqli_connect($host, $user, $pass, $database);

    if(!$dtb)
    {
        die("Koneksi Gagal : " .mysqli_connect_error($dtb));
    }

    // error_reporting(0);

    function tambah($datanya)
    {
        global $dtb;
        $nama = stripslashes(htmlspecialchars($datanya['nama']));
        $namauser = strtolower(stripslashes(htmlspecialchars($datanya['namauser'])));
        $email = stripslashes(htmlspecialchars($datanya['email']));
        $sekolah = stripslashes(htmlspecialchars($datanya['sekolah']));
        $passuser= mysqli_real_escape_string($dtb, $datanya['pass']);
    
        // Masukkan data ke dalam database
        $querynya = "INSERT INTO user VALUES ('', '$nama', '$namauser', '$email', '$passuser', '$sekolah', '3')";
        mysqli_query($dtb, $querynya);
        return mysqli_affected_rows($dtb);
    }
    

?>