<?php
    error_reporting(0);
    session_start();
    if(empty($_SESSION['username'])){
        header('Location: ../Registrasi/login.php');
        exit();
    }


    include "../includes/connect.php";
    $id = $_SESSION['id_user'];
    $query = "SELECT childs.*, user.id_user, user.nama_user
            FROM childs
            JOIN user ON childs.id_user=user.id_user
            WHERE user.id_user=$id";
    $hasil = mysqli_query($dtb, $query);
    $data = array();

    while($row = mysqli_fetch_assoc($hasil)){
        $data[] = $row;
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
    <title>BookR</title>
</head>
<body style="background-color: #DDD;">
    <img src="../assets/img/logo.png" alt="" class="fp-image">
    <div class="title">
    <h2>Welcome To BookP !!</h2>
    <h3>Log In as</h3>
    </div>
    <div class="fc-table">
    <table class="content-table">
        <tr>
            <td><a href="../display/dashboard-user.php"><button class="btn-secondary"><?php echo $_SESSION['nama_level'];?></button></td>
            <?php foreach($data as $d): ?>
            <td><a href="../display/dashboard-child.php"><button class="btn-secondary" name="submit"><?php echo $d['child_name'];?></button></td>
            <?php endforeach?>
        </tr>
    </table>
    </div>
    
    <h3 class="tc"><span>Tambah Keluarga</span></h3>
    <table class="table-ch">
        <tfoot>
            <td><a href="../data-family/family-add.php"><button class="btn-secondary">+</button></a></td>
        </tfoot>
    </table>
    </body>
</html>