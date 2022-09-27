-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2022 a las 05:36:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS desarrollo_web;
--
-- Base de datos: `desarrollo_web`
--

USE desarrollo_web;
-- --------------------------------------------------------


CREATE TABLE `table1` (
  `table1_id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `nom_medicamento` varchar(60) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


CREATE TABLE `table2` (
  `table2_id` int(11) NOT NULL,
  `table1_id` int(11) NOT NULL,
  `farmacia` varchar(70) NOT NULL,
  `nom_vendedor` varchar(70) NOT NULL,
  `datetime_venta` datetime NOT NULL,
  `medicamento_vence` date NOT NULL,
  `unidades` int(11) NOT NULL,
  `precio_unidad` float NOT NULL,
  `email_cliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `table1`
  ADD PRIMARY KEY (`table1_id`);


ALTER TABLE `table2`
  ADD PRIMARY KEY (`table2_id`),
  ADD KEY `table1_id` (`table1_id`);


ALTER TABLE `table1`
  MODIFY `table1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 0;


ALTER TABLE `table2`
  MODIFY `table2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 0;


ALTER TABLE `table2`
  ADD CONSTRAINT `table2_ibfk_1` FOREIGN KEY (`table1_id`) REFERENCES `table1` (`table1_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
