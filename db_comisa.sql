-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 09:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_comisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_abonos_abs`
--

CREATE TABLE `tbl_abonos_abs` (
  `abs_id` int(11) NOT NULL,
  `abs_id_tarjeta_cobro` varchar(20) NOT NULL,
  `abs_fecha_cobro` datetime NOT NULL,
  `abs_id_cobrador` int(11) NOT NULL,
  `abs_monto` double(10,2) NOT NULL,
  `abs_adeudo` double(10,2) NOT NULL,
  `abs_mp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_abonos_empleados_absemp`
--

CREATE TABLE `tbl_abonos_empleados_absemp` (
  `absemp_id` int(11) NOT NULL,
  `absemp_fecha` datetime NOT NULL,
  `absemp_abono` double(10,2) NOT NULL,
  `absemp_id_usuario` int(20) NOT NULL,
  `absemp_tipo_prestamo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_abonos_empleados_absemp`
--

INSERT INTO `tbl_abonos_empleados_absemp` (`absemp_id`, `absemp_fecha`, `absemp_abono`, `absemp_id_usuario`, `absemp_tipo_prestamo`) VALUES
(7, '2021-04-26 07:51:42', 100.00, 114, 'Externo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_almacenes_ams`
--

CREATE TABLE `tbl_almacenes_ams` (
  `ams_id` int(11) NOT NULL,
  `ams_nombre` varchar(100) NOT NULL,
  `ams_id_sucursal` varchar(100) NOT NULL,
  `ams_fecha_registro` datetime NOT NULL,
  `ams_usuario_registro` text NOT NULL,
  `ams_estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_almacenes_ams`
--

INSERT INTO `tbl_almacenes_ams` (`ams_id`, `ams_nombre`, `ams_id_sucursal`, `ams_fecha_registro`, `ams_usuario_registro`, `ams_estado`) VALUES
(2, 'BODEGA PUEBLA', 'c456153babf04c97a490ac8dd6630550', '2021-02-11 09:49:05', 'Alberto Fabian', '1'),
(8, 'CAMIONETA X45R3-88E', 'c456153babf04c97a490ac8dd6630550', '2021-02-15 11:34:53', 'Alberto Fabian', '1'),
(9, 'BODEGA OAXACA', 'b2e3915e388b9830e24fdde35fcede9e', '2021-02-16 11:01:01', 'Alberto Fabian', '1'),
(10, 'BODEGA TUXTEPEC OAXACA', 'c456153babf04c97a490ac8dd6630550', '2021-04-01 01:39:37', 'Alberto Fabian', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_caja_cja`
--

CREATE TABLE `tbl_caja_cja` (
  `cja_id_caja` int(11) NOT NULL,
  `cja_nombre` varchar(100) NOT NULL,
  `cja_id_sucursal` varchar(100) NOT NULL,
  `cja_usuario_registro` text NOT NULL,
  `cja_fecha_registro` datetime NOT NULL,
  `cja_uso` char(1) NOT NULL DEFAULT '0',
  `cja_copn_id` int(11) NOT NULL,
  `cja_saldo` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_caja_cja`
--

INSERT INTO `tbl_caja_cja` (`cja_id_caja`, `cja_nombre`, `cja_id_sucursal`, `cja_usuario_registro`, `cja_fecha_registro`, `cja_uso`, `cja_copn_id`, `cja_saldo`) VALUES
(11, 'CAJA CELSO ', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:32:11', '1', 159, 0.00),
(12, 'CAJA HELADIO', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:57:32', '1', 162, 0.00),
(13, 'CAJA GERARDO', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:57:57', '0', 0, 0.00),
(14, 'CAJA HORACIO', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:58:05', '1', 163, 0.00),
(15, 'CAJA LUIS RAMON', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:58:11', '0', 0, 0.00),
(16, 'CAJA MARIO', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:58:24', '0', 0, 0.00),
(17, 'CAJA LUCIO', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:59:01', '0', 0, 0.00),
(18, 'CAJA ANGEL', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:59:08', '0', 0, 0.00),
(20, 'CAJA GABRIEL', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:59:44', '0', 0, 0.00),
(21, 'CAJA MILLAN', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 07:59:53', '1', 140, 0.00),
(22, 'CAJA MARCOS', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 08:00:01', '0', 0, 0.00),
(23, 'CAJA DELISAID', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 08:00:11', '0', 0, 0.00),
(24, 'CAJA ANDRES', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 08:00:17', '0', 0, 0.00),
(25, 'CAJA CRISTIAN', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 08:00:29', '0', 0, 0.00),
(26, 'CAJA LIC. SIBAJA', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 08:00:47', '0', 0, 0.00),
(27, 'CAJA OFICINA COBRANZA', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-02-28 08:40:16', '1', 158, 0.00),
(28, 'CAJA JOSE MANUEL	', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-03-01 11:37:12', '0', 0, 0.00),
(29, 'CAJA OFICINA', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-03-09 01:07:09', '0', 0, 0.00),
(30, 'CAJA LINO / FERNANDO', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-03-10 02:23:11', '0', 0, 0.00),
(31, 'CAJA OFICINA VENTAS', 'c456153babf04c97a490ac8dd6630550', 'Héctor Alberto', '2021-03-10 02:41:27', '1', 164, 0.00),
(32, 'COBRANZA', 'c456153babf04c97a490ac8dd6630550', 'Cuenta demo cobranza', '2021-03-30 11:31:21', '0', 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_caja_open_copn`
--

CREATE TABLE `tbl_caja_open_copn` (
  `copn_id` int(11) NOT NULL,
  `copn_ingreso_inicio` double(10,2) DEFAULT NULL,
  `copn_usuario_abrio` int(20) DEFAULT NULL,
  `copn_usuario_cerro` varchar(50) DEFAULT NULL,
  `copn_ingreso_efectivo` double(10,2) DEFAULT NULL,
  `copn_ingreso_banco` double(10,2) DEFAULT NULL,
  `copn_efectivo_real` double(10,2) NOT NULL,
  `copn_banco_real` double(10,2) NOT NULL,
  `copn_fecha_abrio` datetime DEFAULT NULL,
  `copn_fecha_cierre` datetime DEFAULT NULL,
  `copn_usuario_autorizo` text NOT NULL,
  `copn_autorizo` char(1) NOT NULL,
  `copn_id_caja` int(11) DEFAULT NULL,
  `copn_id_sucursal` varchar(100) NOT NULL,
  `copn_saldo` double(10,2) NOT NULL,
  `copn_registro` varchar(100) NOT NULL,
  `copn_tipo_caja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_caja_open_copn`
--

INSERT INTO `tbl_caja_open_copn` (`copn_id`, `copn_ingreso_inicio`, `copn_usuario_abrio`, `copn_usuario_cerro`, `copn_ingreso_efectivo`, `copn_ingreso_banco`, `copn_efectivo_real`, `copn_banco_real`, `copn_fecha_abrio`, `copn_fecha_cierre`, `copn_usuario_autorizo`, `copn_autorizo`, `copn_id_caja`, `copn_id_sucursal`, `copn_saldo`, `copn_registro`, `copn_tipo_caja`) VALUES
(105, 0.00, 110, 'Cuenta demo cobranza', 9902.00, 100.00, 200.00, 0.00, '2021-04-05 02:42:05', '2021-04-05 03:15:20', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 9902.00, 'CAJA 2021-04-05 U - Cuenta demo cobranza.', 'CAJA_COBRANZA_G'),
(106, 0.00, 95, 'Cuenta demo cobranza', 2020.00, 100.00, 2020.00, 100.00, '2021-04-05 02:44:10', '2021-04-05 02:48:20', '', '', 21, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-05 U - MILLAN R10.', 'CAJA_COBRADOR'),
(107, 0.00, 87, 'Cuenta demo cobranza', 3722.00, 0.00, 3722.00, 0.00, '2021-04-05 02:50:08', '2021-04-05 02:51:35', '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-05 U - HELADIO R2.', 'CAJA_COBRADOR'),
(108, 0.00, 88, 'Cuenta demo cobranza', 3960.00, 0.00, 3960.00, 0.00, '2021-04-05 02:52:19', '2021-04-05 02:53:10', '', '', 13, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-05 U - GERARDO R3.', 'CAJA_COBRADOR'),
(109, 9902.00, 110, 'Cuenta demo cobranza', 43005.00, 1030.00, 19804.00, 0.00, '2021-04-05 04:50:10', '2021-04-05 05:14:36', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 195.00, 'CAJA 2021-04-05 U - Cuenta demo cobranza.', 'CAJA_COBRANZA_G'),
(110, 0.00, 95, 'Cuenta demo cobranza', 5470.00, 0.00, 5470.00, 0.00, '2021-04-05 04:50:41', '2021-04-05 04:53:42', '', '', 21, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-05 U - MILLAN R10.', 'CAJA_COBRADOR'),
(111, 0.00, 87, 'Cuenta demo cobranza', 5270.00, 0.00, 5270.00, 0.00, '2021-04-05 04:55:30', '2021-04-05 04:59:03', '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-05 U - HELADIO R2.', 'CAJA_COBRADOR'),
(112, 0.00, 88, 'Cuenta demo cobranza', 5450.00, 260.00, 5450.00, 260.00, '2021-04-05 05:00:37', '2021-04-05 05:04:23', '', '', 13, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-05 U - GERARDO R3.', 'CAJA_COBRADOR'),
(113, 0.00, 89, 'Cuenta demo cobranza', 6980.00, 300.00, 6980.00, 300.00, '2021-04-05 05:06:24', '2021-04-05 05:07:52', '', '', 14, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-05 U - HORACIO R4.', 'CAJA_COBRADOR'),
(114, 0.00, 90, 'Cuenta demo cobranza', 4993.00, 0.00, 4993.00, 0.00, '2021-04-05 05:08:28', '2021-04-05 05:09:41', '', '', 15, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-05 U - LUIS RAMON R5.', 'CAJA_COBRADOR'),
(115, 0.00, 98, 'Cuenta demo cobranza', 4940.00, 470.00, 4940.00, 470.00, '2021-04-05 05:10:02', '2021-04-17 09:16:36', '', '', 24, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - ANDRES R13 c', 'CAJA_COBRADOR'),
(116, 0.00, 83, 'Héctor Alberto', 0.00, 0.00, 0.00, 0.00, '2021-04-05 09:49:31', '2021-04-14 01:01:59', '', '', 29, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-14 U - Héctor Alberto.', 'CAJA_COBRADOR'),
(117, 195.00, 110, 'Cuenta demo cobranza', 49729.00, 1360.00, -9130.00, 0.00, '2021-04-06 11:14:27', '2021-04-06 11:54:42', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 529.00, 'CAJA 2021-04-06 U - Cuenta demo cobranza.', 'CAJA_COBRANZA_G'),
(118, 0.00, 101, 'Cuenta demo cobranza', 5680.00, 390.00, 5680.00, 390.00, '2021-04-06 11:15:34', '2021-04-06 11:27:09', '', '', 28, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - JOSE MANUEL .', 'CAJA_COBRADOR'),
(119, 0.00, 91, 'Cuenta demo cobranza', 7300.00, 0.00, 7300.00, 0.00, '2021-04-06 11:27:45', '2021-04-06 11:31:10', '', '', 16, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - MARIO R6.', 'CAJA_COBRADOR'),
(120, 0.00, 92, 'Cuenta demo cobranza', 6700.00, 200.00, 6700.00, 200.00, '2021-04-06 11:31:22', '2021-04-06 11:32:22', '', '', 17, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - LUCIO R7.', 'CAJA_COBRADOR'),
(121, 0.00, 94, 'Cuenta demo cobranza', 7858.00, 0.00, 7858.00, 0.00, '2021-04-06 11:32:46', '2021-04-06 11:34:38', '', '', 20, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - GABRIEL R9.', 'CAJA_COBRADOR'),
(122, 0.00, 93, 'Cuenta demo cobranza', 13281.00, 0.00, 13281.00, 0.00, '2021-04-06 11:36:10', '2021-04-06 11:39:07', '', '', 18, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - ANGEL R8.', 'CAJA_COBRADOR'),
(123, 0.00, 96, 'Cuenta demo cobranza', 11105.00, 0.00, 11105.00, 0.00, '2021-04-06 11:40:17', '2021-04-06 11:41:09', '', '', 22, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - MARCOS R11.', 'CAJA_COBRADOR'),
(124, 0.00, 97, 'Cuenta demo cobranza', 7130.00, 770.00, 7130.00, 770.00, '2021-04-06 11:41:28', '2021-04-06 11:43:02', '', '', 23, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - DELISAID R12.', 'CAJA_COBRADOR'),
(125, 529.00, 110, 'Cuenta demo cobranza', 5850.00, 390.00, 6379.00, 390.00, '2021-04-06 02:26:17', '2021-04-06 03:39:44', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 5850.00, 'CAJA 2021-04-06 U - Cuenta demo cobranza.', 'CAJA_COBRANZA_G'),
(126, 0.00, 104, 'Cuenta demo cobranza', 3001.00, 0.00, 3001.00, 0.00, '2021-04-06 03:25:45', '2021-04-06 03:29:38', '', '', 22, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - MARCOS HERNANDEZ.', 'CAJA_COBRADOR'),
(127, 0.00, 101, 'Cuenta demo cobranza', 2696.00, 0.00, 2696.00, 0.00, '2021-04-06 03:30:01', '2021-04-06 03:32:35', '', '', 28, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - JOSE MANUEL .', 'CAJA_COBRADOR'),
(128, 0.00, 108, 'Cuenta demo cobranza', 122.00, 0.00, 122.00, 0.00, '2021-04-06 03:32:50', '2021-04-06 03:38:02', '', '', 30, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-06 U - LINO / FERNANDO.', 'CAJA_COBRADOR'),
(129, 5850.00, 110, 'Cuenta demo cobranza', 25016.00, 720.00, 7200.00, 0.00, '2021-04-13 12:34:10', '2021-04-13 12:48:02', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 376.00, 'CAJA 2021-04-13 U - Cuenta demo cobranza.', 'CAJA_COBRANZA_G'),
(130, 0.00, 95, 'Cuenta demo cobranza', 3010.00, 0.00, 3010.00, 0.00, '2021-04-13 12:34:39', '2021-04-13 12:36:29', '', '', 21, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-13 U - MILLAN R10.', 'CAJA_COBRADOR'),
(131, 0.00, 88, 'Cuenta demo cobranza', 3970.00, 0.00, 3970.00, 0.00, '2021-04-13 12:36:42', '2021-04-13 12:37:50', '', '', 13, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-13 U - GERARDO R3.', 'CAJA_COBRADOR'),
(132, 0.00, 89, 'Cuenta demo cobranza', 4526.00, 320.00, 4526.00, 320.00, '2021-04-13 12:38:20', '2021-04-13 12:39:51', '', '', 14, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-13 U - HORACIO R4.', 'CAJA_COBRADOR'),
(133, 0.00, 91, 'Cuenta demo cobranza', 3030.00, 0.00, 3030.00, 0.00, '2021-04-13 12:40:17', '2021-04-13 12:40:55', '', '', 16, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-13 U - MARIO R6.', 'CAJA_COBRADOR'),
(134, 0.00, 90, 'Cuenta demo cobranza', 5110.00, 0.00, 5110.00, 0.00, '2021-04-13 12:41:44', '2021-04-13 12:42:22', '', '', 15, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-13 U - LUIS RAMON R5.', 'CAJA_COBRADOR'),
(135, 0.00, 96, 'Cuenta demo cobranza', 4020.00, 400.00, 4020.00, 400.00, '2021-04-13 12:42:43', '2021-04-13 12:45:16', '', '', 22, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-13 U - MARCOS R11.', 'CAJA_COBRADOR'),
(136, 376.00, 110, 'Cuenta demo cobranza', 1757.00, 0.00, 2133.00, 0.00, '2021-04-14 03:12:02', '2021-04-14 09:11:08', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-14 U - Cuenta demo cobranza.', 'CAJA_COBRANZA_G'),
(137, 0.00, 83, 'Héctor Alberto', 18421.00, 0.00, 18422.00, 0.00, '2021-04-14 01:04:38', '2021-04-17 09:10:12', '', '', 29, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - Héctor Alberto.', 'COBRANZA'),
(139, 0.00, 110, 'Cuenta demo cobranza', 800.00, 0.00, 800.00, 0.00, '2021-04-14 11:43:43', '2021-04-14 11:47:48', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-14 U - Cuenta demo cobranza.', 'CAJA_COBRANZA_G'),
(140, 0.00, 95, NULL, NULL, NULL, 0.00, 0.00, '2021-04-16 10:27:04', NULL, '', '', 21, 'c456153babf04c97a490ac8dd6630550', 0.00, '', ''),
(141, 0.00, 114, 'Héctor Alberto', 3650.00, 0.00, 3650.00, 0.00, '2021-04-16 05:08:31', '2021-04-16 09:13:24', '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-16 U - YOVANNY SANCHES ', 'COBRANZA'),
(142, 0.00, 114, 'Héctor Alberto', 4500.00, 0.00, 4500.00, 0.00, '2021-04-16 09:13:57', '2021-04-16 09:14:51', '', '', 13, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-16 U - YOVANNY SANCHES ', 'COBRANZA'),
(143, 0.00, 114, 'Héctor Alberto', 2000.00, 0.00, 1500.00, 0.00, '2021-04-16 09:19:10', '2021-04-16 10:04:09', '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-16 U - YOVANNY SANCHES.', 'COBRANZA'),
(144, 0.00, 114, 'Héctor Alberto', 3500.00, 0.00, 3600.00, 0.00, '2021-04-17 08:51:37', '2021-04-17 08:52:41', '', '', 13, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - YOVANNY SANCHESs', 'COBRANZA'),
(145, 0.00, 110, 'Cuenta demo cobranza', 6700.00, 0.00, 20.00, 0.00, '2021-04-17 09:14:32', '2021-04-17 09:19:08', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - Cuenta demo cobranzas', 'CAJA_COBRADOR'),
(146, 0.00, 89, 'Cuenta demo cobranza', 3500.00, 0.00, 3200.00, 0.00, '2021-04-17 09:14:48', '2021-04-17 09:15:53', '', '', 14, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - HORACIO R4 pruebas', 'CAJA_COBRADOR'),
(147, 0.00, 98, 'Cuenta demo cobranza', 3500.00, 0.00, 3500.00, 0.00, '2021-04-17 09:16:56', '2021-04-17 09:17:35', '', '', 24, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - ANDRES R13 s', 'CAJA_COBRADOR'),
(148, 0.00, 110, 'Cuenta demo cobranza', 3500.00, 0.00, 4.00, 0.00, '2021-04-17 09:37:09', '2021-04-17 09:40:25', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - Cuenta demo cobranza B', 'CAJA_COBRADOR'),
(149, 0.00, 114, 'Cuenta demo cobranza', 3500.00, 0.00, 3500.00, 0.00, '2021-04-17 09:37:21', '2021-04-17 09:39:17', '', '', 17, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - YOVANNY SANCHES S', 'CAJA_COBRADOR'),
(150, 0.00, 110, 'Cuenta demo cobranza', 4527.00, 0.00, 5.00, 0.00, '2021-04-17 09:46:28', '2021-04-17 09:53:01', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'null', 'CAJA_COBRANZA_G'),
(151, 0.00, 114, 'Cuenta demo cobranza', 4522.00, 0.00, 4522.00, 0.00, '2021-04-17 09:46:37', '2021-04-17 09:47:06', '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - YOVANNY SANCHES S', 'CAJA_COBRADOR'),
(152, 0.00, 110, 'Cuenta demo cobranza', 0.00, 0.00, 0.00, 0.00, '2021-04-17 09:55:43', '2021-04-17 09:55:54', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - Cuenta demo cobranzaE', 'CAJA_COBRANZA_G'),
(153, 0.00, 110, 'Cuenta demo cobranza', 5600.00, 0.00, 0.00, 0.00, '2021-04-17 09:58:41', '2021-04-17 09:59:53', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - Cuenta demo cobranzasss', 'CAJA_COBRANZA_G'),
(154, 0.00, 114, 'Cuenta demo cobranza', 5600.00, 0.00, 5600.00, 0.00, '2021-04-17 09:58:49', '2021-04-17 09:59:15', '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - YOVANNY SANCHESss', 'CAJA_COBRADOR'),
(155, 0.00, 110, 'Cuenta demo cobranza', 0.00, 0.00, 0.00, 0.00, '2021-04-17 10:01:33', '2021-04-17 10:01:46', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'null', 'CAJA_COBRANZA_G'),
(156, 0.00, 110, 'Cuenta demo cobranza', 0.00, 0.00, 0.00, 0.00, '2021-04-17 10:02:40', '2021-04-17 10:03:03', '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - Cuenta demo cobranzas', 'CAJA_COBRANZA_G'),
(157, 0.00, 118, 'Cuenta demo cobranza', 3400.00, 0.00, 3400.00, 0.00, '2021-04-17 10:50:42', '2021-04-17 11:18:04', '', '', 11, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-17 U - Juan hernandez s', 'CAJA_COBRADOR'),
(158, 0.00, 110, NULL, NULL, NULL, 0.00, 0.00, '2021-04-17 10:51:07', NULL, '', '', 27, 'c456153babf04c97a490ac8dd6630550', 0.00, '', ''),
(159, 0.00, 111, NULL, NULL, NULL, 0.00, 0.00, '2021-04-19 09:16:55', NULL, '', '', 11, 'c456153babf04c97a490ac8dd6630550', 0.00, '', ''),
(160, 0.00, 118, 'yovanny', 11900.00, 0.00, 11900.00, 0.00, '2021-04-19 09:18:09', '2021-04-19 09:57:37', '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-19 U - Juan hernandezJHJH', 'CAJA_COBRADOR'),
(161, 0.00, 118, 'yovanny', 5000.00, 0.00, 5000.00, 0.00, '2021-04-19 02:05:00', '2021-04-19 02:09:27', '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, 'CAJA 2021-04-19 U - Juan hernandezL', 'CAJA_COBRADOR'),
(162, 0.00, 118, NULL, NULL, NULL, 0.00, 0.00, '2021-04-22 09:22:12', NULL, '', '', 12, 'c456153babf04c97a490ac8dd6630550', 0.00, '', ''),
(163, 0.00, 104, NULL, NULL, NULL, 0.00, 0.00, '2021-05-07 11:17:22', NULL, '', '', 14, 'c456153babf04c97a490ac8dd6630550', 0.00, '', ''),
(164, 0.00, 115, NULL, NULL, NULL, 0.00, 0.00, '2021-05-07 04:54:01', NULL, '', '', 31, 'c456153babf04c97a490ac8dd6630550', 0.00, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categorias_ctg`
--

CREATE TABLE `tbl_categorias_ctg` (
  `ctg_id` int(11) NOT NULL,
  `ctg_nombre` varchar(100) DEFAULT NULL,
  `ctg_categoria_padre` int(11) DEFAULT NULL,
  `ctg_fecha_creacion` datetime DEFAULT NULL,
  `ctg_estado_borrado` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categorias_ctg`
--

INSERT INTO `tbl_categorias_ctg` (`ctg_id`, `ctg_nombre`, `ctg_categoria_padre`, `ctg_fecha_creacion`, `ctg_estado_borrado`) VALUES
(1, 'ELECTRONICOS', 1, '2020-11-28 10:46:47', '0'),
(2, 'MUEBLES DE MADERA', 1, '2020-11-29 04:04:16', '0'),
(3, 'MUEBLES DE METAL', 1, '2020-11-29 04:04:54', '0'),
(4, 'COLCHONES', 1, '2020-12-04 02:47:57', '0'),
(6, 'LINEA BLANCA', 1, '2021-02-11 05:20:31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categoria_gastos_gts`
--

CREATE TABLE `tbl_categoria_gastos_gts` (
  `gts_id` int(11) NOT NULL,
  `gts_nombre` varchar(100) NOT NULL,
  `gts_presupuesto` double(8,2) DEFAULT NULL,
  `gts_id_sucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categoria_gastos_gts`
--

INSERT INTO `tbl_categoria_gastos_gts` (`gts_id`, `gts_nombre`, `gts_presupuesto`, `gts_id_sucursal`) VALUES
(9, 'DEPOSITOS', 0.00, ''),
(10, 'OTROS', 0.00, ''),
(11, 'DEBE', 0.00, ''),
(12, 'GASOLINA', 0.00, ''),
(13, 'REFACCION', 0.00, ''),
(14, 'TALACHA', 0.00, ''),
(15, 'CASETAS', 0.00, ''),
(16, 'PRESTAMOS', 0.00, ''),
(18, 'COMIDA', 0.00, ''),
(19, 'MATERIAL PARA MUEBLES', 0.00, ''),
(20, 'PAPELERIA', 0.00, ''),
(21, 'RECARGAS', 0.00, ''),
(22, 'MATERIAL PARA CONSTRUCCION', 0.00, ''),
(23, 'MATERIAL PARA TALLER', 0.00, ''),
(24, 'BOLETO DE AU', 0.00, ''),
(25, 'REFCACIONES MOTO', 0.00, ''),
(26, 'REFACCIONES CAMIONETAS', 0.00, ''),
(27, 'RECARGA TELEFONICA', 0.00, ''),
(28, 'COMIDA', 0.00, ''),
(29, 'COMISIONES', 0.00, ''),
(30, 'DEVOLUCIÓN', 0.00, ''),
(31, 'LIMPIEZA', 0.00, ''),
(32, 'SERVICIO', 0.00, ''),
(33, 'MECANICO', 0.00, ''),
(34, 'SUELDOS', 0.00, ''),
(42, 'Gasolina Ventas', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clientes_clts`
--

CREATE TABLE `tbl_clientes_clts` (
  `clts_id` int(20) NOT NULL,
  `clts_ruta` varchar(10) NOT NULL,
  `clts_usuario_registro` int(20) NOT NULL,
  `clts_fecha_registro` date NOT NULL,
  `clts_nombre` varchar(100) NOT NULL,
  `clts_telefono` varchar(10) NOT NULL,
  `clts_domicilio` varchar(100) NOT NULL,
  `clts_col` varchar(50) NOT NULL,
  `clts_entre_calles` varchar(100) NOT NULL,
  `clts_fachada_color` varchar(30) NOT NULL,
  `clts_puerta_color` varchar(30) NOT NULL,
  `clts_cred_elector_n` varchar(20) NOT NULL,
  `clts_trabajo` varchar(50) NOT NULL,
  `clts_puesto` varchar(50) NOT NULL,
  `clts_direccion_tbj` varchar(100) NOT NULL,
  `clts_col_tbj` varchar(50) NOT NULL,
  `clts_tel_tbj` varchar(10) NOT NULL,
  `clts_antiguedad_tbj` varchar(50) NOT NULL,
  `clts_igs_mensual_tbj` varchar(15) NOT NULL,
  `clts_tipo_vivienda` varchar(50) NOT NULL,
  `clts_antiguedad_viviendo` varchar(50) NOT NULL,
  `clts_vivienda_anomde` varchar(100) NOT NULL,
  `clts_nreg_propiedad` varchar(30) NOT NULL,
  `clts_nom_conyuge` varchar(100) NOT NULL,
  `clts_tbj_conyuge` varchar(100) NOT NULL,
  `clts_tbj_puesto_conyuge` varchar(50) NOT NULL,
  `clts_tbj_dir_conyuge` varchar(100) NOT NULL,
  `clts_tbj_col_conyuge` varchar(50) NOT NULL,
  `clts_tbj_tel_conyuge` varchar(10) NOT NULL,
  `clts_tbj_ant_conyuge` varchar(50) NOT NULL,
  `clts_nom_fiador` varchar(100) NOT NULL,
  `clts_parentesco_fiador` varchar(50) NOT NULL,
  `clts_tel_fiador` varchar(10) NOT NULL,
  `clts_dir_fiador` varchar(100) NOT NULL,
  `clts_col_fiador` varchar(50) NOT NULL,
  `clts_tbj_fiador` varchar(50) NOT NULL,
  `clts_tbj_dir_fiador` varchar(100) NOT NULL,
  `clts_tbj_tel_fiador` varchar(10) NOT NULL,
  `clts_tbj_col_fiador` varchar(50) NOT NULL,
  `clts_fc_elector_fiador` varchar(20) NOT NULL,
  `clts_tbj_ant_fiador` varchar(50) NOT NULL,
  `clts_nom_ref1` varchar(100) NOT NULL,
  `clts_parentesco_ref1` varchar(50) NOT NULL,
  `clts_dir_ref1` varchar(100) NOT NULL,
  `clts_col_ref1` varchar(50) NOT NULL,
  `clts_tel_ref1` varchar(10) NOT NULL,
  `clts_nom_ref2` varchar(100) NOT NULL,
  `clts_parentesco_ref2` varchar(50) NOT NULL,
  `clts_dir_ref2` varchar(100) NOT NULL,
  `clts_col_ref2` varchar(50) NOT NULL,
  `clts_tel_ref2` varchar(10) NOT NULL,
  `clts_ubicacion` text NOT NULL,
  `clts_foto_ine` text NOT NULL,
  `clts_foto_ineReverso` text NOT NULL,
  `clts_foto_cpdomicilio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clientes_clts`
--

INSERT INTO `tbl_clientes_clts` (`clts_id`, `clts_ruta`, `clts_usuario_registro`, `clts_fecha_registro`, `clts_nombre`, `clts_telefono`, `clts_domicilio`, `clts_col`, `clts_entre_calles`, `clts_fachada_color`, `clts_puerta_color`, `clts_cred_elector_n`, `clts_trabajo`, `clts_puesto`, `clts_direccion_tbj`, `clts_col_tbj`, `clts_tel_tbj`, `clts_antiguedad_tbj`, `clts_igs_mensual_tbj`, `clts_tipo_vivienda`, `clts_antiguedad_viviendo`, `clts_vivienda_anomde`, `clts_nreg_propiedad`, `clts_nom_conyuge`, `clts_tbj_conyuge`, `clts_tbj_puesto_conyuge`, `clts_tbj_dir_conyuge`, `clts_tbj_col_conyuge`, `clts_tbj_tel_conyuge`, `clts_tbj_ant_conyuge`, `clts_nom_fiador`, `clts_parentesco_fiador`, `clts_tel_fiador`, `clts_dir_fiador`, `clts_col_fiador`, `clts_tbj_fiador`, `clts_tbj_dir_fiador`, `clts_tbj_tel_fiador`, `clts_tbj_col_fiador`, `clts_fc_elector_fiador`, `clts_tbj_ant_fiador`, `clts_nom_ref1`, `clts_parentesco_ref1`, `clts_dir_ref1`, `clts_col_ref1`, `clts_tel_ref1`, `clts_nom_ref2`, `clts_parentesco_ref2`, `clts_dir_ref2`, `clts_col_ref2`, `clts_tel_ref2`, `clts_ubicacion`, `clts_foto_ine`, `clts_foto_ineReverso`, `clts_foto_cpdomicilio`) VALUES
(1, '', 83, '2021-05-11', 'cliente de prueba', '', '', '', '', '', '', '', '', '', '', '', '', '-AÑOS', '', 'PROPIA', '-AÑOS', '', '', '', '', '', '', '', '', '-AÑOS', 'hm', 'mhmgh', '', 'jmjm', 'fnnfnftt', 'gn', 'tntfnt', '', 'tnftnt', '', '-AÑOS', 'fhdfhdh', 'hmgh', 'ffhfhth', 'hmhg', '', 'fhf', 'hmhg', 'hnhm', 'hmhg', 'hmghm', '', '', '', ''),
(2, '', 83, '2021-05-11', ' cliente de prube numero dos', '', '', '', '', '', '', '', '', '', '', '', '', '-', '', '', '-', '', '', '', '', '', '', '', '', '-', '', '', '', '', '', '', '', '', '', '', '-', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', 83, '2021-05-11', ' cliente de pruebanumeron tres', '', '', '', '', '', '', '', '', '', '', '', '', '-', '', '', '-', '', '', '', '', '', '', '', '', '-', '', '', '', '', '', '', '', '', '', '', '-', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', 83, '2021-05-12', 'juan manuel sanchez torres', '7351929520', 'morelos #5', 'rio alegre', 'Emiliano zapata e Hidalgo', 'rojo', 'negra', 'jumsat125hmsn', 'albañileria', 'chalan', 'benito juarez #23', 'centro', '1234567891', '2-MESES', '1200', 'PROPIA', '5-AÑOS', 'uan manuel sanchez torrez', '1236541', 'juanita perez perez', 'ththtrhr', 'yjyjyjy', 'tjfyjy', 'yjfyj', '1236541232', '-AÑOS', 'luis hernadez marin', 'primo', '3455433451', 'callejon leandro valle s/n', 'los amates', 'carpiteria', 'ergrethd', '7418529631', 'sfsrgssg', 'qwreh12t34e', '3-AÑOS', 'juan hernadez', 'vecino', 'emiliano zapata', 'centro', '123321123', 'axel', 'vecino', 'direccion de ejmplof1', 'nnhh', '4567891235', '', '', '', ''),
(5, '', 83, '2021-05-18', 'juan carlos', '1234564561', 'ngngfnnm', 'mmhgmg', 'gmgmhgmgh', 'mhmgmhg', 'hmhmghm', 'gmghmgmhg345', '', '', '', '', '', '-', '', '', '-', '', '', '', '', '', '', '', '', '-', '', '', '', '', '', '', '', '', '', '', '-AÑOS', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compras_cps`
--

CREATE TABLE `tbl_compras_cps` (
  `cps_id` int(11) NOT NULL,
  `cps_id_almacen` int(11) NOT NULL,
  `cps_id_proveedor` int(11) NOT NULL,
  `cps_folio` varchar(100) NOT NULL,
  `cps_productos` text NOT NULL,
  `cps_fecha_compra` datetime NOT NULL,
  `cps_num_articulos` int(11) NOT NULL,
  `cps_total` double(10,2) NOT NULL,
  `cps_costo_envio` double(10,2) NOT NULL,
  `cps_gran_total` double(10,2) NOT NULL,
  `cps_tipo_pago` varchar(50) NOT NULL,
  `cps_metodo_pago` varchar(50) NOT NULL,
  `cps_monto` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compras_cps`
--

INSERT INTO `tbl_compras_cps` (`cps_id`, `cps_id_almacen`, `cps_id_proveedor`, `cps_folio`, `cps_productos`, `cps_fecha_compra`, `cps_num_articulos`, `cps_total`, `cps_costo_envio`, `cps_gran_total`, `cps_tipo_pago`, `cps_metodo_pago`, `cps_monto`) VALUES
(9, 10, 2, '287283', '[{\"pds_nombre\":\"BASE DE CAMA INDIVIDUAL\",\"pds_sku\":\"0003/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":10,\"pds_pu\":700,\"total\":7000},{\"pds_nombre\":\"BASE DE CAMA MATRIMONIAL\",\"pds_sku\":\"0004/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":5,\"pds_pu\":570,\"total\":2850},{\"pds_nombre\":\"BUROES (PAR)\",\"pds_sku\":\"0006/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":8,\"pds_pu\":820,\"total\":6560},{\"pds_nombre\":\"CAJONERA DE 10 MARIN\",\"pds_sku\":\"0008/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":4,\"pds_pu\":400,\"total\":1600}]', '2021-04-05 00:00:00', 27, 18010.00, 5000.00, 23010.00, 'CONTADO', 'EFECTIVO', 23010.00),
(10, 10, 1, '983736', '[{\"pds_nombre\":\"BASE DE CAMA INDIVIDUAL\",\"pds_sku\":\"0003/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":10,\"pds_pu\":700,\"total\":7000},{\"pds_nombre\":\"BASE DE CAMA MATRIMONIAL\",\"pds_sku\":\"0004/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":5,\"pds_pu\":570,\"total\":2850},{\"pds_nombre\":\"BUROES (PAR)\",\"pds_sku\":\"0006/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":8,\"pds_pu\":820,\"total\":6560},{\"pds_nombre\":\"CAJONERA DE 10 MARIN\",\"pds_sku\":\"0008/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":4,\"pds_pu\":400,\"total\":1600}]', '2021-04-06 00:00:00', 27, 18010.00, 2500.00, 20510.00, 'CONTADO', 'EFECTIVO', 25000.00),
(11, 10, 1, '0009', '[{\"pds_nombre\":\"BASE DE CAMA INDIVIDUAL\",\"pds_sku\":\"0003/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":10,\"pds_pu\":700,\"total\":7000},{\"pds_nombre\":\"BASE DE CAMA MATRIMONIAL\",\"pds_sku\":\"0004/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":5,\"pds_pu\":570,\"total\":2850},{\"pds_nombre\":\"BUROES (PAR)\",\"pds_sku\":\"0006/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":8,\"pds_pu\":820,\"total\":6560},{\"pds_nombre\":\"CAJONERA DE 10 MARIN\",\"pds_sku\":\"0008/c456153babf04c97a490ac8dd6630550/10\",\"pds_stok\":4,\"pds_pu\":400,\"total\":1600}]', '2021-04-06 00:00:00', 27, 18010.00, 2000.00, 20010.00, 'CONTADO', 'EFECTIVO', 2010.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contratos_ctrs`
--

CREATE TABLE `tbl_contratos_ctrs` (
  `ctrs_id` varchar(20) NOT NULL,
  `ctrs_cuenta` varchar(10) NOT NULL,
  `ctrs_cliente` int(20) NOT NULL,
  `ctrs_vendedor` int(20) NOT NULL,
  `ctrs_fecha_registro` date NOT NULL,
  `ctrs_forma_pago` varchar(35) NOT NULL,
  `ctrs_fecha_pp` date NOT NULL,
  `ctrs_dia_pago` varchar(25) NOT NULL,
  `ctrs_horario_pago` time NOT NULL,
  `ctrs_plazo_credito` varchar(50) NOT NULL,
  `ctrs_detalles_vt` text NOT NULL,
  `ctrs_foto_evidencia` text NOT NULL,
  `ctrs_foto_pagare` text NOT NULL,
  `ctrs_foto_fachada` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contratos_ctrs`
--

INSERT INTO `tbl_contratos_ctrs` (`ctrs_id`, `ctrs_cuenta`, `ctrs_cliente`, `ctrs_vendedor`, `ctrs_fecha_registro`, `ctrs_forma_pago`, `ctrs_fecha_pp`, `ctrs_dia_pago`, `ctrs_horario_pago`, `ctrs_plazo_credito`, `ctrs_detalles_vt`, `ctrs_foto_evidencia`, `ctrs_foto_pagare`, `ctrs_foto_fachada`) VALUES
('035', '', 4, 0, '2021-05-18', 'EFECTIVO', '2021-05-26', 'MARTES', '19:00:00', '10', '', '', '', ''),
('066', '', 4, 0, '2021-05-18', 'EFECTIVO', '2021-05-27', 'MARTES', '15:10:00', '25', '', '', '', ''),
('089', '', 1, 0, '2021-05-18', 'EFECTIVO', '2021-05-29', 'JUEVES', '10:00:00', '12', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuentas_banco_cbco`
--

CREATE TABLE `tbl_cuentas_banco_cbco` (
  `cbco_id` int(11) NOT NULL,
  `cbco_nombre` varchar(100) NOT NULL,
  `cbco_tipo` varchar(100) NOT NULL,
  `cbco_saldo` double(10,2) NOT NULL,
  `cbco_monto_inicial` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cuentas_banco_cbco`
--

INSERT INTO `tbl_cuentas_banco_cbco` (`cbco_id`, `cbco_nombre`, `cbco_tipo`, `cbco_saldo`, `cbco_monto_inicial`) VALUES
(3, 'BANCOPPEL', '', 3600.00, 0.00),
(4, 'BANAMEX', '', 0.00, 0.00),
(5, 'BANCOMER', '', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_datos_ventas_dvts`
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
-- Dumping data for table `tbl_datos_ventas_dvts`
--

INSERT INTO `tbl_datos_ventas_dvts` (`dvts_id`, `dvts_id_vendedor`, `dvts_id_plantilla`, `dvts_sabado`, `dvts_domingo`, `dvts_lunes`, `dvts_martes`, `dvts_miercoles`, `dvts_jueves`, `dvts_viernes`, `dvts_total`) VALUES
(5, 105, 1, 1, 1, 1, 5, 1, 1, 0, 10),
(6, 104, 1, 1, 1, 1, 1, 1, 1, 0, 6),
(7, 105, 2, 1, 5, 2, 2, 0, 0, 0, 10),
(8, 104, 2, 1, 2, 12, 0, 1, 0, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ficha_devolucion_fdev`
--

CREATE TABLE `tbl_ficha_devolucion_fdev` (
  `fdev_id` int(11) NOT NULL,
  `fdev_fecha_creacion` datetime NOT NULL,
  `fdev_cobrador` text NOT NULL,
  `fdev_id_contrato` int(11) NOT NULL,
  `fdev_usuario_elaboro` text NOT NULL,
  `fdev_usuario_entrego` text NOT NULL,
  `fdev_recibio` text NOT NULL,
  `fdev_estado_autorizacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gastos_gasolina_gtsg`
--

CREATE TABLE `tbl_gastos_gasolina_gtsg` (
  `gtsg_id` int(11) NOT NULL,
  `gtsg_usuario_registro` int(20) NOT NULL,
  `gtsg_usuario_responsable` int(20) NOT NULL,
  `gtsg_vehiculo_placas` varchar(20) NOT NULL,
  `gtsg_precio_litro` double(5,2) NOT NULL,
  `gtsg_cantidad_litros` double(5,2) NOT NULL,
  `gtsg_monto` double(10,2) NOT NULL,
  `gtsg_fecha_registro` datetime NOT NULL,
  `gtsg_kilometraje` text NOT NULL,
  `gtsg_copn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gastos_gasolina_gtsg`
--

INSERT INTO `tbl_gastos_gasolina_gtsg` (`gtsg_id`, `gtsg_usuario_registro`, `gtsg_usuario_responsable`, `gtsg_vehiculo_placas`, `gtsg_precio_litro`, `gtsg_cantidad_litros`, `gtsg_monto`, `gtsg_fecha_registro`, `gtsg_kilometraje`, `gtsg_copn_id`) VALUES
(1, 111, 118, '0', 0.00, 0.00, 133.00, '2021-04-19 06:29:55', '0', 0),
(2, 111, 118, '0', 0.00, 0.00, 333.00, '2021-04-19 06:57:29', '0', 0),
(3, 111, 116, '0', 0.00, 0.00, 555.00, '2021-04-19 06:59:32', '0', 0),
(4, 111, 112, '0', 0.00, 0.00, 999.00, '2021-04-19 07:03:23', '0', 0),
(5, 111, 118, '0', 0.00, 0.00, 268.00, '2021-04-20 11:41:35', '0', 0),
(6, 111, 118, 'SN24859', 9.99, 9.99, 494.00, '2021-04-21 01:10:00', '127-789', 0),
(7, 111, 118, 'SN24859', 9.99, 9.99, 330.41, '2021-04-21 01:19:30', '', 0),
(8, 111, 118, 'SN24859', 17.00, 8.00, 136.00, '2021-04-21 01:49:14', '', 0),
(9, 111, 118, 'SN24859', 17.58, 9.99, 439.50, '2021-04-21 01:50:05', '', 0),
(10, 111, 118, 'SN24859', 17.58, 9.99, 193.38, '2021-04-21 01:50:41', '', 0),
(11, 111, 118, 'SN24859', 17.58, 8.65, 152.07, '2021-04-21 01:51:18', '', 0),
(12, 111, 118, 'SN24859', 18.56, 45.00, 835.20, '2021-04-21 01:57:37', 'gbgbrt', 0),
(13, 111, 116, '64654654iyyii', 19.76, 12.50, 247.00, '2021-04-21 02:02:19', 'ygkgk', 0),
(14, 111, 116, 'dfsgsgsargrg', 17.93, 37.50, 672.38, '2021-04-21 02:03:21', 'fewfse', 0),
(15, 111, 118, 'SN24859', 10.00, 50.00, 500.00, '2021-04-21 05:15:40', '', 0),
(16, 111, 118, 'SN24859', 18.63, 25.00, 465.75, '2021-04-21 05:23:59', '', 0),
(17, 111, 118, 'SN24859', 19.33, 10.00, 193.30, '2021-04-21 05:35:32', '', 0),
(18, 111, 118, 'SN24859', 1.00, 22.00, 22.00, '2021-04-21 05:38:03', '', 0),
(19, 111, 118, 'SN24859', 20.30, 20.00, 406.00, '2021-04-22 08:24:50', '-', 159);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gastos_tgts`
--

CREATE TABLE `tbl_gastos_tgts` (
  `tgts_id` int(11) NOT NULL,
  `tgts_ruta` varchar(100) NOT NULL,
  `tgts_usuario_responsable` int(20) NOT NULL,
  `tgts_categoria` int(11) NOT NULL,
  `tgts_concepto` text NOT NULL,
  `tgts_fecha_gasto` datetime NOT NULL,
  `tgts_cantidad` double(8,2) NOT NULL,
  `tgts_mp` varchar(50) NOT NULL,
  `tgts_nota` text DEFAULT NULL,
  `tgts_estado_borrado` char(1) DEFAULT '0',
  `tgts_usuario_registro` varchar(50) DEFAULT NULL,
  `tgts_id_sucursal` varchar(100) NOT NULL,
  `tgts_id_corte` int(11) NOT NULL,
  `tgts_id_corte2` varchar(100) NOT NULL,
  `tgts_tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gastos_tgts`
--

INSERT INTO `tbl_gastos_tgts` (`tgts_id`, `tgts_ruta`, `tgts_usuario_responsable`, `tgts_categoria`, `tgts_concepto`, `tgts_fecha_gasto`, `tgts_cantidad`, `tgts_mp`, `tgts_nota`, `tgts_estado_borrado`, `tgts_usuario_registro`, `tgts_id_sucursal`, `tgts_id_corte`, `tgts_id_corte2`, `tgts_tipo`) VALUES
(148, '', 95, 12, '', '2021-04-05 02:45:56', 300.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 106, '105', 'COBRANZA'),
(149, '', 95, 13, '', '2021-04-05 02:46:17', 660.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 106, '105', 'COBRANZA'),
(150, '', 87, 12, '', '2021-04-05 02:50:49', 140.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 107, '105', 'COBRANZA'),
(151, '', 87, 13, '', '2021-04-05 02:50:59', 48.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 107, '105', 'COBRANZA'),
(152, '', 87, 11, '', '2021-04-05 02:51:10', 10.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 107, '105', 'COBRANZA'),
(153, '', 88, 21, '', '2021-04-05 02:52:41', 100.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 108, '105', 'COBRANZA'),
(154, '', 87, 13, '', '2021-04-05 04:58:08', 100.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 111, '109', 'COBRANZA'),
(155, '', 87, 14, '', '2021-04-05 04:58:24', 80.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 111, '109', 'COBRANZA'),
(156, '', 87, 11, '', '2021-04-05 04:58:38', 240.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 111, '109', 'COBRANZA'),
(157, '', 88, 12, '', '2021-04-05 05:01:58', 190.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 112, '109', 'COBRANZA'),
(158, '', 88, 10, '', '2021-04-05 05:02:21', 500.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 112, '109', 'COBRANZA'),
(159, '', 90, 12, '', '2021-04-05 05:09:00', 400.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 114, '109', 'COBRANZA'),
(160, '', 90, 13, '', '2021-04-05 05:09:14', 877.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 114, '109', 'COBRANZA'),
(161, '', 98, 12, '', '2021-04-05 05:12:24', 200.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 115, '109', 'COBRANZA'),
(163, '', 91, 12, '', '2021-04-06 11:30:02', 100.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 119, '117', 'COBRANZA'),
(164, '', 91, 10, '', '2021-04-06 11:30:54', 200.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 119, '117', 'COBRANZA'),
(165, '', 94, 15, '', '2021-04-06 11:33:34', 74.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 121, '117', 'COBRANZA'),
(166, '', 94, 11, '', '2021-04-06 11:34:02', 888.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 121, '117', 'COBRANZA'),
(167, '', 93, 12, '', '2021-04-06 11:37:11', 416.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 122, '117', 'COBRANZA'),
(168, '', 93, 15, '', '2021-04-06 11:37:52', 48.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 122, '117', 'COBRANZA'),
(169, '', 93, 14, '', '2021-04-06 11:38:10', 60.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 122, '117', 'COBRANZA'),
(170, '', 93, 21, '', '2021-04-06 11:38:24', 50.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 122, '117', 'COBRANZA'),
(171, '', 93, 11, '', '2021-04-06 11:38:44', 385.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 122, '117', 'COBRANZA'),
(172, '', 96, 12, '', '2021-04-06 11:40:40', 105.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 123, '117', 'COBRANZA'),
(173, '', 96, 15, '', '2021-04-06 11:40:53', 60.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 123, '117', 'COBRANZA'),
(174, '', 97, 11, '', '2021-04-06 11:42:23', 30.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 124, '117', 'COBRANZA'),
(175, '', 110, 10, 'PAGO DE TRASLADO DE DOMINIO ', '2021-04-06 11:44:38', 9520.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 117, '117', 'VARIOS-COBRANZA'),
(176, '', 110, 31, 'CLORO', '2021-04-06 03:12:43', 28.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 125, '125', 'VARIOS-COBRANZA'),
(177, '', 110, 19, '', '2021-04-06 03:12:56', 875.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 125, '125', 'VARIOS-COBRANZA'),
(178, '', 110, 16, ' al empleado <strong>MILLAN R10</strong>', '2021-04-06 03:14:03', 300.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 125, '125', 'PRESTAMO'),
(179, '', 110, 16, ' al empleado <strong>Luis</strong>', '2021-04-06 03:19:42', 200.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 125, '125', 'PRESTAMO'),
(180, '', 110, 23, '', '2021-04-06 03:20:23', 500.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 125, '125', 'VARIOS-COBRANZA'),
(181, '', 104, 11, '', '2021-04-06 03:27:25', 194.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 126, '125', 'VENTAS'),
(182, '', 104, 32, '', '2021-04-06 03:27:44', 985.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 126, '125', 'VENTAS'),
(183, '', 101, 15, '', '2021-04-06 03:31:38', 72.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 127, '125', 'VENTAS'),
(184, '', 101, 32, '', '2021-04-06 03:31:52', 32.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 127, '125', 'VENTAS'),
(185, '', 108, 15, '', '2021-04-06 03:34:43', 78.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 128, '125', 'VENTAS'),
(186, '', 88, 12, '', '2021-04-13 12:37:07', 150.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 131, '129', 'COBRANZA'),
(187, '', 88, 13, '', '2021-04-13 12:37:16', 50.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 131, '129', 'COBRANZA'),
(188, '', 88, 11, '', '2021-04-13 12:37:25', 60.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 131, '129', 'COBRANZA'),
(189, '', 89, 11, '', '2021-04-13 12:39:29', 24.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 132, '129', 'COBRANZA'),
(190, '', 91, 11, '', '2021-04-13 12:40:45', 100.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 133, '129', 'COBRANZA'),
(191, '', 96, 13, '', '2021-04-13 12:44:28', 70.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 135, '129', 'COBRANZA'),
(192, '', 96, 14, '', '2021-04-13 12:44:52', 80.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 135, '129', 'COBRANZA'),
(193, '', 96, 11, '', '2021-04-13 12:45:05', 40.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 135, '129', 'COBRANZA'),
(194, '', 110, 33, 'mecanico(saveiro,tornado,nissan)', '2021-04-13 12:47:00', 4500.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 129, '129', 'VARIOS-COBRANZA'),
(195, '', 110, 16, ' al empleado <strong>YOVANNY SANCHES</strong>', '2021-04-14 03:12:24', 500.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'PRESTAMO'),
(196, '', 110, 16, ' al empleado <strong>YOVANNY SANCHES</strong>', '2021-04-14 03:13:09', 100.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'PRESTAMO'),
(197, '', 110, 29, ' al empleado <strong></strong>', '2021-04-14 10:32:44', 10.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'PRESTAMO'),
(198, '', 110, 29, ' del Cobrador / Vendedor <strong>LINO / FERNANDO</strong>', '2021-04-14 10:33:53', 10.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'COMISION'),
(199, '', 110, 29, ' del Cobrador / Vendedor <strong>MILLAN R10</strong>', '2021-04-14 10:43:24', 1056.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'COMISION'),
(200, '', 110, 29, ' del Cobrador / Vendedor <strong>MILLAN R10</strong>', '2021-04-14 11:56:32', 1056.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'COMISION'),
(201, '', 110, 29, ' del Cobrador / Vendedor <strong>LINO / FERNANDO</strong>', '2021-04-14 11:57:02', 10.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'COMISION'),
(202, '', 110, 29, ' del Cobrador / Vendedor <strong>JOSE MANUEL </strong>', '2021-04-14 11:57:59', 877.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'COMISION'),
(203, '', 110, 29, ' del Cobrador / Vendedor <strong>JOSE LUIS ZAMORANO</strong>', '2021-04-14 12:01:18', 0.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 136, '136', 'COMISION'),
(204, '', 83, 29, ' del Cobrador / Vendedor <strong>GERARDO R3</strong>', '2021-04-14 01:05:04', 1409.00, 'EFECTIVO', '', '0', 'Héctor Alberto', 'c456153babf04c97a490ac8dd6630550', 137, '137', 'COMISION'),
(205, '', 110, 34, ' del Cobrador / Vendedor <strong>MILLAN R10</strong>', '2021-04-14 11:45:42', 2200.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 139, '139', 'SUELDO'),
(206, '', 110, 34, ' del empleado <strong>LIC. SIBAJA</strong>', '2021-04-14 11:47:04', 2000.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 139, '139', 'SUELDO'),
(207, '', 114, 21, '', '2021-04-16 05:45:34', 50.00, 'EFECTIVO', '', '0', 'Héctor Alberto', 'c456153babf04c97a490ac8dd6630550', 141, '137', 'COBRANZA'),
(208, '', 114, 11, 'FALTANTE DE YOVANNY SANCHES</strong>', '2021-04-16 09:37:47', 700.00, 'EFECTIVO', '', '0', 'Héctor Alberto', 'c456153babf04c97a490ac8dd6630550', 137, '137', 'COBRANZA'),
(209, '', 114, 11, 'FALTANTE DE <strong>YOVANNY SANCHES</strong>', '2021-04-16 09:58:15', 700.00, 'EFECTIVO', '', '0', 'Héctor Alberto', 'c456153babf04c97a490ac8dd6630550', 137, '137', 'COBRANZA'),
(210, '', 114, 11, 'FALTANTE DE <strong>YOVANNY SANCHES</strong>', '2021-04-16 10:00:11', 700.00, 'EFECTIVO', '', '0', 'Héctor Alberto', 'c456153babf04c97a490ac8dd6630550', 143, '137', 'COBRANZA'),
(211, '', 114, 11, 'FALTANTE DE <strong>YOVANNY SANCHES</strong>', '2021-04-16 10:04:09', 500.00, 'EFECTIVO', '', '0', 'Héctor Alberto', 'c456153babf04c97a490ac8dd6630550', 143, '137', 'COBRANZA'),
(212, '', 89, 11, 'FALTANTE DE <strong>HORACIO R4</strong>', '2021-04-17 09:15:53', 300.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 146, '145', 'COBRANZA'),
(213, '', 114, 11, 'FALTANTE DE <strong>YOVANNY SANCHES</strong>', '2021-04-17 09:59:15', 43.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 154, '153', 'COBRANZA'),
(215, '', 118, 20, '', '2021-04-17 11:17:38', 45.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 157, '158', 'COBRANZA'),
(216, '', 118, 11, 'FALTANTE DE <strong>Juan hernandez</strong>', '2021-04-17 11:18:04', 55.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 157, '158', 'COBRANZA'),
(217, '', 110, 31, '', '2021-04-17 11:25:43', 500.00, 'EFECTIVO', '', '0', 'Cuenta demo cobranza', 'c456153babf04c97a490ac8dd6630550', 158, '158', 'COBRANZA'),
(218, '', 118, 11, 'FALTANTE DE <strong>Juan hernandez</strong>', '2021-04-19 09:57:37', 100.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 160, '159', 'COBRANZA'),
(219, '', 111, 29, ' del Cobrador / Vendedor <strong>Juan hernandez</strong>', '2021-04-19 01:58:29', 745.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'COMISION'),
(220, '', 118, 12, '', '2021-04-19 02:06:03', 200.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 161, '159', 'COBRANZA'),
(222, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-19 06:57:29', 333.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(223, '', 111, 42, 'del empleado <strong>Usuario de  prueba</strong>', '2021-04-19 06:59:32', 555.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(224, '', 111, 42, 'del empleado <strong>Luis</strong>', '2021-04-19 07:03:23', 999.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(225, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-20 11:41:35', 268.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(226, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 01:10:00', 494.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(227, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 01:19:30', 330.41, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(228, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 01:49:14', 136.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(229, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 01:50:05', 439.50, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(230, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 01:50:41', 193.38, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(231, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 01:51:18', 152.07, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(232, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 01:57:37', 835.20, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(233, '', 111, 42, 'del empleado <strong>Usuario de  prueba</strong>', '2021-04-21 02:02:19', 247.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(234, '', 111, 42, 'del empleado <strong>Usuario de  prueba</strong>', '2021-04-21 02:03:21', 672.38, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(235, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 05:15:40', 500.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(236, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 05:23:59', 465.75, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(237, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 05:35:32', 193.30, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(238, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-21 05:38:03', 22.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA '),
(239, '', 111, 42, 'del empleado <strong>Juan hernandez</strong>', '2021-04-22 08:24:50', 406.00, 'EFECTIVO', '', '0', 'yovanny', 'c456153babf04c97a490ac8dd6630550', 159, '159', 'GASTO DE GASOLINA'),
(240, '', 104, 11, 'FALTANTE DE <strong>MARCOS HERNANDEZ</strong>', '2021-05-07 11:18:04', 100.00, 'EFECTIVO', '', '0', 'JEFE VENTAS', 'c456153babf04c97a490ac8dd6630550', 163, '138', 'VENTAS'),
(241, '', 115, 16, 'FALTANTE DE <strong>JEFE VENTAS</strong>', '2021-05-07 11:24:00', 289.00, 'EFECTIVO', '', '0', 'JEFE VENTAS', 'c456153babf04c97a490ac8dd6630550', 138, '138', 'VENTAS'),
(242, '', 115, 16, 'FALTANTE DE <strong>JEFE VENTAS</strong>', '2021-05-07 11:24:13', 289.00, 'EFECTIVO', '', '0', 'JEFE VENTAS', 'c456153babf04c97a490ac8dd6630550', 138, '138', 'VENTAS'),
(243, '', 115, 16, 'FALTANTE DE <strong>JEFE VENTAS</strong>', '2021-05-07 04:49:30', 178.00, 'EFECTIVO', '', '0', 'JEFE VENTAS', 'c456153babf04c97a490ac8dd6630550', 138, '138', 'VENTAS'),
(244, '', 115, 16, 'FALTANTE DE <strong>JEFE VENTAS</strong>', '2021-05-07 04:49:46', 178.00, 'EFECTIVO', '', '0', 'JEFE VENTAS', 'c456153babf04c97a490ac8dd6630550', 138, '138', 'VENTAS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingresos_cuenta_icta`
--

CREATE TABLE `tbl_ingresos_cuenta_icta` (
  `icta_id` int(11) NOT NULL,
  `icta_cuenta` int(11) NOT NULL,
  `icta_cantidad` double(10,2) NOT NULL,
  `icta_fecha_registro` datetime NOT NULL,
  `icta_usuario_registro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingresos_igs`
--

CREATE TABLE `tbl_ingresos_igs` (
  `igs_id` int(11) NOT NULL,
  `igs_concepto` text NOT NULL,
  `igs_monto` double(10,2) NOT NULL,
  `igs_fecha_registro` datetime NOT NULL,
  `igs_usuario_registro` text NOT NULL,
  `igs_mp` text NOT NULL,
  `igs_id_sucursal` varchar(100) NOT NULL,
  `igs_id_corte` int(11) NOT NULL DEFAULT 1,
  `igs_ruta` varchar(100) NOT NULL,
  `igs_usuario_responsable` int(20) NOT NULL,
  `igs_id_corte_2` varchar(100) NOT NULL,
  `igs_referencia` text NOT NULL,
  `igs_tipo` varchar(100) NOT NULL,
  `igs_cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ingresos_igs`
--

INSERT INTO `tbl_ingresos_igs` (`igs_id`, `igs_concepto`, `igs_monto`, `igs_fecha_registro`, `igs_usuario_registro`, `igs_mp`, `igs_id_sucursal`, `igs_id_corte`, `igs_ruta`, `igs_usuario_responsable`, `igs_id_corte_2`, `igs_referencia`, `igs_tipo`, `igs_cuenta`) VALUES
(170, 'INICIO DE CAJA', 0.00, '2021-04-05 02:42:05', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 105, '', 110, '105', '', '', 0),
(171, 'INICIO DE CAJA', 0.00, '2021-04-05 02:44:10', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 106, '', 95, '106', '', '', 0),
(172, '', 2980.00, '2021-04-05 02:45:08', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 106, '', 95, '105', '', 'COBRANZA', 0),
(173, '', 100.00, '2021-04-05 02:45:23', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 106, '', 95, '105', '76367536743', 'COBRANZA', 3),
(174, 'INICIO DE CAJA', 0.00, '2021-04-05 02:50:08', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 107, '', 87, '107', '', '', 0),
(175, '', 3920.00, '2021-04-05 02:50:30', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 107, '', 87, '105', '', 'COBRANZA', 0),
(176, 'INICIO DE CAJA', 0.00, '2021-04-05 02:52:19', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 108, '', 88, '108', '', '', 0),
(177, '', 4060.00, '2021-04-05 02:52:32', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 108, '', 88, '105', '', 'COBRANZA', 0),
(178, 'VENTAS ', 200.00, '2021-04-05 03:15:01', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 105, '', 110, '105', '', 'OTROS', 0),
(179, 'INICIO DE CAJA', 9902.00, '2021-04-05 04:50:10', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 109, '', 110, '109', '', '', 0),
(180, 'INICIO DE CAJA', 0.00, '2021-04-05 04:50:41', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 110, '', 95, '110', '', '', 0),
(181, '', 5470.00, '2021-04-05 04:51:03', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 110, '', 95, '109', '', 'COBRANZA', 0),
(182, 'INICIO DE CAJA', 0.00, '2021-04-05 04:55:30', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 111, '', 87, '111', '', '', 0),
(183, '', 5690.00, '2021-04-05 04:57:22', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 111, '', 87, '109', '', 'COBRANZA', 0),
(184, 'INICIO DE CAJA', 0.00, '2021-04-05 05:00:37', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 112, '', 88, '112', '', '', 0),
(185, '', 6140.00, '2021-04-05 05:01:14', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 112, '', 88, '109', '', 'COBRANZA', 0),
(186, '', 260.00, '2021-04-05 05:01:30', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 112, '', 88, '109', '45353343', 'COBRANZA', 3),
(187, 'INICIO DE CAJA', 0.00, '2021-04-05 05:06:24', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 113, '', 89, '113', '', '', 0),
(188, '', 6980.00, '2021-04-05 05:06:57', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 113, '', 89, '109', '', 'COBRANZA', 0),
(189, '', 300.00, '2021-04-05 05:07:16', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 113, '', 89, '109', '7525425642', 'COBRANZA', 3),
(190, 'INICIO DE CAJA', 0.00, '2021-04-05 05:08:28', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 114, '', 90, '114', '', '', 0),
(191, '', 6270.00, '2021-04-05 05:08:45', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 114, '', 90, '109', '', 'COBRANZA', 0),
(192, 'INICIO DE CAJA', 0.00, '2021-04-05 05:10:02', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 115, '', 98, '115', '', '', 0),
(193, '', 5140.00, '2021-04-05 05:10:42', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 115, '', 98, '109', '', 'COBRANZA', 0),
(195, '', 470.00, '2021-04-05 05:12:03', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 115, '', 98, '109', '645654', 'COBRANZA', 3),
(198, 'INICIO DE CAJA', 195.00, '2021-04-06 11:14:27', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 117, '', 110, '117', '', '', 0),
(199, 'INICIO DE CAJA', 0.00, '2021-04-06 11:15:34', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 118, '', 101, '118', '', '', 0),
(200, '', 5680.00, '2021-04-06 11:15:52', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 118, '', 101, '117', '', 'COBRANZA', 0),
(201, '', 390.00, '2021-04-06 11:16:10', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 118, '', 101, '117', '567453535', 'COBRANZA', 3),
(202, 'INICIO DE CAJA', 0.00, '2021-04-06 11:27:45', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 119, '', 91, '119', '', '', 0),
(203, '', 7600.00, '2021-04-06 11:28:03', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 119, '', 91, '117', '', 'COBRANZA', 0),
(204, 'INICIO DE CAJA', 0.00, '2021-04-06 11:31:22', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 120, '', 92, '120', '', '', 0),
(205, '', 6700.00, '2021-04-06 11:31:49', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 120, '', 92, '117', '', 'COBRANZA', 0),
(206, '', 200.00, '2021-04-06 11:32:03', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 120, '', 92, '117', '3576333455', 'COBRANZA', 3),
(207, 'INICIO DE CAJA', 0.00, '2021-04-06 11:32:46', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 121, '', 94, '121', '', '', 0),
(208, '', 8820.00, '2021-04-06 11:33:00', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 121, '', 94, '117', '', 'COBRANZA', 0),
(209, 'INICIO DE CAJA', 0.00, '2021-04-06 11:36:10', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 122, '', 93, '122', '', '', 0),
(210, '', 14240.00, '2021-04-06 11:36:54', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 122, '', 93, '117', '', 'COBRANZA', 0),
(211, 'INICIO DE CAJA', 0.00, '2021-04-06 11:40:17', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 123, '', 96, '123', '', '', 0),
(212, '', 11270.00, '2021-04-06 11:40:31', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 123, '', 96, '117', '', 'COBRANZA', 0),
(213, 'INICIO DE CAJA', 0.00, '2021-04-06 11:41:28', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 124, '', 97, '124', '', '', 0),
(214, '', 7160.00, '2021-04-06 11:41:56', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 124, '', 97, '117', '', 'COBRANZA', 0),
(215, '', 770.00, '2021-04-06 11:42:07', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 124, '', 97, '117', '85367536753', 'COBRANZA', 3),
(216, 'INICIO DE CAJA', 529.00, '2021-04-06 02:26:17', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 125, '', 110, '125', '', '', 0),
(217, '', 105.00, '2021-04-06 03:08:11', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 125, '', 110, '125', '', 'REINGRESOS_COBRANZA', 0),
(218, '', 390.00, '2021-04-06 03:09:07', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 125, '', 110, '125', '635643453', 'DEPOSITOS_COBRANZA', 3),
(220, 'ABONO CTA 17 R12', 400.00, '2021-04-06 03:10:18', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 125, '', 110, '125', '', 'ABONOS_COBRANZA', 0),
(221, 'ADEUDO JOSE MANUEL', 400.00, '2021-04-06 03:11:15', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 125, '', 110, '125', '', 'ABONOS_COBRANZA', 0),
(222, '', 500.00, '2021-04-06 03:21:02', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 125, '', 110, '125', '', 'PRESTO_CP_SAMUEL_COBRANZA', 0),
(223, 'INICIO DE CAJA', 0.00, '2021-04-06 03:25:45', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 126, '', 104, '126', '', '', 0),
(224, 'SIN NOMBRE/TOCADOR DIAMANTE', 4180.00, '2021-04-06 03:26:53', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 126, '', 104, '125', '', 'CONTADO_VENTAS', 0),
(225, 'INICIO DE CAJA', 0.00, '2021-04-06 03:30:01', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 127, '', 101, '127', '', '', 0),
(226, 'ROBERTO RONQUILLO CORTES/BOCINA ATVIO', 100.00, '2021-04-06 03:30:45', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 127, '', 101, '125', '', 'S/E_VENTAS', 0),
(227, 'JOSE LUIS ZAMORA/BOCINA ATVIO', 100.00, '2021-04-06 03:30:56', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 127, '', 101, '125', '', 'S/E_VENTAS', 0),
(228, 'MARIA EDITH PEDRO /REFRIGERADOR ACROOS 9\"', 2600.00, '2021-04-06 03:31:14', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 127, '', 101, '125', '', 'CONTADO_VENTAS', 0),
(229, 'INICIO DE CAJA', 0.00, '2021-04-06 03:32:50', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 128, '', 108, '128', '', '', 0),
(230, 'OFELIA MORALES MENESES/TOCADOR HOLLIWOOD', 100.00, '2021-04-06 03:33:43', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 128, '', 108, '125', '', 'S/E_VENTAS', 0),
(231, 'LUIS GERARDO CRUZ VILLANUEVA/ALACENA PIÑA ', 100.00, '2021-04-06 03:34:02', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 128, '', 108, '125', '', 'S/E_VENTAS', 0),
(232, 'INICIO DE CAJA', 5850.00, '2021-04-13 12:34:10', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 129, '', 110, '129', '', '', 0),
(233, 'INICIO DE CAJA', 0.00, '2021-04-13 12:34:39', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 130, '', 95, '130', '', '', 0),
(234, '', 3010.00, '2021-04-13 12:35:02', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 130, '', 95, '129', '', 'COBRANZA', 0),
(235, 'INICIO DE CAJA', 0.00, '2021-04-13 12:36:42', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 131, '', 88, '131', '', '', 0),
(236, '', 4230.00, '2021-04-13 12:36:56', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 131, '', 88, '129', '', 'COBRANZA', 0),
(237, 'INICIO DE CAJA', 0.00, '2021-04-13 12:38:20', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 132, '', 89, '132', '', '', 0),
(238, '', 4550.00, '2021-04-13 12:38:43', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 132, '', 89, '129', '', 'COBRANZA', 0),
(239, '', 320.00, '2021-04-13 12:38:55', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 132, '', 89, '129', '35653743', 'COBRANZA', 3),
(240, 'INICIO DE CAJA', 0.00, '2021-04-13 12:40:17', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 133, '', 91, '133', '', '', 0),
(241, '', 3130.00, '2021-04-13 12:40:33', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 133, '', 91, '129', '', 'COBRANZA', 0),
(242, 'INICIO DE CAJA', 0.00, '2021-04-13 12:41:44', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 134, '', 90, '134', '', '', 0),
(243, '', 5110.00, '2021-04-13 12:42:01', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 134, '', 90, '129', '', 'COBRANZA', 0),
(244, 'INICIO DE CAJA', 0.00, '2021-04-13 12:42:43', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 135, '', 96, '135', '', '', 0),
(245, '', 4210.00, '2021-04-13 12:43:38', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 135, '', 96, '129', '', 'COBRANZA', 0),
(246, '', 400.00, '2021-04-13 12:43:56', 'Cuenta demo cobranza', 'DEPOSITO', 'c456153babf04c97a490ac8dd6630550', 135, '', 96, '129', '434534636', 'COBRANZA', 3),
(247, 'INICIO DE CAJA', 376.00, '2021-04-14 03:12:02', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 136, '', 110, '136', '', '', 0),
(248, '', 5000.00, '2021-04-14 04:43:23', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 136, '', 110, '136', '', 'PRESTO_CP_SAMUEL_COBRANZA', 0),
(251, 'INICIO DE CAJA', 0.00, '2021-04-14 11:08:29', 'JEFE VENTAS', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 138, '', 115, '138', '', '', 0),
(252, 'INICIO DE CAJA', 0.00, '2021-04-14 11:43:43', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 139, '', 110, '139', '', '', 0),
(253, '', 5000.00, '2021-04-14 11:47:28', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 139, '', 110, '139', '', 'PRESTO_CP_SAMUEL_COBRANZA', 0),
(259, 'INICIO DE CAJA', 0.00, '2021-04-16 09:13:57', 'Héctor Alberto', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 142, '', 114, '142', '', '', 0),
(261, 'INICIO DE CAJA', 0.00, '2021-04-16 09:19:10', 'Héctor Alberto', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 143, '', 114, '143', '', '', 0),
(263, 'SALDO EXTRA A FAVOR', 0.00, '2021-04-16 09:23:37', 'Héctor Alberto', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 143, '', 114, '137', '', 'COBRANZA', 0),
(264, 'SALDO EXTRA A FAVOR', 0.00, '2021-04-16 09:28:17', 'Héctor Alberto', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 143, '', 114, '137', '', 'COBRANZA', 0),
(265, 'INICIO DE CAJA', 0.00, '2021-04-17 08:51:37', 'Héctor Alberto', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 144, '', 114, '144', '', '', 0),
(267, 'SALDO EXTRA A FAVOR', 100.00, '2021-04-17 08:52:41', 'Héctor Alberto', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 144, '', 114, '137', '', 'COBRANZA', 0),
(268, 'SALDO EXTRA A FAVOR', 200.00, '2021-04-17 09:10:12', 'Héctor Alberto', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 137, '', 83, '137', '', 'COBRANZA', 0),
(269, 'INICIO DE CAJA', 0.00, '2021-04-17 09:14:32', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 145, '', 110, '145', '', '', 0),
(270, 'INICIO DE CAJA', 0.00, '2021-04-17 09:14:48', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 146, '', 89, '146', '', '', 0),
(271, '', 3500.00, '2021-04-17 09:15:09', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 146, '', 89, '145', '', 'COBRANZA', 0),
(272, 'INICIO DE CAJA', 0.00, '2021-04-17 09:16:56', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 147, '', 98, '147', '', '', 0),
(273, '', 3500.00, '2021-04-17 09:17:09', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 147, '', 98, '145', '', 'COBRANZA', 0),
(274, 'SALDO EXTRA A FAVOR', 20.00, '2021-04-17 09:19:08', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 145, '', 110, '145', '', 'COBRANZA', 0),
(275, 'INICIO DE CAJA', 0.00, '2021-04-17 09:37:09', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 148, '', 110, '148', '', '', 0),
(276, 'INICIO DE CAJA', 0.00, '2021-04-17 09:37:21', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 149, '', 114, '149', '', '', 0),
(277, '', 3500.00, '2021-04-17 09:39:03', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 149, '', 114, '148', '', 'COBRANZA', 0),
(278, 'SALDO EXTRA A FAVOR', 4.00, '2021-04-17 09:40:25', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 148, '', 110, '148', '', 'COBRANZA', 0),
(279, 'INICIO DE CAJA', 0.00, '2021-04-17 09:46:28', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 150, '', 110, '150', '', '', 0),
(280, 'INICIO DE CAJA', 0.00, '2021-04-17 09:46:37', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 151, '', 114, '151', '', '', 0),
(281, '', 4522.00, '2021-04-17 09:46:55', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 151, '', 114, '150', '', 'COBRANZA', 0),
(282, 'SALDO EXTRA A FAVOR', 5.00, '2021-04-17 09:53:01', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 150, '', 110, '150', '', 'COBRANZA', 0),
(283, 'INICIO DE CAJA', 0.00, '2021-04-17 09:55:43', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 152, '', 110, '152', '', '', 0),
(284, 'INICIO DE CAJA', 0.00, '2021-04-17 09:58:41', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 153, '', 110, '153', '', '', 0),
(285, 'INICIO DE CAJA', 0.00, '2021-04-17 09:58:49', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 154, '', 114, '154', '', '', 0),
(287, 'INICIO DE CAJA', 0.00, '2021-04-17 10:01:33', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 155, '', 110, '155', '', '', 0),
(288, 'INICIO DE CAJA', 0.00, '2021-04-17 10:02:40', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 156, '', 110, '156', '', '', 0),
(289, 'INICIO DE CAJA', 0.00, '2021-04-17 10:50:42', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 157, '', 118, '157', '', '', 0),
(290, 'INICIO DE CAJA', 0.00, '2021-04-17 10:51:07', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 158, '', 110, '158', '', '', 0),
(293, '', 3500.00, '2021-04-17 11:17:27', 'Cuenta demo cobranza', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 157, '', 118, '158', '', 'COBRANZA', 0),
(294, 'INICIO DE CAJA', 0.00, '2021-04-19 09:16:55', 'yovanny', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 159, '', 111, '159', '', '', 0),
(295, 'INICIO DE CAJA', 0.00, '2021-04-19 09:18:09', 'yovanny', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 160, '', 118, '160', '', '', 0),
(296, '', 5000.00, '2021-04-19 09:56:49', 'yovanny', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 160, '', 118, '159', '', 'COBRANZA', 0),
(297, '', 7000.00, '2021-04-19 09:57:02', 'yovanny', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 160, '', 118, '159', '', 'COBRANZA_CREDICONTADO', 0),
(298, 'INICIO DE CAJA', 0.00, '2021-04-19 02:05:00', 'yovanny', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 161, '', 118, '161', '', '', 0),
(299, '', 5000.00, '2021-04-19 02:05:20', 'yovanny', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 161, '', 118, '159', '', 'COBRANZA', 0),
(300, 'SALDO EXTRA A FAVOR', 200.00, '2021-04-19 02:09:27', 'yovanny', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 161, '', 118, '159', '', 'COBRANZA', 0),
(301, 'INICIO DE CAJA', 0.00, '2021-04-22 09:22:12', 'yovanny', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 162, '', 118, '162', '', '', 0),
(302, 'INICIO DE CAJA', 0.00, '2021-05-07 11:17:22', 'JEFE VENTAS', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 163, '', 104, '163', '', '', 0),
(303, '', 200.00, '2021-05-07 11:17:41', 'JEFE VENTAS', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 163, '', 104, '138', '', 'S/E_VENTAS', 0),
(304, '', 300.00, '2021-05-07 11:17:49', 'JEFE VENTAS', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 163, '', 104, '138', '', 'S/E_VENTAS', 0),
(305, 'INICIO DE CAJA', 0.00, '2021-05-07 04:54:01', 'JEFE VENTAS', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 164, '', 115, '164', '', '', 0),
(306, '', 1200.00, '2021-05-07 04:54:35', 'JEFE VENTAS', 'EFECTIVO', 'c456153babf04c97a490ac8dd6630550', 164, '', 115, '164', '', 'REINGRESOS_COBRANZA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plantilla_ventas_pvts`
--

CREATE TABLE `tbl_plantilla_ventas_pvts` (
  `pvts_id` int(11) NOT NULL,
  `pvts_usr_registro` varchar(60) NOT NULL,
  `pvts_num_semana` int(11) NOT NULL,
  `pvts_fecha_inicio` date NOT NULL,
  `pvts_fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_plantilla_ventas_pvts`
--

INSERT INTO `tbl_plantilla_ventas_pvts` (`pvts_id`, `pvts_usr_registro`, `pvts_num_semana`, `pvts_fecha_inicio`, `pvts_fecha_fin`) VALUES
(1, 'JEFE VENTAS', 1, '2021-04-01', '2021-04-06'),
(2, 'JEFE VENTAS', 2, '2021-05-08', '2021-05-13'),
(3, 'JEFE VENTAS', 3, '2021-05-15', '2021-05-20'),
(6, 'JEFE VENTAS', 19, '2021-05-07', '2021-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestamos_pms`
--

CREATE TABLE `tbl_prestamos_pms` (
  `pms_id` int(11) NOT NULL,
  `pms_usuario` int(20) NOT NULL,
  `pms_cantidad` double(10,2) NOT NULL,
  `pms_cantidad_adeudo` double(10,2) NOT NULL,
  `pms_estado_prestamo` varchar(20) NOT NULL DEFAULT 'PENDIENTE',
  `pms_estado_pagado` char(1) NOT NULL DEFAULT '0',
  `pms_fecha_registro` datetime NOT NULL,
  `pms_usuario_registro` varchar(100) NOT NULL,
  `pms_tipo` varchar(40) NOT NULL DEFAULT 'Externo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prestamos_pms`
--

INSERT INTO `tbl_prestamos_pms` (`pms_id`, `pms_usuario`, `pms_cantidad`, `pms_cantidad_adeudo`, `pms_estado_prestamo`, `pms_estado_pagado`, `pms_fecha_registro`, `pms_usuario_registro`, `pms_tipo`) VALUES
(10, 95, 300.00, 300.00, 'PENDIENTE', '0', '2021-04-06 03:14:03', 'Cuenta demo cobranza', 'Externo'),
(11, 112, 200.00, 200.00, 'PENDIENTE', '0', '2021-04-06 03:19:42', 'Cuenta demo cobranza', 'Externo'),
(12, 114, 500.00, 500.00, 'PENDIENTE', '0', '2021-04-14 03:12:24', 'Cuenta demo cobranza', 'Externo'),
(13, 114, 100.00, 100.00, 'PENDIENTE', '0', '2021-04-14 03:13:09', 'Cuenta demo cobranza', 'Externo'),
(14, 118, 150.00, 150.00, 'PENDIENTE', '0', '2021-04-19 06:22:06', 'yovanny', 'Externo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productos_pds`
--

CREATE TABLE `tbl_productos_pds` (
  `pds_id_producto` int(11) NOT NULL,
  `pds_visivilidad` varchar(100) DEFAULT '''POS''',
  `pds_sku` text DEFAULT NULL,
  `pds_nombre` text DEFAULT NULL,
  `pds_descripcion_corta` text DEFAULT NULL,
  `pds_descripcion_larga` text DEFAULT NULL,
  `pds_marca` text DEFAULT NULL,
  `pds_modelo` text DEFAULT NULL,
  `pds_categoria` text DEFAULT NULL,
  `pds_caracteristicas` text DEFAULT NULL,
  `pds_etiquetas` text DEFAULT NULL,
  `pds_stok` int(11) DEFAULT NULL,
  `pds_stok_min` int(11) DEFAULT NULL,
  `pds_stok_max` int(11) DEFAULT NULL,
  `pds_precio_compra` double(10,2) DEFAULT NULL,
  `pds_precio_publico` double(10,2) DEFAULT NULL,
  `pds_precio_mayoreo` double(10,2) DEFAULT NULL,
  `pds_precio_especial` double(10,2) DEFAULT NULL,
  `pds_precio_promocion` double(10,2) DEFAULT NULL,
  `pds_fecha_inicio_promocion` datetime DEFAULT NULL,
  `pds_fecha_fin_promocion` datetime DEFAULT NULL,
  `pds_imagen_portada` text DEFAULT NULL,
  `pds_imagenes` text DEFAULT NULL,
  `pds_fecha_creacion` datetime DEFAULT NULL,
  `pds_fecha_modificacion` datetime DEFAULT NULL,
  `pds_usaurio_registro` varchar(100) DEFAULT NULL,
  `pds_usuario_modifico` varchar(100) DEFAULT NULL,
  `pds_estado` varchar(100) DEFAULT 'Activo',
  `pds_sucursal_id` text DEFAULT NULL,
  `pds_suscriptor_id` text DEFAULT NULL,
  `pds_ams_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productos_pds`
--

INSERT INTO `tbl_productos_pds` (`pds_id_producto`, `pds_visivilidad`, `pds_sku`, `pds_nombre`, `pds_descripcion_corta`, `pds_descripcion_larga`, `pds_marca`, `pds_modelo`, `pds_categoria`, `pds_caracteristicas`, `pds_etiquetas`, `pds_stok`, `pds_stok_min`, `pds_stok_max`, `pds_precio_compra`, `pds_precio_publico`, `pds_precio_mayoreo`, `pds_precio_especial`, `pds_precio_promocion`, `pds_fecha_inicio_promocion`, `pds_fecha_fin_promocion`, `pds_imagen_portada`, `pds_imagenes`, `pds_fecha_creacion`, `pds_fecha_modificacion`, `pds_usaurio_registro`, `pds_usuario_modifico`, `pds_estado`, `pds_sucursal_id`, `pds_suscriptor_id`, `pds_ams_id`) VALUES
(281, 'POS', '0001/c456153babf04c97a490ac8dd6630550/10', 'ALACENA PIÑA', 'ALACENA PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 10, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(282, 'POS', '0002/c456153babf04c97a490ac8dd6630550/10', 'ALACENA FILEMON', 'ALACENA FILEMON', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(283, 'POS', '0003/c456153babf04c97a490ac8dd6630550/10', 'BASE DE CAMA INDIVIDUAL', 'BASE DE CAMA INDIVIDUAL', '', '', '', 'MADERA', '', 'SOFTMOR', 87, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(284, 'POS', '0004/c456153babf04c97a490ac8dd6630550/10', 'BASE DE CAMA MATRIMONIAL', 'BASE DE CAMA MATRIMONIAL', '', '', '', 'MADERA', '', 'SOFTMOR', 32, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(285, 'POS', '0005/c456153babf04c97a490ac8dd6630550/10', 'BASE DE CAMA KING SIZE', 'BASE DE CAMA KING SIZE', '', '', '', 'MADERA', '', 'SOFTMOR', 11, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(286, 'POS', '0006/c456153babf04c97a490ac8dd6630550/10', 'BUROES (PAR)', 'BUROES (PAR)', '', '', '', 'MADERA', '', 'SOFTMOR', 44, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(287, 'POS', '0007/c456153babf04c97a490ac8dd6630550/10', 'CAJONERA DE 10 FILEMON', 'CAJONERA DE 10 FILEMON', '', '', '', 'MADERA', '', 'SOFTMOR', 8, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(288, 'POS', '0008/c456153babf04c97a490ac8dd6630550/10', 'CAJONERA DE 10 MARIN', 'CAJONERA DE 10 MARIN', '', '', '', 'MADERA', '', 'SOFTMOR', 28, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(289, 'POS', '0009/c456153babf04c97a490ac8dd6630550/10', 'CAJONERA DE 5 MARIN', 'CAJONERA DE 5 MARIN', '', '', '', 'MADERA', '', 'SOFTMOR', 12, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(290, 'POS', '0010/c456153babf04c97a490ac8dd6630550/10', 'CAJONERA CON MALETA NORMAL', 'CAJONERA CON MALETA NORMAL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(291, 'POS', '0011/c456153babf04c97a490ac8dd6630550/10', 'CAJONERA CON MALETA INFANTIL', 'CAJONERA CON MALETA INFANTIL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(292, 'POS', '0012/c456153babf04c97a490ac8dd6630550/10', 'CENTRO DE ENTRETENIMIENTO PIÑA', 'CENTRO DE ENTRETENIMIENTO PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(293, 'POS', '0013/c456153babf04c97a490ac8dd6630550/10', 'CENTRO DE ENTRETENIMIENTO ESCUADRA', 'CENTRO DE ENTRETENIMIENTO ESCUADRA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(294, 'POS', '0014/c456153babf04c97a490ac8dd6630550/10', 'CENTRO DE ENTRETENIMIENTO  AVION', 'CENTRO DE ENTRETENIMIENTO  AVION', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(295, 'POS', '0015/c456153babf04c97a490ac8dd6630550/10', 'COMODA TOCHIS', 'COMODA TOCHIS', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(296, 'POS', '0016/c456153babf04c97a490ac8dd6630550/10', 'COMODA MARIPOSA O CHIFONIER NORMAL', 'COMODA MARIPOSA O CHIFONIER NORMAL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(297, 'POS', '0017/c456153babf04c97a490ac8dd6630550/10', 'COMODA MARIPOSA O CHIFONIER INFANTIL', 'COMODA MARIPOSA O CHIFONIER INFANTIL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(298, 'POS', '0018/c456153babf04c97a490ac8dd6630550/10', 'COMODA TRIPLE NORMAL', 'COMODA TRIPLE NORMAL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(299, 'POS', '0019/c456153babf04c97a490ac8dd6630550/10', 'COMODA TRIPLE INFANTIL', 'COMODA TRIPLE INFANTIL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(300, 'POS', '0020/c456153babf04c97a490ac8dd6630550/10', 'ESQUINERO GRANDE', 'ESQUINERO GRANDE', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(301, 'POS', '0021/c456153babf04c97a490ac8dd6630550/10', 'ESQUINERO CHICO', 'ESQUINERO CHICO', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(302, 'POS', '0022/c456153babf04c97a490ac8dd6630550/10', 'LIBRERO CHICO FILEMON', 'LIBRERO CHICO FILEMON', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(303, 'POS', '0023/c456153babf04c97a490ac8dd6630550/10', 'LIBRERO GRANDE PIÑA', 'LIBRERO GRANDE PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(304, 'POS', '0024/c456153babf04c97a490ac8dd6630550/10', 'LIBRERO GRANDE MARIN', 'LIBRERO GRANDE MARIN', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(305, 'POS', '0025/c456153babf04c97a490ac8dd6630550/10', 'LIBRERO JUMBO PIÑA', 'LIBRERO JUMBO PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(306, 'POS', '0026/c456153babf04c97a490ac8dd6630550/10', 'LIBRERO JUMBO MARIN', 'LIBRERO JUMBO MARIN', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(307, 'POS', '0027/c456153babf04c97a490ac8dd6630550/10', 'LIBRERO VICTORIA PIÑA', 'LIBRERO VICTORIA PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(308, 'POS', '0028/c456153babf04c97a490ac8dd6630550/10', 'MINICLOSET MARIN', 'MINICLOSET MARIN', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(309, 'POS', '0029/c456153babf04c97a490ac8dd6630550/10', 'PORTA MICROONDAS', 'PORTA MICROONDAS', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(310, 'POS', '0030/c456153babf04c97a490ac8dd6630550/10', 'PORTA MICROONDAS DIEGO', 'PORTA MICROONDAS DIEGO', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(311, 'POS', '0031/c456153babf04c97a490ac8dd6630550/10', 'RESPALDO INDIVIDUAL', 'RESPALDO INDIVIDUAL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(312, 'POS', '0032/c456153babf04c97a490ac8dd6630550/10', 'RESPALDO MATRIMONIAL', 'RESPALDO MATRIMONIAL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(313, 'POS', '0033/c456153babf04c97a490ac8dd6630550/10', 'RESPALDO KING SIZE', 'RESPALDO KING SIZE', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(314, 'POS', '0034/c456153babf04c97a490ac8dd6630550/10', 'ROPERO BARCELONA PIÑA', 'ROPERO BARCELONA PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(315, 'POS', '0035/c456153babf04c97a490ac8dd6630550/10', 'ROPERO BARCELONA FILEMON', 'ROPERO BARCELONA FILEMON', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(316, 'POS', '0036/c456153babf04c97a490ac8dd6630550/10', 'ROPERO COQUETO NORMAL', 'ROPERO COQUETO NORMAL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(317, 'POS', '0037/c456153babf04c97a490ac8dd6630550/10', 'ROPERO COQUETO INFANTIL', 'ROPERO COQUETO INFANTIL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(318, 'POS', '0038/c456153babf04c97a490ac8dd6630550/10', 'ROPERO ESPAÑA KING', 'ROPERO ESPAÑA KING', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(319, 'POS', '0039/c456153babf04c97a490ac8dd6630550/10', 'ROPERO PALERMO', 'ROPERO PALERMO', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(320, 'POS', '0040/c456153babf04c97a490ac8dd6630550/10', 'ROPERO PALERMO NUEVO DISEÑO', 'ROPERO PALERMO NUEVO DISEÑO', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(321, 'POS', '0041/c456153babf04c97a490ac8dd6630550/10', 'ROPERO CINDY NORMAL', 'ROPERO CINDY NORMAL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(322, 'POS', '0042/c456153babf04c97a490ac8dd6630550/10', 'ROPERO CINDY INFANTIL', 'ROPERO CINDY INFANTIL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(323, 'POS', '0043/c456153babf04c97a490ac8dd6630550/10', 'ROPERO ROMA', 'ROPERO ROMA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(324, 'POS', '0044/c456153babf04c97a490ac8dd6630550/10', 'ROPERO MALETERO PIÑA', 'ROPERO MALETERO PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(325, 'POS', '0045/c456153babf04c97a490ac8dd6630550/10', 'ROPERO MALETERO 3 PIEZAS  FILEMON', 'ROPERO MALETERO 3 PIEZAS  FILEMON', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(326, 'POS', '0046/c456153babf04c97a490ac8dd6630550/10', 'ROPERO SABANERO', 'ROPERO SABANERO', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(327, 'POS', '0047/c456153babf04c97a490ac8dd6630550/10', 'ROPERO MINIMALETERO', 'ROPERO MINIMALETERO', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(328, 'POS', '0048/c456153babf04c97a490ac8dd6630550/10', 'ROPERO VALLARTA CHICO', 'ROPERO VALLARTA CHICO', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(329, 'POS', '0049/c456153babf04c97a490ac8dd6630550/10', 'ROPERO ZAPATERO PIÑA', 'ROPERO ZAPATERO PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(330, 'POS', '0050/c456153babf04c97a490ac8dd6630550/10', 'ROPERO ZAPATERO MARIN', 'ROPERO ZAPATERO MARIN', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(331, 'POS', '0051/c456153babf04c97a490ac8dd6630550/10', 'ROPERO ZAPATERO INFANTIL', 'ROPERO ZAPATERO INFANTIL', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(332, 'POS', '0052/c456153babf04c97a490ac8dd6630550/10', 'TOCADOR VIKINGO', 'TOCADOR VIKINGO', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(333, 'POS', '0053/c456153babf04c97a490ac8dd6630550/10', 'TOCADOR PRINCESA', 'TOCADOR PRINCESA', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(334, 'POS', '0054/c456153babf04c97a490ac8dd6630550/10', 'TOCADOR KATY', 'TOCADOR KATY', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(335, 'POS', '0055/c456153babf04c97a490ac8dd6630550/10', 'TOCADOR CLASICO CON LUZ', 'TOCADOR CLASICO CON LUZ', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(336, 'POS', '0056/c456153babf04c97a490ac8dd6630550/10', 'TOCADOR CLASICO SIN LUZ', 'TOCADOR CLASICO SIN LUZ', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(337, 'POS', '0057/c456153babf04c97a490ac8dd6630550/10', 'TOCADOR LUCES', 'TOCADOR LUCES', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(338, 'POS', '0058/c456153babf04c97a490ac8dd6630550/10', 'TOCADOR HOLLYWOOD', 'TOCADOR HOLLYWOOD', '', '', '', 'MADERA', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(339, 'POS', '0059/c456153babf04c97a490ac8dd6630550/10', 'COLCHON MATRIMONIAL NORMAL', 'COLCHON MATRIMONIAL NORMAL', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(340, 'POS', '0060/c456153babf04c97a490ac8dd6630550/10', 'COLCHON MATRIMONIAL C/COLCHONETA', 'COLCHON MATRIMONIAL C/COLCHONETA', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(341, 'POS', '0061/c456153babf04c97a490ac8dd6630550/10', 'COLCHON MATRIMONIAL D/COLCHONETA', 'COLCHON MATRIMONIAL D/COLCHONETA', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(342, 'POS', '0062/c456153babf04c97a490ac8dd6630550/10', 'COLCHON INDIVIDUAL NORMAL', 'COLCHON INDIVIDUAL NORMAL', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(343, 'POS', '0063/c456153babf04c97a490ac8dd6630550/10', 'COLCHON INDIVIDUAL C/COLCHONETA', 'COLCHON INDIVIDUAL C/COLCHONETA', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(344, 'POS', '0064/c456153babf04c97a490ac8dd6630550/10', 'COLCHON INDIVIDUAL D/COLCHONETA', 'COLCHON INDIVIDUAL D/COLCHONETA', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(345, 'POS', '0065/c456153babf04c97a490ac8dd6630550/10', 'COLCHON KING SIZE NORMAL', 'COLCHON KING SIZE NORMAL', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(346, 'POS', '0066/c456153babf04c97a490ac8dd6630550/10', 'COLCHON KING SIZE C/COLCHONETA', 'COLCHON KING SIZE C/COLCHONETA', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(347, 'POS', '0067/c456153babf04c97a490ac8dd6630550/10', 'COLCHON KING SIZE D/COLCHONETA', 'COLCHON KING SIZE D/COLCHONETA', '', '', '', 'COLCHONES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(348, 'POS', '0068/c456153babf04c97a490ac8dd6630550/10', 'BOCINA ATVIO', 'BOCINA ATVIO', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(349, 'POS', '0069/c456153babf04c97a490ac8dd6630550/10', 'BOCINA AIWA', 'BOCINA AIWA', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(350, 'POS', '0070/c456153babf04c97a490ac8dd6630550/10', 'LAVADORA HISENSE 11 KGS.', 'LAVADORA HISENSE 11 KGS.', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(351, 'POS', '0071/c456153babf04c97a490ac8dd6630550/10', 'LAVADORA HISENSE 13 KGS.', 'LAVADORA HISENSE 13 KGS.', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(352, 'POS', '0072/c456153babf04c97a490ac8dd6630550/10', 'LAVADORA MIDEA 14 KGS.', 'LAVADORA MIDEA 14 KGS.', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(353, 'POS', '0073/c456153babf04c97a490ac8dd6630550/10', 'LAVADORA KOBLENZ 22KGS. TINA REDONDA', 'LAVADORA KOBLENZ 22KGS. TINA REDONDA', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(354, 'POS', '0074/c456153babf04c97a490ac8dd6630550/10', 'LAVADORA DAEWOO 12KGS.', 'LAVADORA DAEWOO 12KGS.', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(355, 'POS', '0075/c456153babf04c97a490ac8dd6630550/10', 'LAVADORA DAEWOO 14 KGS.', 'LAVADORA DAEWOO 14 KGS.', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(356, 'POS', '0076/c456153babf04c97a490ac8dd6630550/10', 'PANTALLA SMART TV 32\"', 'PANTALLA SMART TV 32\"', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(357, 'POS', '0077/c456153babf04c97a490ac8dd6630550/10', 'PANTALLA SMART TV 40\"', 'PANTALLA SMART TV 40\"', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(358, 'POS', '0078/c456153babf04c97a490ac8dd6630550/10', 'PANTALLA SMART  TV 43\"', 'PANTALLA SMART  TV 43\"', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(359, 'POS', '0079/c456153babf04c97a490ac8dd6630550/10', 'HORNO DE MICROONDAS DAEWOO', 'HORNO DE MICROONDAS DAEWOO', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(360, 'POS', '0080/c456153babf04c97a490ac8dd6630550/10', 'HORNO DE MICROONDAS MIDEA', 'HORNO DE MICROONDAS MIDEA', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(361, 'POS', '0081/c456153babf04c97a490ac8dd6630550/10', 'VENTILADOR PEDESTAL MEGAFIRE', 'VENTILADOR PEDESTAL MEGAFIRE', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(362, 'POS', '0082/c456153babf04c97a490ac8dd6630550/10', 'VENTILADOR DE PISO MARCA NAVIA', 'VENTILADOR DE PISO MARCA NAVIA', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(363, 'POS', '0083/c456153babf04c97a490ac8dd6630550/10', 'LICUADORA OSTER 10 VEL', 'LICUADORA OSTER 10 VEL', '', '', '', 'LINEA BLANCA Y ELECTRO', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(364, 'POS', '0084/c456153babf04c97a490ac8dd6630550/10', 'JUEGO BASICO', 'JUEGO BASICO', '', '', '', 'ENSERES MENORES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(365, 'POS', '0085/c456153babf04c97a490ac8dd6630550/10', 'JUEGO DE BATERIA HU', 'JUEGO DE BATERIA HU', '', '', '', 'ENSERES MENORES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(366, 'POS', '0086/c456153babf04c97a490ac8dd6630550/10', 'MESITA DE CENTRO', 'MESITA DE CENTRO', '', '', '', 'ENSERES MENORES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(367, 'POS', '0087/c456153babf04c97a490ac8dd6630550/10', 'BANCAS', 'BANCAS', '', '', '', 'ENSERES MENORES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(368, 'POS', '0088/c456153babf04c97a490ac8dd6630550/10', 'MECEDORA CON COJINES', 'MECEDORA CON COJINES', '', '', '', 'ENSERES MENORES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(369, 'POS', '0089/c456153babf04c97a490ac8dd6630550/10', 'COMEDOR PARA 6 PERSONAS PIÑA', 'COMEDOR PARA 6 PERSONAS PIÑA', '', '', '', 'JUEGOS ESPECIALES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(370, 'POS', '0090/c456153babf04c97a490ac8dd6630550/10', 'COMEDOR PARA 8 PERSONAS PIÑA', 'COMEDOR PARA 8 PERSONAS PIÑA', '', '', '', 'JUEGOS ESPECIALES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(371, 'POS', '0091/c456153babf04c97a490ac8dd6630550/10', 'COMEDOR PARA 6 PERSONAS MARIN', 'COMEDOR PARA 6 PERSONAS MARIN', '', '', '', 'JUEGOS ESPECIALES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(372, 'POS', '0092/c456153babf04c97a490ac8dd6630550/10', 'COMEDOR PARA 4 PERSONAS MARIN', 'COMEDOR PARA 4 PERSONAS MARIN', '', '', '', 'JUEGOS ESPECIALES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(373, 'POS', '0093/c456153babf04c97a490ac8dd6630550/10', 'JUEGO DE RECAMARA INDIVIDUAL', 'JUEGO DE RECAMARA INDIVIDUAL', '', '', '', 'JUEGOS ESPECIALES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(374, 'POS', '0094/c456153babf04c97a490ac8dd6630550/10', 'JUEGO DE RECAMARA MATRIMONIAL', 'JUEGO DE RECAMARA MATRIMONIAL', '', '', '', 'JUEGOS ESPECIALES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(375, 'POS', '0095/c456153babf04c97a490ac8dd6630550/10', 'JUEGO DE RECAMARA KING SIZE', 'JUEGO DE RECAMARA KING SIZE', '', '', '', 'JUEGOS ESPECIALES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(376, 'POS', '0096/c456153babf04c97a490ac8dd6630550/10', 'JUEGO DE SALA', 'JUEGO DE SALA', '', '', '', 'JUEGOS ESPECIALES', '', 'SOFTMOR', 0, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-03 12:38:37', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 10),
(377, 'POS', '0003/c456153babf04c97a490ac8dd6630550/8', 'BASE DE CAMA INDIVIDUAL', 'BASE DE CAMA INDIVIDUAL', '', '', '', 'MADERA', '', 'SOFTMOR', 15, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-20 10:05:21', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 8),
(378, 'POS', '0003/c456153babf04c97a490ac8dd6630550/', 'BASE DE CAMA INDIVIDUAL', 'BASE DE CAMA INDIVIDUAL', '', '', '', 'MADERA', '', 'SOFTMOR', 148, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-20 10:06:00', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 0),
(379, 'POS', '0001/c456153babf04c97a490ac8dd6630550/8', 'ALACENA PIÑA', 'ALACENA PIÑA', '', '', '', 'MADERA', '', 'SOFTMOR', 10, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-28 03:42:35', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 8),
(380, 'POS', '0002/c456153babf04c97a490ac8dd6630550/8', 'ALACENA FILEMON', 'ALACENA FILEMON', '', '', '', 'MADERA', '', 'SOFTMOR', 10, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-28 03:42:35', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 8),
(381, 'POS', '0005/c456153babf04c97a490ac8dd6630550/8', 'BASE DE CAMA KING SIZE', 'BASE DE CAMA KING SIZE', '', '', '', 'MADERA', '', 'SOFTMOR', 4, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-28 03:52:17', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 8),
(382, 'POS', '0004/c456153babf04c97a490ac8dd6630550/8', 'BASE DE CAMA MATRIMONIAL', 'BASE DE CAMA MATRIMONIAL', '', '', '', 'MADERA', '', 'SOFTMOR', 3, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-29 04:21:03', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 8),
(383, 'POS', '0006/c456153babf04c97a490ac8dd6630550/8', 'BUROES (PAR)', 'BUROES (PAR)', '', '', '', 'MADERA', '', 'SOFTMOR', 12, NULL, 0, NULL, NULL, 0.00, 0.00, 0.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'http://localhost/comisa.com/app/assets/images/sistema/logo-productos-sm.jpeg', '', '2021-04-29 04:21:03', '0000-00-00 00:00:00', 'Héctor Alberto', '', 'Activo', 'c456153babf04c97a490ac8dd6630550', 'SUS_000001', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proveedores_pvs`
--

CREATE TABLE `tbl_proveedores_pvs` (
  `pvs_id` int(11) NOT NULL,
  `pvs_nombre` varchar(50) NOT NULL,
  `pvs_telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proveedores_pvs`
--

INSERT INTO `tbl_proveedores_pvs` (`pvs_id`, `pvs_nombre`, `pvs_telefono`) VALUES
(1, 'PROVEEDOR PIÑA', ''),
(2, 'PROVEEDOR FILEMON', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referencias_cliente_crfc`
--

CREATE TABLE `tbl_referencias_cliente_crfc` (
  `crfc_id` int(11) NOT NULL,
  `crfc_id_cliente` int(11) NOT NULL,
  `crfc_id_referencia` int(11) NOT NULL,
  `crfc_tipo_referencia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referencias_rfc`
--

CREATE TABLE `tbl_referencias_rfc` (
  `rfc_id` int(11) NOT NULL,
  `rfc_trabajo` text NOT NULL,
  `rfc_puesto_trabajo` text NOT NULL,
  `rfc_direccion_trabajo` text NOT NULL,
  `rfc_colonia_trabajo` text NOT NULL,
  `rfc_telefono_trabajo` text NOT NULL,
  `rfc_antiguedad_trabajo` text NOT NULL,
  `rfc_parentesco` text NOT NULL,
  `rfc_direccion` text NOT NULL,
  `rfc_colonia` text NOT NULL,
  `rfc_telefono` text NOT NULL,
  `rfc_documentos` text NOT NULL,
  `rfc_credencial_elector` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicios_srv`
--

CREATE TABLE `tbl_servicios_srv` (
  `srv_id` int(11) NOT NULL,
  `srv_fecha_reporte` datetime NOT NULL,
  `srv_id_tarjeta_cobro` varchar(20) NOT NULL,
  `srv_detalle_servicio` text NOT NULL,
  `srv_detalle_solucion` text NOT NULL,
  `srv_fecha_solucion` datetime NOT NULL,
  `srv_estado` text NOT NULL,
  `srv_fecha_programado` datetime NOT NULL,
  `srv_nota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sucursal_scl`
--

CREATE TABLE `tbl_sucursal_scl` (
  `scl_id` varchar(100) NOT NULL,
  `scl_nombre` text NOT NULL,
  `scl_direccion` text NOT NULL,
  `scl_rfc` text NOT NULL,
  `scl_telefono` text NOT NULL,
  `scl_sub_fijo` text NOT NULL,
  `scl_acceso_usr` text NOT NULL,
  `scl_usuario_registro` text NOT NULL,
  `scl_fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sucursal_scl`
--

INSERT INTO `tbl_sucursal_scl` (`scl_id`, `scl_nombre`, `scl_direccion`, `scl_rfc`, `scl_telefono`, `scl_sub_fijo`, `scl_acceso_usr`, `scl_usuario_registro`, `scl_fecha_registro`) VALUES
('b2e3915e388b9830e24fdde35fcede9e', 'COMISA XICOTEPEC, PUEBLA', 'LOMAS DEL OBISPO Nº 100 COL. 5 DE MAYO XICOTEPEC DE JUAREZ, PUEBLA', '', '764 764 92 86', 'CP-', '[\"0001\"]', 'Héctor Alberto', '2021-02-16 11:00:42'),
('c456153babf04c97a490ac8dd6630550', 'COMISA TUXTEPEC OAXACA', 'LOMAS DEL OBISPO Nº 100 COL. 5 DE MAYO XICOTEPEC DE JUAREZ, PUEBLA', '', '', 'CO-', '[\"pb0083\"]', 'Héctor Alberto', '2021-02-10 11:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tarjeta_cobro_tcbo`
--

CREATE TABLE `tbl_tarjeta_cobro_tcbo` (
  `tcbo_id` varchar(20) NOT NULL,
  `tcbo_orden` int(11) NOT NULL,
  `tcbo_ruta` text NOT NULL,
  `tcbo_id_contrato` int(11) NOT NULL,
  `tcbo_promotor` int(11) NOT NULL,
  `tcbo_saldo` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traspasos_tps`
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
-- Dumping data for table `tbl_traspasos_tps`
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios_usr`
--

CREATE TABLE `tbl_usuarios_usr` (
  `usr_id` int(20) NOT NULL,
  `usr_matricula` varchar(20) NOT NULL,
  `usr_ruta` varchar(100) NOT NULL,
  `usr_nombre` varchar(100) DEFAULT NULL,
  `usr_app` text DEFAULT NULL,
  `usr_apm` text DEFAULT NULL,
  `usr_telefono` varchar(25) DEFAULT NULL,
  `usr_direccion` text DEFAULT NULL,
  `usr_calle` text DEFAULT NULL,
  `usr_ne` text DEFAULT NULL,
  `usr_ni` text DEFAULT NULL,
  `usr_cp` text DEFAULT NULL,
  `usr_colonia` text DEFAULT NULL,
  `usr_estado` text DEFAULT NULL,
  `usr_municipio` text DEFAULT NULL,
  `usr_pais` varchar(100) DEFAULT 'México',
  `usr_correo` varchar(100) DEFAULT NULL,
  `usr_clave` text DEFAULT NULL,
  `usr_rol` varchar(50) DEFAULT 'Ejecutivo',
  `usr_estado_verificacion` char(1) DEFAULT '0',
  `usr_token` text DEFAULT NULL,
  `usr_recuperar_clave` char(1) DEFAULT '0',
  `usr_usuario_registro` text DEFAULT NULL,
  `usr_fecha_registro` datetime DEFAULT NULL,
  `usr_firma` text NOT NULL,
  `usr_caja` int(11) NOT NULL DEFAULT 0,
  `usr_id_sucursal` text NOT NULL,
  `usr_deuda_int` double(10,2) NOT NULL,
  `usr_deuda_ext` double(10,2) NOT NULL,
  `usr_sueldo` double(10,2) NOT NULL,
  `usr_vehiculo` varchar(20) NOT NULL,
  `usr_imss` double(10,2) NOT NULL,
  `usr_accesp_concentradora` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usuarios_usr`
--

INSERT INTO `tbl_usuarios_usr` (`usr_id`, `usr_matricula`, `usr_ruta`, `usr_nombre`, `usr_app`, `usr_apm`, `usr_telefono`, `usr_direccion`, `usr_calle`, `usr_ne`, `usr_ni`, `usr_cp`, `usr_colonia`, `usr_estado`, `usr_municipio`, `usr_pais`, `usr_correo`, `usr_clave`, `usr_rol`, `usr_estado_verificacion`, `usr_token`, `usr_recuperar_clave`, `usr_usuario_registro`, `usr_fecha_registro`, `usr_firma`, `usr_caja`, `usr_id_sucursal`, `usr_deuda_int`, `usr_deuda_ext`, `usr_sueldo`, `usr_vehiculo`, `usr_imss`, `usr_accesp_concentradora`) VALUES
(83, '0001', '', 'Héctor Alberto', 'López', 'Fabián', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'lf_alberto@outlook.com', '$2y$10$aoxEa2vQk/Q1nCmqstx.hekj732WAifRPcpkrcqE5iqA4UcfzoJIa', 'Administrador', '0', NULL, '0', NULL, NULL, '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(86, '0086', '', 'CELSO R1', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'ricardo@gmail.com', '$2y$10$NyUYoAkbw9IWxuG.gM21e.npXjcMcLWkh9rz74XUHAbWCTTLc4g6C', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 05:26:33', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(87, '0087', '', 'HELADIO R2', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$yWTsVTcbtM/xxVNB5pYEzu3BSBJia2qdWokVGUjMnqok1sXRXg1Vm', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:11:50', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(88, '0088', '', 'GERARDO R3', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$kZGapLEPliyUZqDPBGV8mOMFzSGfLX2ZeUr1UcaIN2XSD8b7NREPm', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:13:18', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(89, '0089', '', 'HORACIO R4', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$9FQqGn124v0GjbyntCfL2.VOS4zRaghPdFoLhyMRde66WeCVR4JXG', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:13:26', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(90, '0090', '', 'LUIS RAMON R5', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$5jmt4NY6TUm9D6wS00hXYuFzED1DdOaCQCvr9RM7PqcJYeWs2P/0e', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:13:33', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(91, '0091', '', 'MARIO R6', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$xeZqgDK0o7vLqrhTxmF0Q.oPlmiUiRjaqL2s4SsD3lcpLelba87qC', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:13:43', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(92, '0092', '', 'LUCIO R7', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$sW5Gn/0FPbtpHaYJkWwH0uqanSoPx7te1TX/oveCC.Bg5nv9R3iRy', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:13:50', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(93, '0093', '', 'ANGEL R8', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$CzWxzUbn.YtoumZb7eM0feUNMx8HV9cfbdSEjKxGR3.1nuRgKQtEe', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:13:57', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(94, '0094', '', 'GABRIEL R9', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$4bt4ET66Kycri66HUot0fe2HQ3OmeRa0ve0v1vpZZRycy9sQVmdOK', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:14:09', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(95, '0095', '', 'MILLAN R10', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$aOViW8S6/hSsVgFOokUA9.UohxhsRJRPclAx0nzwvfmXphrNcF2/6', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:14:19', '', 140, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(96, '0096', '', 'MARCOS R11', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$whlBwbyvj7ZYdDllPCEcl.gVUsoYfpzPlUQ0HAfJ8Qzf6mFtb/77K', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:14:25', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(97, '0097', '', 'DELISAID R12', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$jrgR62ybAW2xEbKb8XdgQ.xRcgbiGNuxDgJcsj9xDFg4.blMa7yCq', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:14:39', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(98, '0098', '', 'ANDRES R13', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$JrdGMf2onHTIgT0YUx/evetY7gB3cIe3VuNi61uN6Z5ug/zFIaCL2', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:14:56', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(99, '0099', '', 'CRISTIAN', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$lo5Qdl9oVPlfB3USDnxnNeCVhuRZrUfeV7BXWt5cidThG57t3NxMG', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:37:41', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(100, '0100', '', 'LIC. SIBAJA', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$05EgA1WG/lRhT9jz.bYAHe8zeDpAIZKhmCa67MRuRFxyMvHatiAdG', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-02-28 08:39:00', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(101, '0101', '', 'JOSE MANUEL ', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$h7U7vQw2atn5kS5Kk/6o8ubhEb2uvBDrPASYDI6COlncU6Zb4VUUu', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-03-01 11:33:46', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(102, '0102', '', 'CRISTOBAL VAZQUEZ', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$yiiHk8/eRz9fEstm9SRqvOsDJwy.h5WOyddTkZRpbLA1z4EuDojy2', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-03-01 11:34:06', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(103, '0103', '', 'JOSE LUIS ZAMORANO', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$6x3Wz42pfA9K5KEoqkwES./NgO4CEu6Z8e3NXqvxtS2KCY4WEiv2O', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-03-01 11:34:29', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(104, '0104', '', 'MARCOS HERNANDEZ', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'marcos@gmail.com', '$2y$10$qNM6Zdqv8270rq77ODRGG.dKihurV49Mv.BA9C0P7H6jZIqYqSnWC', 'Vendedor', '0', NULL, '0', 'Héctor Alberto', '2021-03-01 11:34:43', '', 163, 'c456153babf04c97a490ac8dd6630550', 75.00, 350.00, 0.00, '', 0.00, 0),
(105, '0105', '', 'LUIS FERNANDO FERNANDEZ', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$NdzYMQv9cBa1SGrWKNMhIugBmrhloAsI2rlL1/V.tWTiMUvLl80nS', 'Vendedor', '0', NULL, '0', 'Héctor Alberto', '2021-03-01 11:35:02', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(106, '0106', '', ' Erendida Valdez Acevedo', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'keyra26012008@gmail.com', '$2y$10$DUKLTCFG2GEBwDBP3DGbVuFdq8E1qgF.JpvfkAg1Q1QoUselMTs1u', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-03-01 03:09:06', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(108, '0108', '', 'LINO / FERNANDO', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$/xd25myBclQFT8rXWH2QqujwmzRcInRkjOSb5nxoTloo/DA2WI8fa', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-03-10 02:22:55', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(109, '0109', '', 'Cuenta de Ventas', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'ventas@ventas.com', '$2y$10$hJjvPlYxvIVjl/OuH5mD5OOjE4IBoRIxnFbHElBXjslJTC6HAbXGm', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-03-10 07:54:50', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(110, '0110', '', 'Cuenta demo cobranza', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'cobranza@gmail.com', '$2y$10$HvOAdb9tQ1iMVc6mVlGB3.zSa65EbHrDKOUkSKFlKwRwagXPFMbIC', 'Jefe de cobranza', '0', NULL, '0', 'Héctor Alberto', '2021-03-30 10:53:32', '', 158, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(111, '0111', '', 'yovanny', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'boy_america9@hotmail.com', '$2y$10$BOA1Ug.KS0xxXJx7Fozi9.qRVrGGkEPJxapMyqKBZN/6KQ6qgv52q', 'Jefe de cobranza', '0', NULL, '0', 'Héctor Alberto', '2021-03-31 09:55:29', '', 159, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(112, '0112', '', 'Luis', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$g12ceyLJB4QDlS92WbhG2uObaC9mJpTxk75wsz/eXtMwlyvoEmNMO', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-04-06 03:19:03', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(114, '0113', '', 'YOVANNY SANCHES', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$OuvdvbXj6zNiX9bFAZM//eQ0idj3uIHk8iyjX.OZUWZeYyRfgjfCW', 'Administrador', '0', NULL, '0', 'Héctor Alberto', '2021-04-13 10:52:21', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 300.00, 2500.00, '', 0.00, 0),
(115, '0115', '', 'JEFE VENTAS', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'ventas@comisa.com', '$2y$10$vZ0kMMSxhSEocw38y0bLDuGU6ut2TWz5IHfhm2SEUvxyhF6udnvXu', 'Jefe de ventas', '0', NULL, '0', 'Héctor Alberto', '2021-04-14 09:26:51', '', 164, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0),
(116, '0116', '', 'Usuario de  prueba', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', '', '$2y$10$Lkvl8SUwn8iY/nne4c97Oe5bcTU8c/fTC80N9c.5zGOfLMKGYcg9G', 'Empleado', '0', NULL, '0', 'Cuenta demo cobranza', '2021-04-17 10:22:12', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 1200.00, 4500.00, '', 0.00, 0),
(118, '0117', '', 'Juan hernandez', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'lf_alberto@hotmail.com', '$2y$10$Tq0OOLAxh66So.PZ9ryd8el9YNwCEtCpho2JiV017h8gILwbaVcYa', 'Empleado', '0', NULL, '0', 'Cuenta demo cobranza', '2021-04-17 10:35:14', '', 162, 'c456153babf04c97a490ac8dd6630550', 0.00, 150.00, 3400.00, 'SN24859', 0.00, 0),
(119, '0119', '', 'victor', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'México', 'victor@gmail.com', '$2y$10$ywtCjt2664ZNpFZjtHmObe69xzh3yXG2yvey9GedHtvZYknJTMYcK', 'Jefe administrativo', '0', NULL, '0', 'Cuenta demo cobranza', '2021-06-01 12:00:42', '', 0, 'c456153babf04c97a490ac8dd6630550', 0.00, 0.00, 0.00, '', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ventas_vts`
--

CREATE TABLE `tbl_ventas_vts` (
  `vts_id_venta` varchar(100) NOT NULL,
  `vts_id_cliente` int(11) DEFAULT NULL,
  `vts_id_vendedor` int(11) DEFAULT NULL,
  `vts_fecha_venta` datetime DEFAULT NULL,
  `vts_fecha_cobro` datetime DEFAULT NULL,
  `vts_fecha_pago` datetime DEFAULT NULL,
  `vts_tipo_pago` varchar(100) DEFAULT NULL,
  `vts_usuario_registro` varchar(100) DEFAULT NULL,
  `vts_usuario_responsable` varchar(100) DEFAULT NULL,
  `vts_estado_pagado` varchar(100) DEFAULT '',
  `vts_estado_cancelacion` char(1) DEFAULT '0',
  `vts_totales` text DEFAULT NULL,
  `vts_nota` text DEFAULT NULL,
  `vts_id_modulo` varchar(100) DEFAULT NULL,
  `vts_configuracion` text DEFAULT NULL,
  `vts_id_sucursal` varchar(100) DEFAULT NULL,
  `vts_id_suscriptor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_abonos_abs`
--
ALTER TABLE `tbl_abonos_abs`
  ADD PRIMARY KEY (`abs_id`),
  ADD KEY `abs_id_tarjeta_cobro` (`abs_id_tarjeta_cobro`);

--
-- Indexes for table `tbl_abonos_empleados_absemp`
--
ALTER TABLE `tbl_abonos_empleados_absemp`
  ADD PRIMARY KEY (`absemp_id`),
  ADD KEY `abs_usr_id_fk` (`absemp_id_usuario`);

--
-- Indexes for table `tbl_almacenes_ams`
--
ALTER TABLE `tbl_almacenes_ams`
  ADD PRIMARY KEY (`ams_id`),
  ADD UNIQUE KEY `ams_nombre` (`ams_nombre`),
  ADD KEY `ams_fk_suc_id` (`ams_id_sucursal`);

--
-- Indexes for table `tbl_caja_cja`
--
ALTER TABLE `tbl_caja_cja`
  ADD PRIMARY KEY (`cja_id_caja`),
  ADD UNIQUE KEY `cja_nombre` (`cja_nombre`);

--
-- Indexes for table `tbl_caja_open_copn`
--
ALTER TABLE `tbl_caja_open_copn`
  ADD PRIMARY KEY (`copn_id`),
  ADD KEY `copn_usr_fk` (`copn_usuario_abrio`),
  ADD KEY `copn_cja_fk` (`copn_id_caja`),
  ADD KEY `copn_scl_fk` (`copn_id_sucursal`);

--
-- Indexes for table `tbl_categorias_ctg`
--
ALTER TABLE `tbl_categorias_ctg`
  ADD PRIMARY KEY (`ctg_id`),
  ADD UNIQUE KEY `ctg_nombre` (`ctg_nombre`);

--
-- Indexes for table `tbl_categoria_gastos_gts`
--
ALTER TABLE `tbl_categoria_gastos_gts`
  ADD PRIMARY KEY (`gts_id`);

--
-- Indexes for table `tbl_clientes_clts`
--
ALTER TABLE `tbl_clientes_clts`
  ADD PRIMARY KEY (`clts_id`),
  ADD KEY `usr_clientes_fk` (`clts_usuario_registro`);

--
-- Indexes for table `tbl_compras_cps`
--
ALTER TABLE `tbl_compras_cps`
  ADD PRIMARY KEY (`cps_id`),
  ADD KEY `ams_compras_fk` (`cps_id_almacen`),
  ADD KEY `pvs_compras_fk` (`cps_id_proveedor`);

--
-- Indexes for table `tbl_contratos_ctrs`
--
ALTER TABLE `tbl_contratos_ctrs`
  ADD PRIMARY KEY (`ctrs_id`),
  ADD KEY `clts_contratos_fk` (`ctrs_cliente`);

--
-- Indexes for table `tbl_cuentas_banco_cbco`
--
ALTER TABLE `tbl_cuentas_banco_cbco`
  ADD PRIMARY KEY (`cbco_id`);

--
-- Indexes for table `tbl_datos_ventas_dvts`
--
ALTER TABLE `tbl_datos_ventas_dvts`
  ADD PRIMARY KEY (`dvts_id`),
  ADD KEY `usr_datos_ventas_fk` (`dvts_id_vendedor`),
  ADD KEY `pvts_datos_ventas_fk` (`dvts_id_plantilla`);

--
-- Indexes for table `tbl_ficha_devolucion_fdev`
--
ALTER TABLE `tbl_ficha_devolucion_fdev`
  ADD PRIMARY KEY (`fdev_id`),
  ADD KEY `fdev_id_contraro` (`fdev_id_contrato`);

--
-- Indexes for table `tbl_gastos_gasolina_gtsg`
--
ALTER TABLE `tbl_gastos_gasolina_gtsg`
  ADD PRIMARY KEY (`gtsg_id`),
  ADD KEY `gtsg_fk_usuario_responsable` (`gtsg_usuario_responsable`),
  ADD KEY `gtsg_fk_usuario_registri` (`gtsg_usuario_registro`);

--
-- Indexes for table `tbl_gastos_tgts`
--
ALTER TABLE `tbl_gastos_tgts`
  ADD PRIMARY KEY (`tgts_id`),
  ADD KEY `fk_tgts_categoria` (`tgts_categoria`),
  ADD KEY `fk_tgts_usuarios` (`tgts_usuario_responsable`);

--
-- Indexes for table `tbl_ingresos_cuenta_icta`
--
ALTER TABLE `tbl_ingresos_cuenta_icta`
  ADD PRIMARY KEY (`icta_id`),
  ADD KEY `icta_cuenta_fk` (`icta_cuenta`);

--
-- Indexes for table `tbl_ingresos_igs`
--
ALTER TABLE `tbl_ingresos_igs`
  ADD PRIMARY KEY (`igs_id`),
  ADD KEY `igs_usruario_fk` (`igs_usuario_responsable`);

--
-- Indexes for table `tbl_plantilla_ventas_pvts`
--
ALTER TABLE `tbl_plantilla_ventas_pvts`
  ADD PRIMARY KEY (`pvts_id`);

--
-- Indexes for table `tbl_prestamos_pms`
--
ALTER TABLE `tbl_prestamos_pms`
  ADD PRIMARY KEY (`pms_id`),
  ADD KEY `pms_usuarios_fk` (`pms_usuario`);

--
-- Indexes for table `tbl_productos_pds`
--
ALTER TABLE `tbl_productos_pds`
  ADD PRIMARY KEY (`pds_id_producto`),
  ADD UNIQUE KEY `pds_sku` (`pds_sku`(100));

--
-- Indexes for table `tbl_proveedores_pvs`
--
ALTER TABLE `tbl_proveedores_pvs`
  ADD PRIMARY KEY (`pvs_id`);

--
-- Indexes for table `tbl_referencias_cliente_crfc`
--
ALTER TABLE `tbl_referencias_cliente_crfc`
  ADD PRIMARY KEY (`crfc_id`),
  ADD KEY `crfc_id_cliente` (`crfc_id_cliente`),
  ADD KEY `crfc_id_referenica` (`crfc_id_referencia`);

--
-- Indexes for table `tbl_referencias_rfc`
--
ALTER TABLE `tbl_referencias_rfc`
  ADD PRIMARY KEY (`rfc_id`);

--
-- Indexes for table `tbl_servicios_srv`
--
ALTER TABLE `tbl_servicios_srv`
  ADD PRIMARY KEY (`srv_id`),
  ADD KEY `srv_tarjeta_cobro` (`srv_id_tarjeta_cobro`);

--
-- Indexes for table `tbl_sucursal_scl`
--
ALTER TABLE `tbl_sucursal_scl`
  ADD PRIMARY KEY (`scl_id`);

--
-- Indexes for table `tbl_tarjeta_cobro_tcbo`
--
ALTER TABLE `tbl_tarjeta_cobro_tcbo`
  ADD PRIMARY KEY (`tcbo_id`),
  ADD KEY `tcbo_id_contrato` (`tcbo_id_contrato`);

--
-- Indexes for table `tbl_traspasos_tps`
--
ALTER TABLE `tbl_traspasos_tps`
  ADD PRIMARY KEY (`tps_id`),
  ADD KEY `usr_traspasos_fk` (`tps_user_registro`),
  ADD KEY `usr_traspasos2_fk` (`tps_user_id_receptor`),
  ADD KEY `ams_traspasos_fk` (`tps_ams_id_origen`),
  ADD KEY `ams_traspasos2_fk` (`tps_ams_id_destino`);

--
-- Indexes for table `tbl_usuarios_usr`
--
ALTER TABLE `tbl_usuarios_usr`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_matricula` (`usr_matricula`);

--
-- Indexes for table `tbl_ventas_vts`
--
ALTER TABLE `tbl_ventas_vts`
  ADD PRIMARY KEY (`vts_id_venta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_abonos_abs`
--
ALTER TABLE `tbl_abonos_abs`
  MODIFY `abs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_abonos_empleados_absemp`
--
ALTER TABLE `tbl_abonos_empleados_absemp`
  MODIFY `absemp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_almacenes_ams`
--
ALTER TABLE `tbl_almacenes_ams`
  MODIFY `ams_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_caja_cja`
--
ALTER TABLE `tbl_caja_cja`
  MODIFY `cja_id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_caja_open_copn`
--
ALTER TABLE `tbl_caja_open_copn`
  MODIFY `copn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tbl_categorias_ctg`
--
ALTER TABLE `tbl_categorias_ctg`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_categoria_gastos_gts`
--
ALTER TABLE `tbl_categoria_gastos_gts`
  MODIFY `gts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_clientes_clts`
--
ALTER TABLE `tbl_clientes_clts`
  MODIFY `clts_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_compras_cps`
--
ALTER TABLE `tbl_compras_cps`
  MODIFY `cps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cuentas_banco_cbco`
--
ALTER TABLE `tbl_cuentas_banco_cbco`
  MODIFY `cbco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_datos_ventas_dvts`
--
ALTER TABLE `tbl_datos_ventas_dvts`
  MODIFY `dvts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_ficha_devolucion_fdev`
--
ALTER TABLE `tbl_ficha_devolucion_fdev`
  MODIFY `fdev_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gastos_gasolina_gtsg`
--
ALTER TABLE `tbl_gastos_gasolina_gtsg`
  MODIFY `gtsg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_gastos_tgts`
--
ALTER TABLE `tbl_gastos_tgts`
  MODIFY `tgts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `tbl_ingresos_cuenta_icta`
--
ALTER TABLE `tbl_ingresos_cuenta_icta`
  MODIFY `icta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ingresos_igs`
--
ALTER TABLE `tbl_ingresos_igs`
  MODIFY `igs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `tbl_plantilla_ventas_pvts`
--
ALTER TABLE `tbl_plantilla_ventas_pvts`
  MODIFY `pvts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_prestamos_pms`
--
ALTER TABLE `tbl_prestamos_pms`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_productos_pds`
--
ALTER TABLE `tbl_productos_pds`
  MODIFY `pds_id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `tbl_proveedores_pvs`
--
ALTER TABLE `tbl_proveedores_pvs`
  MODIFY `pvs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_referencias_cliente_crfc`
--
ALTER TABLE `tbl_referencias_cliente_crfc`
  MODIFY `crfc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_referencias_rfc`
--
ALTER TABLE `tbl_referencias_rfc`
  MODIFY `rfc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_servicios_srv`
--
ALTER TABLE `tbl_servicios_srv`
  MODIFY `srv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_traspasos_tps`
--
ALTER TABLE `tbl_traspasos_tps`
  MODIFY `tps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_usuarios_usr`
--
ALTER TABLE `tbl_usuarios_usr`
  MODIFY `usr_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_abonos_abs`
--
ALTER TABLE `tbl_abonos_abs`
  ADD CONSTRAINT `abs_id_tarjeta_cobro` FOREIGN KEY (`abs_id_tarjeta_cobro`) REFERENCES `tbl_tarjeta_cobro_tcbo` (`tcbo_id`);

--
-- Constraints for table `tbl_abonos_empleados_absemp`
--
ALTER TABLE `tbl_abonos_empleados_absemp`
  ADD CONSTRAINT `abs_usr_id_fk` FOREIGN KEY (`absemp_id_usuario`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Constraints for table `tbl_almacenes_ams`
--
ALTER TABLE `tbl_almacenes_ams`
  ADD CONSTRAINT `ams_fk_suc_id` FOREIGN KEY (`ams_id_sucursal`) REFERENCES `tbl_sucursal_scl` (`scl_id`);

--
-- Constraints for table `tbl_caja_open_copn`
--
ALTER TABLE `tbl_caja_open_copn`
  ADD CONSTRAINT `copn_cja_fk` FOREIGN KEY (`copn_id_caja`) REFERENCES `tbl_caja_cja` (`cja_id_caja`),
  ADD CONSTRAINT `copn_scl_fk` FOREIGN KEY (`copn_id_sucursal`) REFERENCES `tbl_sucursal_scl` (`scl_id`),
  ADD CONSTRAINT `copn_usr_fk` FOREIGN KEY (`copn_usuario_abrio`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Constraints for table `tbl_clientes_clts`
--
ALTER TABLE `tbl_clientes_clts`
  ADD CONSTRAINT `usr_clientes_fk` FOREIGN KEY (`clts_usuario_registro`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Constraints for table `tbl_compras_cps`
--
ALTER TABLE `tbl_compras_cps`
  ADD CONSTRAINT `ams_compras_fk` FOREIGN KEY (`cps_id_almacen`) REFERENCES `tbl_almacenes_ams` (`ams_id`),
  ADD CONSTRAINT `pvs_compras_fk` FOREIGN KEY (`cps_id_proveedor`) REFERENCES `tbl_proveedores_pvs` (`pvs_id`);

--
-- Constraints for table `tbl_contratos_ctrs`
--
ALTER TABLE `tbl_contratos_ctrs`
  ADD CONSTRAINT `clts_contratos_fk` FOREIGN KEY (`ctrs_cliente`) REFERENCES `tbl_clientes_clts` (`clts_id`);

--
-- Constraints for table `tbl_datos_ventas_dvts`
--
ALTER TABLE `tbl_datos_ventas_dvts`
  ADD CONSTRAINT `pvts_datos_ventas_fk` FOREIGN KEY (`dvts_id_plantilla`) REFERENCES `tbl_plantilla_ventas_pvts` (`pvts_id`),
  ADD CONSTRAINT `usr_datos_ventas_fk` FOREIGN KEY (`dvts_id_vendedor`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Constraints for table `tbl_ficha_devolucion_fdev`
--
ALTER TABLE `tbl_ficha_devolucion_fdev`
  ADD CONSTRAINT `fdev_id_contraro` FOREIGN KEY (`fdev_id_contrato`) REFERENCES `tbl_contrato_crt` (`ctr_id`);

--
-- Constraints for table `tbl_gastos_gasolina_gtsg`
--
ALTER TABLE `tbl_gastos_gasolina_gtsg`
  ADD CONSTRAINT `gtsg_fk_usuario_registri` FOREIGN KEY (`gtsg_usuario_registro`) REFERENCES `tbl_usuarios_usr` (`usr_id`),
  ADD CONSTRAINT `gtsg_fk_usuario_responsable` FOREIGN KEY (`gtsg_usuario_responsable`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Constraints for table `tbl_gastos_tgts`
--
ALTER TABLE `tbl_gastos_tgts`
  ADD CONSTRAINT `fk_tgts_categoria` FOREIGN KEY (`tgts_categoria`) REFERENCES `tbl_categoria_gastos_gts` (`gts_id`),
  ADD CONSTRAINT `fk_tgts_usuarios` FOREIGN KEY (`tgts_usuario_responsable`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Constraints for table `tbl_ingresos_cuenta_icta`
--
ALTER TABLE `tbl_ingresos_cuenta_icta`
  ADD CONSTRAINT `icta_cuenta_fk` FOREIGN KEY (`icta_cuenta`) REFERENCES `tbl_cuentas_banco_cbco` (`cbco_id`);

--
-- Constraints for table `tbl_ingresos_igs`
--
ALTER TABLE `tbl_ingresos_igs`
  ADD CONSTRAINT `igs_usruario_fk` FOREIGN KEY (`igs_usuario_responsable`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Constraints for table `tbl_prestamos_pms`
--
ALTER TABLE `tbl_prestamos_pms`
  ADD CONSTRAINT `pms_usuarios_fk` FOREIGN KEY (`pms_usuario`) REFERENCES `tbl_usuarios_usr` (`usr_id`);

--
-- Constraints for table `tbl_referencias_cliente_crfc`
--
ALTER TABLE `tbl_referencias_cliente_crfc`
  ADD CONSTRAINT `crfc_id_cliente` FOREIGN KEY (`crfc_id_cliente`) REFERENCES `tbl_clientes_cts` (`cts_id`),
  ADD CONSTRAINT `crfc_id_referenica` FOREIGN KEY (`crfc_id_referencia`) REFERENCES `tbl_referencias_rfc` (`rfc_id`);

--
-- Constraints for table `tbl_servicios_srv`
--
ALTER TABLE `tbl_servicios_srv`
  ADD CONSTRAINT `srv_tarjeta_cobro` FOREIGN KEY (`srv_id_tarjeta_cobro`) REFERENCES `tbl_tarjeta_cobro_tcbo` (`tcbo_id`);

--
-- Constraints for table `tbl_tarjeta_cobro_tcbo`
--
ALTER TABLE `tbl_tarjeta_cobro_tcbo`
  ADD CONSTRAINT `tcbo_id_contrato` FOREIGN KEY (`tcbo_id_contrato`) REFERENCES `tbl_contrato_crt` (`ctr_id`);

--
-- Constraints for table `tbl_traspasos_tps`
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
