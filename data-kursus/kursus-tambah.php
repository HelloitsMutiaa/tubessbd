<?php 
    error_reporting(0);
    include "../includes/connect.php";
    include "kategori-list.php";
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
    <section class="home">
        <form method="POST" enctype="multipart/form-data">
        <h1><span>Tambah Kursus</span></h1>
        <fieldset class="box">
         <div class="form">
             <input type="text" name="kode" required>
             <label for="">Kode</label>
         </div>  
         <div class="form">
             <input type="text" name="judul" required>
             <label for="">Judul</label>
         </div>  
         <div class="form">
             <input type="link" name="link" required>
             <label for="">Link Video</label>
         </div> 
         <div class="form">
             <label for="file"><a class="btn-upload" rel="nofollow">Cover</a></label>
             <input type="file" id="file" name="cover">
         </div> 
         <div class="form">
             <select id="kategori" class="custom-select" name="kategori">
             <?php foreach($data_kategori as $k) :?>
             <option value = "<?php echo $k['id_kategori'] ?>"><?php echo $k['kategori_nama'] ?></option>
             <?php endforeach?>
             </select> 
            <label for="kategori">Kategori</label>
         </div>  
         <br/>
         <div class="add2">
             <a href="#"><button class="btn-secondary" name="submit">Submit</button></a> 
         </div>
         </fieldset> 
             </form>
    </section>

    <?php
     if (isset($_POST["submit"]))
        {
            $kode  = $_POST['kode'];
            $judul = $_POST['judul'];
            $link = $_POST['link'];
            $kategori = $_POST['kategori'];

            //menyimpan cover kursus
            $file        = $_FILES['cover']['tmp_name'];
            $nama_file   = $_FILES['cover']['name'];
            $destination = "cover/" . $nama_file;

            $cek = mysqli_num_rows(mysqli_query($dtb, "SELECT * FROM course WHERE course_title = '$judul'"));
            if($cek>0){
                echo "<script>window.alert('Course Sudah Terdaftar')
                      window.location='kursus.php'</script>";
            } else {
                $query = "INSERT INTO course (code_course, course_title, vid_course, course_cover, id_kategori)
                          VALUES('$kode', '$judul', '$link', '$nama_file', $kategori)";
                $hasil = mysqli_query($dtb, $query);
                if($hasil == true)
                {
                    move_uploaded_file($file, $destination);
                    echo "<script>window.alert('Data Berhasil di Tambah')
                          window.location='kursus.php'</script>";
                }else{
                    echo "koneksi gagal" .mysqli_error($dtb);
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

</body>
</html>
