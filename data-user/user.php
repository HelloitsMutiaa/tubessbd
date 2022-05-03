<?php
    error_reporting();
    include "user-list.php";
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
    </nav>
    <section class="home">
        <h1><span>Data User</span></h1> 
            <table class="content-table">
                <thead>
                    <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Asal Sekolah</th>
                    <th>Level</th>
                    <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach ($data_user as $data): ?>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['nama_user']?></td>
                        <td><?php echo $data['username']?></td>
                        <td><?php echo $data['email']?></td>
                        <td><?php 
                            if(empty($data['asal_sekolah']))
                            {
                                echo "-";
                            } else {
                                echo $data['asal_sekolah'];
                            }
                            ?>
                        </td>
                        <td><?php echo $data['nama_level']?></td>
                        <td>
                            <a href="user-edit.php?id=<?php echo $data['id_user'];?>"><button class="btn-primary">Edit</button></a>
                            <a href="hapus_user.php?id=<?php echo $data['id_user']; ?>"><button class="btn-primary" onclick="return confirm('Are You Sure ?');">Hapus</button></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
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
