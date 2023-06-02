-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2023 at 04:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `availability` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `title`, `image`, `author`, `publisher`, `description`, `availability`, `year`, `category`, `date`) VALUES
(27, 'Global political economy : evolution and dynamics description 2nd', 'book1.jpeg', 'Williams Marc. , O Brien Robert', 'New York : Palgrave Macmillan', 'This text on global political economy provides a broad-ranging but concise historical account of the emergence.', 3, 2008, 'Economics', '2023-06-01'),
(28, 'Technology, institutions, and economic growth', 'tech.jpeg', 'Nelson, Richard R.', 'Cambridge, Mass. : Harvard University Press', 'The broad theory of economic growth Nelson presents sees the process as involving the co-evolution of technologies, institutions, and industry structure. EISBN.', 1, 2005, 'Economics', '2023-06-01'),
(29, 'Politics in the developing world 2nd', 'pol.jpg', ' Burnell, Peter J; Randall, Vicky.', 'Oxford ; New York : Oxford University Press', 'An impressive line-up of international contributors provides a comprehensive and accessible introduction to politics in the developing world', 1, 2008, 'Politics', '2023-06-01'),
(30, 'Research methods in politics 2nd', '41GYzbGR3JL._AC_UF1000,1000_QL80_.jpg', 'Burnham, Peter', 'Basingstoke : Palgrave Macmillan', 'Research Methods in Politics is an accessible and student-friendly guide to the use of qualitative and quantitative methods in researching politics', 1, 2008, 'Politics', '2023-06-01'),
(31, 'Schaums Outline of Computer Architecture 1st', 'download.jpeg', 'Carter, Nicholas (Nicholas P.)', 'New York : Palgrave Macmillan', 'A problem/solution manual, integrating general principles and laboratory exercises, that provides students with the hands-on experience.', 2, 2003, 'Architecture', '2023-06-01'),
(32, 'Concrete architecture', '51Hdm4qdbmL.jpeg', 'Croft, Catherine', 'Salt Lake City: Gibbs Smith ', 'No longer the material of choice for just factories and industrial buildings, concrete is now fashionable and chic, adorning shops, restaurants, homes, and landscapes with its desirable, tactile surfaces.', 1, 2004, 'Architecture', '2023-06-02'),
(33, 'Solar architecture : strategies, visions, concepts', '5155XBs-oUL.jpeg', ' Schittich, Christian', 'Birkhauser', 'In the very near future energy-efficient building will be the rule rather than the exception. Insulating glazing, multi-functional facades and organic solar cells are examples of important new developments in the field of solar thermal technology, photo-voltaics, heating and ventilation technology which are suitable for a wide range of uses from large-scale urban-planning projects to individual single family houses, and can make significant contributions to the conservation of natural resources in sustainable building', 1, 2003, 'Architecture', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `issuedbooks`
--

CREATE TABLE `issuedbooks` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `dates` date DEFAULT NULL,
  `due` date DEFAULT NULL,
  `returns` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuedbooks`
--

INSERT INTO `issuedbooks` (`id`, `bid`, `uid`, `dates`, `due`, `returns`) VALUES
(17, 21, 57, '2023-05-30', '2023-06-06', '2023-05-30'),
(33, 21, 57, '2023-05-30', '2023-06-06', NULL),
(34, 23, 57, '2023-05-30', '2023-06-06', NULL),
(35, 21, 61, '2023-05-30', '2023-06-06', '2023-06-01'),
(36, 23, 61, '2023-05-30', '2023-06-06', '2023-06-01'),
(37, 28, 62, '2023-06-02', '2023-07-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `dates` date DEFAULT current_timestamp(),
  `expire` date DEFAULT (`dates` + interval 1 week)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `bid`, `uid`, `dates`, `expire`) VALUES
(63, 32, 62, '2023-06-02', '2023-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `review` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `bid`, `name`, `review`) VALUES
(34, 32, 'Marsela Horeshka', 'Great Boook!!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `type`, `phoneno`, `email`, `password`) VALUES
(55, 'Katia', 'Haveri', 'admin', '0698598753', 'epokalibrary23@gmail.com', 'cb6d341e9d4a681c6453777900ba72b8'),
(62, 'Marsela', 'Horeshka', 'Simpleuser', '0698598752', 'mhoreshka20@epoka.edu.al', 'cb6d341e9d4a681c6453777900ba72b8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `issuedbooks`
--
ALTER TABLE `issuedbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `del` (`bid`),
  ADD KEY `dele` (`uid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `php` (`bid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `issuedbooks`
--
ALTER TABLE `issuedbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `del` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dele` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`),
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reserve_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_4` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `keyys` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`),
  ADD CONSTRAINT `php` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
