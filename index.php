<?php
session_start();
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <!-- Start Header/Navigation -->
        <?php
        include 'inc/header.php';
        ?>
        <!-- End Header/Navigation -->

        <div class="content">
            <?php
            if (isset($_GET['pg'])) {
                if (file_exists('content/' . $_GET['pg'] . '.php')) {

                    include 'content/' . $_GET['pg'] . '.php';
                }
            } else {
                include 'content/dashboard.php';
            }
            ?>
        </div>


    </div>

    <!-- Start Footer -->
    <?php
    include 'inc/footer.php';
    ?>
    <!-- End Footer -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>