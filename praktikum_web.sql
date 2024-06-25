-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 02:32 PM
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
-- Database: `praktikum_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `episode` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id`, `name`, `episode`, `rating`) VALUES
(1, 'Bocchi The Rock', 12, 8),
(3, 'Non non biyori', 12, 9),
(4, 'Bocchi The Rock', 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Ricky Erlangga Handoko', 'rickyerlangga.h@gmail.com', 'rozalyne', 'f5ac9933ffb948c88a374c926ce66eec'),
(2, 'Mosir', 'mosir@gmail.com', 'Mosir', 'f5ac9933ffb948c88a374c926ce66eec'),
(3, 'Dita', 'dita@gmail.com', 'Dita', 'f5ac9933ffb948c88a374c926ce66eec'),
(4, 'Randi Nur Rizky', 'randi@gmail.com', 'Randi', 'f5ac9933ffb948c88a374c926ce66eec'),
(5, 'Randi Nur Rizky', 'randi@gmail.com', 'Randi', 'f5ac9933ffb948c88a374c926ce66eec'),
(6, 'Ricky Erlangga Handoko', 'kiritoki303@gmail.com', '', '$2y$10$7uKdvkQ8R7B4djpuRJwzEeXzr0IYd.Mdo48Hr77IgW6tIpt0qJ4D2'),
(7, 'Muhammad Faridh Fadhlan', 'fadhlan@gmail.com', '', '$2y$10$jzD/s/NRvuj4vMT4npxDlejq/Vov/nguUFuepUPvubPcrqPmC1uDe'),
(8, 'Bocchi The Rock', 'bochi@kawai.com', 'bocchi', '$2y$10$5owUUFY.Ootri5QkmgNZu.AElnwoaHWLMvUom6Pdr2YYuU0L15Mnm'),
(9, 'Bocchi The Rock', 'irozalyne@gmail.com', 'rosalina', '$2y$10$1D2UUsrDRpgk6ri2vavHjueXmx5srZUrY5aYYq1qw6B21vwUtIB9u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
