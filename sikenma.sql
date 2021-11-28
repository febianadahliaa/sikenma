-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 02:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikenma`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity`) VALUES
(1, 'Sensus Penduduk'),
(2, 'Sensus Pertanian'),
(3, 'Sensus Ekonomi'),
(4, 'Survei Angkatan Kerja Nasional'),
(5, 'Survei Sosial Ekonomi Nasional'),
(6, 'Survei Harga Pedesaan'),
(7, 'Survei Ubinan'),
(29, 'Survei SITASI');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` varchar(7) NOT NULL,
  `district` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district`) VALUES
('7407010', 'Binongko'),
('7407011', 'Togo Binongko'),
('7407020', 'Tomia'),
('7407021', 'Tomia Timur'),
('7407030', 'Kaledupa'),
('7407031', 'Kaledupa Selatan'),
('7407040', 'Wangi-Wangi'),
('7407050', 'Wangi-Wangi Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `mitra_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `village_id` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Perempuan','Laki-laki') NOT NULL,
  `phone` varchar(128) NOT NULL,
  `marriage_status` enum('Belum Menikah','Sudah Menikah') NOT NULL,
  `education` enum('SD/MI','SMP/MTs','SMA/MA/SMK','DI','DII','DIII','DIV','S1') NOT NULL,
  `job` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`mitra_id`, `name`, `village_id`, `date_of_birth`, `gender`, `phone`, `marriage_status`, `education`, `job`) VALUES
(15, 'Rasfiati', '7407030009', '1987-08-25', 'Perempuan', '082292681410', 'Sudah Menikah', 'DIV', 'Lainnya'),
(16, 'Wa Ode Sarfina', '7407030005', '1992-08-11', 'Perempuan', '085241991240', 'Sudah Menikah', 'S1', 'Lainnya'),
(17, 'Rahmi Dian Safitri', '7407031017', '1998-02-27', 'Perempuan', '085341626627', 'Sudah Menikah', 'DIV', 'Lainnya'),
(18, 'Asnida', '7407031017', '1992-01-11', 'Perempuan', '085145661562', 'Sudah Menikah', 'SMA/MA/SMK', 'Lainnya'),
(19, 'Nurlela', '7407030006', '1996-05-28', 'Perempuan', '082393200242', 'Belum Menikah', 'S1', 'Lainnya'),
(20, 'Yolanda Juans Patti', '7407030005', '1996-08-19', 'Perempuan', '082291566105', 'Belum Menikah', 'S1', 'Guru'),
(21, 'Lismawati Diki', '7407050010', '1980-10-22', 'Perempuan', '085255099635', 'Sudah Menikah', 'SMA/MA/SMK', 'Lainnya'),
(24, 'TOBIO', '7407010001', '1998-11-05', 'Laki-laki', '081210766111', 'Belum Menikah', 'S1', 'BISA EDITt');

-- --------------------------------------------------------

--
-- Table structure for table `mitra_track_record`
--

CREATE TABLE `mitra_track_record` (
  `track_record_id` int(9) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `skor_geo` int(3) NOT NULL,
  `skor_it` int(3) NOT NULL,
  `skor_prob` int(3) NOT NULL,
  `skor_qty` int(3) NOT NULL,
  `skor_abc` int(3) NOT NULL,
  `skor_time` int(3) NOT NULL,
  `user_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra_track_record`
--

INSERT INTO `mitra_track_record` (`track_record_id`, `mitra_id`, `activity_id`, `year`, `skor_geo`, `skor_it`, `skor_prob`, `skor_qty`, `skor_abc`, `skor_time`, `user_id`) VALUES
(15, 16, 4, 2021, 87, 85, 80, 75, 85, 86, 340055507),
(16, 17, 7, 2021, 80, 83, 85, 75, 86, 81, 340017266),
(17, 16, 5, 2020, 80, 78, 85, 87, 88, 85, 340055507),
(20, 24, 29, 2030, 80, 80, 80, 80, 90, 90, 999888777),
(23, 18, 2, 2021, 90, 80, 90, 80, 90, 80, 340060098),
(24, 24, 29, 2030, 90, 90, 90, 90, 90, 90, 999888777),
(25, 24, 4, 2022, 75, 75, 75, 75, 75, 75, 999888777);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` int(9) NOT NULL,
  `uname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `gender` enum('Perempuan','Laki-laki') NOT NULL,
  `position_id` int(11) NOT NULL,
  `district_id` varchar(7) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `uname`, `email`, `password`, `role_id`, `gender`, `position_id`, `district_id`, `phone`, `image`) VALUES
(340017266, 'Badam Akbar Fahrunaddi', 'badam@bps.go.id', '$2y$10$sN/cpirn2RiUV2Frds/Zd.1HJaT5nL51JmEUSpTDmuKE5uxM2BOv2', 2, 'Laki-laki', 1, '7407050', '082193248434', 'default.jpg'),
(340055489, 'Apri Dian Sulistiana', 'apridiansulistiana@bps.go.id', '$2y$10$l44slClq6MzgGYR2/V6W/.e5Z7ksX2EUI50AcSCfWuMUe7sfFsjqW', 2, 'Perempuan', 1, '7407050', '085200552033', 'default.jpg'),
(340055507, 'Sudarmini', 'sudarmini@bps.go.id', '$2y$10$ixzT880mhJy94R5AP6dvjujTW3JF0p3HbxQjj29JD8TJ4MBf4nWW6', 2, 'Laki-laki', 1, '7407050', '085236097145', 'default.jpg'),
(340056867, 'Muhammad Nur Kamal', 'nurkamal@bps.go.id', '$2y$10$.okaKhoejeC/.5u3Y5NaF.uNeSEMDTxhieY99Hhcbkc/yd0gkhzVi', 1, 'Laki-laki', 1, '7407050', '082191918081', 'default.jpg'),
(340057015, 'Chandra Ciputra Suyadi', 'chandra.suyadi@bps.go.id', '$2y$10$TtTgITL9aVIR61G8DoFSu.BNTVyZhMkdl2fZL42Umino5IBDCqbpG', 2, 'Laki-laki', 1, '7407050', '085216091991', 'default.jpg'),
(340060098, 'Febiana Dahlia Anjani', 'feb@bps.go.id', '$2y$10$2Zajx.9MbbBpQGxnzkcNBO46UKjwaP6RZg9OWUV1qq8uI1Lj8N7WO', 1, 'Perempuan', 2, '7407021', '081210766330', 'default.jpg'),
(999888777, 'YUKI ISHIKAWA', 'yuki@bps.go.id', '$2y$10$FXHQwODvb5TpWxbi83Eg.OphPLhEeUAJpKZU4yKmYLcpnTWwzjBgy', 2, 'Laki-laki', 2, '7407021', '081222888999', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `access_menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`access_menu_id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `collapse` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `menu`, `icon`, `collapse`, `is_active`) VALUES
(1, 'Dashboard', 'fas fa-fw fa-desktop', 'dashboard', 1),
(2, 'Manajemen', 'fas fa-fw fa-cog', 'manajemen', 1),
(3, 'Mitra_Rating', 'far fa-fw fa-star', 'rating', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_position`
--

CREATE TABLE `user_position` (
  `position_id` int(11) NOT NULL,
  `position` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_position`
--

INSERT INTO `user_position` (`position_id`, `position`) VALUES
(1, 'Koordinator Fungsi'),
(2, 'Staf Fungsi');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `sub_menu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_menu_name` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`sub_menu_id`, `menu_id`, `sub_menu_name`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Mitra', 'manajemen/mitra_list', 'fas fa-fw fa-users-cog', 1),
(2, 2, 'Kegiatan', 'manajemen/activity_list', 'fas fa-fw fa-chart-line', 1),
(3, 2, 'Pegawai', 'manajemen/employee_list', 'fas fa-fw fa-user-cog', 1),
(4, 1, 'Dashboard', 'dashboard', '', 1),
(5, 3, 'Summary', 'mitra_rating/summary', 'fas fa-fw fa-table', 1),
(6, 3, 'Track Record', 'mitra_rating/track_record', 'fas fa-fw fa-database', 1),
(7, 3, 'Kegiatan Statistik', 'mitra_rating/surveys', 'fas fa-fw fa-poll', 1),
(100, 2, 'Menu', 'manajemen/menu', 'fas fa-fw fa-bars', 0);

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `village_id` varchar(10) NOT NULL,
  `village` varchar(128) NOT NULL,
  `district_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`village_id`, `village`, `district_id`) VALUES
('7407010001', 'Taipabu', '7407010'),
('7407010006', 'Wali', '7407010'),
('7407010007', 'Lagongga', '7407010'),
('7407010008', 'Kampo-Kampo', '7407010'),
('7407010009', 'Palahidu', '7407010'),
('7407010010', 'Makoro', '7407010'),
('7407010011', 'Palahidu Barat', '7407010'),
('7407010012', 'Rukuwa', '7407010'),
('7407010013', 'Jaya Makmur', '7407010'),
('7407011001', 'Sowa', '7407011'),
('7407011002', 'Popalia', '7407011'),
('7407011003', 'Oihu', '7407011'),
('7407011004', 'Waloindi', '7407011'),
('7407011005', 'Haka', '7407011'),
('7407020001', 'Waitii Barat', '7407020'),
('7407020002', 'Waitii', '7407020'),
('7407020003', 'Lamanggau', '7407020'),
('7407020013', 'Patua', '7407020'),
('7407020014', 'Onemay', '7407020'),
('7407020015', 'Waha', '7407020'),
('7407020016', 'Runduma', '7407020'),
('7407020017', 'Teemoane', '7407020'),
('7407020018', 'Kollo Soha', '7407020'),
('7407020019', 'Patua Ii', '7407020'),
('7407021004', 'Patipelong', '7407021'),
('7407021005', 'Tongano Barat', '7407021'),
('7407021006', 'Bahari', '7407021'),
('7407021007', 'Tongano Timur', '7407021'),
('7407021008', 'Timu', '7407021'),
('7407021009', 'Dete', '7407021'),
('7407021010', 'Kulati', '7407021'),
('7407021011', 'Wawotimu', '7407021'),
('7407021012', 'Kahianga', '7407021'),
('7407030001', 'Horuo', '7407030'),
('7407030002', 'Sombano', '7407030'),
('7407030003', 'Lau-Lua', '7407030'),
('7407030004', 'Samabahari', '7407030'),
('7407030005', 'Ambeua', '7407030'),
('7407030006', 'Lagiwae', '7407030'),
('7407030007', 'Ollo', '7407030'),
('7407030008', 'Buranga', '7407030'),
('7407030009', 'Balasuna', '7407030'),
('7407030010', 'Mantigola Makmur', '7407030'),
('7407030011', 'Balasuna Selatan', '7407030'),
('7407030012', 'Ollo Selatan', '7407030'),
('7407030013', 'Waduri', '7407030'),
('7407030014', 'Lefuto', '7407030'),
('7407030015', 'Ambeua Raya', '7407030'),
('7407030016', 'Kalimas', '7407030'),
('7407031010', 'Tampara', '7407031'),
('7407031011', 'Kaswari', '7407031'),
('7407031012', 'Pajam', '7407031'),
('7407031013', 'Sandi', '7407031'),
('7407031014', 'Langge', '7407031'),
('7407031015', 'Tanomeha', '7407031'),
('7407031016', 'Lentea', '7407031'),
('7407031017', 'Darawa', '7407031'),
('7407031018', 'Peropa', '7407031'),
('7407031019', 'Tanjung', '7407031'),
('7407040013', 'Pongo', '7407040'),
('7407040014', 'Maleko', '7407040'),
('7407040015', 'Longa', '7407040'),
('7407040016', 'Tindoi', '7407040'),
('7407040017', 'Wanci', '7407040'),
('7407040018', 'Wandoka', '7407040'),
('7407040019', 'Sombu', '7407040'),
('7407040020', 'Waha', '7407040'),
('7407040021', 'Waetuno', '7407040'),
('7407040022', 'Pada Raya Makmur', '7407040'),
('7407040023', 'Waelumu', '7407040'),
('7407040024', 'Patuno', '7407040'),
('7407040025', 'Wandoka Utara', '7407040'),
('7407040026', 'Wandoka Selatan', '7407040'),
('7407040027', 'Waginopo', '7407040'),
('7407040028', 'Tindoi Timur', '7407040'),
('7407040029', 'Posalu', '7407040'),
('7407040030', 'Koroe Onawa', '7407040'),
('7407040031', 'Wapia Pia', '7407040'),
('7407040032', 'Pookambua', '7407040'),
('7407050001', 'Kapota', '7407050'),
('7407050002', 'Kabita', '7407050'),
('7407050003', 'Liya Mawi', '7407050'),
('7407050004', 'Liya Togo', '7407050'),
('7407050005', 'Matahora', '7407050'),
('7407050006', 'Wungka', '7407050'),
('7407050007', 'Numana', '7407050'),
('7407050008', 'Mola Selatan', '7407050'),
('7407050009', 'Mola Utara', '7407050'),
('7407050010', 'Mandati I', '7407050'),
('7407050011', 'Komala', '7407050'),
('7407050012', 'Mandati II', '7407050'),
('7407050013', 'Kapota Utara', '7407050'),
('7407050014', 'Kabita Togo', '7407050'),
('7407050015', 'Mandati III', '7407050'),
('7407050016', 'Liya One Melangka', '7407050'),
('7407050017', 'Wisata Kolo', '7407050'),
('7407050018', 'Mola Samaturu', '7407050'),
('7407050019', 'Mola Bahari', '7407050'),
('7407050020', 'Mola Nelayan Bakti', '7407050'),
('7407050021', 'Liya Bahari Indah', '7407050');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`mitra_id`),
  ADD KEY `fk_mitra_desa` (`village_id`);

--
-- Indexes for table `mitra_track_record`
--
ALTER TABLE `mitra_track_record`
  ADD PRIMARY KEY (`track_record_id`),
  ADD KEY `fk_trecord_mitra` (`mitra_id`),
  ADD KEY `fk_trecord_user` (`user_id`),
  ADD KEY `fk_trecord_kegiatan` (`activity_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_user_role` (`role_id`),
  ADD KEY `fk_user_kecamatan` (`district_id`),
  ADD KEY `fk_user_position` (`position_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`access_menu_id`),
  ADD KEY `fk_accessMenu_menu` (`menu_id`),
  ADD KEY `fk_accessMenu_role` (`role_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `user_position`
--
ALTER TABLE `user_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`sub_menu_id`),
  ADD KEY `fk_subMenu_menu` (`menu_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`village_id`),
  ADD KEY `fk_village_district` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mitra_track_record`
--
ALTER TABLE `mitra_track_record`
  MODIFY `track_record_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `access_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_position`
--
ALTER TABLE `user_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `fk_mitra_village` FOREIGN KEY (`village_id`) REFERENCES `village` (`village_id`) ON UPDATE CASCADE;

--
-- Constraints for table `mitra_track_record`
--
ALTER TABLE `mitra_track_record`
  ADD CONSTRAINT `fk_trackRecord_activity` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trackRecord_mitra` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`mitra_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trackRecord_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`nip`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_district` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_position` FOREIGN KEY (`position_id`) REFERENCES `user_position` (`position_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `fk_accessMenu_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `fk_subMenu_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`menu_id`) ON UPDATE CASCADE;

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `fk_village_district` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
