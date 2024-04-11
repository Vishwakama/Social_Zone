-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 09:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_zone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_bio_info`
--

CREATE TABLE `admin_bio_info` (
  `bio_id` int(11) NOT NULL,
  `admin_unique_id` varchar(25) NOT NULL,
  `admin_profession` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_bio_info`
--

INSERT INTO `admin_bio_info` (`bio_id`, `admin_unique_id`, `admin_profession`) VALUES
(1, '494206709', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_dtls`
--

CREATE TABLE `admin_dtls` (
  `admin_unique_id` int(11) NOT NULL,
  `admin_fname` varchar(50) NOT NULL,
  `admin_lname` varchar(50) NOT NULL,
  `admin_dob` varchar(50) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_gender` varchar(50) NOT NULL,
  `admin_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_dtls`
--

INSERT INTO `admin_dtls` (`admin_unique_id`, `admin_fname`, `admin_lname`, `admin_dob`, `admin_phone`, `admin_email`, `admin_password`, `admin_gender`, `admin_status`) VALUES
(494206709, 'Bipin', 'Vishwakarmaa', '2002-07-12', '9427487180', 'buoun@gmail.com', '07c0405f02e202313bc77e6e3a8a4fdc', 'male', 'Active now'),
(779504644, 'Piyush ', 'Anand', '2000-01-12', '8569874582', 'piyush@gmail.com', '1d92c0bbec64ef6093c2abb35bfe6b7f', 'male', 'Offline now'),
(885266505, 'Ashutosh', 'Kumar', '2000-01-12', '9632584758', 'ashu@gmail.com', '1e3b907d1fedc6c873b74cb56fc1b4ad', 'male', 'Active now'),
(1209876431, 'Akash', 'Acharya', '1000-02-12', '5236589664', 'akash@gmail.com', 'c6916d3c88ee8ecebd2f032ff57f3ea8', 'male', 'Active now'),
(1538378506, 'Vaibhav', 'Kumar', '2000-12-10', '8965236547', 'vaibhav@gmail.com', '92680d50d78c6d891f9403b6cd4cd59c', 'male', 'Active now'),
(1616579508, 'Karan', 'Prajapati', '2000-02-10', '84574874822', 'karan@gmail.com', 'c1d351a79a2d4b7a62e12c32b685210d', 'male', 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_profile_id` int(11) NOT NULL,
  `admin_unique_id` int(25) NOT NULL,
  `admin_info_overview` varchar(25) NOT NULL,
  `admin_info_experience` varchar(25) NOT NULL,
  `admin_info_education` varchar(25) NOT NULL,
  `admin_info_location` varchar(25) NOT NULL,
  `admin_info_skills` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_link`
--

CREATE TABLE `admin_link` (
  `link_id` int(11) NOT NULL,
  `facebook_id` varchar(100) NOT NULL,
  `twitter_id` varchar(100) NOT NULL,
  `instagram_id` varchar(100) NOT NULL,
  `youtube_id` varchar(100) NOT NULL,
  `admin_unique_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_link`
--

INSERT INTO `admin_link` (`link_id`, `facebook_id`, `twitter_id`, `instagram_id`, `youtube_id`, `admin_unique_id`) VALUES
(1, 'bhhhhh', 'hgyigui', 'iukhjkoi;l/k.', 'gulyihuojilk', 494206709);

-- --------------------------------------------------------

--
-- Table structure for table `admin_post`
--

CREATE TABLE `admin_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post` varchar(225) NOT NULL,
  `post_desc` varchar(225) NOT NULL,
  `admin_unique_id` varchar(25) NOT NULL,
  `post_time` varchar(50) NOT NULL,
  `post_action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_post`
--

INSERT INTO `admin_post` (`post_id`, `post_title`, `post`, `post_desc`, `admin_unique_id`, `post_time`, `post_action`) VALUES
(1, '', 'images/943033973.jpg | ', 'Nothing', '1616579508', '2024-01-07 16:45:14', '1'),
(2, '', 'images/1921180113.jpg | ', 'My New Post', '494206709', '2024-01-07 16:52:49', '1'),
(3, '', 'images/1668328853.jpg | ', 'My Best Friend', '779504644', '2024-01-07 21:59:20', '1'),
(4, '', 'images/156295968.png | ', 'Riding Horse', '1538378506', '2024-01-08 10:22:15', '1'),
(5, '', 'images/2054517309.png | ', 'Nothing', '1209876431', '2024-01-10 13:55:41', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile_pic`
--

CREATE TABLE `admin_profile_pic` (
  `image_id` int(11) NOT NULL,
  `admin_unique_id` int(11) NOT NULL,
  `admin_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_profile_pic`
--

INSERT INTO `admin_profile_pic` (`image_id`, `admin_unique_id`, `admin_image`) VALUES
(1, 494206709, 'uploads/large/2361704625043.jpg'),
(2, 1616579508, 'uploads/large/8341704625403.jpg'),
(3, 779504644, 'uploads/large/8411704644843.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_thumbnail_pic`
--

CREATE TABLE `admin_thumbnail_pic` (
  `admin_imgae_id` int(11) NOT NULL,
  `admin_image` varchar(200) NOT NULL,
  `admin_unique_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_thumbnail_pic`
--

INSERT INTO `admin_thumbnail_pic` (`admin_imgae_id`, `admin_image`, `admin_unique_id`) VALUES
(1, 'uploads/small/8341704625403.jpg', '1616579508'),
(2, 'uploads/small/2361704625043.jpg', '494206709'),
(3, 'uploads/small/8411704644843.jpg', '779504644');

-- --------------------------------------------------------

--
-- Table structure for table `follow_rq`
--

CREATE TABLE `follow_rq` (
  `follow_send_id` int(11) NOT NULL,
  `follow_reciv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_system`
--

CREATE TABLE `follow_system` (
  `follow_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow_system`
--

INSERT INTO `follow_system` (`follow_id`, `follower_id`, `following_id`) VALUES
(1, 494206709, 1616579508),
(2, 1616579508, 494206709),
(3, 779504644, 494206709),
(4, 494206709, 779504644),
(5, 1538378506, 494206709),
(6, 1538378506, 779504644),
(7, 494206709, 1538378506),
(8, 1209876431, 494206709);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 494206709, 1616579508, 'Hiiii'),
(2, 1616579508, 494206709, 'Hey Karan'),
(3, 494206709, 1616579508, 'Kaise ho Bipin Bhai'),
(4, 1616579508, 494206709, 'Main badiya hoon Bhai'),
(5, 494206709, 779504644, 'Hiii bhaiya'),
(6, 779504644, 494206709, 'Kaise ho bhai'),
(7, 494206709, 779504644, 'Main badiya hooon'),
(8, 494206709, 1538378506, 'hiii'),
(9, 1538378506, 494206709, 'Hiii'),
(10, 494206709, 1209876431, 'hello'),
(11, 494206709, 1209876431, 'Hiii'),
(12, 1209876431, 494206709, 'KAise ho');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `like_id` int(11) NOT NULL,
  `like_post_id` int(11) NOT NULL,
  `like_admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`like_id`, `like_post_id`, `like_admin_id`) VALUES
(1, 1, 1616579508),
(2, 3, 494206709),
(3, 4, 1538378506),
(4, 4, 494206709);

-- --------------------------------------------------------

--
-- Table structure for table `private_account`
--

CREATE TABLE `private_account` (
  `private_id` int(11) NOT NULL,
  `account_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_bio_info`
--
ALTER TABLE `admin_bio_info`
  ADD PRIMARY KEY (`bio_id`);

--
-- Indexes for table `admin_dtls`
--
ALTER TABLE `admin_dtls`
  ADD PRIMARY KEY (`admin_unique_id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_profile_id`);

--
-- Indexes for table `admin_link`
--
ALTER TABLE `admin_link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `admin_post`
--
ALTER TABLE `admin_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `admin_profile_pic`
--
ALTER TABLE `admin_profile_pic`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `admin_thumbnail_pic`
--
ALTER TABLE `admin_thumbnail_pic`
  ADD PRIMARY KEY (`admin_imgae_id`);

--
-- Indexes for table `follow_system`
--
ALTER TABLE `follow_system`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `private_account`
--
ALTER TABLE `private_account`
  ADD PRIMARY KEY (`private_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_bio_info`
--
ALTER TABLE `admin_bio_info`
  MODIFY `bio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_dtls`
--
ALTER TABLE `admin_dtls`
  MODIFY `admin_unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1616579509;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_link`
--
ALTER TABLE `admin_link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_post`
--
ALTER TABLE `admin_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_profile_pic`
--
ALTER TABLE `admin_profile_pic`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_thumbnail_pic`
--
ALTER TABLE `admin_thumbnail_pic`
  MODIFY `admin_imgae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow_system`
--
ALTER TABLE `follow_system`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `private_account`
--
ALTER TABLE `private_account`
  MODIFY `private_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
