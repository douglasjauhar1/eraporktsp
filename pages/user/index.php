<?php
include_once('../template/header.php');
$user = mysqli_query($koneksi, "SELECT * FROM users");

// tombol cari diklik maka ditimpa



?>
<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Cari -->


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Pengguna</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2"> Tambah Data Pengguna</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Info : Masukkan Level 1 Sebagai Admin & Level 2 Sebagai Walikelas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level Pengguna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        while ($tampil = mysqli_fetch_assoc($user)) :
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $tampil["username"]; ?></td>
                                <td><?= $tampil["password"]; ?></td>
                                <td><?= $tampil["nama"]; ?></td>
                                <td><?= $tampil["email"]; ?></td>
                                <td><?= $tampil["level"]; ?></td>
                                <td>
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