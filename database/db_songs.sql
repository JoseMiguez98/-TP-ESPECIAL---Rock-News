-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-10-2017 a las 13:32:16
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_songs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `anio` int(11) NOT NULL,
  `artista` varchar(32) NOT NULL,
  `genero` varchar(32) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `descripcion` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `nombre`, `anio`, `artista`, `genero`, `id_genero`, `descripcion`) VALUES
(91, 'All hope is gone', 1989, 'Slipknot', 'Heavy Metal', 32, 'All Hope Is Gone es el cuarto álbum de estudio de la banda estadounidense de heavy metal Slipknot, publicado el 20 de agosto de 2008 por Roadrunner Records en dos formatos distintos: una edición estándar en CD y una especial digipak con tres pistas adicionales, un libro de 40 páginas y un DVD con un documental sobre la elaboración del álbum'),
(92, 'info test', 1011, 'sarasa', 'Rock', 30, 'info actualizada'),
(93, 'The darkside of the Moon', 1979, 'Pink Floyd', 'Rock progresivo', 48, 'Album de la famosa banda de rock psicodelico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `pais_origen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`, `pais_origen`) VALUES
(30, 'Rock', 'Argentina'),
(32, 'Heavy Metal', 'USA'),
(48, 'Rock progresivo', 'USA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `nombre_usuario` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `nombre_usuario`, `password`) VALUES
(1, 'Jose', 'Miguez', 'JoseMiguez98', '$2y$10$k5xGHKrMzClcm5vpMLE88ekFvB6xkyQHdg3xu/dJuls9RJIWZYDSq'),
(2, 'Invitado', 'Invitado', 'Invitado', '$2y$10$gXYjsUyjvR1k7KGcKq9sqew./cCIqeFtgHFJRF/2aOg3qtXReGH8q'),
(3, 'Walter', 'White', 'heisenberg', '$2y$10$NpwB3v3gzIJwFIQufh81DeOtJ4MglnHvMDC8hhcRehbXZHCwUWXZG'),
(4, 'Juan', 'Perez', 'Chabon', '$2y$10$WeVSTouXlCvcskPnIUgM0.EveoYYzNv3ZH33fd2T13i91gZfm6AFW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
