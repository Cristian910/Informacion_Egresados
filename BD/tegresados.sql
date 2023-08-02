-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2023 a las 04:32:01
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senacba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tegresados`
--

CREATE TABLE `tegresados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `numero_identificacion` varchar(255) DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `etapa_productiva` varchar(255) DEFAULT NULL,
  `telefono` int(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `reconocimiento` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tegresados`
--

INSERT INTO `tegresados` (`id`, `nombres`, `apellidos`, `foto`, `numero_identificacion`, `carrera`, `fecha_egreso`, `etapa_productiva`, `telefono`, `email`, `reconocimiento`) VALUES
(2, ' Juan', 'González', 'img/guardada/user2.webp', '987654321', 'Analisis y desarrollo de software', '2015-10-14', 'proyecto productivo', 555, 'juancarlos.gonzalez@email.com', 'Su capacidad para idear soluciones creativas y su enfoque en la vanguardia tecnológica lo convierten en un referente en el análisis y desarrollo de software. Su proyecto productivo ha sido reconocido por su impacto positivo y su contribución a la optimización de los procesos empresariales.'),
(5, 'Antonio', 'Perez', 'img/guardada/user.png', '2147483647', 'Medicina', '2019-06-11', 'contrato de aprendizaje', 2147483647, 'antonioperez@example.com', 'Su ética de trabajo ejemplar, capacidad para trabajar en equipo y compromiso con la atención médica de calidad lo convierten en un referente en su área. El SENA se enorgullece de sus logros y reconoce a Antonio como un modelo a seguir para futuros profesionales de la medicina.'),
(8, 'Laura', 'Sánchez', 'img/guardada/foto.jpg', '1234509876', 'Contabilidad', '2017-05-17', 'pasantia', 2147483647, 'laura.sanchez@example.com', 'Durante su pasantía, demostró un compromiso excepcional y habilidades sólidas en el manejo de registros financieros, siendo reconocida por su precisión y dedicación. Su capacidad para trabajar en equipo y brindar recomendaciones estratégicas la distinguen como una profesional sobresaliente en el áre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tegresados`
--
ALTER TABLE `tegresados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tegresados`
--
ALTER TABLE `tegresados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
