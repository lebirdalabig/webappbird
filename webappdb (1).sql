-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 09:36 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
(2, 'Dirty Grandpa', 'Uptight lawyer Jason Kelly (Zac Efron) is one week away from marrying his boss\'s controlling daughter, putting him on the fast track for a partnership at his firm. Tricked by his grandfather Dick (Robert De Niro), Jason finds himself driving the foulmouthed old man to Daytona Beach, Fla., for a wild spring break that includes frat parties, bar fights and an epic night of karaoke. While Jason worries about the upcoming wedding, Dick tries to show his grandson how to live life to the fullest.', 2017, 'R', 'images/c2.jpg'),
(3, 'Ride Along 2', 'Rookie lawman Ben Barber (Kevin Hart) aspires to become a detective like James Payton (Ice Cube), his future brother-in-law. James reluctantly takes Ben to Miami to follow up on a lead that\'s connected to a drug ring. The case brings them to a homicide detective and a computer hacker who reveals evidence that implicates a respected businessman. It\'s now up to James and Ben to prove that charismatic executive Antonio Pope is actually a violent crime lord who rules southern Florida\'s drug trade.', 2017, 'PG-13', 'images/c3.jpg'),
(4, 'The Boss', 'Wealthy CEO Michelle Darnell (Melissa McCarthy) always gets her way, until she\'s busted for insider trading and sent to federal prison. After leaving jail, Darnell finds herself broke, homeless and hated. Luckily, she tracks down former assistant Claire (Kristen Bell), the only person who\'s willing to help. While staying with Claire and her young daughter, the ex-con devises a new business model for a brownie empire. Unfortunately, some old enemies stand in the way of her return to the top.', 2017, 'R', 'images/c4.jpg'),
(5, 'Keanu', 'Recently dumped by his girlfriend, slacker Rell (Jordan Peele) finds some happiness when a cute kitten winds up on his doorstep. After a heartless thief steals the cat, Rell recruits his cousin Clarence (Keegan-Michael Key) to help him retrieve it. They soon learn that a thug named Cheddar (Method Man) has the animal, and he\'ll only give it back if the two men agree to work for him. Armed with guns and a gangster attitude, it doesn\'t take long for the hapless duo to land in big trouble.', 2017, 'R', 'images/c5.jpg'),
(6, 'Ice Age: Collision Course', 'Manny the mammoth starts to worry when his daughter Peaches announces her engagement. Still unlucky in love, Sid the sloth volunteers to plan the couple\'s wedding. To Manny\'s dismay, nothing can stop the upcoming nuptials, except maybe the end of the world. When Scrat accidentally launches himself into outer space, he sets off a chain reaction that sends an asteroid hurtling toward Earth. Now, the entire herd must leave home to explore new lands and save itself from Scrat\'s cosmic blunder.', 2017, 'PG', 'images/c6.jpg'),
(7, 'Mike and Dave Need Wedding Dates', 'Mike and Dave Stangle are young, adventurous, fun-loving brothers who tend to get out of control at family gatherings. When their sister Jeanie reveals her Hawaiian wedding plans, the rest of the clan insists that they both bring respectable dates. After placing an ad on Craigslist, the siblings decide to pick Tatiana and Alice, two charming and seemingly normal women. Once they arrive on the island, however, Mike and Dave realize that their companions are ready to get wild and party hard.', 2017, 'R', 'images/c7.jpg'),
(8, 'Bad Moms', 'Amy (Mila Kunis) has a great husband, overachieving children, beautiful home and successful career. Unfortunately, she\'s also overworked, exhausted and ready to snap. Fed up, she joins forces with two other stressed-out mothers (Kristen Bell, Kathryn Hahn) to get away from daily life and conventional responsibilities. As the gals go wild with their newfound freedom, they set themselves up for the ultimate showdown with PTA queen bee Gwendolyn and her clique of seemingly perfect moms.', 2017, 'R', 'images/c8.jpg'),
(9, 'Barbershop: The Next Cut', 'To survive harsh economic times, Calvin and Angie have merged the barbershop and beauty salon into one business. The days of male bonding are gone as Eddie and the crew must now contend with sassy female co-workers and spirited clientele. As the battle of the sexes rages on, a different kind of conflict has taken over Chicago. Crime and gangs are on the rise, leaving Calvin worried about the fate of his son. Together, the friends come up with a bold plan to take back their beloved neighborhood.', 2017, 'PG-13', 'images/c9.jpg'),
(10, 'Nine Lives', 'Tom Brand (Kevin Spacey) is a billionaire whose workaholic lifestyle takes him away from his loving wife Lara and adorable daughter Rebecca. Needing a present for Rebecca\'s 11th birthday, Brand buys a seemingly harmless cat from a mysterious pet store. Suddenly, a bizarre turn of events traps poor Tom inside the animal\'s body. The owner of the business tells him that he has one week to reconnect with his family, or live out the rest of his days as a cute and furry feline named Mr. Fuzzypants.', 2017, 'PG', 'images/c10.jpg');

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

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_bod`, `user_gender`, `user_civil`, `user_address`, `user_province`, `user_city`, `user_mobile`, `user_email`, `user_type`) VALUES
(1, 'Andrew', 'Edioma', '1998-07-04', 'Male', 'Single', 'Deca Homes', 'Cebu', 'Mandaue City', '09330495195', 'andrewedioma@gmail.com', 'Admin');

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
  MODIFY `cinema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
