<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
    }

include 'navbar.php';
include 'config/koneksi.php';

$id = $_GET["id"];

$pendaftaran = query("SELECT * FROM pendaftaran WHERE id = $id")[0];



if (isset($_POST["submit"])) {

    if (update($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diedit!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diedit!');
                document.history.back();
            </script>
        ";
    }
}

?>

<div class="container">
    <!-- content -->
    <div class="card mt-4">

    </div>

    <div class="card">
        <div class="card-header ">
            <h5 class="text-center mt-2">Update Data Mahasiswa</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="p-3">

                <input type="hidden" name="id" value="<?= $pendaftaran["id"]; ?>">

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="Nama" required value="<?= $pendaftaran["Nama"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="Alamat" required value="<?= $pendaftaran["Alamat"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select id="jenisKelamin" class="form-control" name="jenisKelamin" required value="<?= $pendaftaran["jenisKelamin"]; ?>">
                            <option selected></option>
                            <option>Laki - laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class=" col-sm-10">
                        <select id="Agama" class="form-control" name="agama" required value="<?= $pendaftaran["Agama"]; ?>">
                            <option selected></option>
                            <option>Islam</option>
                            <option>Hindu</option>
                            <option>Kristen</option>
                            <option>Budha</option>
                            <option>Katholik</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="asalSekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="asalSekolah" name="asalSekolah" required value="<?= $pendaftaran["asalSekolah"]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahunLulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tahunLulus" name="tahunLulus" required value="<?= $pendaftaran["tahunLulus"]; ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="ml-auto ">
                        <a href="index.php">
                            <button type="button" class="btn btn-warning" name="cancel">Cancel</button>
                        </a>
                        <button type="submit" class="btn btn-success text-right" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- end content -->
</div>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/responsive.bootstrap4.min.js"></script>
</body>

</html>