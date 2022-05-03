<?php 
include "../includes/connect.php";
$id = $_GET['id'];
$query = "DELETE FROM user WHERE id_user = $id";
$hasil = mysqli_query($dtb, $query);

if($hasil == true){
    echo "<script>window.alert('Data Berhasil di Hapus')
            window.location='user.php'</script>";
} else {
    echo "Koneksi Gagal" .mysqli_errno($dtb);
}