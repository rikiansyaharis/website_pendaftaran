<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include 'navbar.php';
include './config/koneksi.php';

$laporan = query("SELECT * FROM pendaftaran");

?>

<div class="container">
    <div class="">
        <h3 class=" text-center mt-5">Data Mahasiswa</h3>
    </div>
    <table class="table table-bordered table-striped mt-5">
        <thead class="text-center table-primary">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Asal Sekolah</th>
                <th>Tahun Lulus</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laporan as $row) : ?>
                <tr>
                    <td class="text-center"> <?= $i; ?> </td>
                    <td> <?= $row["Nama"]; ?> </td>
                    <td class="text-center"> <?= $row["Alamat"]; ?> </td>
                    <td class="text-center"> <?= $row["jenisKelamin"]; ?> </td>
                    <td class="text-center"> <?= $row["Agama"]; ?> </td>
                    <td class="text-center"> <?= $row["asalSekolah"]; ?> </td>
                    <td class="text-center"> <?= $row["tahunLulus"]; ?> </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php">
        <button class="btn btn-warning mb-5 " type="button">
            Kembali
        </button>
    </a>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    })
</script>

</body>

</html>