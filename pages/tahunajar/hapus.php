<?php include_once('../template/header.php');
$id = $_GET['id'];
$hapus = "DELETE FROM `tbl_tahun` WHERE `tbl_tahun`.`id` = $id";
if (mysqli_query($koneksi, $hapus) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href= 'index.php';
    </script>";
}
