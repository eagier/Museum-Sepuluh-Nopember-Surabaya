<?php

include 'config.php';





if (isset($_POST['upload'])) {

    $nama =  mysqli_real_escape_string($conn, $_POST['judul']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'event_img/' . $image;

    $insert = mysqli_query($conn, "INSERT INTO event (Foto, Judul_Event, Deskripsi) VALUES('$image','$nama','$desc')") or die('query failed');
    if ($insert) {
        move_uploaded_file($image_tmp_name, $image_folder);
        $message[] = 'registered successfully!';
    } else {
        $message[] = 'registeration failed!';
    }
    header("Location: admin1.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="upload.css">
<link rel="stylesheet" href="css2/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b7848006b2.js" crossorigin="anonymous"></script>
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<style>
        .section-heading {
            text-align: center; /* This centers the text within the div */
        }
    </style>
    <div class="conten">
        <div class="nav100">
        <a href="admin1.php" class="back-btn"><i class='bx bx-arrow-back'></i> Kembali</a>
            <div class="section-heading text-uppercase"><h1>Event</h1></div>
            <div class="upform">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" id="file" accept="image/jpg, image/jpeg, image/png" hidden name="image">
                    <div class="img-area" data-img="">
                        <i class='bx bxs-cloud-upload icon'></i>
                        <p>ukuran gambar harus kurang dari <span>2MB</span></p>
                    </div>
                    <div class="select-image">Pilih Gambar</div>
                    <script src="script.js"></script>
                    <div class="formflex ">
                        <div class="">

                            <input class="upinput" name="judul" type="text" required placeholder="Judul Event"><br>
                        </div>
        
                    </div>
                    <div class="">
                        <input class="upinput4" name="desc" type="text" required placeholder="Deskripsi">
                    </div>
                    <input class="subbtn" type="submit" value="Tambah Event" name="upload">
                </form>
            </div>
        </div>
    </div>
</body>

</html>