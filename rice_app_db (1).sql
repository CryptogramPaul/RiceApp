-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2025 at 07:47 AM
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
-- Database: `rice_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `disease_img` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `disease_name`, `category`, `descriptions`, `disease_img`, `date_created`, `date_updated`) VALUES
(1, 'Tungro', '', 'Nagadala ini sang pagka dilaw (yellow) sang dahon, pagkaputot, pagbuhin sang kadamuon sang suwi, kag baog ukon wala sing laman o wala napuno ang mga butil.', 'disease_675d125f121ab6.54629765.png', '2024-12-14 05:06:39', '2024-12-15 02:19:35'),
(2, 'Bacterial Leaf Blight', '', 'Nagadala ini sang pagkalanta sa mga punla ukon kresek, kag pagkadilaw kag pagkamala sang mga dahon. Isa sa mga sintomas sini amo ang pagkadilaw (yellow) nga kurit halin sa tuktok sini kag may kurba ang magkabilang gilid.', 'disease_675e39ee802006.64075836.jpg', '2024-12-15 02:07:42', '2024-12-15 02:07:42'),
(3, 'Bacterial Leaf Streak', '', 'Nagadala ini sang pagkamala kag pagkadilaw (yellow) sang mga dahon. Ang pag-usad sang streaks ukon marka nagapalabog, limitado sa mga ugat kag sa ulihi nagaka orange-brown ang kolor Ini ang sakit nga ginadala sang fungi nga nagaguba sa bisan diin nga parte sang paray. Isa sa mga sintomas sini amo ang pagkabatik-batik sa dahon nga may kayumanggi (brown) sa palibot sini. Ang impeksyon nagakatabo man sa bulak, li-og nga may angay mn nga kolor sang kayumanggi (brown).', 'disease_675e3c13c02998.35695780.jpg', '2024-12-15 02:13:01', '2024-12-15 02:16:51'),
(4, 'Brown Spot', '', 'Ini ang sakit nga ginadala sang fungi nga nagaguba sa bisan diin nga parte sang paray. Isa sa mga sintomas sini amo ang pagkabatik-batik sa dahon nga may kayumanggi (brown) sa palibot sini. Ang impeksyon nagakatabo man sa bulak, li-og nga may angay mn nga kolor sang kayumanggi (brown).', 'disease_675e3b8a647da8.11729037.png', '2024-12-15 02:14:34', '2024-12-15 02:14:34'),
(5, 'Blast (leaf)', '', 'Ang blast makita sa mga lugar nga indi kaayo mahalumigmig, nagaka eksperyensya sang malawig kag masami nga pag-uran, kag may mabugnaw nga temperatura sa aga. Ang mga sintomas sa dahon, amo sini ang pagka batik-batik nga dahon nga kayumanggi (brown) nga kolor kag mala hugis diyamante nga marka sa dahon.', 'disease_675e3ba50cc8a0.45325948.png', '2024-12-15 02:15:01', '2024-12-15 02:15:01'),
(6, 'Blast (neck)', '', 'Ang blast makita sa mga lugar nga indi kaayo mahalumigmig, nagaka eksperyensya sang malawig kag masami nga pag-uran, kag may mabugnaw nga temperatura sa aga. Ang rehiyon sang li-og sang bulak nagaka kayumanggi (brown) kag nagakupas sing lubos/ bahagya nga napunggan ang pagkabunga sang butil, ang bulak nagakabali sa li-og kag nagabitay.', 'disease_675e3bfbe74af8.12625483.png', '2024-12-15 02:16:27', '2024-12-15 02:16:27'),
(7, 'Blast (node)', '', 'Ang blast makita sa mga lugar nga indi kaayo mahalumigmig, nagaka eksperyensya sang malawig kag masami nga pag-uran, kag may mabugnaw nga temperatura sa aga. Ang pinsala sang pamumutok-batok (node blast) amo ang pilas nga may malaabong-kayumanggi (grayish brown) ang kolor nga nagapalibot sa batok hasta nga mautod ang uhay.', 'disease_675e3c3806c0d2.45601144.png', '2024-12-15 02:17:28', '2024-12-15 02:17:28'),
(8, 'Sheath rot', '', 'Ang sakit nagadala sang pagbuhin sang ani tungod sa pagka-hinay sang pagtubo ikon indi na pagtubo sang uhay. Ang mga sintomas amo ang pagkadunot sang lapak, mga batik-batik nga kayumanggi (brown) sa lapak ukon talukap, kag ang bata nga bunga nagapabilin sa lapak.', 'disease_675e3c505e9b06.02620257.png', '2024-12-15 02:17:52', '2024-12-15 02:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `pest`
--

CREATE TABLE `pest` (
  `id` int(11) NOT NULL,
  `pest_name` varchar(40) NOT NULL,
  `descriptions` varchar(500) NOT NULL,
  `pest_img` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pest`
--

INSERT INTO `pest` (`id`, `pest_name`, `descriptions`, `pest_img`, `date_created`, `date_updated`) VALUES
(1, 'Balabaw', 'sample', 'pest_6762bf2b824497.55152656.jpg', '2024-12-18 12:25:15', '2024-12-18 12:29:55'),
(2, 'Pispis', 'ssss', 'pest_6762bfb99e5a00.39557775.jpg', '2024-12-18 12:27:37', '2024-12-18 12:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT 'disease / pest',
  `type_id` int(11) NOT NULL,
  `recommendations` varchar(1000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`id`, `type`, `type_id`, `recommendations`, `date_created`, `date_updated`) VALUES
(1, 'Disease', 3, 'Pagbulong sang binhi gamit ang bleaching powder (100g/l) kag zinc sulfate (2%) makabawas sang bacterial blight.', '2024-12-15 11:02:11', '2024-12-15 11:02:11'),
(2, 'Disease', 3, 'Pagbulong sang binhi-paghulom sang binhi sa sulod sang 8 ka oras sa Agrimycin (0.025%) kag wettable caresan (0.05%) kag init nga tubig sa sulod sang 30 ka minuti sa 52-54oC; paghulom sang binhi sa sulod ka 8 ka oras sa caresan (0.1%) kag pagbulong gamit ang Streptocyclin (3g sa 1 ka litro).', '2024-12-15 11:09:11', '2024-12-15 11:09:11'),
(3, 'Disease', 3, 'Mag-spray sang neem oil 3% o NSKE 5%.', '2024-12-15 11:09:29', '2024-12-15 11:09:29'),
(4, 'Disease', 3, 'Magtanum sang mga nursery sa husto nga lugar nga malayo sa uban nga lugar kag ara sa mataas nga lugar.', '2024-12-15 11:09:42', '2024-12-15 11:09:42'),
(5, 'Disease', 3, 'Likawan ang pag-utod sang mga seedling sa panahon sang pagtanum.', '2024-12-15 11:09:57', '2024-12-15 11:09:57'),
(6, 'Disease', 3, 'Balanseha ang pag-abuno, likawan ang sobra nga paggamit sang N- application.', '2024-12-15 11:10:07', '2024-12-15 11:10:07'),
(7, 'Disease', 3, 'I-skip ang N-application sapanahon sang booting (kung medyo mabug-at ang sakit).', '2024-12-15 11:12:35', '2024-12-15 11:12:35'),
(8, 'Disease', 3, 'Pamul on ang hilamon sa palibot.', '2024-12-15 11:12:45', '2024-12-15 11:12:45'),
(10, 'Pest', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2024-12-18 12:38:53', '2024-12-18 12:40:09'),
(12, 'Pest', 2, 'sadasdasd', '2024-12-18 13:20:15', '2024-12-18 13:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symptoms_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `symptoms_name` varchar(500) NOT NULL,
  `category` varchar(20) NOT NULL,
  `symptoms_img` varchar(1000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symptoms_id`, `disease_id`, `symptoms_name`, `category`, `symptoms_img`, `date_created`, `date_updated`) VALUES
(1, 3, 'Pagkalanta sang dahon.', 'Collar', 'symptoms_675e430a961760.79000546.png', '2024-12-15 02:46:34', '2025-03-31 08:25:57'),
(3, 3, 'Dilaw nga kurit sa dahon nga nagakurba ang magkabilang gilid.', 'Panicle', 'symptoms_675f86b562c153.84995603.jpeg', '2024-12-16 01:47:33', '2025-03-31 08:25:49'),
(4, 3, 'Dilaw nga parte sa dahon.', 'Node', 'symptoms_675f86d9efec85.49742154.jpeg', '2024-12-16 01:48:09', '2025-03-31 08:25:43'),
(5, 3, 'Nagamara nga paray.', 'Node', 'symptoms_675f87a4884cb9.78201956.jpg', '2024-12-16 01:51:32', '2025-03-31 08:25:33'),
(6, 3, 'Gagmay nga batik-batik nga brown.', 'Panicle', 'symptoms_675f87ba0336f9.09121082.jpeg', '2024-12-16 01:51:54', '2025-03-31 08:25:27'),
(7, 1, 'Dilaw nga parte sa dahon.', 'Neck', 'symptoms_675fa064b5eb21.08124067.jpeg', '2024-12-16 03:37:08', '2025-03-31 08:25:38'),
(8, 1, 'Putot nga pagtubo sang paray.', 'Collar', 'symptoms_675fa09b25eee8.94674315.png', '2024-12-16 03:38:03', '2025-03-31 08:25:20'),
(9, 1, 'Pagkalanta sang dahon.', 'Neck', 'symptoms_675fa0b6311208.49978796.png', '2024-12-16 03:38:30', '2025-03-31 08:25:16'),
(10, 8, 'Batik-batik nga kayumanggi (brown) sa lapak ukon talukap.', 'Collar', 'symptoms_675fa4489d1299.27248687.jpeg', '2024-12-16 03:53:44', '2025-03-31 08:25:09'),
(11, 8, 'Pagkadunot sang lapak (sheath).', 'Panicle', 'symptoms_675fa45cea6920.08378534.jpeg', '2024-12-16 03:54:04', '2025-03-31 08:25:03'),
(12, 8, 'Kayumanggi (brown) nga kolor sang uhay.', 'Panicle', 'symptoms_675fa46ce2d128.82044502.jpg', '2024-12-16 03:54:20', '2025-03-31 08:24:33'),
(13, 5, 'asdasdasd', 'Collar', 'symptoms_67ea4cf94f55a0.40491468.jpg', '2025-03-31 08:06:17', '2025-03-31 08:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT 'desease / pest',
  `type_id` int(11) NOT NULL,
  `treatment` varchar(1000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `type`, `type_id`, `treatment`, `date_created`, `date_updated`) VALUES
(2, 'Disease', 2, 'aasd', '2024-12-15 12:16:29', '2024-12-15 12:17:19'),
(3, 'Pest', 1, 'xzzxz', '2024-12-19 12:51:02', '2024-12-19 12:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `middlename`, `username`, `password`) VALUES
(1, 'user', 'admin', 'admin', 'user', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `pest`
--
ALTER TABLE `pest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptoms_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pest`
--
ALTER TABLE `pest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptoms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
