-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 05 Lis 2020, 23:46
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
  `uzytkownik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Gra`
--

CREATE TABLE `Gra` (
  `gra_id` int(11) NOT NULL,
  `Nazwa` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `KategoriaBledu`
--

CREATE TABLE `KategoriaBledu` (
  `kategoriaBledu_id` int(11) NOT NULL,
  `Nazwa` varchar(25) NOT NULL
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uzytkownik`
--

CREATE TABLE `Uzytkownik` (
  `uzytkownik_id` int(11) NOT NULL,
  `Login` varchar(25) NOT NULL,
  `Haslo` varchar(80) NOT NULL,
  `Mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `Uzytkownik`
--

INSERT INTO `Uzytkownik` (`uzytkownik_id`, `Login`, `Haslo`, `Mail`) VALUES
(1, 'adrianbdk', 'haslo123', 'adrianbdk@gmail.com');

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
  MODIFY `blad_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Gra`
--
ALTER TABLE `Gra`
  MODIFY `gra_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `KategoriaBledu`
--
ALTER TABLE `KategoriaBledu`
  MODIFY `kategoriaBledu_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `statusBledu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Uzytkownik`
--
ALTER TABLE `Uzytkownik`
  MODIFY `uzytkownik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `Blad_ibfk_4` FOREIGN KEY (`uzytkownik_id`) REFERENCES `Uzytkownik` (`uzytkownik_id`);

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
