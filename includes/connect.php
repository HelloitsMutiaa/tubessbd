<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "bookp";

    $dtb = mysqli_connect($host, $user, $pass, $database);

    if(!$dtb)
    {
        die("Koneksi Gagal : " .mysqli_connect_error($dtb));
    }
?>