-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2020 at 02:34 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film_tropes`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `movie_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `movie_image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'movie_image(Poster)',
  `released_date` date NOT NULL,
  `add_by` int DEFAULT NULL COMMENT 'userid',
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Bollywood, Drama, Action'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie_name`, `description`, `movie_image`, `released_date`, `add_by`, `category`) VALUES
(1, 'Thor Ragnrok 10', '                                                                            thor: Ragnarok is a 2017 American superhero film based on the Marvel Comics character Thor, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures.                                                            ', 'thor-ragnarok.jpg', '2017-11-03', 1, 'Bollywood, Drama, Action'),
(2, 'Iron man ', 'It was directed by Jon Favreau from a screenplay by the writing teams of Mark Fergus and Hawk Ostby, and Art Marcum and Matt Holloway, and stars Robert Downey Jr. as Tony Stark / Iron Man alongside Terrence Howard, Jeff Bridges, Shaun Toub, and Gwyneth Paltrow. ', 'iron-man.jpg', '2008-05-01', 1, 'Bollywood, Drama, Action'),
(3, 'Iron man 2', 'Iron Man 2 premiered at the El Capitan Theatre on April 26, 2010, and was released in the United States on May 7, as part of Phase One of the MCU. ', 'iron-man-2.jpeg', '2010-05-07', 1, 'Bollywood, Drama, Action'),
(4, 'Iron man 3', 'Iron Man 3 is a 2013 American superhero film based on the Marvel Comics character Iron Man, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures.[N 1] It is the sequel to Iron Man (2008) and Iron Man 2 (2010), and the seventh film in the Marvel Cinematic Universe (MCU). ', 'Iron_Man_3.jpg', '2013-04-26', 2, 'Bollywood, Drama, Action'),
(5, 'Avengers Endgame', 'The film was announced in October 2014 as Avengers: Infinity War – Part 2, but Marvel later removed this title. The Russo brothers joined as directors in April 2015, with Markus and McFeely signing on to write the script a month later.', 'Avengers_Endgame.jpg', '2019-04-26', 2, 'Bollywood, Drama, Action'),
(6, 'Captain America: Civil War', '                Captain America: Civil War held its world premiere in Los Angeles on April 12, 2016, and was released in the United States on May 6, as the first film in Phase Three of the MCU.', 'captain_america_civil_war.jpg', '2016-05-06', 3, 'Bollywood, Drama, Action'),
(7, 'Guardians of the Galaxy', 'Guardians of the Galaxy (retroactively referred to as Guardians of the Galaxy Vol. 1) is a 2014 American superhero film based on the Marvel Comics superhero team of the same name. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is the 10th film in the Marvel Cinematic Universe (MCU). ', 'Guardians_of_the_Galaxy_poster.jpg', '2014-08-08', 3, 'Bollywood, Drama, Action');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `username`, `password`) VALUES
(1, 'Mitesh Ladva', 'miteshladva.dgrs@gmail.com', 'mitesh_ladva', '1234'),
(2, 'Meetesh Ladva', 'mitesh@freshbits.in', 'ladva_mitesh', '12345'),
(3, 'Alisha Sen', 'alisa_sen@gmail.com', 'alisha_shen', '1234'),
(4, 'kinjal ladva', 'kinjal123@gmail.com', 'kinjal_89', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD UNIQUE KEY `post_id` (`id`),
  ADD UNIQUE KEY `movie_name` (`movie_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
