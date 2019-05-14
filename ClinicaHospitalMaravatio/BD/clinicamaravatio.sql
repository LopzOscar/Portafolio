-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2017 a las 02:15:34
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicamaravatio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citaprogramada`
--

CREATE TABLE `citaprogramada` (
  `idCitaProgramada` int(11) NOT NULL,
  `idPacienteInterno` int(11) NOT NULL,
  `fechaCita` date NOT NULL,
  `horaCita` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `areaAtencion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citaurgente`
--

CREATE TABLE `citaurgente` (
  `idCitaUrgente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fechaCita` date NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `fechaCompra` date NOT NULL,
  `folio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `idDoctor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`idDoctor`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `direccion`, `especialidad`, `cedula`) VALUES
(1, 'Horacio', 'Jimenez', 'Fernandez', '4421024567', 'Av. Madero #4321', 'Traumatologia', 'DocJimFer20181128'),
(2, 'Daniel', 'Perez', 'Prado', '443-215-99-93', 'Por allá', 'Carología', 'DPP-081217-RFD05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermero`
--

CREATE TABLE `enfermero` (
  `idEnfermero` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `turno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `idMedicamento` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacienteexterno`
--

CREATE TABLE `pacienteexterno` (
  `idPacienteExterno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `diagnostico` varchar(500) NOT NULL,
  `fechaVisita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacienteinterno`
--

CREATE TABLE `pacienteinterno` (
  `idPacienteInterno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `diagnostico` varchar(500) NOT NULL,
  `areaAtencion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citaprogramada`
--
ALTER TABLE `citaprogramada`
  ADD PRIMARY KEY (`idCitaProgramada`);

--
-- Indices de la tabla `citaurgente`
--
ALTER TABLE `citaurgente`
  ADD PRIMARY KEY (`idCitaUrgente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`idDoctor`);

--
-- Indices de la tabla `enfermero`
--
ALTER TABLE `enfermero`
  ADD PRIMARY KEY (`idEnfermero`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`idMedicamento`);

--
-- Indices de la tabla `pacienteexterno`
--
ALTER TABLE `pacienteexterno`
  ADD PRIMARY KEY (`idPacienteExterno`);

--
-- Indices de la tabla `pacienteinterno`
--
ALTER TABLE `pacienteinterno`
  ADD PRIMARY KEY (`idPacienteInterno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citaprogramada`
--
ALTER TABLE `citaprogramada`
  MODIFY `idCitaProgramada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `citaurgente`
--
ALTER TABLE `citaurgente`
  MODIFY `idCitaUrgente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `idDoctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `enfermero`
--
ALTER TABLE `enfermero`
  MODIFY `idEnfermero` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `idMedicamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pacienteexterno`
--
ALTER TABLE `pacienteexterno`
  MODIFY `idPacienteExterno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pacienteinterno`
--
ALTER TABLE `pacienteinterno`
  MODIFY `idPacienteInterno` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
