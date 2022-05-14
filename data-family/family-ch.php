<?php
    error_reporting();
    include "../includes/connect.php";

    session_start();
    if(empty($_SESSION['username'])){
        header('Location: ../Registrasi/login.php');
        exit();
    }

    $id = $_SESSION['id_user'];
    $query = "SELECT childs.*, user.id_user, user.nama_user
            FROM childs
            JOIN user ON childs.id_user=user.id_user
            WHERE user.id_user=$id";
    $hasil = mysqli_query($dtb, $query);
    $data = mysqli_fetch_assoc($hasil);
    
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
                        <a href="../display/dashboard-child.php?id_child=<?php echo $data['id_child']?>">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link active">
                        <a href="family-ch.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-kursus/kursus-ku.php?id_child=<?php echo $data['id_child']?>">
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
        <h1><span>Data User</span></h1> 
            <fieldset class="boks">
                <h2 class="tape"><span>Profile</span></h2>
                <table class="table-us">
                <input type="hidden" name="id" value="<?php echo $data['id_child']?>">
                    <tr>
                        <td>Nama</td>
                        <td>:&nbsp;&nbsp;&nbsp;<?php echo $data['child_name']?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:&nbsp;&nbsp;&nbsp;<?php echo $data['child_uname']?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:&nbsp;&nbsp;&nbsp;<?php echo $data['child_lahir']?></td>
                    </tr><br>
                    <?php if(!empty($data['school'])): ?>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:&nbsp;&nbsp;&nbsp;<?php echo $data['school']?></td>
                    </tr>
                    <?php else:?>
                    <?php endif?>
                    
                </table>

            </fieldset>
    </section>

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
