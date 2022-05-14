<?php 
    error_reporting(0);
    include "../includes/connect.php";
    include "../data-kursus/kursus-list.php";
    session_start();
    if(empty($_SESSION['username'])){
        header('Location: ../Registrasi/login.php');
        exit();
    }

    $id_child = $_GET['id_child'];
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
                        <a href="dashboard-child.php">
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
                        <a href="#">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">My Course</span>
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
        <div class="pict"><img src="../assets/img/pict 1.png" alt=""/></div>
        <div class="container">
            <table class="elementscontainer">
                <tr>
                    <td>
                        <input type="text" placeholder="Search" class="search">
                    </td>
                    <td>
                        <a href="#">
                            <i class="bx bx-search"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="images">
    <?php foreach($data_kursus as $data): ?>
        <form action="" method="POST">
        <div class="image-box">
            <input type="hidden" name="id_course" value="<?php echo $data['id_course']?>">
            <img src="../data-kursus/cover/<?php echo $data['course_cover']?>" alt="">
            <h6><?php echo $data['course_title']?></h6>
        </div>
        <div class="bt-ch">
        <button name="submit"></button></div>
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
