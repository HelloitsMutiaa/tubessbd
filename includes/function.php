<?php 

function cari($keyword)
{
    include "connect.php";
    $query = mysqli_query($dtb, "SELECT course.*, kategori.kategori_nama
                                    FROM course
                                    LEFT JOIN kategori ON kategori.id_kategori = course.id_kategori
                                    WHERE course.course_title LIKE '%$keyword%' 
                                    OR kategori.kategori_nama LIKE '%$keyword%'");
        $data_kursus = array();

        while($row = mysqli_fetch_assoc($query))
        {
            $data_kursus[] = $row;
        }
        return $data_kursus; 
}