-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 11:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cliquebait`
--
CREATE DATABASE IF NOT EXISTS `cliquebait` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cliquebait`;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `first_name`, `middle_name`, `last_name`) VALUES
(4, 'Maxym', 'Me', 'Galenko'),
(5, 'Sayem', '', 'Shah'),
(6, 'Tarz', '', 'G'),
(7, 'Slayem', '', 'Shah'),
(8, 'Sayy', '', 'Sa'),
(9, 'Jake', '', 'Coop'),
(12, 'Coke', '', 'Zero'),
(13, 'Johnny', 'M', 'Test'),
(14, 'joe', '', 'boe'),
(16, 'Jackie', '', 'Chan'),
(17, 'Mr', '', 'Olympia'),
(19, 'we', 'are', 'good'),
(20, 'Sahra', '', 'Philips'),
(21, 'james', '', 'bond'),
(22, 'Jake', 'State', 'Farm'),
(23, 'Gemini', '', ''),
(24, 'Ally', 'Ben', 'Allison'),
(25, 'Tom', 'and', 'Jerry'),
(26, 'Clark', '', 'Kent');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `picture` varchar(128) NOT NULL,
  `caption` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `picture`, `caption`, `timestamp`) VALUES
(17, 4, '640214309389e.jpg', 'R33', '2023-03-03 15:37:20'),
(18, 5, '6403b1a2a75bb.png', 'Big sale at Mode Sayem. Discounts on winter jackets, t-shirts, jeans and more! Go check it out!', '2023-03-04 21:01:22'),
(20, 5, '6403ed6c64f89.jpg', '', '2023-03-05 01:16:28'),
(21, 4, '640500835665c.jpg', 'First time snowboarding! It was an amazing experience and shoutout to my dad for taking the sick picture', '2023-03-05 20:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(4, 'Max', '$2y$10$J5nRgg9Mach9fcpIfnJFpuUHEkvkD8EbR1a3pOCUgNeA/i1QLnJ2S'),
(5, 'sayem', '$2y$10$Iam6adv78nh9A.PuuxxdmeB/LzaCm2IzDkVzUza/44PzzB4/hGCpG'),
(6, 'tarzan', '$2y$10$/5Kxh88HaDk7imU4tgrvU.WCegU94sJBogMmlmSrV2XpZ4KgNYR66'),
(7, 'Slayem80', '$2y$10$iOU8AUVM0wqPySNz715ACOWEa5h29eWTlkhHMifxBPoU539JsHzre'),
(8, 'Mega Nunu Ranger', '$2y$10$xC125ynoWiyMf8e45o9uw.SPtbFD3y7thlkCbv4TsUQ19z2fwkzhW'),
(9, 'jake', '$2y$10$Bf1dknvs1r.CNGTSbzWwKO744NdObM.l7cAbj1C481Q9mb.qqzRAy'),
(12, 'Zero', '$2y$10$SWXFd7AFj3piIq47oIVZQuYyOewoX9eT6VPv53MNB/C0Zehx8Sj76'),
(13, 'Johnny', '$2y$10$xweuc2Ryg.dL6JzyzydLiuyp2rMtCVkx8R3cepwNVt7GmCq.meum2'),
(14, '123', '$2y$10$CAqpEAM3v1eIRkJpbRjzFuXElH2rqih0OabP91Skcozh4gEKGhmTK'),
(15, 'Mertz562', '$2y$10$vZXUsWln9gVgsmm8228Cye7SjIkw8YS/ZTVm3togyrrXizNmcFMre'),
(16, 'Jackie', '$2y$10$JIGcxnx.Lk3IOln46A38Lupgubs.o8nel5pESYW7zQCu3V2sApDoO'),
(17, 'Arnold123', '$2y$10$sox5p4jJErCo.xiY02n7P.BXMPL8uDfW9C7x8uaHK/maR.dMky1TC'),
(18, 'Draco90', '$2y$10$1vUNUalkyMw77vNdA507te72YibuxIYcE8eoe1DRNkc9WQBU8FYFa'),
(19, 'weat', '$2y$10$v2Bko.l1zGk/GmYhl8yesucrSOC2gBuOPZzveFrGRNIN.RmRCHY4.'),
(20, 'Jenkins', '$2y$10$AENskAXjHtbf8s7KppjOV.gvWP3nwwupyjE89A3TAubDIzcjaB9ke'),
(21, 'Jameson', '$2y$10$31ri6NZd5TWj/e0H4UdDBu0nVj9RVJ9Hn4cs4agT1Kh5h7fpENFTW'),
(22, 'ragnarok', '$2y$10$ZwyA0TrGWXU85BYtutbcGOSSuYnQZwEcQfrAcPQv3cSb.CvCK/Ce2'),
(23, 'gemini', '$2y$10$UqKuENEE9JRb/MUEM3Yjku4cXUdUlKQ8PRN9KHfUZO6boS1JIRKnW'),
(24, 'Allen672', '$2y$10$9kPL89zuBsdhvYFzK3e5Tec8l0TyRWAiElVIyja3GFZBLPwD0hCn2'),
(25, 'Jerry', '$2y$10$t/q8D1u7PyqtTdBfEvX0G.d8t8YUNeJ02eh/wyzAkdTy5XoT/aieO'),
(26, 'Superman73', '$2y$10$FEONSCKCO12HOFTfAuoEn.QY9b3sVO04kS.EFATumrDMACRhRBujK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD UNIQUE KEY `user_id` (`profile_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`profile_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
