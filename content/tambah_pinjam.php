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

$queryBook = mysqli_query($koneksi, "SELECT * FROM books");
$queryAnggota = mysqli_query($koneksi, "SELECT * FROM anggota");

?>
<!-- readonly artinya tidak bisa diinput hanya bisa d baca -->
<div class="container mt-4 mb-3">
    <fieldset class="border rounded-1 p-5 border border border-4 border border-dark">
        <div class="d-flex justify-content-start mb-3">
        </div>

        <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>
        <form action="" method="post">
            <div class="mb-3 row">
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="">No Peminjaman</label>
                        <input type="text" class="form-control" name="no_peminjaman" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tgl_peminjaman" value="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Buku</label>
                        <select name="" id="id_buku" class="form-control">
                            <option value="">Pilih Buku</option>
                            <?php while ($rowBook = mysqli_fetch_assoc($queryBook)): ?>
                                <option value="<?php echo $rowBook['id'] ?>"> <?php echo $rowBook['nama_buku']; ?>
                                </option>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Anggota</label>
                        <select name="id_anggota" id="" class="form-control">
                            <option value="">Pilih Anggota</option>
                            <!-- ini ngambil data dari tabel anggota -->
                            <?php while ($rowAnggota = mysqli_fetch_assoc($queryAnggota)): ?>
                                <option value="<?php echo $rowAnggota['id'] ?>"> <?php echo $rowAnggota['nama_anggota']; ?>
                                </option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tgl_peminjaman" value="">
                    </div>
                </div>
            </div>
            <div align="right" class="mb-3">
                <button type="button" id="add-row" class="btn btn-primary">Tambah Data</button>
            </div>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Nama Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-row">
                </tbody>
            </table>
        </form>
    </fieldset>
</div>