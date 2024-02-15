-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2024 a las 22:33:26
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
-- Base de datos: `troya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL,
  `nombrecategorias` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategorias`, `nombrecategorias`) VALUES
(1, 'Farolaa'),
(2, 'Prueba'),
(3, 'Chevrolet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `documentoCliente` varchar(20) NOT NULL,
  `idTipo_documento` int(11) NOT NULL,
  `nombreCliente` varchar(40) NOT NULL,
  `ApellidoCliente` varchar(45) NOT NULL,
  `direccionCliente` varchar(45) NOT NULL,
  `telefonoCliente` varchar(45) NOT NULL,
  `emailCliente` varchar(45) NOT NULL,
  `idsexo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`documentoCliente`, `idTipo_documento`, `nombreCliente`, `ApellidoCliente`, `direccionCliente`, `telefonoCliente`, `emailCliente`, `idsexo`) VALUES
('123456789', 3, 's', '222Lugo2a', 'CALLE 9 SUR #16-30', '3214856852', 'aleja@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `identradas` int(11) NOT NULL,
  `idproductos` int(11) NOT NULL,
  `fechaentradas` date NOT NULL,
  `horaentradas` time NOT NULL,
  `cantidadentradas` int(11) NOT NULL,
  `valorentradas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`identradas`, `idproductos`, `fechaentradas`, `horaentradas`, `cantidadentradas`, `valorentradas`) VALUES
(11, 12345, '2024-01-19', '11:13:10', 100, 100000),
(21, 12345, '2024-01-19', '11:47:43', 6, 6),
(54, 12345, '2024-01-19', '14:58:31', 9, 80),
(55, 98708, '2024-01-19', '15:19:19', 12, 1000),
(56, 98709, '2024-01-19', '15:26:54', 50, 5000000);

--
-- Disparadores `entradas`
--
DELIMITER $$
CREATE TRIGGER `stock_1` AFTER INSERT ON `entradas` FOR EACH ROW BEGIN

DECLARE idp INT DEFAULT 0;
DECLARE entrad INT DEFAULT 0;
SET idp =  new.idproductos;
SET entrad = new.cantidadentradas;
UPDATE producto SET  producto.stockproducto=producto.stockproducto + entrad WHERE producto.idproducto=idp;




END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `documentoCliente` varchar(20) NOT NULL,
  `fechapedidos` date NOT NULL,
  `horapedidos` time NOT NULL,
  `valorpedido` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedidos`, `documentoCliente`, `fechapedidos`, `horapedidos`, `valorpedido`) VALUES
(123, '123456789', '2023-09-11', '21:08:53', 500000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombreproducto` varchar(45) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `salidaproducto` int(11) NOT NULL,
  `entradaproducto` int(11) NOT NULL,
  `stockproducto` int(11) NOT NULL,
  `valorproducto` float(10,2) NOT NULL,
  `IVAproducto` float(2,2) NOT NULL,
  `documentoproveedor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombreproducto`, `idcategoria`, `salidaproducto`, `entradaproducto`, `stockproducto`, `valorproducto`, `IVAproducto`, `documentoproveedor`) VALUES
(12345, 'RENAULT LOGAN 19/21 RH', 1, 28, 571, 543, 12300.00, 0.19, '12345'),
(98708, 'Nissan Skyline', 2, 0, 12, 12, 987.00, 0.19, '7689'),
(98709, 'Camaro ZL1', 3, 90, 50, -40, 1000000.00, 0.19, '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `documentoProveedor` varchar(20) NOT NULL,
  `idtipo_documento` int(11) NOT NULL,
  `nombreProveedor` varchar(40) NOT NULL,
  `telefonoProveedor` varchar(40) NOT NULL,
  `direccionProveedor` varchar(40) NOT NULL,
  `correoProveedor` varchar(40) NOT NULL,
  `catalogoProveedor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`documentoProveedor`, `idtipo_documento`, `nombreProveedor`, `telefonoProveedor`, `direccionProveedor`, `correoProveedor`, `catalogoProveedor`) VALUES
('12345', 5, 'Autopartes S.A', '3214856852', 'CALLE 9 SUR #16-30', 'AUTOPARTES@gmailcom', ''),
('7689', 4, 'S.A.S', '778', 'bnm', 'h@h', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `idsalidas` int(11) NOT NULL,
  `idproductos` int(11) NOT NULL,
  `numeroventa` varchar(45) NOT NULL,
  `fechasalidas` date NOT NULL,
  `horsalidas` time NOT NULL,
  `cantidadsalidas` int(11) NOT NULL,
  `valorsalidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`idsalidas`, `idproductos`, `numeroventa`, `fechasalidas`, `horsalidas`, `cantidadsalidas`, `valorsalidas`) VALUES
(25, 98708, '1', '2024-01-19', '11:13:37', 10, 1000),
(26, 12345, '1', '2024-01-19', '11:32:04', 9, 9),
(27, 12345, '123', '2024-01-19', '14:37:48', 9, 9),
(28, 98709, '1', '2024-01-19', '16:17:46', 10, 10),
(29, 98709, '1', '2024-01-19', '16:21:46', 80, 10);

--
-- Disparadores `salidas`
--
DELIMITER $$
CREATE TRIGGER `stock_2` AFTER INSERT ON `salidas` FOR EACH ROW BEGIN

DECLARE idp INT DEFAULT 0;
DECLARE salida INT DEFAULT 0;
SET idp =  new.idproductos;
SET salida = new.cantidadsalidas;
UPDATE producto SET  producto.stockproducto = producto.stockproducto - salida WHERE producto.idproducto=idp;




END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `idsexo` int(11) NOT NULL,
  `nombresexol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`idsexo`, `nombresexol`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `idtipo_documento` int(11) NOT NULL,
  `nombredocumento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`idtipo_documento`, `nombredocumento`) VALUES
(1, 'TI'),
(2, 'CC'),
(3, 'CE'),
(4, 'RUT'),
(5, 'NIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `clave` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cargo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `clave`, `cargo`) VALUES
(9, 'admin', 'troya@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1'),
(10, 'user', 'troya1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `idvendedores` int(11) NOT NULL,
  `nombrevendedores` varchar(45) NOT NULL,
  `Apellidovendedores` varchar(45) NOT NULL,
  `telefonovendedores` varchar(45) NOT NULL,
  `documentovendedores` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`idvendedores`, `nombrevendedores`, `Apellidovendedores`, `telefonovendedores`, `documentovendedores`) VALUES
(5, 'pepitaaaaaaaaaaaaaaa', 'perez', '1234', '12345'),
(123, 'pan', 'bohorquez', '13456789', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `numeroventas` varchar(20) NOT NULL,
  `idpedidos` int(11) NOT NULL,
  `fechaventas` date NOT NULL,
  `horaventas` time NOT NULL,
  `subtotalventas` float(12,2) NOT NULL,
  `ivaventas` float(12,2) NOT NULL,
  `totalventas` float(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`numeroventas`, `idpedidos`, `fechaventas`, `horaventas`, `subtotalventas`, `ivaventas`, `totalventas`) VALUES
('1', 123, '2024-01-19', '10:53:20', 9000.00, 19.00, 10710.00),
('123', 123, '2023-09-12', '13:01:23', 250000.00, 19.00, 297500.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategorias`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`documentoCliente`),
  ADD KEY `idTipo_documento_idx` (`idTipo_documento`),
  ADD KEY `idsexo_idx` (`idsexo`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`identradas`),
  ADD KEY `idproducto_idx` (`idproductos`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedidos`),
  ADD KEY `documentoCliente_idx` (`documentoCliente`);

--
-- Indices de la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  ADD KEY `idpedidos_idx` (`idpedidos`),
  ADD KEY `idproductos_idx3` (`idproductos`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idcategoria_idx` (`idcategoria`),
  ADD KEY `documentoproveedor_idx2` (`documentoproveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`documentoProveedor`),
  ADD KEY `idTipo_documento_idx2` (`idtipo_documento`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`idsalidas`),
  ADD KEY `idproducto_idx2` (`idproductos`),
  ADD KEY `numeroventa_idx` (`numeroventa`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`idsexo`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`idtipo_documento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`idvendedores`),
  ADD KEY `dicumentovendedores_idx` (`documentovendedores`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`numeroventas`),
  ADD KEY `idpedidos_idx2` (`idpedidos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `identradas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98710;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `idsalidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `idsexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `idtipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `idTipo_documento` FOREIGN KEY (`idTipo_documento`) REFERENCES `tipo_documento` (`idtipo_documento`),
  ADD CONSTRAINT `idsexo` FOREIGN KEY (`idsexo`) REFERENCES `sexo` (`idsexo`);

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `idproducto` FOREIGN KEY (`idproductos`) REFERENCES `producto` (`idproducto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `documentoCliente` FOREIGN KEY (`documentoCliente`) REFERENCES `cliente` (`documentoCliente`);

--
-- Filtros para la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  ADD CONSTRAINT `idpedidos` FOREIGN KEY (`idpedidos`) REFERENCES `pedidos` (`idpedidos`),
  ADD CONSTRAINT `idproductos3` FOREIGN KEY (`idproductos`) REFERENCES `producto` (`idproducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `documentoproveedor2` FOREIGN KEY (`documentoproveedor`) REFERENCES `proveedor` (`documentoProveedor`),
  ADD CONSTRAINT `idcategoria` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategorias`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `idTipo_documento2` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_documento` (`idtipo_documento`);

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `idproducto2` FOREIGN KEY (`idproductos`) REFERENCES `producto` (`idproducto`),
  ADD CONSTRAINT `numeroventa` FOREIGN KEY (`numeroventa`) REFERENCES `ventas` (`numeroventas`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idpedidos2` FOREIGN KEY (`idpedidos`) REFERENCES `pedidos` (`idpedidos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
