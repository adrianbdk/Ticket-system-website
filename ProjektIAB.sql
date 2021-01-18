-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 18 Sty 2021, 10:16
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ProjektIAB`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Blad`
--

CREATE TABLE `Blad` (
  `blad_id` int(11) NOT NULL,
  `gra_id` int(11) NOT NULL,
  `kategoriaBledu_id` int(11) NOT NULL,
  `statusBledu_id` int(11) NOT NULL,
  `attachment` varchar(256) NOT NULL,
  `description` varchar(250) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `Blad`
--

INSERT INTO `Blad` (`blad_id`, `gra_id`, `kategoriaBledu_id`, `statusBledu_id`, `attachment`, `description`, `title`, `date`, `uzytkownik_id`) VALUES
(42, 4, 2, 1, 'uploads/Tickets Attachments/6005517a0593c1.22252792.png', 'testtesttesttesttesttesttesttesttesttesttesttesttesttest', 'testticket', '2021-01-18 10:14:34', 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Gra`
--

CREATE TABLE `Gra` (
  `gra_id` int(11) NOT NULL,
  `Nazwa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `Gra`
--

INSERT INTO `Gra` (`gra_id`, `Nazwa`) VALUES
(2, 'Red Dead Redemption 2'),
(3, 'Counter-Strike: Global Offensive'),
(4, 'Cyberpunk 2077'),
(5, 'Among Us');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `KategoriaBledu`
--

CREATE TABLE `KategoriaBledu` (
  `kategoriaBledu_id` int(11) NOT NULL,
  `Nazwa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `KategoriaBledu`
--

INSERT INTO `KategoriaBledu` (`kategoriaBledu_id`, `Nazwa`) VALUES
(1, 'Graphics Glitch'),
(2, 'Gameplay Defect'),
(3, 'Audio Problem'),
(4, 'Save Glitch'),
(5, 'Game-breaking');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Komentarz`
--

CREATE TABLE `Komentarz` (
  `id_komentarz` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `blad_id` int(11) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `Komentarz`
--

INSERT INTO `Komentarz` (`id_komentarz`, `comment`, `blad_id`, `uzytkownik_id`) VALUES
(9, 'test', 42, 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Plik`
--

CREATE TABLE `Plik` (
  `plik_id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `ext` varchar(25) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Pracownik`
--

CREATE TABLE `Pracownik` (
  `pracownik_id` int(11) NOT NULL,
  `Imie` varchar(25) NOT NULL,
  `Nazwisko` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Producent`
--

CREATE TABLE `Producent` (
  `producent_id` int(11) NOT NULL,
  `gra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ProducentPracownik`
--

CREATE TABLE `ProducentPracownik` (
  `producent_id` int(11) NOT NULL,
  `pracownik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `StatusBledu`
--

CREATE TABLE `StatusBledu` (
  `statusBledu_id` int(11) NOT NULL,
  `Nazwa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `StatusBledu`
--

INSERT INTO `StatusBledu` (`statusBledu_id`, `Nazwa`) VALUES
(1, 'NEW'),
(2, 'PENDING'),
(3, 'RESOLVED'),
(4, 'CLOSED'),
(5, 'QUEUED');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uzytkownik`
--

CREATE TABLE `Uzytkownik` (
  `uzytkownik_id` int(11) NOT NULL,
  `Login` varchar(25) NOT NULL,
  `Haslo` varchar(80) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `permissions` varchar(20) NOT NULL,
  `profile_photo` varchar(100) DEFAULT NULL,
  `display_name` varchar(25) DEFAULT NULL,
  `join_date` varchar(80) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `Uzytkownik`
--

INSERT INTO `Uzytkownik` (`uzytkownik_id`, `Login`, `Haslo`, `Mail`, `permissions`, `profile_photo`, `display_name`, `join_date`) VALUES
(15, 'adrianbdk', '$2y$10$5/ZBCj8D6Khcbz0If1PMb.RtPJZmiC3CVcc5dPVXZ2RtuUZ1tmdlS', 'adrianbdk@gmail.com', 'Admin', 'images/user_profile_pics/5fe1bb9f0a0e29.60383215.png', 'adrianbdk', '2015/07/08');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Blad`
--
ALTER TABLE `Blad`
  ADD PRIMARY KEY (`blad_id`),
  ADD KEY `gra_id` (`gra_id`),
  ADD KEY `kategoriaBledu_id` (`kategoriaBledu_id`),
  ADD KEY `statusBledu_id` (`statusBledu_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `Gra`
--
ALTER TABLE `Gra`
  ADD PRIMARY KEY (`gra_id`);

--
-- Indeksy dla tabeli `KategoriaBledu`
--
ALTER TABLE `KategoriaBledu`
  ADD PRIMARY KEY (`kategoriaBledu_id`);

--
-- Indeksy dla tabeli `Komentarz`
--
ALTER TABLE `Komentarz`
  ADD PRIMARY KEY (`id_komentarz`),
  ADD KEY `Komentarz_ibfk_1` (`blad_id`),
  ADD KEY `Komentarz_ibfk_2` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `Pracownik`
--
ALTER TABLE `Pracownik`
  ADD PRIMARY KEY (`pracownik_id`);

--
-- Indeksy dla tabeli `Producent`
--
ALTER TABLE `Producent`
  ADD PRIMARY KEY (`producent_id`),
  ADD KEY `gra_id` (`gra_id`);

--
-- Indeksy dla tabeli `ProducentPracownik`
--
ALTER TABLE `ProducentPracownik`
  ADD KEY `pracownik_id` (`pracownik_id`),
  ADD KEY `producent_id` (`producent_id`);

--
-- Indeksy dla tabeli `StatusBledu`
--
ALTER TABLE `StatusBledu`
  ADD PRIMARY KEY (`statusBledu_id`);

--
-- Indeksy dla tabeli `Uzytkownik`
--
ALTER TABLE `Uzytkownik`
  ADD PRIMARY KEY (`uzytkownik_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `Blad`
--
ALTER TABLE `Blad`
  MODIFY `blad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT dla tabeli `Gra`
--
ALTER TABLE `Gra`
  MODIFY `gra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `KategoriaBledu`
--
ALTER TABLE `KategoriaBledu`
  MODIFY `kategoriaBledu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `Komentarz`
--
ALTER TABLE `Komentarz`
  MODIFY `id_komentarz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `Pracownik`
--
ALTER TABLE `Pracownik`
  MODIFY `pracownik_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Producent`
--
ALTER TABLE `Producent`
  MODIFY `producent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `StatusBledu`
--
ALTER TABLE `StatusBledu`
  MODIFY `statusBledu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `Uzytkownik`
--
ALTER TABLE `Uzytkownik`
  MODIFY `uzytkownik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Blad`
--
ALTER TABLE `Blad`
  ADD CONSTRAINT `Blad_ibfk_1` FOREIGN KEY (`gra_id`) REFERENCES `Gra` (`gra_id`),
  ADD CONSTRAINT `Blad_ibfk_2` FOREIGN KEY (`kategoriaBledu_id`) REFERENCES `KategoriaBledu` (`kategoriaBledu_id`),
  ADD CONSTRAINT `Blad_ibfk_3` FOREIGN KEY (`statusBledu_id`) REFERENCES `StatusBledu` (`statusBledu_id`),
  ADD CONSTRAINT `Blad_ibfk_4` FOREIGN KEY (`uzytkownik_id`) REFERENCES `Uzytkownik` (`uzytkownik_id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `Komentarz`
--
ALTER TABLE `Komentarz`
  ADD CONSTRAINT `Komentarz_ibfk_1` FOREIGN KEY (`blad_id`) REFERENCES `Blad` (`blad_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Komentarz_ibfk_2` FOREIGN KEY (`uzytkownik_id`) REFERENCES `Uzytkownik` (`uzytkownik_id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `Producent`
--
ALTER TABLE `Producent`
  ADD CONSTRAINT `Producent_ibfk_1` FOREIGN KEY (`gra_id`) REFERENCES `Gra` (`gra_id`);

--
-- Ograniczenia dla tabeli `ProducentPracownik`
--
ALTER TABLE `ProducentPracownik`
  ADD CONSTRAINT `ProducentPracownik_ibfk_1` FOREIGN KEY (`pracownik_id`) REFERENCES `Pracownik` (`pracownik_id`),
  ADD CONSTRAINT `ProducentPracownik_ibfk_2` FOREIGN KEY (`producent_id`) REFERENCES `Producent` (`producent_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
