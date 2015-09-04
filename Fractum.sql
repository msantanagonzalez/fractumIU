-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2015 a las 00:23:33
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fractumdb`
--
CREATE DATABASE IF NOT EXISTS `fractumdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `fractumdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dociteracion`
--

DROP TABLE IF EXISTS `dociteracion`;
CREATE TABLE IF NOT EXISTS `dociteracion` (
  `idIncid` int(15) NOT NULL,
  `urlDocItr` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `nIteracion` int(15) NOT NULL,
  `nDocIter` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idIncid`,`nIteracion`,`nDocIter`),
  KEY `Fk_DOCITERACION_ITERACION` (`nIteracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docmaquina`
--

DROP TABLE IF EXISTS `docmaquina`;
CREATE TABLE IF NOT EXISTS `docmaquina` (
  `idMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `urlDocMaq` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `nDocMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idMaq`,`nDocMaq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `cifEmpr` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `nomEmpr` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `telefEmpr` int(13) NOT NULL,
  `mailEmpr` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`cifEmpr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`cifEmpr`, `nomEmpr`, `telefEmpr`, `mailEmpr`) VALUES
('DEFAULT', 'DEFAULT', 600000000, 'default@default.com'),
('E0001', 'Empresa1', 600000000, 'empresa1@empresa.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE IF NOT EXISTS `incidencia` (
  `idIncid` int(15) NOT NULL AUTO_INCREMENT,
  `fAper` date NOT NULL,
  `fCier` date NOT NULL,
  `dniResponsable` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `dniApertura` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `idMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `estadoIncid` enum('Abierta','En Curso','Cerrada','Programada','Pendiente Derivar','Derivada','Pendiente Cierre','Cerrada') COLLATE latin1_spanish_ci NOT NULL,
  `derivada` tinyint(1) NOT NULL,
  `descripIncid` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `cifEmpr` varchar(9) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idIncid`),
  KEY `Fk_INCIDENCIA_MAQUINA` (`idMaq`),
  KEY `Fk_INCIDENCIA_EMPRESA` (`cifEmpr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iteracion`
--

DROP TABLE IF EXISTS `iteracion`;
CREATE TABLE IF NOT EXISTS `iteracion` (
  `idIncid` int(15) NOT NULL,
  `nIteracion` int(15) NOT NULL AUTO_INCREMENT,
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `fechaIter` date NOT NULL,
  `hInicio` time NOT NULL,
  `hFin` time NOT NULL,
  `estadoItera` tinyint(1) NOT NULL,
  `descripIter` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `costeIter` float NOT NULL,
  PRIMARY KEY (`nIteracion`,`idIncid`),
  KEY `Fk_ITERACION` (`idIncid`),
  KEY `Fk_ITERACION_USUARIO` (`dniUsu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefe`
--

DROP TABLE IF EXISTS `jefe`;
CREATE TABLE IF NOT EXISTS `jefe` (
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `telefJefe` int(13) NOT NULL,
  `mailJefe` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`dniUsu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `jefe`
--

INSERT INTO `jefe` (`dniUsu`, `telefJefe`, `mailJefe`) VALUES
('12345678E', 654789321, 'marcoSantana@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

DROP TABLE IF EXISTS `maquina`;
CREATE TABLE IF NOT EXISTS `maquina` (
  `idMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `nSerie` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `nomMaq` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `descripMaq` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `costeMaq` float NOT NULL,
  PRIMARY KEY (`idMaq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`idMaq`, `nSerie`, `nomMaq`, `descripMaq`, `costeMaq`) VALUES
('IdMaquina1', '0000000001', 'Maquina1', 'Descripcion de maquina1\r\n				', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opexterno`
--

DROP TABLE IF EXISTS `opexterno`;
CREATE TABLE IF NOT EXISTS `opexterno` (
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `cifEmpr` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`dniUsu`),
  KEY `Fk_OPEXTERNO_CIFEMPRESA` (`cifEmpr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `opexterno`
--

INSERT INTO `opexterno` (`dniUsu`, `cifEmpr`) VALUES
('12345678B', 'E0001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinterno`
--

DROP TABLE IF EXISTS `opinterno`;
CREATE TABLE IF NOT EXISTS `opinterno` (
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `telefOpeInt` int(13) NOT NULL,
  `mailOpeInt` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`dniUsu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `opinterno`
--

INSERT INTO `opinterno` (`dniUsu`, `telefOpeInt`, `mailOpeInt`) VALUES
('12345678A', 600000000, 'interno@interno.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza`
--

DROP TABLE IF EXISTS `realiza`;
CREATE TABLE IF NOT EXISTS `realiza` (
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `idServ` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `fechaRealizacion` date NOT NULL,
  PRIMARY KEY (`idServ`,`dniUsu`,`fechaRealizacion`),
  KEY `Fk_REALZA` (`dniUsu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE IF NOT EXISTS `servicio` (
  `idServ` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `cifEmpr` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `idMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `periodicidad` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fInicioSer` date NOT NULL,
  `fFinSer` date NOT NULL,
  `costeSer` float NOT NULL,
  `descripSer` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idServ`),
  KEY `Fk_SERVICIO` (`dniUsu`),
  KEY `Fk_SERVICIO_EMPRESA` (`cifEmpr`),
  KEY `Fk_SERVICIO_MAQUINA` (`idMaq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServ`, `dniUsu`, `cifEmpr`, `idMaq`, `periodicidad`, `fInicioSer`, `fFinSer`, `costeSer`, `descripSer`) VALUES
('IdServicio1', '12345678E', 'E0001', 'IdMaquina1', '12 meses', '2015-09-05', '2015-09-05', 50, 'Mantenimiento completo, coste de piezas no incluido.\r\n				');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajaopexterno`
--

DROP TABLE IF EXISTS `trabajaopexterno`;
CREATE TABLE IF NOT EXISTS `trabajaopexterno` (
  `idIncid` int(15) NOT NULL,
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idIncid`,`dniUsu`),
  KEY `Fk_TRABAJAOPEXTERNO` (`dniUsu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajaopinterno`
--

DROP TABLE IF EXISTS `trabajaopinterno`;
CREATE TABLE IF NOT EXISTS `trabajaopinterno` (
  `idIncid` int(15) NOT NULL,
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idIncid`,`dniUsu`),
  KEY `Fk_TRABAJAOPINTERNO` (`dniUsu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `nomUsu` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `apellUsu` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `passUsu` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `tipoUsu` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`dniUsu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dniUsu`, `nomUsu`, `apellUsu`, `passUsu`, `tipoUsu`) VALUES
('12345678A', 'Interno', 'Interno', '12345678A', 'I'),
('12345678B', 'Externo', 'Externo', '12345678B', 'E'),
('12345678E', 'Marco', 'Santana', '1234', 'J');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dociteracion`
--
ALTER TABLE `dociteracion`
  ADD CONSTRAINT `Fk_DOCITERACION_INCIDENCIA` FOREIGN KEY (`idIncid`) REFERENCES `incidencia` (`idIncid`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_DOCITERACION_ITERACION` FOREIGN KEY (`nIteracion`) REFERENCES `iteracion` (`nIteracion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `docmaquina`
--
ALTER TABLE `docmaquina`
  ADD CONSTRAINT `Fk_DOCMAQUINA_MAQUINA` FOREIGN KEY (`idMaq`) REFERENCES `maquina` (`idMaq`) ON DELETE CASCADE;

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `Fk_INCIDENCIA_MAQUINA` FOREIGN KEY (`idMaq`) REFERENCES `maquina` (`idMaq`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_INCIDENCIA_EMPRESA` FOREIGN KEY (`cifEmpr`) REFERENCES `empresa` (`cifEmpr`) ON DELETE CASCADE;

--
-- Filtros para la tabla `iteracion`
--
ALTER TABLE `iteracion`
  ADD CONSTRAINT `Fk_ITERACION` FOREIGN KEY (`idIncid`) REFERENCES `incidencia` (`idIncid`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_ITERACION_USUARIO` FOREIGN KEY (`dniUsu`) REFERENCES `usuario` (`dniUsu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `jefe`
--
ALTER TABLE `jefe`
  ADD CONSTRAINT `Fk_USUARIO` FOREIGN KEY (`dniUsu`) REFERENCES `usuario` (`dniUsu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `opexterno`
--
ALTER TABLE `opexterno`
  ADD CONSTRAINT `Fk_OPEXTERNO_JEFE` FOREIGN KEY (`dniUsu`) REFERENCES `usuario` (`dniUsu`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_OPEXTERNO_CIFEMPRESA` FOREIGN KEY (`cifEmpr`) REFERENCES `empresa` (`cifEmpr`) ON DELETE CASCADE;

--
-- Filtros para la tabla `opinterno`
--
ALTER TABLE `opinterno`
  ADD CONSTRAINT `Fk_OPINTERNO` FOREIGN KEY (`dniUsu`) REFERENCES `usuario` (`dniUsu`) ON DELETE CASCADE;

--
-- Filtros para la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `Fk_REALZA` FOREIGN KEY (`dniUsu`) REFERENCES `opexterno` (`dniUsu`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_REALZA_SERVICIO` FOREIGN KEY (`idServ`) REFERENCES `servicio` (`idServ`) ON DELETE CASCADE;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `Fk_SERVICIO` FOREIGN KEY (`dniUsu`) REFERENCES `jefe` (`dniUsu`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_SERVICIO_EMPRESA` FOREIGN KEY (`cifEmpr`) REFERENCES `empresa` (`cifEmpr`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_SERVICIO_MAQUINA` FOREIGN KEY (`idMaq`) REFERENCES `maquina` (`idMaq`) ON DELETE CASCADE;

--
-- Filtros para la tabla `trabajaopexterno`
--
ALTER TABLE `trabajaopexterno`
  ADD CONSTRAINT `Fk_TRABAJAOPEXTERNO` FOREIGN KEY (`dniUsu`) REFERENCES `opexterno` (`dniUsu`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_TRABAJAOPEXTERNO_INCIDENCIA` FOREIGN KEY (`idIncid`) REFERENCES `incidencia` (`idIncid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `trabajaopinterno`
--
ALTER TABLE `trabajaopinterno`
  ADD CONSTRAINT `Fk_TRABAJAOPINTERNO` FOREIGN KEY (`dniUsu`) REFERENCES `opinterno` (`dniUsu`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_TRABAJAOPINTERNO_INCIDENCIA` FOREIGN KEY (`idIncid`) REFERENCES `incidencia` (`idIncid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
