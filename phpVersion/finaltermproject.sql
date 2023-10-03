-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 09:45 PM
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
-- Database: `finaltermproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color` varchar(127) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color`) VALUES
(1, 'red'),
(2, 'deepskyblue'),
(3, 'mediumseagreen'),
(4, 'mediumpurple'),
(5, 'pink'),
(6, 'lightslategray'),
(7, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `items_sale`
--

CREATE TABLE `items_sale` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items_sale`
--

INSERT INTO `items_sale` (`item_id`, `name`, `price`, `category`, `description`) VALUES
(1, 'US Cyber Challenge\'s Cyber Quests', '500', 1, 'The Cyber Quests are a series of fun and challenging online competitions. They allow participants to demonstrate their knowledge in a variety of information security realms. Each quest features an artifact for analysis, along with a series of quiz questions.'),
(2, 'K-12 Computer Science Framework', '299.99', 1, 'This resource is a collaboration between the Association for Computing Machinery, Code.org, Computer Science Teachers Association, Cyber Innovation Center, and National Math and Science Initiative. The K-12 computer science framework helps inform the development of standards and curriculum to build a capacity for teaching computer science.'),
(3, 'FBI\'s Safe Online Surfing', '59.99', 1, 'This software has entertaining games and teacher resources to keep children of all ages safe online.'),
(4, 'Interland', '20.00', 2, 'Interland is part of Google\'s Be Internet Awesome Program, which has lots of great resources for parents and teachers to educate children about internet safety. This game lets children play as a little robotic Internaut, learning all about cyberbullying, phishing, data protection, and more. This is taught through a variety of mini-games that are spread out across floating islands.'),
(5, 'The Case of the Cyber Criminal', '15.99', 2, 'Who knew that cyber criminals shopped at Spymart? This game\'s fun concept has children answering quiz questions in order to take down a cyber criminal. For each question answered correctly, players can remove a dangerous gadget from the criminal\'s suitcase.'),
(6, 'Band Runner', '18.99', 2, 'Internet safety aside, Band Runner is a fun game in its own right. Children choose to play as Ellie or Sam and must time their jumps correctly to help them avoid obstacles. They can also use their guitars to help demolish the blockers-Ellie and Sam are on their way to a gig, after all!'),
(7, 'Privacy Pirates', '19.99', 2, 'It\'s important for children to know how to protect their personal information online and Privacy Pirates is a great game to help teach them. The aim is to put together a map that will eventually lead to some pirate treasure.Brought to life with fun cartoon graphics and voice-overs, this game uses quiz questions to help children understand the value of their privacy and how context can impact what information should be shared.'),
(8, 'The Little Cyber Engineer', '1.99', 3, 'Are we living in a world where all hackers are evil and pie-eating robots hide inside of servers? Struggling to simplify the complex world of cybersecurity is now a thing of the past! Sure to be a bedtime favorite, this fun-to-follow book is full of rhymes and whimsical illustrations, making it the perfect introduction to IT Security for children…and even some adults!'),
(9, 'The Mighty Threat Intelligence Warrior', '3.99', 3, 'Why are dragons so tricky? The only way to find out is to study their behavior. This is exactly what the Mighty Threat Intelligence Warrior does to help keep the kingdom safe. Learning about menacing foes in the kingdom can help prevent future attacks. This charmingly illustrated picture book celebrates a woman in STEM and introduces children to threat intelligence concepts through a whimsical medieval tale. From analyzing complex threats to providing actionable advice, the Mighty Threat Intelli'),
(10, 'Coding for Kids: Python: Learn to Code with 50 Awesome Games and Activities', '5.99', 3, 'Learning to code isn\'t as hard as it sounds—you just have to get started! Coding for Kids: Python starts kids off right with 50 fun, interactive activities that teach them the basics of the Python programming language. From learning the essential building blocks of programming to creating their very own games, kids will progress through unique lessons packed with helpful examples—and a little silliness!'),
(11, 'The Official Scratch Coding Cards (Scratch 3.0): Creative Coding Activities for Kids Cards', '15.99', 3, 'Now updated for Scratch 3.0, this 75-card deck features interactive programming projects you can make with Scratch, a free-to-use graphical programming language used by millions of kids around the world. The front of each card shows an activity, like Pong, Write an Interactive Story, Create a Virtual Pet, Play Hide and Seek. The back shows how to put code blocks together to make projects come to life! Along the way, kids learn coding concepts like sequencing, conditionals, and variables.'),
(12, 'Teaching Cyber Safety to Kids: A Guide for Parents and Educators', '7.99', 3, 'Teaching Cyber Safety to Kids: A Guide for Parents and Educators is a comprehensive guide for parents and educators to help children navigate the digital world safely. The book covers topics such as cyberbullying, online predators, identity theft, and social media safety.');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `category_id` int(11) NOT NULL,
  `cat_name` varchar(127) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`category_id`, `cat_name`) VALUES
(1, 'software'),
(2, 'games'),
(3, 'textbooks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `order_items` varchar(300) DEFAULT NULL,
  `order_total` int(11) DEFAULT NULL,
  `orderer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `phone`, `address`, `order_items`, `order_total`, `orderer`) VALUES
(1, '111-111-1111', '812 Jarvis Avenue Far Rockaway NY 11691', 'K-12 Computer Science Framework, Interland', 320, 18),
(2, '123-123-1234', '812 Jarvis Avenue far rockaway NY 11691', 'K-12 Computer Science Framework, Interland', 320, 18),
(3, '347-924-4669', '812 Jarvis Avenue Far Rockaway NY 11691', 'Band Runner, The Official Scratch Coding Cards (Scratch 3.0): Creative Coding Activities for Kids Cards, Teaching Cyber Safety to Kids: A Guide for Parents and Educators', 43, 18);

-- --------------------------------------------------------

--
-- Table structure for table `quizq`
--

CREATE TABLE `quizq` (
  `question_id` int(11) NOT NULL,
  `question` varchar(500) DEFAULT NULL,
  `a1` varchar(500) DEFAULT NULL,
  `a2` varchar(500) DEFAULT NULL,
  `a3` varchar(500) DEFAULT NULL,
  `a4` varchar(500) DEFAULT NULL,
  `a5` varchar(500) DEFAULT NULL,
  `correctanswer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quizq`
--

INSERT INTO `quizq` (`question_id`, `question`, `a1`, `a2`, `a3`, `a4`, `a5`, `correctanswer`) VALUES
(1, 'You have the responsibility to keep:', 'Yourself safe', 'Your stuff safe', 'Your cookies safe', 'both A and B', 'Both B and C', 4),
(2, 'Who do you tell if you see something harmful online?', 'Your parents', 'Your teachers', 'A trusted adult', 'All of the above', NULL, 4),
(3, 'What is personal information?', 'Your shoe', 'Your address', 'The pizza restaurant phone number', NULL, '', 2),
(4, 'You can totally share your password with your best friend, you trust them!', 'True', 'False', NULL, NULL, NULL, 2),
(5, 'Which of the following is an online threat?', 'Identity Theft', 'Phishing', 'Surfing', 'both A and B', 'Both A and C', 4),
(6, 'What should you do if  you are online and someone you do not know messages you claiming to be a student at a nearby school?', 'So not accept their invitation to chat (it could be someone trying to trick you)', 'Accept the invite and make a new friend!', NULL, NULL, NULL, 1),
(7, 'Whatever you post online will stay there forever even if you delete it.', 'True', 'False', NULL, NULL, NULL, 1),
(8, 'What do you do if someone is bullying you online?', 'Ask them to please stop', 'Say you will tell on them', 'Stop,block, tell an adult', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usercategory`
--

CREATE TABLE `usercategory` (
  `category_id` int(11) NOT NULL,
  `category` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usercategory`
--

INSERT INTO `usercategory` (`category_id`, `category`) VALUES
(1, 'student'),
(2, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `profilecolor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `category`, `name`, `email`, `password`, `score`, `profilecolor`) VALUES
(1, 1, 'jhfj', 'mbrsoffer@gmail.com', '675675674', 0, 4),
(2, 1, 'Meira Soffer', 'mbrsoffer@gmail.com', 'jghjg', 0, 3),
(3, 1, '56456', 'mbrsoffer@gmail.com', '65464', 0, 3),
(4, 1, 'Michelle Soffer', 'mbrsoffer@gmail.com', 'rtetewr', 0, 2),
(5, 1, 'msojdif', 'mbrsoffer@gmail.com', 'asdfasdf', 0, 1),
(6, 1, 'bleep', 'bleep@', '1234', 0, 1),
(7, 1, 'sicko', 'sicka@ha', '123456', 2, 7),
(8, 1, 'meepers', 'meepers@hi', '123', 0, 5),
(11, 1, 'mustgum123', 'msoffer519@gmail.com', 'a415341814bbdda6576ad352cda84095', 0, 7),
(12, 1, 'mustgum123', 'm@gmail.com', 'aeb289c6fb4ddd562a9e567a4e88503b', 0, 7),
(13, 1, 'mustgum123', 's@gmail', 'e3c7eedee16a0dc985808ae695ef03f9', 0, 5),
(14, 1, 'meira1812', 'ms@gmail.com', 'ec166243e5b460eb9f8150128abc0c03', 0, 4),
(15, 2, 'blobby500', 'blobbybloo@gmail.com', 'e3c7eedee16a0dc985808ae695ef03f9', 0, 2),
(16, 1, 'mustgum123', 'hiya@gmail.com', 'e3c7eedee16a0dc985808ae695ef03f9', 0, 1),
(17, 2, 'teacher', ' teacher@gmail.com', 'e3c7eedee16a0dc985808ae695ef03f9', 0, 6),
(18, 2, 'teacher', 'teacher@gmail.com', 'e3c7eedee16a0dc985808ae695ef03f9', 0, 4),
(19, 2, 'asdf', '4311791@gmail.com', 'a07916f26e62ee7c9c5c2b78f2d7606f', 0, 3),
(20, 2, 'bloppy', 'mbrsoffer@gmail.com', 'a07916f26e62ee7c9c5c2b78f2d7606f', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `items_sale`
--
ALTER TABLE `items_sale`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_salecat` (`category`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `quizq`
--
ALTER TABLE `quizq`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `usercategory`
--
ALTER TABLE `usercategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`),
  ADD KEY `fk_color` (`profilecolor`),
  ADD KEY `fk_uscat` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items_sale`
--
ALTER TABLE `items_sale`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quizq`
--
ALTER TABLE `quizq`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usercategory`
--
ALTER TABLE `usercategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items_sale`
--
ALTER TABLE `items_sale`
  ADD CONSTRAINT `fk_salecat` FOREIGN KEY (`category`) REFERENCES `item_category` (`category_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_color` FOREIGN KEY (`profilecolor`) REFERENCES `colors` (`color_id`),
  ADD CONSTRAINT `fk_uscat` FOREIGN KEY (`category`) REFERENCES `usercategory` (`category_id`),
  ADD CONSTRAINT `fk_userc` FOREIGN KEY (`category`) REFERENCES `usercategory` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
