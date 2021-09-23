-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2021 at 09:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

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
  `id` int(11) NOT NULL,
  `activity` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(7) NOT NULL,
  `district` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`) VALUES
(7407010, 'Binongko'),
(7407011, 'Togo Binongko'),
(7407020, 'Tomia'),
(7407021, 'Tomia Timur'),
(7407030, 'Kaledupa'),
(7407031, 'Kaledupa Selatan'),
(7407040, 'Wangi-Wangi'),
(7407050, 'Wangi-Wangi Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `district_id` int(7) NOT NULL,
  `village_id` int(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Perempuan','Laki-laki') NOT NULL,
  `phone` varchar(128) NOT NULL,
  `marriage_status` enum('Belum Menikah','Sudah Menikah') NOT NULL,
  `education` enum('SD/MI','SMP/MTs','SMA/MA/SMK','DI','DII','DIII','DIV','S1') NOT NULL,
  `job` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mitra_track_record`
--

CREATE TABLE `mitra_track_record` (
  `id` int(9) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `skor_1` int(2) NOT NULL,
  `skor_2` int(2) NOT NULL,
  `skor_3` int(2) NOT NULL,
  `skor_4` int(2) NOT NULL,
  `skor_5` int(2) NOT NULL,
  `user_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` int(9) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `gender` enum('Perempuan','Laki-laki') NOT NULL,
  `position_id` int(11) NOT NULL,
  `district_id` int(7) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `name`, `email`, `password`, `role_id`, `gender`, `position_id`, `district_id`, `phone`, `image`) VALUES
(5, 'Febiana', 'febianadahliaa@gmail.com', '$2y$10$6fPWC9XQc01DpbfUqGky1ub/PALiBFlF8.9JzQHSJx5U8leyiAaha', 1, 'Perempuan', 2, 7407050, '', 'default.jpg'),
(6, 'Tobio', 'kageyamatobio@gmail.com', '$2y$10$crr8zOp8024LoXxjkibN3uwQ.vgEAVRiwmEqvNswVIlBsev0YP66.', 2, 'Laki-laki', 2, 7407050, '', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `is_active`) VALUES
(1, 'Manajemen', 1),
(2, 'Beranda', 1),
(3, 'Database_Mitra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_position`
--

CREATE TABLE `user_position` (
  `id` int(11) NOT NULL,
  `position` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_position`
--

INSERT INTO `user_position` (`id`, `position`) VALUES
(1, 'Koordinator Fungsi'),
(2, 'Staf Fungsi');

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
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_menu_name` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `sub_menu_name`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Menu', 'admin/menu_management', 'fas fa-fw fa-bars', 1),
(2, 1, 'Mitra', 'admin/mitra_list', 'fas fa-fw fa-user-cog', 1),
(3, 1, 'Kegiatan', 'admin/activity_list', 'fas fa-fw fa-chart-line', 1),
(4, 2, 'Dashboard', 'user', 'fas fa-fw fa-tachometer-alt', 1),
(5, 3, 'Data Mitra', 'user/mitra_data', 'fas fa-fw fa-table', 1),
(6, 3, 'Track Record', 'user/mitra_track_record', 'fas fa-fw fa-database', 1);

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `id` int(10) NOT NULL,
  `village` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mitra_kecamatan` (`district_id`),
  ADD KEY `fk_mitra_desa` (`village_id`);

--
-- Indexes for table `mitra_track_record`
--
ALTER TABLE `mitra_track_record`
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_accessMenu_role` (`role_id`),
  ADD KEY `fk_accessMenu_menu` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_position`
--
ALTER TABLE `user_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subMenu_menu` (`menu_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitra_track_record`
--
ALTER TABLE `mitra_track_record`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `nip` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_position`
--
ALTER TABLE `user_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `fk_mitra_district` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mitra_village` FOREIGN KEY (`village_id`) REFERENCES `village` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `mitra_track_record`
--
ALTER TABLE `mitra_track_record`
  ADD CONSTRAINT `fk_trackRecord_activity` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trackRecord_mitra` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trackRecord_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`nip`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_district` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_position` FOREIGN KEY (`position_id`) REFERENCES `user_position` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `fk_accessMenu_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_accessMenu_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `fk_subMenu_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
