-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Apr 2021 um 11:25
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `create_your_dashboard`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `benutzername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `farbschema` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `uhrPos` varchar(255) NOT NULL,
  `wetterPos` varchar(255) NOT NULL,
  `newsPos` varchar(255) NOT NULL,
  `avatarPos` varchar(255) NOT NULL,
  `wettereffekt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `benutzername`, `email`, `passwort`, `avatar`, `farbschema`, `city`, `uhrPos`, `wetterPos`, `newsPos`, `avatarPos`, `wettereffekt`) VALUES
(30, 'Jackie Chan', 'peter@test.com', '$2y$10$KG9zdLWrWJJItfFV1gwQeOMepe2jgQ7aOUzCZlolgKaSpVOqge0au', 'avataaars', 1, 'Winterthur', 'first', 'second', 'third', 'fourth', 1),
(32, 'MarkTheMan', 'markus@test.com', '$2y$10$J0gKEAg20MTn4R0OqJa56OScT69pN2X9whJ7.WWuSEU1ISjLt9xsm', 'bottts', 1, 'Winterthur', 'first', 'second', 'third', 'fourth', 1),
(40, 'Reto', 'test@test.com', '$2y$10$3iYbQbS0pPdh9xkE2a.6K.LZZuMDJh3/JOySssNtrG3DRcCvCCEfC', 'male', 1, 'Winterthur', 'first', 'second', 'third', 'fourth', 1),
(41, 'asdfasdf', 'NocheinTest@test.com', '$2y$10$ZM72xbNLtdjbw3gGnasK5eWAzOlRVJMZ/iVxg519TvTnm5ZuNU2U2', 'male', 1, 'Zürich', 'first', 'second', 'third', 'fourth', 1),
(42, 'UeliTheMan', 'ueli@test.com', '$2y$10$awp9UahF7FJzPLbvI5PaK.qgMlp7P1dI287phhGvNFDBYCyljFqbO', 'male', 1, 'iqaluit', 'first', 'second', 'third', 'fourth', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
