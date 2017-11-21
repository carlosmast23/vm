-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2017 a las 22:59:49
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cotizadorvm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_empresa`
--

CREATE TABLE `actividad_empresa` (
  `act_id` int(11) NOT NULL,
  `act_nombre` varchar(250) NOT NULL,
  `act_descripcion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad_empresa`
--

INSERT INTO `actividad_empresa` (`act_id`, `act_nombre`, `act_descripcion`) VALUES
(1, 'Muebles', 'Muebles de oficina y mucho mas'),
(2, 'Celulares', 'Equipos y accesorios'),
(3, 'Restaurante', ''),
(4, 'Celulares Iphone', ''),
(5, 'Salud', 'Salud'),
(6, 'Tecnología', ''),
(7, 'Educación', ''),
(8, 'Cosmeticos', ''),
(9, 'Alimentos', ''),
(10, 'Mascotas', ''),
(11, 'Publicidad', ''),
(12, 'Música', ''),
(13, 'Deportes', ''),
(14, 'Agricultura', ''),
(15, 'Vestimenta', ''),
(16, 'Software', ''),
(17, 'Construcción', ''),
(18, 'Entretenimiento', ''),
(19, 'Otros', ''),
(20, 'SISTEMAS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `arc_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `arc_nombre` varchar(200) NOT NULL,
  `arc_fecha` datetime NOT NULL,
  `arc_deque` enum('p') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`arc_id`, `ref_id`, `arc_nombre`, `arc_fecha`, `arc_deque`) VALUES
(1, 1, '22828994_311644302651540_7536135508918401748_o.jpg', '2017-10-30 18:32:47', 'p'),
(2, 1, '22885911_1622957324410538_1122017571290890501_n.jpg', '2017-10-30 20:41:20', 'p'),
(3, 2, '22885911_1622957324410538_1122017571290890501_n.jpg', '2017-10-30 21:00:16', 'p');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busquedas`
--

CREATE TABLE `busquedas` (
  `bus_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `bus_celular` varchar(20) NOT NULL,
  `bus_texto` varchar(200) NOT NULL,
  `bus_tiempo` enum('u','a','m','d','n') NOT NULL COMMENT 'Urgente Alto Medio Moderado Noasignado',
  `bus_fecha` datetime NOT NULL,
  `bus_fechafin` datetime NOT NULL,
  `bus_estado` enum('p','r','e','a') NOT NULL DEFAULT 'p' COMMENT 'Pendiente Revisado Enviado Anulado'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cli_id` int(11) NOT NULL,
  `cli_nombres` varchar(200) NOT NULL,
  `cli_apellidos` varchar(200) NOT NULL,
  `cli_direccion` varchar(200) NOT NULL,
  `cli_telefono` varchar(100) NOT NULL,
  `cli_email` varchar(200) NOT NULL,
  `cli_fechan` date NOT NULL,
  `cli_genero` enum('m','f') NOT NULL DEFAULT 'm'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio_email`
--

CREATE TABLE `envio_email` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `email_destinatario` varchar(200) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `estado` enum('p','e') NOT NULL DEFAULT 'p',
  `fecha` datetime NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `deque` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio_sms`
--

CREATE TABLE `envio_sms` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `tel_destinatario` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `estado` enum('p','e') NOT NULL DEFAULT 'p',
  `fecha` datetime NOT NULL,
  `deque` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `loc_id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `loc_nombre` varchar(150) DEFAULT NULL,
  `loc_latitud` varchar(100) DEFAULT NULL,
  `loc_longitud` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`loc_id`, `pid`, `loc_nombre`, `loc_latitud`, `loc_longitud`) VALUES
(1, 0, 'Ecuador', '-1.7860218', '-80.3819488'),
(2, 1, 'Pichincha', '-0.1862504', '-78.5706268');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_pro`
--

CREATE TABLE `preguntas_pro` (
  `prg_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `prv_id` int(11) NOT NULL,
  `prg_pregunta` varchar(200) NOT NULL,
  `prg_respuesta` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `pro_id` int(11) NOT NULL,
  `pro_nombre` varchar(250) NOT NULL,
  `pro_descripcion` text NOT NULL,
  `pro_estado` enum('n','u') NOT NULL DEFAULT 'n' COMMENT 'Nuevo Usado'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propuestas`
--

CREATE TABLE `propuestas` (
  `pro_id` int(11) NOT NULL,
  `prv_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_cantidad` int(11) NOT NULL,
  `pro_precio` float NOT NULL,
  `pro_tipo` enum('n','u') NOT NULL DEFAULT 'n' COMMENT 'Nuevo Usado',
  `pro_entrega` enum('n','s') NOT NULL DEFAULT 'n' COMMENT 'No Si',
  `pro_obs` text NOT NULL,
  `pro_estado` enum('p','r','a') NOT NULL DEFAULT 'p' COMMENT 'Pendiente Revisado Aprobado',
  `pro_fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `prv_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `prv_ruc` varchar(13) NOT NULL,
  `prv_razonsocial` varchar(250) NOT NULL,
  `prv_representante` varchar(250) NOT NULL,
  `prv_direccion` varchar(200) NOT NULL,
  `prv_telefono` varchar(100) NOT NULL,
  `prv_convencional` varchar(100) NOT NULL,
  `prv_usuario` varchar(200) NOT NULL,
  `prv_email` varchar(200) NOT NULL,
  `prv_fecharegistro` datetime NOT NULL,
  `prv_estado` enum('a','i') NOT NULL DEFAULT 'i',
  `prv_latitud` varchar(200) NOT NULL,
  `prv_longitud` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`prv_id`, `act_id`, `prv_ruc`, `prv_razonsocial`, `prv_representante`, `prv_direccion`, `prv_telefono`, `prv_convencional`, `prv_usuario`, `prv_email`, `prv_fecharegistro`, `prv_estado`, `prv_latitud`, `prv_longitud`) VALUES
(1, 20, '1719468108001', 'ALCODE', 'JUAN PINARGO', 'Sangolqui', '+593983528439', '022087044', 'jc100pl', 'juancarlos100pl@gmail.com', '2017-11-15 00:00:00', 'a', '', ''),
(2, 20, '1724218951001', 'CODESOFT', 'CARLOS SANCHEZ', 'Sangolqui', '+593994725020', '022339487', 'carlosmast23', 'carlosmast2301@gmail.com', '2017-11-15 00:00:00', 'a', '', ''),
(3, 20, '1718536509001', 'Robert', 'Robert Tene', 'Sangolqui', '+593997426212', '022625072', 'robert', 'trebortc@hotmail.com', '2017-11-15 00:00:00', 'a', '', ''),
(4, 0, '022316869', '', '', '', '+593994500047', '', 'SILVANA  CHANGOLUISA', 'silvanachangoluisa@hotmail.com', '2017-05-25 00:00:00', 'i', '', ''),
(5, 0, '0250020963', '', '', '', '+593988826579', '2853298', 'LEYDI  CEVALLOS', 'leydimarycevallos1997@outlokk.com', '2017-04-20 00:00:00', 'i', '', ''),
(7, 0, '', '', '', '', '+593987302556', '', 'WALTER TOAPANTA', '', '2017-06-09 00:00:00', 'i', '', ''),
(8, 0, '', '', '', '', '+593987121360', '', 'DAYSI SUALICHICO', '', '2017-05-10 00:00:00', 'i', '', ''),
(9, 0, '', '', '', '', '+593991891157', '', 'DOMENICA SUASNAVAS', 'dome-0917@hotmail.com', '2017-05-11 00:00:00', 'i', '', ''),
(10, 0, '', '', '', '', '+593987890518', '', 'SANTIAGO ANDRADE', 'sanroband@hotmail.com', '2017-01-25 00:00:00', 'i', '', ''),
(11, 0, '', '', '', '', '+593992710031', '', 'ESTEFANY CHAMORRRO', '', '2017-01-13 00:00:00', 'i', '', ''),
(12, 0, '', '', '', '', '+593978879396', '', 'HERNAN  IZA', '', '2017-01-19 00:00:00', 'i', '', ''),
(13, 0, '', '', '', '', '+593987938064', '', 'JUAN  MANCHENO', '', '2017-03-03 00:00:00', 'i', '', ''),
(14, 0, '', '', '', '', '+593984642281', '3882095', 'RITA CHIGUANO', '', '2017-02-01 00:00:00', 'i', '', ''),
(16, 0, '', '', '', '', '+593998978809', '', 'ANDRES CALUSPIÑA', '', '2017-02-22 00:00:00', 'i', '', ''),
(17, 0, '', '', '', '', '+593995131727', '', 'DIEGO QUISPE', 'claquispe@espe.edu.ec', '2017-02-18 00:00:00', 'i', '', ''),
(18, 0, '1723402325', '', '', '', '+593995323087', '', 'JUAN JOYASACA', '', '2017-02-19 00:00:00', 'i', '', ''),
(19, 0, '', '', '', '', '+593960007495', '', 'ANDRES IZA', '', '2017-02-20 00:00:00', 'i', '', ''),
(20, 0, '', '', '', '', '+593980519404', '', 'STALIN CRISALTO', '', '2017-06-24 00:00:00', 'i', '', ''),
(21, 0, '1718399122', '', '', '', '+593999085964', '', 'DARWIN MERIZALDE', 'axxelmeri@gmail.com', '2017-06-21 00:00:00', 'i', '', ''),
(22, 0, '1706901335', '', '', '', '+593987751496', '', 'MARIANA TIPAN', '', '2017-06-14 00:00:00', 'i', '', ''),
(23, 0, '', '', '', '', '+593982274090', '', 'CRISTIAN OLVERA', '', '2017-07-03 00:00:00', 'i', '', ''),
(24, 0, '', '', '', '', '+593983363225', '', 'KAREN ROSERO', '', '2017-01-18 00:00:00', 'i', '', ''),
(25, 0, '1723838056', '', '', '', '+593979053102', '', 'JOEL  CORONEL', 'coronel1995@hotmail.com', '2017-01-22 00:00:00', 'i', '', ''),
(28, 0, '1720892940', '', '', '', '+593987072571', '', 'ALEX CEVALLOS', 'alexpepocevallos_77@hotmail.com', '2017-02-24 00:00:00', 'i', '', ''),
(29, 0, '17179670905', '', '', '', '+593999867044', '', 'JHONATHAN ', 'jhonathan1234quito@hotmail.com', '2016-12-01 00:00:00', 'i', '', ''),
(30, 0, '', '', '', '', '+593983500013', '', 'PAOLO SEBASTIAN AVILA PINTO', 'pspinto2@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(31, 0, '', '', '', '', '+593991492767', '', 'EDWIN LLUMIQUINGA OÑA', 'edwinsaul1970@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(32, 0, '', '', '', '', '+593990397137', '', 'JAIRO CEDEÑO', 'asecap_2016@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(33, 0, '', '', '', '', '+593995939944', '', 'ALEX SOSA', 'alexsosauz@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(34, 0, '', '', '', '', '+593992525131', '', 'ALEX TOAPANTA', 'alex10p_m_@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(35, 0, '', '', '', '', '+593996494529', '', 'OSCAR ', 'ofsocasi@miduvi.gob.ec', '2017-10-01 00:00:00', 'i', '', ''),
(36, 0, '', '', '', '', '+593995738401', '', 'NELLY  LLUMIQUINGA', 'nellychivand93@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(37, 0, '', '', '', '', '+593985683987', '', 'DAVID CAIZA', 'davidc_dj@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(38, 0, '', '', '', '', '+593994017004', '', 'DIEGO MOREJON', 'terceradimension.ec@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(39, 0, '', '', '', '', '+593995018873', '', 'WILLIAM  LEMA', 'willyt94@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(40, 0, '', '', '', '', '+593987531362', '', 'TEAM CIRCORE', 'yeisonjugglin@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(41, 0, '', '', '', '', '+593983932297', '', 'ROBERT ALPALA', 'c2e-ieee@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(42, 0, '', '', '', '', '+593984101928', '', 'SANTIAGO SUASNAVAS', 'kas.soluciones@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(43, 0, '', '', '', '', '+593969912970', '', 'JORGUE  ESPINOZA', 'dmproduccion@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(44, 0, '', '', '', '', '+593998820969', '', 'JUAN ACEVEDO', 'acevedojuan002@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(45, 0, '', '', '', '', '+593995901479', '', 'YESENIA SANCHEZ', 'ivnia@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(46, 0, '', '', '', '', '+593987992413', '', 'SANTIAGO DAVID ', 'floresadomicilioenquito@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(48, 0, '', '', '', '', '+593991923386', '', 'UMATAMBO BARAONA', 'majo199714@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(49, 0, '', '', '', '', '+593994042270', '', 'LENIN GERARDO CHANCOZA AMAGUAÑA', 'lenin_chancoza@yahoo.es', '2017-10-01 00:00:00', 'i', '', ''),
(50, 0, '', '', '', '', '+593995038212', '', 'SASHENKA PAZMIÑO', 'sashen_ps@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(51, 0, '', '', '', '', '+593992923906', '', 'IDEART CREATIVO', 'ideart.creativo@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(52, 0, '', '', '', '', '+593996393905', '', 'ANDRE ALEJANDRA TORRES ROSALES ', 'teyaleja@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(53, 0, '', '', '', '', '+593987089539', '', 'ANDRES SANTIAGO LOPEZ SANCHEZ', 'andres4l@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(56, 0, '', '', '', '', '+593959042681', '', 'MILY RAMIREZ', 'milyeramirez@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(57, 0, '', '', '', '', '+593998654427', '', 'ELIZABETH  OSORIO', 'elizabeth99_osorio@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(58, 0, '', '', '', '', '+593995132220', '', 'EDUARDO  VELASTEGUI', 'asiaprombusiness7@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(59, 0, '', '', '', '', '+593984228023', '', 'CARLOS  MALDONADO', 'carlos.ec@live.com', '2017-10-01 00:00:00', 'i', '', ''),
(60, 0, '', '', '', '', '+593984575790', '', 'AFRODITA ECUADOR', 'afroditaecuador@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(61, 0, '', '', '', '', '+593998506566', '', 'CETEFIRA', 'cetefira@yahoo.es', '2017-10-01 00:00:00', 'i', '', ''),
(62, 19, '', '', '', '', '+593986676982', '', 'EL MENSAJERITO', 'mensajerito@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(63, 11, '', '', '', '', '+593959051414', '', 'KRISTTOF', 'qris.kristtof@yahoo.es', '2017-10-01 00:00:00', 'i', '', ''),
(64, 11, '', '', '', '', '+593994120457', '', 'ORANGE CREATIVA', 'orangecreativa132@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(65, 11, '', '', '', '', '+593987942333', '', 'MARLENE', 'marlenebenalcazar1@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(66, 11, '', '', '', '', '+593978621656', '', 'RIVAGRAFIC', 'graficasrivadeneira@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(67, 13, '', '', '', '', '+593978621656 ', '', 'DJ EVENTOS', 'rivadneirajavier.fuxion@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(68, 11, '', '', '', '', '+593978621656 ', '', 'RIVA IMPRENTA', 'rivagrafic@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(69, 11, '', '', '', '', '+593984447901 ', '', 'PUBLIKADD', 'publikadd@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(70, 19, '', '', '', '', '+593979106623', '', 'ROUTE 3.0', 'routetrespuntocero@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(72, 8, '', '', '', '', '+593994905332', '', 'ANGIECOSMETICOS', 'angiecosmeticos20@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(73, 1, '', '', '', '', '+593987018376  ', '', 'RIVADSA ', 'rivadeneira.rivadsa@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(74, 19, '', '', '', '', '+593983384200', '', 'EDSANZ 200', 'edsanz200@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(75, 11, '', '', '', '', '+593998891870', '', 'REDESIGN', 're_design@outlook.es', '2017-10-01 00:00:00', 'i', '', ''),
(76, 6, '', '', '', '', '+593993163492 ', '', 'MAESDAMIAN ', 'dlayana77@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(77, 9, '', '', '', '', '+593980640258', '', 'MARACUYEAH DIELY ACUYEAH', 'diely_to@Hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(78, 6, '', '', '', '', '+593987457761', '', 'TECNO PC COMERCIAL', 'comercial@tecnopcsistemas.com', '2017-10-01 00:00:00', 'i', '', ''),
(79, 7, '', '', '', '', '+593995787894 ', '', 'ZOMBRERERO LOCO EVENTOS HORA', 'zombrererolocoeventos@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(80, 19, '', '', '', '', '+593995393274', '', 'ENCANTO FLORAL ', 'jedelos@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(81, 11, '', '', '', '', '+593958922422', '', 'RCONSULTORES NSULTORES', 'gerenciarcquito@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(82, 3, '', '', '', '', '+593996729191', '', 'E&B CONSTRUCCIONES MULTISERVICIOS', 'gerenciaeb_construciones@yahoo.es', '2017-10-01 00:00:00', 'i', '', ''),
(83, 13, '', '', '', '', '+593968770061 ', '', 'ERIKA ERIKA', 'erikarockmetal1994@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(84, 17, '', '', '', '', '+593997780518  ', '', 'BURGUER BURGUER', 'spacos66@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(85, 11, '', '', '', '', '+593996779953', '', 'INGENIERO CIVIL', 'rjbg25@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(86, 11, '', '', '', '', '+593998032781', '', 'EDUARDO ', 'eduaudaz@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(87, 11, '', '', '', '', '+593991452304', '', 'MARCAS GRÁFICAS', 'marcasgraficas77@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(88, 19, '', '', '', '', '+593992466739 ', '', 'JAREDIAMOND ', 'jarediamond@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(89, 19, '', '', '', '', '+593987425902  ', '', 'SAMAEL ', 'sama-el003@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(90, 9, '', '', '', '', '+593998521339', '', 'GSALINAS ', 'ctccelular@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(91, 11, '', '', '', '', '+593995806648', '', 'NICOLAS LUGMANIA', 'nicolas.lugmania@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(92, 6, '', '', '', '', '+593993518564  ', '', 'SAN 76', 'xantiago76@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(93, 5, '', '', '', '', '+593992766420 ', '', 'LUISINIO ', 'albersinio@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(94, 19, '', '', '', '', '+593984393354 ', '', 'STEVE ', 'titisteew@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(95, 19, '', '', '', '', '+593992516029', '', 'DAVID', 'ingdavidbarragan@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(96, 13, '', '', '', '', '+593958968157', '', 'ALTAGO', 'alexander@altago.biz', '2017-10-01 00:00:00', 'i', '', ''),
(97, 18, '', '', '', '', '+593984118852', '', 'XTREMENEON ', 'alexguetto.94@outlook.com', '2017-10-01 00:00:00', 'i', '', ''),
(98, 6, '', '', '', '', '+593995500945', '', 'RCMDOPS ', 'rcmdops@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(99, 9, '', '', '', '', '+593987292188', '', 'LUCIANOS CREAM', 'lucianosicecream@outlook.com', '2017-10-01 00:00:00', 'i', '', ''),
(100, 19, '', '', '', '', '+593998326183', '', 'RAMIRO VILAÑA', 'ramiro_2000dv@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(101, 2, '', '', '', '', '+593958795744', '', 'MAFACAICAL ', 'marlon_caicedo@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(102, 6, '', '', '', '', '+593993980737 ', '', 'DAVID TIPANLUISA', 'datc_tipanluisadavid@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(103, 11, '', '', '', '', '+593983284753', '', 'TEXART SERVICES', 'texart.uio@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(104, 18, '', '', '', '', '+593996653845', '', 'KARLA JKISAAC ', 'jkisaac07@hotmail.es', '2017-10-01 00:00:00', 'i', '', ''),
(105, 19, '', '', '', '', '+593998766344', '', 'DECOCREATIVOSEC ', 'decocreativosec@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(106, 9, '', '', '', '', '+593981362476', '', 'ANDREA CAKES', 'andrea.vizcaino87@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(107, 18, '', '', '', '', '+593998716085 ', '', 'RYNA', 'sublimadosquito@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(108, 6, '', '', '', '', '+593999444470 ', '', 'PABLOJR ', 'pablojr32@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(109, 19, '', '', '', '', '+593995856779 ', '', 'SERVICLEAN ', 'mariela-gonzalezg@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(110, 6, '', '', '', '', '+593987180378', '', 'ALVARITRIP ', 'aavnarvaez@udlanet.ec', '2017-10-01 00:00:00', 'i', '', ''),
(111, 19, '', '', '', '', '+593982646863', '', 'MUNAYEC ', 'vivianaflorenciamurillo@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(112, 17, '', '', '', '', '+593983697120 ', '', 'GABRIEL ', 'gabrieltonato@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(113, 2, '', '', '', '', '+593969034407', '', 'IVANFLORES ', 'ivanflores_comicell@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(115, 13, '', '', '', '', '+593995029222 ', '', 'CHASQUI DANZA ', 'chasquidanza@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(116, 17, '', '', '', '', '+593985351487', '', 'ELÉCTRICAL ÉCTRICAL', 'wilmerdj1@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(117, 15, '', '', '', '', '+593979196450 ', '', 'MILIGOL CAMISETAS', 'cnacatoproyectos@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(118, 13, '', '', '', '', '+593979031334', '', 'SAFARI LEADER CAMP ', 'safarileadercamp@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(119, 1, '', '', '', '', '+593958806744  ', '', 'JUAN ', 'juancarlos251973@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(120, 16, '', '', '', '', '+593959509961', '', 'MHARY EU', 'mhary15hmn@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(121, 19, '', '', '', '', '+593983381977', '', 'LIVING SEGUROS', 'livingseguroslive@gmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(122, 6, '', '', '', '', '+593982060895', '', 'TECNOLAING ', 'hguaman@tecnolaing.net', '2017-10-01 00:00:00', 'i', '', ''),
(123, 15, '', '', '', '', '+593995839814 ', '', 'YESSENIA ', 'gonzalezy7@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(124, 5, '', '', '', '', '+593984268334 ', '', 'MISHI 1381', 'michelle1381@hotmail.com', '2017-10-01 00:00:00', 'i', '', ''),
(125, 19, '', '', '', '', '+593998194253', '', 'TECMAN-SERVICIO', 'tecman-servicio@outlook.es', '2017-10-01 00:00:00', 'i', '', ''),
(126, 19, '', '', '', '', '+593998737906', '', 'ARTE FLORAL JHADE', '', '2017-10-02 00:00:00', 'i', '', ''),
(127, 2, '', '', '', '', '+593979132142  ', '', 'cellrepublic ', 'cellrepublicst@gmail', '2017-09-27 00:00:00', 'i', '', ''),
(128, 19, '', '', '', '', '+593998586269', '', 'hpetite ', 'hpetite@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(129, 19, '', '', '', '', '+593993684266', '', 'Contapp', '', '2017-10-02 00:00:00', 'i', '', ''),
(131, 18, '', '', '', '', '+593992360066', '', 'MayMosquera ', 'empresamtshows@gmail', '2017-10-02 00:00:00', 'i', '', ''),
(132, 19, '', '', '', '', '+593992531496 ', '', 'Tecnilav ', 'tecnilav1@gmail', '2017-09-27 00:00:00', 'i', '', ''),
(133, 15, '', '', '', '', '+593994915512', '', 'Puntofino ', 'fvillota@puntofino', '2017-09-27 00:00:00', 'i', '', ''),
(134, 2, '', '', '', '', '+593984493325', '', 'CNT_Quito edu', '', '2017-09-27 00:00:00', 'i', '', ''),
(135, 9, '', '', '', '', '+593995888387 ', '', 'EligarzonChocofantasy ', '', '2017-09-27 00:00:00', 'i', '', ''),
(136, 5, '', '', '', '', '+593984619177 ', '', 'MARITZA ', 'maritzaalexandra77@yahoo', '2017-09-27 00:00:00', 'i', '', ''),
(137, 12, '', '', '', '', '+593987582485', '', 'Vanny', 'vannyladiferencia1509@gmail.com', '2017-09-27 00:00:00', 'i', '', ''),
(138, 19, '', '', '', '', '+593995844269', '', 'Lennin puntual.asesores', '', '2017-09-27 00:00:00', 'i', '', ''),
(139, 19, '', '', '', '', '+593998194253', '', 'Tecman-services Tecman', '', '2017-09-27 00:00:00', 'i', '', ''),
(140, 9, '', '', '', '', '+593998726620 ', '', 'Sergio L. sergio', '', '2017-09-27 00:00:00', 'i', '', ''),
(141, 19, '', '', '', '', '+593958915040', '', 'Ctello ', 'ctellobaque@yahoo.com', '2017-09-27 00:00:00', 'i', '', ''),
(142, 18, '', '', '', '', '+593984237662', '', 'JAAK MOVIES ', 'jaccbeto@hotmail.com ', '2017-09-27 00:00:00', 'i', '', ''),
(143, 7, '', '', '', '', '+593991333970', '', 'Francisquito5', 'mfranciscoppp@hotmail.com', '2017-09-27 00:00:00', 'i', '', ''),
(144, 5, '', '', '', '', '+593987279228', '', 'jdvillacres ', 'jdvillacres@gmail.com', '2017-09-27 00:00:00', 'i', '', ''),
(145, 9, '', '', '', '', '+593982232084 ', '', 'KarlaM ', 'kalyluis@hotmail.com', '2017-09-27 00:00:00', 'i', '', ''),
(146, 3, '', '', '', '', '+593995123032', '', 'andretamr ', 'andretamr@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(147, 5, '', '', '', '', '+593987001015', '', 'ROBERTO PAREDES', 'robertoparedesmed@gmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(148, 14, '', '', '', '', '+593998497617 ', '', 'Quimasa', '', '2017-09-28 00:00:00', 'i', '', ''),
(149, 19, '', '', '', '', '+593979333517', '', 'Bareclub Ecuador travelling', '', '2017-09-28 00:00:00', 'i', '', ''),
(150, 17, '', '', '', '', '+593999886181', '', 'Ruiz Construncion ', '', '2017-09-28 00:00:00', 'i', '', ''),
(151, 5, '', '', '', '', '+593995573313', '', 'Marcohugo ', 'marcogc2014@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(152, 19, '', '', '', '', '+593987087898', '', 'gustavo rodrigo ', 'elielcontroldeplagas2016@gmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(153, 17, '', '', '', '', '+593980606195', '', 'IMPERMEABILIZACIONES QUITO ', 'multiempresas_1@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(154, 19, '', '', '', '', '+593995475518 ', '', 'Golden Group Fotografía', 'eventos-goldengroup@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(155, 17, '', '', '', '', '+593960069387 ', '', 'Alejandra capacitacion@solucioneseducativas', 'capacitacion@solucioneseducativas.com.ec', '2017-09-28 00:00:00', 'i', '', ''),
(156, 11, '', '', '', '', '+593991847446', '', 'Mwrios ', 'mwrios6978@gmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(157, 7, '', '', '', '', '+593995849462 ', '', 'RayuelitaKIDS', 'info@rayuelita.com', '2017-09-28 00:00:00', 'i', '', ''),
(158, 3, '', '', '', '', '+593958980775 ', '', 'Mi barrio ', 'sincorreos@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(159, 4, '', '', '', '', '+593993565399', '', 'Omero', 'homerss.nc@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(160, 17, '', '', '', '', '+593998334703 ', '', 'Decorlatex ', 'decorlatex@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(161, 17, '', '', '', '', '+593978727790 ', '', 'Multiservicios C.Y', 'm_a_uri_1989@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(162, 20, '', '', '', '', '+593983106356 ', '', 'Dannypro ', 'dannyproguepardo@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(163, 15, '', '', '', '', '+593991081179 ', '', 'Micelle', 'mishu_25@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(164, 9, '', '', '', '', '+593978640654 ', '', 'danny2h', 'dannysan995@gmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(165, 17, '', '', '', '', '+593988897756', '', 'Tecnibuild ', 'jpolit25@gmail.com ', '2017-09-28 00:00:00', 'i', '', ''),
(166, 6, '', '', '', '', '+593984559662', '', 'Diegopmr ', 'diegopmr@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(168, 11, '', '', '', '', '+593999018363', '', 'Juan jacho ', 'grafjachocepedajuan@outlook.com', '2017-09-28 00:00:00', 'i', '', ''),
(169, 6, '', '', '', '', '+593998409954', '', 'Buho1967', 'sumiprint@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(170, 19, '', '', '', '', '+593998226219', '', 'Clean&Fresh ', 'oriente@limfresh.com', '2017-09-28 00:00:00', 'i', '', ''),
(171, 7, '', '', '', '', '+593998924874 ', '', 'Pame', 'pameplanet@hotmail.com', '2017-09-28 00:00:00', 'i', '', ''),
(172, 12, '', '', '', '', '+593983777383', '', 'Sprinteventos', 'sprintsonido@gmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(173, 19, '', '', '', '', '+593992995538 ', '', 'Jena_pool64', 'jean_pool64@hotmail.es', '2017-09-29 00:00:00', 'i', '', ''),
(174, 6, '', '', '', '', '+593982691340 ', '', 'infoarmando', 'infoarmando@gmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(175, 5, '', '', '', '', '+593978995071', '', 'MEDICOMOVIL ', 'atoapanta@hotmail.es', '2017-09-29 00:00:00', 'i', '', ''),
(176, 9, '', '', '', '', '+593983163160', '', 'Andrea ', 'mvizcarra1973@gmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(177, 18, '', '', '', '', '+593998599654 ', '', 'TROPOS ', '', '2017-09-29 00:00:00', 'i', '', ''),
(178, 6, '', '', '', '', '+593997328018', '', 'SERTEG ', 'serteg2000@hotmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(179, 19, '', '', '', '', '+593987952264', '', 'Cjavier19 ', 'charpel.javier1995@domain.com', '2017-09-29 00:00:00', 'i', '', ''),
(180, 17, '', '', '', '', '+593993566061', '', 'Vicente Chamba', 'viche8704@gmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(181, 11, '', '', '', '', '+593999820685', '', 'PRADO Publicidad prado', 'prado-publicidad@hotmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(182, 12, '', '', '', '', '+593987409881 ', '', 'Erikdjpcred ', 'erikdjpcred@gmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(183, 6, '', '', '', '', '+593987392180 ', '', 'Viveplay ', 'viveplay1@gmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(184, 19, '', '', '', '', '+593989420802 ', '', 'Aldo Cortez aldo', 'aldo_elvis2002@hotmail.com', '2017-09-29 00:00:00', 'i', '', ''),
(185, 16, '', '', '', '', '+593999736786', '', 'alexxxo', 'alessparedes@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(186, 19, '', '', '', '', '+593998992837 ', '', 'Carloso4142 ', 'carloco4142@outlook.es', '2017-10-02 00:00:00', 'i', '', ''),
(187, 11, '', '', '', '', '+593995930306', '', 'Inbordex ', 'Inbordex@hotmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(188, 6, '', '', '', '', '+593995430436 ', '', 'ADT seguridad electronica', 'adtecuador@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(189, 9, '', '', '', '', '+593983501218', '', 'Mónica Logroño Mlogrono', 'mlogrono08@hotmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(190, 5, '', '', '', '', '+593999249919 ', '', 'Gorro Oncológico Ec', 'dralorena13@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(191, 6, '', '', '', '', '+593960206222', '', 'alejandro ', 'alejandroullauri@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(192, 19, '', '', '', '', '+593983247091', '', 'Jose Luís Alvear', 'jose15alvear@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(193, 19, '', '', '', '', '+593983207592 ', '', 'paotroyab', 'paotroyab@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(194, 6, '', '', '', '', '+593995769649 ', '', 'Darioz83 ', 'darioz83@hotmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(195, 19, '', '', '', '', '+593995045472 ', '', 'Mi Dulcinea ', 'midulcineaec@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(196, 19, '', '', '', '', '+593996092795 ', '', 'Diego ', 'diego_piesin@hotmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(197, 9, '', '', '', '', '+593979213294', '', 'NANUT ', 'emuzojayana@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(198, 6, '', '', '', '', '+593999585011', '', 'Edwine ', 'e.estrellape@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(199, 20, '', '', '', '', '+593978643756 ', '', 'Sistec ', 'info.sistec1@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(200, 19, '', '', '', '', '+593995798014', '', 'Gresvac Láser ', 'gresvaclaser@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(201, 1, '', '', '', '', '+593995980800', '', 'Imawa ', 'imawa.ec@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(202, 20, '', '', '', '', '+593984020634', '', 'Alarmas ', 'fpaspuel@gmail.com', '2017-10-02 00:00:00', 'i', '', ''),
(203, 5, '', '', '', '', '+593960130564 ', '', 'Maria Coly ', 'mcoly30@hotmail.com', '2017-10-03 00:00:00', 'i', '', ''),
(204, 8, '', '', '', '', '+593984224183', '', 'Andrea barreno melo', 'melo_dy1982@hotmail.com', '2017-10-03 00:00:00', 'i', '', ''),
(205, 18, '', '', '', '', '+593984225183', '', 'Jorge oña jorgemix', 'jorgemix80@hotmail.com', '2017-10-03 00:00:00', 'i', '', ''),
(206, 18, '', '', '', '', '+593984344683 ', '', 'Robin240290 ', 'rdss9@hotmail.com', '2017-10-03 00:00:00', 'i', '', ''),
(207, 9, '', '', '', '', '+593998865902', '', 'La hueca michaeltayu', 'michaeltayu@gmail.com', '2017-10-03 00:00:00', 'i', '', ''),
(208, 16, '', '', '', '', '+593995452373', '', 'SAC ', 'stmconsultores@hotmail.com', '2017-10-03 00:00:00', 'i', '', ''),
(209, 15, '', '', '', '', '+593084564331', '', 'cecibel', 'celuvavi@gmail.com', '2017-10-03 00:00:00', 'i', '', ''),
(210, 6, '', '', '', '', '+593987819376', '', 'Amanda Farinango', 'madip.ventas@teuno.com', '2017-10-03 00:00:00', 'i', '', ''),
(211, 14, '', '', '', '', '+593987614355 ', '', 'AgroServicios ', 'agroservicioswv@gmail.com', '2017-10-04 00:00:00', 'i', '', ''),
(212, 2, '', '', '', '', '+593999714240 ', '', 'Clínica del celular', 'jj-merces@hotmail.com ', '2017-10-04 00:00:00', 'i', '', ''),
(213, 7, '', '', '', '', '+593982311138 ', '', 'Zentrika ', 'cfe.zentrika@gmail.com', '2017-10-04 00:00:00', 'i', '', ''),
(214, 18, '', '', '', '', '+593996751021', '', 'tuzonaprepago ', 'tuzonaprepago@gmail.com', '2017-10-07 00:00:00', 'i', '', ''),
(215, 3, '', '', '', '', '+593969062499', '', 'Jessica Suárez', 'jess_suarez_andrade@hotmail.com', '2017-10-07 00:00:00', 'i', '', ''),
(216, 0, '', '', '', '', '+593984742450', '', 'Gabriela Paredes', 'glasshouse02016@gmail.com', '2017-10-07 00:00:00', 'i', '', ''),
(217, 3, '', '', '', '', '+593992511456', '', 'Lo Bueno de mi Cuñada', 'jessydominguez_66@hotmail.com', '2017-10-24 00:00:00', 'i', '', ''),
(218, 11, '', '', '', '', '+593983518230', '', 'virtualwd', 'evcamachoc@gmail.com', '2017-10-26 00:00:00', 'i', '', ''),
(219, 7, '', '', '', '', '+593995005923', '', 'planetafatla', 'becas@fatla.org', '2017-10-26 00:00:00', 'i', '', ''),
(220, 19, '', '', '', '', '+593982779081', '', 'Patomerli', 'patricio@expressdiseno.com', '2017-10-26 00:00:00', 'i', '', ''),
(221, 0, '1,10313E+12', '', '', '', '+593997905876', '', 'Rsacafy', 'rdsecuador@gmail.com', '2017-11-14 00:00:00', 'i', '', ''),
(222, 14, '', '', '', '', '+593993641900', '', 'SIA - Servicios Integrales Agropecuarios ', 'andretti.88001@gmail.com', '2017-10-26 00:00:00', 'i', '', ''),
(223, 0, '', '', '', '', '+593980888289', '', 'MANOLO CRIOLLO', 'manolo_criollo@hotmail.com', '2017-11-13 00:00:00', 'i', '', ''),
(224, 0, '', '', '', '', '+593987008333', '3808279', 'CEREVEC', '', '2017-11-14 00:00:00', 'i', '', ''),
(225, 0, '', '', '', '', '+593998732804', '2877408', 'ALI MIKUNA', '', '2017-11-15 00:00:00', 'i', '', ''),
(226, 0, '', '', '', '', '+593996109354', '', 'SALON DE EVENTOS Y RECEPCIONES', '', '2017-11-16 00:00:00', 'i', '', ''),
(227, 0, '', '', '', '', '+593983554422', '', 'MILENZAR CENTRO DE COPIADO', '', '2017-11-17 00:00:00', 'i', '', ''),
(228, 0, '', '', '', '', '+593998357638', '2855732', 'ANTICRISIS 2', '', '2017-11-18 00:00:00', 'i', '', ''),
(229, 0, '', '', '', '', '+593994242458', '2044583', 'CAPACITACIONES MOTIVACIONALES', '', '2017-11-19 00:00:00', 'i', '', ''),
(230, 0, '', '', '', '', '+593981807064', '5007739', 'MARCELO STEAK HOUSE', '', '2017-11-20 00:00:00', 'i', '', ''),
(231, 0, '', '', '', '', '+593990191108', '', 'LEONARDO YUMISACA', '', '2017-11-21 00:00:00', 'i', '', ''),
(235, 0, '', '', '', '', '+593994637343', '', 'MODU HOGAR', '', '2017-11-25 00:00:00', 'i', '', ''),
(236, 0, '', '', '', '', '+593994023764', '2336283', 'TRAMACO EXPRESS', '', '2017-11-26 00:00:00', 'i', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_bus_act`
--

CREATE TABLE `rel_bus_act` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `estado` enum('p','r') NOT NULL DEFAULT 'p'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_prv_act`
--

CREATE TABLE `rel_prv_act` (
  `id` int(11) NOT NULL,
  `prv_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `ip`, `fecha`, `num`) VALUES
(1, '::1', '2017-11-06', 1),
(2, '::1', '2017-11-06', 1),
(3, '::1', '2017-11-10', 1),
(4, '::1', '2017-11-13', 1),
(5, '::1', '2017-11-14', 1),
(6, '::1', '2017-11-16', 1),
(7, '::1', '2017-11-20', 1),
(8, '127.0.0.1', '2017-11-20', 1),
(9, '::1', '2017-11-21', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_empresa`
--
ALTER TABLE `actividad_empresa`
  ADD PRIMARY KEY (`act_id`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`arc_id`);

--
-- Indices de la tabla `busquedas`
--
ALTER TABLE `busquedas`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `envio_email`
--
ALTER TABLE `envio_email`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envio_sms`
--
ALTER TABLE `envio_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indices de la tabla `preguntas_pro`
--
ALTER TABLE `preguntas_pro`
  ADD PRIMARY KEY (`prg_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `propuestas`
--
ALTER TABLE `propuestas`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`prv_id`);

--
-- Indices de la tabla `rel_bus_act`
--
ALTER TABLE `rel_bus_act`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rel_prv_act`
--
ALTER TABLE `rel_prv_act`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_empresa`
--
ALTER TABLE `actividad_empresa`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `arc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `busquedas`
--
ALTER TABLE `busquedas`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `envio_email`
--
ALTER TABLE `envio_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `envio_sms`
--
ALTER TABLE `envio_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `preguntas_pro`
--
ALTER TABLE `preguntas_pro`
  MODIFY `prg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `propuestas`
--
ALTER TABLE `propuestas`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `prv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT de la tabla `rel_bus_act`
--
ALTER TABLE `rel_bus_act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rel_prv_act`
--
ALTER TABLE `rel_prv_act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
