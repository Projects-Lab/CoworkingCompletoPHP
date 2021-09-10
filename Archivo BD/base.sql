-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2021 a las 04:09:51
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coworking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `total_horas` int(5) NOT NULL,
  `nota` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `total` decimal(10,4) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `fecha_asignacion`, `hora_inicio`, `hora_final`, `total_horas`, `nota`, `total`, `usuario_id`, `cliente_id`, `sala_id`) VALUES
(7, '2021-09-09 00:00:00', '17:18:00', '19:18:00', 2, 'CHENTE', '20000.0000', 6, 2, 8),
(8, '2021-09-10 00:00:00', '16:57:00', '19:57:00', 4, 'Notas 1', '40000.0000', 6, 9, 8),
(9, '2021-09-09 00:00:00', '18:01:00', '20:01:00', 6, '33', '6000.0000', 6, 9, 1),
(10, '2021-09-09 00:00:00', '18:02:00', '21:02:00', 5, 'nota', '7500.0000', 6, 8, 2),
(11, '2021-09-09 00:00:00', '19:48:00', '21:48:00', 5, 'nota', '50000.0000', 6, 9, 8),
(12, '2021-09-09 00:00:00', '19:49:00', '21:49:00', 3, 'nota', '7500.0000', 6, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `numero` int(15) NOT NULL,
  `nombre1` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre2` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido1` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido2` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int(15) DEFAULT NULL,
  `celular` int(15) NOT NULL,
  `estado` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `numero`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `direccion`, `correo`, `telefono`, `celular`, `estado`) VALUES
(2, 1234, 'Pepito', 'a', 'a', 'a', 'a', 'a@hotmail.com', 323, 3232, 1),
(3, 24244, '4', '4', '4', '4', '4', '4@hotmail.com', 3, 3, 1),
(4, 424225, 'ewe', 'wew', 'wew', 'ewe', 'we', 'wew@hotmail.com', 343, 4343, 0),
(5, 923434, 'q', 'q', 'q', 'q', 'q', 'q@hotmail.com', 3, 3, 1),
(6, 342432, 'dddddd', '2', '2', '2', '2', '2@hotmail.com', 23, 23, 1),
(7, 96768, '230', '23', '23', '23', '23', '23@hotmail.com', 233, 233, 0),
(8, 756577, 'persona1', 'persona1', 'persona1', 'persona1', 'persona1', 'persona1@hotmail.com', 890, 890, 1),
(9, 12345, 'w', 'w', 'w', 'w', 'w', 'w@hotmail.com', 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio_hora` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `nombre`, `precio_hora`, `estado`) VALUES
(1, 'TALLER', '1000.00', 1),
(2, 'CONFERENCIAS', '1500.00', 1),
(6, 'SALA 4', '4000.00', 0),
(7, 'GENERAL', '2500.00', 1),
(8, 'COWORKING', '10000.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` longtext COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `rol`, `estado`) VALUES
(6, 'secretario1', '$2y$10$y6CNtXh1.0d2GVOMf/fab.cAMBYXM9FKoveEN.RY9mJQm4nJD1lmC', 'SECRETARIO', 1),
(16, 'admin', '$2y$10$ZCQjke9Dh/YS/a0/pHMQb.GZNJPwDxs8bKVjFF/P0.swaUGsF2ZNu', 'ADMINISTRADOR', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asignacion_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_asignacion_cliente1_idx` (`cliente_id`),
  ADD KEY `fk_asignacion_sala1_idx` (`sala_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `fk_asignacion_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_sala1` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
