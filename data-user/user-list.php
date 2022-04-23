<?php 
include "../includes/connect.php";
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