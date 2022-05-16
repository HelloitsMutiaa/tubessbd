<?php
    error_reporting();
    include "../includes/connect.php";

    $idc = $_GET['id_child'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css?<?php echo time();?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/6b104fdfc3.js" crossorigin="anonymous"></script>
    <title>BookR</title>
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../assets/img/logo.png" alt="">
                </span>
                
                <div class="text header-text">
                    <span class="name">bOOkP</span>
                    <span class="profession">English Learning</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu_bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../display/dashboard-child.php?id_child=<?php echo $idc?>">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-family/family-ch.php?id_child=<?php echo $idc?>">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link active">
                        <a href="kursus-ku.php?id_child=<?php echo $idc?>">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text"> My Course</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../display/about-ch.php?id_child=<?php echo $idc?>">
                            <i class='bx bx-error-circle icon'></i>
                            <span class="text nav-text">About-us</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bot-content">
                <li class="nav-link">
                    <a href="../Registrasi/logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Log Out</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
    <section class="home">
        <h1><span> My Course</span></h1> 
        <table class="content-table">
                <thead>
                    <tr>
                    <th>Ongoing</th>
                    <th>Finished</th>
                    <th>Coins</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php 
                         $status = " ";
                         $query = "SELECT * FROM ongoing
                                 WHERE (id_child=$idc) AND (status='$status')";
                         $hasil = mysqli_query($dtb, $query);
                         $ongoing = mysqli_num_rows($hasil);

                         $query2 = "SELECT selesai.*, selesai.id_selesai, ongoing.id_ongoing, ongoing.id_child
                                    FROM selesai
                                    JOIN ongoing ON selesai.id_ongoing=ongoing.id_ongoing
                                    WHERE ongoing.id_child=$idc";
                         $hasil2 = mysqli_query($dtb, $query2);
                         $finished = mysqli_num_rows($hasil2);

                         $coins = $finished * 40;
                    ?>
                    <td><?php echo $ongoing;?></td>
                    <td><?php echo $finished;?></td>
                    <td><?php echo $coins;?></td>
                    </tr>
                    </tbody>
            </table>

            <h1><span> Ongoing</span></h1>
            <div class="images">
            <?php 
                 $query3 = "SELECT ongoing.*, ongoing.id_ongoing, childs.id_child, course.id_course, course.course_cover, course.course_title,
                            (SELECT tgl_selesai FROM selesai WHERE selesai.id_ongoing=ongoing.id_ongoing)as tgl_selesai
                            FROM ongoing
                            JOIN childs ON ongoing.id_child=childs.id_child
                            JOIN course ON ongoing.id_course=course.id_course
                            WHERE (ongoing.id_child=$idc) AND (ongoing.status='$status')";
                $result = mysqli_query($dtb, $query3);
                $data_ongoing = array();
                while($row = mysqli_fetch_assoc($result)){
                    $data_ongoing[] = $row;
                }
            ?>
            <?php foreach($data_ongoing as $data): ?>
            <div class="image-box">
                <input type="hidden" value="<?php echo $data['id_course']?>">
                <a href="kursus-ch.php?id=<?php echo $data['id_course']?>&&id_child=<?php echo $idc?>">
                <img src="../data-kursus/cover/<?php echo $data['course_cover']?>" alt="">
                <h6><?php echo $data['course_title']?></h6>
                </a>
            </div>
            <?php endforeach?>
            </div>

            <h1><span>Finished</span></h1>
            <div class="images">
            <?php 
                $query4 = "SELECT selesai.*, selesai.id_selesai, ongoing.id_ongoing, ongoing.id_child, ongoing.id_course
                            FROM selesai
                            JOIN ongoing ON selesai.id_ongoing=ongoing.id_ongoing
                            WHERE ongoing.id_child=$idc";
                $result2 = mysqli_query($dtb, $query4);
                $data_finished = array();
                while($baris=mysqli_fetch_assoc($result2)){
                    $data_finished[] = $baris;
                }
                
            ?>
            <?php foreach($data_finished as $df): ?>
            <div class="image-box">
                <input type="hidden" value="<?php echo $df['id_course']?>">
                <?php 
                    $idk = $df['id_course'];
                    $kursus = mysqli_fetch_assoc(mysqli_query($dtb, "SELECT * FROM course WHERE id_course=$idk"))
                ?>
                <a href="kursus-ch.php?id=<?php echo $df['id_course']?>&&id_child=<?php echo $idc?>">
                <img src="../data-kursus/cover/<?php echo $kursus['course_cover']?>" alt="">
                <h6><?php echo $kursus['course_title']?></h6>
                </a>
            </div>
            <?php endforeach?>
            </div>

    </section>

    <?php 
         ?>

<script>
    let btn = document.querySelector(".toggle");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function(){
        sidebar.classList.toggle("close");
    }
</script>
<script src="../assets/js/show.js"></script>

</body>
</html>
