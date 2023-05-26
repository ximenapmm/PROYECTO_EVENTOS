-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2023 a las 03:53:23
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idadm` int(15) NOT NULL,
  `nombreadm` varchar(50) NOT NULL,
  `passadm` varchar(10) NOT NULL,
  `correoadm` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idadm`, `nombreadm`, `passadm`, `correoadm`) VALUES
(2, 'ximena', '1', 'ximena@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalum` int(15) NOT NULL,
  `nombrealum` varchar(100) NOT NULL,
  `fechaalum` date NOT NULL,
  `correoalum` varchar(50) NOT NULL,
  `passalum` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalum`, `nombrealum`, `fechaalum`, `correoalum`, `passalum`) VALUES
(3, 'Paola Medina', '2023-05-18', 'paola@gmail.com', '1234'),
(4, 'Laura Aimee Rodriguez Gonzalez', '2001-10-03', 'lauraaimeeglz@gmail.com', 'hola123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peventos`
--

CREATE TABLE `peventos` (
  `idev` int(15) NOT NULL,
  `nombreev` varchar(50) NOT NULL,
  `fechaev` date NOT NULL,
  `lugar` varchar(70) NOT NULL,
  `descripcionev` varchar(500) NOT NULL,
  `horaev` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peventos`
--

INSERT INTO `peventos` (`idev`, `nombreev`, `fechaev`, `lugar`, `descripcionev`, `horaev`) VALUES
(1, 'Dia del estudiante', '2023-05-23', 'Universidad Intercultural de San Luis Potosi, campus Valles', 'Se llevara a cabo una reunion en cada grupo con el fin de festejar a los alumnos. Para esto se deberan poner de acuerdo con el tutor responsable.', '13:56:00'),
(6, 'Xantolo', '2023-11-01', 'Universidad Intercultural', 'Se llevará acabo la realización del arco de día de muertos y posteriormente las comparsas. ', '09:30:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idadm`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalum`);

--
-- Indices de la tabla `peventos`
--
ALTER TABLE `peventos`
  ADD PRIMARY KEY (`idev`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idadm` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idalum` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `peventos`
--
ALTER TABLE `peventos`
  MODIFY `idev` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
