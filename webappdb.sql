-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 10:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `building_id` int(11) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `building_address` varchar(100) NOT NULL,
  `building_owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`building_id`, `building_name`, `building_address`, `building_owner`) VALUES
(2, 'SM City Cebu', 'Cebu City, Cebu', 'SM Prime Holdings'),
(3, 'SM Seaside City Cebu', 'Cebu South Coastal Rd, Cebu City, Cebu', 'SM Prime Holdings'),
(4, 'SM City Consolacion', 'Cebu N Rd, Consolacion, 6001 Cebu', 'SM Prime Holdings');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `cinema_id` int(11) NOT NULL,
  `cinema_number` varchar(100) NOT NULL,
  `cinema_type` enum('Digital','3D','IMAX','') NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`cinema_id`, `cinema_number`, `cinema_type`, `building_id`) VALUES
(1, 'Cinema 1', 'Digital', 2),
(2, 'Cinema 2', 'Digital', 2),
(3, 'IMAX', 'IMAX', 2),
(4, 'Cinema 5', 'Digital', 2),
(5, 'Cinema 6', 'Digital', 2),
(6, 'Cinema 7', 'Digital', 2),
(7, 'Cinema 8', 'Digital', 2),
(8, 'Digital Cinema 1', 'Digital', 3),
(9, 'Digital Cinema 2', 'Digital', 3),
(10, 'Digital Cinema 3', 'Digital', 3),
(11, 'Digital Cinema 4', 'Digital', 3),
(12, 'Director\'s Club 1', 'Digital', 3),
(13, 'Director\'s Club 2', 'Digital', 3),
(14, 'Large Screen Cinema', 'Digital', 3),
(15, 'Center Stage', 'Digital', 3),
(16, 'Cinema 1', 'Digital', 4),
(17, 'Cinema 2', 'Digital', 4),
(18, 'Cinema 3', 'Digital', 4),
(19, 'Cinema 4', 'Digital', 4),
(20, 'Cinema 3', 'Digital', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `movie_desc` varchar(500) NOT NULL,
  `movie_year` year(4) NOT NULL,
  `movie_rating` enum('G','PG','PG-13','R','NC-17') NOT NULL,
  `movie_poster` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_title`, `movie_desc`, `movie_year`, `movie_rating`, `movie_poster`) VALUES
(1, 'Moana', 'An adventurous teenager sails out on a daring mission to save her people. During her journey, Moana meets the once-mighty demigod Maui, who guides her in her quest to become a master way-finder. Together they sail across the open ocean on an action-packed voyage, encountering enormous monsters and impossible odds. Along the way, Moana fulfills the ancient quest of her ancestors and discovers the one thing she always sought: her own identity.', 2017, 'PG', 'images/c1.jpg'),
(7, 'Mike and Dave Need Wedding Dates', 'Mike and Dave Stangle are young, adventurous, fun-loving brothers who tend to get out of control at family gatherings. When their sister Jeanie reveals her Hawaiian wedding plans, the rest of the clan insists that they both bring respectable dates. After placing an ad on Craigslist, the siblings decide to pick Tatiana and Alice, two charming and seemingly normal women. Once they arrive on the island, however, Mike and Dave realize that their companions are ready to get wild and party hard.', 2017, 'R', 'images/c7.jpg'),
(9, 'Barbershop: The Next Cut', 'To survive harsh economic times, Calvin and Angie have merged the barbershop and beauty salon into one business. The days of male bonding are gone as Eddie and the crew must now contend with sassy female co-workers and spirited clientele. As the battle of the sexes rages on, a different kind of conflict has taken over Chicago. Crime and gangs are on the rise, leaving Calvin worried about the fate of his son. Together, the friends come up with a bold plan to take back their beloved neighborhood.', 2017, 'PG-13', 'images/c9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `screening_id` int(11) NOT NULL,
  `screening_date` date NOT NULL,
  `screening_sched` varchar(100) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`screening_id`, `screening_date`, `screening_sched`, `movie_id`, `cinema_id`) VALUES
(1, '2018-03-15', '10:30-12:00', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `seat_row` varchar(100) NOT NULL,
  `seat_number` varchar(100) NOT NULL,
  `seat_status` enum('EMPTY','RESERVED','OCCUPIED','') NOT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `trans_ref` varchar(12) NOT NULL,
  `trans_date` datetime NOT NULL,
  `trans_amount` float NOT NULL,
  `trans_type` enum('Credit','','','') NOT NULL,
  `screening_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_bod` date NOT NULL,
  `user_gender` enum('Male','Female','','') NOT NULL,
  `user_civil` enum('Single','Married','','') NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_province` varchar(24) NOT NULL,
  `user_city` varchar(24) NOT NULL,
  `user_mobile` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_type` enum('Admin','Customer','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_fname`, `user_lname`, `user_bod`, `user_gender`, `user_civil`, `user_address`, `user_province`, `user_city`, `user_mobile`, `user_email`, `user_type`) VALUES
(1, 'mrmonday', 'monday', 'Andrew', 'Edioma', '1998-07-04', 'Male', 'Single', 'Deca Homes', 'Cebu', 'Mandaue City', '09330495195', 'andrewedioma@gmail.com', 'Admin'),
(2, 'lebigalabird', 'bird', 'Francis Von Dominic', 'Arimbay', '1998-05-09', 'Female', 'Married', 'Cebu', 'Cebu', 'Cebu', '09494814799', 'von.arimbay598@gmail.com', 'Customer'),
(3, 'faw', 'faw', 'fawfwa', 'fwaf', '0000-00-00', '', '', '', '', '', '1232', 'faw@faw', 'Customer'),
(4, 'Joe', 'Joe', 'Joe', 'Joe', '0000-00-00', '', '', '', '', '', '12321', 'Joe@gmail.com', 'Customer'),
(5, 'BUzz', 'buzz', 'Josh', 'Buzz', '0000-00-00', '', '', '', '', '', '01982365178', 'BUzz@gmail.com', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cinema_id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`screening_id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `screening_id` (`screening_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `cinema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `building` (`building_id`);

--
-- Constraints for table `screening`
--
ALTER TABLE `screening`
  ADD CONSTRAINT `screening_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`cinema_id`),
  ADD CONSTRAINT `screening_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`cinema_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`screening_id`) REFERENCES `screening` (`screening_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
