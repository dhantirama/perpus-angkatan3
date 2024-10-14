<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $password = sha1($_POST['password']);
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];


    // sql = structur query languages / DML = data manipulation language
    // select, insert. update, dan delete
    $insert = mysqli_query($koneksi, "INSERT INTO user (nama, password, telepon, email, jenis_kelamin) VALUES ('$nama', '$password', '$telepon', '$email', '$jenis_kelamin')");
    header("location:?pg=user&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id= '$id'");

$rowEdit = mysqli_fetch_assoc($editUser);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    if ($_POST['password']) {
        $password = sha1($_POST['password']);
    } else {
        $password = $rowEdit['password'];
    }

//cara untuk tidak mengubah password d database ada dua cara, dibawah ini cara kedua
    // $password = ($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    //ubah user kolom apa yang mau diubah (SET), yang mau diubah di id berapa
    $update = mysqli_query($koneksi, "UPDATE user SET nama='$nama', email='$email', password='$password', jenis_kelamin= '$jenis_kelamin', telepon= '$telepon' WHERE id= '$id'");
    header("location: ?pg=user&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
    header("location: ?pg=user&hapus=berhasil");
}
?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row">
            <div col-sm-12>
                <fieldset class="border border-2 p-3" style="border-width: 2px; border-color: black; border-style: solid;">
                    <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> User</legend>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="telepon" placeholder="Masukkan Telepon Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda">
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis Kelamin</label>
                            <br>
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == "Laki-laki") ? 'checked' : '' : '' ?>>Laki-laki
                            <br>
                            <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == "Perempuan") ? 'checked' : '' : '' ?>>Perempuan
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>">Simpan</button>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>

</div>