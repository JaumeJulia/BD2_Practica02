-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2021 a las 14:01:56
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd205`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catfav`
--

CREATE TABLE `catfav` (
  `idContracte` int(9) NOT NULL,
  `categoria` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catfav`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contfav`
--

CREATE TABLE `contfav` (
  `idContracte` int(9) NOT NULL,
  `video` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contingut`
--

CREATE TABLE `contingut` (
  `categoria` char(30) NOT NULL,
  `titol` char(30) NOT NULL,
  `video` char(250) NOT NULL,
  `dataIntroduit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contracte`
--

CREATE TABLE `contracte` (
  `idContracte` int(9) NOT NULL,
  `nomUsuari` char(30) NOT NULL,
  `tipusContracte` char(10) NOT NULL,
  `dataAlta` date NOT NULL,
  `dataFinal` date NOT NULL,
  `suscrit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contracte`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(9) NOT NULL,
  `idContracte` int(9) NOT NULL,
  `data` datetime NOT NULL,
  `import` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `missatge`
--

CREATE TABLE `missatge` (
  `idMissatge` char(9) NOT NULL,
  `nomUsuari` char(30) NOT NULL,
  `video` char(250) NOT NULL,
  `missatge` char(100) NOT NULL,
  `vist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomanat`
--

CREATE TABLE `recomanat` (
  `tipusUsuari` char(30) NOT NULL,
  `video` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_contracte`
--

CREATE TABLE `tipus_contracte` (
  `tipusContracte` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipus_contracte`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_usuari`
--

CREATE TABLE `tipus_usuari` (
  `tipusUsuari` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipus_usuari`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `nomUsuari` char(30) NOT NULL,
  `tipusUsuari` char(30) NOT NULL,
  `contrasenya` char(30) NOT NULL,
  `nomiLlinatges` char(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuari`
--



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria`);

--
-- Indices de la tabla `catfav`
--
ALTER TABLE `catfav`
  ADD KEY `idContracte` (`idContracte`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `contfav`
--
ALTER TABLE `contfav`
  ADD KEY `idContracte` (`idContracte`),
  ADD KEY `video` (`video`);

--
-- Indices de la tabla `contingut`
--
ALTER TABLE `contingut`
  ADD PRIMARY KEY (`video`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `contracte`
--
ALTER TABLE `contracte`
  ADD PRIMARY KEY (`idContracte`),
  ADD KEY `nomUsuari` (`nomUsuari`),
  ADD KEY `tipusContracte` (`tipusContracte`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idContracte` (`idContracte`);

--
-- Indices de la tabla `missatge`
--
ALTER TABLE `missatge`
  ADD PRIMARY KEY (`idMissatge`),
  ADD KEY `nomUsuari` (`nomUsuari`),
  ADD KEY `video` (`video`);

--
-- Indices de la tabla `recomanat`
--
ALTER TABLE `recomanat`
  ADD PRIMARY KEY (`tipusUsuari`,`video`);

--
-- Indices de la tabla `tipus_contracte`
--
ALTER TABLE `tipus_contracte`
  ADD PRIMARY KEY (`tipusContracte`);

--
-- Indices de la tabla `tipus_usuari`
--
ALTER TABLE `tipus_usuari`
  ADD PRIMARY KEY (`tipusUsuari`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`nomUsuari`),
  ADD KEY `tipusUsuari` (`tipusUsuari`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catfav`
--
ALTER TABLE `catfav`
  ADD CONSTRAINT `catfav_ibfk_1` FOREIGN KEY (`idContracte`) REFERENCES `contracte` (`idContracte`),
  ADD CONSTRAINT `catfav_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`categoria`);

--
-- Filtros para la tabla `contfav`
--
ALTER TABLE `contfav`
  ADD CONSTRAINT `contfav_ibfk_1` FOREIGN KEY (`idContracte`) REFERENCES `contracte` (`idContracte`),
  ADD CONSTRAINT `contfav_ibfk_2` FOREIGN KEY (`video`) REFERENCES `contingut` (`video`);

--
-- Filtros para la tabla `contingut`
--
ALTER TABLE `contingut`
  ADD CONSTRAINT `contingut_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`categoria`);

--
-- Filtros para la tabla `contracte`
--
ALTER TABLE `contracte`
  ADD CONSTRAINT `contracte_ibfk_1` FOREIGN KEY (`nomUsuari`) REFERENCES `usuari` (`nomUsuari`),
  ADD CONSTRAINT `contracte_ibfk_2` FOREIGN KEY (`tipusContracte`) REFERENCES `tipus_contracte` (`tipusContracte`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idContracte`) REFERENCES `contracte` (`idContracte`);

--
-- Filtros para la tabla `missatge`
--
ALTER TABLE `missatge`
  ADD CONSTRAINT `missatge_ibfk_1` FOREIGN KEY (`nomUsuari`) REFERENCES `usuari` (`nomUsuari`),
  ADD CONSTRAINT `missatge_ibfk_2` FOREIGN KEY (`video`) REFERENCES `contingut` (`video`);

--
-- Filtros para la tabla `recomanat`
--
ALTER TABLE `recomanat`
  ADD CONSTRAINT `recomanat_ibfk_1` FOREIGN KEY (`tipusUsuari`) REFERENCES `tipus_usuari` (`tipusUsuari`);

--
-- Filtros para la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD CONSTRAINT `usuari_ibfk_1` FOREIGN KEY (`tipusUsuari`) REFERENCES `tipus_usuari` (`tipusUsuari`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
