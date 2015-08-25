/* ***********************  */
/* Base de datos: `FractumDB` */
/* Usuario: AdminFractum       */
/* Pass: Fractum       */
/* ***********************  */

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/* ************************* */
/* Base de datos: `FractumDB`  */
/* ************************* */

DROP DATABASE IF EXISTS `FractumDB`;
CREATE DATABASE `FractumDB` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `FractumDB`;

/* **************** */
/* USER AdminFractum  */
/* **************** */

GRANT USAGE ON *.* TO 'AdminFractum'@'localhost';
   DROP USER 'AdminFractum'@'localhost';

CREATE USER 'AdminFractum'@'localhost' IDENTIFIED BY  'Fractum';

GRANT USAGE ON * . * TO  'AdminFractum'@'localhost' IDENTIFIED BY  'Fractum' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  `FractumDB` . * TO  'AdminFractum'@'localhost' WITH GRANT OPTION ;



-- 1.- Sentencias de borrado de todas las tablas 

DROP TABLE IF EXISTS `DOCITERACION` ;
DROP TABLE IF EXISTS `DOCMAQUINA` ;
DROP TABLE IF EXISTS `TRABAJAOPINTERNO` ;
DROP TABLE IF EXISTS `TRABAJAOPEXTERNO` ;
DROP TABLE IF EXISTS  `REALIZA` ;
DROP TABLE IF EXISTS  `ITERACION` ;
DROP TABLE IF EXISTS  `INCIDENCIA` ;
DROP TABLE IF EXISTS  `SERVICIO` ;
DROP TABLE IF EXISTS  `MAQUINA` ;
DROP TABLE IF EXISTS  `OPINTERNO` ;
DROP TABLE IF EXISTS  `OPEXTERNO` ;
DROP TABLE IF EXISTS  `JEFE` ;
DROP TABLE IF EXISTS  `EMPRESA` ;




/* 2.- Creacion de tablas         */

/* 3.0- Tabla USUARIO */

CREATE TABLE `USUARIO` (
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `nomUsu` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `apellUsu` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `passUsu` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `tipoUsu` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  
  CONSTRAINT Pk_USUARIO PRIMARY KEY (`dniUsu`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


/* 2.1- Tabla EMPRESA   */

CREATE TABLE  `EMPRESA` (
  `cifEmpr` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `nomEmpr` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `telefEmpr` int(13) NOT NULL,
  `mailEmpr` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
 
  CONSTRAINT Pk_EMPRESA PRIMARY KEY (`cifEmpr`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/* 2.2- Tabla JEFE   */

CREATE TABLE `JEFE` (
  `dniUsu` varchar(15)  COLLATE latin1_spanish_ci NOT NULL,
  `telefJefe` int(13) NOT NULL,
  `mailJefe` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
    
  CONSTRAINT Pk_JEFE PRIMARY KEY (`dniUsu`),
  CONSTRAINT Fk_USUARIO FOREIGN KEY (`dniUsu`) REFERENCES USUARIO(`dniUsu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/* 2.3- Tabla OPEXTERNO   */

CREATE TABLE `OPEXTERNO` (
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `cifEmpr` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  
  CONSTRAINT Pk_OPEXTERNO PRIMARY KEY (`dniUsu`),
  CONSTRAINT Fk_OPEXTERNO_JEFE FOREIGN KEY (`dniUsu`) REFERENCES USUARIO(`dniUsu`) ON DELETE CASCADE,
  CONSTRAINT Fk_OPEXTERNO_CIFEMPRESA FOREIGN KEY (`cifEmpr`) REFERENCES EMPRESA(`cifEmpr`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


/* 2.4- Tabla OPINTERNO   */

CREATE TABLE `OPINTERNO` (
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `telefOpeInt` int(13) NOT NULL,
  `mailOpeInt` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  
  CONSTRAINT Pk_OPINTERNO PRIMARY KEY (`dniUsu`),
  CONSTRAINT Fk_OPINTERNO FOREIGN KEY (`dniUsu`) REFERENCES USUARIO(`dniUsu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/* 2.5- Tabla MAQUINA   */

CREATE TABLE `MAQUINA` (
  `idMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `nSerie` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `nomMaq` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `descripMaq` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `costeMaq` float NOT NULL,
  CONSTRAINT Pk_MAQUINA PRIMARY KEY (`idMaq`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/* 2.6- Tabla SERVICIO  */

CREATE TABLE `SERVICIO` (
  `idServ` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `cifEmpr` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `idMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `periodicidad` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fInicioSer` date NOT NULL,
  `fFinSer` date NOT NULL,
  `costeSer` float NOT NULL,
  `descripSer` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  CONSTRAINT Pk_SERVICIO PRIMARY KEY (`idServ`),
  CONSTRAINT Fk_SERVICIO FOREIGN KEY (`dniUsu`) REFERENCES JEFE(`dniUsu`) ON DELETE CASCADE,
  CONSTRAINT Fk_SERVICIO_EMPRESA FOREIGN KEY (`cifEmpr`) REFERENCES EMPRESA(`cifEmpr`) ON DELETE CASCADE,
  CONSTRAINT Fk_SERVICIO_MAQUINA FOREIGN KEY (`idMaq`) REFERENCES MAQUINA(`idMaq`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


/* 2.7- Tabla INCIDENCIA */




CREATE TABLE `INCIDENCIA` (
  `idIncid` int(15) NOT NULL AUTO_INCREMENT,
  `fAper` date NOT NULL,
  `fCier` date NOT NULL,
  `dniResponsable` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `dniApertura` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `idMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `estadoIncid` enum('Abierta','En Curso','Cerrada','Programada','Pendiente Derivar','Derivada','Pendiente Cierre', 'Cerrada') COLLATE latin1_spanish_ci NOT NULL,
  `derivada` boolean NOT NULL,
  `descripIncid` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `cifEmpr` varchar(9) COLLATE latin1_spanish_ci,
  CONSTRAINT Pk_INCIDENCIA PRIMARY KEY (`idIncid`),
  CONSTRAINT Fk_INCIDENCIA_MAQUINA FOREIGN KEY (`idMaq`) REFERENCES MAQUINA(`idMaq`) ON DELETE CASCADE,
  CONSTRAINT Fk_INCIDENCIA_EMPRESA FOREIGN KEY (`cifEmpr`) REFERENCES EMPRESA(`cifEmpr`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;






/* 2.8- Tabla ITERACION */

CREATE TABLE `ITERACION` (
  `idIncid` int(15) COLLATE latin1_spanish_ci NOT NULL,
  `nIteracion` int(15) NOT NULL AUTO_INCREMENT,
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `fechaIter` date NOT NULL,
  `hInicio` time NOT NULL,
  `hFin` time NOT NULL,
  `estadoItera` boolean NOT NULL,
  `descripIter` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `costeIter` float NOT NULL,
   CONSTRAINT Pk_ITERACION PRIMARY KEY (`nIteracion`,`idIncid`),
  CONSTRAINT Fk_ITERACION FOREIGN KEY (`idIncid`) REFERENCES INCIDENCIA(`idIncid`) ON DELETE CASCADE,
  CONSTRAINT Fk_ITERACION_USUARIO FOREIGN KEY (`dniUsu`) REFERENCES USUARIO(`dniUsu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



/* 2.9- Tabla REALIZA   */

CREATE TABLE `REALIZA` (
  `dniUsu` varchar(15)  COLLATE latin1_spanish_ci NOT NULL,
  `idServ` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `fechaRealizacion` date NOT NULL,
  CONSTRAINT Pk_REALIZA PRIMARY KEY (`idServ`,`dniUsu`,`fechaRealizacion`),
  CONSTRAINT Fk_REALZA FOREIGN KEY (`dniUsu`) REFERENCES OPEXTERNO(`dniUsu`) ON DELETE CASCADE,
  CONSTRAINT Fk_REALZA_SERVICIO FOREIGN KEY (`idServ`) REFERENCES SERVICIO(`idServ`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


/* 2.10- Tabla TRABAJAOPEXTERNO   */

CREATE TABLE `TRABAJAOPEXTERNO` (
  `idIncid` int(15) COLLATE latin1_spanish_ci NOT NULL,
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  CONSTRAINT Pk_TRABAJAOPEXTERNO PRIMARY KEY (`idIncid`,`dniUsu`),
  CONSTRAINT Fk_TRABAJAOPEXTERNO FOREIGN KEY (`dniUsu`) REFERENCES OPEXTERNO(`dniUsu`) ON DELETE CASCADE,
  CONSTRAINT Fk_TRABAJAOPEXTERNO_INCIDENCIA FOREIGN KEY (`idIncid`) REFERENCES INCIDENCIA(`idIncid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


/* 2.11- Tabla TRABAJAOPINTERNO   */

CREATE TABLE `TRABAJAOPINTERNO` (
  `idIncid` int(15) COLLATE latin1_spanish_ci NOT NULL,
  `dniUsu` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  CONSTRAINT Pk_TRABAJAOPINTERNO PRIMARY KEY (`idIncid`,`dniUsu`),
  CONSTRAINT Fk_TRABAJAOPINTERNO FOREIGN KEY (`dniUsu`) REFERENCES OPINTERNO(`dniUsu`) ON DELETE CASCADE,
  CONSTRAINT Fk_TRABAJAOPINTERNO_INCIDENCIA FOREIGN KEY (`idIncid`) REFERENCES INCIDENCIA(`idIncid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


/* 2.12- Tabla DOCMAQUINA */
CREATE TABLE `DOCMAQUINA` (
  `idMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `urlDocMaq` varchar(100) COLLATE latin1_spanish_ci NOT NULL ,
  `nDocMaq` varchar(15) COLLATE latin1_spanish_ci NOT NULL ,
  CONSTRAINT Pk_DOCMAQUINA PRIMARY KEY (`idMaq`,`nDocMaq`),
  CONSTRAINT Fk_DOCMAQUINA_MAQUINA FOREIGN KEY (`idMaq`) REFERENCES MAQUINA(`idMaq`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/* 2.13- Tabla DOCITERACION */
CREATE TABLE `DOCITERACION` (
  `idIncid` int(15) COLLATE latin1_spanish_ci NOT NULL,
  `urlDocItr` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `nIteracion` int(15) COLLATE latin1_spanish_ci NOT NULL,
  `nDocIter` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  CONSTRAINT Pk_DOCITERACION PRIMARY KEY (`idIncid`,`nIteracion`,`nDocIter`),
  CONSTRAINT Fk_DOCITERACION_INCIDENCIA FOREIGN KEY (`idIncid`) REFERENCES INCIDENCIA(`idIncid`) ON DELETE CASCADE,
  CONSTRAINT Fk_DOCITERACION_ITERACION FOREIGN KEY (`nIteracion`) REFERENCES ITERACION(`nIteracion`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;





/* ********************************************** */
/* 3.- Introducir datos ejemplo                   */
/* ********************************************** */

/* 3.0- Tabla USUARIO */

INSERT INTO USUARIO ( dniUsu, nomUsu, apellUsu, passUsu, tipoUsu) 
VALUES ("12345678E","Marco","Santana","1234","J"),
('12564856U','Francisco','Gonzalez','1234','E'),
('12569875T','Ramon','Garcia','1234','E'),
('58961245K','Pablo','Rodriguez','1234','E'),
('75369854H','Jose','Ramirez','1234','I'),
('36596584F','Javier','Lorenzo','1234','I');

/* 3.1- Tabla EMPRESA     */
INSERT INTO EMPRESA ( cifEmpr, nomEmpr,telefEmpr, mailEmpr) 
VALUES ("K7885586J","empresa1","986152523","empresa1@gmail.com"),
('I658952F', 'empresa2', '965826548', 'empresa2@gmail.com'),
('Y568952G', 'empresa3', '981051175', 'empresa3@gmail.com');



/* 3.2- Tabla JEFE */
INSERT INTO JEFE (dniUsu, telefJefe, mailJefe) 
VALUES ("12345678E","654789321","marcoSantana@gmail.com");

/* 3.3- Tabla OPEXTERNO */
INSERT INTO OPEXTERNO ( dniUsu, cifEmpr) 
VALUES ("12564856U","I658952F"),
('12569875T','K7885586J'),
('58961245K','K7885586J');

/* 3.4- Tabla OPINTERNO */
INSERT INTO OPINTERNO ( dniUsu, telefOpeInt, mailOpeInt) 
VALUES ("75369854H","654632652","joseramirez@gmail.com"),
('36596584F','698598452','javier@gmail.com');

/* 3.5- Tabla MAQUINA */
INSERT INTO MAQUINA ( idMaq, nSerie,nomMaq, descripMaq, costeMaq) 
VALUES ("maq1","55S6F8S","Centrifugadora de lechuga","descripcion","4562,5"),
('maq2','88FS86J','Fabrica hielos','descripcion','450,46');

/* 3.6- Tabla SERVICIO */
INSERT INTO SERVICIO ( idServ, dniUsu, cifEmpr, idMaq, periodicidad,fInicioSer,fFinSer,costeSer,descripSer) 
VALUES ("serv1","12345678E","K7885586J","maq1","6 meses","00-00-0000","00-00-0000","2500,0","revision mantenimiento"),
('serv2','12345678E','K7885586J','maq2','3 meses','00-00-0000','00-00-0000','1200,0','revision mantenimiento');

/* 3.7- Tabla INCIDENCIA */
INSERT INTO INCIDENCIA ( idIncid, fAper, fCier, dniResponsable, dniApertura,idMaq ,estadoIncid ,derivada,descripIncid,cifEmpr)
VALUES (null,"00-00-0000","00-00-0000","75369854H","75369854H","maq2","Pendiente Derivar", "0","descripcion incidencia","K7885586J"),
(null,'00-00-0000','00-00-0000','75369854H','75369854H','maq1','En Curso', '1','descripcion incidencia','Y568952G'),
(null,'00-00-0000','00-00-0000','75369854H','75369854H','maq2','En Curso', '0','descripcion incidencia','K7885586J');

/* 3.8- Tabla ITERACION */
INSERT INTO ITERACION ( idIncid, nIteracion, dniUsu, fechaIter, hInicio, hFin, estadoItera , descripIter, costeIter)
VALUES ("1",null,"12564856U","00-00-0000","00:00:00","00:00:00","0","descripcioniteracion 1","456"),
('2',null,'58961245K','00-00-0000','00:00:00','00:00:00','1','descripcioniteracion 1','46'),
 ('1',null,'12564856U','00-00-0000','00:00:00','00:00:00','0','descripcioniteracion 2','46545'),
 ('2',null,'12564856U','00-00-0000','00:00:00','00:00:00','0','descripcioniteracion 2','46');


/* 3.9- Tabla REALIZA */
INSERT INTO REALIZA (dniUsu,idServ,fechaRealizacion)
VALUES('12564856U','serv1',"00-00-0000"),
('12564856U','serv2','00-00-0000');


/* 3.10- Tabla TRABAJAOPEXTERNO */
INSERT INTO TRABAJAOPEXTERNO (idIncid,dniUsu)
VALUES("1","12564856U");

/* 3.11- Tabla TRABAJAOPINTERNO */
INSERT INTO TRABAJAOPINTERNO (idIncid,dniUsu)
VALUES("1","75369854H");

