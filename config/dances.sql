-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 04:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dances`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dance_categories`
--

CREATE TABLE `tbl_dance_categories` (
  `category_id` int(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_image` varchar(200) NOT NULL,
  `tag_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_dance_categories`
--

INSERT INTO `tbl_dance_categories` (`category_id`, `category_name`, `category_image`, `tag_name`) VALUES
(12, 'Indian Classical Dance', 'uploads/categories/indian.jpg', 'Popular'),
(13, 'African- American Dance', 'uploads/categories/AA.jpg', 'Popular'),
(14, 'Latin Dance', 'uploads/categories/LATIN.jpg', 'Popular'),
(15, 'Professional Dance', 'uploads/categories/pp.jpg', 'Treanding'),
(16, 'Ball Room', 'uploads/categories/balrom.jpg', 'Treanding');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dance_forms`
--

CREATE TABLE `tbl_dance_forms` (
  `dance_id` int(200) NOT NULL,
  `dance_name` varchar(200) NOT NULL,
  `category_id` int(200) NOT NULL,
  `price` int(200) NOT NULL,
  `dance_image` varchar(200) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_dance_forms`
--

INSERT INTO `tbl_dance_forms` (`dance_id`, `dance_name`, `category_id`, `price`, `dance_image`, `tag_name`) VALUES
(2, 'Bharatanatyam (Tamil Nadu)', 0, 200, 'uploads/dance/Bharatanatyam.jpg', ''),
(3, 'Kathak (Uttar Pradesh)', 12, 300, 'uploads/dance/kathak-dance.jpg', ''),
(4, 'Kuchipuri (Andhra Pradesh)', 12, 350, 'uploads/dance/Kuchipuri.jpg', ''),
(6, 'KathaKali (Kerala)', 12, 250, 'uploads/dance/Kathakali.jpg', ''),
(7, 'Manipuri (Manipur)', 12, 500, 'uploads/dance/Manipuri.jpg', ''),
(8, 'Hip-Hop', 13, 399, 'uploads/dance/hip-hop-dance.jpg', ''),
(9, 'Lindy Hop', 13, 299, 'uploads/dance/Lindy-Hop.jpg', ''),
(10, 'Moonwalk', 13, 599, 'uploads/dance/moon-walk.jpg', ''),
(11, 'Break Dance', 13, 350, 'uploads/dance/break-dance.jpg', ''),
(12, 'Jazz Dance', 13, 299, 'uploads/dance/Jazz-Dance.jpg', ''),
(13, 'Cha-cha-cha', 14, 400, 'uploads/dance/Cha-Cha-Cha.jpg', ''),
(14, 'Salsa', 14, 199, 'uploads/dance/Salsa.jpg', ''),
(15, 'Rumba', 14, 599, 'uploads/dance/Rumba.jpg', ''),
(16, 'Samba', 14, 300, 'uploads/dance/Samba.jpg', ''),
(17, 'Polka', 14, 250, 'uploads/dance/Polka.jpg', ''),
(18, 'Free Style', 15, 250, 'uploads/dance/Free-Style.jpg', ''),
(19, 'Belly Dance', 15, 300, 'uploads/dance/Belly-Dance.jpg', ''),
(20, 'Tap Dance', 15, 350, 'uploads/dance/tap-dance.jpg', ''),
(21, 'Concert', 15, 599, 'uploads/dance/Concert.jpg', ''),
(22, 'Ballet Dance', 15, 499, 'uploads/dance/Ballet.jpg', ''),
(23, 'Contemporary', 15, 599, 'uploads/dance/Contemporary.jpg', ''),
(24, 'Waltz', 16, 425, 'uploads/dance/Waltz.jpg', ''),
(25, 'Cha-cha', 16, 299, 'uploads/dance/Cha-Cha-Cha1.jpg', ''),
(26, 'Odissi Dance(Odisha )', 0, 500, 'uploads/dance/odissi1.jpg', ''),
(28, 'Odissi Dance', 12, 350, 'uploads/dance/odissi1.jpg', ''),
(29, 'Hustle Dance', 13, 500, 'uploads/dance/Hustle1.jpg', ''),
(30, 'Mamboo Dance', 14, 300, 'uploads/dance/mambo1.jpg', ''),
(31, 'Bharatanatyam (Tamil Nadu)', 12, 300, 'uploads/dance/Bharatanatyam.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollment`
--

CREATE TABLE `tbl_enrollment` (
  `id` int(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_role_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `dance_id` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `instructor_id` int(100) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `address` text NOT NULL,
  `date_of_join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_enrollment`
--

INSERT INTO `tbl_enrollment` (`id`, `student_name`, `user_id`, `user_role_id`, `category_id`, `dance_id`, `price`, `instructor_id`, `shift`, `payment_method`, `payment_status`, `address`, `date_of_join`) VALUES
(1, 'Student', 6, 3, 2, 1, 500, 1, 'Afternoon (12:00-03:00)', 'Cash', 'Approve', 'abc', '2024-03-04'),
(2, 'Rahul kumar', 11, 3, 2, 1, 500, 1, 'Morning (09:00-12:00)', 'Internet Banking', 'Pending', 'akash vihar', '2024-03-30'),
(3, 'Sonu Kumar', 10, 3, 12, 7, 500, 4, 'Afternoon (12:00-03:00)', 'Cash', 'Approve', 'ABCDefghi', '2024-04-04'),
(4, 'Rahul kumar', 11, 3, 14, 15, 599, 4, 'Evening (03:00-06:00)', 'Internet Banking', 'Approve', 'Ghimksddsnf dnbfjd', '2024-04-04'),
(5, 'Neha Kumari', 15, 3, 15, 18, 250, 8, 'Evening (03:00-06:00)', 'Internet Banking', 'Approve', 'Laxmi Nagar ,New Delhi', '2024-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(100) NOT NULL,
  `feedback` text NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_role_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `feedback`, `user_id`, `user_role_id`) VALUES
(1, 'EXCELLENT ??', 6, 3),
(2, 'Move with us is really a best Dance Academy. ', 10, 3),
(7, 'excellent institute', 11, 3),
(8, 'good', 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructors`
--

CREATE TABLE `tbl_instructors` (
  `instructor_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `instructor_name` varchar(200) NOT NULL,
  `age` int(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `user_role_id` int(200) NOT NULL,
  `experience` int(200) NOT NULL,
  `address` text NOT NULL,
  `instructor_image` varchar(200) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_instructors`
--

INSERT INTO `tbl_instructors` (`instructor_id`, `user_id`, `instructor_name`, `age`, `gender`, `user_role_id`, `experience`, `address`, `instructor_image`, `doj`) VALUES
(1, 5, 'Instructor', 35, 'Male', 2, 8, 'ABC', 'uploads/instructors/jack.jpg', '2024-03-04'),
(6, 12, 'Rohit Kumar', 25, 'Male', 2, 10, 'Lauriya Bihar', 'uploads/instructors/rohit1.jpg', '2024-04-05'),
(7, 13, 'Khushboo', 23, 'Female', 2, 10, 'Botanical Garden', 'uploads/instructors/loli1.jpg', '2024-04-05'),
(8, 14, 'Alka kumari', 24, 'Female', 2, 7, 'Laxmi Nagar ,Delhi', 'uploads/instructors/alka1.jpg', '2024-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructor_dance_forms`
--

CREATE TABLE `tbl_instructor_dance_forms` (
  `id` int(200) NOT NULL,
  `instructor_role_id` int(200) NOT NULL,
  `dance_id` int(100) NOT NULL,
  `dance_name` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_instructor_dance_forms`
--

INSERT INTO `tbl_instructor_dance_forms` (`id`, `instructor_role_id`, `dance_id`, `dance_name`, `user_id`) VALUES
(1, 5, 1, 'Bharatanatyam', 5),
(2, 9, 1, 'Bharatanatyam', 9),
(3, 9, 21, 'Concert', 9),
(4, 12, 21, 'Concert', 12),
(5, 12, 18, 'Free Style', 12),
(6, 9, 10, 'Moonwalk', 9),
(7, 9, 5, 'Bharatanatyam (Tamil Nadu)', 9),
(8, 9, 1, 'Bharatanatyam', 9),
(9, 12, 2, 'Bharatanatyam (Tamil Nadu)', 12),
(10, 12, 7, 'Manipuri (Manipur)', 12),
(11, 12, 15, 'Rumba', 12),
(12, 12, 19, 'Belly Dance', 12),
(13, 13, 14, 'Salsa', 13),
(14, 13, 8, 'Hip-Hop', 13),
(15, 13, 12, 'Jazz Dance', 13),
(16, 13, 6, 'KathaKali (Kerala)', 13),
(17, 13, 17, 'Polka', 13),
(19, 13, 21, 'Concert', 13),
(20, 13, 20, 'Tap Dance', 13),
(21, 13, 10, 'Moonwalk', 13),
(22, 14, 18, 'Free Style', 14),
(23, 14, 2, 'Bharatanatyam (Tamil Nadu)', 14),
(24, 14, 8, 'Hip-Hop', 14),
(25, 14, 19, 'Belly Dance', 14),
(26, 14, 21, 'Concert', 14),
(27, 14, 11, 'Break Dance', 14),
(28, 14, 3, 'Kathak (Uttar Pradesh)', 14),
(29, 14, 14, 'Salsa', 14),
(30, 14, 6, 'KathaKali (Kerala)', 14),
(31, 14, 17, 'Polka', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `student_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `age` int(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `user_role_id` int(200) NOT NULL,
  `address` text NOT NULL,
  `student_image` varchar(200) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_id`, `user_id`, `student_name`, `age`, `gender`, `user_role_id`, `address`, `student_image`, `doj`) VALUES
(3, 7, 'DIVYA', 16, 'Female', 3, 'ABC', 'uploads/students/divya.jpg', '2024-03-04'),
(9, 10, 'Sonu Kumar', 23, 'Male', 3, 'Bettiah, Bihar', 'uploads/students/sonu1.jpg', '2024-04-05'),
(10, 11, 'Rahul kumar', 24, 'Male', 3, 'Banuchhapad ,Bettiah', 'uploads/students/rahul1.jpg', '2024-04-06'),
(11, 15, 'Neha Kumari', 23, 'Female', 3, 'Laxmi nagar ,New Delhi', 'uploads/students/neha1.jpg', '2024-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `user_role_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`, `mobile`, `user_role_id`) VALUES
(8, 'shweta_bala26', 'admin123@gmail.com', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', '45821651856', 1),
(10, 'Sonu Kumar', 'sonu123@gmail.com', 'f958365d117383ae66d5911f90906eebb56edf08', '123874688', 3),
(11, 'Rahul kumar', 'rahul123@gmail.com', '2d1d14d90d56f138543e8b17d6802b364ca1ed9b', '234156798', 3),
(12, 'Rohit Kumar', 'xyz@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '4582451', 2),
(13, 'Khushboo', 'kkhushu@gmail.com', '12d860be3734010a62e9b1015e75471d61dbceb5', '5241884848', 2),
(14, 'Alka kumari', 'alka@123gmail.com', '1d41ff08d4bc22e03769d76b7771b4c7c04973c5', '19986548', 2),
(15, 'Neha Kumari', 'neha123@gmail.com', 'dfd90d533a664efd11ef7e67d058bb93df7cbd76', '56187541184', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dance_categories`
--
ALTER TABLE `tbl_dance_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_dance_forms`
--
ALTER TABLE `tbl_dance_forms`
  ADD PRIMARY KEY (`dance_id`);

--
-- Indexes for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_instructors`
--
ALTER TABLE `tbl_instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `tbl_instructor_dance_forms`
--
ALTER TABLE `tbl_instructor_dance_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dance_categories`
--
ALTER TABLE `tbl_dance_categories`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_dance_forms`
--
ALTER TABLE `tbl_dance_forms`
  MODIFY `dance_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_instructors`
--
ALTER TABLE `tbl_instructors`
  MODIFY `instructor_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_instructor_dance_forms`
--
ALTER TABLE `tbl_instructor_dance_forms`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
