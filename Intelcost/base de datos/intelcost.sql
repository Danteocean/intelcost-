-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2020 a las 05:18:53
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intelcost`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `edad` smallint(6) NOT NULL,
  `correp_electronico` varchar(150) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombres`, `apellidos`, `edad`, `correp_electronico`, `celular`, `telefono`, `registro`) VALUES
(1, 'daniel felipe', 'molina', 28, 'danicool24@hotmail.com', 3202955912, '7274652', '0000-00-00 00:00:00'),
(2, 'DANTE', 'DMC', 23, 'DA2312S@GAMA.COM', 4123412, '4124124', '2020-08-20 11:53:22'),
(3, 'falco', 'rass', 42, 'daniel.molina.unillanos@gmail.com', 4123124123, '3193742980', '2020-08-20 12:08:44'),
(4, 'alba lilia', 'cely rodriguez', 51, 'dayana@fas.com', 5412313, '7274123', '2020-08-20 12:11:32'),
(17, 'rosa', 'cely', 67, 'ros@cely.com', 3202955912, '7274123', '2020-08-20 21:11:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
