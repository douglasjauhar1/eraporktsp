<?php include_once('../template/header.php');
?>

<?php
$namasekolah = "SMPN2 SATAP BANYAKAN";
$alamatsekolah = "Dusun Peso Desa Parang Kecamatan Banyakan";
$siswa = mysqli_query($koneksi, "SELECT * FROM tbl_siswa") or die(nysqli_error($koneksi));
$jsArray = "var nis = new Array();\n";

/*\if (isset($_POST["submit"])) {
    $namasiswa = $_POST["nama"];
    $nisn = $_POST["nisn"];
    $kelas = $_POST["nama_kelas"];
    $semester = $_POST["id_semester"];
    $tahun = $_POST["tahun_ajar"];
    $mapel = $_POST["nama_mapel"];
    $nilai = $_POST["nilai_umum"];
    $huruf = $_POST["nilai_huruf"];
    $count = count($mapel);
    //query insert
    for ($i = 0; $i < $count; $i++) { }
    $sqlmapel = "INSERT INTO `tbl_nilai` (`id`, `nama`, `nisn`, `nama_kelas`, `id_semester`, `tahun_ajar`, `nama_mapel`, `nilai_umum`, `nilai_total`, `nilai_huruf`) VALUES (NULL, '$namasiswa', '$nisn', '$kelas', '$semester', '$tahun', '$mapel', '$nilai', '', '$huruf')";
    mysqli_query($koneksi, $sqlmapel);
}

?>*/
?>

<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Identitas Rapor -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Identitas Rapor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="tambahrapor.php" method="post">
                    <div class="row">
                        <div class="col-lg">
                            <label for="nm_sekolah">Nama Sekolah</label>
                            <input type="text" name="nm_sekolah" id="nm_sekolah" class="form-control" value="<?php echo $namasekolah; ?> " readonly>
                        </div>
                        <div class="col-lg">
                            <label for="alamat">Alamat Sekolah</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamatsekolah; ?> " readonly>
                        </div>
                        <div class="col-lg">
                            <label for="nama">Nama Peserta Didik</label>
                            <select class="form-control" name="nama" onchange="changeValue(this.value)">
                                <option>- Pilih -</option>
                                <?php if (mysqli_num_rows($siswa)) { ?>
                                    <?php while ($new_siswa = mysqli_fetch_array($siswa)) { ?>
                                        <option value="<?php echo $new_siswa["nama"]  ?>"> <?php echo $new_siswa["nama"] ?> </option>
                                        <?php $jsArray .= "nis['" . $new_siswa['nama'] . "'] = {nisn:'" . addslashes($new_siswa['nis']) . "'};\n";
                                        var_dump($jsArray);
                                    } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg">
                            <label for="nisn">NIS</label>
                            <input type="text" class="form-control" name="nisn" id="nisn" value="0" readonly="readonly">
                        </div>
                    </div>
                    <script type="text/javascript">
                        <?php echo $jsArray; ?>

                        function changeValue(nama) {
                            document.getElementById("nisn").value = nis[nama].nisn;
                        };
                    </script>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama_kelas">Kelas</label>
                            <select name="nama_kelas" id="nama_kelas" class="form-control">
                                <option value="">--Pilih Kelas--</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div class="col-lg">
                            <label for="id_semester">Semester</label>
                            <select name="id_semester" id="id_semester" class="form-control">
                                <option value="">--Pilih Semester--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>

                            </select>
                        </div>

                        <div class="col-lg">
                            <label for="tahun_ajar">Tahun Ajar</label>
                            <select name="tahun_ajar" id="tahun_ajar" class="form-control">
                                <option value="">Tahun Ajaran</option>
                                <?php $sql_tahun = mysqli_query($koneksi, "SELECT * FROM tbl_tahun") or die(nysqli_error($koneksi));
                                while ($datatahun = mysqli_fetch_assoc($sql_tahun)) {
                                    echo '<option value="' . $datatahun["tahun_ajar"] . '">' . $datatahun["tahun_ajar"]
                                        . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
            </div>
        </div>
    </div>

</div>

<!-- Page Nilai -->
<div class="card">
    <div class="card-body bg-light">
        <h6 class="text-danger font-weight-bold text-center">Perhatikan : Input Nilai ini hanya satu kali, tidak dapat di edit kembali, Mohon cek nilai dengan benar!</h6>


    </div>
    <div class="container justify-center">
        <div class="card">
            <div class="row">
                <div class="col-md text-center">
                    <div class="card-body">
                        <h6 class="m-0 font-weight-bold text-primary">Pilih Mata Pelajaran</h6>
                        <a class="btn btn-success" href="#" role="button">SB = Sangat Baik</a>
                        <a class="btn btn-primary" href="#" role="button">B = Baik</a>
                        <a class="btn btn-danger" href="#" role="button">KB = Kurang Baik</a>
                        <br><br>
                    </div>

                    <table class="table table-light " id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>Nilai Angka</td>
                                <td>Nilai Huruf</td>
                            </tr>
                        </thead>
                        <tr>
                            <?php
                            $sql_mapel = mysqli_query($koneksi, "SELECT * FROM tbl_mapel ORDER BY nama_mapel") or die(mysqli_error($koneksi));
                            while ($datamapel = mysqli_fetch_assoc($sql_mapel)) :
                                $mapel = $datamapel["nama_mapel"];
                                ?>
                                <input type="hidden" name="nama_siswa" value="<?php echo $datamapel["nama_siswa"] ?>">
                                <td>
                                    <input type="text" name="nama_mapel[]" id="nama_mapel[]" value="  <?php echo $mapel ?>" class="form-control" readonly>

                                <td>
                                    <input type="number" name="nilai_umum[]" id="nilai_umum" class="form-control">
                                </td>
                                <td>
                                    <select name="nilai_huruf[]" id="" class="form-control">
                                        <option value="">Pilih Nilai Huruf</option>
                                        <option value="SB">SB</option>
                                        <option value="B">B</option>
                                        <option value="KB">KB</option>
                                    </select>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        <tr>

                            <td>
                                <label for="ekstra">Jenis Pengembangan Diri</label>
                                <input type="text" name="ekstra" id="ekstra" class="form-control"></td>

                            <td> <label for="ekstra">Input Nilai </label>
                                <input type="text" name="nilai_ekstra" id="ekstra" class="form-control">
                            </td>
                            <td> <label for="ekstra">Keterangan</label>
                                <input type="text" name="" id="ekstra" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>

                                <label for="ekstra">Sakit</label>
                                <input type="number" name="sakit" id="izin" class="form-control">
                            </td>

                            <td> <label for="ekstra">Izin</label>
                                <input type="number" name="izin" id="izin" class="form-control">
                            </td>
                            <td> <label for="ekstra">Tanpa Keterangan</label>
                                <input type="number" name="alfa" id="alfa" class="form-control">
                            </td>
                        </tr>

                        <tr>

                            <td> <label for="ekstra">Akhlak</label>
                                <input type="text" name="akhlak" id="ekstra" class="form-control">
                            </td>
                            <td> <label for="ekstra">Kepripadian</label>
                                <input type="text" name="kepribadian" id="kepribadian" class="form-control">
                            </td>
                            <td> <label for="ekstra">Keterangan</label>
                                <input type="text" name="ket" id="ekstra" class="form-control">
                            </td>
                        </tr>




                    </table>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-warning">Kembali</a>
                    <br><br>
                </div>

                </form>


            </div>
        </div>
    </div>
</div>
<!-- DataTales Hasil Output Nilai -->

<!-- DataTales Example -->
<br><br>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include '../template/footer.php' ?>