<?php
if (isset($_POST['tambah'])) {
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $pengarang = $_POST['pengarang'];
    $id_kategori = $_POST['id_kategori'];


    // sql = structur query languages / DML = data manipulation language
    // select, insert. update, dan delete
    $insert = mysqli_query($koneksi, "INSERT INTO books (nama_buku, penerbit, tahun, pengarang, id_kategori) VALUES ('$nama_buku', '$penerbit', '$tahun', '$pengarang', '$id_kategori')");
    header("location:?pg=book&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editBook = mysqli_query($koneksi, "SELECT * FROM books WHERE id= '$id'");

$rowBook = mysqli_fetch_assoc($editBook);

if (isset($_POST['edit'])) {
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $pengarang = $_POST['pengarang'];
    $id_kategori = $_POST['id_kategori'];

    //ubah user kolom apa yang mau diubah (SET), yang mau diubah di id berapa
    $update = mysqli_query($koneksi, "UPDATE books SET nama_buku='$nama_buku', penerbit='$penerbit', tahun='$tahun', pengarang= '$pengarang', id_kategori='$id_kategori' WHERE id= '$id'");
    header("location: ?pg=book&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM books WHERE id='$id'");
    header("location: ?pg=book&hapus=berhasil");
}

$queryKat = mysqli_query($koneksi, "SELECT * FROM kategori");

?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row">
            <div col-sm-12>
                <fieldset class="border border-2 p-3" style="border-width: 2px; border-color: black; border-style: solid;">
                    <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="id_kategori" id="" class="form-control">
                                <!-- isi data diambil dari database kategori -->
                                <?php while ($rowKat = mysqli_fetch_assoc($queryKat)): ?>
                                    <option <?php echo isset($_GET['edit']) ? ($rowKat['id'] == $rowBook['id_kategori'] ? 'selected' : '') : '' ?> value="<?php echo $rowKat['id'] ?>"><?php echo $rowKat['nama_kategori'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" name="nama_buku" placeholder="Masukkan Judul Buku" value="<?php echo isset($_GET['edit']) ? $rowBook['nama_buku'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit" value="<?php echo isset($_GET['edit']) ? $rowBook['penerbit'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="text" class="form-control" name="tahun" placeholder="Masukkan Tahun" value="<?php echo isset($_GET['edit']) ? $rowBook['tahun'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Pengarang" value="<?php echo isset($_GET['edit']) ? $rowBook['pengarang'] : '' ?>">
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