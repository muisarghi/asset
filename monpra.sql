-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 04:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `monpra`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabbg`
--

CREATE TABLE IF NOT EXISTS `cabbg` (
`idcabbg` int(11) NOT NULL,
  `cbcabbg` varchar(255) NOT NULL,
  `nmcabbg` varchar(255) NOT NULL,
  `ketcabbg` varchar(255) NOT NULL,
  `codeuker` varchar(255) NOT NULL,
  `prt` int(11) NOT NULL,
  `ind` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabbg`
--

INSERT INTO `cabbg` (`idcabbg`, `cbcabbg`, `nmcabbg`, `ketcabbg`, `codeuker`, `prt`, `ind`) VALUES
(2, '9822', 'BG Kembangan2', 'BG Kembangan2', '02', 0, 5),
(3, '9822', 'BG Serang', 'BG Serang', '11', 0, 5),
(4, '9850', 'BG Depok', 'BG Depok', '13', 1, 0),
(5, '9822', 'BG Otistab', 'Otista', '01', 1, 0),
(6, '9825', 'BG Otista 2', 'Otista 2', '01', 0, 7),
(7, '9825', 'BG Kembangan', 'BG Kembangan', '02', 1, 0),
(8, '9825', 'BG Serang2', 'BG Serang2', '11', 0, 7),
(9, '9822', 'BG Depok2', 'BG Depok2', '13', 0, 5),
(10, '9825', 'BG Depok3', 'BG Depok3', '13', 0, 7),
(11, '9850', 'BG Serang3', 'BG Serang3', '11', 0, 4),
(12, '9850', 'BG Kembangan3', 'Bg Kembangan3', '02', 0, 4),
(13, '9850', 'Bg Otista 3', 'Otista 3', '01', 0, 4),
(14, '9822', 'BG Bekasi', 'BG Bekasi', '14', 0, 5),
(15, '9850', 'BG Bekasi 2', 'BG Bekasi 2', '14', 0, 4),
(16, '9825', 'BG Bekasi 3', 'BG Bekasi 3', '14', 0, 7),
(17, '9839', 'BG Bandung', 'BG Bandung', '03', 1, 0),
(18, '9854', 'BG Purwokerto', 'BG Purwokerto', '17', 1, 0),
(19, '9844', 'BG Cirebon', 'BG Cirebon', '10', 1, 0),
(20, '9851', 'BG Semarang', 'BG Semarang', '12', 1, 0),
(21, '9853', 'BG Pemalang', 'BG Pemalang', '16', 1, 0),
(22, '9836', 'BG Malang', 'BG Malang', '04', 1, 0),
(23, '9840', 'BG Surabaya', 'BG Surabaya', '05', 1, 0),
(24, '9842', 'BG Medan', 'BG Medan', '06', 1, 0),
(25, '9845', 'BG Solo', 'BG Solo', '09', 1, 0),
(26, '9838', 'BG Palembang', 'BG Palembang', '07', 1, 0),
(27, '9843', 'BG Tulung Agung', 'BG Tulung Agung', '08', 1, 0),
(28, '9852', 'BG PATI', 'BG PATI', '15', 1, 0),
(29, '9855', 'BG TASIK MALAYA', 'BG TASIK MALAYA', '18', 1, 0),
(30, '9888', 'Bg Kepanjen', 'Panjen', '30', 1, 0),
(31, '9890', 'Bg Kepanjen2', 'Panjen2', '31', 1, 0),
(32, '9888', 'Bg Kepanjen3', 'Panjen3', '32', 1, 0),
(33, '98988', 'coba', 'coba', '90', 1, 0),
(34, '98988', 'coba', 'coba', '90', 1, 0),
(37, '5445', 'as', 'sdas', '445', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cctv`
--

CREATE TABLE IF NOT EXISTS `cctv` (
`id_cctv` int(12) NOT NULL,
  `codeuker` varchar(5) NOT NULL,
  `tgl_cctv` date NOT NULL,
  `periode_cctv` varchar(12) NOT NULL,
  `jml_cctv` int(11) NOT NULL,
  `cctva` int(11) NOT NULL,
  `cctvb` int(11) NOT NULL,
  `dvra` int(11) NOT NULL,
  `dvrb` int(11) NOT NULL,
  `adaptora` int(11) NOT NULL,
  `adaptorb` int(11) NOT NULL,
  `cek_cctv` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cctv`
--

INSERT INTO `cctv` (`id_cctv`, `codeuker`, `tgl_cctv`, `periode_cctv`, `jml_cctv`, `cctva`, `cctvb`, `dvra`, `dvrb`, `adaptora`, `adaptorb`, `cek_cctv`) VALUES
(1, '04', '2019-02-21', '3-2-2019', 300, 100, 10, 50, 10, 30, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dana`
--

CREATE TABLE IF NOT EXISTS `dana` (
`id_dana` int(11) NOT NULL,
  `codeuker` varchar(4) NOT NULL,
  `tgl_dana` datetime NOT NULL,
  `periode_dana` varchar(12) NOT NULL,
  `tgl_drop` date NOT NULL,
  `jml_dana` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dana`
--

INSERT INTO `dana` (`id_dana`, `codeuker`, `tgl_dana`, `periode_dana`, `tgl_drop`, `jml_dana`) VALUES
(1, '04', '2019-02-25 02:45:11', '4-2-2019', '2019-02-01', 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `doktk`
--

CREATE TABLE IF NOT EXISTS `doktk` (
`id_doktk` int(11) NOT NULL,
  `codeuker` varchar(5) NOT NULL,
  `tgl_doktk` date NOT NULL,
  `tka` bigint(20) NOT NULL,
  `tkb` bigint(20) NOT NULL,
  `tkc` bigint(20) NOT NULL,
  `totaltk` bigint(20) NOT NULL,
  `kettk` varchar(100) NOT NULL,
  `cek_doktk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doktk`
--

INSERT INTO `doktk` (`id_doktk`, `codeuker`, `tgl_doktk`, `tka`, `tkb`, `tkc`, `totaltk`, `kettk`, `cek_doktk`) VALUES
(1, '04', '2018-12-18', 1, 2, 3, 6, 'Lengkap', 1),
(2, '04', '2018-12-24', 1200, 1300, 1400, 3900, 'Lengkap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gps`
--

CREATE TABLE IF NOT EXISTS `gps` (
`id_gps` int(11) NOT NULL,
  `codeuker` varchar(6) NOT NULL,
  `tgl_gps` date NOT NULL,
  `periode_gps` varchar(12) NOT NULL,
  `kendaraan` int(10) NOT NULL,
  `gps` int(2) NOT NULL,
  `nogps` int(2) NOT NULL,
  `gps_rsk` int(2) NOT NULL,
  `app_aktif` int(2) NOT NULL,
  `user_blokir` int(2) NOT NULL,
  `blok_kkl` int(2) NOT NULL,
  `blok_wakl` int(2) NOT NULL,
  `blok_spv` int(2) NOT NULL,
  `cek_gps` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kl`
--

CREATE TABLE IF NOT EXISTS `kl` (
`idkl` int(11) NOT NULL,
  `namakl` varchar(200) NOT NULL,
  `codebranch` varchar(20) NOT NULL,
  `codeuker` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kl`
--

INSERT INTO `kl` (`idkl`, `namakl`, `codebranch`, `codeuker`) VALUES
(1, 'Otista', '9833', '01'),
(2, 'Kembangan', '9834', '02'),
(3, 'Bandung', '9835', '03'),
(4, 'Malang', '9836', '04'),
(7, 'Tulungagung', '9837', '05');

-- --------------------------------------------------------

--
-- Table structure for table `kunci`
--

CREATE TABLE IF NOT EXISTS `kunci` (
`id_kunci` int(11) NOT NULL,
  `codeuker` varchar(5) NOT NULL,
  `tgl_kunci` date NOT NULL,
  `leader_kunci` varchar(255) NOT NULL,
  `rpl_kunci` int(11) NOT NULL,
  `flm_kunci` int(11) NOT NULL,
  `cad_kunci` int(11) NOT NULL,
  `cek_kunci` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunci`
--

INSERT INTO `kunci` (`id_kunci`, `codeuker`, `tgl_kunci`, `leader_kunci`, `rpl_kunci`, `flm_kunci`, `cad_kunci`, `cek_kunci`) VALUES
(2, '04', '2019-01-10', 'roy0', 10, 20, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE IF NOT EXISTS `lembur` (
`id_lembur` int(11) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `codeuker` varchar(4) NOT NULL,
  `lembura` int(2) NOT NULL,
  `lemburb` int(2) NOT NULL,
  `lemburc` int(2) NOT NULL,
  `cek_lembur` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`id_lembur`, `tgl_lembur`, `codeuker`, `lembura`, `lemburb`, `lemburc`, `cek_lembur`) VALUES
(4, '2019-01-10', '04', 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE IF NOT EXISTS `part` (
`id_part` int(11) NOT NULL,
  `tgl_part` date NOT NULL,
  `codeuker` varchar(6) NOT NULL,
  `keluar_part` varchar(200) NOT NULL,
  `guna_part` varchar(200) NOT NULL,
  `jml_slm` int(11) NOT NULL,
  `slm_parta` int(11) NOT NULL,
  `slm_partb` int(11) NOT NULL,
  `lap_teknisi` varchar(20) NOT NULL,
  `jml_lapteknisia` int(11) NOT NULL,
  `jml_lapteknisib` int(11) NOT NULL,
  `cek_part` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`id_part`, `tgl_part`, `codeuker`, `keluar_part`, `guna_part`, `jml_slm`, `slm_parta`, `slm_partb`, `lap_teknisi`, `jml_lapteknisia`, `jml_lapteknisib`, `cek_part`) VALUES
(1, '2019-01-04', '04', 'Ada', 'Sesuai', 10, 1, 9, 'Ada', 8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reli`
--

CREATE TABLE IF NOT EXISTS `reli` (
`id_reli` int(11) NOT NULL,
  `tgl_reli` datetime NOT NULL,
  `codeuker` varchar(5) NOT NULL,
  `reli99` varchar(20) NOT NULL,
  `ket_reli` varchar(255) NOT NULL,
  `cek_reli` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reli`
--

INSERT INTO `reli` (`id_reli`, `tgl_reli`, `codeuker`, `reli99`, `ket_reli`, `cek_reli`) VALUES
(1, '2018-12-19 08:48:21', '04', 'Ya', 'CO 3 lokasi', 1),
(3, '2018-12-20 05:37:48', '04', 'Ya', 'Kekurangan Opname Kas BB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `relidata`
--

CREATE TABLE IF NOT EXISTS `relidata` (
`id_relidata` int(11) NOT NULL,
  `id_reli` int(11) NOT NULL,
  `captjam` varchar(2) NOT NULL,
  `captdata` float NOT NULL,
  `daptket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reliday`
--

CREATE TABLE IF NOT EXISTS `reliday` (
`id_reliday` int(11) NOT NULL,
  `tgl_reliday` date NOT NULL,
  `codeuker` varchar(6) NOT NULL,
  `capt0` float NOT NULL,
  `ket0` varchar(255) NOT NULL,
  `capt3` float NOT NULL,
  `ket3` varchar(255) NOT NULL,
  `capt6` float NOT NULL,
  `ket6` varchar(255) NOT NULL,
  `capt9` float NOT NULL,
  `ket9` varchar(255) NOT NULL,
  `capt12` float NOT NULL,
  `ket12` varchar(255) NOT NULL,
  `capt15` float NOT NULL,
  `ket15` varchar(255) NOT NULL,
  `capt18` float NOT NULL,
  `ket18` varchar(255) NOT NULL,
  `capt21` float NOT NULL,
  `ket21` varchar(255) NOT NULL,
  `cek_reliday` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reliday`
--

INSERT INTO `reliday` (`id_reliday`, `tgl_reliday`, `codeuker`, `capt0`, `ket0`, `capt3`, `ket3`, `capt6`, `ket6`, `capt9`, `ket9`, `capt12`, `ket12`, `capt15`, `ket15`, `capt18`, `ket18`, `capt21`, `ket21`, `cek_reliday`) VALUES
(1, '2019-01-22', '04', 99.98, ' aaa', 0, ' ', 0, ' ', 0, ' ', 0, ' ', 0, ' ', 0, ' ', 0, ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE IF NOT EXISTS `saldo` (
`id_saldo` int(11) NOT NULL,
  `codeuker` varchar(5) NOT NULL,
  `tgl_saldo` date NOT NULL,
  `jns_saldo` varchar(255) NOT NULL,
  `saldoa` bigint(20) NOT NULL,
  `saldob` bigint(20) NOT NULL,
  `saldoc` bigint(20) NOT NULL,
  `saldotot` bigint(20) NOT NULL,
  `cek_saldo` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `codeuker`, `tgl_saldo`, `jns_saldo`, `saldoa`, `saldob`, `saldoc`, `saldotot`, `cek_saldo`) VALUES
(2, '04', '2018-12-18', 'dsr', 1000000000, 1000000000, 1000000000, 3000000000, 1),
(3, '04', '2018-12-19', 'app', 2000000000, 2000000000, 2000000000, 6000000000, 1),
(4, '04', '2018-12-17', 'bb', 3000000000, 3000000000, 3000000000, 9000000000, 1),
(15, '04', '2018-12-20', 'app', 2000000000, 4000000000, 5000000000, 11000000000, 1),
(16, '04', '2018-12-20', 'dsr', 1300000000, 2400000000, 3500000000, 7200000000, 1),
(17, '04', '2018-12-20', 'bb', 1200000000, 1200000000, 1200000000, 3600000000, 1),
(18, '04', '2018-12-21', 'bb', 60, 70, 80, 210, 1);

-- --------------------------------------------------------

--
-- Table structure for table `saldokeg`
--

CREATE TABLE IF NOT EXISTS `saldokeg` (
`id_saldokeg` int(11) NOT NULL,
  `codeuker` varchar(6) NOT NULL,
  `tgl_saldokeg` date NOT NULL,
  `kas_keg` bigint(20) NOT NULL,
  `kas_erp` bigint(20) NOT NULL,
  `giro_rek` bigint(20) NOT NULL,
  `giro_erp` bigint(20) NOT NULL,
  `persekot` bigint(20) NOT NULL,
  `cek_saldokeg` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldokeg`
--

INSERT INTO `saldokeg` (`id_saldokeg`, `codeuker`, `tgl_saldokeg`, `kas_keg`, `kas_erp`, `giro_rek`, `giro_erp`, `persekot`, `cek_saldokeg`) VALUES
(1, '04', '2019-01-14', 12000000, 12000000, 22000000, 22000000, 32000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanggah`
--

CREATE TABLE IF NOT EXISTS `sanggah` (
`id_sanggah` int(11) NOT NULL,
  `codeuker` varchar(5) NOT NULL,
  `tgl_sanggah` datetime NOT NULL,
  `periode_sanggah` varchar(12) NOT NULL,
  `periodea` date NOT NULL,
  `periodeb` date NOT NULL,
  `status_sanggah` varchar(255) NOT NULL,
  `approve` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanggah`
--

INSERT INTO `sanggah` (`id_sanggah`, `codeuker`, `tgl_sanggah`, `periode_sanggah`, `periodea`, `periodeb`, `status_sanggah`, `approve`) VALUES
(1, '04', '2019-02-27 00:00:00', '4-2-2019', '2019-02-01', '2019-02-10', 'Lengkap', 'ROKI');

-- --------------------------------------------------------

--
-- Table structure for table `selisih`
--

CREATE TABLE IF NOT EXISTS `selisih` (
`id_selisih` int(11) NOT NULL,
  `codeuker` varchar(5) NOT NULL,
  `tgl_selisih` date NOT NULL,
  `jns_selisih` varchar(100) NOT NULL,
  `selisih` int(3) NOT NULL,
  `klarifikasi` int(11) NOT NULL,
  `leader` varchar(255) NOT NULL,
  `cek_selisih` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selisih`
--

INSERT INTO `selisih` (`id_selisih`, `codeuker`, `tgl_selisih`, `jns_selisih`, `selisih`, `klarifikasi`, `leader`, `cek_selisih`) VALUES
(16, '04', '2018-12-17', 'shortage', 1, 0, '-', 1),
(17, '04', '2018-12-17', 'surplus', 1, 1, 'Roky', 1),
(18, '04', '2018-12-24', 'shortage', 1, 0, '-', 1),
(19, '04', '2018-12-27', 'shortage', 1, 0, '-', 1),
(26, '04', '2018-12-27', 'surplus', 1, 1, 'ASEq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `selisihdata`
--

CREATE TABLE IF NOT EXISTS `selisihdata` (
`id_selisihdata` int(11) NOT NULL,
  `id_selisih` int(11) NOT NULL,
  `ket_selisihdata` varchar(255) NOT NULL,
  `selisiha` bigint(20) NOT NULL,
  `selisihb` bigint(20) NOT NULL,
  `selisihc` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selisihdata`
--

INSERT INTO `selisihdata` (`id_selisihdata`, `id_selisih`, `ket_selisihdata`, `selisiha`, `selisihb`, `selisihc`) VALUES
(30, 16, 'Indikasi Vandal', 1, 2, 3),
(31, 16, 'Salah Denom', 4, 5, 6),
(32, 17, 'Surplus Pengembalian Nasabah', 4, 5, 7),
(33, 17, 'Surplus Salah Denom', 8, 3, 1),
(34, 18, 'Indikasi Vandal', 2, 3, 1),
(35, 18, 'Kerusakan Mesin', 1, 2, 3),
(56, 26, 'Surplus Kaset', 999, 899, 799),
(57, 26, 'Surplus Pengembalian Nasabah', 199, 299, 99);

-- --------------------------------------------------------

--
-- Table structure for table `selisihreg`
--

CREATE TABLE IF NOT EXISTS `selisihreg` (
`id_selisihreg` int(11) NOT NULL,
  `tgl_selisihreg` date NOT NULL,
  `codeuker` varchar(11) NOT NULL,
  `aatm` bigint(20) NOT NULL,
  `batm` bigint(20) NOT NULL,
  `catm` bigint(20) NOT NULL,
  `atk` bigint(20) NOT NULL,
  `btk` bigint(20) NOT NULL,
  `ctk` bigint(20) NOT NULL,
  `cek_selisihreg` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selisihreg`
--

INSERT INTO `selisihreg` (`id_selisihreg`, `tgl_selisihreg`, `codeuker`, `aatm`, `batm`, `catm`, `atk`, `btk`, `ctk`, `cek_selisihreg`) VALUES
(1, '2019-01-02', '04', 10, 20, 30, 40, 50, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surplus`
--

CREATE TABLE IF NOT EXISTS `surplus` (
  `id_surplus` int(11) NOT NULL DEFAULT '0',
  `codeuker` varchar(5) NOT NULL,
  `tgl_surplus` date NOT NULL,
  `surplus` varchar(100) NOT NULL,
  `jns_surplus` varchar(255) NOT NULL,
  `surplusa` bigint(20) NOT NULL,
  `surplusb` bigint(20) NOT NULL,
  `surplusc` bigint(20) NOT NULL,
  `surplustot` bigint(20) NOT NULL,
  `cek_surplus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`iduser` int(11) NOT NULL,
  `namauser` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `akses` varchar(200) NOT NULL,
  `ketuser` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`, `akses`, `ketuser`, `jabatan`) VALUES
(1, 'admin', '000000', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', '0', ''),
(2, 'RT Malang', '040404', 'e10adc3949ba59abbe56e057f20f883e', 'kl', '22', ''),
(3, 'Pusat', '111111', 'e10adc3949ba59abbe56e057f20f883e', 'kp', 'kp', ''),
(4, 'admin2', '999999', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', '0', ''),
(5, 'Pusat2', '222222', 'e10adc3949ba59abbe56e057f20f883e', 'kp', 'kp', ''),
(6, 'RT Bandung', '030303', 'e10adc3949ba59abbe56e057f20f883e', 'kl', '17', ''),
(8, 'Malang01', 'malang01', 'e10adc3949ba59abbe56e057f20f883e', 'kl', '4', 'KKL');

-- --------------------------------------------------------

--
-- Table structure for table `utle`
--

CREATE TABLE IF NOT EXISTS `utle` (
`id_utle` int(11) NOT NULL,
  `codeuker` varchar(10) NOT NULL,
  `tgl_utle` date NOT NULL,
  `periode_utle` varchar(20) NOT NULL,
  `utlea` bigint(20) NOT NULL,
  `utleb` bigint(20) NOT NULL,
  `utlec` bigint(20) NOT NULL,
  `utlekr` int(2) NOT NULL,
  `utlekra` bigint(20) NOT NULL,
  `utlekrb` bigint(20) NOT NULL,
  `utlekrc` bigint(20) NOT NULL,
  `utletr` int(2) NOT NULL,
  `utletra` bigint(20) NOT NULL,
  `utletrb` bigint(20) NOT NULL,
  `utletrc` bigint(20) NOT NULL,
  `cek_utle` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utle`
--

INSERT INTO `utle` (`id_utle`, `codeuker`, `tgl_utle`, `periode_utle`, `utlea`, `utleb`, `utlec`, `utlekr`, `utlekra`, `utlekrb`, `utlekrc`, `utletr`, `utletra`, `utletrb`, `utletrc`, `cek_utle`) VALUES
(2, '04', '2019-01-31', '4-1-2019', 22000000, 550000000, 1100000000, 0, 0, 0, 0, 1, 20000000, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabbg`
--
ALTER TABLE `cabbg`
 ADD PRIMARY KEY (`idcabbg`);

--
-- Indexes for table `cctv`
--
ALTER TABLE `cctv`
 ADD PRIMARY KEY (`id_cctv`);

--
-- Indexes for table `dana`
--
ALTER TABLE `dana`
 ADD PRIMARY KEY (`id_dana`);

--
-- Indexes for table `doktk`
--
ALTER TABLE `doktk`
 ADD PRIMARY KEY (`id_doktk`);

--
-- Indexes for table `gps`
--
ALTER TABLE `gps`
 ADD PRIMARY KEY (`id_gps`);

--
-- Indexes for table `kl`
--
ALTER TABLE `kl`
 ADD PRIMARY KEY (`idkl`);

--
-- Indexes for table `kunci`
--
ALTER TABLE `kunci`
 ADD PRIMARY KEY (`id_kunci`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
 ADD PRIMARY KEY (`id_lembur`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
 ADD PRIMARY KEY (`id_part`);

--
-- Indexes for table `reli`
--
ALTER TABLE `reli`
 ADD PRIMARY KEY (`id_reli`);

--
-- Indexes for table `relidata`
--
ALTER TABLE `relidata`
 ADD PRIMARY KEY (`id_relidata`);

--
-- Indexes for table `reliday`
--
ALTER TABLE `reliday`
 ADD PRIMARY KEY (`id_reliday`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
 ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `saldokeg`
--
ALTER TABLE `saldokeg`
 ADD PRIMARY KEY (`id_saldokeg`);

--
-- Indexes for table `sanggah`
--
ALTER TABLE `sanggah`
 ADD PRIMARY KEY (`id_sanggah`);

--
-- Indexes for table `selisih`
--
ALTER TABLE `selisih`
 ADD PRIMARY KEY (`id_selisih`);

--
-- Indexes for table `selisihdata`
--
ALTER TABLE `selisihdata`
 ADD PRIMARY KEY (`id_selisihdata`);

--
-- Indexes for table `selisihreg`
--
ALTER TABLE `selisihreg`
 ADD PRIMARY KEY (`id_selisihreg`);

--
-- Indexes for table `surplus`
--
ALTER TABLE `surplus`
 ADD PRIMARY KEY (`id_surplus`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `utle`
--
ALTER TABLE `utle`
 ADD PRIMARY KEY (`id_utle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabbg`
--
ALTER TABLE `cabbg`
MODIFY `idcabbg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `cctv`
--
ALTER TABLE `cctv`
MODIFY `id_cctv` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dana`
--
ALTER TABLE `dana`
MODIFY `id_dana` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `doktk`
--
ALTER TABLE `doktk`
MODIFY `id_doktk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gps`
--
ALTER TABLE `gps`
MODIFY `id_gps` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kl`
--
ALTER TABLE `kl`
MODIFY `idkl` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kunci`
--
ALTER TABLE `kunci`
MODIFY `id_kunci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lembur`
--
ALTER TABLE `lembur`
MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reli`
--
ALTER TABLE `reli`
MODIFY `id_reli` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `relidata`
--
ALTER TABLE `relidata`
MODIFY `id_relidata` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reliday`
--
ALTER TABLE `reliday`
MODIFY `id_reliday` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `saldokeg`
--
ALTER TABLE `saldokeg`
MODIFY `id_saldokeg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sanggah`
--
ALTER TABLE `sanggah`
MODIFY `id_sanggah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `selisih`
--
ALTER TABLE `selisih`
MODIFY `id_selisih` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `selisihdata`
--
ALTER TABLE `selisihdata`
MODIFY `id_selisihdata` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `selisihreg`
--
ALTER TABLE `selisihreg`
MODIFY `id_selisihreg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `utle`
--
ALTER TABLE `utle`
MODIFY `id_utle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
