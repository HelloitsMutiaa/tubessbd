<?php
    include "../includes/connect.php";
    $no = 1;
    $query2 = "SELECT ongoing.id_ongoing, childs.id_child, course.id_course, selesai.id_selesai, selesai.tgl_selesai, selesai.poin
                FROM ongoing
                JOIN childs ON childs.id_child=ongoing.id_child
                JOIN course ON course.id_course=ongoing.id_course
                LEFT JOIN selesai ON ongoing.id_ongoing=selesai.id_ongoing";
    $hasil = mysqli_query($dtb, $query2);
    $data = mysqli_fetch_assoc($hasil);
?>