-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Sty 2022, 22:00
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

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
  `NazwaKlienta` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `Adres` varchar(120) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`IDKlient`, `NrTelefonu`, `NazwaKlienta`, `Adres`) VALUES
(63, '666777888', 'Admin Adminowski', 'Ul. Adminowa 12/3, 12-300 Adminów'),
(72, '123456789', 'Jacek Jackowski', 'Ul. Jackowa 12/23'),
(73, '876598632', 'Test Testowy', 'Ul. Testowa 12, 12-299 Testów');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `IDKonta` int(11) NOT NULL,
  `IDKlient` int(11) DEFAULT NULL,
  `Haslo` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Typ` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `konta`
--

INSERT INTO `konta` (`IDKonta`, `IDKlient`, `Haslo`, `Email`, `Typ`) VALUES
(28, 63, 'admin', 'admin@admin.pl', 1),
(32, 72, 'jacek', 'jacek@jacek.pl', 0),
(33, 73, 'test', 'Test@test.pl', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `potrawy`
--

CREATE TABLE `potrawy` (
  `IDPotrawy` int(11) NOT NULL,
  `Nazwa` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL,
  `Cena` decimal(6,2) NOT NULL,
  `IDKategoria` int(11) NOT NULL,
  `Opis` varchar(400) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Okladka` varchar(150) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `potrawy`
--

INSERT INTO `potrawy` (`IDPotrawy`, `Nazwa`, `Cena`, `IDKategoria`, `Opis`, `Okladka`) VALUES
(1, 'Szarlotka z lodami', '10.99', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'szarlotka.jpg'),
(2, 'Sernik', '8.50', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'sernik.jpg'),
(3, 'Makowiec', '7.00', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'makowiec.jpg'),
(4, 'Napoleonka', '14.20', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'Napoleonka.jpg'),
(5, 'Sałatka warzywna', '6.50', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'Sałatka_warzywna.jpeg'),
(6, 'Salatka szefa', '15.00', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'salatka-szefa-3.jpg'),
(7, 'Sałatka cezara', '11.20', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'salatka-cezar.jpeg'),
(8, 'Schabowy z ziemniakami i mizerią', '13.00', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'schab.jpg'),
(9, 'Kopytka z masłem', '11.20', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'kopytka.jpg'),
(10, 'Kotlety mielone z kaszą gryczaną', '10.00', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'kotlety.jpg'),
(11, 'Koktajl mleczno-bananowy z kakao', '7.99', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'kokban.jpg'),
(12, 'Orzechowy koktajl z twarożkiem', '6.50', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'orzech.jpg'),
(13, 'Owsiany koktajl z borówką', '8.30', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'koktajl-z-borowkami.jpg'),
(14, 'Jesienny koktajl proteinowy z cynamonem', '9.20', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur feugiat magna augue, eu pharetra mi iaculis a. Phasellus porttitor nisl ut consectetur hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla gravida lobortis semper. Nunc ullamcorper diam quis semper mollis. Vestibulum iaculis ligula in commodo.', 'Proteinowy-koktajl-z-dynią-i-bananem.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `IDZamowienia` int(11) NOT NULL,
  `MiejsceDostawy` varchar(80) COLLATE utf8mb4_polish_ci NOT NULL,
  `DataDostawy` datetime DEFAULT NULL,
  `DataZamowienia` date NOT NULL,
  `IDKlienta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`IDZamowienia`, `MiejsceDostawy`, `DataDostawy`, `DataZamowienia`, `IDKlienta`) VALUES
(234, 'Ul. Adminowa 12/3, 12-300 Adminów', NULL, '2022-01-30', 63),
(235, 'Ul. Adminowa 12/3, 12-300 Adminów', '2022-02-06 21:40:00', '2022-01-30', 63),
(236, 'Ul. Adminowa 12/3, 12-300 Adminów', '2022-02-06 21:40:00', '2022-01-30', 63);

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
-- Zrzut danych tabeli `zamowione_potrawy`
--

INSERT INTO `zamowione_potrawy` (`IDPotrawy`, `IDZamowienia`, `Ilosci`) VALUES
(6, 234, 2),
(6, 235, 6);

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
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`IDKonta`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `IDKlient` (`IDKlient`);

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
  MODIFY `IDKlient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `IDKonta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `potrawy`
--
ALTER TABLE `potrawy`
  MODIFY `IDPotrawy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `IDZamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD CONSTRAINT `konta_ibfk_1` FOREIGN KEY (`IDKlient`) REFERENCES `klienci` (`IDKlient`);

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
