<?php include_once('../template/header.php');
?>

<?php
if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pw = md5($_POST["password"]);
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $lvl = $_POST["level"];

    $tambahuser = "INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `level`) VALUES (NULL, '$user', '$pw', '$nama', '$email', '$lvl')
    ";
    if (mysqli_query($koneksi, $tambahuser) > 0) {
        echo "<script>
 alert('data berhasil ditambahkan');
 document.location.href= 'index.php';
 </script>";
    } else {
        echo "nub!";
    }
}

?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Info : Masukkan Level 1 Sebagai Admin & Level 2 Sebagai Walikelas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Username
                                <input type="text" name="username" id="username" value="" class="form-control">
                            </label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Password
                                <input type="password" name="password" id="password" value="" class="form-control">
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Nama
                                <input type="text" name="nama" id="nama" value="" class="form-control">
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Email
                                <input type="text" name="email" id="email" value="" class="form-control">
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Level
                                <select name="level" id="level" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>

                                </select>
                            </label>
                        </div>
                    </div>
            </div>
            <br><br>
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-warning">Kembali</a>
            </form>
            <br><br>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include '../template/footer.php' ?>