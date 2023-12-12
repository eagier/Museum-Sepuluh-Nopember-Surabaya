<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styled.css" />
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img style="width: 80px; height: auto;"
                    src="/Code Museum Tugu/assets/img/Logo Museum Sepuluh Nopember.png" alt="..." /></a></div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Event</a>
                <a href="upload.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Tambah Event</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Lainnya</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard Event</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

<style>
    .photo-catalog {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .photo-box {
        width: calc(25% - 20px);
        margin: 0;
        padding: 20px;
        overflow: hidden;
        text-align: center;
        border: 1px solid #000;
        border-radius: 5px;
    }

    .photo-box img {
        width: 100%;
        height: auto;
    }
</style>

<?php
    include 'config.php';

    $data = mysqli_query($conn, "select * from event");
    $nomor = 0;
?>

<div class="photo-catalog">
    <?php
    while ($d = mysqli_fetch_array($data)) :
    ?>
        <div class="photo-box">
            <img src="event_img/<?php echo $d['Foto']; ?>" alt="">
            <p><?php echo $d['Judul_Event']; ?></p>
            <!-- <?php echo $d['Deskripsi']; ?> -->
            <a href="delete.php?Id=<?php echo $d['Id_Event']; ?>" class="btn btn-danger btn-sm">Hapus Event</a>
        </div>
    <?php
    $nomor++;
    if ($nomor % 4 == 0) {
        echo '</div><div class="photo-catalog">';
    }
    endwhile;
    ?>
</div>


    
    <!-- /#page-content-wrapper -->
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>