-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Databasestructuur van thewall wordt geschreven
DROP DATABASE IF EXISTS `thewall`;
CREATE DATABASE IF NOT EXISTS `thewall` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `thewall`;


-- Structuur van  tabel thewall.comments wordt geschreven
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(5000) NOT NULL DEFAULT '0',
  `datum` varchar(5000) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  `gebruiker_id` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel thewall.comments: ~118 rows (ongeveer)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `content`, `datum`, `post_id`, `gebruiker_id`, `parent_id`, `status`) VALUES
	(1, 'test\n', '1415471908', 1, 1, 0, 0),
	(2, 'test\n', '1415471954', 1, 1, 0, 0),
	(3, 'test\n', '1415471976', 1, 1, 1, 0),
	(4, 'test\n', '1415471992', 1, 1, 1, 0),
	(5, 'test\n', '1415471999', 1, 1, 2, 0),
	(6, 'test\n', '1415472008', 1, 1, 0, 0),
	(7, 'test\n', '1415472109', 2, 1, 0, 0),
	(8, 'test\n', '1415472115', 2, 1, 0, 0),
	(9, 'test\n', '1415472152', 3, 1, 0, 0),
	(10, 'test\n', '1415472529', 3, 1, 0, 0),
	(11, 'test\n', '1415472541', 4, 1, 0, 0),
	(12, 'l\n', '1415472634', 5, 1, 0, 0),
	(13, 'b\n', '1415472641', 5, 1, 0, 0),
	(14, 'l\n', '1415472645', 5, 1, 12, 0),
	(15, 'b\n', '1415472678', 5, 1, 12, 0),
	(16, 'l\n', '1415472692', 6, 1, 0, 0),
	(17, 'l\n', '1415472696', 6, 1, 16, 0),
	(18, 'l\n', '1415472704', 6, 1, 0, 0),
	(19, 'b\n', '1415472766', 6, 1, 16, 0),
	(20, 'test\n', '1415545010', 7, 1, 0, 0),
	(21, 'test\n', '1415545014', 7, 1, 0, 0),
	(22, 'test\n', '1415545030', 7, 1, 0, 0),
	(23, 'test\n', '1415545040', 7, 1, 20, 0),
	(24, 'test\n', '1415545783', 7, 1, 20, 0),
	(25, 'test2\n', '1415545838', 7, 1, 20, 0),
	(26, 'test\n', '1415546139', 7, 1, 20, 0),
	(27, 'test\n', '1415546158', 8, 1, 0, 1),
	(28, 'test\n', '1415546176', 8, 1, 27, 1),
	(29, 'test\n', '1415546216', 8, 1, 27, 1),
	(30, 'test\n', '1415546225', 8, 1, 0, 1),
	(31, 'test\n', '1415546235', 8, 1, 30, 1),
	(32, 'test\n', '1415546297', 8, 1, 30, 1),
	(33, 'test\n', '1415546432', 8, 1, 27, 1),
	(34, 'test\n', '1415546445', 8, 1, 0, 1),
	(35, 'test\n', '1415546450', 8, 1, 34, 1),
	(36, 'test2\n', '1415546504', 7, 1, 22, 0),
	(37, 'test\n', '1415546628', 8, 1, 0, 1),
	(38, 'test\n', '1415546681', 8, 1, 37, 1),
	(39, 'test\n', '1415547446', 9, 1, 0, 1),
	(40, 'test\n', '1415547451', 9, 1, 39, 1),
	(41, 'test\n', '1415547460', 9, 1, 39, 1),
	(42, 'test\n', '1415547616', 9, 1, 39, 1),
	(43, 'test\n', '1415547623', 9, 1, 0, 1),
	(44, 'test\n', '1415547627', 9, 1, 43, 1),
	(45, 'test\n', '1415547633', 9, 1, 43, 1),
	(46, 'hoi\n', '1415548233', 10, 1, 0, 0),
	(47, 'test\n', '1415548250', 10, 1, 46, 0),
	(48, 'testing\n', '1415548256', 10, 1, 0, 0),
	(49, 'test\n', '1415548261', 10, 1, 48, 0),
	(50, 'test\n', '1415548265', 10, 1, 48, 0),
	(51, 'test\n', '1415548290', 10, 1, 48, 0),
	(52, 'test\n', '1415571440', 16, 2, 0, 0),
	(53, 'test\n', '1415571445', 16, 2, 52, 0),
	(54, 'test\n', '1415571449', 16, 2, 52, 0),
	(55, 'test\n', '1415573740', 16, 1, 52, 0),
	(56, 'test\n', '1415573749', 16, 1, 0, 0),
	(57, 'test\n', '1415616761', 17, 2, 0, 1),
	(58, 'test\n', '1415617139', 17, 2, 0, 1),
	(59, 'test\n', '1415617178', 17, 2, 0, 1),
	(60, 'dawda\n', '1415617305', 17, 2, 0, 1),
	(61, 'asdasd\n', '1415617631', 17, 2, 0, 1),
	(62, 'asdasd\n', '1415617633', 17, 2, 61, 1),
	(63, 'test\n', '1415634088', 27, 2, 0, 1),
	(64, 'test\n', '1415634092', 27, 2, 63, 1),
	(65, 'test2\n', '1415634098', 27, 2, 63, 1),
	(66, 'test3\n', '1415634103', 27, 2, 0, 1),
	(67, 'test\n', '1415653719', 27, 1, 63, 0),
	(68, 'test\n', '1415708211', 17, 2, 0, 1),
	(69, 'ewrwe\n', '1415708722', 27, 2, 0, 1),
	(70, '\n', '1415708756', 27, 2, 69, 1),
	(71, 'sadasd\n', '1415708859', 27, 2, 69, 1),
	(72, 'sadsadas\n', '1415708872', 27, 2, 69, 1),
	(73, 'asdasd\n', '1415708908', 27, 2, 0, 1),
	(74, 'asdad\n', '1415708913', 27, 2, 73, 1),
	(75, 'asdasd\n', '1415708918', 27, 2, 74, 1),
	(76, 'asdasd\n', '1415708927', 27, 2, 73, 1),
	(77, 'asdsad\n', '1415708933', 27, 2, 73, 1),
	(78, 'sdfsd\n', '1415708936', 27, 2, 73, 1),
	(79, 'asdasd\n', '1415708952', 27, 2, 73, 1),
	(80, 'asdasdas\n', '1415708955', 27, 2, 73, 1),
	(81, 'dsfdsfsdssfd\n', '1415708959', 27, 2, 73, 1),
	(82, 'asdsadasdasdasd\n', '1415708983', 27, 2, 73, 1),
	(83, 'adsdasdasdasdadasdasdas\n', '1415708990', 27, 2, 73, 1),
	(84, 'ddddd\n', '1415708995', 27, 2, 73, 1),
	(85, 'asdsadasd\n', '1415709077', 27, 2, 69, 1),
	(86, 'asdadas\n', '1415709080', 27, 2, 69, 1),
	(87, 'dasdasdasd\n', '1415709092', 27, 2, 0, 1),
	(88, 'asdsadas\n', '1415709096', 27, 2, 87, 0),
	(89, 'sdasdsd\n', '1415709099', 27, 2, 88, 0),
	(90, 'asdasdasdas\n', '1415709108', 27, 2, 87, 1),
	(91, 'asdasdasd\n', '1415709112', 27, 2, 90, 0),
	(92, 'sadasdasd\n', '1415709117', 27, 2, 87, 1),
	(93, 'dasdasdasd\n', '1415709240', 28, 2, 0, 1),
	(94, 'saasdsad\n', '1415709243', 28, 2, 0, 0),
	(95, 'asdasdasd\n', '1415709246', 28, 2, 93, 1),
	(96, 'sadasdas\n', '1415709249', 28, 2, 93, 1),
	(97, 'ddd\n', '1415709252', 28, 2, 93, 1),
	(98, 'test\n', '1415726504', 17, 2, 0, 0),
	(99, 'd\n', '1415726708', 17, 2, 0, 0),
	(100, 'test\n', '1415727747', 9, 2, 0, 1),
	(101, 'test\n', '1415776696', 29, 2, 0, 0),
	(102, 'test\n', '1415776702', 29, 2, 101, 0),
	(103, 'k\n', '1415777692', 31, 8, 0, 1),
	(104, 'b\n', '1415777697', 31, 8, 103, 1),
	(105, 'l\n', '1415777796', 31, 8, 103, 1),
	(106, 'd\n', '1415777801', 31, 8, 0, 1),
	(107, 'sadasd\n', '1415778141', 32, 8, 0, 1),
	(108, 'sadasd\'\n', '1415778145', 32, 8, 107, 1),
	(109, 'asdsad\n', '1415778149', 32, 8, 107, 1),
	(110, 'fdssdfds\n', '1415778203', 32, 8, 0, 1),
	(111, 'dsfdsfdsf\n', '1415778207', 32, 8, 0, 1),
	(112, 'sdfsfds\nf', '1415778210', 32, 8, 111, 1),
	(113, 'sfdf\n', '1415778216', 32, 8, 0, 1),
	(114, 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWv\n', '1415778243', 32, 8, 113, 1),
	(115, 'test\n', '1415782262', 29, 8, 101, 1),
	(116, 'test\n', '1415782300', 29, 8, 0, 0),
	(117, 'ja?\n', '1415783162', 34, 8, 0, 0),
	(118, 'wat mot je?\n', '1415783175', 34, 8, 117, 0),
	(119, ' alert(\'dit gaat lekker toch nie werken\')\n', '1415783384', 30, 8, 0, 0),
	(120, 'aasd\n', '1415884426', 9, 2, 0, 0),
	(121, 'sdadas\n', '1415884428', 9, 2, 120, 0),
	(122, 'dasd\n', '1415886137', 29, 2, 101, 0),
	(123, 'test\n', '1415887049', 29, 2, 0, 0),
	(124, 'dfsf\n', '1415887054', 29, 2, 0, 0),
	(125, 'test\n', '1416301495', 43, 2, 0, 0),
	(126, 'test\n', '1416301508', 41, 2, 0, 0),
	(127, 'test', '1416301642', 43, 2, 125, 0),
	(128, 'test\n', '1416301647', 43, 2, 0, 0),
	(129, 'test', '1416301654', 43, 2, 128, 0),
	(130, 'n\n', '1416316356', 46, 1, 0, 0),
	(131, 't', '1416316360', 46, 1, 130, 0),
	(132, 'lekker', '1416316691', 46, 1, 130, 0),
	(133, ' super lekker', '1416316697', 46, 1, 0, 0),
	(134, 'jaja', '1416316701', 46, 1, 133, 0),
	(135, 'jaja\n', '1416400463', 47, 2, 0, 0),
	(136, 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW\n', '1416401518', 37, 2, 0, 0),
	(137, '\n\n\n\n\n\n\n\n\n\n\n\n', '1416401583', 42, 2, 0, 0),
	(138, ' wat is er?', '1416402002', 49, 2, 0, 0),
	(139, 'fdss\n', '1416402610', 48, 2, 0, 0),
	(140, 'f\n', '1416402728', 48, 2, 0, 0),
	(141, 'Maar wat vind jij?', '1416403392', 49, 2, 0, 0),
	(142, 'geen idee...', '1416405496', 49, 2, 138, 0),
	(143, ' ja ja :P', '1416406592', 50, 2, 0, 0),
	(144, ' sad sad :/ff', '1416406595', 50, 2, 143, 0),
	(145, 'dffdg', '1416406601', 50, 2, 143, 0),
	(146, 'sdsad\n', '1416406605', 50, 2, 0, 0),
	(147, ' en weer een mooie dag', '1416475460', 50, 1, 0, 0),
	(148, 'test\n', '1416475498', 46, 1, 0, 0),
	(149, 'hallo', '1416475523', 47, 1, 135, 0),
	(150, 'hallo?\n', '1416475533', 47, 1, 0, 0),
	(151, ' fdgdf :P', '1416475846', 50, 1, 143, 0),
	(152, 'fsd', '1416475938', 43, 1, 128, 0),
	(153, 'zeg nou is wat\n', '1416526507', 58, 1, 0, 0),
	(154, 'faggot', '1416526512', 58, 1, 153, 0),
	(155, ' hallo :)', '1416756216', 59, 1, 0, 0),
	(156, ' test :(', '1416756247', 59, 1, 155, 0),
	(157, ' testgf', '1416783052', 60, 1, 0, 0),
	(158, 'test', '1416783055', 60, 1, 157, 0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Structuur van  tabel thewall.gebruiker wordt geschreven
DROP TABLE IF EXISTS `gebruiker`;
CREATE TABLE IF NOT EXISTS `gebruiker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT '0',
  `password` varchar(50) DEFAULT '0',
  `groep_id` int(11) DEFAULT '0',
  `persoon_id` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `avatar` varchar(50) DEFAULT 'noprofile',
  `registered` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel thewall.gebruiker: ~5 rows (ongeveer)
DELETE FROM `gebruiker`;
/*!40000 ALTER TABLE `gebruiker` DISABLE KEYS */;
INSERT INTO `gebruiker` (`id`, `email`, `password`, `groep_id`, `persoon_id`, `status`, `avatar`, `registered`) VALUES
	(1, 'jimchippy@hotmail.com', 'test', 2, 1, 0, '851663437.JPG', '1415471908'),
	(2, '', '', 1, 2, 0, 'noprofile.jpg', '1515471908'),
	(5, 'joey@nu.nl', 'test', 1, 4, 1, 'noprofile.jpg', '1415746292'),
	(7, 'test@test.test', 'test', 1, 5, 0, 'noprofile.jpg', '1415746425'),
	(8, 'jantje@mongool.nl', 'test', 1, 6, 1, 'noprofile.jpg', '1415777612'),
	(9, 'ajvandommele@live.nl', 'jim', 1, 7, 0, 'noprofile.jpg', '1416757667');
/*!40000 ALTER TABLE `gebruiker` ENABLE KEYS */;


-- Structuur van  tabel thewall.groep wordt geschreven
DROP TABLE IF EXISTS `groep`;
CREATE TABLE IF NOT EXISTS `groep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel thewall.groep: ~0 rows (ongeveer)
DELETE FROM `groep`;
/*!40000 ALTER TABLE `groep` DISABLE KEYS */;
INSERT INTO `groep` (`id`, `type`) VALUES
	(1, 'user'),
	(2, 'Admin');
/*!40000 ALTER TABLE `groep` ENABLE KEYS */;


-- Structuur van  tabel thewall.likes wordt geschreven
DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruiker_id` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  `like_type` varchar(50) NOT NULL DEFAULT '0',
  `datum` varchar(5000) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `post_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel thewall.likes: ~50 rows (ongeveer)
DELETE FROM `likes`;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` (`id`, `gebruiker_id`, `post_id`, `like_type`, `datum`, `parent_id`, `post_type`) VALUES
	(4, 2, 27, 'like', '00000', 63, 'subpost'),
	(5, 2, 27, 'dislike', '00000', 64, 'subpost'),
	(6, 2, 17, 'dislike', '00000', 0, 'post'),
	(7, 2, 9, 'like', '00000', 0, 'post'),
	(8, 1, 27, 'like', '00000', 0, 'post'),
	(9, 1, 9, 'like', '00000', 0, 'post'),
	(17, 8, 33, 'like', '00000', 0, 'post'),
	(18, 8, 31, 'dislike', '00000', 0, 'post'),
	(23, 2, 29, 'like', '00000', 101, 'subpost'),
	(24, 2, 29, 'dislike', '00000', 102, 'subpost'),
	(25, 2, 29, 'like', '00000', 122, 'subpost'),
	(26, 2, 29, 'like', '00000', 123, 'subpost'),
	(27, 2, 29, 'dislike', '00000', 124, 'subpost'),
	(28, 1, 7, 'dislike', '00000', 23, 'subpost'),
	(29, 1, 7, 'like', '00000', 20, 'subpost'),
	(30, 1, 7, 'like', '00000', 24, 'subpost'),
	(31, 1, 7, 'dislike', '00000', 25, 'subpost'),
	(32, 1, 7, 'like', '00000', 26, 'subpost'),
	(33, 1, 7, 'dislike', '00000', 21, 'subpost'),
	(34, 1, 7, 'like', '00000', 22, 'subpost'),
	(35, 2, 42, 'dislike', '00000', 0, 'post'),
	(36, 2, 41, 'like', '00000', 0, 'post'),
	(37, 1, 46, 'like', '00000', 0, 'post'),
	(38, 1, 29, 'like', '00000', 101, 'subpost'),
	(39, 1, 29, 'like', '00000', 102, 'subpost'),
	(40, 1, 29, 'like', '00000', 122, 'subpost'),
	(45, 2, 46, 'dislike', '00000', 134, 'subpost'),
	(46, 2, 39, 'like', '00000', 0, 'post'),
	(47, 2, 49, 'dislike', '00000', 138, 'subpost'),
	(49, 2, 49, 'dislike', '00000', 0, 'post'),
	(50, 2, 49, 'dislike', '00000', 141, 'subpost'),
	(51, 2, 50, 'dislike', '00000', 0, 'post'),
	(52, 2, 50, 'like', '00000', 143, 'subpost'),
	(53, 2, 50, 'dislike', '00000', 144, 'subpost'),
	(54, 2, 50, 'like', '00000', 145, 'subpost'),
	(55, 2, 50, 'dislike', '00000', 146, 'subpost'),
	(56, 1, 50, 'like', '00000', 143, 'subpost'),
	(57, 1, 50, 'dislike', '00000', 144, 'subpost'),
	(59, 1, 50, 'like', '00000', 146, 'subpost'),
	(61, 1, 52, 'dislike', '00000', 0, 'post'),
	(62, 1, 50, 'like', '00000', 0, 'post'),
	(63, 1, 54, 'dislike', '00000', 0, 'post'),
	(64, 1, 55, 'dislike', '00000', 0, 'post'),
	(65, 1, 50, 'dislike', '00000', 145, 'subpost'),
	(68, 1, 53, 'dislike', '00000', 0, 'post'),
	(71, 1, 59, 'like', '00000', 0, 'post'),
	(73, 1, 59, 'like', '00000', 155, 'subpost'),
	(74, 1, 59, 'like', '00000', 156, 'subpost'),
	(75, 1, 60, 'dislike', '00000', 0, 'post'),
	(77, 9, 59, 'like', '00000', 0, 'post');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;


-- Structuur van  tabel thewall.persoon wordt geschreven
DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(50) NOT NULL DEFAULT '0',
  `achternaam` varchar(50) NOT NULL DEFAULT '0',
  `geboortedatum` varchar(50) NOT NULL DEFAULT '0',
  `adres` varchar(50) NOT NULL DEFAULT '0',
  `postcode` varchar(50) NOT NULL DEFAULT '0',
  `woonplaats` varchar(50) NOT NULL DEFAULT '0',
  `telefoon` varchar(50) NOT NULL DEFAULT '0',
  `mobiel` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel thewall.persoon: ~5 rows (ongeveer)
DELETE FROM `persoon`;
/*!40000 ALTER TABLE `persoon` DISABLE KEYS */;
INSERT INTO `persoon` (`id`, `voornaam`, `achternaam`, `geboortedatum`, `adres`, `postcode`, `woonplaats`, `telefoon`, `mobiel`) VALUES
	(1, 'Jim', 'Geersinga', '23-10-1995', 'Kostverloren 21', '2959BT', 'Streefkerk', '0184-785010', '0612822724'),
	(2, 'Guest', '', 'n.v.t', 'n.v.t', 'n.v.t', 'n.v.t', 'n.v.t', 'n.v.t'),
	(4, 'joey', 'verhoef', '890809', 'a', '-', 'niemandsland', '-', '6123123'),
	(5, 'test', 'test', '123', '-', '-', 'test', '-', '234'),
	(6, 'jantje', 'mongool', '-1985', '-', '-', 'niemandsland', '-', '6123123'),
	(7, 'Angela', 'van Dommele', '16-12-1996', '-', '-', 'Papendrecht', '-', '0612822724');
/*!40000 ALTER TABLE `persoon` ENABLE KEYS */;


-- Structuur van  tabel thewall.post wordt geschreven
DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(50) NOT NULL DEFAULT '0',
  `content` varchar(5000) NOT NULL DEFAULT '0',
  `datum` varchar(5000) NOT NULL DEFAULT '0',
  `gebruiker_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel thewall.post: ~57 rows (ongeveer)
DELETE FROM `post`;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `titel`, `content`, `datum`, `gebruiker_id`, `status`) VALUES
	(1, '', 'test', '1415471901', 1, 1),
	(2, '', 'test', '1415472103', 1, 0),
	(3, '', 'test', '1415472148', 1, 0),
	(4, '', 'test', '1415472536', 1, 0),
	(5, '', 'testt', '1415472625', 1, 0),
	(6, '', 'test\r\n', '1415472687', 1, 1),
	(7, '', 'test', '1415545005', 1, 0),
	(8, '', 'test\r\n', '1415546151', 1, 1),
	(9, '', 'test', '1415546762', 1, 1),
	(10, '', 'test', '1415547776', 1, 1),
	(11, '', 'test', '1415571265', 2, 1),
	(12, '', 'test2', '1415571348', 2, 1),
	(13, '', 'test3', '1415571356', 2, 1),
	(14, '', 'test4', '1415571420', 2, 1),
	(15, '', 'test5', '1415571427', 2, 1),
	(16, '', 'test6', '1415571430', 2, 1),
	(17, '', 'test\r\n', '1415573013', 1, 1),
	(18, '', 'test\r\n', '1415617169', 2, 1),
	(19, '', 'test', '1415617213', 2, 1),
	(20, '', 'dsads', '1415617354', 2, 1),
	(21, '', 'adassd', '1415617360', 2, 1),
	(22, '', 'dsdsad', '1415617381', 2, 1),
	(23, '', 'erewrew', '1415617553', 2, 1),
	(24, '', 'fdsfdsf', '1415617558', 2, 1),
	(25, '', 'dssad', '1415617790', 2, 1),
	(26, '', 'test', '1415633759', 2, 0),
	(27, '', 'test', '1415634083', 2, 0),
	(28, '', 'dasdasda', '1415709236', 2, 0),
	(29, '', 'asd', '1415727810', 2, 0),
	(30, '', 'jaja\r\n', '1415746712', 7, 0),
	(31, '', 'test', '1415777688', 8, 0),
	(32, '', 'test', '1415778137', 8, 0),
	(33, '', 'test', '1415782017', 8, 0),
	(34, '', 'hallo', '1415783158', 8, 0),
	(35, '', 'hoi', '1415783239', 8, 0),
	(36, '', 'alert(\'dit gaat lekker toch nie werken\');', '1415783419', 8, 0),
	(37, '', '', '1415791114', 8, 0),
	(38, '', 'dsd', '1415791281', 8, 0),
	(39, '', 'bbb', '1415791332', 8, 0),
	(40, '', 'dsdasd', '1415884436', 2, 0),
	(41, '', 'test', '1415886390', 2, 0),
	(42, '', 'test\r\n', '1415890795', 1, 0),
	(43, '', 'f', '1416219346', 2, 0),
	(44, '', 'r', '1416314964', 1, 0),
	(45, '', 'test\r\n', '1416316344', 1, 0),
	(46, '', 'blah', '1416316350', 1, 0),
	(47, '', 'test', '1416400052', 2, 0),
	(48, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit tempore cum id saepe ipsa quae consequatur, quidem vel veritatis, ea est nesciunt minus autem! Quisquam harum ab, dolore saepe itaque?\r\nMollitia quos rerum nesciunt assumenda ab consequuntur fugiat sapiente autem, eum atque odit dolorum possimus beatae exercitationem illum minus, quidem deleniti provident. Iusto veritatis illum, iure voluptates vero quos laudantium.\r\nDistinctio iusto, eius dolorum perferendis nobis repudiandae dolore repellat error beatae explicabo aperiam, ipsa dolorem ducimus quibusdam quae adipisci odio ipsum reprehenderit repellendus maxime? Quas corporis tenetur neque cupiditate maiores.\r\nis voluptate, dolores. Suscipit quidem voluptatem in blanditiis nam, enim laboriosam at, magnam maxime, atque qui fugiat facere recusandae porro error repellendus cum, amet iure accusantium?', '1416401345', 2, 0),
	(49, '', 'hallo?', '1416401997', 2, 0),
	(50, '', ' test test test test test test a', '1416406588', 2, 0),
	(51, '', 'dsfdsfdsf:laughing: :neckbeard: ', '1416479070', 1, 0),
	(52, '', ':)', '1416479850', 1, 0),
	(53, '', ':P\r\n', '1416479941', 1, 0),
	(54, '', ':P', '1416480787', 1, 0),
	(55, '', ' jaja :) :D :P', '1416484289', 1, 0),
	(57, '', 'dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P dasdasdad :P :P dasdasdad  :P ', '1416484612', 1, 0),
	(58, '', ' jo stephan :) :P', '1416526416', 1, 0),
	(59, '', ' Schat i love you :-*', '1416577905', 1, 0),
	(60, '', 'test', '1416755253', 2, 0);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
