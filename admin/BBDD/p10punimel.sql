DROP DATABASE IF EXISTS `u426697635_p10pu`;
CREATE DATABASE `u426697635_p10pu`;
USE `u426697635_p10pu`;
-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p10punimel`
--

-- --------------------------------------------------------

--
-- Table structure for table `p10p_academies`
--

CREATE TABLE `p10p_academies` (
  `id_academy` int(11) NOT NULL,
  `location` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_academies`
--

INSERT INTO `p10p_academies` (`id_academy`, `location`) VALUES
(1, 'Valencia'),
(2, 'Alicante'),
(3, 'Burriana'),
(4, 'Elche'),
(5, 'Gandía'),
(6, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `p10p_courses`
--

CREATE TABLE `p10p_courses` (
  `id_course` int(11) NOT NULL,
  `course_name` varchar(35) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_courses`
--

INSERT INTO `p10p_courses` (`id_course`, `course_name`, `start_date`, `end_date`) VALUES
(1, 'Educación Infantil', '2016-09-17', '2017-06-17'),
(2, 'Educación Primaria', '2016-09-17', '2017-06-17'),
(3, 'Inglés', '2016-09-17', '2017-06-17'),
(4, 'Educación Física', '2016-09-17', '2017-06-17'),
(5, 'Música', '2016-09-17', '2017-06-17'),
(6, 'Pedagogía Terapéutica', '2016-09-17', '2017-06-17'),
(7, 'Audición y Lenguaje', '2016-09-17', '2017-06-17'),
(8, 'Prueba', '2017-01-13', '2017-01-18'),
(9, 'Lhjljkl', '2017-02-10', '2017-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `p10p_groups`
--

CREATE TABLE `p10p_groups` (
  `id_group` int(11) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `group` varchar(3) DEFAULT NULL,
  `day` varchar(10) DEFAULT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_academy` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_groups`
--

INSERT INTO `p10p_groups` (`id_group`, `type`, `group`, `day`, `id_teacher`, `id_course`, `id_academy`) VALUES
(1, 'Presencial', 'A', 'Lunes', 1, 1, 1),
(2, 'Presencial', 'B', 'Lunes', 2, 1, 1),
(3, 'Presencial', 'C', 'Lunes', 1, 1, 1),
(4, 'Presencial', 'A', 'Sábado', 2, 1, 1),
(5, 'Presencial', 'B', 'Sábado', 1, 1, 1),
(6, 'Presencial', 'A', 'Martes', 2, 1, 1),
(7, 'Presencial', 'B', 'Martes', 1, 1, 1),
(8, 'Online', 'A', 'Online', 2, 1, 6),
(9, 'Online', 'B', 'Online', 1, 1, 6),
(10, 'Presencial', 'A', 'Lunes', 2, 1, 2),
(11, 'Presencial', 'A', 'Sábado', 1, 1, 2),
(12, 'Presencial', 'A', 'Sábado', 2, 1, 3),
(13, 'Presencial', 'A', 'Jueves', 5, 1, 4),
(14, 'Presencial', 'A', 'Sábado', 8, 1, 4),
(15, 'Presencial', 'A', 'Lunes', 7, 1, 5),
(16, 'Presencial', 'A', 'Sábado', 4, 1, 5),
(17, 'Presencial', 'A', 'Miércoles', 1, 2, 1),
(18, 'Presencial', 'B', 'Miércoles', 2, 2, 1),
(19, 'Presencial', 'C', 'Miércoles', 1, 2, 1),
(20, 'Presencial', 'A', 'Sábado', 2, 2, 1),
(21, 'Presencial', 'B', 'Sábado', 1, 2, 1),
(22, 'Presencial', 'A', 'Jueves', 2, 2, 1),
(23, 'Presencial', 'A', 'Miércoles', 1, 2, 2),
(24, 'Presencial', 'B', 'Miércoles', 2, 2, 2),
(25, 'Presencial', 'A', 'Sábado', 1, 2, 2),
(26, 'Presencial', 'A', 'Miércoles', 2, 2, 3),
(27, 'Presencial', 'A', 'Sábado', 6, 2, 3),
(28, 'Presencial', 'A', 'Jueves', 2, 2, 4),
(29, 'Presencial', 'B', 'Jueves', 1, 2, 4),
(30, 'Presencial', 'A', 'Sábado', 2, 2, 4),
(31, 'Presencial', 'A', 'Miércoles', 1, 2, 5),
(32, 'Presencial', 'A', 'Martes', 2, 2, 5),
(33, 'Presencial', 'A', 'Sábado', 1, 2, 5),
(34, 'Online', 'A', 'Online', 2, 2, 6),
(35, 'Online', 'B', 'Online', 1, 2, 6),
(36, 'Online', 'C', 'Online', 2, 2, 6),
(37, 'Presencial', 'A', 'Martes', 1, 3, 1),
(38, 'Presencial', 'A', 'Sábado', 2, 3, 1),
(39, 'Presencial', 'A', 'Sábado', 1, 3, 2),
(40, 'Presencial', 'A', 'Miércoles', 2, 3, 4),
(41, 'Presencial', 'A', 'Sábado', 1, 3, 4),
(42, 'Presencial', 'A', 'Martes', 2, 3, 5),
(43, 'Presencial', 'A', 'Sábado', 1, 3, 5),
(44, 'Online', 'A', 'Online', 2, 3, 6),
(45, 'Presencial', 'A', 'Martes', 1, 4, 1),
(46, 'Presencial', 'B', 'Martes', 2, 4, 1),
(47, 'Presencial', 'A', 'Sábado', 1, 4, 1),
(48, 'Presencial', 'A', 'Lunes', 2, 4, 2),
(49, 'Presencial', 'A', 'Martes', 6, 4, 5),
(50, 'Presencial', 'A', 'Sábado', 2, 5, 1),
(51, 'Presencial', 'A', 'Jueves', 1, 6, 1),
(52, 'Presencial', 'A', 'Sábado', 2, 6, 1),
(53, 'Presencial', 'A', 'Jueves', 1, 6, 2),
(54, 'Presencial', 'A', 'Jueves', 2, 6, 4),
(76, 'General', 'A', 'General', 1, 1, 1),
(77, 'General', 'A', 'General', 1, 8, 4),
(79, 'General', 'A', 'General', 1, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `p10p_payments`
--

CREATE TABLE `p10p_payments` (
  `id_payment` int(11) NOT NULL,
  `method` varchar(20) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `pay_date` datetime DEFAULT NULL,
  `concept` varchar(25) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `pay_stage` varchar(20) DEFAULT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_payments`
--

INSERT INTO `p10p_payments` (`id_payment`, `method`, `amount`, `pay_date`, `concept`, `month`, `pay_stage`, `id_student`) VALUES
(2, 'Transferencia', '75.00', '2015-01-16 09:54:52', 'Reserva', 'Septiembre', 'Pagado', 48),
(5, 'Domiciliacion', '50.00', '2015-10-16 11:34:22', 'Materiales', 'Octubre', 'Pagado', 2),
(7, 'Domiciliacion', '100.00', '2017-02-01 13:42:14', 'Mensualidad', 'Febrero', 'Pagado', 78),
(10, 'Transferencia', '152.20', '2017-02-02 10:08:23', 'Mensualidad', 'Febrero', 'Devolucion', 38),
(12, 'Domiciliacion', '150.00', '2017-02-02 11:27:37', 'Mensualidad', 'Febrero', 'Exento', 9),
(13, 'Domiciliacion', '150.00', '2017-02-02 13:11:06', 'Mensualidad', 'Febrero', 'Pendiente', 30),
(15, 'Domiciliacion', '75.00', '2017-02-10 03:09:52', 'Reserva', 'Septiembre', 'Pagado', 1),
(16, 'Domiciliacion', '50.00', '2017-01-08 11:28:28', 'Mensualidad', 'Enero', 'Devolucion', 1),
(17, 'Domiciliacion', '75.00', '2017-02-10 04:21:18', 'Reserva', 'Septiembre', 'Pagado', 4),
(18, 'Domiciliacion', '75.00', '2017-02-11 23:43:27', 'Mensualidad', 'Mayo', 'Pagado', 5),
(19, 'Domiciliacion', '150.00', '2017-02-12 20:40:03', 'Mensualidad', 'Febrero', 'Pagado', 31),
(20, 'Transferencia', '50.00', '2017-02-12 20:40:33', 'Materiales', 'Octubre', 'Pagado', 31),
(21, 'Domiciliacion', '150.00', '2017-02-12 20:40:46', 'Mensualidad', 'Enero', 'Devolucion', 31),
(22, 'Domiciliacion', '50.00', '2017-02-12 21:53:24', 'Materiales', 'Octubre', 'Pagado', 7),
(23, 'Domiciliacion', '50.00', '2017-02-12 21:53:24', 'Materiales', 'Octubre', 'Pagado', 10),
(24, 'Domiciliacion', '50.00', '2017-02-12 21:53:24', 'Materiales', 'Octubre', 'Pagado', 14),
(25, 'Domiciliacion', '50.00', '2017-02-12 21:53:24', 'Materiales', 'Octubre', 'Pagado', 17),
(26, 'Domiciliacion', '50.00', '2017-02-12 21:53:24', 'Materiales', 'Octubre', 'Pagado', 19),
(27, 'Domiciliacion', '50.00', '2017-02-12 21:53:24', 'Materiales', 'Octubre', 'Pagado', 20),
(28, 'Domiciliacion', '50.00', '2017-02-12 21:55:36', 'Materiales', 'Octubre', 'Pagado', 3),
(29, 'Domiciliacion', '50.00', '2017-02-12 21:55:36', 'Materiales', 'Octubre', 'Pagado', 6),
(30, 'Domiciliacion', '50.00', '2017-02-12 21:55:36', 'Materiales', 'Octubre', 'Pagado', 15),
(31, 'Domiciliacion', '50.00', '2017-02-12 21:55:36', 'Materiales', 'Octubre', 'Pagado', 21),
(32, 'Domiciliacion', '50.00', '2017-02-12 21:55:36', 'Materiales', 'Octubre', 'Pagado', 23),
(33, 'Domiciliacion', '50.00', '2017-02-12 21:55:36', 'Materiales', 'Octubre', 'Pagado', 24),
(34, 'Transferencia', '50.00', '2017-02-12 22:00:14', 'Materiales', 'Octubre', 'Pagado', 33),
(35, 'Tarjeta', '50.00', '2017-02-12 22:01:09', 'Materiales', 'Octubre', 'Devolucion', 49),
(36, 'Domiciliacion', '150.00', '2017-02-13 02:02:41', 'Mensualidad', 'Julio', 'Pagado', 25),
(37, 'Domiciliacion', '150.00', '2017-02-13 02:02:41', 'Mensualidad', 'Julio', 'Pagado', 28),
(38, 'Domiciliacion', '150.00', '2017-02-13 02:02:41', 'Mensualidad', 'Julio', 'Pagado', 35),
(39, 'Domiciliacion', '150.00', '2017-02-13 02:02:41', 'Mensualidad', 'Julio', 'Pagado', 37);

-- --------------------------------------------------------

--
-- Table structure for table `p10p_refunds`
--

CREATE TABLE `p10p_refunds` (
  `id_refund` int(11) NOT NULL,
  `ref_date` datetime DEFAULT NULL,
  `ref_concept` varchar(25) DEFAULT NULL,
  `id_payment` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_refunds`
--

INSERT INTO `p10p_refunds` (`id_refund`, `ref_date`, `ref_concept`, `id_payment`) VALUES
(1, '2017-02-10 05:33:41', '', 16),
(2, '2017-02-10 05:36:56', 'pruebaaa', 10),
(4, '2017-02-12 20:40:57', 'testt', 21),
(5, '2017-02-12 22:01:46', 'Pago devuelto por insufic', 35);

-- --------------------------------------------------------

--
-- Table structure for table `p10p_stats`
--

CREATE TABLE `p10p_stats` (
  `id_stat` int(11) NOT NULL,
  `total_students` int(11) DEFAULT NULL,
  `total_cancelled` int(11) DEFAULT NULL,
  `total_enrolled` int(11) DEFAULT NULL,
  `total_invoiced` decimal(15,2) DEFAULT NULL,
  `total_refunded` decimal(15,2) DEFAULT NULL,
  `date` datetime NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_stats`
--

INSERT INTO `p10p_stats` (`id_stat`, `total_students`, `total_cancelled`, `total_enrolled`, `total_invoiced`, `total_refunded`, `date`, `id_group`) VALUES
(9, 2, 1, 0, '0.00', '0.00', '2017-02-12 18:30:30', 5),
(10, 3, 0, 0, '0.00', '0.00', '2017-02-12 18:30:38', 5),
(11, 3, 0, 0, '0.00', '0.00', '2017-02-12 18:31:20', 1),
(12, 1, 0, 0, '0.00', '0.00', '2017-02-12 19:17:51', 7),
(13, 1, 1, 0, '0.00', '0.00', '2017-02-12 19:20:14', 4),
(14, 1, 1, 0, '0.00', '0.00', '2017-02-12 19:26:11', 3),
(15, 1, 1, 0, '75.00', '0.00', '2017-02-12 19:28:29', 4),
(16, 1, 1, 0, '0.00', '0.00', '2017-02-12 19:29:18', 15),
(17, 3, 1, 0, '0.00', '50.00', '2017-02-12 19:30:02', 1),
(18, 1, 1, 0, '0.00', '0.00', '2017-02-12 20:04:20', 50),
(19, 0, 1, 0, '0.00', '0.00', '2017-02-12 20:04:35', 7),
(20, 0, 1, 0, '0.00', '0.00', '2017-02-12 20:04:43', 39),
(21, 10, 0, 0, '75.00', '50.00', '2017-02-12 20:06:12', 9),
(22, 0, 1, 0, '0.00', '0.00', '2017-02-12 20:07:19', 45),
(23, 2, 0, 0, '75.00', '0.00', '2017-02-12 20:07:26', 4),
(24, 2, 0, 0, '0.00', '0.00', '2017-02-12 20:07:26', 2),
(25, 2, 0, 0, '0.00', '0.00', '2017-02-12 20:07:26', 15),
(26, 4, 0, 0, '0.00', '50.00', '2017-02-12 20:07:26', 1),
(27, 2, 0, 0, '0.00', '0.00', '2017-02-12 20:07:26', 50),
(28, 1, 0, 0, '0.00', '0.00', '2017-02-12 20:07:26', 7),
(29, 1, 0, 0, '0.00', '0.00', '2017-02-12 20:07:26', 39),
(30, 1, 0, 0, '0.00', '0.00', '2017-02-12 20:07:26', 45),
(31, 3, 1, 0, '0.00', '50.00', '2017-02-12 20:10:15', 1),
(32, 2, 2, 0, '0.00', '50.00', '2017-02-12 20:10:19', 1),
(33, 1, 1, 0, '0.00', '0.00', '2017-02-12 20:10:33', 15),
(34, 0, 1, 0, '0.00', '0.00', '2017-02-12 20:10:40', 32),
(35, 1, 1, 0, '0.00', '0.00', '2017-02-12 20:10:53', 14),
(36, 0, 1, 0, '0.00', '0.00', '2017-02-12 20:10:53', 19),
(37, 0, 0, 0, '0.00', '0.00', '2017-02-12 20:10:53', 30),
(38, 1, 1, 0, '175.00', '0.00', '2017-02-12 20:10:53', 53),
(39, 0, 3, 0, '0.00', '50.00', '2017-02-12 20:13:49', 1),
(40, 1, 2, 0, '0.00', '50.00', '2017-02-12 20:13:57', 1),
(41, 0, 3, 1, '0.00', '50.00', '2017-02-12 20:15:23', 1),
(42, 0, 3, 1, '0.00', '50.00', '2017-02-12 20:15:28', 1),
(43, 1, 2, 1, '0.00', '50.00', '2017-02-12 20:15:58', 1),
(44, 1, 3, 1, '0.00', '50.00', '2017-02-12 20:38:56', 1),
(45, 2, 2, 1, '0.00', '50.00', '2017-02-12 20:39:28', 1),
(46, 1, 3, 1, '200.00', '200.00', '2017-02-12 20:41:18', 1),
(53, 2, 0, 0, '50.00', '0.00', '2017-02-12 21:55:36', 2),
(54, 3, 0, 0, '50.00', '0.00', '2017-02-12 21:55:36', 5),
(55, 3, 1, 0, '0.00', '0.00', '2017-02-12 21:55:36', 12),
(56, 3, 0, 0, '100.00', '0.00', '2017-02-12 21:55:36', 5),
(57, 3, 1, 0, '50.00', '0.00', '2017-02-12 21:55:36', 12),
(58, 1, 0, 0, '0.00', '0.00', '2017-02-12 21:55:36', 23),
(59, 2, 0, 0, '50.00', '0.00', '2017-02-12 22:00:14', 37),
(60, 1, 0, 0, '50.00', '0.00', '2017-02-12 22:01:09', 54),
(61, 1, 0, 0, '0.00', '50.00', '2017-02-12 22:01:46', 54),
(62, 0, 0, 1, '0.00', '0.00', '2017-02-12 23:30:24', 77),
(63, 1, 0, 1, '0.00', '0.00', '2017-02-12 23:32:38', 8),
(64, 1, 0, 0, '75.00', '0.00', '2017-02-13 01:51:36', 4),
(65, 3, 1, 0, '50.00', '0.00', '2017-02-13 02:02:41', 12),
(66, 1, 0, 0, '0.00', '0.00', '2017-02-13 02:02:41', 23),
(67, 1, 0, 0, '150.00', '0.00', '2017-02-13 02:02:41', 26),
(68, 2, 0, 0, '0.00', '0.00', '2017-02-13 02:02:41', 27),
(69, 2, 0, 1, '0.00', '0.00', '2017-02-13 02:04:32', 27),
(70, 2, 0, 2, '0.00', '0.00', '2017-02-13 02:04:32', 27),
(71, 2, 1, 0, '0.00', '0.00', '2017-02-13 02:05:30', 10);

-- --------------------------------------------------------

--
-- Table structure for table `p10p_students`
--

CREATE TABLE `p10p_students` (
  `id_student` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `surname2` varchar(45) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel_home` int(9) DEFAULT NULL,
  `tel_mobile` int(9) DEFAULT NULL,
  `account` varchar(45) DEFAULT NULL,
  `stage` varchar(15) DEFAULT NULL,
  `discovery` varchar(20) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `ex_student` tinyint(1) DEFAULT NULL,
  `enrolled_date` datetime DEFAULT NULL,
  `signed_date` datetime DEFAULT NULL,
  `cancelled_date` datetime DEFAULT NULL,
  `ended_date` datetime DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postal_code` int(5) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `absents` int(11) DEFAULT NULL,
  `comments` text,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_students`
--

INSERT INTO `p10p_students` (`id_student`, `name`, `surname`, `surname2`, `dni`, `email`, `tel_home`, `tel_mobile`, `account`, `stage`, `discovery`, `newsletter`, `ex_student`, `enrolled_date`, `signed_date`, `cancelled_date`, `ended_date`, `address`, `postal_code`, `district`, `absents`, `comments`, `id_group`) VALUES
(1, 'LU2vbNPaUGY+lzn+qLXz7H6DOvLnAIjPnxxNcS5oQSc=', 'SJqFAkfQcaPi+qSL67Bms9jKrYBvxy0uu4Ht2yIBOGw=', 'wRqOPVBXOIRIUSdJC2mbhIzSV4ryCHt1BSUJLG1P3R8=', 'JYlyWHGjPLa+192fYTKVpVKm4CFajif22acm/MBQDfY=', 'Mdfz4su2/ngeXwq1nUj957cwID+pGOCRTUpdIDLYgz4=', 963548712, 654789145, '02QPGuPS5xURVXtbS3Bt9w5cu55yamEbBd4GMzBGUIM=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'xcvxcvxcv', 9),
(2, '2zb0W6sNFWV2+D0Qo8WcP9xKlfKP0D2k/MPkLaceHJk=', 'ecRMuvw85PA6zuREXHx2a/W/JipeKTig1clmcE4XqWk=', 'tdjMGHlwYr9Yw4XqOQUKSuh44cO6OwjT1xvHGg5Z53c=', '30fKrDlQaZAPGrFsRjfJvdin9aOxn4NDt3t936J2Mtg=', 'IyI7DJGBeTIpQuEgjU+g+hbQEfhjqHrRnInNoEo6xt0=', 963548712, 651750840, '4Q5+np0w/b82i7mnRSHwBZ4ZHkKnvH/L6P21h2ppQ5o=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:15:58', '2017-02-12 20:10:15', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 1),
(3, '7/KxUiN8xrlbq1R5Gs5BXaK/N7vJjzPWcdOPRGSspuY=', '+ZN1yaAmLv6pj2qNFqukr41YkQPGzzy8b4t8oXqWXKY=', '3lhJNIbmWPYk3xBuTGlNtIkYloiTN25SA8AhqfQ8t/0=', 'ZDMdJsh9fZ+RClvdtXnNvXtgRzi9pjhLaQwXU34PngM=', '2V8I/zKpWgfgJ9MWo4G8EIJ+al8Dqxr+OXYW4IBBKXA=', 963548712, 654789321, '2LLeBZWEauMIcMRz5ekkSxPAa1iFD7o5M5qKOFD6lKM=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:07:26', '2017-02-10 03:11:28', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'xcvxcvxcvtyrytuy', 2),
(4, 'ZS4DlgiKFywi1RhDEkB89ivkT8JXTqeYC94PWBMqYnM=', 'RnYQi9L5MeM/YnSQlA0uO5hG49oN62gDbJLd3bmSUT8=', '+ZN1yaAmLv6pj2qNFqukr41YkQPGzzy8b4t8oXqWXKY=', 'FAr6UiIo9hIOzp/x8Bl9xpcTr8Zo8IwKEmKcjLx+fz4=', 'nQmcIEUHhcZZ6UWXhB8sjSOsZ9USIXWmZDJ9FQlFxbE=', 963548712, 651750840, '64AhIofCwVjErqBuQ5QNjYFzuQssVE/Zvre05U+i1Q0=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 19:28:29', '2017-02-12 19:26:11', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'vncvbnvbnvb', 3),
(5, 'VTROmVs+UoQETu9c/PbjI9MSfq++g9tf0NxlcH3LzUs=', 'RnYQi9L5MeM/YnSQlA0uO5hG49oN62gDbJLd3bmSUT8=', 'OmSh79fIoHUwbZE8NC0clg60AlD+g/EvHx/L3/5Xjs4=', 'r3P9oiNjvjjFuZeOPLSsH0FrFaGslXYcndYYOI5LVXs=', 'bDyAtRm+oUYVjFFOIJOJxyRylG8Fg2sXpwbBlJ8k+Rk=', 963548712, 632147896, 'bHA04+uZPyIjau0vN/mnOxuFQiHfZ9HP/pXjbAOHL+A=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'rtexbhuuky', 4),
(6, 'zKZKuDjzYK7pGHABk997NQ2VN62xlE9gQJzQ1CRQNkI=', 'vdujj1a2ofGTMpRJBcrvrnKUSKRrOZzQkTYwqrFNQ74=', 'AcEiOED621R34D4w3OSpN2q7rh6kZYH0UcyQZh7gi88=', '18n7Ps4j+evAma4P5nGIQlc/yLA+PT7J2YSuK73ZXOY=', 'tTnUlferAcMSPdy4KmIlGv7SNvCN88ymdQIvGs6U38Q=', 963548712, 632147896, '0Ttt5ECUyj0q5wuL2/GdsKY/HX/h9R6EAsC0h1hyQH4=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 5),
(7, 'u09RrpGGo20zYtCnwLbuRPF2Lknuqhx7YiYZGAaDOPo=', 'gwNSCSysYMkSkPTmClA5OddaJGlpuok7/eb3uiuIwJg=', 'sVFVW7GiTH7WW1wBQxwVfmnmaPPLm8H0pLZFbS089AE=', 'olCIPT2H/OPAqvKtp/Gsr+8WrlxxA4btJc/G52GQcN8=', '3tGk8HZ5Lf3vXTC3gTqDZ+TriCjGazL/luq5+wW+TqI=', 963548712, 651750840, 'n2KtbWUR44LcIqMCCHcAyftK4sJWm4nWIc6kMewJTes=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 18:23:38', '2017-01-08 16:12:22', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 6),
(8, '5hwoETJCp1XjvZHijP8RTqMgXKf6OfLqlZaOcNfQiPE=', 'VLy30X0VF1TNFlKVootbhIMWDDTPbIYg7jPr+J1O9bc=', 'RnYQi9L5MeM/YnSQlA0uO5hG49oN62gDbJLd3bmSUT8=', 'ePspmvDBLf6uondVMrqBxRg+v0xR0w2YOP4OXBJIAmM=', 'YP4rQUhT19oVCykSqf/3BmCmZLQqgHlVVH3DaJ7vTw8=', 963548712, 654789123, 'CWGXj7+keg4cL+NiHhExjmWV3MVJYdOi5Cf5or+QDRY=', 'Finalizado', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, '2017-02-10 03:20:07', 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 7),
(9, '2Zvvjnu2A3WMraromjmUgEnkkNnpEWX3db17TCatdgI=', 'aq5SW4vxgjYRpHBm/yw+54GZZWTrlpUdCEVMP0OxehY=', 'gQkAAbjOw9x4z1tFJm9M87/Wd1IBRnr+Scv3nVQm9YU=', 'vyC1UR7LBHfJLDyWWoN1QfJTVThMwm8/rhtxy29iBic=', 'mw06LuKOJi685gmD+bA3XyUmkRv9nUIzoTYHSlzzaPM=', 963548712, 651750840, 'jn4IVBjAZFW7vQeOaUQu8ft2F7rUoiZsrtUbfXfzV5o=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 10),
(10, '+CcS0gEhY8XWw1Ckc3ZejAjZ8jdcJm/CGsqGUKXZU+A=', 'AcEiOED621R34D4w3OSpN2q7rh6kZYH0UcyQZh7gi88=', 'vdujj1a2ofGTMpRJBcrvrnKUSKRrOZzQkTYwqrFNQ74=', 'pYvyDRPT2tEYGEsTQpM6LUYvQ9jLVPS7U7rEJdQyQkE=', 'MbDXJM1bKKXP5EvpPE74PykIA8VZPypdoBq2ejjhH28=', 963548712, 654789124, 'pLJpmPkmh2xS533OCyLPHxZBszqnIaDB1LzDDSTjQtQ=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 11),
(11, 'PSi8VFzUZ0GO0UG5GhSUlea12EE4XCX8DoLSgGhs3bs=', 'yMdva2OduhtsAOUqNhXpL5xGtqxztXM31TGuSnwJlcQ=', '1Ydpe9o7BGO22kgebf7jtEdeej9DCLXmF14QE5dmmI8=', 'CQm2SyhhKyRUjNDXYuvg02L94Q1qjDWEHDeLA9LnBxs=', 'jPHZKG6lUeF59EqEoldwbtGBo/2C1TwmLCd27CyPZxM=', 963548712, 654789124, 'vpn3e9p67YSdUxwoCDFf36DOxBs36y15eEAHhJ53K9A=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'fghfghfg', 12),
(13, 'ZB64Z7rykJtK/KZ9g6soZ7VphFtmcX2l2CfxIVxOjFs=', 'heJ6NzAjLi3dOmcslcrfLx+JfYOFFAJF7poWe5P8r6A=', 'O17bs92n2v7or2iGN+Zr2Gpn3ZMhYLODG/5wXns9qzs=', 'F8SOWeqQJkyWMruV5jEW1jxTjcIwTF7sqMEocBhlI+Q=', 'I0frqBSXRNMD3Z42gxK3KmMbv4fbjaWZZH3HYOalcLs=', 963548712, 654231470, '0tSdaUhhU0KPLD3MYp6we0VDEUIGOwhDXbaTvnqxu74=', 'Baja', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, '2017-02-12 20:10:53', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'fghfdgh', 14),
(14, 'lhzOCRPq3UXWDB/bCl70YQhOGUhGPv60AAfeYPANaQE=', 'BR8YKPd7hGddpZ+VzO0EGSsSBiTcHdc7AtWA9fqGLAo=', 'erOEg8phRSEWN0VpqeQ4iArD4u7RfAZe0rfojoGFRZQ=', '054/7znm/Oq4LzjP0CBMCmZfsTHX6XsJ7Te72rzQ/Ng=', 'lkyy8kp1Wo47gqUCSm5HKeNoB5Cc1rYCT137zTSr7Pc=', 963547896, 651487825, '1xU5wLB+kqLO1k3UTv9F4+5ELeTllFJ4b5UmWJBmdLk=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:07:26', '2017-02-12 19:29:18', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 15),
(15, 'yLHHdcZGFx1FLRALOro5SB8mqjwvVAYWtgO7OSdr1Ys=', 'd+KwNAMUhyCP2b5Dgjmkf6eT42v9MZTXpPVmGbYZ7zs=', 'E9L8UpfpKSvSe3itl1XkgE/R7MJL9rSp+N7Y/acv/SM=', 'IDBLO2QBKZZrRXzYUDGeFaJ8eGBtWgth8N/dZuDagGY=', 'goZWBCGT+Ztw/mcfDuLBdEfsAxmb8dCdCU7Z+5c0wWc=', 963548712, 651750840, 'eEiLY+N595HbUu0XZs8VK4SJPxdhSYo2Bhw2V1Tebrg=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 18:30:38', '2017-01-18 11:11:21', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 5),
(16, 'CAwGbku5XyqxlduduS8J5WaWA10nC9aLxlvHCZfLNPA=', 'wZvRavT2agMqydvjxsZYEyWMgLhUeshpp9nmA4VruWM=', 'OWRul3H5YwAckYSjtEsbtIXle3WNVQsNxcKn/+vhu2c=', 'jlIoNgFcPYEd+nahVKWqVKsvWOyvsvoS6jd7y6rkkqQ=', 'v9JPPctJAYkFXuq8PMLbGRfVctUwC4mepljewTf8fm8=', 963548712, 651750840, 'tRz8QIcLqjpstEYlNWDcucFCg/JyP2jmIsALWnCVqc8=', 'Baja', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:13:57', '2017-02-12 20:15:23', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 1),
(17, 'Ih+DPmVG2fAQhl3hu94M/w//o5JiME9PuN/3BKjdra0=', 'xaZGK8v2os/h9JRCn4ygp+A2p3nfkrkHbpiOlEaxr1g=', 'aN52b5hu06UiGpe0BYIrJ+qgC/BAaD/zoXq7QUu4Kyg=', 'N9NGs/r1dRo/F6/hcYx7VpMUul8Db8fOCviYfvYxaCs=', 'zkbJai1MYjq2hHbhQDTvssOoH3trcjv7H5+9qRgav5M=', 963458789, 658123456, 't4kGAAS8SowzxYxcpKKvjAYq6Sb9nrsUIiWMFVAvFFU=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 18),
(18, 'o9c+TQrKTt7UkjP/O118IHW619Dmj83UJwX1nlZxBq4=', '1CWkpuzC3UrpWFCEhxbckSMAnMwxcuxzHq9GGQiwIx8=', 'yYMl6LJfqq6VnTrgElLdAb3GZcRReeR3sUVQoZVYXQA=', 'ksiuGSX2Z342sfoGEta6gHOyBrwVumrIyku5Bf3y+kg=', 'RoqHy8jcTDulZCzkcZ57ZBF3HW5/ChzsjMnDyAvmuuw=', 963548712, 631245784, 't1Q0dK6LFs2g1jnn5SLoAq+qkAfk/MncQX2hMaJMNu0=', 'Baja', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, '2017-02-12 20:10:53', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'test etets tetste', 19),
(19, 'kBelxyTmjB7xuDwnkBKfcRsnJOK3Si/x+Y/bcE0c/4g=', 'weNWBtyr0EkXz0cg8v1kmBQdmu2B1knnIp2xlje3YbU=', 'EiwT6eywH6NOltTntBJyHW3peMGio4/OsGWws7f3Of0=', 'sF5emIDA2jxcOJVx9TPRr+ptI0lHj7ha0sxHmwhZVyo=', 'RetJI3ToEvgAZIbcA8uD6sMRgqHuv0sQ373PF2Esm7A=', 963458715, 654987321, 'GjyZ/ywUg2Fb9dJzxZ8hQuMoRjHavyJL8lDmseT1Bok=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 20),
(20, 'u09RrpGGo20zYtCnwLbuRPF2Lknuqhx7YiYZGAaDOPo=', 'CvU2JkxVC7aTB3j4fYKV9ZKxS7aJqraZ/lLbejzP1LA=', 'ZFd3q5/cXfO5RzU3EPR0R5X/wqTcIbvjegYkAQe0roE=', 'Dswhk4YVzOrRon5gf4n//Qid0Bf/N2LV7tWCyjJ1ba8=', 'wJj+I2DRipusOl8loES7/Ue1Wk1b0/b8XiS1+LKR1Qg=', 963458123, 654987321, 'EZaHNkjCkv8lUMTa/3AQcSbsvS8YEvC4BB/9zfFKzg8=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 21),
(21, 'inquQyI4iH0hs90JLHJErZRMSj6qzfSDuEwRzVNvr3I=', '+UEH60p3WrwdREjPD3N1mmh5a29TWZSQ+4VoWsWoJ6w=', 'BzIu1f8xmMJsgxcS/GwHztVHSMLT8u7RVuHgZYqGfLc=', 'Fo3xGK93nl6XsZA0tBH5z2hxEn1FrrPDxV0Moy9o5fk=', 'V+V0T/N0g/YNa1pSgXrb1+R8w59SjbEoZzhgFUW2WP0=', 963548712, 651750840, 'tL0Pl/n7kjX/g3S1phN3TM/aJx+7ss2Stm384l0cA4o=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'fghfdghdfgh', 12),
(22, '65MsXjEBzCHQVCAYRBoPLBPqatwl0mIqchhHpA2XRaU=', 'oe2VBzzWZKpJZIlKXQhC0LWfYH3telXVUZVG1l/iZE8=', '7AzF0jeNngxJJQ0YdLSt0HjIWmb+YjYb7QIdj+j5LC4=', '5SZOtGWTEakuSCKGkZ0h9F0LYvyTb/Alu6cfVju1lZo=', 'P+NiIe3VcwbZYZsThL0jJAb5MSQOMzwhpIZRhOCxO70=', 963123456, 654987321, 'yjzAN/puo+S7WlSHQN8WDbH1OWgvt88eCn8LesLb2bI=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'dfgsdfhfghfdgh', 23),
(23, 'o9hKMyU6/ykoTxE2WEqoWR0MTBrG3tsrzvy9vtekcXk=', 'y//pzAhicx0sYYzCqJbBJJxZeUmy60ybuQkIymqUCto=', '2BUMEEtRK6pViVMcy12GMwYi+gOOvEj0BQUVwQbZnJ4=', '4g0ksmT4F2j4rj/UYZmroaWi1tyOiWOOkES69Fds90g=', 'XbOG7ZcYYAOShgOC4EeOxBT5tLHNM16UErXxlA5ICls=', 963456123, 654987321, 'Lusb+vplHZKzm+IrBJYoNdeDMRSaCnvEksKsy18gUaY=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'This is a test for this section, Just to see how this text will appear in the element viewed by the user', 24),
(24, 'nYDci7c0ET95FY8c32Cy9Aj+g5Zly4FKYjh/5TYIs7w=', 'zXwsORgdHl0lwjDUEENa0Z0N5jIskzzZ/FjwhOkgIyc=', 'y28CHflLIDCgbth/FPS3fED2+Jxm0J6O2IebhjbylTg=', 'eIJ92aywkpJ4d8HEg6y76uSQL7/8UYfMuwewxMEtkLs=', 'vix5aqu+7+D4kGNRX8DZo9bA0Q0tDQbXUr4zROTY83g=', 963458712, 651487956, 'OA+hRcYxSrF6flU6wOfsqyVJNkAS7x9qthPdyuyHkak=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 25),
(25, 'pMhFxQ+wBD+TPGNO+xBh4c5UjAhjywQ0+IemLlW10T8=', 'mK6/I0am18YkLdaJ3N4+A8h2fTKUyo9TIRgdCElYTLQ=', 'qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'J5Rh3KdNkch0tQ2XxJYZSjBDpELI+kTCwvVCU/ztE0s=', 'JbXLu+HF9AFVH3hT7bfBXoUQAVsS78oONFCLzwlIioI=', 963456789, 654612345, '6+8Fe+lA0OEhH0ovs5095KSccBS4sWGYsFSkBwaiyz8=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 26),
(26, 'CesXtwOw3GaZgrIAPoKJUJkdkCG407MQ9x9cWT8S2Rw=', 'r1QsbNLhF2qY8iu97rjqn1hOmSezCakV1DOkWn7lums=', 'JXarqAROVqLDCYkwSu+rUbG/dzRPu0/RNzQDWhYRdUk=', 'PePWX9RrZWks/+M7qwuduoz3z+nM0p6+rgJRVBn8e4E=', 'myw/hkEm4Dk3rUSRClGikJkm/Fj3Nru6zUwWAfXrnEU=', 965412789, 654987321, '8oSnnU2aKDRaoHidknJxn7LmNo65ERJYfF6SLQHgAqQ=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 27),
(27, 'wzgUqiJGicfz/U1KW0T0r/tApdJWRfestTl6VODXraM=', 'gENqZ0tu04Bk9YB3JNZdPLqXMAk74IeuyaVqFTS/v3E=', 'TQmxfVkE9Sup28A9sz6TNJLOIsIB54q0eowHrhTvSJo=', 'jNpL+mpjX+aSKRKOu1QXlxxeLQRsoCo0wt60lhlGudw=', '4PzhcftUnP6AnRc6ET6raX83NNY51Iq68HcBIPavB2Y=', 965412789, 652348759, '0CnRwHibUGPmwA/XBn62v+3KIWBjuozI+BhGQ+AmmZU=', 'Baja', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, '2017-02-12 20:10:53', '2017-02-12 17:55:57', 'COwxVX/t3w/E1xF8F3ygPbcX35YAOEPHpwNsVyBqxI0=', 46007, 'Valencia', 12, '', 12),
(28, 'Mvaw7RNkREZQGowDGe2afovcQeKtDo5Gzdhtu9jnyK4=', 'VMoNbs0Yn+HizVTECnhDlOrD9EbUi4kD4GGfbB4dZO8=', 'chBI1mExxUGSyzu+Vxr+xWAyzPpa8HuoWKhJK3M1pSE=', 'QlAnJhcp+dmC0tXbhZCJJKF4+PUWm5HLtFU0/xph810=', '4iu2l/JYKa5nfAqZce4I//15QmRvHbi91wdqtuij+jc=', 963458789, 654987321, 'Nc+pD7i/jC1Io467ItRCbgq1zD6DD1HPPCIDvUQmsvw=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 29),
(29, '5w6sroyhsVGaxZln4ZsazmWBpiXTOoaM6yw4k3/GBhc=', 'LlUcOyFxUP96tpnNqVltzPJnh2M7qrzt08RV8PLIKHY=', 'ovoXmQ0bqVSMUQc8+MWm1H3UpHhwV2iXTqQPGS4nAn0=', 'qC7tkStxa6LmbL+e+eEmiQ5yEZ3TPEGCRTjsc3fanvs=', 'EiYif4SFS7m+DBd2gG/KI5SzpYSaX2jphBdohvW4Rj0=', 963548712, 632147895, 'VteUAYYuDMvXecyNc4yp0E7KwjByhx6r6oWxq+wJiYE=', 'Finalizado', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'fghfgfgfghghnhh', 30),
(30, 'K2iUdnSe+1Im18yGGQ+zFNuSNIZmmo0Ftai/bsJDAUA=', 'NdhtIx7PbQPxSjTZZtoQkK2ikYCtXJ6Yh3hSwImrmfU=', 'rqi0oEOKEY+PVBz4vM1lPkoPtja0ro/bvo1YHCnjHQ4=', 'KnzKIMLW9CLq0QFBIls4jBrTxQNro7G8eaFFm8fUVjk=', 'lwdGXcP/9PolDmiD00uGTyEjFPHOByPsEoesZNBqXlI=', 963548712, 651750840, 'HiEtQp1DFaS0Hd+B+tQILX8tQQ1vfvaXIq0rsNiPp9Y=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 31),
(31, 'qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'X9CotcKL/IE2b6dWPEA0G8Zj6G1TWoy2ieTKUCsxj54=', 'KlDHmlyYpMp2eZ/N1p5btGjty35dgADf+jKk9sO5nRM=', 'i6piz5DpZQnJCHv6Cj7G/wJ9sHjc8L31A93eeL9IZL4=', '9TpHKR9pu34awqosKHes9gYL06dw73BmFEmbAF4gcTA=', 963456789, 654987321, 'hQ4MPhegRWnjQvGBJAEf8UAJ584f+mFtUakYupP0wF8=', 'Baja', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:39:28', '2017-02-12 20:41:18', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 1),
(32, '9kZuXLTCe1Y++a1cSIL81jEecIql1c8D9/76Pf7UeJc=', 'IfgCJ2eriUM4N8D16O/yVjK4z2XIimDBwR5iZt4Rubc=', 'gYr5bIgnupNxoBfjtzgNNHJgZqvn4uaNG4UXrNjItO8=', 'UovqpPI7FyktBqP6TOymlGUQQsFDe3zVoXIB4pCyCOc=', 'NSYihYv/2KuqyuXPAf4X5zrx2ZJzWoxvbOpS70yZfjs=', 963456789, 654987320, 'g9seKLOH0/N8JDy4xiwK2gVxyNQGyoHAeOo7D8dFWyI=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 33),
(33, 'tU2JyAKhundFNBYMpfq4lhmxdK/sefP8ohA0ovNxOjY=', 'DW275+UWK7Zw7aKswfJlOrSZM2ChjJyFG7QFyavZ8Ns=', 'h3fGESLAd6xEkcCWaVeJ+4kv8gBP89SN8q6ITpkYOpE=', 'zQmORaIju/VSP+dkZbsSEjWfVY8uFcw4phv4FjHhz80=', 'UtLFShEAnPq45cpanhvR3RBtm7jCNqniAS6akq8rNoI=', 963456789, 654321789, 'O8515xYkTr9+ZjSjJNpsl7a/J4EU1Tyrrsk0aTVl3YA=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 37),
(34, 'aiqULPLIKOAwSvPxh20MPVo0WAEISnyNvVEB8Pe66Kk=', 'vac7METw5I3ZKh22Y7sVKQmwaTIOPVbwEmox2Je3m/U=', '6rfv6CJrwYY/0sGj97Gn6WoprcNkp6dTpUDwzctTQvk=', 'VwuU4ekw+8jEH6djB8//F22Jp03nOZ3s+KYBXnUIzQU=', 'NjIBPnOfnGUQTrk3KOmubjxcgi57DrpESW1FIB/DQKU=', 963123455, 654987123, 'eEJObuCV3YiarlPJvGNohilnN8h5uFtDjKllGCAADjw=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 38),
(35, 'RyZfd51yrOZy/NopmKJjzaDn2WD46Jfn8yQWcT8xzOw=', 'YY3uQJJMiOYOn9Vq9birRJmq3yGbx3oQ/E83hNerMU4=', 'CfugPrkeHjBGXH9PATisA7lAVfVsnu8GAaZzFg7hg1g=', 'GjhOv4lywot/efg8PK0h0FisOyhdpCbV3txdkOp8eCA=', 'bZXsI44vuAXIBJ2fDcsbufWcjfoxPZAYE6ewRRztUk8=', 963456789, 654987321, 'OR4JL814vR9QVt5dbEIhj6VsFCrGD7+jYMCNgJeiKLs=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:07:26', '2017-02-12 20:04:43', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 39),
(36, 'KP1RsvAnjX6UZosATuBesH2rIIxebTzpO98+VDjzGgY=', '6kCSUs9wPiW1TeE/L3OejchHhAFgkrwXoUsXIMc4cyM=', 'B/PkcUc+StqLw7t7ShNUmH7CyxrYduMjVKf2Y4lQYvA=', 'xsoJM9SV/czSbnYfwPg0onmiFYvDEJkoxxtakiD6txA=', 'xF/h+t91rbN5vNXoauRLxKc84rb79HLWjsZnK3DEg/w=', 963456789, 654987321, 'zsUYXJ7dV5f3erdZ3k6o3Lvg6472cRY1iSfhU6czA+I=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 40),
(37, 'rXtUCKeuhyOqAFgZuE5gBrIlohADgkluWDsI2L7zDUQ=', 'rqi0oEOKEY+PVBz4vM1lPkoPtja0ro/bvo1YHCnjHQ4=', 'A/76gxQffrHEzoM2WSOIqHvKdQGx8DRNX1T0EhN/VnE=', '/ln7KCjV921N5Wh9u7X7bqELXKzDx8+NPNMXmJgVMzE=', 'sLeBhL8+G7j2+SjDN3YVyoEikVJYM7BKiWkNCir1AVk=', 963456789, 654987326, 'cmnidKUwAz0M9q4J/kuuHk+bc7JxYik6YdXa7jDqtv4=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 41),
(38, 'mK6/I0am18YkLdaJ3N4+A8h2fTKUyo9TIRgdCElYTLQ=', 'fYlCehfmgSj13C62zkyxOzwJz5QDtXXeG7cZ5G5hnOw=', 'QtFs/9gnhTsXvHh+FggKCARavHTBP6yQJwuVEp/+F6c=', 'CJbMBsT8uZTg7+r/tTYYO8NLmHW4w1aldlPk0UY+B1w=', 'z5oFfLHTW1UOopiLlNFTCRVyMxew1PhC+ydVo8QZJAE=', 963548712, 651750840, 'R4QPgXSoLsr0bJ+MjuiYxnCcxaMV2uwePgW0kUc0lT4=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 42),
(39, 'eb0oVgLvOqnGbaXBZSohk2X8MzSb0gKBQgnwX9YztkQ=', '6npdXqA6fLvLe+eGUBuBguFcNMoTFmZpv2WKkqdJPUA=', 'Fv8KweFYzz7LkKsm10DfXhO23BlB3T+yOrWTHHxADvE=', 'iAIRV9WjqmJA2awOBQq7XkVhuQq6zq6pFLntkyc6dSo=', 'W6lnFmSii0yISNT5K2KYGXcCpD52FruNPUs5DY6i7lw=', 963456789, 654987321, 'v2lrQ2lA1/jjyjcm9PTiZs8QvgYseziAJM0xWtsZeCw=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 43),
(40, 'Vbi6ThyLJHQ0RFe0WhdJYmQC7sTvKH47rdfc0tj7hTc=', 'bBLh2Me5x3bQv2EkkLehLYXog3Mcb3KqI4zioUcaXjE=', 'OmSh79fIoHUwbZE8NC0clg60AlD+g/EvHx/L3/5Xjs4=', '/xzCk9+/vAV3KzEAyOUb4B2mngPuk//xp5hQgQWeAmo=', 'oml34Db04xj2746xrTE3O63sDMb3nhT4OfVG9P71pjc=', 963215478, 654783215, 'zfsVsq+kTSFU2DMUPBg3rYd7SpFpPdSMb4xGSSzXj/I=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:07:26', '2017-02-12 20:07:19', NULL, 'L+4FTlchZ7DckUxp/bPpwrdHy0Bi+j/9SSR/4w7fEEI=', 46008, 'Valencia', 0, '', 45),
(41, 'msBnKtBmxTo+WD9FDwGaB7QsddUerRApuf3ipPwqN8k=', 'PUxnLQxEm7xko2gpotOEyVzC+yasH6Xr+cxs98MXkFU=', 'hr2+RAj2K6+zRbX3MulD24UtYPDBQaHm6BxDGbhzQ2w=', 'hwQInw9MS0021hMwKX3r0pwkMvv9m9DUjj0M8dpysTs=', '2Kyo8DmHPQCjwGB0jSGnrdMuuam+hCt6xXr/BctblWI=', 963458712, 652321489, 'nqX/B/UuycgD7sQ6Hby10XppUGb1MXLdroRH5JvKfp4=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 46),
(42, 'JwRmonFCoL5jtmrTvYb1D4MtWuxvQ23giJG9vOD34/E=', 'zeiN64xwos26Kyr8VgxvXHbbbJy/z1insTzSL8jT8w0=', 'NhdqFFnMqUYuav7Be4R8yrcQAMwhiA6fK+viUtJ/2aI=', 'DRY8OoLf/zobWwdNgpHiozxBvg5ADodd4HAiVAagJPE=', '54SFordN7UBPzXSwZvT96QFL3qq08arfYMGKgstxs9g=', 963456789, 654321478, 'CnJ9xud3ZjFTydZyog+Cep3EZmyiV8Fy6jXtQnEV/Ug=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 47),
(43, 'P0pjCA5WBynkrceu6ZdfSUPKdALMKi3OgbTMx4+nQSY=', 'RQzW/qT3OshATAsO3y17GDCKtcQ+zGoxEbT4e0m6tkA=', 'I94VpNopxvJ1Z4YBE6vBB24ycZx66Q0ZQT6WDeZlOXU=', 'N2wpZNA6cbj48prl3XcSR5xVrdi5blfdgwrPyxlD3Wo=', '10LH94AEUg3TLv9LDbAZ/R1MlfkwqHGJDpgRd6PQaKk=', 963456789, 654987123, 'ikrpPCqDqWHBEYHgJIYizPTjMDqehmHnF5YVVCneFe8=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 48),
(44, 'b6xP5p/ZdyyHY/CJftoPZBzQ8luoBHUcHEVG2dynUMk=', 'Rzwl6QJ6arIaRK8R3Wj8JhxPAbHDXdlihdr+1pzDyiA=', 'CAwGbku5XyqxlduduS8J5WaWA10nC9aLxlvHCZfLNPA=', 'B3tImLAL0dtksYsbK2TQlBlpHLvzwX16Q54De+qgPls=', 'w6jnEE7qpYSgkR3F98ukN5N25MVkJEwPOkmExNhE3U4=', 963456789, 654123789, 'wywBvegq1qW2t65Re2dUgHnyXwtn4U9fGlzDlVyG1nw=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 49),
(45, 'QSo6IQyGmbrzdalv0vOzkGSJVH4xUVqUDv20Q0j6eb0=', 'ySdCPvWuHuUVzf+ChBmYn2jaAxNW4HFhyqxniN/zoaM=', 'erOEg8phRSEWN0VpqeQ4iArD4u7RfAZe0rfojoGFRZQ=', 'hakXOy9cFJIMr5SyrN3wJ0Ok/ws1FqgC69Oia09Pokc=', 'VhDgI1WhoafLxOSzvc0ml61fPCv6J0BCBMAb4S6JYFQ=', 963456789, 654987122, 'ZojzOh0CwQaqkd8qYSyAOTkI7xh7pzk2ttbnDWljWOE=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:07:26', '2017-02-12 20:04:20', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 50),
(46, 'EeNmleKH83LjLKij0ohHeavqzeqnpalv+iWPKeJKPKI=', 'XtmBJ6JwCKmEwSVCejitrMEjYIJCkZFuyqbohjQOVxA=', '8f//A9UJWI3buHIBKsFb4dupX//Gpf6DFTOdwhafxe8=', 'ZTVyJXnqHencV5vuGk/8Y5fWPagzUtakf40dtBAtUfc=', 'JMDhh6miswyD5ijq8/V2tv4ZDao+pF+l3nESJaSuko4=', 963456789, 654321014, 'zYKMaIbfV6YH4uBZxFKPnU8XBSM80j729MDZC/syM/k=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 51),
(47, 'MfkVY0GYk6ppBZHvTjjrqGz0PA1Wf25McKHUDDSjjmE=', 'h0V5d9v2JqCmIpELJL1/tqyC4FAf9QqSkCxWDHXP58c=', 'qwD9kk2wEWhRGDkc51JV4TsHlS9CMnnqIb5eXBoC6Z4=', 'ZgFEuQ+PlzydjhacNQup0gnYR6BzTqnIA55oxUCVFEU=', 'lww0uRbsFIJwWKHUghhTz1QmWOkY5LVcTlGZgwhgRUY=', 963548712, 654897123, 'nC49NDpHLWc/7gzmDjlAYNBLmroTSMhGluZ2OTwqmlk=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 52),
(48, 'Ko6VBmISvwJcjm4lp0fWh7MSTdN0TkSVWi1VqR9Kbg8=', 'knzIIgMtdOrSyvaGF+f63/sn19CgbROCVaq20uiqjO4=', 'aadY67LQR404mxhsXBJ1l7YimThest8Icc/8zpnc8UI=', 'vbdt8I1SQYPrPuOZ6TIK5Vu5verON6N2jCW/+nSOpdQ=', 'M9AecpWxf+ScYzaon/LTM4EFL8GzipNyUBqzVisYBsE=', 963548712, 631457965, 'IzoHkC88RAb29qdGHUsFe69Ge9Ie/1+6XPofRn568Ic=', 'Baja', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, '2017-02-12 20:10:53', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'jejejejejejejjejajaj', 53),
(49, 'Wpnb20DQmcIOrYBNI32ms8lNc91UXcBA7UMWJxF6//M=', 'aH9jJNwhgTRAHXJA9/UPZKi2Lp5peMnUi7CwJTOPyj0=', 'wKDKz6lFCBKf2YZBxYOCgILo6czL5Ii9uVyH7L/SXVg=', 'haeYdkDsn54jbkJ019pT5vJSYYxc7lXG7tUgFok1O9s=', 'iFLtSf4nollD5yBgQPxMViWSoT4Vft5qS0Sc5Z9Qr/o=', 963457891, 654987321, 'x95mkZcZmFR783sHoWhBZRtXcdR5GpME4zNr833P3D8=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 54),
(50, 'kBelxyTmjB7xuDwnkBKfcRsnJOK3Si/x+Y/bcE0c/4g=', 'saE2E042DWDp2JfAB1fIjRVTp0GivdixvKmJfzT9E34=', 'sc4MK/LfWZm3A9n4rT3eaIF3jOjmAx2Qn2asbLTWpgs=', 'THAPT/DTqAxe5+39ArLAtNtHn0pMBNlBdLWkI/EPaKY=', 'sXbRP4Qqq171ZiBKlSQL4tlzkOvDEy51VrUPXa+hTDc=', 963548712, 651750840, 'tL0Pl/n7kjX/g3S1phN3TM/aJx+7ss2Stm384l0cA4o=', 'Baja', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 18:31:20', '2017-02-12 20:13:49', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 1),
(51, 'MdMU1yVsbBWd7ckW5rKP4NUlQCGC3Gdg6hOY+tdiI54=', '9cIvU6Z3OzQ8XQZgEHVPCRBzJaiVBduIoIBVbuS6dWU=', 'hNd955tk+GQSJWvTSFILSy5oqB/+HumtApzc5eY4wtE=', 'mz9B6e+FpyBXnm/lZ36PLKkKLyMdltBbyqXEM3rcFTk=', 'qBBiaYVGqQUPF+aQ89EFO9FhHEg3GBoa5hnisLovmpI=', 963548712, 651750840, 'WllgZrOxS8IO0edd/S93as3GVTadcfPlxj8rFoCC5tM=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 18:15:07', '2017-01-08 09:27:00', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 2),
(52, 'i4fWoYiPpqgTndvMKUDAQqW91Lgk0jZJibXlSEczXIE=', 'swnmlwF8jdVZuWLBEgJF+eLbCIHYgfz+lMwEAhoxfXE=', '4kHRgBsSrfyg5Juv8MhNiu5hifPYmmRGb+YUWAkymsw=', 'Q38kfpf0gA02YdGoJu6y/RHYxpIlQZHo88qKxpNiXGc=', 'mJdXWhgwO8gmW+y/dD/LLvuG5X5v+r5Nl/OSNSTEKTY=', 963548712, 651750840, 'VknYEEcKhalgt1J/+Bj7y17Aufv0q9sszrfxIU6IL7w=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 17:55:51', '2017-01-01 09:21:30', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 3),
(54, 'YXMpWP+SonYfHD2u89VxboPACTGsi7deTKvEu9G9DHE=', 'heJ6NzAjLi3dOmcslcrfLx+JfYOFFAJF7poWe5P8r6A=', 'bFatvTGo8XAy9jNO0UVv6MnU4YsfXHntppoDIgBlhek=', 'Cj1wrkuVPoNc1+fmOxLh7DsuCS6cTWzeXYqBc658cCo=', 'UdZ5VFv47bUIuT3XW9u7P/BFB6QQ5osYYOXD27KzZyg=', 963548712, 652316788, 'qhwaP9BXSytGSfyEA+zLS34/+9wc8jOs+qsAhReLpmY=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 18:30:30', '2017-01-12 17:38:36', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 5),
(55, 'x+s81h1SGLgqH2k0b8K98ql3aXAaj5XyyI2xziYcVTI=', '+1hOJLMgMs1JUsV7GfxswphnO57n2bXVgwm8ZoejsfQ=', 'udn1XnxKoU5FktdT/zCJe2+26mVItLmYEjcMM2t/r7o=', 'TEpu6lJfQJQ1zE4pQc98XNel2unzcuF2rRjhb0TDz98=', 'VLXcR0SI0To626BzeyJKOepFfDd7gl/rD428m8PU53g=', 963548712, 654778925, 'wzE9H9y0U+VyVEo1cJmK/+x1K76BXXkVHtmG8V7LEzk=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 18:13:07', '2016-12-14 11:27:28', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 6),
(56, 'b8VKKQ+NMsCJoKKFfOolqqO9/GXfUsYUZrcCKDVM8MA=', '5uWhl++1atlaV0qYCwrBBLTdVcjz2DCJGkDD46mjYEE=', '5uWhl++1atlaV0qYCwrBBLTdVcjz2DCJGkDD46mjYEE=', '86ISgSlPYcmkSu8o9Ck5yKDy9nPsYM6ZqGoYoTJjMWU=', 'xmuDeAbH+xc1p4ND7vBT3LqkXHp5stwy9js3iUURtaE=', 963548712, 654789123, 'HkParb+UxSroQgXOsj8RSGP0mfpZtZ3TK9Isp5mbG3o=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:07:26', '2017-02-12 20:04:35', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 7),
(57, 'KWA05O78XsAidgFL2gf/DNhqBdXImX32d37u9vuSbqg=', 'Q+mazfQ25m3cGR3+YJdPICGgKUGt8q253EtACjoK+NA=', '4Qn5eTvSsxCqqHNHcVr/pBNe2641SAuUkyBwkvbE/38=', '6PI8gr1H5xDv4GPOKGN6kHsO1PHszqpt+XO9AmLmYgg=', 'BudFyUEEp5iLvSccHYA48/VohSYpz4rWrZuBCG3jHKQ=', 963457895, 658478921, 'PDwpIWxH9hgxAO6oLfBiQAueRCjACaxC7WcAZmf1hO8=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 18:12:12', '2016-11-23 11:21:00', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 10),
(58, 'X6dguFJVC5w/J4lOS8RbmaFxDQBsktUTpiLW6JiQPSU=', '31jbxEU13v1NGrBh6W5XQssBxshBwCdYubxhc+wXbyk=', 'CfugPrkeHjBGXH9PATisA7lAVfVsnu8GAaZzFg7hg1g=', 'F5MHsNBX4Ckj/hMLdzNzSwlahdv6Cupy/ZlyRD1yark=', 'FAKgepiqjfR4IIGqKMlMBzARGhox4qUsKOxnDlMVQYs=', 963548712, 651750840, 'El5uccMUrb3aq2xL45tPzlMuKcQf1gUGl7Xh8Dmwc8I=', 'Baja', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, '2017-02-13 02:05:30', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 10),
(59, '3Bbkdr3tthQfbLHpe9Zom7o6sd7jzAJyCeA9ah9F9Pc=', 'KG+Vmaejg95Ly5w775yOBH9ayqXabyAR8dSpR9qIwww=', 'wZvRavT2agMqydvjxsZYEyWMgLhUeshpp9nmA4VruWM=', 'fOQujiiN7K730fBy8hTwwTF19euGnm6Tu8d1ejmNEqg=', 'JPgDg4EncGy7p018R6obTLPYG15Oa/qb95xKOCc0XzY=', 963456787, 654987321, 'jiSB//vDftzpiphD2QYEvn5sLsJbkG+E6qjH8xwBZR4=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 11),
(60, 'LaDE4q5QiJHJv+ORqpTTYp8fApCnGimNusKjc9JnXUE=', '//p+gIXlsVAlPwNqEm1l48CzBXwvyTLh4nTAEn+Jl74=', 'CesXtwOw3GaZgrIAPoKJUJkdkCG407MQ9x9cWT8S2Rw=', 'tx0Npw1PfBs1xE9KpjwfAtl1iUfJV4k77DcTBTs3ZdA=', '/4CxyJZtMqNCKefKHl8/fac79lSxJR3w7h4HXeb/WSc=', 963456789, 654321987, 'kqYWnk5GCgcUUE9BBlm2C93YSUTnogDsv3gap7lFeuE=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'asdfsdfsdfgsdfgsdfg', 12),
(61, '6sDMhG32kfte/sN/JJshIE9lKkDqj/fXiD7CcKnwyrw=', 'ACTby64Ac7fYa6nmH+rcAF7kj3qFvgUr0u3P7hrxbgw=', 'o4xQkhS58145uZEWcvk1pKpjy0mXbVqy9TKbamoyH+o=', 'ApK/SQbN0PfP0SJ6l2iXSYO3vQMgg+ygo/JJDMPuKwU=', 'PqifeGDNZqDUKblG+hbf3p8gg3c0phmZ5ffSwKKa5sg=', 963456789, 654987321, 'OKV7T7+osDLo5C0VKWhy2SXGrT54bV3GlDIHh4PtNWc=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 44),
(62, '6tIqsYcZJdFrKQLHdkgE414/nWL4L3U1WU2UYRl95r8=', 'GRC4waaup4vnxy/FYIt62/BT94YcqJKfqXtGPWPaXKU=', 'VlXgxIV6RXPkT69Dtj6qjnX4IInKnfKuHTyorEcgfhM=', 'jRFC9M3lQjVZ/gD04Z5mkeD+IGUoK/GZjWXrqwxhwSk=', 'j1MRLW14IlzrAB+9EQH+Nb3RfR0UYq6wcnUYDQjpfBM=', 963456784, 623145789, '/+82H7hajngb6tSLMmnEZyGfWc8mC5CbARbGYmkF7V0=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 14),
(63, 'IpIdTnkreklWHq1VB+KC+5EIhu2R96/bZhBoO4jqV2A=', 'vdujj1a2ofGTMpRJBcrvrnKUSKRrOZzQkTYwqrFNQ74=', 'nLS4VWRy1Ib6/Sx5X2dcSQoOCaBP4L3jalJ4W3ptGCA=', '3bEEfhric8ed//H3FfaCQZgKmEfSH2wDnlI1e2fM+lI=', 'vRxyzzNh1xjftFglcwm9SZKEobe1//nucx+poki+FmA=', 963124557, 654987120, 'at/oyIA0KOnafrZzbK6OVe2gVsSimJHIKrRD8F6VyoA=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 20:15:28', '2017-02-12 20:10:33', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 15),
(64, 'sfQVJ0CrMavlhmBqG8oqzenhIHljJ2dliiSRxJo8uqc=', 'Y9Ubr0kGbCAz1jbBX/6JrPqIG62scAe9rDxG6yvVsUk=', 'E9aKIPxaLgL0OgZVtLGidwejM7OjKXqdqhZ9NhLcZ+o=', 'SNzAO3+V29fdrsxWM3AXqtGOIOShBiINnEBzZuiTNVc=', 'ZTgFoLU3R0+MV0cur+3BfxsiDLczgfYHXuEbajK0N0E=', 963456789, 654213789, 'z6o/JV1BjUWVeI+M1Sz9dFNQlwyn50ygnlNcUlII+bw=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 16),
(65, '8Nmo2PEz5/n2Qr1Ibi5yW4wkXH8ZTggPkEhayF72Reo=', 'duxpzsSdRpn7lvPG01QAAlhlyLV1xospXDfrNPaKg74=', 'X0SajI1OVfTNa6Qr4eiIQUA0KDumNwsyRwlXulc3ISQ=', 'XoVXMprxuSe5kTX6ccCAn+v+tH4QjtIps+lLg8akukI=', 'e5j2Kesm+BH0csx3w5qmkovYkYtjBqzjo/82l2Txccg=', 963456789, 654987321, 'oJhYl6oa2E1qSRYGXDvQNQqoOqns9/zMa7D59MQqWys=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'preubaaaa', 17),
(66, 'aiqULPLIKOAwSvPxh20MPVo0WAEISnyNvVEB8Pe66Kk=', 'DY7/qrv2DsIeyqZrC4EdnxzrHe5U5Wh6qnloHykTUxE=', 'oLbUg738ZnJurPs7hyeQMdQocSFtnVwBOiMnxrJ1Wqc=', '2GFnoF+dvl/g0XUwgJsFoeex5fgHx3QuL0+kTucbdQE=', '1xGBv7UI5oB2VVTM7IQwCOOVMLPOKa9W63cWqsDkIGo=', 963124587, 658498123, '9Ki0AhL64/huQR+Usxq6XshgvN5Wmmgx+t6yMRyGMZY=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, '', 18),
(67, 'RrjQae5KMZnWTGibb8uIliamrrzV0MhDnysmLQqmBd0=', 'OWRul3H5YwAckYSjtEsbtIXle3WNVQsNxcKn/+vhu2c=', 'puyFX7C99VfkqRgCPYprUMV1OSwJ3nDj/rDa4h+fPMM=', 'lBkyS+e21zymBjdPV9PoX863tQZ+up5okiPvHQ35YbU=', 'z++PYIM3L4FupAVK8754qWNgc6EXK0KwI59yJLWHoX0=', 963548712, 654789123, '5ovH327VndICoG2jvu9q9NJGo3TZzJlKbSwYn0bMiJ8=', 'Alta', 'Facebook', 0, 0, '2016-09-10 00:00:00', '2017-02-12 17:55:47', '2016-11-02 11:26:00', NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'tetsttetsttetsts', 44),
(68, '/7GOAyrTcsLW4h8V1kKuyddyfA/TxZ3E+Wy2Vw04Qbk=', 'krQg9uZHaRyOS2d3eGDCSw0+habrKmPSm26YgOLNvQc=', 'Y8GvMQ1Knx3u82XqYfTJeeJbDp2KTsNzu+MvHFlHCDU=', 'jnmGfM5We2vAYCTXLluT5pwU6zBjWOiSpwPjanzAq8E=', 'bdE94eEQkrhhaLeGyGWmD5SALyOCfx3/a6TSbDOMN4M=', 963548712, 897541230, 'DPOKLCT/ZkBzCk50cG5C1xzGg0GUTclyzuEEhOTibj0=', 'Finalizado', 'Facebook', 0, 0, '2016-09-10 00:00:00', NULL, NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46007, 'Valencia', 0, 'fdhdfghdfghjaj', 44),
(69, 'gX8FQOMAECLIb7ymH5I9POlKEAKC4XcSuEP4EznVAHk=', '9rsZeSXUPHLJcoTMze6pMMbZLoPSNblWgcXVSsc/ZZY=', 'NpeCSlo+mrAL5alKHpsF32OVXlvVaZAveu9EO4e+DsM=', 'yqXQue+NUmQaR0Gg5KeYzrbAhH91M6t5gw9FKqkCqeA=', 'EAEr1pNA0BDxuhOOcG5XJolQwjeAzQfDqtTrhTaebM0=', 963456787, 651489789, 'xiNpukBxmn70GLYXijzr4lfJTCT5z+D5Xe5FwkYtw6U=', 'Alta', 'Facebook', 0, 0, '2016-11-28 10:22:49', NULL, NULL, NULL, '6d63SnX7GRFH3LwDOtoLDSnc6qq4l+wc0xLR+xzPY1U=', 46007, 'Valencia', 8, '', 44),
(70, 'v9K/1VheRa7kdAfqdGI8Y/qOAZEmpZ4LfHBmigUGUn4=', 'swnmlwF8jdVZuWLBEgJF+eLbCIHYgfz+lMwEAhoxfXE=', 'OmSh79fIoHUwbZE8NC0clg60AlD+g/EvHx/L3/5Xjs4=', 'hChBfDvz7bQcaBFfAwdVFOKguW+Awr56W1ilHyR75bk=', 'ngCFSSj5LeyJk+gkvpK9To1LpXnJLSXanbEl6uNBVgk=', 963456123, 654987321, '+mtLOTcIB08kPIelfCfbb16HGgU2PvtlfGLWjQKPnfE=', 'Alta', 'Facebook', 1, 0, '2016-11-28 11:38:44', NULL, NULL, NULL, 'L+4FTlchZ7DckUxp/bPpwrdHy0Bi+j/9SSR/4w7fEEI=', 46019, 'Valencia', 4, '', 37),
(71, 'I3wT6SoN7CUuovm1ruOkS1tzERb4CMs9JFFk2Z2sRz0=', 'cogx9zSiGrABeOQ2yEIEZyOEFAaGpEiAL2zK3Nf24cY=', 'maEREIMi5ZHQXfK+lV6+hibU5y7TVXyxLXF/YkSjDbg=', 'bJgy0Ef88NUmLSIlPem79m9DLSIIkTBWnxPEQBXD9zc=', 'MV7PpY/rdeG/yk/m9RIJlZOcxz5XGX0VwGLpDD2TKw8=', 0, 654788926, 'W7JFaG/NXr5DnMpnHyEGSuivKVvrzbxPPU9lIXv7haA=', 'Alta', 'Facebook', 1, 0, '2016-11-28 12:39:21', NULL, NULL, NULL, '61bHL+yx972fMQqfiDoIw9ACDOLbProBdA5mL8KMDKo=', 46019, 'Valencia', 4, '', 50),
(78, 'nwqGi9pzTepjtf85nfwTdjZI3vvdo9TpZosV6QurwRE=', 'd2fzGVrKS1SIoQl+GLjoEkKJ9yolWkXAa2a7DkPklCo=', '3G+DCRdSu7xDDd6r6m6xKGtNgn42O+ypvibZUE1o4lI=', 'vXWh0Q8H6f3sTWsSmSDfJuuUq4qtjqFvWvOB8t6j0uA=', 'jLdhGkk5EfSSRciigDSniJOAjK+0K8pyEv3XoK6mLBU=', 0, 651726544, 'Ine0zi4wPer5MkRtz4hEQQmlo23W1QWuUHBFcf5UieM=', 'Alta', 'Motores De Busqueda', 1, 1, '2017-01-22 03:42:04', '2017-02-11 23:42:26', NULL, NULL, 'TYPOJitE75a3QBShs39QpabZ5GF/WiTcPLB/V9aLx2E=', 46023, 'Winterfel', 0, '', 53),
(79, 'VTROmVs+UoQETu9c/PbjI9MSfq++g9tf0NxlcH3LzUs=', 'RnYQi9L5MeM/YnSQlA0uO5hG49oN62gDbJLd3bmSUT8=', 'Q5KhY8qFQD7c6GXqfy2GIW2zTHf7Z3p4VDiY7jPjdzI=', 'G7rCJ92Okp7bp5JMq5JD2/bMcxsXFCd18XbNAQ2xlAg=', 'mdn+/S5VIHfvkG2pQat79UWtWQnm7wQEBNuR1gVY+FQ=', 0, 651890456, 'tL0Pl/n7kjX/g3S1phN3TM/aJx+7ss2Stm384l0cA4o=', 'Alta', 'Recomendacion Amigo', 1, 0, '2017-01-22 08:00:23', NULL, NULL, NULL, 'drDoi5dnZV8AElZhAt20z80cHQRP8avJNtaxPETcXe0=', 46024, 'Valencia', 30, '', 27),
(80, 'u09RrpGGo20zYtCnwLbuRPF2Lknuqhx7YiYZGAaDOPo=', 'Bti2Pag6b/lJGRO7x+sVA3iYWjqiNQhvHHraHSLj3f0=', 'IwYD6e51jtn15+Tvh6QwDTPEEZm3HH8SOwhik9wHyrQ=', 'IiHQiAFv4w7jeZPA6Pe6uOzIiQdc6H3Uv3/syZx79sU=', 'kXmLHHWq8F6FYEMSaV5RXTEO7FV/m528+WA2Nd8VYm8=', 963215487, 651845789, 'RzXHoJXwfCrbx7tTaYNWfmZd4ExcX4lkTEg+KuZNBkE=', 'Alta', 'Recomendacion Amigo', 0, 1, '2017-02-03 11:03:34', NULL, NULL, NULL, '6d63SnX7GRFH3LwDOtoLDSnc6qq4l+wc0xLR+xzPY1U=', 46002, 'Valencia', 5, 'testing comments student', 8),
(81, 'KJ2IBUeykSeKbKdotc0cEcU47i8I0etqAUAbigT2Q7s=', 'frZVfPSTIAupNe8sJsUZqQHrNxw+yV+YQKAFIeIfeyI=', 'cVf97CGq7wC6gawxMaZGA8tr4WgwP/KTsTc2PyI2VsE=', 'afnZ2cpdb+NWHzKUkAUm+vccrIYv1fyOoO7kuPpzsw4=', 'DLWbvxZpvfRlHPv1EEhWHe2JYtck4w8v1Ro2do1/28U=', 963458745, 654987321, 'TaR6uj3Yxn+/mRq+WHaU5J7VwembqV37kI0qa/u/5Us=', 'Inscrito', 'Motores De Busqueda', 1, 0, '2017-02-03 11:29:39', NULL, NULL, NULL, '61bHL+yx972fMQqfiDoIw9ACDOLbProBdA5mL8KMDKo=', 46008, 'Valencia', 8, '', 27),
(82, 'GZsBzMEE1RSj5yr5RY0fuoTtLLLA6yCXwV4EflqrnVE=', 'p6W0ylTbizNIExCDUN6L563ECTPCdbd9MqNlLbL7EyY=', 'emFg0zIFwivy5ULZGZU8P6SMzP9dcXfV8jJRQaYCkXc=', 'dAo4FhYCIq7Li1D6Y7QtJ+AGRyIRldY29DaWpD2GDNc=', 'fHheu2AR7gdlwzUGq4smPYUqlKjm3SCuiJyYarqrJNk=', 963456786, 654321789, 'hXwkbFx3aqfk7ODlAM0p/F2aTDZ8CeT3LpswR7tMe2U=', 'Alta', 'Facebook', 1, 0, '2017-02-10 00:24:27', '2017-02-12 17:56:04', '2017-02-10 00:25:54', NULL, 'wnKlgn8YJAjUlcfdcxB6VXnIotFQ6k2tey7YFiZ+GA8=', 46007, 'Valencia', 8, '', 36),
(83, '1CqadtEvZl8OmufxmVPoT/p+dYNMwn9E8GJaFUC6KAE=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' HTQsGjJyMXBS3SrHyH+mxdQkxEVTAeJ3odFXus0r1no=', 'oKndVtEZyN5DwMdFoGmtuLsd7hJJvZZUr9HNTuzFP6k=', 'j2F+fhHbh+Kxf1jjGnM22Afyorf/7iiBxGmn1AYYnRM=', 0, 651759890, 'gZhTUo10ckddsYLNTknpX2UrAKAR+NmA29Hgcvvs380=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:01:14', '2017-02-12 03:01:14', '2017-02-12 03:01:14', '2017-02-12 03:01:14', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(84, '1CqadtEvZl8OmufxmVPoT/p+dYNMwn9E8GJaFUC6KAE=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' HTQsGjJyMXBS3SrHyH+mxdQkxEVTAeJ3odFXus0r1no=', 'oKndVtEZyN5DwMdFoGmtuLsd7hJJvZZUr9HNTuzFP6k=', 'j2F+fhHbh+Kxf1jjGnM22Afyorf/7iiBxGmn1AYYnRM=', 0, 651759890, 'gZhTUo10ckddsYLNTknpX2UrAKAR+NmA29Hgcvvs380=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:01:39', '2017-02-12 03:01:39', '2017-02-12 03:01:39', '2017-02-12 03:01:39', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(85, '3590c8ZFq6k4Y0cIFGgZFt80ruHO5EY9AQ1NStINtes=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'vPLS3u4U/tdm4JpAIUB48j8Zi/XN3pftkOprGOny7AQ=', 'N/WGdGYOUIveaJgwyVKx+GgBF+LoGioNONg1/3ShtRg=', 0, 651234567, 'P34NJCSwMp91l7KduECkOtRfWn9EmD1d8pM4HxS+AZw=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:05:23', '2017-02-12 03:05:23', '2017-02-12 03:05:23', '2017-02-12 03:05:23', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(86, '3590c8ZFq6k4Y0cIFGgZFt80ruHO5EY9AQ1NStINtes=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'vPLS3u4U/tdm4JpAIUB48j8Zi/XN3pftkOprGOny7AQ=', 'N/WGdGYOUIveaJgwyVKx+GgBF+LoGioNONg1/3ShtRg=', 0, 651234567, 'P34NJCSwMp91l7KduECkOtRfWn9EmD1d8pM4HxS+AZw=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:05:31', '2017-02-12 03:05:31', '2017-02-12 03:05:31', '2017-02-12 03:05:31', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(87, '3590c8ZFq6k4Y0cIFGgZFt80ruHO5EY9AQ1NStINtes=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'vPLS3u4U/tdm4JpAIUB48j8Zi/XN3pftkOprGOny7AQ=', 'N/WGdGYOUIveaJgwyVKx+GgBF+LoGioNONg1/3ShtRg=', 0, 651234567, 'P34NJCSwMp91l7KduECkOtRfWn9EmD1d8pM4HxS+AZw=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:08:00', '2017-02-12 03:08:00', '2017-02-12 03:08:00', '2017-02-12 03:08:00', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(88, '3590c8ZFq6k4Y0cIFGgZFt80ruHO5EY9AQ1NStINtes=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'vPLS3u4U/tdm4JpAIUB48j8Zi/XN3pftkOprGOny7AQ=', 'N/WGdGYOUIveaJgwyVKx+GgBF+LoGioNONg1/3ShtRg=', 0, 651234567, 'P34NJCSwMp91l7KduECkOtRfWn9EmD1d8pM4HxS+AZw=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:08:13', '2017-02-12 03:08:13', '2017-02-12 03:08:13', '2017-02-12 03:08:13', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(89, '3590c8ZFq6k4Y0cIFGgZFt80ruHO5EY9AQ1NStINtes=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'vPLS3u4U/tdm4JpAIUB48j8Zi/XN3pftkOprGOny7AQ=', 'N/WGdGYOUIveaJgwyVKx+GgBF+LoGioNONg1/3ShtRg=', 0, 651234567, 'P34NJCSwMp91l7KduECkOtRfWn9EmD1d8pM4HxS+AZw=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:08:59', '2017-02-12 03:08:59', '2017-02-12 03:08:59', '2017-02-12 03:08:59', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(90, '3590c8ZFq6k4Y0cIFGgZFt80ruHO5EY9AQ1NStINtes=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'vPLS3u4U/tdm4JpAIUB48j8Zi/XN3pftkOprGOny7AQ=', 'N/WGdGYOUIveaJgwyVKx+GgBF+LoGioNONg1/3ShtRg=', 0, 651234567, 'P34NJCSwMp91l7KduECkOtRfWn9EmD1d8pM4HxS+AZw=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:11:23', '2017-02-12 03:11:23', '2017-02-12 03:11:23', '2017-02-12 03:11:23', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(91, '3590c8ZFq6k4Y0cIFGgZFt80ruHO5EY9AQ1NStINtes=', 'tM/DFmOTA9QAni7SeYJIxF3Nj8QJStuFDGx8Vq1ZDEg=', ' qpGtY8EtBsZlFL8B5883ti01IrQTngwG+iGMLaGy4X8=', 'vPLS3u4U/tdm4JpAIUB48j8Zi/XN3pftkOprGOny7AQ=', 'N/WGdGYOUIveaJgwyVKx+GgBF+LoGioNONg1/3ShtRg=', 0, 651234567, 'P34NJCSwMp91l7KduECkOtRfWn9EmD1d8pM4HxS+AZw=', 'Alta', 'Facebook', 0, 0, '2017-02-12 03:14:54', '2017-02-12 03:14:54', '2017-02-12 03:14:54', '2017-02-12 03:14:54', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 5, '', 9),
(92, 'lhzOCRPq3UXWDB/bCl70YQhOGUhGPv60AAfeYPANaQE=', 'BR8YKPd7hGddpZ+VzO0EGSsSBiTcHdc7AtWA9fqGLAo=', ' GhanhAPyaW9Y+dIeJYgiu6/3TT6i/iJAKsqi3ckwdQs=', 'p9rkmPDVwV097ntZH8Bf1JZslCzmwGA+HKTThM1zZkw=', 'xdyvRGzj2PgQoPA7yWfGyeFO1TPeLqxetww9XphsPrQ=', 0, 652345789, 'p5mtyNGaIRiWuGXrdTayd7hHR/GSAIpZb6JnGQIFXGw=', 'Inscrito', 'Facebook', 0, 0, '2017-02-12 03:20:47', '2017-02-12 03:20:47', '2017-02-12 03:20:47', '2017-02-12 03:20:47', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valenica', 4, '', 1),
(93, 'Tw9RSckoWVHywdC4oSxWhOdDzp1EttiOSdOn+oxiW7E=', '9XP/wi/HUPbI8Ta1M9F1BZ7gzKIQC9hJabF1qrinGf0=', ' mNt3DC2Deoek5MjKiPMrEbb/XidnDxu1zrv1EcI5yUY=', 'xljSe+ca/kpgWbhwLIpkX9KXqZElVgDdCOGbtXjQxHQ=', 'TWh5oXhj0saLvNTwiaZUfEOdpXFEpwnPLUERSmbi2d8=', 0, 657345908, 'E2dNhyNjN193gEEZ6lWu/zHnWKE9XymRIL2iBeVTpbw=', 'Inscrito', 'Facebook', 0, 0, '2017-02-12 23:30:24', '2017-02-12 23:30:24', '2017-02-12 23:30:24', '2017-02-12 23:30:24', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 3, '', 27),
(94, '5w6sroyhsVGaxZln4ZsazmWBpiXTOoaM6yw4k3/GBhc=', 'b+s1llljvzE8rjMtEkq/kqpO0GLasV3g43cD4rpL/g0=', ' lCBMZY4pB10KY6PV6KqPuJzkbgfI396nA9vT4+zBMRI=', 'Ns03oKUgUtker5/yPIWB21jCqLxC5l+JV+jIiOjgnBk=', 'ZJjnVZLNnghQUjyuZPwsH0kFsJTHEkvpflGOSSspyHE=', 0, 634567890, 'kXYptpZb21grvZhc1z9K/GYBUmIy+4vTEMOwI2Ujt9Y=', 'Inscrito', 'Facebook', 0, 0, '2017-02-12 23:32:38', '2017-02-12 23:32:38', '2017-02-12 23:32:38', '2017-02-12 23:32:38', 'OOhy0xDlXgmB4Lt3GXv5t7yxzCG8zdU2xQ6K4kLekq4=', 46007, 'Valencia', 3, '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `p10p_teachers`
--

CREATE TABLE `p10p_teachers` (
  `id_teacher` int(11) NOT NULL,
  `t_name` varchar(70) DEFAULT NULL,
  `t_surname` varchar(70) DEFAULT NULL,
  `t_surname2` varchar(70) DEFAULT NULL,
  `t_email` varchar(70) DEFAULT NULL,
  `tel` int(9) DEFAULT NULL,
  `t_stage` varchar(15) NOT NULL,
  `t_start` datetime NOT NULL,
  `t_end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_teachers`
--

INSERT INTO `p10p_teachers` (`id_teacher`, `t_name`, `t_surname`, `t_surname2`, `t_email`, `tel`, `t_stage`, `t_start`, `t_end`) VALUES
(1, 'Cbk4FIFuls6eDpBCgFemkkvbs7HoTD1ruV+RZoC8DUg=', '5aTNrvwRf0tcBj+2FiqyCWA1oFUdfr6ERQ+QLtnoNpI=', 'ckpxkJIXEyUDsSbxqP+hWno/7kSN9Fv3mYiBcb7mBJw=', NULL, NULL, 'NULL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'V1OznagH60jhsqYF0Gl9IruBNbMcvwAoaFlauY+8IwU=', 'mihFcFUCenXgZbQIPw7NDVo4szs3XWx0ej/1YNR7DV8=', 'l+VnlEyYXxN47QKzV/3fYnQjZC3J6XEXpNVJqYuZB1Y=', 'ZOWUQrvybuE+1EC4H/IUWwj1I0QjPiFGh+PrjdpHO7c=', 546710094, 'Alta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'b9ySdNZbn21hJ5+cQk5riwgjV2sqpB2VVg61efqXsFE=', 'SxHov67KkGBY+1Wckb1wensLQegMvNhiNnqL2UDD7co=', '+AWBYRER3I5WiXqr9Av/lMt6q+wwqq+/mUOTTrXPs7g=', '7WwOW4Nqx4/hE9l5o/ob4LADU3FhEl7sP9obQ5ijteA=', 653750857, 'Alta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'ILie9VaZ1z7DNEHl1QDyU8yG8bjh/UgE0Nkk49VDXKw=', '81c5AWtTdi8EYAqqkTBqwNOVq2JYTQrYHkez9HfsxK4=', 'uAWJrYx+Pq40gqJVRCshpPpQq85U7MTKldZ5oDPQ5gk=', 'qGdNstGuVbjr31dyjfmqjnyJ00GJ3MhLcInYgSbHN10=', 652345786, 'Alta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'X6pFAOxPR2KI/xnpNgEsvwrXqTcc60rQ9GLNwFIyOtM=', 'qjOcdmXq/OBfhqi+/rG+0fpY1YtiAV7ErMcldVGt0zY=', 'BFalhdQdl662CxzUqUVx+anOfL5PiBTs1nfNAEqu0Nc=', '+ggC/7EQpIAG5YGbPiydLIMMQRrandPIWn3qxZne0i0=', 657432876, 'Baja', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'YYTpLy4030bzuOThJnXvg13k22J9qzZi/Q0MdfhcvJA=', '1xcge1MM+WjNZbyGSUxiTdEKLCR6ET4OFAHIAe8J4e0=', 'CCyjqWMUNCSMpT0A58GOZ322BxaKFsItAc1b6S4KwVQ=', 'ZZB/MgNVTm/UDQey5MpTKMKDc3E3PwbcH50s6Diajfc=', 657348290, 'Baja', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'l9OM+oMSP7F507Uw9bQKi26grLXqG0IMqaSCzEToYTk=', 'hx9kio9Kr2OqZhUHNHGFQC6c6WZRdsR8lYmhucWlHZM=', 'BGzBPjuRKCqVH/IOL4lxLqpGs1BWKfG5avwCTYNVay0=', 'JvCbam8qb7w24quSAg9s0N1QkOF+hxS/gW1xITCZSOw=', 657432897, 'Baja', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'hH7LlAc7Od0XyiiaFvVOO4v72a1fMtTZYPB+4c+BOAc=', 'MfVOJLe1lQgg4sxQXlfca2WDpHrARn9tjC+mpIYoxmM=', 'DR56S+aJh2beiibg6L85y7ikEYrQw7mtRTSc6jgwttE=', 'lAjirYLyYqEssqiqN7nx1+kw74zygybBw6RdLhIMnUo=', 654783298, 'Alta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'VK2UB70NCu3qVSW0A/pgv0daYMAstJFxLm2sZH/UB9U=', 'i/ywLY9lwMFZTSIGtvrjBmC4kX1muoKdDe2LqvxRkhw=', 'GWGrH5FX0wbjDfBYtWZEP3BDiYr8+08TwGveqc3QocE=', 'q9MD3nISFLhA9Li7kGh7rU3W6sh6dB7ZdeFR5FXCO5o=', 657897234, 'Alta', '2017-02-10 01:10:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p10p_totalstats`
--

CREATE TABLE `p10p_totalstats` (
  `id_totalStat` int(11) NOT NULL,
  `total_cancelled` int(11) DEFAULT NULL,
  `total_enrolled` int(11) DEFAULT NULL,
  `total_signedUp` int(11) DEFAULT NULL,
  `total_ended` int(11) NOT NULL,
  `total_onCampus` int(11) DEFAULT NULL,
  `total_online` int(11) DEFAULT NULL,
  `total_studentsDB` int(11) DEFAULT NULL,
  `total_classrooms` int(11) DEFAULT NULL,
  `total_teachers` int(11) DEFAULT NULL,
  `total_invoiced` decimal(15,2) DEFAULT NULL,
  `total_refunds` decimal(15,2) DEFAULT NULL,
  `total_pending` int(11) DEFAULT NULL,
  `total_academies` int(11) DEFAULT NULL,
  `total_courses` int(11) DEFAULT NULL,
  `total_groups` int(11) DEFAULT NULL,
  `total_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_totalstats`
--

INSERT INTO `p10p_totalstats` (`id_totalStat`, `total_cancelled`, `total_enrolled`, `total_signedUp`, `total_ended`, `total_onCampus`, `total_online`, `total_studentsDB`, `total_classrooms`, `total_teachers`, `total_invoiced`, `total_refunds`, `total_pending`, `total_academies`, `total_courses`, `total_groups`, `total_date`) VALUES
(2, 7, 4, 73, 3, 68, 17, 87, 54, 5, '1300.00', '402.20', 150, 6, 9, 57, '2017-02-06 23:32:38'),
(3, 7, 4, 72, 3, 67, 17, 86, 54, 5, '1300.00', '402.20', 150, 6, 9, 57, '2017-02-07 01:51:36'),
(4, 7, 4, 72, 3, 67, 17, 86, 54, 5, '1450.00', '402.20', 150, 6, 9, 57, '2017-02-13 02:02:41'),
(5, 7, 4, 72, 3, 67, 17, 86, 54, 5, '1600.00', '402.20', 150, 6, 9, 57, '2017-02-13 02:02:41'),
(6, 7, 4, 72, 3, 67, 17, 86, 54, 5, '1750.00', '402.20', 150, 6, 9, 57, '2017-02-13 02:02:41'),
(7, 7, 4, 72, 3, 67, 17, 86, 54, 5, '1900.00', '402.20', 150, 6, 9, 57, '2017-02-13 02:02:41'),
(8, 7, 4, 72, 3, 68, 17, 86, 54, 5, '1900.00', '402.20', 150, 6, 9, 57, '2017-02-13 02:04:32'),
(9, 7, 4, 72, 3, 69, 17, 86, 54, 5, '1900.00', '402.20', 150, 6, 9, 57, '2017-02-13 02:04:32'),
(10, 8, 4, 71, 3, 69, 17, 86, 54, 5, '1900.00', '402.20', 150, 6, 9, 57, '2017-02-13 02:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `p10p_users`
--

CREATE TABLE `p10p_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `activated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p10p_users`
--

INSERT INTO `p10p_users` (`id_user`, `username`, `email`, `password`, `type`, `activated`) VALUES
(1, '3woR70GgX4f9kl+dtKfrbE49yR+jf3pvyK63bUNfeLU=', 'lnGT5QWsDt9MB+W4COmdvMqZg9lJGy7c9aHHqGLfdFM=', 'QOh8L19dpevstOfKJwRjUieGrbpyYAZq9BEFc0FSKRs=', 1, 1),
(12, 'g4OYEPMa43jUJUpU1uUuI1rIxCSVZbJYcKZkpWX5QpY=', 'cUOGIl6gy7lHduhkRjdHp1pzxi1lmfZ8mY0zSNqFXU4=', '6x9ngPx7EmjMnan8fS/9CTDRSLII/c4D9h3jpzGx9IM=', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p10p_academies`
--
ALTER TABLE `p10p_academies`
  ADD PRIMARY KEY (`id_academy`);

--
-- Indexes for table `p10p_courses`
--
ALTER TABLE `p10p_courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `p10p_groups`
--
ALTER TABLE `p10p_groups`
  ADD PRIMARY KEY (`id_group`,`id_course`,`id_academy`),
  ADD KEY `fk_p10p_groups_p10p_courses1_idx` (`id_course`),
  ADD KEY `fk_p10p_groups_p10p_academies1_idx` (`id_academy`),
  ADD KEY `fk_p10p_groups_p10p_teachers1_idx` (`id_teacher`);

--
-- Indexes for table `p10p_payments`
--
ALTER TABLE `p10p_payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `fk_p10p_payments_p10p_students1_idx` (`id_student`);

--
-- Indexes for table `p10p_refunds`
--
ALTER TABLE `p10p_refunds`
  ADD PRIMARY KEY (`id_refund`,`id_payment`),
  ADD KEY `fk_refunds_payments1_idx` (`id_payment`);

--
-- Indexes for table `p10p_stats`
--
ALTER TABLE `p10p_stats`
  ADD PRIMARY KEY (`id_stat`),
  ADD KEY `fk_p10p_stats_p10p_groups1_idx` (`id_group`);

--
-- Indexes for table `p10p_students`
--
ALTER TABLE `p10p_students`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `fk_p10p_students_p10p_groups1_idx` (`id_group`);

--
-- Indexes for table `p10p_teachers`
--
ALTER TABLE `p10p_teachers`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indexes for table `p10p_totalstats`
--
ALTER TABLE `p10p_totalstats`
  ADD PRIMARY KEY (`id_totalStat`);

--
-- Indexes for table `p10p_users`
--
ALTER TABLE `p10p_users`
  ADD PRIMARY KEY (`id_user`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p10p_academies`
--
ALTER TABLE `p10p_academies`
  MODIFY `id_academy` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `p10p_courses`
--
ALTER TABLE `p10p_courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `p10p_groups`
--
ALTER TABLE `p10p_groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `p10p_payments`
--
ALTER TABLE `p10p_payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `p10p_refunds`
--
ALTER TABLE `p10p_refunds`
  MODIFY `id_refund` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `p10p_stats`
--
ALTER TABLE `p10p_stats`
  MODIFY `id_stat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `p10p_students`
--
ALTER TABLE `p10p_students`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `p10p_teachers`
--
ALTER TABLE `p10p_teachers`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `p10p_totalstats`
--
ALTER TABLE `p10p_totalstats`
  MODIFY `id_totalStat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `p10p_users`
--
ALTER TABLE `p10p_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `p10p_groups`
--
ALTER TABLE `p10p_groups`
  ADD CONSTRAINT `fk_p10p_groups_p10p_academies1` FOREIGN KEY (`id_academy`) REFERENCES `p10p_academies` (`id_academy`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_p10p_groups_p10p_courses1` FOREIGN KEY (`id_course`) REFERENCES `p10p_courses` (`id_course`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_p10p_groups_p10p_teachers1` FOREIGN KEY (`id_teacher`) REFERENCES `p10p_teachers` (`id_teacher`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `p10p_payments`
--
ALTER TABLE `p10p_payments`
  ADD CONSTRAINT `fk_p10p_payments_p10p_students1` FOREIGN KEY (`id_student`) REFERENCES `p10p_students` (`id_student`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `p10p_refunds`
--
ALTER TABLE `p10p_refunds`
  ADD CONSTRAINT `fk_refunds_payments1` FOREIGN KEY (`id_payment`) REFERENCES `p10p_payments` (`id_payment`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `p10p_stats`
--
ALTER TABLE `p10p_stats`
  ADD CONSTRAINT `fk_p10p_stats_p10p_groups1` FOREIGN KEY (`id_group`) REFERENCES `p10p_groups` (`id_group`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `p10p_students`
--
ALTER TABLE `p10p_students`
  ADD CONSTRAINT `fk_p10p_students_p10p_groups1` FOREIGN KEY (`id_group`) REFERENCES `p10p_groups` (`id_group`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
