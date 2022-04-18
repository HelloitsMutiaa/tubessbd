<?php 
    error_reporting(0);
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
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Log Out</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
    <?php
    include "kategori-list.php";
    include "kursus-list.php";
    ?>
    <?php 
    include "../includes/connect.php";
    $id_course = $_GET['id_course'];
    $query = "SELECT course.*, kategori.id_kategori
              FROM course
              JOIN kategori ON course.id_kategori = kategori.id_kategori
              WHERE course.id_course = $id_course";
    $hasil = mysqli_query($dtb, $query);
    $data_kursus = mysqli_fetch_assoc($hasil);
    
    ?>
    <section class="home">
    <form method="POST" enctype="multipart/form-data">
        <h1><span>Edit Kursus</span></h1>
        <fieldset>
        <input type="hidden" name="id_kursus" value="<?php echo $id_course; ?>"> 
         <div class="form">
             <input type="text" required value="<?php echo $data_kursus['course_title']; ?>" name="judul">
             <label for="">Judul</label>
         </div>  
         <div class="form">
             <input type="link" required value="<?php echo $data_kursus['vid_course']; ?>" name="link">
             <label for="">Link Video</label>
         </div> 
         <div class="form">
             <label for="file"><a class="btn-upload" rel="nofollow">Cover</a></label>
             <input type="file" id="file" name="cover">
         </div> 
         <div class="form">
         <select id="kategori" class="custom-select" name="kategori">
             <?php foreach($data_kategori as $k): ?>
             <?php
                if ($data_kursus['id_kategori'] == $k['id_kategori']) {
                    $selected = "selected";
                } else {
                    $selected = null;
                }
             ?>
             <option value = "<?php echo $k['id_kategori']?>"<?php echo $selected?>><?php echo $k['kategori_nama']?></option>
             <?php endforeach?>
            </select> 
            <label for="kategori">Kategori</label>
         </div>  
         <br/>
         <div class="add2">
             <a href="#"><button class="btn-secondary" name="edit">Submit</button></a> 
         </div>
         </fieldset> 
    </form>
    </section>

    <?php 
    if(isset($_POST["edit"]))
    {
        $id_course = $_POST['id_kursus'];
        $judul = $_POST['judul'];
        $link = $_POST['link'];
        $kategori = $_POST['kategori'];

        $q = mysqli_query($dtb, "SELECT * FROM course WHERE id_course = $id_course");
        $h = mysqli_fetch_assoc($q);
        $cover_lama = $h['course_cover'];

        // ambil data file yang diupload (jika ada)
    if (!empty($_FILES['cover']['tmp_name'])) {
        $file        = $_FILES['cover']['tmp_name'];
        $nama_file   = $_FILES['cover']['name'];
        $destination = "cover/" . $nama_file;
    
        $cover_baru = $nama_file;
    } else {
        $cover_baru = $cover_lama;
    }

    $query2 = "UPDATE course
              SET 
              course_title = '$judul',
              vid_course = '$link',
              course_cover = '$cover_baru',
              id_kategori = $kategori
              WHERE id_course = $id_course";
    $hasil2 = mysqli_query($dtb, $query2);
    if ($hasil2 == true) {
    
        if (!empty($_FILES['cover']['tmp_name'])) {
    
            // hapus cover lama
            unlink("cover/" . $cover_lama);
    
            // jika upload cover baru, lakukan proses upload
            move_uploaded_file($file, $destination);
        }
    
        echo "<script>window.alert('Data Berhasil di Update')
        window.location='kursus.php'</script>";
    } else {
      echo "koneksi gagal" .mysqli_error($db);
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
