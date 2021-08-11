-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 09. dub 2021, 14:12
-- Verze serveru: 10.4.17-MariaDB
-- Verze PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `company`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `type` varchar(45) NOT NULL,
  `year_of_manufacture` year(4) NOT NULL,
  `vin` varchar(17) NOT NULL,
  `number` int(4) NOT NULL,
  `odometer` int(6) NOT NULL,
  `next_veh_inspect` date NOT NULL,
  `on_road` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `vehicle`
--

INSERT INTO `vehicle` (`id`, `brand`, `type`, `year_of_manufacture`, `vin`, `number`, `odometer`, `next_veh_inspect`, `on_road`) VALUES
(1, 'Iveco', 'Stralis', 2008, 'WJMM1VUJ00C172178', 208, 1260000, '2021-04-17', 0),
(13, 'Mercedes', 'Axor', 2012, 'WKMM1VUJ00C172179', 219, 555666, '2021-07-11', 0);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `number_UNIQUE` (`number`),
  ADD UNIQUE KEY `vin_UNIQUE` (`vin`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
