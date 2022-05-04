<?php

session_start();


if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


include 'config/koneksi.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek user
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (md5($password) == $row['password']) {

            // Set SESSION
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran-mahasiswa</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/img/icon.png">
    <!-- <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/responsive.bootstrap4.min"> -->
    <link rel="stylesheet" href="assets/css/all.min.css">

    <style>
        .background-login {
            background-color: rgb(247, 252, 238);
        }

        .card-login {
            border-radius: 10px;
            border: none;
            margin-top: 100px;
            background-color: whitesmoke;

        }
    </style>



</head>

<body class="background-login">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card card-login shadow-lg">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Data Mahasiswa</h1>
                                    </div>

                                    <form action="" method="POST">
                                        <?php if (isset($error)) : ?>
                                            <p style="color: red; font-style: italic; text-align: center;"> Username / password salah!</p>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user" id="username" placeholder="username" name="username" autofocus autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="password" name="password">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-success btn-user btn-block"> Login </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="forgotPassword.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <p>Belum punya akun?<a class="small" href="register.php">Sign Up</a></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="assets/js/demo/chart-area-demo.js"></script>
        <script src="assets/js/demo/chart-pie-demo.js"></script>
</body>

</html>