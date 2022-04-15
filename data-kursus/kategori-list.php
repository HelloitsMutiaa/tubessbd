<?php 
 include "../includes/connect.php";

 $query = mysqli_query($dtb, "SELECT * FROM kategori");
 $data_kategori = array();

 while($row = mysqli_fetch_assoc($query))
 {
        $data_kategori[] = $row;
 }

