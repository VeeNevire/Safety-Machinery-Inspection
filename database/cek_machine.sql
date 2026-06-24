-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 03:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cek_machine`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(23) NOT NULL,
  `nama_lokasi` varchar(230) NOT NULL,
  `nama_department` varchar(123) NOT NULL,
  `no_mesin` varchar(2342) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(1223) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `nama_lokasi`, `nama_department`, `no_mesin`, `tanggal`, `status`) VALUES
(28, 'MTC', 'WORKSHOP', 'Mesin Las Daiden 1', '2024-09-30', 'belum selesai'),
(29, 'MTC', 'WORKSHOP', 'Mesin Las Daiden 2', '2024-09-30', 'belum selesai'),
(51, 'FA', 'Line 01', 'Cross cut Jamb 01', '2024-11-30', 'belum selesai'),
(52, 'FA', 'Line 01', 'Rip Saw II', '2024-11-30', 'belum selesai');

-- --------------------------------------------------------

--
-- Table structure for table `data_mesin`
--

CREATE TABLE `data_mesin` (
  `id` int(23) NOT NULL,
  `no_mesin` varchar(1230) NOT NULL,
  `nama_mesin` varchar(1234) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_lokasi` varchar(123) NOT NULL,
  `nama_department` varchar(123) NOT NULL,
  `safety_cover` varchar(1234) NOT NULL,
  `emergency_stop` varchar(1234) NOT NULL,
  `sensor` varchar(1234) NOT NULL,
  `titik_potong` varchar(1234) NOT NULL,
  `titik_pentalan` varchar(1234) NOT NULL,
  `titik_jepit` varchar(1234) NOT NULL,
  `pelindung_lain_jika_ada` varchar(1234) NOT NULL,
  `terlindung_dari_potensi_bahaya` varchar(1234) NOT NULL,
  `tag_loto_di_mesin` varchar(1234) NOT NULL,
  `keterangan_tambahan` varchar(1234) NOT NULL,
  `mesin_pernah_kecelakaan_kerja` varchar(111) NOT NULL,
  `perbaikan_pelindung_mesin` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_mesin`
--

INSERT INTO `data_mesin` (`id`, `no_mesin`, `nama_mesin`, `tanggal`, `nama_lokasi`, `nama_department`, `safety_cover`, `emergency_stop`, `sensor`, `titik_potong`, `titik_pentalan`, `titik_jepit`, `pelindung_lain_jika_ada`, `terlindung_dari_potensi_bahaya`, `tag_loto_di_mesin`, `keterangan_tambahan`, `mesin_pernah_kecelakaan_kerja`, `perbaikan_pelindung_mesin`) VALUES
(16, 'MSN001', 'Cross cut Jamb 01', '2024-10-16', 'FA', 'Line 01', 'baik', 'baik', '', 'ada', 'ada', 'ada', 'Cover atas samping', 'ya', 'ada', '', 'tidak', 'tidak'),
(17, 'MSN002', 'Cross cut Jamb 02', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'MSN003', 'Spindle 01 Jamb', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'MSN004', 'Radial Armsaw01', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'MSN005', 'Radial Armsaw02', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'MSN006', 'Radial Armsaw03', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'MSN007', 'Bandsaw Horisontal', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'MSN008', 'Longitudinal Giollotine (Veneer)', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'MSN009', 'Spicling (veneer)-01', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'MSN010', 'Cassati-1', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'MSN011', 'Gaujing', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'MSN012', 'Mittersaw/ Dropsaw', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'MSN013', 'Powermet 1', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'MSN014', 'Rip Saw I', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'MSN015', 'Rip Saw II', '2024-10-16', 'FA', 'Line 01', 'baik', 'baik', '', 'ada', 'ada', 'ada', 'Terdapat pelindung sisir di bagian input', 'ya', 'ada', '', 'tidak', 'tidak'),
(31, 'MSN016', 'Cross cut 03', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 'MSN017', 'Hot Press', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'MSN018', 'Scissor Lift out', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'MSN019', 'Roll Glue', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 'MSN020', 'DMC (kalibrasi) 01', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, 'MSN021', 'Scissor Lift In', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, 'MSN022', 'DMC (kalibrasi) 02', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 'MSN023', 'Scissor Lift out', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 'MSN024', 'Air Frame 01', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'MSN025', 'Roll Glue 01', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, 'MSN026', 'Air Frame 02', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, 'MSN027', 'HF Encaps /Large panel', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, 'MSN028', 'Roll Glue 03', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, 'MSN029', 'HF JCL Laminating', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, 'MSN030', 'Radial Armsaw', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, 'MSN031', 'Roll Glue HF JCL laminating', '0000-00-00', 'FA', 'Line 02', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, 'MSN032', 'Powermet II', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 'MSN033', 'Scissor Lift  In', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, 'MSN034', 'Cut Saw Optimizer', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, 'MSN035', 'Scissor Lift  In', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, 'MSN036', 'Leadermax', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 'MSN037', 'Scissor Lift  In', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, 'MSN038', 'Stacking mesin Out', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, 'MSN039', 'Spindle -01', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, 'MSN040', 'Spindle -02', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, 'MSN041', 'Spindle -03', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 'MSN042', 'Spindle -04', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 'MSN043', 'Sanding Time Saver', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, 'MSN044', 'DET I', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, 'MSN045', 'Scissor Lift In', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 'MSN046', 'DET II', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 'MSN047', 'Scissor Lift In', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 'MSN048', 'Borring manual', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 'MSN049', 'Koch Borring', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'MSN050', 'Scissor Lift In', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 'MSN051', 'Hydromet II', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 'MSN052', 'Stacking mesin Out', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, 'MSN053', 'Lock Hole/Flat Hole', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 'MSN054', '5 in 1', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, 'MSN055', 'Scissor Lift In', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, 'MSN056', 'Schelling 01', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, 'MSN057', 'Schelling 02', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, 'MSN058', 'Scissor Lift Out', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, 'MSN059', 'Cramping -01', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, 'MSN060', 'Taylor-01', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, 'MSN061', 'Table Conveyor', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, 'MSN062', 'HF-01', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, 'MSN063', 'HF-02', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, 'MSN064', 'DET Cramping', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, 'MSN065', 'Scissor Lift In', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, 'MSN066', 'Stacking mesin Input', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 'MSN067', 'Conveyor DET', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, 'MSN068', 'Sanding Cramping 01', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, 'MSN069', 'Sanding Cramping 02', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 'MSN070', 'Conveyor Sanding Cramping', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, 'MSN071', 'Mesin Vacum Stacking', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 'MSN072', 'Cramping -02', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, 'MSN073', 'Scissor Lift In', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, 'MSN074', 'Taylor-02', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, 'MSN075', 'Scissor Lift Out', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 'MSN076', 'Post Clamp Cramping', '0000-00-00', 'FC', 'Glass store', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, 'MSN077', 'Mesin Assembly Cramping', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 'MSN078', 'Spindle ASS 1', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, 'MSN079', 'Spindle ASS 2', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, 'MSN080', 'Spindle Sliding', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, 'MSN081', 'Murtiser ( rail ) ex', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, 'MSN082', 'Murtiser ( stile ) ex', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, 'MSN083', 'Halving -01', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, 'MSN084', 'Halving -02', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, 'MSN085', 'BandSaw Vertical', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, 'MSN086', 'Spindle Arch', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, 'MSN087', 'Bracing Brus', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, 'MSN088', 'Borring  Stille', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, 'MSN089', 'Borring Tenon rail', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, 'MSN090', 'Mittersaw /Dropsaw', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, 'MSN091', 'Table Saw', '0000-00-00', 'FA', 'OFFLINE', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, 'MSN092', 'Machine potong plastik', '0000-00-00', 'FC', 'Glass store', '', '', '', '', '', '', '', '', '', '', '', ''),
(108, 'MSN093', 'Machine pembungkus plastik 1', '0000-00-00', 'FC', 'Glass store', '', '', '', '', '', '', '', '', '', '', '', ''),
(109, 'MSN094', 'Machine pembungkus plastick 2', '0000-00-00', 'FC', 'Glass store', '', '', '', '', '', '', '', '', '', '', '', ''),
(110, 'MSN095', 'Machine pembungkus plastick 3', '0000-00-00', 'FC', 'Glass store', '', '', '', '', '', '', '', '', '', '', '', ''),
(111, 'MSN096', 'Machine pembungkus plastick 4', '0000-00-00', 'FC', 'Glass store', '', '', '', '', '', '', '', '', '', '', '', ''),
(112, 'MSN097', 'Rak Stacking Kaca', '0000-00-00', 'FC', 'Glass store', '', '', '', '', '', '', '', '', '', '', '', ''),
(113, 'MSN098', 'Rak Etalase susun kaca', '0000-00-00', 'FC', 'Glass store', '', '', '', '', '', '', '', '', '', '', '', ''),
(114, 'MSN099', 'Distribusi', '0000-00-00', 'FC', 'Warehouse', '', '', '', '', '', '', '', '', '', '', '', ''),
(115, 'MSN100', 'Mesin Stacking manual', '0000-00-00', 'FC', 'Warehouse', '', '', '', '', '', '', '', '', '', '', '', ''),
(116, 'MSN101', 'Rak penyimpanan Plastik Film', '0000-00-00', 'FC', 'Warehouse', '', '', '', '', '', '', '', '', '', '', '', ''),
(117, 'MSN102', 'Kompresor Unloading', '0000-00-00', 'FC', 'Warehouse', '', '', '', '', '', '', '', '', '', '', '', ''),
(118, 'MSN103', 'Unloading Eksport', '0000-00-00', 'FC', 'Warehouse', '', '', '', '', '', '', '', '', '', '', '', ''),
(119, 'MSN104', 'Area tumpukan material pintu', '0000-00-00', 'FC', 'Warehouse', '', '', '', '', '', '', '', '', '', '', '', ''),
(120, 'MSN105', 'Mobilitas Kontainer parkir', '0000-00-00', 'FC', 'Warehouse', '', '', '', '', '', '', '', '', '', '', '', ''),
(121, 'MSN106', 'Radial Armsaw ', '0000-00-00', 'FC', 'Crating', '', '', '', '', '', '', '', '', '', '', '', ''),
(122, 'MSN107', 'Cross cut ', '0000-00-00', 'FC', 'Crating', '', '', '', '', '', '', '', '', '', '', '', ''),
(123, 'MSN108', 'Blower manual', '0000-00-00', 'FC', 'Crating', '', '', '', '', '', '', '', '', '', '', '', ''),
(124, 'MSN109', 'Nail Gun pallet 01', '0000-00-00', 'FC', 'Crating', '', '', '', '', '', '', '', '', '', '', '', ''),
(125, 'MSN110', 'Nail Gun pallet 02', '0000-00-00', 'FC', 'Crating', '', '', '', '', '', '', '', '', '', '', '', ''),
(126, 'MSN111', 'Nail Gun pallet 03', '0000-00-00', 'FC', 'Crating', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, 'MSN112', 'Joining frams 1', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, 'MSN113', 'Joining frams 2', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(129, 'MSN114', 'Joining frams 3', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(130, 'MSN115', 'Mitra saw 01', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(131, 'MSN116', 'Mitra saw 02', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(132, 'MSN117', 'Giollotine ( glass bead/ms )', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(133, 'MSN118', 'Hand saw makita ( potong frams )01', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, 'MSN119', 'Mittersaw/ Dropsaw', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, 'MSN120', 'Bracing Brus', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, 'MSN121', 'Shrink wrapping', '0000-00-00', 'FA', 'Line 01 frams area', '', '', '', '', '', '', '', '', '', '', '', ''),
(137, 'MSN122', 'Giollotine ( glass bead ) 01', '0000-00-00', 'FB', 'FINISING', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, 'MSN123', 'Giollotine ( glass bead ) 02', '0000-00-00', 'FB', 'FINISING', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, 'MSN124', 'Gun Steples Type i  Max (01-10)', '0000-00-00', 'FB', 'FINISING', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, 'MSN125', 'Cutter Retrac', '0000-00-00', 'FB', 'FINISING', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, 'MSN126', 'Membran Press', '0000-00-00', 'FB', 'Line 05', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, 'MSN127', 'Roll Glue 01', '0000-00-00', 'FB', 'Line 05', '', '', '', '', '', '', '', '', '', '', '', ''),
(143, 'MSN128', 'Hotpress', '0000-00-00', 'FB', 'Line 05', '', '', '', '', '', '', '', '', '', '', '', ''),
(144, 'MSN129', 'Roll Glue 02', '0000-00-00', 'FB', 'Line 05', '', '', '', '', '', '', '', '', '', '', '', ''),
(145, 'MSN130', 'Delaypress', '0000-00-00', 'FB', 'Line 05', '', '', '', '', '', '', '', '', '', '', '', ''),
(146, 'MSN131', 'Roll Glue 03', '0000-00-00', 'FB', 'Line 05', '', '', '', '', '', '', '', '', '', '', '', ''),
(147, 'MSN132', 'COLL FRESS MH 3248X50 ( 01 )', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(148, 'MSN133', 'COLL FRESS MH 3248X50 ( 02 )', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, 'MSN134', 'COLL FRESS MH 3248X50 (03 )', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(150, 'MSN135', 'Roll Glue  Pollybase', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(151, 'MSN136', 'DET Trimming 01', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(152, 'MSN137', 'Stacking mesin input', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(153, 'MSN138', 'Scissor Lift In', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(154, 'MSN139', 'DET Trimming 02', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(155, 'MSN140', 'Scissor Lift Out', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(156, 'MSN141', 'C.N.C Ruter -01', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, 'MSN142', 'C.N.C Ruter -02', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, 'MSN143', 'Scissor Lift -02', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, 'MSN144', 'C.N.C Ruter -03', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(160, 'MSN145', 'Scissor Lift-03', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, 'MSN146', 'C.N.C Ruter -04', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(162, 'MSN147', 'Scissor Lift-04', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(163, 'MSN148', 'CNC router 5 ( refair pintu )', '0000-00-00', 'FB', 'LINE 6 ', '', '', '', '', '', '', '', '', '', '', '', ''),
(164, 'MSN149', 'Spindle ', '0000-00-00', 'FB', 'GEDUNG SAMPLE MAKER', '', '', '', '', '', '', '', '', '', '', '', ''),
(165, 'MSN150', 'Table saw', '0000-00-00', 'FB', 'GEDUNG SAMPLE MAKER', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, 'MSN151', 'Cramping manual', '0000-00-00', 'FB', 'GEDUNG SAMPLE MAKER', '', '', '', '', '', '', '', '', '', '', '', ''),
(167, 'MSN152', 'Handling pintu (M ex NC fd )', '0000-00-00', 'FB', 'GEDUNG SAMPLE MAKER', '', '', '', '', '', '', '', '', '', '', '', ''),
(168, 'MSN153', 'Manual Profil mesin', '0000-00-00', 'FB', 'GEDUNG SAMPLE MAKER', '', '', '', '', '', '', '', '', '', '', '', ''),
(169, 'MSN154', 'Tenon Router', '0000-00-00', 'FB', 'GEDUNG SAMPLE MAKER', '', '', '', '', '', '', '', '', '', '', '', ''),
(170, 'MSN155', 'Air Pin Gun Type i', '0000-00-00', 'FB', 'GEDUNG SAMPLE MAKER', '', '', '', '', '', '', '', '', '', '', '', ''),
(171, 'MSN156', 'DropSaw', '0000-00-00', 'FB', 'GEDUNG SAMPLE MAKER', '', '', '', '', '', '', '', '', '', '', '', ''),
(172, 'MSN157', 'Gerinda tangan ( Makita ) 01`', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(173, 'MSN158', 'Gerinda tangan ( Makita ) 02`', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(174, 'MSN159', 'Gerinda tangan ( Makita ) 03`', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(175, 'MSN160', 'Gerinda tangan ( Makita ) 04`', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(176, 'MSN161', 'Gerinda tangan ( Makita ) 05`', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(177, 'MSN162', 'Bor Tangan ( Makita ) 01', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(178, 'MSN163', 'Bor Tangan ( Makita ) 02', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(179, 'MSN164', 'Bor Tangan ( Makita ) 03', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(180, 'MSN165', 'Bor Tangan ( Makita ) 04', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(181, 'MSN166', 'Bor Tangan ( Makita ) 05', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(182, 'MSN167', 'Bor Beton Tangan (Makita) 01', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(183, 'MSN168', 'Mesin Bubut', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(184, 'MSN169', 'Mesin Milling ', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(185, 'MSN170', 'Mesin Driling', '0000-00-00', 'MTC', 'WORKSHOP', 'tidak baik', 'baik', 'baik', 'ada', '', 'tidak ada', '', '', 'tidak ada', '', 'tidak', 'tidak'),
(186, 'MSN171', 'Mesin Cutting wheel 16', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(187, 'MSN172', 'Mesin Las Daiden 1', '2024-08-01', 'MTC', 'WORKSHOP', 'baik', 'tidak baik', 'tidak baik', 'tidak ada', 'tidak ada', 'tidak ada', '', 'ya', 'ada', '', 'tidak', 'tidak'),
(188, 'MSN173', 'Mesin Las Daiden 2', '2024-10-16', 'MTC', 'WORKSHOP', 'baik', 'tidak baik', 'tidak baik', 'tidak ada', 'tidak ada', 'tidak ada', '', 'ya', 'ada', '', 'tidak', 'tidak'),
(189, 'MSN174', 'Mesin Las Daiden 3', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(190, 'MSN175', 'Mesin Las Rylon 1', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(191, 'MSN176', 'Mesin Las Rylon 2', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(192, 'MSN177', 'Jig Saw 1', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(193, 'MSN178', 'Jig Saw 2', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(194, 'MSN179', 'Bor Tangan Baterai ', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(195, 'MSN180', 'Mesin Bor Portable Magnet', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(204, 'MSN181', 'Hot Gun', '0000-00-00', 'MTC', 'WORKSHOP', '', '', '', '', '', '', '', '', '', '', '', ''),
(210, 'MSN182', 'Post Clamp Cramping 2', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(214, 'MSN184', 'Spindle-05', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(215, 'MSN185', 'Spindle-06', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(216, 'MSN186', 'Spindle-07', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(217, 'MSN187', 'Spindle-08', '0000-00-00', 'FA', 'Line 03', '', '', '', '', '', '', '', '', '', '', '', ''),
(218, 'MSN188', 'Cassati-2', '0000-00-00', 'FA', 'Line 01', '', '', '', '', '', '', '', '', '', '', '', ''),
(219, 'MSN189', 'Mesin Assembly Rustic', '0000-00-00', 'FA', 'Line 04', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` int(12) NOT NULL,
  `lokasi_id` int(12) NOT NULL,
  `nama_department` varchar(1290) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `lokasi_id`, `nama_department`) VALUES
(11, 21, 'Line 01'),
(12, 21, 'Line 02'),
(13, 21, 'Line 03'),
(14, 21, 'Line 04'),
(15, 21, 'OFFLINE'),
(16, 23, 'Glass store'),
(17, 23, 'Warehouse'),
(18, 23, 'Crafting'),
(19, 21, 'Line 01 frams area'),
(20, 22, 'FINISING'),
(21, 22, 'Line 5 FA'),
(22, 22, 'Line 06'),
(23, 22, 'GEDUNG SAMPLE MAKER'),
(24, 24, 'WORKSHOP'),
(26, 22, 'Line 05');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `lokasi_id` int(19) NOT NULL,
  `nama_lokasi` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`lokasi_id`, `nama_lokasi`) VALUES
(21, 'FA'),
(22, 'FB'),
(23, 'FC'),
(24, 'MTC');

-- --------------------------------------------------------

--
-- Table structure for table `omob`
--

CREATE TABLE `omob` (
  `id` int(50) NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `mesin` varchar(250) NOT NULL,
  `omob` varchar(250) NOT NULL,
  `size` int(25) NOT NULL,
  `ekstensi` varchar(250) NOT NULL,
  `berkas` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `omob`
--

INSERT INTO `omob` (`id`, `lokasi`, `department`, `mesin`, `omob`, `size`, `ekstensi`, `berkas`) VALUES
(1, 'w', 'd', 'd', 'w', 2, 'wd', 'awd'),
(2, 'FA', 'Line 01', 'Cassati', 'Document Template Editor Requirements.pdf', 341685, 'pdf', '../../file/Document Template Editor Requirements.pdf'),
(3, 'FA', 'Line 01 frams area', 'Joining frams 1', 'card_1886868224.pdf', 44798, 'pdf', '../../file/card_1886868224.pdf'),
(4, 'FB', 'Line 05', 'Roll Glue 02', 'Buku (1).xlsx', 8601, 'xlsx', '../../file/Buku (1).xlsx'),
(5, 'FC', 'Warehouse', 'Kompresor Unloading', 'TUGAS SENI  BUDAYA.docx', 952264, 'docx', '../../file/TUGAS SENI  BUDAYA.docx'),
(6, 'FA', 'Line 01', 'Rip Saw I', 'banner ulang tahun.pdf', 2211287, 'pdf', '../../file/banner ulang tahun.pdf'),
(7, 'FA', 'Line 04', 'HF-01', 'banner ulang tahun.pdf', 2211287, 'pdf', '../../file/banner ulang tahun.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `opl`
--

CREATE TABLE `opl` (
  `no_mesin` varchar(1230) NOT NULL,
  `opl_tersedia` varchar(2132) NOT NULL,
  `manning_operator` varchar(2132) NOT NULL,
  `keterangan_op` varchar(2132) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opl`
--

INSERT INTO `opl` (`no_mesin`, `opl_tersedia`, `manning_operator`, `keterangan_op`) VALUES
('MSN001', 'ada', '2', ''),
('MSN002', '', '', ''),
('MSN003', '', '', ''),
('MSN004', '', '', ''),
('MSN005', '', '', ''),
('MSN006', '', '', ''),
('MSN007', '', '', ''),
('MSN008', '', '', ''),
('MSN009', '', '', ''),
('MSN010', '', '', ''),
('MSN011', '', '', ''),
('MSN012', '', '', ''),
('MSN013', '', '', ''),
('MSN014', '', '', ''),
('MSN015', 'ada', '3', ''),
('MSN016', '', '', ''),
('MSN017', '', '', ''),
('MSN018', '', '', ''),
('MSN019', '', '', ''),
('MSN020', '', '', ''),
('MSN021', '', '', ''),
('MSN022', '', '', ''),
('MSN023', '', '', ''),
('MSN024', '', '', ''),
('MSN025', '', '', ''),
('MSN026', '', '', ''),
('MSN027', '', '', ''),
('MSN028', '', '', ''),
('MSN029', '', '', ''),
('MSN030', '', '', ''),
('MSN031', '', '', ''),
('MSN032', '', '', ''),
('MSN033', '', '', ''),
('MSN034', '', '', ''),
('MSN035', '', '', ''),
('MSN036', '', '', ''),
('MSN037', '', '', ''),
('MSN038', '', '', ''),
('MSN039', '', '', ''),
('MSN040', '', '', ''),
('MSN041', '', '', ''),
('MSN042', '', '', ''),
('MSN043', '', '', ''),
('MSN044', '', '', ''),
('MSN045', '', '', ''),
('MSN046', '', '', ''),
('MSN047', '', '', ''),
('MSN048', '', '', ''),
('MSN049', '', '', ''),
('MSN050', '', '', ''),
('MSN051', '', '', ''),
('MSN052', '', '', ''),
('MSN053', '', '', ''),
('MSN054', '', '', ''),
('MSN055', '', '', ''),
('MSN056', '', '', ''),
('MSN057', '', '', ''),
('MSN058', '', '', ''),
('MSN059', '', '', ''),
('MSN060', '', '', ''),
('MSN061', '', '', ''),
('MSN062', '', '', ''),
('MSN063', '', '', ''),
('MSN064', '', '', ''),
('MSN065', '', '', ''),
('MSN066', '', '', ''),
('MSN067', '', '', ''),
('MSN068', '', '', ''),
('MSN069', '', '', ''),
('MSN070', '', '', ''),
('MSN071', '', '', ''),
('MSN072', '', '', ''),
('MSN073', '', '', ''),
('MSN074', '', '', ''),
('MSN075', '', '', ''),
('MSN076', '', '', ''),
('MSN077', '', '', ''),
('MSN078', '', '', ''),
('MSN079', '', '', ''),
('MSN080', '', '', ''),
('MSN081', '', '', ''),
('MSN082', '', '', ''),
('MSN083', '', '', ''),
('MSN084', '', '', ''),
('MSN085', '', '', ''),
('MSN086', '', '', ''),
('MSN087', '', '', ''),
('MSN088', '', '', ''),
('MSN089', '', '', ''),
('MSN090', '', '', ''),
('MSN091', '', '', ''),
('MSN092', '', '', ''),
('MSN093', '', '', ''),
('MSN094', '', '', ''),
('MSN095', '', '', ''),
('MSN096', '', '', ''),
('MSN097', '', '', ''),
('MSN098', '', '', ''),
('MSN099', '', '', ''),
('MSN100', '', '', ''),
('MSN101', '', '', ''),
('MSN102', '', '', ''),
('MSN103', '', '', ''),
('MSN104', '', '', ''),
('MSN105', '', '', ''),
('MSN106', '', '', ''),
('MSN107', '', '', ''),
('MSN108', '', '', ''),
('MSN109', '', '', ''),
('MSN110', '', '', ''),
('MSN111', '', '', ''),
('MSN112', '', '', ''),
('MSN113', '', '', ''),
('MSN114', '', '', ''),
('MSN115', '', '', ''),
('MSN116', '', '', ''),
('MSN117', '', '', ''),
('MSN118', '', '', ''),
('MSN119', '', '', ''),
('MSN120', '', '', ''),
('MSN121', '', '', ''),
('MSN122', '', '', ''),
('MSN123', '', '', ''),
('MSN124', '', '', ''),
('MSN125', '', '', ''),
('MSN126', '', '', ''),
('MSN127', '', '', ''),
('MSN128', '', '', ''),
('MSN129', '', '', ''),
('MSN130', '', '', ''),
('MSN131', '', '', ''),
('MSN132', '', '', ''),
('MSN133', '', '', ''),
('MSN134', '', '', ''),
('MSN135', '', '', ''),
('MSN136', '', '', ''),
('MSN137', '', '', ''),
('MSN138', '', '', ''),
('MSN139', '', '', ''),
('MSN140', '', '', ''),
('MSN141', '', '', ''),
('MSN142', '', '', ''),
('MSN143', '', '', ''),
('MSN144', '', '', ''),
('MSN145', '', '', ''),
('MSN146', '', '', ''),
('MSN147', '', '', ''),
('MSN148', '', '', ''),
('MSN149', '', '', ''),
('MSN150', '', '', ''),
('MSN151', '', '', ''),
('MSN152', '', '', ''),
('MSN153', '', '', ''),
('MSN154', '', '', ''),
('MSN155', '', '', ''),
('MSN156', '', '', ''),
('MSN157', '', '', ''),
('MSN158', '', '', ''),
('MSN159', '', '', ''),
('MSN160', '', '', ''),
('MSN161', '', '', ''),
('MSN162', '', '', ''),
('MSN163', '', '', ''),
('MSN164', '', '', ''),
('MSN165', '', '', ''),
('MSN166', '', '', ''),
('MSN167', '', '', ''),
('MSN168', '', '', ''),
('MSN169', '', '', ''),
('MSN170', 'tidak ada', '', ''),
('MSN171', '', '', ''),
('MSN172', 'ada', '1', ''),
('MSN173', 'ada', '1', ''),
('MSN174', '', '', ''),
('MSN175', '', '', ''),
('MSN176', '', '', ''),
('MSN177', '', '', ''),
('MSN178', '', '', ''),
('MSN179', '', '', ''),
('MSN180', '', '', ''),
('MSN181', '', '', ''),
('MSN182', '', '', ''),
('MSN184', '', '', ''),
('MSN185', '', '', ''),
('MSN186', '', '', ''),
('MSN187', '', '', ''),
('MSN188', '', '', ''),
('MSN189', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_mesin`
--

CREATE TABLE `riwayat_mesin` (
  `id` int(12) NOT NULL,
  `id_sebelumnya` int(123) NOT NULL,
  `no_mesin` varchar(123) NOT NULL,
  `nama_mesin` varchar(1234) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_lokasi` varchar(1234) NOT NULL,
  `nama_department` varchar(1234) NOT NULL,
  `safety_cover` varchar(1234) NOT NULL,
  `emergency_stop` varchar(1234) NOT NULL,
  `sensor` varchar(1234) NOT NULL,
  `titik_potong` varchar(1234) NOT NULL,
  `titik_pentalan` varchar(1234) NOT NULL,
  `titik_jepit` varchar(1234) NOT NULL,
  `pelindung_lain_jika_ada` varchar(1234) NOT NULL,
  `terlindung_dari_potensi_bahaya` varchar(1234) NOT NULL,
  `tag_loto_di_mesin` varchar(123) NOT NULL,
  `keterangan_tambahan` varchar(123) NOT NULL,
  `mesin_pernah_kecelakaan_kerja` varchar(123) NOT NULL,
  `perbaikan_pelindung_mesin` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_mesin`
--

INSERT INTO `riwayat_mesin` (`id`, `id_sebelumnya`, `no_mesin`, `nama_mesin`, `tanggal`, `nama_lokasi`, `nama_department`, `safety_cover`, `emergency_stop`, `sensor`, `titik_potong`, `titik_pentalan`, `titik_jepit`, `pelindung_lain_jika_ada`, `terlindung_dari_potensi_bahaya`, `tag_loto_di_mesin`, `keterangan_tambahan`, `mesin_pernah_kecelakaan_kerja`, `perbaikan_pelindung_mesin`) VALUES
(214, 212, 'MSN183', 'Dongkrak', '2024-08-07', 'MTC', 'WORKSHOP', 'tidak baik', 'tidak baik', 'tidak baik', 'ada', 'ada', 'ada', 'tidak ada', 'ya', 'ada', 'turu', 'tidak', 'tidak'),
(215, 212, 'MSN183', 'Dongkrak', '2024-08-07', 'MTC', 'WORKSHOP', 'tidak baik', 'tidak baik', 'tidak baik', 'ada', 'ada', 'ada', 'tidak ada', 'ya', 'ada', 'turu', 'tidak', 'tidak'),
(216, 212, 'MSN183', 'Dongkrak', '2024-08-08', 'MTC', 'WORKSHOP', 'tidak baik', 'tidak baik', 'tidak baik', 'ada', 'ada', 'ada', 'tidak ada', 'ya', 'ada', 'turu', 'tidak', 'tidak'),
(217, 212, 'MSN183', 'Dongkrak', '2024-08-11', 'MTC', 'WORKSHOP', 'tidak baik', 'tidak baik', 'tidak baik', 'ada', 'ada', 'ada', 'tidak ada', 'ya', 'ada', 'turu', 'tidak', 'tidak'),
(218, 188, 'MSN173', 'Mesin Las Daiden 2', '2024-08-01', 'MTC', 'WORKSHOP', 'baik', 'tidak baik', 'tidak baik', 'tidak ada', 'tidak ada', 'tidak ada', '', 'ya', 'ada', '', 'tidak', 'tidak');  


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `nama` varchar(1234) NOT NULL,
  `username` varchar(1234) NOT NULL,
  `password` varchar(1234) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(10, 'Bayu', 'admin', 'admin', 'admin'),
(14, 'AripL', '4608', 'aripl', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mesin`
--
ALTER TABLE `data_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`),
  ADD KEY `id_lokasi` (`lokasi_id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indexes for table `omob`
--
ALTER TABLE `omob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_mesin`
--
ALTER TABLE `riwayat_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_mesin`
--
ALTER TABLE `data_mesin`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `lokasi_id` int(19) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `omob`
--
ALTER TABLE `omob`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_mesin`
--
ALTER TABLE `riwayat_mesin`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
