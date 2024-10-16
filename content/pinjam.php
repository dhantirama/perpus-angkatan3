<?php
$peminjaman = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota ORDER BY id DESC");

?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row">
            <div col-sm-12>
                <fieldset class="border border-2 p-3" style="border-width: 2px; border-color: black; border-style: solid;">
                    <legend class="float-none w-auto px-3">Data Peminjaman</legend>
                    <div align="right">
                        <a href="?pg=tambah_pinjam" class="btn btn-success"><i class="fa-solid fa-square-plus"></i> ADD</a>
                        <a href="index.php" class="btn btn-success"><i class="fa-solid fa-recycle"></i> RECYCLE</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped table-hovered" style="margin-top:15px;margin-left:17px; width:96%; background: #E6E6FA;">
                            <thead>
                                <tr>
                                    <th>No <i class="fa-solid fa-sort ms-6"></i></th>
                                    <th>Nama Anggota <i class="fa-solid fa-sort ms-6"></i></th>
                                    <th>Kode Buku<i class="fa-solid fa-sort"></i></i></th>
                                    <th>Tanggal Peminjaman<i class="fa-solid fa-sort"></i></th>
                                    <th>Tanggal Kembali<i class="fa-solid fa-sort"></i></th>
                                    <th>Status <i class="fa-solid fa-sort"></i></th>
                                    <th>Aksi<i class="fa-solid fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($rowQuery = mysqli_fetch_assoc($peminjaman)): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rowQuery['nama_anggota'] ?></td>
                                        <td><?php echo $rowQuery['kode_buku'] ?></td>
                                        <td><?php echo $rowQuery['tgl_pinjam'] ?></td>
                                        <td><?php echo $rowQuery['tgl_kembali'] ?></td>
                                        <td><?php echo $rowQuery['status'] ?></td>
                                        <td>| <a href="?pg=tambah_pinjam&edit=<?php echo $rowQuery['id'] ?>"><span class="fa-solid fa-pencil"></span></a> | | <a href="?pg=tambah_pinjam&delete=<?php echo $rowQuery['id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')"><span class="fa-regular fa-trash-can"></span> |</a></td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>