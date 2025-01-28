-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2024 a las 21:39:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

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
  `tamano_archivo` int(11) DEFAULT NULL,
  `ruta_archivo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Volcado de datos para la tabla `cambios_solicitud`
--

INSERT INTO `cambios_solicitud` (`id_solicitud`, `usuario`, `fecha`, `cambios_realizados`, `hora`) VALUES
('429480', 'Gabriel', '2024-05-25', 'nombrecliente: \'GABRIEL GONZALEZ CASTELLVIiii\' => \'GABRIEL GONZALEZ CASTELLVI333\'', '02:06:32'),
('429480', 'Gabriel', '2024-05-25', 'fechadecambio: \'\' => \'2024-05-24\'', '02:20:13'),
('123', 'Gabriel', '2024-05-25', 'estadoventa: \'SOLICITUD CANCELADA\' => \'PENDIENTE DE VERIFICACION\', fechadecambio: \'2024-05-24\' => \'2024-5-24\'', '03:00:12'),
('123', 'Gabriel', '2024-05-25', 'fechadecambio: \'2024-05-24\' => \'2024-5-24\'', '03:00:56'),
('429482', 'Gabriel', '2024-05-25', 'estadoventa: \'PENDIENTE DE VERIFICACION\' => \'SOLICITUD CANCELADA\', fechadecambio: \'2024-05-24\' => \'2024-5-24\'', '03:03:55'),
('429482', 'Gabriel', '2024-05-25', 'estadoventa: \'SOLICITUD CANCELADA\' => \'DEVUELTA X VENDEDOR\', fechadecambio: \'2024-05-24\' => \'2024-5-24\'', '03:08:46'),
('429482', 'Gabriel', '2024-05-25', 'estadoventa: \'DEVUELTA X VENDEDOR\' => \'SOLICITUD CANCELADA\', fechadecambio: \'2024-05-24\' => \'2024-5-24\'', '03:10:16'),
('429482', 'Gabriel', '2024-05-25', 'fechadecambio: \'2024-05-24\' => \'2024-5-24\'', '03:11:44'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'SOLICITUD CANCELADA\' => \'DEVUELTA TASA\', fechadecambio: \'2024-05-24\' => \'2024-5-24\'', '03:12:00'),
('429480', 'Gabriel', '2024-05-25', 'comentarios: \'TV DIGITAL + 1 DECO cacacacacacacaca\' => \'TV DIGITAL + 1 DECO&#13;&#10;&#13;&#10;DALE BOCAAAA\'', '03:15:24'),
('429480', 'Gabriel', '2024-05-25', 'planes: \'FIBRA 1 GIGA\' => \'FIBRA 1 GIGA2\'', '03:20:21'),
('429480', 'Gabriel', '2024-05-25', 'nombrecliente: \'GABRIEL GONZALEZ CASTELLVI333\' => \'GABRIEL GONZALEZ CASTELLVI\'', '03:29:23'),
('429363', 'Gabriel', '2024-05-25', 'fechadecambio: \'\' => \'2024-05-24\'', '03:30:36'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '03:57:11'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'renatabresuti@vxt.com\'', '04:02:40'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:18:48'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:23:13'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:23:41'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:23:47'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:30:33'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:31:51'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:31:52'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'123\'', '04:32:08'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:32:46'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:33:18'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:33:19'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:34:35'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:36:29'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:36:30'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:41:38'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:41:41'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:41:47'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:41:57'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:45:53'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:48:06'),
('429363', 'Gabriel', '2024-05-25', 'numerosolicitud: \'428976\' => \'\'', '04:48:40'),
('429480', 'Gabriel', '2024-05-25', 'numerosolicitud: \'123\' => \'\', nombrecliente: \'GABRIEL GONZALEZ CASTELLVI\' => \'GABRIEL GONZALEZ CASTELLVI11\'', '04:53:49'),
('429480', 'Gabriel', '2024-05-25', 'cuitcliente: \'23400689229111\' => \'23400689229111aaa\'', '04:54:23'),
('429369', 'Gabriel', '2024-05-25', 'documentocliente: \'14978395\' => \'14978395sss\', fechadecambio: \'\' => \'2024-05-24\'', '04:54:48'),
('429480', 'Gabriel', '2024-05-25', 'cuitcliente: \'23400689229111\' => \'23400689229111aaa\'', '04:56:54'),
('429480', 'Gabriel', '2024-05-25', 'nombrecliente: \'GABRIEL GONZALEZ CASTELLVI\' => \'PEDROO\'', '04:57:52'),
('429480', 'Gabriel', '2024-05-25', 'fechadecambio: \'2024-05-24\' => \'2024-05-25\'', '05:10:36'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-05-08 080913 - copia.png', '05:13:09'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-05-08 080913.png', '05:13:09'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-05-08 080922 - copia.png', '05:13:09'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-05-08 080922.png', '05:13:09'),
('429480', '', '2024-05-25', 'Archivo eliminado: Captura de pantalla 2024-05-08 080922 - copia.png', '05:26:48'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-05-22 233905.png', '06:11:22'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-05-22 234153.png', '06:11:22'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-05-23 011559.png', '06:11:22'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-05-23 225425.png', '06:11:22'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: renaaaa.png', '06:11:22'),
('429480', '', '2024-05-25', 'Archivo eliminado: Captura de pantalla 2024-05-22 234153.png', '06:11:59'),
('429480', '', '2024-05-25', 'Archivo eliminado: renaaaa.png', '06:12:22'),
('429480', '', '2024-05-25', 'Archivo eliminado: Captura de pantalla 2024-05-23 011559.png', '06:12:35'),
('429480', '', '2024-05-25', 'Archivo eliminado: Captura de pantalla 2024-05-08 080922.png', '06:12:41'),
('429480', 'Gabriel', '2024-05-25', 'Archivo agregado: renaaaa.png', '06:13:01'),
('429480', 'Gabriel', '2024-05-25', 'linea: \'111111111111111\' => \'2615534452\', nombrecliente: \'PEDROO\' => \'GABRIELA\', fechanacimientocliente: \'2005-05-26\' => \'1964-10-06\', documentocliente: \'40068922\' => \'171392076\', cuitcliente: \'23400689229111aaa\' => \'20173910763\', numeroalternativo: \'2612600814\' => \'2612590713\', email: \'gonzalezcastellvigabriel@gmail.comnn\' => \'info@oficinadeportugues.com\', verificacion: \'MEDIO DIA\' => \'TODO EL DIA\'', '06:14:22'),
('429480', 'Gabriel', '2024-05-25', 'documentocliente: \'171392076\' => \'17391076\'', '06:15:42'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'DEVUELTA TASA\' => \'SOLICITUD CANCELADA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '01:17:51'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'SOLICITUD CANCELADA\' => \'POST VENTA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '01:20:33'),
('429480', 'Gabriel', '2024-05-25', 'central: \'45345342222222222\' => \'453\', manzanaregistro: \'534534534222222222\' => \'534\', comentarios: \'TV DIGITAL + 1 DECO&#13;&#10;&#13;&#10;DALE BOCAAAA\' => \'TV DIGITAL + 1 DECO&#13;&#10;\'', '01:20:55'),
('429480', '', '2024-05-25', 'Archivo eliminado: renaaaa.png', '01:22:04'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'POST VENTA\' => \'DEVUELTA TASA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '02:16:09'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'DEVUELTA TASA\' => \'DEVUELTA X VENDEDOR\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '02:16:17'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'DEVUELTA X VENDEDOR\' => \'SOLICITUD CUMPLIDA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '02:16:24'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'SOLICITUD CUMPLIDA\' => \'POST VENTA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '02:16:30'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'POST VENTA\' => \'RECHAZO ABD\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '02:16:35'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'RECHAZO ABD\' => \'CANCELADA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '02:16:39'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'CANCELADA\' => \'DEVUELTA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '02:16:45'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'DEVUELTA\' => \'PENDIENTE DE VERIFICACION\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '02:16:50'),
('429482', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'999999\', fechadecambio: \'2024-05-24\' => \'2024-05-25\'', '02:18:57'),
('429482', 'Gabriel', '2024-05-25', 'nombrecliente: \'ERICK MARCELO QUISPE AMADOR\' => \'GABRIEL\'', '02:19:16'),
('429482', 'Gabriel', '2024-05-25', 'numeroalternativo: \'1155923155\' => \'11559231551\'', '02:23:22'),
('429483', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'2222222\', fechadecambio: \'2024-05-24\' => \'2024-05-25\'', '02:26:03'),
('429480', 'Gabriel', '2024-05-25', 'estadoventa: \'PENDIENTE DE VERIFICACION\' => \'DEVUELTA X VENDEDOR\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '09:40:29'),
('429480', 'Melisa Valdez', '2024-05-25', 'producto: \'PORTA\' => \'FIBRA\', score: \'840\' => \'841\', fechacarga: \'2024-05-24\' => \'\', fechaportacion: \'2024-05-31\' => \'\'', '09:46:54'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'\'', '09:49:10'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'\'', '09:50:54'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'2024-05-24\'', '09:55:20'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'2024-05-24\' => \'\', estadoventa: \'DEVUELTA X VENDEDOR\' => \'POST VENTA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '10:20:23'),
('429480', 'Gabriel', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'\', estadoventa: \'POST VENTA\' => \'DEVUELTA X VENDEDOR\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '10:21:36'),
('429480', 'Gabriel', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '10:22:10'),
('429480', 'Gabriel', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'2024-05-24\'', '10:22:47'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'2024-05-24\' => \'\', estadoventa: \'DEVUELTA X VENDEDOR\' => \'POST VENTA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '10:23:25'),
('429480', 'Gabriel', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'\', estadoventa: \'POST VENTA\' => \'DEVUELTA X VENDEDOR\'', '10:23:42'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'2024-05-24\'', '10:24:51'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'2024-05-24\' => \'\'', '10:25:52'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'\'', '10:26:07'),
('429480', 'Gabriel', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'2024-05-24\'', '10:29:30'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'2024-05-24\' => \'\'', '10:34:20'),
('429480', 'Melisa Valdez', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'2024-05-24\'', '10:35:47'),
('429482', 'Gabriel', '2024-05-25', 'numerosolicitud: \'999999\' => \'124\', numeroalternativo: \'11559231551\' => \'1155923155\', fechacarga: \'2024-05-24\' => \'\'', '14:01:37'),
('429482', 'Gabriel', '2024-05-25', 'fechacarga: \'0000-00-00\' => \'2024-05-24\'', '14:05:31'),
('429492', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'125\', fechadecambio: \'\' => \'2024-05-25\'', '14:26:45'),
('429492', 'Gabriel', '2024-05-25', 'estadoventa: \'POST VENTA\' => \'PENDIENTE DE VERIFICACION\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '14:27:18'),
('429492', 'Gabriel', '2024-05-25', 'estadoventa: \'PENDIENTE DE VERIFICACION\' => \'DEVUELTA X VENDEDOR\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '14:27:51'),
('429492', 'test', '2024-05-25', 'linea: \'2612590713\' => \'26125907131\', documentocliente: \'40068922\' => \'400689221\', cuitcliente: \'23400689229\' => \'234006892291\', numeroalternativo: \'26125534452\' => \'261255344521\', calle: \'Pasaje ottone \' => \'Pasaje ottonee\', numero: \'160\' => \'161\', entrecalles: \'Lencinas y Victor Hugo\' => \'Lencinas y Victor Hugoo\'', '14:31:22'),
('429492', 'test', '2024-05-25', 'estadoventa: \'DEVUELTA X VENDEDOR\' => \'POST VENTA\', fechadecambio: \'2024-05-25\' => \'2024-5-25\'', '14:31:46'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: _archivos_renaaaa.png', '14:34:17'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: _archivos_renaaaa.png', '14:35:04'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: _archivos_renaaaa.png', '14:40:17'),
('429492', '', '2024-05-25', 'Archivo eliminado: _archivos_renaaaa.png', '14:40:26'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: ESCALADA DE PRIVILEGIOS EN LINUX.pdf', '14:40:54'),
('429493', '', '2024-05-25', 'Archivo eliminado: Captura de pantalla 2024-03-28 220813.png', '17:28:05'),
('429493', 'Gabriel', '2024-05-25', 'planes: \'CORPO 15GB\' => \'CORPO 6GB\', fechadecambio: \'0000-00-00\' => \'2024-05-25\'', '17:28:20'),
('429493', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'125\', email: \'gonzalezcastellvigabriel@gmail.com\' => \'gabrielubuntu320@gmail.com\', verificacion: \'todo el dia\' => \'MEDIO DIA\'', '17:31:45'),
('29', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'125\', linkgooglemaps: \'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&entry=ttu\' => \'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&#38;entry=ttu\', fechadecambio: \'0000-00-00\' => \'2024-05-25\'', '17:32:22'),
('29', 'Gabriel', '2024-05-25', 'numerosolicitud: \'125\' => \'0\'', '17:32:28'),
('29', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'125\'', '17:32:35'),
('29', 'Gabriel', '2024-05-25', 'numerosolicitud: \'125\' => \'0\'', '17:32:43'),
('29', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'126\'', '17:41:21'),
('29', 'Gabriel', '2024-05-25', 'numerosolicitud: \'126\' => \'0\'', '17:42:54'),
('29', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'999999\'', '19:12:23'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-03-28 215500.png', '19:13:53'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-03-28 220813.png', '19:13:53'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: vxt.png', '19:13:53'),
('29', '', '2024-05-25', 'Archivo eliminado: Captura de pantalla 2024-03-28 215500.png', '19:13:59'),
('29', '', '2024-05-25', 'Archivo eliminado: Captura de pantalla 2024-03-28 220813.png', '19:14:02'),
('29', '', '2024-05-25', 'Archivo eliminado: vxt.png', '19:14:05'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-03-28 215500.png', '19:14:20'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-03-28 220813.png', '19:14:20'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: vxt.png', '19:14:20'),
('34', 'Gabriel', '2024-05-25', 'numerosolicitud: \'0\' => \'1010\', linkgooglemaps: \'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&entry=ttu\' => \'https://www.google.com/maps/place/31%C2%B032&#39;15.4%22S+68%C2%B035&#39;18.1%22W/@-31.5376065,-68.590936,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-31.5376111!4d-68.5883611?hl=es&#38;entry=ttu\', fechadecambio: \'0000-00-00\' => \'2024-05-25\'', '19:15:17'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-03-28 215500.png', '19:15:26'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: Captura de pantalla 2024-03-28 220813.png', '19:15:26'),
('', 'Gabriel', '2024-05-25', 'Archivo agregado: vxt.png', '19:15:26');

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
(24, 'Gabriel', '40068922', 'gonzalezcastellvigabriel@gmail.com', 'ADMINISTRACION', 1, 'Gabriel400', '8b8a0d03ec7e79f9af7c072c57d20a42', '0', '', '', 'Gonzalez Castellvi', '2612590713', '1996-09-02'),
(32, '', '', '', 'RODRIGO', 0, '', '', '', '', '0', '', '', NULL),
(35, 'Eber', '', '', 'ADMINISTRACION', 1, '123', '6116afedcb0bc31083935c1c262ff4c9', '', '', '', '', '', NULL),
(36, 'martinaballesteros@vxt.com', '', 'martinaballesteros@vxt.com', 'ADMINISTRACION', 1, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '0', '0', '', '', NULL),
(38, 'renatabresuti@vxt.com', '', 'renatabresuti@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '', '0', '', '', NULL),
(39, 'mariaperez@vxt.com', '', 'mariaperez@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '', '', '0', '', '', NULL),
(40, 'martinsuarez@vxt.com', '', 'martinsuarez@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '', '0', '', '', NULL),
(43, 'Melisa Valdez', '37964995', 'melisavaldez@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '0', '0', '', '', NULL),
(44, 'Luis Salgado', '000000000000', 'luissalgado@vxt.com', 'RODRIGO', 0, 'VxT2024', '09444930ae1081fb23846aa3c6c2623d', '0', '', '0', '', '', NULL),
(45, 'Pruebas', '1111111111', 'p@p.com', 'GABRIEL', 0, '123', '6116afedcb0bc31083935c1c262ff4c9', '', '', '', '', '', NULL),
(46, 'test', '1111111111111111111', 'test@vxt.com', 'RODRIGO', 0, '123', '6116afedcb0bc31083935c1c262ff4c9', '0', '', '', '', '', NULL),
(47, '', '', '', '', 0, '', '', '', '', '', '', '', NULL);

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
  `fechadecambio` date DEFAULT NULL,
  `id_foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, `comentarios`, `estadoventa`, `numerosolicitud`, `archivo`, `fechaportacion`, `fechadecambio`, `id_foto`) VALUES
(431709, 'mariaprez@vxt.com', 'PORTA ', '2215759251', '', '', 'LUCAS DANIEL BRANDANA', '1989-11-10', '34708244', '23347082449', '2216764667', 'lucas.d.brandana@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-02', 'C. 215', '512', '', '', '42 y 43', 'Provincia de Buenos Aires', 'Lisandro Olmos', '1901', '-32.8333037--68.7438043', '', '', '', '', '', 'SOLICITUD CANCELADA', 419402, '', '', NULL, ''),
(431710, 'mariaprez@vxt.com', 'PORTA ', '2216764667', '', '', 'LUCAS DANIEL BRANDANA', '1989-11-10', '34708244', '23347082449', '2216764667', 'lucas.d.brandana@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-02', 'C. 215', '512', '', '', '42 y 43', 'Provincia de Buenos Aires', 'Lisandro Olmos', '1901', '-32.8333037--68.7438043', '', '', '', '', '', 'SOLICITUD CANCELADA', 419403, '', '', NULL, ''),
(431711, 'rodrigobecerra@vxt.com', 'PORTA ', '1139524674', '', '', 'PEREZ RAMON MARIANO', '1976-12-29', '25631691', '23256316919', '1128276513', 'Ramon.perez2018s@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-02', 'Castro Barros', '3796', '', '', 'Doctor Angel Gallardo y Gral Pinto', 'Provincia de Buenos Aires', 'Jose C. Paz', '1665', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419422, '', '2024-04-16', NULL, ''),
(431712, 'martinaballesteros@vxt.com', 'PORTA ', '1126286556', '', '', 'Yesnik Alonso Silva', '1973-07-12', '95819266', '20958192666', '1166268244', 'marymendoza10@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-02', 'Av. Velez Sarsfield', '715', '', '', 'Junin y Culpina', 'Provincia de Buenos Aires', 'Villa Madero', '1768', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419424, '', '', NULL, ''),
(431713, 'martinaballesteros@vxt.com', 'PORTA ', '1166268244', '', '', 'Yesnik Alonso Silva', '1973-07-12', '95819266', '20958192666', '1166268244', 'marymendoza10@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-02', 'Av. Velez Sarsfield', '715', '', '', 'Junin y Culpina', 'Provincia de Buenos Aires', 'Villa Madero', '1768', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419425, '', '', NULL, ''),
(431714, 'martinaballesteros@vxt.com', 'PORTA ', '1122924553', '', '', 'Yesnik Alonso Silva', '1973-07-12', '95819266', '20958192666', '1166268244', 'marymendoza10@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-02', 'Av. Velez Sarsfield', '715', '', '', 'Junin y Culpina', 'Provincia de Buenos Aires', 'Villa Madero', '1768', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419426, '', '', NULL, ''),
(431715, 'martinaballesteros@vxt.com', 'PORTA ', '1161270525', '', '', 'Yesnik Alonso Silva', '1973-07-12', '95819266', '20958192666', '1166268244', 'marymendoza10@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-02', 'Av. Velez Sarsfield', '715', '', '', 'Junin y Culpina', 'Provincia de Buenos Aires', 'Villa Madero', '1768', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419427, '', '', NULL, ''),
(431716, 'mariaprez@vxt.com', 'PORTA ', '1176510703', '', '', 'JOSE ALEJANDRO ALZAMORA CASTRO', '1999-05-25', '41888845', '20418888459', '1161257303', 'jose.aac99@gmail.com', '10GB', '', 'TODO EL DIA', '2024-04-03', 'Jose Bonifacio', '2832', '', '', 'la fuente y avenida san pedrito', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1406', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419522, '', '2024-04-19', NULL, ''),
(431717, 'mariaprez@vxt.com', 'PORTA ', '2975011424', '', '', 'GRISELDA HAYDEE LUQUE', '1979-11-01', '27669525', '27276695253', '2975023474', 'griseldaluque38@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-03', 'Elio Medrano', '2210', '', '', 'reverendo padre juan cortiz y 480', 'Chubut', 'Comodoro Rivadavia', '9000', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419523, '', '', NULL, ''),
(431718, 'mariaprez@vxt.com', 'PORTA ', '2975023474', '', '', 'GRISELDA HAYDEE LUQUE', '1979-11-01', '27669525', '27276695253', '2975023474', 'griseldaluque38@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-03', 'Elio Medrano', '2210', '', '', 'reverendo padre juan cortiz y 480', 'Chubut', 'Comodoro Rivadavia', '9000', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419524, '', '', NULL, ''),
(431719, 'mariaprez@vxt.com', 'PORTA ', '1168542554', '', '', 'GABRIEL ADRIAN YANEIRO PESCA', '1975-04-02', '93077294', '20930772942', '1126413659', 'yaneirogabriel@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-03', 'Carhue', '4651', '', '', 'avenida san martin y david magdalena', 'Provincia de Buenos Aires', 'Caseros', '1678', '-32.9319757--68.8414264', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419576, '', '2024-04-15', NULL, ''),
(431720, 'mariaprez@vxt.com', 'PORTA ', '1162880892', '', '', 'ROBERTO DANIEL SEBASTIAN DI GIORNO', '1987-08-13', '33157231', '20331572315', '1163708089', 'tito87_12@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-03', 'Av. Boyaca', '2266', '', '', 'av. alvarez jonte y juan agustin garcia', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1416', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419578, '', '2024-04-11', NULL, ''),
(431721, 'rodrigobecerra@vxt.com', 'PORTA ', '2994277329', '', '', 'CARABELLI MARCELO EDUARDO', '1968-09-01', '20436276', '23204362769', '2996219730', 'Eduardocarabelli@gmail.com', 'CORPO 30GB', '', 'TODO EL DIA', '2024-04-03', 'Gral. Roca', '200', '', '', 'Saavedra y Mariano Moreno', 'Rio Negro', 'Cinco Saltos', '8303', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419622, '', '', NULL, ''),
(431722, 'mariaprez@vxt.com', 'PORTA ', '2644444799', '', '', 'CLAUDIO JESUS LOPEZ AGUIRRE', '1995-05-21', '39182194', '20391821942', '2646235767', 'claudiojesuslopez2105@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-03', 'Santa Cruz/ Barrio Patagonia 2', 'Manzana H/', '', '', 'islas malvinas y jose ares', 'San Juan', 'MEDIA AGUA', '5435', '-32.9319757--68.8414264', '', '', '', '', '', 'SOLICITUD CANCELADA', 419644, '', '', NULL, ''),
(431723, 'rodrigobecerra@vxt.com', 'PORTA ', '2915103552', '', '', 'MARIA VICTORIA MARCHAN GARCIA', '1988-08-05', '33448938', '27334489383', '2914181422', 'vicky.marchan88@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-04', 'Sta. Fe', '304', '', '', 'Primer maestro Moyano y Eduardo Galeano', 'Rio Negro', 'Cipolletti', '8324', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419782, '', '', NULL, ''),
(431724, 'rodrigobecerra@vxt.com', 'PORTA ', '2915032822', '', '', 'MARIELA SILVANA MORAN', '1968-09-12', '20398158', '27203981584', '2914415801', 'marielamoran60@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-04', 'Chiclana', '1573', '', '', 'Garibaldi y Washington', 'Provincia de Buenos Aires', 'Bahia Blanca', '8000', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419788, '', '2024-04-15', NULL, ''),
(431725, 'rodrigobecerra@vxt.com', 'PORTA ', '2914415801', '', '', 'MARIELA SILVANA MORAN', '1968-09-12', '20398158', '27203981584', '2914415801', 'marielamoran60@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-04', 'Chiclana', '1573', '', '', 'Garibaldi y Washington', 'Provincia de Buenos Aires', 'Bahia Blanca', '8000', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419789, '', '2024-04-15', NULL, ''),
(431726, 'mariaprez@vxt.com', 'PORTA ', '1165353245', '', '', 'GERMAN FERNANDO MEDINA', '1985-04-23', '31583684', '20315836841', '1165510109', 'warcrymedina23@gmail.com', 'CORPO 30GB', '', 'TODO EL DIA', '2024-04-04', 'Ombu', '942', '', '', 'carabobo y miguel cane', 'Provincia de Buenos Aires', 'Villa Luzuriaga', '1754', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419794, '', '2024-04-17', NULL, ''),
(431727, 'mariaprez@vxt.com', 'PORTA ', '1140396277', '', '', 'MARIA CRISTINA DIAZ', '1962-02-01', '14569024', '27145690248', '1158091850', 'mcristinadiaz0102@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-04', 'Sarandi', '1235', '', '', 'av. san juan y au. 25 de mayo', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1251', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419796, '', '', NULL, ''),
(431728, 'mariaprez@vxt.com', 'PORTA ', '1131492757', '', '', 'MARIA CRISTINA DIAZ', '1962-02-01', '14569024', '27145690248', '1158091850', 'mcristinadiaz0102@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-04', 'Sarandi', '1235', '', '', 'av. san juan y au. 25 de mayo', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1251', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419797, '', '', NULL, ''),
(431729, 'tomasquipildor@vxt.com', 'PORTA ', '1135617214', '', '', 'HORACIO MARIANO MIKULIC', '1970-01-01', '21552894', '20215528945', '1135617213', 'hmikulic@yahoo.com.ar', '5GB', '', '12 a 15', '2024-04-04', 'Curupayti', '1736', '', '', 'los platanos y soldado de malvinas', 'Provincia de Buenos Aires', 'Villa Adelina', '1607', '-32.9132071--68.832484', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419889, '', '2024-04-19', NULL, ''),
(431730, 'tomasquipildor@vxt.com', 'PORTA ', '1138734178', '', '', 'HORACIO MARIANO MIKULIC', '1970-01-01', '21552894', '20215528945', '1135617213', 'hmikulic@yahoo.com.ar', '5GB', '', '12 a 15', '2024-04-04', 'Curupayti', '1736', '', '', 'los platanos y soldado de malvinas', 'Provincia de Buenos Aires', 'Villa Adelina', '1607', '-32.9132071--68.832484', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419890, '', '2024-04-12', NULL, ''),
(431731, 'tomasquipildor@vxt.com', 'PORTA ', '1144346365', '', '', 'HORACIO MARIANO MIKULIC', '1970-01-01', '21552894', '20215528945', '1135617213', 'hmikulic@yahoo.com.ar', '5GB', '', '12 a 15', '2024-04-04', 'Curupayti', '1736', '', '', 'los platanos y soldado de malvinas', 'Provincia de Buenos Aires', 'Villa Adelina', '1607', '-32.9132071--68.832484', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419891, '', '2024-04-12', NULL, ''),
(431732, 'tomasquipildor@vxt.com', 'PORTA ', '1155813601', '', '', 'HORACIO MARIANO MIKULIC', '1970-01-01', '21552894', '20215528945', '1135617213', 'hmikulic@yahoo.com.ar', '5GB', '', '12 a 15', '2024-04-04', 'Curupayti', '1736', '', '', 'los platanos y soldado de malvinas', 'Provincia de Buenos Aires', 'Villa Adelina', '1607', '-32.9132071--68.832484', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419892, '', '2024-04-12', NULL, ''),
(431733, 'tomasquipildor@vxt.com', 'PORTA ', '1158899748', '', '', 'HORACIO MARIANO MIKULIC', '1970-01-01', '21552894', '20215528945', '1135617213', 'hmikulic@yahoo.com.ar', '5GB', '', '12 a 15', '2024-04-04', 'Curupayti', '1736', '', '', 'los platanos y soldado de malvinas', 'Provincia de Buenos Aires', 'Villa Adelina', '1607', '-32.9132071--68.832484', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419893, '', '2024-04-12', NULL, ''),
(431734, 'tomasquipildor@vxt.com', 'PORTA ', '1163819190', '', '', 'HORACIO MARIANO MIKULIC', '1970-01-01', '21552894', '20215528945', '1135617213', 'hmikulic@yahoo.com.ar', '5GB', '', '12 a 15', '2024-04-04', 'Curupayti', '1736', '', '', 'los platanos y soldado de malvinas', 'Provincia de Buenos Aires', 'Villa Adelina', '1607', '-32.9132071--68.832484', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419894, '', '2024-04-12', NULL, ''),
(431735, 'tomasquipildor@vxt.com', 'PORTA ', '1135617213', '', '', 'HORACIO MARIANO MIKULIC', '1970-01-01', '21552894', '20215528945', '1135617213', 'hmikulic@yahoo.com.ar', '5GB', '', '12 a 15', '2024-04-04', 'Curupayti', '1736', '', '', 'los platanos y soldado de malvinas', 'Provincia de Buenos Aires', 'Villa Adelina', '1607', '-32.9132071--68.832484', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 419895, '', '2024-04-12', NULL, ''),
(431736, 'tomasquipildor@vxt.com', 'PORTA ', '2645062291', '', '', 'JUAN ENRIQUE ANDINO', '1983-05-25', '30243654', '20302436542', '2645062291', 'juan128_@hotmail.com', '5GB', '', '18 a 20', '2024-04-04', 'Barrio AOMA', 'manzana B', '', '', 'italia y ansilta', 'San Juan', 'Santa Lucia', '5411', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419906, '', '', NULL, ''),
(431737, 'tomasquipildor@vxt.com', 'PORTA ', '2644438225', '', '', 'JUAN ENRIQUE ANDINO', '1983-05-25', '30243654', '20302436542', '2645062291', 'juan128_@hotmail.com', '5GB', '', '18 a 20', '2024-04-04', 'Barrio AOMA', 'manzana B', '', '', 'italia y ansilta', 'San Juan', 'Santa Lucia', '5411', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 419907, '', '', NULL, ''),
(431738, 'mariaprez@vxt.com', 'PORTA ', '2804590105', '', '', 'CYNTHIA SOLEDAD CASTRO', '1977-09-15', '26344040', '23263440404', '2804419673', 'mbogliacino@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-05', 'Cambrin', '559', '', '', 'sargento cabral y mitre', 'Chubut', 'Trelew', '9103', '-32.9362743--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420134, '', '2024-04-16', NULL, ''),
(431739, 'mariaprez@vxt.com', 'PORTA ', '2804419673', '', '', 'CYNTHIA SOLEDAD CASTRO', '1977-09-15', '26344040', '23263440404', '2804419673', 'mbogliacino@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-05', 'Cambrin', '559', '', '', 'sargento cabral y mitre', 'Chubut', 'Trelew', '9103', '-32.9362743--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420135, '', '2024-04-16', NULL, ''),
(431740, 'mariaprez@vxt.com', 'PORTA ', '1150984025', '', '', 'TERESA DEL PILAR  PORTILLA CISNEROS', '1977-11-09', '94176297', '27941762978', '1126838643', 'teresa_vichi39@hotmail.com', '5GB', '', '12 a 15', '2024-04-05', 'Veragua', '5087', '', '', 'juramento y fitz roy', 'Provincia de Buenos Aires', 'Villa Tesei', '1688', '-32.916143--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420141, '', '2024-04-22', NULL, ''),
(431741, 'mariaprez@vxt.com', 'PORTA ', '1126838643', '', '', 'TERESA DEL PILAR  PORTILLA CISNEROS', '1977-11-09', '94176297', '27941762978', '1126838643', 'teresa_vichi39@hotmail.com', '5GB', '', '12 a 15', '2024-04-05', 'Veragua', '5087', '', '', 'juramento y fitz roy', 'Provincia de Buenos Aires', 'Villa Tesei', '1688', '-32.916143--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420142, '', '2024-04-22', NULL, ''),
(431742, 'mariaprez@vxt.com', 'PORTA ', '1151800477', '', '', 'ROCIO ALMUDENA MARIA SUAREZ', '1974-11-06', '92449270', '27924492703', '1133900477', 'rociosuarez50@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-05', 'Ramon B. Castro', '1965', '', '', 'hilarion de la quintana y fray justo sta. maria de oro', 'Provincia de Buenos Aires', 'Olivos', '1636', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 420148, '', '', NULL, ''),
(431743, 'mariaprez@vxt.com', 'PORTA ', '1133900477', '', '', 'ROCIO ALMUDENA MARIA SUAREZ', '1974-11-06', '92449270', '27924492703', '1133900477', 'rociosuarez50@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-05', 'Ramon B. Castro', '1965', '', '', 'hilarion de la quintana y fray justo sta. maria de oro', 'Provincia de Buenos Aires', 'Olivos', '1636', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 420149, '', '', NULL, ''),
(431744, 'mariaprez@vxt.com', 'PORTA ', '1165600477', '', '', 'ROCIO ALMUDENA MARIA SUAREZ', '1974-11-06', '92449270', '27924492703', '1133900477', 'rociosuarez50@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-05', 'Ramon B. Castro', '1965', '', '', 'hilarion de la quintana y fray justo sta. maria de oro', 'Provincia de Buenos Aires', 'Olivos', '1636', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 420150, '', '', NULL, ''),
(431745, 'tomasquipildor@vxt.com', 'PORTA ', '2634537734', '', '', 'OSCAR RUBEN MARTINEZ', '1985-03-17', '31287127', '20312871271', '2634598315', 'oscarmartinez_17@hotmail.com', '5GB', '', '9 a 12', '2024-04-05', 'Av. Mitre', '192', '', '', 'balcarce y viamonte', 'Mendoza', 'San Martin', '5570', '-32.9362743--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420157, '', '2024-04-17', NULL, ''),
(431746, 'martinaballesteros@vxt.com', 'FIBRA', '2615966395', '', '', 'Gisella Fernanda Lucero', '1986-09-08', '32354979', '27323549791', '2617041326', 'giferlucero@gmail.com', '500MB', '', 'TODO EL DIA', '2024-04-05', 'barrio cec 3', 'mza A casa', '', '', 'Av Mathus Hoyos y Constituyentes', 'Mendoza', 'Bermejo Guaymallen', '5521', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 420166, '', '', NULL, ''),
(431747, 'mariaprez@vxt.com', 'PORTA ', '2617231675', '', '', 'NICOLAS ALEJANDRO GALLARDO', '0000-00-00', '32133426', '20321334262', '', 'NICOLASGALLARDO86@HOTMAIL.COM', '5GB', '', '9 a 12', '2024-04-05', 'Miguel Azcuenaga', '1955', '', '', 'Eva Duarte y Pedro de Mendoza', 'Mendoza', 'MENDOZA', '5502', '-32.9362743--68.8458975', '', '', '', '', '', 'SOLICITUD CANCELADA', 420179, '', '', NULL, ''),
(431748, 'mariaprez@vxt.com', 'PORTA ', '2617040431', '', '', 'NICOLAS ALEJANDRO GALLARDO', '0000-00-00', '32133426', '20321334262', '', 'NICOLASGALLARDO86@HOTMAIL.COM', '5GB', '', '9 a 12', '2024-04-05', 'Miguel Azcuenaga', '1955', '', '', 'Eva Duarte y Pedro de Mendoza', 'Mendoza', 'MENDOZA', '5502', '-32.9362743--68.8458975', '', '', '', '', '', 'SOLICITUD CANCELADA', 420180, '', '', NULL, ''),
(431749, 'mariaprez@vxt.com', 'PORTA ', '2615961862', '', '', 'NICOLAS ALEJANDRO GALLARDO', '0000-00-00', '32133426', '20321334262', '', 'NICOLASGALLARDO86@HOTMAIL.COM', '10GB', '', '9 a 12', '2024-04-05', 'Miguel Azcuenaga', '1955', '', '', 'Eva Duarte y Pedro de Mendoza', 'Mendoza', 'MENDOZA', '5502', '-32.9362743--68.8458975', '', '', '', '', '', 'SOLICITUD CANCELADA', 420181, '', '', NULL, ''),
(431750, 'tomasquipildor@vxt.com', 'PORTA ', '1163070000', '', '', 'EMILIO IGNACIO FERRI', '1974-03-04', '23775249', '20237752490', '1137031000', 'emilio.ferri@live.com', '5GB', '', 'TODO EL DIA', '2024-04-08', 'las heras', '1261', '', '', 'maria de alvear y rawson', 'Provincia de Buenos Aires', 'LUJAN', '6700', '-32.8417389--68.79895', '', '', '', '', '', 'SOLICITUD CANCELADA', 420578, '', '', NULL, ''),
(431751, 'tomasquipildor@vxt.com', 'PORTA ', '1159631897', '', '', 'EMILIO IGNACIO FERRI', '1974-03-04', '23775249', '20237752490', '1137031000', 'emilio.ferri@live.com', '5GB', '', 'TODO EL DIA', '2024-04-08', 'las heras', '1261', '', '', 'maria de alvear y rawson', 'Provincia de Buenos Aires', 'LUJAN', '6700', '-32.8417389--68.79895', '', '', '', '', '', 'SOLICITUD CANCELADA', 420579, '', '', NULL, ''),
(431752, 'tomasquipildor@vxt.com', 'PORTA ', '1137031000', '', '', 'EMILIO IGNACIO FERRI', '1974-03-04', '23775249', '20237752490', '1137031000', 'emilio.ferri@live.com', '5GB', '', 'TODO EL DIA', '2024-04-08', 'las heras', '1261', '', '', 'maria de alvear y rawson', 'Provincia de Buenos Aires', 'LUJAN', '6700', '-32.8417389--68.79895', '', '', '', '', '', 'SOLICITUD CANCELADA', 420580, '', '', NULL, ''),
(431753, 'martinaballesteros@vxt.com', 'PORTA ', '2616410028', '', '', 'VILLEGAS/CLAUDIA ALEJANDRA', '1971-05-19', '22177928', '27221779288', '2612436843', 'claudia_jabalti@hotmail.com', '5GB', '', '15 a 18', '2024-04-08', 'Irigoyen', '8223', '', '', 'Francia y Ugarte', 'Mendoza', 'Lujan de Cuyo', '5507', '-32.9204694--68.8369552', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420584, '', '2024-04-15', NULL, ''),
(431754, 'martinaballesteros@vxt.com', 'PORTA ', '2612095290', '', '', 'VILLEGAS/CLAUDIA ALEJANDRA', '1971-05-19', '22177928', '27221779288', '2612436843', 'claudia_jabalti@hotmail.com', '5GB', '', '15 a 18', '2024-04-08', 'Irigoyen', '8223', '', '', 'Francia y Ugarte', 'Mendoza', 'Lujan de Cuyo', '5507', '-32.9204694--68.8369552', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420585, '', '2024-04-15', NULL, ''),
(431755, 'martinaballesteros@vxt.com', 'PORTA ', '2615594149', '', '', 'VILLEGAS/CLAUDIA ALEJANDRA', '1971-05-19', '22177928', '27221779288', '2612436843', 'claudia_jabalti@hotmail.com', '5GB', '', '15 a 18', '2024-04-08', 'Irigoyen', '8223', '', '', 'Francia y Ugarte', 'Mendoza', 'Lujan de Cuyo', '5507', '-32.9204694--68.8369552', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420586, '', '2024-04-15', NULL, ''),
(431756, 'martinaballesteros@vxt.com', 'PORTA ', '2615586743', '', '', 'VILLEGAS/CLAUDIA ALEJANDRA', '1971-05-19', '22177928', '27221779288', '2612436843', 'claudia_jabalti@hotmail.com', '5GB', '', '15 a 18', '2024-04-08', 'Irigoyen', '8223', '', '', 'Francia y Ugarte', 'Mendoza', 'Lujan de Cuyo', '5507', '-32.9204694--68.8369552', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420587, '', '2024-04-15', NULL, ''),
(431757, 'mariaprez@vxt.com', 'PORTA ', '1155019043', '', '', 'DIEGO FERNAN ZENOBIO', '1978-02-16', '26473772', '23264737729', '1136205661', 'diego2.dfz@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-08', 'Av. Boedo', '23', '', '', 'rivadavia y don bosco', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1177', '-32.918339--68.8302484', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420589, '', '2024-04-29', NULL, ''),
(431758, 'mariaprez@vxt.com', 'PORTA ', '2616670406', '', '', 'LUCERO/ESTELA MARGARITA', '1972-04-18', '22536238', '27225362381', '', '', '5GB', '', '12 a 15', '2024-04-08', 'Ruta de Uspallata', '2669', '', '', 'polia y jose ingenieros', 'Mendoza', 'Maipu', '5511', '-32.8417389--68.79895', '', '', '', '', '', 'SOLICITUD CANCELADA', 420591, '', '', NULL, ''),
(431759, 'mariaprez@vxt.com', 'PORTA ', '2612467763', '', '', 'LUCERO/ESTELA MARGARITA', '1972-04-18', '22536238', '27225362381', '', '', '5GB', '', '12 a 15', '2024-04-08', 'Ruta de Uspallata', '2669', '', '', 'polia y jose ingenieros', 'Mendoza', 'Maipu', '5511', '-32.8417389--68.79895', '', '', '', '', '', 'SOLICITUD CANCELADA', 420592, '', '', NULL, ''),
(431760, 'mariaprez@vxt.com', 'PORTA ', '1141932651', '', '', 'SPITTIA FRANCIS ADRIANA TORO', '1980-01-24', '94219921', '27942199215', '1125494472', 'francisadrianatorospittia@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-08', 'Parana', '446', '', '', 'lavalle y av. corrientes', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1017', '-32.916143--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420596, '', '2024-04-22', NULL, ''),
(431761, 'mariaprez@vxt.com', 'PORTA ', '1156946486', '', '', 'CORINA GONZALEZ TEJEDOR', '1973-07-07', '23463009', '27234630097', '1170279311', 'corinagonzaleztejedor@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-08', 'Blanco Encalada', '2851', '', '', 'vidal y av. cramer', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1428', '-32.9204694--68.8369552', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420607, '', '2024-04-17', NULL, ''),
(431762, 'mariaprez@vxt.com', 'PORTA ', '1170279311', '', '', 'CORINA GONZALEZ TEJEDOR', '1973-07-07', '23463009', '27234630097', '1170279311', 'corinagonzaleztejedor@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-08', 'Blanco Encalada', '2851', '', '', 'vidal y av. cramer', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1428', '-32.9204694--68.8369552', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420608, '', '2024-04-17', NULL, ''),
(431763, 'martinaballesteros@vxt.com', 'PORTA ', '2645810084', '', '', 'Patricia Graciela Ortiz Oviedo', '1973-12-25', '23735266', '27237352667', '2646316056', 'pgortiz2512@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Jujuy Nte.', '730', '', '', 'Cereceto y Paraguay', 'San Juan', 'San Juan', '5400', '-32.9220685--68.8429167', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420822, '', '2024-04-25', NULL, ''),
(431764, 'martinaballesteros@vxt.com', 'PORTA ', '2646316056', '', '', 'Patricia Graciela Ortiz Oviedo', '1973-12-25', '23735266', '27237352667', '2646316056', 'pgortiz2512@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Jujuy Nte.', '730', '', '', 'Cereceto y Paraguay', 'San Juan', 'San Juan', '5400', '-32.9220685--68.8429167', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420823, '', '2024-04-25', NULL, ''),
(431765, 'mariaprez@vxt.com', 'PORTA ', '2804542443', '', '', 'PABLO DARIO MORALES', '1977-09-20', '26094615', '20260946154', '2804315722', 'padamori@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Peninsula Valdes', '437', '', '', 'lewis jones y ricardo berwyn', 'Chubut', 'Trelew', '9100', '-32.9314305--68.8444071', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420824, '', '2024-04-30', NULL, ''),
(431766, 'mariaprez@vxt.com', 'PORTA ', '2615736625', '', '', 'diego javier', '1982-04-15', '26960289', '23269602899', '', 'RAGAZZONE@GMAIL.COM', '5GB', '', '18 a 20', '2024-04-09', 'Av. Espa?a', '585', '', '', 'av colon y av. pedro molina', 'Mendoza', 'Mendoza', '5500', '-32.8761397--68.8138541', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420827, '', '2024-04-26', NULL, ''),
(431767, 'tomasquipildor@vxt.com', 'PORTA ', '1133731137', '', '', 'ELISA ANA BECERRA', '1977-09-02', '26084901', '27260849013', '1149890511', 'ELI.8402@HOTMAIL.COM', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Antonio Filardi', '357', '', '', 'marsella y puerto argentino', 'Provincia de Buenos Aires', 'Villa Centenario', '1821', '-32.9220685--68.8429167', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420843, '', '2024-04-24', NULL, ''),
(431768, 'mariaprez@vxt.com', 'PORTA ', '2994277329', '', '', 'CARABELLI MARCELO EDUARDO', '1968-09-01', '20436276', '23204362769', '2996219730', 'Eduardocarabelli@gmail.com', '', '', 'TODO EL DIA', '2024-04-09', 'Gral. Roca', '200', '', '', 'DON BOSCO Y MARIANO MORENO', 'Rio Negro', 'Cinco Saltos', '8303', '-32.8761397--68.8138541', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 420846, '', '', NULL, ''),
(431769, 'martinaballesteros@vxt.com', 'PORTA ', '1151539589', '', '', 'Encarnacion Ramiro Camacho Ortiz', '1961-12-12', '19004847', '20190048471', '1138976624', 'ortizramiro-@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Mercedes', '578', '', '', 'MORON Y DR JUAN FELIPE ARANGUREN', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1407', '-32.9220685--68.8429167', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420847, '', '2024-04-25', NULL, ''),
(431770, 'martinaballesteros@vxt.com', 'PORTA ', '2645621117', '', '', 'Ricardo Marcos Chirino', '1964-02-26', '16539818', '20165398182', '2645621117', 'ricardochirino@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Av. Rioja Nte.', '247', '', '', 'Pedro Echague y 25 de Mayo Este', 'San Juan', 'San Juan', '5400', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420863, '', '2024-05-20', NULL, ''),
(431771, 'martinaballesteros@vxt.com', 'PORTA ', '2644867313', '', '', 'Ricardo Marcos Chirino', '1964-02-26', '16539818', '20165398182', '2645621117', 'ricardochirino@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Av. Rioja Nte.', '247', '', '', 'Pedro Echague y 25 de Mayo Este', 'San Juan', 'San Juan', '5400', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420864, '', '2024-05-20', NULL, ''),
(431772, 'martinaballesteros@vxt.com', 'PORTA ', '2644867348', '', '', 'Ricardo Marcos Chirino', '1964-02-26', '16539818', '20165398182', '2645621117', 'ricardochirino@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Av. Rioja Nte.', '247', '', '', 'Pedro Echague y 25 de Mayo Este', 'San Juan', 'San Juan', '5400', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420865, '', '2024-05-20', NULL, ''),
(431773, 'martinaballesteros@vxt.com', 'PORTA ', '1131205835', '', '', 'Solange Brilynski', '1991-03-05', '35498633', '27354986332', '1131205835', 'ricardobry@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'Wilde', '1875', '-32.9231385--68.8257773', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420883, '', '2024-04-29', NULL, ''),
(431774, 'martinaballesteros@vxt.com', 'PORTA ', '1144163026', '', '', 'Solange Brilynski', '1991-03-05', '35498633', '27354986332', '1131205835', 'ricardobry@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'Wilde', '1875', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420884, '', '2024-04-29', NULL, ''),
(431775, 'martinaballesteros@vxt.com', 'PORTA ', '1131199531', '', '', 'Solange Brilynski', '1991-03-05', '35498633', '27354986332', '1131205835', 'ricardobry@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'Wilde', '1875', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420885, '', '2024-04-29', NULL, ''),
(431776, 'martinaballesteros@vxt.com', 'PORTA ', '1122561421', '', '', 'Solange Brilynski', '1991-03-05', '35498633', '27354986332', '1131205835', 'ricardobry@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'Wilde', '1875', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 420886, '', '2024-04-29', NULL, ''),
(431777, 'martinaballesteros@vxt.com', 'PORTA ', '1134775836', '', '', 'Solange Brilynski', '1991-03-05', '35498633', '27354986332', '1131205835', 'ricardobry@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-09', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'Wilde', '1875', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 420887, '', '', NULL, ''),
(431778, 'mariaprez@vxt.com', 'FIBRA', '1131205835', '', '', 'Solange Brilynski', '1991-03-05', '35498633', '27354986332', '1131205835', 'ricardobry@gmail.com', '300MB', '', 'TODO EL DIA', '2024-04-09', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'Wilde', '1875', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 420892, '', '', NULL, ''),
(431779, 'mariaprez@vxt.com', 'PORTA ', '1159264479', '', '', 'FREDDY LEONARDO PALENCIA RAMOS', '1988-11-27', '95843726', '23958437269', '1137926280', 'fredleonardo12@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-10', 'Av. San Pedrito', '1450', '', '', 'balbastro y crisostomo alvarez', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1405', '-32.9279313--68.8429168', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421032, '', '2024-04-19', NULL, ''),
(431780, 'mariaprez@vxt.com', 'PORTA ', '1159621317', '', '', 'NICOLAS EZEQUIEL TEJEDA', '1988-03-13', '33812407', '20338124075', '1125264064', 'nicolastejeda1988@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-10', 'alvarez Jonte', '3997', '', '', 'rio de janeiro y pcia. de buenos aires', 'Provincia de Buenos Aires', 'Tortuguitas', '1667', '-32.9282893--68.8317389', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421066, '', '2024-04-25', NULL, ''),
(431781, 'mariaprez@vxt.com', 'PORTA ', '1125264064', '', '', 'NICOLAS EZEQUIEL TEJEDA', '1988-03-13', '33812407', '20338124075', '1125264064', 'nicolastejeda1988@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-10', 'alvarez Jonte', '3997', '', '', 'rio de janeiro y pcia. de buenos aires', 'Provincia de Buenos Aires', 'Tortuguitas', '1667', '-32.9282893--68.8317389', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421067, '', '2024-04-25', NULL, ''),
(431782, 'martinaballesteros@vxt.com', 'PORTA ', '2226502923', '', '', 'Nancy Viviana Torres', '1980-05-21', '28024634', '23280246344', '2226554121', 'nancyvivitorres@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-10', 'C. Estanislao del Campo', '930', '', '', 'Iba?es y Benaventes', 'Provincia de Buenos Aires', 'Ca?uelas', '1814', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421131, '', '2024-04-22', NULL, ''),
(431783, 'martinaballesteros@vxt.com', 'PORTA ', '1155888403', '', '', 'Luana Lopez', '2000-08-29', '42887918', '27428879185', '1126355504', 'lopezluana372@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-10', 'Albania', '464', '', '', 'Albania y Malta', 'Provincia de Buenos Aires', 'Santa Rosa', '1867', '-32.9183287--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421157, '', '2024-04-22', NULL, ''),
(431784, 'martinaballesteros@vxt.com', 'PORTA ', '1133097584', '', '', 'Mariana Lujan Noya', '1984-07-05', '31060807', '27310608071', '1166607681', 'mariananoya84@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-10', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'WILDE', '1875', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421189, '', '2024-04-25', NULL, ''),
(431785, 'martinaballesteros@vxt.com', 'PORTA ', '1166607681', '', '', 'Mariana Lujan Noya', '1984-07-05', '31060807', '27310608071', '1166607681', 'mariananoya84@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-10', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'WILDE', '1875', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421190, '', '2024-04-25', NULL, ''),
(431786, 'martinaballesteros@vxt.com', 'FIBRA', '1133097584', '', '', 'Mariana Lujan Noya', '1984-07-05', '31060807', '27310608071', '1166607681', 'mariananoya84@hotmail.com', '', '', 'TODO EL DIA', '2024-04-10', 'Av. Bartolome Mitre', '6137', '', '', 'Bahia Blanca y Martin Fierro', 'Provincia de Buenos Aires', 'WILDE', '1875', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 421193, '', '', NULL, ''),
(431787, 'mariaprez@vxt.com', 'PORTA ', '1123463977', '', '', 'ANDREA CANDIDA GALLARDO', '1978-08-19', '22987045', '27229870454', '1158124603', 'anarsanvi.2017@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-10', 'C. 151 A', '3629', '', '', '36 y diag. b', 'Provincia de Buenos Aires', 'Berazategui', '1880', '-32.8906314--68.8235417', '', '', '', '', '', 'SOLICITUD CANCELADA', 421199, '', '', NULL, ''),
(431788, 'mariaprez@vxt.com', 'PORTA ', '2215238648', '', '', 'AMARO ANDRES GARCIA HUAYAMABE', '1996-05-02', '96183523', '20961835233', '2215238648', 'amarogh.pichi@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-11', 'C. 72', '1685', '', '', '29 y 28', 'Provincia de Buenos Aires', 'La Plata', '1904', '-32.9265854--68.839936', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421434, '', '2024-05-07', NULL, ''),
(431789, 'mariaprez@vxt.com', 'PORTA ', '1158853577', '', '', 'YULEIDY ELENA  HERRERA', '1987-12-19', '95664512', '27956645129', '1168313990', 'yuleidyeherrera@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-11', 'Thames', '2491', '', '', 'av. santa fe y av guemes', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1425', '-32.9105345--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421447, '', '2024-04-30', NULL, ''),
(431790, 'martinaballesteros@vxt.com', 'PORTA ', '2614854788', '', '', 'Maria Beatriz Ruiz Fabregas', '1977-12-17', '26288313', '27262883138', '2617512161', 'beiruiz@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-11', 'Mitre', '1495', '', '', 'Jorge Newbery y Cjon Cnadelaria', 'Mendoza', 'Chacras de Coria', '5505', '-32.9351168--68.845568', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421452, '', '2024-04-23', NULL, ''),
(431791, 'martinaballesteros@vxt.com', 'PORTA ', '2617512161', '', '', 'Maria Beatriz Ruiz Fabregas', '1977-12-17', '26288313', '27262883138', '2617512161', 'beiruiz@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-11', 'Mitre', '1495', '', '', 'Jorge Newbery y Cjon Cnadelaria', 'Mendoza', 'Chacras de Coria', '5505', '-32.9188013--68.8302485', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421453, '', '2024-04-23', NULL, ''),
(431792, 'martinaballesteros@vxt.com', 'PORTA ', '2616570345', '', '', 'Maria Beatriz Ruiz Fabregas', '1977-12-17', '26288313', '27262883138', '2617512161', 'beiruiz@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-11', 'Mitre', '1495', '', '', 'Jorge Newbery y Cjon Cnadelaria', 'Mendoza', 'Chacras de Coria', '5505', '-32.9188013--68.8302485', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421454, '', '2024-04-23', NULL, ''),
(431793, 'martinaballesteros@vxt.com', 'PORTA ', '2616107162', '', '', 'Maria Beatriz Ruiz Fabregas', '1977-12-17', '26288313', '27262883138', '2617512161', 'beiruiz@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-11', 'Mitre', '1495', '', '', 'Jorge Newbery y Cjon Cnadelaria', 'Mendoza', 'Chacras de Coria', '5505', '-32.9188013--68.8302485', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421455, '', '2024-04-23', NULL, ''),
(431794, 'mariaprez@vxt.com', 'PORTA ', '1123451260', '', '', 'MIRYAM BEATRIZ MONZON', '1976-12-20', '25054936', '27250549364', '1134115383', 'miryammonzon78@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-11', 'Vicente Lopez', '2855', '', '', 'san pedrito y rauch', 'Provincia de Buenos Aires', 'Monte Grande', '1841', '-32.9282893--68.8317389', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421480, '', '2024-04-25', NULL, ''),
(431795, 'mariaprez@vxt.com', 'PORTA ', '1134115383', '', '', 'CARLOS ALBERTO ABRATTI', '1978-03-19', '26495420', '20264954208', '1123451260', 'mireyammonzon78@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-12', 'Vicente Lopez', '2855', '', '', 'san pedrito y rauch', 'Provincia de Buenos Aires', 'Monte Grande', '1841', '-32.9231385--68.8257773', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421630, '', '2024-04-25', NULL, ''),
(431796, 'mariaprez@vxt.com', 'PORTA ', '1144711839', '', '', 'MARIA JOSE ACOSTA BENEDETI', '1971-10-22', '22241620', '27222416200', '1123674601', 'yaelacosta@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-12', 'Granada', '3245', '', '', 'de la tradicion y gdor. vernet', 'Provincia de Buenos Aires', 'William C. Morris', '1713', '-32.9282893--68.8317389', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421632, '', '2024-05-07', NULL, ''),
(431797, 'tomasquipildor@vxt.com', 'PORTA ', '1136883613', '', '', 'ANALIA EDIT FREIRE', '1978-06-22', '26522942', '27265229420', '1131645712', 'gabrielsoak@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-12', 'Venezuela', '1332', '', '', 'san jose y santiago del estero', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'MONSERRAT', '1095', '-32.9282893--68.8317389', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421636, '', '2024-04-25', NULL, ''),
(431798, 'tomasquipildor@vxt.com', 'PORTA ', '1141969829', '', '', 'ARIEL LEONARDO SANCHEZ', '1968-12-18', '20569035', '20205690353', '1148880374', 'arielleosan@yahoo.com.ar', '5GB', '', 'TODO EL DIA', '2024-04-12', 'Curapalig?e', '60', '', '', 'falcon y av rivadia', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABALLITO', '1406', '-32.9282893--68.8317389', '', '', '', '', '', 'SOLICITUD CANCELADA', 421637, '', '', NULL, ''),
(431799, 'martinaballesteros@vxt.com', 'PORTA ', '1155159835', '', '', 'Lucas Manuel Fernandez', '1991-08-26', '36293568', '20362935688', '1161970233', 'lucas.fernamdez.lmf11@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-12', 'Bartolome Mitre', '7', '', '', 'Antonio Toro y Martin', 'Provincia de Buenos Aires', 'Pres. Derqui', '1635', '-32.9282893--68.8317389', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421664, '', '2024-04-25', NULL, ''),
(431800, 'mariaprez@vxt.com', 'PORTA ', '1156547768', '', '', 'ALEJANDRO ENRIQUE VALERA PULIDO', '1989-07-09', '95644000', '23956440009', '1125667020', 'alejandroevalerap@gmail.com', '', '', 'TODO EL DIA', '2024-04-15', 'Soldado Hector Caballero', '9812', '', '', 'doctor jonas salk y antonio beruti', 'Provincia de Buenos Aires', 'Once de Septiembre', '1690', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421915, '', '2024-04-29', NULL, ''),
(431801, 'martinaballesteros@vxt.com', 'PORTA ', '2392537829', '', '', 'Marcos Hugo Zamudio', '1976-08-28', '25436546', '20254365468', '2392555761', 'marcoshzamudio@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-15', 'Saavedra', '420', '', '', 'talcahuano y viamonte', 'Provincia de Buenos Aires', 'America', '6237', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 421954, '', '2024-04-25', NULL, ''),
(431802, 'martinaballesteros@vxt.com', 'PORTA ', '2964419762', '', '', 'Laura Angelica Sosa', '1979-12-26', '27731767', '27277317678', '2964591871', 'sosalauri85@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-15', 'Mariano Moreno', '3155', '', '', 'Laguna de los flamencos y Lagunas Don Bosco', 'Tierra del Fuego', 'Rio Grande', '9420', '-32.9188013--68.8302485', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422014, '', '2024-04-30', NULL, ''),
(431803, 'martinaballesteros@vxt.com', 'PORTA ', '2612059225', '', '', 'Melisa Nordestrom', '1985-07-20', '31549384', '27315493841', '2615099462', 'melisa.nordestrom@yahoo.com', '5GB', '', 'TODO EL DIA', '2024-04-16', 'Guillermo Cano', '948', '', '', 'Cochabamba y Dr Coni', 'Mendoza', 'Guaymallen', '5521', '-32.9298844--68.839936', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422138, '', '2024-04-24', NULL, ''),
(431804, 'martinaballesteros@vxt.com', 'PORTA ', '1140239086', '', '', 'Ana Victoria Cohen', '1981-05-08', '28755282', '27287552829', '1165391296', 'avcprofe48@gmail.com', '10GB', '', 'TODO EL DIA', '2024-04-16', 'Carlos Gardel', '2637', '', '', 'av 64 y C Jose Clemente', 'Provincia de Buenos Aires', 'Villa Libertad', '1650', '-32.9201762--68.839936', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422187, '', '2024-04-29', NULL, ''),
(431805, 'martinaballesteros@vxt.com', 'PORTA ', '1136627459', '', '', 'Patricio Damian Ferreyra', '1972-05-11', '22708905', '23227089059', '1156525132', 'patriciodamianferreyra@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-17', 'Manuel de Serratea', '388', '', '', 'Juan Jose Catelli y Domingo French', 'Provincia de Buenos Aires', 'MORON', '1708', '-32.9351168--68.845568', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422397, '', '2024-04-26', NULL, ''),
(431806, 'martinaballesteros@vxt.com', 'PORTA ', '1123130966', '', '', 'Patricio Damian Ferreyra', '1972-05-11', '22708905', '23227089059', '1156525132', 'patriciodamianferreyra@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-17', 'Manuel de Serratea', '388', '', '', 'Juan Jose Catelli y Domingo French', 'Provincia de Buenos Aires', 'MORON', '1708', '-32.9351168--68.845568', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422398, '', '2024-04-26', NULL, ''),
(431807, 'martinaballesteros@vxt.com', 'PORTA ', '1123401759', '', '', 'Patricio Damian Ferreyra', '1972-05-11', '22708905', '23227089059', '1156525132', 'patriciodamianferreyra@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-17', 'Manuel de Serratea', '388', '', '', 'Juan Jose Catelli y Domingo French', 'Provincia de Buenos Aires', 'MORON', '1708', '-32.9351168--68.845568', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422399, '', '2024-04-26', NULL, ''),
(431808, 'martinaballesteros@vxt.com', 'PORTA ', '1139533376', '', '', 'Patricio Damian Ferreyra', '1972-05-11', '22708905', '23227089059', '1156525132', 'patriciodamianferreyra@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-17', 'Manuel de Serratea', '388', '', '', 'Juan Jose Catelli y Domingo French', 'Provincia de Buenos Aires', 'MORON', '1708', '-32.9351168--68.845568', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422400, '', '2024-04-26', NULL, ''),
(431809, 'martinaballesteros@vxt.com', 'PORTA ', '1149282026', '', '', 'Patricio Damian Ferreyra', '1972-05-11', '22708905', '23227089059', '1156525132', 'patriciodamianferreyra@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-17', 'Manuel de Serratea', '388', '', '', 'Juan Jose Catelli y Domingo French', 'Provincia de Buenos Aires', 'MORON', '1708', '-32.9351168--68.845568', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422401, '', '2024-04-26', NULL, ''),
(431810, 'martinaballesteros@vxt.com', 'PORTA ', '1156525132', '', '', 'Patricio Damian Ferreyra', '1972-05-11', '22708905', '23227089059', '1156525132', 'patriciodamianferreyra@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-17', 'Manuel de Serratea', '388', '', '', 'Juan Jose Catelli y Domingo French', 'Provincia de Buenos Aires', 'MORON', '1708', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422402, '', '2024-04-26', NULL, ''),
(431811, 'mariaprez@vxt.com', 'PORTA ', '1141643430', '', '', 'GABRIELA FACIO', '1978-12-20', '27056513', '27270565137', '1141643387', 'ailin.facio@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-17', 'Gomez de Fonseca', '508', '', '', 'juan felipe aranguren y moron', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1407', '-32.9320629--68.8250321', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422419, '', '2024-04-30', NULL, ''),
(431812, 'martinsuarez@vxt.com', 'PORTA ', '2644160882', '', '', 'MARIA AGOSTINA CLAVERO MU?OZ', '1991-01-08', '35508493', '27355084936', '2644549145', '35508493mc@gmail.com', '5GB', '', '9 a 12', '2024-04-17', 'Alvear', '868', '', '', 'tacuari y san lorenzo oeste', 'San Juan', 'san juan', '5400', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 422421, '', '', NULL, ''),
(431813, 'renatabresuti@vxt.com', 'PORTA ', '1157217472', '', '', 'SEBASTIAN ALFREDO MASTROSTEFANO', '1982-05-22', '29542297', '20295422972', '1121193574', 'sebas_mastro82@hotmail.com', '5GB', '', '12 a 15', '2024-04-17', 'PJE DR HORACIO CASCO', '5038', '', '', 'ALBARI?O Y MIRALLA', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1439', '-32.9231385--68.8257773', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422424, '', '2024-04-29', NULL, ''),
(431814, 'martinaballesteros@vxt.com', 'PORTA ', '2996370284', '', '', 'Luis Ernesto Nu?ez', '1975-12-22', '25113604', '20251136042', '2996371542', 'lnfuser@hotmail.com.ar', '5GB', '', 'TODO EL DIA', '2024-04-18', 'julio Roca', '246', '', '', 'Salta y San Martin', 'Neuquen', 'Cultral Co', '8322', '-32.9316936--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422586, '', '2024-04-29', NULL, ''),
(431815, 'renatabresuti@vxt.com', 'PORTA ', '1149919858', '', '', 'CARLOS ALBERTO ACOSTA', '1968-04-19', '20152715', '20201527156', '1153046982', 'ACOSTACARLOS68@HOTMAIL.COM.AR', '5GB', '', '15 a 18', '2024-04-18', 'magdalena', '1086', '', '', 'larralde y arredondo', 'Provincia de Buenos Aires', 'villa dominico', '1874', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422590, '', '2024-04-29', NULL, ''),
(431816, 'renatabresuti@vxt.com', 'PORTA ', '1153046982', '', '', 'CARLOS ALBERTO ACOSTA', '1968-04-19', '20152715', '20201527156', '1153046982', 'ACOSTACARLOS68@HOTMAIL.COM.AR', '5GB', '', '15 a 18', '2024-04-18', 'magdalena', '1086', '', '', 'larralde y arredondo', 'Provincia de Buenos Aires', 'villa dominico', '1874', '-32.9155483--68.8421715', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422591, '', '2024-04-29', NULL, ''),
(431817, 'renatabresuti@vxt.com', 'PORTA ', '1153046851', '', '', 'CARLOS ALBERTO ACOSTA', '1968-04-19', '20152715', '20201527156', '1153046982', 'ACOSTACARLOS68@HOTMAIL.COM.AR', '5GB', '', '15 a 18', '2024-04-18', 'magdalena', '1086', '', '', 'larralde y arredondo', 'Provincia de Buenos Aires', 'villa dominico', '1874', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422592, '', '2024-04-29', NULL, ''),
(431818, 'renatabresuti@vxt.com', 'PORTA ', '1162557506', '', '', 'CARLOS ALBERTO ACOSTA', '1968-04-19', '20152715', '20201527156', '1153046982', 'ACOSTACARLOS68@HOTMAIL.COM.AR', '5GB', '', '15 a 18', '2024-04-18', 'magdalena', '1086', '', '', 'larralde y arredondo', 'Provincia de Buenos Aires', 'villa dominico', '1874', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422593, '', '2024-04-29', NULL, ''),
(431819, 'martinsuarez@vxt.com', 'PORTA ', '1122376040', '', '', 'VALENTIN LIZASO', '1988-01-10', '33344999', '23333449994', '1166490767', 'VALENLIZASO@gmail.com', '5GB', '', '12 a 15', '2024-04-18', 'Homero', '1772', '', '', 'florida y ruta 8', 'Provincia de Buenos Aires', 'del viso', '1669', '-32.9304491--68.8227965', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422595, '', '2024-04-29', NULL, ''),
(431820, 'martinsuarez@vxt.com', 'PORTA ', '1166490767', '', '', 'VALENTIN LIZASO', '1988-01-10', '33344999', '23333449994', '1166490767', 'VALENLIZASO@gmail.com', '5GB', '', '12 a 15', '2024-04-18', 'Homero', '1772', '', '', 'florida y ruta 8', 'Provincia de Buenos Aires', 'del viso', '1669', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422596, '', '2024-04-29', NULL, ''),
(431821, 'martinsuarez@vxt.com', 'PORTA ', '1167801837', '', '', 'JUAN ANTONIO LUNA', '1960-10-26', '14198692', '23141986929', '1167010863', 'juanantonioluna60@hotmail.com', '5GB', '', '18 a 20', '2024-04-18', 'Diego de Villarroel', '10578', '', '', 'aeronautica argentina y giacomo puccini', 'Provincia de Buenos Aires', 'trujui', '1736', '-32.9139207--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422614, '', '2024-05-16', NULL, ''),
(431822, 'martinaballesteros@vxt.com', 'PORTA ', '2215900315', '', '', 'Oda Rebeca Herrera', '1988-12-06', '34816848', '27348168482', '2214191687', 'odahrrr@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-18', 'CALLE 125', '2133', '', '', 'CALLE 18 Y CALLE 18 ESTE', 'Provincia de Buenos Aires', 'BERISSO', '1914', '-32.9320629--68.8250321', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422627, '', '2024-04-30', NULL, ''),
(431823, 'renatabresuti@vxt.com', 'PORTA ', '1123652478', '', '', 'JESICA MARISOL STEFANKIW', '1991-12-15', '36643913', '27366439132', '1126970694', 'stefankiwjesica@gmail.com', '5GB', '', '12 a 15', '2024-04-18', 'guillermo marconi', '328', '', '', 'catamarca y republica de libano', 'Provincia de Buenos Aires', 'QUILMES OESTE', '1879', '-32.9249774--68.8384456', '', '', '', '', '', 'SOLICITUD CANCELADA', 422639, '', '', NULL, ''),
(431824, 'renatabresuti@vxt.com', 'PORTA ', '1126970694', '', '', 'JESICA MARISOL STEFANKIW', '1991-12-15', '36643913', '27366439132', '1126970694', 'stefankiwjesica@gmail.com', '5GB', '', '12 a 15', '2024-04-18', 'guillermo marconi', '328', '', '', 'catamarca y republica de libano', 'Provincia de Buenos Aires', 'QUILMES OESTE', '1879', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 422640, '', '', NULL, '');
INSERT INTO `ventas` (`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, `comentarios`, `estadoventa`, `numerosolicitud`, `archivo`, `fechaportacion`, `fechadecambio`, `id_foto`) VALUES
(431825, 'renatabresuti@vxt.com', 'PORTA ', '1160303104', '', '', 'JESICA MARISOL STEFANKIW', '1991-12-15', '36643913', '27366439132', '1126970694', 'stefankiwjesica@gmail.com', '5GB', '', '12 a 15', '2024-04-18', 'guillermo marconi', '328', '', '', 'catamarca y republica de libano', 'Provincia de Buenos Aires', 'QUILMES OESTE', '1879', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 422641, '', '', NULL, ''),
(431826, 'martinaballesteros@vxt.com', 'PORTA ', '2954467460', '', '', 'Segundo Serafin Carabajal', '1963-06-05', '17161996', '20171619964', '2954325879', 'segundo01carbajal@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-18', 'gral Acha', '624', '', '', 'Telem y Toay', 'La Pampa', 'Santa Rosa', '6304', '-32.9320629--68.8250321', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422644, '', '2024-04-30', NULL, ''),
(431827, 'martinaballesteros@vxt.com', 'PORTA ', '2954325879', '', '', 'Segundo Serafin Carabajal', '1963-06-05', '17161996', '20171619964', '2954325879', 'segundo01carbajal@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-18', 'gral Acha', '624', '', '', 'Telem y Toay', 'La Pampa', 'Santa Rosa', '6304', '-32.9320629--68.8250321', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422645, '', '2024-05-02', NULL, ''),
(431828, 'martinsuarez@vxt.com', 'PORTA ', '1123513012', '', '', 'JOSE LUIS SUAREZ', '1970-10-28', '21887174', '20218871748', '1140286156', 'suarezjose2301@gmail.com', '5GB', '', '9 a 12', '2024-04-19', 'estrada', '201', '', '', 'malvinas y costa rica', 'Provincia de Buenos Aires', 'LIBERTAD', '1716', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 422799, '', '', NULL, ''),
(431829, 'renatabresuti@vxt.com', 'PORTA ', '1159195371', '', '', 'JESICA MARISOL STEFANKIW', '1991-12-15', '36643913', '27366439132', '1126970694', 'stefankiwjesica@gmail.com', '5GB', '', '12 a 15', '2024-04-19', 'guillermo marconi', '328', '', '', 'Catamarca y republica de Libano', 'Provincia de Buenos Aires', 'QUILMES OESTE', '1879', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 422800, '', '', NULL, ''),
(431830, 'mariaprez@vxt.com', 'PORTA ', '2974664225', '', '', 'VERONICA CRISTINA ZAMPACH', '1971-03-01', '21961155', '27219611558', '2974664143', 'veronicazampach@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-19', 'Urcelay', '345', '', '', 'pueyrredon y estrada', 'Provincia de Buenos Aires', 'los cardales', '2814', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 422829, '', '', NULL, ''),
(431831, 'mariaprez@vxt.com', 'PORTA ', '2974664143', '', '', 'VERONICA CRISTINA ZAMPACH', '1971-03-01', '21961155', '27219611558', '2974664143', 'veronicazampach@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-19', 'Urcelay', '345', '', '', 'pueyrredon y estrada', 'Provincia de Buenos Aires', 'los cardales', '2814', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 422830, '', '', NULL, ''),
(431832, 'martinaballesteros@vxt.com', 'PORTA ', '2644454103', '', '', 'Omar Nicolas Funes', '1963-06-01', '16523811', '20165238118', '2644181609', 'funesomarnicolas@yahoo.com.ar', '5GB', '', 'TODO EL DIA', '2024-04-19', 'Honorio Pueyrredon Oeste', '1734', '', '', 'Aberastain Sur y Paso de los Andes Sur', 'San Juan', 'Rivadavia', '5400', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422849, '', '2024-05-02', NULL, ''),
(431833, 'martinaballesteros@vxt.com', 'PORTA ', '2644866247', '', '', 'Omar Nicolas Funes', '1963-06-01', '16523811', '20165238118', '2644181609', 'funesomarnicolas@yahoo.com.ar', '5GB', '', 'TODO EL DIA', '2024-04-19', 'Honorio Pueyrredon Oeste', '1734', '', '', 'Aberastain Sur y Paso de los Andes Sur', 'San Juan', 'Rivadavia', '5400', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422850, '', '2024-05-02', NULL, ''),
(431834, 'martinaballesteros@vxt.com', 'PORTA ', '2645298320', '', '', 'Omar Nicolas Funes', '1963-06-01', '16523811', '20165238118', '2644181609', 'funesomarnicolas@yahoo.com.ar', '5GB', '', 'TODO EL DIA', '2024-04-19', 'Honorio Pueyrredon Oeste', '1734', '', '', 'Aberastain Sur y Paso de los Andes Sur', 'San Juan', 'Rivadavia', '5400', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422851, '', '2024-05-02', NULL, ''),
(431835, 'renatabresuti@vxt.com', 'PORTA ', '1138664293', '', '', 'ROSENSTEIN PRICSILA IVONE', '1992-03-26', '36937011', '27369370117', '1123290288', 'priscilaivonerosenstein@gmail.com', '5GB', '', '12 a 15', '2024-04-19', 'Estados Unidos del Brasil', '3687', '', '', 'mariano moreno', 'Provincia de Buenos Aires', 'Florencio Varela', '1887', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 422858, '', '', NULL, ''),
(431836, 'martinsuarez@vxt.com', 'PORTA ', '1130863607', '', '', 'YANCHAGUANO BRYAN ISRAEL LAMINGO', '1996-06-11', '95472293', '20954722938', '1137766836', 'bryan-israel1106@hotmail.com', '5GB', '', '15 a 18', '2024-04-19', 'Azcuenaga', '227', '', '', 'sarmiento y juan domingo peron', 'Provincia de Buenos Aires', 'balvanera', '1029', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 422891, '', '2024-04-30', NULL, ''),
(431837, 'martinsuarez@vxt.com', 'PORTA ', '2994066088', '', '', 'MARIANA ANAHI GARCIA', '1992-11-07', '23098825', '27230988256', '2994086705', 'anahiarin@hotmail.com', '5GB', '', '9 a 12', '2024-04-19', 'Gral. Conrado Villegas', '772', '', '', 'manuel alberti y domingo basavilbaso', 'Neuquen', 'neuquen', '8300', '-', '', '', '', '', '', 'INFORMADA TASA', 422892, '', '', NULL, ''),
(431838, 'martinaballesteros@vxt.com', 'PORTA ', '1138608960', '', '', 'Irina Yael Rojo', '1985-08-26', '31829620', '27318296206', '11452805760', 'mis.3.estrellitas@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-04-22', 'Nueva York', '7039', '', '', 'Guandacol y Maximo Herrera', 'Provincia de Buenos Aires', 'Virrey del Pino', '1764', '-32.9249774--68.8384456', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423335, '', '2024-04-30', NULL, ''),
(431839, 'martinaballesteros@vxt.com', 'PORTA ', '2914396699', '', '', 'NEHUEN EMMANUEL QUIMEY LAMAS GUANUCO', '1997-09-05', '40099304', '20400993042', '2914222169', 'nehuenlamas@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-22', '17 de mayo', '389', '', '', 'Viamonte y Castelli', 'Provincia de Buenos Aires', 'Bahia Blanca', '8003', '-32.9249774--68.8384456', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423337, '', '2024-04-30', NULL, ''),
(431840, 'renatabresuti@vxt.com', 'PORTA ', '1160363504', '', '', 'RODRIGO SEBASTIAN HUNCO', '1986-02-23', '32279341', '20322793414', '1166770190', 'roy.hunko@gmail.com', '5GB', '', '12 a 15', '2024-04-22', 'C. brughetti', '3502', '', '', 'San Blas y Tegucigalpa', 'Provincia de Buenos Aires', 'jose c paz', '1666', '-32.9139207--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423339, '', '2024-05-14', NULL, ''),
(431841, 'renatabresuti@vxt.com', 'PORTA ', '1127710016', '', '', 'RODRIGO SEBASTIAN HUNCO', '1986-02-23', '32279341', '20322793414', '1166770190', 'roy.hunko@gmail.com', '5GB', '', '12 a 15', '2024-04-22', 'C. brughetti', '3502', '', '', 'San Blas y Tegucigalpa', 'Provincia de Buenos Aires', 'jose c paz', '1666', '-32.9139207--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423340, '', '2024-05-14', NULL, ''),
(431842, 'renatabresuti@vxt.com', 'PORTA ', '1166770190', '', '', 'MARIANA SOLEDAD SARMIENTO', '1981-06-09', '28846312', '27288463129', '1160363504', 'hms.sarmiento@gmail.com', '5GB', '', '12 a 15', '2024-04-22', 'C. brughetti', '3502', '', '', 'San Blas y Tegucigalpa', 'Provincia de Buenos Aires', 'jose c paz', '1666', '-32.9249774--68.8384456', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423344, '', '2024-05-03', NULL, ''),
(431843, 'renatabresuti@vxt.com', 'PORTA ', '1130616230', '', '', 'CLAUDIO FABIAN RIOS', '1970-11-05', '21922535', '20219225351', '1125689412', 'riosclaudiofabian5@gmail.com', '5GB', '', '18 a 20', '2024-04-22', 'Estanislao del campo', '1176', '', '', 'pi?ero y 18 de octubre', 'Provincia de Buenos Aires', 'jose c paz', '1666', '-32.9249774--68.8384456', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423347, '', '2024-04-30', NULL, ''),
(431844, 'renatabresuti@vxt.com', 'PORTA ', '1122668830', '', '', 'ISAIAS DAVID FABREGAS', '1987-10-17', '33286849', '20332868498', '1165789555', 'fabregasisaiasdavid@gmail.com', '5GB', '', '15 a 18', '2024-04-22', 'BOUCHARD', '1343', '', '', 'cantilo y espa?a', 'Provincia de Buenos Aires', 'SAN VICENTE', '1865', '-32.9320629--68.8250321', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423380, '', '2024-04-30', NULL, ''),
(431845, 'martinsuarez@vxt.com', 'PORTA ', '1138646233', '', '', 'LORENA BEATRIZ GUCHEA', '1982-10-01', '29908352', '27299083522', '1123835197', 'lorenaguchea81@gmail.com', '5GB', '', '15 a 18', '2024-04-23', 'Primera Junta', '69', '', '', 'bandera nacional y avenida rivadavia', 'Provincia de Buenos Aires', 'marcos paz', '1724', '-32.9362743--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423668, '', '2024-05-15', NULL, ''),
(431846, 'martinaballesteros@vxt.com', 'PORTA ', '2617234237', '', '', 'Gabriel Guillermo Lemos', '1995-12-26', '39381071', '20393810719', '2617254651', 'lemos.95.gabriel@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-23', 'Puerto Rico', '2247', '', '', 'Correa Saa y Granaderos San Martin', 'Mendoza', 'Guaymallen', '5519', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 423671, '', '', NULL, ''),
(431847, 'mariaprez@vxt.com', 'PORTA ', '1126793874', '', '', 'DAIANA MIRIAM GUERRA', '1987-11-24', '33380189', '27333801898', '1171472032', 'daiana.fa.1987@gmail.com', '5GB', '', '9 a 12', '2024-04-23', 'Carlos Pellegrini', '6083', '', '', '25 de mayo y coronel pringles', 'Provincia de Buenos Aires', 'Billinghurst', '1650', '-32.9320515--68.8235417', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423676, '', '2024-05-09', NULL, ''),
(431848, 'mariaprez@vxt.com', 'PORTA ', '2613387751', '', '', 'ANABEL ROXANA ALARCON', '1989-02-26', '34191080', '27341910809', '2616523561', 'alarconroxana@gmail.com', '5GB', '', '9 a 12', '2024-04-23', 'Los Periodistas', '3061', '', '', 'CERRO JUNCAL Y LOS ESCULTORES', 'Mendoza', 'MAIPU', '5515', '-32.9362588--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423681, '', '2024-04-30', NULL, ''),
(431849, 'mariaprez@vxt.com', 'PORTA ', '2616523561', '', '', 'ANABEL ROXANA ALARCON', '1989-02-26', '34191080', '27341910809', '2616523561', 'alarconroxana@gmail.com', '5GB', '', '9 a 12', '2024-04-23', 'Los Periodistas', '3061', '', '', 'CERRO JUNCAL Y LOS ESCULTORES', 'Mendoza', 'MAIPU', '5515', '-32.9362588--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423682, '', '2024-05-09', NULL, ''),
(431850, 'martinsuarez@vxt.com', 'PORTA ', '1167010863', '', '', 'JUAN ANTONIO LUNA', '1960-10-26', '14198692', '23141986929', '1167010863', 'juanantonioluna60@hotmail.com', '5GB', '', '18 a 20', '2024-04-23', 'Diego de Villarroel', '10578', '', '', 'aeronautica argentina y giacomo puccini', 'Provincia de Buenos Aires', 'trujui', '1736', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 423690, '', '', NULL, ''),
(431851, 'renatabresuti@vxt.com', 'PORTA ', '2944666975', '', '', 'ANA CAROLINA MANCINELLI', '1973-02-27', '23226201', '27232262015', '2944698745', 'caromanci@yahoo.com', '5GB', '', '12 a 15', '2024-04-23', 'Hilario Cuadros', '181', '', '', 'ayelen y abel fleuri', 'Rio Negro', 'san carlos de bariloche', '8400', '-32.925193--68.8391908', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423693, '', '2024-05-23', NULL, ''),
(431852, 'renatabresuti@vxt.com', 'PORTA ', '2615787756', '', '', 'GUSTAVO FABIAN ANDRE LAZZARINI', '1973-12-16', '23692853', '20236928536', '2616510287', 'gfandre@gmail.com', '5GB', '', '15 a 18', '2024-04-23', 'cervantes', '2289', '', '', 'Rawson y Hernandarias', 'Mendoza', 'godoy cruz', '5501', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 423696, '', '', NULL, ''),
(431853, 'renatabresuti@vxt.com', 'PORTA ', '2616510287', '', '', 'GUSTAVO FABIAN ANDRE LAZZARINI', '1973-12-16', '23692853', '20236928536', '2616510287', 'gfandre@gmail.com', '5GB', '', '15 a 18', '2024-04-23', 'cervantes', '2289', '', '', 'Rawson y Hernandarias', 'Mendoza', 'godoy cruz', '5501', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 423697, '', '', NULL, ''),
(431854, 'renatabresuti@vxt.com', 'PORTA ', '2615408312', '', '', 'GUSTAVO FABIAN ANDRE LAZZARINI', '1973-12-16', '23692853', '20236928536', '2616510287', 'gfandre@gmail.com', '5GB', '', '15 a 18', '2024-04-23', 'cervantes', '2289', '', '', 'Rawson y Hernandarias', 'Mendoza', 'godoy cruz', '5501', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 423698, '', '', NULL, ''),
(431855, 'renatabresuti@vxt.com', 'PORTA ', '2615739660', '', '', 'GUSTAVO FABIAN ANDRE LAZZARINI', '1973-12-16', '23692853', '20236928536', '2616510287', 'gfandre@gmail.com', '5GB', '', '15 a 18', '2024-04-23', 'cervantes', '2289', '', '', 'Rawson y Hernandarias', 'Mendoza', 'godoy cruz', '5501', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 423699, '', '', NULL, ''),
(431856, 'martinsuarez@vxt.com', 'PORTA ', '1140664224', '', '', 'NICOLAS MARTIN GIOVANETTI', '1985-11-26', '32288883', '20322888830', '1141709778', 'GIOVANETTI.N@GMAIL.COM', '5GB', '', '12 a 15', '2024-04-23', 'Av. Olazabal', '4545', '', '', 'Alvares thomas y miller', 'Provincia de Buenos Aires', 'villa urquiza', '1431', '-32.9155756--68.8458975', '', '', '', '', '', 'INGRESADA TASA', 423703, '', '', NULL, ''),
(431857, 'martinsuarez@vxt.com', 'PORTA ', '1141709778', '', '', 'NICOLAS MARTIN GIOVANETTI', '1985-11-26', '32288883', '20322888830', '1141709778', 'GIOVANETTI.N@GMAIL.COM', '5GB', '', '12 a 15', '2024-04-23', 'Av. Olazabal', '4545', '', '', 'Alvares thomas y miller', 'Provincia de Buenos Aires', 'villa urquiza', '1431', '-32.9362588--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423704, '', '2024-05-09', NULL, ''),
(431858, 'martinsuarez@vxt.com', 'PORTA ', '1149605713', '', '', 'NICOLAS MARTIN GIOVANETTI', '1985-11-26', '32288883', '20322888830', '1141709778', 'GIOVANETTI.N@GMAIL.COM', '10GB', '', '12 a 15', '2024-04-23', 'Av. Olazabal', '4545', '', '', 'Alvares thomas y miller', 'Provincia de Buenos Aires', 'villa urquiza', '1431', '-32.9362588--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423705, '', '2024-05-09', NULL, ''),
(431859, 'renatabresuti@vxt.com', 'PORTA ', '2942699197', '', '', 'MARINA ALEJANDRA BARROS', '2002-08-28', '43947258', '27439472583', '2942638794', 'sandovaljoel592@gmail.com', '', '', '9 a 12', '2024-04-24', 'Antartida argentina', '478', '', '', '25 de mayo y chachil', 'Neuquen', 'Zapala', '8340', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 423829, '', '', NULL, ''),
(431860, 'martinaballesteros@vxt.com', 'PORTA ', '2657608706', '', '', 'Sebastian Julio Volando', '1992-07-22', '40484735', '20404847350', '2657709529', 'sebastianvolando8@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-24', 'M Olagaray', '418', '', '', 'Brasil y Bolivia', 'San Luis', 'Villa Mercedes', '5730', '-32.9155464--68.83621', '', '', '', '', '', 'SOLICITUD CANCELADA', 423830, '', '', NULL, ''),
(431861, 'martinsuarez@vxt.com', 'PORTA ', '1169309295', '', '', 'GISELA ANALIA CAGESSO', '1974-04-24', '23866667', '27238666673', '1133064839', 'cagessogisela@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-24', 'libertador gral san martin', '3258', '', '', 'pasteur y carrasco', 'Provincia de Buenos Aires', 'san justo', '1754', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423882, '', '2024-05-09', NULL, ''),
(431862, 'martinsuarez@vxt.com', 'PORTA ', '1133064839', '', '', 'GISELA ANALIA CAGESSO', '1974-04-24', '23866667', '27238666673', '1133064839', 'cagessogisela@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-24', 'libertador gral san martin', '3258', '', '', 'pasteur y carrasco', 'Provincia de Buenos Aires', 'san justo', '1754', '-32.9362588--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423883, '', '2024-05-09', NULL, ''),
(431863, 'renatabresuti@vxt.com', 'PORTA ', '1149175193', '', '', 'ROSA LINDA ALVAREZ MEDRANO', '2003-05-30', '95223190', '27952231907', '1166034442', 'rosalindaalvarezmedrano.2003@gmail.com', '5GB', '', '9 a 12', '2024-04-24', 'la quinta', '64', '', '', 'Benavidez', 'Provincia de Buenos Aires', '9 de abril', '1839', '-32.9265664--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 423885, '', '2024-05-10', NULL, ''),
(431864, 'martinaballesteros@vxt.com', 'PORTA ', '2914264920', '', '', 'Luis Alberto Gonzalez', '1962-01-25', '14721429', '20147214295', '2914500507', 'medanosluis@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-25', 'maldonado', '2293', '', '', 'Pacifico y Sgto Mayor Iturra', 'Provincia de Buenos Aires', 'Bahia Blanca', '8003', '-32.9265719--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424113, '', '2024-05-13', NULL, ''),
(431865, 'martinsuarez@vxt.com', 'PORTA ', '1153132449', '', '', 'CLAUDIO GUSTAVO TORRES', '1968-11-28', '2054864', '20205486403', '1173061828', 'alemaniasolarianaxel@gmail.com', '5GB', '', '9 a 12', '2024-04-25', 'CENTENARIO URUGUAYO', '2045', '', '', 'CAMACUA Y GRAL. MANUEL BELGRANO', 'Provincia de Buenos Aires', 'VILLA DOMINICO', '1874', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424116, '', '2024-05-09', NULL, ''),
(431866, 'martinaballesteros@vxt.com', 'PORTA ', '2664300084', '', '', 'Josue Javier Tamburo Balaguer', '1986-03-16', '32239256', '20322392568', '2665030015', 'Jjtbalaguer@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-25', 'Pres/ Peron', '1278', '', '', 'Tomas Jofre y las Heras', 'San Luis', 'San Luis', '5700', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424118, '', '2024-05-15', NULL, ''),
(431867, 'martinaballesteros@vxt.com', 'PORTA ', '2665030015', '', '', 'Josue Javier Tamburo Balaguer', '1986-03-16', '32239256', '20322392568', '2665030015', 'Jjtbalaguer@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-25', 'Pres/ Peron', '1278', '', '', 'Tomas Jofre y las Heras', 'San Luis', 'San Luis', '5700', '-32.9265664--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424119, '', '2024-05-15', NULL, ''),
(431868, 'renatabresuti@vxt.com', 'PORTA ', '2964403115', '', '', 'MARTINEZ MIMICA ENRIQUE ANTONIO', '1977-09-28', '94832317', '20948323177', '2964456894', 'enriquemartinezmimica@gmail.com', '5GB', '', '15 a 18', '2024-04-25', 'J. B. Thorne', '1613', '', '', 'alma fuerte y gdo. felix paz', 'Tierra del Fuego', 'rio grande', '9420', '-', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 424121, '', '', NULL, ''),
(431869, 'martinaballesteros@vxt.com', 'PORTA', '2644181609', '', '', 'Adriana Elizabeth Landa', '1968-01-24', '20130606', '27201306065', '2644454103', 'profelanda68@gmail.com.ar', '6GB', '', 'TODO EL DIA', '2024-04-25', 'tacuari', '507', '', '', '20 de Junio y Derqui', 'Mendoza', 'Godoy Cruz', '5501', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 424123, '', '', NULL, ''),
(431870, 'martinsuarez@vxt.com', 'FIBRA', '1153430436', '', '', 'JAVIER ORLANDO OTINIANO', '1998-03-05', '41062735', '20410627354', '1144130809', 'javier.otiniano1998@gmail.com', '300MB', '', '12 a 15', '2024-04-25', 'valle', '662', '', '', 'san jose de calasanz y riglos', 'Provincia de Buenos Aires', 'caballito', '1406', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 424247, '', '', NULL, ''),
(431871, 'martinsuarez@vxt.com', 'PORTA ', '1150602211', '', '', 'LAURA ISABEL STEPPER', '1963-03-17', '16264509', '27162645094', '1164349218', 'lolyisastepper.63@gmail.com', '5GB', '', '9 a 12', '2024-04-25', 'Jose Maria Freire', '862', '', '', 'GDOR OLIDEN Y CORONEL GUIFFRA', 'Provincia de Buenos Aires', 'PINEYRO', '1868', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424248, '', '2024-05-09', NULL, ''),
(431872, 'martinsuarez@vxt.com', 'PORTA ', '1170728298', '', '', 'LAURA ISABEL STEPPER', '1963-03-17', '16264509', '27162645094', '1164349218', 'lolyisastepper.63@gmail.com', '5GB', '', '9 a 12', '2024-04-25', 'Jose Maria Freire', '862', '', '', 'GDOR OLIDEN Y CORONEL GUIFFRA', 'Provincia de Buenos Aires', 'PINEYRO', '1868', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424249, '', '2024-05-09', NULL, ''),
(431873, 'mariaprez@vxt.com', 'PORTA ', '2615027525', '', '', 'DAVID ANTONIO LARA MIRANDA', '1980-01-01', '94198012', '20941980121', '2616974939', 'Antonio1000lara@gmail.com', '5GB', '', '9 a 12', '2024-04-26', 'BARRIO LAS AMERICAS', 'MANZANA B', '', '', 'RIO MENDOZA Y PASAJE L', 'Mendoza', 'MAIPU', '5515', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424336, '', '2024-05-14', NULL, ''),
(431874, 'mariaprez@vxt.com', 'PORTA ', '1168085591', '', '', 'FELIX ALBERTO ROJAS', '1976-10-06', '25474199', '20254741990', '1135203497', 'felix67841@gmail.com', '5GB', '', '9 a 12', '2024-04-26', 'Guamini', '372', '', '', 'marcella y puerto argentino', 'Provincia de Buenos Aires', 'ingeniero budge', '1821', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424337, '', '2024-05-14', NULL, ''),
(431875, 'martinaballesteros@vxt.com', 'PORTA ', '2235797081', '', '', 'SANCHEZ MABEL ALICIA', '1977-02-17', '25569722', '27255697221', '', 'MABEL77ALICIA@GMAIL.COM', '3GB', '', '15 a 18', '2024-04-26', 'L. Parodi', '6061', '', '', 'Los Manzanos y Mahatma Ghandi', 'Provincia de Buenos Aires', 'Mar del Plata', '7605', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 424339, '', '', NULL, ''),
(431876, 'martinaballesteros@vxt.com', 'PORTA ', '2235797041', '', '', 'SANCHEZ MABEL ALICIA', '1977-02-17', '25569722', '27255697221', '', 'MABEL77ALICIA@GMAIL.COM', '3GB', '', '15 a 18', '2024-04-26', 'L. Parodi', '6061', '', '', 'Los Manzanos y Mahatma Ghandi', 'Provincia de Buenos Aires', 'Mar del Plata', '7605', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 424340, '', '', NULL, ''),
(431877, 'martinaballesteros@vxt.com', 'PORTA ', '2235797035', '', '', 'SANCHEZ MABEL ALICIA', '1977-02-17', '25569722', '27255697221', '', 'MABEL77ALICIA@GMAIL.COM', '3GB', '', '15 a 18', '2024-04-26', 'L. Parodi', '6061', '', '', 'Los Manzanos y Mahatma Ghandi', 'Provincia de Buenos Aires', 'Mar del Plata', '7605', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 424341, '', '', NULL, ''),
(431878, 'martinsuarez@vxt.com', 'ALTA NUEVA', '2616500300', '', '', 'DAMIAN ANDRES SALAS', '1982-09-16', '29537954', '20295379546', '', 'dsalas78@gmail.com', '5GB', '', '9 a 12', '2024-04-26', 'RIOJA', '1373', '', '', 'BUENOS AIRES Y LAVALLE', 'Mendoza', 'MENDOZA', '5500', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424345, '', '2024-05-02', NULL, ''),
(431879, 'martinaballesteros@vxt.com', 'PORTA ', '1133481939', '', '', 'Francisco Maximiliano Lescano', '1990-12-13', '35362193', '23353621939', '1122784129', 'maxilescano80@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-29', 'calle 552', '488', '', '', 'C 511 y C 507', 'Provincia de Buenos Aires', 'Partido Gbdor Costa/ Florencio Varela', '1859', '-32.9265664--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424664, '', '2024-05-09', NULL, ''),
(431880, 'mariaprez@vxt.com', 'PORTA ', '1158179079', '', '', 'NORILDA MARLENE MARTINeZ', '1991-10-11', '36062935', '27360629355', '1122838722', 'norildamartinz91@gmail.com', '5GB', '', '9 a 12', '2024-04-29', 'Almte. Guillermo Brown', '610', '', '', 'santiago de liniers y mariano necochea', 'Provincia de Buenos Aires', 'pilar', '1629', '-32.9265664--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424666, '', '2024-05-10', NULL, ''),
(431881, 'renatabresuti@vxt.com', 'PORTA ', '1163782311', '', '', 'GONZALO NAHUEL SOSA', '1988-05-02', '33459251', '20334592511', '1162543348', 'sosa.gon@gmail.com', '5GB', '', '15 a 18', '2024-04-29', 'machado', '2174', '', '', 'chivilcoy y padre arrieta', 'Provincia de Buenos Aires', 'Castelar', '1712', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 424669, '', '', NULL, ''),
(431882, 'martinsuarez@vxt.com', 'PORTA ', '1158955913', '', '', 'JOSE ERNESTO DIAZ', '1974-04-19', '23627598', '20236275982', '1122170262', 'JOSEERNESTOD@HOTMAIL.COM', '5GB', '', '9 a 12', '2024-04-29', 'Saujil', '8565', '', '', 'santiago del estero y manzanares', 'Provincia de Buenos Aires', 'virrey del pino', '1763', '-32.9265664--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424676, '', '2024-05-10', NULL, ''),
(431883, 'martinsuarez@vxt.com', 'PORTA ', '1122170262', '', '', 'JOSE ERNESTO DIAZ', '1974-04-19', '23627598', '20236275982', '1122170262', 'JOSEERNESTOD@HOTMAIL.COM', '5GB', '', '9 a 12', '2024-04-29', 'Saujil', '8565', '', '', 'santiago del estero y manzanares', 'Provincia de Buenos Aires', 'virrey del pino', '1763', '-32.9265664--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424677, '', '2024-05-10', NULL, ''),
(431884, 'martinsuarez@vxt.com', 'PORTA ', '1135413987', '', '', 'JOSE ERNESTO DIAZ', '1974-04-19', '23627598', '20236275982', '1122170262', 'JOSEERNESTOD@HOTMAIL.COM', '5GB', '', '9 a 12', '2024-04-29', 'Saujil', '8565', '', '', 'santiago del estero y manzanares', 'Provincia de Buenos Aires', 'virrey del pino', '1763', '-32.9265664--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424678, '', '2024-05-10', NULL, ''),
(431885, 'martinsuarez@vxt.com', 'PORTA ', '1136364819', '', '', 'FRANCO DARIO VELARDEZ', '1988-12-12', '34186346', '20341863466', '1161609374', 'maxiquiascoindiana@gmail.com', '5GB', '', '12 a 15', '2024-04-29', 'Moises Lebensohn', '833', '', '', 'Edmundo Fernandes y Rivero', 'Provincia de Buenos Aires', 'Pi?eyro', '1668', '-', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 424680, '', '', NULL, ''),
(431886, 'mariaprez@vxt.com', 'PORTA ', '2615944455', '', '', 'PAOLA CAROLINA FRESNEDA', '1981-03-09', '28793078', '27287930785', '2613635466', 'fresnedacarolina@gmail.com', '5GB', '', '9 a 12', '2024-04-30', 'victoria', '257', '', '', 'yatay y federico froebel', 'Mendoza', 'villa nueva', '5521', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424913, '', '2024-05-07', NULL, ''),
(431887, 'mariaprez@vxt.com', 'PORTA ', '2613635466', '', '', 'PAOLA CAROLINA FRESNEDA', '1981-03-09', '28793078', '27287930785', '2613635466', 'fresnedacarolina@gmail.com', '5GB', '', '9 a 12', '2024-04-30', 'victoria', '257', '', '', 'yatay y federico froebel', 'Mendoza', 'villa nueva', '5521', '-32.9155756--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424914, '', '2024-05-07', NULL, ''),
(431888, 'renatabresuti@vxt.com', 'PORTA ', '2944285140', '', '', 'GUILLERMO GABRIEL BARRIGA', '1980-03-22', '27436739', '20274367394', '2944707659', 'virmasoledadrodriguez@gmail.com', '5GB', '', '15 a 18', '2024-04-30', 'peulla', '647', '', '', 'chapel y siempre viva', 'Neuquen', 'Bariloche', '8400', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 424915, '', '', NULL, ''),
(431889, 'renatabresuti@vxt.com', 'PORTA ', '2944707659', '', '', 'VIRNA SOLEDAD RODRIGUEZ', '1977-02-13', '25825617', '23258256174', '2944285140', 'virma1soledadrodriguez@gmail.com', '5GB', '', '15 a 18', '2024-04-30', 'peulla', '647', '', '', 'chapel y siempre viva', 'Neuquen', 'Bariloche', '8400', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 424918, '', '', NULL, ''),
(431890, 'martinaballesteros@vxt.com', 'PORTA ', '1136381901', '', '', 'Leandro Mauro Kamlofsky', '1981-03-03', '28697319', '20286973192', '1160672524', 'leandro22kam@gmail.com', '5GB', '', 'TODO EL DIA', '2024-04-30', 'Jose Darragueira', '1497', '', '', 'Estrada y Comahue', 'Provincia de Buenos Aires', 'Banfield', '1828', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 424922, '', '2024-05-13', NULL, ''),
(431891, 'mariaprez@vxt.com', 'PORTA ', '2236021705', '', '', 'CARLOS ALBERTO RODRIGUEZ', '1986-11-08', '32128198', '20321281983', '3415065390', 'carli-r@hotmail.com', '5GB', '', '9 a 12', '2024-04-30', 'Cnel. de Marina Segui', '1308', '', '', 'yanez pinzon y urquiza', 'Provincia de Buenos Aires', 'valeria del mar', '7167', '-', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 424928, '', '', NULL, ''),
(431892, 'martinaballesteros@vxt.com', 'PORTA ', '1124820047', '', '', 'Lujan Xoana Lopez', '1989-03-07', '34484637', '27344846370', '3885011736', 'cielovale703@gmail.com', '5GB', '', '12 a 15', '2024-05-02', 'Corrientes', '385', '', '', 'Pablo Lamberti y Cabo Primero Sullings', 'Provincia de Buenos Aires', 'Garin', '1623', '-32.9139207--68.8466427', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425061, '', '2024-05-15', NULL, ''),
(431893, 'martinaballesteros@vxt.com', 'PORTA ', '3885011736', '', '', 'NESTOR JUAN PABLO TEJERINA', '1987-04-02', '32625773', '20326257738', '1124820047', 'juanpablotejerina2018@gmail.com', '5GB', '', '12 a 15', '2024-05-02', 'Corrientes', '385', '', '', 'Pablo Lamberti y Cabo Primero Sullings', 'Provincia de Buenos Aires', 'Garin', '1623', '-', '', '', '', '', '', 'DIFERIDA AUDITORIA', 425063, '', '', NULL, ''),
(431894, 'martinsuarez@vxt.com', 'PORTA ', '1156515953', '', '', 'KARINA SOLEDAD LUNA', '1982-06-03', '29524162', '23295241624', '1151261885', 'lunak5232@gmail.com', '5GB', '', '15 a 18', '2024-05-02', 'pio baroja', '137', '', '', 'rawson y cap. sarmiento', 'Provincia de Buenos Aires', 'villa centenario', '1821', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425064, '', '2024-05-24', NULL, ''),
(431895, 'rodrigobecerra@vxt.com', 'ALTA NUEVA', '2615618475', '', '', 'Marcos Antonio Mendez', '1980-03-20', '27968350', '', '2615881888', 'Javuvalpo16@gmail.com', '300MB', '', 'TODO EL DIA', '2024-05-02', 'B? Infanta Estanislao del Campo', 'C6 M28', '', '', 'Enrique San Dicepolo y Carlos Canto', 'Mendoza', 'LAS HERAS', '5539', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425149, '', '2024-05-08', NULL, ''),
(431896, 'martinaballesteros@vxt.com', 'PORTA ', '2974424511', '', '', 'Marcos Asahel Olivieri', '1995-05-16', '38799372', '20387993720', '2975447804', 'asahel20092009@hotmail.com', '3GB', '', 'TODO EL DIA', '2024-05-02', 'Vice Comodoro Mu?oz', '38', '', '', 'Av Juan JOse Paso y Gral Lavalle', 'Chubut', 'Comodoro Rivadavia', '9000', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 425150, '', '', NULL, ''),
(431897, 'renatabresuti@vxt.com', 'PORTA ', '1168611572', '', '', 'SERGIO ARIEL OLIVIERI', '1971-01-26', '21983089', '27219830896', '1168611572', 'sergio_olivieri@hotmail.com', '5GB', '', '15 a 18', '2024-05-02', 'PAYSANDU', '332', '', '', 'CDORO MARTIN RIVADAVIA//SOLIER', 'Provincia de Buenos Aires', 'wilde', '1875', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425153, '', '2024-05-15', NULL, ''),
(431898, 'renatabresuti@vxt.com', 'PORTA ', '1169995141', '', '', 'SERGIO ARIEL OLIVIERI', '1971-01-26', '21983089', '27219830896', '1168611572', 'sergio_olivieri@hotmail.com', '5GB', '', '15 a 18', '2024-05-02', 'PAYSANDU', '332', '', '', 'CDORO MARTIN RIVADAVIA//SOLIER', 'Provincia de Buenos Aires', 'wilde', '1875', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425154, '', '2024-05-15', NULL, ''),
(431899, 'renatabresuti@vxt.com', 'PORTA ', '1157652013', '', '', 'SERGIO ARIEL OLIVIERI', '1971-01-26', '21983089', '27219830896', '1168611572', 'sergio_olivieri@hotmail.com', '5GB', '', '15 a 18', '2024-05-02', 'PAYSANDU', '332', '', '', 'CDORO MARTIN RIVADAVIA//SOLIER', 'Provincia de Buenos Aires', 'wilde', '1875', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425155, '', '2024-05-15', NULL, ''),
(431900, 'Melisa Valdez', 'PORTA ', '2966215371', '', '', 'FRANCISCO FIDEL MU?OZ CRUZ', '1987-12-13', '33288736', '20332887360', '2966652209', 'jmmcnn@hotmail.com', '5GB', '', '9 a 12', '2024-05-03', 'Sta Fe', '310', '', '', 'velez sarfield y tomas fernandez', 'Santa Cruz', 'rio gallegos', '9400', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 425254, '', '', NULL, ''),
(431901, 'Melisa Valdez', 'PORTA', '1157554157', '', '', 'EDGAR SIMON OVIEDO', '1981-10-02', '28978281', '20289782819', '1162411982', 'ES_OVIEDO@HOTMAIL.COM', '10GB', '', '9 a 12', '2024-05-03', 'av Olazabal', '4855', '', '', 'pacheco y av triunvirato', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1431', '-32.9362732--68.8429168', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425255, '', '2024-05-08', NULL, ''),
(431902, 'Melisa Valdez', 'ALTA NUEVA', '1166805054', '', '', 'MATEO AGUSTIN GUZMAN CASEJAS', '2005-05-10', '46695676', '20466956768', '1158701703', 'MATEOGUUZMAAN1@GMAIL.COM', '300MB', '', '12 a 15', '2024-05-03', 'alvarez Jonte', '1940', '', '', 'GENERAL MUNILLA - TUCUMAN Y DEAN FUNES', 'Provincia de Buenos Aires', 'Castelar', '1712', '-', '', '', '', '', '', 'INGRESADA TASA', 425326, '', '', NULL, ''),
(431903, 'renatabresuti@vxt.com', 'PORTA ', '2975029249', '', '', 'MARCOS ANDRES LASHERAS', '1979-10-19', '27499238', '20274992388', '2976259901', 'lasherasmarcos@gmail.com', '5GB', '', '18 a 20', '2024-05-03', 'Alsina', '857', '', '', 'San Martin y Rivadavia', 'Chubut', 'Comodoro Rivadavia', '9003', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425330, '', '2024-05-16', NULL, ''),
(431904, 'mariaprez@vxt.com', 'ALTA NUEVA', '2617231675', '', '', 'BRENDA NERINA COCUELLE', '1991-09-06', '36513555', '27365135555', '2617040431', 'nicolasgallardo1955@gmail.com', '300MB', '', '9 a 12', '2024-05-03', 'Valle del Sol', '968', '', '', 'primitivo de la reta y  juan manuel fangio', 'Mendoza', 'godoy cruz', '5501', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425345, '', '2024-05-06', NULL, ''),
(431905, 'martinaballesteros@vxt.com', 'PORTA ', '1164785905', '', '', 'Diego Sebastian Albarracin', '1977-06-28', '26076097', '20260760972', '1132724697', 'diealbarracin2019@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-03', 'Gral Viamonte', '1841', '', '', 'Zapiola y Navarro', 'Provincia de Buenos Aires', 'Castelar', '1712', '-32.925803--68.8280129', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425348, '', '2024-05-13', NULL, ''),
(431906, 'martinaballesteros@vxt.com', 'PORTA ', '1132724697', '', '', 'Diego Sebastian Albarracin', '1977-06-28', '26076097', '20260760972', '1132724697', 'diealbarracin2019@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-03', 'Gral Viamonte', '1841', '', '', 'Zapiola y Navarro', 'Provincia de Buenos Aires', 'Castelar', '1712', '-32.925803--68.8280129', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425349, '', '2024-05-13', NULL, ''),
(431907, 'martinaballesteros@vxt.com', 'PORTA ', '1161316992', '', '', 'Diego Sebastian Albarracin', '1977-06-28', '26076097', '20260760972', '1132724697', 'diealbarracin2019@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-03', 'Gral Viamonte', '1841', '', '', 'Zapiola y Navarro', 'Provincia de Buenos Aires', 'Castelar', '1712', '-32.925803--68.8280129', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425350, '', '2024-05-13', NULL, ''),
(431908, 'martinaballesteros@vxt.com', 'PORTA ', '1133546652', '', '', 'Diego Sebastian Albarracin', '1977-06-28', '26076097', '20260760972', '1132724697', 'diealbarracin2019@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-03', 'Gral Viamonte', '1841', '', '', 'Zapiola y Navarro', 'Provincia de Buenos Aires', 'Castelar', '1712', '-32.925803--68.8280129', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425351, '', '2024-05-13', NULL, ''),
(431909, 'martinsuarez@vxt.com', 'PORTA ', '2494603145', '', '', 'ELIANA ALEJANDRA BACINO HERRERA', '1977-06-13', '25871736', '27258717363', '2494635509', 'eliana_bacino77@yahoo.com.ar', '5GB', '', '12 a 15', '2024-05-03', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425356, '', '2024-05-20', NULL, ''),
(431910, 'martinsuarez@vxt.com', 'PORTA ', '2494635509', '', '', 'ELIANA ALEJANDRA BACINO HERRERA', '1977-06-13', '25871736', '27258717363', '2494635509', 'eliana_bacino77@yahoo.com.ar', '5GB', '', '12 a 15', '2024-05-03', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425357, '', '2024-05-20', NULL, ''),
(431911, 'martinsuarez@vxt.com', 'PORTA ', '2494249252', '', '', 'ELIANA ALEJANDRA BACINO HERRERA', '1977-06-13', '25871736', '27258717363', '2494635509', 'eliana_bacino77@yahoo.com.ar', '5GB', '', '12 a 15', '2024-05-03', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425358, '', '2024-05-20', NULL, ''),
(431912, 'martinsuarez@vxt.com', 'PORTA ', '2494549726', '', '', 'ELIANA ALEJANDRA BACINO HERRERA', '1977-06-13', '25871736', '27258717363', '2494635509', 'eliana_bacino77@yahoo.com.ar', '5GB', '', '12 a 15', '2024-05-03', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001', '-32.9362633--68.8444072', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425359, '', '2024-05-20', NULL, ''),
(431913, 'renatabresuti@vxt.com', 'PORTA', '2974528955', '', '', 'PACHECO LAURA ALEJANDRA', '1985-06-06', '31637761', '27316377616', '2974062323', 'laualepacheco@gmail.com', '6GB', '', '9 a 12', '2024-05-06', 'Francisco Urondo', '300', '', '', 'fermin chavez y silvina ocampo', 'Chubut', 'Comodoro Rivadavia', '9000', '-', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 425589, '', '', NULL, ''),
(431914, 'mariaprez@vxt.com', 'PORTA ', '2916465051', '', '', 'MARIA CRISTINA HERRERA DE LA ROSA', '1976-06-19', '93872086', '27938720865', '2915783944', 'cristinaherrera665@gmail.com', '5GB', '', '9 a 12', '2024-05-06', 'Juan Jose Paso', '156', '', '', 'BUSTAMANTE Y LAPRIDA', 'Provincia de Buenos Aires', 'MEDANOS', '8132', '-32.9185924--68.8332292', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425649, '', '2024-05-16', NULL, ''),
(431915, 'martinsuarez@vxt.com', 'PORTA ', '2915049803', '', '', 'SILVINA ANDREA POLATTINI', '1983-11-10', '30673535', '27306735352', '2916468910', 'silvina.polattini@gmail.com', '5GB', '', '18 a 20', '2024-05-06', 'Juan Molina', '853', '', '', 'almafuerte y sixto laspiur', 'Provincia de Buenos Aires', 'BAHIA BLANCA', '8000', '-32.899072--68.8357376', '', '', '', '', '', 'INGRESADA TASA', 425675, '', '', NULL, ''),
(431916, 'martinsuarez@vxt.com', 'PORTA ', '2494539300', '', '', 'CHANTRE IVANA PAOLA', '1978-08-05', '26775510', '27267755103', '2946031450', 'elianaA_bacino77@yahoo.com.ar', '5GB', '', '12 a 15', '2024-05-06', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001', '-32.9281465--68.8295033', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425681, '', '2024-05-23', NULL, ''),
(431917, 'martinsuarez@vxt.com', 'PORTA ', '2494003024', '', '', 'LUCIANO FELIPE CLEMENTI', '1975-02-18', '24104455', '20241044557', '2494603145', 'elianaaa_bacino77@yahoo.com.ar', '5GB', '', '12 a 15', '2024-05-06', 'Quintana', '503', '', '', 'dinamarca y ameghino', 'Provincia de Buenos Aires', 'TANDIL', '7001', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425700, '', '2024-05-20', NULL, ''),
(431918, 'Melisa Valdez', 'PORTA ', '2966528705', '', '', 'SOSA NIDIA MALVINA', '1982-07-12', '29512349', '23295123494', '2966270671', 'convivenciacalafate@gmail.com', '5GB', '', '12 a 15', '2024-05-07', '1015', '97', '', '', '1020 y s/nombre', 'Santa Cruz', 'calafate', '4405', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 425860, '', '2024-05-30', NULL, ''),
(431919, 'martinsuarez@vxt.com', 'FIBRA', '1155942134', '', '', 'MARIEL EMILIA GIULIANI', '1967-11-02', '18574905', '27185749059', '1125413484', 'maruegiuliani@gmail.com', '300MB', '', '15 a 18', '2024-05-07', 'Gral. Francisco Miranda', '1355', '', '', 'JUAN DE GARAY Y FRANCISCO DE ALFARO', 'Provincia de Buenos Aires', 'HURLINGHAM', '1686', '-', '', '', '', '', '', 'PENDIENTE AUDITORIA', 425921, '', '', NULL, ''),
(431920, 'martinsuarez@vxt.com', 'PORTA', '1125413482', '', '', 'MARIEL EMILIA GIULIANI', '1967-11-02', '18574905', '27185749059', '1125413484', 'maruegiuliani@gmail.com', '6GB', '', '15 a 18', '2024-05-07', 'Gral. Francisco Miranda', '1355', '', '', 'JUAN DE GARAY Y FRANCISCO DE ALFARO', 'Provincia de Buenos Aires', 'HURLINGHAM', '1686', '-', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 425923, '', '', NULL, ''),
(431921, 'martinsuarez@vxt.com', 'PORTA', '1125413484', '', '', 'MARIEL EMILIA GIULIANI', '1967-11-02', '18574905', '27185749059', '1125413484', 'maruegiuliani@gmail.com', '6GB', '', '15 a 18', '2024-05-07', 'Gral. Francisco Miranda', '1355', '', '', 'JUAN DE GARAY Y FRANCISCO DE ALFARO', 'Provincia de Buenos Aires', 'HURLINGHAM', '1686', '-', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 425925, '', '', NULL, ''),
(431922, 'renatabresuti@vxt.com', 'PORTA ', '2994539492', '', '', 'CARLA NATALIA GONZALEZ', '1976-02-25', '24825733', '23248257334', '2994297042', 'carlanqn@gmail.com', '5GB', '', '12 a 15', '2024-05-08', 'Ing Luis A. Huergo', '15', '', '', 'c. 3 y c.5', 'Neuquen', 'Neuquen', '8300', '-32.9231027--68.8406812', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426054, '', '2024-05-29', NULL, ''),
(431923, 'renatabresuti@vxt.com', 'PORTA ', '2994297042', '', '', 'CARLA NATALIA GONZALEZ', '1976-02-25', '24825733', '23248257334', '2994297042', 'carlanqn@gmail.com', '5GB', '', '12 a 15', '2024-05-08', 'Ing Luis A. Huergo', '15', '', '', 'c. 3 y c.5', 'Neuquen', 'Neuquen', '8300', '-32.9231027--68.8406812', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426055, '', '2024-05-29', NULL, ''),
(431924, 'renatabresuti@vxt.com', 'PORTA ', '2996049337', '', '', 'CARLA NATALIA GONZALEZ', '1976-02-25', '24825733', '23248257334', '2994297042', 'carlanqn@gmail.com', '5GB', '', '12 a 15', '2024-05-08', 'Ing Luis A. Huergo', '15', '', '', 'c. 3 y c.5', 'Neuquen', 'Neuquen', '8300', '-32.9231027--68.8406812', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426056, '', '2024-05-29', NULL, ''),
(431925, 'Melisa Valdez', 'PORTA', '1122971073', '', '', 'GIMENES MELISA NANCY', '1993-03-19', '37293424', '27372934242', '1159301595', 'melii.g65@gmail.com', '6GB', '', '15 a 18', '2024-05-08', 'Miguel de Unamuno', '80', '', '', 'martin rodriguez y sarmiento', 'Provincia de Buenos Aires', 'CENTENARIO', '1828', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426065, '', '2024-05-10', NULL, ''),
(431926, 'mariaprez@vxt.com', 'PORTA ', '1130917245', '', '', 'MELINA ELIZABET PEREYRA', '1989-11-07', '34983065', '27349830650', '1134561827', 'melinapereyra26@gmail.com', '5GB', '', '9 a 12', '2024-05-08', '131 A', '2127', '', '', 'av 21 y 22', 'Provincia de Buenos Aires', 'Berazategui', '1884', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 426150, '', '', NULL, ''),
(431927, 'renatabresuti@vxt.com', 'PORTA ', '2995712316', '', '', 'JUAN CARLOS PAEZ', '1972-02-22', '22636912', '20226369121', '2646280051', 'drjuanpaez@hotmail.com', '5GB', '', '12 a 15', '2024-05-09', 'GABRIEL MISTRAL', '2279', '', '', 'felipe sapag y juan pablo II', 'Neuquen', 'CENTENARIO', '8309', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 426379, '', '', NULL, ''),
(431928, 'renatabresuti@vxt.com', 'PORTA ', '2995712316', '', '', 'JUAN CARLOS PAEZ', '1972-02-22', '22636912', '20226369121', '2646280051', 'drjuanpaez@hotmail.com', '5GB', '', '12 a 15', '2024-05-09', 'GABRIEL MISTRAL', '2279', '', '', 'felipe sapag y juan pablo II', 'Neuquen', 'CENTENARIO', '8309', '-', '', '', '', '', '', 'INGRESADA TASA', 426380, '', '', NULL, ''),
(431929, 'Melisa Valdez', 'PORTA ', '2614677473', '', '', 'GIL CARLOS ALFREDO', '1978-10-10', '20571220', '20205712209', '2615102887', 'carlos.gil68@hotmail.com', '5GB', '', '18 a 20', '2024-05-09', 'Fray Justo Sta. Maria de Oro', '889', '', '', 'las heras y perdera', 'Mendoza', 'san jose', '5519', '-32.9292706--68.8421715', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426381, '', '2024-05-16', NULL, ''),
(431930, 'Melisa Valdez', 'ALTA NUEVA', '2984732194', '', '', 'CARDOSO CARLOS', '1983-01-16', '96254628', '20962546286', '2984146458', 'Cardozocar21@gmail.com', '10GB', '', '9 a 12', '2024-05-09', 'Don Bosco', '2605', '', '', 'COSTA RICA / LAS HERAS', 'Rio Negro', 'GENERAL ROCA', '8332', '-', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 426456, '', '', NULL, ''),
(431931, 'martinsuarez@vxt.com', 'PORTA ', '2272404280', '', '', 'MONICA GABRIELA DENIS', '1979-09-17', '26911850', '23269118504', '2272402895', 'gabriela.denis37@gmail.com', '5GB', '', '15 a 18', '2024-05-09', '44 bis', '1170', '', '', '23 y 25', 'Provincia de Buenos Aires', 'NAVARRO', '1100', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426474, '', '2024-05-17', NULL, ''),
(431932, 'martinsuarez@vxt.com', 'PORTA ', '2272402895', '', '', 'MONICA GABRIELA DENIS', '1979-09-17', '26911850', '23269118504', '2272402895', 'gabriela.denis37@gmail.com', '5GB', '', '15 a 18', '2024-05-09', '44 bis', '1170', '', '', '23 y 25', 'Provincia de Buenos Aires', 'NAVARRO', '1100', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 426475, '', '2024-05-17', NULL, ''),
(431933, 'renatabresuti@vxt.com', 'PORTA', '2995351115', '', '', 'LAURA ISOLINA SALAZAR', '1972-11-14', '25714967', '27257149671', '2994233844', 'lau3f@hotmail.com', '6GB', '', '12 a 15', '2024-05-10', 'PERITO MORENO', '587', '', '', 'ALUMINE y PULMARI', 'Neuquen', 'PLOTTIER', '8316', '-', '', '', '', '', '', 'EN TRANSITO', 426728, '', '', NULL, ''),
(431934, 'Melisa Valdez', 'PORTA ', '1138013546', '', '', 'MARICELA IGNACIA SANCHEZ QUI?ONEZ', '1990-07-31', '94236855', '27942368556', '1164274332', 'MARYSANCHEZQUINONEZ@GMAIL.COM', '5GB', '', '9 a 12', '2024-05-13', 'C. 115 A', '317', '', '', 'calle 26 b y calle 27', 'Provincia de Buenos Aires', 'berazategui oeste', '1886', '-32.9266009--68.8391908', '', '', '', '', '', 'SOLICITUD CANCELADA', 427123, '', '', NULL, ''),
(431935, 'Melisa Valdez', 'PORTA ', '1155623821', '', '', 'ROBERTO ORLANDO CORREA', '1983-03-04', '30028550', '20300285504', '1168726071', 'correaroberto98.rg@gmail.com', '3GB', '', '15 a 18', '2024-05-14', 'Finlandia', '1168', '', '', 'viamonte y domingo faustino sarmiento', 'Provincia de Buenos Aires', 'presidente derqui', '1635', '-32.9281465--68.8295033', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427219, '', '2024-05-22', NULL, ''),
(431936, 'Melisa Valdez', 'PORTA ', '1168726071', '', '', 'ROBERTO ORLANDO CORREA', '1983-03-04', '30028550', '20300285504', '1168726071', 'correaroberto98.rg@gmail.com', '3GB', '', '15 a 18', '2024-05-14', 'Finlandia', '1168', '', '', 'viamonte y domingo faustino sarmiento', 'Provincia de Buenos Aires', 'presidente derqui', '1635', '-32.9281465--68.8295033', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427220, '', '2024-05-22', NULL, ''),
(431937, 'Melisa Valdez', 'PORTA ', '1134481549', '', '', 'ROBERTO ORLANDO CORREA', '1983-03-04', '30028550', '20300285504', '1168726071', 'correaroberto98.rg@gmail.com', '3GB', '', '15 a 18', '2024-05-14', 'Finlandia', '1168', '', '', 'viamonte y domingo faustino sarmiento', 'Provincia de Buenos Aires', 'presidente derqui', '1635', '-32.9281465--68.8295033', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427221, '', '2024-05-22', NULL, ''),
(431938, 'Melisa Valdez', 'PORTA', '1123302735', '', '', 'ALEJANDRO DAMIAN GOMEZ', '2004-09-26', '46188214', '20461882146', '1127678362', 'alejandrogomez90405@gmail.com', '10GB', '', '12 a 15', '2024-05-14', 'Gordillo', '762', '', '', 'san benito y helvecia', 'Provincia de Buenos Aires', 'Merlo', '1716', '-', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427226, '', '2024-05-17', NULL, ''),
(431939, 'Melisa Valdez', 'PORTA ', '1158013543', '', '', 'GABRIELA MABEL CARRETE', '1969-03-31', '20735916', '27207359160', '1161611581', 'gcarrete@hotmail.com', '5GB', '', '9 a 12', '2024-05-14', 'pasaje del chacho', '466', '', '', 'pamar y el tuyuti', 'Provincia de Buenos Aires', 'liniers', '1408', '-32.9156437--68.8295032', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427228, '', '2024-05-24', NULL, ''),
(431940, 'renatabresuti@vxt.com', 'PORTA ', '2944532049', '', '', 'MASSIEL ALEJANDRA MANZOR FUENTEALBA', '1977-10-06', '92872361', '27928723610', '2944536577', 'zarembche@hotmail.com', '5GB', '', '18 a 20', '2024-05-14', 'Cerro Runge', '85', '', '', 'cerro carbon y chalcahuano', 'Rio Negro', 'san carlos de bariloche', '8400', '-32.9281465--68.8295033', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427229, '', '2024-05-24', NULL, ''),
(431941, 'Melisa Valdez', 'FIBRA', '1135685515', '', '', 'DANIEL PABLO MANZUR', '1978-07-10', '26768923', '20267689238', '1155802568', 'pmanzur78@gmail.com', '300MB', '', '18 a 20', '2024-05-14', 'Ozanam', '1790', '', '', 'ingeniero sagasta - intendente aguer0', 'Provincia de Buenos Aires', 'MORON', '1718', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 427250, '', '', NULL, ''),
(431942, 'martinsuarez@vxt.com', 'PORTA ', '1136216724', '', '', 'MARTIN ARIEL FERRARA', '1974-10-24', '24228784', '20242287844', '1138223726', 'martin_elboquence74@hotmail.com', '5GB', '', '12 a 15', '2024-05-14', 'Terrada', '3145', '', '', 'NAZARRE Y MELINCUE', 'Provincia de Buenos Aires', 'VILLA DEL PARQUE', '1417', '-32.9210606--68.8458975', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427251, '', '2024-05-23', NULL, ''),
(431943, 'renatabresuti@vxt.com', 'PORTA ', '2664649433', '', '', 'Hector Esteban Gomez Gatica', '1970-04-20', '21382350', '20213823508', '2664482988', 'drestebangomezgatica@gmail.com', '10GB', '', '12 a 15', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrredon y las jarillas', 'San Luis', 'San Luis', '5700', '-32.9156437--68.8295032', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427344, '', '2024-05-30', NULL, ''),
(431944, 'renatabresuti@vxt.com', 'PORTA ', '2664482988', '', '', 'Hector Esteban Gomez Gatica', '1970-04-20', '21382350', '20213823508', '2664482988', 'drestebangomezgatica@gmail.com', '10GB', '', '12 a 15', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrredon y las jarillas', 'San Luis', 'San Luis', '5700', '-32.9156437--68.8295032', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427345, '', '2024-05-30', NULL, '');
INSERT INTO `ventas` (`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, `comentarios`, `estadoventa`, `numerosolicitud`, `archivo`, `fechaportacion`, `fechadecambio`, `id_foto`) VALUES
(431945, 'renatabresuti@vxt.com', 'PORTA ', '2664379356', '', '', 'Hector Esteban Gomez Gatica', '1970-04-20', '21382350', '20213823508', '2664482988', 'drestebangomezgatica@gmail.com', '10GB', '', '12 a 15', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrredon y las jarillas', 'San Luis', 'San Luis', '5700', '-32.9156437--68.8295032', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427346, '', '2024-05-30', NULL, ''),
(431946, 'renatabresuti@vxt.com', 'PORTA ', '2664360780', '', '', 'Hector Esteban Gomez Gatica', '1970-04-20', '21382350', '20213823508', '2664482988', 'drestebangomezgatica@gmail.com', '10GB', '', '12 a 15', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrredon y las jarillas', 'San Luis', 'San Luis', '5700', '-32.9156437--68.8295032', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427347, '', '2024-05-30', NULL, ''),
(431947, 'renatabresuti@vxt.com', 'PORTA ', '2664402192', '', '', 'Hector Esteban Gomez Gatica', '1970-04-20', '21382350', '20213823508', '2664482988', 'drestebangomezgatica@gmail.com', '10GB', '', '12 a 15', '2024-05-14', 'las jarillas', '1', '', '', 'av aguada de Pueyrredon y las jarillas', 'San Luis', 'San Luis', '5700', '-32.9156437--68.8295032', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 427348, '', '2024-05-30', NULL, ''),
(431948, 'Melisa Valdez', 'PORTA ', '2615371629', '', '', 'DIEGO GABRIEL RIOS', '1982-09-22', '29745735', '20297457358', '2616839370', 'diego_rios_mkt@hotmail.com.ar', '3GB', '', '9 a 12', '2024-05-15', 'ingeniero luis cerra', '12', '', '', 'militon arroyo y gui?azu', 'Mendoza', 'guaymallen', '5523', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 427554, '', '', NULL, ''),
(431949, 'Melisa Valdez', 'PORTA ', '1169903666', '', '', 'HECTOR ANTONIO ZABATEL', '1961-02-21', '14251595', '20142515955', '1169903666', 'hzabatel@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-15', 'Sarmiento', '221', '', '', 'guiraldes  mansilla', 'Provincia de Buenos Aires', 'glew', '1856', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 427555, '', '', NULL, ''),
(431950, 'martinsuarez@vxt.com', 'PORTA ', '2236682390', '', '', 'FAVIO FIORE COSCO', '1985-03-16', '31185724', '20311857240', '2236686660', 'silviaisavio@yahoo.com.ar', '5GB', '', '15 a 18', '2024-05-15', 'Tripulantes del Fournier', '7134', '', '', 'CNOEL VIDAL Y C.FRIULI', 'Provincia de Buenos Aires', 'MAR DEL PLATA', '7608', '-', '', '', '', '', '', 'DEVUELTA X VENDEDOR', 427591, '', '', NULL, ''),
(431951, 'martinsuarez@vxt.com', 'PORTA ', '2236682390', '', '', 'FAVIO FIORE COSCO', '1985-03-16', '31185724', '20311857240', '2236686660', 'silviaisavio@yahoo.com.ar', '5GB', '', '15 a 18', '2024-05-15', 'Tripulantes del Fournier', '7134', '', '', 'CNOEL VIDAL Y C.FRIULI', 'Provincia de Buenos Aires', 'MAR DEL PLATA', '7608', '-32.9174935--68.8466427', '', '', '', '', '', 'INGRESADA TASA', 427592, '', '', NULL, ''),
(431952, 'martinsuarez@vxt.com', 'FIBRA', '2236682390', '', '', 'FAVIO FIORE COSCO', '1985-03-16', '31185724', '20311857240', '2236686660', 'silviaisavio@yahoo.com.ar', '300MB', '', '15 a 18', '2024-05-15', 'AV VERTIZ', '8718', '', '', 'Go?i // Florencio Martinez de Hoz // calle 25', 'Provincia de Buenos Aires', 'MAR DEL PLATA', '7600', '-32.920178--68.8458975', '', '', '', '', '', 'INGRESADA TASA', 427595, '', '', NULL, ''),
(431953, 'Melisa Valdez', 'PORTA ', '1136813344', '', '', 'LUGO TEJEDOR JUAN ALBERTO', '1978-11-07', '26567732', '20265677321', '1123601660', 'jlugotejedor@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-16', 'barzana', '1558', '', '', 'gandara y constantinopla', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'comuna 15', '1431', '-', '', '', '', '', '', 'INGRESADA TASA', 427786, '', '', NULL, ''),
(431954, 'Melisa Valdez', 'PORTA ', '1123601660', '', '', 'LUGO TEJEDOR JUAN ALBERTO', '1978-11-07', '26567732', '20265677321', '1123601660', 'jlugotejedor@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-16', 'barzana', '1558', '', '', 'gandara y constantinopla', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'comuna 15', '1431', '-', '', '', '', '', '', 'INGRESADA TASA', 427787, '', '', NULL, ''),
(431955, 'Melisa Valdez', 'PORTA ', '2920274404', '', '', 'CARMELO JOSE IBANEZ', '1990-10-29', '35591032', '20355910327', '2920607091', 'carmelo_29_90@hotmail.com', '5GB', '', 'TODO EL DIA', '2024-05-17', 'Urquiza', '452', '', '', 'miguel mu?oz - espa?a', 'Rio Negro', 'cipolletti', '8324', '-32.9244791--68.8280129', '', '', '', '', '', 'INGRESADA TASA', 428071, '', '', NULL, ''),
(431956, 'Melisa Valdez', 'PORTA ', '2323548224', '', '', 'MARCELA MATILDE VERA', '1970-01-14', '21435740', '27214357408', '2323315200', 'marcelamatildevera@gmail.com', '5GB', '', '9 a 12', '2024-05-17', 'Gral. Carlos Maria de Alvear', '735', '', '', 'almirante broun y 25 de mayo', 'Provincia de Buenos Aires', 'lujan', '6700', '-', '', '', '', '', '', 'PENDIENTE CARGA TASA', 428075, '', '', NULL, ''),
(431957, 'Melisa Valdez', 'PORTA ', '1156042974', '', '', 'CINTIA SILVINA PEREIRA', '1978-02-05', '26495053', '27264950533', '1156042974', 'p_cintia@yahoo.com.ar', '3GB', '', 'TODO EL DIA', '2024-05-17', 'Escribano Francisco Vazquez', '3550', '', '', 's/ nombre', 'Provincia de Buenos Aires', 'echeverria', '1807', '-', '', '', '', '', '', 'SOLICITUD CANCELADA', 428076, '', '', NULL, ''),
(431958, 'martinsuarez@vxt.com', 'PORTA ', '2995774636', '', '', 'MARIANA ANAHI GARCIA', '1992-11-07', '23098825', '27230988256', '2994086705', 'anahiarin@hotmail.com', '5GB', '', '9 a 12', '2024-05-17', 'Gral. Conrado Villegas', '772', '', '', 'manuel alberti y domingo basavilbaso', 'Neuquen', 'neuquen', '8300', '-', '', '', '', '', '', 'INFORMADA TASA', 428077, '', '', NULL, ''),
(431959, 'martinsuarez@vxt.com', 'PORTA ', '1123197051', '', '', 'ROMINA LORENA CHAVEZ', '1991-04-16', '36083554', '27360835540', '1123197051', 'romy1012@hotmail.com', '5GB', '', '12 a 15', '2024-05-17', 'Las Margaritas', '560', '', '', 'LAS AMAPOLAS Y LOS TULIPANES', 'Provincia de Buenos Aires', 'CIUDAD EVITA', '1778', '-32.9244791--68.8280129', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428080, '', '2024-05-24', NULL, ''),
(431960, 'martinsuarez@vxt.com', 'PORTA ', '1123197090', '', '', 'ROMINA LORENA CHAVEZ', '1991-04-16', '36083554', '27360835540', '1123197051', 'romy1012@hotmail.com', '5GB', '', '12 a 15', '2024-05-17', 'Las Margaritas', '560', '', '', 'LAS AMAPOLAS Y LOS TULIPANES', 'Provincia de Buenos Aires', 'CIUDAD EVITA', '1778', '-32.9244791--68.8280129', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428081, '', '2024-05-24', NULL, ''),
(431961, 'martinsuarez@vxt.com', 'PORTA ', '1132779588', '', '', 'ROMINA LORENA CHAVEZ', '1991-04-16', '36083554', '27360835540', '1123197051', 'romy1012@hotmail.com', '5GB', '', '12 a 15', '2024-05-17', 'Las Margaritas', '560', '', '', 'LAS AMAPOLAS Y LOS TULIPANES', 'Provincia de Buenos Aires', 'CIUDAD EVITA', '1778', '-32.9244791--68.8280129', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428082, '', '2024-05-24', NULL, ''),
(431962, 'martinsuarez@vxt.com', 'PORTA ', '1123927942', '', '', 'Victor Manuel Caruci Briones', '1984-01-25', '96089904', '20960899041', '1126925842', 'SINDATOS@SSINDATOS.COM', '5GB', '', 'TODO EL DIA', '2024-05-17', 'Av. Belgrano', '1944', '', '', 'SARANDI Y COMBATE DE LOS POZOS', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1094', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428136, '', '', NULL, ''),
(431963, 'martinaballesteros@vxt.com', 'PORTA ', '2213140557', '', '', 'GODOFREDO LOZANO BAUDON', '1984-03-09', '30876429', '20308764290', '2215468431', 'godofredolb@live.com.ar', '5GB', '', 'TODO EL DIA', '2024-05-20', 'CALLE 47', '418', '', '', 'DIAGONAL 77 Y CALLE 3', 'Provincia de Buenos Aires', 'LA PLATA', '1900', '-32.9231027--68.8406812', '', '', '', '', '', 'INGRESADA TASA', 428327, '', '', NULL, ''),
(431964, 'juanpalleres@vxt.com', 'PORTA ', '2616677080', '', '', 'EMMANUEL MAXIMILIANO HERRERA', '1988-03-24', '33631481', '20336314810', '2612173889', 'megadeth3363@gmail.com', '5GB', '', '12 a 15', '2024-05-20', 'El nihuil', '10', '', '', 'Mangiapani y Padre llorens', 'Mendoza', 'Las heras', '5539', '-32.9231027--68.8406812', '', '', '', '', '', 'INGRESADA TASA', 428378, '', '', NULL, ''),
(431965, 'martinsuarez@vxt.com', 'FIBRA', '1167801837', '', '', 'JUAN ANTONIO LUNA', '1960-10-26', '14198692', '23141986929', '1167010863', 'juanantonioluna60@hotmail.com', '300MB', '', '18 a 20', '2024-05-20', 'Diego de Villarroel', '10578', '', '', 'aeronautica argentina y giacomo puccini', 'Provincia de Buenos Aires', 'trujui', '1736', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428389, '', '', NULL, ''),
(431966, 'martinaballesteros@vxt.com', 'PORTA ', '1140497141', '', '', 'Marcos Javier Ayosa', '1984-10-14', '31243970', '20312439701', '1151123553', 'marcos.j.ayosa@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-20', 'JUNIN', '1613', '', '', 'camino real moron y alegoria matorras', 'Provincia de Buenos Aires', 'Bolunge', '1609', '-', '', '', '', '', '', 'PENDIENTE CARGA TASA', 428409, '', '', NULL, ''),
(431967, 'juanpalleres@vxt.com', 'PORTA ', '1131112199', '', '', 'BRUSCHINI DIEGO MAXIMILIANO', '1979-06-26', '27239531', '20272395315', '1169970372', 'Elpipigoleador@gmail.com', '5GB', '', '12 a 15', '2024-05-20', 'Pergamino', '722', '', '', 'arredondo y mansilla', 'Provincia de Buenos Aires', 'Sarandi', '1872', '-33.0572249--68.5604755', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428574, '', '', NULL, ''),
(431968, 'juanpalleres@vxt.com', 'ALTA NUEVA', '1131112199', '', '', 'BRUSCHINI DIEGO MAXIMILIANO', '1979-06-26', '27239531', '20272395315', '1169970372', 'Elpipigoleador@gmail.com', '300MB', '', '12 a 15', '2024-05-20', 'Pergamino', '722', '', '', 'arredondo y mansilla', 'Provincia de Buenos Aires', 'Sarandi', '1872', '-33.0534067--68.5666196', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428575, '', '', NULL, ''),
(431969, 'Melisa Valdez', 'PORTA ', '2234238257', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '27249149662', '2234238257', 'SANDRAYRODY@GMAIL.COM', '3GB', '', 'TODO EL DIA', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604', '-33.0572249--68.5604755', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428577, '', '2024-05-29', NULL, ''),
(431970, 'Melisa Valdez', 'PORTA ', '2235509398', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '27249149662', '2234238257', 'SANDRAYRODY@GMAIL.COM', '3GB', '', 'TODO EL DIA', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604', '-33.0572249--68.5604755', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428578, '', '2024-05-29', NULL, ''),
(431971, 'Melisa Valdez', 'PORTA ', '2235014098', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '27249149662', '2234238257', 'SANDRAYRODY@GMAIL.COM', '3GB', '', 'TODO EL DIA', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604', '-33.0572249--68.5604755', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428579, '', '2024-05-29', NULL, ''),
(431972, 'Melisa Valdez', 'PORTA ', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '27249149662', '2234238257', 'SANDRAYRODY@GMAIL.COM', '3GB', '', 'TODO EL DIA', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604', '-33.0572249--68.5604755', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428580, '', '2024-05-29', NULL, ''),
(431973, 'Melisa Valdez', 'PORTA ', '2235772498', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '27249149662', '2234238257', 'SANDRAYRODY@GMAIL.COM', '3GB', '', 'TODO EL DIA', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604', '-33.0572249--68.5604755', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428581, '', '2024-05-29', NULL, ''),
(431974, 'Melisa Valdez', 'PORTA ', '2236171035', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '27249149662', '2234238257', 'SANDRAYRODY@GMAIL.COM', '3GB', '', 'TODO EL DIA', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'Mar del plata', '7604', '-33.0572249--68.5604755', '', '', '', '', '', 'SOLICITUD CUMPLIDA', 428582, '', '2024-05-29', NULL, ''),
(431975, 'Melisa Valdez', 'PORTA ', '2615088384', '', '', 'RODRIGUEZ/MARIANO FABIAN', '1980-06-06', '27763872', '20277638720', '2615088384', 'soporte.mariano@gmail.com', '3GB', '', 'TODO EL DIA', '2024-05-20', '33 orientales', '13', '', '', 'Esquina  Monse?or Verdaguer', 'Mendoza', 'Las Heras', '5539', '-33.0572249--68.5604755', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428584, '', '', NULL, ''),
(431976, 'Melisa Valdez', 'PORTA ', '2614195300', '', '', 'RODRIGUEZ/MARIANO FABIAN', '1980-06-06', '27763872', '20277638720', '2615088384', 'soporte.mariano@gmail.com', '3GB', '', 'TODO EL DIA', '2024-05-20', '33 orientales', '13', '', '', 'Esquina  Monse?or Verdaguer', 'Mendoza', 'Las Heras', '5539', '-33.0572249--68.5604755', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428585, '', '', NULL, ''),
(431977, 'Melisa Valdez', 'PORTA ', '2616982013', '', '', 'RODRIGUEZ/MARIANO FABIAN', '1980-06-06', '27763872', '20277638720', '2615088384', 'soporte.mariano@gmail.com', '3GB', '', 'TODO EL DIA', '2024-05-20', '33 orientales', '13', '', '', 'Esquina  Monse?or Verdaguer', 'Mendoza', 'Las Heras', '5539', '-33.0572249--68.5604755', '', '', '', '', '', 'DEVUELTA X AUDITORIA', 428586, '', '', NULL, ''),
(431978, 'Melisa Valdez', 'FIBRA', '2235025968', '', '', 'SANDRA ANDREA AGUERO', '1975-12-23', '24914966', '27249149662', '2234238257', 'SANDRAYRODY@GMAIL.COM', '300MB', '', 'TODO EL DIA', '2024-05-20', 'PERU', '2474', '', '', 'FALUCHO Y GASCON', 'Provincia de Buenos Aires', 'MAR DEL PLATA', '7604', '-33.0572249--68.5604755', '', '', '', '', '', 'DIFERIDA AUDITORIA', 428587, '', '', NULL, ''),
(431979, 'mariaprez@vxt.com', 'PORTA ', '1140396277', '', '', 'MARIA CRISTINA DIAZ', '1962-02-01', '14569024', '27145690248', '1158091850', 'mcristinadiaz0102@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-20', 'Sarandi', '1235', '', '', 'av. 25 de mayo y av. san juan', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1251', '-33.0572249--68.5604755', '', '', '', '', '', 'DIFERIDA AUDITORIA', 428588, '', '', NULL, ''),
(431980, 'mariaprez@vxt.com', 'PORTA ', '1131492757', '', '', 'MARIA CRISTINA DIAZ', '1962-02-01', '14569024', '27145690248', '1158091850', 'mcristinadiaz0102@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-20', 'Sarandi', '1235', '', '', 'av. 25 de mayo y av. san juan', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1251', '-33.0572249--68.5604755', '', '', '', '', '', 'DIFERIDA AUDITORIA', 428589, '', '', NULL, ''),
(431981, 'renatabresuti@vxt.com', 'PORTA ', '2644587376', '', '', 'NACUSI HERRADA FERNANDO', '1984-03-06', '30157747', '20301577479', '2644430045', 'estudiojuridiconacusiaciar@gmail.com', '5GB', '', '9 a 12', '2024-05-20', 'sarmiento sur', '371', '', '', 'b mitre y santa fe', 'San Juan', 'san juan', '5400', '-32.9174935--68.8466427', '', '', '', '', '', 'INGRESADA TASA', 428590, '', '', NULL, ''),
(431982, 'renatabresuti@vxt.com', 'PORTA ', '2644430045', '', '', 'NACUSI HERRADA FERNANDO', '1984-03-06', '30157747', '20301577479', '2644430045', 'estudiojuridiconacusiaciar@gmail.com', '5GB', '', '9 a 12', '2024-05-20', 'sarmiento sur', '371', '', '', 'b mitre y santa fe', 'San Juan', 'san juan', '5400', '-32.9174935--68.8466427', '', '', '', '', '', 'INGRESADA TASA', 428591, '', '', NULL, ''),
(431983, 'renatabresuti@vxt.com', 'PORTA ', '1166439497', '', '', 'ADRIANA CRISTINA BLANC', '1971-04-03', '21604859', '27216048593', '1136206696', 'adrianablanc@gmail.com', '5GB', '', '15 a 18', '2024-05-20', 'Pte Jose E Uriburu', '1451', '', '', 'pe?a y french', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1114', '-33.0572249--68.5604755', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428592, '', '', NULL, ''),
(431984, 'Melisa Valdez', 'PORTA ', '2616090821', '', '', 'JORGE ERIC CASANOVA', '1995-04-06', '38907772', '20389077721', '2613601626', 'casanovaerick95@gmail.com', '3GB', '', '9 a 12', '2024-05-20', 'USHUAIA', '1040', '', '', '25 DE MAYO Y CORRIENTES', 'Mendoza', 'LAS HERAS', '5539', '-32.9174935--68.8466427', '', '', '', '', '', 'INGRESADA TASA', 428593, '', '', NULL, ''),
(431985, 'juanpalleres@vxt.com', 'ALTA NUEVA', '2612476538', '', '', 'Lautaro Nicolas Matrich', '0000-00-00', '42750283', '20427502830', '2616867718', 'matrichlautaro@gmail.com', '5GB', '', '18 a 20', '2024-05-21', 'JUNIN', '1137', '', '', 'SARMIENTO Y FORMOSA', 'Mendoza', 'GODOY CRUZ', '5501', '-', '', '', '', '', '', 'DIFERIDA AUDITORIA', 428664, '', '', NULL, ''),
(431986, 'mariaprez@vxt.com', 'PORTA ', '1136163360', '', '', 'Gustavo Jose Suarez', '1962-08-26', '18151237', '20181512378', '2204825945', 'suarezgustavo1966@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-21', 'victoriano loza', '1328', '', '', 'Entre 1ro de mayo y balcarce', 'Provincia de Buenos Aires', 'Merlo', '1722', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428668, '', '', NULL, ''),
(431987, 'juanpalleres@vxt.com', 'FIBRA', '0', '', '', 'Joaquin', '0000-00-00', '41728219', '27417282199', '', '', '500MB', '', 'TODO EL DIA', '2024-05-21', 'ARISTIDES VILLANUEVA', '752', '', '', 'BOULOGNE SUR MER Y HUARPES', 'Mendoza', 'MENDOZA', '5500', '-', '', '', '', '', '', 'INGRESADA TASA', 428717, '', '', NULL, ''),
(431988, 'Luis Salgado', 'PORTA ', '2613668512', '', '', 'DANIEL ANTONIO LEBLANC VALDIVIEZO', '1987-09-13', '96048190', '23960481909', '', 'valdiviezod69@gmail.com', '', '', '15 a 18', '2024-05-21', 'Avenida Belgrano', '1444', '', '', 'Julio Leonidas y Juan B Justo', 'Mendoza', 'Mendoza', '5500', '-', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428735, '', '', NULL, ''),
(431989, 'Melisa Valdez', 'PORTA ', '2616595031', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '20170111649', '2616595031', 'josemariabayo@gmail.com', '5GB', '', '9 a 12', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428848, '', '', NULL, ''),
(431990, 'Melisa Valdez', 'PORTA ', '2616583384', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '20170111649', '2616595031', 'josemariabayo@gmail.com', '5GB', '', '9 a 12', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428849, '', '', NULL, ''),
(431991, 'Melisa Valdez', 'PORTA ', '2614858735', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '20170111649', '2616595031', 'josemariabayo@gmail.com', '5GB', '', '9 a 12', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428850, '', '', NULL, ''),
(431992, 'Melisa Valdez', 'PORTA ', '2613390858', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '20170111649', '2616595031', 'josemariabayo@gmail.com', '5GB', '', '9 a 12', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428851, '', '', NULL, ''),
(431993, 'Melisa Valdez', 'PORTA ', '2613420633', '', '', 'JOSE MARIA BAYO', '1964-04-30', '17011164', '20170111649', '2616595031', 'josemariabayo@gmail.com', '5GB', '', '9 a 12', '2024-05-21', 'Matheu', '518', '', '', 'SIN NOMBRES', 'Mendoza', 'lujan de cuyo', '5505', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428852, '', '', NULL, ''),
(431994, 'Melisa Valdez', 'PORTA ', '2645126933', '', '', 'VICTOR EDUARDO BRIZUELA', '1966-05-29', '17641962', '20176419629', '2644993226', 'VICTOR5@HOTMAIL.COM', '5GB', '', '9 a 12', '2024-05-21', 'rawson', '171', '', '', 'alfonsina storni y las promesas', 'San Juan', 'villa dominguito', '5439', '-', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428854, '', '', NULL, ''),
(431995, 'renatabresuti@vxt.com', 'FIBRA', '1132105473', '', '', 'IAN SENSAT', '1998-06-07', '41353807', '20413538077', '1164218126', 'iansensat@gmail.com', '300MB', '', '9 a 12', '2024-05-22', 'AYACUCHO', '281', '', '', 'CUCHA CUCHA/ USPALLATA y PEDRO ZANNI', 'Provincia de Buenos Aires', 'LA TABLADA', '1766', '-32.9166987--68.8414264', '', '', '', '', '', 'INGRESADA TASA', 428970, '', '', NULL, ''),
(431996, 'renatabresuti@vxt.com', 'PORTA ', '1138425698', '', '', 'AGUSTINA  MARTINEZ BROWN', '1981-10-01', '29077337', '27290773372', '1138425698', 'agusmartinezb@hotmail.com', '10GB', '', '9 a 12', '2024-05-22', 'ceballos', '232', '', '', 'MITRE Y TUCUMAN', 'Provincia de Buenos Aires', 'Chivilcoy', '6620', '-32.9166987--68.8414264', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428974, '', '', NULL, ''),
(431997, 'renatabresuti@vxt.com', 'PORTA ', '1154298549', '', '', 'AGUSTINA  MARTINEZ BROWN', '1981-10-01', '29077337', '27290773372', '1138425698', 'agusmartinezb@hotmail.com', '10GB', '', '9 a 12', '2024-05-22', 'ceballos', '232', '', '', 'MITRE Y TUCUMAN', 'Provincia de Buenos Aires', 'Chivilcoy', '6620', '-32.9166987--68.8414264', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 428975, '', '', NULL, ''),
(431998, 'renatabresuti@vxt.com', 'PORTA ', '2346419470', '', '', 'AGUSTINA  MARTINEZ BROWN', '1981-10-01', '29077337', '27290773372', '1138425698', 'agusmartinezb@hotmail.com', '5GB', '', '9 a 12', '2024-05-22', 'ceballos', '232', '', '', 'MITRE Y TUCUMAN', 'Provincia de Buenos Aires', 'Chivilcoy', '6620', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428976, '', '', NULL, ''),
(431999, 'martinaballesteros@vxt.com', 'ALTA NUEVA', '2213049301', '', '', 'SILVIA ELISABET FONSECA', '1993-12-17', '41542944', '23415429444', '2213093626', 'eli1712@gmail.com', '300MB', '', 'TODO EL DIA', '2024-05-22', 'CALLE 164', '1357', '', '', 'CALLE 60/ CALLE 61 Y CALLE 165', 'Provincia de Buenos Aires', 'LOS HORNOS', '1910', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428981, '', '', NULL, ''),
(432000, 'renatabresuti@vxt.com', 'PORTA ', '1169796810', '', '', 'ANDREA ELSA DANIELE', '1987-06-16', '18131466', '23181314664', '1158756977', 'sin2datos@sindatos.com', '5GB', '', '18 a 20', '2024-05-22', 'berutti', '2264', '', '', 'Pueyrredon y Matheu', 'Provincia de Buenos Aires', 'villa maipu', '1650', '-', '', '', '', '', '', 'PENDIENTE CARGA TASA', 428985, '', '', NULL, ''),
(432001, 'martinsuarez@vxt.com', 'PORTA ', '2612192530', '', '', 'SALAS CANDIDA JANET', '1995-04-01', '38582962', '27385829626', '2615138704', 'salascandida48@gmail.com', '5GB', '', '15 a 18', '2024-05-22', 'Terrada', '6034', '', '', 'los membrillos y llateral este', 'Mendoza', 'lujan de cuyo', '5503', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 428987, '', '', NULL, ''),
(432002, 'martinaballesteros@vxt.com', 'FIBRA', '1159402302', '', '', 'GABRIELA PATRICIA OLIVEIRA PARADA', '1977-10-28', '25778350', '27257783508', '1151766595', 'gabyoliveira@live.com.ar', '300MB', '', 'TODO EL DIA', '2024-05-22', 'RECONQUISTA', '1100', '', '', 'AZOPARDO/ TUCUMAN Y AV GASPAR CAMPOS', 'Provincia de Buenos Aires', 'BELLA VISTA', '1661', '-', '', '', '', '', '', 'DIFERIDA AUDITORIA', 429013, '', '', NULL, ''),
(432003, 'martinsuarez@vxt.com', 'PORTA', '2617092052', '', '', 'GRACIELA MONICA SANTANDER', '1962-02-17', '14978395', '23149783954', '2615138704', 'salaascandida48@gmail.com', '6GB', '', '12 a 15', '2024-05-23', 'Terrada', '6034', '', '', 'lateral este y los membrillos', 'Mendoza', 'lujan de cuyo', '5507', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 429167, '', '', NULL, ''),
(432004, 'martinsuarez@vxt.com', 'PORTA', '2615138704', '', '', 'GRACIELA MONICA SANTANDER', '1962-02-17', '14978395', '23149783954', '2615138704', 'salaascandida48@gmail.com', '6GB', '', '12 a 15', '2024-05-23', 'Terrada', '6034', '', '', 'lateral este y los membrillos', 'Mendoza', 'lujan de cuyo', '5507', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 429168, '', '', NULL, ''),
(432005, 'Luis Salgado', 'PORTA ', '1160315802', '', '', 'Carlos Alberto Rocha', '1970-08-27', '21874087', '20218740872', '1155934354', 'rochac418@gmail.com', '3GB', '', 'TODO EL DIA', '2024-05-23', 'Nolting', '3649', '', '', 'Estero Bellaco y Jose Ignacio Rucci', 'Provincia de Buenos Aires', 'Ciudadela', '1702', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 429269, '', '', NULL, ''),
(432006, 'Luis Salgado', 'PORTA ', '1155934354', '', '', 'Carlos Alberto Rocha', '1970-08-27', '21874087', '20218740872', '1155934354', 'rochac418@gmail.com', '3GB', '', 'TODO EL DIA', '2024-05-23', 'Nolting', '3649', '', '', 'Estero Bellaco y Jose Ignacio Rucci', 'Provincia de Buenos Aires', 'Ciudadela', '1702', '-', '', '', '', '', '', 'DEVUELTA X VERIFICACION', 429270, '', '', NULL, ''),
(432007, 'renatabresuti@vxt.com', 'PORTA', '2644891702', '', '', 'MARIA CAROLINA GONZALEZ', '1979-04-16', '27268818', '23272688184', '2644856466', 'cg160479@gmail.com', '6GB', '', '18 a 20', '2024-05-23', 'C. Gdor. Castro Este', '419', '', '', 'chacras sur y nestro kirchner sur', 'San Juan', 'villa krausen', '5425', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429275, '', '', NULL, ''),
(432008, 'martinsuarez@vxt.com', 'PORTA ', '1127934877', '', '', 'MELANIE BELEN MALDONADO', '1995-06-29', '39329884', '27393298842', '2613908774', 'luccapiapaz@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-23', 'San Guillermo', '6465', '', '', 'francisco lagorio y sgto palma', 'Provincia de Buenos Aires', '3 de febrero', '1683', '-', '', '', '', '', '', 'PENDIENTE AUDITORIA', 429276, '', '', NULL, ''),
(432009, 'Luis Salgado', 'FIBRA', '1160315802', '', '', 'Carlos Alberto Rocha', '1970-08-27', '21874087', '20218740872', '1155934354', 'rochac418@gmail.com', '300MB', '', 'TODO EL DIA', '2024-05-23', 'Gral. Viamonte', '2256', '', '', 'AVELLANEDA/ PEDRO ARRIETA Y SALVADOR CURCUCHET', 'Provincia de Buenos Aires', 'CASTELAR', '1712', '-', '', '', '', '', '', 'DIFERIDA AUDITORIA', 429280, '', '', NULL, ''),
(432010, 'Luis Salgado', 'FIBRA', '1160315802', '', '', 'Carlos Alberto Rocha', '1970-08-27', '21874087', '20218740872', '1155934354', 'rochac418@gmail.com', '300MB', '', 'TODO EL DIA', '2024-05-23', 'Nolting', '3649', '', '', 'estero bellaco y jose ignacio ruggi', 'Provincia de Buenos Aires', 'CIUDADELA', '1702', '-', '', '', '', '', '', 'DIFERIDA AUDITORIA', 429286, '', '', NULL, ''),
(432011, 'renatabresuti@vxt.com', 'PORTA ', '2615748684', '', '', 'GUZMAN ANA LAURA LETICIA', '1977-12-20', '26221948', '27262219483', '2612166900', 'fiaortizguzman@gmail.com', '5GB', '', '15 a 18', '2024-05-23', 'colon', '901', '', '', 'esquina estrada y general paz', 'Mendoza', 'GODOY CRUZ', '5501', '-32.9102164--68.8458975', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 429306, '', '', NULL, ''),
(432012, 'renatabresuti@vxt.com', 'PORTA ', '2616985651', '', '', 'GUZMAN ANA LAURA LETICIA', '1977-12-20', '26221948', '27262219483', '2612166900', 'fiaortizguzman@gmail.com', '5GB', '', '15 a 18', '2024-05-23', 'colon', '901', '', '', 'esquina estrada y general paz', 'Mendoza', 'GODOY CRUZ', '5501', '-32.9102164--68.8458975', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 429307, '', '', NULL, ''),
(432013, 'renatabresuti@vxt.com', 'PORTA ', '2612166900', '', '', 'GUZMAN ANA LAURA LETICIA', '1977-12-20', '26221948', '27262219483', '2612166900', 'fiaortizguzman@gmail.com', '5GB', '', '15 a 18', '2024-05-23', 'colon', '901', '', '', 'esquina estrada y general paz', 'Mendoza', 'GODOY CRUZ', '5501', '-', '', '', '', '', '', 'INGRESADA TASA', 429308, '', '', NULL, ''),
(432014, 'renatabresuti@vxt.com', 'PORTA ', '2615875615', '', '', 'GUZMAN ANA LAURA LETICIA', '1977-12-20', '26221948', '27262219483', '2612166900', 'fiaortizguzman@gmail.com', '5GB', '', '15 a 18', '2024-05-23', 'colon', '901', '', '', 'esquina estrada y general paz', 'Mendoza', 'GODOY CRUZ', '5501', '-32.9102164--68.8458975', '', '', '', '', '', 'EN PROCESO DIGIP-TN', 429309, '', '', NULL, ''),
(432015, 'Melisa Valdez', 'FIBRA', '0', '', '', 'AIME LUCIANA REINA CACERES', '0000-00-00', '46484089', '', '', '', '1GB', '', 'TODO EL DIA', '2024-05-24', 'ITUZAINGO', '2209', '', '', 'maipu y chacabuco', 'Mendoza', 'MENDOZA', '5500', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429505, '', '', '0000-00-00', ''),
(432016, 'Melisa Valdez', 'ALTA NUEVA', '1166397006', '', '', 'LUCAS GABRIEL ABALLAY', '1996-11-28', '41389279', '20413892792', '1158397032', 'lucilapizzarro671@gmail.com.ar', '100MB', '', '12 a 15', '2024-05-24', 'Calle 827', '2702', '', '', 'donato alvarez y 898', 'Provincia de Buenos Aires', 'san Francisco Solano', '1881', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429508, '', '', '0000-00-00', ''),
(432017, 'Luis Salgado', 'PORTA ', '1125968098', '', '', 'ERICK MARCELO QUISPE AMADOR', '1991-07-07', '95847094', '20958470941', '1155923155', 'emarcelo64@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-24', 'SOLER', '3333', '', '', 'GALLO Y BUSTAMANTE', 'Ciudad Autonoma de Buenos Aires (CABA) o Capital Federal', 'CABA', '1425', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429511, '', '', NULL, ''),
(432018, 'martinaballesteros@vxt.com', 'ALTA NUEVA', '1158304075', '', '', 'NICOLE NOEMI VIDAL', '1995-02-22', '46425100', '27464251001', '1163777631', 'vidalnicole254@gmail.com', '300MB', '', 'TODO EL DIA', '2024-05-24', 'ESTOCOLMO', '519', '', '', 'Jose m Jorge y Merlo atras Viena', 'Provincia de Buenos Aires', 'LOMAS DE ZAMORA', '1832', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429513, '', '', NULL, ''),
(432019, 'martinsuarez@vxt.com', 'PORTA ', '2396619711', '', '', 'ROSINA MAGGIO', '1995-01-31', '38702755', '27387027551', '2215041059', 'rosinamaggio@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-24', 'Calle 16', '1358', '', '', 'entre 60 y 61', 'Provincia de Buenos Aires', 'LA PLATA', '1900', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429514, '', '', NULL, ''),
(432020, 'martinaballesteros@vxt.com', 'ALTA NUEVA', '2993289827', '', '', 'TREVER SUSANA ELISA QUIROZ', '1971-05-05', '92378610', '23923786104', '2994595884', 'auritamonsalves30@gmail.com', '100MB', '', '9 a 12', '2024-05-24', 'CNEL PRINGLES', '1185', '', '', 'BATILIANA Y CASTELLI', 'Neuquen', 'NEUQUEN', '8302', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429516, '', '', NULL, ''),
(432021, 'martinaballesteros@vxt.com', 'PORTA ', '1159469154', '', '', 'TIMOSSI ROCIO BELEN', '1992-05-22', '36344935', '27363449358', '2324694760', 'timossirociob@gmail.com', '5GB', '', 'TODO EL DIA', '2024-05-24', 'C. 41', '492', '', '', 'calle 20 y calle 21', 'Provincia de Buenos Aires', 'Mercedes', '6600', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429570, '', '', NULL, ''),
(432022, 'martinaballesteros@vxt.com', 'PORTA', '2324694760', '', '', 'LAUTARO GABRIEL REGUEIRO', '1991-07-26', '36050110', '', '1159469154', 'lautaro.regueiro91@gmail.com', '6GB', '', 'TODO EL DIA', '2024-05-24', 'C. 41', '492', '', '', 'calle 20 y calle 21', 'Provincia de Buenos Aires', 'Mercedes', '6600', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429571, '', '', NULL, ''),
(432023, 'Melisa Valdez', 'PORTA ', '1135685515', '', '', 'DANIEL PABLO MANZUR', '1978-07-10', '26768923', '20267689238', '1155802568', 'pmanzur78@gmail.com', '3GB', '', '18 a 20', '2024-05-24', 'Ozanam', '1790', '', '', 'ingeniero sagasta - intendente aguero', 'Provincia de Buenos Aires', 'MORON', '1708', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429573, '', '', NULL, ''),
(432024, 'Melisa Valdez', 'PORTA ', '1155802568', '', '', 'DANIEL PABLO MANZUR', '1978-07-10', '26768923', '20267689238', '1155802568', 'pmanzur78@gmail.com', '3GB', '', '18 a 20', '2024-05-24', 'Ozanam', '1790', '', '', 'ingeniero sagasta - intendente aguero', 'Provincia de Buenos Aires', 'MORON', '1708', '-', '', '', '', '', '', 'PENDIENTE DE VERIFICACION', 429574, '', '', NULL, '');

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
  `fechaportacion` varchar(120) NOT NULL,
  `fechadecambio` date DEFAULT NULL,
  `id_foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventaseliminadas`
--

INSERT INTO `ventaseliminadas` (`id`, `vendedor`, `producto`, `linea`, `empresa`, `tipo`, `nombrecliente`, `fechanacimientocliente`, `documentocliente`, `cuitcliente`, `numeroalternativo`, `email`, `planes`, `score`, `verificacion`, `fechacarga`, `calle`, `numero`, `piso`, `dpto`, `entrecalles`, `provincia`, `localidad`, `codigopostal`, `coordenadas`, `linkgooglemaps`, `tarjetacredito`, `central`, `manzanaregistro`, `comentarios`, `estadoventa`, `numerosolicitud`, `archivo`, `fechaportacion`, `fechadecambio`, `id_foto`) VALUES
(37, 'RODRIGO NAHUEL BECERRA', 'ALTA NUEVA', '3423423', 'CLARO', 'ABONO', 'fgdfgdfgdf', '2024-05-06', '423423', '234234', '42342', 'gonzalezcastellvigabriel@gmail.com', 'FIBRA 700 MG', '3423', '423fdsf', '2024-05-06', 'fdgdfg', '324', '-', '-', '42342', '23423', '234234', '324234', '23423', '23423', '', '', '', '234324', 'POST VENTA', 0, '2ae41af4-65d6-4bf6-89e5-18be126000ba.jpg', '', '0000-00-00', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `archivoseliminados`
--
ALTER TABLE `archivoseliminados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432025;

--
-- AUTO_INCREMENT de la tabla `ventaseliminadas`
--
ALTER TABLE `ventaseliminadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432017;

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
