-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2022 a las 18:51:29
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(13, 15, '2022-09-07', '2022-11-10', 'Sin inconvenientes', 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `unidadMedida` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombreProducto`, `unidadMedida`) VALUES
(1, 'Pan', 'unidad'),
(2, 'Huevos', 'unidad'),
(7, 'Agua', 'mililitro'),
(8, 'Camarones', 'gramo'),
(9, 'Arroz', 'kilogramo'),
(10, 'Aceite', 'mililitro'),
(11, 'Papa criolla', 'kilogramo'),
(12, 'Vino', 'gramo'),
(13, 'Salchicha', 'unidad');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`idSalida`, `totalSalida`, `fechaSalida`, `idUsuario`, `idProducto`, `idEntrada`) VALUES
(4, 10, '2022-09-06', 3, 1, 1),
(5, 15, '2022-09-06', 3, 8, 9),
(6, 18, '2022-09-06', 2, 8, 7),
(7, 24, '2022-09-06', 2, 9, 8),
(8, 13, '2022-09-06', 3, 9, 8),
(9, 20, '2022-09-06', 3, 2, 6),
(10, 2, '2022-09-06', 2, 2, 6),
(11, 8, '2022-09-06', 3, 10, 10),
(12, 6, '2022-09-06', 2, 10, 10),
(13, 9, '2022-09-06', 3, 8, 9),
(22, 15, '2022-09-07', 4, 11, 12),
(23, 9, '2022-09-07', 5, 11, 12);

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
  `usertype` varchar(45) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombres`, `apellidos`, `email`, `password`, `username`, `usertype`) VALUES
(1, 'Gustavo', 'Paniza', 'panizagustavo@gmail.com', '123', 'gustavopaniza', 'admin'),
(2, 'Adolfo', 'Salas', 'adolfosalas@gmail.com', '123', 'adolfosalas', 'user'),
(3, 'Andres', 'Santamaria', 'andressantamaria@gmail.com', '123', 'andressantamaria', 'user'),
(4, 'Juan', 'Melendez', 'juanmelendez@gmail.com', '123', 'juanmelendez', 'user'),
(5, 'Jose', 'Alvarez', 'josealvarez@gmail.com', '123', 'josealvarez', 'user');

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
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`idSalida`),
  ADD KEY `idUsuario_idx` (`idUsuario`),
  ADD KEY `idProducto_idx` (`idProducto`),
  ADD KEY `idEntrada_idx` (`idEntrada`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `idEntrada` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `idSalida` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `idEntrada_` FOREIGN KEY (`idEntrada`) REFERENCES `entradas` (`idEntrada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idProducto_` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario_` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
