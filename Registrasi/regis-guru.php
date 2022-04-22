<?php
    require "../data-user/function.php";
    error_reporting(0);
    if(isset($_POST['submit'])) {
        tambah($_POST);
        $_POST = [];
        // var_dump($_POST);
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
     <section class="sign">
         <form action="" method="POST">
        <h1><span>Registrasi</span></h1> 
        <fieldset class="reg">
         <div class="form">
             <input type="text" name="nama" required>
             <label for="">Nama</label>
         </div>  
         <div class="form">
             <input type="text" name="namauser" required>
             <label for="">Username</label>
         </div>  
         <div class="form">
             <input type="text" name="email" required>
             <label for="">Email</label>
         </div>  
         <div class="form">
             <input type="text" name="sekolah" required>
             <label for="">Asal Sekolah</label>
         </div>  
         <div class="form">
            <input type="password" name="pass" id="pwd" required>
            <label for="">Password</label>
            <div class="input-group-append">
				<i class="fa fa-eye-slash" id="icon"></i>
			</div>
        </div>  
         <h3>Already Have an Account?<a href="#">Sign In</a></h3>
         <br/>
         <div class="add3">
             <a href="#"><button type="submit" name="submit" class="btn-secondary">Submit</button></a> 
         </div>
         </fieldset> 
         </form>
    </section>
    

    <script src="../assets/js/show.js"></script>
</body>
</html>