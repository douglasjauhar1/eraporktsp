<?php
session_start();
if ($_SESSION) {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login E-Rapor</title>

    <!-- Custom fonts for this template-->
    <link href="aset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="aset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="logo.png" alt="" width="200" height="200">
                                        <h1 class="h4 text-gray-900 mb-4">Login E-Rapor KTSP</h1>
                                    </div>
                                    <?php
                                    if (isset($_POST['login'])) {
                                        include("koneksi.php");

                                        $username    = $_POST['username'];
                                        $password    = md5($_POST['password']);
                                        $level        = $_POST['level'];

                                        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
                                        if (mysqli_num_rows($query) == 0) {
                                            echo '<div class="alert alert-danger">Maaf.. Login Salah.</div>';
                                        } else {
                                            $row = mysqli_fetch_assoc($query);

                                            if ($row['level'] == 1 && $level == 1) {
                                                $_SESSION['username'] = $username;
                                                $_SESSION['level'] = 'admin';
                                                header("Location: home.php");
                                            } else if ($row['level'] == 2 && $level == 2) {
                                                $_SESSION['username'] = $username;
                                                $_SESSION['level'] = 'walikelas';
                                                header("Location: pages/rapor");
                                            } else if ($row['level'] == 3 && $level == 3) {
                                                $_SESSION['username'] = $username;
                                                $_SESSION['level'] = 'mahasiswa';
                                                header("Location: user.php");
                                            } else {
                                                echo '<div class="alert alert-danger">Password Salah.</div>';
                                            }
                                        }
                                    }
                                    ?>

                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required autofocus />
                                        </div>
                                        <div class="form-group">
                                            <select name="level" class="form-control" required>
                                                <option value="">Pilih Level User</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">Wali Kelas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="login" class="btn btn-primary btn-block" value="Log me in" />
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="aset/vendor/jquery/jquery.min.js"></script>
    <script src="aset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="aset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>