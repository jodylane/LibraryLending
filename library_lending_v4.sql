-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2016 at 09:02 AM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library_lending`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
`book_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `author` varchar(300) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `image_link` text,
  `genre` varchar(300) DEFAULT NULL,
  `description` text,
  `publisher` varchar(50) NOT NULL,
  `publication_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `isbn`, `image_link`, `genre`, `description`, `publisher`, `publication_date`) VALUES
(1, 'The Lord of the Rings: The Fellowship of the Ring', 'J.R.R. Tolkien', '0345339703', 'LotR_Fellowship_Cover.jpg', 'Fantasy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Allen & Unwin', '1954-07-29'),
(2, 'Harry Potter and the Sorcerer&#39;s Stone', 'J.K. Rowling', '9780545582289', 'HP_Sorcerors_Cover.jpg', 'Fantasy', 'Harry Potter is a wizard orphan.', 'Scholastic', '1998-09-01'),
(3, 'The Lion, the Witch, and the Wardrobe', 'C.S. Lewis', '0064404994', 'CoN_Lion_Cover.jpg', 'Fantasy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Geoffrey Bles', '1950-10-16'),
(4, 'Fahrenheit 451', 'Ray Bradbury', '1451673310', 'Fahrenheit451_Cover.jpg', 'Classic', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Ballantine Books', '1953-00-00'),
(5, 'Redwall', 'Brian Jacques', '0142302376', 'Redwall_Cover.jpg', 'Fantasy', 'Pretty good', 'Philomel', '2007-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`item_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `user_lent_to` int(11) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `book_id`, `is_available`, `user_lent_to`, `due_date`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 1, NULL, NULL),
(3, 1, 0, 3, '2016-11-10 00:00:00'),
(4, 2, 1, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 3, 0, 3, '2016-11-06 09:45:20'),
(7, 3, 1, NULL, NULL),
(8, 3, 1, NULL, NULL),
(9, 4, 1, NULL, NULL),
(10, 5, 0, 2, '2016-11-09 09:55:28'),
(11, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `user_email`, `password`, `is_admin`) VALUES
(1, 'lukebrown', 'Luke', 'Brown', 'lukbrown@iupui.edu', 'password', 1),
(2, 'bookfan0001', 'Bill', 'Smith', 'bsmith@example.com', 'password', 0),
(3, 'ilovebooks', 'Sarah', 'Wood', 'swood@example.com', 'password', 0),
(4, 'reedread', 'Taylor', 'Reed', 'reedreader@example.com', 'password', 0),
(5, 'marklibrary', 'Mark', 'Jackson', 'mjack@example.com', 'password', 0),
(6, 'taeadsf', 'Luke', 'Brown', 'lukbrown@iupui.edu', 'password', 0),
(10, 'jodylane', 'Josh', 'Lane', 'jodylane@umail.iu.edu', 'jodylane', 1),
(11, 'hnw0414', 'Hannah', 'Woodall', 'hnw0414@gmail.com', 'password', 0),
(12, 'jay', 'jay', 'jay', 'jay@yahoo.com', 'password', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`book_id`), ADD UNIQUE KEY `books_book_id_uindex` (`book_id`), ADD UNIQUE KEY `books_isbn_uindex` (`isbn`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`item_id`), ADD UNIQUE KEY `inventory_item_id_uindex` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `users_user_id_uindex` (`user_id`), ADD UNIQUE KEY `users_user_name_uindex` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
