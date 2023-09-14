-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 07:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `pro_abouts`
--

CREATE TABLE `pro_abouts` (
  `id` int(11) NOT NULL,
  `about_description` text NOT NULL,
  `ssc_passing_year` varchar(100) NOT NULL,
  `ssc_certificate_name` varchar(255) NOT NULL,
  `ssc_grade` varchar(100) NOT NULL,
  `hsc_passing_year` varchar(100) NOT NULL,
  `hsc_certificate_name` varchar(255) NOT NULL,
  `hsc_grade` varchar(100) NOT NULL,
  `honors_passing_year` varchar(100) NOT NULL,
  `honors_certificate_name` varchar(255) NOT NULL,
  `honors_grade` varchar(100) NOT NULL,
  `about_image` varchar(100) NOT NULL,
  `about_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_abouts`
--

INSERT INTO `pro_abouts` (`id`, `about_description`, `ssc_passing_year`, `ssc_certificate_name`, `ssc_grade`, `hsc_passing_year`, `hsc_certificate_name`, `hsc_grade`, `honors_passing_year`, `honors_certificate_name`, `honors_grade`, `about_image`, `about_status`) VALUES
(1, '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\"><span style=\"text-align: start;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam metus ante, volutpat a ultricies lacinia, vehicula non purus. Morbi consectetur mattis elit eleifend sollicitudin. Curabitur at mattis nibh. Mauris pellentesque ullamcorper dictum. Maecenas in justo a augue lacinia convallis. Morbi porta blandit eros, vitae lobortis leo volutpat non. Sed accumsan enim nec enim tincidunt, a sodales diam ullamcorper. Etiam suscipit augue et diam tempus, id tempor risus scelerisque. Curabitur volutpat lacus bibendum erat mollis, quis bibendum odio bibendum.</span><br></p>', '2011', 'Secondary School Certificate (SSC)', '77', '2013', 'Higher Secondary School Certificate (HSC)', '75', '2019', 'Bachelor of Computer Engineering', '65', '650092854593e.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_banners`
--

CREATE TABLE `pro_banners` (
  `id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_description` longtext NOT NULL,
  `facebook_url` varchar(100) NOT NULL,
  `instagram_url` varchar(100) NOT NULL,
  `linkedin_url` varchar(100) NOT NULL,
  `twitter_url` varchar(100) NOT NULL,
  `portfolio_url` varchar(100) NOT NULL,
  `banner_image` varchar(100) NOT NULL DEFAULT 'banner_person_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_banners`
--

INSERT INTO `pro_banners` (`id`, `banner_title`, `banner_description`, `facebook_url`, `instagram_url`, `linkedin_url`, `twitter_url`, `portfolio_url`, `banner_image`) VALUES
(3, 'Hello! I am Sanowar', 'I am full time freelancer in online market place', 'https://www.facebook.com/', 'https://instagram.com/', 'https://linkedin.com/', 'https://twitter.com/', 'https://mdsanowar.com/', '64fe106e2b55c.png');

-- --------------------------------------------------------

--
-- Table structure for table `pro_brands`
--

CREATE TABLE `pro_brands` (
  `id` int(11) NOT NULL,
  `brand_image` varchar(200) NOT NULL DEFAULT 'default.png',
  `brand_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_brands`
--

INSERT INTO `pro_brands` (`id`, `brand_image`, `brand_status`) VALUES
(7, '64f8c7a209d16.png', 'active'),
(8, '64f8c7a5296cb.png', 'active'),
(9, '64f8c7a8d1795.png', 'active'),
(10, '64f8c7ad85c21.png', 'active'),
(11, '64f8c7b061c53.png', 'active'),
(14, '64f8d8e3a800a.png', 'active'),
(15, '64f8cf797f30c.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_contact_infos`
--

CREATE TABLE `pro_contact_infos` (
  `id` int(11) NOT NULL,
  `contact_info` text NOT NULL,
  `office_location` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_contact_infos`
--

INSERT INTO `pro_contact_infos` (`id`, `contact_info`, `office_location`, `address`, `phone`, `email`, `contact_status`) VALUES
(1, '<p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p><p></p>', 'Dhaka, Bangladesh.', 'Creative iT, Dhanmondi-32, Dhaka', '01786998636', 'sanowarwpneed@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_copyright`
--

CREATE TABLE `pro_copyright` (
  `id` int(11) NOT NULL,
  `copyright_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_copyright`
--

INSERT INTO `pro_copyright` (`id`, `copyright_text`) VALUES
(1, 'Copyright © 2023. All rights reserved. Developed By Me');

-- --------------------------------------------------------

--
-- Table structure for table `pro_facts`
--

CREATE TABLE `pro_facts` (
  `id` int(11) NOT NULL,
  `fact_title` varchar(255) NOT NULL,
  `fact_value` varchar(255) NOT NULL,
  `fact_icon` varchar(100) NOT NULL,
  `fact_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_facts`
--

INSERT INTO `pro_facts` (`id`, `fact_title`, `fact_value`, `fact_icon`, `fact_status`) VALUES
(1, 'Feature Item', '145', 'fa-solid fa-medal', 'active'),
(2, 'ACTIVE PRODUCTS', '100', 'fa-regular fa-thumbs-up', 'active'),
(3, 'YEAR EXPERIENCE', '3', 'fa-solid fa-ranking-star', 'active'),
(4, 'OUR CLIENTS', '200', 'fa-solid fa-users', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_logos`
--

CREATE TABLE `pro_logos` (
  `id` int(11) NOT NULL,
  `logo_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_logos`
--

INSERT INTO `pro_logos` (`id`, `logo_image`) VALUES
(4, '6500b9e6f042e.png');

-- --------------------------------------------------------

--
-- Table structure for table `pro_messages`
--

CREATE TABLE `pro_messages` (
  `id` int(11) NOT NULL,
  `your_name` varchar(255) NOT NULL,
  `your_email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_messages`
--

INSERT INTO `pro_messages` (`id`, `your_name`, `your_email`, `message`) VALUES
(4, 'Md Sanowar Hossen', 'sanowarwpneed@gmail.com', 'Hello, I need your help. I need a website for my business.Do you build this website for my business? And tell me How much to pay for this website');

-- --------------------------------------------------------

--
-- Table structure for table `pro_portfolios`
--

CREATE TABLE `pro_portfolios` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `portfolio_title` varchar(250) NOT NULL,
  `portfolio_slug` varchar(250) NOT NULL,
  `portfolio_description` text NOT NULL,
  `portfolio_image` varchar(255) NOT NULL,
  `portfolio_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_portfolios`
--

INSERT INTO `pro_portfolios` (`id`, `category_id`, `portfolio_title`, `portfolio_slug`, `portfolio_description`, `portfolio_image`, `portfolio_status`) VALUES
(5, 2, 'WordPress Website design', 'wordpress-website-design', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, \r\ntellus vitae condimem\r\n                                        egestliberos dolor auctor\r\n                                        tellus, eu consectetur neque \r\nelit quis nunc. Cras elementum pretiumi Nullam justo efficitur,\r\n                                        trist ligula pellentesque\r\n                                        ipsum. Quisque thsr augue ipsum,\r\n vehicula tellus maximus. Was popularised in the 1960s withs\r\n                                        the release of Letraset\r\n                                        sheets containing Lorem Ipsum \r\npassags, and more recently with desktop publishing software\r\n                                        like Aldus PageMaker including\r\n                                        versions.</p>', '64febece72fc7.jpg', 'active'),
(6, 8, 'PHP Website Development', 'php-website-development', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, \ntellus vitae condimem\n                                        egestliberos dolor auctor\n                                        tellus, eu consectetur neque \nelit quis nunc. Cras elementum pretiumi Nullam justo efficitur,\n                                        trist ligula pellentesque\n                                        ipsum. Quisque thsr augue ipsum,\n vehicula tellus maximus. Was popularised in the 1960s withs\n                                        the release of Letraset\n                                        sheets containing Lorem Ipsum \npassags, and more recently with desktop publishing software\n                                        like Aldus PageMaker including\n                                        versions.</p>', '64febe7baa9be.jpg', 'active'),
(9, 4, 'News video edit', 'news-video-edit', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, \r\ntellus vitae condimem\r\n                                        egestliberos dolor auctor\r\n                                        tellus, eu consectetur neque \r\nelit quis nunc. Cras elementum pretiumi Nullam justo efficitur,\r\n                                        trist ligula pellentesque\r\n                                        ipsum. Quisque thsr augue ipsum,\r\n vehicula tellus maximus. Was popularised in the 1960s withs\r\n                                        the release of Letraset\r\n                                        sheets containing Lorem Ipsum \r\npassags, and more recently with desktop publishing software\r\n                                        like Aldus PageMaker including\r\n                                        versions.</p><p></p>', '64ff5864ec5d5.jpg', 'active'),
(10, 8, 'eCommerce website design Wordpress', 'ecommerce-website-design-wordpress', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, \r\ntellus vitae condimem\r\n                                        egestliberos dolor auctor\r\n                                        tellus, eu consectetur neque \r\nelit quis nunc. Cras elementum pretiumi Nullam justo efficitur,\r\n                                        trist ligula pellentesque\r\n                                        ipsum. Quisque thsr augue ipsum,\r\n vehicula tellus maximus. Was popularised in the 1960s withs\r\n                                        the release of Letraset\r\n                                        sheets containing Lorem Ipsum \r\npassags, and more recently with desktop publishing software\r\n                                        like Aldus PageMaker including\r\n                                        versions.</p><p></p>', '64ff595a3f474.jpg', 'active'),
(11, 2, 'Portfolio Website', 'portfolio-website', '<p>Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, \r\ntellus vitae condimem\r\n                                        egestliberos dolor auctor\r\n                                        tellus, eu consectetur neque \r\nelit quis nunc. Cras elementum pretiumi Nullam justo efficitur,\r\n                                        trist ligula pellentesque\r\n                                        ipsum. Quisque thsr augue ipsum,\r\n vehicula tellus maximus. Was popularised in the 1960s withs\r\n                                        the release of Letraset\r\n                                        sheets containing Lorem Ipsum \r\npassags, and more recently with desktop publishing software\r\n                                        like Aldus PageMaker including\r\n                                        versions.</p><p></p>', '64ff598fe3c38.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_portfolio_categories`
--

CREATE TABLE `pro_portfolio_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_slug` varchar(100) NOT NULL,
  `category_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_portfolio_categories`
--

INSERT INTO `pro_portfolio_categories` (`id`, `category_name`, `category_slug`, `category_status`) VALUES
(2, 'Web Design', 'web-design', 'active'),
(3, 'UX/UI', 'ux-ui', 'active'),
(4, 'Video', '', 'active'),
(8, 'Web Development', 'web-development', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_services`
--

CREATE TABLE `pro_services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_description` text NOT NULL,
  `service_icon` varchar(100) NOT NULL,
  `service_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_services`
--

INSERT INTO `pro_services` (`id`, `service_title`, `service_description`, `service_icon`, `service_status`) VALUES
(2, 'Web Design', '<p>Web design is the process of planning, conceptualizing, and creating the\r\n visual and functional aspects of websites. It involves a combination of\r\n artistic creativity and technical skills to design the layout, \r\nappearance, and user experience of a website. Web designers work to \r\nstrike a balance between aesthetics and usability, ensuring that the \r\nwebsite not only looks appealing but also functions effectively for its \r\nintended audience.</p><p></p>', 'fa fa-lightbulb', 'active'),
(4, 'SEO', '<p>SEO, or Search Engine Optimization, is the practice of optimizing a website or online content to improve its visibility and ranking in search engine results pages (SERPs). The goal of SEO is to increase organic (non-paid) traffic to a website by making it more relevant and valuable to search engines and users.</p><p></p>', 'fa fa-search', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_testimonials`
--

CREATE TABLE `pro_testimonials` (
  `id` int(11) NOT NULL,
  `testimonial_quote` text NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `client_photo` varchar(100) NOT NULL,
  `testimonial_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_testimonials`
--

INSERT INTO `pro_testimonials` (`id`, `testimonial_quote`, `client_name`, `designation`, `client_photo`, `testimonial_status`) VALUES
(13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id justo et elit feugiat convallis. Vestibulum dapibus libero nec augue bibendum, in fermentum odio suscipit. Sed eu elit eu massa venenatis convallis. Sed nec tellus ac justo vehicula rhoncus. Cras eget tortor justo.', 'Monika', 'Owner & CEO', '64fd66705e23a.jpg', 'active'),
(14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id justo et elit feugiat convallis. Vestibulum dapibus libero nec augue bibendum, in fermentum odio suscipit. Sed eu elit eu massa venenatis convallis. Sed nec tellus ac justo vehicula rhoncus. Cras eget tortor justo.', 'Stuart', 'Director', '64f7a5be3a231.jpg', 'active'),
(15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id justo et elit feugiat convallis. Vestibulum dapibus libero nec augue bibendum, in fermentum odio suscipit. Sed eu elit eu massa venenatis convallis. Sed nec tellus ac justo vehicula rhoncus. Cras eget tortor justo.', 'Oliye', 'Founder & CEO', '64f7a5d554ffa.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pro_users`
--

CREATE TABLE `pro_users` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_photo` varchar(200) NOT NULL DEFAULT 'profile_photo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_users`
--

INSERT INTO `pro_users` (`id`, `name`, `email`, `password`, `profile_photo`) VALUES
(1, 'rakib', 'rakib@gmail.com', 'admin#12345aA!', 'profile_photo.jpg'),
(2, 'Vielka', 'wadyjeqe@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'profile_photo.jpg'),
(3, 'sanowar', 'sanowarwpneed@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'sanowar.png'),
(6, 'Mosharof', 'mosharaf@gmail.com', 'ba4b456683cf24fdabcfb2508e147017', 'profile_photo.jpg'),
(7, 'Utsob', 'utsob@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Utsob.jpg'),
(8, 'Ashiq', 'ashik@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Ashiq.jpg'),
(9, 'Tanvir', 'tanvir@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Tanvir.jpeg'),
(10, 'Mou', 'mou@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Mou.jpg'),
(11, 'Alamin', 'alamin@gmail.com', '9f576df9f25356e99403745432b01a55', 'profile_photo.jpg'),
(12, 'Fariha', 'fariha@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'profile_photo.jpg'),
(13, 'Mark', 'mark@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'profile_photo.jpg'),
(14, 'Alina', 'alinaseema@gmail.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Alina.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pro_abouts`
--
ALTER TABLE `pro_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_banners`
--
ALTER TABLE `pro_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_brands`
--
ALTER TABLE `pro_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_contact_infos`
--
ALTER TABLE `pro_contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_facts`
--
ALTER TABLE `pro_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_logos`
--
ALTER TABLE `pro_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_messages`
--
ALTER TABLE `pro_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_portfolios`
--
ALTER TABLE `pro_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_portfolio_categories`
--
ALTER TABLE `pro_portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_services`
--
ALTER TABLE `pro_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_testimonials`
--
ALTER TABLE `pro_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_users`
--
ALTER TABLE `pro_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pro_abouts`
--
ALTER TABLE `pro_abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pro_banners`
--
ALTER TABLE `pro_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pro_brands`
--
ALTER TABLE `pro_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pro_contact_infos`
--
ALTER TABLE `pro_contact_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pro_facts`
--
ALTER TABLE `pro_facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pro_logos`
--
ALTER TABLE `pro_logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pro_messages`
--
ALTER TABLE `pro_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pro_portfolios`
--
ALTER TABLE `pro_portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pro_portfolio_categories`
--
ALTER TABLE `pro_portfolio_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pro_services`
--
ALTER TABLE `pro_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pro_testimonials`
--
ALTER TABLE `pro_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pro_users`
--
ALTER TABLE `pro_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
