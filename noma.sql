-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 11:29 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noma`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(40) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(40) COLLATE utf8_bin NOT NULL,
  `SURNAME` varchar(40) COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(200) COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_bin NOT NULL,
  `REG_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USERNAME`, `NAME`, `SURNAME`, `PASSWORD`, `EMAIL`, `REG_DATE`) VALUES
(1, 'Raimonds', 'Raimonds', 'Lagzdins', 'parole123', 'epasts@epasts.lv', '2019-10-10'),
(2, 'dbUser', 'asdas', 'dasdas', 'parole123', 'dasdas', '0000-00-00'),
(3, 'dbUser', 'dasdsadas', 'asdasdsadddddd', 'parole123', 'dasdasdas', '2019-11-27'),
(4, 'dbUser', 'dasdsa', 'dasdsa', 'parole123', 'asdas', '2019-11-27'),
(5, 'dbUser', 'dasdas', 'dasdas', 'parole123', 'dasdas', '2019-11-27'),
(7, 'dbUsersss', 'asdasd', 'dasdasdas', 'ddddddddddddddddd', 'dddd', '2019-11-27'),
(8, 'liet2', 'asdasdddddd', 'aaaaaaaaaaaaaaaa', '$2y$13$0l6/3aJxP21kxuvZePMwG.8KQt/.uo/sSe.mg3TvfuCmgGkmnlPBS', 'asddddaa', '2019-11-27'),
(9, 'dbUser1234', 'dasd', 'dasdas', 'dasdadddddd', 'asdasdaaaaaaa', '2019-11-27'),
(10, 'dbUserddddddddd', 'dasdasdas', 'asdasdas', '$2y$13$2P9RiBV3auojE9hjv89g9Os4rU/rV2LqSBckkhuUpvdJDvZ3V/eeG', 'dasdsadasdas', '2019-11-27'),
(11, 'dbUserasd', 'ddddddddddddddd', 'dddddddd', '$2y$13$YohfSpq.tm2Y2GbLQv6.o.ARla29hq3HO/hJ1xnUHznltOf/keQHi', 'ddddddddddddddddd', '2019-11-27'),
(12, 'dbUserdddddd', 'dasdasdasdas', 'asdasdasdas', '$2y$13$bHBDEjwVfJv9h.dws9Jm2enzcTvqTf/R.ipOSy.SQX.2JxnAsuI3y', 'dasdasdasa', '2019-11-27'),
(13, 'anatolijs', 'aasdasdasdasdas', 'dasssssssssss', '$2y$13$GfR1L16OR.v6nuiDIkBWoOm073rI1ErgOqt1fQtmL2GjHvv4GZgVu', 'dasdasdasdasdas', '2019-11-27'),
(14, 'dbUserasssssssss', 'dasdasdasdas', 'dddddddd', '$2y$13$r1JnHm1yyaSYyVoxr5tq8uJKyXWzATgnFKK/dx87sxowVZFKDOKZu', 'dasdasdasdasdasdasda', '2019-11-27'),
(15, 'dasdas', 'asdasdasdasdasdasdas', 'dasdasdasdasdas', '$2y$13$zHfsVfd/jjdTyNGWjw0f0u66/kn1AjqTIPJ378McsIhwiHeBRvVS.', 'asdasdasdasaaa', '2019-11-27'),
(16, 'dbUserdasdasdasdasd', 'dasdasdadadd', 'adasdadadaddasdasda', '$2y$13$Mw3R0Ts5TJuHvhkSZoUOCO8S0ldesQXx7RGTuLXZ7jmwv0fk0rEYy', 'dasdasdasdasdasd', '2019-11-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
