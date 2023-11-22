-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 07:41:08
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
-- Base de datos: `bd_volaris`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_avion`
--

CREATE TABLE `tbl_avion` (
  `idAvion` int(50) NOT NULL,
  `idVuelo` int(50) NOT NULL,
  `CapacidadCombus` varchar(50) NOT NULL,
  `emisionCarbono` varchar(50) NOT NULL,
  `nAsientos` int(50) NOT NULL,
  `AeropuertoActual` varchar(100) NOT NULL,
  `Velocidad` varchar(50) NOT NULL,
  `Pantallas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_avion`
--

INSERT INTO `tbl_avion` (`idAvion`, `idVuelo`, `CapacidadCombus`, `emisionCarbono`, `nAsientos`, `AeropuertoActual`, `Velocidad`, `Pantallas`) VALUES
(1, 1, '323,200 litros', '112 kg', 295, 'Aeropuerto Internacional de Monterrey.', '400km/h', 0),
(2, 2, '300,560 litros', '112 kg', 900, 'aeropuerto durango', '460km/h', 0),
(4, 12, '560,000 litros', '120kg', 312, 'Aeropuerto intenacional de Bolivia', '500kmh', 0),
(5, 15, '270,000 litros', '96 kg', 280, 'Aeropuerto intenacional de Venezuela', '320km/h', 1),
(6, 13, '570,000 litros', '280kg', 112, 'Aeropuerto internacional de Tokyo', '1000km/h', 0),
(7, 13, '10,000 litros', '43kg', 58, 'Aeropuerto internacional de Tokyo', '780km/h', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paquete`
--

CREATE TABLE `tbl_paquete` (
  `idPaquete` int(50) NOT NULL,
  `duracion` varchar(100) NOT NULL,
  `nombreHotel` varchar(150) NOT NULL,
  `idCliente` int(50) NOT NULL,
  `idVuelo` int(50) NOT NULL,
  `Precio` int(50) NOT NULL,
  `nHabitaciones` int(50) NOT NULL,
  `nViajeros` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_paquete`
--

INSERT INTO `tbl_paquete` (`idPaquete`, `duracion`, `nombreHotel`, `idCliente`, `idVuelo`, `Precio`, `nHabitaciones`, `nViajeros`) VALUES
(1, '6 days', 'Mayan palace', 512, 1, 15000, 3, 20),
(3, '6 days', 'Emporium', 512, 5, 20000, 2, 5),
(4, '10 days', 'Playa Victoria', 585, 12, 50000, 2, 10),
(5, '31 days', 'Playa Victoria', 920, 13, 100000, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vuelo`
--

CREATE TABLE `tbl_vuelo` (
  `idVuelo` int(50) NOT NULL,
  `idPaquete` int(50) NOT NULL,
  `diaSalida` date NOT NULL,
  `diaRegreso` date NOT NULL,
  `idAvion` int(50) NOT NULL,
  `Asiento` varchar(10) NOT NULL,
  `Costo` int(50) NOT NULL,
  `Destino` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_vuelo`
--

INSERT INTO `tbl_vuelo` (`idVuelo`, `idPaquete`, `diaSalida`, `diaRegreso`, `idAvion`, `Asiento`, `Costo`, `Destino`) VALUES
(1, 1, '2023-11-15', '2023-11-21', 1, '5F', 3750, 'Mazatlan,Sinaloa,Mexico'),
(12, 1, '2023-11-15', '2023-11-21', 1, '9C', 3750, 'Theovania,Underfell'),
(13, 3, '2023-11-09', '2023-11-15', 6, '6F', 5000, 'Metrocidad'),
(15, 1, '2023-11-11', '2023-11-17', 3, '6F', 3750, 'Torreon,Coahuila'),
(16, 4, '2023-11-17', '2023-11-27', 2, '6B', 12500, 'Mazatlan,Sinaloa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_avion`
--
ALTER TABLE `tbl_avion`
  ADD PRIMARY KEY (`idAvion`);

--
-- Indices de la tabla `tbl_paquete`
--
ALTER TABLE `tbl_paquete`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `tbl_vuelo`
--
ALTER TABLE `tbl_vuelo`
  ADD PRIMARY KEY (`idVuelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_avion`
--
ALTER TABLE `tbl_avion`
  MODIFY `idAvion` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_paquete`
--
ALTER TABLE `tbl_paquete`
  MODIFY `idPaquete` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_vuelo`
--
ALTER TABLE `tbl_vuelo`
  MODIFY `idVuelo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
