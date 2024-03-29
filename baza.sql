-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Sty 2021, 12:06
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents`
--

CREATE TABLE `documents` (
  `documentID` int(10) NOT NULL,
  `uploadTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModificationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `notes` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `documents`
--

INSERT INTO `documents` (`documentID`, `uploadTime`, `lastModificationTime`, `notes`, `filePath`, `editor`) VALUES
(102, '2021-01-18 22:59:55', '2021-01-18 22:59:55', 'wzorce projektowe', '/../../data/documents/S1-13-wzorce-projektowe.pdf', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gear`
--

CREATE TABLE `gear` (
  `gearID` int(10) NOT NULL,
  `purchaseInvoiceID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `netValue` float NOT NULL,
  `warrantyDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `gear`
--

INSERT INTO `gear` (`gearID`, `purchaseInvoiceID`, `userID`, `name`, `serialNumber`, `notes`, `netValue`, `warrantyDate`) VALUES
(1, 1, 3, 'Myszka komputerowa', '543TFD-34GFB', 'Elegancka', 89, '2020-12-26'),
(2, 1, 3, 'Klawiatura', '54436', NULL, 49, NULL),
(3, 1, 3, 'Podkladka', '5436', 'normalna', 19, '2021-01-02'),
(4, 1, 3, 'Kulka', '65434', 'notka', 39, '2021-01-02'),
(5, 1, 3, 'Klawiatura', '76534', NULL, 5, NULL),
(6, 1, 3, 'Klawiatura', '54346', NULL, 34, NULL),
(20, 1, 3, 'Głośniki', '76534', NULL, 45, '2020-12-29'),
(21, 1, 3, 'Głośniki', '76534', NULL, 45, '2020-12-29'),
(22, 1, 3, 'Głośniki', '231', NULL, 16, NULL),
(24, 1, 3, 'sprzet', '6546456', NULL, 765, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `purchaseinvoices`
--

CREATE TABLE `purchaseinvoices` (
  `purchaseInvoiceID` int(10) NOT NULL,
  `uploadTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModificationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `contractorData` varchar(255) NOT NULL,
  `amountNetto` float NOT NULL,
  `amountBrutto` float NOT NULL,
  `transactionDate` date NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `vat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `purchaseinvoices`
--

INSERT INTO `purchaseinvoices` (`purchaseInvoiceID`, `uploadTime`, `lastModificationTime`, `contractorData`, `amountNetto`, `amountBrutto`, `transactionDate`, `notes`, `filePath`, `currency`, `vat`) VALUES
(1, '2020-12-21 21:44:57', '2020-12-21 21:44:57', 'Gospodarstwo domowe', 450, 390, '2020-12-07', 'fajnie', './../data/invoices/purchase/test.txt', 'PLN', 0.23),
(11, '2021-03-10 04:46:39', '2021-01-11 04:46:39', 'a', 1, 1, '2021-01-05', NULL, '1111', '1', 1),
(111, '2021-04-09 03:46:39', '2021-01-11 04:46:39', '1', 1, 1, '2021-01-16', NULL, '11111111', '1', 1),
(4325, '2020-11-18 16:30:34', '2021-01-01 16:30:34', 'Krzysztof Ibisz', 2350, 3000, '2021-01-01', NULL, './../data/invoices/purchase/AI1-LAB10-SRS-Zespol_Karczma.pdf', 'PLN', 0.23),
(4328, '2021-01-13 00:59:28', '2021-01-14 00:59:28', '1', 1, 1, '2021-01-06', '1', '1', '1', 1),
(4329, '2021-01-14 00:59:28', '2021-01-27 00:59:28', '1', 1, 1, '2021-01-14', '1', '3', '1', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reports`
--

CREATE TABLE `reports` (
  `reportID` int(10) NOT NULL,
  `reportDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `roleID` int(10) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`) VALUES
(4, 'admin'),
(3, 'auditor'),
(1, 'employee'),
(2, 'owner');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles_users`
--

CREATE TABLE `roles_users` (
  `id` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roles_users`
--

INSERT INTO `roles_users` (`id`, `roleID`, `userID`) VALUES
(2, 1, 3),
(3, 2, 4),
(4, 4, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `saleinvoices`
--

CREATE TABLE `saleinvoices` (
  `saleInvoiceID` int(10) NOT NULL,
  `uploadTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModificationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `contractorData` varchar(255) NOT NULL,
  `amountNetto` float NOT NULL,
  `amountBrutto` float NOT NULL,
  `transactionDate` date NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `vat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `saleinvoices`
--

INSERT INTO `saleinvoices` (`saleInvoiceID`, `uploadTime`, `lastModificationTime`, `contractorData`, `amountNetto`, `amountBrutto`, `transactionDate`, `notes`, `filePath`, `currency`, `vat`) VALUES
(1, '2021-01-01 00:13:24', '2021-01-01 00:13:24', 'Przemysław Różewski', 780, 890, '2021-01-27', NULL, './../data/invoices/sale/lab_11_instr_cyfrowe znaki wodne.pdf', 'PLN', 0.23),
(11, '2020-07-22 04:34:24', '2021-01-11 05:35:04', '1', 1, 1, '2021-01-06', '1', '11', '1', 1),
(111, '2021-04-16 04:34:24', '2021-01-11 05:35:04', '1', 1, 1, '2021-01-17', '1', '1111', '1', 1),
(324, '2021-01-01 16:32:49', '2021-01-01 16:32:49', 'Krzysztof Krawczyk', 35, 47, '2021-01-01', NULL, './../data/invoices/sale/Gantt.pdf', 'PLN', 0.23);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `saleinvoices_users`
--

CREATE TABLE `saleinvoices_users` (
  `saleInvoiceID` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `software`
--

CREATE TABLE `software` (
  `softwareID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `purchaseInvoiceID` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `licenceKey` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `expirationDate` date DEFAULT NULL,
  `techSupportDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `software`
--

INSERT INTO `software` (`softwareID`, `userID`, `purchaseInvoiceID`, `name`, `licenceKey`, `notes`, `expirationDate`, `techSupportDate`) VALUES
(1, 3, 1, 'Licencja na artykuły użytku domowego', '6544-7543-2476-5434', NULL, NULL, NULL),
(2, 3, 1, 'Licencja testowa', '5432-6542-6765-2367', NULL, '2020-12-30', '2024-11-29'),
(3, 4, 4325, 'ASdasd', '6544-7543-2476-5415', 'ads', '2021-01-14', '2021-01-23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `jobtitle`, `phoneNumber`, `login`, `password`) VALUES
(3, 'Malwark', 'Ulisty', 'Pracownik', '111333222', 'mUlisty', '$2y$10$lIBBe/MWQ2eOuoaQKy8qmO..JdeZW7vkfKoFQ7AZfBvi5nxgBtzIW'),
(4, 'Janek', 'Kowalski', 'Właściciel', '555444666', 'jKowalski', '$2y$10$52OuXTSUIvVHsT9d0xZ6EOYb8JjBt.z22ag3NBFNa8UXiy8.Ycaz2'),
(5, 'Michał', 'Czarnota', 'Administrator', '867944326', 'mCzarnota', '$2y$10$9TsbDfT.hjprq0QcyZcXbeN8Dy08dkEiy884YkuECeaIG5vlxJlBK');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_documents`
--

CREATE TABLE `users_documents` (
  `userID` int(10) NOT NULL,
  `documentID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_purchaseinvoices`
--

CREATE TABLE `users_purchaseinvoices` (
  `userID` int(10) NOT NULL,
  `purchaseInvoiceID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`documentID`),
  ADD UNIQUE KEY `filePath` (`filePath`),
  ADD KEY `editor` (`editor`);

--
-- Indeksy dla tabeli `gear`
--
ALTER TABLE `gear`
  ADD PRIMARY KEY (`gearID`),
  ADD KEY `FKGear822160` (`userID`),
  ADD KEY `FKGear532083` (`purchaseInvoiceID`);

--
-- Indeksy dla tabeli `purchaseinvoices`
--
ALTER TABLE `purchaseinvoices`
  ADD PRIMARY KEY (`purchaseInvoiceID`),
  ADD UNIQUE KEY `filePath` (`filePath`);

--
-- Indeksy dla tabeli `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`),
  ADD UNIQUE KEY `roleName` (`roleName`);

--
-- Indeksy dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleID` (`roleID`),
  ADD KEY `userID` (`userID`);

--
-- Indeksy dla tabeli `saleinvoices`
--
ALTER TABLE `saleinvoices`
  ADD PRIMARY KEY (`saleInvoiceID`),
  ADD UNIQUE KEY `filePath` (`filePath`);

--
-- Indeksy dla tabeli `saleinvoices_users`
--
ALTER TABLE `saleinvoices_users`
  ADD PRIMARY KEY (`saleInvoiceID`,`userID`),
  ADD KEY `FKSaleInvoic516270` (`userID`);

--
-- Indeksy dla tabeli `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`softwareID`),
  ADD KEY `FKSoftware61779` (`userID`),
  ADD KEY `FKSoftware292465` (`purchaseInvoiceID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indeksy dla tabeli `users_documents`
--
ALTER TABLE `users_documents`
  ADD PRIMARY KEY (`userID`,`documentID`),
  ADD KEY `FKUsers_Docu66244` (`documentID`);

--
-- Indeksy dla tabeli `users_purchaseinvoices`
--
ALTER TABLE `users_purchaseinvoices`
  ADD PRIMARY KEY (`userID`,`purchaseInvoiceID`),
  ADD KEY `FKUsers_Purc649896` (`purchaseInvoiceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `documents`
--
ALTER TABLE `documents`
  MODIFY `documentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT dla tabeli `gear`
--
ALTER TABLE `gear`
  MODIFY `gearID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `purchaseinvoices`
--
ALTER TABLE `purchaseinvoices`
  MODIFY `purchaseInvoiceID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4330;

--
-- AUTO_INCREMENT dla tabeli `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `saleinvoices`
--
ALTER TABLE `saleinvoices`
  MODIFY `saleInvoiceID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT dla tabeli `software`
--
ALTER TABLE `software`
  MODIFY `softwareID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`editor`) REFERENCES `users` (`userID`);

--
-- Ograniczenia dla tabeli `gear`
--
ALTER TABLE `gear`
  ADD CONSTRAINT `FKGear532083` FOREIGN KEY (`purchaseInvoiceID`) REFERENCES `purchaseinvoices` (`purchaseInvoiceID`),
  ADD CONSTRAINT `FKGear822160` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Ograniczenia dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`),
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Ograniczenia dla tabeli `saleinvoices_users`
--
ALTER TABLE `saleinvoices_users`
  ADD CONSTRAINT `FKSaleInvoic516270` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `FKSaleInvoic884712` FOREIGN KEY (`saleInvoiceID`) REFERENCES `saleinvoices` (`saleInvoiceID`);

--
-- Ograniczenia dla tabeli `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `FKSoftware292465` FOREIGN KEY (`purchaseInvoiceID`) REFERENCES `purchaseinvoices` (`purchaseInvoiceID`),
  ADD CONSTRAINT `FKSoftware61779` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Ograniczenia dla tabeli `users_documents`
--
ALTER TABLE `users_documents`
  ADD CONSTRAINT `FKUsers_Docu602919` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `FKUsers_Docu66244` FOREIGN KEY (`documentID`) REFERENCES `documents` (`documentID`);

--
-- Ograniczenia dla tabeli `users_purchaseinvoices`
--
ALTER TABLE `users_purchaseinvoices`
  ADD CONSTRAINT `FKUsers_Purc649896` FOREIGN KEY (`purchaseInvoiceID`) REFERENCES `purchaseinvoices` (`purchaseInvoiceID`),
  ADD CONSTRAINT `FKUsers_Purc967449` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
