-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2015 a las 05:57:57
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistemadeusuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `codigo_compra` int(11) NOT NULL,
  `num_tarjeta_credito` int(11) DEFAULT NULL,
  `cc` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `direccion_envio` varchar(60) DEFAULT NULL,
  `ciudad` varchar(40) DEFAULT NULL,
  `barrio` varchar(40) DEFAULT NULL,
  `correo_electronico` varchar(120) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `codigoestado` int(3) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `tipo` int(3) NOT NULL COMMENT '1-estados usuarios, 2-estado de prestamos, 3-estados de recurso'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(9, 'PRESTADO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `codigomodulo` int(10) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `ruta` varchar(40) NOT NULL,
  `tipo` int(2) NOT NULL COMMENT '1-normal, 2-submenu, 3-principal submenu'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`codigomodulo`, `descripcion`, `ruta`, `tipo`) VALUES
(1, 'USUARIOS', '../usuarios/usuarios.php', 1),
(4, 'ASIGNAMODULOS', '../perfiles/asignarModulo.php', 2),
(2, 'PERFIL', '../perfiles/perfiles.php', 3),
(3, 'MODULOS', '../modulo/modulos.php', 1),
(5, 'ESTADOS', '../estados/estados.php', 1),
(6, 'PRODUCTOS', '../productos/productos.php', 1),
(7, 'COMPRAS', '../compras/compras.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `codigoperfil` int(2) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`codigoperfil`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'NORMAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilmodulo`
--

CREATE TABLE IF NOT EXISTS `perfilmodulo` (
  `codigo` int(2) NOT NULL,
  `codigoperfil` int(2) NOT NULL,
  `codigomodulo` int(2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

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
(8, 1, 5),
(30, 1, 7),
(22, 1, 6);

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
  `estado` int(1) DEFAULT NULL
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
  `cantidad` int(11) NOT NULL
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
  `pass` text NOT NULL,
  `codigoperfil` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `apellido`, `correo`, `telefono`, `codigoestado`, `pass`, `codigoperfil`) VALUES
('1', 'Jorge', 'Castano', 'jorge@jorge.com', '31553535626', 1, '1', 1),
('1115080936', 'Yeison', 'Betancourt Solis', 'yeisonbe10@hotmail.com', '3226132604', 1, '19931004', 1),
('samuel02', 'samuel', 'samuelito', 'samu@gmail.com', '12345678', 1, 'samuel02', 2),
('12345678', 'Juanito', 'Pelaez', 'juanito@mail.com', '12345678', 2, '12345678', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`codigo_compra`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`codigoestado`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`codigomodulo`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`codigoperfil`);

--
-- Indices de la tabla `perfilmodulo`
--
ALTER TABLE `perfilmodulo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto_compra`
--
ALTER TABLE `producto_compra`
  ADD PRIMARY KEY (`codigo_compra`,`codigo_producto`), ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `codigo_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `codigoestado` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `perfilmodulo`
--
ALTER TABLE `perfilmodulo`
  MODIFY `codigo` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
