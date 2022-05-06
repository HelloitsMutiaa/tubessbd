<?php 
    error_reporting(0);
    include "list.php";
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
                    <li class="nav-link active">
                        <a href="finished.php">
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
        <h1><span>Data Finished</span></h1>
        <form action="" method="POST">
        <table class="content-table">
                <thead>
                    <tr>
                    <th>No.</th>
                    <th>Nama Anak</th>
                    <th>Judul</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $d) :?>
                    <?php if(!empty($d['tgl_selesai'])): ?>
                    <tr>
                    <input type="hidden" name="ids" value="<?php echo $d['id_selesai']?>">
                    <input type="hidden" name="ido" value="<?php echo $d['id_ongoing']?>">
                    <td><?php echo $no++?></td>
                    <td><?php echo $d['child_name']?></td>
                    <td><?php echo $d['course_title']?></td>
                    <td><?php echo date($d['tgl_mulai'])?></td>
                    <td><?php echo date($d['tgl_selesai'])?></td>
                    <td><?php echo $d['poin']?> Coins</td>
                    </tr>
                    <?php endif?>
                    <?php endforeach ?>
                    </tbody>
            </table>
        </form>
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
