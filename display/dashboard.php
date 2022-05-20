<?php 
    error_reporting(0);
    include "../includes/connect.php";
    include "../includes/function.php";
    session_start();
    if (($_SESSION['nama_level']) !== 'admin') {
        header('Location: ../Registrasi/login-as.php');
        exit();
    }
    include "../data-kursus/kursus-list.php";
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
                        <a href="dashboard.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-user/user.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">User</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-family/family.php">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Family</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-kursus/kursus.php">
                            <i class='bx bx-library icon'></i>
                            <span class="text nav-text">Course</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-ongoing/ongoing.php">
                            <i class='bx bx-time-five icon'></i>
                            <span class="text nav-text">Ongoing</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-finished/finished.php">
                            <i class='bx bx-check icon'></i>
                            <span class="text nav-text">Finished</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
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
        <?php if(isset($_GET["cari"])) { ?>
        <?php $data_kursus = cari($_GET["keyword"]);}?>
            <form action="" method="GET">
            <table class="elementscontainer">
                <tr>
                    <td>
                        <input type="text" placeholder="Search" class="search" name="keyword">
                    </td>
                    <td>
                        <a href="#">
                            <button type="submit" class="btn-search" name="cari"><i class="bx bx-search bx-sm"></i></button>
                        </a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>

    <div class="images">
        <?php foreach($data_kursus as $data): ?>
        <div class="image-box">
            <a href="../data-kursus/video-kursus.php?id=<?php echo $data['id_course']?>">
            <img src="../data-kursus/cover/<?php echo $data['course_cover']?>" alt="">
            <h6><?php echo $data['course_title']?></h6></a>
        </div>
        <?php endforeach?>
        </div>
    </div>
    </section>

<script>
    let btn = document.querySelector(".toggle");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function(){
        sidebar.classList.toggle("close");
    }
</script>

</body>
</html>
