-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mrz 2015 um 00:50
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `muemlingfischer`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` bigint(20) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `article` varchar(8000) NOT NULL,
  `author` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` bigint(20) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` binary(20) NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 0x7c4a8d09ca3762af61e59520943dc26494f8941b, 'admin@ig-muemlingfischer.de');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `articles`
--
ALTER TABLE `articles`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
