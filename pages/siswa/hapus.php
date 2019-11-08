<?php include_once('../template/header.php');
$id = $_GET['id'];
$hapus = "DELETE FROM `tbl_siswa` WHERE `tbl_siswa`.`id` = $id";
if (mysqli_query($koneksi, $hapus) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href= 'http://localhost/real1/pages/siswa/';
    </script>";
}
