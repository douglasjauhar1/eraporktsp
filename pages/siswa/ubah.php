<?php include_once('../template/header.php');
?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $nis = $_POST["nis"];
    $nisn = $_POST["nisn"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $tmplahir = $_POST["tmp_lahir"];
    $tgllhr = $_POST["tgl_lahir"];
    $agama = $_POST["agama"];
    $alamat = $_POST["alamat"];
    $nmayah = $_POST["namaayah"];
    $nmibu = $_POST["namaibu"];
    $krjayah = $_POST["kerjayah"];
    $krjibu = $_POST["kerjaibu"];
    $ubah = "UPDATE `tbl_siswa` SET `nis` = '$nis', `nisn` = '$nisn', `nama` = '$nama', `jk` = '$jk', `tmp_lahir` = '$tmplahir', `tgl_lahir` = '$tgllhr', `agama` = '$agama', `alamat` = '$alamat', `namaayah` = '$nmayah', `namaibu` = '$nmibu', `kerjaayah` = '$krjayah', `kerjaibu` = '$krjibu' WHERE `tbl_siswa`.`id` = $id;";
    if (mysqli_query($koneksi, $ubah) > 0) {
        echo "<script>
    alert('data berhasil diupdate');
    document.location.href= 'http://localhost/real1/pages/siswa/';
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
            <h6 class="m-0 font-weight-bold text-primary">Edit Tabel Murid</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="" method="post">
                    <?php
                    $id = $_GET["id"];
                    $murid = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id = $id");
                    while ($tampil = mysqli_fetch_assoc($murid)) {

                        $nis = $tampil["nis"];
                        $nisn = $tampil["nisn"];
                        $nama = $tampil["nama"];
                        $jk = $tampil["jk"];
                        $tmplahir = $tampil["tmp_lahir"];
                        $tgllhr = $tampil["tgl_lahir"];
                        $agama = $tampil["agama"];
                        $alamat = $tampil["alamat"];
                        $nmayah = $tampil["namaayah"];
                        $nmibu = $tampil["namaibu"];
                        $krjayah = $tampil["kerjaayah"];
                        $krjibu = $tampil["kerjaibu"];
                    }
                    ?>
                    <div class="row">
                        <input type="hidden" name="id" value="<?= $id; ?>" class="form-control" id="id">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">NIS</label>
                                <input type="text" name="nis" value="<?= $nis; ?>" class="form-control" id="nis">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">NISN</label>
                                <input type="text" name="nisn" value="<?= $nisn; ?>" class="form-control" id="nisn">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama</label>
                                <input type="text" name="nama" value="<?= $nama; ?>" class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Jns Kel</label>
                                <select class="form-control" name="jk" id="jk" value="<?= $jk; ?>">
                                    <option>L</option>
                                    <option>P</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" value="<?= $tmplahir; ?>" class="form-control" id="tmp_lahir">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" value="<?= $tgllahir; ?>" class="form-control" id="tgl_lahir">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Agama</label>
                                <select class="form-control" name="agama" value="<?= $agama; ?>">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Budha</option>
                                    <option>Hindu</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="kode" class="control-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" value="<?= $alamat; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama Ayah</label>
                                <input type="text" name="namaayah" id="namaayah" value="<?= $nmayah; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama Ibu</label>
                                <input type="text" name="namaibu" id="namaibu" value="<?= $nmibu; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Ayah</label>
                                <input type="text" name="kerjayah" id="kerjayah" value="<?= $krjayah; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Ibu</label>
                                <input type="text" name="kerjaibu" id="kerjaibu" value="<?= $krjibu; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br><br>

                    <button type="submit" class="btn btn-success ml-5" name="submit" id="submit">Update</button>
                    <a href="http://localhost/real1/pages/siswa/" class="btn btn-warning">Cancel</a>
                    <div class="clearfix"></div>
                    <br>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include '../template/footer.php' ?>