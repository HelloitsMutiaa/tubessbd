<?php 
    error_reporting(0);
?>
<?php 
    require "../includes/connect.php";
    include "ongoing-list.php";
    include "../data-family/family-list.php";
    include "../data-kursus/kursus-list.php";
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
    <h1><span>Add Ongoing</span></h1>
        <fieldset class="box">
         <div class="form">
			 <select id="anak" class="custom-select" name="anak">
            <?php foreach($data_childs as $dc): ?>
             <option value = "<?php echo $dc['id_child']?>"><?php echo $dc['child_name']?></option>
            <?php endforeach ?>
            </select> 
            <label for="anak">Nama Anak</label>
         </div>  
         <div class="form">
			 <select id="judul" class="custom-select" name="judul">
            <?php foreach($data_kursus as $dk): ?>
             <option value = "<?php echo $dk['id_course']?>"><?php echo $dk['course_title']?></option>
            <?php endforeach ?>
            </select>
            <label for="judul">Judul</label> 
         </div>  
         <div class="form">
             <input type="text" id="date" name="date" class="tgl" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'" required>
             <label for="date">Tanggal Mulai</label>
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
                $anak = $_POST['anak'];
                $judul = $_POST['judul'];
                $tgl_mulai = date('Y-m-d', strtotime(date('Y-m-d')));

                $query = mysqli_query($dtb, "INSERT INTO ongoing (id_child, id_course, tgl_mulai)
                        VALUES ($anak, $judul, '$tgl_mulai')");
                if($query == true)
                {
                    echo "<script>window.alert('Data Berhasil di Tambah')
                            window.location='ongoing.php'</script>";
                } else {
                    echo "Koneksi gagal".mysqli_error($dtb);
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
