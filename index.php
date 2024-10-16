<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['nama']) && isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit;
}

?>
<!-- session_regenerate digunakan agar saat session kosong, maka melempar ke login. Jika session terisi, maka akan melempar ke dashboard.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>

<body>
    <div class="container text-center">
        <!-- container -> row -> col -->
        <div class="row">
            <div class="col-3 mt-3 justify-content-center">
                <img src="img/logo.png" alt="gambar" width="150" height="150">
            </div>
            <div class="col-6 mt-5 text-center ">
                <h1>Selamat Datang Di PPKD Jakarta Pusat</h1>
                <p>Saya mencoba Bootstrap</p>
            </div>
            <div class="col-3 mt-3 justify-content-center">
                <img src="img/logo.png" alt="gambar" width="150" height="150">
            </div>
        </div>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="background-color: #bee1fa; -webkit-border-radius: 19px; -moz-border-radius: 19px; border-radius: 19px;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navAltMarkup"
                    aria-controls="navAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">

                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                        <a class="nav-link active " href="">About Me</a>
                        <a class="nav-link dropdown-toggle" href="contact.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Projects
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        <a class="nav-link active" href="login.php">Contact Us</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->



        <!-- START RUNNING TEXT -->
        <marquee behavior="" direction="">Angkatan 3 Sedang Membuat Project Web</marquee>
        <!-- END RUNNING TEXT -->
        <!-- START HEADER -->
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" style="height: 650px;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="img/1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Langkah Pertama</h5>
                                <p>Login Dulu.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="img/4.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Langkah Kedua</h5>
                                <p>Silahkan Regis Jika Belum Punya Akun.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/6.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Langkah Ketiga</h5>
                                <p>Anda Akan Langsung Menjadi Member.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Move the paragraph here for alignment -->
            <div class="col-md-6">
                <h2>Selamat Kamu Menjadi Member!!</h2>
                <p>Sebagai bentuk penghargaan kami kepada konsumen, kami memberikan fasilitas Keanggotaan agar pengalaman berbelanja anda semakin berkesan berbagai manfaat dan kebaikan yang kami berikan. Banyak keuntungan yang bisa didapatkan dengan menjadi memberseperti bonus poin, informasi promo-promo terbaru, potongan harga, undian berhadiah, dan masih banyak lainnya</p>
                <h4 class="fst-italic">Keuntungan Menjadi Member</h4>
                <ul>
                    <li>Bonous Point</li>
                    <li>Diskon Membership</li>
                    <li>Kejutan Ulang Tahun</li>
                    <li>Promo</li>
                    <li>Diskon Merchant</li>
                </ul>
            </div>
        </div>
        <!-- START FOOTER -->
        <footer>
            <div class="row" style="background-color: #bee1fa; -webkit-border-radius: 19px; -moz-border-radius: 19px; border-radius: 19px;">
                <div class="col-md-6 ps-4 pt-3 d-flex justify-content-between">
                    <p>Copyright &copy 2024 PPKD - Jakarta Pusat</p>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <p class="text-center pt-3 pe-6">Privacy Policy</p>
            </div>
        </footer>
        <!-- END FOOTER -->
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </script>
</body>

</html>