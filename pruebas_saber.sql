-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.17-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla proyecto.prueba_saber
CREATE TABLE IF NOT EXISTS `prueba_saber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prueba_saber_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prueba_saber_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prueba_saber_id_estudiante` int(11) NOT NULL,
  `prueba_saber_puntaje_global` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prueba_saber_estudiante` (`prueba_saber_id_estudiante`),
  CONSTRAINT `FK_prueba_saber_persona` FOREIGN KEY (`prueba_saber_id_estudiante`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proyecto.prueba_saber_modulo
CREATE TABLE IF NOT EXISTS `prueba_saber_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prsamo_id_estudiante` int(11) NOT NULL,
  `prsamo_id_modulo` int(11) NOT NULL,
  `prsamo_puntaje` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prueba_saber_modulo_estudiante` (`prsamo_id_estudiante`),
  KEY `FK_prueba_saber_modulo_tipo_modulo` (`prsamo_id_modulo`),
  CONSTRAINT `FK_prueba_saber_modulo_persona` FOREIGN KEY (`prsamo_id_estudiante`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_prueba_saber_modulo_tipo_modulo` FOREIGN KEY (`prsamo_id_modulo`) REFERENCES `tipo_modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proyecto.prueba_saber_pro
CREATE TABLE IF NOT EXISTS `prueba_saber_pro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prsapr_year` int(11) NOT NULL,
  `prsapr_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prsapr_id_estudiante` int(11) NOT NULL,
  `prsapr_numero_registro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prsapr_grupo_referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prsapr_puntaje_global` int(11) DEFAULT NULL,
  `prsapr_percentil_nacional` int(11) NOT NULL,
  `prsapr_percentil_grupo` int(11) NOT NULL,
  `prsapr_novedad` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prueba_saber_pro_estudiante` (`prsapr_id_estudiante`),
  CONSTRAINT `FK_prueba_saber_pro_persona` FOREIGN KEY (`prsapr_id_estudiante`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proyecto.prueba_saber_pro_modulo
CREATE TABLE IF NOT EXISTS `prueba_saber_pro_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prsaprmo_id_estudiante` int(11) NOT NULL,
  `prsaprmo_id_modulo` int(11) NOT NULL,
  `prsaprmo_puntaje` int(11) NOT NULL,
  `prsaprmo_nivel_desempeno` int(11) NOT NULL,
  `prsaprmo_percentil_nacional` int(11) NOT NULL,
  `prsaprmo_percentil_grupo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prueba_saber_pro_modulo_estudiante` (`prsaprmo_id_estudiante`),
  KEY `FK_prueba_saber_pro_modulo_tipo_modulo` (`prsaprmo_id_modulo`),
  CONSTRAINT `FK_prueba_saber_pro_modulo_persona` FOREIGN KEY (`prsaprmo_id_estudiante`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_prueba_saber_pro_modulo_tipo_modulo` FOREIGN KEY (`prsaprmo_id_modulo`) REFERENCES `tipo_modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
