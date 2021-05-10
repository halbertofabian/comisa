-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2021 a las 23:42:00
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_comisa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_datos_ventas_dvts`
--

CREATE TABLE `tbl_datos_ventas_dvts` (
  `dvts_id` int(11) NOT NULL,
  `dvts_id_vendedor` int(20) NOT NULL,
  `dvts_id_plantilla` int(11) NOT NULL,
  `dvts_sabado` int(11) DEFAULT NULL,
  `dvts_domingo` int(11) DEFAULT NULL,
  `dvts_lunes` int(11) DEFAULT NULL,
  `dvts_martes` int(11) DEFAULT NULL,
  `dvts_miercoles` int(11) DEFAULT NULL,
  `dvts_jueves` int(11) DEFAULT NULL,
  `dvts_viernes` int(11) DEFAULT NULL,
  `dvts_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_datos_ventas_dvts`
--

INSERT INTO `tbl_datos_ventas_dvts` (`dvts_id`, `dvts_id_vendedor`, `dvts_id_plantilla`, `dvts_sabado`, `dvts_domingo`, `dvts_lunes`, `dvts_martes`, `dvts_miercoles`, `dvts_jueves`, `dvts_viernes`, `dvts_total`) VALUES
(5, 105, 1, 0, 5, 1, 0, 1, 0, 0, 7),
(6, 104, 1, 5, 2, 1, 2, 5, 0, 0, 15),
(7, 105, 2, 1, 0, 0, 0, 0, 0, 0, 1),
(8, 104, 2, 1, 0, 1, 0, 1, 0, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plantilla_ventas_pvts`
--

CREATE TABLE `tbl_plantilla_ventas_pvts` (
  `pvts_id` int(11) NOT NULL,
  `pvts_usr_registro` varchar(60) NOT NULL,
  `pvts_num_semana` int(11) NOT NULL,
  `pvts_fecha_inicio` datetime NOT NULL,
  `pvts_fecha_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_plantilla_ventas_pvts`
--

INSERT INTO `tbl_plantilla_ventas_pvts` (`pvts_id`, `pvts_usr_registro`, `pvts_num_semana`, `pvts_fecha_inicio`, `pvts_fecha_fin`) VALUES
(1, 'JEFE VENTAS', 1, '2021-05-01 00:00:00', '2021-05-06 00:00:00'),
(2, 'JEFE VENTAS', 2, '2021-05-08 00:00:00', '2021-05-13 00:00:00'),
(3, 'JEFE VENTAS', 3, '2021-05-15 00:00:00', '2021-05-20 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_datos_ventas_dvts`
--
ALTER TABLE `tbl_datos_ventas_dvts`
  ADD PRIMARY KEY (`dvts_id`),
  ADD KEY `usr_datos_ventas_fk` (`dvts_id_vendedor`),
  ADD KEY `pvts_datos_ventas_fk` (`dvts_id_plantilla`);

--
-- Indices de la tabla `tbl_plantilla_ventas_pvts`
--
ALTER TABLE `tbl_plantilla_ventas_pvts`
  ADD PRIMARY KEY (`pvts_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_datos_ventas_dvts`
--
ALTER TABLE `tbl_datos_ventas_dvts`
  MODIFY `dvts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_plantilla_ventas_pvts`
--
ALTER TABLE `tbl_plantilla_ventas_pvts`
  MODIFY `pvts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_datos_ventas_dvts`
--
ALTER TABLE `tbl_datos_ventas_dvts`
  ADD CONSTRAINT `pvts_datos_ventas_fk` FOREIGN KEY (`dvts_id_plantilla`) REFERENCES `tbl_plantilla_ventas_pvts` (`pvts_id`),
  ADD CONSTRAINT `usr_datos_ventas_fk` FOREIGN KEY (`dvts_id_vendedor`) REFERENCES `tbl_usuarios_usr` (`usr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `tbl_plantilla_ventas_pvts` CHANGE `pvts_fecha_inicio` `pvts_fecha_inicio` DATE NOT NULL, CHANGE `pvts_fecha_fin` `pvts_fecha_fin` DATE NOT NULL;
