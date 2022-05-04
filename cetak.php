<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include 'navbar.php';
include 'config/koneksi.php';

$id = $_GET["id"];

$cetakMhs = query("SELECT * FROM pendaftaran WHERE id = $id")[0];


?>


<div class="container">
    <!-- content -->

    <div class="card col-6 mt-4 mx-auto">
        <div class="">
            <h5 class=" text-center mt-3">Cetak Mahasiswa</h5>
            <hr>
        </div>
        <!-- <form action="" method="POST" class=""> -->
        <!-- 
                <div class="form-group row-8">
                    <label for="id" class="col-sm-2 col-form-label">Id</label>
                    <label for="id" class="col-sm-2 col-form-label">:</label>
                    <label id="id" name="id" value="" class="col-sm-4 col-form-label"><?= $cetakMhs["id"]; ?></label>

                </div>
                <div class="form-group row-8">
                    <label for="nama" class="col-md-2 col-form-label">Nama</label>
                    <label for="nama" class="col-md-2 col-form-label">:</label>
                    <label id="nama" name="Nama" value="" class="col-md-4 col-form-label"><?= $cetakMhs["Nama"]; ?></label>
                </div>
                <div class="form-group row-8">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <label for="alamat" class="col-sm-2 col-form-label">:</label>
                    <label id="alamat" name="Alamat" required value="" class="col-sm-4 col-form-label"><?= $cetakMhs["Alamat"]; ?></label>

                </div>
                <div class="form-group row-8">
                    <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <label for="jenisKelamin" class="col-sm-2 col-form-label">:</label>
                    <label id="alamat" name="Alamat" required value="" class="col-sm-4 col-form-label"><?= $cetakMhs["jenisKelamin"]; ?></label>

                </div>
                <div class="form-group row-8">
                    <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
                    <label for="Agama" class="col-sm-2 col-form-label">:</label>
                    <label id="alamat" name="Alamat" required value="" class="col-sm-4 col-form-label text-le"><?= $cetakMhs["Agama"]; ?></label>

                </div>
                <div class="form-group row-8">
                    <label for="asalSekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                    <label for="asalSekolah" class="col-sm-2 col-form-label">:</label>
                    <label id="asalSekolah" name="asalSekolah" required value="" class="col-sm-4 col-form-label"><?= $cetakMhs["asalSekolah"]; ?></label>

                </div>
                <div class="form-group row-8">
                    <label for="tahunLulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <label for="tahunLulus" class="col-sm-2 col-form-label">:</label>
                    <label id="tahunLulus" name="tahunLulus" required value="" class="col-sm-4 col-form-label"><?= $cetakMhs["tahunLulus"]; ?></label>

                </div>
                <div class="form-group row-8">
                    <hr>
                    <div class="">
                        <a href="index.php">
                            <button type="button" class="btn btn-warning" name="cancel">Cancel</button>
                        </a>
                        <button type="submit" class="btn btn-success" name="cetak">Cetak</button>
                    </div>
                </div>
            </form> -->


        <table class="">
            <tbody>
                <tr>
                    <td class="col-2 ">ID</td>
                    <td class="col-1">:</td>
                    <td class="col-9"><?= $cetakMhs["id"]; ?></td>
                </tr>
                <tr>
                    <td class="col-2">Nama</td>
                    <td class="col-1">:</td>
                    <td class="col-9"><?= $cetakMhs["Nama"]; ?></td>
                </tr>
                <tr>
                    <td class=" col-2">Alamat</td>
                    <td class="col-1">:</td>
                    <td class=" col-9"><?= $cetakMhs["Alamat"]; ?></td>
                </tr>
                <tr>
                    <td class="col-3">Jenis Kelamin</td>
                    <td class="col-1">:</td>
                    <td class="col-7"><?= $cetakMhs["jenisKelamin"]; ?></td>
                </tr>
                <tr>
                    <td class="col-2">Agama</td>
                    <td class="col-1">:</td>
                    <td class=" col-9"><?= $cetakMhs["Agama"]; ?></td>
                </tr>
                <tr>
                    <td class="col-2">Asal Sekolah</td>
                    <td class="col-1">:</td>
                    <td class="col-9"><?= $cetakMhs["asalSekolah"]; ?></td>
                </tr>
                <tr>
                    <td class="col-2">Tahun Lulus</td>
                    <td class="col-1">:</td>
                    <td class="col-9"><?= $cetakMhs["tahunLulus"]; ?></td>
                </tr>
            </tbody>

        </table>
        <hr class="button-cetak">
        <div class="form-group mx-auto">
            <div class="">
                <a href="index.php">
                    <button type="button" class="btn btn-warning button-cetak name=" cancel">Cancel</button>
                </a>
                <button type="submit" class="btn btn-success button-cetak" name="cetak">Cetak</button>
            </div>
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