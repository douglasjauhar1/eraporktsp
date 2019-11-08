<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'smpktsp');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Rapor KTSP</title>

  <!-- Custom fonts for this template-->
  <link href="http://localhost/real1/aset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="http://localhost/real1/aset/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
$kd_raport = $_GET["kd_raport"];
//detail nilai
$detail = "SELECT id,nama,nisn,nama_kelas,id_semester,tahun_ajar,nama_mapel,SUM(nilai_umum) AS totalnilai,nilai_huruf,ekstra,nilai_ekstra,sakit,izin,alfa,akhlak,kepribadian,ket,kd_raport FROM tbl_nilai WHERE kd_raport='$kd_raport' GROUP BY kd_raport";
$show = mysqli_query($koneksi, $detail);
//tampung semua data 
$shows = mysqli_fetch_assoc($show);
$nama =  $shows["nama"];
$nisn =   $shows["nisn"];
$kelas = $shows["nama_kelas"];
$semester = $shows["id_semester"];
$tahun = $shows["tahun_ajar"];
$mapel = $shows["nama_mapel"];
$total = $shows["totalnilai"];
$huruf = $shows["nilai_huruf"];
$ekstra = $shows["ekstra"];
$nekstra = $shows["nilai_ekstra"];
$sakit =  $shows["sakit"];
$izin =  $shows["izin"];
$alfa =  $shows["alfa"];
$akhlak =  $shows["akhlak"];
$pribadi =  $shows["kepribadian"];
$ket =  $shows["ket"];
$kd_raport =  $shows["kd_raport"];
$nmsekolah = "SMPN 2 Banyakan Satap";
$alamat = "Ds. Parang Kec Banyakan";
$no = 1;
$time = date('Y');
//tampilkan 
echo "
<div class='container'>
	<div class='col-lg'>
    <p style='text-align: left; width:30%; display: inline-block;'>Sekolah : $nmsekolah</p>
    <p style='text-align: right; width: 30%;  display: inline-block;'>Kelas : $kelas</p><br>
    <p style='text-align: left; width:30%; display: inline-block;'>Alamat : $alamat</p>
    <p style='text-align: right; width: 30%;  display: inline-block;'>Semester : $semester</p>
	<br>
    <p style='text-align: left; width:30%; display: inline-block;'>Nama : $nama</p>
    <p style='text-align: right; width: 30%;  display: inline-block;'>Tahun : $tahun</p>
    <br>
    <p style='text-align: left; width:30%; display: inline-block;'>NIS : $nisn</p>
    <p style='text-align: right; width: 30%;  display: inline-block;'>Kode Raport : $kd_raport</p>
    </div>
    </div>
	";

echo "
<style>
.tg {
	border-collapse: collapse;
	border-spacing: 0;
}

.tg td {
	font-family: Arial, sans-serif;
	font-size: 12px;
	padding: 5px 5px;
	border-style: solid;
	border-width: 0px;
	overflow: hidden;
	word-break: normal;
	border-color: black;
}

.tg th {
	font-family: Arial, sans-serif;
	font-size: 12px;
	font-weight: normal;
	padding: 5px 5px;
	border-style: solid;
	border-width: 1px;
	overflow: hidden;
	word-break: normal;
	border-color: black;
}

.tg .tg-s268 {
	text-align: left
}

.tg .tg-0lax {
	text-align: left;
	vertical-align: top
}

.tg .tg-73oq {
	border-color: #000000;
	text-align: left;
	vertical-align: top
}
.no{
    width:-10px;
}
</style>
<div class='container'>
	<table class='tg' style='undefined;table-layout: fixed; width :500px;>
	<colgroup>
        <col style='width: 30px'>
        <col style='width: 40px'>
        <col style='width: 250px'>
        <col style='width: 40px'>
        <col style='width: 50px'>
        <col style='width: 50px'>
        <col style='width: 225px'>
    </colgroup>
	<tr>
	<th class='tg-s268'>No</th>
    <th class='tg-s268'>Mata Pelajaran</th>
	<th class='tg-s268'>KKM</th>
	<th class='tg-s268'>Nilai</th>
	<th class='tg-s268'>Huruf</th>
	<th class='tg-s268'>Deskripsi Kemajuan Belajar</th>
</tr>
<tbody>
         ";
//seleksi pemilihan nilai ketika 0 tidak masuk kedatabase

$seleksi = "SELECT * FROM tbl_nilai WHERE nilai_umum<>'0' and kd_raport='$kd_raport'";
$tampilkan = mysqli_query($koneksi, $seleksi);
$i = 1;
while ($select_result = mysqli_fetch_assoc($tampilkan)) {

  $kkm = 70;
  $mapels = $select_result["nama_mapel"];
  $nilais = $select_result["nilai_umum"];
  $nilaif = $select_result["nilai_huruf"];
  echo "<tr>
    <td class='tg-s268'> $i</td>
    <td class='tg-s268'> $mapels</td>
	<td class='tg-s268'>$kkm</td>
	</td><td class='tg-s268'>$nilais</td>
	<td class='tg-s268'>$nilaif</td>
    <td class='tg-s268'></td>
    </tr>";
  $i++;
}
echo "<tr><td colspan='3'>Jumlah Nilai </td><td>$total</td><td></td><td></td></tr>
<tr><td colspan='3'>Nilai Rata-rata</td><td></td><td></td><td></td></tr>
<tr><td colspan='6'>Peringkat Ke......dari....siswa</td></tr>
<div class='row'>
</table>
</div>
</div>
";
$i++;
echo "
<div class='container'>
<div class='col-md-3'> Kegiatan Pengembangan Diri</div>
<style type='text/css'>
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
</style>
<table class='tg' style='undefined;table-layout: fixed; width: 655px'>
<colgroup>
<col style='width: 200px'>
<col style='width: 100px'>
<col style='width: 355px'>
</colgroup>
  <tr>
    <th class='tg-c3ow'>Jenis Pengembangan Diri</th>
    <th class='tg-baqh'>Nilai </th>
    <th class='tg-baqh'>Keterangan</th>
  </tr>
  <tr>
    <td class='tg-baqh'>$ekstra</td>
    <td class='tg-baqh'>$nekstra</td>
    <td class='tg-baqh'></td>
  </tr>
</table>
</div>


";
if ($semester == 2) {
  echo "
  <div class='container'>
  <div class='row justify-content-center'>
  <div class='col-lg-4'>
  Naik ke kelas  : ..<br>
  Tinggal di kelas : ..
</div></div></div>";
}
echo "
<div class='container'>
<div class='row'>
<div class='col-lg-4'>Non Akademis
<style type='text/css'>
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:12px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
</style>
<table class='tg' style='undefined;table-layout: fixed; width: 230px'>
<colgroup>
<col style='width: 30px'>
<col style='width: 100px'>
<col style='width: 100px'>
</colgroup>
  <tr>
    <th class='tg-c3ow'>No</th>
    <th class='tg-c3ow'>Aspek</th>
    <th class='tg-baqh'>Keterangan</th>
  </tr>
  <tr>
    <td class='tg-baqh'>1</td>
	<td class='tg-baqh'>Akhlak Mulia</td>
	<td class='tg-baqh'>$akhlak</td>
	
  </tr>
  <tr>
    <td class='tg-baqh'>2</td>
    <td class='tg-baqh'>Kepribadian</td>
    <td class='tg-baqh'>$pribadi</td>
    
  </tr>
</table>
</div>

<div class='row'>
<div class='col-lg-3'> Ketidakhadiran
<style type='text/css'>
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:12px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
</style>
<table class='tg' style='undefined;table-layout: fixed; width: 300px; '>
<colgroup>
<col style='width: 30px'>
<col style='width: 100px'>
<col style='width: 60px'>
</colgroup>
  <tr>
    <th class='tg-c3ow'>No</th>
    <th class='tg-c3ow'>Alasan Ketidakhadiran</th>
    <th class='tg-baqh'>Keterangan</th>
  </tr>
  <tr>
    <td class='tg-baqh'>1</td>
	<td class='tg-baqh'>Sakit</td>
	<td class='tg-baqh'>$sakit</td>
	
  </tr>
  <tr>
    <td class='tg-baqh'>2</td>
    <td class='tg-baqh'>Izin</td>
    <td class='tg-baqh'>$izin</td>
    
  </tr>
  <tr>
    <td class='tg-baqh'>3</td>
    <td class='tg-baqh'>Tanpa Keterangan</td>
    <td class='tg-baqh'>$alfa</td>
    
  </tr>
</table>
</div>
</div>
</br>




";
echo "<div class='container'>
<div class='row'>
<div class='col-lg'>
<p>Kediri,   ..,  ......., $time</p>
</div></div></div>";


echo "

<div class='row'>
<div class='col-lg'>

<p>Orang Tua / Wali</p>
</br>  </br>  </br>




....................................
</div>
<div class='col-lg'>

<p>Walikelas</p>
</br>  </br>  </br>




....................................


</div>
";
if ($semester == 2) {
  echo "
  <div class='col-lg'>
  <p>Kepala Sekolah</p>
	</br>  </br>  </br>
	
	
	
	
  ....................................
  
  </div>";
}
echo "
	<div class='alert alert-warning' role='alert'>
	<center><a href='javascript:if(window.print)window.print()'>
	<button type='button' class='btn btn-success'><span class='glyphicon glyphicon-print' aria-hidden='true'></span>Cetak halaman ini</button></a></center>
	</div>
        </div></div></div>
	";


?>
<!-- Bootstrap core JavaScript-->
<script src="http://localhost/real1/aset/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/real1/aset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="http://localhost/real1/aset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="http://localhost/real1/aset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="http://localhost/real1/aset/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="http://localhost/real1/aset/js/demo/chart-area-demo.js"></script>
<script src="http://localhost/real1/aset/js/demo/chart-pie-demo.js"></script>

</body>

</html>