-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2023 at 04:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diabetes`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_gula`
--

CREATE TABLE `log_gula` (
  `id_log` int(11) NOT NULL,
  `id_peserta` varchar(255) NOT NULL,
  `kadar_gula` varchar(255) NOT NULL,
  `hasil` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_gula`
--

INSERT INTO `log_gula` (`id_log`, `id_peserta`, `kadar_gula`, `hasil`, `tanggal`, `waktu`) VALUES
(18, '52', '100', 'Rendah', '2023-05-20', '11:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `log_hasil`
--

CREATE TABLE `log_hasil` (
  `id_log` int(11) NOT NULL,
  `id_peserta` varchar(255) NOT NULL,
  `KodePenyakit` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_hasil`
--

INSERT INTO `log_hasil` (`id_log`, `id_peserta`, `KodePenyakit`, `tanggal`, `waktu`) VALUES
(51, '50', 'M0001', '2023-05-19', '15:30:43'),
(52, '52', 'M0001', '2023-05-19', '15:35:09'),
(53, '52', 'M0001', '2023-05-19', '15:39:56'),
(54, '53', 'M0001', '2023-05-19', '16:05:30'),
(55, '54', 'M0001', '2023-05-19', '16:09:49'),
(56, '52', 'M0001', '2023-05-19', '21:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `tgl_register` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usia` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `tgl_register`, `nama`, `email`, `usia`, `password`, `status`) VALUES
(52, '2023-05-19', 'misal', 'misal@mail.com', 21, 'misal', 1),
(53, '2023-05-19', 'dua', 'dua@mail.com', 21, 'dua', 1),
(54, '2023-05-19', 'nindi', 'nindi@mai.com', 21, 'nindi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `riwayatjawaban`
--

CREATE TABLE `riwayatjawaban` (
  `noRjawaban` int(11) NOT NULL,
  `kodePertanyaan` varchar(6) NOT NULL,
  `Pertanyaan` varchar(50) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `jawaban` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayatjawaban`
--

INSERT INTO `riwayatjawaban` (`noRjawaban`, `kodePertanyaan`, `Pertanyaan`, `Tanggal`, `Waktu`, `username`, `jawaban`) VALUES
(6305, 'P001', '', '2021-09-10', '08:36:48', 'Sikdewa', 'NO'),
(6306, 'P002', '', '2021-09-10', '08:36:49', 'Sikdewa', 'YA'),
(6307, 'P003', '', '2021-09-10', '08:36:53', 'Sikdewa', 'YA'),
(6308, 'P004', '', '2021-09-10', '08:37:00', 'Sikdewa', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `tabelartikel`
--

CREATE TABLE `tabelartikel` (
  `id_artikel` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelartikel`
--

INSERT INTO `tabelartikel` (`id_artikel`, `tanggal`, `judul`, `deskripsi`) VALUES
(2, '2021-09-29', 'Gejala Penyakit Diabetes', 'Focusing on quality health care services means ensuring patient health management at a superior level at all times. However, federal rules and regulations are making processes even more tedious and lengthy. Due to this, keeping such processes intact and still providing.'),
(3, '2021-10-01', 'Pengertian Diabetes', 'Diabetes mellitus, DM (bahasa Latin: mellitus, rasa manis)\r\nPenyakit diabetes adalah kondisi medis yang ditandai oleh tingginya kadar glukosa (gula) dalam darah dalam jangka waktu yang lama. Hal ini terjadi karena tubuh tidak dapat memproduksi atau menggunakan insulin dengan efektif. Insulin adalah hormon yang diproduksi oleh pankreas dan berperan dalam mengatur kadar glukosa dalam darah'),
(4, '2023-05-19', 'Pencegahan Penyakit Diabetes', 'Diabetes disebabkan oleh resistensi insulin, di mana situasi ini membuat hormon insulin tidak mampu digunakan secara optimal oleh sel-sel tubuh. \r\nPadahal insulin memiliki peran penting untuk tubuh, yaitu meregulasi kadar glukosa dalam darah dan kesediaan energi untuk sel, menyerap glukosa dan mengubahnya menjadi energi.\r\nNamun, Anda masih bisa menghindari penyakit diabetes dengan melakukan perubahan gaya hidup. ');

-- --------------------------------------------------------

--
-- Table structure for table `tabeldiabetes`
--

CREATE TABLE `tabeldiabetes` (
  `NoDiabetes` int(11) NOT NULL,
  `KodeDiabetes` varchar(6) NOT NULL,
  `NamaDiabetes` varchar(125) DEFAULT NULL,
  `Deskripsi` text,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabeldiabetes`
--

INSERT INTO `tabeldiabetes` (`NoDiabetes`, `KodeDiabetes`, `NamaDiabetes`, `Deskripsi`, `solusi`) VALUES
(2, 'M0001', 'DIABETES MELITUS', '<p>Penyakit diabetes adalah kondisi medis yang ditandai oleh tingginya kadar glukosa (gula) dalam darah dalam jangka waktu yang lama. Hal ini terjadi karena tubuh tidak dapat memproduksi atau menggunakan insulin dengan efektif. Insulin adalah hormon yang diproduksi oleh pankreas dan berperan dalam mengatur kadar glukosa dalam darah.</p><p>Ada tiga jenis utama diabetes:</p><ol><li><p>Diabetes tipe 1: Pada diabetes tipe 1, sistem kekebalan tubuh menyerang sel-sel yang memproduksi insulin dalam pankreas, sehingga tubuh tidak dapat memproduksi insulin yang cukup. Ini mengharuskan penderita diabetes tipe 1 untuk menggunakan suntikan insulin sepanjang hidup mereka.</p></li><li><p>Diabetes tipe 2: Diabetes tipe 2 adalah yang paling umum terjadi. Pada diabetes tipe 2, tubuh tidak menggunakan insulin secara efektif (resistensi insulin) atau tidak memproduksi cukup insulin. Faktor risiko termasuk kelebihan berat badan, kurangnya aktivitas fisik, pola makan yang tidak sehat, dan faktor genetik.</p></li><li><p>Diabetes gestasional: Diabetes gestasional terjadi pada wanita hamil yang sebelumnya tidak memiliki diabetes. Hal ini terkait dengan perubahan hormonal selama kehamilan yang membuat tubuh sulit menggunakan insulin dengan efektif.</p></li></ol><p>Diabetes dapat menyebabkan komplikasi jangka panjang jika tidak dikelola dengan baik. Beberapa komplikasi yang dapat terjadi meliputi penyakit jantung, kerusakan ginjal, gangguan mata, kerusakan saraf, dan masalah kaki. Pengelolaan diabetes melibatkan pola makan sehat, olahraga teratur, pengontrolan berat badan, pemantauan kadar gula darah, dan penggunaan obat-obatan seperti insulin atau obat diabetes oral sesuai petunjuk dokter. Penting juga untuk mengikuti anjuran dokter dan menjalani pemeriksaan rutin untuk mengontrol kondisi diabetes.</p>', 'minum obat');

-- --------------------------------------------------------

--
-- Table structure for table `tabelpenyakit`
--

CREATE TABLE `tabelpenyakit` (
  `NoPenyakit` int(11) NOT NULL,
  `KodePenyakit` varchar(50) NOT NULL,
  `KodeDiabetes` char(7) NOT NULL,
  `NamaPenyakit` char(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelpenyakit`
--

INSERT INTO `tabelpenyakit` (`NoPenyakit`, `KodePenyakit`, `KodeDiabetes`, `NamaPenyakit`) VALUES
(2, 'M0001', 'G0002', 'Diabetes melitus tipe 1'),
(3, 'M0001', 'G0003', 'Diabetes melitus tipe 2'),
(4, 'M0001', 'G0004', 'Diabetes gestasional'),
(5, 'M0001', 'G0005', 'Diabetes');

-- --------------------------------------------------------

--
-- Table structure for table `tabelpertanyaan`
--

CREATE TABLE `tabelpertanyaan` (
  `NoPertanyaan` int(11) NOT NULL,
  `NamaPenyakit` char(23) NOT NULL,
  `KodePertanyaan` varchar(6) NOT NULL,
  `Pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelpertanyaan`
--

INSERT INTO `tabelpertanyaan` (`NoPertanyaan`, `NamaPenyakit`, `KodePertanyaan`, `Pertanyaan`) VALUES
(1, 'Diabetes melitus tipe 1', 'P001', 'PUSING DAN MUAL'),
(2, 'Diabetes melitus tipe 1', 'P002', 'SERING BERKEMIH (POLIURIA)'),
(3, 'Diabetes melitus tipe 1', 'P003', 'PENGLIHATAN MENJADI KABUR'),
(4, 'Diabetes melitus tipe 2', 'P004', 'BERAT BADAN TURUN CEPAT'),
(5, 'Diabetes melitus tipe 2', 'P005', 'AIR SENI DIKERUBUTI SEMUT'),
(6, 'Diabetes melitus tipe 2', 'P006', 'MERASA HAUS, BANYAK MINUM (POLIDIPSIA)'),
(7, 'Diabetes gestasional', 'P007', 'MERASA LAPAR, BANYAK MAKAN (POLIFAGIA)'),
(8, 'Diabetes gestasional', 'P008', 'MERASA LEMAH DAN GAMPANG LELAH'),
(9, 'Diabetes gestasional', 'P009', 'SERING BATUK PILEK YANG BERULANG'),
(10, 'Diabetes melitus tipe 1', 'P010', 'SERING KESEMUTAN PADA MALAM HARI'),
(11, 'Diabetes melitus tipe 2', 'P011', 'LUKA LUAR YANG LAMA SEMBUH'),
(12, 'Diabetes gestasional', 'P012', 'INFEKSI KULIT YANG BERULANG'),
(13, 'Diabetes gestasional', 'P013', 'SERING BUANG AIR KECIL, TERUTAMA PADA MALAM HARI');

-- --------------------------------------------------------

--
-- Table structure for table `tabelrule`
--

CREATE TABLE `tabelrule` (
  `NoRule` int(11) NOT NULL,
  `KodeRule` varchar(6) NOT NULL,
  `KodePertanyaan` text,
  `KodePenyakit` varchar(6) DEFAULT NULL,
  `NamaPenyakit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelrule`
--

INSERT INTO `tabelrule` (`NoRule`, `KodeRule`, `KodePertanyaan`, `KodePenyakit`, `NamaPenyakit`) VALUES
(1, 'R0001', 'P001,P007', 'M0001', 'Diabetes '),
(2, 'R0002', 'P002,P008', 'M0001', 'Diabetes Tipe 1'),
(3, 'R0003', 'P003,P009', 'M0001', 'Diabetes Tipe 2'),
(4, 'R0004', 'P004,P010', 'M0001', 'Diabetes Tipe 3'),
(5, 'R0005', 'P005,P011', 'M0001', 'Diabetes gestasional'),
(6, 'R0006', 'P006,P012,P018', 'M0001', 'Diabetes gestasional'),
(7, 'R0007', 'P001,P002,P003,P004,P005,P006,P007,P008,P009,P010,P011,P012,P013', 'M0001', 'Diabetes gestasional');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `alamat`, `email`, `password`, `deskripsi`) VALUES
(1, 'admin', 'tociex   ', ' Komplek Antapanimas Bandung ', 'tociex@gmail.com', 'admin', 'lallalala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_gula`
--
ALTER TABLE `log_gula`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_hasil`
--
ALTER TABLE `log_hasil`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `riwayatjawaban`
--
ALTER TABLE `riwayatjawaban`
  ADD PRIMARY KEY (`noRjawaban`);

--
-- Indexes for table `tabelartikel`
--
ALTER TABLE `tabelartikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tabeldiabetes`
--
ALTER TABLE `tabeldiabetes`
  ADD PRIMARY KEY (`NoDiabetes`),
  ADD UNIQUE KEY `NamaPenyakit` (`NamaDiabetes`);

--
-- Indexes for table `tabelpenyakit`
--
ALTER TABLE `tabelpenyakit`
  ADD PRIMARY KEY (`NoPenyakit`);

--
-- Indexes for table `tabelpertanyaan`
--
ALTER TABLE `tabelpertanyaan`
  ADD PRIMARY KEY (`NoPertanyaan`),
  ADD UNIQUE KEY `KodePertanyaan` (`KodePertanyaan`);

--
-- Indexes for table `tabelrule`
--
ALTER TABLE `tabelrule`
  ADD PRIMARY KEY (`NoRule`),
  ADD UNIQUE KEY `KodeRule` (`KodeRule`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_gula`
--
ALTER TABLE `log_gula`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `log_hasil`
--
ALTER TABLE `log_hasil`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `riwayatjawaban`
--
ALTER TABLE `riwayatjawaban`
  MODIFY `noRjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6309;

--
-- AUTO_INCREMENT for table `tabelartikel`
--
ALTER TABLE `tabelartikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabeldiabetes`
--
ALTER TABLE `tabeldiabetes`
  MODIFY `NoDiabetes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabelpenyakit`
--
ALTER TABLE `tabelpenyakit`
  MODIFY `NoPenyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabelpertanyaan`
--
ALTER TABLE `tabelpertanyaan`
  MODIFY `NoPertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabelrule`
--
ALTER TABLE `tabelrule`
  MODIFY `NoRule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
