<?php

include '../config/koneksi.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM pendaftaran
            WHERE 
    nama  LIKE  '%$keyword%' OR
    tahunLulus LIKE  '%$keyword%' OR
    jenisKelamin LIKE  '%$keyword%' OR
    agama LIKE  '%$keyword%' OR
    asalSekolah LIKE '%$keyword%'
    ";

$mahasiswa = query($query);

?>

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
        <?php foreach ($mahasiswa as $row) : ?>
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