## Script crear base de datos:

CREATE DATABASE `test`;

USE `test`;

## Script crear Tabla Empleados:

CREATE TABLE `empleados` (
  `idlegajo` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `nrodocumento` decimal(10,0) DEFAULT NULL,
  `codigopostal` varchar(10) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idlegajo`),
  KEY `fk_idprovincia` (`id_provincia`),
  KEY `fk_idtipodocumento` (`id_tipo_documento`),
  CONSTRAINT `fk_idprovincia` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`),
  CONSTRAINT `fk_idtipodocumento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

## Script crear Vista Empleados_Detalle:

DELIMITER $$

CREATE VIEW `empleados_detalle` AS (
SELECT
  `e`.`idlegajo`          AS `idlegajo`,
  `e`.`apellido`          AS `apellido`,
  `e`.`nombre`            AS `nombre`,
  `e`.`direccion`         AS `direccion`,
  `e`.`localidad`         AS `localidad`,
  `e`.`id_tipo_documento` AS `id_tipo_documento`,
  `td`.`tipo_documento`   AS `tipo_documento`,
  `e`.`nrodocumento`      AS `nrodocumento`,
  `e`.`codigopostal`      AS `codigopostal`,
  `e`.`id_provincia`      AS `id_provincia`,
  `p`.`provincia`         AS `provincia`
FROM ((`empleados` `e`
    LEFT JOIN `tipo_documento` `td`
      ON (`e`.`id_tipo_documento` = `td`.`id_tipo_documento`))
   LEFT JOIN `provincia` `p`
     ON (`e`.`id_provincia` = `p`.`id_provincia`)))$$

DELIMITER ;

