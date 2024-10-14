<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <!-- Start Header/Navigation -->
  <?php
  include 'header.php';
  ?>
  <!-- End Header/Navigation -->
  <div class="wrapper">
    <div class="container mt-5">
      <div class="row">
        <fieldset class="border rounded-2 p-2 ">
          <legend class="float-none w-auto">Tabel Anggota</legend>
          <div class="col-sm-12">
            <a href="index.php" class="btn btn-success" style="margin:17px;"><i class="fa-solid fa-square-plus"></i> ADD</a>
            <a href="index.php" class="btn btn-success" style="margin:17px;"><i class="fa-solid fa-recycle"></i> RECYCLE</a>
            <table class="table table-bordered text-center" style="margin-top:15px;margin-left:17px; width:96%; background: #E6E6FA;">
              <th>No <i class="fa-solid fa-sort"></i></th>
              <th>Kategori Buku <i class="fa-solid fa-sort"></i></th>
              <th>Lokasi Rak <i class="fa-solid fa-sort"></i></th>
              <th>Judul <i class="fa-solid fa-sort"></i></th>
              <th>Pengarang <i class="fa-solid fa-sort"></i></th>
              <th>Penerbit <i class="fa-solid fa-sort"></i></th>
              <th>Tahun Terbit <i class="fa-solid fa-sort"></i></th>
              <th>Keterangan <i class="fa-solid fa-sort"></i></th>
              <th>Stok <i class="fa-solid fa-sort"></i></th>
              <th>Setting <i class="fa-solid fa-sort"></i></th>
              <tr>
                <td>1 </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>| <span class="fa-solid fa-pencil"></span></a> | | <a href="hapus_kat.php" onclick="return confirm('Yakin Ingin Menghapus Data ?')"><span class="fa-regular fa-trash-can"></span> |</a></td>
              </tr>
            </table>
          </div>
        </fieldset>
      </div>
    </div>
  </div>

  <!-- Start Footer -->
  <?php
  include 'footer.php';
  ?>
  <!-- End Footer -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>