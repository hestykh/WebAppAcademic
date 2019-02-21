-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 01:36 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` varchar(5) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` text NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nip`, `password`, `nama`, `role`, `status`, `telepon`, `agama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `alamat`, `email`, `foto`) VALUES
('42', '324', '324', 'fr', 1, 6, '3243', '1', 'Pria', 'fdfr', '2018-05-24', 'reert', 'ett', 'ere@e', 'android/telkom-university-015.jpg'),
('ABD', '11111', '11111', 'Abdi Ganteng, S.Pd.', 1, 6, '081234567890', 'Islam', 'Pria', 'Bandung', '1974-08-08', 'Universitas Pendidikan Indonesia', 'Jl. Gegerkalong Tengah No. 74a/14b, Kec. Sukasari, Kota Bandung', 'abdiganteng@gmail.com', 'android/foto1.jpeg'),
('as', '12345', '12345', 'as', 1, 6, '08552352255', '1', 'Wanita', 'jonggol', '2018-05-07', 'Universitas Telkom', 'kepo', 'as@gmail.com', 'android/telkom-university-012.jpg'),
('BDO', '22222', '22222', 'Bandung Tasik, S.Pd.', 2, 6, '081222333444', 'Islam', 'Pria', 'Tasikmalaya', '1977-08-08', 'Universitas Pendidikan Indonesia', 'Jl. Cihampelas No.222, Kota Bandung', 'bdotsk@gmail.com', '/android/image.jpeg'),
('df', '3234', '3234', 'efef', 1, 6, '42', '1', 'Pria', 'fsfer', '2018-05-17', 'eer4', 'gfergrg', 'erg@gfe', 'android/telkom-university-013.jpg'),
('DNA', '55555', '55555', 'Dona', 1, 6, '0852587652', '1', 'Wanita', 'Jogja', '2018-05-17', 'Universitas Telkom', 'sukbir', 'dona@gmail.com', 'android/WhatsApp_Image_2018-04-20_at_07_53_54.jpeg'),
('JEE', '66666', '66666', 'Jeee', 1, 6, '08568585251', '1', 'Wanita', 'Jogja', '2018-05-15', 'Universitas Telkom', 'telkom', 'jeee@gmail.com', 'android/catur11.jpeg'),
('OCI', '77777', '77777', 'Oci', 1, 6, '084521451212', '1', 'Pria', 'Bandung', '2018-05-18', 'Universitas Telkom', 'KEPO', 'oci@gmail.com', 'android/WhatsApp_Image_2018-04-20_at_07_53_543.jpeg'),
('uygfy', '767', '767', 'ygtftygf', 1, 6, '58498', '1', 'Pria', 'Kabupaten Bandung - Bojon', '2018-05-22', 'hgfytf', 'Kinagara Regency blok N no 1 ciganitri, bojongsoang', 'amilia.dewi@gmail.com', 'android/telkom-university-016.jpg'),
('WNS', '33333', '33333', 'Wonosobro, S.Pd.', 1, 6, '081223344555', 'Katolik', 'Wanita', 'Wonosob', '1980-10-10', 'Telkom University', 'Jl. Raya Bojongsoang No.134, Bojongsoang, Kab. Bandung', 'wonosobo@gmail.com', '/android/catur1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kode_jam` int(11) NOT NULL,
  `kode_kbm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `kode_jam` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`kode_jam`, `jam_mulai`, `jam_selesai`) VALUES
(1, '07:55:00', '08:35:00'),
(2, '08:35:00', '09:15:00'),
(3, '09:15:00', '09:55:00'),
(4, '09:55:00', '10:35:00'),
(5, '11:00:00', '11:40:00'),
(6, '11:40:00', '12:20:00'),
(7, '13:00:00', '13:40:00'),
(8, '13:40:00', '14:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_nilai`
--

CREATE TABLE `jenis_nilai` (
  `kode_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_nilai`
--

INSERT INTO `jenis_nilai` (`kode_jenis`, `nama_jenis`) VALUES
('kd1', 'Kompetensi Dasar 1'),
('kd2', 'Kompetensi Dasar 2'),
('kd3', 'Kompetensi Dasar 3'),
('kd4', 'Kompetensi Dasar 4'),
('kd5', 'Kompetensi Dasar 5'),
('kd6', 'Kompetensi Dasar 6'),
('kd7', 'Kompetensi Dasar 7'),
('kd8', 'Kompetensi Dasar 8'),
('uas', 'Ujian Akhir Semester'),
('uh1', 'Ulangan Harian 1'),
('uh2', 'Ulangan Harian 2'),
('uts', 'Ujian Tengah Semester');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Keterampilan'),
(2, 'Pengetahuan');

-- --------------------------------------------------------

--
-- Table structure for table `kbm`
--

CREATE TABLE `kbm` (
  `kode_kbm` int(11) NOT NULL,
  `kode_ta` int(11) NOT NULL,
  `kode_semester` int(11) NOT NULL,
  `kode_guru` varchar(5) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_mapel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kbm`
--

INSERT INTO `kbm` (`kode_kbm`, `kode_ta`, `kode_semester`, `kode_guru`, `kode_kelas`, `kode_mapel`) VALUES
(18, 1, 1, 'ABD', '7b', 'bind2'),
(1, 1, 1, 'DNA', '7a', 'mtk');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`) VALUES
('7a', 'VII A'),
('7b', 'VII B'),
('7c', 'VII C'),
('8a', 'VIII A'),
('8b', 'VIII B'),
('8c', 'VIII C'),
('9a', 'IX A'),
('9b', 'IX B'),
('9c', 'IX C');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(15) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`) VALUES
('bind2', 'Bahasa Indonesia2'),
('bing', 'Bahasa Inggris'),
('bsun', 'Bahasa Sunda'),
('ipa', 'Ilmu Pengetahuan Alam'),
('ips', 'Ilmu Pengetahuan Sosial'),
('mtk', 'Matematika'),
('pab', 'Pendidikan Agama dan Budi Pekerti'),
('pjok', 'Pendidikan Jasmani, Olahraga, dan Kesehatan'),
('pkr', 'Prakarya'),
('ppkn', 'Pendidikan Pancasila dan Kewarganegaraan'),
('sbd', 'Seni Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kode_materi` int(11) NOT NULL,
  `kode_dataMapel` int(11) NOT NULL,
  `kode_mg` int(11) NOT NULL,
  `kode_kbm` int(11) NOT NULL,
  `judul_materi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kode_materi`, `kode_dataMapel`, `kode_mg`, `kode_kbm`, `judul_materi`, `deskripsi`, `file`) VALUES
(5, 0, 1, 18, 'Apa aja', '', 'materi/Dean_etal__RadioFrequency_1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` int(11) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `nilai` decimal(10,0) NOT NULL,
  `kode_kbm` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `kode_kategori`, `kode_jenis`, `nilai`, `kode_kbm`, `nis`) VALUES
(1, 1, 'kd1', '90', 18, '00003'),
(2, 1, 'kd1', '80', 18, '00001'),
(3, 1, 'kd2', '80', 18, '00001'),
(4, 1, 'kd2', '75', 18, '00003'),
(5, 1, 'kd3', '75', 18, '00001'),
(6, 1, 'kd3', '80', 18, '00003'),
(7, 1, 'uts', '78', 18, '00001'),
(8, 1, 'uas', '80', 18, '00001'),
(9, 1, 'kd1', '78', 1, '00001'),
(10, 1, 'kd2', '80', 1, '00001');

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `kode_mg` int(11) NOT NULL,
  `nama_pertemuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`kode_mg`, `nama_pertemuan`) VALUES
(1, 'Pertemuan 1'),
(2, 'Pertemuan 2');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `kode_presensi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `kode_status` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `kode_siswaKelas` int(11) NOT NULL,
  `assign_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`kode_presensi`, `tanggal`, `jam`, `kode_status`, `keterangan`, `kode_siswaKelas`, `assign_by`) VALUES
(52, '2018-05-15', '11:50:50', 1, 'perut', 1, 18),
(53, '2018-05-15', '11:50:50', 2, 'perut', 5, 18),
(54, '2018-05-30', '14:37:50', 1, '', 1, 18),
(55, '2018-05-30', '14:37:50', 2, '', 5, 18);

-- --------------------------------------------------------

--
-- Table structure for table `rapot`
--

CREATE TABLE `rapot` (
  `kode_rapot` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `tahun_ajaran` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `agama` int(11) NOT NULL,
  `ppkn` int(11) NOT NULL,
  `bindo` int(11) NOT NULL,
  `bing` int(11) NOT NULL,
  `mtk` int(11) NOT NULL,
  `ipa` int(11) NOT NULL,
  `ips` int(11) NOT NULL,
  `olahraga` int(11) NOT NULL,
  `sbudaya` int(11) NOT NULL,
  `tik` int(11) NOT NULL,
  `bsunda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `kode_role` int(11) NOT NULL,
  `nama_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`kode_role`, `nama_role`) VALUES
(1, 'Guru'),
(2, 'Tata Usaha'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `kode_semester` int(11) NOT NULL,
  `nama_semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`kode_semester`, `nama_semester`) VALUES
(1, 'Ganjil'),
(2, 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `foto` text NOT NULL,
  `agama` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `password`, `nama`, `foto`, `agama`, `jenis_kelamin`, `tahun_masuk`, `telepon`, `alamat`, `role`, `status`) VALUES
('00001', '00001', 'Hesty', 'android/download2.jpg', 'Islam', 'Wanita', 2018, '08123456788', 'Gang Got', 3, 6),
('00003', '00003', 'Pie Lie Dies', '', 'Kristen', 'Pria', 2018, '08122334455', 'Jl. Kenangan, Samasuka, Kota Bandung', 3, 6),
('79568507', '79568507', 'rossi', '', 'Islam', 'Pria', 2018, '084938546', 'sukabirus', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `kode_siswaKelas` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_ta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`kode_siswaKelas`, `nis`, `kode_kelas`, `kode_ta`) VALUES
(1, '00001', '7b', 1),
(5, '00003', '7b', 1),
(6, '79568507', '7a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `kode_status` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`kode_status`, `status`) VALUES
(1, 'Hadir'),
(2, 'Sakit'),
(3, 'Izin'),
(4, 'Alfa'),
(5, 'Dispensasi'),
(6, 'Aktif'),
(7, 'Nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `kode_ta` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`kode_ta`, `tahun_ajaran`) VALUES
(1, '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `kode_wali` int(11) NOT NULL,
  `kode_guru` varchar(5) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_ta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`kode_wali`, `kode_guru`, `kode_kelas`, `kode_ta`) VALUES
(1, 'ABD', '7a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`),
  ADD UNIQUE KEY `uniq_guru` (`nip`),
  ADD KEY `fk_role` (`role`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_pengajaran` (`kode_kbm`),
  ADD KEY `kode_jam` (`kode_jam`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`kode_jam`);

--
-- Indexes for table `jenis_nilai`
--
ALTER TABLE `jenis_nilai`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `kbm`
--
ALTER TABLE `kbm`
  ADD PRIMARY KEY (`kode_kbm`),
  ADD KEY `kode_ta` (`kode_ta`,`kode_semester`,`kode_guru`,`kode_kelas`,`kode_mapel`),
  ADD KEY `kode_semester` (`kode_semester`),
  ADD KEY `kode_guru` (`kode_guru`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_dataMapel` (`kode_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`),
  ADD KEY `kode_kbm` (`kode_kbm`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `fk_kdmapel` (`kode_kbm`),
  ADD KEY `kode_dataKelas` (`nis`),
  ADD KEY `jenis_nilai` (`kode_jenis`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_nis` (`nis`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`kode_mg`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`kode_presensi`),
  ADD KEY `fk_nis` (`kode_siswaKelas`),
  ADD KEY `fk_status` (`kode_status`),
  ADD KEY `assign_by` (`assign_by`);

--
-- Indexes for table `rapot`
--
ALTER TABLE `rapot`
  ADD PRIMARY KEY (`kode_rapot`),
  ADD KEY `fk_nis` (`nis`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`kode_role`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`kode_semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_role` (`role`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`kode_siswaKelas`),
  ADD KEY `fk_nis` (`nis`),
  ADD KEY `fk_kdkelas` (`kode_kelas`),
  ADD KEY `fk_kdta` (`kode_ta`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`kode_status`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`kode_ta`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`kode_wali`),
  ADD KEY `fk_kdguru` (`kode_guru`),
  ADD KEY `fk_kdkelas` (`kode_kelas`),
  ADD KEY `fk_kdta` (`kode_ta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `kode_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kbm`
--
ALTER TABLE `kbm`
  MODIFY `kode_kbm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `kode_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kode_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `kode_mg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `kode_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `kode_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `kode_siswaKelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `kode_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `kode_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`kode_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`kode_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_kbm`) REFERENCES `kbm` (`kode_kbm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_jam`) REFERENCES `jam` (`kode_jam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kbm`
--
ALTER TABLE `kbm`
  ADD CONSTRAINT `kbm_ibfk_1` FOREIGN KEY (`kode_ta`) REFERENCES `tahun_ajaran` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kbm_ibfk_2` FOREIGN KEY (`kode_semester`) REFERENCES `semester` (`kode_semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kbm_ibfk_3` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kbm_ibfk_4` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kbm_ibfk_5` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`kode_kbm`) REFERENCES `kbm` (`kode_kbm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_6` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_nilai` (`kode_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_7` FOREIGN KEY (`kode_kbm`) REFERENCES `kbm` (`kode_kbm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_8` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_9` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ortu`
--
ALTER TABLE `ortu`
  ADD CONSTRAINT `ortu_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_3` FOREIGN KEY (`kode_status`) REFERENCES `status` (`kode_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presensi_ibfk_5` FOREIGN KEY (`kode_siswaKelas`) REFERENCES `siswa_kelas` (`kode_siswaKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presensi_ibfk_6` FOREIGN KEY (`assign_by`) REFERENCES `kbm` (`kode_kbm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rapot`
--
ALTER TABLE `rapot`
  ADD CONSTRAINT `rapot_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`role`) REFERENCES `role` (`kode_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`kode_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `datakelas_fk2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `datakelas_fk3` FOREIGN KEY (`kode_ta`) REFERENCES `tahun_ajaran` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_kelas_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `walikelas_fk1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `walikelas_fk2` FOREIGN KEY (`kode_ta`) REFERENCES `tahun_ajaran` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `walikelas_fk3` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
