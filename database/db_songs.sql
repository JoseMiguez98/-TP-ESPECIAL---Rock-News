-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-11-2017 a las 03:21:00
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
  `id_genero` int(11) NOT NULL,
  `descripcion` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `nombre`, `anio`, `artista`, `id_genero`, `descripcion`) VALUES
(43, 'Wish you were here', 1975, 'Pink Floyd', 61, 'Wish You Were Here —en español: Ojalá estuvieras aquí— es el noveno álbum de estudio de la banda británica de rock Pink Floyd, lanzado en septiembre de 1975 e inspirado en el material que compusieron durante su gira europea de 1974 y que grabaron en los Abbey Road Studios de Londres. Su temática explora la ausencia, la industria musical y los problemas mentales del anterior miembro de la banda Syd Barrett. Las sesiones de grabación fueron arduas y complicadas, en parte por la idea de Roger Waters de dividir la canción \"Shine On You Crazy Diamond\" en dos, para después unir cada mitad con tres nuevas composiciones. \"Shine On\" es un tributo a Barrett, quien, irónicamente, se presentó en los estudios el 5 de junio mientras se grababa. A la banda le costó reconocerle debido a su sobrepeso y a su cambio de aspecto'),
(44, 'Último Bondi a Finisterre', 1998, 'Patricio Rey y sus Redonditos de', 62, 'Último bondi a Finisterre es el octavo álbum del grupo de rock argentino Patricio Rey y sus Redonditos de Ricota, lanzado en 1998. La grabación presenta un giro en el tradicional sonido del grupo, con canciones más melódicas, y mayor uso de las posibilidades que brinda el estudio y las computadoras en la confección de una canción de rock. Temas como Gualicho, Las increíbles andanzas del Capitán Buscapina en Cybersiberia, Pogo, Estas frito angelito y La pequeña novia del carioca se han convertido en clásicos de la banda.'),
(45, 'Asylum', 2010, 'DIsturbed', 63, 'Asylum es el quinto álbum de estudio de la banda estadounidense de heavy metal Disturbed. Tomando inspiración de otros aspectos de la vida del vocalista David Draiman, Asylum tiene la intención de tomar una nueva dirección en la carrera de la banda, en coherencia con anteriores álbumes de la banda. El álbum fue lanzado el 31 de agosto de 2010 en los Estados Unidos a través de Reprise Records. Un tour para promocionar el álbum, titulado Asylum Tour, comenzado a finales de agosto de 2010.'),
(46, 'The darkside of the moon', 1973, 'Pink Floyd', 61, 'The Dark Side of the Moon –en español: «El Lado oscuro de la Luna»– es un álbum conceptual, el octavo de estudio de la banda británica de rock progresivo Pink Floyd. Fue lanzado el 1 de marzo de 1973 en Estados Unidos y el 24 de marzo del mismo año en el Reino Unido.'),
(47, 'Paranoid', 1970, 'Black Sabbath', 63, 'Paranoid —en español: Paranoico— es el segundo álbum de la banda británica de heavy metal Black Sabbath. Originariamente su nombre iba a ser War Pigs, pero debido a presiones de la discográfica se cambió el nombre a Paranoid. Fue grabado y publicado en el año 1970, constituyendo el primer éxito de la banda, y hasta nuestros días es considerado un disco de culto. El disco llegó a ser número uno en el Reino Unido, y hoy en día sigue siendo el LP más vendido de Black Sabbath.'),
(48, 'Appetite for Destruction', 1987, 'Guns N\' Roses', 63, 'Appetite for Destruction —en español: Apetito por la destrucción— es el álbum debut de la banda estadounidense de hard rock Guns N\' Roses, fue publicado por la compañía discográfica Geffen Records el 21 de julio de 1987, tras su autoeditado Live ?!*@ Like a Suicide y es el álbum debut más vendido en toda la historia del Rock con más de 32 millones de copias vendidas en todo el mundo. En 2003 ocupó el puesto Nº 61 en la lista de Los 500 mejores álbumes de todos los tiempos elaborada por la revista Rolling Stone.'),
(49, 'Ok Computer', 1997, 'Radiohead', 62, 'OK Computer es el tercer álbum de estudio de la banda británica de rock alternativo Radiohead, lanzado el 21 de mayo de 1997 en Japón, el 16 de junio en Reino Unido y el 1 de julio en Estados Unidos. Fue grabado en la zona rural de Oxfordshire y Bath, durante 1996 y principios de 1997, junto al productor Nigel Godrich. Aunque en la mayoría de la música domina el sonido de guitarra, su extenso sonido y la amplia gama de influencias lo distinguen de muchas bandas populares de britpop y rock alternativo de la época, y sentó las bases para el trabajo posterior de Radiohead, más experimental. El grupo no considera a OK Computer un álbum conceptual; sin embargo, sus letras y el arte visual hacen hincapié en temas comunes, como el consumismo, la desconexión social, el estancamiento político, y el malestar posmoderno.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(61, 'Rock progresivo', 'Reino Unido!'),
(62, 'Rock alternativo', 'Reino Unido y EEUU'),
(63, 'Heavy metal', 'EEUU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `id_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `ruta`, `id_album`) VALUES
(1, 'images/albumImages/5a0cde9acf087album-43.jpg', 43),
(3, 'images/albumImages/5a0cde9b0bec1album-43.jpg', 43),
(4, 'images/albumImages/5a0cf0725751dalbum-44.jpg', 44),
(5, 'images/albumImages/5a0cf0729231dalbum-44.jpg', 44),
(6, 'images/albumImages/5a0cf13329356album-45.jpg', 45),
(7, 'images/albumImages/5a0cf133316afalbum-45.jpg', 45),
(8, 'images/albumImages/5a0cf13339ad2album-45.jpg', 45),
(9, 'images/albumImages/5a0cf27e277baalbum-46.jpg', 46),
(10, 'images/albumImages/5a0cf27e635b0album-46.jpg', 46),
(11, 'images/albumImages/5a0cf3791eeb3album-47.jpg', 47),
(12, 'images/albumImages/5a0cf37929d9dalbum-47.jpg', 47),
(13, 'images/albumImages/5a0cf3793a3e5album-47.jpg', 47),
(14, 'images/albumImages/5a0cf46743cddalbum-48.jpg', 48),
(15, 'images/albumImages/5a0cf4676cfc5album-48.jpg', 48),
(16, 'images/albumImages/5a0cf46777f6aalbum-48.jpg', 48),
(17, 'images/albumImages/5a0cf467a39aaalbum-48.jpg', 48),
(18, 'images/albumImages/5a0cf573bcc47album-49.jpg', 49),
(19, 'images/albumImages/5a0cf573cfe15album-49.jpg', 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `email`, `password`, `admin`) VALUES
(15, 'invitado', '', '$2y$10$oYkYmFyQeH0fbZmKj5xV2OeCzTu494lmcoWb5byfhu7BF6eoLzeKC', 0),
(23, 'JoseMiguez98', '', '$2y$10$KJMbK3efQMmkb7Rr7oOku.kiNPyfBRLaojYMQd6utOEAo47wJHYL.', 1);

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
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_album` (`id_album`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_album` (`id_album`);

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
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
