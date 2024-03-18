-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2023 a las 07:20:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simecsadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` varchar(255) NOT NULL COMMENT 'correo institucional del empleado',
  `nombre` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`nombre`, `descripcion`) VALUES
('Articulo de limpieza \r\n', NULL),
('Equipo de protección \r\n', NULL),
('Fereteria', NULL),
('Herramienta', NULL),
('Herramienta manual\r\n', NULL),
('Instrumentos de medición', NULL),
('Papeleria\r\n', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idCotizacion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `plano` blob DEFAULT NULL,
  `indicacion` varchar(255) DEFAULT NULL,
  `Usuariocorreo` varchar(255) NOT NULL,
  `coste` float DEFAULT NULL,
  `aceptado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos contacto`
--

CREATE TABLE `datos contacto` (
  `correoCotizaciones` varchar(255) DEFAULT NULL,
  `correoGeneral` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `coste` float NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `Categorianombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `cantidad`, `precio`, `coste`, `imagen`, `Categorianombre`) VALUES
('F001', 'Abrazaderas mini ancho 3/8\"', '3/8\"-5/8\"\r\n', '4', 0, 20, 'https://www.truper.com/media/product/24e/abrazaderas-sin-fin-para-mangueras-de-jardin-ancho-19-32-0e3.jpg', 'Fereteria'),
('F002\r\n', 'Abrazaderas ancho 19/32\"\r\n', '3 dias despues de compra\r\n', '4', 32, 0, 'https://www.truper.com/media/product/24e/abrazaderas-sin-fin-para-mangueras-de-jardin-ancho-19-32-0e3.jpg', 'Fereteria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta`
--

CREATE TABLE `producto_venta` (
  `ProductoidProducto` varchar(255) NOT NULL,
  `VentaidVenta` varchar(255) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_venta`
--

INSERT INTO `producto_venta` (`ProductoidProducto`, `VentaidVenta`, `cantidad`, `total`) VALUES
('F001', '1', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServicio` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` blob DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `CotizacionidCotizacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(10) NOT NULL,
  `numeroUsuario` varchar(255) DEFAULT NULL,
  `tipoRegistro` varchar(255) DEFAULT NULL,
  `tipoUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `nombre`, `direccion`, `telefono`, `numeroUsuario`, `tipoRegistro`, `tipoUsuario`) VALUES
('1', '1', '1', 1, '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variacion`
--

CREATE TABLE `variacion` (
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `ProductoidProducto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL,
  `Usuariocorreo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `total`, `fecha`, `Usuariocorreo`) VALUES
('1', 32413, '2023-03-01', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`nombre`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idCotizacion`),
  ADD KEY `FKCotizacion615635` (`Usuariocorreo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD UNIQUE KEY `idProducto` (`idProducto`),
  ADD KEY `FKProducto431276` (`Categorianombre`);

--
-- Indices de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD PRIMARY KEY (`ProductoidProducto`,`VentaidVenta`),
  ADD KEY `FKProducto_V131342` (`VentaidVenta`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `FKServicio932753` (`CotizacionidCotizacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `variacion`
--
ALTER TABLE `variacion`
  ADD KEY `FKVariacion280526` (`ProductoidProducto`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `FKVenta894959` (`Usuariocorreo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `FKCotizacion615635` FOREIGN KEY (`Usuariocorreo`) REFERENCES `usuario` (`correo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FKProducto431276` FOREIGN KEY (`Categorianombre`) REFERENCES `categoria` (`nombre`);

--
-- Filtros para la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD CONSTRAINT `FKProducto_V131342` FOREIGN KEY (`VentaidVenta`) REFERENCES `venta` (`idVenta`),
  ADD CONSTRAINT `FKProducto_V683954` FOREIGN KEY (`ProductoidProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `FKServicio932753` FOREIGN KEY (`CotizacionidCotizacion`) REFERENCES `cotizacion` (`idCotizacion`);

--
-- Filtros para la tabla `variacion`
--
ALTER TABLE `variacion`
  ADD CONSTRAINT `FKVariacion280526` FOREIGN KEY (`ProductoidProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `FKVenta894959` FOREIGN KEY (`Usuariocorreo`) REFERENCES `usuario` (`correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
