<?php
if (isset($_POST['simpan'])) {
    $kode_buku = $_POST['kode_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $id_buku = $_POST['id_buku'];
    $status = "Di Pinjam";


    // sql = structur query languages / DML = data manipulation language
    // select, insert. update, dan delete
    $insert = mysqli_query($koneksi, "INSERT INTO peminjaman (kode_buku, id_anggota, tgl_pinjam, tgl_kembali, status) VALUES ('$kode_buku', '$id_anggota', '$tgl_pinjam', '$tgl_kembali', '$status')");
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
    $delete = mysqli_query($koneksi, "UPDATE peminjaman SET deleted_at = 1  WHERE id='$id'");
    header("location: ?pg=pinjam&hapus=berhasil");
}

$queryBook = mysqli_query($koneksi, "SELECT * FROM books");
$queryAnggota = mysqli_query($koneksi, "SELECT * FROM anggota");


// untuk membuat koding no peminjaman
$queryKodePm =  mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status = 'Di Pinjam'");


?>
<!-- readonly artinya tidak bisa diinput hanya bisa d baca -->
<div class="container mt-4 mb-3">
    <fieldset class="border rounded-1 p-5 border border border-4 border border-dark">
        <div class="d-flex justify-content-start mb-3">
        </div>

        <legend class="float-none w-auto px-3"><?php echo isset($_GET['detail']) ? 'Detail' : 'Tambah' ?> Pengembalian</legend>
        <form action="" method="post">
            <div class="mb-3 row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="">No Peminjaman</label>
                        <select name="id_peminjaman" id="id_peminjaman" class="form-control">
                            <!-- <diambil dari tabel peminjaman -->
                            <option value="">--- No Peminjam ---</option>
                            <?php while ($rowPinjam = mysqli_fetch_assoc($queryKodePm)): ?>
                                <option value="<?php echo $rowPinjam['kode_buku'] ?>"><?php echo $rowPinjam['kode_buku'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Data Peminjam
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">No Peminjaman</label>
                                        <input type="text" readonly id="no_pinjam" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tanggal Peminjaman</label>
                                        <input type="text" readonly id="tgl_pinjam" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Anggota</label>
                                        <input type="text" readonly id="nama_anggota" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tanggal Pengembalian</label>
                                        <input type="text" readonly id="tgl_kembali" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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