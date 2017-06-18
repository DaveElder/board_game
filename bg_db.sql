-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2017 at 10:20 AM
-- Server version: 5.6.23-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bg_assigned`
--

CREATE TABLE `bg_assigned` (
  `bgID` varchar(10) NOT NULL,
  `memberID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bg_assigned`
--

INSERT INTO `bg_assigned` (`bgID`, `memberID`) VALUES
('55', '2'),
('76', '777'),
('76', '777'),
('55', '234'),
('4555', '567');

-- --------------------------------------------------------

--
-- Table structure for table `board_games`
--

CREATE TABLE `board_games` (
  `gameID` varchar(10) NOT NULL,
  `memberID` varchar(10) NOT NULL,
  `boardgame` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `eventID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board_games`
--

INSERT INTO `board_games` (`gameID`, `memberID`, `boardgame`, `position`, `notes`, `date`, `eventID`) VALUES
('111', '1', 'catan', 'dfsdf', 'asdf', 'asd', '1'),
('345', '1', 'sdfdsf', 'sdfsdf', 'sdfsdf', 'sdfsdf', '1'),
('5', '2', 'avalon', 'sdf', 'asd', 'asdad', '1'),
('555', '777', 'nnmnbm', 'asdasd', 'cvb', 'ghgfhzfzc', '2'),
('asd', '1', 'asdas', 'asdasd', 'asd', 'asd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `board_game_owner`
--

CREATE TABLE `board_game_owner` (
  `memberID` varchar(10) NOT NULL,
  `bgID` varchar(10) NOT NULL,
  `boardgame` varchar(50) NOT NULL,
  `num_of_players` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board_game_owner`
--

INSERT INTO `board_game_owner` (`memberID`, `bgID`, `boardgame`, `num_of_players`, `type`) VALUES
('567', '4555', 'sdfsdf', 'sdffg', 'fgfgfg'),
('234', '55', 'sdfdsf', 'sdfsdf', 'sdfdsf'),
('777', '76', 'sdfdsf', '6', 'sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `memberID` varchar(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `family_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`memberID`, `first_name`, `family_name`, `email`, `phone`) VALUES
('1', 'edfg', 'dfg', 'dfg', 'sdg'),
('2', 'sdf', 'sdf', 'sdf', 'sdf'),
('234', 'Asds', 'Bfgfgjj', 'ssdf@sfdfg', '334455642'),
('567', 'Adfdf', 'Sdfsd', 'sdf@sddf', '232323323'),
('777', 'Asdsd', 'Dasfsa', 'asd@asd', '567567566');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `eventID` varchar(10) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`eventID`, `event_name`, `day`, `time`, `location`) VALUES
('1', 'asdasd', 'asd', 'sad', 'asd'),
('2', 'asdasd', 'asdasd', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `scoring`
--

CREATE TABLE `scoring` (
  `gameID` varchar(10) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoring`
--

INSERT INTO `scoring` (`gameID`, `score`) VALUES
('111', 55);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bg_assigned`
--
ALTER TABLE `bg_assigned`
  ADD KEY `fk_assign_player` (`memberID`),
  ADD KEY `fk_assign_bg` (`bgID`);

--
-- Indexes for table `board_games`
--
ALTER TABLE `board_games`
  ADD PRIMARY KEY (`gameID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `fk_bg_schedule` (`eventID`);

--
-- Indexes for table `board_game_owner`
--
ALTER TABLE `board_game_owner`
  ADD PRIMARY KEY (`bgID`),
  ADD KEY `fk_bg_owner` (`memberID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `scoring`
--
ALTER TABLE `scoring`
  ADD KEY `fk_bg_score` (`gameID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bg_assigned`
--
ALTER TABLE `bg_assigned`
  ADD CONSTRAINT `fk_assign_bg` FOREIGN KEY (`bgID`) REFERENCES `board_game_owner` (`bgID`),
  ADD CONSTRAINT `fk_assign_player` FOREIGN KEY (`memberID`) REFERENCES `players` (`memberID`);

--
-- Constraints for table `board_games`
--
ALTER TABLE `board_games`
  ADD CONSTRAINT `board_games_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `players` (`memberID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bg_schedule` FOREIGN KEY (`eventID`) REFERENCES `schedule` (`eventID`);

--
-- Constraints for table `board_game_owner`
--
ALTER TABLE `board_game_owner`
  ADD CONSTRAINT `fk_bg_owner` FOREIGN KEY (`memberID`) REFERENCES `players` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scoring`
--
ALTER TABLE `scoring`
  ADD CONSTRAINT `fk_bg_score` FOREIGN KEY (`gameID`) REFERENCES `board_games` (`gameID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
