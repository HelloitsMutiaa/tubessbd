<?php 

        include "../includes/connect.php";
            $id = $_GET['ids'];
            $id2 = $_GET['ido'];
            $status = " ";
            $query1 = "UPDATE ongoing SET status='$status' WHERE id_ongoing=$id2;";
            $query1 .= "DELETE FROM selesai WHERE id_selesai=$id";

            $h2 = mysqli_multi_query($dtb, $query1);

            if($h2 == true){
               header('Location:../data-ongoing/ongoing.php');
            }
        ?>