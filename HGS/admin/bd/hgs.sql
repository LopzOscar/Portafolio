-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2017 a las 05:34:45
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hgs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `matricula` int(11) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `comunidad` varchar(100) NOT NULL,
  `estatus` tinyint(2) NOT NULL,
  `idGeneracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `nombre`, `apellidoP`, `apellidoM`, `matricula`, `telefono`, `direccion`, `comunidad`, `estatus`, `idGeneracion`) VALUES
(10, 'ISABEL', 'GUZMAN', 'PEREZ', 17000, '4471000001', 'Lo mÃ¡s lejos', 'Menos de mas alla', 1, 1),
(11, 'MARIA', 'PAZ', 'PEREZ', 17000, '5552002154', 'Por allÃ¡ ', 'Venta de bravo', 1, 7),
(12, 'Agustina', 'Perez', 'Perez', 17003, '5560892143', 'Mexicalpan sd', 'Mexico', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idCalificacion` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idCalificacion`, `calificacion`, `idMateria`, `idAlumno`) VALUES
(12, 10, 20, 10),
(13, 9, 27, 10),
(15, 7, 29, 11),
(16, 8, 30, 12),
(17, 9, 23, 10),
(18, 6, 21, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`, `descripcion`) VALUES
(1, 'Deporte ', 'Noticias correspondientes a actividades de deporte deportivos'),
(2, 'Informaticas', 'Noticias de informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `estatus` tinyint(2) NOT NULL,
  `fechaPub` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `email`, `mensaje`, `estatus`, `fechaPub`) VALUES
(1, 'ju@lio', '   hola que hacen? ', 1, '2017-07-16'),
(2, 'Dona@norma', 'ya llegue   ', 1, '2017-07-30'),
(3, 'w@es.c', '  bubu 3', 1, '2017-08-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idContacto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoPat` varchar(100) NOT NULL,
  `apellidoMat` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mensaje` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `nombre`, `apellidoPat`, `apellidoMat`, `email`, `mensaje`) VALUES
(2, 'Pancho ', 'Prado', 'Perez', 'pan@chooosd', '  Que onda ese?     '),
(3, 'Juancho', 'Orozco', 'Misss', 'miss@cos', ' ei tu \r\n   '),
(11, 'VICTOR', 'MANUEL', 'lopez', 'vic@mafi', ' Buena tarde '),
(12, 'jose Luis', 'Killos', 'Lorods', 'oscar@david', 'hora tu ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalle` int(11) NOT NULL,
  `idAlumno` tinyint(4) NOT NULL,
  `idMateria` tinyint(4) NOT NULL,
  `calificacion` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `respuesta` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`idFaq`, `pregunta`, `respuesta`) VALUES
(3, 'Como le hago? ', 'Solo hazlo'),
(4, 'pero como ', 'pos asÃ­ '),
(5, 'Â¿DÃ³nde estÃ¡n ubicados ? ', 'A un costado de la caseta a contepec');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generacion`
--

CREATE TABLE `generacion` (
  `idGeneracion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generacion`
--

INSERT INTO `generacion` (`idGeneracion`, `nombre`, `idAlumno`) VALUES
(1, 'Hidalgo ', 1),
(7, 'Guerrero ', 0),
(8, 'Ocampo ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `nombre`, `descripcion`, `idAlumno`) VALUES
(15, 'De la informaciÃ³n al conocimiento', 'Acercamiento al espaÃ±ol ', 0),
(16, 'El lenguaje en relaciÃ³n con el hombre', 'IntroducciÃ³n al mundo del inglÃ©s', 0),
(17, 'Representaciones simbÃ³licas y algoritmos', 'IntroducciÃ³n al mundo matemÃ¡tico', 0),
(18, 'Ser social y sociedad ', 'Ciencias sociales 1 ', 0),
(19, 'Mi mundo en otra lengua', 'InglÃ©s 2', 0),
(20, 'TecnologÃ­a de la informaciÃ³n y comunicaciÃ³n', 'Acercamiento al universo tecnolÃ³gico', 0),
(21, 'Textos y Visiones del mundo', 'EspaÃ±ol 2', 0),
(22, 'MatemÃ¡ticas y representaciones del sistema natura', 'MatemÃ¡ticas 2 ', 0),
(23, 'Universo naltural', 'Historia Universal 1', 0),
(24, 'Sociedad mexicana contemporÃ¡nea ', 'Ciencias sociales 2', 0),
(25, 'Transformaciones en el mundo contemporÃ¡neo', 'Historia Universal 2', 0),
(26, 'Mi mundo en otra lengua 2', 'InglÃ©s 3', 0),
(27, 'ArgumentaciÃ³n', 'IntroducciÃ³n al mundo filosÃ³fico', 0),
(28, 'VariaciÃ³n en procesos sociales', 'Ciencias sociales 3', 0),
(29, 'CÃ¡lculo en fenÃ³menos naturales y procesos social', 'MatemÃ¡ticas 3', 0),
(30, 'Hacia un desarrollo sustentable ', 'EcologÃ­a 1', 0),
(31, 'EvoluciÃ³n y sus repercusiones sociales', 'Historia Universal 3', 0),
(32, 'EstadÃ­stica en fenÃ³menos naturales y procesos so', 'EstadÃ­stica ', 0),
(33, 'DinÃ¡mica en la naturaleza y el movimiento', 'FÃ­sica', 0),
(34, 'OptimizaciÃ³n en sistemas naturales naturales y so', 'FÃ­sica 2 ', 0),
(35, 'Impacto de la ciencia y la tecnologÃ­a ', 'Ciencias sociales, tecnologÃ­a e historia', 0),
(36, 'InformÃ¡tica', 'Acercamiento al universo computacional', 0),
(37, 'Turismo', 'Ecoturismo y conocimiento cultural ', 0),
(38, 'AdministraciÃ³n ', 'GestiÃ³n interna empresarial ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noti`
--

CREATE TABLE `noti` (
  `idNoticias` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `noticia` varchar(5000) NOT NULL,
  `fechaPub` date NOT NULL,
  `encabezado` varchar(100) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `noti`
--

INSERT INTO `noti` (`idNoticias`, `url`, `noticia`, `fechaPub`, `encabezado`, `idCategoria`) VALUES
(1, 'uploads/loc4.png', 'Construyamos el saber !! ', '2017-07-12', 'Cosntruyamos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticias` int(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `noticia` varchar(1000) NOT NULL,
  `fechaPub` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticias`, `url`, `nombre`, `noticia`, `fechaPub`) VALUES
(44, 'uploads/hgs4.jpg', 'Pozo', '  El DÃ­a de ayer se llevÃ³ a cabo la excavaciÃ³n del pozo para contar con el servicio del agua para la escuela. ', '2017-08-04'),
(45, 'uploads/hgs3.jpg', 'Clases', 'La semana pasada comenzamos con las clases de este nuevo ciclo. \r\nAnimate, ven y conocenos, Te esperamos.   ', '2017-08-04'),
(46, 'uploads/hgs2.jpg', 'Conferencia', 'La semana que comienza se llevarÃ¡ a cabo la platica de enseÃ±anza y capacitaciÃ³n para maestros.    ', '2017-08-04'),
(47, 'uploads/hgs5.jpg', 'Comenzamos', 'El dÃ­a de maÃ±ana comenzaremos con las clases, nuestra ubicaciÃ³n, es a un costado de la caseta de cobro de contepec.   ', '2016-04-05'),
(48, 'uploads/proy.jpg', 'Clases oficiales ', '  Comenzamos con clases oficiales el dÃ­a de...', '2017-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `privilegios` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `email`, `password`, `estatus`, `privilegios`) VALUES
(1, 'oscar', 'oscar@david', '12345', 1, 1),
(3, 'Maria Borja', 'mari@borja', '123', 1, 2),
(7, 'Oscar ', 'oscar@gmail.com', '123', 1, 2),
(8, 'Neli', 'mayra@neli', '123', 1, 2),
(10, 'NORMA ITZEL', 'nor@ma', '123', 1, 2),
(12, 'Christian Emmanuel ', 'christian@rigo', '123', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`),
  ADD KEY `idGeneracion` (`idGeneracion`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idCalificacion`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalle`);

--
-- Indices de la tabla `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFaq`);

--
-- Indices de la tabla `generacion`
--
ALTER TABLE `generacion`
  ADD PRIMARY KEY (`idGeneracion`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`idNoticias`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticias`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `generacion`
--
ALTER TABLE `generacion`
  MODIFY `idGeneracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `noti`
--
ALTER TABLE `noti`
  MODIFY `idNoticias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticias` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `Restriccion Generacion` FOREIGN KEY (`idGeneracion`) REFERENCES `generacion` (`idGeneracion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `idAlumno` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
