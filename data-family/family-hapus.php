<?php
include "../includes/connect.php";

$id_child = $_GET['id_child'];
$query = "DELETE FROM childs WHERE id_child=$id_child";
$hasil = mysqli_query($dtb, $query);
if($hasil == true){
    echo "<script>window.alert('Data Berhasil di Hapus')
            window.location='family.php'</script>";
} else {
    echo "koneksi gagal" .mysqli_error($dtb);
}