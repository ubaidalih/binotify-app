-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2022 at 07:31 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes-wbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `Judul` varchar(64) NOT NULL,
  `Penyanyi` varchar(128) NOT NULL,
  `Total_duration` int(11) NOT NULL,
  `Image_path` varchar(256) NOT NULL,
  `Tanggal_terbit` date NOT NULL,
  `Genre` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `Judul`, `Penyanyi`, `Total_duration`, `Image_path`, `Tanggal_terbit`, `Genre`) VALUES
(2, 'album1', 'Dewa', 222, '/tugas-besar-1/public/img/IMG-635b5d0f4dc9d8.53198180.jpg', '2022-10-20', 'rock'),
(3, 'album3', 'Tulus', 611, '/tugas-besar-1/public/img/IMG-6357d89a826ad4.05301344.jpg', '2022-10-18', 'pop'),
(7, 'album2', 'Reality Club', 1389, '/tugas-besar-1/public/img/IMG-635b60f93b9b92.55301794.jpg', '2022-10-28', 'indie');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `song_id` int(11) NOT NULL,
  `Judul` varchar(64) NOT NULL,
  `Penyanyi` varchar(128) DEFAULT NULL,
  `Tanggal_terbit` date NOT NULL,
  `Genre` varchar(64) DEFAULT NULL,
  `Duration` int(11) NOT NULL,
  `Audio_path` varchar(256) NOT NULL,
  `Image_path` varchar(256) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `Judul`, `Penyanyi`, `Tanggal_terbit`, `Genre`, `Duration`, `Audio_path`, `Image_path`, `album_id`) VALUES
(2, 'Separuh Nafas', 'Dewa', '2022-10-19', 'rock', 222, '/tugas-besar-1/public/audio/SONG-635b68521659d5.73505554.mp3', '/tugas-besar-1/public/img/IMG-635b57543a1e91.06315844.jpg', 2),
(11, 'Diorama', 'Tulus', '2022-10-18', 'pop', 178, '/tugas-besar-1/public/audio/SONG-635a1ad0969c20.38108542.mp3', '/tugas-besar-1/public/img/IMG-635a1ad09f2622.03636239.jpg', 3),
(16, 'Manusia Kuat', 'Tulus', '2022-10-18', 'pop', 205, '/tugas-besar-1/public/audio/SONG-635b566dda70d8.50096966.mp3', '/tugas-besar-1/public/img/logo-1.jpg', 3),
(19, 'Monokrom', 'Tulus', '2022-10-18', 'pop', 218, '/tugas-besar-1/public/audio/SONG-635b5b820cd953.03189072.mp3', '/tugas-besar-1/public/img/IMG-6358cea5277a28.93633235.jpg', 3),
(33, 'Labirin', 'Tulus', '2022-10-18', 'pop', 192, '/tugas-besar-1/public/audio/SONG-635b5c95ddd2c9.34274480.mp3', '/tugas-besar-1/public/img/IMG-635b5c95e4e747.53640522.jpg', NULL),
(34, 'Sewindu', 'Tulus', '2022-10-18', 'pop', 272, '/tugas-besar-1/public/audio/SONG-635b5cd2448e74.47739002.mp3', '/tugas-besar-1/public/img/IMG-635b5cd2488aa2.24606821.jpg', NULL),
(35, 'Anything You Want', 'Reality Club', '2022-10-28', 'indie', 277, '/tugas-besar-1/public/audio/SONG-635b5f63ef4857.90538205.mp3', '/tugas-besar-1/public/img/IMG-635b5f640d5925.34010774.jpg', 7),
(36, 'Is It The Answer', 'Reality Club', '2022-10-28', 'indie', 232, '/tugas-besar-1/public/audio/SONG-635b5f8acd4820.06738559.mp3', '/tugas-besar-1/public/img/IMG-635b5f8ad2b144.18812872.jpg', 7),
(37, 'Elastic Hearts', 'Reality Club', '2022-10-28', 'indie', 276, '/tugas-besar-1/public/audio/SONG-635b5fadeceff0.09518531.mp3', '/tugas-besar-1/public/img/IMG-635b5fadf260a0.08419552.jpg', 7),
(38, 'Alexandra', 'Reality Club', '2022-10-28', 'indie', 248, '/tugas-besar-1/public/audio/SONG-635b5fcb705897.63136012.mp3', '/tugas-besar-1/public/img/IMG-635b5fcb776e81.80844476.jpg', 7),
(39, '2112', 'Reality Club', '2022-10-28', 'indie', 356, '/tugas-besar-1/public/audio/SONG-635b5fe9e68731.65887024.mp3', '/tugas-besar-1/public/img/IMG-635b5fe9ece9b3.83157826.jpg', 7),
(40, 'Pupus', 'Dewa', '2022-10-20', 'rock', 306, '/tugas-besar-1/public/audio/SONG-635b688be4f400.67795679.mp3', '/tugas-besar-1/public/img/IMG-635b688bebbdc6.71586685.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `username`, `isAdmin`) VALUES
(1, 'admin1@example.com', '$2y$10$d9Y8H4Avrylhdu12D5LsLeDQWMAU49KXq40hOHnLQyP1bEx/IJSk.', 'admin1', 1),
(3, 'user1@example.com', '$2y$10$crqSFG26/3R1rTIRXFKbiecFydMb.kepzF6PYSphNEOCmrvOqJ8se', 'user1', 0),
(4, 'user2@example.com', '$2y$10$crqSFG26/3R1rTIRXFKbiecFydMb.kepzF6PYSphNEOCmrvOqJ8se', 'user2', 0),
(5, 'user3@example.com', '$2y$10$crqSFG26/3R1rTIRXFKbiecFydMb.kepzF6PYSphNEOCmrvOqJ8se', 'user3', 0),
(6, 'user4@example.com', '$2y$10$crqSFG26/3R1rTIRXFKbiecFydMb.kepzF6PYSphNEOCmrvOqJ8se', 'user4', 0),
(7, 'user5@example.com', '$2y$10$crqSFG26/3R1rTIRXFKbiecFydMb.kepzF6PYSphNEOCmrvOqJ8se', 'user5', 0),
(8, 'user6@example.com', '$2y$10$Q5jJByOGYsM.B2Mdn/90EuQiJr7R.6/DaBVqvpAup0Dbhpt7MmafW', 'user6', 0),
(9, 'user7@example.com', '$2y$10$MEeFGc6Rdsuuvge4PjOcWexPn0nRi7AN1zEUadXCZqTAsQGAxVP46', 'user7', 0),
(10, 'user10@example.com', '$2y$10$W4gJNz/vd54gG2ReoCnaJe/bGUpWS3yitLt8g96WhzMZ/RrcByiXm', 'user10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
