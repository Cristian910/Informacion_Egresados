-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2017 a las 04:53:06
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_datatable`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(6) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(64) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `registrado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `telefono`, `email`, `direccion`, `registrado`) VALUES
(1, 'Luis Ramon Aguilar', '2250-6000', 'info@sist.com', 'San Salvador', '2017-06-19 04:39:09'),
(2, 'Manuel Ayala', '7058-8899', 'info@gmail.com', 'Santa Ana', '2017-06-19 04:39:37'),
(3, 'Jose Luis Aguilar', '6060-6060', 'info@aguilar.net', 'Usulutan', '2017-06-19 04:40:18'),
(4, 'Ãlvaro Garcia', '6060-2222', 'alvaro@gmail.com', 'Sonsonate', '2017-06-19 04:41:30'),
(5, 'Emilio Perez', '707070770', 'emi@gmail.com', 'La Libertad', '2017-06-19 04:42:47'),
(6, 'Edith Coreas', '6250-2000', 'edith@gmail.com', 'San Salvador', '2017-06-19 04:44:42'),
(7, 'Karen Lopez', '7070-7070', 'karen@gmail.com', 'Santa ana', '2017-06-19 04:45:15'),
(8, 'Raul GarcÃ­a', '7070-8888', 'raul@gmail.com', 'La Paz', '2017-06-19 04:45:52'),
(9, 'Maria Luisa Amaya', '7070-9999', 'may@gmal.com', 'La Paz', '2017-06-19 04:46:22'),
(10, 'Esmeralda Juarez', '9090-99000', 'esme@gmail.com', 'San Salvador', '2017-06-19 04:47:12'),
(11, 'Carmen Fuentes', '2650-2520', 'carmen@yahoo.es', 'Santa Ana', '2017-06-19 04:52:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
