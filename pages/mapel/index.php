<?php
include_once('../template/header.php');
$mapel = mysqli_query($koneksi, "SELECT * FROM `tbl_mapel`");





?>
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Mata Pelajaran</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2"> Tambah Data Mapel</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Mapel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Mapel</th>
                            <th>Kode Mapel</th>
                            <th>Semester</th>
                            <th>Guru Pengajar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($mapels = mysqli_fetch_assoc($mapel)) :
                            ?>
                            <tr>
                                <td><?= $mapels["nama_mapel"]; ?></td>
                                <td><?= $mapels["kode_mapel"]; ?></td>
                                <td><?= $mapels["id_semester"]; ?></td>
                                <td><?= $mapels["nama_guru"]; ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= $mapels["id_mapel"]; ?>" class="badge badge-warning badge-pill">Edit</a>
                                    <a href="hapus.php?id=<?= $mapels["id_mapel"]; ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda mau menghapus?');">Hapus</a>
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


<?php include '../template/footer.php' ?>