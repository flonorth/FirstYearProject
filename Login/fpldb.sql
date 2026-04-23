-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2026 at 10:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `ID` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `price` decimal(3,1) NOT NULL,
  `women` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`ID`, `player_name`, `position`, `team_id`, `price`, `women`) VALUES
(10, 'Declan Rice', 3, 1, 7.5, 0),
(11, 'Bukayo Saka', 3, 1, 9.9, 0),
(12, 'Leandro Trossard', 3, 1, 6.8, 0),
(13, 'Riccardo Calafiori', 2, 1, 5.6, 0),
(14, 'William Saliba', 2, 1, 6.0, 0),
(15, 'Eberechi Eze', 3, 1, 7.2, 0),
(16, 'Ryan Gravenberch', 3, 3, 5.6, 0),
(17, 'Hugo Ekitika', 4, 3, 8.9, 0),
(18, 'Florian Wirtz', 3, 3, 8.3, 0),
(19, 'Virgil van Dijk', 2, 3, 5.9, 0),
(20, 'Ibrahima Konata', 2, 3, 5.4, 0),
(21, 'Dominik Szoboszlai', 3, 3, 6.7, 0),
(22, 'Cody Gakpo', 3, 3, 7.3, 0),
(23, 'Mohamed Salah', 3, 3, 14.0, 0),
(24, 'Alisson Becker', 1, 3, 5.4, 0),
(25, 'Milos Kerkez', 2, 3, 5.6, 0),
(26, 'Erling Haaland', 4, 2, 15.0, 0),
(27, 'Antoine Semenyo', 3, 2, 7.8, 0),
(28, 'Marc Guachi', 2, 2, 5.2, 0),
(29, 'Matheus Nunes', 2, 2, 5.4, 0),
(30, 'Phil Foden', 3, 2, 8.3, 0),
(31, 'Rayan Cherki', 3, 2, 6.6, 0),
(32, 'Nico O\'Reilly', 2, 2, 5.0, 0),
(33, 'Tijjani Reijnders', 3, 2, 5.1, 0),
(34, 'Gianluigi Donnarumma', 1, 2, 5.6, 0),
(35, 'Lucy Parry', 2, 6, 4.0, 1),
(36, 'Gemma Evans', 2, 6, 4.1, 1),
(37, 'Grace Fisk', 2, 6, 4.6, 1),
(38, 'Risa Shimizu', 2, 6, 5.0, 1),
(39, 'Denise O\'Sullivan', 3, 6, 6.0, 1),
(40, 'Cornelia Kapocs', 4, 6, 7.0, 1),
(41, 'Sophie Romain Haug', 4, 6, 8.1, 1),
(42, 'Beata Olsson', 4, 6, 6.0, 1),
(43, 'Mia Enderby', 4, 6, 6.4, 1),
(44, 'Daphne van Domselaar', 1, 4, 4.5, 1),
(45, 'Emily Fox', 2, 4, 5.5, 1),
(46, 'Steph Catley', 2, 4, 5.1, 1),
(47, 'Katie McCabe', 2, 4, 6.5, 1),
(48, 'Mariona Caldentey', 3, 4, 9.9, 1),
(49, 'Kim Little', 3, 4, 6.2, 1),
(50, 'Frida Maanum', 3, 4, 8.9, 1),
(51, 'Olivia Smith', 4, 4, 7.6, 1),
(52, 'Alessia Russo', 4, 4, 12.1, 1),
(53, 'Stina Blackstenius', 4, 4, 8.8, 1),
(54, 'Ayaka Yamashita', 1, 5, 4.6, 1),
(55, 'Jade Rose', 2, 5, 4.0, 1),
(56, 'Alex Greenwood', 2, 5, 6.1, 1),
(57, 'Kerstin Casparij', 2, 5, 5.0, 1),
(58, 'Yui Hasegawa', 3, 5, 7.1, 1),
(59, 'Laura Blindkilde Brown', 3, 5, 4.8, 1),
(60, 'Laura Coombs', 3, 5, 5.6, 1),
(61, 'Lauren Hemp', 4, 5, 10.1, 1),
(62, 'Vivianne Miedema', 4, 5, 9.5, 1),
(63, 'Khadija Shaw', 4, 5, 12.1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `ID` int(11) NOT NULL,
  `position` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`ID`, `position`) VALUES
(1, 'GK'),
(2, 'DEF'),
(3, 'MID'),
(4, 'FWD');

-- --------------------------------------------------------

--
-- Table structure for table `teamtable`
--

CREATE TABLE `teamtable` (
  `ID` int(11) NOT NULL,
  `teamName` varchar(50) NOT NULL,
  `women` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teamtable`
--

INSERT INTO `teamtable` (`ID`, `teamName`, `women`) VALUES
(1, 'ARS', 0),
(2, 'MCI', 0),
(3, 'LIV', 0),
(4, 'ARS (WSL)', 1),
(5, 'MCI (WSL)', 1),
(6, 'LIV (WSL)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user`, `password`) VALUES
(6, 'alex', '$2y$10$kxAd1I9R9hrwSIQ.6fmIvuYSkhzbhIsdK2xXI7iEP2of/IzoctMoa'),
(10, 'john', '$2y$10$SJ5.TIdoDWHh.mCywDMP7eFrNkNAbitvgWYihLa3mHJaorCdUHR0O'),
(12, 'steve', '$2y$10$MZsKgVZqX/CDbOGC5ujt8ebPQvmiPGRAxQ3ncrWjprWNU.jzg.1F2'),
(13, 'bob', '$2y$10$dgDh.bKbaxf9xo7hq2D/tO8PF8jpTOYULgZYWBpGXHTbOn.UjuL8.'),
(14, 'leo', '$2y$10$zOwIGEJSdwSawr4cxsi.u.bYNi6ucD2G1siA7BdO4L94dZxoZyYHu'),
(15, 'grep', '$2y$10$ePSooOKUOeOcmln.LP9DF.yAAXWmuHCi5CncvYKSAdd9HdIFK5juG'),
(16, 'meow', '$2y$10$wBPyk9QsRRopa2EQVY9eDumcp4s3XKXu015f8JQh.bQe9p3YboXY6'),
(17, 'hello', '$2y$10$d77fYqDjSLMPkm7RdDukYucvFZap8LCw3VyY1WVi/E4Q2doaUNoF6'),
(18, 'yooo', '$2y$10$GwWVkDXwj2.jGihio/LiMee02KWTzTil6a3Y1/uIxIlZsJTG08svS'),
(19, 'gareth', '$2y$10$ZKb5cPtldiMXBFhkskUTnOAj4o/jp/d..uyvKp6IJV5u3chgI5gxG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `position` (`position`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teamtable`
--
ALTER TABLE `teamtable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teamtable`
--
ALTER TABLE `teamtable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`position`) REFERENCES `position` (`ID`),
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teamtable` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
