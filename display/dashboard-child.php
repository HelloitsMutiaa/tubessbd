<?php 
    error_reporting(0);
    include "../includes/connect.php";
    session_start();
    if(empty($_SESSION['username'])){
        header('Location: ../Registrasi/login.php');
        exit();
    }

    $id_child = $_GET['id_child'];

    $kursus = "SELECT ongoing.*, ongoing.id_ongoing, childs.id_child, course.id_course, course.course_cover, course.course_title
            FROM ongoing
            JOIN childs ON ongoing.id_child=childs.id_child
            JOIN course ON ongoing.id_course=course.id_course
            WHERE ongoing.id_child=$id_child";
            $result = mysqli_query($dtb, $kursus);
            $ongo = array();
            while($baris = mysqli_fetch_assoc($result)){
                $ongo[] = $baris;
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/style.css?<?php echo time();?>" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <title>BookR</title>
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../assets/img/logo.png" alt=""/>
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
                    <li class="nav-link active">
                        <a href="dashboard-child.php?id_child=<?php echo $id_child?>">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-family/family-ch.php?id_child=<?php echo $id_child?>">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-kursus/kursus-ku.php?id_child=<?php echo $id_child?>">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">My Course</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="about-ch.php?id_child=<?php echo $id_child?>">
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
        <div class="pict"><img src="../assets/img/pict 1.png" alt=""/></div>
    </div>
    
    <div class="images">
    <?php foreach($ongo as $on): ?>
        <div class="image-box">
            <input type="hidden" name="id" value="<?php echo $on['id_course']?>">
            <a href="../data-kursus/kursus-ch.php?id=<?php echo $on['id_course']?>&&id_child=<?php echo $id_child?>">
            <img src="../data-kursus/cover/<?php echo $on['course_cover']?>" alt="">
            <h6><?php echo $on['course_title']?></h6>
            </a>
        </div>
        <?php endforeach?>
        <?php
            $kurs = mysqli_query($dtb, "SELECT * FROM course WHERE id_course NOT IN (SELECT id_course FROM ongoing WHERE id_child = $id_child)");
            $data_kursus = array();
            while($row = mysqli_fetch_array($kurs))
            {
            $data_kursus[] = $row;
            }
        ?>
        <?php foreach($data_kursus as $data): ?>
        <form action="" method="POST">
        <div class="image-box">
            <input type="hidden" name="id_course" value="<?php echo $data['id_course']?>">
            <img src="../data-kursus/cover/<?php echo $data['course_cover']?>" alt="">
            <h6><?php echo $data['course_title']?></h6>
        </div>
        <div class="bt-ch">
        <button name="submit"></button>
        </div>
    </form>
    <?php endforeach?>
    </div>
    </div>
    </section>

    <?php 
    if(isset($_POST['submit'])){
        $anak = $id_child;
        $course = $_POST['id_course'];
        $tgl_mulai = date('Y-m-d', strtotime(date('Y-m-d')));
        $query = mysqli_query($dtb, "INSERT INTO ongoing(id_child, id_course, tgl_mulai)
                VALUES($anak, $course, '$tgl_mulai')");

        if($query>0){
            echo "<script>window.location='../data-kursus/kursus-ch.php?id=".$course."&&id_child=".$anak."'</script>";
        }
    }
    
    ?>

<script>
    let btn = document.querySelector(".toggle");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function(){
        sidebar.classList.toggle("close");
    }
</script>

</body>
</html>
