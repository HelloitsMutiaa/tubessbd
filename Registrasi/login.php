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
        <h1><span>Login</span></h1> 
        <fieldset class="reg">
         <div class="form">
             <input type="text" required>
             <label for="">Username</label>
         </div>     
         <div class="form">
            <input type="password" id="pwd" required>
            <label for="">Password</label>
            <div class="input-group-append">
				<i class="fa fa-eye-slash" id="icon"></i>
			</div>
        </div>  
         <h3>Don't Have an Account ?<a href="first-page.php">Sign Up</a></h3>
         <br/>
         <div class="add3">
             <a href="#"><button class="btn-secondary">Submit</button></a> 
         </div>
         </fieldset> 
    </section>

    <script src="../assets/js/show.js"></script>
</body>
</html>