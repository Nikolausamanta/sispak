-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 06:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_basis_pengetahuan`
--

CREATE TABLE `tb_basis_pengetahuan` (
  `id_basis_pengetahuan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_basis_pengetahuan`
--

INSERT INTO `tb_basis_pengetahuan` (`id_basis_pengetahuan`, `id_penyakit`, `id_gejala`, `cf`) VALUES
(1, 1, 1, 0.8),
(2, 1, 2, 0.7),
(3, 1, 3, 0.6),
(4, 1, 4, 0.9),
(5, 1, 5, 0.6),
(6, 1, 6, 0.7),
(7, 1, 7, 0.8),
(8, 1, 8, 0.8),
(9, 1, 9, 0.8),
(10, 1, 10, 0.7),
(11, 1, 12, 0.6),
(12, 2, 9, 0.9),
(13, 2, 10, 0.8),
(14, 2, 27, 0.6),
(15, 3, 8, 0.7),
(16, 3, 11, 0.8),
(17, 3, 12, 0.8),
(18, 3, 13, 0.7),
(19, 3, 14, 0.9),
(20, 4, 15, 0.8),
(21, 4, 16, 0.6),
(22, 4, 17, 0.8),
(23, 4, 18, 0.8),
(24, 4, 19, 0.7),
(25, 5, 19, 0.8),
(26, 5, 20, 0.8),
(27, 5, 21, 0.7),
(28, 5, 22, 0.8),
(29, 6, 14, 0.7),
(30, 6, 23, 0.8),
(31, 6, 24, 0.9),
(32, 6, 25, 0.7),
(33, 6, 26, 0.7),
(34, 7, 13, 0.6),
(35, 7, 14, 0.7),
(36, 7, 27, 0.8),
(37, 7, 28, 0.8),
(38, 7, 29, 0.6),
(39, 7, 30, 0.9),
(40, 7, 31, 0.8),
(41, 7, 32, 0.6),
(42, 8, 27, 0.7),
(43, 8, 28, 0.7),
(44, 8, 29, 0.7),
(45, 8, 30, 0.6),
(46, 8, 31, 0.6),
(47, 8, 32, 0.6),
(48, 8, 33, 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `nama_gejala`) VALUES
(1, 'Komputer hidup sering restart atau kadang mati sendiri'),
(2, 'Setelah dihidupkan PC tidak bereaksi apaapa, tidak ada tampilan di monitor, ketika dipencet tombol on'),
(3, 'Komputer hang, ketika memutar video dengan resolusi besar'),
(4, 'Tidak berputarnya kipas pada power supply'),
(5, 'Lampu indikator di PC hidup tapi tidak tampil gambar dilayar monitor'),
(6, 'Tercium bau dari dalam PC'),
(7, 'PC sering mati tiba-tiba'),
(8, 'Suhu PC panas'),
(9, 'Komputer saat digunakan sering mati mendadak'),
(10, 'Kabel power telah terpasang dengan benar'),
(11, 'Setelah dihidupkan semua perangkat tidak terdeteksi sama sekali'),
(12, 'Kipas motherboard tidak berjalan'),
(13, 'Bunyi bip 3 kali selang 3 detik dan bunyi lagi'),
(14, 'Bunyi bip panjang, ketika komputer dinyalakan'),
(15, 'Harddisk tidak terdeteksi pada saat proses booting'),
(16, 'Koneksi kabel harddisk tidak benar'),
(17, 'Pada saat proses booting muncul pesan kesalahan “Invalid Partition Table”. Setelah itu booting gagal dan sistem tidak bisa diaktifkan'),
(18, 'Pada saat booting muncul pesan kesalahan “Error Loading Operating System” dan “Missing Operating System”'),
(19, 'CD/DVD ROM tidak terdeteksi pada saat proses booting'),
(20, 'Driver CD/DVD rusak'),
(21, 'Kabel-kabel yang terhubung ke CD/DVD Drive tidak terpasang dengan benar'),
(22, 'Setting Jumper CD/DVD Drive salah'),
(23, 'Pada nyalakan monitor, layar monitor gelap dan hitam'),
(24, 'Komputer menjadi macet atau hang ketika digunakan untuk bermain 3D'),
(25, 'Ada titik-titik kecil di layar monitor'),
(26, 'Pesan kesalahan pada layar monitor'),
(27, 'Monitor komputer blank'),
(28, 'Lampu indikator pada monitor menyala tapi monitor blank'),
(29, 'CPU bekerja tapi monitor blank'),
(30, 'Kadang layar monitor tampak blue screen'),
(31, 'Pada saat komputer dinyalakan, terdengar suara bip terus menerus'),
(32, 'RAM terpasang dengan benar'),
(33, 'Pada saat blue screen terdapat pesan “Data_Bus_Error”');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `hasil_penyakit` text NOT NULL,
  `hasil_gejala` text NOT NULL,
  `hasil_nilai` double NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hasil_created` int(11) NOT NULL,
  `hasil_updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_penyakit`, `hasil_penyakit`, `hasil_gejala`, `hasil_nilai`, `nama`, `usia`, `jenis_kelamin`, `alamat`, `hasil_created`, `hasil_updated`) VALUES
(1, 1, '{\"1\":\"0.9985\",\"2\":\"0.9000\"}', '{\"1\":\"1\",\"2\":\"2\",\"3\":\"3\",\"4\":\"1\",\"6\":\"3\",\"7\":\"2\",\"9\":\"1\",\"31\":\"4\"}', 0.9985, 'nikolaus samanta', 20, 'laki-laki', 'Mahkota Panggung', 1656428789, NULL),
(2, 5, '{\"5\":\"0.8960\",\"4\":\"0.8000\",\"7\":\"0.7793\",\"3\":\"0.7000\",\"1\":\"0.6672\",\"8\":\"0.4650\",\"2\":\"0.3600\"}', '{\"1\":\"2\",\"3\":\"2\",\"13\":\"1\",\"17\":\"1\",\"20\":\"1\",\"22\":\"2\",\"27\":\"2\",\"28\":\"4\",\"29\":\"2\",\"32\":\"3\"}', 0.896, 'nikolaus samanta test 2', 21, 'laki-laki', 'Panggung', 1656428885, NULL),
(3, 1, '{\"1\":\"0.9400\"}', '{\"1\":\"1\",\"2\":\"1\"}', 0.94, '123', 12, 'laki-laki', '12', 1656432923, NULL),
(4, 1, '{\"1\":\"0.8631\"}', '{\"1\":\"1\",\"2\":\"2\",\"4\":\"3\"}', 0.8631, 'test4', 18, 'perempuan', '123', 1656432960, NULL),
(5, 1, '{\"1\":\"0.8631\"}', '{\"1\":\"1\",\"2\":\"2\",\"4\":\"3\"}', 0.8631, 'test4', 18, 'perempuan', '123', 1656433073, NULL),
(6, 5, '{\"5\":\"0.9400\",\"1\":\"0.9400\",\"6\":\"0.8000\",\"4\":\"0.8000\"}', '{\"1\":\"1\",\"2\":\"1\",\"15\":\"1\",\"21\":\"1\",\"22\":\"1\",\"23\":\"1\"}', 0.94, 'test 6', 24, 'perempuan', 'test 6', 1656434617, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(255) NOT NULL,
  `cf_kondisi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id_kondisi`, `nama_kondisi`, `cf_kondisi`) VALUES
(1, 'Pasti Ya', 1),
(2, 'Mungkin Ya', 0.6),
(3, 'Tidak Tahu', -0.2),
(4, 'Mungkin Tidak', -0.6),
(5, 'Pasti Tidak', -1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `deskripsi_penyakit` text NOT NULL,
  `saran_penyakit` text NOT NULL,
  `gambar_penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi_penyakit`, `saran_penyakit`, `gambar_penyakit`) VALUES
(1, 'Power Supply (PC restart/mati)', 'Power supply merupakan perangkat keras mengatur bagian kelistrikan dalam sebuah PC, di  alamnya terdapat komponen yang sering rusak kapasitor, resistor, sekering, transistor regulator, sakelar, diode, jalur tembaga di PCB putus, transformator.', 'Test', 'ad3386fde68bc1a5e1b42ccf0731e1f1.png'),
(2, 'Processor', 'Prosesor merupakan komponen komputer yang paling rumit dan paling kecil. Bisa dibayangkan, sebuah barang dengan ukuran kecil atau sekitar 3 cm mampu memuat ribuan atau bahkan jutaan \r\ntransistor, di dalamnya terdapat komponen yang sering rusak unit control, register, CPU Interconnection', 'Test', '36fa62af34c80971810e6428c3f8f436.png'),
(3, 'Motherboard', 'Motherboard merupakan salah satu perangkat keras komputer yang sangat penting perannya dalam menyusun sebuah sistem komputer, di dalamnya terdapat komponen yang sering rusak chipset, CPU slots, BIOS chip, CMOS, Memory slots, expansion slots, Storage Drive Connector.', 'Test', 'ca1649ae5b616a56901fbbfa94f1ca34.png'),
(4, 'Harddisk', 'Harddisk merupakan media penyimpanan utama yang saat ini nampaknya masih sangat populer digunakan oleh para pengguna komputer, di dalamnya terdapat komponen yang sering rusak  pindle, kabel SATA, head, logic board, actual axis, ribbon cable, ide conector, sata conector, setting jumper, power conector.', 'Test', '33b39eaa8f1fcd630a5965f622a57ac5.png'),
(5, 'CD/DVD Rom', 'CD/DVD ROM merupakan salah satu perangkat peripheral penting pada sebuah perangkat komputer yang berfungsi sebagai penggerak atau pemutar pembaca keping-cakram CD/DVD sebagai penyimpan data digital, kerusakan terjadi pada optik, PSU kurang memberi daya kepada motor CD/DVD ROM.', 'Test', '0228dcd54baddadfe5bb71c92903527b.png'),
(6, 'Kerusakan VGA (monitor blank)', 'Video Graphic Adapter merupakan salah satu komponen penting dalam perangkat komputer. Betapa tidak, tanpa adanya VGA informasi yang diproses tidak akan ditampilkan secara visual pada layar monitor, terdapat kerusakan artifact video memory /layar masih bisa terlihat adanya pergeseran warna substansi, graphics processing unit (GPU) layar kotak, DVI corruption / layar bergaris biru.', 'Test', '3a80c84dc4a5433efe27a132701384a6.png'),
(7, 'RAM', 'RAM (Random Acces Memory) merupakan perangkat keras yang terdapat pada komputer yang berfungsi untuk menyimpan memori sementara pada saat komputer diaktifkan, di dalamnya terdapat komponen yang kita ketahui type menerangkan jenis RAM, capacity menerangkan seberapa besar kapasitas penyimpanan RAM, FSB (Front Side Bus) besar jalur data antara Processor dan RAM, Bandwith merupakan besarnya data yang ditransfer dalam satu detik, jumlah IC menerangkan berapa banyak chip yang dipasang pada module RAM.', 'Test', '25a778ce4826117965835f02c2045337.png'),
(8, 'Slot Memory', 'Slot memori digunakan untuk memasang memori utama komputer, oleh karena itu apabila kondisi memory sudah dipastikan dapat bekerja dengan baik maka ada kemungkinan (salah satu) slot memory pada motherboard rusak atau memory tidak terpasang dengan baik, atau bisa jadi slot memory kotor atau berkerak karena usia pemakaian yang sudah cukup lama.', 'Test', '89a6dc0b451884779f5d8b1a2e4d30fc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'default.jpg', '$2y$10$WJP/WioHgkucKmdrF4DW3ubTmGkBeZrPIBCG/WnE5QZ8IRb0Gv.EC', 1, 1, 1656425312);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_basis_pengetahuan`
--
ALTER TABLE `tb_basis_pengetahuan`
  ADD PRIMARY KEY (`id_basis_pengetahuan`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_basis_pengetahuan`
--
ALTER TABLE `tb_basis_pengetahuan`
  MODIFY `id_basis_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_basis_pengetahuan`
--
ALTER TABLE `tb_basis_pengetahuan`
  ADD CONSTRAINT `tb_basis_pengetahuan_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `tb_gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_basis_pengetahuan_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `tb_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD CONSTRAINT `tb_hasil_ibfk_1` FOREIGN KEY (`id_hasil`) REFERENCES `tb_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
