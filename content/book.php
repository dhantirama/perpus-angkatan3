<?php
$buku = mysqli_query($koneksi, "SELECT kategori.nama_kategori, books.* FROM books LEFT JOIN kategori ON kategori.id = books.id_kategori ORDER BY id DESC");

?>
<div class="wrapper">
    <div class="container mt-5">
        <div class="row">
            <div col-sm-12>
                <fieldset class="border border-2 p-3" style="border-width: 2px; border-color: black; border-style: solid;">
                    <legend class="float-none w-auto px-3">Data Buku</legend>
                    <div align="right">
                        <a href="?pg=tambah_buku" class="btn btn-success"><i class="fa-solid fa-square-plus"></i> ADD</a>
                        <a href="index.php" class="btn btn-success"><i class="fa-solid fa-recycle"></i> RECYCLE</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped table-hovered" style="margin-top:15px;margin-left:17px; width:96%; background: #E6E6FA;">
                            <thead>
                                <tr>
                                    <th>No <i class="fa-solid fa-sort ms-6"></i></th>
                                    <th>Kategori <i class="fa-solid fa-sort ms-6"></i></th>
                                    <th>Nama Buku<i class="fa-solid fa-sort"></i></i></th>
                                    <th>Penerbit <i class="fa-solid fa-sort"></i></th>
                                    <th>Tahun <i class="fa-solid fa-sort"></i></th>
                                    <th>pengarang <i class="fa-solid fa-sort"></i></th>
                                    <th>Aksi<i class="fa-solid fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($rowBook = mysqli_fetch_assoc($buku)): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rowBook['nama_kategori'] ?></td>
                                        <td><?php echo $rowBook['nama_buku'] ?></td>
                                        <td><?php echo $rowBook['penerbit'] ?></td>
                                        <td><?php echo $rowBook['tahun'] ?></td>
                                        <td><?php echo $rowBook['pengarang'] ?></td>
                                        <td>| <a href="?pg=tambah_buku&edit=<?php echo $rowBook['id'] ?>"><span class="fa-solid fa-pencil"></span></a> | | <a href="?pg=tambah_buku&delete=<?php echo $rowBook['id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini??')"><span class="fa-regular fa-trash-can"></span> |</a></td>
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