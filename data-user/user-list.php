<?php 
include "../includes/connect.php";
session_start();
if (($_SESSION['nama_level']) == 'admin') {
    $no = 1;
    $display = "SELECT user.*, level.id_level, level.nama_level
                FROM user
                JOIN level ON user.id_level=level.id_level";
    $hasil = mysqli_query($dtb, $display);
    $data_user = array();
    while($row = mysqli_fetch_assoc($hasil)){
    $data_user[] = $row;
    }
    return $data_user;
}

elseif (($_SESSION['nama_level']) !== 'admin'){
    $id_user = $_SESSION['id_user'];
    $display2 = "SELECT user.*, level.id_level, level.nama_level
                FROM user
                JOIN level ON user.id_level=level.id_level
                WHERE user.id_user=$id_user";
    $result = mysqli_query($dtb, $display2);
    $data = mysqli_fetch_assoc($result);
}