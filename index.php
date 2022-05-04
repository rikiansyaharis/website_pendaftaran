<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

include 'navbar.php';
include 'config/koneksi.php';

$pendaftaran = query("SELECT * FROM pendaftaran");

if (isset($_POST["search"])) {
  $pendaftaran = search($_POST["keyword"]);
}
?>

<div class="container">
  <!-- content -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-5">
      <li class="breadcrumb-item active" aria-current="page">
        <h4 class="" style="color: black;">Selamat Datang Calon Peserta Digital talent</h4>
      </li>

      <!-- Topbar Search -->
      <form action="" method="post" class="d-none d-sm-inline-block form-inline navbar-search ml-auto search-cari">
        <div class="input-group search">
          <input type="text" name="keyword" id="keyword" class="form-control bg-light border-0 small search" placeholder="Search...." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
          <div class="input-group-append">
            <!-- <button class="btn btn-primary search" type="submit" name="search" id="tombol-search">
              <i class="fas fa-search fa-sm search"></i>
            </button> -->
          </div>
        </div>
      </form>
    </ol>
  </nav>

  <a href="tambah.php">
    <button class="btn btn-primary tambah">
      <i class="fas fa-plus"></i>
      tambah data
    </button>
  </a>

  <!-- <a href="tambah.php">
    <button class="btn btn-warning ml-2 cetak-laporan">
      <i class="fas fa-file-pdf"></i>
      Cetak Laporan
    </button>
  </a> -->
  <div id="container">
    <table class="table table-striped table-bordered mt-2" id="example">

      <thead class="text-center">
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Asal Sekolah</th>
          <th>Tahun Lulus</th>
          <th class="opsi">Opsi</th>
        </tr>
      </thead>

      <tbody>

        <?php $i = 1; ?>
        <?php foreach ($pendaftaran as $row) : ?>
          <tr>
            <td class="text-center"> <?= $i; ?> </td>
            <td> <?= $row["Nama"]; ?> </td>
            <td class="text-center"> <?= $row["Alamat"]; ?> </td>
            <td class="text-center"> <?= $row["jenisKelamin"]; ?> </td>
            <td class="text-center"> <?= $row["Agama"]; ?> </td>
            <td class="text-center"> <?= $row["asalSekolah"]; ?> </td>
            <td class="text-center"> <?= $row["tahunLulus"]; ?> </td>
            <td class="text-center opsi">
              <a href="update.php?id=<?= $row["id"]; ?>">
                <button class="btn btn-success btn-sm">
                  <i class="fas fa-user-edit"></i>
                </button>
              </a>
              <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah anda yakin?');">
                <button class="btn btn-danger btn-sm ">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </a>
              <a href="cetak.php?id=<?= $row["id"]; ?>">
                <button class="btn btn-warning btn-sm">
                  <i class="fas fa-print"></i>
                </button>
              </a>
            </td>
          <tr>
            <?php $i++; ?>
          <?php endforeach; ?>
      </tbody>

    </table>
  </div>




</div>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/responsive.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('example').DataTable();
  })
</script>
</script>
</body>

</html>