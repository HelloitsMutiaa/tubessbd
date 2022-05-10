<?php 
    error_reporting(0);
    session_start();
    if(empty($_SESSION['username'])){
        header('Location: ../Registrasi/login.php');
        exit();
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
                    <?php 
                    session_start();
                    if(($_SESSION['nama_level']) !== 'admin'): ?>
                    <li class="nav-link">
                        <a href="../display/dashboard-user.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-user/user.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link active">
                        <a href="family.php">
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
                    <li class="nav-link">
                        <a href="../display/dashboard.php">
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
                    <li class="nav-link active">
                        <a href="family.php">
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
    <?php
    include "../includes/connect.php";
        $id_child = $_GET['id_child'];
        $query = "SELECT childs.*, user.id_user, user.nama_user
         FROM childs
         JOIN user ON childs.id_user=user.id_user
         WHERE childs.id_child = $id_child";
        $hasil = mysqli_query($dtb, $query);
        $data = mysqli_fetch_assoc($hasil);
    ?>
    <section class="home">
        <form action="" method="POST">
        <h1><span>Edit Keluarga</span></h1>
        <fieldset class="box">
        <input type="hidden" value="<?php echo $data['id_child']?>" name="id">
         <div class="form">
             <input type="text" required value="<?php echo $data['child_name']?>" name="nama">
             <label for="">Nama</label>
         </div>  
         <div class="form">
             <input type="text" required value="<?php echo $data['child_uname']?>" name="uname">
             <label for="">Username</label>
         </div>  
         <div class="form">
         <input type="text" id="date" name="date" class="tgl" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'" required value="<?php echo $data['child_lahir']?>">
             <label for="">Tanggal Lahir</label>
         </div> 
         <br/>
         <div class="add2">
             <a href="#"><button class="btn-secondary" name="submit">Submit</button></a> 
         </div>
         </fieldset> 
        </form>
    </section>

    <?php 
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['uname'];
        $lahir = $_POST['date'];

        $query2 = "UPDATE childs
                SET child_name='$nama',
                    child_uname='$username',
                    child_lahir='$lahir'
                WHERE id_child=$id";
        $hasil2 = mysqli_query($dtb, $query2);
        if($hasil2 == true){
            echo "<script>window.alert('Data Berhasil di Update')
                 window.location='family.php'</script>";
        }else {
            echo "Koneksi Gagal" .mysqli_error($dtb);
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
