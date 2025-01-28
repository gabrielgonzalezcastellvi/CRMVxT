-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2024 a las 00:23:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventasvxt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `nombre_archivo` varchar(255) DEFAULT NULL,
  `tipo_archivo` varchar(255) DEFAULT NULL,
  `tamano_archivo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `venta_id`, `nombre_archivo`, `tipo_archivo`, `tamano_archivo`) VALUES
(6, 429480, '', '', 0),
(7, 429481, '', '', 0),
(8, 429482, '', '', 0),
(9, 429483, '', '', 0),
(12, 429484, 'AFIP - Administración Federal de Ingresos Públicos Rosina.pdf', 'application/pdf', 91673),
(13, 429484, 'Mi Personal Flow.pdf', 'application/pdf', 1045286),
(14, 429484, 'ROSINA MAGGIO 1.jpeg', 'image/jpeg', 43204),
(15, 429484, 'ROSINA MAGGIO 2.jpeg', 'image/jpeg', 36577);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivoseliminados`
--

CREATE TABLE `archivoseliminados` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios_solicitud`
--

CREATE TABLE `cambios_solicitud` (
  `id_solicitud` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `cambios_realizados` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosusuarios`
--

CREATE TABLE `datosusuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `correo` int(11) NOT NULL,
  `contrasena` varchar(300) NOT NULL,
  `encrypt` varchar(300) NOT NULL,
  `levelclient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id`, `cliente`, `fecha`, `estado`) VALUES
(5, 'Melisa Valdez', '2024-05-08 14:46:48', 'EGRESO'),
(6, 'renatabresuti@vxt.com', '2024-05-08 18:52:16', 'EGRESO'),
(7, 'mariaperez@vxt.com', '2024-05-08 19:08:00', 'EGRESO'),
(8, 'Gabriel', '2024-05-09 07:30:23', 'EGRESO'),
(9, 'Melisa Valdez', '2024-05-24 18:07:45', 'EGRESO'),
(10, 'renatabresuti@vxt.com', '2024-05-24 18:34:27', 'EGRESO'),
(11, 'Luis Salgado', '2024-05-24 18:34:46', 'EGRESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `COMPANIA` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`COMPANIA`) VALUES
('CLARO'),
('PERSONAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialegresos`
--

CREATE TABLE `historialegresos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialegresos`
--

INSERT INTO `historialegresos` (`id`, `cliente`, `fecha`, `estado`) VALUES
(1, 'rodrigobecerra@vxt.com', '2024-04-18 14:13:58', 'EGRESO'),
(2, 'martinaballesteros@vxt.com', '2024-04-18 14:15:02', 'EGRESO'),
(3, '', '2024-04-18 16:39:04', 'EGRESO'),
(4, 'mariaperez@vxt.com', '2024-04-18 18:36:00', 'EGRESO'),
(5, 'martinaballesteros@vxt.com', '2024-04-18 19:02:53', 'EGRESO'),
(6, 'rodrigobecerra@vxt.com', '2024-04-19 12:49:50', 'EGRESO'),
(7, 'martinaballesteros@vxt.com', '2024-04-19 12:52:30', 'EGRESO'),
(8, '', '2024-04-19 13:22:43', 'EGRESO'),
(9, '', '2024-04-19 13:22:45', 'EGRESO'),
(10, 'aixaperoyan@vxt.com', '2024-04-19 13:24:55', 'EGRESO'),
(11, 'rodrigobecerra@vxt.com', '2024-04-19 13:51:44', 'EGRESO'),
(12, 'martinaballesteros@vxt.com', '2024-04-19 13:53:36', 'EGRESO'),
(13, 'martinaballesteros@vxt.com', '2024-04-19 15:08:52', 'EGRESO'),
(14, 'martinsuarez@vxt.com', '2024-04-19 19:19:52', 'EGRESO'),
(15, 'rodrigobecerra@vxt.com', '2024-04-19 19:55:47', 'EGRESO'),
(16, '', '2024-04-22 13:44:55', 'EGRESO'),
(17, 'Gabriel', '2024-04-22 14:18:14', 'EGRESO'),
(18, '', '2024-04-22 14:42:46', 'EGRESO'),
(19, 'martinaballesteros@vxt.com', '2024-04-22 15:28:03', 'EGRESO'),
(20, 'rodrigobecerra@vxt.com', '2024-04-23 03:00:05', 'EGRESO'),
(21, 'rodrigobecerra@vxt.com', '2024-04-23 03:04:58', 'EGRESO'),
(22, 'rodrigobecerra@vxt.com', '2024-04-23 13:00:50', 'EGRESO'),
(23, 'martinaballesteros@vxt.com', '2024-04-23 13:09:21', 'EGRESO'),
(24, '', '2024-04-23 13:27:37', 'EGRESO'),
(25, 'renatabresuti@vxt.com', '2024-04-23 15:10:27', 'EGRESO'),
(26, 'renatabresuti@vxt.com', '2024-04-23 16:22:58', 'EGRESO'),
(27, '', '2024-04-23 17:46:21', 'EGRESO'),
(28, 'martinaballesteros@vxt.com', '2024-04-23 18:47:14', 'EGRESO'),
(29, 'mariaperez@vxt.com', '2024-04-23 18:57:48', 'EGRESO'),
(30, 'rodrigobecerra@vxt.com', '2024-04-23 21:44:27', 'EGRESO'),
(31, 'rodrigobecerra@vxt.com', '2024-04-23 23:08:46', 'EGRESO'),
(32, 'Sergio', '2024-04-23 23:08:51', 'EGRESO'),
(33, 'Sergio', '2024-04-23 23:14:03', 'EGRESO'),
(34, 'Sergio', '2024-04-23 23:14:48', 'EGRESO'),
(35, 'rodrigobecerra@vxt.com', '2024-04-23 23:16:32', 'EGRESO'),
(36, '', '2024-04-24 00:29:23', 'EGRESO'),
(37, 'martinsuarez@vxt.com', '2024-04-24 18:50:51', 'EGRESO'),
(38, 'rodrigobecerra@vxt.com', '2024-04-24 21:44:09', 'EGRESO'),
(39, '', '2024-04-25 13:16:24', 'EGRESO'),
(40, 'rodrigobecerra@vxt.com', '2024-04-25 14:58:17', 'EGRESO'),
(41, 'martinaballesteros@vxt.com', '2024-04-25 15:06:00', 'EGRESO'),
(42, 'rodrigobecerra@vxt.com', '2024-04-25 19:23:38', 'EGRESO'),
(43, 'martinsuarez@vxt.com', '2024-04-25 19:24:11', 'EGRESO'),
(44, 'Gabriel', '2024-04-25 19:32:14', 'EGRESO'),
(45, 'RODRIGO NAHUEL BECERRA', '2024-04-25 19:36:46', 'EGRESO'),
(46, 'RODRIGO NAHUEL BECERRA', '2024-04-25 19:37:51', 'EGRESO'),
(47, 'RODRIGO NAHUEL BECERRA', '2024-04-25 19:38:02', 'EGRESO'),
(48, 'RODRIGO NAHUEL BECERRA', '2024-04-25 19:38:23', 'EGRESO'),
(49, 'Gabriel', '2024-04-25 19:38:35', 'EGRESO'),
(50, 'martinsuarez@vxt.com', '2024-04-25 20:08:19', 'EGRESO'),
(51, 'martinsuarez@vxt.com', '2024-04-25 20:16:37', 'EGRESO'),
(52, 'martinaballesteros@vxt.com', '2024-04-25 20:17:19', 'EGRESO'),
(53, 'martinsuarez@vxt.com', '2024-04-25 20:20:27', 'EGRESO'),
(54, 'Gabriel', '2024-04-25 20:20:30', 'EGRESO'),
(55, '', '2024-04-25 20:20:50', 'EGRESO'),
(56, 'RODRIGO NAHUEL BECERRA', '2024-04-25 20:22:01', 'EGRESO'),
(57, '', '2024-04-26 00:50:10', 'EGRESO'),
(58, 'Gabriel', '2024-04-26 14:52:24', 'EGRESO'),
(59, 'martinaballesteros@vxt.com', '2024-04-26 15:02:58', 'EGRESO'),
(60, 'renatabresuti@vxt.com', '2024-04-26 18:05:51', 'EGRESO'),
(61, 'martinsuarez@vxt.com', '2024-04-26 19:06:14', 'EGRESO'),
(62, 'mariaperez@vxt.com', '2024-04-26 19:12:58', 'EGRESO'),
(63, 'RODRIGO NAHUEL BECERRA', '2024-04-26 19:33:23', 'EGRESO'),
(64, 'RODRIGO NAHUEL BECERRA', '2024-04-26 21:55:36', 'EGRESO'),
(65, 'martinaballesteros@vxt.com', '2024-04-27 01:44:44', 'EGRESO'),
(66, 'RODRIGO NAHUEL BECERRA', '2024-04-27 04:08:56', 'EGRESO'),
(67, 'RODRIGO NAHUEL BECERRA', '2024-04-27 08:48:54', 'EGRESO'),
(68, 'martinaballesteros@vxt.com', '2024-04-27 16:30:14', 'EGRESO'),
(69, 'RODRIGO NAHUEL BECERRA', '2024-04-27 20:25:49', 'EGRESO'),
(70, 'RODRIGO NAHUEL BECERRA', '2024-04-28 15:09:59', 'EGRESO'),
(71, 'RODRIGO NAHUEL BECERRA', '2024-04-29 00:07:07', 'EGRESO'),
(72, 'martinaballesteros@vxt.com', '2024-04-29 00:07:43', 'EGRESO'),
(73, 'martinaballesteros@vxt.com', '2024-04-29 00:21:31', 'EGRESO'),
(74, 'martinaballesteros@vxt.com', '2024-04-29 02:30:36', 'EGRESO'),
(75, 'RODRIGO NAHUEL BECERRA', '2024-04-29 02:30:39', 'EGRESO'),
(76, 'RODRIGO NAHUEL BECERRA', '2024-04-29 02:37:56', 'EGRESO'),
(77, 'RODRIGO NAHUEL BECERRA', '2024-04-29 14:06:21', 'EGRESO'),
(78, 'mariaperez@vxt.com', '2024-04-29 15:25:27', 'EGRESO'),
(79, 'Gabriel', '2024-04-29 15:41:01', 'EGRESO'),
(80, 'Gabriel', '2024-04-29 16:09:35', 'EGRESO'),
(81, 'Gabriel', '2024-04-29 16:30:27', 'EGRESO'),
(82, 'Gabriel', '2024-04-29 17:07:45', 'EGRESO'),
(83, 'martinaballesteros@vxt.com', '2024-04-29 17:10:59', 'EGRESO'),
(84, 'mariaperez@vxt.com', '2024-04-29 18:32:02', 'EGRESO'),
(85, 'Gabriel', '2024-04-30 03:19:21', 'EGRESO'),
(86, 'Renata Bresuti', '2024-04-30 03:21:10', 'EGRESO'),
(87, 'RODRIGO NAHUEL BECERRA', '2024-04-30 03:23:06', 'EGRESO'),
(88, 'renatabresuti@vxt.com', '2024-04-30 03:32:23', 'EGRESO'),
(89, 'Gabriel', '2024-04-30 12:16:51', 'EGRESO'),
(90, 'RODRIGO NAHUEL BECERRA', '2024-04-30 13:52:06', 'EGRESO'),
(91, 'Melisa Valdez', '2024-04-30 14:31:50', 'EGRESO'),
(92, 'mariaperez@vxt.com', '2024-04-30 19:07:48', 'EGRESO'),
(93, 'Gabriel', '2024-04-30 19:34:04', 'EGRESO'),
(94, 'Melisa Valdez', '2024-05-02 17:58:44', 'EGRESO'),
(95, 'mariaperez@vxt.com', '2024-05-02 18:44:37', 'EGRESO'),
(96, 'martinaballesteros@vxt.com', '2024-05-03 14:59:22', 'EGRESO'),
(97, 'Gabriel', '2024-05-03 15:00:07', 'EGRESO'),
(98, 'mariaperez@vxt.com', '2024-05-03 19:11:57', 'EGRESO'),
(99, 'martinsuarez@vxt.com', '2024-05-03 19:15:51', 'EGRESO'),
(100, 'Gabriel', '2024-05-03 19:17:01', 'EGRESO'),
(101, 'Gabriel', '2024-05-06 15:33:15', 'EGRESO'),
(102, 'martinaballesteros@vxt.com', '2024-05-06 16:04:16', 'EGRESO'),
(103, 'mariaperez@vxt.com', '2024-05-06 18:25:39', 'EGRESO'),
(104, 'mariaperez@vxt.com', '2024-05-06 18:52:48', 'EGRESO'),
(105, 'Gabriel', '2024-05-06 19:07:27', 'EGRESO'),
(106, 'martinsuarez@vxt.com', '2024-05-06 20:07:06', 'EGRESO'),
(107, 'Gabriel', '2024-05-07 00:15:41', 'EGRESO'),
(108, 'Gabriel', '2024-05-07 02:00:21', 'EGRESO'),
(109, 'martinaballesteros@vxt.com', '2024-05-07 02:04:23', 'EGRESO'),
(110, 'Gabriel', '2024-05-07 02:37:57', 'EGRESO'),
(111, 'Gabriel', '2024-05-07 16:07:55', 'EGRESO'),
(112, 'Gabriel', '2024-05-07 23:51:05', 'EGRESO'),
(113, 'Melisa Valdez', '2024-05-07 23:59:04', 'EGRESO'),
(114, 'Melisa Valdez', '2024-05-08 01:15:36', 'EGRESO'),
(115, 'Gabriel', '2024-05-08 01:16:54', 'EGRESO'),
(116, 'Melisa Valdez', '2024-05-08 01:20:57', 'EGRESO'),
(117, 'Gabriel', '2024-05-08 01:54:35', 'EGRESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialingresos`
--

CREATE TABLE `historialingresos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialingresos`
--

INSERT INTO `historialingresos` (`id`, `cliente`, `fecha`, `estado`) VALUES
(7, 'rodrigobecerra@vxt.com', '2024-04-16 14:31:00', 'INGRESO'),
(8, 'martinaballesteros@vxt.com', '2024-04-16 14:56:53', 'INGRESO'),
(9, 'Gabriel', '2024-04-16 15:05:42', 'INGRESO'),
(10, 'renatabresuti@vxt.com ', '2024-04-16 15:10:00', 'INGRESO'),
(12, 'renatabresuti@vxt.com', '2024-04-17 13:10:45', 'INGRESO'),
(13, 'martinaballesteros@vxt.com', '2024-04-17 13:12:13', 'INGRESO'),
(14, 'Gabriel', '2024-04-17 13:15:45', 'INGRESO'),
(15, 'martinsuarez@vxt.com', '2024-04-17 13:39:41', 'INGRESO'),
(16, 'mariaperez@vxt.com', '2024-04-17 13:40:02', 'INGRESO'),
(17, 'martinsuarez@vxt.com', '2024-04-17 13:40:13', 'INGRESO'),
(20, 'aixaperoyan@vxt.com', '2024-04-17 14:03:36', 'INGRESO'),
(21, 'aixaperoyan@vxt.com', '2024-04-17 14:04:50', 'INGRESO'),
(22, 'martinaballesteros@vxt.com', '2024-04-17 16:37:18', 'INGRESO'),
(23, 'mariaperez@vxt.com', '2024-04-17 16:39:21', 'INGRESO'),
(24, 'martinaballesteros@vxt.com', '2024-04-17 16:49:09', 'INGRESO'),
(25, 'martinsuarez@vxt.com', '2024-04-17 16:57:02', 'INGRESO'),
(26, 'mariaperez@vxt.com', '2024-04-17 16:57:02', 'INGRESO'),
(27, 'renatabresuti@vxt.com', '2024-04-17 18:40:56', 'INGRESO'),
(28, 'rodrigobecerra@vxt.com', '2024-04-18 12:31:30', 'INGRESO'),
(29, 'aixaperoyan@vxt.com', '2024-04-18 13:08:20', 'INGRESO'),
(30, 'aixaperoyan@vxt.com', '2024-04-18 13:09:11', 'INGRESO'),
(31, 'martinaballesteros@vxt.com', '2024-04-18 13:09:18', 'INGRESO'),
(32, 'mariaperez@vxt.com', '2024-04-18 13:09:42', 'INGRESO'),
(33, 'renatabresuti@vxt.com', '2024-04-18 13:11:56', 'INGRESO'),
(35, 'renataberuti@vxt.com', '2024-04-18 13:22:40', 'INGRESO'),
(36, 'renatabresuti@vxt.com', '2024-04-18 13:23:59', 'INGRESO'),
(37, 'mariaperez@vxt.com', '2024-04-18 14:12:03', 'INGRESO'),
(38, 'rodrigobecerra@vxt.com', '2024-04-18 14:13:09', 'INGRESO'),
(39, 'rodrigobecerra@vxt.com', '2024-04-18 14:14:02', 'INGRESO'),
(40, 'martinaballesteros@vxt.com', '2024-04-18 14:15:06', 'INGRESO'),
(41, 'martinsuarez@vxt.com', '2024-04-18 16:39:16', 'INGRESO'),
(42, 'Gabriel', '2024-04-18 18:26:32', 'INGRESO'),
(43, 'rodrigobecerra@vxt.com', '2024-04-19 12:10:51', 'INGRESO'),
(44, 'martinaballesteros@vxt.com', '2024-04-19 12:50:04', 'INGRESO'),
(45, 'rodrigobecerra@vxt.com', '2024-04-19 12:52:34', 'INGRESO'),
(46, 'renatabresuti@vxt.com', '2024-04-19 13:02:50', 'INGRESO'),
(47, 'aixaperoyan@vxt.com', '2024-04-19 13:06:03', 'INGRESO'),
(48, 'mariaperez@vxt.com', '2024-04-19 13:15:15', 'INGRESO'),
(49, 'martinsuarez@vxt.com', '2024-04-19 13:22:53', 'INGRESO'),
(50, 'aixaperoyan@vxt.com', '2024-04-19 13:25:05', 'INGRESO'),
(51, 'martinaballesteros@vxt.com', '2024-04-19 13:51:54', 'INGRESO'),
(52, 'rodrigobecerra@vxt.com', '2024-04-19 13:53:46', 'INGRESO'),
(53, 'martinaballesteros@vxt.com', '2024-04-19 14:42:57', 'INGRESO'),
(54, 'martinaballesteros@vxt.com', '2024-04-19 15:04:59', 'INGRESO'),
(55, 'martinaballesteros@vxt.com', '2024-04-22 13:11:17', 'INGRESO'),
(56, 'renatabresuti@vxt.com', '2024-04-22 13:12:21', 'INGRESO'),
(57, 'mariaperez@vxt.com', '2024-04-22 13:16:46', 'INGRESO'),
(58, 'rodrigobecerra@vxt.com', '2024-04-22 13:44:58', 'INGRESO'),
(59, 'Gabriel', '2024-04-22 14:17:58', 'INGRESO'),
(60, 'martinaballesteros@vxt.com', '2024-04-22 14:18:23', 'INGRESO'),
(61, 'renatabresuti@vxt.com', '2024-04-22 14:42:51', 'INGRESO'),
(62, 'renatabresuti@vxt.com', '2024-04-22 15:40:22', 'INGRESO'),
(63, 'rodrigobecerra@vxt.com', '2024-04-23 02:57:19', 'INGRESO'),
(64, 'rodrigobecerra@vxt.com', '2024-04-23 03:03:23', 'INGRESO'),
(65, 'rodrigobecerra@vxt.com', '2024-04-23 12:13:09', 'INGRESO'),
(66, 'rodrigobecerra@vxt.com', '2024-04-23 12:35:23', 'INGRESO'),
(67, 'martinaballesteros@vxt.com', '2024-04-23 12:39:24', 'INGRESO'),
(68, 'renatabresuti@vxt.com', '2024-04-23 12:49:35', 'INGRESO'),
(69, 'rodrigobecerra@vxt.com', '2024-04-23 13:00:02', 'INGRESO'),
(70, 'renatabresuti@vxt.com', '2024-04-23 13:05:43', 'INGRESO'),
(71, 'martinaballesteros@vxt.com', '2024-04-23 13:11:32', 'INGRESO'),
(72, 'martinsuarez@vxt.com', '2024-04-23 13:17:46', 'INGRESO'),
(73, 'mariaperez@vxt.com', '2024-04-23 13:27:40', 'INGRESO'),
(75, 'renetabresuti@vxt.com', '2024-04-23 14:47:56', 'INGRESO'),
(76, 'renataberuti@vxt.com', '2024-04-23 14:48:10', 'INGRESO'),
(77, 'renatabresuti@vxt.com', '2024-04-23 14:48:36', 'INGRESO'),
(78, 'renatabresuti@vxt.com', '2024-04-23 14:49:31', 'INGRESO'),
(79, 'martinaballesteros@vxt.com', '2024-04-23 15:22:16', 'INGRESO'),
(80, 'rodrigobecerra@vxt.com', '2024-04-23 17:06:42', 'INGRESO'),
(81, 'rodrigobecerra@vxt.com', '2024-04-23 17:46:26', 'INGRESO'),
(82, 'rodrigobecerra@vxt.com', '2024-04-23 18:21:48', 'INGRESO'),
(83, 'renataberuti@vxt.com', '2024-04-23 18:47:28', 'INGRESO'),
(84, 'renatabersuti@vxt.com', '2024-04-23 18:47:42', 'INGRESO'),
(85, 'renatabresuti@vxt.com', '2024-04-23 18:47:58', 'INGRESO'),
(86, 'renatabresuti@vxt.com', '2024-04-23 18:49:12', 'INGRESO'),
(87, 'Martinaballesteros@vxt.com', '2024-04-23 19:01:17', 'INGRESO'),
(88, 'rodrigobecerra@vxt.com', '2024-04-23 20:39:49', 'INGRESO'),
(89, 'rodrigobecerra@vxt.com', '2024-04-23 21:44:32', 'INGRESO'),
(90, 'Sergio', '2024-04-23 23:01:48', 'INGRESO'),
(91, 'rodrigobecerra@vxt.com', '2024-04-23 23:02:39', 'INGRESO'),
(92, 'Sergio', '2024-04-23 23:11:47', 'INGRESO'),
(93, 'Sergio', '2024-04-23 23:14:18', 'INGRESO'),
(94, 'Sergio', '2024-04-23 23:14:33', 'INGRESO'),
(95, 'rodrigobecerra@vxt.com', '2024-04-23 23:15:59', 'INGRESO'),
(96, 'rodrigobecerra@vxt.com', '2024-04-24 00:29:33', 'INGRESO'),
(97, 'Sergio', '2024-04-24 01:10:03', 'INGRESO'),
(98, 'rodrigobecerra@vxt.com', '2024-04-24 12:49:41', 'INGRESO'),
(99, 'martinsuarez@vxt.com', '2024-04-24 13:10:39', 'INGRESO'),
(100, 'renatabresuti@vxt.com', '2024-04-24 13:21:29', 'INGRESO'),
(101, 'martinaballesteros@vxt.com', '2024-04-24 13:28:14', 'INGRESO'),
(102, 'Gabriel', '2024-04-24 21:36:31', 'INGRESO'),
(103, 'gabriel', '2024-04-24 21:36:41', 'INGRESO'),
(104, 'rodrigobecerra@vxt.com', '2024-04-24 21:37:14', 'INGRESO'),
(105, 'martinsuarez@vxt.com', '2024-04-25 13:06:45', 'INGRESO'),
(106, 'renatabresuti@vxt.com', '2024-04-25 13:10:47', 'INGRESO'),
(107, 'rodrigobecerra@vxt.com', '2024-04-25 13:16:26', 'INGRESO'),
(108, 'martinaballesteros@vxt.com', '2024-04-25 13:31:02', 'INGRESO'),
(109, 'rodrigobecerra@vxt.com', '2024-04-25 13:48:23', 'INGRESO'),
(110, 'martinaballesteros@vxt.com', '2024-04-25 14:58:30', 'INGRESO'),
(111, 'rodrigobecerra@vxt.com', '2024-04-25 15:06:10', 'INGRESO'),
(112, 'rodrigobecerra@vxt.com', '2024-04-25 15:58:44', 'INGRESO'),
(113, 'martinaballesteros@vxt.com', '2024-04-25 16:04:36', 'INGRESO'),
(114, 'martinsuarez@vxt.com', '2024-04-25 19:23:43', 'INGRESO'),
(115, 'rodrigobecerra@vxt.com', '2024-04-25 19:31:26', 'INGRESO'),
(116, 'rodrigobecerra@vxt.com', '2024-04-25 19:31:45', 'INGRESO'),
(117, 'Gabriel', '2024-04-25 19:31:54', 'INGRESO'),
(118, 'rodrigobecerra@vxt.com', '2024-04-25 19:32:19', 'INGRESO'),
(119, 'rodrigobecerra@vxt.com', '2024-04-25 19:32:36', 'INGRESO'),
(120, 'Gabriel', '2024-04-25 19:32:43', 'INGRESO'),
(121, 'rodrigobecerra@vxt.com', '2024-04-25 19:34:04', 'INGRESO'),
(122, 'rodrigobecerra@vxt.com', '2024-04-25 19:35:04', 'INGRESO'),
(123, 'RODRIGO NAHUEL BECERRA', '2024-04-25 19:35:27', 'INGRESO'),
(124, 'rodrigobecerra@vxt.com', '2024-04-25 19:36:56', 'INGRESO'),
(125, 'RODRIGO NAHUEL BECERRA', '2024-04-25 19:37:58', 'INGRESO'),
(126, 'rodrigobecerra@vxt.com', '2024-04-25 19:38:08', 'INGRESO'),
(127, 'rodrigobecerra@vxt.com', '2024-04-25 19:38:15', 'INGRESO'),
(128, 'Gabriel', '2024-04-25 19:47:11', 'INGRESO'),
(129, 'martinsuarez@vxt.com', '2024-04-25 20:14:27', 'INGRESO'),
(130, 'martinaballesteros@vxt.com', '2024-04-25 20:16:48', 'INGRESO'),
(131, 'martinsuarez@vxt.com', '2024-04-25 20:18:39', 'INGRESO'),
(132, 'rodrigobecerra@vxt.com', '2024-04-25 20:21:02', 'INGRESO'),
(133, 'rodrigobecerra@vxt.com', '2024-04-25 21:25:34', 'INGRESO'),
(134, 'rodrigobecerra@vxt.com', '2024-04-26 00:50:14', 'INGRESO'),
(135, 'renatabresuti@vxt.com', '2024-04-26 13:05:04', 'INGRESO'),
(136, 'mariaperez@vxt.com', '2024-04-26 13:16:30', 'INGRESO'),
(137, 'martinsuarez@vxt.com', '2024-04-26 13:36:59', 'INGRESO'),
(138, 'martinaballesteros@vxt.com', '2024-04-26 13:43:11', 'INGRESO'),
(139, 'renatabresuti@vxt.com', '2024-04-26 14:26:23', 'INGRESO'),
(140, 'martinaballesteros@vxt.com', '2024-04-26 14:37:31', 'INGRESO'),
(141, 'gabriel', '2024-04-26 14:48:09', 'INGRESO'),
(142, 'martinaballesteros@vxt.com', '2024-04-26 14:52:41', 'INGRESO'),
(143, 'martinaballesteros@vxt.com', '2024-04-26 15:03:59', 'INGRESO'),
(144, 'rodrigobecerra@vxt.com', '2024-04-26 17:04:53', 'INGRESO'),
(145, 'martinsuarez@vxt.com', '2024-04-26 18:32:58', 'INGRESO'),
(146, 'rodrigobecerra@vxt.com', '2024-04-26 19:31:22', 'INGRESO'),
(147, 'rodrigobecerra@vxt.com', '2024-04-26 21:10:59', 'INGRESO'),
(148, 'rodrigobecerra@vxt.com', '2024-04-26 21:54:29', 'INGRESO'),
(149, 'martinaballesteros@vxt.com', '2024-04-27 01:38:57', 'INGRESO'),
(150, 'rodrigobecerra@vxt.com', '2024-04-27 03:36:18', 'INGRESO'),
(151, 'rodrigobecerra@vxt.com', '2024-04-27 08:47:18', 'INGRESO'),
(152, 'rodrigobecerra@vxt.com', '2024-04-27 08:48:10', 'INGRESO'),
(153, 'rodrigobecerra@vxt.com', '2024-04-27 15:06:56', 'INGRESO'),
(154, 'martinaballesteros@vxt.com', '2024-04-27 15:42:26', 'INGRESO'),
(155, 'rodrigobecerra@vxt.com', '2024-04-27 16:30:23', 'INGRESO'),
(156, 'rodrigobecerra@vxt.com', '2024-04-27 20:24:43', 'INGRESO'),
(157, 'rodrigobecerra@vxt.com', '2024-04-27 21:41:58', 'INGRESO'),
(158, 'rodrigobecerra@vxt.com', '2024-04-28 15:09:24', 'INGRESO'),
(159, 'rodrigobecerra@vxt.com', '2024-04-28 23:46:32', 'INGRESO'),
(160, 'martinaballesteros@vxt.com', '2024-04-29 00:07:17', 'INGRESO'),
(161, 'rodrigobecerra@vxt.com', '2024-04-29 00:07:52', 'INGRESO'),
(162, 'martinaballesteros@vxt.com', '2024-04-29 00:12:24', 'INGRESO'),
(163, 'martinaballesteros@vxt.com', '2024-04-29 01:34:09', 'INGRESO'),
(164, 'rodrigobecerra@vxt.com', '2024-04-29 02:31:40', 'INGRESO'),
(165, 'rodrigobecerra@vxt.com', '2024-04-29 13:04:37', 'INGRESO'),
(166, 'renatabresuti@vxt.com', '2024-04-29 13:05:48', 'INGRESO'),
(167, 'martinsuarez@vxt.com', '2024-04-29 13:06:15', 'INGRESO'),
(168, 'martinaballesteros@vxt.com', '2024-04-29 13:31:28', 'INGRESO'),
(169, 'martinsuarez@vxt.com', '2024-04-29 13:40:15', 'INGRESO'),
(170, 'rodrigobecerra@vxt.com', '2024-04-29 14:05:36', 'INGRESO'),
(171, 'mariaperez@vxt.com', '2024-04-29 14:06:09', 'INGRESO'),
(172, 'rodrigobecerra@vxt.com', '2024-04-29 14:16:39', 'INGRESO'),
(173, 'mariaperez@vxt.com', '2024-04-29 14:48:59', 'INGRESO'),
(174, 'martinaballesteros@vxt.com', '2024-04-29 15:20:54', 'INGRESO'),
(175, 'mariaperez@vxt.com', '2024-04-29 15:24:20', 'INGRESO'),
(176, 'Gabriel', '2024-04-29 15:35:03', 'INGRESO'),
(177, 'martinaballesteros@vxt.com', '2024-04-29 15:58:44', 'INGRESO'),
(178, 'Gabriel', '2024-04-29 16:08:33', 'INGRESO'),
(179, 'rodrigobecerra@vxt.com', '2024-04-29 16:22:06', 'INGRESO'),
(180, 'Gabriel', '2024-04-29 16:26:45', 'INGRESO'),
(181, 'Gabriel', '2024-04-29 16:30:32', 'INGRESO'),
(182, 'Gabriel', '2024-04-29 16:33:29', 'INGRESO'),
(183, 'martinsuarez@vxt.com', '2024-04-29 16:33:49', 'INGRESO'),
(184, 'martinaballesteros@vxt.com', '2024-04-29 17:07:56', 'INGRESO'),
(185, 'Gabriel', '2024-04-29 17:11:04', 'INGRESO'),
(186, 'mariaperez@vxt.com', '2024-04-29 17:22:44', 'INGRESO'),
(187, 'martinaballesteros@vxt.com', '2024-04-29 17:24:33', 'INGRESO'),
(188, 'martinsuarez@vxt.com', '2024-04-29 17:52:21', 'INGRESO'),
(189, 'mariaperez@vxt.com', '2024-04-29 18:23:25', 'INGRESO'),
(190, 'martinaballesteros@vxt.com', '2024-04-29 18:33:40', 'INGRESO'),
(191, 'Gabriel', '2024-04-29 18:41:10', 'INGRESO'),
(192, 'rodrigobecerra@vxt.com', '2024-04-29 19:23:51', 'INGRESO'),
(193, 'Gabriel', '2024-04-29 20:42:52', 'INGRESO'),
(194, 'Gabriel', '2024-04-29 22:51:53', 'INGRESO'),
(195, 'Gabriel', '2024-04-30 01:48:04', 'INGRESO'),
(196, 'rodrigobecerra@vxt.com', '2024-04-30 02:19:14', 'INGRESO'),
(197, 'Gabriel', '2024-04-30 02:57:38', 'INGRESO'),
(198, 'rodrigobecerra@vxt.com', '2024-04-30 02:58:37', 'INGRESO'),
(200, 'renatabresuti@vxt.com', '2024-04-30 03:21:23', 'INGRESO'),
(201, 'renatabresuti@vxt.com', '2024-04-30 03:23:15', 'INGRESO'),
(202, 'rodrigobecerra@vxt.com', '2024-04-30 03:32:25', 'INGRESO'),
(203, 'Gabriel', '2024-04-30 12:14:01', 'INGRESO'),
(204, 'renatabresuti@vxt.com', '2024-04-30 13:08:45', 'INGRESO'),
(205, 'mariaperez@vxt.com', '2024-04-30 13:11:18', 'INGRESO'),
(206, 'martinaballesteros@vxt.com', '2024-04-30 13:14:02', 'INGRESO'),
(207, 'Sergio', '2024-04-30 13:44:54', 'INGRESO'),
(208, 'rodrigobecerra@vxt.com', '2024-04-30 13:50:08', 'INGRESO'),
(209, 'melisavaldez@vxt.com', '2024-04-30 13:52:12', 'INGRESO'),
(210, 'renatabresuti@vxt.com', '2024-04-30 14:00:16', 'INGRESO'),
(211, 'mariaperez@vxt.com', '2024-04-30 14:01:31', 'INGRESO'),
(212, 'Gabriel', '2024-04-30 14:15:38', 'INGRESO'),
(213, 'mariaperez@vxt.com', '2024-04-30 14:39:18', 'INGRESO'),
(214, 'rodrigobecerra@vxt.com', '2024-04-30 15:01:57', 'INGRESO'),
(215, 'mariaperez@vxt.com', '2024-04-30 15:29:42', 'INGRESO'),
(216, 'martinaballesteros@vxt.com', '2024-04-30 15:41:25', 'INGRESO'),
(217, 'rodrigobecerra@vxt.com', '2024-04-30 16:05:36', 'INGRESO'),
(218, 'mariaperez@vxt.com', '2024-04-30 16:21:02', 'INGRESO'),
(219, 'martinaballesteros@vxt.com', '2024-04-30 16:54:31', 'INGRESO'),
(220, 'renatabresuti@vxt.com', '2024-04-30 16:55:51', 'INGRESO'),
(221, 'mariaperez@vxt.com', '2024-04-30 17:10:27', 'INGRESO'),
(222, 'rodrigobecerra@vxt.com', '2024-04-30 17:42:14', 'INGRESO'),
(223, 'martinaballesteros@vxt.com', '2024-04-30 18:02:28', 'INGRESO'),
(224, 'Gabriel', '2024-04-30 19:32:47', 'INGRESO'),
(225, 'rodrigobecerra@vxt.com', '2024-05-02 12:30:42', 'INGRESO'),
(226, 'renatabresuti@vxt.com', '2024-05-02 13:06:33', 'INGRESO'),
(227, 'rodrigobecerra@vxt.com', '2024-05-02 13:10:53', 'INGRESO'),
(228, 'martinaballesteros@vxt.com', '2024-05-02 13:21:01', 'INGRESO'),
(229, 'martinsuarez@vxt.com', '2024-05-02 13:21:47', 'INGRESO'),
(230, 'martinaballesteros@vxt.com', '2024-05-02 13:54:51', 'INGRESO'),
(231, 'rodrigobecerra@vxt.com', '2024-05-02 13:56:24', 'INGRESO'),
(232, 'renatabresuti@vxt.com', '2024-05-02 13:58:37', 'INGRESO'),
(233, 'mariaperez@vxt.com', '2024-05-02 13:59:19', 'INGRESO'),
(234, 'Gabriel', '2024-05-02 14:05:48', 'INGRESO'),
(235, 'mariaperez@vxt.com', '2024-05-02 14:46:45', 'INGRESO'),
(236, 'martinaballesteros@vxt.com', '2024-05-02 15:09:26', 'INGRESO'),
(237, 'renatabresuti@vxt.com', '2024-05-02 15:11:41', 'INGRESO'),
(238, 'Gabriel', '2024-05-02 15:22:29', 'INGRESO'),
(239, 'martinsuarez@vxt.com', '2024-05-02 15:23:43', 'INGRESO'),
(240, 'mariaperez@vxt.com', '2024-05-02 15:42:46', 'INGRESO'),
(241, 'martinaballesteros@vxt.com', '2024-05-02 15:50:12', 'INGRESO'),
(242, 'rodrigobecerra@vxt.com', '2024-05-02 16:18:58', 'INGRESO'),
(243, 'mariaperez@vxt.com', '2024-05-02 16:35:44', 'INGRESO'),
(244, 'martinsuarez@vxt.com', '2024-05-02 16:39:59', 'INGRESO'),
(245, 'martinaballesteros@vxt.com', '2024-05-02 16:41:08', 'INGRESO'),
(246, 'Gabriel', '2024-05-02 17:21:58', 'INGRESO'),
(247, 'rodrigobecerra@vxt.com', '2024-05-02 17:27:10', 'INGRESO'),
(248, 'martinaballesteros@vxt.com', '2024-05-02 17:28:50', 'INGRESO'),
(249, 'martinsuarez@vxt.com', '2024-05-02 17:38:39', 'INGRESO'),
(250, 'mariaperez@vxt.com', '2024-05-02 17:52:11', 'INGRESO'),
(251, 'renatabresuti@vxt.com', '2024-05-02 17:55:59', 'INGRESO'),
(252, 'melisavaldez@vxt.com', '2024-05-02 17:58:34', 'INGRESO'),
(253, 'melisavaldez@vxt.com', '2024-05-02 18:03:35', 'INGRESO'),
(254, 'martinsuarez@vxt.com', '2024-05-02 18:23:19', 'INGRESO'),
(255, 'martinsuarez@vxt.com', '2024-05-02 18:23:27', 'INGRESO'),
(256, 'mariaperez@vxt.com', '2024-05-02 18:37:58', 'INGRESO'),
(257, 'melisavaldez@vxt.com', '2024-05-02 18:40:55', 'INGRESO'),
(258, 'rodrigobecerra@vxt.com', '2024-05-02 19:32:39', 'INGRESO'),
(259, 'melisavaldez@vxt.com', '2024-05-02 22:27:47', 'INGRESO'),
(260, 'melisavaldez@vxt.com', '2024-05-02 22:58:39', 'INGRESO'),
(261, 'Sergio', '2024-05-02 23:13:59', 'INGRESO'),
(262, 'Sergio', '2024-05-02 23:15:18', 'INGRESO'),
(263, 'Gabriel', '2024-05-02 23:29:07', 'INGRESO'),
(264, 'rodrigobecerra@vxt.com', '2024-05-03 11:51:53', 'INGRESO'),
(265, 'melisavaldez@vxt.com', '2024-05-03 12:45:17', 'INGRESO'),
(266, 'martinsuarez@vxt.com', '2024-05-03 13:14:18', 'INGRESO'),
(267, 'martinaballesteros@vxt.com', '2024-05-03 13:19:44', 'INGRESO'),
(268, 'renatabresuti@vxt.com', '2024-05-03 13:19:55', 'INGRESO'),
(269, 'renatabresuti@vxt.com', '2024-05-03 13:22:49', 'INGRESO'),
(270, 'mariaperez@vxt.com', '2024-05-03 13:26:24', 'INGRESO'),
(271, 'rodrigobecerra@vxt.com', '2024-05-03 13:30:15', 'INGRESO'),
(272, 'renatabresuti@vxt.com', '2024-05-03 13:36:45', 'INGRESO'),
(273, 'melisavaldez@vxt.com', '2024-05-03 13:42:23', 'INGRESO'),
(274, 'martinsuarez@vxt.com', '2024-05-03 13:44:36', 'INGRESO'),
(275, 'martinaballesteros@vxt.com', '2024-05-03 13:56:23', 'INGRESO'),
(276, 'martinaballesteros@vxt.com', '2024-05-03 14:27:45', 'INGRESO'),
(277, 'renatabresuti@vxt.com', '2024-05-03 14:55:58', 'INGRESO'),
(278, 'Gabriel', '2024-05-03 14:59:38', 'INGRESO'),
(279, 'martinaballesteros@vxt.com', '2024-05-03 15:00:09', 'INGRESO'),
(280, 'melisavaldez@vxt.com', '2024-05-03 15:08:32', 'INGRESO'),
(281, 'martinsuarez@vxt.com', '2024-05-03 15:13:46', 'INGRESO'),
(282, 'rodrigobecerra@vxt.com', '2024-05-03 15:24:45', 'INGRESO'),
(283, 'martinaballesteros@vxt.com', '2024-05-03 16:40:15', 'INGRESO'),
(284, 'martinsuarez@vxt.com', '2024-05-03 16:41:52', 'INGRESO'),
(285, 'renatabresuti@vxt.com', '2024-05-03 16:41:52', 'INGRESO'),
(286, 'renatabresuti@vxt.com', '2024-05-03 16:41:52', 'INGRESO'),
(287, 'mariaperez@vxt.com', '2024-05-03 16:45:29', 'INGRESO'),
(288, 'rodrigobecerra@vxt.com', '2024-05-03 16:56:28', 'INGRESO'),
(289, 'melisavaldez@vxt.com', '2024-05-03 17:22:33', 'INGRESO'),
(290, 'martinsuarez@vxt.com', '2024-05-03 17:34:19', 'INGRESO'),
(291, 'martinsuarez@vxt.com', '2024-05-03 18:13:08', 'INGRESO'),
(292, 'martinaballesteros@vxt.com', '2024-05-03 18:21:33', 'INGRESO'),
(293, 'melisavaldez@vxt.com', '2024-05-03 18:41:10', 'INGRESO'),
(294, 'mariaperez@vxt.com', '2024-05-03 18:45:26', 'INGRESO'),
(295, 'Gabriel', '2024-05-03 18:50:25', 'INGRESO'),
(296, 'Gabriel', '2024-05-03 19:12:28', 'INGRESO'),
(297, 'melisavaldez@vxt.com', '2024-05-06 12:51:14', 'INGRESO'),
(298, 'martinaballesteros@vxt.com', '2024-05-06 12:55:16', 'INGRESO'),
(299, 'mariaperez@vxt.com', '2024-05-06 13:00:42', 'INGRESO'),
(300, 'renatabresuti@vxt.com', '2024-05-06 13:04:14', 'INGRESO'),
(301, 'martinsuarez@vxt.com', '2024-05-06 13:05:13', 'INGRESO'),
(302, 'rodrigobecerra@vxt.com', '2024-05-06 13:27:10', 'INGRESO'),
(303, 'melisavaldez@vxt.com', '2024-05-06 13:38:03', 'INGRESO'),
(304, 'renatabresuti@vxt.com', '2024-05-06 13:53:36', 'INGRESO'),
(305, 'martinsuarez@vxt.com', '2024-05-06 14:14:18', 'INGRESO'),
(306, 'melisavaldez@vxt.com', '2024-05-06 14:18:14', 'INGRESO'),
(307, 'martinsuarez@vxt.com', '2024-05-06 14:48:39', 'INGRESO'),
(308, 'rodrigobecerra@vxt.com', '2024-05-06 14:50:22', 'INGRESO'),
(309, 'martinaballesteros@vxt.com', '2024-05-06 14:53:49', 'INGRESO'),
(310, 'Gabriel', '2024-05-06 15:29:23', 'INGRESO'),
(311, 'martinaballesteros@vxt.com', '2024-05-06 15:33:27', 'INGRESO'),
(312, 'Gabriel', '2024-05-06 16:04:23', 'INGRESO'),
(313, 'martinsuarez@vxt.com', '2024-05-06 16:42:31', 'INGRESO'),
(314, 'rodrigobecerra@vxt.com', '2024-05-06 16:45:35', 'INGRESO'),
(315, 'rodrigobecerra@vxt.com', '2024-05-06 18:07:47', 'INGRESO'),
(316, 'mariaperez@vxt.com', '2024-05-06 18:24:40', 'INGRESO'),
(317, 'Gabriel', '2024-05-06 19:01:27', 'INGRESO'),
(318, 'martinsuarez@vxt.com', '2024-05-06 19:58:05', 'INGRESO'),
(319, 'martinsuarez@vxt.com', '2024-05-06 20:00:40', 'INGRESO'),
(320, 'melisavaldez@vxt.com', '2024-05-06 20:50:38', 'INGRESO'),
(322, 'Gabriel', '2024-05-06 22:01:41', 'INGRESO'),
(323, 'rodrigobecerra@vxt.com', '2024-05-06 22:02:05', 'INGRESO'),
(324, 'Gabriel', '2024-05-07 00:04:35', 'INGRESO'),
(325, 'rodrigobecerra@vxt.com', '2024-05-07 00:22:09', 'INGRESO'),
(326, 'Gabriel', '2024-05-07 01:01:18', 'INGRESO'),
(327, 'Gabriel', '2024-05-07 01:54:37', 'INGRESO'),
(328, 'martinaballesteros@vxt.com', '2024-05-07 02:00:38', 'INGRESO'),
(329, 'Gabriel', '2024-05-07 02:04:28', 'INGRESO'),
(330, 'Gabriel', '2024-05-07 02:35:27', 'INGRESO'),
(331, 'rodrigobecerra@vxt.com', '2024-05-07 12:23:16', 'INGRESO'),
(332, 'melisavaldez@vxt.com', '2024-05-07 12:52:11', 'INGRESO'),
(333, 'renatabresuti@vxt.com', '2024-05-07 13:06:14', 'INGRESO'),
(334, 'rodrigobecerra@vxt.com', '2024-05-07 13:09:49', 'INGRESO'),
(335, 'mariaperez@vxt.com', '2024-05-07 13:12:16', 'INGRESO'),
(336, 'martinsuarez@vxt.com', '2024-05-07 13:15:37', 'INGRESO'),
(337, 'rodrigobecerra@vxt.com', '2024-05-07 13:31:40', 'INGRESO'),
(338, 'melisavaldez@vxt.com', '2024-05-07 14:12:46', 'INGRESO'),
(339, 'rodrigobecerra@vxt.com', '2024-05-07 14:15:28', 'INGRESO'),
(340, 'martinsuarez@vxt.com', '2024-05-07 15:03:53', 'INGRESO'),
(341, 'mariaperez@vxt.com', '2024-05-07 15:04:49', 'INGRESO'),
(342, 'renatabresuti@vxt.com', '2024-05-07 15:52:44', 'INGRESO'),
(343, 'rodrigobecerra@vxt.com', '2024-05-07 15:53:17', 'INGRESO'),
(344, 'Gabriel', '2024-05-07 16:06:15', 'INGRESO'),
(345, 'Gabriel', '2024-05-07 16:34:31', 'INGRESO'),
(346, 'martinsuarez@vxt.com', '2024-05-07 16:54:06', 'INGRESO'),
(347, 'rodrigobecerra@vxt.com', '2024-05-07 17:24:06', 'INGRESO'),
(348, 'Gabriel', '2024-05-07 17:27:02', 'INGRESO'),
(349, 'martinsuarez@vxt.com', '2024-05-07 17:35:11', 'INGRESO'),
(350, 'melisavaldez@vxt.com', '2024-05-07 18:23:45', 'INGRESO'),
(351, 'renatabresuti@vxt.com', '2024-05-07 18:28:04', 'INGRESO'),
(352, 'melisavaldez@vxt.com', '2024-05-07 18:55:14', 'INGRESO'),
(353, 'melisavaldez@vxt.com', '2024-05-07 22:48:32', 'INGRESO'),
(354, 'melisavaldez@vxt.com', '2024-05-07 23:22:19', 'INGRESO'),
(355, 'melisavaldez@vxt.com', '2024-05-07 23:35:15', 'INGRESO'),
(356, 'Gabriel', '2024-05-07 23:42:14', 'INGRESO'),
(357, 'Melisa Valdez', '2024-05-07 23:51:12', 'INGRESO'),
(358, 'Gabriel', '2024-05-07 23:54:02', 'INGRESO'),
(359, 'Gabriel', '2024-05-07 23:59:08', 'INGRESO'),
(360, 'Melisa Valdez', '2024-05-08 00:03:48', 'INGRESO'),
(361, 'Melisa Valdez', '2024-05-08 01:07:33', 'INGRESO'),
(362, 'Melisa Valdez', '2024-05-08 01:11:46', 'INGRESO'),
(363, 'Gabriel', '2024-05-08 01:15:42', 'INGRESO'),
(364, 'Melisa Valdez', '2024-05-08 01:17:02', 'INGRESO'),
(365, 'Gabriel', '2024-05-08 01:21:02', 'INGRESO'),
(366, 'Gabriel', '2024-05-08 10:43:42', 'INGRESO'),
(367, 'Gabriel', '2024-05-08 10:56:40', 'INGRESO'),
(368, 'Gabriel', '2024-05-08 10:57:08', 'INGRESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `cliente`, `fecha`, `estado`) VALUES
(7, 'Melisa Valdez', '2024-05-08 12:18:23', 'INGRESO'),
(8, 'martinsuarez@vxt.com', '2024-05-08 12:48:02', 'INGRESO'),
(9, 'renatabresuti@vxt.com', '2024-05-08 12:49:55', 'INGRESO'),
(10, 'mariaperez@vxt.com', '2024-05-08 14:00:34', 'INGRESO'),
(11, 'Melisa Valdez', '2024-05-09 12:25:51', 'INGRESO'),
(12, 'mariaperez@vxt.com', '2024-05-09 12:43:43', 'INGRESO'),
(13, 'renatabresuti@vxt.com', '2024-05-09 12:46:31', 'INGRESO'),
(14, 'renatabresuti@vxt.com', '2024-05-24 12:51:27', 'INGRESO'),
(15, 'renatabresuti@vxt.com', '2024-05-24 12:51:27', 'INGRESO'),
(16, 'Melisa Valdez', '2024-05-24 12:52:39', 'INGRESO'),
(17, 'Luis Salgado', '2024-05-24 12:57:43', 'INGRESO'),
(18, 'Luis Salgado', '2024-05-24 12:57:43', 'INGRESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto` varchar(250) NOT NULL,
  `tipo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto`, `tipo`) VALUES
('﻿3GB', 'PORTA'),
('6GB', 'PORTA'),
('10GB', 'PORTA'),
('15GB', 'PORTA'),
('25GB', 'PORTA'),
('CORPO 3GB', 'PORTA'),
('CORPO 5GB', 'PORTA'),
('CORPO 10GB', 'PORTA'),
('CORPO 15GB', 'PORTA'),
('CORPO 30GB', 'PORTA'),
('FIBRA PYME 100', 'FIBRA'),
('FIBRA PYME 300', 'FIBRA'),
('FIBRA PYME 500', 'FIBRA'),
('FIBRA PYME 700', 'FIBRA'),
('FIBRA PYME 1GB', 'FIBRA'),
('FIBRA 100 MG', 'FIBRA'),
('FIBRA 300 mg', 'FIBRA'),
('FIBRA 500 MG', 'FIBRA'),
('FIBRA 700 MG', 'FIBRA'),
('FIBRA 1 GIGA', 'FIBRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` varchar(350) NOT NULL,
  `provincias` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `provincias`) VALUES
('1', ' Buenos Aires'),
('2', ' Catamarca'),
('3', ' Chaco'),
('4', ' Chubut'),
('5', ' Cordoba'),
('6', ' Corrientes'),
('7', ' Entre Rios'),
('8', ' Formosa'),
('9', ' Jujuy'),
('10', ' La Pampa'),
('11', ' La Rioja'),
('12', ' Mendoza'),
('13', ' Misiones'),
('14', ' Neuquen'),
('15', ' Rio Negro'),
('16', ' Salta'),
('17', ' San Juan'),
('18', ' San Luis'),
('19', ' Santa Cruz'),
('20', ' Santa Fe'),
('21', ' Santiago del Estero'),
('22', ' Tierra del Fuego'),
('23', ' Tucuman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `equipo` varchar(120) NOT NULL,
  `level` int(11) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `passencrypt` varchar(250) NOT NULL,
  `intentos` varchar(120) NOT NULL,
  `bloqueado` varchar(120) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `apellido` varchar(120) NOT NULL,
  `celular` varchar(120) NOT NULL,
  `cumple` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `dni`, `correo`, `equipo`, `level`, `contrasena`, `passencrypt`, `intentos`, `bloqueado`, `foto`, `apellido`, `celular`, `cumple`) VALUES
(6, 'Sergio', '', '', 'ADMINISTRACION', 1, 'Vxtitisreal', '3f7e70e31b7279906ed51711b4ad7f79', '', '', '0', '', '', NULL),
(7, 'RODRIGO NAHUEL BECERRA', '', 'rodrigobecerra@vxt.com', 'ADMINISTRACION', 1, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '', '0', '', '', NULL),
(22, 'martinaballesterossupervisora@vxt.com', '', 'martinaballesterossupervisora@vxt.com', 'ADMINISTRACION', 1, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '', '0', '', '', NULL),
(23, '', '', '', 'GABRIEL', 0, '', '', '', '', '0', '', '', NULL),
(24, 'Gabriel', '40068922', 'gonzalezcastellvigabriel@gmail.com', 'ADMINISTRACION', 1, 'Gabriel400', '8b8a0d03ec7e79f9af7c072c57d20a42', '0', '', 'vxt.png', '', '', '1996-09-02'),
(32, '', '', '', 'RODRIGO', 0, '', '', '', '', '0', '', '', NULL),
(36, 'martinaballesteros@vxt.com', '', 'martinaballesteros@vxt.com', 'ADMINISTRACION', 1, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '3', '1', '0', '', '', NULL),
(38, 'renatabresuti@vxt.com', '', 'renatabresuti@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '', '0', '', '', NULL),
(39, 'mariaperez@vxt.com', '', 'mariaperez@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '', '', '0', '', '', NULL),
(40, 'martinsuarez@vxt.com', '', 'martinsuarez@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '', '0', '', '', NULL),
(43, 'Melisa Valdez', '37964995', 'melisavaldez@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '0', '0', '', '', NULL),
(44, 'Luis Salgado', '000000000000', 'luissalgado@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '', '0', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioseliminados`
--

CREATE TABLE `usuarioseliminados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `equipo` varchar(120) NOT NULL,
  `level` int(11) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `passencrypt` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarioseliminados`
--

INSERT INTO `usuarioseliminados` (`id`, `nombre`, `dni`, `correo`, `equipo`, `level`, `contrasena`, `passencrypt`) VALUES
(31, 'tomasquipildor@vxt.com', '', '', 'DARIO', 0, '123', '6116afedcb0bc31083935c1c262ff4c9'),
(42, 'martinaballesteros@vxt.com', '16523811', 'gonzalezcastellvigabriel@gmail.com', 'RODRIGO', 0, '123', '6116afedcb0bc31083935c1c262ff4c9'),
(37, 'dario@vxt.com', '', '', 'DARIO', 2, 'DarioVxT2024', '38a4c5348deb9e3d7ed43555f8b7a43f'),
(35, 'Eber', '', '', 'ADMINISTRACION', 1, '123', '6116afedcb0bc31083935c1c262ff4c9'),
(28, 'GABRIELGONZALEZCASTELLVI@VXT.COM', '', '', 'DARIO', 0, '123', '6116afedcb0bc31083935c1c262ff4c9'),
(33, 'Gabriel@vxt.com', '', '', 'RODRIGO', 0, '123', '6116afedcb0bc31083935c1c262ff4c9'),
(41, 'aixaperoyan@vxt.com', '', '', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `vendedor` varchar(300) NOT NULL,
  `producto` varchar(250) NOT NULL,
  `linea` varchar(300) NOT NULL,
  `empresa` varchar(250) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `nombrecliente` varchar(250) NOT NULL,
  `fechanacimientocliente` date NOT NULL,
  `documentocliente` varchar(500) NOT NULL,
  `cuitcliente` varchar(120) NOT NULL,
  `numeroalternativo` varchar(300) NOT NULL,
  `email` varchar(120) NOT NULL,
  `planes` varchar(300) NOT NULL,
  `score` varchar(300) NOT NULL,
  `verificacion` varchar(120) NOT NULL,
  `fechacarga` date NOT NULL,
  `calle` varchar(500) NOT NULL,
  `numero` varchar(500) NOT NULL,
  `piso` varchar(500) NOT NULL,
  `dpto` varchar(500) NOT NULL,
  `entrecalles` varchar(500) NOT NULL,
  `provincia` varchar(500) NOT NULL,
  `localidad` varchar(500) NOT NULL,
  `codigopostal` varchar(500) NOT NULL,
  `coordenadas` varchar(500) NOT NULL,
  `linkgooglemaps` varchar(500) NOT NULL,
  `tarjetacredito` varchar(250) NOT NULL,
  `central` varchar(250) NOT NULL,
  `manzanaregistro` varchar(250) NOT NULL,
  `comentarios` varchar(500) NOT NULL,
  `estadoventa` varchar(120) NOT NULL,
  `numerosolicitud` int(120) NOT NULL,
  `archivo` varchar(500) NOT NULL,
  `fechaportacion` varchar(120) NOT NULL,
  `fechadecambio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, `comentarios`, `estadoventa`, `numerosolicitud`, `archivo`, `fechaportacion`, `fechadecambio`) VALUES
(429258, 'martinaballesteros@vxt.com', 'PORTA 5GB', '1124820047', '', '', 'Lujan Xoana Lopez', '1989-03-07', '34484637', '', '3885011736', '', '5GB', '', '', '2024-05-15', 'Corrientes', '385', '', '', 'Pablo Lamberti y Cabo Primero Sullings', 'Provincia de Buenos Aires', 'Garin', '1623;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425061, '', '2024-05-15', NULL),
(429259, 'martinaballesteros@vxt.com', 'PORTA 5GB', '3885011736', '', '', 'NESTOR JUAN PABLO TEJERINA', '1987-04-02', '32625773', '', '1124820047', '', '5GB', '', '', '2024-05-02', 'Corrientes', '385', '', '', 'Pablo Lamberti y Cabo Primero Sullings', 'Provincia de Buenos Aires', 'Garin', '1623;;;;;;;;;;;', '', '', '', '', '', '', 'DIFERIDA AUDITORIA', 425063, '', '', NULL),
(429260, 'martinsuarez@vxt.com', 'PORTA 5GB', '1156515953', '', '', 'KARINA SOLEDAD LUNA', '1982-06-03', '29524162', '', '1151261885', '', '5GB', '', '', '2024-05-02', 'pio baroja', '137', '', '', 'rawson y cap. sarmiento', 'Provincia de Buenos Aires', 'villa centenario', '1821;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425064, '', '2024-05-24', NULL),
(429261, 'martinaballesteros@vxt.com', 'Porta 3GB', '2974424511', '', '', 'Marcos Asahel Olivieri', '1980-03-20', '38799372', '', '2975447804', '', '3GB', '', '', '2024-05-02', 'Vice Comodoro Mu?oz', '38', '', '', 'Av Juan JOse Paso y Gral Lavalle', 'Chubut', 'Comodoro Rivadavia', '9000;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 425150, '', '2024-05-08', NULL),
(429262, 'renatabresuti@vxt.com', 'PORTA 5GB', '1157652013', '', '', 'SERGIO ARIEL OLIVIERI', '1995-05-16', '21983089', '', '1168611572', '', '5GB', '', '', '2024-05-02', 'PAYSANDU', '332', '', '', 'CDORO MARTIN RIVADAVIA//SOLIER', 'Provincia de Buenos Aires', 'wilde', '1875;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425153, '', '', NULL),
(429263, 'renatabresuti@vxt.com', 'PORTA 5GB', '1157652013', '', '', 'SERGIO ARIEL OLIVIERI', '1971-01-26', '21983089', '', '1168611572', '', '5GB', '', '', '2024-05-02', 'PAYSANDU', '332', '', '', 'CDORO MARTIN RIVADAVIA//SOLIER', 'Provincia de Buenos Aires', 'wilde', '1875;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425154, '', '2024-05-15', NULL),
(429264, 'renatabresuti@vxt.com', 'PORTA 5GB', '1157652013', '', '', 'SERGIO ARIEL OLIVIERI', '1971-01-26', '21983089', '', '1168611572', '', '5GB', '', '', '2024-05-02', 'PAYSANDU', '332', '', '', 'CDORO MARTIN RIVADAVIA//SOLIER', 'Provincia de Buenos Aires', 'wilde', '1875;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425155, '', '2024-05-15', NULL),
(429265, 'Melisa Valdez', 'PORTA 5GB', '2966215371', '', '', 'FRANCISCO FIDEL MU?OZ CRUZ', '1971-01-26', '33288736', '', '2966652209', '', '5GB', '', '', '2024-05-02', 'Sta Fe', '310', '', '', 'velez sarfield y tomas fernandez', 'Santa Cruz', 'rio gallegos', '9400;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CANCELADA', 425254, '', '2024-05-15', NULL),
(429266, 'Melisa Valdez', 'PORTA 10GB', '1157554157', '', '', 'EDGAR SIMON OVIEDO', '1987-12-13', '28978281', '', '1162411982', '', '10 GB', '', '', '2024-05-03', 'av Olazabal', '4855', '', '', 'pacheco y av triunvirato', 'Ciudad Aut?noma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1431;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425255, '', '', NULL),
(429267, 'Melisa Valdez', 'FIBRA 300MB', '1166805054', '', '', 'MATEO AGUSTIN GUZMAN CASEJAS', '1981-10-02', '46695676', '', '1158701703', '', '300MB', '', '', '2024-05-03', '?lvarez Jonte', '1940', '', '', 'GENERAL MUNILLA - TUCUMAN Y DEAN FUNES', 'Provincia de Buenos Aires', 'Castelar', '1712;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 425326, '', '2024-05-08', NULL),
(429268, 'renatabresuti@vxt.com', 'PORTA 5GB', '2975029249', '', '', 'MARCOS ANDRES LASHERAS', '2005-05-10', '27499238', '', '2976259901', '', '5GB', '', '', '2024-05-03', 'Alsina', '857', '', '', 'San Mart?n y Rivadavia', 'Chubut', 'Comodoro Rivadavia', '9003;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425330, '', '', NULL),
(429269, 'mariaprez@vxt.com', 'FIBRA 300MB', '2617231675', '', '', 'BRENDA NERINA COCUELLE', '1979-10-19', '36513555', '', '2617040431', '', '300MB', '', '', '2024-05-03', 'Valle del Sol', '968', '', '', 'primitivo de la reta y  juan manuel fangio', 'Mendoza', 'godoy cruz', '5501;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425345, '', '2024-05-16', NULL),
(429270, 'martinaballesteros@vxt.com', 'PORTA 5GB', '1164785905', '', '', 'Diego Sebastian Albarracin', '1991-09-06', '26076097', '', '1132724697', '', '5GB', '', '', '2024-05-03', 'Gral Viamonte', '1841', '', '', 'Zapiola y Navarro', 'Provincia de Buenos Aires', 'Castelar', '1712;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425348, '', '2024-05-06', NULL),
(429271, 'martinaballesteros@vxt.com', 'PORTA 5GB', '1164785905', '', '', 'Diego Sebastian Albarracin', '1977-06-28', '26076097', '', '1132724697', '', '5GB', '', '', '2024-05-03', 'Gral Viamonte', '1841', '', '', 'Zapiola y Navarro', 'Provincia de Buenos Aires', 'Castelar', '1712;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425349, '', '2024-05-13', NULL),
(429272, 'martinaballesteros@vxt.com', 'PORTA 5GB', '1164785905', '', '', 'Diego Sebastian Albarracin', '1977-06-28', '26076097', '', '1132724697', '', '5GB', '', '', '2024-05-03', 'Gral Viamonte', '1841', '', '', 'Zapiola y Navarro', 'Provincia de Buenos Aires', 'Castelar', '1712;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425350, '', '2024-05-13', NULL),
(429273, 'martinaballesteros@vxt.com', 'PORTA 5GB', '1164785905', '', '', 'Diego Sebastian Albarracin', '1977-06-28', '26076097', '', '1132724697', '', '5GB', '', '', '2024-05-03', 'Gral Viamonte', '1841', '', '', 'Zapiola y Navarro', 'Provincia de Buenos Aires', 'Castelar', '1712;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425351, '', '2024-05-13', NULL),
(429274, 'martinsuarez@vxt.com', 'PORTA 5GB', '2494603145', '', '', 'ELIANA ALEJANDRA BACINO HERRERA', '1977-06-28', '25871736', '', '2494635509', '', '5GB', '', '', '2024-05-03', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425356, '', '2024-05-13', NULL),
(429275, 'martinsuarez@vxt.com', 'PORTA 5GB', '2494603145', '', '', 'ELIANA ALEJANDRA BACINO HERRERA', '1977-06-13', '25871736', '', '2494635509', '', '5GB', '', '', '2024-05-03', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425357, '', '2024-05-20', NULL),
(429276, 'martinsuarez@vxt.com', 'PORTA 5GB', '2494603145', '', '', 'ELIANA ALEJANDRA BACINO HERRERA', '1977-06-13', '25871736', '', '2494635509', '', '5GB', '', '', '2024-05-03', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425358, '', '2024-05-20', NULL),
(429277, 'martinsuarez@vxt.com', 'PORTA 5GB', '2494603145', '', '', 'ELIANA ALEJANDRA BACINO HERRERA', '1977-06-13', '25871736', '', '2494635509', '', '5GB', '', '', '2024-05-03', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425359, '', '2024-05-20', NULL),
(429278, 'renatabresuti@vxt.com', 'PORTA 6GB', '2974528955', '', '', 'PACHECO LAURA ALEJANDRA', '1977-06-13', '31637761', '', '2974062323', '', '6GB', '', '', '2024-05-03', 'Francisco Urondo', '300', '', '', 'ferm?n chavez y silvina ocampo', 'Chubut', 'Comodoro Rivadavia', '9000;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 425589, '', '2024-05-20', NULL),
(429279, 'mariaprez@vxt.com', 'PORTA 5GB', '2916465051', '', '', 'MARIA CRISTINA HERRERA DE LA ROSA', '1985-06-06', '93872086', '', '2915783944', '', '5GB', '', '', '2024-05-06', 'Juan Jos? Paso', '156', '', '', 'BUSTAMANTE Y LAPRIDA', 'Provincia de Buenos Aires', 'MEDANOS', '8132;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425649, '', '', NULL),
(429280, 'martinsuarez@vxt.com', 'PORTA 5GB', '', '', '', 'SILVINA ANDREA POLATTINI', '1976-06-19', '30673535', '', '2916468910', '', '5GB', '', '', '2024-05-06', 'Juan Molina', '853', '', '', 'almafuerte y sixto laspiur', 'Provincia de Buenos Aires', 'BAHIA BLANCA', '8000;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 425675, '', '2024-05-16', NULL),
(429281, 'martinsuarez@vxt.com', 'PORTA 5GB', '2494539300', '', '', 'CHANTRE IVANA PAOLA', '1983-11-10', '26775510', '', '2946031450', '', '5GB', '', '', '2024-05-06', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425681, '', '', NULL),
(429282, 'martinsuarez@vxt.com', 'PORTA 5GB', '2494003024', '', '', 'LUCIANO FELIPE CLEMENTI', '1978-08-05', '24104455', '', '2494603145', '', '5GB', '', '', '2024-05-06', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425700, '', '2024-05-23', NULL),
(429283, 'Melisa Valdez', 'PORTA 5GB', '2966528705', '', '', 'SOSA NIDIA MALVINA', '1975-02-18', '29512349', '', '2966270671', '', '5GB', '', '', '2024-05-06', '1015', '97', '', '', '1020 y s/nombre', 'Santa Cruz', 'calafate', '4405;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425860, '', '2024-05-20', NULL),
(429284, 'martinsuarez@vxt.com', 'FIBRA 300MB', '1155942134', '', '', 'MARIEL EMILIA GIULIANI', '1982-07-12', '18574905', '', '1125413484', '', '300MB', '', '', '2024-05-07', 'Gral. Francisco Miranda', '1355', '', '', 'JUAN DE GARAY Y FRANCISCO DE ALFARO', 'Provincia de Buenos Aires', 'HURLINGHAM', '1686;;;;;;;;;;;', '', '', '', '', '', '', 'PENDIENTE AUDITORIA', 425921, '', '2024-05-30', NULL),
(429285, 'martinsuarez@vxt.com', 'PORTA 6GB', '1155942134', '', '', 'MARIEL EMILIA GIULIANI', '1967-11-02', '18574905', '', '1125413484', '', '6GB', '', '', '2024-05-07', 'Gral. Francisco Miranda', '1355', '', '', 'JUAN DE GARAY Y FRANCISCO DE ALFARO', 'Provincia de Buenos Aires', 'HURLINGHAM', '1686;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 425923, '', '', NULL),
(429286, 'martinsuarez@vxt.com', 'PORTA 6GB', '1155942134', '', '', 'MARIEL EMILIA GIULIANI', '1967-11-02', '18574905', '', '1125413484', '', '6GB', '', '', '2024-05-07', 'Gral. Francisco Miranda', '1355', '', '', 'JUAN DE GARAY Y FRANCISCO DE ALFARO', 'Provincia de Buenos Aires', 'HURLINGHAM', '1686;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 425925, '', '', NULL),
(429287, 'renatabresuti@vxt.com', 'PORTA 5GB', '2994539492', '', '', 'CARLA NATALIA GONZALEZ', '1967-11-02', '24825733', '', '2994297042', '', '5GB', '', '', '2024-05-07', 'Ing Luis A. Huergo', '15', '', '', 'c. 3 y c.5', 'Neuqu?n', 'Neuqu?n', '8300;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426054, '', '', NULL),
(429288, 'renatabresuti@vxt.com', 'PORTA 5GB', '2994539492', '', '', 'CARLA NATALIA GONZALEZ', '1976-02-25', '24825733', '', '2994297042', '', '5GB', '', '', '2024-05-08', 'Ing Luis A. Huergo', '15', '', '', 'c. 3 y c.5', 'Neuqu?n', 'Neuqu?n', '8300;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426055, '', '2024-05-29', NULL),
(429289, 'renatabresuti@vxt.com', 'PORTA 5GB', '2994539492', '', '', 'CARLA NATALIA GONZALEZ', '1976-02-25', '24825733', '', '2994297042', '', '5GB', '', '', '2024-05-08', 'Ing Luis A. Huergo', '15', '', '', 'c. 3 y c.5', 'Neuqu?n', 'Neuqu?n', '8300;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426056, '', '2024-05-29', NULL),
(429290, 'Melisa Valdez', 'PORTA 6GB', '1122971073', '', '', 'GIMENES MELISA NANCY', '1976-02-25', '37293424', '', '1159301595', '', '6GB', '', '', '2024-05-08', 'Miguel de Unamuno', '80', '', '', 'martin rodriguez y sarmiento', 'Provincia de Buenos Aires', 'CENTENARIO', '1828;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426065, '', '2024-05-29', NULL),
(429291, 'mariaprez@vxt.com', 'PORTA 5GB', '1130917245', '', '', 'MELINA ELIZABET PEREYRA', '1993-03-19', '34983065', '', '1134561827', '', '5GB', '', '', '2024-05-08', '131 A', '2127', '', '', 'av 21 y 22', 'Provincia de Buenos Aires', 'Berazategui', '1884;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CANCELADA', 426150, '', '2024-05-10', NULL),
(429292, 'renatabresuti@vxt.com', 'PORTA 5GB', '2995712316', '', '', 'JUAN CARLOS PAEZ', '1989-11-07', '22636912', '', '2646280051', '', '5GB', '', '', '2024-05-08', 'GABRIEL MISTRAL', '2279', '', '', 'felipe sapag y juan pablo II', 'Neuqu?n', 'CENTENARIO', '8309;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 426379, '', '', NULL),
(429293, 'renatabresuti@vxt.com', 'PORTA 5GB', '2995712316', '', '', 'JUAN CARLOS PAEZ', '1972-02-22', '22636912', '', '2646280051', '', '5GB', '', '', '2024-05-09', 'GABRIEL MISTRAL', '2279', '', '', 'felipe sapag y juan pablo II', 'Neuqu?n', 'CENTENARIO', '8309;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 426380, '', '', NULL),
(429294, 'Melisa Valdez', 'PORTA 5GB', '2614677473', '', '', 'GIL CARLOS ALFREDO', '1972-02-22', '20571220', '', '2615102887', '', '5GB', '', '', '2024-05-09', 'Fray Justo Sta. Mar?a de Oro', '889', '', '', 'las heras y perdera', 'Mendoza', 'san jose', '5519;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426381, '', '', NULL),
(429295, 'Melisa Valdez', 'PORTA 10GB', '2984732194', '', '', 'CARDOSO CARLOS', '1978-10-10', '96254628', '', '2984146458', '', '10 GB', '', '', '2024-05-09', 'Don Bosco', '2605', '', '', 'COSTA RICA / LAS HERAS', 'R?o Negro', 'GENERAL ROCA', '8332;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 426456, '', '2024-05-16', NULL),
(429296, 'martinsuarez@vxt.com', 'PORTA 5GB', '2272404280', '', '', 'MONICA GABRIELA DENIS', '1983-01-16', '26911850', '', '2272402895', '', '5GB', '', '', '2024-05-09', '44 bis', '1170', '', '', '23 y 25', 'Provincia de Buenos Aires', 'NAVARRO', '1100;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426474, '', '', NULL),
(429297, 'martinsuarez@vxt.com', 'PORTA 5GB', '2272404280', '', '', 'MONICA GABRIELA DENIS', '1979-09-17', '26911850', '', '2272402895', '', '5GB', '', '', '2024-05-09', '44 bis', '1170', '', '', '23 y 25', 'Provincia de Buenos Aires', 'NAVARRO', '1100;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426475, '', '2024-05-17', NULL),
(429298, 'renatabresuti@vxt.com', 'PORTA 6GB', '2995351115', '', '', 'LAURA ISOLINA SALAZAR', '1979-09-17', '25714967', '', '2994233844', '', '6GB', '', '', '2024-05-09', 'PERITO MORENO', '587', '', '', 'ALUMINE y PULMARI', 'Neuqu?n', 'PLOTTIER', '8316;;;;;;;;;;;', '', '', '', '', '', '', 'EN TRANSITO', 426728, '', '2024-05-17', NULL),
(429299, 'Melisa Valdez', 'PORTA 5GB', '1138013546', '', '', 'MARICELA IGNACIA SANCHEZ QUI?ONEZ', '1972-11-14', '94236855', '', '1164274332', '', '5GB', '', '', '2024-05-10', 'C. 115 A', '317', '', '', 'calle 26 b y calle 27', 'Provincia de Buenos Aires', 'berazategui oeste', '1886;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CANCELADA', 427123, '', '', NULL),
(429300, 'Melisa Valdez', 'Porta 3GB', '1155623821', '', '', 'ROBERTO ORLANDO CORREA', '1990-07-31', '30028550', '', '1168726071', '', '3GB', '', '', '2024-05-13', 'Finlandia', '1168', '', '', 'viamonte y domingo faustino sarmiento', 'Provincia de Buenos Aires', 'presidente derqui', '1635;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427219, '', '', NULL),
(429301, 'Melisa Valdez', 'Porta 3GB', '1155623821', '', '', 'ROBERTO ORLANDO CORREA', '1983-03-04', '30028550', '', '1168726071', '', '3GB', '', '', '2024-05-14', 'Finlandia', '1168', '', '', 'viamonte y domingo faustino sarmiento', 'Provincia de Buenos Aires', 'presidente derqui', '1635;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427220, '', '2024-05-22', NULL),
(429302, 'Melisa Valdez', 'Porta 3GB', '1155623821', '', '', 'ROBERTO ORLANDO CORREA', '1983-03-04', '30028550', '', '1168726071', '', '3GB', '', '', '2024-05-14', 'Finlandia', '1168', '', '', 'viamonte y domingo faustino sarmiento', 'Provincia de Buenos Aires', 'presidente derqui', '1635;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427221, '', '2024-05-22', NULL),
(429303, 'Melisa Valdez', 'PORTA 10GB', '1123302735', '', '', 'ALEJANDRO DAMIAN GOMEZ', '1983-03-04', '46188214', '', '1127678362', '', '10 GB', '', '', '2024-05-14', 'Gordillo', '762', '', '', 'san benito y helvecia', 'Provincia de Buenos Aires', 'Merlo', '1716;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427226, '', '2024-05-22', NULL),
(429304, 'Melisa Valdez', 'PORTA 5GB', '1158013543', '', '', 'GABRIELA MABEL CARRETE', '2004-09-26', '20735916', '', '1161611581', '', '5GB', '', '', '2024-05-14', 'pasaje del chacho', '466', '', '', 'pamar y el tuyuti', 'Provincia de Buenos Aires', 'liniers', '1408;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427228, '', '2024-05-17', NULL),
(429305, 'renatabresuti@vxt.com', 'PORTA 5GB', '2944532049', '', '', 'MASSIEL ALEJANDRA MANZOR FUENTEALBA', '1969-03-31', '92872361', '', '2944536577', '', '5GB', '', '', '2024-05-14', 'Cerro Runge', '85', '', '', 'cerro carb?n y chalcahuano', 'R?o Negro', 'san carlos de bariloche', '8400;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427229, '', '2024-05-24', NULL),
(429306, 'Melisa Valdez', 'FIBRA 300MB', '1135685515', '', '', 'DANIEL PABLO MANZUR', '1977-10-06', '26768923', '', '1155802568', '', '300MB', '', '', '2024-05-14', 'Ozanam', '1790', '', '', 'ingeniero sagasta - intendente aguer0', 'Provincia de Buenos Aires', 'MORON', '1718;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 427250, '', '2024-05-24', NULL),
(429307, 'martinsuarez@vxt.com', 'PORTA 5GB', '1136216724', '', '', 'MARTIN ARIEL FERRARA', '1978-07-10', '24228784', '', '1138223726', '', '5GB', '', '', '2024-05-14', 'Terrada', '3145', '', '', 'NAZARRE Y MELINCUE', 'Provincia de Buenos Aires', 'VILLA DEL PARQUE', '1417;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427251, '', '', NULL),
(429308, 'renatabresuti@vxt.com', 'PORTA 10GB', '2664649433', '', '', 'H?ctor Esteban G?mez Gatica', '1974-10-24', '21382350', '', '2664482988', '', '10 GB', '', '', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrred?n y las jarillas', 'San Luis', 'San Luis', '5700;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427344, '', '2024-05-23', NULL),
(429309, 'renatabresuti@vxt.com', 'PORTA 10GB', '2664649433', '', '', 'H?ctor Esteban G?mez Gatica', '1970-04-20', '21382350', '', '2664482988', '', '10 GB', '', '', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrred?n y las jarillas', 'San Luis', 'San Luis', '5700;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427345, '', '2024-05-30', NULL),
(429310, 'renatabresuti@vxt.com', 'PORTA 10GB', '2664649433', '', '', 'H?ctor Esteban G?mez Gatica', '1970-04-20', '21382350', '', '2664482988', '', '10 GB', '', '', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrred?n y las jarillas', 'San Luis', 'San Luis', '5700;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427346, '', '2024-05-30', NULL),
(429311, 'renatabresuti@vxt.com', 'PORTA 10GB', '2664649433', '', '', 'H?ctor Esteban G?mez Gatica', '1970-04-20', '21382350', '', '2664482988', '', '10 GB', '', '', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrred?n y las jarillas', 'San Luis', 'San Luis', '5700;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427347, '', '2024-05-30', NULL),
(429312, 'renatabresuti@vxt.com', 'PORTA 10GB', '2664649433', '', '', 'H?ctor Esteban G?mez Gatica', '1970-04-20', '21382350', '', '2664482988', '', '10 GB', '', '', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrred?n y las jarillas', 'San Luis', 'San Luis', '5700;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427348, '', '2024-05-30', NULL),
(429313, 'Melisa Valdez', 'Porta 3GB', '2615371629', '', '', 'DIEGO GABRIEL RIOS', '1970-04-20', '29745735', '', '2616839370', '', '3GB', '', '', '2024-05-14', 'ingeniero luis cerra', '12', '', '', 'militon arroyo y gui?azu', 'Mendoza', 'guaymallen', '5523;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 427554, '', '2024-05-30', NULL),
(429314, 'Melisa Valdez', 'PORTA 5GB', '1169903666', '', '', 'HECTOR ANTONIO ZABATEL', '1982-09-22', '14251595', '', '1169903666', '', '5GB', '', '', '2024-05-15', 'Sarmiento', '221', '', '', 'guiraldes  mansilla', 'Provincia de Buenos Aires', 'glew', '1856;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CANCELADA', 427555, '', '', NULL),
(429315, 'martinsuarez@vxt.com', 'PORTA 5GB', '2236682390', '', '', 'FAVIO FIORE COSCO', '1961-02-21', '31185724', '', '2236686660', '', '5GB', '', '', '2024-05-15', 'Tripulantes del Fournier', '7134', '', '', 'CNOEL VIDAL Y C.FRIULI', 'Provincia de Buenos Aires', 'MAR DEL PLATA', '7608;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA A VENDEDOR', 427591, '', '', NULL),
(429316, 'martinsuarez@vxt.com', 'PORTA 5GB', '2236682390', '', '', 'FAVIO FIORE COSCO', '1985-03-16', '31185724', '', '2236686660', '', '5GB', '', '', '2024-05-15', 'Tripulantes del Fournier', '7134', '', '', 'CNOEL VIDAL Y C.FRIULI', 'Provincia de Buenos Aires', 'MAR DEL PLATA', '7608;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 427592, '', '', NULL),
(429317, 'martinsuarez@vxt.com', 'FIBRA 300MB', '2236682390', '', '', 'FAVIO FIORE COSCO', '1985-03-16', '31185724', '', '2236686660', '', '300MB', '', '', '2024-05-15', 'AV VERTIZ', '8718', '', '', 'Go?i // Florencio Martinez de Hoz // calle 25', 'Provincia de Buenos Aires', 'MAR DEL PLATA', '7600;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 427595, '', '', NULL),
(429318, 'Melisa Valdez', 'PORTA 5GB', '1136813344', '', '', 'LUGO TEJEDOR JUAN ALBERTO', '1985-03-16', '26567732', '', '1123601660', '', '5GB', '', '', '2024-05-15', 'barzana', '1558', '', '', 'gandara y constantinopla', 'Ciudad Aut?noma de Buenos Aires (CABA) o Capital Federal', 'comuna 15', '1431;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 427786, '', '', NULL),
(429319, 'Melisa Valdez', 'PORTA 5GB', '1136813344', '', '', 'LUGO TEJEDOR JUAN ALBERTO', '1978-11-07', '26567732', '', '1123601660', '', '5GB', '', '', '2024-05-16', 'barzana', '1558', '', '', 'gandara y constantinopla', 'Ciudad Aut?noma de Buenos Aires (CABA) o Capital Federal', 'comuna 15', '1431;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 427787, '', '', NULL),
(429320, 'Melisa Valdez', 'PORTA 5GB', '2920274404', '', '', 'CARMELO JOSE IBANEZ', '1978-11-07', '35591032', '', '2920607091', '', '5GB', '', '', '2024-05-16', 'Urquiza', '452', '', '', 'miguel mu?oz - espa?a', 'R?o Negro', 'cipolletti', '8324;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 428071, '', '', NULL),
(429321, 'Melisa Valdez', 'PORTA 5GB', '2323548224', '', '', 'MARCELA MATILDE VERA', '1990-10-29', '21435740', '', '2323315200', '', '5GB', '', '', '2024-05-17', 'Gral. Carlos Mar?a de Alvear', '735', '', '', 'almirante broun y 25 de mayo', 'Provincia de Buenos Aires', 'lujan', '6700;;;;;;;;;;;', '', '', '', '', '', '', 'PENDIENTE CARGA TASA', 428075, '', '', NULL),
(429322, 'Melisa Valdez', 'Porta 3GB', '1156042974', '', '', 'CINTIA SILVINA PEREIRA', '1970-01-14', '26495053', '', '1156042974', '', '3GB', '', '', '2024-05-17', 'Escribano Francisco Vazquez', '3550', '', '', 's/ nombre', 'Provincia de Buenos Aires', 'echeverria', '1807;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CANCELADA', 428076, '', '', NULL),
(429323, 'martinsuarez@vxt.com', 'PORTA 5GB', '2994066088', '', '', 'MARIANA ANAHI GARCIA', '1978-02-05', '23098825', '', '2994086705', '', '5GB', '', '', '2024-05-17', 'Gral. Conrado Villegas', '772', '', '', 'manuel alberti y domingo basavilbaso', 'Neuqu?n', 'neuquen', '8300;;;;;;;;;;;', '', '', '', '', '', '', 'INFORMADA TASA', 428077, '', '', NULL),
(429324, 'martinsuarez@vxt.com', 'PORTA 5GB', '1132779588', '', '', 'ROMINA LORENA CHAVEZ', '1992-11-07', '36083554', '', '1123197051', '', '5GB', '', '', '2024-05-17', 'Las Margaritas', '560', '', '', 'LAS AMAPOLAS Y LOS TULIPANES', 'Provincia de Buenos Aires', 'CIUDAD EVITA', '1778;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428080, '', '', NULL),
(429325, 'martinsuarez@vxt.com', 'PORTA 5GB', '1132779588', '', '', 'ROMINA LORENA CHAVEZ', '1991-04-16', '36083554', '', '1123197051', '', '5GB', '', '', '2024-05-17', 'Las Margaritas', '560', '', '', 'LAS AMAPOLAS Y LOS TULIPANES', 'Provincia de Buenos Aires', 'CIUDAD EVITA', '1778;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428081, '', '2024-05-24', NULL),
(429326, 'martinsuarez@vxt.com', 'PORTA 5GB', '1132779588', '', '', 'ROMINA LORENA CHAVEZ', '1991-04-16', '36083554', '', '1123197051', '', '5GB', '', '', '2024-05-17', 'Las Margaritas', '560', '', '', 'LAS AMAPOLAS Y LOS TULIPANES', 'Provincia de Buenos Aires', 'CIUDAD EVITA', '1778;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428082, '', '2024-05-24', NULL),
(429327, 'martinsuarez@vxt.com', 'PORTA 5GB', '1123927942', '', '', 'Victor Manuel Caruci Briones', '1991-04-16', '96089904', '', '1126925842', '', '5GB', '', '', '2024-05-17', 'Av. Belgrano', '1944', '', '', 'SARANDI Y COMBATE DE LOS POZOS', 'Ciudad Aut?noma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1094;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428136, '', '2024-05-24', NULL),
(429328, 'martinaballesteros@vxt.com', 'PORTA 5GB', '2213140557', '', '', 'GODOFREDO LOZANO BAUDON', '1984-01-25', '30876429', '', '2215468431', '', '5GB', '', '', '2024-05-17', 'CALLE 47', '418', '', '', 'DIAGONAL 77 Y CALLE 3', 'Provincia de Buenos Aires', 'LA PLATA', '1900;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 428327, '', '', NULL),
(429329, 'juanpalleres@vxt.com', 'PORTA 5GB', '2616677080', '', '', 'EMMANUEL MAXIMILIANO HERRERA', '1984-03-09', '33631481', '', '2612173889', '', '5GB', '', '', '2024-05-20', 'El nihuil', '10', '', '', 'Mangiapani y Padre llorens', 'Mendoza', 'Las heras', '5539;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 428378, '', '', NULL),
(429330, 'martinsuarez@vxt.com', 'FIBRA 300MB', '1167801837', '', '', 'JUAN ANTONIO LUNA', '1988-03-24', '14198692', '', '1167010863', '', '300MB', '', '', '2024-05-20', 'Diego de Villarroel', '10578', '', '', 'aeronautica argentina y giacomo puccini', 'Provincia de Buenos Aires', 'trujui', '1736;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428389, '', '', NULL),
(429331, 'martinaballesteros@vxt.com', 'PORTA 5GB', '1140497141', '', '', 'Marcos Javier Ayosa', '1960-10-26', '31243970', '', '1151123553', '', '5GB', '', '', '2024-05-20', 'JUNIN', '1613', '', '', 'camino real mor?n y alegor?a matorras', 'Provincia de Buenos Aires', 'Bolunge', '1609;;;;;;;;;;;', '', '', '', '', '', '', 'PENDIENTE CARGA TASA', 428409, '', '', NULL),
(429332, 'juanpalleres@vxt.com', 'PORTA 5GB', '1131112199', '', '', 'BRUSCHINI DIEGO MAXIMILIANO', '1984-10-14', '27239531', '', '1169970372', '', '5GB', '', '', '2024-05-20', 'Pergamino', '722', '', '', 'arredondo y mansilla', 'Provincia de Buenos Aires', 'Sarandi', '1872;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428574, '', '', NULL),
(429333, 'juanpalleres@vxt.com', 'FIBRA 300MB', '1131112199', '', '', 'BRUSCHINI DIEGO MAXIMILIANO', '1979-06-26', '27239531', '', '1169970372', '', '300MB', '', '', '2024-05-20', 'Pergamino', '722', '', '', 'arredondo y mansilla', 'Provincia de Buenos Aires', 'Sarandi', '1872;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428575, '', '', NULL),
(429334, 'Melisa Valdez', 'Porta 3GB', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1979-06-26', '24914966', '', '2234238257', '', '3GB', '', '', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428577, '', '', NULL),
(429335, 'Melisa Valdez', 'Porta 3GB', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '', '2234238257', '', '3GB', '', '', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428578, '', '2024-05-29', NULL),
(429336, 'Melisa Valdez', 'Porta 3GB', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '', '2234238257', '', '3GB', '', '', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428579, '', '2024-05-29', NULL),
(429337, 'Melisa Valdez', 'Porta 3GB', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '', '2234238257', '', '3GB', '', '', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428580, '', '2024-05-29', NULL),
(429338, 'Melisa Valdez', 'Porta 3GB', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '', '2234238257', '', '3GB', '', '', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428581, '', '2024-05-29', NULL),
(429339, 'Melisa Valdez', 'Porta 3GB', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '', '2234238257', '', '3GB', '', '', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604;;;;;;;;;;;', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428582, '', '2024-05-29', NULL),
(429340, 'Melisa Valdez', 'Porta 3GB', '2612614195300', '', '', 'RODRIGUEZ', '1975-12-23', 'MARIANO FABIAN', '', '27763872', '', '2615088384', '3GB', '', '2024-05-20', 'viernes-06-06', '33 orientales', '', '', '13', 'Esquina  Monse?or Verdaguer', 'Mendoza', 'Las Heras;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428584, '', '2024-05-29', NULL),
(429341, 'Melisa Valdez', 'Porta 3GB', '2612614195300', '', '', 'RODRIGUEZ', '1980-06-06', 'MARIANO FABIAN', '', '27763872', '', '2615088384', '3GB', '', '2024-05-20', 'viernes-06-06', '33 orientales', '', '', '13', 'Esquina  Monse?or Verdaguer', 'Mendoza', 'Las Heras;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428585, '', '', NULL),
(429342, 'Melisa Valdez', 'Porta 3GB', '2612614195300', '', '', 'RODRIGUEZ', '1980-06-06', 'MARIANO FABIAN', '', '27763872', '', '2615088384', '3GB', '', '2024-05-20', 'viernes-06-06', '33 orientales', '', '', '13', 'Esquina  Monse?or Verdaguer', 'Mendoza', 'Las Heras;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428586, '', '', NULL),
(429343, 'Melisa Valdez', 'FIBRA 300MB', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1980-06-06', '24914966', '', '2234238257', '', '300MB', '', '', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'MAR DEL PLATA', '7604;;;;;;;;;;;', '', '', '', '', '', '', 'DIFERIDA AUDITORIA', 428587, '', '', NULL),
(429344, 'mariaprez@vxt.com', 'PORTA 5GB', '1140396277', '', '', 'MARIA CRISTINA DIAZ', '1975-12-23', '14569024', '', '1158091850', '', '5GB', '', '', '2024-05-20', 'Sarand?', '1235', '', '', 'av. 25 de mayo y av. san juan', 'Ciudad Aut?noma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1251;;;;;;;;;;;', '', '', '', '', '', '', 'DIFERIDA AUDITORIA', 428588, '', '', NULL),
(429345, 'mariaprez@vxt.com', 'PORTA 5GB', '1140396277', '', '', 'MARIA CRISTINA DIAZ', '1962-02-01', '14569024', '', '1158091850', '', '5GB', '', '', '2024-05-20', 'Sarand?', '1235', '', '', 'av. 25 de mayo y av. san juan', 'Ciudad Aut?noma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1251;;;;;;;;;;;', '', '', '', '', '', '', 'DIFERIDA AUDITORIA', 428589, '', '', NULL),
(429346, 'renatabresuti@vxt.com', 'PORTA 5GB', '2644587376', '', '', 'NACUSI HERRADA FERNANDO', '1962-02-01', '30157747', '', '2644430045', '', '5GB', '', '', '2024-05-20', 'sarmiento sur', '371', '', '', 'b mitre y santa fe', 'San Juan', 'san juan', '5400;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 428590, '', '', NULL),
(429347, 'renatabresuti@vxt.com', 'PORTA 5GB', '2644587376', '', '', 'NACUSI HERRADA FERNANDO', '1984-03-06', '30157747', '', '2644430045', '', '5GB', '', '', '2024-05-20', 'sarmiento sur', '371', '', '', 'b mitre y santa fe', 'San Juan', 'san juan', '5400;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 428591, '', '', NULL),
(429348, 'renatabresuti@vxt.com', 'PORTA 5GB', '1166439497', '', '', 'ADRIANA CRISTINA BLANC', '1984-03-06', '21604859', '', '1136206696', '', '5GB', '', '', '2024-05-20', 'Pte Jos? E Uriburu', '1451', '', '', 'pe?a y french', 'Ciudad Aut?noma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1114;;;;;;;;;;;', '', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428592, '', '', NULL),
(429349, 'Melisa Valdez', 'Porta 3GB', '2616090821', '', '', 'JORGE ERIC CASANOVA', '1971-04-03', '38907772', '', '2613601626', '', '3GB', '', '', '2024-05-20', 'USHUAIA', '1040', '', '', '25 DE MAYO Y CORRIENTES', 'Mendoza', 'LAS HERAS', '5539;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 428593, '', '', NULL),
(429350, 'juanpalleres@vxt.com', 'PORTA 5GB', '2612476538', '', '', 'Lautaro Nicolas Matrich', '1995-04-06', '42750283', '', '2616867718', '', '5GB', '', '', '2024-05-20', 'JUNIN', '1137', '', '', 'SARMIENTO Y FORMOSA', 'Mendoza', 'GODOY CRUZ', '5501;;;;;;;;;;;', '', '', '', '', '', '', 'DIFERIDA AUDITORIA', 428664, '', '', NULL),
(429351, 'mariaprez@vxt.com', 'PORTA 5GB', '1136163360', '', '', 'Gustavo Jos? Su?rez', '0000-00-00', '18151237', '', '2204825945', '', '5GB', '', '', '2024-05-21', 'victoriano loza', '1328', '', '', 'Entre 1ro de mayo y balcarce', 'Provincia de Buenos Aires', 'Merlo', '1722;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428668, '', '', NULL),
(429352, 'juanpalleres@vxt.com', 'FIBRA 500MB', '', '', '', 'Joaquin', '1962-08-26', '41728219', '', '', '', '500MB', '', '', '2024-05-21', 'ARISTIDES VILLANUEVA', '752', '', '', 'BOULOGNE SUR MER Y HUARPES', 'Mendoza', 'MENDOZA', '5500;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 428717, '', '', NULL),
(429353, 'Luis Salgado', 'PORTA 15GB', '2613668512', '', '', 'DANIEL ANTONIO LEBLANC VALDIVIEZO', '0000-00-00', '96048190', '', '', '', '15GB', '', '', '2024-05-21', 'Avenida Belgrano', '1444', '', '', 'Julio Leonidas y Juan B Justo', 'Mendoza', 'Mendoza', '5500;;;;;;;;;;;', '', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428735, '', '', NULL),
(429354, 'Melisa Valdez', 'PORTA 5GB', '2613420633', '', '', 'JOSE MARIA BAYO', '1987-09-13', '17011164', '', '2616595031', '', '5GB', '', '', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428848, '', '', NULL),
(429355, 'Melisa Valdez', 'PORTA 5GB', '2613420633', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '', '2616595031', '', '5GB', '', '', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428849, '', '', NULL),
(429356, 'Melisa Valdez', 'PORTA 5GB', '2613420633', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '', '2616595031', '', '5GB', '', '', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428850, '', '', NULL),
(429357, 'Melisa Valdez', 'PORTA 5GB', '2613420633', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '', '2616595031', '', '5GB', '', '', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428851, '', '', NULL),
(429358, 'Melisa Valdez', 'PORTA 5GB', '2613420633', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '', '2616595031', '', '5GB', '', '', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428852, '', '', NULL),
(429359, 'Melisa Valdez', 'PORTA 5GB', '2645126933', '', '', 'VICTOR EDUARDO BRIZUELA', '1964-04-30', '17641962', '', '2644993226', '', '5GB', '', '', '2024-05-21', 'rawson', '171', '', '', 'alfonsina storni y las promesas', 'San Juan', 'villa dominguito', '5439;;;;;;;;;;;', '', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428854, '', '', NULL),
(429360, 'renatabresuti@vxt.com', 'FIBRA 300MB', '1132105473', '', '', 'IAN SENSAT', '1966-05-29', '41353807', '', '1164218126', '', '300MB', '', '', '2024-05-21', 'AYACUCHO', '281', '', '', 'CUCHA CUCHA', ' USPALLATA y PEDRO ZANNI', 'Provincia de Buenos Aires', 'LA TABLADA;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 428970, '', '', NULL),
(429361, 'renatabresuti@vxt.com', 'PORTA 10GB', '1138425698', '', '', 'AGUSTINA  MARTINEZ BROWN', '1998-06-07', '29077337', '', '1138425698', '', '10 GB', '', '', '2024-05-22', 'ceballos', '232', '', '', 'MITRE Y TUCUMAN', 'Provincia de Buenos Aires', 'Chivilcoy', '6620;;;;;;;;;;;', '', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428974, '', '', NULL),
(429362, 'renatabresuti@vxt.com', 'PORTA 10GB', '1138425698', '', '', 'AGUSTINA  MARTINEZ BROWN', '1981-10-01', '29077337', '', '1138425698', '', '10 GB', '', '', '2024-05-22', 'ceballos', '232', '', '', 'MITRE Y TUCUMAN', 'Provincia de Buenos Aires', 'Chivilcoy', '6620;;;;;;;;;;;', '', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428975, '', '', NULL),
(429363, 'renatabresuti@vxt.com', 'PORTA 5GB', '1138425698', '', '', 'AGUSTINA  MARTINEZ BROWN', '1981-10-01', '29077337', '', '1138425698', '', '5GB', '', '', '2024-05-22', 'ceballos', '232', '', '', 'MITRE Y TUCUMAN', 'Provincia de Buenos Aires', 'Chivilcoy', '6620;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428976, '', '', NULL),
(429364, 'martinaballesteros@vxt.com', 'FIBRA 300MB', '2213049301', '', '', 'SILVIA ELISABET FONSECA', '1981-10-01', '41542944', '', '2213093626', '', '300MB', '', '', '2024-05-22', 'CALLE 164', '1357', '', '', 'CALLE 60', ' CALLE 61 Y CALLE 165', 'Provincia de Buenos Aires', 'LOS HORNOS;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428981, '', '', '2024-05-24'),
(429365, 'renatabresuti@vxt.com', 'PORTA 5GB', '1169796810', '', '', 'ANDREA ELSA DANIELE', '1993-12-17', '18131466', '', '1158756977', '', '5GB', '', '', '2024-05-22', 'berutti', '2264', '', '', 'Pueyrred?n y Matheu', 'Provincia de Buenos Aires', 'villa maip?', '1650;;;;;;;;;;;', '', '', '', '', '', '', 'PENDIENTE CARGA TASA', 428985, '', '', NULL),
(429366, 'martinsuarez@vxt.com', 'PORTA 5GB', '2612192530', '', '', 'SALAS CANDIDA JANET', '1987-06-16', '38582962', '', '2615138704', '', '5GB', '', '', '2024-05-22', 'Terrada', '6034', '', '', 'los membrillos y llateral este', 'Mendoza', 'lujan de cuyo', '5503;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428987, '', '', NULL),
(429367, 'martinaballesteros@vxt.com', 'FIBRA 300MB', '1159402302', '', '', 'GABRIELA PATRICIA OLIVEIRA PARADA', '1995-04-01', '25778350', '', '1151766595', '', '300MB', '', '', '2024-05-22', 'RECONQUISTA', '1100', '', '', 'AZOPARDO', ' TUCUMAN Y AV GASPAR CAMPOS', 'Provincia de Buenos Aires', 'BELLA VISTA;;;;;;;;;;;', '', '', '', '', '', '', 'DIFERIDA AUDITORIA', 429013, '', '', NULL),
(429368, 'martinsuarez@vxt.com', 'PORTA 6GB', '2617092052', '', '', 'GRACIELA MONICA SANTANDER', '1977-10-28', '14978395', '', '2615138704', '', '6GB', '', '', '2024-05-22', 'Terrada', '6034', '', '', 'lateral este y los membrillos', 'Mendoza', 'lujan de cuyo', '5507;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 429167, '', '', NULL),
(429369, 'martinsuarez@vxt.com', 'PORTA 6GB', '2617092052', '', '', 'GRACIELA MONICA SANTANDER', '1962-02-17', '14978395', '', '2615138704', '', '6GB', '', '', '2024-05-23', 'Terrada', '6034', '', '', 'lateral este y los membrillos', 'Mendoza', 'lujan de cuyo', '5507;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 429168, '', '', NULL),
(429370, 'Luis Salgado', 'Porta 3GB', '1160315802', '', '', 'Carlos Alberto Rocha', '1962-02-17', '21874087', '', '1155934354', '', '3GB', '', '', '2024-05-23', 'Nolting', '3649', '', '', 'Estero Bellaco y Jose Ignacio Rucci', 'Provincia de Buenos Aires', 'Ciudadela', '1702;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 429269, '', '', NULL),
(429371, 'Luis Salgado', 'Porta 3GB', '1160315802', '', '', 'Carlos Alberto Rocha', '1970-08-27', '21874087', '', '1155934354', '', '3GB', '', '', '2024-05-23', 'Nolting', '3649', '', '', 'Estero Bellaco y Jose Ignacio Rucci', 'Provincia de Buenos Aires', 'Ciudadela', '1702;;;;;;;;;;;', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 429270, '', '', NULL),
(429372, 'renatabresuti@vxt.com', 'PORTA 6GB', '2644891702', '', '', 'MARIA CAROLINA GONZALEZ', '1970-08-27', '27268818', '', '2644856466', '', '6GB', '', '', '2024-05-23', 'C. Gdor. Castro Este', '419', '', '', 'chacras sur y nestro kirchner sur', 'San Juan', 'villa krausen', '5425;;;;;;;;;;;', '', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429275, '', '', '2024-05-24'),
(429373, 'martinsuarez@vxt.com', 'PORTA 5GB', '2615889240', '', '', 'MELANIE BELEN MALDONADO', '1979-04-16', '39329884', '', '2613908774', '', '5GB', '', '', '2024-05-23', 'San Guillermo', '6465', '', '', 'francisco lagorio y sgto palma', 'Provincia de Buenos Aires', '3 de febrero', '1683;;;;;;;;;;;', '', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429276, '', '', '2024-05-24'),
(429374, 'Luis Salgado', 'FIBRA 300MB', '1160315802', '', '', 'Carlos Alberto Rocha', '1995-06-29', '21874087', '', '1155934354', '', '300MB', '', '', '2024-05-23', 'Gral. Viamonte', '2256', '', '', 'AVELLANEDA', ' PEDRO ARRIETA Y SALVADOR CURCUCHET', 'Provincia de Buenos Aires', 'CASTELAR;;;;;;;;;;;', '', '', '', '', '', '', 'DIFERIDA AUDITORIA', 429280, '', '', NULL),
(429375, 'Luis Salgado', 'FIBRA 300MB', '1160315802', '', '', 'Carlos Alberto Rocha', '1970-08-27', '21874087', '', '1155934354', '', '300MB', '', '', '2024-05-23', 'Nolting', '3649', '', '', 'estero bellaco y jose ignacio ruggi', 'Provincia de Buenos Aires', 'CIUDADELA', '1702;;;;;;;;;;;', '', '', '', '', '', '', 'DIFERIDA AUDITORIA', 429286, '', '', NULL),
(429376, 'renatabresuti@vxt.com', 'PORTA 5GB', '2615748684', '', '', 'GUZMAN ANA LAURA LETICIA', '1970-08-27', '26221948', '', '2612166900', '', '5GB', '', '', '2024-05-23', 'colon', '901', '', '', 'esquina estrada y general paz', 'Mendoza', 'GODOY CRUZ', '5501;;;;;;;;;;;', '', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 429306, '', '', NULL),
(429377, 'renatabresuti@vxt.com', 'PORTA 5GB', '2615748684', '', '', 'GUZMAN ANA LAURA LETICIA', '1977-12-20', '26221948', '', '2612166900', '', '5GB', '', '', '2024-05-23', 'colon', '901', '', '', 'esquina estrada y general paz', 'Mendoza', 'GODOY CRUZ', '5501;;;;;;;;;;;', '', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 429307, '', '', NULL),
(429378, 'renatabresuti@vxt.com', 'PORTA 5GB', '2615748684', '', '', 'GUZMAN ANA LAURA LETICIA', '1977-12-20', '26221948', '', '2612166900', '', '5GB', '', '', '2024-05-23', 'colon', '901', '', '', 'esquina estrada y general paz', 'Mendoza', 'GODOY CRUZ', '5501;;;;;;;;;;;', '', '', '', '', '', '', 'INGRESADA TASA', 429308, '', '', NULL),
(429379, 'renatabresuti@vxt.com', 'PORTA 5GB', '2615748684', '', '', 'GUZMAN ANA LAURA LETICIA', '1977-12-20', '26221948', '', '2612166900', '', '5GB', '', '', '2024-05-23', 'colon', '901', '', '', 'esquina estrada y general paz', 'Mendoza', 'GODOY CRUZ', '5501;;;;;;;;;;;', '', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 429309, '', '', NULL),
(429381, 'martinaballesteros@vxt.com', 'PORTA', '1140239086', '', '', 'Ana Victoria Cohen', '1964-11-08', '28755282', '', '1165391296', '', 'CORPO 10GB', '360', '', '2024-04-16', 'Carlos Gardel', '2637', '', '', 'av 64 y C Jose Clemente', 'Buenos Aires', 'Villa Libertad', '1650', '', '', '', '', '', '', 'CUMPLIDA', 422187, '', '2024-04-29', NULL),
(429382, 'martinaballesteros@vxt.com', 'PORTA', '2612059225', '', '', 'Melisa Nordestrom', '1964-11-07', '31549384', '', '2615099462', '', 'CORPO 5GB', '360', '', '2024-04-16', 'Guillermo Cano ', '948', '', '', 'Cochabamba y Dr Coni', 'Mendoza', 'Guaymallen ', '5521', '', '', '', '', '', '', 'CUMPLIDA', 422138, '', '2024-04-24', NULL),
(429383, 'martinsuarez@vxt.com', 'PORTA', '2644160882', '', '', 'MARIA AGOSTINA CLAVERO MUÑOZ', '1964-10-29', '35508493', '', '2644549145', '', 'CORPO 5GB', '351', '', '2024-04-17', 'Alvear', '868', '', '', 'tacuari y san lorenzo oeste', 'san juan', 'capital', '5400', '', '', '', '', '', '', 'CANCELADA', 422421, '', '', NULL),
(429384, 'mariaperez@vxt.com', 'PORTA', '1141643430', '', '', 'GABRIELA FACIO', '1964-11-06', '27056513', '', '1141643387', '', 'CORPO 5GB', '908', '', '2024-04-17', 'Gómez de Fonseca', '508', '', '', 'juan felipe aranguren y moron', 'buenos aires', 'caba', '1407', '', '', '', '', '', '', 'CUMPLIDA', 422419, '', '2024-04-30', NULL),
(429385, 'martinaballesteros@vxt.com', 'PORTA', '1123130966', '', '', 'Patricio Damian Ferreyra ', '1964-11-04', '22708905', '', '1156525132', '', 'CORPO 5GB', '720', '', '2024-04-17', 'Manuel de Serratea', '388 / 390 ', '', '', 'Juan Jose Catelli y Domingo French', 'Buenos Aires', 'Moron', '1708', '', '', '', '', '', '', 'CUMPLIDA', 422398, '', '2024-04-26', NULL),
(429386, 'martinaballesteros@vxt.com', 'PORTA', '1149282026', '', '', 'Patricio Damian Ferreyra ', '1964-11-02', '22708905', '', '1156525132', '', 'CORPO 5GB', '720', '', '2024-04-17', 'Manuel de Serratea', '388 / 390 ', '', '', 'Juan Jose Catelli y Domingo French', 'Buenos Aires', 'Moron', '1708', '', '', '', '', '', '', 'CUMPLIDA', 422400, '', '2024-04-26', NULL),
(429387, 'martinaballesteros@vxt.com', 'PORTA', '1123401759', '', '', 'Patricio Damian Ferreyra ', '1964-10-31', '22708905', '', '1156525132', '', 'CORPO 5GB', '720', '', '2024-04-17', 'Manuel de Serratea', '388 / 390 ', '', '', 'Juan Jose Catelli y Domingo French', 'Buenos Aires', 'Moron', '1708', '', '', '', '', '', '', 'CUMPLIDA', 422402, '', '2024-04-26', NULL),
(429388, 'renatabresuti@vxt.com', 'PORTA', '1157217472', '', '', 'SEBASTIAN ALFREDO MASTROSTEFANO', '1964-11-05', '29542297', '', '1121193574', '', 'CORPO 5GB', '676', '', '2024-04-17', 'PJE DR HORACIO CASCO ', '5038', '', '', 'ALBARIÑO Y MIRALLA ', 'BUENOS AIRES', 'CABA', '1439', '', '', '', '', '', '', 'CUMPLIDA', 422424, '', '2024-04-29', NULL),
(429389, 'martinaballesteros@vxt.com', 'PORTA', '1139533376', '', '', 'Patricio Damian Ferreyra ', '1964-11-03', '22708905', '', '1156525132', '', 'CORPO 5GB', '720', '', '2024-04-17', 'Manuel de Serratea', '388 / 390 ', '', '', 'Juan Jose Catelli y Domingo French', 'Buenos Aires', 'Moron', '1708', '', '', '', '', '', '', 'CUMPLIDA', 422399, '', '2024-04-26', NULL),
(429390, 'martinaballesteros@vxt.com', 'PORTA', '1156525132', '', '', 'Patricio Damian Ferreyra ', '1964-11-01', '22708905', '', '1156525132', '', 'CORPO 5GB', '720', '', '2024-04-17', 'Manuel de Serratea', '388 / 390 ', '', '', 'Juan Jose Catelli y Domingo French', 'Buenos Aires', 'Moron', '1708', '', '', '', '', '', '', 'CUMPLIDA', 422401, '', '2024-04-26', NULL),
(429391, 'martinaballesteros@vxt.com', 'PORTA', '1136627459', '', '', 'Patricio Damian Ferreyra ', '1964-10-30', '22708905', '', '1156525132', '', 'CORPO 5GB', '720', '', '2024-04-17', 'Manuel de Serratea', '388 / 390 ', '', '', 'Juan Jose Catelli y Domingo French', 'Buenos Aires', 'Moron', '1708', '', '', '', '', '', '', 'CUMPLIDA', 422397, '', '2024-04-26', NULL),
(429392, 'renatabresuti@vxt.com', 'PORTA', '1123652478', '', '', 'JESICA MARISOL STEFANKIW', '1964-10-17', '36643913', '', '1126970694', '', 'CORPO 5GB', '360', '', '2024-04-18', 'guillermo marconi ', '328', '', '', 'catamarca y republica de libano ', 'BUENOS AIRES', 'QUILMES OESTE       ', '1879', '', '', '', '', '', '', 'CANCELADA', 422639, '', '', NULL),
(429393, 'renatabresuti@vxt.com', 'PORTA', '1160303104', '', '', 'JESICA MARISOL STEFANKIW', '1964-10-15', '36643913', '', '1126970694', '', 'CORPO 5GB', '360', '', '2024-04-18', 'guillermo marconi ', '328', '', '', 'catamarca y republica de libano ', 'BUENOS AIRES', 'QUILMES OESTE       ', '1879', '', '', '', '', '', '', 'CANCELADA', 422641, '', '', NULL),
(429394, 'martinsuarez@vxt.com', 'PORTA', '1166490767', '', '', 'VALENTIN LIZASO', '1964-10-19', '33344999', '', '1122376040', '', 'CORPO 5GB', '350', '', '2024-04-18', 'Homero', '1772', '', '', 'florida y ruta 8', 'buenos aires', 'del viso ', '1669', '', '', '', '', '', '', 'CUMPLIDA', 422596, '', '2024-04-29', NULL),
(429395, 'martinaballesteros@vxt.com', 'PORTA', '2954467460', '', '', 'Segundo Serafin Carabajal', '1964-10-27', '17161996', '', '2954325879', '', 'CORPO 5GB', '360', '', '2024-04-18', 'gral Acha', '624', '', '', 'Telem y Toay', 'La Pampa', 'Santa Rosa', '6304', '', '', '', '', '', '', 'CUMPLIDA', 422644, '', '2024-05-03', NULL),
(429396, 'martinaballesteros@vxt.com', 'PORTA', '2215900315', '', '', 'Oda Rebeca Herrera', '1964-10-25', '34816848', '', '2214191687', '', 'CORPO 5GB', '350', '', '2024-04-18', 'CALLE 125 ', '2133', '', '', 'CALLE 18 Y CALLE 18 ESTE', 'BUENOS AIRES', 'BERISSO', '1914', '', '', '', '', '', '', 'CUMPLIDA', 422627, '', '2024-04-30', NULL);
INSERT INTO `ventas` (`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, `comentarios`, `estadoventa`, `numerosolicitud`, `archivo`, `fechaportacion`, `fechadecambio`) VALUES
(429397, 'renatabresuti@vxt.com', 'PORTA', '1153046982', '', '', 'CARLOS ALBERTO ACOSTA', '1964-10-23', '20152715', '', '1153046982', '', 'CORPO 5GB', '285', '', '2024-04-18', 'magdalena ', '1086', '', '', 'larralde y arredondo', 'BUENOS AIRES', 'villa dominico ', '1874', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422591, '', '2024-04-29', NULL),
(429398, 'renatabresuti@vxt.com', 'PORTA', '1162557506', '', '', 'CARLOS ALBERTO ACOSTA', '1964-10-21', '20152715', '', '1153046982', '', 'CORPO 5GB', '285', '', '2024-04-18', 'magdalena ', '1086', '', '', 'larralde y arredondo', 'BUENOS AIRES', 'villa dominico ', '1874', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422593, '', '2024-04-29', NULL),
(429399, 'martinaballesteros@vxt.com', 'PORTA', '2996370284', '', '', 'Luis Ernesto Nuñez', '1964-10-18', '25113604', '', '2996371542', '', 'CORPO 5GB', '360', '', '2024-04-18', 'julio Roca ', '246', '', '', 'Salta y San Martin ', 'Neuquen', 'Cultral Co ', 'Q8322', '', '', '', '', '', '', 'CUMPLIDA', 422586, '', '2024-04-29', NULL),
(429400, 'renatabresuti@vxt.com', 'PORTA', '1126970694', '', '', 'JESICA MARISOL STEFANKIW', '1964-10-16', '36643913', '', '1126970694', '', 'CORPO 5GB', '360', '', '2024-04-18', 'guillermo marconi ', '328', '', '', 'catamarca y republica de libano ', 'BUENOS AIRES', 'QUILMES OESTE       ', '1879', '', '', '', '', '', '', 'CANCELADA', 422640, '', '', NULL),
(429401, 'renatabresuti@vxt.com', 'PORTA', '1149919858', '', '', 'CARLOS ALBERTO ACOSTA', '1964-10-24', '20152715', '', '1153046982', '', 'CORPO 5GB', '285', '', '2024-04-18', 'magdalena ', '1086', '', '', 'larralde y arredondo', 'BUENOS AIRES', 'villa dominico ', '1874', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422590, '', '2024-04-29', NULL),
(429402, 'renatabresuti@vxt.com', 'PORTA', '1153046851', '', '', 'CARLOS ALBERTO ACOSTA', '1964-10-22', '20152715', '', '1153046982', '', 'CORPO 5GB', '285', '', '2024-04-18', 'magdalena ', '1086', '', '', 'larralde y arredondo', 'BUENOS AIRES', 'villa dominico ', '1874', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422592, '', '2024-04-29', NULL),
(429403, 'martinsuarez@vxt.com', 'PORTA', '1122376040', '', '', 'VALENTIN LIZASO', '1964-10-20', '33344999', '', '1166490767', '', 'CORPO 5GB', '350', '', '2024-04-18', 'Homero', '1772', '', '', 'florida y ruta 8', 'buenos aires', 'del viso ', '1669', '', '', '', '', '', '', 'CUMPLIDA', 422595, '', '2024-04-29', NULL),
(429404, 'martinsuarez@vxt.com', 'PORTA', '1167801837', '', '', 'JUAN ANTONIO LUNA', '1964-10-28', '14198692', '', '1167010863', '', 'CORPO 5GB', '813', '', '2024-04-18', 'Diego de Villarroel', '10578', '', '', 'aeronautica argentina y giacomo puccini', 'buenos aires', 'trujui', '1736', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422614, '', '2024-05-16', NULL),
(429405, 'martinaballesteros@vxt.com', 'PORTA', '2954325879', '', '', 'Segundo Serafin Carabajal', '1964-10-26', '17161996', '', '2954467460', '', 'CORPO 5GB', '360', '', '2024-04-18', 'gral Acha', '624', '', '', 'Telem y Toay', 'La Pampa', 'Santa Rosa', '6304', '', '', '', '', '', '', 'CUMPLIDA', 422645, '', '2024-05-03', NULL),
(429406, 'martinsuarez@vxt.com', 'PORTA', '2994066088', '', '', 'MARIANA ANAHI GARCIA', '1964-10-07', '23098825', '', '2994086705', '', 'CORPO 5GB', '555', '', '2024-04-19', 'Gral. Conrado Villegas ', '772', '', '', 'manuel alberti y domingo basavilbaso', 'neuquen', 'neuquen', '8300', '', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 422892, '', '', NULL),
(429407, 'mariaperez@vxt.com', 'PORTA', '2974664143', '', '', 'VERONICA CRISTINA ZAMPACH', '1964-10-05', '21961155', '', '2974664225', '', 'CORPO 5GB', '360', '', '2024-04-19', 'Urcelay ', ' B2814CNG Los Cardales', '', '', ' Provincia de Buenos Aires', '345', ' pueyrredon y estrada buenos aires los cardales', '2814', '', '', '', '', '', '', 'CANCELADA', 422830, '', '', NULL),
(429408, 'martinsuarez@vxt.com', 'PORTA', '1123513012', '', '', 'JOSE LUIS SUAREZ', '1964-10-09', '21887174', '', '1140286156', '', 'CORPO 5GB', '351', '', '2024-04-19', 'estrada', '201', '', '', 'malvinas y costa rica', 'buenos aires', 'LIBERTAD', '1716', '', '', '', '', '', '', 'CANCELADA', 422799, '', '', NULL),
(429409, 'martinaballesteros@vxt.com', 'PORTA', '2644866247', '', '', 'Omar Nicolas Funes ', '1964-10-13', '16523811', '', '2644181609', '', 'CORPO 5GB', '350', '', '2024-04-19', 'Honorio Pueyrredon Oeste ', '1734', '', '', 'Aberastain Sur y Paso de los Andes Sur', 'San Juan', 'Rivadavia', '5400', '', '', '', '', '', '', 'CUMPLIDA', 422850, '', '2024-05-02', NULL),
(429410, 'martinsuarez@vxt.com', 'PORTA', '1130863607', '', '', 'YANCHAGUANO BRYAN ISRAEL LAMINGO', '1964-10-11', '95472293', '', '1137766836', '', 'CORPO 5GB', '98', '', '2024-04-19', 'Azcuénaga ', '227', '', '', 'sarmiento y juan domingo peron', 'buenos aires', 'balvanera', '1029', '', '', '', '', '', '', 'CUMPLIDA', 422891, '', '2024-04-30', NULL),
(429411, 'renatabresuti@vxt.com', 'PORTA', '1159195371', '', '', 'JESICA MARISOL STEFANKIW', '1964-10-08', '36643913', '', '1123652478', '', 'CORPO 5GB', '360', '', '2024-04-19', 'guillermo marconi ', '328', '', '', 'Catamarca y republica de Líbano ', 'buenos aires', 'QUILMES OESTE       ', '1879', '', '', '', '', '', '', 'CANCELADA', 422800, '', '', NULL),
(429412, 'mariaperez@vxt.com', 'PORTA', '2974664225', '', '', 'VERONICA CRISTINA ZAMPACH', '1964-10-06', '21961155', '', '2974664143', '', 'CORPO 5GB', '360', '', '2024-04-19', 'Urcelay ', '345', '', '', ' pueyrredon y estrada', 'buenos aires', 'los cardales', '2814', '', '', '', '', '', '', 'CANCELADA', 422829, '', '', NULL),
(429413, 'martinaballesteros@vxt.com', 'PORTA', '2645298320', '', '', 'Omar Nicolas Funes ', '1964-10-12', '16523811', '', '2644181609', '', 'CORPO 5GB', '350', '', '2024-04-19', 'Honorio Pueyrredon Oeste ', '1734', '', '', 'Aberastain Sur y Paso de los Andes Sur', 'San Juan', 'Rivadavia', '5400', '', '', '', '', '', '', 'CUMPLIDA', 422851, '', '2024-05-02', NULL),
(429414, 'renatabresuti@vxt.com', 'PORTA', '1138664293', '', '', 'ROSENSTEIN PRICSILA IVONE', '1964-10-10', '36937011', '', '1123290288', '', 'CORPO 5GB', '360', '', '2024-04-19', 'Estados Unidos del Brasil ', '3687', '', '', 'mariano moreno ', 'buenos aires', 'Florencio Varela ', '1887', '', '', '', '', '', '', 'CANCELADA', 422858, '', '', NULL),
(429415, 'martinaballesteros@vxt.com', 'PORTA', '2644454103', '', '', 'Omar Nicolas Funes ', '1964-10-14', '16523811', '', '2644181609', '', 'CORPO 5GB', '350', '', '2024-04-19', 'Honorio Pueyrredon Oeste ', '1734', '', '', 'Aberastain Sur y Paso de los Andes Sur', 'San Juan', 'Rivadavia', '5400', '', '', '', '', '', '', 'CUMPLIDA', 422849, '', '2024-05-02', NULL),
(429416, 'renatabresuti@vxt.com', 'PORTA', '1122668830', '', '', 'ISAIAS DAVID FABREGAS ', '1964-09-29', '33286849', '', '1165789555', '', 'CORPO 5GB', '351', '', '2024-04-22', 'BOUCHARD ', '1343', '', '', 'cantilo y españa ', 'buenos aires', 'SAN VICENTE ', '1865', '', '', '', '', '', '', 'CUMPLIDA', 423380, '', '2024-04-30', NULL),
(429417, 'renatabresuti@vxt.com', 'PORTA', '1127710016', '', '', 'RODRIGO SEBASTIAN HUNCO', '1964-10-03', '32279341', '', '1166770190', '', 'CORPO 5GB', '351', '', '2024-04-22', 'C. brughetti ', '3502', '', '', 'San Blas y Tegucigalpa ', 'buenos aires', 'jose c paz ', '1666', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423340, '', '2024-05-14', NULL),
(429418, 'renatabresuti@vxt.com', 'PORTA', '1166770190', '', '', ' MARIANA SOLEDAD SARMIENTO', '1964-10-01', '28846312', '', '1160363504', '', 'CORPO 5GB', '351', '', '2024-04-22', 'C. brughetti ', '3502', '', '', 'San Blas y Tegucigalpa ', 'buenos aires', 'jose c paz ', '1666', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423344, '', '2024-04-30', NULL),
(429419, 'martinaballesteros@vxt.com', 'PORTA', '1138608960', '', '', 'Irina Yael Rojo ', '1964-09-28', '31829620', '', '11452805760', '', 'CORPO 5GB', '360', '', '2024-04-22', 'Nueva York ', '7039', '', '', 'Guandacol y Maximo Herrera', 'Buenos Aires', 'Virrey del Pino ', 'B1764', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423335, '', '2024-04-30', NULL),
(429420, 'renatabresuti@vxt.com', 'PORTA', '1130616230', '', '', 'CLAUDIO FABIAN RIOS ', '1964-09-30', '21922535', '', '1125689412', '', 'CORPO 5GB', '360', '', '2024-04-22', 'Estanislao del campo ', '1176', '', '', 'piñero y 18 de octubre', 'buenos aires', 'jose c paz ', '1666', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423347, '', '2024-04-30', NULL),
(429421, 'renatabresuti@vxt.com', 'PORTA', '1160363504', '', '', 'RODRIGO SEBASTIAN HUNCO', '1964-10-04', '32279341', '', '1166770190', '', 'CORPO 5GB', '351', '', '2024-04-22', 'C. brughetti ', '3502', '', '', 'San Blas y Tegucigalpa ', 'buenos aires', 'jose c paz ', '1666', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423339, '', '2024-05-14', NULL),
(429422, 'martinaballesteros@vxt.com', 'PORTA', '2914396699', '', '', ' NEHUEN EMMANUEL QUIMEY LAMAS GUANUCO', '1964-10-02', '40099304', '', '2914222169', '', '﻿5GB', '350', '', '2024-04-22', '17 de mayo ', '389', '', '', 'Viamonte y Castelli', 'Buenos Aires', 'Bahía Blanca', 'B8003', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423337, '', '2024-04-30', NULL),
(429423, 'mariaperez@vxt.com', 'PORTA', '1126793874', '', '', 'DAIANA MIRIAM GUERRA', '1964-09-25', '33380189', '', '1171472032', '', 'CORPO 5GB', '687', '', '2024-04-23', 'Carlos Pellegrini', '6083', '', '', '25 de mayo y coronel pringles ', 'buenos aires', ' Billinghurst  partido general san martin', '1650', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423676, '', '2024-05-09', NULL),
(429424, 'martinsuarez@vxt.com', 'PORTA', '1149605713', '', '', 'NICOLAS MARTIN GIOVANETTI', '1964-09-23', '32288883', '', '1141709778', '', 'CORPO 10GB', '360', '', '2024-04-23', 'Av. Olazábal', '4545', '', '', ' Alvares thomas y miller', 'buenos aires', 'villa urquiza', '1431', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423705, '', '2024-05-02', NULL),
(429425, 'martinsuarez@vxt.com', 'PORTA', '1140664224', '', '', 'NICOLAS MARTIN GIOVANETTI', '1964-09-20', '32288883', '', '1141709778', '', 'CORPO 5GB', '360', '', '2024-04-23', 'Av. Olazábal', '4545', '', '', ' Alvares thomas y miller', 'buenos aires', 'villa urquiza', '1431', '', '', '', '', '', '', 'INGRESADA TASA', 423703, '', '', NULL),
(429426, 'renatabresuti@vxt.com', 'PORTA', '2944666975', '', '', 'ANA CAROLINA MANCINELLI', '1964-09-27', '23226201', '', '2944698745', '', 'CORPO 5GB', '350', '', '2024-04-23', 'Hilario Cuadros ', '181', '', '', 'ayelén y abel fleuri ', 'san carlos de bariloche ', 'rio negro ', '8400', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423693, '', '2024-05-23', NULL),
(429427, 'renatabresuti@vxt.com', 'PORTA', '2615787756', '', '', 'GUSTAVO FABIAN ANDRE LAZZARINI', '1964-09-18', '23692853', '', '2616510287', '', 'CORPO 5GB', '360', '', '2024-04-23', 'cervantes ', '2289', '', '', 'Rawson y Hernandarias ', 'mendoza', 'godoy cruz', '5501', '', '', '', '', '', '', 'CANCELADA', 423696, '', '', NULL),
(429428, 'renatabresuti@vxt.com', 'PORTA', '2615739660', '', '', 'GUSTAVO FABIAN ANDRE LAZZARINI', '1964-09-16', '23692853', '', '2615787756', '', 'CORPO 5GB', '360', '', '2024-04-23', 'cervantes ', '2289', '', '', 'Rawson y Hernandarias ', 'mendoza', 'godoy cruz', '5501', '', '', '', '', '', '', 'CANCELADA', 423698, '', '', NULL),
(429429, 'renatabresuti@vxt.com', 'PORTA', '2615408312', '', '', 'GUSTAVO FABIAN ANDRE LAZZARINI', '1964-09-14', '23692853', '', '2615787756', '', 'CORPO 5GB', '360', '', '2024-04-23', 'cervantes ', '2289', '', '', 'Rawson y Hernandarias ', 'mendoza', 'godoy cruz', '5501', '', '', '', '', '', '', 'CANCELADA', 423699, '', '', NULL),
(429430, 'martinsuarez@vxt.com', 'PORTA', '1167010863', '', '', 'JUAN ANTONIO LUNA', '1964-09-19', '14198692', '', '1167801837', '', 'CORPO 5GB', '813', '', '2024-04-23', 'Diego de Villarroel', '10578', '', '', 'aeronautica argentina y giacomo puccini', 'buenos aires', ' trujui', '1736', '', '', '', '', '', '', 'CANCELADA', 423690, '', '', NULL),
(429431, 'martinsuarez@vxt.com', 'PORTA', '1138646233', '', '', 'LORENA BEATRIZ GUCHEA', '1964-09-26', '29908352', '', '1123835197', '', 'CORPO 5GB', '209', '', '2024-04-23', 'Primera Junta', '69', '', '', 'bandera nacional y avenida rivadavia', 'buenos aires', 'marcos paz', '1724', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423668, '', '2024-05-15', NULL),
(429432, 'martinsuarez@vxt.com', 'PORTA', '1141709778', '', '', 'NICOLAS MARTIN GIOVANETTI', '1964-09-24', '32288883', '', '1141709778', '', 'CORPO 5GB', '360', '', '2024-04-23', 'Av. Olazábal', '4545', '', '', ' Alvares thomas y miller', 'buenos aires', 'villa urquiza', '1431', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423704, '', '2024-05-02', NULL),
(429433, 'mariaperez@vxt.com', 'PORTA', '2613387751', '', '', 'ANABEL ROXANA ALARCON', '1964-09-21', '34191080', '', '2616523561', '', 'CORPO 5GB', '350', '', '2024-04-23', 'Los Periodistas', '3061', '', '', 'CERRO JUNCAL Y LOS ESCULTORES ', 'MENDOZA', 'MAIPU', '5515', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423682, '', '2024-04-30', NULL),
(429434, 'renatabresuti@vxt.com', 'PORTA', '2616510287', '', '', 'GUSTAVO FABIAN ANDRE LAZZARINI', '1964-09-17', '23692853', '', '2615787756', '', 'CORPO 5GB', '360', '', '2024-04-23', 'cervantes ', '2289', '', '', 'Rawson y Hernandarias ', 'mendoza', 'godoy cruz', '5501', '', '', '', '', '', '', 'CANCELADA', 423697, '', '', NULL),
(429435, 'martinaballesteros@vxt.com', 'PORTA', '2617234237', '', '', 'Gabriel Guillermo Lemos', '1964-09-15', '39381071', '', '2617254651', '', 'CORPO 5GB', '300', '', '2024-04-23', 'Puerto Rico', '2247', '', '', 'Correa Saa y Granaderos San Martin ', 'Mendoza', 'Guaymallen ', '5519', '', '', '', '', '', '', 'CANCELADA', 423671, '', '', NULL),
(429436, 'martinsuarez@vxt.com', 'PORTA', '1169309295', '', '', 'GISELA ANALIA CAGESSO', '1964-09-12', '23866667', '', '1133064839', '', 'CORPO 5GB', '350', '', '2024-04-24', 'libertador gral san martin ', '3258', '', '', 'pasteur y carrasco', 'buenos aires', 'san justo ', '', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423882, '', '2024-05-09', NULL),
(429437, 'renatabresuti@vxt.com', 'PORTA', '2942699197', '', '', 'MARINA ALEJANDRA BARROS ', '1964-09-10', '43947258', '', '2942638794', '', 'CORPO 15GB', '360', '', '2024-04-24', 'Antártida argentina ', '478', '', '', '25 de mayo y chachil', 'Neuquén ', 'Zapala ', '8340', '', '', '', '', '', '', 'CANCELADA', 423829, '', '', NULL),
(429438, 'martinsuarez@vxt.com', 'PORTA', '1133064839', '', '', 'GISELA ANALIA CAGESSO', '1964-09-11', '23866667', '', '1169309295', '', 'CORPO 5GB', '350', '', '2024-04-24', 'libertador gral san martin ', '3258', '', '', 'pasteur y carrasco', 'buenos aires', 'san justo ', '1754', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423883, '', '2024-05-09', NULL),
(429439, 'martinaballesteros@vxt.com', 'PORTA', '2657608706', '', '', 'Sebastian Julio Volando ', '1964-09-09', '40484735', '', '2657709529', '', 'CORPO 5GB', '340', '', '2024-04-24', 'M Olagaray', '418', '', '', 'Brasil y Bolivia', 'San Luis', 'Villa Mercedes', '5730', '', '', '', '', '', '', 'CANCELADA', 423830, '', '', NULL),
(429440, 'renatabresuti@vxt.com', 'PORTA', '1149175193', '', '', 'ROSA LINDA ALVAREZ MEDRANO', '1964-09-13', '95223190', '', '1166034442', '', 'CORPO 5GB', '351', '', '2024-04-24', 'la quinta ', '64', '', '', 'Benavidez ', 'buenos aires', '9 de abril', '1839', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423885, '', '2024-05-10', NULL),
(429441, 'martinaballesteros@vxt.com', 'PORTA', '2914264920', '', '', 'Luis Alberto Gonzalez', '1964-09-06', '14721429', '', '2914500507', '', 'CORPO 5GB', '360', '', '2024-04-25', 'maldonado', '2293', '', '', 'Pacifico y Sgto Mayor Iturra', 'Buenos Aires', 'Bahía Blanca', '8003', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424113, '', '2024-05-13', NULL),
(429442, 'martinsuarez@vxt.com', 'PORTA', '1153132449', '', '', 'CLAUDIO GUSTAVO TORRES', '1964-09-04', '2054864', '', '5273061828', '', 'CORPO 5GB', '360', '', '2024-04-25', 'CENTENARIO URUGUAYO', '2045', '', '', 'CAMACUA Y GRAL. MANUEL BELGRANO', 'BUENOS AIRES', 'VILLA DOMINICO', '', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424116, '', '2024-05-09', NULL),
(429443, 'renatabresuti@vxt.com', 'PORTA', '2964403115', '', '', 'MARTINEZ MIMICA ENRIQUE ANTONIO ', '1964-09-02', '94832317', '', '2964456894', '', 'CORPO 5GB', '351', '', '2024-04-25', 'J. B. Thorne ', '1613', '', '', 'alma fuerte y gdo. felix paz ', 'tierra del fuego', 'rio grande', '', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 424121, '', '', NULL),
(429444, 'martinsuarez@vxt.com', 'FIBRA', '1153430436', '', '', 'JAVIER ORLANDO OTINIANO', '1964-08-31', '41062735', '', '1144130809', '', 'FIBRA 300 mg', '246', '', '2024-04-25', 'valle', '662', '', '', 'san jose de calasanz y riglos', 'buenos aires', 'caballito', '1406', '', '', '', '', '', '', 'CANCELADA', 424247, '', '', NULL),
(429445, 'martinaballesteros@vxt.com', 'PORTA', '2664300084', '', '', 'Josue Javier Tamburo Balaguer', '1964-09-08', '32239256', '', '2665030015', '', 'CORPO 5GB', '360', '', '2024-04-25', 'Pres', ' Peron ', '', '', '1278', 'Tomas Jofre y las Heras', 'San Luis San Luis', '', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424118, '', '2024-05-15', NULL),
(429446, 'martinaballesteros@vxt.com', 'PORTA', '2665030015', '', '', 'Josue Javier Tamburo Balaguer', '1964-09-07', '32239256', '', '2664300084', '', 'CORPO 5GB', '360', '', '2024-04-25', 'Pres', ' Peron ', '', '', '1278', 'Tomas Jofre y las Heras', 'San Luis San Luis', '', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424119, '', '2024-05-15', NULL),
(429447, 'martinsuarez@vxt.com', 'PORTA', '1170728298', '', '', 'LAURA ISABEL STEPPER', '1964-09-05', '16264509', '', '1164349218', '', 'CORPO 5GB', '350', '', '2024-04-25', 'José María Freire', '862', '', '', 'GDOR OLIDEN Y CORONEL GUIFFRA', 'BUENOS AIRES', 'PINEYRO', '', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424249, '', '2024-05-09', NULL),
(429448, 'martinsuarez@vxt.com', 'PORTA', '1150602211', '', '', 'LAURA ISABEL STEPPER', '1964-09-03', '16264509', '', '1164349218', '', 'CORPO 5GB', '350', '', '2024-04-25', 'José María Freire', '862', '', '', 'GDOR OLIDEN Y CORONEL GUIFFRA', 'BUENOS AIRES', 'PINEYRO', '', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424248, '', '2024-05-09', NULL),
(429449, 'martinaballesteros@vxt.com', 'PORTA', '2644181609', '', '', 'Adriana Elizabeth Landa', '1964-09-01', '20130606', '', '2644454103', '', '6GB', '360', '', '2024-04-25', 'tacuari', '507', '', '', '20 de Junio y Derqui', 'Mendoza', 'Godoy Cruz', '5501', '', '', '', '', '', '', 'CANCELADA', 424123, '', '', NULL),
(429450, 'martinaballesteros@vxt.com', 'PORTA', '2235797041', '', '', 'Mabel Alicia Sanchez', '1964-08-25', '25569722', '', '2235797035', '', 'CORPO 3GB', '360', '', '2024-04-26', 'L. Parodi', '6061', '', '', 'Los Manzanos y Mahatma Ghandi', 'Buenos Aires', 'Mar del Plata', '7605', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 424340, '', '', NULL),
(429451, 'mariaperez@vxt.com', 'PORTA', '2615027525', '', '', 'DAVID ANTONIO LARA MIRANDA', '1964-08-29', '94198012', '', '2616974939', '', 'CORPO 5GB', '360', '', '2024-04-26', 'rio diamante y rio mendoza. BARRIO LAS AMERICAS ', 'MANZANA B CASA 13', '', '', 'RIO MENDOZA Y PASAJE L', 'MENDOZA', 'MAIPU', '5515', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424336, '', '2024-05-08', NULL),
(429452, 'martinaballesteros@vxt.com', 'PORTA', '2235797035', '', '', 'Mabel Alicia Sanchez', '1964-08-27', '25569722', '', '2235797041', '', 'CORPO 3GB', '360', '', '2024-04-26', 'L. Parodi', '6061', '', '', 'Los Manzanos y Mahatma Ghandi', 'Buenos Aires', 'Mar del Plata', '7605', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 424341, '', '', NULL),
(429453, 'mariaperez@vxt.com', 'PORTA', '1168085591', '', '', 'FELIX ALBERTO ROJAS', '1964-08-28', '25474199', '', '1135203497', '', 'CORPO 5GB', '360', '', '2024-04-26', 'Guaminí ', '372', '', '', 'marcella y puerto argentino', 'buenos aires', 'ingeniero budge', '1821', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424337, '', '2024-05-08', NULL),
(429454, 'martinaballesteros@vxt.com', 'PORTA', '2235797081', '', '', 'Mabel Alicia Sanchez', '1964-08-26', '25569722', '', '2235797041', '', 'CORPO 3GB', '360', '', '2024-04-26', 'L. Parodi', '6061', '', '', 'Los Manzanos y Mahatma Ghandi', 'Buenos Aires', 'Mar del Plata', '7605', '', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 424339, '', '', NULL),
(429455, 'martinsuarez@vxt.com', 'ALTA NUEVA', '0', '', '', 'DAMIAN ANDRES SALAS', '1964-08-30', '29537954', '', '2616500300', '', 'CORPO 5GB', '350', '', '2024-04-26', 'RIOJA', '1373', '', '', 'BUENOS AIRES Y LAVALLE', 'MENDOZA', 'CIUDAD', '5500', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424345, '', '2024-05-18', NULL),
(429456, 'martinsuarez@vxt.com', 'PORTA', '1122170262', '', '', 'JOSE ERNESTO DIAZ', '1964-08-23', '23627598', '', '1135413987', '', 'CORPO 5GB', '351', '', '2024-04-29', 'Saujil', '8565', '', '', 'santiago del estero y manzanares', 'buenos aires', 'virrey del pino ', '1763', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424676, '', '2024-05-10', NULL),
(429457, 'martinsuarez@vxt.com', 'PORTA', '1135413987', '', '', 'JOSE ERNESTO DIAZ', '1964-08-21', '23627598', '', '1122170262', '', 'CORPO 5GB', '351', '', '2024-04-29', 'Saujil', '8565', '', '', 'santiago del estero y manzanares', 'buenos aires', 'virrey del pino ', '1763', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424678, '', '2024-05-10', NULL),
(429458, 'martinsuarez@vxt.com', 'PORTA', '1136364819', '', '', 'FRANCO DARIO VELARDEZ', '1964-08-18', '34186346', '', '1161609374', '', 'CORPO 5GB', '504', '', '2024-04-29', 'Moisés Lebensohn', '833', '', '', 'Edmundo Fernandes y Rivero', 'Buenos Aires', 'Piñeyro', '1668', '', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 424680, '', '', NULL),
(429459, 'martinaballesteros@vxt.com', 'PORTA', '1133481939', '', '', 'Francisco Maximiliano Lescano ', '1964-08-20', '35362193', '', '1122784129', '', 'CORPO 5GB', '883', '', '2024-04-29', 'calle 552', '488', '', '', 'C 511 y C 507', 'Buenos Aires', ' Partido Gbdor Costa  Florencio Varela ', '1859', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424664, '', '2024-05-09', NULL),
(429460, 'mariaperez@vxt.com', 'PORTA', '1158179079', '', '', 'NORILDA MARLENE MARTINeZ', '1964-08-24', '36062935', '', '1122838722', '', 'CORPO 5GB', '360', '', '2024-04-29', 'Almte. Guillermo Brown ', '610', '', '', 'santiago de liniers y mariano necochea', 'buenos aires', 'pilar', '1629', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424666, '', '2024-05-10', NULL),
(429461, 'martinsuarez@vxt.com', 'PORTA', '1158955913', '', '', 'JOSE ERNESTO DIAZ', '1964-08-22', '23627598', '', '1122170262', '', 'CORPO 5GB', '351', '', '2024-04-29', 'Saujil', '8565', '', '', 'santiago del estero y manzanares', 'buenos aires', 'virrey del pino ', '1763', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424677, '', '2024-05-10', NULL),
(429462, 'renatabresuti@vxt.com', 'PORTA', '1163782311', '', '', 'GONZALO NAHUEL SOSA', '1964-08-19', '33459251', '', '1162543348', '', 'CORPO 5GB', '351', '', '2024-04-29', 'machado ', '2174', '', '', 'chivilcoy y padre arrieta ', 'buenos aires', 'Castelar', '1712', '', '', '', '', '', '', 'CANCELADA', 424669, '', '', NULL),
(429463, 'mariaperez@vxt.com', 'PORTA', '2236021705', '', '', 'CARLOS ALBERTO RODRIGUEZ', '1964-08-12', '32128198', '', '3415065390', '', 'CORPO 3 GB', '806', '', '2024-04-30', 'Cnel. de Marina Seguí 1308', ' Valeria del Mar', '', '', ' Provincia de Buenos Aires', '1308', 'yanez pinzon y urquiza buenos aires valeria del mar', '7167', '', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 424928, '', '', NULL),
(429464, 'mariaperez@vxt.com', 'PORTA', '2615944455', '', '', 'PAOLA CAROLINA FRESNEDA', '1964-08-16', '28793078', '', '2613635466', '', 'CORPO 5GB', '350', '', '2024-04-30', 'victoria ', '257', '', '', 'yatay y federico froebel', 'Mendoza', 'villa nueva', '', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424913, '', '2024-05-07', NULL),
(429465, 'renatabresuti@vxt.com', 'PORTA', '2944285140', '', '', 'GUILLERMO GABRIEL BARRIGA ', '1964-08-14', '27436739', '', '2944707659', '', 'CORPO 5GB', '351', '', '2024-04-30', 'peulla ', '647', '', '', 'chapel y siempre viva', 'Neuquén ', 'Bariloche ', '8400', '', '', '', '', '', '', 'CANCELADA', 424915, '', '', NULL),
(429466, 'martinaballesteros@vxt.com', 'PORTA', '1136381901', '', '', 'Leandro Mauro Kamlofsky', '1964-08-17', '28697319', '', '1160672524', '', 'CORPO 5GB', '301', '', '2024-04-30', 'Jose Darragueira', '1497', '', '', 'Estrada y Comahue', 'Buenos Aires', 'Banfield', '1828', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424922, '', '2024-05-13', NULL),
(429467, 'mariaperez@vxt.com', 'PORTA', '2613635466', '', '', 'PAOLA CAROLINA FRESNEDA', '1964-08-15', '28793078', '', '2615944455', '', 'CORPO 5GB', '350', '', '2024-04-30', 'victoria ', '257', '', '', 'yatay y federico froebel', 'Mendoza', 'villa nueva', '', '', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424914, '', '2024-05-07', NULL),
(429468, 'renatabresuti@vxt.com', 'PORTA', '2944707659', '', '', 'VIRNA SOLEDAD RODRIGUEZ', '1964-08-13', '25825617', '', '2944285140', '', 'CORPO 5GB', '351', '', '2024-04-30', 'peulla ', '647', '', '', 'chapel y siempre viva', 'Neuquén ', 'Bariloche ', '8400', '', '', '', '', '', '', 'CANCELADA', 424918, '', '', NULL),
(429480, 'Melisa Valdez', 'FIBRA', '2615915734', '', '', 'AIME LUCIANA REINA CACERES', '2005-05-26', '46484089', '27464840899', '2615915734', 'JUAN_CACERES29@HOTMAIL.COM', 'FIBRA 1 GIGA', '780', 'VERIFICAR MEDIO DIA ', '2024-05-24', 'ITUZAINGO ', '2209 ', '-', '-', '  maipu y chacabuco', ' Mendoza', 'MENDOZA', '5500', '-32.87762565277993, -68.82916928800377', 'https://maps.app.goo.gl/gMdwUgQSN4cXjAQRA', '', '', '', 'TV DIGITAL + 1 DECO ', 'POST VENTA', 0, '', '', '2024-05-24'),
(429481, 'Melisa Valdez', 'FIBRA', '1166397006  ', '', '', 'LUCAS GABRIEL ABALLAY', '1996-11-28', '41389279', '20413892792', '1158397032', 'lucilapizzarro671@gmail.com.ar', 'FIBRA 100 MG', '494', 'verificar de 12 a 16 hs ', '2024-05-24', 'Calle 827  ', '2702 ', '-', '2', 'donato alvarez y 898 ', ' Buenos Aires', ' san Francisco Solano ', '1881 ', '-34.77185514311757, -58.32406417628245', 'https://maps.app.goo.gl/BHGThdgE3kanNPTq9', '', '', '', 'TV DIGITAL //  1158397032 totalizar ', 'POST VENTA', 0, '', '', NULL),
(429482, 'Luis Salgado', 'PORTA', '1125968098', 'CLARO', 'ABONO', 'ERICK MARCELO QUISPE AMADOR', '1991-07-07', '95847094', '958470948', '1155923155', 'emarcelo64@gmail.com', 'CORPO 5GB', '360', 'TODO EL DIA', '2024-05-24', 'SOLER', '3333', '-', '-', 'GALLO Y BUSTAMANTE', ' Buenos Aires', 'CABA', '1425', '', 'https://www.google.com/maps/place/Soler+3333,+C1425+Cdad.+Aut%C3%B3noma+de+Buenos+Aires/@-34.5958728,-58.4145316,17z/data=!3m1!4b1!4m6!3m5!1s0x95bcca8606a8eb73:0x7a4965c4ba95c8ed!8m2!3d-34.5958772!4d-58.4119567!16s%2Fg%2F11jzwm656n?entry=ttu', '', '', '', 'LINEA E-SIM', 'POST VENTA', 0, '', '', '2024-05-24'),
(429483, 'martinaballesterossupervisora@vxt.com', 'FIBRA', '1158304075', '', '', 'NICOLE NOEMI VIDAL', '1995-02-22', '46425100', '27464251001', '1163777631', 'vidalnicole254@gmail.com', 'FIBRA 300 mg', '780', 'TODO EL DIA', '2024-05-24', 'ESTOCOLMO ', '519', 'PB', '4', 'Jose m Jorge y Merlo atras Viena ', ' Buenos Aires', 'LOMAS DE ZAMORA', '1832', '-38.943716890445295, -68.0815915709707', 'https://www.google.com/maps/place/FYM,+Estocolmo+519,+B1832+Lomas+de+Zamora,+Provincia+de+Buenos+Aires/@-34.7727531,-58.4339304,17z/data=!3m1!4b1!4m6!3m5!1s0x95bcd242f6eb97e1:0x50418d1e8fa077ec!8m2!3d-34.7727575!4d-58.4313555!16s%2Fg%2F11h7s0j7r9?entry=ttu', 'EFECTIVO', 'LAVALLOL', '016', 'PRUEBAS PRUEBAS', 'POST VENTA', 0, '', '', '2024-05-24'),
(429484, 'martinsuarez@vxt.com', 'PORTA', '2396619711', 'CLARO', 'ABONO', 'ROSINA MAGGIO', '1995-01-31', '38702755', '27387027551', '2215041059', 'rosinamaggio@gmail.com', 'CORPO 5GB', '360', 'mañana Todo el diaa', '2024-05-24', ' Calle 16 ', '1358', '-', '-', 'entre 60 y 61', ' Buenos Aires', 'LA PLATA', '1900', '-34.929321660101685, -57.950391488217505', 'https://www.google.com/maps/place/34%C2%B055\'46.3%22S+57%C2%B057\'01.6%22W/@-34.9295196,-57.9530093,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-34.9295196!4d-57.9504344?hl=es&entry=ttu', '', '', '', '', 'POST VENTA', 0, '', '', NULL),
(429485, 'martinaballesterossupervisora@vxt.com', 'FIBRA', '2993289827 ', '', '', 'TREVER SUSANA ELISA QUIROZ', '1971-05-05', '92378610', '23923786104', '2994595884', 'auritamonsalves30@gmail.com', 'FIBRA 100 MG', '360', 'DE MAÑANA', '2024-05-24', 'CNEL PRINGLES', '1185', '-', '-', 'BATILIANA Y CASTELLI', ' Neuquen', 'NEUQUEN', '8302', '-38.94373566556901, -68.08180614768193', 'https://www.google.com/maps/place/38%C2%B056&#39;37.8%22S+68%C2%B004&#39;54.3%22W/@-38.94384,-68.0843274,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-38.94384!4d-68.0817525?hl=es&entry=ttu', '4092301461793484', 'NEUQUEN', '2497', 'Barrio Islas Malvinas Mza 56 lote 24', 'POST VENTA', 0, '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaseliminadas`
--

CREATE TABLE `ventaseliminadas` (
  `id` int(11) NOT NULL,
  `vendedor` varchar(300) NOT NULL,
  `producto` varchar(250) NOT NULL,
  `linea` varchar(300) NOT NULL,
  `empresa` varchar(250) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `nombrecliente` varchar(250) NOT NULL,
  `fechanacimientocliente` date NOT NULL,
  `documentocliente` varchar(500) NOT NULL,
  `cuitcliente` varchar(120) NOT NULL,
  `numeroalternativo` varchar(300) NOT NULL,
  `email` varchar(120) NOT NULL,
  `planes` varchar(300) NOT NULL,
  `score` varchar(300) NOT NULL,
  `verificacion` varchar(120) NOT NULL,
  `fechacarga` date NOT NULL,
  `calle` varchar(500) NOT NULL,
  `numero` varchar(500) NOT NULL,
  `piso` varchar(500) NOT NULL,
  `dpto` varchar(500) NOT NULL,
  `entrecalles` varchar(500) NOT NULL,
  `provincia` varchar(500) NOT NULL,
  `localidad` varchar(500) NOT NULL,
  `codigopostal` varchar(500) NOT NULL,
  `coordenadas` varchar(500) NOT NULL,
  `linkgooglemaps` varchar(500) NOT NULL,
  `tarjetacredito` varchar(250) NOT NULL,
  `central` varchar(250) NOT NULL,
  `manzanaregistro` varchar(250) NOT NULL,
  `comentarios` varchar(500) NOT NULL,
  `estadoventa` varchar(120) NOT NULL,
  `numerosolicitud` int(120) NOT NULL,
  `archivo` varchar(500) NOT NULL,
  `fechaportacion` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventaseliminadas`
--

INSERT INTO `ventaseliminadas` (`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, `comentarios`, `estadoventa`, `numerosolicitud`, `archivo`, `fechaportacion`) VALUES
(22, 'martinsuarez@vxt.com', 'ALTA NUEVA', '2612590713', 'CLARO', 'ABONO', 'dfsdfgdfg', '1996-09-02', '40068922', '23400689229', '423423432423423', 'g@g.com', '﻿3GB', '243', 'gfdg', '2024-05-22', 'dfgdf', 'dfgdfg', '-', '-', 'gdfgdf', ' Buenos Aires', 'dfgdfgd', '423', 'fgdfgdfgdf', 'dfgdfgdf', '', '', '', 'dfgdfgd', 'POST VENTA', 0, 'ESCALADA DE PRIVILEGIOS EN LINUX.pdf', ''),
(23, 'martinsuarez@vxt.com', 'ALTA NUEVA', '2612590713', 'CLARO', 'ABONO', 'dfsdfgdfg', '1996-09-02', '40068922', '23400689229', '423423432423423', 'g@g.com', '﻿3GB', '243', 'gfdg', '2024-05-22', 'dfgdf', 'dfgdfg', '-', '-', 'gdfgdf', ' Buenos Aires', 'dfgdfgd', '423', 'fgdfgdfgdf', 'dfgdfgdf', '', '', '', 'dfgdfgd', 'POST VENTA', 0, 'ESCALADA DE PRIVILEGIOS EN LINUX.pdf', ''),
(24, 'martinsuarez@vxt.com', 'ALTA NUEVA', '2612590713', 'CLARO', 'ABONO', 'dfsdfgdfg', '1996-09-02', '40068922', '23400689229', '423423432423423', 'g@g.com', '﻿3GB', '243', 'gfdg', '2024-05-22', 'dfgdf', 'dfgdfg', '-', '-', 'gdfgdf', ' Buenos Aires', 'dfgdfgd', '423', 'fgdfgdfgdf', 'dfgdfgdf', '', '', '', 'dfgdfgd', 'POST VENTA', 0, 'ESCALADA DE PRIVILEGIOS EN LINUX.pdf', ''),
(25, 'martinsuarez@vxt.com', 'ALTA NUEVA', '2612590713', 'CLARO', 'ABONO', 'dfsdfgdfg', '1996-09-02', '40068922', '23400689229', '423423432423423', 'g@g.com', '﻿3GB', '243', 'gfdg', '2024-05-22', 'dfgdf', 'dfgdfg', '-', '-', 'gdfgdf', ' Buenos Aires', 'dfgdfgd', '423', 'fgdfgdfgdf', 'dfgdfgdf', '', '', '', 'dfgdfgd', 'POST VENTA', 0, 'ESCALADA DE PRIVILEGIOS EN LINUX.pdf', ''),
(26, 'martinaballesterossupervisora@vxt.com', 'PORTA', '2617041326', 'CLARO', 'ABONO', 'MARTINA BALLESTEROS', '1999-02-01', '41728225', '23417282254', '2611111111', 'martiballesterosm@gmail.com', 'CORPO 15GB', '360', 'TODO EL DIA', '2024-05-24', 'Corrientes', '385', '-', '-', 'Zapiola y Navarro', ' Buenos Aires', 'Mar del Plata', '5500', '', 'https://www.google.com/maps/place/Hilario+Ascasubi+%26+Av.+Rivadavia,+Campana,+Provincia+de+Buenos+Aires/@-34.1993732,-58.9646443,17z/data=!3m1!4b1!4m6!3m5!1s0x95bb719f211e547b:0x6d1b7e6ae404db5c!8m2!3d-34.1993777!4d-58.9620694!16s%2Fg%2F11gdl7r4j_?entry=ttu', '', '', '', '', 'POST VENTA', 0, 'WhatsApp Image 2024-05-16 at 14.39.25.jpeg', ''),
(27, 'martinaballesterossupervisora@vxt.com', 'PORTA', '2617041326', 'CLARO', 'ABONO', 'MARTINA BALLESTEROS', '1999-02-01', '41728225', '23417282254', '2611111111', 'martiballesterosm@gmail.com', 'CORPO 15GB', '360', 'TODO EL DIA', '2024-05-24', 'Corrientes', '385', '-', '-', 'Zapiola y Navarro', ' Buenos Aires', 'Mar del Plata', '5500', '', 'https://www.google.com/maps/place/Hilario+Ascasubi+%26+Av.+Rivadavia,+Campana,+Provincia+de+Buenos+Aires/@-34.1993732,-58.9646443,17z/data=!3m1!4b1!4m6!3m5!1s0x95bb719f211e547b:0x6d1b7e6ae404db5c!8m2!3d-34.1993777!4d-58.9620694!16s%2Fg%2F11gdl7r4j_?entry=ttu', '', '', '', '', 'POST VENTA', 0, 'WhatsApp Image 2024-05-16 at 14.39.25.jpeg', ''),
(28, 'martinaballesterossupervisora@vxt.com', 'PORTA', '2617776662', 'CLARO', 'ABONO', 'maribel', '1999-08-07', '37234567', '23372345674', '2517777777', 'mabyalisan215@gmail.com', 'CORPO 10GB', '360', 'TODO EL DIA', '2024-05-24', 'Corrientes', '624', '-', '-', 'Pablo Lamberti y Cabo Primero Sullings', ' Buenos Aires', 'Mar del Plata', '5539', '-34.97480041312115, -58.00052437883639', 'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&entry=ttu', '', '', '', '', 'POST VENTA', 0, 'WhatsApp Image 2024-05-16 at 14.39.25.jpeg', ''),
(29, 'martinaballesterossupervisora@vxt.com', 'PORTA', '2617776662', 'CLARO', 'ABONO', 'maribel', '1999-08-07', '37234567', '23372345674', '2517777777', 'mabyalisan215@gmail.com', 'CORPO 10GB', '360', 'TODO EL DIA', '2024-05-24', 'Corrientes', '624', '-', '-', 'Pablo Lamberti y Cabo Primero Sullings', ' Buenos Aires', 'Mar del Plata', '5539', '-34.97480041312115, -58.00052437883639', 'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&entry=ttu', '', '', '', '', 'POST VENTA', 0, 'PALLERES__JUAN_IGNACIO_20240522_111022_const.PDF.pdf', ''),
(30, 'martinaballesterossupervisora@vxt.com', 'PORTA', '2617776662', 'CLARO', 'ABONO', 'maribel', '1999-08-07', '37234567', '23372345674', '2517777777', 'mabyalisan215@gmail.com', 'CORPO 10GB', '360', 'TODO EL DIA', '2024-05-24', 'Corrientes', '624', '-', '-', 'Pablo Lamberti y Cabo Primero Sullings', ' Buenos Aires', 'Mar del Plata', '5539', '-34.97480041312115, -58.00052437883639', 'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&entry=ttu', '', '', '', '', 'POST VENTA', 0, 'WhatsApp Image 2024-05-18 at 09.56.13.jpeg', ''),
(34, 'martinaballesterossupervisora@vxt.com', 'PORTA', '3885011735', 'CLARO', 'ABONO', 'Mabel Alicia Sanchez', '1999-02-01', '31185724', '20178021339', '749283432', 'mar_jb99@hotmail.com', '15GB', '360', 'TODO EL DIA', '2024-05-24', 'Corrientes', '624', '-', '-', 'Zapiola y Navarro', ' Buenos Aires', 'Mar del Plata', '5539', '-34.4113159131452, -58.73884375276969', 'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&entry=ttu', '', '', '', '', 'POST VENTA', 0, '', ''),
(35, 'martinaballesterossupervisora@vxt.com', 'PORTA', '3885011735', 'CLARO', 'ABONO', 'Mabel Alicia Sanchez', '1999-02-01', '31185724', '20178021339', '749283432', 'mar_jb99@hotmail.com', '15GB', '360', 'TODO EL DIA', '2024-05-24', 'Corrientes', '624', '-', '-', 'Zapiola y Navarro', ' Buenos Aires', 'Mar del Plata', '5539', '-34.4113159131452, -58.73884375276969', 'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&entry=ttu', '', '', '', '', 'POST VENTA', 0, '', ''),
(36, 'martinaballesterossupervisora@vxt.com', 'PORTA', '3885011735', 'CLARO', 'ABONO', 'Mabel Alicia Sanchez', '1999-02-01', '31185724', '20178021339', '749283432', 'mar_jb99@hotmail.com', '15GB', '360', 'TODO EL DIA', '2024-05-24', 'Corrientes', '624', '-', '-', 'Zapiola y Navarro', ' Buenos Aires', 'Mar del Plata', '5539', '-34.4113159131452, -58.73884375276969', 'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&entry=ttu', '', '', '', '', 'POST VENTA', 0, '', ''),
(37, 'RODRIGO NAHUEL BECERRA', 'ALTA NUEVA', '3423423', 'CLARO', 'ABONO', 'fgdfgdfgdf', '2024-05-06', '423423', '234234', '42342', 'gonzalezcastellvigabriel@gmail.com', 'FIBRA 700 MG', '3423', '423fdsf', '2024-05-06', 'fdgdfg', '324', '-', '-', '42342', '23423', '234234', '324234', '23423', '23423', '', '', '', '234324', 'POST VENTA', 0, '2ae41af4-65d6-4bf6-89e5-18be126000ba.jpg', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`);

--
-- Indices de la tabla `archivoseliminados`
--
ALTER TABLE `archivoseliminados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datosusuarios`
--
ALTER TABLE `datosusuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historialegresos`
--
ALTER TABLE `historialegresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historialingresos`
--
ALTER TABLE `historialingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_ventas_documentocliente_aprobada` (`documentocliente`),
  ADD KEY `idx_documentocliente_partial` (`documentocliente`);

--
-- Indices de la tabla `ventaseliminadas`
--
ALTER TABLE `ventaseliminadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_ventas_documentocliente_aprobada` (`documentocliente`),
  ADD KEY `idx_documentocliente_partial` (`documentocliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `archivoseliminados`
--
ALTER TABLE `archivoseliminados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datosusuarios`
--
ALTER TABLE `datosusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `historialegresos`
--
ALTER TABLE `historialegresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `historialingresos`
--
ALTER TABLE `historialingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429486;

--
-- AUTO_INCREMENT de la tabla `ventaseliminadas`
--
ALTER TABLE `ventaseliminadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
