<?php
if (isset($_POST['tambah'])) {
    $nama_level = $_POST['nama_level'];



    // sql = structur query languages / DML = data manipulation language
    // select, insert. update, dan delete
    $insert = mysqli_query($koneksi, "INSERT INTO level (nama_level) VALUES ('$nama_level')");
    header("location:?pg=level&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editKat = mysqli_query($koneksi, "SELECT * FROM level WHERE id= '$id'");

$rowEdit = mysqli_fetch_assoc($editKat);

if (isset($_POST['edit'])) {
    $nama_level = $_POST['nama_level'];


    //ubah user kolom apa yang mau diubah (SET), yang mau diubah di id berapa
    $update = mysqli_query($koneksi, "UPDATE level SET nama_level='$nama_level' WHERE id= '$id'");
    header("location: ?pg=level&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM level WHERE id='$id'");
    header("location: ?pg=level&hapus=berhasil");
}
?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row">
            <div col-sm-12>
                <fieldset class="border border-2 p-3" style="border-width: 2px; border-color: black; border-style: solid;">
                    <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Level</legend>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Level</label>
                            <input type="text" class="form-control" name="nama_level" placeholder="Masukkan Level" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_level'] : '' ?>">
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