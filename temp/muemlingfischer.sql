
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 23. Mrz 2015 um 10:48
-- Server Version: 5.1.69
-- PHP-Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `u695946261_fisch`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur f√ºr Tabelle `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `article` varchar(8000) NOT NULL,
  `author` bigint(20) unsigned NOT NULL,
  `category` bigint(20) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten f√ºr Tabelle `articles`
--

INSERT INTO `articles` (`id`, `title`, `article`, `author`, `category`, `created`) VALUES
(1, 'Artikel 1', '<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<h3><em><span style="color: #ff0000;">"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</span></em></h3>\r\n</td>\r\n<td><a href="img/logo.png" rel="lightbox" title="SOOOO damn useless....."><img src="img/logo.png" alt="logo" width="200" height="200"></a></td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 1, '2015-03-15 18:05:11'),
(2, 'Artikel 2', '<p>Maecenas placerat hendrerit nisi non accumsan. Maecenas imperdiet nisi non magna accumsan, eget tincidunt metus gravida. Donec velit velit, dictum ac orci nec, mattis semper lacus. Quisque maximus neque eu tellus vulputate ullamcorper. Sed ac libero nec sem tempus vehicula. Nunc sed ex eget erat vehicula viverra. Phasellus dictum, justo quis semper rhoncus, leo diam interdum metus, vitae porttitor est libero in nisi. Nulla ut tortor pulvinar eros lobortis hendrerit. Donec auctor lacus vitae massa semper commodo. Maecenas porttitor, quam in aliquet lacinia, metus arcu pharetra libero, vel consequat odio nulla nec lectus. Ut tristique a quam a interdum. Nullam ac magna sem. Ut hendrerit, nibh nec tempor commodo, orci elit finibus neque, in dictum nisl lectus eget felis. Proin ut congue turpis. Aenean vel elit elit.</p>\r\n<p>Aliquam erat tortor, dictum vel tempor sit amet, imperdiet non est. Nulla eget purus rutrum, interdum risus sed, tincidunt ipsum. Curabitur sodales mi non turpis pellentesque, vitae posuere quam pretium. Integer eget eleifend nisl. Morbi nulla tellus, iaculis vitae vehicula eu, efficitur eu orci. Nunc lacus quam, maximus eget erat ut, maximus dapibus lacus. Mauris sed orci tristique, sollicitudin est quis, facilisis nisi. Mauris sit amet ultricies leo. Duis dapibus lacinia sagittis. Cras id magna ac nisi tempor dignissim et eget est. Donec vel consectetur ex. Etiam rhoncus eros et tempor lobortis. Nunc eget tempus felis, sit amet fringilla ipsum. Nam cursus massa id orci condimentum congue. Donec congue tempor ante ut pretium. Nunc dapibus at nisl nec accumsan.</p>', 1, 2, '2015-03-15 18:05:11'),
(3, 'ToDo-List', '<pre>\r\n- Extra CMS-Overlay for management\r\n- File based article storage\r\n- Article editor (TinyMCE)\r\n- Add category editor\r\n- Article flags\r\n- Add article changeTimestamp\r\n- Fix author listing\r\n- Implement dynamic navigation\r\n- Fix login for better security\r\n- Cleanup login and other php-functions\r\n\r\n- Add sitemap\r\n\r\nOptionals:\r\n- Enable usage for InternetExplorer (currently not supported!)\r\n- Switch font-family from OpenSans to sans-serif default?\r\n\r\nFinally:\r\n- Implement real text/articles and site info\r\n</pre>', 1, 3, '2015-03-15 18:05:11');

-- --------------------------------------------------------

--
-- Tabellenstruktur f√ºr Tabelle `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten f√ºr Tabelle `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Aktuelle Projekte'),
(5, 'Archiv'),
(4, 'Galerie'),
(6, 'Links'),
(3, 'Neuigkeiten'),
(2, 'Wissenswertes');

-- --------------------------------------------------------

--
-- Tabellenstruktur f√ºr Tabelle `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten f√ºr Tabelle `page`
--

INSERT INTO `page` (`id`, `name`) VALUES
(1, 'M&uuml;mlingfischer');

-- --------------------------------------------------------

--
-- Tabellenstruktur f√ºr Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` binary(20) NOT NULL,
  `email` varchar(254) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten f√ºr Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nickname`) VALUES
(1, 'admin', '|Jç	 7bØaÂï î=¬dî¯î', 'admin@ig-muemlingfischer.de', 'IG-M&uuml;mlingfischer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
