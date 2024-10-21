<?php
if (isset($_POST['simpan'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $queryPeminjam = mysqli_query($koneksi, "SELECT id, kode_buku FROM peminjaman WHERE kode_buku='$id_peminjaman'");
    $rowPeminjam = mysqli_fetch_assoc($queryPeminjam);
    $id_peminjaman = $rowPeminjam['id'];
    $denda = $_POST['denda'];
    if ($denda == 0) {
        $status = 0;
    } else {
        $status = 1;
    }


    // sql = structur query languages / DML = data manipulation language
    // select, insert. update, dan delete
    $insert = mysqli_query($koneksi, "INSERT INTO pengembalian (id_peminjaman, status, denda) VALUES ('$id_peminjaman', '$status', '$denda')");

    $updatePeminjam = mysqli_query($koneksi, "UPDATE peminjaman SET status = 'Di Kembalikan' WHERE id='$id_peminjaman'");

    header("location:?pg=kembali&tambah=berhasil");
}

$id = isset($_GET['detail']) ? $_GET['detail'] : '';
$detailAnggota = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM  peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE peminjaman.id= '$id'");

$rowDetail = mysqli_fetch_assoc($detailAnggota);
$queryDetailPinjam = mysqli_query($koneksi, "SELECT books.nama_buku, detail_peminjaman.* FROM detail_peminjaman LEFT JOIN books ON books.id = detail_peminjaman.id_buku WHERE id_peminjaman = '$id'");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "UPDATE peminjaman SET deleted_at = 1  WHERE id='$id'");
    header("location: ?pg=kembali&hapus=berhasil");
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
                                    <div class="mb-3">
                                        <label for="" class="form-label">Denda</label>
                                        <input type="text" readonly id="denda" name="denda" class="form-control">
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

            <!-- ini tabel dari js -->
            <table class="table table-bordered" id="table-pengembalian">
                <thead>
                    <tr>
                        <th>Nama Buku</th>
                    </tr>
                </thead>
                <tbody class="table-row">
                </tbody>
            </table>
            <div class="mt-3">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </fieldset>
</div>