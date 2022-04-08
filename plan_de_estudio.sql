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

-- Volcando estructura para tabla proyecto.compl_area_plan
CREATE TABLE IF NOT EXISTS `compl_area_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coarpl_nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `coarpl_id_componente` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_compl_area_plan_compl_componente_plan` (`coarpl_id_componente`),
  CONSTRAINT `FK_compl_area_plan_compl_componente_plan` FOREIGN KEY (`coarpl_id_componente`) REFERENCES `compl_componente_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_area_plan: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `compl_area_plan` DISABLE KEYS */;
INSERT IGNORE INTO `compl_area_plan` (`id`, `coarpl_nombre`, `coarpl_id_componente`, `created_at`, `updated_at`) VALUES
	(1, 'Ingeniería Aplicada', 1, '2022-04-07 20:21:32', '2022-04-07 20:21:07'),
	(2, 'Básicas de Ingeniería', 1, '2022-04-07 20:21:35', '2022-04-07 20:21:28'),
	(3, 'Ciencias Básicas', 2, '2022-04-07 20:21:58', '2022-04-07 20:21:54'),
	(4, 'Formación Complementaria', 3, '2022-04-07 20:22:18', '2022-04-07 20:22:12');
/*!40000 ALTER TABLE `compl_area_plan` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_componente_plan
CREATE TABLE IF NOT EXISTS `compl_componente_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cocopa_nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_componente_plan: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `compl_componente_plan` DISABLE KEYS */;
INSERT IGNORE INTO `compl_componente_plan` (`id`, `cocopa_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Disciplinar', '2022-04-07 20:19:37', '2022-04-07 20:19:37'),
	(2, 'Básico', '2022-04-07 20:19:50', '2022-04-07 20:19:50'),
	(3, 'Genérico', '2022-04-07 20:20:02', '2022-04-07 20:20:02');
/*!40000 ALTER TABLE `compl_componente_plan` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.programa_plan_estudio_asignatura
CREATE TABLE IF NOT EXISTS `programa_plan_estudio_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asig_id_sede` int(11) NOT NULL,
  `asig_id_programa` int(11) NOT NULL,
  `asig_id_plan_estudio` int(11) NOT NULL,
  `asig_id_componente` int(11) NOT NULL DEFAULT 0,
  `asig_id_area` int(11) NOT NULL DEFAULT 0,
  `asig_codigo` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `asig_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asig_no_creditos` int(11) NOT NULL,
  `asig_no_semanales` int(11) NOT NULL,
  `asig_no_semestre` int(11) NOT NULL,
  `asig_estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_programa_plan_estudio_asignatura_programa_plan_estudio` (`asig_id_plan_estudio`),
  KEY `FK_programa_plan_estudio_asignatura_programa` (`asig_id_programa`),
  KEY `FK_programa_plan_estudio_asignatura_municipio` (`asig_id_sede`),
  KEY `FK_programa_plan_estudio_asignatura_compl_componente_plan` (`asig_id_componente`),
  KEY `FK_programa_plan_estudio_asignatura_compl_area_plan` (`asig_id_area`),
  CONSTRAINT `FK_programa_plan_estudio_asignatura_compl_area_plan` FOREIGN KEY (`asig_id_area`) REFERENCES `compl_area_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_compl_componente_plan` FOREIGN KEY (`asig_id_componente`) REFERENCES `compl_componente_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_municipio` FOREIGN KEY (`asig_id_sede`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_programa` FOREIGN KEY (`asig_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_programa_plan_estudio` FOREIGN KEY (`asig_id_plan_estudio`) REFERENCES `programa_plan_estudio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_plan_estudio_asignatura: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_plan_estudio_asignatura` DISABLE KEYS */;
INSERT IGNORE INTO `programa_plan_estudio_asignatura` (`id`, `asig_id_sede`, `asig_id_programa`, `asig_id_plan_estudio`, `asig_id_componente`, `asig_id_area`, `asig_codigo`, `asig_nombre`, `asig_no_creditos`, `asig_no_semanales`, `asig_no_semestre`, `asig_estado`, `created_at`, `updated_at`) VALUES
	(4, 5, 1, 1, 1, 2, '5201', 'Fundamentos de programación', 4, 64, 192, 'activo', '2022-04-08 02:10:38', '2022-04-08 02:20:43');
/*!40000 ALTER TABLE `programa_plan_estudio_asignatura` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
