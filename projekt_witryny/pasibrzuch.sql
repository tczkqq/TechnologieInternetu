-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Lis 2021, 21:11
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pasibrzuch`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `IDKategoria` int(11) NOT NULL,
  `Nazwa` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`IDKategoria`, `Nazwa`) VALUES
(1, 'Zestaw obiadowy'),
(2, 'Koktajl'),
(3, 'Sałatka'),
(4, 'Ciasto');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `IDKlient` int(11) NOT NULL,
  `NrTelefonu` varchar(12) COLLATE utf8mb4_polish_ci NOT NULL,
  `NazwaKlienta` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`IDKlient`, `NrTelefonu`, `NazwaKlienta`) VALUES
(1, '+48509832812', 'Adam Mieckiewicz'),
(2, '+48509890812', 'Piotr Nowak'),
(3, '+48523890813', 'Anna Wiśniewska'),
(4, '+48506590816', 'Tomasz Jarnutowski'),
(5, '+48507608187', 'Jan Wilk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `potrawy`
--

CREATE TABLE `potrawy` (
  `IDPotrawy` int(11) NOT NULL,
  `Nazwa` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL,
  `Cena` decimal(6,2) NOT NULL,
  `IDKategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `potrawy`
--

INSERT INTO `potrawy` (`IDPotrawy`, `Nazwa`, `Cena`, `IDKategoria`) VALUES
(1, 'Szarlotka z lodami', '10.99', 4),
(2, 'Sernik', '8.50', 4),
(3, 'Makowiec', '7.00', 4),
(4, 'Napoleonka', '14.20', 4),
(5, 'Sałatka warzywna', '6.50', 3),
(6, 'Salatka szefa', '15.00', 3),
(7, 'Sałatka cezara', '11.20', 3),
(8, 'Schabowy z ziemniakami i mizerią', '13.00', 1),
(9, 'Kopytka z masłem', '11.20', 1),
(10, 'Kotlety mielone z kaszą gryczaną i burac', '10.00', 1),
(11, 'Koktajl mleczno-bananowy z kakao', '7.99', 2),
(12, 'Orzechowy koktajl z twarożkiem', '6.50', 2),
(13, 'Owsiany koktajl z borówką', '8.30', 2),
(14, 'Jesienny koktajl proteinowy z cynamonem', '9.20', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `IDZamowienia` int(11) NOT NULL,
  `MiejsceDostawy` varchar(80) COLLATE utf8mb4_polish_ci NOT NULL,
  `DataDostawy` date DEFAULT NULL,
  `DataZamowienia` date NOT NULL,
  `IDKlienta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowione_potrawy`
--

CREATE TABLE `zamowione_potrawy` (
  `IDPotrawy` int(11) NOT NULL,
  `IDZamowienia` int(11) NOT NULL,
  `Ilosci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`IDKategoria`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`IDKlient`);

--
-- Indeksy dla tabeli `potrawy`
--
ALTER TABLE `potrawy`
  ADD PRIMARY KEY (`IDPotrawy`),
  ADD KEY `IDKategoria` (`IDKategoria`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`IDZamowienia`),
  ADD KEY `IDKlienta` (`IDKlienta`);

--
-- Indeksy dla tabeli `zamowione_potrawy`
--
ALTER TABLE `zamowione_potrawy`
  ADD KEY `IDKlienta` (`IDPotrawy`),
  ADD KEY `IDPotrawy` (`IDZamowienia`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `IDKategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `IDKlient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `potrawy`
--
ALTER TABLE `potrawy`
  MODIFY `IDPotrawy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `IDZamowienia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `potrawy`
--
ALTER TABLE `potrawy`
  ADD CONSTRAINT `potrawy_ibfk_1` FOREIGN KEY (`IDKategoria`) REFERENCES `kategorie` (`IDKategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`IDKlienta`) REFERENCES `klienci` (`IDKlient`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `zamowione_potrawy`
--
ALTER TABLE `zamowione_potrawy`
  ADD CONSTRAINT `zamowione_potrawy_ibfk_1` FOREIGN KEY (`IDPotrawy`) REFERENCES `potrawy` (`IDPotrawy`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `zamowione_potrawy_ibfk_2` FOREIGN KEY (`IDZamowienia`) REFERENCES `zamowienia` (`IDZamowienia`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
