<?php
include "../includes/connect.php";
        $query = mysqli_query($dtb, "SELECT course.*, kategori.kategori_nama
                                    FROM course
                                    LEFT JOIN kategori ON kategori.id_kategori = course.id_kategori");
        $data_kursus = array();
        $no = 1;
        while($row = mysqli_fetch_assoc($query))
        {
            $data_kursus[] = $row;
        }
    ?>