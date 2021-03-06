-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-12-2021 a las 20:48:51
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd205`
--
CREATE DATABASE IF NOT EXISTS `bd205` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd205`;

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

INSERT INTO `categoria` (`categoria`) VALUES
('accion'),
('comedia'),
('documental'),
('drama'),
('romance');

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

INSERT INTO `catfav` (`idContracte`, `categoria`) VALUES
(1, 'comedia'),
(1, 'drama'),
(2, 'romance');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contfav`
--

CREATE TABLE `contfav` (
  `idContracte` int(9) NOT NULL,
  `video` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contfav`
--

INSERT INTO `contfav` (`idContracte`, `video`) VALUES
(1, 'https://www.youtube.com/watch?v=e-pb72a5l80'),
(1, 'https://www.youtube.com/watch?v=KHkCxmGOi4c'),
(2, 'https://www.youtube.com/watch?v=e-pb72a5l80');

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

--
-- Volcado de datos para la tabla `contingut`
--

INSERT INTO `contingut` (`categoria`, `titol`, `video`, `dataIntroduit`) VALUES
('documental', 'Base de Datos 2 - Práctica 2', 'https://www.youtube.com/watch?v=2MIyBOz9KMw', '2021-12-22'),
('comedia', 'Nerver gonna give you up', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', '2021-11-21'),
('romance', 'historia de amor coreano', 'https://www.youtube.com/watch?v=e-pb72a5l80', '2021-12-20'),
('accion', 'Shape-Shifters [AMV] I\'m Dange', 'https://www.youtube.com/watch?v=KHkCxmGOi4c', '2021-12-21'),
('drama', 'Padre dona el corazon a su hij', 'https://www.youtube.com/watch?v=zAcK0r7ma1A', '2021-12-15');

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

INSERT INTO `contracte` (`idContracte`, `nomUsuari`, `tipusContracte`, `dataAlta`, `dataFinal`, `suscrit`) VALUES
(1, 'Alberto', 'mensual', '2021-12-15', '2022-01-14', 1),
(2, 'Carlos', 'trimestral', '2021-12-15', '2022-03-15', 1),
(3, 'Antoine', 'mensual', '2021-11-15', '2021-12-15', 0);

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

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idContracte`, `data`, `import`) VALUES
(1, 1, '2021-12-15 00:00:00', 15),
(2, 2, '2021-12-15 00:00:00', 40),
(3, 3, '2021-11-15 00:00:00', 15);

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

--
-- Volcado de datos para la tabla `missatge`
--

INSERT INTO `missatge` (`idMissatge`, `nomUsuari`, `video`, `missatge`, `vist`) VALUES
('1', 'Alberto', 'https://www.youtube.com/watch?v=KHkCxmGOi4c', 'Se ha añadido este video', 1),
('2', 'Alberto', 'https://www.youtube.com/watch?v=e-pb72a5l80', 'Se ha añadido este video', 0),
('3', 'Carlos', 'https://www.youtube.com/watch?v=zAcK0r7ma1A', 'Se ha añadido este video', 1),
('4', 'Antoine', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'Se ha añadido este video', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomanat`
--

CREATE TABLE `recomanat` (
  `tipusUsuari` char(30) NOT NULL,
  `video` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recomanat`
--

INSERT INTO `recomanat` (`tipusUsuari`, `video`) VALUES
('9-18', 'https://www.youtube.com/watch?v=e-pb72a5l80'),
('9-18', 'https://www.youtube.com/watch?v=KHkCxmGOi4c'),
('<9', 'https://www.youtube.com/watch?v=2MIyBOz9KMw'),
('<9', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('>18', 'https://www.youtube.com/watch?v=zAcK0r7ma1A');

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

INSERT INTO `tipus_contracte` (`tipusContracte`) VALUES
('mensual'),
('trimestral');

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

INSERT INTO `tipus_usuari` (`tipusUsuari`) VALUES
('9-18'),
('<9'),
('>18');

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

INSERT INTO `usuari` (`nomUsuari`, `tipusUsuari`, `contrasenya`, `nomiLlinatges`, `admin`) VALUES
('Alberto', '>18', 'alberto1', 'Cugat Martin', 0),
('Alejandro', '9-18', 'alejandro1', 'Medina Perello', 1),
('Antoine', '<9', 'antoine1', 'Griezmann', 0),
('Carlos', '<9', 'carlos1', 'Ecker Oliver', 0),
('Jaume', '>18', 'jaume1', 'Julia Vallespir', 1),
('Pau', '>18', 'Pau1', 'Capella Ballester', 0);

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
  ADD PRIMARY KEY (`idContracte`,`categoria`),
  ADD KEY `idContracte` (`idContracte`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `contfav`
--
ALTER TABLE `contfav`
  ADD PRIMARY KEY (`idContracte`,`video`),
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

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `elimiarMensajes` ON SCHEDULE EVERY 1 WEEK STARTS '2021-12-22 16:50:31' ON COMPLETION NOT PRESERVE ENABLE DO DELETE missatge FROM missatge INNER JOIN contingut WHERE missatge.video=contingut.video AND (DATEDIFF('2021-12-22',contingut.dataIntroduit) > 7)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
