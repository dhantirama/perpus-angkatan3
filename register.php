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
                <img src="logo.png" alt="gambar" width="150" height="150">
            </div>
            <div class="col-6 mt-5 text-center ">
                <h1>Selamat Datang Di PPKD Jakarta Pusat</h1>
                <p>Saya mencoba Bootstrap</p>
            </div>
            <div class="col-3 mt-3 justify-content-center">
                <img src="logo.png" alt="gambar" width="150" height="150">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Projects
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        <a class="nav-link active" href="contact.php">Contact Us</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- START RUNNING TEXT -->
        <marquee behavior="" direction="">Angkatan 3 Sedang Membuat Project Web</marquee>
        <!-- END RUNNING TEXT -->

        <!-- START LOGIN  -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-3" style="background-image: url('4.jpg'); background-size: cover; background-position: center; height: auto;">>
                <div class="card" style="opacity: 95%;">
                    <div class="card-header">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body text-start">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Enter username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Confirm Password">
                            </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="contact.php">Sudah Punya Akun?</a>
                    </div>
                    </form>
                </div>
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
    <!-- END LOGIN -->


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>