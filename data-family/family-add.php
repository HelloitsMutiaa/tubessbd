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
    <script src="https://kit.fontawesome.com/6b104fdfc3.js" crossorigin="anonymous"></script>
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
                    <li class="nav-link">
                        <a href="../display/dashboard-user.php">
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
        <form action="" method="POST">
        <h1><span>Tambah Keluarga</span></h1>
        <fieldset class="box">
         <div class="form">
             <input type="text" required name="nama">
             <label for="">Nama</label>
         </div>  
         <div class="form">
             <input type="text" required name="uname">
             <label for="">Username</label>
         </div>  
         <div class="form">
         <input type="text" id="date" name="date" class="tgl" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'" required>
             <label for="">Tanggal Lahir</label>
         </div> 
         <div class="form">
            <input type="password" name="pass" id="pwd" required>
            <label for="">Password</label>
            <div class="input-group-append">
				<i class="fa fa-eye-slash" id="icon"></i>
			</div>
        </div>  
         <br/>
         <div class="add2">
             <a href="#"><button class="btn-secondary" name="submit">Submit</button></a> 
         </div>
         </fieldset> 
        </form>
    </section>

    <?php 
    include "../includes/connect.php";
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $username = $_POST['uname'];
        $lahir = $_POST['date'];
        $asal = $_SESSION['asal_sekolah'];
        $password = $_POST['pass'];
        $level = 4;
        $wali = $_SESSION['id_user'];

        $query = "INSERT INTO childs(child_name, child_uname, child_pass, child_lahir, school, id_level, id_user)
                VALUES('$nama', '$username', '$password', '$lahir', '$asal', $level, $wali)";
        $hasil = mysqli_query($dtb, $query);
        if($hasil == true)
        {
            echo "<script>window.alert('One Child was Added')
            window.location='family-us.php'</script>";
        } else {
            echo "Koneksi Gagal" .mysqli_errno($dtb);
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
