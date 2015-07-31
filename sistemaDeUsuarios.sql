-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-07-2015 a las 21:51:07
-- Versión del servidor: 5.1.62-rel13.3-log
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `creartew_sistemaDeUsuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `codigo_compra` int(11) NOT NULL AUTO_INCREMENT,
  `num_tarjeta_credito` int(11) DEFAULT NULL,
  `cc` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `direccion_envio` varchar(60) DEFAULT NULL,
  `ciudad` varchar(40) DEFAULT NULL,
  `barrio` varchar(40) DEFAULT NULL,
  `correo_electronico` varchar(120) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`codigo_compra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `codigoestado` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `tipo` int(3) NOT NULL COMMENT '1-estados usuarios, 2-estado de prestamos, 3-estados de recurso',
  PRIMARY KEY (`codigoestado`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2100 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`codigoestado`, `descripcion`, `tipo`) VALUES
(1, 'ACTIVO', 1),
(2, 'INACTIVO', 1),
(3, 'PENALIZADO', 1),
(4, 'PRESTADO', 2),
(5, 'DEVUELTO', 2),
(6, 'ACTIVO', 3),
(7, 'DADO DE BAJA', 3),
(8, 'DANADO', 3),
(9, 'PRESTADO', 3),
(10, 'ELIMINADO', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `codigomodulo` int(10) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `ruta` varchar(40) NOT NULL,
  `tipo` int(2) NOT NULL COMMENT '1-normal, 2-submenu, 3-principal submenu',
  PRIMARY KEY (`codigomodulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`codigomodulo`, `descripcion`, `ruta`, `tipo`) VALUES
(1, 'USUARIOS', '../usuarios/usuarios.php', 1),
(4, 'ASIGNAMODULOS', '../perfiles/asignarModulo.php', 2),
(2, 'PERFIL', '../perfiles/perfiles.php', 3),
(3, 'MODULOS', '../modulo/modulos.php', 1),
(6, 'PRODUCTOS', '../productos/productos.php', 1),
(7, 'COMPRAS', '../compras/compras.php', 1),
(5, 'ESTADOS', '../estados/estados.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `codigoperfil` int(2) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `tipo` int(5) NOT NULL,
  PRIMARY KEY (`codigoperfil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`codigoperfil`, `descripcion`, `tipo`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'NORMAL', 2),
(3, 'PRUEBA', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilmodulo`
--

CREATE TABLE IF NOT EXISTS `perfilmodulo` (
  `codigo` int(2) NOT NULL AUTO_INCREMENT,
  `codigoperfil` int(2) NOT NULL,
  `codigomodulo` int(2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `perfilmodulo`
--

INSERT INTO `perfilmodulo` (`codigo`, `codigoperfil`, `codigomodulo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(6, 2, 1),
(7, 2, 3),
(4, 1, 4),
(23, 1, 5),
(22, 1, 6),
(24, 1, 7),
(26, 3, 1),
(27, 3, 6),
(28, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `crear` int(1) NOT NULL DEFAULT '0',
  `modificar` int(1) NOT NULL DEFAULT '0',
  `eliminar` int(1) NOT NULL DEFAULT '0',
  `cedula_Usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`cedula_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `codigo` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(60) DEFAULT NULL,
  `cantidad_disponible` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `categoria` varchar(40) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `cantidad_disponible`, `precio`, `foto`, `descripcion`, `categoria`, `estado`) VALUES
(123, 'sandwich', 10, 1200, '', 'pequeño', '1', 1),
(321, 'coca cola', 96, 2900, '', 'litro', '1/4', 1),
(2221, 'mazamorra', 36, 4500, '', 'rica', '2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_compra`
--

CREATE TABLE IF NOT EXISTS `producto_compra` (
  `codigo_producto` int(11) NOT NULL DEFAULT '0',
  `codigo_compra` int(11) NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`codigo_compra`,`codigo_producto`),
  KEY `codigo_producto` (`codigo_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cedula` varchar(30) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `codigoestado` int(2) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `codigoperfil` int(2) NOT NULL,
  `deuda` int(10) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `apellido`, `correo`, `telefono`, `codigoestado`, `pass`, `codigoperfil`, `deuda`) VALUES
('1115080936', 'Yeison', 'Bentancourt Solis', 'yeison@hotmail.com', '3226132604', 1, '19931004', 1, 0),
('123', 'Jorge', 'Castano', 'jorge@jorge.copm', '31553535626', 1, 'jorgec', 1, 0),
('12345678', 'prueba', 'prueba', 'prueba@correo.com', '1342123', 1, 'prueba1', 3, 0),
('1234567890', 'Juan', 'Gonzales', 'juan@mail.com', '123456789', 1, '1234567890', 2, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD CONSTRAINT `privilegios_ibfk_1` FOREIGN KEY (`cedula_Usuario`) REFERENCES `usuario` (`cedula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
