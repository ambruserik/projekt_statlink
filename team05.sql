-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2025 at 01:06 PM
-- Server version: 10.11.11-MariaDB-0ubuntu0.24.04.2
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team05`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacting`
--

CREATE TABLE `contacting` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `esports`
--

CREATE TABLE `esports` (
  `id` int(11) NOT NULL,
  `nickname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `realname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `img` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `nation` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `age` int(11) NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `rank` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `team` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `teamid` int(11) DEFAULT NULL,
  `prev_teams` varchar(10000) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `active` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `esports`
--

INSERT INTO `esports` (`id`, `nickname`, `realname`, `img`, `nation`, `age`, `role`, `rank`, `team`, `teamid`, `prev_teams`, `active`) VALUES
(1, 'BrokenBlade', 'Sergen Celikk', 'BrokenBlade.jpg', 'Német', 24, 'Top', 'Challenger', 'G2', 1, 'S04:TCL:TSM', 'igen'),
(2, 'Yike', 'Martin Sundelin', 'Yike.jpg', 'Svéd', 22, 'Jungler', 'Challenger', 'G2', 1, 'LFL', 'igen'),
(3, 'Caps', 'Rasmus Winther', 'Caps.jpg', 'Dán', 25, 'Mid', 'Challenger', 'G2', 1, 'FNC', 'igen'),
(4, 'Hanssama', 'Steven Liv', 'Hanssama.jpg', 'Francia', 25, 'ADC', 'Challenger', 'G2', 1, 'MSF:RGE:TL', 'igen'),
(5, 'Mikyx', 'Mihael Mehle', 'Mikyx.jpg', 'Szlovén', 26, 'Support', 'Challenger', 'G2', 1, 'FNC:MSF', 'igen'),
(6, 'Oscarinin', 'Oscar Munoz', 'Oscarinin.jpg', 'Spanyol', 21, 'Top', 'Challenger', 'FNC', 2, 'FNC.TQ', 'igen'),
(7, 'Razork', 'Iván Martín Díaz', 'Razork.jpg', 'Spanyol', 24, 'Jungler', 'Challenger', 'FNC', 2, 'MSF', 'igen'),
(8, 'Humanoid', 'Marek Brajkovic', 'Humanoid.jpg', 'Cseh', 24, 'Mid', 'Challenger', 'FNC', 2, 'MAD:S04', 'igen'),
(9, 'Noah', 'Oh Hyeon-taek', 'Noah.jpg', 'Koreai', 23, 'ADC', 'Challenger', 'FNC', 2, 'LCK.A', 'igen'),
(10, 'Trymbi', 'Adrian Trybus', 'Trymbi.jpg', 'Lengyel', 24, 'Support', 'Challenger', 'FNC', 2, 'AGO:RGE', 'igen'),
(11, 'Zeus', 'Choi Woo-je', 'Zeus.jpg', 'Koreai', 20, 'Top', 'Challenger', 'T1', 3, 'T1.A', 'igen'),
(12, 'Oner', 'Moon Hyeon-joon', 'Oner.jpg', 'Koreai', 22, 'Jungler', 'Challenger', 'T1', 3, 'T1.A', 'igen'),
(13, 'Faker', 'Lee Sang-hyeok', 'Faker.jpg', 'Koreai', 28, 'Mid', 'Challenger', 'T1', 3, 'N/A', 'igen'),
(14, 'Gumayusi', 'Lee Min-hyeong', 'Gumayusi.jpg', 'Koreai', 22, 'ADC', 'Challenger', 'T1', 3, 'T1.A', 'igen'),
(15, 'Keria', 'Ryu Min-seok', 'Keria.jpg', 'Koreai', 22, 'Support', 'Challenger', 'T1', 3, 'DRX', 'igen'),
(16, 'Bin', 'Chen Ze-Bin', 'Bin.jpg', 'Kínai', 22, 'Top', 'Challenger', 'BLG', 4, 'RNG:SN', 'igen'),
(17, 'Xun', 'Peng Li-Xun', 'Xun.jpg', 'Kínai', 22, 'Jungler', 'Challenger', 'BLG', 4, 'IG', 'igen'),
(18, 'Yagao', 'Zhuo Rui', 'Yagao.jpg', 'Kínai', 26, 'Mid', 'Challenger', 'BLG', 4, 'JDG', 'igen'),
(19, 'Elk', 'Zhao Jia-Hao', 'Elk.jpg', 'Kínai', 23, 'ADC', 'Challenger', 'BLG', 4, 'WE', 'igen'),
(20, 'ON', 'Zuo Zh-Hao', 'ON.jpg', 'Kínai', 22, 'Support', 'Challenger', 'BLG', 4, 'SN', 'igen'),
(21, 'Summit', 'Park Woo-tae', 'Summit.jpg', 'Koreai', 26, 'Top', 'Challenger', 'TL', 5, 'SB:C9:FPX', 'igen'),
(22, 'UmTi', 'Eom Seong-hyeon', 'Umti.jpg', 'Koreai', 25, 'Jungler', 'Challenger', 'TL', 5, 'JAG:KT:BRB:LSB', 'igen'),
(23, 'APA', 'Eain Stearns', 'Apa.jpg', 'Amerikai', 20, 'Mid', 'Challenger', 'TL', 5, 'TLA', 'igen'),
(24, 'Yeon', 'Sean Sung', 'Yeon.jpg', 'Amerikai', 21, 'ADC', 'Challenger', 'TL', 5, 'TLA', 'igen'),
(25, 'CoreJJ', 'Jo Yong-in', 'CoreJJ.jpg', 'Koreai', 30, 'Support', 'Challenger', 'TL', 5, 'DIG:SSG:GMB', 'igen'),
(26, 'Vizicsacsi', 'Tamás Kiss', 'Vizicsacsi.jpg', 'Magyar', 31, 'Top', 'Challenger', '-', NULL, 'UOL:SPY:MSF', 'nem'),
(36, 'Jankos', 'Marcin Jankowski', 'Jankos.jpg', 'Lengyel', 28, 'Jungle', 'Challenger', '-', NULL, 'H2K:G2:Team Heretics', 'nem'),
(37, 'Pobelter', 'Eugene Park', 'Pobelter.jpg', 'Amerikai', 27, 'Mid', 'Challenger', '-', NULL, 'CLG:Immortals:Liquid', 'nem'),
(38, 'Doublelift', 'Yiliang Peng', 'Doublelift.jpg', 'Amerikai', 30, 'ADC', 'Challenger', '-', NULL, 'CLG:TSM:Liquid:100T', 'nem'),
(39, 'Sneaky', 'Zachary Scuderi', 'Sneaky.jpg', 'Amerikai', 29, 'ADC', 'Challenger', '-', NULL, 'Cloud9', 'nem'),
(40, 'Rekkles', 'Carl Martin Erik Larsson', 'Rekkles.jpg', 'Svéd', 27, 'ADC', 'Challenger', '-', NULL, 'Fnatic:G2:KC', 'nem');

-- --------------------------------------------------------

--
-- Table structure for table `esports_matches`
--

CREATE TABLE `esports_matches` (
  `id` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `team` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `against` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `bestof` int(11) NOT NULL,
  `won` int(11) NOT NULL,
  `lost` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `esports_matches`
--

INSERT INTO `esports_matches` (`id`, `teamid`, `team`, `against`, `bestof`, `won`, `lost`, `date`) VALUES
(1, 1, 'G2', 'T1', 5, 3, 0, '2024-01-15'),
(2, 1, 'G2', 'C9', 5, 2, 0, '2024-01-18'),
(3, 1, 'G2', 'GEN', 5, 3, 0, '2024-01-22'),
(4, 1, 'G2', 'RNG', 3, 1, 0, '2024-01-25'),
(5, 1, 'G2', 'LNG', 5, 3, 0, '2024-01-28'),
(6, 1, 'G2', '100T', 5, 2, 0, '2024-02-01'),
(7, 1, 'G2', 'DRX', 5, 3, 0, '2024-02-05'),
(8, 1, 'G2', 'BDS', 5, 3, 0, '2024-02-08'),
(9, 1, 'G2', 'FURIA', 3, 1, 0, '2024-02-12'),
(10, 1, 'G2', 'MAD', 5, 2, 0, '2024-02-15'),
(11, 2, 'FNC', 'T1', 5, 2, 0, '2024-01-16'),
(12, 2, 'FNC', 'C9', 3, 2, 0, '2024-01-19'),
(13, 2, 'FNC', 'GEN', 5, 3, 0, '2024-01-23'),
(14, 2, 'FNC', 'RNG', 5, 2, 0, '2024-01-26'),
(15, 2, 'FNC', 'LNG', 3, 1, 0, '2024-01-29'),
(16, 2, 'FNC', '100T', 5, 3, 0, '2024-02-02'),
(17, 2, 'FNC', 'DRX', 5, 2, 0, '2024-02-06'),
(18, 2, 'FNC', 'BDS', 3, 1, 0, '2024-02-09'),
(19, 2, 'FNC', 'FURIA', 5, 3, 0, '2024-02-13'),
(20, 2, 'FNC', 'MAD', 5, 3, 0, '2024-02-16'),
(21, 3, 'T1', 'G2', 5, 3, 0, '2024-01-15'),
(22, 3, 'T1', 'C9', 3, 2, 0, '2024-01-19'),
(23, 3, 'T1', 'GEN', 5, 1, 0, '2024-01-22'),
(24, 3, 'T1', 'RNG', 5, 3, 0, '2024-01-25'),
(25, 3, 'T1', 'LNG', 3, 2, 0, '2024-01-28'),
(26, 3, 'T1', '100T', 5, 3, 0, '2024-02-01'),
(27, 3, 'T1', 'DRX', 5, 3, 0, '2024-02-04'),
(28, 3, 'T1', 'BDS', 5, 3, 0, '2024-02-07'),
(29, 3, 'T1', 'FURIA', 5, 2, 0, '2024-02-11'),
(30, 3, 'T1', 'MAD', 5, 3, 0, '2024-02-14'),
(31, 4, 'BLG', 'G2', 5, 3, 0, '2024-01-17'),
(32, 4, 'BLG', 'C9', 5, 2, 0, '2024-01-20'),
(33, 4, 'BLG', 'GEN', 5, 1, 0, '2024-01-23'),
(34, 4, 'BLG', 'RNG', 5, 2, 0, '2024-01-26'),
(35, 4, 'BLG', 'LNG', 5, 3, 0, '2024-01-29'),
(36, 4, 'BLG', '100T', 5, 1, 0, '2024-02-02'),
(37, 4, 'BLG', 'DRX', 5, 3, 0, '2024-02-05'),
(38, 4, 'BLG', 'BDS', 5, 2, 0, '2024-02-08'),
(39, 4, 'BLG', 'FURIA', 5, 3, 0, '2024-02-12'),
(40, 4, 'BLG', 'MAD', 5, 3, 0, '2024-02-15'),
(41, 5, 'TL', 'G2', 5, 3, 0, '2024-01-19'),
(42, 5, 'TL', 'C9', 5, 2, 0, '2024-01-22'),
(43, 5, 'TL', 'GEN', 5, 1, 0, '2024-01-25'),
(44, 5, 'TL', 'RNG', 5, 4, 0, '2024-01-28'),
(45, 5, 'TL', 'LNG', 3, 2, 0, '2024-01-31'),
(46, 5, 'TL', '100T', 5, 3, 0, '2024-02-03'),
(47, 5, 'TL', 'DRX', 5, 1, 0, '2024-02-06'),
(48, 5, 'TL', 'BDS', 5, 2, 0, '2024-02-09'),
(49, 5, 'TL', 'FURIA', 5, 3, 0, '2024-02-13'),
(50, 5, 'TL', 'MAD', 5, 3, 0, '2024-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `esports_teams`
--

CREATE TABLE `esports_teams` (
  `id` int(11) NOT NULL,
  `teamname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `teamtag` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `nation` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `founder` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `coach` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `date` date NOT NULL,
  `networth` int(11) NOT NULL,
  `active` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `esports_teams`
--

INSERT INTO `esports_teams` (`id`, `teamname`, `teamtag`, `nation`, `founder`, `coach`, `date`, `networth`, `active`) VALUES
(1, 'G2 Esports', 'G2', 'Európai', 'Carlos \"ocelote\" Rodríguez', 'Dylan Falco', '2014-02-24', 5000000, 'igen'),
(2, 'Fnatic', 'FNC', 'Európai', 'Sam Mathews', 'Nightshare', '2004-07-23', 4000000, 'igen'),
(3, 'T1', 'T1', 'Koreai', 'SK Telecom', 'Tom', '2002-12-12', 6000000, 'igen'),
(4, 'Bilibili Gaming', 'BLG', 'Kínai', 'Bilibili', 'Kim', '2017-12-17', 3500000, 'igen'),
(5, 'Team Liquid', 'TL', 'Amerikai', 'Steve Arhancet', 'Reignover', '2000-01-06', 4500000, 'igen');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `friendid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `userid`, `friendid`) VALUES
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `sender_id`, `receiver_id`) VALUES
(2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderid`, `receiverid`, `message`) VALUES
(1, 1, 2, 'Hello'),
(2, 2, 1, 'Hello!'),
(3, 1, 2, 'Ma elérhető leszel délután?');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `riotid` varchar(100) NOT NULL,
  `pfp` varchar(1000) NOT NULL,
  `bg` varchar(1000) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `karakter` varchar(100) NOT NULL,
  `kinezet` varchar(100) NOT NULL,
  `jatekos` varchar(100) NOT NULL,
  `csapat` varchar(100) NOT NULL,
  `pozicio` varchar(100) NOT NULL,
  `targy` varchar(100) NOT NULL,
  `jatekmod` varchar(100) NOT NULL,
  `streamer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `userid`, `riotid`, `pfp`, `bg`, `about`, `karakter`, `kinezet`, `jatekos`, `csapat`, `pozicio`, `targy`, `jatekmod`, `streamer`) VALUES
(1, 1, 'Zee Hunter#VOID', 'def/pfp_def.jpg', 'Aatrox.jpg', '', '-', '-', '-', '-', '-', '-', '-', '-'),
(2, 4, 'Testing#2222', 'pfp1.jpg', 'Ahri.jpg', 'teszt leírás', 'Ahri', 'Foxfire Ahri', '-', '-', '-', '-', '-', '-'),
(4, 5, 'Anemo#1234', 'pfp2.jpg', 'Aatrox.jpg', '', '-', '-', '-', '-', '-', '-', '-', '-'),
(5, 2, 'Test#1234', 'pfp3.jpg', 'Shen.jpg', 'teszt leírás', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(11) NOT NULL,
  `riotid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_level` int(11) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `winrate` float NOT NULL,
  `wins` int(11) NOT NULL,
  `losses` int(11) NOT NULL,
  `top_champion_1` varchar(50) NOT NULL,
  `top_champion_2` varchar(50) NOT NULL,
  `top_champion_3` varchar(50) NOT NULL,
  `kda` varchar(10) NOT NULL,
  `main_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `profile` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `active` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `profile`, `active`) VALUES
(1, 'Erik', 'ambruserik.test@gmail.com', '$2y$10$GinrrOkBUiT3X2A1JxAj6eP/zxxE23evbeuevUOJ57DsLZCBzwe4y', 0, 'igen', 'igen'),
(2, 'test', 'test@test.com', '$2y$10$8JdENOWamdVGeyhhE1APUuhB.UrDQE3WWGZ1OgsdL56aQtYunF.tS', 0, 'igen', 'igen'),
(3, 'Mozart', 'randomperson@gmail.com', '$2y$10$2HXroAHo9zNZb/KUofF0werDKIVwHELlwkgLRU.//G3VM9dgzEw1G', 0, 'nem', 'nem'),
(4, 'Testing', 'projekt.statlink@gmail.com', '$2y$10$RFiF4E0B6X76sxHXTtXTNOvVHrO.x5J/qPlVBsNGY3D.8dnNpgCxu', 0, 'igen', 'igen'),
(5, 'Anemo', 'test1@test.com', '$2y$10$mF41vpO0TR6p28WQfx33nOP7/xnLXQlFPUHmV7zIY3jaeKeYfHV0a', 0, 'igen', 'igen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `contacting`
--
ALTER TABLE `contacting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esports`
--
ALTER TABLE `esports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teamid` (`teamid`);

--
-- Indexes for table `esports_matches`
--
ALTER TABLE `esports_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teamid` (`teamid`);

--
-- Indexes for table `esports_teams`
--
ALTER TABLE `esports_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`,`receiver_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderid` (`senderid`,`receiverid`),
  ADD KEY `receiverid` (`receiverid`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `riotid_2` (`riotid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `riotid` (`riotid`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riotid` (`riotid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacting`
--
ALTER TABLE `contacting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `esports`
--
ALTER TABLE `esports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `esports_matches`
--
ALTER TABLE `esports_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `esports_teams`
--
ALTER TABLE `esports_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `esports`
--
ALTER TABLE `esports`
  ADD CONSTRAINT `esports_ibfk_1` FOREIGN KEY (`teamid`) REFERENCES `esports_teams` (`id`);

--
-- Constraints for table `esports_matches`
--
ALTER TABLE `esports_matches`
  ADD CONSTRAINT `esports_matches_ibfk_1` FOREIGN KEY (`teamid`) REFERENCES `esports_teams` (`id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `friend_requests_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_requests_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiverid`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`riotid`) REFERENCES `profiles` (`riotid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
