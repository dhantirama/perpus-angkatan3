<?php
if (isset($_POST['simpan'])) {
    $kode_buku = $_POST['kode_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $id_buku = $_POST['id_buku'];


    // sql = structur query languages / DML = data manipulation language
    // select, insert. update, dan delete
    $insert = mysqli_query($koneksi, "INSERT INTO peminjaman (kode_buku, id_anggota, tgl_pinjam, tgl_kembali) VALUES ('$kode_buku', '$id_anggota', '$tgl_pinjam', '$tgl_kembali')");
    $id_peminjaman = mysqli_insert_id($koneksi);

    foreach ($id_buku as $key => $buku) {
        $buku = $_POST['id_buku'][$key];

        $insertDetail = mysqli_query($koneksi, "INSERT INTO detail_peminjaman (id_peminjaman, id_buku) VALUES ('$id_peminjaman','$buku')");
    }
    header("location:?pg=pinjam&tambah=berhasil");
}

$id = isset($_GET['detail']) ? $_GET['detail'] : '';
$detailAnggota = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM  peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE peminjaman.id= '$id'");

$rowDetail = mysqli_fetch_assoc($detailAnggota);
$queryDetailPinjam = mysqli_query($koneksi, "SELECT books.nama_buku, detail_peminjaman.* FROM detail_peminjaman LEFT JOIN books ON books.id = detail_peminjaman.id_buku WHERE id_peminjaman = '$id'");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id='$id'");
    header("location: ?pg=pinjamk&hapus=berhasil");
}

$queryBook = mysqli_query($koneksi, "SELECT * FROM books");
$queryAnggota = mysqli_query($koneksi, "SELECT * FROM anggota");


// untuk membuat koding no peminjaman
$queryKodePm =  mysqli_query($koneksi, "SELECT MAX(id) AS id_pinjam FROM peminjaman");
$rowPinjam = mysqli_fetch_assoc($queryKodePm);
$id_pinjam = $rowPinjam['id_pinjam'];
$id_pinjam++;
$kode_pinjam = "PJM/" . date('dmy') . "/" . sprintf("%03s", $id_pinjam);   // %03s digunakan untuk nilai angka didepan

?>
<!-- readonly artinya tidak bisa diinput hanya bisa d baca -->
<div class="container mt-4 mb-3">
    <fieldset class="border rounded-1 p-5 border border border-4 border border-dark">
        <div class="d-flex justify-content-start mb-3">
        </div>

        <legend class="float-none w-auto px-3"><?php echo isset($_GET['detail']) ? 'Detail' : 'Tambah' ?> Buku</legend>
        <form action="" method="post">
            <div class="mb-3 row">
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="">No Peminjaman</label>
                        <input type="text" id="kode_pinjam" class="form-control" name="kode_buku" value="<?php echo isset($_GET['detail']) ? $rowDetail['kode_buku'] : $kode_pinjam ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Peminjaman</label>
                        <input required type="date" class="form-control" name="tgl_pinjam" value="<?php echo isset($_GET['detail']) ? $rowDetail['tgl_pinjam'] : '' ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <?php if (!isset($_GET['detail'])): ?>
                            <label for="" class="form-label">Nama Buku</label>
                            <select required name="" id="id_buku" class="form-control">
                                <option value="">Pilih Buku</option>
                                <?php while ($rowBook = mysqli_fetch_assoc($queryBook)): ?>
                                    <option value="<?php echo $rowBook['id'] ?>"> <?php echo $rowBook['nama_buku']; ?>
                                    </option>
                                <?php endwhile ?>
                            </select>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Anggota</label>
                        <?php if (!isset($_GET['detail'])): ?>
                            <select required name="id_anggota" id="" class="form-control">
                                <option value="">Pilih Anggota</option>
                                <!-- ini ngambil data dari tabel anggota -->
                                <?php while ($rowAnggota = mysqli_fetch_assoc($queryAnggota)): ?>
                                    <option value="<?php echo $rowAnggota['id'] ?>"> <?php echo $rowAnggota['nama_anggota']; ?>
                                    </option>
                                <?php endwhile ?>
                            </select>
                        <?php else: ?>
                            <input type="text" class="form-control" value="<?php echo $rowDetail['nama_anggota'] ?>" readonly>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Kembali</label>
                        <input required type="date" class="form-control" name="tgl_kembali" value="<?php echo isset($_GET['detail']) ? $rowDetail['tgl_kembali'] : '' ?>" readonly>
                    </div>
                </div>
            </div>
            <?php if (empty($_GET['detail'])): ?>
                <div align="right" class="mb-3">
                    <button type="button" id="add-row" class="btn btn-primary">Tambah Data</button>
                </div>
            <?php endif ?>
            <!-- tabel data dari php -->

            <?php if (isset($_GET['detail'])): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php while ($rowDetailPeminjaman = mysqli_fetch_assoc($queryDetailPinjam)): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $rowDetailPeminjaman['nama_buku'] ?></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            <?php else: ?>
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
                <div class="mt-3">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
            <?php endif ?>
            <!-- ini tabel dari js -->
        </form>
    </fieldset>
</div>