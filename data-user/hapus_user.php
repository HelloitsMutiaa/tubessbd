<?php
    require "function.php";

    $nama = $_GET ['nama'];
    var_dump($_GET);
    mysqli_query($dtb, "DELETE FROM user WHERE nama_user = '$nama' ");
    header("Location: user.php");
?>