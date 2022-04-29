<?php
    error_reporting();
    include "user-list.php";
    
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
                        <a href="user-us.php">
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
        <h1><span>Data User</span></h1> 
            <fieldset class="boks">
                <h2 class="tape"><span>Profile</span></h2>
                <table class="table-us">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                    </tr><br>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:</td>
                    </tr>
                    <tfoot>
                        <td><a href="#"><button class="btn-secondary">Edit</button></a></td>
                    </tfoot>
                </table>

            </fieldset><br/><br/><br/>
            <fieldset class="boks">
                <h2 class="tape"><span>Ubah Password</span></h2>
                <table class="table-us">
                    <tr>
                    <td><div class="form">
                    <input type="password" required>
                    <label for="">Password Lama</label>
                    </div>
                    <div class="form">
                    <input type="password" required>
                    <label for="">Password Baru</label>
                    </div>  </td></tr>
                    <tfoot>
                        <td><a href="#"><button class="btn-secondary">Edit</button></a></td>
                    </tfoot>
                </table>

            </fieldset>
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
