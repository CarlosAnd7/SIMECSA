-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-04-2024 a las 01:54:44
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u837024564_simecsadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` varchar(255) NOT NULL COMMENT 'correo institucional del empleado',
  `nombre` varchar(255) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `nombre`, `apellidoP`, `apellidoM`, `pass`) VALUES
('gato@simecsa.com', 'Gato', 'Wango', 'Gris con rayas', '$argon2i$v=19$m=65536,t=4,p=1$S0RxTTc5VUd5a2pWUlhhOA$kZ1uIREvbKJOHP+Ft+Dgljtr2NR37R/sHuS1NpfqvtM'),
('simecsaver@gmail.com', 'Admin', 'Simecsa', 'Ver', '$argon2i$v=19$m=65536,t=4,p=1$OHVQWmVpRmtSWXlmTk53eA$7worXVWKSn5zwMP5v4i+t1ea+megIJm1Me5bLSlm5HI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_usuarios`
--

CREATE TABLE `carrito_usuarios` (
  `idSesion` varchar(255) NOT NULL,
  `idProducto` varchar(255) NOT NULL
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
('Artículos de Limpieza', NULL),
('Electricidad', ''),
('Equipo de Protección', NULL),
('Ferretería', NULL),
('Fontanería', ''),
('Herramienta', NULL),
('Herramienta Manual', NULL),
('Instrumentos de Medición', NULL),
('Papelería', NULL);

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
-- Estructura de tabla para la tabla `datoscontacto`
--

CREATE TABLE `datoscontacto` (
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `whatsapp` varchar(10) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datoscontacto`
--

INSERT INTO `datoscontacto` (`nombre`, `telefono`, `whatsapp`, `direccion`, `correo`, `facebook`) VALUES
('simecsa', '2711682708', '2711682708', 'San José, 91698 Valente Díaz, Ver.', 'ferreteriasimecsa@gmail.com', 'Simecsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `Usuariocorreo` varchar(255) NOT NULL,
  `numeroExt` varchar(10) NOT NULL,
  `numeroInt` varchar(10) DEFAULT NULL,
  `calle` varchar(255) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`Usuariocorreo`, `numeroExt`, `numeroInt`, `calle`, `cp`, `colonia`, `ciudad`) VALUES
('carlosandresmr7@gmail.com', '139', '2', 'Veracruz', '94020', 'La selva', 'Tlaltetela'),
('carlosandresmr7@gmail.com', '155', '', '9', '94677', 'Las cañas', 'Córdoba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

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

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `stock`, `precio`, `coste`, `imagen`, `Categorianombre`, `disponibilidad`) VALUES
(' 44153 MEDIO', 'Clavos 1/2 Kilo  truper ', 'clavo para madera cerrada', '20', 20, 20, 'https://www.deacero.com/images/thumbs/0000360_clavo-reforzado-galvanizado.jpeg', 'Ferretería', 1),
(' BTN120', 'Interruptor Automatico Pastilla 120/140 V Bticino ', 'X', '5', 76, 60, 'https://bticino.com.mx/uploads/5470a5a0577817fc0787e88351a1a91d.png', 'Electricidad', 1),
(' COCAT50-BI', 'Carretilla Llanta Neumatica ', 'carretilla neumatica ', '-1', 1425, 1056, 'https://www.akronmx.com/media/catalog/product/cache/03aa85e06bafb8f525343aada06fb76b/9/0/90-100a.png', 'Ferretería', 1),
(' D115', 'Disco Abrazivo De Corte De 4 1/2 Energy ', 'Disco de 4 1/2', '4', 24, 12, 'https://mroindustrysupplier.com/wp-content/uploads/2022/09/d115.jpg', 'Ferretería', 1),
(' DQTJ85540', 'Resistencia Para Regadera Foset ', '', '4', 135, 109, NULL, 'Electricidad', 1),
(' RBW2000', 'Bomba Para Agua  Rodado De 2x2 2Hp Rayken  ', '', '1', 4500, 3900, NULL, 'Fontanería', 1),
(' SW-5101006B', 'Mensula De Acero Negra 12x14 Fumetax', 'Mensula', '1', 12, 9, 'https://medios.urrea.com/catalogo/Surtek/hd/137798.jpg', 'Ferretería', 1),
('100901', 'Esmeriladora Angular 4 1/2 Ergo Pro 1100w Truper ', 'marca truper', '1', 1100, 742, 'https://www.truper.com/media/product/100/esmeriladora-angular-4-1-2-1100-w-ergo-pro-truper-f8d.jpg', 'Ferretería', 1),
('10191509', 'Tucan Kg Veneno Para Hormiga', 'Xnnbn', '5', 98, 65, 'https://http2.mlstatic.com/D_NQ_NP_742084-MLM50864847580_072022-O.webp', 'Ferretería', 1),
('10429', 'Cinta Aislante De Espuma 1/8 ', 'X', '1', 120, 88, 'https://m.media-amazon.com/images/I/713bgkzCpgL.jpg', 'Ferretería', 1),
('106325', 'GRAPA POR KILO ', 'XA', '12', 60, 53, 'https://th.bing.com/th/id/OIP.t-LA6v0SWOzSUTL5QrflPwHaHa?rs=1&pid=ImgDetMain', 'Ferretería', 1),
('11619', 'Lijas De Agua Grano 100-Medio Truper', '1', '10', 12, 10, 'https://th.bing.com/th/id/OIP.wOEk57E9BMmnZILCEHJ5IgHaHa?rs=1&pid=ImgDetMain', 'Ferretería', 1),
('11625', 'Lijas De Agua Grano Fino 280  Truper', 'X', '9', 14, 8.5, 'https://th.bing.com/th/id/OIP.DhGzBlZUvNVW0Bp2C70PHQHaHa?rs=1&pid=ImgDetMain', 'Ferretería', 1),
('12141912', 'Azufre En Polvo Mosquitos ', 'Xasd', '12', 75, 60, 'https://th.bing.com/th/id/OIP.9HdxS379MQ52Uvc05FxjCgHaE8?rs=1&pid=ImgDetMain', 'Ferretería', 1),
('1225', 'Manguera Naranja Corrugada 1', 'mangera poliducto', '38', 20, 5, 'https://tiendaiusa.com/media/catalog/product/e/l/ele-iusa-139_segunda.jpg', 'Ferretería', 1),
('12355', 'Empaque De Hule Para Licuadora ', 'empaque para licuadora de material hule ', '10', 4.5, 2, 'https://www.bayusa.com.mx/wp-content/uploads/2020/08/EMPAQUE-PARA-LICUADORA-OSTERIZER-225x300.png', 'Ferretería', 1),
('1236', 'Valvula De Tanque Con Flotador Alto ', '', '0', 77, 60, NULL, 'Fontanería', 1),
('12569', 'Tambo Azul 200 Lt', 'tambo azul limpio con tapa ', '14', 550, 450, 'https://static.grainger.com/rp/s/is/image/Grainger/21YK42_AS01?$glgmain$', 'Ferretería', 1),
('131340', 'Manguera Flexible Para Lavabo Nacobre ', 'manguera flexible de 3/4\"', '6', 26, 18.6, 'https://diplomex.com.mx/store/media/filter/l/img/5384e523cf283.jpg', 'Ferretería', 1),
('131355', 'Manguera De Aluminio Flexible Para Fregadero Cnacobre ', 'manguera 3/4\"', '18', 29, 21.2, 'https://diplomex.com.mx/store/media/filter/l/img/5384e523cf283.jpg', 'Ferretería', 1),
('132235', 'Manguera Flexible Para Sanitario Nacobre ', 'manguera 3/4\"', '8', 26, 18.6, 'https://cms.grupoferrepat.net/assets/img/productos/D4140AL_1.jpg', 'Ferretería', 1),
('1450', 'Cemento Bulto 50kg Apasco ', 'para construccion ', '16', 210, 196, 'https://distribuidorpanelrey.com/wp-content/uploads/2019/07/cemento-gris-apasco-DISTRIBUIDOR-PANEL-REY.png', 'Ferretería', 1),
('15403', 'Afine 20 Kg', 'afine marca pegaduro', '1', 145, 135, 'https://www.pegaduro.com.mx/img/productos/pegaduro-afine.jpg', 'Ferretería', 1),
('1567', 'Pulido Espejo 10kg', 'marca pegaduro', '3', 135, 125, 'https://www.pegaduro.com.mx/img/productos/pegaduro-pulido-espejo.jpg', 'Ferretería', 1),
('17501206603144', 'Lija Para Madera Grano Fino 150 Truper ', 'Lija para Madera', '15', 12, 8, 'https://http2.mlstatic.com/D_NQ_NP_961562-MLM49784847494_042022-O.webp', 'Ferretería', 1),
('17501206634476', 'Broca De Punta De Carburo 1/4x4 Truper ', 'truper', '5', 15.5, 13, 'https://ferreteriacalzada.mx/wp-content/uploads/2020/11/HC70501-1.jpg', 'Ferretería', 1),
('17501206634506', 'Broca De Carbono De Tungsteno  5/16 Truper ', 'truper', '6', 20, 17, 'https://ferreteriacalzada.mx/wp-content/uploads/2020/11/HC67454-1.jpg', 'Ferretería', 1),
('17501206634544', 'Broca De Carbono De Tustegno 3/8 Truper ', 'truper', '6', 35, 28, 'https://ferreteriacalzada.mx/wp-content/uploads/2020/11/HC70502-1.jpg', 'Ferretería', 1),
('17501206634568', 'Broca De Carbono De Tungsteno 1/2 Truper ', 'truper', '7', 46, 38, 'https://ferreteriacalzada.mx/wp-content/uploads/2020/11/HC67455-1-1.jpg', 'Ferretería', 1),
('17501206645953', 'Broca De 1/8 Truper ', 'truper', '5', 15.5, 13, 'https://ferreteriacalzada.mx/wp-content/uploads/2020/11/HC67455-1-1.jpg', 'Ferretería', 1),
('17501206645984', 'Broca De 11/64 Truper ', 'truper', '6', 34, 25, 'https://static.grainger.com/rp/s/is/image/Grainger/43CL58_AS01?$glgmain$', 'Ferretería', 1),
('17501206646035', 'Broca De 1/4 Truper ', 'truper', '4', 49, 42, 'https://static.grainger.com/rp/s/is/image/Grainger/43CL58_AS01?$glgmain$', 'Ferretería', 1),
('17501206646059', 'Broca De 5/16 Truper ', 'truper', '3', 77, 63, 'https://temex.vteximg.com.br/arquivos/ids/168723/43146003PDM001B.jpg?v=637557741093670000', 'Ferretería', 1),
('17501206648015', 'Lima De Triangulo Para Machete 6 Truper ', '6\" pulgadas', '2', 22, 18, 'https://plomeriauniversal.mx/cdn/shop/products/UFTP8_700x700.jpg?v=1656612434', 'Ferretería', 1),
('17501206685232', 'Lijas De Esmeril Negra Grano Grueso 50 Truper', 'precio por pieza ', '9', 19, 15.5, 'https://m.media-amazon.com/images/I/61jdifuR48L._AC_UF894,1000_QL80_.jpg', 'Ferretería', 1),
('17506240644900', 'Cople De Pvc.3/4', '', '10', 5, 4, NULL, 'Fontanería', 1),
('17506240673245', 'Empaque Union Tanque-Taza Para Wc. 2', '', '4', 12.5, 10.5, NULL, 'Fontanería', 1),
('17506240673252', 'Empaque Union Tanque, Taza Para Wc,3', '', '4', 19, 15.5, NULL, 'Fontanería', 1),
('18100', 'Seguetas Bimetalicas 12 ', 'precio por pz ', '49', 25, 20, 'https://www.truper.com/media/product/0ec/segueta-bimetalica-de-12-24-dpp-truper-expert-848.jpg', 'Ferretería', 1),
('20320', 'Regadera Para Fregadero ', 'plastico ', '5', 20, 15, 'https://inncrea.com.mx/wp-content/uploads/2023/10/Regadera-para-fregadero-1.png', 'Ferretería', 1),
('22021', 'Tensores Eleasticos Pretul 122 Cm ', 'paquete', '1', 80, 45, 'https://www.truper.com/media/product/278/juego-de-20-tensores-elasticos-pretul-361.jpg', 'Ferretería', 1),
('221018', 'Solucion Desmoldante De Aceite De Silicon 16oz Sin-D-Mold ', 'desmoldante', '10', 150, 77, 'https://http2.mlstatic.com/D_NQ_NP_864413-MLM72983559692_112023-O.webp', 'Ferretería', 1),
('25001', 'Martillo Uña Recta 16oz 1/8 Pretul', 'pretul', '2', 115, 93, 'https://www.truper.com/media/product/309/martillo-u-a-recta-16-oz-pretul-7cd.jpg', 'Ferretería', 1),
('25092', 'Tensores Elasticos Pretul 60 Cm', '', '1', 50, 36, NULL, 'Ferretería', 1),
('25093', 'Tensores Elasticos Pretul 90 Cm ', '', '1', 65, 43, NULL, 'Ferretería', 1),
('25818', 'Espatula Sencilla ', 'por pieza', '7', 10, 5, 'https://toolcraft.mx/media/catalog/product/cache/5acb921b5de42abe363841164dfef787/w/f/wf9723.jpg', 'Ferretería', 1),
('26121630', 'Conector Glandula Pvc 1/2 Argos ', 'media 1/2\"', '16', 14.5, 10, 'https://mexico.newark.com/productimages/large/en_US/74H0077-40.jpg', 'Ferretería', 1),
('270555', 'Bolsa Negra Para Basura Grande', 'precio por pz ', '35', 10, 5, 'https://http2.mlstatic.com/D_NQ_NP_778501-MLM47717986002_092021-O.webp', 'Ferretería', 1),
('270596', 'Bolsa Negra Para Basura Chica ', 'precio por pz ', '59', 5, 2, 'https://http2.mlstatic.com/D_NQ_NP_778501-MLM47717986002_092021-O.webp', 'Ferretería', 1),
('27501206696969', 'Clavo De 2\" Cerrada', 'caja de clavo para madera ', '1', 875, 650, 'https://www.ferrekasamexico.com/wp-content/uploads/2022/07/Fiero-40166-40167-40168-40169-40170-40171-Clavo-estandar-con-cabeza-para-madera-caja-con-10kg-01.webp', 'Ferretería', 1),
('27501206696976', 'Clavo Estandar De 2 1/2\" Para Madera ', 'caja cerrada ', '0', 875, 517, 'https://mundotool.com/cdn/shop/files/95d56825-804c-4e53-97c6-eec6711d0eb7_1024x.jpg?v=1707634681', 'Ferretería', 1),
('27501206696983', 'Clavos Estandar 3\"', 'caja de clavo para madera ', '0', 875, 500, 'https://www.truper.com/media/import/imagenes/CLE-3-10+E1.jpg', 'Ferretería', 1),
('27501206696990', 'Clavo De 3 1/2', 'caja de clavo para madera 25kg', '1', 875, 755, 'https://mundotool.com/cdn/shop/files/33ef3cce-8a19-405b-b12e-593d83c57a56_1024x.jpg?v=1706909889', 'Ferretería', 1),
('27501206697003', 'Clavo De 4 Cerrada ', 'caja de clavo para madera 25 kg', '1', 875, 755, 'https://http2.mlstatic.com/D_NQ_NP_608843-MLM51577040589_092022-O.webp', 'Ferretería', 1),
('31162800', 'Cloruro De Calcio Granulado ', 'por kilo', '5', 75, 60, 'https://www.nutrimentospolaris.com/wp-content/uploads/2021/08/Cloruro-de-calcio.jpg', 'Ferretería', 1),
('31162801', 'Raticida Bolsita Chica', '', '5', 22, 15, NULL, 'Ferretería', 1),
('3766', 'Bisagra Bidimensional Recta Grande ', 'dorada', '3', 20, 13.5, 'https://www.diprofer.com/catalogo/643-large_default/bisagra-cuadrada-acero-latonado-cabeza-plana.jpg', 'Ferretería', 1),
('3857', 'Abrazadera De Acero Galvanizado 1 1/2-2 1/4 Tucson', 'precio por pz ', '15', 16.5, 7.8, 'https://ferreteriacalzada.mx/wp-content/uploads/2020/11/JM6010.jpg', 'Ferretería', 1),
('40172408', 'Tapa Pvc 4 1/2 ', 'precio por pz', '6', 21, 16, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1z7QhQYoQ3B7hBMSFILq_1S9FLW24MkoeiiLaTp0Kjw&s', 'Ferretería', 1),
('40174608', 'Tee De 3/4 Pvc ', 'precio por pz', '4', 5, 2, 'https://agrobolder.com/web/image/product.template/37998/image_1024?unique=1469c25', 'Ferretería', 1),
('409702', 'Cople De Cobre 1', 'MATERIAL COBRE', '4', 42, 35, 'https://tamex.mx/wp-content/uploads/Cople-de-cobre-sin-ranura-1-2-13mm-Nacobre-177-10113.jpg', 'Ferretería', 1),
('44346', 'Pijas De Acero Pavonas 8x2 Fiero ', 'Acero inoxidable', '130', 1, 0.42, 'https://www.lostornillos.com.mx/cdn/shop/products/amazon_2_580x.png?v=1631678183', 'Ferretería', 1),
('44582', 'Tornillos De Acero Galvanizado  3/8X 4 Fiero ', '', '23', 12, 6, NULL, 'Ferretería', 1),
('45419', 'Cople De Pvc. 1', '', '10', 8, 6.5, NULL, 'Fontanería', 1),
('46031', 'Abrazadera Tipo Omega Pz.Individual 1 1/2 Volteck ', '', '5', 11, 5.8, NULL, 'Ferretería', 1),
('46087', 'Fusibles Renovables 30 A-250v', '', '10', 11, 9, NULL, 'Ferretería', 1),
('46199', 'Clavija Electrica Sin Tierra ', 'sm', '4', 22, 18, 'https://www.santul.com.mx/media/catalog/product/cache/9e2ddac9313c88f5d9dacff008cdfb61/s/e/se324511_1_34.jpg', 'Ferretería', 1),
('46512', 'Porta lampara De Vaquelita Duo Con Cadena Volteck ', 'truper ', '3', 24, 19, 'https://www.truper.com/media/product/36a/portalampara-4-de-baquelita-volteck-2fc.jpg', 'Ferretería', 1),
('46950', 'Conector Conduit 1/2 Volteck', 'truper', '2', 9.5, 8, 'https://www.truper.com/media/product/0bf/conectores-para-tubo-conduit-c2d.jpg', 'Ferretería', 1),
('46981', 'Condulet LB', '', '2', 115, 94, NULL, 'Electricidad', 1),
('46984', 'Condulex T', '', '1', 109, 89, NULL, 'Electricidad', 1),
('47340', 'Conector Tubo Flexible 1/2 Recto .Volteck', 'truper', '2', 12.5, 10.5, 'https://www.honcolferreterias.com/wp-content/uploads/2021/08/47340.jpg', 'Ferretería', 1),
('47414', 'T Para Gas 5/8', 'laton', '3', 42, 24, 'https://www.truper.com/media/product/917/tees-union-para-gas-d82.jpg', 'Ferretería', 1),
('47428', 'Cople Para Gas De 5/8 ', '', '5', 15.5, 13, NULL, 'Ferretería', 1),
('47429', 'Cople Para Gas De 5/8 ', '', '1', 22, 18, NULL, 'Ferretería', 1),
('47433', 'Cople Para Gas De 5/8 ', '', '6', 15.5, 13, NULL, 'Ferretería', 1),
('47434', 'Cople Para Gas De 5/8 ', '', '1', 25, 21, NULL, 'Ferretería', 1),
('47438', 'Cople Para Gas De 5/8 ', '', '3', 24, 19, NULL, 'Ferretería', 1),
('47441', 'Cople Para Gas De 5/8 ', '', '8', 14, 11.5, NULL, 'Ferretería', 1),
('47643', 'Cople De Cobre Sin Ranura 1/2 Foset', '', '4', 4.7, 3.9, NULL, 'Ferretería', 1),
('47915', 'Porta Lampara De Porcelana 4 1/2volteck', 'truper', '2', 22, 17, 'https://www.truper.com/media/product/36a/portalampara-4-de-baquelita-volteck-2fc.jpg', 'Ferretería', 1),
('4895174144386', 'Foco Led Grande Economico ', 'bulbo', '82', 22, 17, 'https://lanuevaelectrica.com.mx/cdn/shop/products/006021_1.jpg?v=1678563681', 'Ferretería', 1),
('491726', 'THINNER POR LITRO ', 'economico', '52', 45, 33, 'https://static.wixstatic.com/media/50e6c6_70b12d783d7045638c0cde7909cd56a4~mv2.jpg/v1/fill/w_480,h_480,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/50e6c6_70b12d783d7045638c0cde7909cd56a4~mv2.jpg', 'Ferretería', 1),
('49648', 'Codo 90° De Cobre,Rosca Exterior De 4/4 Foset', 'truper', '2', 102, 84, 'https://ferrelaeconomica.com.mx/wp-content/uploads/2019/12/CC-522.jpg', 'Ferretería', 1),
('49650', 'Codo 90° De Cobre,Rosca Interior 1/2 Foset ', '', '2', 39, 33, NULL, 'Ferretería', 1),
('49651', 'Codo 90° De Cobre,Rosca De interior 3/4 Foset ', '', '2', 102, 84, NULL, 'Ferretería', 1),
('49656', 'Conector De Cobre Rosca Interior De 1/2 Foset', '', '2', 22, 18, NULL, 'Ferretería', 1),
('49659', 'Tuerca Unión,Cobre A Rosca Externa 1/2 Foset', '', '2', 66, 54, NULL, 'Ferretería', 1),
('49660', 'Tuerca Union,Cobre A Rosca Externa 3/4 Foset ', '', '2', 102, 84, NULL, 'Ferretería', 1),
('49701', 'Cople De Cobre 3/4 Foset ', '', '6', 24, 19, NULL, 'Ferretería', 1),
('49708', 'Tapon Cobre 3/4 Foset ', '', '1', 14, 11.5, NULL, 'Ferretería', 1),
('49709', 'Tapon  De Cobre 1 Foset', '', '2', 28, 23, NULL, 'Ferretería', 1),
('49722', 'Codo 90° De Cobre Reducido 1x1/2´ Foset', '', '2', 66, 54, NULL, 'Ferretería', 1),
('49728', 'Codo 45° Cobre De 1/2 Foset', '', '1', 15.5, 13, NULL, 'Ferretería', 1),
('49735', 'Cople Tipo T 1/2 Foset ', '', '2', 20, 17, NULL, 'Ferretería', 1),
('49736', 'T De Cobre Sencilla 3/4 ', '', '2', 47, 39, NULL, 'Ferretería', 1),
('49741', 'Tee De Cobre Reducida 1/2x1/2x3/4', '', '2', 55, 45, NULL, 'Ferretería', 1),
('49756', 'Cople De Reduccion Bushing Cobre 3/4x1/2 Foset', '', '2', 20, 17, NULL, 'Ferretería', 1),
('57501206648020', 'Lima De Triangulo Pesado 7 Truper ', 'SIN MANGO', '2', 42, 34, 'https://www.ferreteriafixneza.mx/backend/vistas/img/productos/codigo/10921.jpg', 'Ferretería', 1),
('57501206648150', 'Lima Redonda Moza De  8 Truper ', '', '4', 56, 46, NULL, 'Ferretería', 1),
('57501206648303', 'Lima Plana Bastarda 6 Truper ', 'Truper', '5', 46, 38, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAq1BMVEX///+Li4uOjo6IiIiQkJCFhYWJiYmCgoKTk5N+fn58fHyWlpZ5eXmZmZmhoaF3d3ewsLD5+fnn5+fOzs6kpKTt7e3r6+uysrLT09Ph4eHIyMirq6tvb2+Cenb19fXZ2dlcXFySi4e/v7/KyMWqpqOoop6GgX+Zko6+u7dvZmNnZ2dRUVGhoaNfUkuOh4NTRD49LyRmXFdIOzNTRDxsYVxzbmlJNzBYTERoXFa72lOaAAAJtUlEQVR4nO2cbZebRhKFu6F5E0Kjd8AMYAQIxutRYnsmmf//y/beYuwk3pN442TP7p5TzxlLqLuh61ZVVzdfbIyiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKIqiKP91dl9omm', 'Ferretería', 1),
('57506240644892', 'Cople De Pvc. 1/2 Saniflow', '', '20', 3.5, 3, NULL, 'Fontanería', 1),
('57506240644953', 'Tapon De Pvc.1/2', '', '20', 2.5, 2, NULL, 'Fontanería', 1),
('57896', 'Cemento Apasco Bulto ', '', '8', 220, 190, NULL, 'Ferretería', 1),
('606110051675', 'Pegamento Epoxico Secado Rapido ', '', '1', 76, 56.5, NULL, 'Ferretería', 1),
('6277', 'Pintura Vinilica Blanca ', '', '1', 115, 86, NULL, 'Ferretería', 1),
('660731619157', 'Dado De Impacto 14mm Urrea', '', '2', 158, 115, NULL, 'Ferretería', 1),
('660731619195', 'Dado Impacto 17mm Urrea', '', '3', 192, 120, NULL, 'Ferretería', 1),
('737608017528', 'Disco De Corte Laminado Para Cortadora De Metal 14 Austromex', 'Austromex', '11', 55, 44, 'https://boxtool.mx/storage/products/66000996.webp', 'Ferretería', 1),
('737608019249', 'Disco De Corte De 4 1/2 Austromex ', 'Disco de corte ', '1', 15, 9.5, 'https://ferrekuper.com.mx/cdn/shop/products/97241-1.png?v=1647453867&width=900', 'Ferretería', 1),
('7500462103200', 'Ecotrampra De Pegamento Para Ratones ', 'Trampa para ratones ', '2', 45, 34, 'https://chedrauimx.vtexassets.com/arquivos/ids/27918298-1600-auto?v=638464284129500000&width=1600&height=auto&aspect=true', 'Ferretería', 1),
('7500462103217', 'Ecotrampa Para Raton ', '', '2', 35, 24, NULL, 'Ferretería', 1),
('7501102614001', 'Pkola Loka Gotero ', '', '1', 17.5, 12.5, NULL, 'Ferretería', 1),
('7501102631008', 'Plasti Loka ', '', '1', 27, 19, NULL, 'Ferretería', 1),
('7501102631206', 'Plastiloka 20g ', '', '1', 28, 20, NULL, 'Ferretería', 1),
('7501108017714', 'Cepillo Manual ', '', '1', 12, 8, NULL, 'Ferretería', 1),
('7501199465104', 'Pegamento De Viscosidad Pvc Tangit', '', '1', 235, 198, NULL, 'Ferretería', 1),
('7501206603123', 'Lija De Grano Grueso 60 Truper ', '', '12', 13.5, 10, NULL, 'Ferretería', 1),
('7501206603130', 'Lija Grano Medio 100 Truper ', '', '8', 12.5, 9, NULL, 'Ferretería', 1),
('7501206608425', 'Sellador De Alta Temperatura Rojo Truper ', '', '3', 49, 42, NULL, 'Ferretería', 1),
('7501206608432', 'Sellador De Alta Temperatura Negro Truper ', '', '2', 49, 42, NULL, 'Ferretería', 1),
('7501206608449', 'Sellador De Alta Temperatura Truper Azul', '', '3', 49, 42, NULL, 'Ferretería', 1),
('7501206608685', 'Cepillo Curvo Alambre Ondulado ', '', '1', 35, 29, NULL, 'Ferretería', 1),
('7501206610626', 'Pinza De Presion 10 Truper ', '', '2', 245, 205, NULL, 'Ferretería', 1),
('7501206611050', 'Machete De 27', '', '1', 99, 84, NULL, 'Ferretería', 1),
('7501206612330', 'Machete De 24 Truper', '', '2', 97, 79, NULL, 'Ferretería', 1),
('7501206616543', 'Electrodos Para Soldar 3/32 Truper', '', '2', 95, 78, NULL, 'Ferretería', 1),
('7501206616550', 'Electrodos Para Soldar 1/8 Truper', '', '2', 95, 78, NULL, 'Ferretería', 1),
('7501206616574', 'Electrodos Para Soldar 1/8 Truper', '', '2', 95, 78, NULL, 'Ferretería', 1),
('7501206616581', 'Electrodos Para Soldar 5/32 Truper', '', '1', 95, 78, NULL, 'Ferretería', 1),
('7501206617762', 'Desarmador Confort Grip Plano 1/4x6 Truper', 'Desarmador Plano Grip', '1', 58, 48, 'https://hsoferreterias.com/cdn/shop/products/DesarmadorPlano14X6MangoComfortGripTruperCatalogo_81a3df4a-61dc-407b-bc6b-bbcfed0e9fae_1000x1000.png?v=1701127179', 'Ferretería', 1),
('7501206619223', 'Espatula Flexible Corte Diagonal Mango De Plastico  5 Pretul', '', '2', 38, 32, NULL, 'Ferretería', 1),
('7501206620540', 'Martillo Uña Recta 16oz 13 Truper', '', '2', 125, 105, NULL, 'Ferretería', 1),
('7501206620564', 'Martillo Uña Curva 16oz 13 Truper', '', '2', 125, 105, NULL, 'Ferretería', 1),
('7501206620717', 'Cerrucho 20 Truper', '', '2', 175, 145, NULL, 'Ferretería', 1),
('7501206621561', 'Martillo Pulido Uña Recta 20on Truper ', '', '1', 209, 175, NULL, 'Ferretería', 1),
('7501206622049', 'Brocha Para Encalar 4 Truper ', '', '1', 66, 54, NULL, 'Ferretería', 1),
('7501206622056', 'Brocha Calzomina De 5 Truper ', '', '1', 92, 76, NULL, 'Ferretería', 1),
('7501206622216', 'Disco Abrasivo Para Metal 4 1/2 Truper ', '', '5', 39, 33, NULL, 'Ferretería', 1),
('7501206623589', 'Desarmador Plano 6-1/4 Truper Mango De Acetato ', '', '2', 72, 59, NULL, 'Ferretería', 1),
('7501206623688', 'Desarmador De Cruz 6- #2 Mango De Acetato Truper ', '', '2', 72, 59, NULL, 'Ferretería', 1),
('7501206623879', 'Martillo Tuburlar Pulido Uña Recta ', '', '2', 155, 125, NULL, 'Ferretería', 1),
('7501206624210', 'LIMA TRIANGULO PESADO CON MANGO 6 TRUPER', '', '3', 28, 23, NULL, 'Ferretería', 1),
('7501206624272', 'Juego Para Instalacion De Cerraduras Pretul', '', '1', 79, 66, NULL, 'Ferretería', 1),
('7501206624289', 'Juego De Brocas Sierras 5pz Pretul', '', '1', 89, 74, NULL, 'Ferretería', 1),
('7501206624517', 'Flexometro 5m/16 Pretul ', '', '0', 65, 54, NULL, 'Ferretería', 1),
('7501206624524', 'Flexometro 3m Pretul', '', '3', 42, 35, NULL, 'Ferretería', 1),
('7501206625576', 'Amarrador De Varilla De 1/2 Truper', '', '5', 139, 115, NULL, 'Ferretería', 1),
('7501206625842', 'Machete Estandar Pulido 14 Truper ', '', '2', 84, 68, NULL, 'Ferretería', 1),
('7501206625873', 'Machete Estandar Pulido 20 Truper ', '', '2', 89, 74, NULL, 'Ferretería', 1),
('7501206628515', 'Separador De Loseta 2mm Truper', '', '2', 32, 26, NULL, 'Ferretería', 1),
('7501206628522', 'Separador De Loseta 3mm', '', '2', 36, 29, NULL, 'Ferretería', 1),
('7501206628591', 'Pistola De Aire Para Limpieza De Maquinas Truper', '', '1', 339, 276, NULL, 'Ferretería', 1),
('7501206628966', 'Maneral Con Jaula Para Rodillo 9x 1 1/2 Truper ', '', '1', 46, 38, NULL, 'Ferretería', 1),
('7501206629321', 'Flota De Esponja Aspera 9 1/2x3/4 Pretul ', '', '1', 135, 109, NULL, 'Ferretería', 1),
('7501206630426', 'Nivel  24 Truper', '', '1', 229, 189, NULL, 'Ferretería', 1),
('7501206630655', 'Zapapico Con Mango 7Lb Truper ', '', '1', 485, 405, NULL, 'Ferretería', 1),
('7501206630716', 'Cinta De Corte Frio 1/2-6 Truper ', '', '1', 62, 49, NULL, 'Ferretería', 1),
('7501206630952', 'Cuchara Tipo Philadelphia Casquillo Crimpado 9 Truper ', '', '2', 209, 175, NULL, 'Ferretería', 1),
('7501206631584', 'Escuadra Para Cantero 8 X 12 Truper ', '', '4', 85, 69, NULL, 'Ferretería', 1),
('7501206632482', 'Nivel 12 Truper ', '', '1', 125, 105, NULL, 'Ferretería', 1),
('7501206633038', 'Marro Tipo Nevada Mango 10 3/4  Pretul', '', '1', 175, 145, NULL, 'Ferretería', 1),
('7501206633380', 'Pala Cuadrada Puño Y Pretul ', '', '2', 119, 135, NULL, 'Ferretería', 1),
('7501206633403', 'Juego De Cuñas Con Mango 4pz.  Pretul', '', '2', 39, 33, NULL, 'Ferretería', 1),
('7501206633526', 'Cincel De Corte Frio De 3/4x8 Truper ', '', '1', 92, 76, NULL, 'Ferretería', 1),
('7501206633786', 'Flota Esponja Aspero 9 1/2- 3/4 Truper ', '', '1', 155, 129, NULL, 'Ferretería', 1),
('7501206633946', 'Cincel De Corte Frio Con Grip 3/4x12 Truper', '', '1', 165, 135, NULL, 'Ferretería', 1),
('7501206634349', 'Espatula Corte Diagonal 3 Pretul ', '', '3', 28, 23, NULL, 'Ferretería', 1),
('7501206634356', 'Espatula Flexible Corte Diagonal Mango De Plastico  4 Pretul', '', '2', 29, 25, NULL, 'Ferretería', 1),
('7501206634462', 'Broca De Carbono De Tunstengno  3/16 Truper ', '', '7', 14, 11.5, NULL, 'Ferretería', 1),
('7501206634486', 'Broca De Carbono De Tugsteno 1/4 Truper ', '', '4', 19, 15.5, NULL, 'Ferretería', 1),
('7501206634516', 'Broca De Carburo De Tugsteno 5/16 Truper ', '', '7', 27, 22, NULL, 'Ferretería', 1),
('7501206634585', 'Broca De Carbono De Tunsgteno 5/8 Truper ', '', '3', 82, 67, NULL, 'Ferretería', 1),
('7501206634769', 'Voltador De Aluminio Truper ', '', '2', 92, 76, NULL, 'Ferretería', 1),
('7501206634776', 'Rallador De Aluminio Truper', '', '2', 135, 109, NULL, 'Ferretería', 1),
('7501206635131', 'Pistola Calafetadora Con Cremallera Tipo Esqueleto Pretul ', '', '1', 69, 58, NULL, 'Ferretería', 1),
('7501206635193', 'Llana Dentada Con Mango De Plastico 11x5 Truper ', '', '2', 102, 84, NULL, 'Ferretería', 1),
('7501206635551', 'Juego De Llaves Allen Milimetricas 10 Pz Pretul ', '', '2', 86, 72, NULL, 'Ferretería', 1),
('7501206638507', 'Pinzas De Chofer 8 Pretul ', '', '2', 99, 82, NULL, 'Ferretería', 1),
('7501206638859', 'Abrazadera De Acero Inoxidable 3/8x5/8 Truper', '', '1', 35, 32, NULL, 'Ferretería', 1),
('7501206638866', 'Abrazadera De Acero Inoxidable 1/2x3/4 Truper', '', '1', 24, 20, NULL, 'Ferretería', 1),
('7501206640036', 'Cinta Canela 48mm X 50m Truper ', '', '2', 32, 26, NULL, 'Ferretería', 1),
('7501206640517', 'Arco Tubular Profesional Con Segueta 12 Truper ', '', '1', 195, 162, NULL, 'Ferretería', 1),
('7501206640654', 'Remachadora Profesional De 4 Boquillas 10 Truper', '', '1', 196, 162, NULL, 'Ferretería', 1),
('7501206643068', 'Pala Carbonera Tipo Y Truper ', '', '1', 355, 295, NULL, 'Ferretería', 1),
('7501206643167', 'Pinza De Chofer Corte Sencillo 8 Pretul ', '', '1', 85, 70, NULL, 'Ferretería', 1),
('7501206643501', 'Juego De Llaves Allen Tipo Llavero 8 Pz Pretul ', '', '2', 32, 26, NULL, 'Ferretería', 1),
('7501206644829', 'Pinza De Electricista 9 Pretul ', '', '2', 165, 139, NULL, 'Ferretería', 1),
('7501206644911', 'Cinta De Aislar Trupper 18mm', '', '6', 20, 18.5, NULL, 'Ferretería', 1),
('7501206645048', 'Llave Ajustable 8 Pretul ', '', '1', 115, 0, NULL, 'Ferretería', 1),
('7501206645079', 'Llave Combinada 1/4 Pretul ', '', '2', 25, 21, NULL, 'Ferretería', 1),
('7501206645086', 'Llave Combinada 5/16 Pretul ', '', '2', 28, 23, NULL, 'Ferretería', 1),
('7501206645093', 'Llave Combianda 3/8 Pretul ', '', '2', 32, 26, NULL, 'Ferretería', 1),
('7501206645109', 'Llava Combinada 7/16 Pretul', '', '2', 35, 28, NULL, 'Ferretería', 1),
('7501206645123', 'Llave Combinada 9/16 Pretul ', '', '2', 42, 35, NULL, 'Ferretería', 1),
('7501206645130', 'Llave Combinada 5/8 Pretul ', '', '2', 49, 42, NULL, 'Ferretería', 1),
('7501206645147', 'Llave Combinada 11/16 Pretul ', '', '2', 53, 44, NULL, 'Ferretería', 1),
('7501206645154', 'Llave Combinada 3/4 Pretul ', '', '2', 62, 49, NULL, 'Ferretería', 1),
('7501206645239', 'Tiralíneas 15m Pretul ', '', '2', 109, 89, NULL, 'Ferretería', 1),
('7501206645505', 'Navaja Retractil Truper ', '', '2', 46, 38, NULL, 'Ferretería', 1),
('7501206645918', 'Broca De 1/16 Truper ', '', '9', 15.5, 13, NULL, 'Ferretería', 1),
('7501206645925', 'Broca De 5 /64 Truper ', '', '8', 15.5, 13, NULL, 'Ferretería', 1),
('7501206645932', 'Broca De 3 /32 Truper ', '', '7', 15.5, 13, NULL, 'Ferretería', 1),
('7501206645949', 'Broca De 7/64 Truper ', '', '8', 15.5, 13, NULL, 'Ferretería', 1),
('7501206645963', 'Broca De 9 /64 Truper ', '', '8', 19, 15.5, NULL, 'Ferretería', 1),
('7501206645970', 'Broca De 5/32 Truper ', '', '5', 20, 17, NULL, 'Ferretería', 1),
('7501206645994', 'Broca De 3/16 Truper ', '', '4', 28, 23, NULL, 'Ferretería', 1),
('7501206646014', 'Broca De 7/32 Truper ', '', '7', 39, 33, NULL, 'Ferretería', 1),
('7501206646069', 'Broca De 3/8 Truper ', '', '2', 117, 97, NULL, 'Ferretería', 1),
('7501206646175', 'Pinza Punta Y Corte 8 Pretul ', '', '3', 95, 79, NULL, 'Ferretería', 1),
('7501206648490', 'Cinta Transparente Truper ', '', '2', 27, 22, NULL, 'Ferretería', 1),
('7501206648902', 'Llave Combinada 6mm Pretul ', '', '2', 27, 22, NULL, 'Ferretería', 1),
('7501206648919', 'Llave Combianda 7mm Pretul ', '', '2', 27, 22, NULL, 'Ferretería', 1),
('7501206648933', 'Llave Combinada 9mm Pretul ', '', '2', 29, 25, NULL, 'Ferretería', 1),
('7501206648940', 'Llave Combinada De 10 Mm Pretul ', '', '2', 29, 25, NULL, 'Ferretería', 1),
('7501206648957', 'Llave Combinada 11 Mm Pretul', '', '2', 35, 29, NULL, 'Ferretería', 1),
('7501206648964', 'Llave Combinada 12mm Pretul ', '', '2', 35, 29, NULL, 'Ferretería', 1),
('7501206648988', 'Llave Combinada 14mm Pretul ', '', '2', 42, 35, NULL, 'Ferretería', 1),
('7501206648995', 'Llave Combinada 15mm Pretul ', '', '2', 46, 38, NULL, 'Ferretería', 1),
('7501206649008', 'Llave Combinada 16 Mm Pretul ', '', '2', 49, 42, NULL, 'Ferretería', 1),
('7501206649022', 'Llave Combinada 18mm Pretul ', '', '1', 58, 48, NULL, 'Ferretería', 1),
('7501206649039', 'Llave Combianda 19mm Pretul ', '', '2', 29, 49, NULL, 'Ferretería', 1),
('7501206649114', 'Llave Combinada 13/16 Pretul ', '', '2', 84, 70, NULL, 'Ferretería', 1),
('7501206649121', 'Llave Combinada 7/8 Pretul ', '', '2', 89, 74, NULL, 'Ferretería', 1),
('7501206649138', 'Llave Combinada 15/16 Pretul ', '', '2', 117, 97, NULL, 'Ferretería', 1),
('7501206649145', 'Llave Combinada 1 Pretul ', '', '2', 139, 115, NULL, 'Ferretería', 1),
('7501206650066', 'Escoba Metalica Con Diente De Alambre Plano 18Truper', '', '1', 125, 105, NULL, 'Ferretería', 1),
('7501206650455', 'Sellador Para Baños Translucido Y Cocinas Truper', '', '2', 115, 94, NULL, 'Ferretería', 1),
('7501206651421', 'Llanta Sin Camara Pretul 14 X 3 ', '', '2', 99, 82, NULL, 'Ferretería', 1),
('7501206651797', 'Camara Para Llanta 14 ', '', '2', 49, 42, NULL, 'Ferretería', 1),
('7501206652039', 'Conector Macho/Hembra Latón Solido  1/2 Truper', '', '1', 77, 63, NULL, 'Ferretería', 1),
('7501206652411', 'Conector Plastico Para Manguera Macho 1/2 Truper', '', '1', 17, 14, NULL, 'Ferretería', 1),
('7501206652459', 'Conector Plastico Para Manguera Hembra 5/8x3/4 Truper', '', '1', 20, 17, NULL, 'Ferretería', 1),
('7501206652596', 'Conector Rapido De Llave A Manguera 3/4 Truper', '', '1', 44, 36, NULL, 'Ferretería', 1),
('7501206653340', 'Manguera De 2 Capas 1/2 Pretul ', '', '1', 109, 89, NULL, 'Ferretería', 1),
('7501206653531', 'Tijera Forjada Para Poda Pretul ', '', '1', 137, 105, NULL, 'Ferretería', 1),
('7501206653876', 'Conector Macho Latón Solido  1/2 Truper', '', '2', 46, 38, NULL, 'Ferretería', 1),
('7501206656501', 'Interruptor Termomagnético 2 Polos-15A Volteck', '', '2', 175, 145, NULL, 'Ferretería', 1),
('7501206656525', 'Interruptor Termomagnético 2 Polos-30A Volteck', '', '2', 175, 145, NULL, 'Electricidad', 1),
('7501206656709', 'Llave De Jardin 3/4 X 1/2 Pretul ', '', '2', 72, 58, NULL, 'Ferretería', 1),
('7501206657270', 'Portalampara De Baquelita 4', '', '1', 20, 17, NULL, 'Electricidad', 1),
('7501206657393', 'Multicontacto Tipo T Volteck ', '', '2', 49, 42, NULL, 'Electricidad', 1),
('7501206657478', 'Adaptador A Tierra  Volteck', '', '2', 28, 23, NULL, 'Electricidad', 1),
('7501206657829', 'Placa Para Contacto Redondo Para Intemperie Volteck', '', '2', 35, 29, NULL, 'Electricidad', 1),
('7501206657973', 'Lata De Gas Butano/Propano 220g 1/4 De Vuelta Truper ', '', '2', 53, 44, NULL, 'Ferretería', 1),
('7501206658215', 'Portalampara De Baquelita Doble Contacto Volteck', '', '4', 19, 15.5, NULL, 'Fontanería', 1),
('7501206658222', 'Portalampara De Baquelita Cadena Ydoble Contacto', '', '2', 24, 19, NULL, 'Electricidad', 1),
('7501206658253', 'Contacto Dual Y Cadena-Soquer Volteck', '', '3', 24, 19, NULL, 'Electricidad', 1),
('7501206658536', 'Contacto Plástico Cara De Chino Volteck', '', '2', 27, 22, NULL, 'Electricidad', 1),
('7501206658543', 'Interruptor De Sobre Poner Sencillo-Para Timbre Volteck', '', '3', 14, 11.5, NULL, 'Electricidad', 1),
('7501206658550', 'Interruptor De Sobre Poner Para Timbre Volteck', '', '2', 15.5, 13, NULL, 'Electricidad', 1),
('7501206658567', 'Contacto De Sobreponer Duplex Plarizado Y Aterrizado Volteck ', '', '0', 29, 25, NULL, 'Electricidad', 1),
('7501206658581', 'Contacto De Sobre Poner  Sencillo Sin Tierra Volteck', '', '9', 14, 11.5, NULL, 'Electricidad', 1),
('7501206659083', 'Carda De Copa Para Taladro 2 3/4 Pretul ', '', '1', 62, 49, NULL, 'Ferretería', 1),
('7501206659144', 'Cables Para Corriente Pretul ', '', '1', 155, 129, NULL, 'Electricidad', 1),
('7501206659441', 'Clavija De Hule Negro ', '', '6', 15, 13, NULL, 'Ferretería', 1),
('7501206659519', 'Abrazadera Para Tubo Tipo Uña 1 Volteck', '', '5', 4.5, 2.7, NULL, 'Ferretería', 1),
('7501206659533', 'Abrazadera tipo Omega  3/4 Volteck ', '', '1', 25, 21, NULL, 'Ferretería', 1),
('7501206660188', 'Placa Duplex Para Conexion Tipo Fs Volteck ', '', '2', 55, 45, NULL, 'Electricidad', 1),
('7501206660218', 'Placa Duplex Para Conexion Tipo Fs Volteck', '', '1', 125, 105, NULL, 'Electricidad', 1),
('7501206660225', 'Placa Sencilla Para Cubierta Para Caja Conexion Tipo Fs Volteck', '', '1', 125, 105, NULL, 'Electricidad', 1),
('7501206660676', 'Pistola Calafateadora Tipo Esqueleto Truper', '', '1', 77, 63, NULL, 'Ferretería', 1),
('7501206660911', 'Lampara De Taller  16AWG-7.5m Volteck ', '', '1', 339, 279, NULL, 'Electricidad', 1),
('7501206661673', 'Multicontacto Uso Domestico,4 Entradas 16 Awg', '', '1', 92, 75, NULL, 'Electricidad', 1),
('7501206661680', 'Barra Multicontacto 6 Contactos 16AWG-50cm Volteck ', '', '2', 109, 89, NULL, 'Electricidad', 1),
('7501206662373', 'Centro De Carga Para Sobreponer 2 Polos Volteck ', '', '2', 120, 94, NULL, 'Electricidad', 1),
('7501206663127', 'Candado De Hierro 40 Mm Hermex ', '', '1', 46, 38, NULL, 'Ferretería', 1),
('7501206663226', 'Trampra De Madera Para Ratones ', '', '1', 42, 34, NULL, 'Ferretería', 1),
('7501206663707', 'Estencion Electrica  16AWG-2m  3 Contactos Volteck', '', '1', 49, 42, NULL, 'Electricidad', 1),
('7501206663714', 'Estencion Electrica  16AWG-4m Volteck ', '', '2', 85, 69, NULL, 'Electricidad', 1),
('7501206663721', 'Estencion Electrica  16AWG-6m Volteck ', '', '1', 115, 94, NULL, 'Electricidad', 1),
('7501206664162', 'Desarmador De Plano Punta Magnetizada 6 Pretul ', '', '0', 39, 36, NULL, 'Ferretería', 1),
('7501206664216', 'Desarmador De Cruz 4- 3/16 Pretul ', '', '2', 28, 26, NULL, 'Ferretería', 1),
('7501206664315', 'Desarmador De Cruz Punta Magnetizada De 6 Pretul ', '', '1', 39, 33, NULL, 'Ferretería', 1),
('7501206664445', 'Juego De Desarmadores 4 Pz Pretul', '', '1', 115, 93, NULL, 'Ferretería', 1),
('7501206664476', 'Juego De Desarmadores 2 Pz Pretul ', '', '1', 67, 55, NULL, 'Ferretería', 1),
('7501206664483', 'Desarmador Plano 4-3/16 ', '', '2', 28, 26, NULL, 'Ferretería', 1),
('7501206664841', 'Fusible Renovable 60a-250v', '', '5', 47, 22, NULL, 'Ferretería', 1),
('7501206665510', 'Cautin Tipo Lapiz Para Soldadura Electronica  30W Truper ', '', '2', 165, 135, NULL, 'Ferretería', 1),
('7501206665534', 'Cautin Tipo Lapiz Para Soldadura Electronica 50W Truper ', '', '0', 229, 189, NULL, 'Ferretería', 1),
('7501206665541', 'Cautin Tipo Lapiz Para Soldadura Electronica 45W Truper ', '', '1', 196, 162, NULL, 'Ferretería', 1),
('7501206666098', 'Rueda Abrasiva 6 Grano Grueso 36', '', '1', 187, 155, NULL, 'Ferretería', 1),
('7501206668559', 'Pinza De Hacendado 11 Pretul ', '', '1', 255, 209, NULL, 'Ferretería', 1),
('7501206671153', 'Hilo Redondo Para Desbrozadora 2mmx15m Truper ', '', '2', 38, 32, NULL, 'Ferretería', 1),
('7501206671931', 'Provador De Circuitos 14 100v-500v Truper ', '', '2', 20, 17, NULL, 'Ferretería', 1),
('7501206671948', 'Provador De Circuitos 19 100v-500v Truper ', '', '3', 24, 19, NULL, 'Ferretería', 1),
('7501206673508', 'Candado De Laton 45mm Hermex', '', '1', 195, 162, NULL, 'Ferretería', 1),
('7501206674253', 'Taquete De Plastico 5/16 X 1 3/4 Fiero', 'Taquete', '2', 32, 26, 'https://www.construrama.com/medias/?context=bWFzdGVyfGltYWdlc3wzOTQ2fGltYWdlL3dlYnB8aW1hZ2VzL2g4MS9oNTcvOTI4MzYzMzY3NjMxOC53ZWJwfGExYTdlZmJmNmRiMDZlNTliNzkzYmQ1NDg0YjYwYWJkODQyNzE5NmQ3NDBmMzk2NWMyYTcyNmY1M2U1OWU1NDY', 'Ferretería', 1),
('7501206674574', 'Candado De Hierro 45 Mm Hermex', '', '1', 97, 79, NULL, 'Ferretería', 1),
('7501206674710', 'Tiralineas 30m Truper ', '', '1', 125, 105, NULL, 'Ferretería', 1),
('7501206674925', 'Brocha De 1 Pretul ', '', '2', 11, 9, NULL, 'Ferretería', 1),
('7501206674932', 'Brocha 1 1/2pretul', '', '0', 14, 11.5, NULL, 'Ferretería', 1),
('7501206674949', 'Brocha 2 Pretul', '', '0', 17.5, 14.5, NULL, 'Ferretería', 1),
('7501206674956', 'Brocha 2 1/2 Pretul', '', '2', 20, 17, NULL, 'Ferretería', 1),
('7501206674963', 'Brocha Pretul De 3 ', '', '2', 28, 23, NULL, 'Ferretería', 1),
('7501206674970', 'Brocha De 4 Pretul', '', '0', 42, 34, NULL, 'Ferretería', 1),
('7501206674987', 'Brocha 5 Pretul', '', '1', 53, 44, NULL, 'Ferretería', 1),
('7501206674994', 'Brocha De 6 Pretul', '', '1', 59, 49, NULL, 'Ferretería', 1),
('7501206675045', 'Flota De Hule Manga De Madera 9 1/2x5/8 Truper', '', '1', 129, 115, NULL, 'Ferretería', 1),
('7501206675052', 'Flota Con Superficie Anti-Ahderente 9 1/2x5/8 Truper', '', '3', 149, 125, NULL, 'Ferretería', 1),
('7501206675533', 'Pico Con Mango De Madera 5Lb Truper ', '', '1', 399, 329, NULL, 'Ferretería', 1),
('7501206676363', 'Pasador De Seguridad Cromado 4 Hermex ', '', '2', 86, 72, NULL, 'Ferretería', 1),
('7501206676370', 'Pasador De Seguridad Latonado 2  Hermex ', '', '2', 46, 38, NULL, 'Ferretería', 1),
('7501206676394', 'Pasador De Seguridad 4 Hermex', '', '2', 86, 72, NULL, 'Ferretería', 1),
('7501206676554', 'Pala Cuadrada Puño Y Pretul ', '', '2', 175, 145, NULL, 'Ferretería', 1),
('7501206676929', 'Brocha De 1/2 Pretul', '', '2', 9.5, 6.5, NULL, 'Ferretería', 1),
('7501206677148', 'Cerradura De Sobreponer Izquierda Hermex  ', '', '2', 215, 179, NULL, 'Ferretería', 1),
('7501206677322', 'Rueda Abrasiva 6 Grano Medio 60 Truper', '', '3', 259, 215, NULL, 'Ferretería', 1),
('7501206678749', 'Cierra Circular De 20 Dientes Truper ', '', '1', 196, 162, NULL, 'Ferretería', 1),
('7501206679128', 'Plomada Metalica #1 7oz Pretul', '', '2', 109, 89, NULL, 'Ferretería', 1),
('7501206679968', 'Llave Ajustable 122 Truper', '', '1', 305, 0, NULL, 'Ferretería', 1),
('7501206679975', 'Llave Ajustable De 10', '', '1', 229, 0, NULL, 'Ferretería', 1),
('7501206681367', 'Flexometro 10m/33 Truper', '', '2', 435, 355, NULL, 'Ferretería', 1),
('7501206681978', 'Abrazadera tipo Omega  1 1/4 Volteck ', '', '1', 29, 25, NULL, 'Ferretería', 1),
('7501206681985', 'Abrazadera Tipo Omega 1 1/2 Volteck ', '', '1', 35, 29, NULL, 'Ferretería', 1),
('7501206683101', 'Guantes De Latex Puño Largo Limpieza Domestica Truper', '', '2', 39, 33, NULL, 'Ferretería', 1),
('7501206683415', 'Cinchos De Plastico 100mm 2.5mm Volteck', '', '1', 22, 18, NULL, 'Ferretería', 1),
('7501206683491', 'Cinchos De Plastico 300/4,5mm Volteck ', '', '4', 66, 54, NULL, 'Ferretería', 1),
('7501206683705', 'Silicon Blanco Truper ', '', '2', 115, 94, NULL, 'Ferretería', 1),
('7501206683835', 'Cinchos De Plastico  350mm X 4.5mm Volteck', '', '3', 42, 35, NULL, 'Ferretería', 1),
('7501206683842', 'Cinchos De Plastico 400mm 4.5mm Volteck', '', '3', 47, 39, NULL, 'Ferretería', 1),
('7501206683965', 'Cinchos De Plastico 300mm X 4.5mm Volteck', '', '4', 66, 54, NULL, 'Ferretería', 1),
('7501206683972', 'Cinchos De Plastico 350mm/4,5mm Volteck', '', '2', 42, 35, NULL, 'Ferretería', 1),
('7501206683989', 'Cinchos De Plastico 400mm X4.5mm Volteck', '', '3', 47, 39, NULL, 'Ferretería', 1),
('7501206683996', 'Cinchos De Plastico 500mm X 4.5mm Volteck', '', '2', 55, 44, NULL, 'Ferretería', 1),
('7501206684078', 'Llave De Paso Para W.C Tipo Barrilito Foset ', '', '3', 92, 75, NULL, 'Ferretería', 1),
('7501206684146', 'Aceitera Con Aplicador Flexible  180ml Truper ', '', '2', 92, 76, NULL, 'Ferretería', 1),
('7501206684160', 'Aceitera Con Aplicador Flexible 300ml Trupper', '', '1', 92, 76, NULL, 'Ferretería', 1),
('7501206684436', 'Candado Laminado  40mm Hermez', '', '1', 79, 66, NULL, 'Ferretería', 1),
('7501206684825', 'Cuchillo Para Linóleo 72 Truper', '', '1', 62, 49, NULL, 'Ferretería', 1),
('7501206684986', 'Esmalte Negro En Aerosol Estandar Truper ', '', '3', 65, 54, NULL, 'Ferretería', 1),
('7501206685013', 'Esmalte Acrilico En Aerosol Estandar Truper ', '', '1', 65, 54, NULL, 'Ferretería', 1),
('7501206685082', 'Navaja Retractil Pretul', '', '2', 35, 29, NULL, 'Ferretería', 1),
('7501206685181', 'Pijas De Acero Pavonadas 8x3/4 Fiero ', '', '300', 0.5, 0.21, NULL, 'Ferretería', 1),
('7501206685198', 'Pijas De Acero Pavonadas  8x1 Fiero ', '', '112', 0.5, 0.25, NULL, 'Ferretería', 1),
('7501206685204', 'Pijas De Acero Pavonadas Multiusos 8x 1 1/4 Fiero ', '', '297', 1, 0.29, NULL, 'Ferretería', 1),
('7501206685211', 'Lijas De Esmeril Negra Grano Extra-Gruesa 36 Truper', '', '10', 22, 18, NULL, 'Ferretería', 1),
('7501206685242', 'Lija De Esmeril Grano Medio 80 Truper', '', '9', 17.5, 14.5, NULL, 'Ferretería', 1),
('7501206685259', 'Lija De Esmeril Grano Fino 120 Truper', '', '8', 16.5, 13, NULL, 'Ferretería', 1),
('7501206685303', 'Pijas De Acero Pavonaas 8x1 1/2 Fiero ', '', '340', 1, 0.34, NULL, 'Ferretería', 1),
('7501206685501', 'Aceite De Dos Tiempos Truper 100ml', '', '3', 42, 35, NULL, 'Ferretería', 1),
('7501206686065', 'Armellas Cerradas 19x60 Fiero ', '', '125', 1.5, 0.58, NULL, 'Ferretería', 1),
('7501206686089', 'Armellas Cerradas 21x80 Fiero ', '', '134', 2.5, 1.12, NULL, 'Ferretería', 1),
('7501206686102', 'Armellas cerradas 23x110 Fiero ', '', '63', 5, 2.43, NULL, 'Ferretería', 1),
('7501206686188', 'Armellas Abiertas 18x50 Fiero ', '', '135', 1, 0.5, NULL, 'Ferretería', 1),
('7501206686232', 'Armellas Abiertas 21x80 Fiero ', '', '124', 2.5, 1.12, NULL, 'Ferretería', 1),
('7501206686256', 'Armellas Abiertas 23x110 Fiero ', '', '53', 5.5, 2.76, NULL, 'Ferretería', 1),
('7501206686805', 'Pijas De Acero Con Cabeza Galvanizadas 8x3/4 Fiero ', '', '175', 0.5, 0.27, NULL, 'Ferretería', 1),
('7501206686850', 'Pijas De Acero Con Cabeza Galvanizadas 8x2 Fiero ', '', '190', 1, 0.55, NULL, 'Ferretería', 1),
('7501206686867', 'Pijas De Acero Con Cabeza Galvanizadas 8x2 1/2 Fiero ', '', '178', 1.5, 0.68, NULL, 'Ferretería', 1),
('7501206686898', 'Pijas De Acero Con Cabeza Galvanizadas 10x3/4 Fiero ', '', '103', 1, 0.36, NULL, 'Ferretería', 1),
('7501206686997', 'Pijas De Acero Con Cabeza Galvanizadas 10x1 1/2 Fiero ', '', '65', 1, 0.56, NULL, 'Ferretería', 1),
('7501206687000', 'Pijas De Acero Con Cabeza Galvanizadas 10x2 Fiero ', '', '111', 1.5, 0.73, NULL, 'Ferretería', 1),
('7501206687291', 'Rastrillo Jardinero 14 Dientes Pretul ', '', '1', 179, 149, NULL, 'Ferretería', 1),
('7501206687574', 'Pistola Plastica De Riego Con Recubrimiento Truper ', '', '1', 86, 72, NULL, 'Ferretería', 1),
('7501206688854', 'Lentes De Seguridad Patillas Ajustables Truper', '', '3', 46, 38, NULL, 'Ferretería', 1),
('7501206689561', 'Mensula De Acero Negra 254mmx304.8mm Fiero ', '', '8', 24, 19, NULL, 'Ferretería', 1),
('7501206689707', 'Broca De Carbono De Tunsgteno 3/16 Truper ', '', '7', 15.5, 13, NULL, 'Ferretería', 1),
('7501206689868', 'Aceite 3 Aplicaciones 30ml Truper ', '', '1', 18, 14.5, NULL, 'Ferretería', 1),
('7501206689875', 'Aceite 3 Aplicaciones 90ml Truper', '', '5', 28, 23, NULL, 'Ferretería', 1),
('7501206690475', 'Lentes De Seguridad Diseño Ligero Pretul ', '', '1', 32, 26, NULL, 'Ferretería', 1),
('7501206690635', 'Guantes De Algodon Poliester Tipo Japonés Pretul', '', '1', 33, 28, NULL, 'Ferretería', 1),
('7501206690659', 'Extencion De Acero Para Rodillo 1.20m Truper ', '', '2', 44, 36, NULL, 'Ferretería', 1),
('7501206690765', 'Conector De Hule Hembra Volteck', '', '6', 27, 22, NULL, 'Ferretería', 1),
('7501206690802', 'Placa 1 Modulo De Abs, Linea Italiana,Color Marfil', '', '4', 32, 26, NULL, 'Ferretería', 1),
('7501206690925', 'Contacto Polarizado Y Aterrizado Volteck ', '', '4', 28, 23, NULL, 'Ferretería', 1),
('7501206691014', 'Mango Para Marro 36 Truper', '', '2', 149, 152, NULL, 'Ferretería', 1),
('7501206691038', 'Llanta Sin Camara Truper 16', '', '1', 209, 175, NULL, 'Ferretería', 1),
('7501206691076', 'Camara Para Llanta De Carretilla Truper 16', '', '2', 65, 54, NULL, 'Ferretería', 1),
('7501206691090', 'Eje Corto Para Carretilla ', '', '2', 62, 49, NULL, 'Ferretería', 1),
('7501206691113', 'Chumaceras Con Punzado ', '', '2', 32, 26, NULL, 'Ferretería', 1),
('7501206691892', 'Manguera De 2 Capas 1/2 Pretul ', '', '1', 109, 89, NULL, 'Ferretería', 1),
('7501206693490', 'Mensula De Acero Blanca 10cmx12.5cm Fiero ', '', '4', 8.5, 6.5, NULL, 'Ferretería', 1),
('7501206693513', 'Mensula De Acero Blanca 12cmx15cm Fiero ', '', '4', 10.5, 8, NULL, 'Ferretería', 1),
('7501206693537', 'Mensula De Acero Blanca 152.4mmx203.2mm Fiero ', '', '4', 12.5, 10.5, NULL, 'Ferretería', 1),
('7501206693575', 'Mensula De Acero Blanca 254mmx304.8mm Fiero ', '', '2', 24, 19, NULL, 'Ferretería', 1),
('7501206693933', 'Abrazadera  De Acero Inoxidable  1/2-3/4 Fiero ', '', '1', 55, 45, NULL, 'Ferretería', 1),
('7501206693971', 'Abrazadera De Acero Inoxidable 3/4- 1 1/16 Fiero ', '', '1', 102, 84, NULL, 'Ferretería', 1),
('7501206693988', 'Abrazadera Acero Inoxidable 5/8 A 1 1/4', '', '1', 102, 84, NULL, 'Ferretería', 1),
('7501206694015', 'Abrazadera De Acero Inoxidable 1 1/4- 2 Fiero ', '', '1', 135, 109, NULL, 'Ferretería', 1),
('7501206694398', 'Bandola Con Seguro 3/16-2 Fiero ', '', '2', 18.5, 14.5, NULL, 'Ferretería', 1),
('7501206695999', 'Grapa Para Cable 5mm Volteck', '', '1', 9.5, 7.7, NULL, 'Ferretería', 1),
('7501206696002', 'Grapa Para Cable 6mm Volteck', '', '2', 10, 8.5, NULL, 'Ferretería', 1),
('7501206696033', 'Grapa Para Cable 12mm Volteck', '', '1', 15, 12.5, NULL, 'Ferretería', 1),
('7501206696347', 'Caja Cuadradade Plastico Grande Volteck ', '', '3', 15.5, 9, NULL, 'Ferretería', 1),
('7501206696354', 'Caja Tipo Chalupa 4x2 Volteck Plastico ', '', '4', 11, 7, NULL, 'Ferretería', 1),
('7501206696545', 'Capuchos Para Cales 10-12 Volteck ', '', '2', 24, 20, NULL, 'Electricidad', 1),
('7501206696569', 'Capuchones Para Cables Surtidos  Volteck ', '', '2', 42, 35, NULL, 'Electricidad', 1),
('7501206697498', 'Manguera Flexible De Aluminio De 1/2 Foset ', '', '3', 28, 23, NULL, 'Fontanería', 1),
('7501206697634', 'Contacto Sencillo Sin Tierra Voltech ', '', '2', 14, 11.5, NULL, 'Electricidad', 1),
('7501206698068', 'Manguera Flexible De Aluminio 1/2 Para Lavabo Foset ', '', '2', 62, 49, NULL, 'Fontanería', 1),
('7501206698211', 'Manguera Flexible De Aluminio 3/8x500cm  Foset ', '', '1', 329, 275, NULL, 'Ferretería', 1),
('7501206698822', 'Conector Macho Tipo F Volteck ', '', '2', 13, 9, NULL, 'Ferretería', 1),
('7501206698839', 'Conector Tipo F Volteck ', '', '2', 13, 9, NULL, 'Ferretería', 1),
('7501206698846', 'Conector De Hule Hembra Volteck', '', '5', 11, 9, NULL, 'Ferretería', 1),
('7501206698853', 'Conector Axial Tipo F Cable Rg6 Volteck ', '', '2', 13, 9, NULL, 'Ferretería', 1),
('7501206698860', 'Cople Tipo Barril Sencillo ', '', '5', 15.5, 13, NULL, 'Ferretería', 1),
('7501206698921', 'Jgo.Clasico De Repacion Para Tanque De Wc.', '', '2', 159, 132, NULL, 'Fontanería', 1),
('7501206698938', 'Valvula De Llenado De Plastico Para Tanque Bajo', '', '1', 55, 45, NULL, 'Fontanería', 1),
('7501206698945', 'Valvula De Llenado De Plastico Con Flotador Para Tanque Bajo Foset', '', '2', 77, 63, NULL, 'Fontanería', 1),
('7501206698952', 'Balbula De Descarga Para W.C Para Dos Pz. Foset   ', '', '2', 77, 63, NULL, 'Fontanería', 1),
('7501206698969', 'Sapo Para W.C Foset ', '', '5', 27, 22, NULL, 'Fontanería', 1),
('7501206699010', 'Contracanasta Foset Coladera Desmoldante Con Tapon ', '', '1', 69, 58, NULL, 'Fontanería', 1),
('7501206699157', 'Cuello De Cera Con Guia Para Wc. 170 G', '', '2', 32, 26, NULL, 'Fontanería', 1),
('7501206699591', 'Céspol Flexible Para Lavabo Foset', '', '1', 77, 63, NULL, 'Fontanería', 1),
('7501206699614', 'CÉSPOL FLEXIBLE PARA FREGADERO FOSET ', '', '2', 69, 58, NULL, 'Fontanería', 1),
('7501206699621', 'Céspol Flexible Con Bote Y Contra Rejilla Plastica 1 1/2 Foset ', '', '1', 92, 75, NULL, 'Fontanería', 1),
('7501206699652', 'Remaches 1/8 Fiero ', '', '2', 18, 14.5, NULL, 'Ferretería', 1),
('7501206699676', 'Remaches 1/8 Fiero ', '', '1', 20, 15.5, NULL, 'Ferretería', 1),
('7501206699683', 'Remaches De 1/8 Fiero ', '', '1', 22, 15.5, NULL, 'Ferretería', 1),
('7501206699706', 'Remaches 5/32 Fiero ', '', '1', 22, 18, NULL, 'Ferretería', 1),
('7501206699713', 'Remaches 5/32 Fiero ', '', '2', 24, 19, NULL, 'Ferretería', 1),
('7501206699720', 'Remaches 5/32 Fiero', '', '2', 25, 21, NULL, 'Ferretería', 1),
('7501206699744', 'Remaches  3/16 Fiero', '', '2', 32, 26, NULL, 'Ferretería', 1),
('7501206699751', 'Remaches 3/16x3/8 Fiero ', '', '5', 38, 32, NULL, 'Ferretería', 1),
('7501206699768', 'Remaches 3/16x1/2 Fiero ', '', '4', 39, 33, NULL, 'Ferretería', 1),
('7501206699829', 'Remaches 3 /16 Fiero ', '', '1', 42, 35, NULL, 'Ferretería', 1),
('7501206699836', 'Remaches Con Espiga 3/16x1/2 Bolsa Con 50 Pzas.', '', '1', 46, 38, NULL, 'Ferretería', 1),
('7501942358967', 'Navaja Cutter 5 Keer', '', '1', 10.5, 3.8, NULL, 'Ferretería', 1),
('7501942358974', 'Navaja Cutter 6 Keer', '', '1', 12.5, 6.8, NULL, 'Ferretería', 1),
('7501942382207', 'Fija Puerta Goma Antiderrapante ', '', '2', 77, 57, NULL, 'Ferretería', 1),
('7502239090317', 'Bisagra Cuadrada De 2 1/2 ', '', '10', 18.5, 12.8, NULL, 'Ferretería', 1),
('7502239090324', 'Bisagra Cuadrade De 3 ', '', '8', 21, 15, NULL, 'Ferretería', 1),
('7502239090355', 'Bisagra Cuadrada 3 1/2 ', '', '10', 29, 20.5, NULL, 'Ferretería', 1),
('7502239091079', 'Bisagra Cuadrada 2 Aksi', '', '10', 14.5, 10.2, NULL, 'Ferretería', 1),
('7502239098658', 'Brocha De 1/2 Maxtool', '', '1', 6.5, 4, NULL, 'Ferretería', 1),
('7502239098665', 'Brocha De 1] Maxtool', '', '1', 7, 4, NULL, 'Ferretería', 1),
('7502239098672', 'Brocha De 1 1/2 Maxtool ', '', '1', 8.5, 6, NULL, 'Ferretería', 1),
('7502239098689', 'Brocha De  Maxtool', '', '1', 10.5, 7, NULL, 'Ferretería', 1),
('7502239098696', 'Brocha De 2 Maxtool', '', '1', 13.5, 9, NULL, 'Ferretería', 1),
('7502239098702', 'Brocha De 3 Maxtool', '', '1', 14.5, 11, NULL, 'Ferretería', 1),
('7502239098719', 'Brocha De 4 Maxtool', '', '1', 28, 20.5, NULL, 'Ferretería', 1),
('7502239098726', 'Brocha De 5 Maxtool', '', '1', 36, 26.5, NULL, 'Ferretería', 1),
('7502239098733', 'Brocha De 6  Maxtool', '', '1', 37.5, 27, NULL, 'Ferretería', 1),
('7502242342014', 'Veneno Para Rata ', '', '3', 18, 13, NULL, 'Ferretería', 1),
('7502244710835', 'Charola Negra De Plastico Para Rodillo ', '', '1', 22, 16.8, NULL, 'Ferretería', 1),
('7502244712808', 'Estopa ', '', '2', 42, 30, NULL, 'Ferretería', 1),
('7502244712877', 'Brocha Calzomina De 6 ', '', '1', 77, 55, NULL, 'Ferretería', 1),
('7502248135030', 'Juego Para Tinaco Alto 3/4 Bayusa ', '', '1', 66, 48.5, NULL, 'Fontanería', 1),
('7502252574108', 'Extencion De Uso Domestico 2m  ¡goto', '', '1', 45, 35, NULL, 'Electricidad', 1),
('7502269693922', 'Atomizador 1 L Valiplas ', '', '2', 30, 25, NULL, 'Ferretería', 1),
('7502309732765', 'Pasador De Barril 5 Hermex', '', '2', 46, 38, NULL, 'Ferretería', 1),
('7502309734769', 'Clavo Galvanizado De 2 ', '', '4', 15, 12, NULL, 'Ferretería', 1),
('7502309735032', 'Tubo Conduit Galvanizado Para Mufa 1 1/4 1.5m', '', '4', 209, 175, NULL, 'Ferretería', 1),
('7502309735513', 'Cinta Masking 13mm X 50m Pretul', '', '3', 13.5, 9, NULL, 'Ferretería', 1),
('7502309735520', 'Cinta Masking 19mm X 50m Pretul ', '', '5', 19.5, 13, NULL, 'Ferretería', 1),
('7502309735544', 'Cinta Masking 38mm X 50m Pretul ', '', '1', 37, 26, NULL, 'Ferretería', 1),
('7502309735551', 'Cinta Masking 50mm X 50m Pretul ', '', '1', 48.5, 35, NULL, 'Ferretería', 1),
('7502309736862', 'Manguera Flexible De Aluminio 1/2 Foset ', '', '3', 26, 22, NULL, 'Fontanería', 1),
('7502309737210', 'Pinza Ponchadora 3 Modulos Truper ', '', '1', 355, 295, NULL, 'Ferretería', 1),
('7502309737463', 'Esmalte Metalico Verde  En Aerosol Estandar Truper ', '', '2', 65, 54, NULL, 'Ferretería', 1),
('7502309737548', 'Esmalte Metalico Rojo En Aerosol Estandar Truper ', '', '2', 85, 69, NULL, 'Ferretería', 1),
('7502309737579', 'Esmalte Metalico Azul  En Aerosol Estandar Truper ', '', '2', 85, 69, NULL, 'Ferretería', 1),
('7502309738767', 'Aceite Para Gato Hidrahulico ', '', '2', 165, 149, NULL, 'Ferretería', 1),
('7503127866182', 'Foco Economico Luldex', '', '99', 15, 9, NULL, 'Ferretería', 1);
INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `stock`, `precio`, `coste`, `imagen`, `Categorianombre`, `disponibilidad`) VALUES
('7506006811594', 'Placa Plastica De Una Ventana Corsa ', '', '6', 25, 20, NULL, 'Electricidad', 1),
('7506006811617', 'Placa Plastica De Tres Ventanas Corsa ', '', '5', 25, 20, NULL, 'Electricidad', 1),
('7506198104597', 'Navaja Cutter De Plastico 5 ', '', '1', 7, 4, NULL, 'Ferretería', 1),
('7506198106034', 'Candado Antipalanca 70mm De Hierro Maxtool', '', '1', 98, 72.5, NULL, 'Ferretería', 1),
('7506198107444', 'Rafia De Color Blanco ', '', '2', 160, 105, NULL, 'Ferretería', 1),
('7506198107550', 'Candado De Combinancion De Disco 50mm', '', '1', 48.5, 36, NULL, 'Ferretería', 1),
('7506198108113', 'Candado De Hierro 30mm Maxtool', '', '1', 21, 15, NULL, 'Ferretería', 1),
('7506198108120', 'Candado De Hierro 40mm Maxtool', '', '1', 26, 18, NULL, 'Ferretería', 1),
('7506198108137', 'Candado De Hierro 50 Mm ', '', '1', 44.5, 32.5, NULL, 'Ferretería', 1),
('7506198108359', 'Jalador Con Esponja ', '', '3', 48, 35, NULL, 'Ferretería', 1),
('7506198108397', 'Bomba Destapacaños ', '', '3', 37, 26.5, NULL, 'Ferretería', 1),
('7506198120788', 'Cepillo Para Impermiabilizar ', '', '1', 75, 55, NULL, 'Ferretería', 1),
('7506198157982', 'Toalla De Microfribra ', '', '3', 15, 5, NULL, 'Ferretería', 1),
('7506198158521', 'Fibra Metalica Multiusos ', '', '1', 23.5, 17, NULL, 'Ferretería', 1),
('7506198158583', 'Fibra Galvanizada ', '', '1', 15, 8.5, NULL, 'Ferretería', 1),
('7506198181550', 'Disco Sierra De  7 1/4 Aksi', '', '1', 172, 128, NULL, 'Ferretería', 1),
('7506198183257', 'Raspador Mini Aksi 1 1/2 ', '', '2', 10.5, 7.7, NULL, 'Ferretería', 1),
('7506198186678', 'Taquete Expansvo Aksi 3/8 ', '', '1', 43, 34, NULL, 'Ferretería', 1),
('7506198188757', 'Aceite Alojatodo Aksi', '', '1', 32, 21, NULL, 'Ferretería', 1),
('7506198195434', 'Cepillo Para Wc Con Base ', '', '2', 38, 27, NULL, 'Ferretería', 1),
('7506240600183', 'Regulador Para Gas Foset', '', '1', 159, 120, NULL, 'Ferretería', 1),
('7506240600350', 'Punta Pol Roscado De 1/4 Foset ', '', '4', 29, 25, NULL, 'Ferretería', 1),
('7506240600374', 'Punta Pol 3/8 Con Espiga Foset ', '', '1', 29, 25, NULL, 'Ferretería', 1),
('7506240600510', 'Céspol Doble Para Fregadero 1 1/2 Foset ', '', '2', 102, 84, NULL, 'Fontanería', 1),
('7506240600961', 'Tuerca Sakamura De Acero Galvanizado 5/16 Fiero', '', '111', 1, 0.48, NULL, 'Ferretería', 1),
('7506240600978', 'Tuerca Sakamura De Acero Galvanizado 3/8 Fiero', '', '45', 1.5, 0.72, NULL, 'Ferretería', 1),
('7506240601005', 'Tuerca Sakamura De Acero Galvanizado 1 /8 Fiero', '', '1013', 0.5, 0.17, NULL, 'Ferretería', 1),
('7506240601012', 'Tuerca Sakamura De Acero Galvanizado 5/32 Fiero', '', '699', 50, 0.2, NULL, 'Ferretería', 1),
('7506240601029', 'Tuerca Sakamura De Acero Galvanizado 3/16 Fiero', '', '542', 0.5, 0.23, NULL, 'Ferretería', 1),
('7506240601036', 'Tornillos Tipo Estufa   1/8X 1/2 Fiero ', '', '690', 0.5, 0.14, NULL, 'Ferretería', 1),
('7506240601050', 'Tornillo Tipo Estufa 1/8x3/4 Fiero ', '', '482', 0.5, 0.19, NULL, 'Ferretería', 1),
('7506240601067', 'Tornillos Tipo Estufa  1/8X 1 Fiero ', '', '375', 50, 0.24, NULL, 'Ferretería', 1),
('7506240601081', 'Tornillos Tipo Estufa  1/8 X 1 1/2 Fiero ', '', '298', 1, 0.32, NULL, 'Ferretería', 1),
('7506240601098', 'Tornillo Tipo Estufa 1/8X 2 Fiero ', '', '240', 1, 0.38, NULL, 'Ferretería', 1),
('7506240601104', 'Tornillos De Acero Galvanizado  5/32X 1/2 Fiero ', '', '425', 0.5, 0.24, NULL, 'Ferretería', 1),
('7506240601128', 'Tornillos Tipo Estufa  5/32X3/4 Fiero ', '', '288', 1, 0.31, NULL, 'Ferretería', 1),
('7506240601135', 'Tornillo Tipo Estufa 5/32X 1 Fiero ', '', '318', 1, 0.41, NULL, 'Ferretería', 1),
('7506240601159', 'Tornillo Tipo Estufa  5/32X 1 1/2 Fiero ', '', '198', 1, 0.48, NULL, 'Ferretería', 1),
('7506240601166', 'Tornillo Tipo Estufa De Acero Galvanizado 5/32x2 Fiero ', '', '149', 1.2, 0.59, NULL, 'Ferretería', 1),
('7506240601173', 'Tornillo Tipo Estufa 5/32X 2 1/2 Fiero ', '', '144', 1.5, 0.72, NULL, 'Ferretería', 1),
('7506240601180', 'Tornillos De Acero Galvanizado  3/16X 1/2 Fiero ', '', '253', 1, 0.32, NULL, 'Ferretería', 1),
('7506240601203', 'Tornillo Tipo Estufa   3/16X 3/4 Fiero ', '', '242', 1, 0.42, NULL, 'Ferretería', 1),
('7506240601210', 'Tornillo Tipo Estufa  3/16X 1 Fiero ', '', '194', 1, 0.48, NULL, 'Ferretería', 1),
('7506240601234', 'Tornillos De Acero Galvanizado  3/16X 1 1/2 Fiero ', '', '140', 1.4, 0.68, NULL, 'Ferretería', 1),
('7506240601241', 'Tornillo Tipo Estufa 3/16X 2 Fiero ', '', '93', 1.5, 0.76, NULL, 'Ferretería', 1),
('7506240601258', 'Tornillo Tipo Estufa  3/16X2  1/2 Fiero ', '', '96', 1.5, 0.89, NULL, 'Ferretería', 1),
('7506240601265', 'Tornillos Tipo Estufa  3/16X 3 Fiero ', '', '104', 2.5, 1.15, NULL, 'Ferretería', 1),
('7506240601364', 'Tornillos De Acero Galvanizado  1/4X 1/2 Fiero ', '', '116', 1.5, 0.61, NULL, 'Ferretería', 1),
('7506240601388', 'Tornillos De Acero Galvanizado  1/4X 1 Fiero ', '', '51', 1.8, 0.88, NULL, 'Ferretería', 1),
('7506240601425', 'Tornillos De Acero Galvanizado  1/4X 2 1/2 Fiero ', '', '46', 3.5, 1.76, NULL, 'Ferretería', 1),
('7506240601432', 'Tornillos De Acero Galvanizado  1/4X 3 Fiero ', '', '43', 4, 1.88, NULL, 'Ferretería', 1),
('7506240601449', 'Tornillos De Acero Galvanizado  5/16X 1/2 Fiero ', '', '91', 2.5, 1.7, NULL, 'Ferretería', 1),
('7506240601463', 'Tornillos De Acero Galvanizado  5/16X 1 Fiero ', '', '57', 3, 1.47, NULL, 'Ferretería', 1),
('7506240601487', 'Tornillos De Acero Galvanizado  5/16X 1 1/2 Fiero ', '', '38', 4, 1.88, NULL, 'Ferretería', 1),
('7506240601494', 'Tornillos De Acero Galvanizado  5/16X 2 Fiero ', '', '74', 2.23, 4.5, NULL, 'Ferretería', 1),
('7506240601500', 'Tornillos De Acero Galvanizado  5/16X 2 1/2 Fiero ', '', '52', 2.63, 5.5, NULL, 'Ferretería', 1),
('7506240601517', 'Tornillos De Acero Galvanizado  5/16X 3 Fiero ', '', '59', 3.25, 6.5, NULL, 'Ferretería', 1),
('7506240601531', 'Tornillos De Acero Galvanizado  /16X 4 Fiero ', '', '37', 3.98, 8, NULL, 'Ferretería', 1),
('7506240601548', 'Tornillos De Acero Galvanizado  3/8X 3/8 Fiero ', '', '48', 1.78, 3.5, NULL, 'Ferretería', 1),
('7506240601555', 'Tornillos De Acero Galvanizado  3/8X 1 Fiero ', '', '39', 2.2, 4.5, NULL, 'Ferretería', 1),
('7506240601579', 'Tornillos De Acero Galvanizado  3/8X 1 1/2 Fiero ', '', '78', 2.7, 5.5, NULL, 'Ferretería', 1),
('7506240601586', 'Tornillos De Acero Galvanizado  3/8X 2 Fiero ', '', '52', 3, 6, NULL, 'Ferretería', 1),
('7506240601593', 'Tornillos De Acero Galvanizado  3/8X 2 1/2 Fiero ', '', '50', 3.78, 7.5, NULL, 'Ferretería', 1),
('7506240601609', 'Tornillos De Acero Galvanizado  3/8X 3 Fiero ', '', '31', 4.73, 9.5, NULL, 'Ferretería', 1),
('7506240601791', 'Arandela Plana 1/8 Fiero', '', '653', 0.15, 0.5, NULL, 'Ferretería', 1),
('7506240601807', 'Arandela Plana 5/32 Fiero', '', '508', 0.18, 0.5, NULL, 'Ferretería', 1),
('7506240601821', 'Arandela Plana 1/4 Fiero', '', '62', 0.3, 0.5, NULL, 'Ferretería', 1),
('7506240601838', 'Arandela Plana 5/16 Fiero', '', '242', 0.35, 1, NULL, 'Ferretería', 1),
('7506240601845', 'Arandela Plana 3/8 Fiero', '', '107', 0.65, 1.5, NULL, 'Ferretería', 1),
('7506240601883', 'Alambre De Acero galvanizado Calibre 12.5 Fiero ', '', '2', 63, 86, NULL, 'Ferretería', 1),
('7506240601890', 'Alambre De Acero galvanizado Calibre 14.5 Fiero ', '', '1', 66, 90, NULL, 'Ferretería', 1),
('7506240601906', 'Alambre De Acero galvanizado Calibre 16 Fiero ', '', '1', 67, 91, NULL, 'Ferretería', 1),
('7506240601913', 'Alambre De Acero galvanizado Calibre 18 Fiero ', '', '1', 69, 94, NULL, 'Ferretería', 1),
('7506240601920', 'ALAMBRE GALVANIZADO CALIBRE 20 FIERO ', '', '1', 70, 97, NULL, 'Ferretería', 1),
('7506240601937', 'Alambre De Acero galvanizado Calibre 22 Fiero ', '', '1', 82, 119, NULL, 'Ferretería', 1),
('7506240602071', 'Sellador Acrilico Translucido  Truper ', '', '3', 58, 72, NULL, 'Ferretería', 1),
('7506240602088', 'Sellador Acrilico Truper 280ml ', '', '1', 58, 72, NULL, 'Ferretería', 1),
('7506240605416', 'Encendedor De Cazuela Truper', '', '5', 35, 42, NULL, 'Ferretería', 1),
('7506240606246', 'Base Para Watthorimetro 4 Terminales Volteck', '', '2', 175, 209, NULL, 'Fontanería', 1),
('7506240607625', 'Martillo Mango De Fibra De Vidrio  Uña Recta 16oz 13 Truper', '', '2', 162, 195, NULL, 'Ferretería', 1),
('7506240608639', 'Regadera Electrica 127 V  Foset  ', '', '3', 345, 415, NULL, 'Electricidad', 1),
('7506240608653', 'Resistencia De Repuesto Para Regadera Electrica Foset', '', '4', 109, 135, NULL, 'Ferretería', 1),
('7506240610083', 'Pasador De Barril 3 Hermex', '', '2', 26, 32, NULL, 'Ferretería', 1),
('7506240610113', 'Pasador De Seguridad Slide Barrel Bolt Hermex ', '', '1', 39, 47, NULL, 'Ferretería', 1),
('7506240610434', 'Flexometro 5.5/18 Truper', '', '1', 145, 175, NULL, 'Ferretería', 1),
('7506240611837', 'Varilla De Acero Para Flotador ', '', '7', 10, 15, NULL, 'Ferretería', 1),
('7506240612780', 'Cinta Para Ducto 48mm X 10m Pretul ', '', '2', 26, 33, NULL, 'Ferretería', 1),
('7506240612797', 'Cinta Para Ducto 48mm X 30m Pretul', '', '2', 72, 86, NULL, 'Ferretería', 1),
('7506240613602', 'Tapa De Pvc Para Colaera De 5 Foset ', '', '3', 28, 34, NULL, 'Fontanería', 1),
('7506240613657', 'Cemento Pvc Transparente Foset 50ml', '', '2', 26, 32, NULL, 'Ferretería', 1),
('7506240613671', 'Cemento Para Pvc Bote 250ml Foset', '', '1', 78, 95, NULL, 'Ferretería', 1),
('7506240613695', 'Cemento Para Cpvc Amarillo Foset', '', '4', 32, 39, NULL, 'Fontanería', 1),
('7506240613701', 'Pegamento Para Cpv Amarillo', '', '1', 50, 62, NULL, 'Ferretería', 1),
('7506240613718', 'Cemento CPVC Amarillo Foset Bote 145ml', '', '2', 69, 85, NULL, 'Fontanería', 1),
('7506240613749', 'Cemento Transparente Para Pvc Foset Bote 90 Ml', '', '0', 42, 49, NULL, 'Fontanería', 1),
('7506240616085', 'Juego De Pistola Para Sopletear 1/4 Truper', '', '1', 199, 245, NULL, 'Ferretería', 1),
('7506240616283', 'Juego De Mini cepillos De Alambre Truper ', '', '1', 58, 69, NULL, 'Ferretería', 1),
('7506240617549', 'Clavija Blindada Con Abrazadera Sin Tierra  Volteck', '', '2', 18, 22, NULL, 'Electricidad', 1),
('7506240617754', 'Sistema De Descarga Dual Para W.C Foset', '', '1', 355, 429, NULL, 'Ferretería', 1),
('7506240617761', 'Valvula De Descarga Dual 49325', '', '1', 255, 305, NULL, 'Ferretería', 1),
('7506240618805', 'Clavija Redonda Con Hule Naranja ', '', '3', 22, 27, NULL, 'Ferretería', 1),
('7506240619093', 'Plastiprotetector Truper 5m X 2m', '', '1', 23, 28, NULL, 'Ferretería', 1),
('7506240619109', 'Plastiprotector Truper 5m X 3m ', '', '0', 22, 27, NULL, 'Ferretería', 1),
('7506240620037', 'Palanca Para Sanitario Foset ', '', '5', 19, 24, NULL, 'Ferretería', 1),
('7506240620273', 'Espuma Expansiva Truper ', '', '1', 115, 139, NULL, 'Ferretería', 1),
('7506240621546', 'Abrazadera tipo Omega  3 Volteck ', '', '2', 79, 97, NULL, 'Ferretería', 1),
('7506240621553', 'Abrazadera tipo Omega 4 Volteck ', '', '1', 89, 109, NULL, 'Ferretería', 1),
('7506240621966', 'Empaque De Hule De 2-1 1/2 Foset ', '', '2', 5.6, 10, NULL, 'Ferretería', 1),
('7506240623830', 'Disco Sierra 7 1/4 ', '', '3', 215, 259, NULL, 'Ferretería', 1),
('7506240624523', 'Mechero Para Lata  De Gas  Truper', '', '3', 115, 137, NULL, 'Ferretería', 1),
('7506240624592', 'Disco De Corte Para Metal Extra fino 4 1/2 Pretul ', '', '9', 11.5, 14, NULL, 'Ferretería', 1),
('7506240624639', 'Disco De Corte Extra Fino 7 Pretul ', '', '10', 29, 36, NULL, 'Ferretería', 1),
('7506240624707', 'Segueta Bimetalica P/Sierra Sable', '', '8', 135, 165, NULL, 'Ferretería', 1),
('7506240624806', 'Seguetas Bimetálicas Para Sierra Sable Truper ', '', '27', 109, 135, NULL, 'Ferretería', 1),
('7506240625773', 'Pasta Para Soldar 60g Truper', '', '3', 23, 28, NULL, 'Ferretería', 1),
('7506240625780', 'Pasta Para Soldar Truper 100 G', '', '2', 33, 39, NULL, 'Ferretería', 1),
('7506240625971', 'Alcayatas Roscadas  10X50 Fiero', '', '129', 0.67, 1.5, NULL, 'Ferretería', 1),
('7506240626008', 'Alcayatas Roscadas  22X90 Fiero', '', '130', 1.93, 3.5, NULL, 'Ferretería', 1),
('7506240626039', 'Alcayatas Roscadas  20X70 Fiero', '', '138', 1.3, 2, NULL, 'Ferretería', 1),
('7506240627906', 'Adaptador Macho De Cpvc 1/2 ', '', '40', 0, 3.5, NULL, 'Ferretería', 1),
('7506240627937', 'Adaptador Hembra De Cpvc 1/2 ', '', '40', 4.3, 5, NULL, 'Ferretería', 1),
('7506240629337', 'Céspol Flexible Para Lavabo O Fregadero Foset ', '', '1', 54, 66, NULL, 'Fontanería', 1),
('7506240629405', 'Llave De Paso W.C Tipo Barrilito Foset ', '', '2', 89, 109, NULL, 'Fontanería', 1),
('7506240629474', 'Coladera Universal De ABS 5 FOSET', '', '2', 84, 102, NULL, 'Fontanería', 1),
('7506240634553', 'Multicontacto Volteck ', '', '4', 17.5, 22, NULL, 'Electricidad', 1),
('7506240634560', 'Multicontacto Con Clavija Volteck ', '', '3', 22, 27, NULL, 'Electricidad', 1),
('7506240635161', 'Aceite De Dos Tiempos Truper 60ml', '', '3', 23, 28, NULL, 'Ferretería', 1),
('7506240635567', 'Hilo Para Pesca 1mmx100m Pretul ', '', '2', 42, 49, NULL, 'Ferretería', 1),
('7506240635581', 'Flexometro Cinta Extra Ancha Blanca  5.5m Truper', '', '1', 129, 135, NULL, 'Ferretería', 1),
('7506240636335', 'Gas Butano Para Encendedor Pretul 216ml', '', '2', 38, 46, NULL, 'Ferretería', 1),
('7506240636885', 'Cepillo Barredor 30cm Klintek', '', '2', 47, 55, NULL, 'Fontanería', 1),
('7506240636939', 'Escoba De Vinilo Tipo Abanico Klintek ', '', '2', 49, 59, NULL, 'Ferretería', 1),
('7506240636953', 'Escoba De Vinilo Tipo Cepillo Mediano Klintek ', '', '1', 49, 59, NULL, 'Ferretería', 1),
('7506240636984', 'Jalador De Lamina Reforzada Klintek ', '', '2', 66, 79, NULL, 'Ferretería', 1),
('7506240637141', 'Cincel 3/4x10 Truper', '', '2', 119, 145, NULL, 'Ferretería', 1),
('7506240637172', 'Cincel 3/4x8 Truper', '', '1', 109, 135, NULL, 'Ferretería', 1),
('7506240638438', 'Alambre Recocido 1kg Fiero ', '', '18', 30, 47, NULL, 'Ferretería', 1),
('7506240639534', 'Flexometro Cinta Extra Ancha 5m Truper', '', '2', 105, 125, NULL, 'Ferretería', 1),
('7506240639633', 'Jgo.Accesorios Para Tanque Bajo Economico Foset', '', '0', 94, 115, NULL, 'Fontanería', 1),
('7506240640257', 'Disco Laminado 4 1/2 Grano 40 Pretul ', '', '4', 38, 46, NULL, 'Ferretería', 1),
('7506240640264', 'Disco Laminado Grano 60 4 1/2 Pretul ', '', '1', 38, 46, NULL, 'Ferretería', 1),
('7506240640271', 'Disco Laminado Grano 80 4 1/2 Pretul ', '', '13', 38, 46, NULL, 'Ferretería', 1),
('7506240642848', 'A Cepillo De Acero De Carbono Pretul', '', '1', 32, 38, NULL, 'Ferretería', 1),
('7506240642862', 'Clavija Con Enchufe De 3 Entradas Volteck ', '', '8', 10.5, 12.5, NULL, 'Ferretería', 1),
('7506240643982', 'Rueda Flap Con Vastago Grano ', '', '3', 35, 42, NULL, 'Ferretería', 1),
('7506240644002', 'Rueda Flap Con Vastago Grano 40 Truper ', '', '3', 49, 59, NULL, 'Ferretería', 1),
('7506240644156', 'Interruptor Metalico 3 Terminales ', '', '27', 25, 40, NULL, 'Ferretería', 1),
('7506240644835', 'Codo De Pvc 90° 1/2', '', '30', 0, 4.5, NULL, 'Fontanería', 1),
('7506240644965', 'Tapon De Pvc. 3/4', '', '10', 3.5, 4, NULL, 'Fontanería', 1),
('7506240645016', 'Adaptador Macho De Pvc 1/2 ', '', '20', 0, 3.5, NULL, 'Ferretería', 1),
('7506240645108', 'Rodillo De Mirofibra Uso Especial De Microfibra 9x 3/8 Truper', '', '2', 72, 86, NULL, 'Ferretería', 1),
('7506240645115', ' Mini Rodillo De Esponja 4x 3/8 Truper', '', '2', 42, 49, NULL, 'Ferretería', 1),
('7506240645146', 'Repuesto De Mini Rodillo De 4 Pulogadas PoliesterTruper', '', '1', 15.5, 19, NULL, 'Ferretería', 1),
('7506240645238', 'Rodillo Profecional De Alta Densidad 9x 5/8 Truper', '', '1', 50, 62, NULL, 'Ferretería', 1),
('7506240645245', 'Rodillo Para Pintar Felpa 9X3/4 Semi Rugosa Truper', '', '1', 52, 62, NULL, 'Ferretería', 1),
('7506240645313', 'Repuesto De Rodillo 9 Truper', '', '2', 28, 35, NULL, 'Ferretería', 1),
('7506240645337', 'Repuesto D Rodillo Profecional De Alta Densidad  9x 1  1/4 Truper', '', '2', 32, 38, NULL, 'Ferretería', 1),
('7506240645375', 'Mini Rodillo De Poliester  4x 3/4 Truper', '', '1', 45, 52, NULL, 'Ferretería', 1),
('7506240645474', 'Abrazadera De Acero Inoxidable 9/16- 1/16 Fiero ', '', '1', 84, 102, NULL, 'Ferretería', 1),
('7506240646099', 'Multicontacto Economico,6 Entradas,16awg.Colores A Granel', '', '1', 56, 68, NULL, 'Electricidad', 1),
('7506240646303', 'Llaves Allen Estandar 13 Llaves Truper ', '', '2', 169, 205, NULL, 'Ferretería', 1),
('7506240646310', 'Llaves Allen Milimetricas 13 Llaves Truper ', '', '2', 169, 205, NULL, 'Ferretería', 1),
('7506240646327', 'Llaves Torx Largas 9 Llaves Truper ', '', '2', 149, 179, NULL, 'Ferretería', 1),
('7506240647669', 'Juego De Terminales Aisladas 55 Pz. Variado Volteck ', '', '1', 68, 83, NULL, 'Electricidad', 1),
('7506240647881', 'Hilo Redondo Para Desbrozadora 2.4mmx12m Truper ', '', '2', 32, 38, NULL, 'Ferretería', 1),
('7506240648864', 'Alambre Galvanizado 6,1m Calibre 20 Fiero ', '', '5', 8, 12, NULL, 'Ferretería', 1),
('7506240648871', 'Rollo De Alambre Galvanizado 3.2m Calibre 18  Fiero ', '', '2', 8, 12, NULL, 'Ferretería', 1),
('7506240648888', 'Alambre Galvanizado 1,5m Calibre 16 Fiero ', '', '9', 8, 12, NULL, 'Ferretería', 1),
('7506240650621', 'Soldadura 95/5 Para Tuberia De Gas Truper', '', '2', 73, 98, NULL, 'Ferretería', 1),
('7506240651833', 'Martillo Tubular Uña Recta 16 On Pretul ', '', '2', 115, 137, NULL, 'Ferretería', 1),
('7506240652472', 'Cinta Para Ducto 48mm X 10m Truper ', '', '2', 45, 58, NULL, 'Ferretería', 1),
('7506240652700', 'Flexometro Cinta Ancha 5,5m/18 Truper', '', '2', 156, 188, NULL, 'Ferretería', 1),
('7506240653271', 'Afloja Todo 110 ml  Truper ', '', '4', 33, 39, NULL, 'Ferretería', 1),
('7506240653301', 'Afloja Todo Multiusos Bote 400ml Truper ', '', '2', 62, 75, NULL, 'Ferretería', 1),
('7506240654254', 'Trapeador De Microfibra Klintek ', '', '1', 89, 109, NULL, 'Ferretería', 1),
('7506240654612', 'Lampara Led De Alta Potencia Volteck ', '', '3', 69, 85, NULL, 'Ferretería', 1),
('7506240655008', 'Aceite Rojo Para Madera 240ml', '', '2', 47, 56, NULL, 'Ferretería', 1),
('7506240655015', 'Aceite Rojo Para Madera Klinteck 480ml', '', '1', 78, 95, NULL, 'Ferretería', 1),
('7506240656241', 'Rastrillo Jardinero 12 Dientes Pretul ', '', '1', 125, 149, NULL, 'Ferretería', 1),
('7506240656975', 'Cemento Azul Para Pvc Foser Tubo 50 Ml ', '', '2', 32, 39, NULL, 'Fontanería', 1),
('7506240656982', 'Cemento Azul Para Pvc Bote 90ml Foset', '', '2', 44, 53, NULL, 'Fontanería', 1),
('7506240657385', 'Cinta De Montaje 19x1.5 Pretul ', '', '1', 18, 22, NULL, 'Ferretería', 1),
('7506240657392', 'Cinta De Montaje 19mmx5m Pretul ', '', '1', 33, 39, NULL, 'Ferretería', 1),
('7506240657477', 'Cinta De Montaje Doble Cara 19mm X 1.5m Truper ', '', '2', 25, 29, NULL, 'Ferretería', 1),
('7506240657484', 'Cinta De Montaje Doble Cara 19mmx5m Truper ', '', '2', 49, 62, NULL, 'Ferretería', 1),
('7506240658047', 'Cinchos De Plastico 300mm X 4.5mm Volteck', '', '4', 38, 46, NULL, 'Ferretería', 1),
('7506240658054', 'Cinchos De Plastico 300mm 4.5mm Volteck', '', '2', 38, 46, NULL, 'Ferretería', 1),
('7506240658061', 'Cinchos De Plastico 300mm X 4.5mm Volteck', '', '4', 38, 46, NULL, 'Ferretería', 1),
('7506240658078', 'Cinchos De Plastico 300mm X 4.5mm Volteck', '', '3', 38, 46, NULL, 'Ferretería', 1),
('7506240658504', 'Embudo Plastico 250ml Truper', '', '1', 13, 15.5, NULL, 'Ferretería', 1),
('7506240658825', 'Juego De 2 Desarmadores  4 Truper ', '', '2', 75, 92, NULL, 'Ferretería', 1),
('7506240661160', 'Cuchara Tipo Philadelphia Mango Anti-Derrapante 9 Truper ', '', '1', 175, 209, NULL, 'Ferretería', 1),
('7506240661269', 'Machete  24 Truper', '', '2', 82, 99, NULL, 'Ferretería', 1),
('7506240662112', 'Brocha Profesional 1/2 Truper ', '', '3', 10.5, 13, NULL, 'Ferretería', 1),
('7506240662136', 'Brocha De 1 1/2 Truper ', '', '3', 17, 20, NULL, 'Ferretería', 1),
('7506240662167', 'Brocha Mango Plastico 3 Truper Expert', '', '2', 34, 42, NULL, 'Fontanería', 1),
('7506240663737', 'Pijas De Acero Con Cabeza Galvanizadas 10x2 1/2 Fiero ', '', '133', 0.9, 1.8, NULL, 'Ferretería', 1),
('7506240666707', 'Cautin Tipo Lapiz Para Soldadura Electronica 80 W Truper ', '', '1', 215, 259, NULL, 'Ferretería', 1),
('7506240666714', 'Cautin Tipo Lapiz Para Soldadura Elctronica  De 100w Truper', '', '2', 239, 289, NULL, 'Ferretería', 1),
('7506240666813', 'Llana Mango De Madera 11x5 Truper ', '', '2', 58, 69, NULL, 'Ferretería', 1),
('7506240668244', 'Conector Fijo Roscar Interior 1/2', '', '10', 0, 8.5, NULL, 'Ferretería', 1),
('7506240668343', 'Adaptador Macho 1/2 ', '', '10', 0, 7, NULL, 'Ferretería', 1),
('7506240668701', 'Espuma Expansiva 300ml Pretul ', '', '3', 105, 125, NULL, 'Ferretería', 1),
('7506240668879', 'Tubo De 1 1/4 De Acero Galvanizado 3m Para Pared Gruesa Volteck', '', '2', 319, 385, NULL, 'Ferretería', 1),
('7506240668886', 'Varilla De Acero Cobrizado A Tierra 1/2 De 1.5m', '', '2', 139, 165, NULL, 'Ferretería', 1),
('7506240669111', 'Lazo Para Tendedero 15m Klintek', '', '3', 25, 29, NULL, 'Ferretería', 1),
('7506240669784', 'Sellador De Poliuretano Gris ', '', '2', 119, 145, NULL, 'Ferretería', 1),
('7506240671367', 'Placa Armada 1 Interructor,1 Contacto,1 Mod.Española,Blanco', '', '1', 58, 69, NULL, 'Electricidad', 1),
('7506240672760', 'Coladera De ABS Con Salida Lateral Foset ', '', '4', 89, 109, NULL, 'Fontanería', 1),
('7506240672777', 'Rejilla Atornillable Foset', '', '1', 39, 42, NULL, 'Ferretería', 1),
('7506240673835', 'Flexometro De 8m/16 Truper', '', '2', 199, 245, NULL, 'Ferretería', 1),
('7506240673859', 'Válvula De Descarga Para W.C De 2 Pz. 3 Foset ', '', '2', 89, 109, NULL, 'Fontanería', 1),
('7506240674030', 'Sierra Circular 7 1/4 Truper ', '', '1', 2250, 2725, NULL, 'Ferretería', 1),
('7506240674320', 'Interruptor Termomagnetico 1 Polo 50 A Volteck ', '', '2', 79, 86, NULL, 'Electricidad', 1),
('7506240674337', 'Interruptor Termomagnético 2 Polos-40A Volteck', '', '2', 145, 175, NULL, 'Electricidad', 1),
('7506240674344', 'Interruptor Termomagnetico 2 Polos-50A Volteck', '', '1', 145, 175, NULL, 'Ferretería', 1),
('7506240675884', 'Cerradura De Sobreponer Tradicional Derecha Hermex ', '', '2', 155, 187, NULL, 'Ferretería', 1),
('7506240676478', 'Lampara Led A19 6w Volteck', '', '3', 17, 20, NULL, 'Ferretería', 1),
('7506240676782', 'Hilo Para Pesca 0,8mmx100m Pretul ', '', '2', 29, 36, NULL, 'Ferretería', 1),
('7506240676898', 'Lampara 28W Espiral Luz De Dia Volteck 2 Pz ', '', '1', 115, 135, NULL, 'Ferretería', 1),
('7506240677246', 'Trapeador De Microfribra Ligero Klintek ', '', '0', 78, 95, NULL, 'Ferretería', 1),
('7506240679394', ' Disco Abrasivo De Metal Para Desvaste  7 Pretul ', '', '2', 45, 55, NULL, 'Ferretería', 1),
('7506240680550', 'Desarmador Plano 10-5/16 Pretul', '', '0', 49, 62, NULL, 'Ferretería', 1),
('7506240680598', 'Desarmador De Cruz Punta Magnetizada 6 #0 Pretul ', '', '2', 19, 24, NULL, 'Ferretería', 1),
('7506240680642', 'Desarmador De Cruz Punta Magnetizada Pretul', '', '1', 48, 59, NULL, 'Ferretería', 1),
('7506240682011', 'Pistola Para Sopletear 11 Truper', '', '2', 199, 245, NULL, 'Ferretería', 1),
('7506240684381', 'Conector Macho Aluminio  1/2 Truper', '', '1', 21, 25, NULL, 'Ferretería', 1),
('7506240684503', 'Escuadra Para Carpintero 10 Pretul', '', '2', 76, 92, NULL, 'Ferretería', 1),
('7506240686170', 'Grasa Para Chasis Truper 450g', '', '2', 66, 79, NULL, 'Ferretería', 1),
('7506240686248', 'Grasa Para Balero Truper 450g', '', '2', 78, 95, NULL, 'Ferretería', 1),
('7506240686293', 'Taquete Plastico Y Pija Con Broca Fiero ', '', '2', 27, 33, NULL, 'Ferretería', 1),
('7506240686699', 'Cautin Para Electronica Tipo Pistola 40w/25w Truper', '', '1', 225, 269, NULL, 'Ferretería', 1),
('7506240687320', 'Remches 3/16- 1/2 Fiero ', '', '2', 29, 36, NULL, 'Ferretería', 1),
('7506240687337', 'Remaches 3/16-3/8 Fiero ', '', '2', 28, 35, NULL, 'Ferretería', 1),
('7506240687344', 'Remaches 3/16-1/4 Fiero ', '', '2', 26, 32, NULL, 'Ferretería', 1),
('7506240691716', 'Grasa Blanca De Litio En Aerosol Truper Bote 295ml', '', '2', 84, 102, NULL, 'Ferretería', 1),
('7506240691723', 'Lubricante Para Cadenas En Aerosol Bote 400ml', '', '2', 72, 86, NULL, 'Ferretería', 1),
('7506240691945', 'Lapiz Carpintero Bicolor Truper ', '', '3', 28, 34, NULL, 'Ferretería', 1),
('7506240691952', 'Lapiz Carpintero Truper ', '', '3', 20, 24, NULL, 'Ferretería', 1),
('7506240691969', 'Crayon Industrial Rojo Truper ', '', '3', 21, 27, NULL, 'Ferretería', 1),
('7506240692447', 'Jgo.De Reparacion P/Wc Con Valvula Flotador Foset', '', '2', 175, 209, NULL, 'Fontanería', 1),
('7506240694083', 'Valvula De Llenado C/Flotador Compacto', '', '2', 49, 62, NULL, 'Fontanería', 1),
('7506240697695', 'Desarmado Dieléctrico 3 Truper', '', '1', 42, 49, NULL, 'Electricidad', 1),
('7506240697718', 'Desarmador Dialectrico Plano 7/32x5 Truper', '', '1', 62, 67, NULL, 'Electricidad', 1),
('7506240697725', 'Desarmador Diaelectrico Plano 1/4x6 Truper ', '', '1', 67, 74, NULL, 'Electricidad', 1),
('7506240697817', 'Adhesivo De Montaje Truper 140g', '', '4', 54, 65, NULL, 'Ferretería', 1),
('7506240698227', 'Pala Cuadrada De T2000 Truper', '', '2', 225, 269, NULL, 'Ferretería', 1),
('7506240699057', 'Cinta Sella Rosca 1/2 Teflon', '', '9', 5.7, 8, NULL, 'Ferretería', 1),
('7506321000000', 'Manguera Para Gas De 1mts', '', '3', 60, 81, NULL, 'Ferretería', 1),
('7506321000017', 'Manguera Para Gas De 1.5 mts.', '', '1', 90, 122, NULL, 'Ferretería', 1),
('7506321000024', 'Manguera Para Gas De 2mts.', '', '2', 120, 162, NULL, 'Ferretería', 1),
('7506321000031', 'Manguera Para Gas De 3mts.', '', '2', 180, 243, NULL, 'Ferretería', 1),
('7506321000048', 'Manguera Para Gas De 4mts', '', '2', 240, 324, NULL, 'Ferretería', 1),
('7506321000062', 'Manguera Para Gas De 60 Cms.', '', '3', 45, 62, NULL, 'Ferretería', 1),
('7506325104476', 'Acople De Comprencion 1/2 Fleximatic ', '', '7', 16.5, 23, NULL, 'Fontanería', 1),
('7506351234604', 'Candado De Hierro Mims 20mm', '', '2', 17, 24, NULL, 'Ferretería', 1),
('7506351234635', 'Canado De Hierro Mims 25mm', '', '1', 18, 26, NULL, 'Ferretería', 1),
('7506401306312', 'Extencion De Uso Domestico 4m  ¡goto', '', '1', 50, 65, NULL, 'Electricidad', 1),
('755625129581', 'Tijeras Tipo California Mangos De Aluminio Truper ', '', '1', 509, 615, NULL, 'Ferretería', 1),
('757450546830', 'Encendedor Multiusos ', '', '5', 12.5, 22.5, NULL, 'Ferretería', 1),
('76187', 'Arandela Plana 1/4', '', '10', 2.2, 3.5, NULL, 'Ferretería', 1),
('76215', 'Arandela 5/16', '', '10', 2.7, 3.5, NULL, 'Ferretería', 1),
('76308149048', 'Protectore De Piso De Fieltro  4x6 Scotch', '', '2', 193, 220, NULL, 'Ferretería', 1),
('7798216497983', 'Disco Diamantado Continuo 4 1/2 Energy', '', '2', 44, 67, NULL, 'Ferretería', 1),
('7798284185911', 'Disco Laminado Gladiator  4 1/2 ', '', '5', 15, 25, NULL, 'Ferretería', 1),
('7798284185928', 'Disco Laminado Gladiator 4 1/2 ', '', '5', 18, 25, NULL, 'Ferretería', 1),
('7798284185935', 'Disco Lamidado Gladiator Grano 80 4 1/22 ', '', '10', 15, 25, NULL, 'Ferretería', 1),
('78477458976', 'Receptaculo Duplex Con Placa Leviton ', '', '2', 57, 72, NULL, 'Ferretería', 1),
('78477841426', 'Clavija Con Tierra Leviton ', '', '2', 52, 62, NULL, 'Ferretería', 1),
('7891645372248', 'Segueta Roja Nichelson ', '', '49', 21, 30, NULL, 'Ferretería', 1),
('8236923100', 'Taquete De Madera 1/4 ', '', '1', 14, 24, NULL, 'Ferretería', 1),
('8236923117', 'Taquete De Madera 5 1/6 ', '', '2', 19.95, 26, NULL, 'Ferretería', 1),
('8236923124', 'Taquete De Matera 3/8 ', '', '1', 14, 20, NULL, 'Ferretería', 1),
('8501728122033', 'Valvula Para W.C Fama ', '', '1', 30.5, 40, NULL, 'Fontanería', 1),
('8518', 'Disco Sierra 4 3/4 Lion Tools ', '', '3', 68, 92, NULL, 'Ferretería', 1),
('900127', 'Calentador Electrico 20 L Duramax ', '', '5', 50, 65, NULL, 'Fontanería', 1),
('90036', 'Franela Tipo Paño', '', '2', 8, 15, NULL, 'Ferretería', 1),
('90124', 'Cepillo De Mano #2', '', '1', 6, 10, NULL, 'Ferretería', 1),
('90125', 'Capillo De Mano #3', '', '1', 8, 12, NULL, 'Ferretería', 1),
('92021', 'Pincel Plano N°1', '', '1', 8, 15.5, NULL, 'Ferretería', 1),
('92023', 'Pincel Plano N°3', '', '1', 11, 17, NULL, 'Ferretería', 1),
('92025', 'Pincel Plano N°5', '', '1', 19, 26, NULL, 'Ferretería', 1),
('92027', 'Pincel Redondo N°7', '', '1', 25, 34, NULL, 'Ferretería', 1),
('92030', 'Pincel Redondo  N°7', '', '1', 25, 34, NULL, 'Ferretería', 1),
('92067', 'Pincel Redondo N°1', '', '1', 3, 8.5, NULL, 'Ferretería', 1),
('92462', 'Tela Lavatrastes ', '', '5', 8.5, 15, NULL, 'Ferretería', 1),
('97145', 'Bisagra Tubular Forjada 3/8 ', '', '12', 3, 5.5, NULL, 'Ferretería', 1),
('97146', 'Bisagra Tubular Forjada 1/2 ', '', '12', 4.7, 7, NULL, 'Ferretería', 1),
('97147', 'Bisagra Tuburlar Forjada 5/8 ', '', '12', 8.36, 11, NULL, 'Ferretería', 1),
('98007', 'Pica Hielo ', '', '5', 13, 23, NULL, 'Ferretería', 1),
('99101', 'Cinta Momia ', '', '2', 15, 20, NULL, 'Ferretería', 1),
('99102', 'Cinta De Aluminio ', '', '1', 73, 105, NULL, 'Ferretería', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta`
--

CREATE TABLE `producto_venta` (
  `ProductoidProducto` varchar(255) NOT NULL,
  `VentaidVenta` varchar(255) NOT NULL,
  `precioIndividual` float NOT NULL,
  `cantidad` int(10) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_venta`
--

INSERT INTO `producto_venta` (`ProductoidProducto`, `VentaidVenta`, `precioIndividual`, `cantidad`, `total`) VALUES
(' COCAT50-BI', '150124//16:41:553w3YMlhs1t', 1425, 1, 1425);

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
  `pass` varchar(10000) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidoP` varchar(255) DEFAULT NULL,
  `apellidoM` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `numeroUsuario` varchar(255) DEFAULT NULL,
  `tipoRegistro` varchar(255) DEFAULT NULL,
  `tipoUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `pass`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `numeroUsuario`, `tipoRegistro`, `tipoUsuario`) VALUES
('carlosandresmr7@gmail.com', '$2y$10$uDXpisqNLo8FYZGcrDdNzumwzFjbmOUXS/Y/VFIE5LdERybuoMoUy', 'Carlos Andrés ', 'Morales', 'Rosales', '2711682705', NULL, NULL, ''),
('carlosandresmr8@gmail.com', '$2y$10$SSa28FvOdM04xeK9pvN88OLVYOQ/mnnFWPPl/mzDxA3YwiAeZ3NKi', 'Carlos Andrés', 'Morales', 'Rosales', '2711182434', NULL, NULL, 'Personal'),
('gato@simecsa.com', '$2y$10$kp4daUXQ2hStISvfe2iTX.gpbkDwAH3wU6qAIBDwgW8b/xIiS6Hw6', 'Carlos Andrés', 'Morales', 'Rosales', '2711682706', NULL, NULL, 'Personal'),
('hola@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$RUk0Yi50Y3c5SnhuNEVYbw$ngIpAtfzBg2gcHadZCBvxw+V76rS2XzlnhV54qylbbM', 'Carlos Andrés', 'Morales', 'Rosales', '2711682702', NULL, NULL, 'Personal'),
('karenb@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$bVdWQkRvei8zYjhjS2hTTg$5siGG9Yny43HFwgQKljSA9Ap1zsY1ZOI7u+WZFpn+Gk', 'Carlos Andrés', 'Morales', 'Rosales', '2711682356', NULL, NULL, 'Personal'),
('micheldiaz081@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$RkN5Q3R5QXppMUIyVi5LSA$0RENaJz2JM+SP1LQYrX/ELlPlZp2Wh2ANO2RKuUxrKk', 'Lariza', 'Fuentes', 'Diaz', '2791090404', NULL, NULL, 'Personal');

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
  `Usuariocorreo` varchar(255) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `direccion` varchar(500) NOT NULL,
  `pago` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `total`, `fecha`, `Usuariocorreo`, `estado`, `direccion`, `pago`) VALUES
('150124//16:41:553w3YMlhs1t', 1425, '2024-01-15', 'micheldiaz081@gmail.com', 'Por confirmar', 'Entrega en sucursal', 'efectivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  ADD KEY `idProducto` (`idProducto`);

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
-- Indices de la tabla `datoscontacto`
--
ALTER TABLE `datoscontacto`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`Usuariocorreo`,`numeroExt`,`cp`,`colonia`) USING BTREE;

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
-- Filtros para la tabla `carrito_usuarios`
--
ALTER TABLE `carrito_usuarios`
  ADD CONSTRAINT `carrito_usuarios_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

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
