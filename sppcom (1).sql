-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 04:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_foto` varchar(255) NOT NULL,
  `admin_ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`, `admin_ttd`) VALUES
('744775d3558c2bdd778d36add6473da5', 'Irfan', 'irfan', '$2y$10$9Vl5N9pJKFRRvW/Ff3i/weryFLmcAt.k5U1wSpTgGecprSNX.QFXy', 'admin-avatar.png', ''),
('d44003cb6be8cff88c4f9ef9fd31b820', 'Admin', 'admin', '$2y$10$kyUrK5JWCkeL7.z6rUWFtuRFY4MTkkoZtqgrdm6fG7qlCPGXllPIm', 'admin-avatar.png', 'sifa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_akademik`
--

CREATE TABLE `tb_biaya_akademik` (
  `baka_id` int(11) NOT NULL,
  `baka_kelas` int(11) NOT NULL,
  `baka_ta` varchar(255) NOT NULL,
  `baka_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_biaya_akademik`
--

INSERT INTO `tb_biaya_akademik` (`baka_id`, `baka_kelas`, `baka_ta`, `baka_biaya`) VALUES
(1, 1, '2022/2023', 230000),
(3, 2, '2022/2023', 280000),
(4, 3, '2022/2023', 320000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_infaq`
--

CREATE TABLE `tb_biaya_infaq` (
  `binf_id` int(11) NOT NULL,
  `binf_siswaid` int(11) NOT NULL,
  `binf_ta` varchar(255) NOT NULL,
  `binf_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_biaya_infaq`
--

INSERT INTO `tb_biaya_infaq` (`binf_id`, `binf_siswaid`, `binf_ta`, `binf_biaya`) VALUES
(1, 23038, '2022/2023', 120000),
(2, 23039, '2022/2023', 100000),
(3, 23040, '2022/2023', 100000),
(4, 23041, '2022/2023', 100000),
(5, 23042, '2022/2023', 100000),
(6, 74839, '2022/2023', 100000),
(7, 74840, '2022/2023', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_lain`
--

CREATE TABLE `tb_biaya_lain` (
  `bila_id` int(11) NOT NULL,
  `bila_ket` varchar(255) NOT NULL,
  `bila_biaya` int(11) NOT NULL,
  `bila_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_biaya_lain`
--

INSERT INTO `tb_biaya_lain` (`bila_id`, `bila_ket`, `bila_biaya`, `bila_kelas`) VALUES
(2, 'Seragam', 500000, 1),
(3, 'Biaya 2', 100000, 1),
(4, 'Biaya 3', 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_registrasi`
--

CREATE TABLE `tb_biaya_registrasi` (
  `bare_id` int(11) NOT NULL,
  `bare_kelas` int(11) NOT NULL,
  `bare_ta` varchar(255) NOT NULL,
  `bare_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_biaya_registrasi`
--

INSERT INTO `tb_biaya_registrasi` (`bare_id`, `bare_kelas`, `bare_ta`, `bare_biaya`) VALUES
(1, 1, '2022/2023', 300000),
(2, 2, '2022/2023', 330000),
(3, 3, '2022/2023', 360000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_spp`
--

CREATE TABLE `tb_biaya_spp` (
  `bspp_id` int(11) NOT NULL,
  `bspp_siswaid` int(11) NOT NULL,
  `bspp_ta` varchar(255) NOT NULL,
  `bspp_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_biaya_spp`
--

INSERT INTO `tb_biaya_spp` (`bspp_id`, `bspp_siswaid`, `bspp_ta`, `bspp_biaya`) VALUES
(2, 23039, '2022/2023', 250000),
(4, 23040, '2022/2023', 500000),
(5, 23041, '2022/2023', 400000),
(6, 23042, '2022/2023', 500000),
(7, 74839, '2022/2023', 500000),
(20, 23038, '2022/2023', 500000),
(21, 74840, '2022/2023', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `bulan_id` int(11) NOT NULL,
  `bulan_nama` varchar(255) DEFAULT NULL,
  `bulan_urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`bulan_id`, `bulan_nama`, `bulan_urut`) VALUES
(1, 'Januari', 7),
(2, 'Februari', 8),
(3, 'Maret', 9),
(4, 'April', 10),
(5, 'Mei', 11),
(6, 'Juni', 12),
(7, 'Juli', 1),
(8, 'Agustus', 2),
(9, 'September', 3),
(10, 'Oktober', 4),
(11, 'November', 5),
(12, 'Desember', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kalender`
--

CREATE TABLE `tb_kalender` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `datestart` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `dateend` varchar(255) DEFAULT NULL,
  `timestart` varchar(255) DEFAULT NULL,
  `timeend` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `sec_datestart` date DEFAULT NULL,
  `sec_dateend` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kalender`
--

INSERT INTO `tb_kalender` (`id`, `title`, `datestart`, `color`, `dateend`, `timestart`, `timeend`, `created`, `sec_datestart`, `sec_dateend`) VALUES
(1, 'Rapat', '2022-08-10T08:00:00', '#ff7373', '', '08:00', '', '2022-08-09 01:36:14', '2022-08-10', '0000-00-00'),
(2, 'Audit', '2022-08-11T11:00:00', '#dd5590', NULL, '11:00', '', '2022-08-09 02:15:47', '2022-08-11', '0000-00-00'),
(3, 'Evaluasi Sasmut', '2022-08-10T10:00:00', '#178a0f', '', '10:00', '', '2022-08-09 02:30:51', '2022-08-10', '0000-00-00'),
(5, 'Peristiwa G30S/PKI', '2022-09-30', '#ce0d0d', '', '', '', '2022-09-10 03:12:00', '2022-09-30', '0000-00-00'),
(6, 'Rapat Internal Guru', '2022-09-13', '#248f6f', '', '', '', '2022-09-10 03:12:41', '2022-09-13', '0000-00-00'),
(7, 'Akreditasi', '2022-09-14', '#6841d2', '2022-09-16', '', '', '2022-09-10 03:13:31', '2022-09-14', '2022-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `kelas`) VALUES
(1, 'VII'),
(2, 'VIII'),
(3, 'IX'),
(4, 'TES 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lock`
--

CREATE TABLE `tb_lock` (
  `id` int(11) NOT NULL,
  `yn` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lock`
--

INSERT INTO `tb_lock` (`id`, `yn`) VALUES
(1, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pay_bulan`
--

CREATE TABLE `tb_pay_bulan` (
  `pb_id` int(11) NOT NULL,
  `pb_siswa` int(11) NOT NULL,
  `pb_bulan` int(11) DEFAULT NULL,
  `pb_total` int(11) DEFAULT NULL,
  `pb_tanggal` date DEFAULT NULL,
  `pb_infaq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pay_bulan`
--

INSERT INTO `tb_pay_bulan` (`pb_id`, `pb_siswa`, `pb_bulan`, `pb_total`, `pb_tanggal`, `pb_infaq`) VALUES
(1, 23038, 1, 500000, '2022-07-19', 50000),
(2, 23038, 2, 500000, '2022-07-19', NULL),
(3, 23038, 3, NULL, NULL, NULL),
(4, 23038, 4, 500000, '2022-07-19', NULL),
(5, 23038, 5, NULL, NULL, NULL),
(6, 23038, 6, NULL, NULL, NULL),
(7, 23038, 7, NULL, NULL, NULL),
(8, 23038, 8, NULL, NULL, NULL),
(9, 23038, 9, NULL, NULL, NULL),
(10, 23038, 10, NULL, NULL, NULL),
(11, 23038, 11, NULL, NULL, NULL),
(12, 23038, 12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pay_infaq`
--

CREATE TABLE `tb_pay_infaq` (
  `pin_id` int(11) NOT NULL,
  `pin_siswa` int(11) NOT NULL,
  `pin_jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pay_infaq`
--

INSERT INTO `tb_pay_infaq` (`pin_id`, `pin_siswa`, `pin_jumlah`) VALUES
(1, 23038, 50000),
(2, 23038, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pay_spp`
--

CREATE TABLE `tb_pay_spp` (
  `pspp_id` int(11) NOT NULL,
  `pspp_siswa` int(11) NOT NULL,
  `pspp_jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran_spp`
--

CREATE TABLE `tb_pembayaran_spp` (
  `ps_id` int(11) NOT NULL,
  `ps_siswa` int(11) NOT NULL,
  `ps_tanggal` date NOT NULL,
  `ps_bulan` int(11) NOT NULL,
  `ps_jumlah` int(11) NOT NULL,
  `ps_infaq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran_spp`
--

INSERT INTO `tb_pembayaran_spp` (`ps_id`, `ps_siswa`, `ps_tanggal`, `ps_bulan`, `ps_jumlah`, `ps_infaq`) VALUES
(1, 23038, '2022-07-17', 2, 500000, 0),
(2, 23038, '2022-07-17', 3, 500000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran_spp1`
--

CREATE TABLE `tb_pembayaran_spp1` (
  `ps_id` int(11) NOT NULL,
  `ps_siswa` int(11) NOT NULL,
  `ps_juli` int(11) DEFAULT NULL,
  `tgl_juli` date DEFAULT NULL,
  `ps_agustus` int(11) DEFAULT NULL,
  `tgl_agus` date DEFAULT NULL,
  `ps_september` int(11) DEFAULT NULL,
  `tgl_sep` date DEFAULT NULL,
  `ps_oktober` int(11) DEFAULT NULL,
  `tgl_okt` date DEFAULT NULL,
  `ps_november` int(11) DEFAULT NULL,
  `tgl_nov` date DEFAULT NULL,
  `ps_desember` int(11) DEFAULT NULL,
  `tgl_des` date DEFAULT NULL,
  `ps_januari` int(11) DEFAULT NULL,
  `tgl_jan` date DEFAULT NULL,
  `ps_februari` int(11) DEFAULT NULL,
  `tgl_feb` date DEFAULT NULL,
  `ps_maret` int(11) DEFAULT NULL,
  `tgl_mar` date DEFAULT NULL,
  `ps_april` int(11) DEFAULT NULL,
  `tgl_apr` date DEFAULT NULL,
  `ps_mei` int(11) DEFAULT NULL,
  `tgl_mei` date DEFAULT NULL,
  `ps_juni` int(11) DEFAULT NULL,
  `tgl_juni` date DEFAULT NULL,
  `ps_infaq` int(11) DEFAULT NULL,
  `ps_akademik` int(11) DEFAULT NULL,
  `tag_infaq` int(11) DEFAULT NULL,
  `tag_akademik` int(11) DEFAULT NULL,
  `tag_reg` int(11) DEFAULT NULL,
  `ps_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran_spp1`
--

INSERT INTO `tb_pembayaran_spp1` (`ps_id`, `ps_siswa`, `ps_juli`, `tgl_juli`, `ps_agustus`, `tgl_agus`, `ps_september`, `tgl_sep`, `ps_oktober`, `tgl_okt`, `ps_november`, `tgl_nov`, `ps_desember`, `tgl_des`, `ps_januari`, `tgl_jan`, `ps_februari`, `tgl_feb`, `ps_maret`, `tgl_mar`, `ps_april`, `tgl_apr`, `ps_mei`, `tgl_mei`, `ps_juni`, `tgl_juni`, `ps_infaq`, `ps_akademik`, `tag_infaq`, `tag_akademik`, `tag_reg`, `ps_total`) VALUES
(1, 23038, NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', 500000, '2022-07-18', NULL, '2022-07-18', 500000, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, NULL, 0, NULL, NULL, NULL),
(2, 23039, NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', NULL, '2022-07-18', 250000, '2022-07-18', NULL, NULL, 0, NULL, NULL, NULL),
(3, 23040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 23041, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 23042, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 74839, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `sms_id` int(11) NOT NULL,
  `sms_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`sms_id`, `sms_status`) VALUES
(1, 'AKTIF'),
(2, 'TIDAK AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_settings`
--

CREATE TABLE `tb_settings` (
  `id` int(11) NOT NULL,
  `kepsek` varchar(255) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_settings`
--

INSERT INTO `tb_settings` (`id`, `kepsek`, `nik`, `ttd`) VALUES
(1, 'Dra. Alwiyah Bagir', '2023', 'f2344f7df8aa2e1d86a2c4e3ac76d93f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `siswa_nis` varchar(255) NOT NULL,
  `siswa_nama` varchar(255) NOT NULL,
  `siswa_jk` varchar(255) NOT NULL,
  `siswa_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`siswa_nis`, `siswa_nama`, `siswa_jk`, `siswa_kelas`) VALUES
('23038', 'Muhammad Fatah', 'Laki-Laki', '1'),
('23039', 'Budi Hermawan', 'Laki-Laki', '1'),
('23040', 'Reski Pandawa Putra', 'Laki-Laki', '1'),
('23041', 'Malik Rame', 'Laki-Laki', '1'),
('23042', 'Viola Daffa', 'Laki-Laki', '1'),
('74839', 'Niko Pratama', 'Laki-Laki', '1'),
('74840', 'Imam M', 'Laki-Laki', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `tagihan_siswa` varchar(255) NOT NULL,
  `tagihan_infaq` int(11) NOT NULL,
  `tagihan_akademik` int(11) NOT NULL,
  `tagihan_registrasi` int(11) NOT NULL,
  `tagihan_ta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`tagihan_siswa`, `tagihan_infaq`, `tagihan_akademik`, `tagihan_registrasi`, `tagihan_ta`) VALUES
('23038', 0, 0, 0, '2022/2023'),
('23039', 0, 0, 200000, '2022/2023'),
('23040', 50000, 130000, 150000, '2022/2023'),
('23041', 0, 230000, 300000, '2022/2023'),
('23042', 0, 0, 0, '2022/2023'),
('74839', 0, 0, 0, '2022/2023'),
('74840', 0, 320000, 360000, '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan_spp`
--

CREATE TABLE `tb_tagihan_spp` (
  `tspp_id` int(11) NOT NULL,
  `tspp_siswa` varchar(255) NOT NULL,
  `tspp_ta` varchar(255) NOT NULL,
  `tspp_jml` int(11) NOT NULL,
  `tspp_bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tagihan_spp`
--

INSERT INTO `tb_tagihan_spp` (`tspp_id`, `tspp_siswa`, `tspp_ta`, `tspp_jml`, `tspp_bulan`) VALUES
(2, '23040', '2022/2023', 500000, 8),
(4, '23041', '2022/2023', 400000, 8),
(6, '23042', '2022/2023', 500000, 8),
(7, '23042', '2022/2023', 500000, 7),
(8, '74839', '2022/2023', 500000, 8),
(9, '74839', '2022/2023', 500000, 7),
(13, '23039', '2022/2023', 250000, 9),
(14, '23040', '2022/2023', 500000, 9),
(15, '74840', '2022/2023', 350000, 9),
(16, '23042', '2022/2023', 500000, 9),
(18, '23041', '2022/2023', 400000, 6),
(19, '23041', '2022/2023', 400000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_pelajaran`
--

CREATE TABLE `tb_tahun_pelajaran` (
  `ta_id` int(11) NOT NULL,
  `ta_tahun` varchar(255) NOT NULL,
  `ta_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahun_pelajaran`
--

INSERT INTO `tb_tahun_pelajaran` (`ta_id`, `ta_tahun`, `ta_status`) VALUES
(1, '2021/2022', 'TIDAK AKTIF'),
(2, '2022/2023', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` varchar(250) NOT NULL,
  `transaksi_siswaid` varchar(255) NOT NULL,
  `transaksi_ta` varchar(255) NOT NULL,
  `transaksi_tgl` date NOT NULL,
  `transaksi_infaq` int(50) DEFAULT NULL,
  `transaksi_akademik` int(50) NOT NULL,
  `transaksi_spp` int(50) NOT NULL,
  `transaksi_registrasi` int(50) DEFAULT NULL,
  `transaksi_total` int(50) NOT NULL,
  `tratagih_infaq` int(11) NOT NULL,
  `tratagih_akademik` int(11) NOT NULL,
  `tratagih_registrasi` int(11) NOT NULL,
  `transaksi_created` datetime NOT NULL,
  `transaksi_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_siswaid`, `transaksi_ta`, `transaksi_tgl`, `transaksi_infaq`, `transaksi_akademik`, `transaksi_spp`, `transaksi_registrasi`, `transaksi_total`, `tratagih_infaq`, `tratagih_akademik`, `tratagih_registrasi`, `transaksi_created`, `transaksi_updated`) VALUES
('027c9da8a9154ba6cb898df4a60f0138', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:57:57', '2022-08-26 08:57:57'),
('0ff7e82068a425c620f7a2b67e7d0287', '23041', '2022/2023', '2023-07-12', 100000, 0, 400000, 0, 500000, 0, 230000, 300000, '2023-07-12 21:24:11', '2023-07-12 21:24:11'),
('21354c7d5a23cfa93fd641c4fd8510f0', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:57:27', '2022-08-26 08:57:27'),
('37e76901f9deae6e74485f9c34e3bbc7', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:57:17', '2022-08-26 08:57:17'),
('509f448be166b3510ac227e1dd9bf0f0', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:58:17', '2022-08-26 08:58:17'),
('603daf122d85ca79dc080a44a8932067', '23039', '2022/2023', '2022-08-26', 50000, 130000, 250000, 0, 430000, 0, 0, 200000, '2022-08-26 05:15:01', '2022-08-26 05:15:01'),
('66d7de228cbb23e4e80c01c1d74b8b1b', '74839', '2022/2023', '2022-08-26', 100000, 230000, 500000, 300000, 1130000, 0, 0, 0, '2022-08-26 07:05:38', '2022-08-26 07:05:38'),
('74b02c086648547f8042a3d566639b11', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:57:06', '2022-08-26 08:57:06'),
('77da0bd2672a4e0db6b87eb74a375b61', '74840', '2022/2023', '2022-08-25', 250000, 0, 350000, 0, 600000, 0, 320000, 360000, '2022-08-25 16:17:09', '2022-08-25 16:17:09'),
('8161947d1270b785908fd8253978914e', '23040', '2022/2023', '2022-09-04', 0, 0, 500000, 0, 500000, 50000, 130000, 150000, '2022-09-04 14:00:46', '2022-09-04 14:00:46'),
('8626b353116cb25e54d0b5188a9960a9', '23040', '2022/2023', '2022-09-04', 50000, 100000, 500000, 150000, 800000, 50000, 130000, 150000, '2022-09-04 13:37:01', '2022-09-04 13:37:01'),
('a4616d1cb983a0976d7c91d3c820692a', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:58:45', '2022-08-26 08:58:45'),
('a57db987fc6ef670fe8d42b7369d4e33', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:58:34', '2022-08-26 08:58:34'),
('a9e63b77d6f8111ae9f939586ae13f47', '23038', '2022/2023', '2022-08-22', 120000, 230000, 500000, 300000, 1150000, 0, 0, 0, '2022-08-22 15:59:05', '2022-08-22 15:59:05'),
('b6f01cd1c4ece6344912dcf4d428067d', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:58:06', '2022-08-26 08:58:06'),
('dc64d1c7ea5af778f9e6ae2446812c62', '23039', '2022/2023', '2022-08-22', 50000, 100000, 250000, 100000, 500000, 50000, 130000, 200000, '2022-08-22 15:59:55', '2022-08-22 15:59:55'),
('e3b05a951e6ba3d3aa685e1c921fbede', '74840', '2022/2023', '2022-08-25', 0, 0, 350000, 0, 350000, 250000, 320000, 360000, '2022-08-25 13:10:24', '2022-08-25 13:10:24'),
('e641ff1c9e5be3e422152e708fb69c4a', '23038', '2022/2023', '2022-08-22', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-22 16:00:33', '2022-08-22 16:00:33'),
('e84c136e286ab557b7a2e6769bab6d8a', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 05:06:02', '2022-08-26 05:06:02'),
('fffaa094b1ea134ab6ed0e6aef5e64b7', '23038', '2022/2023', '2022-08-26', 0, 0, 500000, 0, 500000, 0, 0, 0, '2022-08-26 08:58:26', '2022-08-26 08:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_bulan`
--

CREATE TABLE `tb_transaksi_bulan` (
  `trabu_id` int(11) NOT NULL,
  `trabu_bulan` int(11) NOT NULL,
  `trabu_transaksiid` varchar(255) NOT NULL,
  `trabu_siswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_bulan`
--

INSERT INTO `tb_transaksi_bulan` (`trabu_id`, `trabu_bulan`, `trabu_transaksiid`, `trabu_siswa`) VALUES
(6, 7, 'a9e63b77d6f8111ae9f939586ae13f47', '23038'),
(7, 7, 'dc64d1c7ea5af778f9e6ae2446812c62', '23039'),
(8, 8, 'e641ff1c9e5be3e422152e708fb69c4a', '23038'),
(10, 7, 'e3b05a951e6ba3d3aa685e1c921fbede', '74840'),
(11, 8, '77da0bd2672a4e0db6b87eb74a375b61', '74840'),
(12, 9, 'e84c136e286ab557b7a2e6769bab6d8a', '23038'),
(13, 8, '603daf122d85ca79dc080a44a8932067', '23039'),
(14, 9, '66d7de228cbb23e4e80c01c1d74b8b1b', '74839'),
(15, 10, '74b02c086648547f8042a3d566639b11', '23038'),
(16, 11, '37e76901f9deae6e74485f9c34e3bbc7', '23038'),
(17, 12, '21354c7d5a23cfa93fd641c4fd8510f0', '23038'),
(18, 1, '027c9da8a9154ba6cb898df4a60f0138', '23038'),
(19, 2, 'b6f01cd1c4ece6344912dcf4d428067d', '23038'),
(20, 3, '509f448be166b3510ac227e1dd9bf0f0', '23038'),
(21, 4, 'fffaa094b1ea134ab6ed0e6aef5e64b7', '23038'),
(22, 5, 'a57db987fc6ef670fe8d42b7369d4e33', '23038'),
(23, 6, 'a4616d1cb983a0976d7c91d3c820692a', '23038'),
(24, 6, '8626b353116cb25e54d0b5188a9960a9', '23040'),
(26, 7, '8161947d1270b785908fd8253978914e', '23040'),
(27, 7, '0ff7e82068a425c620f7a2b67e7d0287', '23041');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_lain`
--

CREATE TABLE `tb_transaksi_lain` (
  `trala_id` varchar(255) NOT NULL,
  `trala_tgl` date NOT NULL,
  `trala_nis` varchar(255) NOT NULL,
  `trala_jml` int(11) NOT NULL,
  `trala_ket` varchar(255) NOT NULL,
  `trala_created` datetime NOT NULL,
  `trala_ta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_lain`
--

INSERT INTO `tb_transaksi_lain` (`trala_id`, `trala_tgl`, `trala_nis`, `trala_jml`, `trala_ket`, `trala_created`, `trala_ta`) VALUES
('1da71e693b1cb34691aec0c5c7cb80e3', '2022-09-05', '23039', 100000, 'Biaya 2', '2022-09-05 08:12:00', '2022/2023'),
('58e66d76fb1b624be019c00802b9aa72', '2022-08-09', '23041', 100000, 'Seragam', '2022-08-09 13:15:59', '2022/2023'),
('661b62610dc709fff041737563953ffd', '2022-09-05', '23039', 450000, 'Seragam', '2022-09-05 09:09:49', '2022/2023'),
('745310593a7b74e79c19770127d67f67', '2022-08-24', '23038', 100000, 'Seragam', '2022-08-24 08:44:19', '2022/2023'),
('ad70745cc099a68170a1f0c5f4f00461', '2022-08-24', '23041', 50000, 'Biaya 2', '2022-08-24 08:44:02', '2022/2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_biaya_akademik`
--
ALTER TABLE `tb_biaya_akademik`
  ADD PRIMARY KEY (`baka_id`);

--
-- Indexes for table `tb_biaya_infaq`
--
ALTER TABLE `tb_biaya_infaq`
  ADD PRIMARY KEY (`binf_id`);

--
-- Indexes for table `tb_biaya_lain`
--
ALTER TABLE `tb_biaya_lain`
  ADD PRIMARY KEY (`bila_id`);

--
-- Indexes for table `tb_biaya_registrasi`
--
ALTER TABLE `tb_biaya_registrasi`
  ADD PRIMARY KEY (`bare_id`);

--
-- Indexes for table `tb_biaya_spp`
--
ALTER TABLE `tb_biaya_spp`
  ADD PRIMARY KEY (`bspp_id`);

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`bulan_id`);

--
-- Indexes for table `tb_kalender`
--
ALTER TABLE `tb_kalender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lock`
--
ALTER TABLE `tb_lock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pay_bulan`
--
ALTER TABLE `tb_pay_bulan`
  ADD PRIMARY KEY (`pb_id`);

--
-- Indexes for table `tb_pay_infaq`
--
ALTER TABLE `tb_pay_infaq`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `tb_pay_spp`
--
ALTER TABLE `tb_pay_spp`
  ADD PRIMARY KEY (`pspp_id`);

--
-- Indexes for table `tb_pembayaran_spp`
--
ALTER TABLE `tb_pembayaran_spp`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `tb_pembayaran_spp1`
--
ALTER TABLE `tb_pembayaran_spp1`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `tb_settings`
--
ALTER TABLE `tb_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`siswa_nis`),
  ADD KEY `siswa_kelas` (`siswa_kelas`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`tagihan_siswa`);

--
-- Indexes for table `tb_tagihan_spp`
--
ALTER TABLE `tb_tagihan_spp`
  ADD PRIMARY KEY (`tspp_id`);

--
-- Indexes for table `tb_tahun_pelajaran`
--
ALTER TABLE `tb_tahun_pelajaran`
  ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `FK_relationship_3` (`transaksi_siswaid`),
  ADD KEY `FK_relationship_4` (`transaksi_ta`);

--
-- Indexes for table `tb_transaksi_bulan`
--
ALTER TABLE `tb_transaksi_bulan`
  ADD PRIMARY KEY (`trabu_id`),
  ADD KEY `FK_relationship_11` (`trabu_transaksiid`),
  ADD KEY `FK_relationship_13` (`trabu_bulan`);

--
-- Indexes for table `tb_transaksi_lain`
--
ALTER TABLE `tb_transaksi_lain`
  ADD PRIMARY KEY (`trala_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_biaya_akademik`
--
ALTER TABLE `tb_biaya_akademik`
  MODIFY `baka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_biaya_infaq`
--
ALTER TABLE `tb_biaya_infaq`
  MODIFY `binf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_biaya_lain`
--
ALTER TABLE `tb_biaya_lain`
  MODIFY `bila_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_biaya_registrasi`
--
ALTER TABLE `tb_biaya_registrasi`
  MODIFY `bare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_biaya_spp`
--
ALTER TABLE `tb_biaya_spp`
  MODIFY `bspp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  MODIFY `bulan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kalender`
--
ALTER TABLE `tb_kalender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pay_bulan`
--
ALTER TABLE `tb_pay_bulan`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pay_infaq`
--
ALTER TABLE `tb_pay_infaq`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pay_spp`
--
ALTER TABLE `tb_pay_spp`
  MODIFY `pspp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pembayaran_spp`
--
ALTER TABLE `tb_pembayaran_spp`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pembayaran_spp1`
--
ALTER TABLE `tb_pembayaran_spp1`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tagihan_spp`
--
ALTER TABLE `tb_tagihan_spp`
  MODIFY `tspp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_tahun_pelajaran`
--
ALTER TABLE `tb_tahun_pelajaran`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi_bulan`
--
ALTER TABLE `tb_transaksi_bulan`
  MODIFY `trabu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
