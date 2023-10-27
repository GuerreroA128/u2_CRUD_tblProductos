-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 20:00:45
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `idpro` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` varchar(12) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `categoria` enum('Ropa','Electronica','Muebles','Escolar','Basicos') NOT NULL,
  `marca` varchar(100) NOT NULL,
  `idprov` int(10) UNSIGNED NOT NULL,
  `cantidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mahasiswa`
--

INSERT INTO `mahasiswa` (`idpro`, `nombre`, `stock`, `descripcion`, `categoria`, `marca`, `idprov`, `cantidad`) VALUES
(3, 'POPOTES', '23', 'es paRA HACER ASI :O', 'Escolar', 'pirata', 1, 124),
(4, 'Teclado', '10', 'es para escribir', 'Electronica', 'DELL', 201, 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`idpro`),
  ADD UNIQUE KEY `NIM_unique` (`stock`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `idpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
