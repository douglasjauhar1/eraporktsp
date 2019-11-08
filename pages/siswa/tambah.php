<?php include_once('../template/header.php');
?>

<?php
if (isset($_POST["submit"])) {
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
    $nmkelas = $_POST["nama_kelas"];
    $tambah = "INSERT INTO `tbl_siswa` (`id`, `nis`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `agama`, `alamat`, `namaayah`, `namaibu`, `kerjaayah`, `kerjaibu`, `nama_kelas`) VALUES (NULL, '$nis', '$nisn', '$nama', '$jk', '$tmplahir', '$tgllhr', '$agama', '$alamat', '$nmayah', '$nmibu', '$krjayah', '$krjibu', '$nmkelas')";
    if (mysqli_query($koneksi, $tambah) > 0) {
        echo "<script>
    alert('data berhasil ditambahkan');
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Murid</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">NIS</label>
                                <input type="text" name="nis" value="" class="form-control" id="nis">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">NISN</label>
                                <input type="text" name="nisn" value="" class="form-control" id="nisn">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama</label>
                                <input type="text" name="nama" value="" class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Jns Kel</label>
                                <select class="form-control" name="jk" id="jk">
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" value="" class="form-control" id="tmp_lahir">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" value="" class="form-control" id="tgl_lahir">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Agama</label>
                                <select class="form-control" name="agama">
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
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama Ayah</label>
                                <input type="text" name="namaayah" id="namaayah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama Ibu</label>
                                <input type="text" name="namaibu" id="namaibu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Ayah</label>
                                <input type="text" name="kerjayah" id="kerjayah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Ibu</label>
                                <input type="text" name="kerjaibu" id="kerjaibu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="kode" class="control-label">Kelas</label>
                            <select class="form-control" name="nama_kelas">
                                <option>Pilih Kelas</option>
                                <?php $sql_kelas = mysqli_query($koneksi, "SELECT * FROM tbl_kelas") or die(nysqli_error($koneksi));
                                while ($datakelas = mysqli_fetch_assoc($sql_kelas)) {
                                    echo '<option value="' . $datakelas["nama_kelas"] . '">' . $datakelas["nama_kelas"]
                                        . '</option>';
                                }

                                ?>
                            </select>

                        </div>
                        <br><br>

                        <button type="submit" class="btn btn-primary ml-5" name="submit" id="submit">Submit</button>
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