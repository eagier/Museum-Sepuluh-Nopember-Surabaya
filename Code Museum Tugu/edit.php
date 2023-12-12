<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Museum Sepuluh Nopember</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/icon.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink shadow" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="admin.php"><img style="width: 100px; height: auto;"
                    src="assets/img/Logo Museum Sepuluh Nopember.png" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            </div>
        </div>
    </nav>

<?php   
		include 'config.php';
   
		$data = mysqli_query($conn,"select * from event");$nomor=0;
		while($d = mysqli_fetch_array($data)):
      $nomor++;
    
      
			?>
          <div class="col-md-3">
            
          <div class="row center">
          
            <div class="card mx-3 mb-3">
            <img src="event_img/<?php echo $d['Foto']; ?>" class="card-img-top" >
              <div class="card-body">
                <h5 class="card-title font-weight-bold"><?php echo $d['Judul_Event']; ?></h5>
               <label class="card-text"><?php echo $d['Deskripsi']; ?></label><br>
                <a href="delete.php?Id=<?php echo $d['Id_Event']; ?>" class="btn btn-danger btn-sm">HAPUS</a>

              </div>
            </div>

            
          </div>
          <?php endwhile;
		?>