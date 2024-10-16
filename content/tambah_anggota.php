<?php
if (isset($_POST['tambah'])) {
    $nama_anggota = $_POST['nama_anggota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];


    // sql = structur query languages / DML = data manipulation language
    // select, insert. update, dan delete
    $insert = mysqli_query($koneksi, "INSERT INTO anggota (nama_anggota, telepon, email, alamat) VALUES ('$nama_anggota', '$telepon', '$email', '$alamat')");
    header("location:?pg=anggota&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id= '$id'");

$rowEdit = mysqli_fetch_assoc($editUser);

if (isset($_POST['edit'])) {
    $nama_anggota = $_POST['nama_anggota'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    //ubah user kolom apa yang mau diubah (SET), yang mau diubah di id berapa
    $update = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$nama_anggota', email='$email', alamat= '$alamat', telepon= '$telepon' WHERE id= '$id'");
    header("location: ?pg=anggota&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'");
    header("location: ?pg=anggota&hapus=berhasil");
}
?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row">
            <div col-sm-12>
                <fieldset class="border border-2 p-3" style="border-width: 2px; border-color: black; border-style: solid;">
                    <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Anggota</legend>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_anggota" placeholder="Masukkan Nama Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_anggota'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="telepon" placeholder="Masukkan Telepon Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['alamat'] : '' ?>">
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