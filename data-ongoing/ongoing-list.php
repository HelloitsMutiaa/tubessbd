<?php 
include "../includes/connect.php";
    $no = 1;
    $query = "SELECT ongoing.*, ongoing.id_ongoing, childs.id_child, childs.child_name, course.id_course, course.course_title,
            (SELECT tgl_selesai FROM selesai WHERE selesai.id_ongoing=ongoing.id_ongoing)as tgl_selesai
            FROM ongoing
            JOIN childs ON ongoing.id_child=childs.id_child
            JOIN course ON ongoing.id_course=course.id_course";

    $result = mysqli_query($dtb, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }

    return $data;