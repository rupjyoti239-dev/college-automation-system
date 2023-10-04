-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 06:44 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `register` (IN `Name` VARCHAR(100), IN `Email` VARCHAR(100), IN `Pass` VARCHAR(100), IN `Phone` VARCHAR(100), IN `Address` VARCHAR(20))  BEGIN
INSERT INTO customer(name,email,pass,phone,address) VALUES (Name , Email, Pass, Phone, Address);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `chassis_number` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`chassis_number`, `model`, `color`) VALUES
(1111, 1, 'Dark Red'),
(1212, 2, 'Red'),
(1224, 4, 'black'),
(2132, 5, 'black'),
(2256, 4, 'Red'),
(2321, 3, 'Silver'),
(2378, 2, 'black'),
(3231, 2, 'black'),
(4334, 5, 'Dark Red'),
(5454, 2, 'Silver'),
(5566, 1, 'Silver'),
(5569, 1, ''),
(5645, 3, 'Red'),
(6765, 1, 'Dark Red'),
(8797, 5, 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `name`, `email`, `pass`, `phone`, `address`) VALUES
(1, 'sourav', 'sourav@gmail.com', 'sourav', '80808080', 'banglore'),
(2, 'ankur', 'ankur@gmail.com', 'ankur', '907868', 'delhi');

-- --------------------------------------------------------

--
-- Table structure for table `dealership`
--

CREATE TABLE `dealership` (
  `d_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealership`
--

INSERT INTO `dealership` (`d_id`, `name`) VALUES
(7001, 'Galaxy Toyota'),
(8001, 'Audi Central'),
(9001, 'BMW One Central'),
(10001, 'Metro Chevrolet'),
(11001, 'Aston Martin'),
(12001, 'Mistubishi');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `m_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`m_id`, `name`) VALUES
(7001, 'Bajaj'),
(8001, 'Honda'),
(9001, 'TVS'),
(10001, 'KTM'),
(11001, 'Royal Enfield'),
(12001, 'Hero'),
(15251, 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `engine` varchar(30) NOT NULL,
  `fuel_tank` varchar(30) NOT NULL,
  `fuel_type` varchar(30) NOT NULL,
  `bike_desc` text NOT NULL,
  `file_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model`, `m_id`, `name`, `year`, `engine`, `fuel_tank`, `fuel_type`, `bike_desc`, `file_path`) VALUES
(1, 7001, 'Avenger 220 Cruise', 2020, '220', '13', 'Petrol', 'The Bajaj Avenger is a cruiser style motorcycle designed and manufactured by Bajaj Auto in India. It draws the styling and other design cues from the Kawasaki Eliminator which had an air-cooled, single-cylinder Kawasaki engine and was sold at a premium.The Avenger was upgraded in 2007 with an increase in engine capacity to 200 cc. The oil-cooled engine was a modified version of that fitted to the Pulsar 200. The Avenger 200 features a modified engine of Pulsar 200, delivering 0.5 bhp power and 0.4 kgfÂ·m (4 NÂ·m) torque less than the Pulsar. The bike has a top speed of 114 km/h (71 mph). It does 0 to 60 km/h (0 to 37 mph) in 5.18 seconds and 0 to 100 km/h (0 to 62 mph) in 20.03 seconds. ', 'bikes/16210942211067932715avenger.jpg'),
(2, 7001, 'Pulsar 180', 2021, '180', '10', 'Petrol', 'The Bajaj Pulsar is a motorcycle manufactured by Bajaj Auto in India. It was developed by the product engineering division of Bajaj Auto in association with Tokyo R&D, and later with motorcycle designer Glynn Kerr. A variant of the bike, the Pulsar 200NS was launched in 2012, but it was suspended for some time (reintroduced in early 2017 with BS IV Emission compliance and renamed the NS200). With average monthly sales of around 86,000 units in 2011, Pulsar claimed a 2011 market share of 47% in its segment.By April 2012, more than five million units of Pulsar were sold.[4] In 2018, they celebrated selling over ten million Pulsars backed an exclusive TV commercial and a marquee ride to in 6 cities to write \"PULSAR\" on a pre-defined route. ', 'bikes/16210943321810624144pulsar.jpg'),
(3, 11001, 'Bullet', 2020, '350', '14', 'Petrol', 'The Royal Enfield Bullet was originally an overhead-valve single-cylinder four-stroke motorcycle made by Royal Enfield in Redditch, Worcestershire, now produced by Royal Enfield at Chennai, Tamil Nadu, a company originally founded by Madras Motors to build Royal Enfield motorcycles under licence in India. ', 'bikes/1621094403348409343bullet.png'),
(4, 11001, 'Himalayan', 2020, '350', '15', 'Petrol', 'The Himalayan is an Indian adventure touring motorcycle', 'bikes/16210945581902297096himalayan.jpg'),
(5, 15251, 'Yamaha FZ S FI', 2021, '150', '13', 'Petrol', 'Yamaha FZ S FI is a commuter bike available at a starting price of Rs. 1,04,984 in India. It is available in 4 variants and 7 colours with top variant price starting from Rs. 1,09,993. The FZ S FI is powered by 149cc BS6 engine which develops a power of 12.2 bhp and a torque of 13.6 Nm. With both front and rear disc brakes, Yamaha FZ S FI comes up with anti-locking braking system. This FZ S FI bike weighs 137 kg and has a fuel tank capacity of 13 liters.', 'bikes/162109473457550765fzsf1.jpeg'),
(6, 11001, 'Bullet Classic', 2021, '350', '14', 'Petrol', 'Royal Enfield Classic 350 is a cruiser bike available at a starting price of Rs. 1,64,463 in India. It is available in 7 variants and 13 colours with top variant price starting from Rs. 1,89,475. The Classic 350 is powered by 346cc BS6 engine which develops a power of 19.1 bhp and a torque of 28 Nm.', 'bikes/16210965971247533745classic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sale2`
--

CREATE TABLE `sale2` (
  `sale_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `carmodel` varchar(100) NOT NULL,
  `ordertime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale2`
--

INSERT INTO `sale2` (`sale_id`, `customer_id`, `carmodel`, `ordertime`) VALUES
(1, 1, '72', '2017-11-20 21:40:31'),
(2, 2, '81', '2017-11-20 21:44:35'),
(3, 1, '81', '2017-11-20 21:45:33'),
(4, 1, '81', '2017-11-20 21:46:54'),
(5, 2, '1205', '2021-03-03 01:45:34'),
(6, 2, '1', '2021-05-15 16:11:50');

--
-- Triggers `sale2`
--
DELIMITER $$
CREATE TRIGGER `Transaction` BEFORE INSERT ON `sale2` FOR EACH ROW BEGIN
	SET NEW.ordertime = NOW();
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`chassis_number`),
  ADD KEY `serial` (`model`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `dealership`
--
ALTER TABLE `dealership`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `d_id_2` (`d_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `sale2`
--
ALTER TABLE `sale2`
  ADD PRIMARY KEY (`sale_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `chassis_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334343434;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale2`
--
ALTER TABLE `sale2`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`model`) REFERENCES `model` (`model`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dealership`
--
ALTER TABLE `dealership`
  ADD CONSTRAINT `dealership_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `manufacturer` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `manufacturer` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
