-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2024 at 06:55 AM
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
-- Database: `sidang_db`
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
(8, 1, '2024', 1559859950, 4, 0, 0, 0),
(10, 2, '2024', 3313235200, 1, 0, 1, 0),
(11, 3, '2024', 1029204000, 1, 1, 1, 0),
(12, 4, '2024', 3558329700, 1, 0, 1, 2),
(13, 5, '2024', 6521656030, 1, 1, 1, 2),
(14, 6, '2024', 1300000000, 5, 0, 1, 0),
(15, 7, '2024', 2024202400, 0, 0, 0, 0);

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
('2022', 12121212, 12, 12, 12, 8),
('2023', 11999, 120, 11, 27, 50),
('2024', 17160389830, 1716038983, 0, 0, 0);

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
  `lampiran_bidang` varchar(100) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_bidang`
--

INSERT INTO `data_bidang` (`id_bidang`, `nm_bidang`, `desk_data`, `target_bidang`, `realisasi_bidang`, `lampiran_bidang`, `updated`) VALUES
(24, 5, '12', 12, 12, 'e9f11f889c0a80ff379349d03f9f589a_5.jpg', '2024-02-04 05:40:18'),
(25, 5, '12', 11, -20, 'c63199b47f4a5dc21d0f2d2f663b82be_5.jpg', '2024-02-04 05:40:18'),
(26, 5, 'Test', 12, 12, '2f1678c517d7080de32b15831b153f4e_5.pdf', '2024-02-04 05:40:18'),
(27, 6, 'Udin PPHA', 100, 0, 'e09a39e425b1c2c6ed2a5820ed5b0444_6.xlsx', '2024-02-04 05:40:18'),
(28, 5, 'Angi Sunat ???? tes', 34, 5, 'ec0c51361d1e2b6d79ddf070a26012c0_5.jpg', '2024-02-04 05:53:25'),
(29, 7, 'Kawinan Lana ', 16, 1, '39bc14cb0e4e4bc70be3f50c5f966c88_7.png', '2024-02-04 05:40:18'),
(30, 7, 'in', 4, 1, '08233f2aa4736c32589561819d9dbef5_7.mp4', '2024-02-04 05:40:18'),
(32, 5, 'test', 12, 1, '3e7f61cc26bca0454c80fa608a4e37e3_5.png', '2024-02-04 05:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `indikator_dinas`
--

CREATE TABLE `indikator_dinas` (
  `id` int(11) NOT NULL,
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

INSERT INTO `indikator_dinas` (`id`, `indikator_dinas`, `divisi_indikator`, `target_indikator`, `triwulan_1`, `triwulan_2`, `triwulan_3`, `triwulan_4`) VALUES
(1, 'Meningkatnya PUS yang ber KB\r\n', 1, 200, 20, 40, 80, 60),
(2, 'Peningkatan Implementasi PUG dan Pemberdayaan Perempuan\r\n', 3, 200, 0, 0, 0, 1),
(3, 'Peningkatan kelurahan dalam membangun kewilayahannya\r\n', 4, 340, 30, 50, 70, 180),
(4, 'Peningkatan kualitas keluarga\r\n', 1, 120, 10, 20, 0, 50),
(5, 'Peningkatan kualitas Keluarga Sejahtera dalam pembangunan keluarga\r\n', 1, 13, 3, 4, 2, 0),
(6, 'Peningkatan Pelembagaan Pemenuhan Hak Anak\r\n', 3, 45, 5, 10, 15, 10),
(7, 'Peningkatan pemberdayaan lembaga kemasyarakatan (LPM, TP-PKK, Posyandu)\r\n', 2, 99, 33, 13, 18, 30),
(8, 'Peningkatan Pengendalian laju pertumbuhan penduduk yang seimbang', 4, 20, 3, 1, 10, 15),
(9, 'Peningkatan perlindungan anak terhadap kekerasan', 3, 50, 14, 13, 12, 11),
(10, 'Peningkatan perlindungan perempuan terhadap kasus kekerasan \r\n', 3, 13, 0, 0, 0, 0),
(12, 'Test', 7, 10, 2, 2, 4, 0),
(13, 'Test2', 1, 10, 2, 6, 6, 6);

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
('KUISIONER KEPUASAN MASYARAKAT', 'Nilai Rata-Rata Dari Kuisioner', '10', '2024'),
('NILAI SAKIP', 'Sistem Akuntabilitas Kinerja Instansi ', '100', '2024'),
('REALISASI ANGGARAN', 'Persentase Realisasi Anggaran', '100', '2024');

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
('BURHANUDDIN RABBANI,', ' 01012', 'Pelaksana', 5),
('KESSY BUNGA OKTARINA, S.Ak', ' 01030', 'Pelaksana', 5),
('EVI DIANTI,', ' 196912052007012011', 'Pranata Kearsipan', 5),
('VERONIKA MELATI, SE., MM', ' 198403252009042008', 'Verifikator Keuangan', 5),
('ANDRI HAMIDANSYAH, S.Kep., M.Kes', ' 198702172010011003', 'Pengelola Sarana Prasarana Kantor', 5),
('NURLYANA RAMADANI, ', '01013', 'Pelaksana', 1),
('DEBY NOR YULIYANTI, A.Md. Keb ', '01015', 'Pelaksana', 2),
('RIO PEBRIYAN, S.Pd ', '01017', 'Pelaksana', 5),
('AHMAD RASYID, SH ', '01018', 'Pelaksana', 3),
('NURUL HASANAH, S.Pd ', '01019', 'Pelaksana', 2),
('JULPIANA ISMIYANTI, Amk ', '01020', 'Pelaksana', 5),
('MOCH. RIZKI KURNIAWAN, SM ', '01023', 'Pelaksana', 3),
('SEPTIA AYUNINGTYAS, S.Si ', '01025', 'Pelaksana', 2),
('MUHAMMAD TEDY RIZKY ', '01026', 'Pelaksana', 5),
('AKHMAD RAMADHANI, SH ', '01028', 'Pelaksana', 4),
('MUHAMMAD RIZKY, S.Tr. Gz ', '01029', 'Pelaksana', 4),
('HERNI NOORMALIANI, S.Pi ', '01031', 'Pelaksana', 2),
('HERNA IBRAHIM ', '01032', 'Pelaksana', 1),
('MUHAMMAD ADJI ', '01033', 'Pelaksana', 5),
('AHMAD NAFARIN, SE ', '01034', 'Pelaksana', 5),
('RAIDATUL JANAH, S.Ak ', '01035', 'Pelaksana', 2),
('ARIS SUGIARTI, S.I.Kom ', '01036', 'Pelaksana', 4),
('NIA AULIA, S.Si ', '01037', 'Pelaksana', 5),
('AKMAL IDHAL AKBAR, S.H. ', '01038', 'Pelaksana', 1),
('MELI HAYATI, S.Psi ', '01039', 'Pelaksana', 1),
('SRI FITRIANI, ', '0518507', 'Pelaksana', 5),
('RAHMATULLAH, ', '0528607', 'Pelaksana', 4),
('udin ppha', '123123', 'STAFF', 6),
('Ir. Hj. PUSPA KENCANA, MP', '19640427 199103 2 009', 'Kepala Dinas', 5),
('RUSIANA, S.Sos ', '196602121989032014', 'Kepala Seksi Bina Ketahanan Remaja dan Pemberdayaan Keluarga Sejahtera', 1),
('Hj. GT. ELLA CORRIYANI, S.Sos,MM ', '196612171987032004', 'Kepala Bidang Pengendalian Penduduk dan Keluarga Berencana', 4),
('Hj RINA KHAIRINA, S.Sos,MAP', '196701301989032008', 'Sekretaris', 5),
('RISLANSYAH, SKM,MM ', '196708101987031004', 'Kepala Bidang Perlindungan dan Pemenuhan Hak Anak', 5),
('MOHAMMAD SAUKANI, SKM, M.M.Kes ', '196807281989031006', 'Kepala Seksi Ketahanan Masyarakat', 2),
('FAHRINA SYARQAWIE, S.Pi ', '196905261994012003', 'Kepala Seksi Perlindungan dan Advokasi Perempuan', 3),
('Hj FATMAWATI, ', '196907041990032010', 'Penyusun Pencatatan & Pelaporan Data Keluarga Berencana', 1),
('NADIA SALEHA, SP, MM ', '197005122007012029', 'Kepala Seksi Pemenuhan Hak Anak', 5),
('SLAMET SUPRIYANTO, ', '197101191992031002', 'Penyusun Bahan Pembinaan Kesertaan Keluarga Berencana', 4),
('WIWIK INDRIANI, A.Md.Keb ', '197109151992022001', 'Kepala Seksi Jaminan Pelayanan KB dan Pembinaan Kesertaan KB', 4),
('INDAH TRISNANIYANTI, SKM, MPH ', '197111281998032007', 'Kepala Bidang Pemberdayaan Masyarakat', 2),
('ETTY HARTINI, SKM ', '197211051994022002', 'Kepala Seksi Pengendalian Penduduk dan Informasi Keluarga', 4),
('SITI MASLIANI, S.Hut ', '197211241999032004', 'Kepala Bidang Pemberdayaan & Perlindungan Perempuan', 3),
('NUNING SUSAN TRIYANA WULYANINGSIH MARDHI UTAMI, S.', '197303121999032005', 'Kepala Seksi Perlindungan Anak', 5),
('YULIANI, SE ', '197307252000032003', 'Penata Laporan Keuangan', 5),
('ERNY SUKMAWATI, ST,MM ', '19760123 200003 2 004', 'Kepala Bidang Keluarga Berencana & Keluarga Sejahtera', 1),
('KASMIWATI, S.Ag ', '197606172007012016', 'Kepala Seksi Penyuluhan dan Pendayagunaan PKB/PLKB dan Kader KB', 4),
('ARIYANTHI, SE ', '197704202007012020', 'Bendahara Gaji', 5),
('NOOR HERLINA FARLINA, S.S, M.Si ', '197708132003122004', 'Analis Data dan Informasi', 4),
('MUHAMMAD NOOR, S.Sos ', '197808102008011022', 'Penggerak Swadaya Masyarakat Ahli Muda', 2),
('YUNI HELDAWATI, ', '198006102007012019', 'Bendahara', 5),
('WENNY NOVIANTY, SE ', '19801123 201001 2 002', 'Kepala Sub Bagian Umum dan Kepegawaian', 5),
('DWI HARYANI, SP, MM ', '198107302010012004', 'Kepala Seksi Bina Ketahanan Keluarga, Balita, Anak dan Lansia', 1),
('DEWI SUKMA SARI, S.Sos ', '198412252010012005', 'Kepala Seksi Pemberdayaan dan Peningkatan Kualitas Hidup Perempuan', 3),
('MULYARTI, AM.Keb ', '198601192010012018', 'Pengelola Bina Kesejahteraan Keluarga', 1),
('MARIA LOURDES WIRANTI, S.Psi ', '19870426 202012 2 005', 'Analis Perlindungan Perempuan', 5),
('NOOR HAYATI, SE ', '19871101 201001 2 026', 'Kepala Sub Bagian Perencana', 5),
('HENY DESYI RUBIYANA, S.Kep, Ners ', '198712142011012004', 'Penyusun Bahan Data Kependudukan dan Keluarga Berencana', 4),
('PEBRI ERNANDA, S.STP., M.Si ', '19900221 201010 1 001', 'Kepala Sub Bagian Keuangan', 5),
('LIA RAHMAWATI, S.IP ', '199212102015072001', 'Kepala UPTD Perlindungan Anak', 1),
('TIENEKE AULIA PRATIWI, S.STP ', '199804012020082002', 'Penyusun Bahan Informasi', 3);

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
(1, 'KETAHANAN DAN KESEJAHTERAAN KELUARGA', 'Bidang Ketahanan dan Kesejahteraan Keluarga, yang dipimpin oleh seorang Kepala Bidang, memiliki tugas pokok melaksanakan penyiapan pembinaan, pembimbingan, dan fasilitasi pelaksanaan kebijakan teknis, norma, standar, prosedur, dan kriteria, serta pemantauan dan evaluasi di bidang Ketahanan dan Kesejahteraan Keluarga. Fungsinya mencakup penyusunan program kerja, penyiapan bahan pembinaan, pengumpulan, pengolahan, dan penyajian data dan informasi di lingkungan Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pemberdayaan Masyarakat, Pengendalian Penduduk, dan Keluarga Berencana. Selain itu, Bidang ini juga bertanggung jawab atas pengkoordinasian pelaksanaan kebijakan teknis serta pemantauan dan evaluasi pelaksanaan kebijakan di bidang Ketahanan dan Kesejahteraan Keluarga.', '1.png'),
(2, 'PEMBERDAYAAN MASYARAKAT', 'Bidang Pemberdayaan dan Perlindungan Perempuan, yang dipimpin oleh seorang Kepala Bidang, memiliki tugas pokok koordinasi pembinaan, pembimbingan, fasilitasi kebijakan teknis, norma, standar, prosedur, dan kriteria, serta pemantauan dan evaluasi di bidang tersebut. Fungsinya melibatkan penyusunan program, penyiapan bahan pembinaan, pengumpulan dan pengolahan data, serta pengkoordinasian pelaksanaan kebijakan teknis di Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pemberdayaan Masyarakat, Pengendalian Penduduk, dan Keluarga Berencana. Selain itu, Bidang ini juga bertanggung jawab atas pemantauan dan evaluasi pelaksanaan kebijakan teknis di bidang Pemberdayaan dan Perlindungan Perempuan.', '2.png'),
(3, 'PEMBERDAYAAN DAN PERLINDUNGAN PEREMPUAN', 'Bidang Pemberdayaan dan Perlindungan Perempuan, yang dipimpin oleh seorang Kepala Bidang, memiliki tugas pokok koordinasi pembinaan, pembimbingan, fasilitasi kebijakan teknis, norma, standar, prosedur, dan kriteria, serta pemantauan dan evaluasi di bidang tersebut. Fungsinya melibatkan penyusunan program, penyiapan bahan pembinaan, pengumpulan dan pengolahan data, serta pengkoordinasian pelaksanaan kebijakan teknis di Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pemberdayaan Masyarakat, Pengendalian Penduduk, dan Keluarga Berencana. Selain itu, Bidang ini juga bertanggung jawab atas pemantauan dan evaluasi pelaksanaan kebijakan teknis di bidang Pemberdayaan dan Perlindungan Perempuan.', '3.png'),
(4, 'PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', 'Bidang Pengendalian Penduduk dan Keluarga Berencana, yang dipimpin oleh seorang Kepala Bidang, memiliki tugas pokok melaksanakan penyiapan pembinaan, pembimbingan, dan fasilitasi pelaksanaan kebijakan teknis, norma, standar, prosedur, dan kriteria, serta pemantauan dan evaluasi di bidang Pengendalian Penduduk dan Keluarga Berencana. Fungsinya mencakup penyusunan program kerja, penyiapan bahan pembinaan, pengumpulan, pengolahan, dan penyajian data dan informasi di lingkungan Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pemberdayaan Masyarakat, Pengendalian Penduduk, dan Keluarga Berencana. Selain itu, Bidang ini juga bertanggung jawab atas pengkoordinasian pelaksanaan kebijakan teknis dan pemantauan serta evaluasi pelaksanaan kebijakan di bidang Pengendalian Penduduk dan Keluarga Berencana.', '4.png'),
(5, 'SEKRETARIAT', ' Sekretariat, yang dipimpin oleh seorang Sekretaris, bertanggung jawab atas penyusunan program, perencanaan, keuangan, umum, dan kepegawaian dalam Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pemberdayaan Masyarakat, Pengendalian Penduduk, dan Keluarga Berencana. Fungsi Sekretariat melibatkan penyusunan program kerja, pelaksanaan perencanaan anggaran, pengelolaan keuangan dan barang milik daerah, administrasi umum dan kepegawaian, serta tugas-tugas lain yang diberikan oleh Kepala Dinas terkait dengan tugas dan fungsinya. Selain itu, Sekretariat juga bertanggung jawab atas pembinaan, pengawasan, evaluasi, dan pelaporan terkait penyelenggaraan program kerja kesekretariatan.', '5.png'),
(6, 'PERLINDUNGAN DAN PEMENUHAN HAK ANAK', 'Perlindungan dan Pemenuhan Hak Anak (PPHA)', '6.png'),
(7, 'UPTD', 'UPTD (Unit Pelayanan Teknis blabla lupa)', '7.png');

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
('PPHA', 6, '$2y$10$iKovIuhKzckO7oFMPwlRfOqRaLPgdw93C5gircyxSglQ0.PvVOxo2'),
('sekretariat', 5, '$2a$12$IQmrCpMTVFi3gaUTxBCi2uviJaV8ksfa.Nh0DzkOhtXuQGM6EB6jm'),
('uptd', 7, '$2y$10$7UDCnouiFNRA0JCk0hQTTOdtmE/mVSLvmgAQz/OViz3tum3/LFaKq');

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
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id_ag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_bidang`
--
ALTER TABLE `data_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `indikator_dinas`
--
ALTER TABLE `indikator_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profil_bidang`
--
ALTER TABLE `profil_bidang`
  MODIFY `id_bidang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
