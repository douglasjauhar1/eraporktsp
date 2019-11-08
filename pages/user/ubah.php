<?php include_once('../template/header.php');
?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $user = $_POST["username"];
    $pw = md5($_POST["password"]);
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $lvl = $_POST["level"];

    $ubahuser = "UPDATE `users` SET `username` = '$user', `password` = '$pw', `nama` = '$nama', `email` = '$email', `level` = '$lvl' WHERE `users`.`id` = $id
    ";
    if (mysqli_query($koneksi, $ubahuser) > 0) {
        echo "<script>
 alert('data berhasil diupdate');
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
                <?php
                $id = $_GET["id"];
                $user = mysqli_query($koneksi, "SELECT * FROM users WHERE id =$id");
                while ($tampil = mysqli_fetch_assoc($user)) {
                    $id = $tampil["id"];
                    $username = $tampil["username"];
                    $pw = $tampil["password"];
                    $nama = $tampil["nama"];
                    $email = $tampil["email"];
                    $lvl = $tampil["level"];
                }

                // tombol cari diklik maka ditimpa



                ?>
                <!-- Input Form -->
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Username
                                <input type="text" name="username" id="username" value="<?= $username; ?>" class="form-control">
                            </label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Password
                                <input type="password" name="password" id="password" value="<?= $password; ?>" class="form-control">
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Nama
                                <input type="text" name="nama" id="nama" value="<?= $nama; ?>" class="form-control">
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Email
                                <input type="text" name="email" id="email" value="<?= $email; ?>" class="form-control">
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama">Level
                                <select name="level" id="level" class="form-control" value="<?= $lvl; ?>">
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