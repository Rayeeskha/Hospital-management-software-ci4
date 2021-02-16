-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 05:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalsoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_users`
--

CREATE TABLE `blood_bank_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `level` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_users`
--

INSERT INTO `blood_bank_users` (`id`, `username`, `email`, `password`, `mobile`, `gender`, `uid`, `image`, `level`, `status`, `created_date`, `updated_at`) VALUES
(1, 'Abdal', 'abdal@gmail.com', '$2y$10$wJUYOVyOgAJ2D8Ay9gUfnu0bz14x9FdALoknZsGzDsD8W2bUXfuyW', 9655255252, 'Male', 'f92a762e82182360322dfa664c553f48', '', 5, 'Active', '2020-11-26', '2020-11-26 11:47:32'),
(2, 'Ravi', 'Ravi@gmail.com', '$2y$10$5DRuyamjjPMfH70FPdHpqeFM12LsczGBB0UjZgt8.uFn3nkqt.Qf6', 987654321, 'Male', '820ed46ba0a51bbb02adb74ece6d803d', '1606569255_a9af6cd5993579908de5.jpg', 5, 'Active', '2020-11-28', '');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

CREATE TABLE `blood_donor` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `donor_image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`id`, `donor_name`, `blood_group`, `contact_number`, `address`, `uid`, `donor_image`, `status`, `created_at`) VALUES
(1, 'Rajinder', 'A+', 9554540271, 'Lucknow India', '544461fbf83b82d5c94297acaa2fb87c', '1606579475_208f65d32c02c1c74daa.jpg', 'Active', '2020-11-28 10:04:35'),
(2, 'Ravi', 'A-', 8927937733, 'India Lucknow Jankipuram Sector H', 'ba0fce650b4086b2665f234db3a7f830', '1606579603_30d554c7bcb53e7c1910.jpg', 'Active', '2020-11-28 10:06:43'),
(3, 'Ayshuriya', 'B+', 8982399038, 'Hyderabad Pyradise', '1fffd12b28a379a26007ef97ddbe6abb', '1606579659_00702b483c62a796053c.jpg', 'Active', '2020-11-28 10:07:39'),
(4, 'Khalid', 'AB+', 7894398438, 'Tulsipur', 'ac34677fdfe59672d1df902968e66460', '1606579691_993ac7e58a3524baa89b.jpg', 'Active', '2020-11-28 10:08:11'),
(5, 'Vishnoi', 'AB-', 8978432929, 'Lucknow', 'cd9536120ae94cee4d9505441a6dc613', '1606579734_f469e83b46c128a68b02.jpg', 'Active', '2020-11-28 10:08:54'),
(6, 'Nisha', 'AB-', 8932893833, 'Lucknow', 'da929612ad427234cf69f1e489f91d72', '1606579884_973f2da92067d886200e.jpg', 'Active', '2020-11-28 10:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(11) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `blood_price` bigint(20) NOT NULL,
  `blood_unit` varchar(100) NOT NULL,
  `total_blood_price` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `blood_group`, `blood_price`, `blood_unit`, `total_blood_price`, `status`, `created_at`) VALUES
(1, 'A+', 3200, '12 Unit', 38400, 'Active', '2020-11-29'),
(2, 'A-', 2500, '10 Unit', 25000, 'Active', '2020-11-29'),
(3, 'B+', 1500, '15 Unit', 22500, 'Active', '2020-11-29'),
(4, 'B-', 2500, '25  Unit', 62500, 'Active', '2020-11-29'),
(5, 'AB+', 2500, '35 Unit', 87500, 'Active', '2020-11-29'),
(6, 'AB-', 2600, '26 Unit', 72000, 'Active', '2020-11-29'),
(9, 'O+', 1200, '10 Unit', 12000, 'Active', '2020-11-30'),
(10, 'O+', 4500, '10 Unit', 45000, 'Active', '2020-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requested_user`
--

CREATE TABLE `blood_requested_user` (
  `id` int(11) NOT NULL,
  `blood_donor_id` bigint(20) NOT NULL,
  `request_user_id` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_requested_user`
--

INSERT INTO `blood_requested_user` (`id`, `blood_donor_id`, `request_user_id`, `status`, `request_date`) VALUES
(1, 6, 2, 'Active', '2020-11-29'),
(2, 3, 2, 'Active', '2020-11-29'),
(3, 1, 2, 'Active', '2020-11-29'),
(4, 6, 2, 'Active', '2020-11-29'),
(5, 4, 2, 'Active', '2020-11-29'),
(6, 6, 2, 'Active', '2020-11-29'),
(7, 6, 2, 'Active', '2020-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `blood_request_google_user`
--

CREATE TABLE `blood_request_google_user` (
  `id` int(11) NOT NULL,
  `blood_donor_id` bigint(20) NOT NULL,
  `request_user` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `request_user_email` varchar(100) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_request_google_user`
--

INSERT INTO `blood_request_google_user` (`id`, `blood_donor_id`, `request_user`, `last_name`, `request_user_email`, `profile_pic`, `status`, `request_date`) VALUES
(1, 6, 'Rayees', 'khan', 'rayeesinfotech@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgmfeyREosRGUZJB-KwiKkQRX9S4owOzhSzsTee=s96-c', 'Active', '2020-11-28'),
(2, 6, 'Rayees', 'khan', 'rayeesinfotech@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgmfeyREosRGUZJB-KwiKkQRX9S4owOzhSzsTee=s96-c', 'Active', '2020-11-28'),
(3, 5, 'Rayees', 'khan', 'rayeesinfotech@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgmfeyREosRGUZJB-KwiKkQRX9S4owOzhSzsTee=s96-c', 'Active', '2020-11-29'),
(4, 4, 'Rayees', 'khan', 'rayeesinfotech@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgmfeyREosRGUZJB-KwiKkQRX9S4owOzhSzsTee=s96-c', 'Active', '2020-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `booked_doctor`
--

CREATE TABLE `booked_doctor` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_email` varchar(100) NOT NULL,
  `patient_mobile` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `boking_date` varchar(50) NOT NULL,
  `boking_time` varchar(50) NOT NULL,
  `pateint_issue` varchar(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_doctor`
--

INSERT INTO `booked_doctor` (`id`, `patient_name`, `patient_email`, `patient_mobile`, `doctor_id`, `doctor_name`, `boking_date`, `boking_time`, `pateint_issue`, `department`, `description`, `status`, `created_at`) VALUES
(1, 'Numair', 'softwaredevelopmentteam063@gmail.com', 9554549272, 1, 'Dr.Rayees Khan', '2020-11-20', '20:40', 'Loose Motion', '', '', 'Active', '2020-11-20'),
(13, 'Sameer Ahmed', 'rayeesinfotech@gmail.com', 9876768261, 1, 'Doctors', '2020-11-21', '13:11', 'Fever', '', '', 'Appointment', '2020-11-20'),
(14, 'Rajesh', 'rayeesinfotech@gmail.com', 9554540261, 0, '', '2020-11-24', '06:46', 'Fever', 'Neurology', 'I want to Book Appointemnt ', 'Appointment', '2020-11-22'),
(15, 'Rajesh', 'rayeesinfotech@gmail.com', 9554540261, 1, 'Dr.Rayees Khan', '2020-11-', '18:49', 'Fever', 'Neurology', '', 'Appointment', '2020-11-22'),
(16, 'Rajesh', 'rayeesinfotech@gmail.com', 9554540261, 1, 'Dr.Rayees Khan', '2020-11-23', '16:57', 'Fever', 'Neurology', '', 'Active', '2020-11-23'),
(17, 'Rajesh', 'rayeesinfotech@gmail.com', 9554540261, 1, 'Dr.Rayees Khan', '2020-11-23', '03:58', 'Fever', 'Cardiology', '', 'Active', '2020-11-23'),
(18, 'Rajesh', 'rayeesinfotech@gmail.com', 9554540261, 1, 'Dr.Rayees Khan', '2020-11-24', '14:57', 'Fever', 'Neurology', '', 'Active', '2020-11-23'),
(19, 'Numair', 'numair@gmail.com', 987663636, 1, 'Dr.Rayees Khan', '1989-10-08', '05:08', 'Fever', 'Neurology', 'I wnat to appointment', 'Active', '2020-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `buy_donor_blood`
--

CREATE TABLE `buy_donor_blood` (
  `id` int(11) NOT NULL,
  `blood_donor_id` bigint(20) NOT NULL,
  `blood_unit` varchar(255) NOT NULL,
  `blood_price` varchar(255) NOT NULL,
  `selling_price` bigint(20) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy_donor_blood`
--

INSERT INTO `buy_donor_blood` (`id`, `blood_donor_id`, `blood_unit`, `blood_price`, `selling_price`, `blood_group`, `status`, `created_at`) VALUES
(2, 4, '3 Unit', '5500', 7500, 'AB+', 'Active', '2020-11-29 10:36:30'),
(3, 3, '2', '5500', 0, 'B+', 'Active', '2020-11-29 10:36:42'),
(4, 2, '1 Unit', '3000', 5000, 'A-', 'Active', '2020-11-29 10:36:56'),
(5, 6, '2 Unit', '6500', 12000, 'AB-', 'Active', '2020-11-29 10:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `rate` bigint(20) NOT NULL,
  `stock` bigint(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `subject`, `email`, `mobile`, `message`, `status`, `created_at`) VALUES
(1, 'Numair', 'I Have Fever How to Solve your issue', 'numair@gmail.com', 987663636, 'Sir I have to Fever How to solve that issu', 'Active', '2020-11-25'),
(2, 'Numair', 'I Have Fever How to Solve your issue', 'numair@gmail.com', 987663636, 'I Have Fever How to Solve your issue', 'Active', '2020-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `dep_desc` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `dep_desc`, `status`, `created_at`) VALUES
(1, 'Cardiology', 'Cardiology department', 'Active', '2020-11-21'),
(2, 'Neurology', 'Neurology Department ', 'Active', '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `doctor_phone` bigint(20) NOT NULL,
  `doctor_address` varchar(255) NOT NULL,
  `doctor_email` varchar(255) NOT NULL,
  `doctor_specility` varchar(255) NOT NULL,
  `doctor_other_info` varchar(255) NOT NULL,
  `doctor_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `uid`, `doctor_name`, `department_name`, `doctor_phone`, `doctor_address`, `doctor_email`, `doctor_specility`, `doctor_other_info`, `doctor_image`, `created_at`, `status`, `updated_at`) VALUES
(1, 'f7699d375dade1dae0db057323cf8775', 'Dr.Rayees Khan', 'Neurology', 9554540271, 'Lucknow', 'rayeesinfotech@gmail.com', 'Neuro Sergion', 'You may call them simply doctors. But most doctors have extra expertise', '1605543337_2b8c1ca541300c8ca172.jpg', '2020-11-16 10:15:37', 'Active', '2020-11-21 12:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_fee`
--

CREATE TABLE `doctor_fee` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_fee` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_fee`
--

INSERT INTO `doctor_fee` (`id`, `doctor_name`, `doctor_fee`, `status`, `created_at`) VALUES
(1, 'Dr.Rayees Khan', '500', 'Active', '2020-11-16 10:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `doc_req_email`
--

CREATE TABLE `doc_req_email` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_phone` bigint(20) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_req_email`
--

INSERT INTO `doc_req_email` (`id`, `doctor_name`, `doctor_phone`, `doctor_email`, `status`, `created_at`) VALUES
(1, 'Dr.Mukesh Srivastava', 9554540271, 'softwaredevelopmentteam063@gmail.com', 'Active', '2020-11-16 12:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `donor_blood_sale`
--

CREATE TABLE `donor_blood_sale` (
  `id` int(11) NOT NULL,
  `blood_id` bigint(20) NOT NULL,
  `blood_price` bigint(20) NOT NULL,
  `blood_unit` varchar(100) NOT NULL,
  `blood_group_sale` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_blood_sale`
--

INSERT INTO `donor_blood_sale` (`id`, `blood_id`, `blood_price`, `blood_unit`, `blood_group_sale`, `username`, `mobile`, `address`, `email`, `uid`, `photo`, `status`, `created_at`) VALUES
(1, 2, 0, '', '', 'Nekhil', 9843704984, 'Lucknow', 'nikhil@gmail.com', '7985600eba1111fe2a4757a208c6aec4', '1606759421_947ffa305f3773d797b7.jpg', 'Active', '2020-11-30 12:03:41'),
(2, 2, 7500, '3', 'AB+', 'Nekhil', 987654321, 'Lucknow', 'nikhil@gmail.com', '0eb87162f5c2d215154bba38c497586e', '1606759801_d7027fa61f0f3be5dc1e.jpg', 'Active', '2020-11-30 12:10:01'),
(3, 2, 7500, '3', 'AB+', 'Ravi', 928727827, 'LUCKNOW', 'ravi@gmail.com', '4d506fcd93506357fa667611acd03670', '1606761653_f36dc756749ea5bdff24.jpg', 'Active', '2020-11-30 12:40:53'),
(4, 5, 12000, '2', 'AB-', 'Nauman', 1234567890, 'India Balrampur', 'nauman@gmail.com', '87429a2adc0442da0c6901116497860b', '1606761815_a53077e96a446647bd61.jpg', 'Active', '2020-11-30 12:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `gallary_image`
--

CREATE TABLE `gallary_image` (
  `id` int(11) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `gallary_image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallary_image`
--

INSERT INTO `gallary_image` (`id`, `image_title`, `gallary_image`, `status`, `created_at`) VALUES
(1, 'Divine hospital and medicare gallary', '1606061012_139a262ef45d8cec25f0.jpg', 'Active', '2020-11-22'),
(2, 'Divine hospital and medicare gallary', '1606061013_b999d0c4ba306daaa6cb.jpg', 'Active', '2020-11-22'),
(3, 'Divine hospital and medicare gallary', '1606061013_70cd4e1dee4953ef77e0.png', 'Active', '2020-11-22'),
(5, 'Divine hospital and medicare gallary', '1606061013_f826fcc77a91ea14d477.jpg', 'Active', '2020-11-22'),
(6, 'Divine hospital and medicare gallary', '1606061013_ed35f9a257c8fc24b0a9.jpg', 'Active', '2020-11-22'),
(7, 'Divine hospital and medicare gallary', '1606061013_2c6681ddebdf59f80e6c.jpg', 'Active', '2020-11-22'),
(8, 'Divine hospital and medicare ', '1606066051_84edc2e1fa6437ed0b7a.jpg', 'Active', '2020-11-22'),
(9, 'Divine hospital and medicare ', '1606066051_990cd8559258ea4ff6f8.jpg', 'Active', '2020-11-22'),
(10, 'Divine hospital and medicare ', '1606066051_198acdffce599ca53de3.jpg', 'Active', '2020-11-22'),
(11, 'Divine hospital and medicare ', '1606066051_a22d35d506e520c62a21.jpg', 'Active', '2020-11-22'),
(12, 'Divine hospital and medicare ', '1606066051_f5718e463f117b186d3b.jpg', 'Active', '2020-11-22'),
(13, 'Divine hospital and medicare ', '1606066051_888196558348c7ce519e.jpg', 'Active', '2020-11-22'),
(14, 'Divine hospital and medicare ', '1606066051_406ada4e6d4477988417.jpg', 'Active', '2020-11-22'),
(15, 'Divine hospital and medicare ', '1606066051_71be9dcf6a2e36511363.jpg', 'Active', '2020-11-22'),
(16, 'Divine hospital and medicare ', '1606066051_417ab4a4730445eaa48f.jpg', 'Active', '2020-11-22'),
(17, 'Divine hospital and medicare ', '1606066051_54230ff2684847fe99ec.jpg', 'Active', '2020-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_blood_sale`
--

CREATE TABLE `hospital_blood_sale` (
  `id` int(11) NOT NULL,
  `blood_id` bigint(20) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `blood_price` bigint(20) NOT NULL,
  `blood_unit` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_blood_sale`
--

INSERT INTO `hospital_blood_sale` (`id`, `blood_id`, `blood_group`, `blood_price`, `blood_unit`, `username`, `mobile`, `address`, `email`, `uid`, `photo`, `status`, `created_at`) VALUES
(1, 1, 'A+', 3200, '2 Unit', 'Naveen', 987654321, 'Barampur', 'naveen@gmail.com', '5e1fde1e08087716b01bc00e7ee87076', '1606833048_b431073127f0978960b6.jpg', 'Active', '2020-12-01 08:30:48'),
(2, 5, 'AB+', 2500, '3 Unit', 'Rvinder', 9877672662, 'Lucknow', 'ravinder@gmail.com', '97c5a3d6e9f5788da8b60f359592e7e8', '1606833727_3894d942c1b8f2a49bd2.jpg', 'Active', '2020-12-01 08:42:07'),
(3, 4, 'B-', 2500, '2 Unit', 'Shaziya khan', 992982828, 'Lucknow India', 'shaziya@gmail.com', '6b66dc2da0c337601c732a60a8dcade5', '1606840478_490a4079cae459cd81b3.jpg', 'Active', '2020-12-01 10:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `id` int(11) NOT NULL,
  `uniid` varchar(255) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `login_date` varchar(50) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`id`, `uniid`, `browser`, `ip`, `level`, `login_date`, `login_time`, `logout_time`) VALUES
(1, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-11-25', '2020-11-25 07:29:21', '2020-11-25 07:29:47'),
(2, 'bd07f95f3ada828f961a8d16d317dd0d', 'Chrome', '::1', 2, '2020-11-25', '2020-11-25 07:35:10', '2020-11-25 07:35:24'),
(3, 'a14311f84129b2451457cc16792a7ae2', 'Chrome', '::1', 3, '2020-11-25', '2020-11-25 07:35:49', '2020-11-25 07:36:03'),
(4, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-11-25', '2020-11-25 07:36:26', '2020-11-25 07:59:51'),
(5, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-11-25', '2020-11-25 11:12:43', '2020-11-25 11:34:03'),
(6, 'a14311f84129b2451457cc16792a7ae2', 'Chrome', '::1', 3, '2020-11-25', '2020-11-25 11:34:34', '2020-11-25 12:37:30'),
(7, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-11-25', '2020-11-25 12:37:45', '0000-00-00 00:00:00'),
(8, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-11-26', '2020-11-26 07:54:43', '0000-00-00 00:00:00'),
(9, 'f92a762e82182360322dfa664c553f48', 'Chrome', '::1', 0, '2020-11-26', '2020-11-26 11:32:27', '0000-00-00 00:00:00'),
(10, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-11-28', '2020-11-28 12:35:37', '0000-00-00 00:00:00'),
(11, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-28', '2020-11-28 02:12:21', '0000-00-00 00:00:00'),
(12, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-28', '2020-11-28 06:00:34', '2020-11-28 06:42:14'),
(13, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-28', '2020-11-28 06:46:46', '2020-11-28 06:47:19'),
(14, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-28', '2020-11-28 06:50:23', '2020-11-28 06:52:12'),
(15, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-11-28', '2020-11-28 07:14:41', '2020-11-28 07:27:58'),
(16, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-11-28', '2020-11-28 12:33:10', '0000-00-00 00:00:00'),
(17, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-11-28', '2020-11-28 11:49:56', '2020-11-28 11:54:15'),
(18, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-11-29', '2020-11-29 12:04:03', '2020-11-29 12:04:59'),
(19, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-11-29', '2020-11-29 12:06:21', '0000-00-00 00:00:00'),
(20, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-11-29', '2020-11-29 01:09:29', '2020-11-29 01:28:21'),
(21, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-11-29', '2020-11-29 01:28:42', '2020-11-29 01:29:06'),
(22, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-29', '2020-11-29 01:29:50', '0000-00-00 00:00:00'),
(23, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-11-29', '2020-11-29 05:44:48', '2020-11-29 05:55:08'),
(24, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-29', '2020-11-29 05:55:31', '0000-00-00 00:00:00'),
(25, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-29', '2020-11-29 09:05:42', '0000-00-00 00:00:00'),
(26, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-30', '2020-11-30 09:52:11', '0000-00-00 00:00:00'),
(27, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-11-30', '2020-11-30 10:44:44', '0000-00-00 00:00:00'),
(28, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-12-01', '2020-12-01 07:24:37', '2020-12-01 11:08:10'),
(29, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-12-01', '2020-12-01 11:08:50', '2020-12-01 11:51:58'),
(30, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Chrome', '::1', 4, '2020-12-02', '2020-12-02 06:52:17', '2020-12-02 07:45:59'),
(31, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-12-02', '2020-12-02 07:46:40', '2020-12-02 07:48:20'),
(32, '820ed46ba0a51bbb02adb74ece6d803d', 'Chrome', '::1', 0, '2020-12-02', '2020-12-02 07:49:05', '2020-12-02 07:49:09'),
(33, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-12-02', '2020-12-02 07:53:30', '2020-12-02 07:56:39'),
(34, 'd3eb9a9233e52948740d7eb8c3062d14', 'Chrome', '::1', 1, '2020-12-02', '2020-12-02 09:38:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mediciens`
--

CREATE TABLE `mediciens` (
  `id` int(11) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `med_company` varchar(255) NOT NULL,
  `med_price` varchar(100) NOT NULL,
  `med_d_price` varchar(100) NOT NULL,
  `med_stock` bigint(20) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `batch_number` varchar(255) NOT NULL,
  `med_image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mediciens`
--

INSERT INTO `mediciens` (`id`, `med_name`, `med_company`, `med_price`, `med_d_price`, `med_stock`, `expiry_date`, `batch_number`, `med_image`, `status`, `created_at`) VALUES
(1, 'Lyrica 200', '10', '55', '10', 2000, '2020-11-27', '575352375323', '1603988675_9749ae495cdeedbf5f70.jpg', 'Active', '2020-11-10 07:36:29'),
(3, 'Mankind ', '8', '120', '40', 1000, '2021-06-06', '575358383', '1603988825_4e9ef9a649c46ba90661.jpg', 'Active', '2020-11-06 07:13:04'),
(4, 'Januvia 500', '8', '180', '70', 12000, '2022-01-06', '684736874764', '1603988918_082e7824692c6b82ddaa.jpg', 'Active', '2020-11-06 07:14:09'),
(5, 'Ciplax Tz', '8', '120', '20', 40, '2021-06-03', '1112223333444', '', 'Active', '2020-11-03 08:18:04'),
(6, 'Boroline', '8', '30', '5', 500, '2021-10-28', '32132333444', '', 'Active', '2020-11-03 09:08:03'),
(7, 'Moxikind CV 625', '8', '158', '10', 50, '2020-11-06', '32132447498', '', 'Active', '2020-11-03 10:00:12'),
(9, 'Alovera', '14', '30', '10', 500, '2020-11-20', '81782783788739', '', 'Active', '2020-11-17 07:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `mediciens_category`
--

CREATE TABLE `mediciens_category` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `company_c_num` bigint(20) NOT NULL,
  `com_address` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mediciens_category`
--

INSERT INTO `mediciens_category` (`id`, `company_name`, `category_image`, `company_c_num`, `com_address`, `status`, `created_at`) VALUES
(1, 'Cipla Products', '1603814223_3d46fca28c3e5f5fa943.jpg', 0, '', 'Active', '2020-10-27 10:57:03'),
(8, 'Cipla', 'Accountent Not Uploaded Image', 9545678922, 'Kolkata India', 'Active', '2020-11-03 05:30:25'),
(10, 'Lifeforma', 'Accountent Not Uploaded Image', 9545678007, 'Banglore India', 'Active', '2020-11-06 06:36:19'),
(12, 'Mankind Pharma', '', 7808709823, 'Kolkata India', 'Active', '2020-11-06 07:49:23'),
(13, 'Generic', '', 7984329822, 'Hyderabad India', 'Active', '2020-11-10 07:39:08'),
(14, 'Alovera', '', 987654444, '', 'Active', '2020-11-17 07:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `most_viewed_blog`
--

CREATE TABLE `most_viewed_blog` (
  `id` int(11) NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `blog_time` datetime NOT NULL,
  `vist_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `most_viewed_blog`
--

INSERT INTO `most_viewed_blog` (`id`, `blog_id`, `browser`, `ip`, `blog_time`, `vist_date`) VALUES
(1, 4, 'Chrome', '::1', '2020-11-23 10:46:49', ''),
(18, 2, 'Chrome', '::1', '2020-11-23 11:00:20', '2020-11-23'),
(21, 5, 'Chrome', '::1', '2020-11-23 11:13:51', '2020-11-23'),
(22, 0, 'Chrome', '::1', '2020-11-23 11:13:52', '2020-11-23'),
(23, 0, 'Chrome', '::1', '2020-11-23 11:13:52', '2020-11-23'),
(24, 5, 'Chrome', '::1', '2020-11-23 11:14:53', '2020-11-23'),
(25, 5, 'Chrome', '::1', '2020-11-23 11:15:18', '2020-11-23'),
(26, 5, 'Chrome', '::1', '2020-11-23 11:17:22', '2020-11-23'),
(27, 5, 'Chrome', '::1', '2020-11-23 11:18:20', '2020-11-23'),
(28, 4, 'Chrome', '::1', '2020-11-23 11:18:52', '2020-11-23'),
(29, 3, 'Chrome', '::1', '2020-11-23 11:19:09', '2020-11-23'),
(30, 2, 'Chrome', '::1', '2020-11-23 11:19:15', '2020-11-23'),
(31, 2, 'Chrome', '::1', '2020-11-23 11:19:25', '2020-11-23'),
(32, 3, 'Chrome', '::1', '2020-11-23 11:28:38', '2020-11-23'),
(33, 2, 'Chrome', '::1', '2020-11-23 11:28:44', '2020-11-23'),
(34, 5, 'Chrome', '::1', '2020-11-24 09:22:24', '2020-11-24'),
(35, 3, 'Chrome', '::1', '2020-11-24 09:23:05', '2020-11-24'),
(36, 3, 'Chrome', '::1', '2020-11-24 09:23:20', '2020-11-24'),
(37, 5, 'Chrome', '::1', '2020-11-25 08:00:15', '2020-11-25'),
(38, 3, 'Chrome', '::1', '2020-11-25 12:34:56', '2020-11-25'),
(39, 4, 'Chrome', '::1', '2020-11-25 12:35:02', '2020-11-25'),
(40, 4, 'Chrome', '::1', '2020-11-26 07:52:54', '2020-11-26'),
(41, 3, 'Chrome', '::1', '2020-11-26 09:58:55', '2020-11-26'),
(42, 3, 'Chrome', '::1', '2020-11-26 10:00:19', '2020-11-26'),
(43, 3, 'Chrome', '::1', '2020-11-26 10:00:27', '2020-11-26'),
(44, 4, 'Chrome', '::1', '2020-11-28 11:17:28', '2020-11-28'),
(45, 5, 'Chrome', '::1', '2020-11-28 11:17:32', '2020-11-28'),
(46, 4, 'Chrome', '::1', '2020-12-02 10:11:45', '2020-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `news_blog`
--

CREATE TABLE `news_blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_content` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `doctor_specility` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_month` varchar(50) NOT NULL,
  `created_year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_blog`
--

INSERT INTO `news_blog` (`id`, `blog_title`, `blog_content`, `blog_image`, `doctor_id`, `doctor_name`, `department_name`, `doctor_specility`, `status`, `created_date`, `created_month`, `created_year`) VALUES
(2, 'Latest Trend Of Medical Dental Department', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.', '1606132856_08105f209f0de69c2ddc.jpg', 1, 'Dr.Rayees Khan', 'Neurology', 'Neuro Sergion', 'Publish', '23', 'Nov', '2020'),
(3, 'Latest Trend Of Medical Dental Department', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.', '1606132896_6e4944cdb4d016eda3c3.jpg', 1, 'Dr.Rayees Khan', 'Neurology', 'Neuro Sergion', 'Publish', '23', 'Nov', '2020'),
(4, 'Latest Trend Of Medical Dental Department', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.', '1606132914_7666e1b95aa2dc98bdc2.jpg', 1, 'Dr.Rayees Khan', 'Neurology', 'Neuro Sergion', 'Publish', '23', 'Nov', '2020'),
(5, 'Latest Trend Of Medical Dental Department', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.', '1606133066_0e0cfcd770d5538b212a.jpg', 1, 'Dr.Rayees Khan', 'Neurology', 'Neuro Sergion', 'Publish', '23', 'Nov', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_add` varchar(150) NOT NULL,
  `total_quantity` bigint(20) NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `customer_id`, `customer_name`, `customer_add`, `total_quantity`, `total_amount`, `order_date`) VALUES
(1, 1, 'Kurnal', 'Lucknow', 7, 840, '2020-11-16'),
(2, 2, 'Kurnal', 'Lucknow', 7, 840, '2020-11-16'),
(3, 3, 'Numair', 'Tulsipur', 12, 950, '2020-11-17'),
(4, 4, 'Numair', 'Tulsipur', 4, 480, '2020-11-17'),
(5, 7, 'Zuber', 'Lucknow', 10, 1070, '2020-11-19'),
(6, 8, 'Aayan', 'Lucknow', 6, 720, '2020-11-19'),
(7, 9, 'Zuber', 'Lucknow', 4, 480, '2020-11-19'),
(8, 10, 'Zuber', 'Lucknow', 2, 240, '2020-11-19'),
(9, 11, 'Aayan', 'Lucknow', 3, 360, '2020-11-19'),
(10, 12, 'Aayan', 'Lucknow', 9, 630, '2020-11-19'),
(11, 13, 'Aayan', 'Lucknow', 3, 360, '2020-11-19'),
(12, 14, 'Zuber', 'Lucknow', 3, 360, '2020-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `id` int(11) NOT NULL,
  `patent_name` varchar(255) NOT NULL,
  `patent_phone` bigint(20) NOT NULL,
  `patent_address` varchar(255) NOT NULL,
  `patent_zip` varchar(100) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_fee` varchar(100) NOT NULL,
  `intry_fee` bigint(20) NOT NULL,
  `patent_issue` varchar(150) NOT NULL,
  `other_fee` bigint(20) NOT NULL,
  `patent_room` varchar(100) NOT NULL,
  `patent_email` varchar(50) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `patent_image` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `deleted_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`id`, `patent_name`, `patent_phone`, `patent_address`, `patent_zip`, `doctor_name`, `doctor_fee`, `intry_fee`, `patent_issue`, `other_fee`, `patent_room`, `patent_email`, `uid`, `patent_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kuranal', 7890009210, 'Tulsipur', '150008', '1', '500', 10, 'Lose Motion', 0, '02', 'krayees282@gmail.com', 'da7af9c4909a80ad8ec6987cd29e10c5', '1605543578_4e825c1e885c3575b1c6.jpg', 'Active', '2020-11-20', '', ''),
(2, 'Zuber Khan', 987643333, 'Basti', '271208', '1', '500', 10, 'Lose motion', 0, '01', 'zuber@gmail.com', '1381da8f0f9a59fe184a59eea429f5ec', '1605792019_60b829532a3e53d17ac0.jpg', 'Active', '2020-11-20', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patents_discharge`
--

CREATE TABLE `patents_discharge` (
  `id` int(11) NOT NULL,
  `pateints_id` int(11) NOT NULL,
  `room_charge` bigint(20) NOT NULL,
  `doc_fee` bigint(20) NOT NULL,
  `med_cost` bigint(20) NOT NULL,
  `other_cost` bigint(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `discharge_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patents_discharge`
--

INSERT INTO `patents_discharge` (`id`, `pateints_id`, `room_charge`, `doc_fee`, `med_cost`, `other_cost`, `status`, `discharge_date`) VALUES
(1, 1, 500, 400, 350, 100, 'Discharge', '2020-11-16'),
(2, 1, 0, 500, 1500, 0, 'Discharge', '2020-11-18'),
(3, 1, 0, 500, 1500, 0, 'Discharge', '2020-11-18'),
(4, 1, 0, 500, 1500, 0, 'Discharge', '2020-11-18'),
(5, 2, 0, 500, 1200, 0, 'Discharge', '2020-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `patients_login`
--

CREATE TABLE `patients_login` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients_login`
--

INSERT INTO `patients_login` (`id`, `uid`, `username`, `email`, `password`, `mobile`, `level`, `status`, `created_date`, `updated_at`) VALUES
(1, 'b9d759eb694dda944053d31c6e876774', 'Kurnale', 'krayees282@gmail.com', '$2y$10$06U1u5G6.Qq/SaoPu7W3x.voadc3ka5oWxmf60tn68YYlaXwo1hQi', 976543211, 4, 'Active', '2020-11-16 10:40:04', '2020-11-20 11:57:43'),
(2, 'b9d759eb694dda944053d31c6e89333', 'Patients', 'patients@gmail.com', '$2y$10$1HSAPxzomq02TsIM0gQ2g.FVl164Uk1ElazcWgQB.hEMKl9p8TULm', 976543211, 4, 'Active', '2020-11-16 10:40:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `uid`, `username`, `password`, `image`, `email`, `level`, `status`) VALUES
(1, 'd3eb9a9233e52948740d7eb8c3062d14', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 'admin@gmail.com', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `register_all_users`
--

CREATE TABLE `register_all_users` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_all_users`
--

INSERT INTO `register_all_users` (`id`, `uid`, `username`, `email`, `gender`, `password`, `mobile`, `level`, `status`, `created_date`, `updated_at`) VALUES
(1, 'a14311f84129b2451457cc16792a7ae2', 'Dr.Rayees Khan', 'rayeesinfotech@gmail.com', 'Male', '$2y$10$Zcx8vkBkwJneZlhhAPP6meN4KeVmdnkTtlBl7r5kryHCMgybtLFUS', 9554540271, 3, 'Active', '2020-11-16 10:18:00', ''),
(2, 'bd07f95f3ada828f961a8d16d317dd0d', 'Accountent', 'krayees282@gmail.com', 'Male', '$2y$10$7oeBYnsIfwQxEs1sAg4ffuKwv3Icj6NNSlh0KepLYvMN6mLxp.eXe', 7800097211, 2, 'Active', '2020-11-16 10:20:51', '2020-12-02 10:05:13'),
(3, '8fc948d59ec5c91b7570c358ba47abd2', 'Dr.Mukesh Srivastava', 'softwaredevelopmentteam063@gmail.com', 'Male', '$2y$10$uJOneKvjTEjJSmVozIdYy.y2RzZkNs40vh3sRMEdquZxLvuH3TnMm', 987654322, 3, 'AdminVerification', '2020-11-16 11:11:55', '2020-11-16 11:16:02'),
(4, 'f3dbb1d862e311ec982e027e0ba0c6c2', 'Blood Bank', 'bloodbank@gmail.com', 'Male', '$2y$10$C57KVON5lzKcMA04rDs8XOyVH0QRl7rsfLD7LrIBufQOSmyzj5DZC', 1234565674, 4, 'Active', '2020-11-28 12:55:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `review_hospital`
--

CREATE TABLE `review_hospital` (
  `id` int(11) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review_content` varchar(255) NOT NULL,
  `review_image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_hospital`
--

INSERT INTO `review_hospital` (`id`, `review_title`, `review_content`, `review_image`, `status`, `created_at`) VALUES
(1, 'That hospital have good Service!', 'That hospital have good Service of all  staff is professional and well knowledge minimum fee pay', '1606240631_ba47d9b0d728c6b77eb3.png', 'Verify', '2020-11-24'),
(3, 'That hospital have good Service!', 'That hospital have good Service of all  staff is professional and well knowledge minimum fee pay', '1606240704_98e1861e50183398fef3.png', 'Verify', '2020-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `revisit_patients`
--

CREATE TABLE `revisit_patients` (
  `id` int(11) NOT NULL,
  `patent_name` varchar(100) NOT NULL,
  `patient_id` bigint(20) NOT NULL,
  `patent_phone` bigint(20) NOT NULL,
  `patent_address` varchar(100) NOT NULL,
  `patent_zip` varchar(50) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_fee` bigint(20) NOT NULL,
  `intry_fee` varchar(50) NOT NULL,
  `patent_issue` varchar(50) NOT NULL,
  `other_fee` bigint(20) NOT NULL,
  `patent_room` varchar(50) NOT NULL,
  `patent_email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revisit_patients`
--

INSERT INTO `revisit_patients` (`id`, `patent_name`, `patient_id`, `patent_phone`, `patent_address`, `patent_zip`, `doctor_name`, `doctor_fee`, `intry_fee`, `patent_issue`, `other_fee`, `patent_room`, `patent_email`, `status`, `created_at`) VALUES
(1, 'Kuranal', 1, 7890009210, 'Tulsipur', '150008', '1', 0, '50', 'Fever typhid', 10, '03', 'krayees282@gmail.com', 'Revist', '2020-11-19'),
(2, 'Kuranal', 1, 7890009210, 'Tulsipur', '150008', '1', 0, '30', 'Lose Motion', 10, '03', 'krayees282@gmail.com', 'Revist', '2020-11-19'),
(3, 'Kuranal', 1, 7890009210, 'Tulsipur', '150008', '1', 0, '10', 'Lose Motion', 0, '02', 'krayees282@gmail.com', 'Revist', '2020-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `sale_cus_record`
--

CREATE TABLE `sale_cus_record` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_add` varchar(255) NOT NULL,
  `cus_mobile` bigint(20) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_cus_record`
--

INSERT INTO `sale_cus_record` (`id`, `customer_name`, `customer_add`, `cus_mobile`, `doctor_name`, `date`) VALUES
(5, 'Aarif', 'Tulsipur', 99292929229, 'Dr.Ravi', '2020-11-17'),
(6, 'ghhjhj', '', 0, '', '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_add` varchar(100) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `rate` bigint(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`id`, `customer_id`, `customer_name`, `customer_add`, `product_id`, `product_name`, `quantity`, `order_id`, `rate`, `date`) VALUES
(1, '10', 'Zuber', 'Lucknow', 3, 'Mankind ', 2, 8, 120, '2020-11-19'),
(2, '11', 'Aayan', 'Lucknow', 3, 'Mankind ', 3, 9, 120, '2020-11-19'),
(3, '12', 'Aayan', 'Lucknow', 3, 'Mankind ', 4, 10, 120, '2020-11-19'),
(4, '12', 'Aayan', 'Lucknow', 6, 'Boroline', 5, 10, 30, '2020-11-19'),
(5, '13', 'Aayan', 'Lucknow', 3, 'Mankind ', 3, 11, 120, '2020-11-19'),
(6, '14', 'Zuber', 'Lucknow', 5, 'Ciplax Tz', 3, 12, 120, '2020-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `slider_image`
--

CREATE TABLE `slider_image` (
  `id` int(11) NOT NULL,
  `image_title` varchar(100) NOT NULL,
  `website_link` varchar(255) NOT NULL,
  `image_discription` varchar(255) NOT NULL,
  `image_gallery` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_image`
--

INSERT INTO `slider_image` (`id`, `image_title`, `website_link`, `image_discription`, `image_gallery`, `status`, `created_at`) VALUES
(1, 'Nobel Heart Super Speciality Hospital Experiment Quality Care', 'https:khanrayees.000webhostapp.com', 'Nobel Heart Super Speciality Hospital Experiment Quality Care Hospital						\r\n					', '1606048398_3d5026bd0d5965436597.jpg', 'Active', '2020-11-22'),
(3, 'Nobel Heart Super Speciality Hospital Experiment Quality Care', 'https:khanrayees.000webhostapp.com', 'Nobel Heart Super Speciality Hospital Experiment Quality Care						\r\n					', '1606048485_c76eed9634da3d14e826.jpg', 'Active', '2020-11-22'),
(4, 'Nobel Heart Super Speciality Hospital Experiment Quality Care', 'https:khanrayees.000webhostapp.com', 'Nobel Heart Super Speciality Hospital Experiment Quality Care						\r\n					', '1606048502_fffc464ac9b9d15dc710.jpg', 'Active', '2020-11-22'),
(5, 'Nobel Heart Super Speciality Hospital Experiment Quality Care', 'https:khanrayees.000webhostapp.com', 'Nobel Heart Super Speciality Hospital Experiment Quality Care						\r\n					', '1606048528_cf0458ffb3d39e741b5f.jpg', 'Active', '2020-11-22'),
(6, 'Nobel Heart Super Speciality Hospital Experiment Quality Care', 'https:khanrayees.000webhostapp.com', 'Nobel Heart Super Speciality Hospital Experiment Quality Care						\r\n					', '1606048557_092f6acf2cb3d7da7365.jpg', 'Active', '2020-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `social_login`
--

CREATE TABLE `social_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `oauth_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_login`
--

INSERT INTO `social_login` (`id`, `first_name`, `last_name`, `email`, `profile_pic`, `oauth_id`) VALUES
(1, 'Rayees', 'Khan', 'rayeesinfotech@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgmfeyREosRGUZJB-KwiKkQRX9S4owOzhSzsTee=s96-c', '118042259033201699023'),
(2, 'Rayees', 'Khan', 'krayees282@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14Gj3Uq8Kok6XsfX6IlHFpPzsJQAM5PtiNLXrTU5_6w=s96-c', '103761863554280909890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_bank_users`
--
ALTER TABLE `blood_bank_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_requested_user`
--
ALTER TABLE `blood_requested_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_request_google_user`
--
ALTER TABLE `blood_request_google_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_doctor`
--
ALTER TABLE `booked_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_donor_blood`
--
ALTER TABLE `buy_donor_blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_fee`
--
ALTER TABLE `doctor_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_req_email`
--
ALTER TABLE `doc_req_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_blood_sale`
--
ALTER TABLE `donor_blood_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary_image`
--
ALTER TABLE `gallary_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_blood_sale`
--
ALTER TABLE `hospital_blood_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediciens`
--
ALTER TABLE `mediciens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediciens_category`
--
ALTER TABLE `mediciens_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `most_viewed_blog`
--
ALTER TABLE `most_viewed_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_blog`
--
ALTER TABLE `news_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patents_discharge`
--
ALTER TABLE `patents_discharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients_login`
--
ALTER TABLE `patients_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_all_users`
--
ALTER TABLE `register_all_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_hospital`
--
ALTER TABLE `review_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revisit_patients`
--
ALTER TABLE `revisit_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_cus_record`
--
ALTER TABLE `sale_cus_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_image`
--
ALTER TABLE `slider_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_login`
--
ALTER TABLE `social_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank_users`
--
ALTER TABLE `blood_bank_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_donor`
--
ALTER TABLE `blood_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blood_requested_user`
--
ALTER TABLE `blood_requested_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blood_request_google_user`
--
ALTER TABLE `blood_request_google_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booked_doctor`
--
ALTER TABLE `booked_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `buy_donor_blood`
--
ALTER TABLE `buy_donor_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_fee`
--
ALTER TABLE `doctor_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doc_req_email`
--
ALTER TABLE `doc_req_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor_blood_sale`
--
ALTER TABLE `donor_blood_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallary_image`
--
ALTER TABLE `gallary_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hospital_blood_sale`
--
ALTER TABLE `hospital_blood_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mediciens`
--
ALTER TABLE `mediciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mediciens_category`
--
ALTER TABLE `mediciens_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `most_viewed_blog`
--
ALTER TABLE `most_viewed_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `news_blog`
--
ALTER TABLE `news_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patents`
--
ALTER TABLE `patents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patents_discharge`
--
ALTER TABLE `patents_discharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients_login`
--
ALTER TABLE `patients_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register_all_users`
--
ALTER TABLE `register_all_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review_hospital`
--
ALTER TABLE `review_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `revisit_patients`
--
ALTER TABLE `revisit_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_cus_record`
--
ALTER TABLE `sale_cus_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider_image`
--
ALTER TABLE `slider_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_login`
--
ALTER TABLE `social_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
