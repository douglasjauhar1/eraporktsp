<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'smpktsp');

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




<?php include_once('../template/header.php');
?>
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Siswa SMP Banyakan</h1>

    <a href="index.php" class="btn btn-warning ml-4 mb-2"> Kembali</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Tabel Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>Nis</td>
                            <td><?= $nis; ?> </td>
                        </tr>
                        <tr>
                            <td>Nisn</td>
                            <td><?= $nisn; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><?= $nama; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= $jk ?></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir </td>
                            <td><?= $tmplahir; ?></td>
                        </tr>
                        <tr>
                            <td>Tgl Lahir</td>
                            <td><?= $tgllhr; ?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td><?= $agama; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $alamat; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Ayahr</td>
                            <td><?= $nmayah; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td><?= $nmibu; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td><?= $krjayah; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td><?= $krjibu; ?></td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<?php include '../template/footer.php' ?>