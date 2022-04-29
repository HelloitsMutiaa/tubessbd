<?php
    error_reporting(0);
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
     <section class="sign">
         <form action="" method="POST">
        <h1><span>Login</span></h1> 
        <fieldset class="reg">
         <div class="form">
             <input type="text" name="username" required>
             <label for="">Username</label>
         </div>     
         <div class="form">
            <input type="password" id="pwd" name="password" required>
            <label for="">Password</label>
            <div class="input-group-append">
				<i class="fa fa-eye-slash" id="icon"></i>
			</div>
        </div>  
         <h3>Don't Have an Account ?<a href="first-page.php">Sign Up</a></h3>
         <br/>
         <div class="add3">
             <a href="#"><button class="btn-secondary" name="submit">Submit</button></a> 
         </div>
         </fieldset> 
         </form>
    </section>

    <?php 
        session_start();
        if (isset($_SESSION['id_level'])) {
            header('Location: ../display/dashboard.php');
            exit();
        }
        include "../includes/connect.php";
        if(isset($_POST['submit'])){
            $user_login = $_POST['username'];
            $pass_login = md5($_POST['password']);
            $query = "SELECT user.*, level.id_level, level.nama_level
            FROM user
            JOIN level ON user.id_level=level.id_level
            WHERE username='$user_login' AND pass_user='$pass_login'";
            $hasil = mysqli_query($dtb, $query);

            while($row = mysqli_fetch_assoc($hasil)){
                $password = $row['pass_user'];
                $username = $row['username'];
                $nama = $row['nama_user'];
                $asal = $row['asal_sekolah'];
                $email = $row['email'];
                $id_user = $row['id_user'];
                $level = $row['nama_level'];
            }
            if($user_login == $username && $pass_login == $password){
                header('location: ../display/dashboard.php');
                $_SESSION['username'] = $username;
                $_SESSION['nama_user'] = $nama;
                $_SESSION['id_user'] = $id_user;
                $_SESSION['nama_level'] = $level;
            }else {
                echo "<script>window.alert('User Tidak Ditemukan')
                window.location='login.php'</script>";
            }
        }

    
    ?>

    <script src="../assets/js/show.js"></script>
</body>
</html>