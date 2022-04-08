<?php 
include "../includes/connect.php";
    $no = 1;
    $query = "SELECT ongoing.id_ongoing, childs.child_name, course.course_title
            FROM((ongoing
            INNER JOIN childs ON ongoing.id_child=childs.id_child)
            INNER JOIN course ON ongoing.id_course=course.id_course)";

    $result = mysqli_query($dtb, $query);

    $data = array();

    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }

    return $data;
