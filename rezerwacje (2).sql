-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Mar 2018, 17:41
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
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `reservation` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Status` int(11) NOT NULL COMMENT 'Status płatności',
  `Edited` tinyint(1) DEFAULT NULL COMMENT 'czy rezerwacja była edytowana',
  `price` float NOT NULL,
  `User` text NOT NULL,
  `Regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`ID`, `User_ID`, `House`, `Bookfrom`, `Bookto`, `Status`, `Edited`, `price`, `User`, `Regtime`) VALUES
(1, 1, 2, '2018-02-04', '2018-02-07', 0, 0, 0, '', '2018-03-18 11:52:01'),
(2, 1, 3, '2018-02-12', '2018-02-22', 0, 1, 0, '', '2018-03-18 11:52:01'),
(3, 1, 2, '2018-03-10', '2018-03-15', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(7, 4, 3, '2018-04-21', '2018-04-23', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(9, 6, 2, '2018-04-01', '2018-04-20', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(11, 4, 3, '2018-04-01', '2018-04-20', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(12, 4, 1, '2018-04-01', '2018-04-20', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(13, 4, 4, '2018-04-01', '2018-04-20', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(14, 4, 5, '2018-04-01', '2018-04-20', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(15, 4, 1, '0000-00-00', '0000-00-00', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(16, 4, 1, '2018-05-23', '2018-05-31', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(17, 4, 1, '2018-03-20', '2018-03-29', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(18, 4, 2, '2018-03-20', '2018-03-29', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(19, 4, 1, '2018-09-12', '2018-09-15', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(20, 4, 1, '2018-03-14', '2018-03-16', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(21, 4, 2, '2018-03-26', '2018-03-30', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(22, 4, 4, '2018-03-26', '2018-03-30', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(23, 4, 3, '2018-03-26', '2018-03-30', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(24, 4, 1, '2018-05-01', '2018-05-03', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(25, 4, 3, '2018-03-21', '2018-03-29', 0, NULL, 0, '', '2018-03-18 11:52:01'),
(26, 7, 6, '2018-04-10', '2018-04-17', 0, NULL, -1050, '', '2018-03-18 11:52:01'),
(27, 7, 1, '2018-12-02', '2018-12-10', 0, NULL, -1200, '', '2018-03-18 11:52:01'),
(28, 7, 1, '2018-05-14', '2018-05-22', 0, NULL, -1200, '', '2018-03-18 11:57:22'),
(29, 7, 6, '2018-04-02', '2018-04-03', 0, NULL, -150, '', '2018-03-18 12:39:29'),
(30, 7, 1, '2018-05-04', '2018-05-07', 0, NULL, -450, '', '2018-03-18 12:41:28'),
(31, 7, 1, '2018-06-01', '2018-06-07', 0, NULL, -900, 'admin', '2018-03-18 12:48:12'),
(32, 7, 1, '2018-01-01', '2018-01-02', 0, NULL, -150, 'admin', '2018-03-18 12:49:06'),
(33, 7, 2, '2018-06-01', '2018-06-10', 0, NULL, -1350, 'admin', '2018-03-18 12:50:50'),
(34, 7, 1, '2018-02-02', '2018-02-08', 0, NULL, -900, 'admin', '2018-03-18 12:53:51');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stawka`
--

CREATE TABLE `stawka` (
  `id` int(11) NOT NULL,
  `stawka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `stawka`
--

INSERT INTO `stawka` (`id`, `stawka`) VALUES
(1, 150);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Telephone` varchar(11) NOT NULL,
  `Telephone2` varchar(11) DEFAULT NULL,
  `Pesel` varchar(11) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID`, `Name`, `Surname`, `Telephone`, `Telephone2`, `Pesel`, `Email`) VALUES
(1, 'Adam', 'Mickiewicz', '999999999', NULL, '99999999999', 'waaw@wq.pl'),
(4, 'Adam', 'Asnyk', '663222222', '', '12312312311', 'Adam@gmail.com'),
(5, 'Adrian', 'Asnyk', '663222222', '', '99978788877', 'Adam@gmail.com'),
(6, 'Adroam', 'Asnyk', '663222222', '', '22312312311', 'Adam@gmail.com'),
(7, 'PaweÅ‚', 'Wiatrak', '663102525', '663102525', '98061203450', 'wiatrakpawel@gmail.com');

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `reservation` (`reservation`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `House` (`House`);

--
-- Indexes for table `stawka`
--
ALTER TABLE `stawka`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID rezerwacji', AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`reservation`) REFERENCES `reservations` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`House`) REFERENCES `house` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
