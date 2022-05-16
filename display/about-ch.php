<?php 
    error_reporting(0);
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
<body  style="background-color: #DDD;">
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
                <li class="nav-link">
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
                        <li class="nav-link active">
                        <a href="about-us.php?id_child=<?php echo $id_child?>">
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
        <form action="" method="POST">
        <h1><span>About Us</span></h1>
        <div class="about-image">
        <img src="../assets/img/logo.png" alt="">
        <div class="title">
        <h2>Welcome To BookP !!</h2>
        </div></div>
        <div class="about-text">
        <p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
            Bookp is an application used for monitoring functions. This application is useful for parents or teachers who want to monitor their children or students. In bookp there are various kinds of courses that are composed of several categories in it. registered children or students can access the course for learning purposes. While bookp is made to help learning for its users. Bookp created by group of eight in 2022</p>
        </div>
        <div class="copyright">
            <h4>&copy;bookP-<script>document.write(new Date().getFullYear())</script></h4>
        </div>
        </form>
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
