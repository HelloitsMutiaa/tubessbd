<?php
    error_reporting(0);
    include "../includes/connect.php";
    session_start();
    if(empty($_SESSION['username'])){
        header('Location: ../Registrasi/login.php');
        exit();
    }
    $id_user = $_GET['id'];
    $display = "SELECT user.*, level.id_level, level.nama_level
                FROM user
                JOIN level ON user.id_level=level.id_level
                WHERE user.id_user=$id_user";
    $hasil = mysqli_query($dtb, $display);
    $data= mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css?<?php echo time();?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
                        <a href="../display/dashboard.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <?php 
                    session_start();
                    if(($_SESSION['nama_level']) !== 'admin'): ?>
                    <li class="nav-link active">
                        <a href="user.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-family/family.php">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">My Family</span>
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
                <?php else :?>
                    <li class="nav-link active">
                        <a href="user.php">
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
        <?php endif?>
    </nav>
    <section class="home">
        <form action="" method="POST">
        <h1><span>Edit Data User</span></h1> 
        <fieldset class="box">
            <input type="hidden" name="id" value="<?php echo $id_user; ?>">
         <div class="form">
             <input type="text" required name="nama" value="<?php echo $data['nama_user']?>">
             <label for="">Nama</label>
         </div>  
         <div class="form">
             <input type="text" required name="username" value="<?php echo $data['username']?>">
             <label for="">Username</label>
         </div>  
         <div class="form">
             <input type="text" required name="email" value="<?php echo $data['email']?>">
             <label for="">Email</label>
         </div>  
         <?php if(!empty($data['asal_sekolah'])): ?>
         <div class="form">
             <input type="text" required name="asal" value="<?php echo $data['asal_sekolah']?>">
             <label for="">Asal Sekolah</label>
         </div> 
         <?php else :?> 
         <?php endif?>
         <br/>
         <div class="add2">
             <a href="#"><button class="btn-secondary" name="submit">Submit</button></a> 
         </div>
         </fieldset> 
         </form>
    </section>

    <?php 
    
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $asal = $_POST['asal'];

        $query = "UPDATE user
                SET nama_user = '$nama',
                username = '$username',
                email = '$email',
                asal_sekolah = '$asal'
                WHERE id_user=$id";
        $result = mysqli_query($dtb, $query);
        if($result == true)
        {
            echo "<script>window.alert('Data Berhasil di Update')
            window.location='user.php'</script>";
        } else {
            echo "koneksi gagal" .mysqli_error($dtb);
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
