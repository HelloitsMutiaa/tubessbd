<?php 
include "../includes/connect.php";

$id_course = $_GET['id_course'];

$query = "DELETE FROM course WHERE id_course = $id_course";
$hasil = mysqli_query($dtb, $query);

if($hasil == true)
{
    header('location:kursus.php');
} else {
    header('location:kursus-tambah.php');
}