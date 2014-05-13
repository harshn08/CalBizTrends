-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2014 at 06:54 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `top_investment`
--

CREATE TABLE IF NOT EXISTS `top_investment` (
  `Type` varchar(15) DEFAULT NULL,
  `raised_amount` varchar(15) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `top_investment`
--

INSERT INTO `top_investment` (`Type`, `raised_amount`, `year`) VALUES
('enterprise', '2230158524', '2014'),
('software', '1792895512', '2014'),
('ecommerce', '1108383148', '2014'),
('finance', '799512013', '2014'),
('web', '770139512', '2014'),
('mobile', '726294028', '2014'),
('cleantech', '679744936', '2014'),
('medical', '590346082', '2014'),
('network_hosting', '579510416', '2014'),
('health', '551455754', '2014'),
('hardware', '541393728', '2014'),
('advertising', '468719138', '2014'),
('analytics', '467039269', '2014'),
('real_estate', '442031593', '2014'),
('education', '395256259', '2014'),
('games_video', '366850023', '2014'),
('messaging', '337293176', '2014'),
('security', '304984446', '2014'),
('manufacturing', '272958685', '2014'),
('hospitality', '272500519', '2014'),
('other', '257689981', '2014'),
('semiconductor', '208505953', '2014'),
('transportation', '206871195', '2014'),
('social', '195595325', '2014'),
('travel', '190315465', '2014'),
('enterprise', '4239484457', '2013'),
('software', '4959993961', '2013'),
('ecommerce', '3547627012', '2013'),
('finance', '1556212729', '2013'),
('web', '1662630795', '2013'),
('mobile', '2034488648', '2013'),
('cleantech', '1759009237', '2013'),
('medical', '1844007595', '2013'),
('network_hosting', '680659239', '2013'),
('health', '1179606646', '2013'),
('hardware', '1936918852', '2013'),
('advertising', '1583732344', '2013'),
('analytics', '1692031350', '2013'),
('education', '688532021', '2013'),
('games_video', '1486150321', '2013'),
('security', '793574777', '2013'),
('manufacturing', '476960760', '2013'),
('hospitality', '502011904', '2013'),
('other', '644154598', '2013'),
('semiconductor', '525457537', '2013'),
('transportation', '515961918', '2013'),
('social', '1117897695', '2013'),
('fashion', '418950879', '2013'),
('music', '398244934', '2013'),
('news', '486729408', '2013'),
('enterprise', '3364140795', '2012'),
('software', '4435105610', '2012'),
('ecommerce', '2941316129', '2012'),
('finance', '691429904', '2012'),
('web', '1231590228', '2012'),
('mobile', '2517924359', '2012'),
('cleantech', '2742951743', '2012'),
('medical', '2625561316', '2012'),
('network_hosting', '970952789', '2012'),
('health', '659879675', '2012'),
('hardware', '1122796857', '2012'),
('advertising', '1605475969', '2012'),
('analytics', '1311242210', '2012'),
('education', '684548337', '2012'),
('games_video', '1015682154', '2012'),
('security', '706378830', '2012'),
('manufacturing', '720413383', '2012'),
('hospitality', '256670457', '2012'),
('semiconductor', '763112184', '2012'),
('social', '796315372', '2012'),
('travel', '474661998', '2012'),
('fashion', '519201209', '2012'),
('music', '381545701', '2012'),
('photo_video', '280742089', '2012'),
('search', '239861373', '2012'),
('enterprise', '2916289342', '2011'),
('software', '3535112311', '2011'),
('ecommerce', '3646022150', '2011'),
('finance', '885105838', '2011'),
('web', '2929098164', '2011'),
('mobile', '2179820686', '2011'),
('cleantech', '3915041039', '2011'),
('medical', '2440859210', '2011'),
('network_hosting', '1046673112', '2011'),
('health', '809142318', '2011'),
('hardware', '1148961587', '2011'),
('advertising', '2094641202', '2011'),
('analytics', '1010376300', '2011'),
('education', '346278961', '2011'),
('games_video', '1903754420', '2011'),
('security', '513460067', '2011'),
('manufacturing', '682749640', '2011'),
('other', '343836415', '2011'),
('semiconductor', '1047503068', '2011'),
('transportation', '343041961', '2011'),
('social', '948071718', '2011'),
('travel', '563923134', '2011'),
('news', '350858708', '2011'),
('consulting', '348602786', '2011'),
('photo_video', '350588365', '2011'),
('software', '35090195152', '1'),
('cleantech', '21971856338', '1'),
('enterprise', '21751737666', '1'),
('mobile', '17100793377', '1'),
('ecommerce', '16822782123', '1'),
('medical', '14178639777', '1'),
('web', '13024432460', '1'),
('advertising', '12624532575', '1'),
('games_video', '11325616021', '1'),
('hardware', '11250476149', '1'),
('semiconductor', '9802160182', '1'),
('network_hosting', '8846825913', '1'),
('finance', '7542513770', '1'),
('analytics', '7052056319', '1'),
('security', '5850565994', '1'),
('health', '5679046216', '1'),
('social', '5569563574', '1'),
('manufacturing', '5262170039', '1'),
('other', '3706251028', '1'),
('education', '3314711424', '1'),
('travel', '2850023133', '1'),
('messaging', '2670382462', '1'),
('music', '2250166910', '1'),
('consulting', '2181830139', '1'),
('news', '2078301586', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
