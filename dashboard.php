<?php
session_start();
session_regenerate_id(true);
if (empty($_SESSION['nama']) && empty($_SESSION['email'])) {
    header("Location: contact.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>

<body class="text-center mt-5">
    <nav class="navbar navbar-expand-lg shadow-sm sticky-top mb-5">
        <div class="container mt-3 justify-content-center border-bottom border-success">
            <a class="navbar-brand" href="index.php"><img src="img/2.png" width="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAltMarkup" aria-controls="navAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navAltMarkup">
                <ul class="custom-navbar-nav navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li>
                        <a class="nav-link" href="account.php">Manage Account</a>
                    </li>
                    <li>
                        <a class="nav-link" href="book.php">Manage Book</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>

    <!-- End Header/Navigation -->
    <div class="container position-absolute top-50 start-50 translate-middle">
        <h1>SELAMAT <?php echo $_SESSION['nama'] ?> SUDAH MENJADI MEMBER!!!!!!!!!!!!!!!!!!!</h1>
        <a href="controler/logout.php" class="btn btn-danger btn-sm">Log Out</a>
        <a href="controler/index.php" class="btn btn-primary btn-sm">Menuju Akun</a>
    </div>


    <!-- Start Footer -->
    <footer class="fixed-bottom text-center p-3" style="background-color: #bee1fa; -webkit-border-radius: 19px; -moz-border-radius: 19px; border-radius: 19px;">
        <p class="mb-0">Copyright &copy;<script>
                document.write(new Date().getFullYear());
            </script>. All Rights Reserved. &mdash; Distributed By <a href="index.php">Ramadhanti</a>
        </p>
    </footer>
    <!-- End Footer -->

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>