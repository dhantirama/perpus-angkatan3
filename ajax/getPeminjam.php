<?php
include '../koneksi.php';

if (isset($_GET['kode_buku'])) {
    $kode_buku = $_GET['kode_buku'];

    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE kode_buku='$kode_buku'");
    $data = mysqli_fetch_assoc($query);
    $response = ['data' => $data, 'messsage' => 'Fetch success'];
    echo json_encode($response); //"data:"isi data"
}
