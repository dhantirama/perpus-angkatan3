<?php
include '../koneksi.php';

if (isset($_GET['kode_buku'])) {
    $kode_buku = $_GET['kode_buku'];

    // query untuk menambahkan data peminjam
    $query = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE kode_buku='$kode_buku'");

    $data = mysqli_fetch_assoc($query);
    $id_peminjaman = $data['id'];
    // query untuk mendapatkan data detail peminjam
    $queryDetail = mysqli_query($koneksi, "SELECT * FROM detail_peminjaman LEFT JOIN books ON books.id = detail_peminjaman.id_buku WHERE id_peminjaman= '$id_peminjaman'");

    $dataDetail = [];
    while ($rowDetail = mysqli_fetch_assoc($queryDetail)) {
        $dataDetail[] = $rowDetail;
    }

    $response = ['data' => $data, 'messsage' => 'Fetch success', 'detail_peminjaman' => $dataDetail];
    echo json_encode($response); //"data:"isi data"
}
