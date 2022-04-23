<?php 
include "../includes/connect.php";

$no = 1;
$query = "SELECT childs.*, user.id_user, user.nama_user
         FROM childs
         JOIN user ON childs.id_user=user.id_user";
$hasil = mysqli_query($dtb, $query);
$data_childs = array();

while($row=mysqli_fetch_assoc($hasil)){
    $data_childs[] = $row;
}

return $data_childs;


?>