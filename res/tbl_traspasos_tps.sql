-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2021 a las 23:11:09
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
-- Estructura de tabla para la tabla `tbl_traspasos_tps`
--

CREATE TABLE `tbl_traspasos_tps` (
  `tps_id` int(11) NOT NULL,
  `tps_num_traspaso` varchar(10) NOT NULL,
  `tps_user_registro` int(20) NOT NULL,
  `tps_tipo` varchar(35) NOT NULL,
  `tps_ams_id_origen` int(11) NOT NULL,
  `tps_ams_id_destino` int(11) NOT NULL,
  `tps_user_id_receptor` int(20) NOT NULL,
  `tps_lista_productos` text NOT NULL,
  `tps_fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_traspasos_tps`
--

INSERT INTO `tbl_traspasos_tps` (`tps_id`, `tps_num_traspaso`, `tps_user_registro`, `tps_tipo`, `tps_ams_id_origen`, `tps_ams_id_destino`, `tps_user_id_receptor`, `tps_lista_productos`, `tps_fecha`) VALUES
(1, '122', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0001\",\"nombre\":\"ALACENA PI\\u00d1A0001\",\"categoria\":\"MADERA\",\"cantidad\":\"2\"},{\"id\":\"0002\",\"nombre\":\"ALACENA FILEMON0002\",\"categoria\":\"MADERA\",\"cantidad\":\"2\"},{\"id\":\"0003\",\"nombre\":\"BASE DE CAMA INDIVIDUAL0003\",\"categoria\":\"MADERA\",\"cantidad\":\"1\"}]', '2021-04-28 03:42:35'),
(2, '123', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0001\",\"nombre\":\"ALACENA PI\\u00d1A/0001\",\"categoria\":\"MADERA\",\"cantidad\":\"2\"},{\"id\":\"0002\",\"nombre\":\"ALACENA FILEMON/0002\",\"categoria\":\"MADERA\",\"cantidad\":\"2\"},{\"id\":\"0003\",\"nombre\":\"BASE DE CAMA INDIVIDUAL/0003\",\"categoria\":\"MADERA\",\"cantidad\":\"1\"}]', '2021-04-28 03:42:35'),
(3, '124', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0001\",\"nombre\":\"ALACENA PI\\u00d1A0001\",\"categoria\":\"MADERA\",\"cantidad\":\"1\"}]', '2021-04-28 03:49:00'),
(4, '125', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0005\",\"nombre\":\"BASE DE CAMA KING SIZE0005\",\"categoria\":\"MADERA\",\"cantidad\":\"1\"}]', '2021-04-28 03:52:17'),
(5, '1', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0001\",\"nombre\":\"ALACENA PI\\u00d1A0001\",\"categoria\":\"MADERA\",\"cantidad\":\"1\"}]', '2021-04-28 04:09:27'),
(6, '2', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0001\",\"nombre\":\"ALACENA PI\\u00d1A0001\",\"categoria\":\"MADERA\",\"cantidad\":\"1\"}]', '2021-04-28 04:12:29'),
(7, 'T-0007', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0001\",\"nombre\":\"ALACENA PI\\u00d1A\\/0001\",\"categoria\":\"MADERA\",\"cantidad\":\"5\"},{\"id\":\"0002\",\"nombre\":\"ALACENA FILEMON\\/0002\",\"categoria\":\"MADERA\",\"cantidad\":\"3\"},{\"id\":\"0003\",\"nombre\":\"BASE DE CAMA INDIVIDUAL\\/0003\",\"categoria\":\"MADERA\",\"cantidad\":\"7\"},{\"id\":\"0004\",\"nombre\":\"BASE DE CAMA MATRIMONIAL\\/0004\",\"categoria\":\"MADERA\",\"cantidad\":\"2\"},{\"id\":\"0006\",\"nombre\":\"BUROES (PAR)\\/0006\",\"categoria\":\"MADERA\",\"cantidad\":\"2\"}]', '2021-04-29 04:21:03'),
(8, 'T-0008', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0003\",\"nombre\":\"BASE DE CAMA INDIVIDUAL\\/0003\",\"categoria\":\"MADERA\",\"cantidad\":\"1\"},{\"id\":\"0002\",\"nombre\":\"ALACENA FILEMON\\/0002\",\"categoria\":\"MADERA\",\"cantidad\":\"5\"},{\"id\":\"0005\",\"nombre\":\"BASE DE CAMA KING SIZE\\/0005\",\"categoria\":\"MADERA\",\"cantidad\":\"3\"},{\"id\":\"0006\",\"nombre\":\"BUROES (PAR)\\/0006\",\"categoria\":\"MADERA\",\"cantidad\":\"10\"}]', '2021-04-30 09:56:09'),
(9, 'T-0009', 83, 'ENTRADA', 10, 8, 118, '[{\"id\":\"0003\",\"nombre\":\"BASE DE CAMA INDIVIDUAL\\/0003\",\"categoria\":\"MADERA\",\"cantidad\":4}]', '2021-04-30 02:44:41'),
(10, 'T-0010', 83, 'SALIDA', 10, 8, 118, '[{\"id\":\"0004\",\"nombre\":\"BASE DE CAMA MATRIMONIAL\\/0004\",\"categoria\":\"MADERA\",\"cantidad\":\"1\"}]', '2021-04-30 02:47:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_traspasos_tps`
--
ALTER TABLE `tbl_traspasos_tps`
  ADD PRIMARY KEY (`tps_id`),
  ADD KEY `usr_traspasos_fk` (`tps_user_registro`),
  ADD KEY `usr_traspasos2_fk` (`tps_user_id_receptor`),
  ADD KEY `ams_traspasos_fk` (`tps_ams_id_origen`),
  ADD KEY `ams_traspasos2_fk` (`tps_ams_id_destino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_traspasos_tps`
--
ALTER TABLE `tbl_traspasos_tps`
  MODIFY `tps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_traspasos_tps`
--
ALTER TABLE `tbl_traspasos_tps`
  ADD CONSTRAINT `ams_traspasos2_fk` FOREIGN KEY (`tps_ams_id_destino`) REFERENCES `tbl_almacenes_ams` (`ams_id`),
  ADD CONSTRAINT `ams_traspasos_fk` FOREIGN KEY (`tps_ams_id_origen`) REFERENCES `tbl_almacenes_ams` (`ams_id`),
  ADD CONSTRAINT `usr_traspasos2_fk` FOREIGN KEY (`tps_user_id_receptor`) REFERENCES `tbl_usuarios_usr` (`usr_id`),
  ADD CONSTRAINT `usr_traspasos_fk` FOREIGN KEY (`tps_user_registro`) REFERENCES `tbl_usuarios_usr` (`usr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
