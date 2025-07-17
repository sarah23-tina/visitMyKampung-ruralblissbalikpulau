-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 10:42 AM
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
-- Database: `pbu_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `content`) VALUES
(1, 'Balik Pulau, located on the southwestern side of Penang Island, is a serene town known for its lush greenery, rich cultural heritage, and traditional village lifestyle. Unlike the bustling streets of George Town, Balik Pulau offers a peaceful retreat where visitors can experience nature, local traditions, and authentic Malaysian hospitality. The name Balik Pulau translates to \"back of the island,\" highlighting its location away from the city’s commercial areas.\r\n\r\nOne of the town’s biggest attractions is its breathtaking landscape, featuring rolling hills, paddy fields, and fruit orchards. Balik Pulau is particularly famous for its Musang King durians, considered among the best in Malaysia. Other tropical fruits like nutmeg, mangosteens, and rambutans thrive in its fertile lands. The town is also a haven for food lovers, offering specialties like asam laksa, a tangy fish-based noodle soup, and fresh seafood from its nearby fishing villages.\r\n\r\nFor adventure seekers, Balik Pulau provides excellent opportunities for cycling tours, where visitors can explore traditional Malay kampungs, farms, and scenic countryside roads. The town is also home to beautiful beaches like Pantai Malindo and Pantai Pasir Panjang, perfect for those looking to relax by the sea. Travelers can engage in agro-tourism activities such as visiting nutmeg farms, learning about batik painting, or even staying in homestays to experience authentic kampung life.\r\n\r\nWith its blend of nature, culture, and gastronomy, Balik Pulau is an ideal destination for those seeking a break from urban life. Whether you’re looking to indulge in local flavors, immerse yourself in heritage, or enjoy scenic beauty, Balik Pulau offers a unique and unforgettable experience in Penang.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$wt49e2SdCuCJa7rYl6gGbOWgiMBMapKxS4DE/fXOjI0g.NEO/hjcW');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `question`, `answer`, `created_at`) VALUES
(1, 'HI', 'HI How Are You\r\n', '2025-04-20 19:53:04'),
(2, 'hi', 'hello', '2025-04-21 21:57:33'),
(3, 'Hi! What is RuralBliss Visit My Kampung about?', 'Hello! 🌾 RuralBliss is a website that promotes village tourism in Balik Pulau. You can explore kampung life, find local homestays, and book your stay directly through our site!', '2025-04-24 09:52:18'),
(4, 'Is registration required to book a homestay?', 'Yes, to book a homestay, you need to sign up and log in. This helps us keep track of your booking and provide better service.', '2025-04-24 09:53:16'),
(5, 'Can I view homestay availability before booking?', 'Of course! , click on Travel Idea then select homestay in the topic. There, you’ll see available dates and homestay details.', '2025-04-24 09:56:41'),
(6, 'How do I book a homestay?', 'Just go to the “Travel Ideas” tab, select homestay in the topic, then select homestay that you want, after that click \"Book Now\" and then fill in your preferred dates, number of guests and others After that click submit. We’ll confirm your booking shortly!', '2025-04-24 10:03:08'),
(7, 'Can I cancel my booking after submission?', 'You can contact us through our support email to request a cancellation. We’ll help you as soon as possible!', '2025-04-24 10:04:01'),
(8, 'Where can I find the map?', 'You can find the map under the \"Map Tab\" section on the Navigation. It shows nearby homestays, local attractions, facilities and others.', '2025-04-24 10:12:05'),
(9, 'I found a bug. How do I report it?', 'Thank you for helping us improve! You can let us know here in the chat, or email our support team directly at visitmykampungruralblissbp@gmail.com', '2025-04-24 10:13:16'),
(10, 'Is this website mobile-friendly?', 'Yes! The website is responsive and works well on both mobile phones and tablets. 🌟', '2025-04-24 10:14:19'),
(11, 'Can I book more than one homestay at the same time?', 'Currently, bookings are limited to one homestay per submission. If you’d like to book multiple, you can fill out the form again after your first booking is confirmed.', '2025-04-24 10:16:21'),
(12, 'Are the homestays suitable for families with children?', 'Yes! Most of our listed homestays are family-friendly and offer peaceful village surroundings perfect for children. You can view the homestay details before booking.\r\n\r\n', '2025-04-24 10:17:50'),
(13, 'What should I bring when staying at a kampung homestay?', 'We recommend bringing personal items, toiletries, and any essentials you may need. Most homestays provide basic facilities, but each listing includes specific amenities.\r\n\r\n', '2025-04-24 10:18:22'),
(14, 'How do I know my booking is confirmed?', 'Once you submit the booking form, you’ll receive a confirmation email or notification in your user dashboard within 24 hours.', '2025-04-24 10:19:17'),
(15, 'Can I suggest new features or improvements for the website?', 'Absolutely! We love feedback. You can drop your suggestions right at vlog tab, and our team will review them.', '2025-04-24 10:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `confirmed_bookings`
--

CREATE TABLE `confirmed_bookings` (
  `id` int(11) NOT NULL,
  `homestay_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `guest_number` int(11) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `special_request` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmed_bookings`
--

INSERT INTO `confirmed_bookings` (`id`, `homestay_name`, `first_name`, `last_name`, `email`, `contact`, `guest_number`, `arrival_date`, `arrival_time`, `departure_date`, `special_request`, `created_at`) VALUES
(1, 'Homestay Dua Villa Balik Pulau', 'sarah', 'justina', 'SARAHJUSTINA1@GMAIL.COM', '0102983732', 6, '2025-04-26', '14:09:00', '2025-04-26', '', '2025-04-25 13:08:25'),
(3, 'Homestay Dua Villa Balik Pulau', 'jeshwini', 'tina', 'SARAHJUSTINA1@GMAIL.COM', '0102983732', 8, '2025-04-29', '14:30:00', '2025-04-30', '', '2025-04-28 06:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE `home_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `audio_path` varchar(255) DEFAULT 'home.mp3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_content`
--

INSERT INTO `home_content` (`id`, `title`, `subtitle`, `description`, `audio_path`) VALUES
(1, 'WELCOME TO', 'VISIT MYKAMPUNG', '@RURAL BLISS BALIK PULAU', 'home.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_bookings`
--

CREATE TABLE `hotel_bookings` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `guest_number` int(11) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `pickup` varchar(10) DEFAULT NULL,
  `special_request` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `homestay_name` varchar(255) DEFAULT NULL,
  `hemail` varchar(200) NOT NULL,
  `action_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_bookings`
--

INSERT INTO `hotel_bookings` (`id`, `first_name`, `last_name`, `email`, `contact`, `guest_number`, `arrival_date`, `arrival_time`, `departure_date`, `pickup`, `special_request`, `created_at`, `homestay_name`, `hemail`, `action_status`) VALUES
(4, 'sarah', 'justina', 'SARAHJUSTINA1@GMAIL.COM', 'Double', 1, '2025-04-23', '13:33:00', '2025-04-24', NULL, '', '2025-04-21 22:34:35', 'Homestay Dua Villa Balik Pulau', '', 'Accepted'),
(5, 'jeshwini', 'elango', 'SARAHJUSTINA1@GMAIL.COM', 'Double', 3, '2002-07-24', '21:05:00', '2025-07-13', NULL, 'thank ypu', '2025-04-21 23:19:51', 'Homestay Dua Villa Balik Pulau', '', 'Rejected'),
(6, 'sarah', 'justina', 'SARAHJUSTINA1@GMAIL.COM', 'Deluxe', 8, '2025-04-24', '20:00:00', '2025-04-26', NULL, 'awesome', '2025-04-22 04:07:49', 'Venn Homestay - Balik Pulau', '', NULL),
(7, 'jeshwini', 'elango', 'SARAHJUSTINA1@GMAIL.COM', 'Double', 1, '2025-04-25', '20:00:00', '2025-06-29', NULL, 'fddffd', '2025-04-22 04:10:23', 'Nature Fruit Farm - Farmstay', '', NULL),
(8, 'jeshwini', 'elango', 'SARAHJUSTINA1@GMAIL.COM', 'Double', 8, '2025-04-24', '13:00:00', '2025-03-26', NULL, 'thank you', '2025-04-22 09:07:51', 'Homestay Dua Villa Balik Pulau', '', 'Accepted'),
(14, 'jeshwini', 'elango', 'SARAHJUSTINA1@GMAIL.COM', '0102983732', 2, '2025-04-29', '14:30:00', '2025-04-30', NULL, 'thank you', '2025-04-28 09:54:06', 'Homestay Dua Villa Balik Pulau', 'visitmykampungruralblissbp@gmail.com', NULL),
(16, 'sarah', 'skdh', 'SARAHJUSTINA1@GMAIL.COM', '0102983732', 5, '2025-04-29', '08:11:00', '2025-04-30', NULL, 'hsdgh', '2025-04-28 10:06:23', 'Homestay Dua Villa Balik Pulau', 'visitmykampungruralblissbp@gmail.com', NULL),
(18, 'gjagj', 'hakjhsj', 'jsjs@gmail.com', '0126598347', 5, '2025-04-30', '21:28:00', '2025-04-23', NULL, 'skj', '2025-04-28 10:24:15', 'Homestay Dua Villa Balik Pulau', 'visitmykampungruralblissbp@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_key` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `password`, `user_key`, `created_at`, `role`) VALUES
(8, 'tina', '$2y$10$vJ75KicP9FVcWyN1/KVwf.0G8hhDamYKNKLYR3qHkZdgNemDKIG9e', NULL, '2025-04-26 09:06:54', 'homestay_owner'),
(9, 'sarah', '$2y$10$Ha1Cm0ppcafWkfIpmPyZNOThqT6gNcTwJCSawDhVy22oGPJTjs1IO', NULL, '2025-04-26 09:54:19', 'admin'),
(10, 'raj', '$2y$10$jUtpUTA5QCIvvh99UxSii.dWcY6hxHh8H5c5r9zXWo2rA4lpu6AMi', NULL, '2025-04-26 11:05:36', 'food'),
(11, 'jeffrey', '$2y$10$aZy/MKtd0ZiXkOQ93IeC8./710OjAvU4oxgBnzLeuXsuQ1P2dJN8e', NULL, '2025-04-26 13:34:52', 'stall_owner'),
(12, 'tang', '$2y$10$clWceWNgdIXWyf41gROwy.zng3zAgHWYmsfdVFilU6VE6luhgfy72', NULL, '2025-04-26 13:48:17', 'animal_park'),
(13, 'ryan', '$2y$10$w3z8z/qhXny5zGakZ6Iy.Ow8FRoVhC2ThdvGiAJVhHq1rCZDw0O2i', NULL, '2025-04-26 14:01:54', 'durian_orchard'),
(14, 'anna', '$2y$10$ZfaTSnCifkie2qA5L.cTWeDkcVxJxt0vHpjjY92MuwO4Ub73TUA3G', NULL, '2025-04-26 14:08:24', 'attraction_place'),
(15, 'edward', '$2y$10$oNe3vZqpTRkTr5FH6wckEOANk.OhEq4Q4wI7vmehGnq6qwwH4pu12', NULL, '2025-04-26 14:24:44', 'nature');

-- --------------------------------------------------------

--
-- Table structure for table `travel_guide`
--

CREATE TABLE `travel_guide` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `video_url` varchar(500) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_guide`
--

INSERT INTO `travel_guide` (`id`, `topic`, `video_url`, `position`) VALUES
(4, 'ATTRACTION PLACE', '', 6),
(7, 'ANIMAL PARK', '', 7),
(16, 'FOOD', '', 1),
(17, 'STALL', '', 2),
(19, 'HOMESTAY', '', 3),
(20, 'DURIAN ORCHARD', '', 4),
(21, 'NATURE', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `travel_guide_video`
--

CREATE TABLE `travel_guide_video` (
  `id` int(11) NOT NULL,
  `travel_guide_id` int(11) NOT NULL,
  `video_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_guide_video`
--

INSERT INTO `travel_guide_video` (`id`, `travel_guide_id`, `video_url`) VALUES
(1, 16, 'https://www.youtube.com/embed/_6av6A4Bhpk'),
(2, 17, 'https://www.youtube.com/embed/od4CyLt3K84'),
(3, 19, 'https://www.youtube.com/embed/Sna6wdqBvMw'),
(4, 20, 'https://www.youtube.com/embed/DoSljm2GUk0'),
(5, 21, 'https://www.youtube.com/embed/ixQfQ0ZHG5s'),
(6, 4, 'https://www.youtube.com/embed/_BrGkLWNOVU'),
(7, 7, 'https://www.youtube.com/embed/x7ozIcaIoHk'),
(9, 16, 'https://www.youtube.com/embed/od4CyLt3K84');

-- --------------------------------------------------------

--
-- Table structure for table `travel_ideas`
--

CREATE TABLE `travel_ideas` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` varchar(500) NOT NULL,
  `book_now_link` varchar(255) NOT NULL,
  `hemail` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_ideas`
--

INSERT INTO `travel_ideas` (`id`, `topic_id`, `image`, `short_description`, `long_description`, `book_now_link`, `hemail`, `created_at`) VALUES
(5, 16, 'uploads/yuXuan.jpg', 'Kim Laksa Balik Pulau', 'Address: Nan guang kopitiam, 67, main road, 11000 Balik Pulau, PulauPinang\\r\\nHours:\\r\\nSunday 10 am–4:30 pm\\r\\nMonday Closed\\r\\nTuesday Closed\\r\\nWednesday 10 am–4:30 pm\\r\\nThursday 10 am–4:30 pm\\r\\nFriday 10 am–4:30 pm\\r\\nSaturday 10 am–4:30 pm\\r\\n                                    \\r\\nPhone: 019-746 8465        ', 'Phone: 010-388 4943?id=5', '', '2025-03-25 07:35:17'),
(6, 16, 'uploads/mycurryTummyKitchen.jpg', 'Mycurry Tummy Kitchen Balik Pulau Restaurant', 'Address: 72, Jln Kuala Jalan Baru, Taman Prestij 3, 11000 Balik Pulau, PulauPinang\\r\\nHours: Open Wednesday 11.00–9 pm\\r\\nSunday 11:00–9 pm\\r\\nMonday Closed\\r\\nTuesday 11:10–9 pm    \\r\\nThursday 11:00–9 pm\\r\\nFriday 11:00–9 pm\\r\\nSaturday 11:00–9 pm            \\r\\n\\r\\nPhone: 018-222 5158                ', 'Phone: 018-222 5158?id=6', '', '2025-03-25 07:35:47'),
(10, 16, 'uploads/yuXuan.jpg', 'Yu Xuan Kopitiam', 'Address: Jalan Kuala Sungai Pinang, Taman Kuala Sungai Pinang, 11010Balik Pulau, Pulau Pinang\\r\\nHours:\\r\\nSunday 12:30–9 pm\\r\\nMonday Closed\\r\\nTuesday 12:30–9 pm\\r\\nWednesday 12:30–9 pm\\r\\nThursday 12:30–9 pm\\r\\nFriday 12:30–9 pm\\r\\nSaturday 12:30–9 pm\\r\\n\\r\\nPhone: 016-489 2703                        ', 'phone: 016-489 2703?id=10', '', '2025-04-09 12:12:47'),
(12, 16, 'uploads/Inacafe.jpg', 'Ina Cafe', 'Address: 50, Jalan Sungai Pinang, Balik Pulau, 11000 Balik Pulau, PulauPinang\\r\\nHours:\\r\\nSunday 7:30 am–4:30 pm\\r\\nMonday 7:30 am–4 pm\\r\\nTuesday 7:30 am–4:30 pm\\r\\nWednesday 7:30 am–4:30 pm\\r\\nThursday Closed\\r\\nFriday 7:30 am–4:30 pm\\r\\nSaturday 7:30 am–4:30 pm\\r\\n\\r\\nPhone: 016-539 3349            ', 'Phone: 016-539 3349?id=12', '', '2025-04-09 13:40:56'),
(13, 16, 'uploads/BestCendolBalikPulau.jpg', 'Best Cendol Balik Pulau', 'Address: P14, 11000 Balik Pulau, Penang\\r\\nHours:\\r\\nSunday 12–5:30 pm\\r\\nMonday 12–5:30 pm\\r\\nTuesday Closed\\r\\nWednesday 12–5:30 pm\\r\\nThursday 12–5:30 pm\\r\\nFriday 12–5:30 pm\\r\\nSaturday 12–5:30 pm\\r\\n\\r\\nPhone: 016-491 7742            ', 'Phone: 013-417 8188?id=13', '', '2025-04-09 13:50:37'),
(14, 19, 'uploads/Homestay Dua Villa Balik Pulau.jpg', 'Homestay Dua Villa Balik Pulau', 'Address: 103, Jalan Sungai Pinang, Balik Pulau, Penang\\r\\n Contact: +60 12-345 6789\\r\\n Price per Day: RM250\\r\\n Owner’s Email: balikpulauvilla@gmail.com\\r\\n Capacity: 8 persons\\r\\n Beds: 2 single, 3 double\\r\\n Bathrooms: 2\\r\\n Bedrooms: 3\\r\\n Google Maps: https://g.co/kgs/sfFCpfU    \\r\\n\\r\\n🏠Amenities:\\r\\nAir-conditioned rooms, Smart TV with Netflix, Kitchen facilities, Dining area, Free Wi-Fi, Private parking​                                                        ', 'http://localhost/PbuTravel/PBU_TRAVEL/homestay_book/book_homestay.php?id=14', 'visitmykampungruralblissbp@gmail.com', '2025-04-09 14:03:19'),
(15, 19, 'uploads/Nature fruit Farm.JPG', 'Nature Fruit Farm - Farmstay', 'Address: 123 Jalan Sungai Burung, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact Number: +60 12-345 6789\\r\\nOwner’s Email: naturefruitfarmstay@gmail.com\\r\\nPrice Per Day: RM 250 per night (including breakfast)\\r\\nAccommodation Details: Maximum Guests: 6 persons\\r\\nBeds:2 Queen-size beds, 2 Single beds\\r\\nBedrooms: 3, Bathrooms: 2 (attached with hot shower)\\r\\nGoogle Map Link: https://maps.app.goo.gl/XBHqgYaaJrJYaGdk9\\r\\n\\r\\nAmenities:\\r\\nComfortable air-conditioned bedrooms, Private bathroom,Com', 'http://localhost/PbuTravel/PBU_TRAVEL/homestay_book/book_homestay.php?id=15', 'visitmykampungruralblissbp@gmail.com', '2025-04-09 14:08:25'),
(16, 19, 'uploads/Paddy View Homestay.jpg', 'Paddy View Homestay', 'Address: Lot 789, Kampung Sungai Pinang, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact Number: +60 13-345 678\\r\\nOwner’s Email: paddyviewhomestay@gmail.com\\r\\nPrice Per Day: RM 250 per night\\r\\nAccommodation Details:\\r\\nMaximum Guests: 6 persons\\r\\n\\r\\nBeds:\\r\\n2 Queen-size beds\\r\\n2 Single beds\\r\\nBedrooms: 3 bedrooms\\r\\nBathrooms: 2 bathrooms (with water heater)\\r\\nGoogle Map Link: https://maps.app.goo.gl/kXBWCiaZbmz5hMhH9\\r\\n\\r\\nAmenities:\\r\\n🌾 Beautiful paddy field views\\r\\n🛏️ Fully air-con', 'http://localhost/PbuTravel/PBU_TRAVEL/homestay_book/book_homestay.php?id=16', 'visitmykampungruralblissbp@gmail.com', '2025-04-09 14:16:57'),
(21, 17, '', 'Gerai Tok Abah', '    Address: Jalan Sungai Nipah (Taman Desa Mutiara), beside the soy drink stall at Simpang Empat, Balik Pulau, 11000 Penang\\r\\n\\r\\nContact: +6013-450 4291\\r\\n\\r\\nOpening Hours: Daily from 2:00 PM to 6:30 PM, closed on Tuesdays and Saturdays\\r\\n\\r\\nSpecialties: Traditional Malay kuih such as Seri Muka, Talam Gula Merah, Koleh Kacang, Bingka Roti, Cucur Badak, Karipap, and fried noodles    ', 'id=21?id=21', '', '2025-04-21 21:00:39'),
(22, 17, '', 'Bahulu Balik Pulau', 'Address: no 3, Ruang Niaga Perda, Jalan Kuala Sungai Pinang, Taman Nelayan, 11000 Balik Pulau, Pulau Pinang\\r\\n\\r\\nOpening Hours: Daily from 10:00 AM to 7:30 PM, closed on Sunday and Saturdays\\r\\n\\r\\nContact: +60194815948\\r\\n\\r\\nSpecialties: Freshly baked traditional Bahulu cakes, kuih raya, homemade chips, and a variety of local Malay snacks.        ', 'id=22?id=22', '', '2025-04-21 21:17:52'),
(23, 17, '', 'Pisang Goreng Cheese Balik Pulau', '    Address: Lintang Sungai Burung Satu, Balik Pulau, 11000 Penang\\r\\n\\r\\nContact: Not listed; you may reach out via their Facebook page\\r\\n\\r\\nOpening Hours: Approximately 3:30 PM to 6:45 PM\\r\\n\\r\\nSpecialties: Banana fritters topped with cheese and various flavors like Nutella, Oreo, and strawberry        ', 'id=23?id=23', '', '2025-04-21 21:22:09'),
(24, 17, '', 'Planned To Be Dessert House', '    Address: Stall No. 46, Kompleks Pasar Awam Balik Pulau, 11000 Penang\\r\\n\\r\\n Contact: +6019-414 7012\\r\\n\\r\\nOpening Hours: Weekends only (Saturday & Sunday), mornings until sold out\\r\\n\\r\\nSpecialties: Nyonya-style Kuih Talam made with fresh pandan juice and coconut cream, as well as Hoon Kuih (mung bean flour pudding). They offer delivery within Balik Pulau for orders of five packs or more. ​        ', 'id=24?id=24', '', '2025-04-21 21:30:21'),
(25, 17, '', ' Yup Ghee Handmade Balik Pulau Pao', ' Address: Stall 64, Kompleks Makanan Pasar Batu Lanchang, 11600 Penang\\r\\n\\r\\nContact: +6018-409 2688 (Ah Boy)\\r\\n\\r\\nOpening Hours: Daily from 8:00 AM to 4:00 PM (while stocks last)\\r\\n\\r\\nSpecialties: Handmade steamed buns (pao) including Brown Sugar Flower, Brown Sugar Dragon, Charcoal BBQ Pork, Mui Cai, and Jicama (Sengkuang). All buns are free from coloring and preservatives.             ', 'id=25?id=25', '', '2025-04-21 21:35:31'),
(26, 16, '', 'Lok Khoon Coffee Shop', ' Address: Jalan Kampung Baharu, 11000 Balik Pulau, Penang\\r\\n\\r\\nContact Number: +6019-455 4699\\r\\n\\r\\nOpening Hours: 8:00 AM to 6:00 PM (Closed on Wednesdays)\\r\\n\\r\\nSpecialties: A variety of local delicacies including Chai Kuih (vegetable dumplings), Golden Chicken Rice Balls, and the rich Hor Kar Sai drink        ', 'id=26?id=26', '', '2025-04-21 21:42:25'),
(27, 17, '', 'Warong.Atok', 'Address: Jalan Sungai Pinang, Kampung Sungai Pinang, 11010 Balik Pulau, Penang\\r\\n\\r\\nContact: +6012-405 3733\\r\\n\\r\\nOpening Hours: Daily from 7:00 AM to 1:00 PM\\r\\n\\r\\nSpecialties: Traditional kuih, nasi lemak, banana fritters (pisang goreng)\\r\\n\\r\\n        ', 'id=27?id=27', '', '2025-04-21 21:51:34'),
(28, 17, '', 'Mak Ngah Kuih Tradisional', '    Address: 102 MK, Jalan Tun Sardon, Kampung Perlis, 11000 Balik Pulau, Penang\\r\\n\\r\\nContact: +6016-457 8021\\r\\n\\r\\nOpening Hours: Daily from 8:00 AM to 5:00 PM\\r\\n\\r\\nSpecialties: Homemade kuih like kuih lapis, seri muka, kuih keria\\r\\n\\r\\n        ', 'id=28?id=28', '', '2025-04-21 21:54:58'),
(29, 19, '', 'Venn Homestay - Balik Pulau', 'Address: No. 18, Jalan Pondok Upeh, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact Number:+60 17-234 5678\\r\\nOwner’s Email: vennhomestaybalikpulau@gmail.com\\r\\nPrice Per Day: RM 300 per night\\r\\nAccommodation Details:\\r\\nMaximum Guests: 8 persons\\r\\nBeds:\\r\\n3 Queen-size beds\\r\\n2 Single beds\\r\\nBedrooms: 4 bedrooms\\r\\nBathrooms: 3 bathrooms (with water heater)\\r\\nGoogle Map Link: https://maps.app.goo.gl/zt5JY3EB6RRgf2bu8\\r\\n\\r\\nmenities:\\r\\nFully furnished rooms with air-conditioning\\r\\nFree Wi', 'http://localhost/PbuTravel/PBU_TRAVEL/homestay_book/book_homestay.php?id=29', 'visitmykampungruralblissbp@gmail.com', '2025-04-22 03:33:12'),
(30, 17, '', 'Warung Kuih Muih ', 'Address: 10, Kompleks Pasar Awam, 11000 Balik Pulau, Pulau Pinang\\r\\nOpening Hours: Daily from 7:00 AM to 1:00 PM\\r\\nPhone: 019-524 3849\\r\\nSpecialties:These stalls offer a delightful taste of Balik Pulau\\\'s local flavors. If you need directions or more information about any of these places, feel free to ask!​            ', 'id=30?id=30', '', '2025-04-22 04:42:23'),
(31, 16, '', '2 Acres Café', 'Address: Lot 801, Jalan Pondok Upeh, 11000 Balik Pulau, Penang, Malaysia\\r\\nContact Number: +60 13-453 3383\\r\\nOpening Hours: Monday – Friday: 11:00 AM – 8:00 PM, Saturday & Sunday: 10:00 AM – 9:00 PM (Closed on Wednesdays)\\r\\nSpecialties: Fresh farm-to-table meals, Signature Big Breakfast, Homemade desserts (cakes, waffles), Specialty coffee and tea, Beautiful garden seating with paddy field views, Relaxed, nature-inspired atmosphere, Family-friendly, pet-friendly café \\r\\n\\r\\n                ', 'id=31?id=31', '', '2025-04-22 05:18:01'),
(32, 16, '', 'garamgula Cafe', ' Address:715, Jalan Tun Sardon,11000 Balik Pulau, Penang, Malaysia\\r\\nContact Number: +60 12-495 0067\\r\\nOpening Hours: Monday – Friday: 12:00 PM – 8:00 PM Saturday & Sunday: 10:00 AM – 8:00 PM (Closed on Tuesdays)\\r\\nspecializes: homemade artisanal cakes, freshly brewed coffee, local Malaysian dishes like nasi lemak, and is known for its cozy minimalist design, quiet atmosphere for reading or working, and delicious desserts like burnt cheesecake and pandan cake.        ', 'id=32?id=32', '', '2025-04-22 05:32:35'),
(33, 19, '', 'DSawah Homestay Balik Pulau', 'Address: Lot 360-1, Sungai Burung, 11000 Balik Pulau, Pulau Pinang\\r\\nContact: 012-522 7978\\r\\nOwner Email: aininakmar@yahoo.com\\r\\nGoogle Map Link: https://maps.app.goo.gl/Ame7ut2B7cCRuySJA                                                    ', 'http://localhost/PbuTravel/PBU_TRAVEL/homestay_book/book_homestay.php?id=33', 'visitmykampungruralblissbp@gmail.com', '2025-04-22 07:00:05'),
(34, 19, '', 'Zarina Homestay', 'Address: 460, Kampung Paya Kongsi, 11000 Balik Pulau, Penang\\r\\nPhone: 019-470 5417\\r\\nPrice Per Day: RM250\\r\\nCapacity: 8 persons\\r\\nBeds: 3 single, 2 double\\r\\nBathrooms: 2\\r\\nBedrooms: 3\\r\\nGoogle Link: https://maps.app.goo.gl/dGm4ms6XHNEkLSNWA                            ', 'http://localhost/PbuTravel/PBU_TRAVEL/homestay_book/book_homestay.php?id=34', 'visitmykampungruralblissbp@gmail.com', '2025-04-22 08:12:53'),
(35, 19, '', 'Happy Homestay', 'Address: 5, Lebuh Orkardia 3, Taman Orkardia, 11000 Balik Pulau, Penang\\r\\nContact: 011-6329 4398\\r\\nPrice per Day: Starting from RM350 per night\\r\\nOwner’s Email: happystay@gmail.com\\r\\nCapacity: Up to 16 guests\\r\\nBeds: 4 air-conditioned bedrooms (master bedroom with a king bed and a single bed; other rooms with queen beds)\\r\\nBathrooms: 4 attached bathrooms\\r\\n\\r\\nAmenities: Hill view, extra mattresses provided, bicycle rental available (RM15/day), proximity to fishermen\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', 'http://localhost/PbuTravel/PBU_TRAVEL/homestay_book/book_homestay.php?id=35', 'visitmykampungruralblissbp@gmail.com', '2025-04-23 17:30:20'),
(36, 19, '', 'Balik Pulau Homestay', 'Address: No. 30, Lebuh Orkardia 1, 11010 Balik Pulau, Penang\\r\\nContact: 018-942 2133\\r\\nPrice per Day: Starting from RM650 per night\\r\\nOwner’s Email: NBalikPulauMe@gmail.com\\r\\nCapacity: Up to 15 guests\\r\\nBeds: 4 bedrooms\\r\\nBathrooms: 3 bathrooms\\r\\nGoogle Maps Link: https://maps.app.goo.gl/QHGLkByC8nKFChLr5\\r\\nAmenities: Terrace house with mountain view, air conditioning, hot showers, children\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', 'http://localhost/PbuTravel/PBU_TRAVEL/homestay_book/book_homestay.php?id=36', 'visitmykampungruralblissbp@gmail.com', '2025-04-23 17:43:05'),
(37, 20, '', ' Bao Sheng Durian Farm', ' Address: 150 Mk2 Sungai Pinang, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact: +6012-411 0600\\r\\nEmail: bsfarm@durian.com.my\\r\\nOperating Hours: Open daily\\r\\nSpecialties: Known for premium durians like Red Prawn and Hor Lor. They also offer durian tasting sessions and accommodations            ', 'id=37?id=37', '', '2025-04-23 17:59:04'),
(38, 20, '', '111 Durian Balik Pulau', 'Address: No. 92, Mukim J, Kampung Genting, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact: +6012-585 1729\\r\\nOperating Hours: Daily, 11:00 AM – 7:00 PM\\r\\nSpecialties: Offers a variety of durians including Kacang Hijau, D14, Capri, Ho Lor, Ang He, Musang King, Lipan, D18, and Black Thorn            ', 'id=38?id=38', '', '2025-04-23 18:03:12'),
(39, 20, '', ' FCS Durian Orchard', 'Address: Jalan Tun Sardon, Kampung Permatang Timbun, 11020 Balik Pulau, Penang, Malaysia\\r\\nContact:+6012-4343232\\r\\nOperating Hours: Open 24 hours daily\\r\\nSpecialties: Provides various durian species for tasting. The owner offers brief explanations about the different types            ', 'id=39?id=39', '', '2025-04-23 18:08:33'),
(40, 20, '', 'Green Acres Orchard', ' Address: Jalan Sungai Pinang, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact: +6012-427 9986\\r\\nOperating Hours: Typically open during durian season; its advisable to call ahead.\\r\\nSpecialties: Offers organic durians and eco-friendly farm tours            ', 'id=40?id=40', '', '2025-04-23 18:13:16'),
(41, 20, '', 'Soon Huat Durian Farm', 'Address: Jalan Bukit Penara, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact: +6012-493 1798\\r\\nOperating Hours: Open during durian season; call to confirm.\\r\\nSpecialties: Known for traditional farming methods and a variety of local durian species.​            ', 'id=41?id=41', '', '2025-04-23 18:28:11'),
(42, 20, '', 'Durian Seng Farm', 'Address: Jalan Tun Sardon, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact: +6012-345 6789\\r\\nOperating Hours: Open during durian season; call ahead for details.\\r\\nSpecialties: Offers a range of durians and farm experiences​            ', 'id=42?id=42', '', '2025-04-23 18:32:16'),
(43, 20, '', 'Lau Durian Farm', 'Address: Jalan Pulau Betong, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact: +6012-987 6543\\r\\nOperating Hours: Seasonal; contact for availability.\\r\\nSpecialties: Family-run farm offering fresh durians and local hospitality.​            ', 'id=43?id=43', '', '2025-04-23 18:36:31'),
(44, 20, '', 'Ah Teik Durian', 'Address: Jalan Balik Pulau, Balik Pulau, 11000 Penang, Malaysia\\r\\nContact: +6012-456 7890\\r\\nOperating Hours: Daily during durian season; hours may vary.\\r\\nSpecialties: Popular roadside stall known for affordable and fresh durians.​            ', 'id=44?id=44', '', '2025-04-23 18:42:14'),
(45, 21, '', 'Explore Balik Pulau (Cycling Tours)', 'Address: 145 MK B, U-1, Jalan Sungai Rusa, 11000 Balik Pulau, Penang, Malaysia\\r\\nContact: +60 16-452 2100\\r\\nOperating Hours: Closed today; please check their schedule for availability.\\r\\nSpecialties: Guided cycling tours through Balik Pulau countryside, offering insights into local culture and scenic views.                ', 'id=45?id=45', '', '2025-04-23 18:45:24'),
(46, 21, '', 'Nature Fruit Farm', 'Address: 311 MK7 Kampung Genting, 11000 Balik Pulau, Penang, Malaysia\\r\\nContact: +60 11-5675 9128\\r\\nEmail: naturefruitfarmresort@gmail.com\\r\\nOperating Hours: Please contact directly for operating hours.\\r\\nSpecialties: A private estate offering farm stays, fruit orchards, and a tranquil natural environment.            ', 'id=46?id=46', '', '2025-04-23 18:49:59'),
(47, 21, '', 'The Farm @ Lake Café Pantai Acheh', 'Address: 465, Pantai Acheh, Mukim 1, 11000 Balik Pulau, Penang, Malaysia\\r\\nContact: +60 12-409 6969\\r\\nOperating Hours: Monday–Friday: 10:30 AM – 6:00 PM; Saturday/Sunday/Public Holidays: 9:00 AM – 6:00 PM\\r\\nSpecialties: A farm café offering a serene lakeside environment, fresh produce, and a family-friendly atmosphere            ', 'id=47?id=47', '', '2025-04-23 18:53:06'),
(48, 21, '', 'Art & Garden', 'Address: 215, Mukim H, Jalan Bahru, Sungai Burung, 11010 Balik Pulau, Penang, Malaysia\\r\\nContact: +60 12-498 8499\\r\\nOperating Hours: Please contact directly for operating hours.\\r\\nSpecialties: A unique blend of art and nature, featuring sculptures, installations, and lush gardens.             ', 'id=48?id=48', '', '2025-04-23 18:56:46'),
(49, 21, '', 'Nada Natural Farming', 'Address: Lot 646 & 647, Jalan Kuala Sungai Burung, Kampung Sungai Burung, 11000 Balik Pulau, Penang, Malaysia\\r\\nContact: +60 13-403 0988\\r\\nOperating Hours: Friday–Sunday: 4:00 PM–8:00 PM; Closed Monday–Thursday\\r\\nSpecialties: An organic farm offering a serene environment with a pond view. Features a café serving dishes made from fresh farm ingredients, including pasta, sandwiches, and homemade kefir.             ', 'id=49?id=49', '', '2025-04-23 19:01:30'),
(50, 21, '', 'Pantai Malindo', 'Address: Pantai Malindo, Balik Pulau, Penang, Malaysia\\r\\nContact: Not specified\\r\\nOperating Hours: Open daily; best visited during daylight hours.\\r\\nSpecialties: A tranquil beach offering picturesque sunsets, fishing activities, and a peaceful retreat from the city.        ', 'id=50?id=50', '', '2025-04-23 19:04:37'),
(51, 21, '', 'Tropical Fruit Farm', 'Address: Various locations around Balik Pulau, Penang, Malaysia\\r\\nContact: Not applicable\\r\\nOperating Hours: Open daily; best visited during daylight hours.\\r\\nSpecialties: Expansive paddy fields offering scenic views, especially during planting and harvesting seasons        ', 'id=51?id=51', '', '2025-04-23 19:09:29'),
(52, 21, '', 'Malihom Private Estate ', 'Address: Kiri N/T 168, Bukit Penara, 11000 Balik Pulau, Penang\\r\\nContact: +60 4-261 0190\\r\\nOperating Hours: Check-in from 2:00 PM; check-out by 12:00 PM\\r\\nSpecialties: An exclusive hilltop retreat featuring traditional Thai rice barns converted into luxurious villas, offering stunning sunrise and sunset views.        ', 'id=52?id=52', '', '2025-04-23 19:16:11'),
(53, 7, '', 'Audi Dream Farm', '        Address: 145, MK B, Sungai Rusa, 11010 Balik Pulau, Penang\\r\\n\\r\\nContact: +6012-406 9099 / +6012-499 9099\\r\\n\\r\\nOperating Hours: Daily, 8:00 AM – 6:00 PM\\r\\n\\r\\nSpecialties: A family-friendly mini zoo offering hands-on animal feeding, camel rides, and educational activities for children.                        ', 'id=53?id=53', '', '2025-04-23 19:20:49'),
(54, 7, '', 'The Farm @ Pantai Acheh', ' Address: 465, Pantai Acheh, Mukim 1, 11010 Balik Pulau, Penang\\r\\nContact: +6012-409 6969\\r\\nOperating Hours: Monday–Friday: 10:30 AM – 6:00 PM; Saturday/Sunday/Public Holidays: 9:00 AM – 6:00 PM\\r\\nSpecialties: A serene farm café featuring a mini zoo with peacocks, rabbits, goats, and pheasants, offering a tranquil environment for families.    ', 'id=54?id=54', '', '2025-04-23 19:27:41'),
(55, 7, '', 'Countryside Stables Penang', ' Address: Lot 10050, Jalan Sungai Burung, Sungai Burung, 11000 Balik Pulau, Penang\\r\\nContact: +6012-408 0678\\r\\nOperating Hours: Daily, 2:00 PM – 7:00 PM\\r\\nSpecialties: Offers horse riding experiences and interactions with various farm animals in a countryside setting', 'id=55?id=55', '', '2025-04-23 19:30:48'),
(57, 7, '', 'Minifarm Penang', 'Address: 460, Kampung Paya Kongsi, 11000 Balik Pulau, Penang\\r\\nContact: Information not specified\\r\\nOperating Hours: Information not specified\\r\\nSpecialties: A mini zoo providing opportunities to interact with a variety of animals, promoting conservation awareness and responsible animal care.            ', 'id=57?id=57', '', '2025-04-23 19:34:37'),
(58, 7, '', 'Saanen Dairy Goat Farm', 'Address: Information not specified; located in Balik Pulau, Penang\\r\\nContact: Information not specified\\r\\nOperating Hours: Information not specified\\r\\nSpecialties: A family-friendly farm where visitors can learn about goat farming and enjoy fresh dairy products.​    ', 'id=58?id=58', '', '2025-04-23 19:38:14'),
(59, 7, '', 'BP Dragonfly Garden', 'Address: Solok Pondok Upih, Taman Kristal, 11020 Balik Pulau, Pulau Pinang\\r\\nContact: 0164422336    \\r\\nOperating Hours:   open everyday 4.00PM until 7PM', 'id=59?id=59', '', '2025-04-23 19:41:41'),
(60, 7, '', 'Explore Balik Pulau (Cycling Tours)', 'Address: 145 MK B, U-1, Jalan Sungai Rusa, 11000 Balik Pulau, Penang, Malaysia\\r\\nContact: +60 16-452 2100\\r\\nOperating Hours: Closed today; please check their schedule for availability.\\r\\nSpecialties: Guided cycling tours through Balik Pulau countryside, offering insights into local culture and scenic views.            ', 'id=60?id=60', '', '2025-04-23 19:49:42'),
(61, 7, '', 'Art & Garden', ' Address: 215, Mukim H, Jalan Bahru, Sungai Burung, 11010 Balik Pulau, Penang, Malaysia\\r\\nContact: +60 12-498 8499\\r\\nOperating Hours: Please contact directly for operating hours.\\r\\nSpecialties: A unique blend of art and nature, featuring sculptures, installations, and lush gardens.', 'id=61?id=61', '', '2025-04-23 19:55:24'),
(62, 4, '', 'Saanen Dairy Goat Farm', 'Address: Information not specified; located in Balik Pulau, Penang\\r\\nContact: Information not specified\\r\\nOperating Hours: Information not specified\\r\\nSpecialties: A family-friendly farm where visitors can learn about goat farming and enjoy fresh dairy products.​', 'id=62?id=62', '', '2025-04-24 06:04:10'),
(63, 4, '', 'Loveuu Farm', 'Address Lot 178, Mk H, Sungai Burung, 11000 Balik Pulau, Penang, Malaysia    \\r\\nContact: +60 16-452 2100\\r\\nEmail: loveuuteafarm@gmail.com\\r\\nFacebook: Loveuu Teafarm    \\r\\nOperating Hours\\r\\nSaturday & Sunday: 12:00 PM – 6:00 PM\\r\\nMonday to Friday: Closed​    \\r\\nSpecialties: Loveuu Farm offers herbal teas, scenic paddy views, bamboo house stays, camping, BBQs, and a peaceful, family-friendly countryside retreat.', 'id=63?id=63', '', '2025-04-24 06:17:21'),
(66, 4, '', 'Vihara BoonRaksa Forest Monastery', 'Address: 1580, Batu Itam MKM 4, 11000 Balik Pulau, Pulau Pinang, Malaysia\\r\\nPhone: +60 18-285 4606\\r\\nEmail: ubom-admin@ubom.org\\r\\nWebsite: vbr.ubom.org    \\r\\nOperating Hours\\r\\nSunday: 9:00 AM – 5:00 PM, Monday to Saturday: Closed\\r\\nSpecialties Vihara BoonRaksa Forest Monastery is the first monastery in Penang of the Dhammayut Forest Tradition, following the lineage of Phra Ajaan Sao Kantasilo and Phra Ajaan Mun Bhuridatto. It serves as a sanctuary for spiritual cultivation, supporting both', 'id=66?id=66', '', '2025-04-24 07:46:53'),
(67, 4, '', 'Suriana Botanic Conservation Gardens', 'Address: 9763+94, Kampung Titi Serong, 11000 Balik Pulau, Penang, Malaysia    \\r\\nContact: +60 11-1652 1265\\r\\nEmail: loveuuteafarm@gmail.com\\r\\nWebsite: surianafoliamy.com    \\r\\nOperating Hours\\r\\nTuesday – Sunday: 9:00 AM – 6:30 PM Monday: Closed​\\r\\nSpecialties: Suriana Botanic Conservation Gardens specializes in plant research, conservation, and education, offering ex-situ plant materials and supporting Folia Malaysiana publication through partnerships with research institutes.', 'id=67?id=67', '', '2025-04-24 08:25:48'),
(68, 4, '', 'South Hill peak', 'Address: Located within the Trans 13 Peaks trail in Balik Pulau, Penang, Malaysia.\\r\\nContact: There is no official contact number for South Hill Peak. For guided hikes or more information, consider reaching out to local hiking groups or tour operators in Penang.\\r\\nOperating Hours: Open daily; its advisable to hike during daylight hours, typically from early morning to late afternoon, for safety.\\r\\nSpecialties: South Hill Peak offers a challenging hike through dense forests with panoramic view', 'id=68?id=68', '', '2025-04-24 08:35:01'),
(69, 4, '', 'Air Terjun Sungai Rusa', 'Address: Sungai Rusa, 11000 Balik Pulau, Penang, Malaysia\\r\\nContact: There is no official contact number available, as the waterfall is situated on private land. Visitors are advised to seek permission before accessing the area.\\r\\nOperating Hours: Open daily; its advisable to visit during daylight hours, typically from early morning to late afternoon, for safety.​\\r\\nSpecialties: Air Terjun Sungai Rusa features a 30-minute hike through a durian orchard to a scenic waterfall with a natural pool', 'id=69?id=69', '', '2025-04-24 08:47:12'),
(70, 4, '', 'White Resort Camp', 'Address: White Resort Camp, Lot 335, Kampung Genting, Daerah Barat Daya, 11000 Balik Pulau, Pulau Pinang, Malaysia .\\r\\nContact: +60 19-547 7538 / +60 19-455 7538 / +60 19-544 7538\\r\\nEmail: nwcenterprise21@gmail.com / nwc_enterprise@yahoo.com\\r\\nWebsite: whiteresortcamp.com\\r\\nSpecialties: White Resort Camp offers group accommodations, diverse facilities, and outdoor activities like jungle trekking and water recreation in a serene durian orchard setting near Bukit Genting.\\r\\nFacebook: White Re', 'id=70?id=70', '', '2025-04-24 08:58:05'),
(71, 4, '', 'GEMILANG VALLEY OUTDOOR CENTRE', 'Address: Hadapan 271 Mk7, 11020 Balik Pulau, Pulau Pinang\\r\\nContact: : 019-276 2669\\r\\nFacebook: Gemilang Valley Outdoor Centre\\r\\nOperating Hours: Operating hours are not explicitly stated; its recommended to contact the centre directly through their Facebook page for scheduling and availability.  \\r\\nSpecialties: Gemilang Valley Outdoor Centre offers horseback riding, archery, ATV rides, and youth-focused programs like \\\"Kem Anak Gemilang\\\" for outdoor education and development.\\r\\n      ', 'id=71?id=71', '', '2025-04-24 09:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `travel_idea_images`
--

CREATE TABLE `travel_idea_images` (
  `id` int(11) NOT NULL,
  `travel_idea_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_idea_images`
--

INSERT INTO `travel_idea_images` (`id`, `travel_idea_id`, `image_path`, `created_at`) VALUES
(12, 5, 'uploads/kimlaksa.jpg', '2025-04-21 20:44:58'),
(15, 10, 'uploads/yuXuan.jpg', '2025-04-21 20:48:41'),
(18, 21, 'uploads/gerau tok abah1.jpg', '2025-04-21 21:00:39'),
(19, 21, 'uploads/gerau tok abah.jpg', '2025-04-21 21:01:05'),
(20, 22, 'uploads/Bahulu Balik Pulau.jpg', '2025-04-21 21:17:53'),
(21, 22, 'uploads/Bahulu Balik Pulau1.jpg', '2025-04-21 21:18:15'),
(22, 22, 'uploads/Bahulu Balik Pulau2.jpg', '2025-04-21 21:18:31'),
(23, 23, 'uploads/Pisang Goreng Cheese Balik Pulau.jpg', '2025-04-21 21:22:10'),
(24, 23, 'uploads/Pisang Goreng Cheese Balik Pulau1.jpg', '2025-04-21 21:22:28'),
(25, 23, 'uploads/Pisang Goreng Cheese Balik Pulau2.jpg', '2025-04-21 21:22:46'),
(26, 24, 'uploads/Planned To Be Dessert House.jpg', '2025-04-21 21:30:21'),
(27, 24, 'uploads/Planned+To+Be+Dessert+House1.jpg', '2025-04-21 21:30:56'),
(28, 24, 'uploads/Planned+To+Be+Dessert+House2.jpg', '2025-04-21 21:31:31'),
(29, 25, 'uploads/Yup Ghee Handmade Balik Pulau Pao.jpg', '2025-04-21 21:35:31'),
(30, 25, 'uploads/Yup Ghee Handmade Balik Pulau Pao1.jpg', '2025-04-21 21:35:59'),
(31, 25, 'uploads/Yup Ghee Handmade Balik Pulau Pao2.jpg', '2025-04-21 21:36:36'),
(32, 26, 'uploads/Lok Khon Coffee Shop.jpg', '2025-04-21 21:42:25'),
(33, 26, 'uploads/Lok Khon Coffee Shop 2.jpg', '2025-04-21 21:42:44'),
(34, 26, 'uploads/Lok Khoon Coffee Shop 1.jpg', '2025-04-21 21:43:17'),
(35, 27, 'uploads/Warong.Atok.jpg', '2025-04-21 21:51:35'),
(36, 27, 'uploads/Warong.Atok1.jpg', '2025-04-21 21:51:54'),
(37, 27, 'uploads/Warong.Atok2.jpg', '2025-04-21 21:52:14'),
(38, 28, 'uploads/Mak Ngah Kuih Tradisional2.jpg', '2025-04-21 21:54:59'),
(39, 28, 'uploads/Mak Ngah Kuih Tradisional1.jpg', '2025-04-21 21:55:12'),
(40, 28, 'uploads/Mak Ngah Kuih Tradisional.jpg', '2025-04-21 21:55:57'),
(41, 14, 'uploads/Homestay Dua Villa Balik Pulau.jpg', '2025-04-21 22:03:05'),
(55, 5, 'uploads/kimlaksa1.jpg', '2025-04-22 02:10:36'),
(56, 5, 'uploads/kimlaksa2.jpg', '2025-04-22 02:11:01'),
(59, 10, 'uploads/yuXuan1.jpg', '2025-04-22 02:12:23'),
(60, 6, 'uploads/mycurryTummyKitchen.jpg', '2025-04-22 02:12:49'),
(61, 6, 'uploads/My Curry Tummy Kitchen1.jpg', '2025-04-22 02:13:08'),
(62, 10, 'uploads/yuXuan2.jpg', '2025-04-22 02:13:48'),
(63, 12, 'uploads/Inacafe.jpg', '2025-04-22 02:17:36'),
(64, 12, 'uploads/inacafe1.jpg', '2025-04-22 02:17:56'),
(65, 12, 'uploads/inacafe2.jpg', '2025-04-22 02:18:15'),
(66, 13, 'uploads/BestCendolBalikPulau.jpg', '2025-04-22 02:19:49'),
(67, 13, 'uploads/BestCendolBalikPulau1.jpg', '2025-04-22 02:21:40'),
(68, 13, 'uploads/BestCendolBalikPulau2.jpg', '2025-04-22 02:22:03'),
(69, 13, 'uploads/BestCendolBalikPulau3.jpg', '2025-04-22 02:22:24'),
(70, 14, 'uploads/Homestay Dua Villa Balik Pulau1.jpeg', '2025-04-22 02:23:12'),
(71, 14, 'uploads/Homestay Dua Villa Balik Pulau2.jpg', '2025-04-22 02:23:42'),
(72, 14, 'uploads/Homestay Dua Villa Balik Pulau3.jpg', '2025-04-22 02:25:19'),
(73, 14, 'uploads/Homestay Dua Villa Balik Pulau4.jpeg', '2025-04-22 02:25:44'),
(74, 14, 'uploads/Homestay Dua Villa Balik Pulau6.jpeg', '2025-04-22 02:26:07'),
(75, 14, 'uploads/Homestay Dua Villa Balik Pulau7.jpeg', '2025-04-22 02:27:22'),
(78, 15, 'uploads/NatureFruitFarm.JPG', '2025-04-22 02:45:59'),
(79, 15, 'uploads/Nature fruit Farm.JPG', '2025-04-22 02:46:48'),
(80, 15, 'uploads/Nature Fruit Farm - Farmstay6.JPG', '2025-04-22 03:14:34'),
(81, 15, 'uploads/Nature Fruit Farm - Farmstay5.JPG', '2025-04-22 03:15:28'),
(82, 15, 'uploads/Nature Fruit Farm - Farmstay2.JPG', '2025-04-22 03:16:21'),
(83, 15, 'uploads/Nature Fruit Farm - Farmstay1.JPG', '2025-04-22 03:17:23'),
(84, 29, 'uploads/Venn Homestay.jpg', '2025-04-22 03:33:12'),
(85, 29, 'uploads/Venn Homestay1.jpg', '2025-04-22 03:34:00'),
(86, 29, 'uploads/Venn Homestay2.jpg', '2025-04-22 03:34:26'),
(87, 29, 'uploads/Venn Homestay3.jpg', '2025-04-22 03:34:49'),
(88, 29, 'uploads/Venn Homestay4.jpg', '2025-04-22 03:35:17'),
(89, 29, 'uploads/Venn Homestay5.jpg', '2025-04-22 03:35:48'),
(90, 29, 'uploads/Venn Homestay6.jpg', '2025-04-22 03:36:17'),
(91, 29, 'uploads/Venn Homestay7.jpg', '2025-04-22 03:36:53'),
(92, 29, 'uploads/Venn Homestay8.jpg', '2025-04-22 03:37:56'),
(93, 29, 'uploads/Venn Homestay9.jpg', '2025-04-22 03:38:20'),
(94, 29, 'uploads/Venn Homestay10.jpg', '2025-04-22 03:38:42'),
(95, 16, 'uploads/Paddy View Homestay.jpg', '2025-04-22 03:51:35'),
(96, 16, 'uploads/Paddy View Homestay1.jpg', '2025-04-22 03:52:50'),
(97, 16, 'uploads/Paddy View Homestay2.jpg', '2025-04-22 04:20:01'),
(98, 16, 'uploads/Paddy View Homestay3.jpg', '2025-04-22 04:20:30'),
(99, 16, 'uploads/Paddy View Homestay4.jpg', '2025-04-22 04:21:33'),
(100, 16, 'uploads/Paddy View Homestay5.jpg', '2025-04-22 04:22:16'),
(101, 16, 'uploads/Paddy View Homestay6.jpg', '2025-04-22 04:22:48'),
(102, 16, 'uploads/Paddy View Homestay7.jpg', '2025-04-22 04:23:10'),
(103, 16, 'uploads/Paddy View Homestay8.jpg', '2025-04-22 04:23:55'),
(104, 30, 'uploads/Warung Kuih Muih.jpg', '2025-04-22 04:42:23'),
(105, 30, 'uploads/Warung Kuih Muih 1.jpg', '2025-04-22 04:42:53'),
(106, 30, 'uploads/Warung Kuih Muih 2.jpg', '2025-04-22 04:43:11'),
(107, 30, 'uploads/Warung Kuih Muih 3.jpg', '2025-04-22 04:43:48'),
(108, 31, 'uploads/2 Acres Cafe.jpg', '2025-04-22 05:18:01'),
(109, 31, 'uploads/2 Acres Cafe1.jpg', '2025-04-22 05:18:26'),
(110, 31, 'uploads/2 Acres Cafe2.jpg', '2025-04-22 05:18:49'),
(111, 31, 'uploads/2 Acres Cafe3.jpg', '2025-04-22 05:19:21'),
(112, 31, 'uploads/2 Acres Cafe4.jpg', '2025-04-22 05:20:02'),
(113, 32, 'uploads/Garamgula Cafe.jpg', '2025-04-22 05:32:35'),
(114, 32, 'uploads/Garamgula Cafe1.jpg', '2025-04-22 05:32:53'),
(115, 32, 'uploads/Garamgula Cafe2.jpg', '2025-04-22 05:33:10'),
(116, 33, 'uploads/D\'Sawah Homestay Balik Pulau.jpg', '2025-04-22 07:00:05'),
(117, 33, 'uploads/D\'Sawah Homestay Balik Pulau1.jpg', '2025-04-22 07:01:01'),
(118, 33, 'uploads/D\'Sawah Homestay Balik Pulau2.jpg', '2025-04-22 07:01:57'),
(119, 33, 'uploads/D\'Sawah Homestay Balik Pulau3.jpg', '2025-04-22 07:51:35'),
(120, 33, 'uploads/D\'Sawah Homestay Balik Pulau4.jpg', '2025-04-22 07:53:12'),
(121, 33, 'uploads/D\'Sawah Homestay Balik Pulau5.jpg', '2025-04-22 07:53:53'),
(122, 33, 'uploads/D\'Sawah Homestay Balik Pulau6.jpg', '2025-04-22 07:54:25'),
(123, 33, 'uploads/D\'Sawah Homestay Balik Pulau7.jpg', '2025-04-22 07:54:47'),
(124, 33, 'uploads/D\'Sawah Homestay Balik Pulau8.jpg', '2025-04-22 07:56:17'),
(125, 33, 'uploads/D\'Sawah Homestay Balik Pulau9.jpg', '2025-04-22 07:56:51'),
(126, 34, 'uploads/Zarina Homestay.jpg', '2025-04-22 08:12:53'),
(127, 34, 'uploads/Zarina Homestay1.jpg', '2025-04-22 08:23:16'),
(128, 34, 'uploads/Zarina Homestay2.jpg', '2025-04-22 08:24:54'),
(129, 34, 'uploads/Zarina Homestay3.jpg', '2025-04-22 08:25:24'),
(130, 34, 'uploads/Zarina Homestay4.jpg', '2025-04-22 08:26:00'),
(131, 35, 'uploads/HappyHomestay.jpg', '2025-04-23 17:30:20'),
(132, 35, 'uploads/HappyHomestay1.jpg', '2025-04-23 17:31:06'),
(133, 35, 'uploads/HappyHomestay2.jpg', '2025-04-23 17:31:23'),
(134, 35, 'uploads/HappyHomestay3.jpg', '2025-04-23 17:31:39'),
(135, 35, 'uploads/HappyHomestay4.jpg', '2025-04-23 17:32:01'),
(136, 36, 'uploads/Homestay Balik Pulau.jpg', '2025-04-23 17:43:05'),
(137, 36, 'uploads/Homestay Balik Pulau1.jpg', '2025-04-23 17:43:27'),
(138, 36, 'uploads/Homestay Balik Pulau2.jpg', '2025-04-23 17:43:50'),
(139, 36, 'uploads/Homestay Balik Pulau3.jpg', '2025-04-23 17:44:13'),
(140, 36, 'uploads/Homestay Balik Pulau4.jpg', '2025-04-23 17:44:31'),
(141, 36, 'uploads/Homestay Balik Pulau5.jpg', '2025-04-23 17:45:01'),
(142, 36, 'uploads/Homestay Balik Pulau6.jpg', '2025-04-23 17:45:25'),
(143, 36, 'uploads/Homestay Balik Pulau7.jpg', '2025-04-23 17:45:43'),
(144, 36, 'uploads/Homestay Balik Pulau8.jpg', '2025-04-23 17:46:01'),
(145, 36, 'uploads/Homestay Balik Pulau9.jpg', '2025-04-23 17:46:19'),
(146, 36, 'uploads/Homestay Balik Pulau10.jpg', '2025-04-23 17:46:35'),
(147, 36, 'uploads/Homestay Balik Pulau11.jpg', '2025-04-23 17:46:50'),
(148, 36, 'uploads/12.jpg', '2025-04-23 17:47:03'),
(149, 36, 'uploads/Homestay Balik Pulau12.jpg', '2025-04-23 17:47:19'),
(150, 36, 'uploads/Homestay Balik Pulau13.jpg', '2025-04-23 17:47:34'),
(151, 36, 'uploads/Homestay Balik Pulau14.jpg', '2025-04-23 17:47:51'),
(152, 36, 'uploads/Homestay Balik Pulau15.jpg', '2025-04-23 17:48:17'),
(153, 37, 'uploads/Bao Sheng Durian Farm.jpg', '2025-04-23 17:59:04'),
(154, 37, 'uploads/Bao Sheng Durian Farm1.jpg', '2025-04-23 17:59:21'),
(155, 37, 'uploads/Bao Sheng Durian Farm2.jpg', '2025-04-23 17:59:37'),
(156, 37, 'uploads/Bao Sheng Durian Farm3.jpg', '2025-04-23 17:59:54'),
(157, 38, 'uploads/111 Durian Balik Pulau.jpg', '2025-04-23 18:03:13'),
(158, 38, 'uploads/111 Durian Balik Pulau1.jpg', '2025-04-23 18:03:30'),
(159, 38, 'uploads/111 Durian Balik Pulau2.jpg', '2025-04-23 18:03:46'),
(160, 38, 'uploads/111 Durian Balik Pulau3.jpg', '2025-04-23 18:04:06'),
(161, 39, 'uploads/FCS Durian Orchard.jpg', '2025-04-23 18:08:33'),
(162, 39, 'uploads/FCS Durian Orchard1.jpg', '2025-04-23 18:08:50'),
(163, 39, 'uploads/FCS Durian Orchard2.jpg', '2025-04-23 18:09:02'),
(164, 39, 'uploads/FCS Durian Orchard3.jpg', '2025-04-23 18:09:16'),
(165, 40, 'uploads/Green Acres Orchard.jpg', '2025-04-23 18:13:17'),
(166, 40, 'uploads/Green Acres Orchard1.jpg', '2025-04-23 18:13:32'),
(167, 40, 'uploads/Green Acres Orchard2.jpg', '2025-04-23 18:13:50'),
(168, 40, 'uploads/Green Acres Orchard3.jpg', '2025-04-23 18:14:15'),
(169, 41, 'uploads/Soon Huat Durian Farm.jpg', '2025-04-23 18:28:12'),
(170, 41, 'uploads/Soon Huat Durian Farm1.jpg', '2025-04-23 18:28:25'),
(171, 41, 'uploads/Soon Huat Durian Farm2.JPG', '2025-04-23 18:28:39'),
(172, 41, 'uploads/Soon Huat Durian Farm3.jpg', '2025-04-23 18:28:55'),
(173, 42, 'uploads/Durian Seng Farm.jpg', '2025-04-23 18:32:16'),
(174, 42, 'uploads/Durian Seng Farm1.jpg', '2025-04-23 18:32:37'),
(175, 42, 'uploads/Durian Seng Farm2.jpg', '2025-04-23 18:32:59'),
(176, 42, 'uploads/Durian Seng Farm3.jpg', '2025-04-23 18:33:17'),
(177, 43, 'uploads/Lau Durian Farm.jpg', '2025-04-23 18:36:31'),
(178, 43, 'uploads/Lau Durian Farm1.jpg', '2025-04-23 18:36:44'),
(179, 43, 'uploads/Lau Durian Farm2.jpg', '2025-04-23 18:36:59'),
(180, 43, 'uploads/Lau Durian Farm3.jpg', '2025-04-23 18:37:17'),
(181, 44, 'uploads/Ah Teik Durian.jpg', '2025-04-23 18:42:15'),
(182, 44, 'uploads/Ah Teik Durian2.jpg', '2025-04-23 18:42:29'),
(183, 44, 'uploads/Ah Teik Durian1.jpg', '2025-04-23 18:42:46'),
(184, 44, 'uploads/Ah Teik Durian3.jpg', '2025-04-23 18:43:02'),
(185, 45, 'uploads/Explore Balik Pulau (Cycling Tours).jpg', '2025-04-23 18:45:24'),
(186, 45, 'uploads/Explore Balik Pulau (Cycling Tours)1.jpg', '2025-04-23 18:45:43'),
(187, 45, 'uploads/Explore Balik Pulau (Cycling Tours)2.jpg', '2025-04-23 18:45:57'),
(188, 45, 'uploads/Explore Balik Pulau (Cycling Tours)3.jpg', '2025-04-23 18:46:13'),
(189, 46, 'uploads/Nature fruit Farm.JPG', '2025-04-23 18:49:59'),
(190, 46, 'uploads/Nature Fruit Farm1.jpg', '2025-04-23 18:50:13'),
(191, 46, 'uploads/Nature Fruit Farm2.jpg', '2025-04-23 18:50:27'),
(192, 46, 'uploads/Nature Fruit Farm3.jpg', '2025-04-23 18:50:40'),
(193, 47, 'uploads/The Farm @ Lake Café Pantai Acheh.jpg', '2025-04-23 18:53:06'),
(194, 47, 'uploads/The Farm @ Lake Café Pantai Acheh1.jpg', '2025-04-23 18:53:21'),
(195, 47, 'uploads/The Farm @ Lake Café Pantai Acheh2.jpg', '2025-04-23 18:53:38'),
(196, 47, 'uploads/The Farm @ Lake Café Pantai Acheh3.jpg', '2025-04-23 18:53:52'),
(197, 48, 'uploads/Art & Garden.jpg', '2025-04-23 18:56:46'),
(198, 48, 'uploads/Art & Garden1.jpg', '2025-04-23 18:57:09'),
(199, 48, 'uploads/Art & Garden2.jpg', '2025-04-23 18:57:43'),
(200, 48, 'uploads/Art & Garden3.jpg', '2025-04-23 18:57:59'),
(201, 49, 'uploads/Nada Natural Farming.jpg', '2025-04-23 19:01:30'),
(202, 49, 'uploads/Nada Natural Farming1.jpg', '2025-04-23 19:01:44'),
(203, 49, 'uploads/Nada Natural Farming2.jpg', '2025-04-23 19:02:02'),
(204, 50, 'uploads/Pantai Malindo.jpg', '2025-04-23 19:04:37'),
(205, 50, 'uploads/Pantai Malindo1.jpg', '2025-04-23 19:05:19'),
(206, 50, 'uploads/Pantai Malindo2.jpg', '2025-04-23 19:05:36'),
(207, 50, 'uploads/Pantai Malindo3.jpg', '2025-04-23 19:05:49'),
(208, 51, 'uploads/Balik Pulau Paddy Fields.jpg', '2025-04-23 19:09:29'),
(209, 51, 'uploads/Balik Pulau Paddy Fields1.jpg', '2025-04-23 19:10:07'),
(210, 51, 'uploads/Balik Pulau Paddy Fields2.jpg', '2025-04-23 19:10:21'),
(211, 51, 'uploads/Balik Pulau Paddy Fields3.jpg', '2025-04-23 19:10:35'),
(212, 52, 'uploads/Malihom Private Estate.jpg', '2025-04-23 19:16:11'),
(213, 52, 'uploads/Malihom Private Estate 1.jpg', '2025-04-23 19:17:01'),
(214, 52, 'uploads/Malihom Private Estate 2.jpg', '2025-04-23 19:17:16'),
(215, 52, 'uploads/Malihom Private Estate 3.jpg', '2025-04-23 19:17:31'),
(220, 53, 'uploads/Audi Dream Farm2.jpg', '2025-04-23 19:23:19'),
(221, 53, 'uploads/Audi Dream Farm4.jpg', '2025-04-23 19:25:21'),
(222, 53, 'uploads/Audi Dream Farm.jpg', '2025-04-23 19:25:33'),
(223, 53, 'uploads/Audi Dream Farm5.jpg', '2025-04-23 19:25:44'),
(224, 54, 'uploads/The Farm @ Pantai Achehani.jpg', '2025-04-23 19:27:41'),
(225, 54, 'uploads/The Farm @ Pantai Achehani1.jpg', '2025-04-23 19:28:20'),
(226, 54, 'uploads/The Farm @ Pantai Achehani2.jpg', '2025-04-23 19:28:44'),
(227, 55, 'uploads/Countryside Stables Penang.jpg', '2025-04-23 19:30:48'),
(228, 55, 'uploads/Countryside Stables Penang1.jpg', '2025-04-23 19:31:00'),
(229, 55, 'uploads/Countryside Stables Penang2.jpg', '2025-04-23 19:31:15'),
(230, 55, 'uploads/Countryside Stables Penang3.jpg', '2025-04-23 19:31:32'),
(234, 57, 'uploads/Minifarm Penang.jpg', '2025-04-23 19:35:36'),
(235, 57, 'uploads/Minifarm Penang2.jpg', '2025-04-23 19:36:01'),
(236, 58, 'uploads/Saanen Dairy Goat Farm.jpg', '2025-04-23 19:38:14'),
(237, 58, 'uploads/Saanen Dairy Goat Farm1.jpg', '2025-04-23 19:38:58'),
(238, 58, 'uploads/Saanen Dairy Goat Farm2.jpg', '2025-04-23 19:39:13'),
(239, 59, 'uploads/BP Dragonfly Garden.jpg', '2025-04-23 19:41:41'),
(240, 59, 'uploads/BP Dragonfly Garden1.jpg', '2025-04-23 19:43:20'),
(241, 60, 'uploads/Explore Balik Pulau (Cycling Tours)5.jpg', '2025-04-23 19:49:42'),
(242, 60, 'uploads/Explore Balik Pulau (Cycling Tours)6.jpg', '2025-04-23 19:49:58'),
(243, 60, 'uploads/Explore Balik Pulau (Cycling Tours)7.jpg', '2025-04-23 19:51:38'),
(244, 60, 'uploads/Explore Balik Pulau (Cycling Tours)8.jpg', '2025-04-23 19:51:51'),
(245, 61, 'uploads/Art & Garden5.jpg', '2025-04-23 19:55:24'),
(246, 61, 'uploads/Art & Garden6.jpg', '2025-04-23 19:55:38'),
(247, 61, 'uploads/Art & Garden7.jpeg', '2025-04-23 19:56:09'),
(248, 62, 'uploads/Saanen Dairy Goat Farm 5.jpg', '2025-04-24 06:04:11'),
(249, 62, 'uploads/Saanen Dairy Goat Farm6.jpg', '2025-04-24 06:05:06'),
(250, 63, 'uploads/Loveuu Farm.jpg', '2025-04-24 06:17:22'),
(251, 63, 'uploads/Loveuu Farm1.jpg', '2025-04-24 06:20:05'),
(252, 63, 'uploads/Loveuu Farm2.jpg', '2025-04-24 06:21:00'),
(253, 63, 'uploads/Loveuu Farm3.jpg', '2025-04-24 06:23:11'),
(256, 66, 'uploads/Vihara BoonRaksa Forest Monastery.jpg', '2025-04-24 07:46:54'),
(257, 66, 'uploads/Vihara BoonRaksa Forest Monastery1.jpg', '2025-04-24 07:51:55'),
(258, 66, 'uploads/Vihara BoonRaksa Forest Monastery2.jpg', '2025-04-24 07:54:30'),
(259, 66, 'uploads/Vihara BoonRaksa Forest Monastery3.jpg', '2025-04-24 07:54:50'),
(260, 66, 'uploads/Vihara BoonRaksa Forest Monastery4.jpg', '2025-04-24 07:55:05'),
(261, 67, 'uploads/Suriana Botanic Conservation Gardens.jpg', '2025-04-24 08:25:49'),
(262, 67, 'uploads/Suriana Botanic Conservation Gardens1.jpg', '2025-04-24 08:27:38'),
(263, 67, 'uploads/Suriana Botanic Conservation Gardens2.jpg', '2025-04-24 08:29:45'),
(264, 68, 'uploads/South Hill peak.jpg', '2025-04-24 08:35:02'),
(265, 68, 'uploads/South Hill peak1.jpg', '2025-04-24 08:35:46'),
(266, 68, 'uploads/South Hill peak2.jpg', '2025-04-24 08:36:04'),
(267, 68, 'uploads/South Hill peak3.jpg', '2025-04-24 08:36:56'),
(268, 69, 'uploads/Air Terjun Sungai Rusa.jpg', '2025-04-24 08:47:13'),
(269, 69, 'uploads/Air Terjun Sungai Rusa1.jpg', '2025-04-24 08:48:16'),
(270, 69, 'uploads/Air Terjun Sungai Rusa2.jpg', '2025-04-24 08:48:50'),
(271, 70, 'uploads/White Resort Camp.jpg', '2025-04-24 08:58:06'),
(272, 70, 'uploads/White Resort Camp1.jpg', '2025-04-24 08:59:18'),
(273, 70, 'uploads/White Resort Camp2.jpg', '2025-04-24 09:01:22'),
(274, 71, 'uploads/GEMILANG VALLEY OUTDOOR CENTRE.jpg', '2025-04-24 09:11:05'),
(275, 71, 'uploads/GEMILANG VALLEY OUTDOOR CENTRE1.jpg', '2025-04-24 09:12:24'),
(276, 71, 'uploads/GEMILANG VALLEY OUTDOOR CENTRE2.jpg', '2025-04-24 09:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `travel_videos`
--

CREATE TABLE `travel_videos` (
  `id` int(11) NOT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `video_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(4, 'suresh', 'pce1721ceo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'previna', 'pce31721ceo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'navin', 'pce172bhh1ceo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'kartik', 'pcehh1721ceo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'raven', 'pce172hhh1ceo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `vlog_videos`
--

CREATE TABLE `vlog_videos` (
  `id` int(11) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `feedback` text DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vlog_videos`
--

INSERT INTO `vlog_videos` (`id`, `video_path`, `feedback`, `uploaded_at`) VALUES
(6, 'uploads/videos/LIEW YI TING(21DDT22F2012).mp4', 'HSDFBJHFBJSB', '2025-04-22 01:59:44'),
(7, 'uploads/videos/kannai vittu kannam.mp4', 'Hooray its can have more fun ', '2025-04-22 04:30:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmed_bookings`
--
ALTER TABLE `confirmed_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_content`
--
ALTER TABLE `home_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `travel_guide`
--
ALTER TABLE `travel_guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_ideas`
--
ALTER TABLE `travel_ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `travel_idea_images`
--
ALTER TABLE `travel_idea_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_idea_id` (`travel_idea_id`);

--
-- Indexes for table `travel_videos`
--
ALTER TABLE `travel_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guide_id` (`guide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vlog_videos`
--
ALTER TABLE `vlog_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `confirmed_bookings`
--
ALTER TABLE `confirmed_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_content`
--
ALTER TABLE `home_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `travel_guide`
--
ALTER TABLE `travel_guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `travel_ideas`
--
ALTER TABLE `travel_ideas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `travel_idea_images`
--
ALTER TABLE `travel_idea_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `travel_videos`
--
ALTER TABLE `travel_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vlog_videos`
--
ALTER TABLE `vlog_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `travel_ideas`
--
ALTER TABLE `travel_ideas`
  ADD CONSTRAINT `travel_ideas_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `travel_guide` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `travel_idea_images`
--
ALTER TABLE `travel_idea_images`
  ADD CONSTRAINT `travel_idea_images_ibfk_1` FOREIGN KEY (`travel_idea_id`) REFERENCES `travel_ideas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `travel_videos`
--
ALTER TABLE `travel_videos`
  ADD CONSTRAINT `travel_videos_ibfk_1` FOREIGN KEY (`guide_id`) REFERENCES `travel_guide` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
