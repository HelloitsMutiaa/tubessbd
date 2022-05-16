<?php
    error_reporting();
    include "user-list.php";
    include "../includes/connect.php";
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
                        <a href="../display/dashboard-user.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link active">
                        <a href="user-us.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-family/family-us.php">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text"> My Family</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../display/about-us.php">
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
                <input type="hidden" name="id" value="<?php echo $data['id_user']?>">
                    <tr>
                        <td>Nama</td>
                        <td>:&nbsp;&nbsp;&nbsp;<?php echo $data['nama_user']?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:&nbsp;&nbsp;&nbsp;<?php echo $data['username']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:&nbsp;&nbsp;&nbsp;<?php echo $data['email']?></td>
                    </tr><br>
                    <?php if(!empty($data['asal_sekolah'])): ?>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:&nbsp;&nbsp;&nbsp;<?php echo $data['asal_sekolah']?></td>
                    </tr>
                    <?php else:?>
                    <?php endif?>
                    <tfoot>
                        <td><a href="user-edit.php?id=<?php echo $data['id_user']?>"><button class="btn-secondary">Edit</button></a></td>
                    </tfoot>
                </table>

            </fieldset><br/><br/><br/>

           <form action="" method="POST">
            <fieldset class="boks">
                <h2 class="tape"><span>Ubah Password</span></h2>
                <table class="table-us">
                    <input type="hidden" name="id" value="<?php echo $data['id_user']?>">
                    <tr>
                    <td>
                        <div class="form">
                            <input type="password" name="lama" id="pwd" required/>
                            <label for="">Password Lama</label>
                            <div class="input-group-append">
                                <i class="fa fa-eye-slash" id="icon"></i>
                            </div>
                        </div> 
                        <div class="form">
                            <input type="password" name="baru" id="konfig" required/>
                            <label for="">Password Baru</label>
                            <div class="input-group-append">
                                <i class="fa fa-eye-slash" id="eye" ></i>
                            </div>
                        </div>   
                    </td></tr>
                    <tfoot>
                        <td><a href="#"><button class="btn-secondary" name="submit">Edit</button></a></td>
                    </tfoot>
                </table>
            </fieldset>
            </form> 
    </section>
    <?php 
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $lama = md5($_POST['lama']);

            if($lama !== $data['pass_user']){
                echo "<script>window.alert('Password Lama Salah!')
                window.location='user-us.php'</script>";
                return false;
            } else {
                $baru = md5($_POST['baru']);
                $query = "UPDATE user
                        SET pass_user='$baru'
                        WHERE id_user=$id";
                $result = mysqli_query($dtb, $query);
                if($result == true){
                    echo "<script>window.alert('Password Berhasil di Update')
                    window.location='user-us.php'</script>";
                } else {
                    echo "Koneksi gagal" .mysqli_errno($dtb);
                }
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
