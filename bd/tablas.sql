CREATE TABLE `administrador` (
  `idAdmin` varchar(255) NOT NULL COMMENT 'correo institucional del empleado',
  `nombre` varchar(255) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `carrito_usuarios` (
  `idSesion` varchar(255) NOT NULL,
  `idProducto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categoria` (
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `cotizacion` (
  `idCotizacion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `plano` blob DEFAULT NULL,
  `indicacion` varchar(255) DEFAULT NULL,
  `Usuariocorreo` varchar(255) NOT NULL,
  `coste` float DEFAULT NULL,
  `aceptado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `datoscontacto` (
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `whatsapp` varchar(10) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `direcciones` (
  `Usuariocorreo` varchar(255) NOT NULL,
  `numeroExt` varchar(10) NOT NULL,
  `numeroInt` varchar(10) DEFAULT NULL,
  `calle` varchar(255) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `producto` (
  `idProducto` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `coste` float NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `Categorianombre` varchar(255) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `producto_venta` (
  `ProductoidProducto` varchar(255) NOT NULL,
  `VentaidVenta` varchar(255) NOT NULL,
  `precioIndividual` float NOT NULL,
  `cantidad` int(10) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `servicio` (
  `idServicio` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` blob DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  `CotizacionidCotizacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuario` (
  `correo` varchar(255) NOT NULL,
  `pass` varchar(10000) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidoP` varchar(255) DEFAULT NULL,
  `apellidoM` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `numeroUsuario` varchar(255) DEFAULT NULL,
  `tipoRegistro` varchar(255) DEFAULT NULL,
  `tipoUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `variacion` (
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `ProductoidProducto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `venta` (
  `idVenta` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL,
  `Usuariocorreo` varchar(255) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `direccion` varchar(500) NOT NULL,
  `pago` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
