<?php
    error_reporting();
    include "../includes/connect.php";
    $id = $_GET['id'];
    $idc = $_GET['id_child'];
    $query = mysqli_query($dtb, "SELECT course.*, kategori.kategori_nama
            FROM course
            LEFT JOIN kategori ON kategori.id_kategori = course.id_kategori
            WHERE course.id_course=$id");
    $data = mysqli_fetch_assoc($query);

    $url = $data['vid_course'];

    /* Data Ongoing */
    $ongoing = "SELECT ongoing.*, ongoing.id_ongoing, childs.id_child, course.id_course,
            (SELECT tgl_selesai FROM selesai WHERE selesai.id_ongoing=ongoing.id_ongoing)as tgl_selesai
            FROM ongoing
            JOIN childs ON ongoing.id_child=childs.id_child
            JOIN course ON ongoing.id_course=course.id_course
            WHERE (ongoing.id_child=$idc) AND (ongoing.id_course=$id)";

    $result = mysqli_query($dtb, $ongoing);
    $data_ongoing = mysqli_fetch_assoc($result);
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
                    <li class="nav-link active">
                        <a href="../display/dashboard-child.php?id_child=<?php echo $idc?>">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-family/family-ch.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="./kursus-ku.php?id_child=<?php echo $idc?>">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text"> My Course</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
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
        <h1><span>Course</span></h1> 
            <fieldset class="boks">
                <h2 class="tape"><span><?php echo $data['course_title']?></span></h2>
                <iframe  width="600" height="345" src="<?php echo $url;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </table>
                <?php if($data_ongoing['status']!=='Selesai'):?>
                <form action="" method="POST">
                    <input type="hidden" name="id_ongoing" value="<?php echo $data_ongoing['id_ongoing'] ?>">
                <table class="table-ch">
                    <tfoot>
                        <td><a href="../data-finished/finished-list.php?id"><button class="btn-secondary" name="submit">Finish</button></a></td>
                    </tfoot>
                </table>
                <?php else:?>
                    <?php endif?>
                </form>

            </fieldset>
    </section>

    <?php 

            if(isset($_POST["submit"]))
            {
                $id = $_POST['id_ongoing'];
                $selesai = date('Y-m-d');
                $poin = 40;
                
                $status = "Selesai";
                $query2 = "UPDATE ongoing SET status='$status' WHERE id_ongoing=$id;";
                $query2 .= "INSERT INTO selesai(id_ongoing, tgl_selesai, poin)
                VALUES ($id, '$selesai', $poin)";

                $hasil2 = mysqli_multi_query($dtb, $query2);
                if($hasil2 == true)
                {
                    echo "<script>window.alert('Congrats You Get 40 Poins')
                            window.location='../display/dashboard-child.php?id_child=".$idc."'</script>";
                } else {
                    echo "koneksi.gagal" .mysqli_error($dtb);
                    header('location:finished-list.php');
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
<script src="../assets/js/show.js"></script>

</body>
</html>
