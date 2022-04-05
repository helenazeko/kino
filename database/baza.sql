-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 04:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `bookingID` int(11) NOT NULL,
  `movieName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookingTheatre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookingType` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookingDate` date NOT NULL,
  `bookingTime` time NOT NULL,
  `bookingFName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookingLName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookingPNumber` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`bookingID`, `movieName`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`) VALUES
(52, 'Joker', 'A2', '4D', '2021-02-17', '22:52:00', 'Ivan', 'Dzakula', '0635487972'),
(53, '1917', 'Mala', '2D', '2021-02-15', '21:34:00', 'Kristina', 'Arezina', '063524187'),
(54, 'Kapetanica Marvel', 'VIP', '3D', '2021-02-15', '21:34:00', 'Tea', 'Dzakula', '+986764'),
(55, 'Gospoda', 'Mala', '3D', '2021-02-23', '22:34:00', 'Tea', 'Marulic', '87463532'),
(56, 'Cudo u celiji br 7', 'Mala', '4D', '2021-02-24', '16:00:00', 'Helena', 'Zeko', '0635487972');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `msgID` int(12) NOT NULL,
  `senderfName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senderlName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sendereMail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senderfeedback` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacktable`
--

INSERT INTO `feedbacktable` (`msgID`, `senderfName`, `senderlName`, `sendereMail`, `senderfeedback`) VALUES
(3, 'Ana', 'Raji?', 'ana.rajic@gmail.com', 'Odli?na stranica , samo tako naprijed\r\n#re?iprofesora');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lozinka` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `ime`, `prezime`, `email`, `lozinka`) VALUES
(114, 'Josip', 'Jo', 'ivajr@hotmail.com', '12345678'),
(115, 'Marija', 'fhr', 'bvhjbrev@ht.rom', '4357gng'),
(116, 'Iva', 'Ivic', 'ivic@gmai.com', 'iva123'),
(117, 'Ivan', 'ko', 'ivan@gmail.com', '12345'),
(118, 'Marija', 'Pilic', 'mpilic@hotmail.com', '12345'),
(120, 'helena', 'zeko', 'helenazeko24@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

CREATE TABLE `movietable` (
  `movieID` int(11) NOT NULL,
  `movieImg` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movieTitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movieGenre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movieActors` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`) VALUES
(1, 'img/movie-poster-1.jpg', 'Kapetanica Marvel', ' Akcijski, Avanturisticki', 124, '2020-01-03', 'Anna Boden, Ryan Fleck', 'Brie Larson, Samuel L. Jackson, Ben Mendelsohn'),
(2, 'img/joker.jpg', 'Joker', 'Drama, Kriminalisticki,Triler', 122, '2020-02-11', 'Todd Philips', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz'),
(3, 'img/gospoda.jpg', 'Gospoda', 'Kriminalisticki', 113, '2020-02-13', 'Guy Ritchie', 'Matthew McConaughey, Charlie Hunnam, Michelle Dockery'),
(12, 'img/1917.jpg', '1917', 'Kriminalistički', 113, '2020-01-23', 'Guy Ritchie', 'Matthew McConaughey, Charlie Hunnam, Michelle Dockery'),
(14, 'img/opsjednutost.jpg', 'Opsjednutost', 'Horor', 94, '2020-01-30', ' Floria Sigismondi', ' Mackenzie Davis, Finn Wolfhard, Brooklynn Prince'),
(15, 'img/midnight.jpg', 'Ponoćno nebo', 'Drama, Fantazija, Sci-fi', 118, '2020-12-23', 'George Clooney', ' George Clooney, Felicity Jones, David Oyelowo'),
(28, 'img/7.jpg', 'Cudo u celiji br 7', 'Drama, Kriminalistički', 132, '2020-01-19', 'Mehmet Ada Öztekin', 'Aras Bulut İynemli,Nisa Sofiya Aksongur,Deniz Baysal');

-- --------------------------------------------------------

--
-- Table structure for table `prikazivanje`
--

CREATE TABLE `prikazivanje` (
  `idPrikazivanje` int(11) NOT NULL,
  `IDm` int(11) NOT NULL,
  `movieTitle` varchar(50) NOT NULL,
  `dvorana` varchar(50) NOT NULL,
  `datum` date NOT NULL,
  `vrijeme` time NOT NULL,
  `tipPrikazivanja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prikazivanje`
--

INSERT INTO `prikazivanje` (`idPrikazivanje`, `IDm`, `movieTitle`, `dvorana`, `datum`, `vrijeme`, `tipPrikazivanja`) VALUES
(28, 21, 'Brzi i zestoki 9', 'Velika', '2021-02-24', '22:31:00', '3D'),
(30, 21, 'Brzi i zestoki 9', 'VIP', '2021-02-16', '22:31:00', '3D'),
(31, 2, 'Joker', 'A1', '2021-02-23', '22:33:00', '3D'),
(32, 1, 'Kapetanica Marvel', 'VIP', '2021-02-15', '21:34:00', '3D'),
(33, 3, 'Gospoda', 'Mala', '2021-02-23', '22:34:00', '3D'),
(34, 12, '1917', 'Mala', '2021-02-15', '21:34:00', '2D'),
(35, 15, 'Ponoćno nebo', 'VIP', '2021-02-17', '21:35:00', 'IMAX'),
(36, 2, 'Joker', 'A2', '2021-02-17', '22:52:00', '4D'),
(37, 28, 'Cudo u celiji br 7', 'Mala', '2021-02-24', '16:00:00', '4D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `bookingID_2` (`bookingID`),
  ADD KEY `bookingID_3` (`bookingID`),
  ADD KEY `bookingID_4` (`bookingID`);

--
-- Indexes for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`msgID`),
  ADD UNIQUE KEY `msgID` (`msgID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`);

--
-- Indexes for table `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`);

--
-- Indexes for table `prikazivanje`
--
ALTER TABLE `prikazivanje`
  ADD PRIMARY KEY (`idPrikazivanje`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `msgID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `movietable`
--
ALTER TABLE `movietable`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `prikazivanje`
--
ALTER TABLE `prikazivanje`
  MODIFY `idPrikazivanje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
