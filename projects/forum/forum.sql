-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 jun 2023 om 00:17
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `reply` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `replies`
--

INSERT INTO `replies` (`id`, `reply`, `user_id`, `user_image`, `topic_id`, `created_at`) VALUES
(1, 'tomb raider', 1, 'image1.png', 1, '2023-06-29 21:21:42');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `topic`
--

INSERT INTO `topic` (`id`, `title`, `category`, `body`, `user_name`, `user_image`, `created_at`) VALUES
(1, 'aaaaaaaaaaa', 'Design', 'asdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdasasdasdasdasdasdas', 'bma3an@gmail.com', 'image1.png', '2023-06-29 21:03:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `about`, `avatar`, `created_at`) VALUES
(1, 'bma3an@gmail.com', 'bma3an@gmail.com', 'bma3an@gmail.com', '$2y$10$UYZm5vV6y0XfNp2.6a9Lse1oLIgy0CxWKp38QlBYTAYVar2kRFDvK', 'bma3an@gmail.combma3an@gmail.combma3an@gmail.combma3an@gmail.combma3an@gmail.combma3an@gmail.combma3an@gmail.combma3an@gmail.combma3an@gmail.com', 'gravatar.png', '2023-06-29 18:31:19'),
(2, 'bma3an47', 'bma3an47@gmail.com', 'bma3an47', '$2y$10$ecMCOKZXhGAb1T/YVpAThOaFIXiJ8JHcxn6QtQSnwxFsIHXTfnc5u', 'bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47bma3an47', 'gravatar.png', '2023-06-29 18:31:35');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
