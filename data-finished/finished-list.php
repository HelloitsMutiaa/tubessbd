<?php 
    error_reporting(0);
?>
<?php
    include "../includes/connect.php";
    $id_ongoing = $_GET['id_ongoing'];
    $tgl_selesai = date('Y-m-d');

    $query = "SELECT childs.child_name, course.course_title, ongoing.id_ongoing
             FROM ongoing
             LEFT JOIN childs ON ongoing.id_child=childs.id_child
             LEFT JOIN course ON ongoing.id_course=course.id_course
             WHERE ongoing.id_ongoing = $id_ongoing";
    $hasil = mysqli_query($dtb, $query);
    $ongo = mysqli_fetch_assoc($hasil);
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
                    <li class="nav-link active">
                        <a href="ongoing.php">
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
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Log Out</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
    <section class="home">
    <form action="" method="POST">
    <h1><span>Finished</span></h1>
        <fieldset class="box">
            <input type="hidden" name="id" value="<?php echo $ongo['id_ongoing']?>">
         <div class="form">
			 <input type="text" name="anak" value="<?php echo $ongo['child_name']?>">
            <label for="anak">Nama Anak</label>
         </div>  
         <div class="form">
			 <input type="text" name="judul" value="<?php echo $ongo['course_title']?>">
            <label for="judul">Judul</label> 
         </div>  
         <div class="form">
             <input type="text" id="date" name="date" class="tgl" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'" value="<?php echo $ongo['tgl_mulai']?>" required>
             <label for="date">Tanggal Mulai</label>
         </div> 
         <div class="form">
             <input type="text" id="date" name="selesai" class="tgl" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'" value="<?php echo $tgl_selesai?>" required>
             <label for="date">Tanggal Selesai</label>
         </div> 
         <br/>
         <div class="add2">
             <a href="#"><button class="btn-secondary" name="submit">Submit</button></a> 
         </div>
         </fieldset> 
    </form>
    </section>


         <?php 
            include "../includes/connect.php";

            if(isset($_POST["submit"]))
            {
                $id = $_POST['id'];
                $selesai = $_POST['selesai'];
                $poin = 40;

                $query2 = "INSERT INTO selesai (id_ongoing, tgl_selesai, poin)
                VALUES ($id, '$selesai', $poin)";

                $hasil2 = mysqli_query($dtb, $query2);
                if($hasil2 == true)
                {
                    header('location:../data-ongoing/ongoing.php');
                } else {
                    header('location:finished-list.php');
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

</body>
</html>
