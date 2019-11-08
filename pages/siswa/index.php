<?php
session_start();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../index.php';
 </script>";
}
include_once('../template/header.php');
$murid = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");

// tombol cari diklik maka ditimpa


?>

<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Cari -->


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Siswa SMP Banyakan</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2"> Tambah Data Siswa</a>
    <a href="export_excel.php" class="btn btn-success ml-4 mb-2"> Export data</a>
    <a href="printdata.php" class="btn btn-secondary ml-4 mb-2"> Print</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        while ($tampil = mysqli_fetch_assoc($murid)) :
                            ?>
                            <tr>
                                <td><?= $tampil["nama"]; ?></td>
                                <td><?= $tampil["tmp_lahir"]; ?></td>
                                <td><?= $tampil["tgl_lahir"]; ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $tampil["id"]; ?> " class="badge badge-primary badge-pill">Detail</a>
                                    <a href="ubah.php?id=<?= $tampil["id"]; ?>" class="badge badge-warning badge-pill">Edit</a>
                                    <a href="hapus.php?id=<?= $tampil["id"]; ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda mau menghapus?');">Hapus</a>
                                </td>

                            </tr>
                        <?php endwhile; ?>
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