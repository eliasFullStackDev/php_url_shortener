-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 10:25 PM
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
-- Database: `url_shortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `long_url` text NOT NULL,
  `short_code` varchar(10) NOT NULL,
  `clicks` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `long_url`, `short_code`, `clicks`, `created_at`) VALUES
(11, 'https://www.bootstrapcdn.com/', '41I', 4, '2025-06-03 18:19:22'),
(14, 'https://www.youtube.com/', '14G', 1, '2025-06-03 19:59:09'),
(15, 'https://www.youtube.com/@CodingwithElias', 'Q5Y', 1, '2025-06-03 20:00:15'),
(19, 'https://www.youtube.com/redirect?event=channel_description&redir_token=QUFFLUhqbGhQT0xiVF9iQUpXVkRWVkdWYW9UTE5ORWVSQXxBQ3Jtc0tsQktfd0Z3cUl5QkZjeUhrX1U2N1lhU2dmNGdRaFlaYTNJc2NvQ2JVOE5fcndNOWpTZU9XdkJSRGJEcHF5emhTWGpZcjNxQjF1U0ZDMWt5Z1dQdGYwVnRIUVN1NmxXNkVBV0JxaW5VSFlWYTQ5ZHY3TQ&q=https%3A%2F%2Fwww.facebook.com%2FcodingWithElias', 'I99', 1, '2025-06-03 20:03:30'),
(20, 'https://github.com/codingWithElias', '90D', 1, '2025-06-03 20:03:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_code` (`short_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
