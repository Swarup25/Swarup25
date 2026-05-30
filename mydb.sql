-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 04:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `logindb`
--

CREATE TABLE `logindb` (
  `id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `photo` longblob NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindb`
--

INSERT INTO `logindb` (`id`, `full_name`, `email`, `password`, `address`, `token`, `photo`, `status`) VALUES
('chayan45', 'Chayan Nath', 'nathchayan45@gmail.com', '224cf2b695a5e8ecaecfb9015161fa4b', 'Andul, Howrah, West Bengal, India', '267b69c441df94183e3bcedac56ac2e0', 0x3636363631323237303839353337315f746f6d5f6372756973652e6a7067, 0),
('runa25', 'Runa Nath', 'runan@gmail.com', 'd5f11ace1096430249d206b8f0a7db9c', 'Andul, Howrah, West Bengal, India', '173defc80dda03fbf80e4db076943e2a', 0x3130373737373938333331323132323437315f313136393934393834333031373036365f383532323139303037303837363134393730345f6e2e6a7067, 0),
('swapan55', 'Swapan Nath', 'swapannath@gmail.com', 'd5f11ace1096430249d206b8f0a7db9c', 'Andul, Howrah, West Bengal, India', '39180e102a2ab35275a68d561a610920', 0x3133313933353039333764616e69656c2d63726169672e6a7067, 0),
('swarup25', 'Swarup Nath', 'www.swarup.991@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Mohiary Majumdar para, Bastu tala, Howrah.', '22f03bf9b024f5035f91e5dc11469a8b', 0x3135373934353230363731323831343830395f3736353637383237303232393636305f333731333430313334383334353438333334395f6e2e6a7067, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logindb`
--
ALTER TABLE `logindb`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
