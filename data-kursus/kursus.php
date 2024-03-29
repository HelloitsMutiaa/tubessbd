<?php 
    error_reporting(0);
    include "../includes/connect.php";
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
                    <li class="nav-link active">
                        <a href="kursus.php">
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
<?php 
include "kursus-list.php";
?>
    <section class="home">
        <h1><span>Data Kursus</span></h1>
        <table class="content-table">
                <thead>
                    <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Link Video</th>
                    <th>Cover</th>
                    <th>kategori</th>
                    <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>  
                    <?php foreach($data_kursus as $kursus) :?>
                    <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $kursus['code_course'] ?></td>
                    <td><?php echo $kursus['course_title'] ?></td>
                    <td><?php echo $kursus['vid_course'] ?></td>
                    <td><img src="cover/<?php echo $kursus['course_cover']?>"></td>
                    <td><?php echo $kursus['kategori_nama'] ?></td>
                    <td>
                        <a href="kursus-edit.php?id_course=<?php echo $kursus['id_course']; ?>"><button class="btn-primary">Edit</button></a>
                        <a href="kursus-delete.php?id_course=<?php echo $kursus['id_course']; ?>"><button class="btn-primary" onclick="return confirm('Are You Sure ?');">Hapus</button></a>
                    </td>
                    </tr>
                    <?php endforeach?>
                    </tbody>
            </table>

            <table class="table-ch">
                    <tfoot>
                        <td><a href="kursus-tambah.php"><button class="btn-secondary">Tambah</button></a></td>
                    </tfoot>
            </table>
            
            </div>
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
