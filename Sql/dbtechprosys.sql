-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2019 a las 16:36:33
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtechprosys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_product`
--

CREATE TABLE `model_product` (
  `cod_model` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `model_product`
--

INSERT INTO `model_product` (`cod_model`, `nombre`, `usuario`) VALUES
(1, 'Motorola', 1),
(2, 'Iphone', 1),
(3, 'Huawei', 1),
(4, 'Samsung', 1),
(5, 'LG', 1),
(6, 'Nokia', 1),
(7, 'Sony', 1),
(8, 'Alcatel', 1),
(9, 'BlackBerry', 1),
(10, 'HTC', 1),
(11, 'Sony Ericsson', 1),
(12, 'ZTE', 1),
(13, 'Lenovo', 1),
(14, 'BLU', 1),
(15, 'Ipad', 1),
(16, 'Nvidia', 1),
(17, 'HP', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `modelo` int(11) NOT NULL,
  `Descripcion` varchar(300) CHARACTER SET latin1 NOT NULL,
  `precio` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `tipo`, `modelo`, `Descripcion`, `precio`, `cod_usu`) VALUES
(1, 1, 9, 'MotoG5s', 520000, 1),
(2, 4, 9, 'Color Rojo 1m', 20000, 1),
(3, 5, 4, 'Faltan detalles', 800000, 6),
(4, 1, 1, 'MotoG5s', 520000, 1),
(5, 6, 17, 'Mil Colores', 320000, 6),
(6, 8, 6, 'Negro ', 35000, 1),
(7, 7, 9, 'sumadreee', 5200000, 1),
(8, 4, 14, 'adada', 3242352, 1),
(9, 7, 14, 'wdsasafc', 435363, 1),
(10, 1, 15, 'aDSAdsaD', 345, 1),
(11, 6, 9, 'DSFDSGDSG', 5453443, 1),
(12, 5, 13, 'sdsfsafsaf', 2147483647, 1),
(13, 2, 13, 'adasdasd', 2345346, 1),
(14, 3, 5, 'Full HD 42\"', 1200000, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `cod_typeproduct` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`cod_typeproduct`, `Nombre`, `usuario`) VALUES
(1, 'Celular', 1),
(2, 'Tablet', 1),
(3, 'Televisor', 1),
(4, 'Audifonos', 1),
(5, 'Portatil', 1),
(6, 'Impresora', 1),
(7, 'Computador', 1),
(8, 'Enclouser', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usu` int(11) NOT NULL,
  `nom_usu` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ape_usu` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` int(1) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usu`, `nom_usu`, `ape_usu`, `usuario`, `pass`, `rol`, `estado`) VALUES
(1, 'Erick Jr', 'Bernett', 'AdmonST', '25f9e794323b453885f5181f1b624d0b', 1, 1),
(2, 'Lilibeth', 'Señas', 'Tontuela27', 'f13cf22040eec3a447825b4076e33838', 1, 0),
(3, 'Miguel', 'Bernett', 'Ma71997', '25f9e794323b453885f5181f1b624d0b', 1, 0),
(4, 'Tania', 'Brieva', 'TBrieva19', '45fe537ce08376cff9dd0629ab0bdccd', 2, 0),
(5, 'Camila', 'Bernett', 'CBernett16', 'faf373609086ef6093256e60c0455ebf', 2, 0),
(6, 'Carlos ', 'Brieva', 'CBrieva25', '25f9e794323b453885f5181f1b624d0b', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `model_product`
--
ALTER TABLE `model_product`
  ADD PRIMARY KEY (`cod_model`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`cod_typeproduct`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `model_product`
--
ALTER TABLE `model_product`
  MODIFY `cod_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `cod_typeproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
