<?php 
include "../includes/connect.php";
    session_start();
    if (($_SESSION['nama_level']) == 'admin') {
        $no = 1;
        $query = "SELECT childs.*, user.id_user, user.nama_user
                FROM childs
                JOIN user ON childs.id_user=user.id_user";
    }

    elseif (($_SESSION['nama_level']) !== 'admin'){
        $id = $_SESSION['id_user'];
        $query = "SELECT childs.*, user.id_user, user.nama_user
                FROM childs
                JOIN user ON childs.id_user=user.id_user
                WHERE user.id_user=$id";
    }

    $hasil = mysqli_query($dtb, $query);
    $data_childs = array();

    while($row=mysqli_fetch_assoc($hasil)){
        $data_childs[] = $row;
    }

    return $data_childs;
?>