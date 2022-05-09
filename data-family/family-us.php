<?php 
    error_reporting(0);
    include "family-list.php";
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
                    <li class="nav-link">
                        <a href="../display/dashboard-user.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="../data-user/user-us.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-link active">
                        <a href="family-us.php">
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
        </div>
    </nav>
    <section class="home">
        <h1><span>Data Keluarga</span></h1>
        <table class="content-table">
                <thead>
                    <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Ongoing</th>
                    <th>Finished</th>
                    <th>Coins</th>
                    <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_childs as $data): ?>
                    <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id_child']?>"> 
                    <td><?php echo $data['child_name']?></td>
                    <td><?php echo $data['child_uname']?></td>
                    <?php 
                         $id = $data['id_child'];
                         $status = " ";
                         include "../includes/connect.php";
                         $query = "SELECT ongoing.*, ongoing.id_ongoing, childs.id_child, childs.child_name, course.id_course, course.course_title,
                                 (SELECT tgl_selesai FROM selesai WHERE selesai.id_ongoing=ongoing.id_ongoing)as tgl_selesai
                                 FROM ongoing
                                 JOIN childs ON ongoing.id_child=childs.id_child
                                 JOIN course ON ongoing.id_course=course.id_course
                                 WHERE (ongoing.id_child=$id) AND (ongoing.status='$status')";
                         $hasil = mysqli_query($dtb, $query);
                         $ongoing = mysqli_num_rows($hasil);

                         $query2 = "SELECT selesai.*, selesai.id_selesai, ongoing.id_ongoing, ongoing.id_child
                                    FROM selesai
                                    JOIN ongoing ON selesai.id_ongoing=ongoing.id_ongoing
                                    WHERE ongoing.id_child=$id";
                         $hasil2 = mysqli_query($dtb, $query2);
                         $finished = mysqli_num_rows($hasil2);

                         $coins = $finished * 40;
                    ?>
                    <td><?php echo $ongoing;?></td>
                    <td><?php echo $finished;?></td>
                    <td><?php echo $coins;?></td>
                    <td>
                        <a href="family-edit.php?id_child=<?php echo $data['id_child']?>"><button class="btn-primary">Edit</button></a>
                        <a href="family-hapus.php?id_child=<?php echo $data['id_child']?>"><button class="btn-primary" onclick="return confirm('Are You Sure ?');">Hapus</button></a>
                    </td>
                    </tr>
                    <?php endforeach?>
                    </tbody>
            </table>
            <table class="table-ch">
                    <tfoot>
                        <td><a href="family-add.php"><button class="btn-secondary">Tambah</button></a></td>
                    </tfoot>
            </table>
    </section>

<script>
    let btn = document.querySelector(".toggle");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function(){
        sidebar.classList.toggle("close");
    }
</script>

</body>
</html>
