-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2022 a las 23:11:37
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.0.19

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `module`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `idEntrada` int NOT NULL,
  `totalEntrada` int NOT NULL,
  `fechaEntrada` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `suceso` varchar(45) DEFAULT 'Sin inconvenientes',
  `idProducto` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`idEntrada`, `totalEntrada`, `fechaEntrada`, `fechaVencimiento`, `suceso`, `idProducto`, `idUsuario`) VALUES
(1, 20, '2022-08-30', '2022-09-30', 'Sin inconvenientes', 1, 2),
(6, 30, '2022-09-01', '2022-11-18', 'Sin inconvenientes', 2, 2),
(7, 25, '2022-09-01', '2022-09-08', 'Sin inconvenientes', 8, 3),
(8, 35, '2022-09-01', '2023-01-28', 'Sin inconvenientes', 9, 3),
(9, 15, '2022-09-02', '2022-09-23', 'Sin inconvenientes', 8, 2),
(10, 20, '2022-09-03', '2022-11-26', 'Sin inconvenientes', 10, 2),
(11, 5, '2022-09-06', '2022-09-06', 'Sin inconvenientes', 1, 2),
(12, 50, '2022-09-07', '2022-12-10', 'Sin inconvenientes', 11, 4),
(13, 8, '2022-09-07', '2022-11-10', 'Sin inconvenientes', 12, 4),
(14, 11, '2022-09-20', '2022-10-21', 'Sin inconvenientes', 14, 3),
(15, 49, '2022-08-28', '2022-12-16', 'Sin inconvenientes', 16, 5),
(16, 22, '2022-09-22', '2022-10-20', 'Sin inconvenientes', 16, 5),
(17, 26, '2022-09-23', '2022-11-10', 'Sin inconvenientes', 16, 5),
(18, 23, '2022-09-29', '2022-11-04', 'Sin inconvenientes', 18, 6),
(19, 12, '2022-09-29', '2022-10-08', 'Sin inconvenientes', 18, 6);

--
-- Disparadores `entradas`
--
DELIMITER $$
CREATE TRIGGER `insert_inventario` AFTER INSERT ON `entradas` FOR EACH ROW BEGIN
INSERT INTO inventario (`totalActual`, `idProducto`, `idEntrada`) VALUES (NEW.totalEntrada, NEW.idProducto, NEW.idEntrada);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_inventario` AFTER UPDATE ON `entradas` FOR EACH ROW BEGIN
    IF EXISTS (SELECT * FROM salidas s WHERE NEW.idEntrada = 		s.idEntrada) THEN BEGIN
      UPDATE inventario i 
      INNER JOIN entradas e ON e.idEntrada = i.idEntrada
      INNER JOIN salidas s ON s.idEntrada = e.idEntrada
      SET totalActual = NEW.totalEntrada - s.totalSalida
	WHERE e.idEntrada = NEW.idEntrada;
    END; END IF;
    IF !EXISTS(SELECT * FROM salidas s WHERE NEW.idEntrada = 		s.idEntrada) THEN BEGIN
      UPDATE inventario i 
      INNER JOIN entradas e ON e.idEntrada = i.idEntrada
      SET i.totalActual = NEW.totalEntrada 		
      WHERE e.idEntrada = NEW.idEntrada;
    END; END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int NOT NULL,
  `totalActual` int DEFAULT NULL,
  `idProducto` int NOT NULL,
  `idEntrada` int NOT NULL,
  `idSalida` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idInventario`, `totalActual`, `idProducto`, `idEntrada`, `idSalida`) VALUES
(14, 10, 1, 1, 4),
(15, 8, 2, 6, 10),
(16, 7, 8, 7, 6),
(17, 4, 9, 8, 8),
(18, 2, 8, 9, 13),
(19, 6, 10, 10, 12),
(20, 5, 1, 11, NULL),
(21, 26, 11, 12, 23),
(22, 8, 12, 13, NULL),
(23, 9, 14, 14, 24),
(24, 26, 16, 15, 27),
(25, 5, 16, 16, 26),
(26, 26, 16, 17, NULL),
(27, 23, 18, 18, NULL),
(28, 10, 18, 19, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `unidadMedida` varchar(15) NOT NULL,
  `idSede` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombreProducto`, `unidadMedida`, `idSede`) VALUES
(1, 'Pan', 'unidad', 1),
(2, 'Huevos', 'unidad', 1),
(7, 'Agua', 'mililitro', 1),
(8, 'Camarones', 'gramo', 1),
(9, 'Arroz', 'kilogramo', 1),
(10, 'Aceite', 'mililitro', 1),
(11, 'Papa criolla', 'kilogramo', 1),
(12, 'Vino', 'mililitro', 1),
(13, 'Salchicha', 'unidad', 1),
(14, 'Champiñones', 'mililitro', 1),
(16, 'Prueba producto', 'litro', 1),
(18, 'Masa para pizza', 'kilogramo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `idRestaurante` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `nit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`idRestaurante`, `nombre`, `nit`) VALUES
(1, 'Koi Koi', 998984655);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `idSalida` int NOT NULL,
  `totalSalida` int NOT NULL,
  `fechaSalida` date NOT NULL,
  `idUsuario` int NOT NULL,
  `idProducto` int NOT NULL,
  `idEntrada` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`idSalida`, `totalSalida`, `fechaSalida`, `idUsuario`, `idProducto`, `idEntrada`) VALUES
(4, 10, '2022-09-06', 3, 1, 1),
(5, 7, '2022-09-06', 3, 8, 9),
(6, 18, '2022-09-06', 2, 8, 7),
(7, 18, '2022-09-06', 2, 9, 8),
(8, 13, '2022-09-06', 3, 9, 8),
(9, 20, '2022-09-06', 3, 2, 6),
(10, 2, '2022-09-06', 2, 2, 6),
(11, 8, '2022-09-06', 3, 10, 10),
(12, 6, '2022-09-06', 2, 10, 10),
(13, 6, '2022-09-06', 3, 8, 9),
(22, 15, '2022-09-07', 4, 11, 12),
(23, 9, '2022-09-07', 5, 11, 12),
(24, 2, '2022-09-20', 3, 14, 14),
(25, 17, '2022-09-22', 5, 16, 16),
(26, 7, '2022-09-22', 5, 16, 16),
(27, 23, '2022-09-24', 5, 16, 15),
(28, 2, '2022-09-30', 6, 18, 19);

--
-- Disparadores `salidas`
--
DELIMITER $$
CREATE TRIGGER `insert_inventario_2` AFTER INSERT ON `salidas` FOR EACH ROW BEGIN
UPDATE inventario SET totalActual = totalActual - NEW.totalSalida, idSalida = NEW.idSalida 
WHERE idEntrada = NEW.idEntrada;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_inventario2` AFTER UPDATE ON `salidas` FOR EACH ROW BEGIN
UPDATE inventario i
INNER JOIN entradas e ON e.idEntrada = i.idEntrada
SET i.totalActual = e.totalEntrada - NEW.totalSalida
WHERE i.idEntrada = NEW.idEntrada;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idSede` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `idRestaurante` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idSede`, `nombre`, `direccion`, `idRestaurante`) VALUES
(1, 'Manga', 'Cra 5 calle 6B', 1),
(2, 'Ramblas', 'Ave 6 calle 9', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `usertype` varchar(45) NOT NULL DEFAULT 'user',
  `idSede` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombres`, `apellidos`, `email`, `password`, `username`, `usertype`, `idSede`) VALUES
(1, 'Gustavo', 'Paniza', 'panizagustavo@gmail.com', '123', 'gustavopaniza', 'admin', NULL),
(2, 'Adolfo', 'Salas', 'adolfosalas@gmail.com', '123', 'adolfosalas', 'user', 1),
(3, 'Andres', 'Santamaria', 'andressantamaria@gmail.com', '123', 'andressantamaria', 'user', 1),
(4, 'Juan', 'Melendez', 'juanmelendez@gmail.com', '123', 'juanmelendez', 'user', 1),
(5, 'Jose', 'Alvarez', 'josealvarez@gmail.com', '123', 'josealvarez', 'user', 1),
(6, 'Gabriel', 'Lopez', 'gabriellopez@gmail.com', '123', 'gabriellopez', 'user', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`idEntrada`),
  ADD KEY `idUsuario_idx` (`idUsuario`),
  ADD KEY `idProducto_idx` (`idProducto`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `idProducto_idx` (`idProducto`) INVISIBLE,
  ADD KEY `idEntrada_idx` (`idEntrada`) INVISIBLE,
  ADD KEY `idSalida_idx` (`idSalida`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idSede_idx` (`idSede`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`idRestaurante`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`idSalida`),
  ADD KEY `idUsuario_idx` (`idUsuario`),
  ADD KEY `idProducto_idx` (`idProducto`),
  ADD KEY `idEntrada_idx` (`idEntrada`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`idSede`),
  ADD KEY `idRestaurante_idx` (`idRestaurante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idSede_idx` (`idSede`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `idEntrada` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `idRestaurante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `idSalida` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `idSede` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `idEntrada__` FOREIGN KEY (`idEntrada`) REFERENCES `entradas` (`idEntrada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idProducto__` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idSalida__` FOREIGN KEY (`idSalida`) REFERENCES `salidas` (`idSalida`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `idSede` FOREIGN KEY (`idSede`) REFERENCES `sede` (`idSede`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `idEntrada_` FOREIGN KEY (`idEntrada`) REFERENCES `entradas` (`idEntrada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idProducto_` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario_` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `idRestaurante` FOREIGN KEY (`idRestaurante`) REFERENCES `restaurante` (`idRestaurante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idSede_` FOREIGN KEY (`idSede`) REFERENCES `sede` (`idSede`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
