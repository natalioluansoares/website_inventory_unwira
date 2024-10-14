-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 12:33 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory_unwira`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `stok_barang` int(11) NOT NULL DEFAULT '0',
  `ruangan` int(11) NOT NULL,
  `total_barang` float NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `harga_barang_pinjam` float NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `gambar` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok_barang`, `ruangan`, `total_barang`, `harga_barang`, `harga_barang_pinjam`, `created`, `updated`, `id_kategori`, `operator`, `gambar`) VALUES
(76, 'R01', 'Almamate', 70, 21, 80, 100, 10, '2023-05-27', '2023-05-27', 32, 25, 'item-230525-295553819d8935a4d865ea6a7ba00108.jpg'),
(77, 'K01', 'Komputer', 95, 3, 100, 900, 90, '2023-05-27', '2023-05-27', 22, 4, 'item-230525-446dccbb598ceb69888cb55582e00272.png'),
(78, 'E01', 'Komputer', 197, 6, 200, 900, 100, '2023-05-27', '2023-05-27', 12, 2, 'item-230525-83dce9bcf4a089d5b3984fff7ea4866a.jpg'),
(79, 'E01', 'kipas', 96, 22, 100, 50, 5, '2023-05-27', '2023-05-27', 34, 26, 'item-230525-270533b6a9bf8b48a45c662f63a3a28d.jpg'),
(80, 'K01', 'Kursi', 200, 23, 200, 500, 50, '2023-05-27', '2023-05-27', 35, 28, 'item-230525-a707d02888677579c2aa8d8d2a497a50.jpg'),
(81, 'R01', 'Almamate', 96, 32, 100, 100, 10, '2023-05-27', '2023-05-27', 44, 23, 'item-230526-12cd3d863e83d7ec59e4740fff97d011.jpg'),
(82, 'R01', 'Almamate', 296, 12, 300, 100, 10, '2023-05-27', '2023-05-27', 25, 9, 'item-230526-8f60133558675007e7476499bb4310b3.jpeg'),
(83, 'R01', 'Almamate', 0, 24, 0, 800, 10, '2023-05-27', '2023-05-27', 36, 29, 'item-230527-0368432593eb1c1a568d99c5ca289b39.jpg'),
(84, 'M01', 'Komputer', 0, 14, 0, 60000, 150, '2023-05-27', '0000-00-00', 27, 14, 'item-230527-1da825dd7affaa3c1cd4b9374fb8fcaf.jpg'),
(85, 'E01', 'Laptop', 0, 25, 0, 80000, 100, '2023-05-27', '0000-00-00', 37, 15, 'item-230527-74f49be325c8db778580758cf13f854c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `total_barang_masuk` int(11) NOT NULL,
  `stock_barang_masuk` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `tanggal_barang_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_barang`, `total_barang_masuk`, `stock_barang_masuk`, `operator`, `tanggal_barang_masuk`) VALUES
(65, 76, 80, 80, 25, '2023-05-25'),
(66, 77, 100, 100, 4, '2023-05-25'),
(67, 78, 200, 200, 2, '2023-05-25'),
(68, 80, 200, 200, 28, '2023-05-26'),
(69, 79, 100, 100, 26, '2023-05-26'),
(70, 81, 100, 100, 23, '2023-05-27'),
(71, 82, 300, 300, 9, '2023-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `barang_pinjaman`
--

CREATE TABLE `barang_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_pinjaman` varchar(180) NOT NULL,
  `no_KTP` varchar(180) NOT NULL,
  `no_hp` varchar(180) NOT NULL,
  `total_barang_pinjaman` int(11) NOT NULL,
  `jumlah_harga_pinjam` int(11) NOT NULL,
  `bayar` int(11) DEFAULT NULL,
  `status` enum('Belum Bayar','Masih Panjar','Sudah Bayar','') NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `durasi_pinjaman` int(11) NOT NULL,
  `operator` int(11) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_pinjaman`
--

INSERT INTO `barang_pinjaman` (`id_pinjaman`, `id_barang`, `nama_pinjaman`, `no_KTP`, `no_hp`, `total_barang_pinjaman`, `jumlah_harga_pinjam`, `bayar`, `status`, `tanggal_pinjaman`, `durasi_pinjaman`, `operator`, `aktif`) VALUES
(7, 76, 'Maria Sarmento Soares', '90000056667676', '+670 78 64 74 89', 2, 40, 50, 'Sudah Bayar', '2023-05-27', 2, 25, 1),
(8, 77, 'Mariano Soares', '67073113456098', '+ 670 75450909', 5, 900, 800, 'Masih Panjar', '2023-05-27', 2, 4, 0),
(9, 78, 'Joana Soares', '90000056667676', '+ 670 75450909', 3, 600, 600, 'Sudah Bayar', '2023-05-26', 2, 2, 1),
(10, 79, 'Marfilho Soares', '231456436789', '+ 670 75450909', 4, 100, NULL, 'Belum Bayar', '2023-05-27', 5, 26, 0),
(11, 81, 'Joaquin Sarmento', '231456436789', '+ 670 75450909', 4, 160, NULL, 'Belum Bayar', '2023-05-28', 4, 23, 0),
(12, 82, 'Joaquin Sarmento Soares', '67073113456098', '+ 670 75450909', 4, 160, 150, 'Masih Panjar', '2023-05-26', 4, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_rusak`
--

CREATE TABLE `barang_rusak` (
  `id_rusak` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang_rusak` int(11) NOT NULL,
  `created_tanggal` int(11) NOT NULL,
  `updated_tanggal` int(11) DEFAULT NULL,
  `operator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_rusak`
--

INSERT INTO `barang_rusak` (`id_rusak`, `id_barang`, `jumlah_barang_rusak`, `created_tanggal`, `updated_tanggal`, `operator`) VALUES
(34, 50, 2, 1683370962, NULL, 3),
(36, 51, 1, 1683427230, 1684453565, 5),
(37, 62, 2, 1683517165, 1684460446, 26),
(38, 53, 3, 1683551075, 1683551179, 11),
(39, 55, 2, 1683624893, 1684451665, 17),
(40, 56, 2, 1683632218, 1683632225, 18),
(41, 57, 1, 1683645890, NULL, 20),
(42, 58, 1, 1683677323, NULL, 22),
(43, 60, 5, 1684285651, 1684448267, 2),
(45, 65, 5, 1684448051, 1684448487, 2),
(46, 51, 1, 1684453450, NULL, 5),
(47, 62, 1, 1684460319, NULL, 26),
(48, 67, 5, 1684560945, NULL, 29),
(49, 57, 3, 1684564482, NULL, 20),
(50, 58, 5, 1684566055, 1684566070, 22),
(51, 76, 5, 1685082743, NULL, 25);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Admin'),
(2, 'Teknik'),
(3, 'Ekonomi Dan Bisnis'),
(4, 'Ilmu Sosial Dan Ilmu Politik'),
(5, 'Hukum'),
(6, 'Filsafat'),
(7, 'Matematika Dan Ilmu Pengetahuan Alam'),
(8, 'Keguruan Dan Ilmu Pendidikan'),
(9, 'Pasca Sarjana Manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(200) NOT NULL,
  `fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `fakultas`) VALUES
(1, 'Teknik Sipil', 2),
(3, 'Ilmu Komputer', 2),
(4, 'Hukum', 5),
(5, 'Manajemen (S1)', 3),
(6, 'Ekonomi Pembangunan', 3),
(7, 'Akuntasi', 3),
(9, 'Ilmu Pemerintahan', 4),
(10, 'Ilmu Komunikasi', 4),
(11, 'Kimia', 7),
(12, 'Biologi', 7),
(13, 'Filsafat', 6),
(14, 'Sendratasik (Musik)', 8),
(15, 'Bimbingan Dan Konseling', 8),
(16, 'Pendidikan Bahasa Inggris', 8),
(17, 'Pendidikan Fisika', 8),
(18, 'Pendidikan Biologi', 8),
(19, 'Pendidikan Kimia', 8),
(20, 'Pendidikan Matematika', 8),
(22, 'Magister Manajemen', 9),
(24, 'Arsitektur', 2),
(25, 'Administrasi Negara', 4),
(26, 'Operator Teknik', 2),
(27, 'Operator Ekonomi Dan Bisnis', 3),
(28, 'Operator Ilmu Sosial Dan Ilmu Politik', 4),
(29, 'Operator Hukum', 5),
(30, 'Operator Filsafat', 6),
(31, 'Operator Matematika Dan Ilmu Pengetahuan Alam', 7),
(32, 'Operator Keguruan Dan Ilmu Pendidikan', 8),
(34, 'Operator Pasca Sarjana Manajemen', 9);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(180) NOT NULL,
  `operator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `operator`) VALUES
(12, 'Elektronik', 2),
(21, 'Roupa', 3),
(22, 'Alat Tulis', 4),
(23, 'Elektronik', 5),
(24, 'Sasan', 5),
(25, 'Roupa', 9),
(26, 'Pakaian', 11),
(27, 'Alat Tulis', 14),
(28, 'Roupa', 17),
(29, 'Roupa', 18),
(30, 'Roupa', 20),
(31, 'Roupa', 22),
(32, 'Roupa', 25),
(33, 'Alat Tulis', 2),
(34, 'Alat Tulis', 26),
(35, 'Kipas', 28),
(36, 'Roupa', 29),
(37, 'Roupa', 15),
(38, 'Roupa', 30),
(39, 'Roupa', 31),
(40, 'Roupa', 32),
(41, 'Roupa', 33),
(42, 'Roupa', 34),
(43, 'Roupa', 35),
(44, 'Roupa', 23),
(45, 'Roupa', 5),
(46, 'Alat Tulis', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  `operator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`, `operator`) VALUES
(1, 'A100', 'A', 2),
(2, 'A110', 'B', 3),
(3, 'A110', 'C', 4),
(4, 'A110', 'D', 2),
(6, 'A110', 'Ruangan ', 2),
(7, 'R001', 'Ruangan Alnold Janss', 6),
(9, 'A100', 'A', 6),
(10, 'R001', 'Ruangan C', 3),
(11, 'R001', 'D', 5),
(12, 'R001', 'Ruangan D', 9),
(13, 'R001', 'Ruangan D', 11),
(14, 'R001', 'Ruangan C', 14),
(15, 'Q1', 'C', 17),
(16, 'Q1', 'C', 18),
(17, 'Q2', 'D', 18),
(18, 'Q1', 'D', 20),
(19, 'Q1', 'E', 22),
(20, 'Q1', 'E', 5),
(21, 'Q1', 'Ruangan A', 25),
(22, 'Q1', 'Ruangan A', 26),
(23, 'R001', 'Ruangan D', 28),
(24, 'J01', 'Ruangan 1', 29),
(25, 'R01', 'Ruangan 1', 15),
(26, 'J01', 'Ruangan 1', 30),
(27, 'R01', 'Ruangan 1', 31),
(28, 'J01', 'Ruangan 1', 32),
(29, 'J01', 'Ruangan 1', 33),
(30, 'J01', 'Ruangan 1', 34),
(31, 'J01', 'Ruangan 1', 35),
(32, 'R001', 'Ruangan C', 23),
(33, 'R001', 'Ruangan D', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `nama_depan` varchar(123) NOT NULL,
  `nama_belakang` varchar(123) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kata_sandi` varchar(128) NOT NULL,
  `level` enum('Admin','Admin_Ekonomi_Dan_Bisnis','Admin_Ilmu_Sosial_Dan_Ilmu_Politik','Admin_Hukum','Admin_Filsafat','Admin_Matematika_Dan_Ilmu_Pengetahuan_Alam','Admin_Keguruan_Dan_Ilmu_Pendidikan','Admin_Teknik','Operator_Jurusan') NOT NULL,
  `jurusan` int(11) NOT NULL,
  `alamat` varchar(111) NOT NULL,
  `created_akun` int(11) NOT NULL,
  `foto` varchar(340) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `nama_depan`, `nama_belakang`, `email`, `kata_sandi`, `level`, `jurusan`, `alamat`, `created_akun`, `foto`) VALUES
(1, 'Natalio Cristianto Luan Soares', 'Natalio', 'Luan Soares', 'nataliocristiantoluansoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Admin', 1, 'Same', 1672062492, 'item-230420-ee11d4a2a1b5e2b1f869126fea100efd.jpg'),
(2, 'Dina Maria Melania', 'Dina Maria', 'Melania', 'dinamariamelania@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 1, 'Fatuberlio', 1671956830, 'item-230420-238978ea843883334e68d9d608a08338.jpeg'),
(3, 'Herlina Barros', 'Herlina', 'Barros', 'helinabaros@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 2, 'Malaka', 1671956830, 'item-230405-22a3402426cad0dd4a0e6a82fe202f8b.jpg'),
(4, 'Zenita Claudia', 'Zenita', 'Claudia', 'zenitaclaudia@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 3, '0', 1671956830, 'item-221224-b412c5594a77810638050108f81ae516.png'),
(5, 'Ivan Simu', 'Ivan', 'Simu', 'ivansim@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 4, '', 1682220970, 'item-230423-f390098238c8176250038de91a8c1b76.jpg'),
(6, 'Joana Soares', 'Joana', 'Soares', 'joanasoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Admin_Hukum', 29, 'Same', 1682222310, 'item-230511-7beddd7dbc234bad17f7e806cab5137d.png'),
(7, 'Maria Sarmento', 'Maria', 'Soares', 'marianasarmento@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Admin_Teknik', 26, '', 1682974161, 'item-230501-2071bc544628d6d5baea46da5b83759e.jpg'),
(8, 'Herlina Luan Soares', 'Herlina', 'Luan Soares', 'herlinaluansoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Admin_Ekonomi_Dan_Bisnis', 27, '', 1683342729, 'item-230506-ac456ca90692df9b3f9ab71826c4ccb3.jpg'),
(9, 'Mama Luan', 'Mama', 'Luan', 'mamaluan@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 5, '', 1683428842, 'item-230507-e01148462ee7a6723b02d8dfe65cb62b.jpg'),
(11, 'Judita Soares', 'Judita', 'Soares', 'juditasoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 8, '', 1683550762, 'item-230508-c0b1d38482cc0b8b54c891c0b1621ae4.jpg'),
(14, 'Marito Soares', 'Marito', 'Soares', 'maritosoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 10, '', 1683607525, 'item-230509-1dea5ae36e8cc356f82de7508213ebad.jpg'),
(15, 'Jacinto Soares', 'Jacinto', 'Soares', 'jacintosoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 9, '', 1683607588, 'item-230509-d93a5ba7a8217512661d6590994a527f.jpg'),
(16, 'Salamaun Soares', 'Salamaun', 'Soares', 'salamaunsoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Admin_Filsafat', 30, '', 1683620185, 'item-230509-f3b1933dbaf9cd49c486375438f98e3e.jpg'),
(17, 'Febi Soares', 'Febi', 'Soares', 'febisoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 13, '', 1683623719, 'item-230509-831dcf2e3641b9025c4652dc0d5e4d95.jpg'),
(18, 'Joaquin Soares', 'Joaquin', 'Soares', 'joaquinsoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 12, '', 1683629346, 'item-230509-eb6559707b5d2bed9899fe1f6c023478.jpg'),
(19, 'Joaquin Luan', 'Joaquin', 'Luan', 'joaquinluan@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Admin_Matematika_Dan_Ilmu_Pengetahuan_Alam', 31, '', 1683629430, 'item-230509-a19bb3d8e9e9b604f75e58b396d04f97.jpg'),
(20, 'Joa Soares', 'joa', 'Soares', 'joasoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 11, '', 1683644743, 'item-230509-65da5aa213f13f34e8c61b2e1f36ac91.jpg'),
(21, 'Marquito Soares', 'Marquito', 'Soares', 'marquitosoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Admin_Keguruan_Dan_Ilmu_Pendidikan', 32, '', 1683673488, 'item-230510-1e5d7a75242e0cfab05ba2d8d8dfa92c.jpg'),
(22, 'Carla Soares', 'Carla', 'Soares', 'carlasoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 15, 'Kota Kupang, Penfui Timur', 1683676866, 'item-230510-ad48734d465d0edee00c63a8625bc3d3.jpg'),
(23, 'Carla Sarmento', 'Carla', 'Sarmento', 'carlasarmento@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 6, '', 1683807393, 'item-230511-2969b6c191b3eea41ec26e8b3a9dd3d9.jpg'),
(25, 'Jaminto Gusmaun', 'Jaminto', 'Gusmaun', 'jamintogusmaun@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 24, '', 1683813073, 'item-230511-0550bdb48dac557ef22eff3b93b1a99d.png'),
(26, 'Juliana Luan', 'Juliana', 'Luan', 'julianaluansoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 7, '', 1683898294, 'item-230512-81056dc2f1e94f5c0947a715bedb3cf6.png'),
(27, 'Lili Libeiro', 'Lili', 'Libeiro', 'lililibeiro@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Admin_Ilmu_Sosial_Dan_Ilmu_Politik', 28, '', 1683906658, 'item-230512-3a5cb9d0d50eb6d6bba8e42f100f44db.jpg'),
(28, 'Rio Boy', 'Rio', 'Boy', 'rioboy@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 7, '', 1683909270, 'item-230512-a669ec9739f322a1b35503abc6ff1b0f.png'),
(29, 'Juanina Soares', 'Juanina', 'Soares', 'juaninasoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 25, '', 1684487254, 'item-230519-809e7a1317d9fbe0d2c2541db3b4a67f.jpeg'),
(30, 'Nazario Sarmento', 'Nazario', 'Sarmento', 'nazariosarmento@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 20, '', 1684566774, 'item-230520-4172034e410cf311f3e01426d4cf2ead.png'),
(31, 'Marita Sarmento', 'Marita', 'Sarmento', 'maritasarmento@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 16, '', 1684592608, 'item-230520-55887824ab603284fe1d8fa108d84f53.jpg'),
(32, 'Francisco Soares', 'Francisco', 'Soares', 'franciscosoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 18, '', 1684592927, 'item-230520-8d7e1c68a52af12daca336a653d32a75.png'),
(34, 'Filomena Soares', 'Filomena', 'Soares', 'filomenasoares@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 19, '', 1684593190, 'item-230520-6b391d96535e3c3e74340c6ba7136428.jpg'),
(35, 'Febbi Siri', 'Febbi', 'Siri', 'febbisiri@gmail.com', '1cfb78977897cdd2490dee44c058c51a5f49100c', 'Operator_Jurusan', 14, '', 1684593333, 'item-230520-40d2d13ba42e0632d6a888abe4bccda7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `operator` (`operator`),
  ADD KEY `ruangan` (`ruangan`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `operator` (`operator`),
  ADD KEY `barang_masuk_ibfk_3` (`id_barang`);

--
-- Indexes for table `barang_pinjaman`
--
ALTER TABLE `barang_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `operator` (`operator`);

--
-- Indexes for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD PRIMARY KEY (`id_rusak`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `barang_rusak_ibfk_2` (`operator`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `barang_pinjaman`
--
ALTER TABLE `barang_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  MODIFY `id_rusak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`operator`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`operator`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_pinjaman`
--
ALTER TABLE `barang_pinjaman`
  ADD CONSTRAINT `barang_pinjaman_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_pinjaman_ibfk_2` FOREIGN KEY (`operator`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
