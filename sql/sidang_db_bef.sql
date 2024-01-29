-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2024 at 04:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidang_db_bef`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_bidang`
--

CREATE TABLE `anggaran_bidang` (
  `id_ag` int(11) NOT NULL,
  `id_bidang` int(5) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `pagu_bidang` bigint(20) NOT NULL,
  `realisasi_tw1` bigint(20) NOT NULL,
  `realisasi_tw2` bigint(20) NOT NULL,
  `realisasi_tw3` bigint(20) NOT NULL,
  `realisasi_tw4` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggaran_bidang`
--

INSERT INTO `anggaran_bidang` (`id_ag`, `id_bidang`, `tahun`, `pagu_bidang`, `realisasi_tw1`, `realisasi_tw2`, `realisasi_tw3`, `realisasi_tw4`) VALUES
(8, 1, '2024', 100003, 12, 500, 0, 0),
(10, 2, '2024', 1000, 8, 223, 0, 0),
(11, 3, '2024', 2000000, 5, 0, 0, 0),
(12, 4, '2024', 123123123, 11, 5, 0, 0),
(13, 5, '2024', 121212121, 12, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_bidang_bef`
--

CREATE TABLE `anggaran_bidang_bef` (
  `tahun_anggaran_bidang` varchar(4) NOT NULL,
  `triwulan_anggaran_bidang` varchar(2) NOT NULL,
  `pagu_anggaran_bidang` varchar(15) NOT NULL,
  `realisasi_anggaran_bidang` varchar(15) NOT NULL,
  `divisi_dinas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggaran_bidang_bef`
--

INSERT INTO `anggaran_bidang_bef` (`tahun_anggaran_bidang`, `triwulan_anggaran_bidang`, `pagu_anggaran_bidang`, `realisasi_anggaran_bidang`, `divisi_dinas`) VALUES
('2022', '1', '2500000000', '2459349340', 'PENGENDALIAN PENDUDUK'),
('2022', '2', '2500000000', '2455117500', 'PENGENDALIAN PENDUDUK'),
('2022', '3', '2500000000', '2301230990', 'PENGENDALIAN PENDUDUK'),
('2022', '4', '2500000000', '2495581250', 'PENGENDALIAN PENDUDUK'),
('2023', '1', '2500000000', '2423913290', 'PENGENDALIAN PENDUDUK'),
('2023', '2', '2500000000', '2012301230', 'PENGENDALIAN PENDUDUK'),
('2023', '3', '2500000000', '2491230120', 'PENGENDALIAN PENDUDUK'),
('2022', '1', '2500000000', '2123525000', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2022', '2', '2500000000', '2500000000', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2022', '3', '2500000000', '2491239120', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2022', '4', '2500000000', '2231239000', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2023', '1', '2500000000', '2407545000', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2023', '2', '2500000000', '2412955520', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2023', '3', '2500000000', '2438766060', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2023', '4', '2500000000', '2109985650', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2022', '1', '2500000000', '2498575000', 'PEMBERDAYAAN MASYARAKAT'),
('2022', '2', '2500000000', '2012099945', 'PEMBERDAYAAN MASYARAKAT'),
('2022', '3', '2500000000', '2440012090', 'PEMBERDAYAAN MASYARAKAT'),
('2022', '4', '2500000000', '2489985000', 'PEMBERDAYAAN MASYARAKAT'),
('2023', '1', '2500000000', '2312997500', 'PEMBERDAYAAN MASYARAKAT'),
('2023', '2', '2500000000', '2465771020', 'PEMBERDAYAAN MASYARAKAT'),
('2023', '3', '2500000000', '2432009840', 'PEMBERDAYAAN MASYARAKAT'),
('2023', '4', '2500000000', '2499857900', 'PEMBERDAYAAN MASYARAKAT'),
('2022', '1', '2500000000', '2439055019', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),
('2022', '2', '2500000000', '2430012900', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),
('2022', '3', '2500000000', '2100545000', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),
('2022', '4', '2500000000', '2490092155', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),
('2023', '1', '2500000000', '2203912556', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),
('2023', '2', '2500000000', '2300560560', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),
('2023', '3', '2500000000', '2455700500', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),
('2023', '4', '2500000000', '2310065000', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK'),
('2022', '1', '2500000000', '2500000000', 'SEKRETARIAT'),
('2022', '2', '2500000000', '2500000000', 'SEKRETARIAT'),
('2022', '3', '2500000000', '2498550140', 'SEKRETARIAT'),
('2022', '4', '2500000000', '2500000000', 'SEKRETARIAT'),
('2023', '1', '2500000000', '2500000000', 'SEKRETARIAT'),
('2023', '2', '2500000000', '2456995000', 'SEKRETARIAT'),
('2023', '3', '2500000000', '2500000000', 'SEKRETARIAT'),
('2023', '4', '2500000000', '2495110059', 'SEKRETARIAT'),
('2023', '4', '2500000000', '2421567000', 'PENGENDALIAN PENDUDUK'),
('2024', '1', '5000000000', '100000', 'KELUARGA BERENCANA DAN KELUARGA SEJAHTERA'),
('2024', '1', '100', '1', 'SEKRETARIAT'),
('2024', '1', '100', '1', 'PENGENDALIAN PENDUDUK'),
('2024', '1', '100', '1', 'PEMBERDAYAAN MASYARAKAT'),
('2024', '1', '100', '1', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_dinas`
--

CREATE TABLE `anggaran_dinas` (
  `tahun_ag_dinas` varchar(4) NOT NULL,
  `pagu_dinas` bigint(20) NOT NULL,
  `realisasi_dinas_tw1` bigint(20) NOT NULL,
  `realisasi_dinas_tw2` bigint(20) NOT NULL,
  `realisasi_dinas_tw3` bigint(20) NOT NULL,
  `realisasi_dinas_tw4` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggaran_dinas`
--

INSERT INTO `anggaran_dinas` (`tahun_ag_dinas`, `pagu_dinas`, `realisasi_dinas_tw1`, `realisasi_dinas_tw2`, `realisasi_dinas_tw3`, `realisasi_dinas_tw4`) VALUES
('2024', 15, 1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_dinas_bef`
--

CREATE TABLE `anggaran_dinas_bef` (
  `tahun_anggaran` int(4) NOT NULL,
  `triwulan_anggaran` int(2) NOT NULL,
  `pagu_anggaran` bigint(15) NOT NULL,
  `realisasi_anggaran` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggaran_dinas_bef`
--

INSERT INTO `anggaran_dinas_bef` (`tahun_anggaran`, `triwulan_anggaran`, `pagu_anggaran`, `realisasi_anggaran`) VALUES
(2023, 1, 15852123756, 1454658769),
(2023, 2, 15852123755, 4358000000),
(2023, 3, 18051745310, 9776201716),
(2023, 4, 18051745310, 17597163088),
(2024, 1, 5000, 1000),
(2024, 2, 5000, 2000),
(2024, 3, 5000, 3500),
(2024, 4, 5000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `data_bidang`
--

CREATE TABLE `data_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nm_bidang` int(5) NOT NULL,
  `desk_data` varchar(250) NOT NULL,
  `target_bidang` int(10) NOT NULL,
  `realisasi_bidang` float NOT NULL,
  `lampiran_bidang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_bidang`
--

INSERT INTO `data_bidang` (`id_bidang`, `nm_bidang`, `desk_data`, `target_bidang`, `realisasi_bidang`, `lampiran_bidang`) VALUES
(2, 1, 'Sosialisasi keluarga berencana', 100, 21, '????\0JFIF\0\0\0\0\0\0??\0C\0	'),
(3, 3, 'Perlindungan anak di suatu desa', 70, 50, '-- phpMyAdmin SQL Dump\n-- version 5.2.1\n-- https:/'),
(4, 2, 'Sosialisasi di kecamatan Guntung Paikat', 70, 60, '%PDF-1.7\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 '),
(5, 5, 'progress pencegahan stunting', 100, 97, '????\0JFIF\0\0\0\0\0\0??\0C\0	'),
(20, 5, 'Sunatan Angi', 100, 0, 'ddc7c675b9544179d87fb4f1859c941d_SEKRETARIAT.png'),
(21, 5, 'Alfi Beheraaan ????', 100, 10, '65c1b596a4f318beaac5f78040537cd3_SEKRETARIAT.png'),
(22, 5, '12', 0, 0, 'dfb67a4d3470d7d07f7525d48a0ac9f2_SEKRETARIAT.png'),
(23, 4, 'Test Dalduk', 100, 1, '4b429d92aedc3d7a454f186d10abb99f_4.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `indikator_dinas`
--

CREATE TABLE `indikator_dinas` (
  `indikator_dinas` varchar(255) NOT NULL,
  `divisi_indikator` int(5) NOT NULL,
  `target_indikator` int(10) NOT NULL,
  `triwulan_1` int(5) DEFAULT NULL,
  `triwulan_2` int(5) DEFAULT NULL,
  `triwulan_3` int(5) DEFAULT NULL,
  `triwulan_4` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `indikator_dinas`
--

INSERT INTO `indikator_dinas` (`indikator_dinas`, `divisi_indikator`, `target_indikator`, `triwulan_1`, `triwulan_2`, `triwulan_3`, `triwulan_4`) VALUES
('No1Pelayanan Bidang KBKS', 1, 20, 3, 1, 10, 15),
('No1Pelayanan Bidang PM', 2, 200, 20, 40, 80, 60),
('No1Pelayanan Bidang PPPA', 3, 13, 3, 4, 2, 0),
('No2Pelayanan Bidang dalduk', 4, 340, 30, 50, 70, 100),
('No2Pelayanan Bidang KBKS', 1, 99, 33, 13, 18, 30),
('No2Pelayanan Bidang PM', 2, 200, 0, 0, 0, 1),
('No2Pelayanan Bidang PPPA', 3, 13, 0, 0, 0, 0),
('No3Pelayanan Bidang dalduk', 4, 120, 10, 20, 0, 50),
('No4Pelayanan Bidang dalduk', 4, 45, 5, 10, 15, 10),
('No5Pelayanan Bidang dalduk', 4, 50, 14, 13, 12, 11),
('test', 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kinerja_dinas`
--

CREATE TABLE `kinerja_dinas` (
  `nama_pencapaian` varchar(50) NOT NULL,
  `deskripsi_pencapaian` varchar(50) NOT NULL,
  `nilai_pencapaian` varchar(10) NOT NULL,
  `tahun_pencapaian` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kinerja_dinas`
--

INSERT INTO `kinerja_dinas` (`nama_pencapaian`, `deskripsi_pencapaian`, `nilai_pencapaian`, `tahun_pencapaian`) VALUES
('KUISIONER KEPUASAN MASYARAKAT', 'Nilai Rata-Rata Dari Kuisioner', '80', '2022'),
('NILAI SAKIP', 'Sistem Akuntabilitas Kinerja Instansi ', '100', '2022'),
('REALISASI ANGGARAN', 'Persentase Realisasi Anggaran', '98', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `komen_dinas`
--

CREATE TABLE `komen_dinas` (
  `nama` varchar(10) NOT NULL,
  `komentar` varchar(100) NOT NULL,
  `skor` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komen_dinas`
--

INSERT INTO `komen_dinas` (`nama`, `komentar`, `skor`) VALUES
('lana', 'kinerja bagus', 5),
('ibai', 'baik', 3),
('amin', 'cukup', 2),
('angi', 'kinerja perlu ditingkatkan', 4),
('adika', 'telah melayani dengan baik', 5),
('faiq', 'baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_dinas`
--

CREATE TABLE `pegawai_dinas` (
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `jabatan` varchar(75) NOT NULL,
  `divisi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pegawai_dinas`
--

INSERT INTO `pegawai_dinas` (`nama`, `nip`, `jabatan`, `divisi`) VALUES
('HJ.RUSIANA,S.SOS', '196602121989032014', 'KEPALA SEKSI', 1),
('HJ.GT.ELLA CORRIYANI, SE. MM', '196612171987032004', 'KEPALA BIDANG', 4),
('RINA KHAIRINA,S.SOS,M.AP', '196701301989032008', 'KEPALA SEKRETARIS', 5),
('JUMIATUN, S.P', '196709231991032007', 'KEPALA BIDANG', 2),
('MOHAMMAD SAUKANI,SKM', '196807281989031006', 'KEPALA SEKSI', 2),
('FAHRINA SYARQAWIE, S.PI', '196905261994012003', 'KEPALA SEKSI', 2),
('FATMAWATI, SST', '196907041990032010', 'STAFF', 4),
('EVIDIANTI', '196912052007012011', 'STAFF', 3),
('SLAMET SUPRIYANTO', '197101191992031002', 'STAFF', 1),
('SITI MASLIANI,S.Hut', '197211241999032004', 'KEPALA BIDANG', 3),
('Dra.SRI LAILANA', '197304141993022003', 'KEPALA DINAS', 5),
('YULIANI,SE', '197307252000032003', 'STAFF', 5),
('ERNY SUKMAWATI,ST. MM', '197601232000032004', 'KEPALA BIDANG', 1),
('KASMIWATI, S.AG', '197606172007012016', 'KEPALA SEKSI', 4),
('ARIYANTHI, SE', '197704202007012020', 'STAFF', 5),
('NOOR HERLINA FARLINA ,S.S.,M.Si', '197708132003122004', 'STAFF', 2),
('MUHAMMAD NOOR ,S.SOS', '197808102008011022', 'KEPALA SEKSI', 1),
('YUNI HELDAWATI', '198006102007012019', 'STAFF', 5),
('DWI HARYANI, SP,MM', '198107302010012004', 'KEPALA SEKSI', 1),
('VERONIKA MELATI ,SE,MM', '198403252009042008', 'STAFF', 5),
('DIANISSSA DAMAYANTI, A.MD', '198404062009032007', 'KEPALA SUB BAGIAN UMUM KEPEGAWAIAN', 5),
('DEWI SUKMA SARI,S.SOS', '198412252010012005', 'KEPALA SEKSI', 2),
('MULYARTI ,AM.KEB', '198601192010012018', 'STAFF', 3),
('ANDRI HAMIDANSYAHs,S.KEP', '1987021720100110031', 'STAFF', 5),
('MARIA LOURDES WIRANTI ,S.Psi', '198704262020122005', 'KEPALA SEKSI', 3),
('NOOR HAYATI ,SE', '198711012010012026', 'KEPALA SUB BAGIAN PERENCANAAN', 5),
('PEBRI ERNANDA,S.STP', '199002212010101001', 'KEPALA SUB BAGIAN KEUANGAN', 5),
('LIA RAHMAWATI, S.IP', '199212102015072001', 'KEPALA SEKSI', 3),
('TIENEKE AULIA PRATIWI ,S.STP', '199804012020082002', 'STAFF', 3),
('Baiatur Ridwananda', '2011101', 'KEPALA SUB BAGIAN', 5);

-- --------------------------------------------------------

--
-- Table structure for table `profil_bidang`
--

CREATE TABLE `profil_bidang` (
  `id_bidang` int(5) NOT NULL,
  `nama_bidang` varchar(100) NOT NULL,
  `deskripsi_bidang` varchar(1500) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_bidang`
--

INSERT INTO `profil_bidang` (`id_bidang`, `nama_bidang`, `deskripsi_bidang`, `foto`) VALUES
(1, 'KELUARGA SEJAHTERA', ' Tidak Melaksanakan Pemberian Fasilitasi dan Pelaksanaan Kebijakan Teknis di Bidang KB, Kesehatan Reproduksi (Kespro) dan Keluarga Sejahtera, Menyiapkan Bahan Pemberian Fasilitasi Pelaksanaan NSPK, Melaksanakan Pemantauan dan Evaluasi di Bidang KB, Kespro dan KS', '1.png'),
(2, 'PEMBERDAYAAN MASYARAKAT', 'Menyusun Rencana dan Program Kerja, Mengkoordinasi dan Memfasilitasi Penguatan dan Pengembangan Kelembagaan Masyarakat, Mengevaluasi Pelaksanaan Tugas dan Menginventarisasi Permasalahan, Menyampaikan Laporan Kegiatan di Bidang PM', '2.png'),
(3, 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK', 'Mengkoordinasikan Penetapan Kebijakan (Perwali/SK/SE) Pelaksanaan PUG Tingkat Kota Banjarbaru, Memonitoring dan Evaluasi Pelaksanaan PUG, Pembentukan Forum Koordinasi PUG, Mengelola Penyediaan dan Pemanfaatan Data Terpilah\')', 'PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK.jpg'),
(4, 'PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', 'Memfasilitasi dan Melaksanakan Kebijakan Teknis, Menyiapkan Bahan Pemberian Fasilitasi Pelaksanaan Norma, Standar, Prosedur, dan Kriteria (NSPK), Melakukan Pemantauan dan Evaluasi pada Bidang Pengendalian Penduduk', 'PENGENDALIAN PENDUDUK.jpg'),
(5, 'SEKRETARIAT', 'Sekretariat Dinas Pengendalian Penduduk Keluarga Berencana Pemberdayaan Masyarakat ,Perempuan dan Perlindungan Anak dipimpin oleh Sekretaris yang mempunyai tugas Pokok Menyelenggarakan urusan Penyusunan Program Perencanaan ,Keuangan ,Umum dan Kepegawaian Dinas Pengendalian Penduduk Keluarga Berencana Pemberdayaan Masyarakat ,Perempuan dan Perlindungan Anak Kota Banjarbaru.', 'SEKRETARIAT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_dinas`
--

CREATE TABLE `user_dinas` (
  `username` varchar(50) NOT NULL,
  `divisi` int(5) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_dinas`
--

INSERT INTO `user_dinas` (`username`, `divisi`, `password`) VALUES
('dalduk', 4, '$2a$12$UQ7rzXETZOmidE.Z.bsyEOWCB7.eu6CRzyxTgeltT6uC/dYRNPEMW'),
('kb', 1, '$2a$12$Jn0qK8fNxEKGjfeUwpmVze8Qu15tatfJPv9uUt1KannewdNyF2yCa'),
('pm', 2, '$2a$12$sM8IXxw8lTXH/Zc4oFHpxOoGsCGljzW1kNKKkKKkpnSsmD1P3TDm.'),
('ppa', 3, '$2a$12$4S.7JCykph2UzDK/0f.DH.GhjT1U7vZwQHtwyHrJVTyqQ2VxoCzgq'),
('sekretariat', 5, '$2a$12$IQmrCpMTVFi3gaUTxBCi2uviJaV8ksfa.Nh0DzkOhtXuQGM6EB6jm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran_bidang`
--
ALTER TABLE `anggaran_bidang`
  ADD PRIMARY KEY (`id_ag`),
  ADD KEY `tahun_ag_bidang` (`tahun`),
  ADD KEY `anggaran_bidang_id_bidang` (`id_bidang`);

--
-- Indexes for table `anggaran_dinas`
--
ALTER TABLE `anggaran_dinas`
  ADD PRIMARY KEY (`tahun_ag_dinas`);

--
-- Indexes for table `data_bidang`
--
ALTER TABLE `data_bidang`
  ADD PRIMARY KEY (`id_bidang`),
  ADD KEY `nm_bidang` (`nm_bidang`);

--
-- Indexes for table `indikator_dinas`
--
ALTER TABLE `indikator_dinas`
  ADD PRIMARY KEY (`indikator_dinas`),
  ADD KEY `indikator_dinas_divisi_indikator_fk` (`divisi_indikator`);

--
-- Indexes for table `kinerja_dinas`
--
ALTER TABLE `kinerja_dinas`
  ADD PRIMARY KEY (`nama_pencapaian`);

--
-- Indexes for table `pegawai_dinas`
--
ALTER TABLE `pegawai_dinas`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `pegawai_dinas_divisi_fk` (`divisi`);

--
-- Indexes for table `profil_bidang`
--
ALTER TABLE `profil_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `user_dinas`
--
ALTER TABLE `user_dinas`
  ADD PRIMARY KEY (`username`),
  ADD KEY `user_dinas_divisi_fk` (`divisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran_bidang`
--
ALTER TABLE `anggaran_bidang`
  MODIFY `id_ag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_bidang`
--
ALTER TABLE `data_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profil_bidang`
--
ALTER TABLE `profil_bidang`
  MODIFY `id_bidang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggaran_bidang`
--
ALTER TABLE `anggaran_bidang`
  ADD CONSTRAINT `anggaran_bidang_id_bidang` FOREIGN KEY (`id_bidang`) REFERENCES `profil_bidang` (`id_bidang`);

--
-- Constraints for table `data_bidang`
--
ALTER TABLE `data_bidang`
  ADD CONSTRAINT `data_bidang_nm_bidanga_fk` FOREIGN KEY (`nm_bidang`) REFERENCES `profil_bidang` (`id_bidang`);

--
-- Constraints for table `indikator_dinas`
--
ALTER TABLE `indikator_dinas`
  ADD CONSTRAINT `indikator_dinas_divisi_indikator_fk` FOREIGN KEY (`divisi_indikator`) REFERENCES `profil_bidang` (`id_bidang`);

--
-- Constraints for table `pegawai_dinas`
--
ALTER TABLE `pegawai_dinas`
  ADD CONSTRAINT `pegawai_dinas_divisi_fk` FOREIGN KEY (`divisi`) REFERENCES `profil_bidang` (`id_bidang`);

--
-- Constraints for table `user_dinas`
--
ALTER TABLE `user_dinas`
  ADD CONSTRAINT `user_dinas_divisi_fk` FOREIGN KEY (`divisi`) REFERENCES `profil_bidang` (`id_bidang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
