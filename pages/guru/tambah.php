<?php include_once('../template/header.php');
?>

<?php
if (isset($_POST["submit"])) {
    $nama = $_POST["nama_guru"];
    $nip = $_POST["nip"];
    $jk = $_POST["jk_guru"];
    $status = $_POST["guru_status"];
    $pgw = $_POST["status_pegawai"];

    $tambahguru = "INSERT INTO `tbl_guru` (`id`, `nama_guru`, `nip`, `jk_guru`, `guru_status`, `status_pegawai`) VALUES (NULL, '$nama', '$nip', '$jk', '$status', '$pgw')";
    if (mysqli_query($koneksi, $tambahguru) > 0) {
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Guru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama">Nama Guru</label>
                            <input type="text" name="nama_guru" id="nama_guru" value="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="nama">NIP</label>
                            <input type="text" name="nip" id="nip" value="" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk_guru" id="jk_guru" class="form-control">
                                <option value="L" class="form-control">L</option>
                                <option value="P" class="form-control">P</option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jk">Guru Status</label>
                            <select name="guru_status" id="guru_status" class="form-control">
                                <option value="GURU AKTIF" class="form-control">GURU AKTIF</option>
                                <option value="WALI KELAS" class="form-control">WALI KELAS</option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jk">Status Kepegawaian</label>
                            <select name="status_pegawai" id="status_pegawai" class="form-control">
                                <option value="PNS" class="form-control">PNS</option>
                                <option value="SUKWAN" class="form-control">SUKWAN</option>

                            </select>
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