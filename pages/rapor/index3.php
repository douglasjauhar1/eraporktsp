<?php
session_start();
if (($_SESSION) == 'walikelas') {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= 'index.php';
 </script>";
}
include_once('header.php');
$nilai = mysqli_query($koneksi, "SELECT id,nama,nisn,nama_kelas,id_semester,tahun_ajar,nama_mapel,SUM(nilai_umum) AS totalnilai,nilai_huruf,ekstra,nilai_ekstra,sakit,izin,alfa,akhlak,kepribadian,ket,kd_raport  FROM  tbl_nilai WHERE nama_kelas = '9' GROUP BY kd_raport ");


// tombol cari diklik maka ditimpa



?>
<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Cari -->


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Rapor</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2">Tambah Data Rapor</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Rapor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Tahun Ajar</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; 
                        
                        while ($tampil = mysqli_fetch_assoc($nilai)) :?>
                        
                        


                            
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $tampil['nama']?></td>
                                <td><?=$tampil['nisn']?></td>
                                <td><?=$tampil['nama_kelas'] ?></td>
                                <td><?= $tampil['id_semester']?></td>
                                <td><?= $tampil['tahun_ajar'] ?></td>

                                <td>
                                    <a href="detail.php?kd_raport=<?= $tampil["kd_raport"]; ?>" class="badge badge-warning badge-pill"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
                                    <a href="hapus.php?id=<?= $tampil["kd_raport"]; ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda mau menghapus?');">Hapus</a>
                                </td>

                            </tr>

                    </tbody>
<?php endwhile;?>
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