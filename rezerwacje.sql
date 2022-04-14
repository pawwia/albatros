-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lut 2018, 17:41
-- Wersja serwera: 10.0.17-MariaDB
-- Wersja PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rezerwacje`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`ID`, `user`, `pass`) VALUES
(1, 'admin', 'xxx');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `house`
--

CREATE TABLE `house` (
  `ID` int(11) NOT NULL,
  `Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `house`
--

INSERT INTO `house` (`ID`, `Number`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `ID` int(11) NOT NULL COMMENT 'ID rezerwacji',
  `User_ID` int(11) NOT NULL COMMENT 'relacja do id tabeli user',
  `House` int(11) NOT NULL COMMENT 'relacja do id z tabeli domy',
  `Bookfrom` date NOT NULL COMMENT 'czas podbytu od',
  `Bookto` date NOT NULL COMMENT 'czas pobytu do',
  `Status` text NOT NULL COMMENT 'Status płatności',
  `Edited` tinyint(1) DEFAULT NULL COMMENT 'czy rezerwacja była edytowana'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`ID`, `User_ID`, `House`, `Bookfrom`, `Bookto`, `Status`, `Edited`) VALUES
(1, 1, 2, '2018-02-04', '2018-02-07', 'Paid', 0),
(2, 1, 3, '2018-02-12', '2018-02-22', 'paid', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Sex` char(1) NOT NULL,
  `Telephone` varchar(11) NOT NULL,
  `Telephone2` varchar(11) DEFAULT NULL,
  `Birthday` date NOT NULL,
  `Pesel` varchar(11) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID`, `Name`, `Surname`, `Sex`, `Telephone`, `Telephone2`, `Birthday`, `Pesel`, `Email`) VALUES
(1, 'Adam', 'Mickiewicz', 'm', '999999999', NULL, '2018-02-07', '99999999999', 'waaw@wq.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Number` (`Number`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `House` (`House`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID rezerwacji', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`House`) REFERENCES `house` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
