<?php 
include "../includes/connect.php";

$id_ongoing = $_GET['id_ongoing'];

$query = "DELETE FROM ongoing WHERE id_ongoing = $id_ongoing";
$hasil = mysqli_query($dtb, $query);

if($hasil == true)
{
    header('location:ongoing.php');
} else {
    header('location:ongoing-tambah.php');
}