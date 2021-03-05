-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2021 a las 12:05:43
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testsion2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `tNombres` text NOT NULL,
  `tApellidos` text NOT NULL,
  `tEdad` date NOT NULL,
  `tCedula` text NOT NULL,
  `tNacionalidad` text NOT NULL,
  `tEstado` varchar(20) NOT NULL,
  `dtCreado` datetime NOT NULL,
  `dtModificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `tNombres`, `tApellidos`, `tEdad`, `tCedula`, `tNacionalidad`, `tEstado`, `dtCreado`, `dtModificado`) VALUES
(1, 'Maria Fernanda', 'Ichazo', '1970-01-30', '123123fg', 'Bolivia', '1', '1970-01-01 00:00:00', '2021-03-05 00:00:00'),
(2, 'Marcelo', 'Arrazola', '1970-01-01', '123123', 'Argentina', '1', '1970-01-01 00:00:00', '2021-03-05 00:00:00'),
(3, 'marce', 'arrrrdsafaf', '1970-01-01', '123123', 'Boliviana', '1', '1970-01-01 00:00:00', '2021-03-05 00:00:00'),
(4, 'marce', 'arrrr', '1970-07-25', '123123', 'Boliviana', '0', '1970-01-01 00:00:00', '2021-03-05 00:00:00'),
(5, 'marce', 'arrrr', '1970-01-01', '123123fg', 'Boliviana', '1', '1970-01-01 00:00:00', '2021-03-05 00:00:00'),
(6, 'marce', 'arrrr', '1970-01-01', '123123', 'Boliviana', '0', '1970-01-01 00:00:00', '2021-03-05 00:00:00'),
(7, 'marce213', 'arrrrsz', '1970-01-01', '123123', 'Boliviana', '1', '2021-03-05 00:00:00', '2021-03-05 00:00:00'),
(8, 'Marcelo', 'Arrazola', '2021-03-27', '123123fg', 'Argentina', '0', '2021-03-05 00:00:00', '2021-03-05 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tNombre` text NOT NULL,
  `tCorreoE` text NOT NULL,
  `tPass` text NOT NULL,
  `tCargo` text NOT NULL,
  `iEstado` int(11) NOT NULL,
  `dtModificacion` datetime NOT NULL,
  `dtCreacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tNombre`, `tCorreoE`, `tPass`, `tCargo`, `iEstado`, `dtModificacion`, `dtCreacion`) VALUES
(1, 'marcelo', 'marce@marce.com', '123', 'Administrativo', 1, '2021-03-05 00:00:00', '2021-03-05 00:00:00'),
(2, 'marce2', 'marce@marce88.com', '123', 'IT', 1, '2021-03-05 00:00:00', '2021-03-05 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
