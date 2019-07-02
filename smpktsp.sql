-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2019 pada 07.43
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smpktsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `nip` int(20) NOT NULL,
  `jk_guru` enum('L','P') NOT NULL,
  `guru_status` enum('GURU AKTIF','WALI KELAS') NOT NULL,
  `status_pegawai` enum('PNS','SUKWAN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `nama_guru`, `nip`, `jk_guru`, `guru_status`, `status_pegawai`) VALUES
(11, 'M. sulton Rohad', 239873, 'P', 'WALI KELAS', 'SUKWAN'),
(12, 'Anis Wahyudi', 5432161, 'L', 'GURU AKTIF', 'PNS'),
(13, 'Endah Yulismiati', 5432161, 'P', 'GURU AKTIF', 'PNS'),
(14, 'Diana Indriasari', 5432161, 'L', 'GURU AKTIF', 'PNS'),
(15, 'Sukesi', 5432161, 'P', 'GURU AKTIF', 'PNS'),
(16, 'Agus Setyono', 543216, 'L', 'GURU AKTIF', 'PNS'),
(17, 'Yanuar Lukmani Erfan', 5432161, 'L', 'GURU AKTIF', 'PNS'),
(18, 'Nyami Endang S', 5432161, 'P', 'GURU AKTIF', 'PNS'),
(19, 'M. Rendi bagus Yahya', 5432161, 'L', 'GURU AKTIF', 'PNS'),
(20, 'Muhamad Soim', 5432161, 'L', 'GURU AKTIF', 'PNS'),
(21, 'Wiji Lestari', 5432161, 'P', 'GURU AKTIF', 'PNS'),
(22, 'Ferry Kurniawan', 543216, 'L', 'GURU AKTIF', 'PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `nama_guru`) VALUES
('11', 'KELAS X11', ''),
('8', 'KELAS 8', ''),
('9', 'KELAS 9', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(20) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `id_semester` enum('1','2') NOT NULL,
  `nama_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`, `kode_mapel`, `id_semester`, `nama_guru`) VALUES
(15, 'Pendidikan Agama', 'PAI', '1', 'Anis Wahyudi'),
(16, 'Pendidikan Kewarganegaraan', 'PKN', '1', 'M. sulton Rohadi'),
(17, 'Bahasa Indonesia', 'BIND', '1', 'Anis Wahyudi'),
(18, 'Bahasa Inggris', 'BING', '1', 'Endah Yulismiati'),
(19, 'Matematika', 'MTK', '1', 'Agus Setyono'),
(20, 'Ilmu Pengetahuan Alam', 'IPA', '1', 'Sukesi'),
(21, 'Ilmu Pengetahuan Sosial', 'IPS', '1', 'Yanuar Lukmani Erfan'),
(22, 'Seni Budaya', 'SB', '1', 'Diana Indriasari'),
(23, 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'PJK', '1', 'Yanuar Lukmani Erfan'),
(24, 'Bahasa Jawa', 'BJ', '1', 'Muhamad Soim'),
(25, 'Teknologi Infornasi dan Komunikasi', 'TIK', '1', 'Nyami Endang S'),
(26, 'KIMIA DASAR', 'KM', '1', 'M. Rendi bagus Yahya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id` int(200) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `id_semester` enum('1','2') NOT NULL,
  `tahun_ajar` varchar(20) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `nilai_umum` varchar(100) NOT NULL,
  `nilai_huruf` enum('SB','B','KB') NOT NULL,
  `ekstra` varchar(20) NOT NULL,
  `nilai_ekstra` varchar(20) NOT NULL,
  `sakit` int(10) NOT NULL,
  `izin` int(100) NOT NULL,
  `alfa` int(10) NOT NULL,
  `akhlak` varchar(11) NOT NULL,
  `kepribadian` varchar(11) NOT NULL,
  `ket` varchar(11) NOT NULL,
  `kd_raport` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id`, `nama`, `nisn`, `nama_kelas`, `id_semester`, `tahun_ajar`, `nama_mapel`, `nilai_umum`, `nilai_huruf`, `ekstra`, `nilai_ekstra`, `sakit`, `izin`, `alfa`, `akhlak`, `kepribadian`, `ket`, `kd_raport`) VALUES
(486, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Bahasa Indonesia', '90', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(487, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Bahasa Inggris', '80', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(488, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Bahasa Jawa', '60', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(489, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Ilmu Pengetahuan Alam', '70', 'B', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(490, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Ilmu Pengetahuan Sosial', '90', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(491, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  KIMIA DASAR', '89', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(492, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Matematika', '90', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(493, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Pendidikan Agama', '90', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(494, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Pendidikan Jasmani, Olahraga dan Kesehatan', '90', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(495, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Pendidikan Kewarganegaraan', '90', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(496, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Seni Budaya', '90', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(497, 'Douglas Jauhar', '2176151', '7', '1', '2018/2019 Genap', '  Teknologi Infornasi dan Komunikasi', '90', 'SB', 'Pramuka', 'B', 1, 1, 1, 'Baik', 'baik', '', '1951'),
(498, '', '', '', '', '', '  Bahasa Indonesia', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(499, '', '', '', '', '', '  Bahasa Inggris', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(500, '', '', '', '', '', '  Bahasa Jawa', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(501, '', '', '', '', '', '  Ilmu Pengetahuan Alam', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(502, '', '', '', '', '', '  Ilmu Pengetahuan Sosial', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(503, '', '', '', '', '', '  KIMIA DASAR', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(504, '', '', '', '', '', '  Matematika', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(505, '', '', '', '', '', '  Pendidikan Agama', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(506, '', '', '', '', '', '  Pendidikan Jasmani, Olahraga dan Kesehatan', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(507, '', '', '', '', '', '  Pendidikan Kewarganegaraan', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(508, '', '', '', '', '', '  Seni Budaya', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(509, '', '', '', '', '', '  Teknologi Infornasi dan Komunikasi', '', '', '', '', 0, 0, 0, '', '', '', '1333'),
(510, '', '', '', '', '', '  Bahasa Indonesia', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(511, '', '', '', '', '', '  Bahasa Inggris', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(512, '', '', '', '', '', '  Bahasa Jawa', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(513, '', '', '', '', '', '  Ilmu Pengetahuan Alam', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(514, '', '', '', '', '', '  Ilmu Pengetahuan Sosial', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(515, '', '', '', '', '', '  KIMIA DASAR', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(516, '', '', '', '', '', '  Matematika', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(517, '', '', '', '', '', '  Pendidikan Agama', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(518, '', '', '', '', '', '  Pendidikan Jasmani, Olahraga dan Kesehatan', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(519, '', '', '', '', '', '  Pendidikan Kewarganegaraan', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(520, '', '', '', '', '', '  Seni Budaya', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(521, '', '', '', '', '', '  Teknologi Infornasi dan Komunikasi', '', '', '', '', 0, 0, 0, '', '', '', '1601'),
(522, '', '', '', '', '', '  Bahasa Indonesia', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(523, '', '', '', '', '', '  Bahasa Inggris', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(524, '', '', '', '', '', '  Bahasa Jawa', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(525, '', '', '', '', '', '  Ilmu Pengetahuan Alam', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(526, '', '', '', '', '', '  Ilmu Pengetahuan Sosial', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(527, '', '', '', '', '', '  KIMIA DASAR', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(528, '', '', '', '', '', '  Matematika', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(529, '', '', '', '', '', '  Pendidikan Agama', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(530, '', '', '', '', '', '  Pendidikan Jasmani, Olahraga dan Kesehatan', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(531, '', '', '', '', '', '  Pendidikan Kewarganegaraan', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(532, '', '', '', '', '', '  Seni Budaya', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(533, '', '', '', '', '', '  Teknologi Infornasi dan Komunikasi', '', '', '', '', 0, 0, 0, '', '', '', '1206'),
(534, '', '', '', '', '', '  Bahasa Indonesia', '89', 'SB', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(535, '', '', '', '', '', '  Bahasa Inggris', '80', 'SB', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(536, '', '', '', '', '', '  Bahasa Jawa', '90', 'SB', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(537, '', '', '', '', '', '  Ilmu Pengetahuan Alam', '60', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(538, '', '', '', '', '', '  Ilmu Pengetahuan Sosial', '70', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(539, '', '', '', '', '', '  KIMIA DASAR', '80', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(540, '', '', '', '', '', '  Matematika', '90', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(541, '', '', '', '', '', '  Pendidikan Agama', '100', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(542, '', '', '', '', '', '  Pendidikan Jasmani, Olahraga dan Kesehatan', '90', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(543, '', '', '', '', '', '  Pendidikan Kewarganegaraan', '80', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(544, '', '', '', '', '', '  Seni Budaya', '70', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(545, '', '', '', '', '', '  Teknologi Infornasi dan Komunikasi', '70', 'B', 'Pramuka', 'B', 1, 1, 2, 'Baik', 'baik', '', '1543'),
(546, '', '', '', '', '', '  Bahasa Indonesia', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(547, '', '', '', '', '', '  Bahasa Inggris', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(548, '', '', '', '', '', '  Bahasa Jawa', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(549, '', '', '', '', '', '  Ilmu Pengetahuan Alam', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(550, '', '', '', '', '', '  Ilmu Pengetahuan Sosial', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(551, '', '', '', '', '', '  KIMIA DASAR', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(552, '', '', '', '', '', '  Matematika', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(553, '', '', '', '', '', '  Pendidikan Agama', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(554, '', '', '', '', '', '  Pendidikan Jasmani, Olahraga dan Kesehatan', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(555, '', '', '', '', '', '  Pendidikan Kewarganegaraan', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(556, '', '', '', '', '', '  Seni Budaya', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(557, '', '', '', '', '', '  Teknologi Infornasi dan Komunikasi', '', '', '', '', 0, 0, 0, '', '', '', '1213'),
(558, '', '', '', '', '', '  Bahasa Indonesia', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(559, '', '', '', '', '', '  Bahasa Inggris', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(560, '', '', '', '', '', '  Bahasa Jawa', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(561, '', '', '', '', '', '  Ilmu Pengetahuan Alam', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(562, '', '', '', '', '', '  Ilmu Pengetahuan Sosial', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(563, '', '', '', '', '', '  KIMIA DASAR', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(564, '', '', '', '', '', '  Matematika', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(565, '', '', '', '', '', '  Pendidikan Agama', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(566, '', '', '', '', '', '  Pendidikan Jasmani, Olahraga dan Kesehatan', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(567, '', '', '', '', '', '  Pendidikan Kewarganegaraan', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(568, '', '', '', '', '', '  Seni Budaya', '', '', '', '', 0, 0, 0, '', '', '', '1536'),
(569, '', '', '', '', '', '  Teknologi Infornasi dan Komunikasi', '', '', '', '', 0, 0, 0, '', '', '', '1536');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id` int(20) NOT NULL,
  `nm_sekolah` varchar(100) NOT NULL,
  `npsn` int(30) NOT NULL,
  `jenjang` varchar(20) NOT NULL,
  `akreditasi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kepsek_nama` varchar(30) NOT NULL,
  `kepsek_nip` varchar(30) NOT NULL,
  `kepsek_pangkat` varchar(30) NOT NULL,
  `kepsek_jabatan` varchar(30) NOT NULL,
  `kepsek_alamat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_profil`
--

INSERT INTO `tbl_profil` (`id`, `nm_sekolah`, `npsn`, `jenjang`, `akreditasi`, `alamat`, `kepsek_nama`, `kepsek_nip`, `kepsek_pangkat`, `kepsek_jabatan`, `kepsek_alamat`) VALUES
(1, 'SMP Negeri 2 banyakan Satu Atap', 69864655, 'SLTP', 'B', ' Dusun Peso Desa Parang Kecamatan Banyakan', 'IMAM SUHODO, M.Pd', '19711030 1994101 001', 'Pembina/ IVa', 'Guru ahli madya', 'Dusun Geneng Desa Maron Kecama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(200) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `namaayah` varchar(30) NOT NULL,
  `namaibu` varchar(30) NOT NULL,
  `kerjaayah` varchar(20) NOT NULL,
  `kerjaibu` varchar(20) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `nis`, `nisn`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `agama`, `alamat`, `namaayah`, `namaibu`, `kerjaayah`, `kerjaibu`, `nama_kelas`) VALUES
(1, '213456', '2176151', 'Douglas Jauhar', '', 'kediri', '0000-00-00', 'Islam', 'Kediri', 'Ayah', 'Ibu', 'Kerja Ayah', 'Kerja Ibu', ''),
(6, '213456', '12345671', 'Renalta Hawa Yuniar', '', 'kediri', '2019-05-22', 'Islam', 'Jl Perintis Kemerdekaan 123', 'Reno', 'Retnos', 'Dokter', 'Guru', ''),
(7, '241', '12345678', 'Albert Einsten', '', 'malang', '2019-05-29', 'Islam', 'Jl Perintis Kemerdekaan 123', 'Ayahku', 'Ibvuku', 'qq', 'Guru', 'KELAS 7'),
(8, '1212', '2121', 'DouglasJauharNehru', '', 'kediri', '1998-02-09', 'Islam', 'Jl Perintis Kemerdekaan 123', 'Ayahku', 'Ibvuku', 'Dokter', 'Guru', 'KELAS 7'),
(9, '62871262', '', 'John', '', 'kediri', '2019-05-15', 'Islam', 'Jl Perintis Kemerdekaan 123', 'Ayahku', 'Ibvuku', 'Dokter', 'Guru', 'KELAS 7'),
(10, '2413', '12345678', 'DouglasJauhar', 'P', 'kediri', '0000-00-00', 'Islam', 'Jl Perintis Kemerdekaan 123', 'qq', 'Ibvuku', '', '', 'KELAS X11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahun`
--

CREATE TABLE `tbl_tahun` (
  `id` int(11) NOT NULL,
  `tahun_ajar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tahun`
--

INSERT INTO `tbl_tahun` (`id`, `tahun_ajar`) VALUES
(1, '2018/2019 Ganjil'),
(2, '2018/2019 Genap'),
(4, '2019/2020 Genap'),
(6, '2020/2021 Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(32) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@gmail.com', 1),
(2, 'walikela', 'a1733c8fdf9ce2e12c3896f8f619035a', 'Nadela Maaherish', 'douglasjauhar@gmail.com', 2),
(6, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 1),
(7, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b', 'douglasjauhar@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_guru` (`nama_guru`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `nama_kelas` (`nama_kelas`),
  ADD KEY `nama_kelas_2` (`nama_kelas`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `nama_guru` (`nama_guru`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_kelas` (`nama_kelas`),
  ADD KEY `nama_kelas_2` (`nama_kelas`);

--
-- Indeks untuk tabel `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;

--
-- AUTO_INCREMENT untuk tabel `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
