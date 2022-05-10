<?php
    error_reporting();
    include "../includes/connect.php";
    $id = $_GET['id'];
    $idc = $_GET['id_child'];
    $query = mysqli_query($dtb, "SELECT course.*, kategori.kategori_nama
            FROM course
            LEFT JOIN kategori ON kategori.id_kategori = course.id_kategori
            WHERE course.id_course=$id");
    $data = mysqli_fetch_assoc($query);

    $url = $data['vid_course'];
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
                    <li class="nav-link active">
                        <a href="../display/dashboard-child.php?id_child=<?php echo $idc?>">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-family/family-ch.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
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
        <h1><span>Course</span></h1> 
            <fieldset class="boks">
                <h2 class="tape"><span><?php echo $data['course_title']?></span></h2>
                <iframe  width="600" height="345" src="<?php echo $url;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </table>
                <table class="table-ch">
                    <tfoot>
                        <td><a href="../data-finished/finished-list.php"><button class="btn-secondary" name="submit">Finish</button></a></td>
                    </tfoot>
                </table>

            </fieldset>
    </section>
    <?php 
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $lama = md5($_POST['lama']);

            if($lama !== $data['child_pass']){
                echo "<script>window.alert('Password Lama Salah!')
                window.location='family-ch.php'</script>";
                return false;
            } else {
                $baru = md5($_POST['baru']);
                $query = "UPDATE childs
                        SET child_pass='$baru'
                        WHERE id_child=$id";
                $result = mysqli_query($dtb, $query);
                if($result == true){
                    echo "<script>window.alert('Password Berhasil di Update')
                    window.location='family-ch.php'</script>";
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
