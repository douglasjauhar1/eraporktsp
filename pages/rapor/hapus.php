<?php include_once('../template/header.php');
$id= $_GET['kd_raport'];
$hapus = "DELETE FROM `tbl_nilai` WHERE kd_raport = $id ";
if (mysqli_query($koneksi, $hapus) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href= 'index.php';
    </script>";
} else {
    echo "gagal";
};
