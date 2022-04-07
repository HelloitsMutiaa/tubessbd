<?php 
include "../includes/connect.php";
    $no = 1;
    $query = mysqli_query($con, "SELECT ongoing.*,ongoing.id_ongoing as ongoing_id, course.id_course, course.course_title, childs.child_name,
    (SELECT tgl_selesai from selesai JOIN ongoing ON selesai.id_ongoing=ongoing.id_ongoing WHERE selesai.id_ongoing=ongoing_id) as tgl_selesai
    FROM ongoing
    JOIN course ON course.id_course=ongoing.id_course
    JOIN childs ON childs.id_child=ongoing.id_child");

    $data = array();

    while($row = mysqli_fetch_assoc($query)){
        $data[] = $row;
    }

    return $data;
