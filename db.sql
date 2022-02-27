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

-- Volcando estructura para tabla proyecto.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.departamento: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT IGNORE INTO `departamento` (`id`, `dep_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Casanare', '2022-02-19 19:47:47', '2022-02-21 06:04:13'),
	(2, 'Boyacá', '2022-02-19 19:52:06', '2022-02-19 19:52:06'),
	(3, 'Santadander', '2022-02-19 19:53:34', '2022-02-19 19:53:34');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.docente
CREATE TABLE IF NOT EXISTS `docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona_docente` int(11) NOT NULL,
  `ciudad_procedencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dedicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_contratacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vinculacion` date DEFAULT NULL,
  `eps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_esp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificado_esp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_dip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificado_dip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_pregrado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_pre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_especializacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_espe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_maestria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_mae` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_doctorado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_conocimiento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximo_nivel_formacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_maximo_nivel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_maximo_nivel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modalidad_programa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riesgo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caja_compensacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soporte_hoja_vida` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentos_compl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_proceso` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docente_persona` (`id_persona_docente`),
  CONSTRAINT `FK_docente_persona` FOREIGN KEY (`id_persona_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT IGNORE INTO `docente` (`id`, `id_persona_docente`, `ciudad_procedencia`, `correo_personal`, `dedicacion`, `tipo_contratacion`, `fecha_vinculacion`, `eps`, `institucion_esp`, `certificado_esp`, `institucion_dip`, `certificado_dip`, `titulo_pregrado`, `institucion_pre`, `titulo_especializacion`, `institucion_espe`, `titulo_maestria`, `institucion_mae`, `titulo_doctorado`, `institucion_doc`, `area_conocimiento`, `maximo_nivel_formacion`, `titulo_maximo_nivel`, `institucion_maximo_nivel`, `modalidad_programa`, `riesgo`, `caja_compensacion`, `banco`, `no_cuenta`, `pension`, `estado`, `soporte_hoja_vida`, `documentos_compl`, `id_proceso`, `created_at`, `updated_at`) VALUES
	(12, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(15, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(16, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.docente_asignatura
CREATE TABLE IF NOT EXISTS `docente_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doa_id_docente` int(11) NOT NULL,
  `doa_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa_semestre` int(11) NOT NULL,
  `doa_id_asignatura` int(11) NOT NULL,
  `doa_grupo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa_id_municipio` int(11) NOT NULL,
  `doa_unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa_horas_semana_doc` int(11) NOT NULL,
  `doa_horas_semana_inv` int(11) NOT NULL,
  `doa_horas_extension` int(11) NOT NULL,
  `doa_horas_admin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docente_asignatura_municipio` (`doa_id_municipio`),
  KEY `FK_docente_asignatura_programa_asignatura` (`doa_id_asignatura`),
  KEY `FK_docente_asignatura_persona` (`doa_id_docente`),
  CONSTRAINT `FK_docente_asignatura_municipio` FOREIGN KEY (`doa_id_municipio`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_docente_asignatura_persona` FOREIGN KEY (`doa_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_docente_asignatura_programa_asignatura` FOREIGN KEY (`doa_id_asignatura`) REFERENCES `programa_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente_asignatura: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `docente_asignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente_asignatura` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.docente_contrato
CREATE TABLE IF NOT EXISTS `docente_contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doco_persona_docente` int(11) NOT NULL,
  `doco_numero_contrato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_objeto_contrato` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_tipo_contrato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_fecha_inicio` date NOT NULL,
  `doco_fecha_fin` date NOT NULL,
  `doco_rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_url_soporte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_estado` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docente_contrato_persona` (`doco_persona_docente`),
  CONSTRAINT `FK_docente_contrato_persona` FOREIGN KEY (`doco_persona_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente_contrato: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `docente_contrato` DISABLE KEYS */;
INSERT IGNORE INTO `docente_contrato` (`id`, `doco_persona_docente`, `doco_numero_contrato`, `doco_objeto_contrato`, `doco_tipo_contrato`, `doco_fecha_inicio`, `doco_fecha_fin`, `doco_rol`, `doco_url_soporte`, `doco_estado`, `created_at`, `updated_at`) VALUES
	(8, 28, '012022', 'Sin comentarios', 'ops', '2022-02-26', '2023-02-26', 'docente-tc', '2022-02-26_012022_Edwin_Rodriguez_contrato.pdf', 'no-cancelado', '2022-02-26 22:08:27', '2022-02-26 22:08:27'),
	(9, 29, '012022', 'sin comentarios', 'ops', '2021-02-26', '2022-02-26', 'docente-tc', '2021-02-26_012022_Yadira_Hernandez_contrato.pdf', 'no-cancelado', '2022-02-27 03:21:08', '2022-02-27 03:21:08');
/*!40000 ALTER TABLE `docente_contrato` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.docente_evaluacion
CREATE TABLE IF NOT EXISTS `docente_evaluacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doe_persona_docente` int(11) NOT NULL,
  `doe_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doe_semestre` int(11) NOT NULL,
  `doe_cal_auto` double NOT NULL,
  `doe_cal_hete` double NOT NULL,
  `doe_cal_coe` double NOT NULL,
  `doe_total_pro` double NOT NULL,
  `doe_observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `doe_url_evaluacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docente_evaluacion_persona` (`doe_persona_docente`),
  CONSTRAINT `FK_docente_evaluacion_persona` FOREIGN KEY (`doe_persona_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente_evaluacion: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `docente_evaluacion` DISABLE KEYS */;
INSERT IGNORE INTO `docente_evaluacion` (`id`, `doe_persona_docente`, `doe_year`, `doe_semestre`, `doe_cal_auto`, `doe_cal_hete`, `doe_cal_coe`, `doe_total_pro`, `doe_observacion`, `doe_url_evaluacion`, `created_at`, `updated_at`) VALUES
	(5, 28, '2021', 5, 3, 3, 3, 3, 'sin comentarios', '2021_5_Edwin_Rodriguez_evaluacion.pdf', '2022-02-26 22:07:06', '2022-02-26 22:07:06');
/*!40000 ALTER TABLE `docente_evaluacion` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estu_programa` int(11) NOT NULL DEFAULT 0,
  `estu_programa_plan` int(11) DEFAULT 0,
  `estu_tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_numero_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_telefono1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_telefono2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_estrato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_departamento` int(11) NOT NULL,
  `estu_ciudad` int(11) DEFAULT NULL,
  `estu_fecha_nacimiento` date NOT NULL,
  `estu_ingreso` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `estu_ult_matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_semestre` int(11) NOT NULL,
  `estu_financiamiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_entidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_pga` double DEFAULT NULL,
  `estu_reconocimiento` int(11) DEFAULT NULL,
  `estu_egresado` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `estu_grado` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estu_correo` (`estu_correo`),
  KEY `FK_estudiante_departamento` (`estu_departamento`),
  KEY `FK_estudiante_municipio` (`estu_ciudad`),
  KEY `FK_estudiante_programa` (`estu_programa`),
  KEY `FK_estudiante_programa_plan_estudio` (`estu_programa_plan`),
  CONSTRAINT `FK_estudiante_departamento` FOREIGN KEY (`estu_departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_estudiante_municipio` FOREIGN KEY (`estu_ciudad`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_estudiante_programa` FOREIGN KEY (`estu_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_estudiante_programa_plan_estudio` FOREIGN KEY (`estu_programa_plan`) REFERENCES `programa_plan_estudio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.estudiante: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT IGNORE INTO `estudiante` (`id`, `estu_programa`, `estu_programa_plan`, `estu_tipo_documento`, `estu_numero_documento`, `estu_nombre`, `estu_apellido`, `estu_telefono1`, `estu_telefono2`, `estu_direccion`, `estu_correo`, `estu_estrato`, `estu_departamento`, `estu_ciudad`, `estu_fecha_nacimiento`, `estu_ingreso`, `estu_ult_matricula`, `estu_semestre`, `estu_financiamiento`, `estu_entidad`, `estu_estado`, `estu_matricula`, `estu_pga`, `estu_reconocimiento`, `estu_egresado`, `estu_grado`, `created_at`, `updated_at`) VALUES
	(3, 6, 4, 'Cédula de ciudadania', '1006450862', 'michael', 'rodriguez', '3223342408', NULL, 'calle 29 16bis 32', 'maicolh4741@gmail.com', '2', 1, 2, '2000-11-26', '2017', '2021-2', 10, 'beca', 'tics', 'egresado-no-graduado', 'pagado', NULL, NULL, 'No', NULL, '2022-02-27 02:13:05', '2022-02-27 02:13:05');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.facultad
CREATE TABLE IF NOT EXISTS `facultad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.facultad: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT IGNORE INTO `facultad` (`id`, `fac_nombre`, `created_at`, `updated_at`) VALUES
	(2, 'Ciencias básicas e ingenieras', '2022-02-21 06:19:35', '2022-02-21 06:19:35');
/*!40000 ALTER TABLE `facultad` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.metodologia
CREATE TABLE IF NOT EXISTS `metodologia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `met_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.metodologia: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `metodologia` DISABLE KEYS */;
INSERT IGNORE INTO `metodologia` (`id`, `met_nombre`, `created_at`, `updated_at`) VALUES
	(2, 'Presencial', '2022-02-21 06:21:38', '2022-02-21 06:21:38'),
	(3, 'Virtual', '2022-02-21 06:21:48', '2022-02-21 06:21:48');
/*!40000 ALTER TABLE `metodologia` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.migrations: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2022_02_19_183917_departamento', 1),
	(5, '2022_02_19_212717_tipousuario', 2),
	(6, '2022_02_19_233257_docente', 3),
	(7, '2022_02_19_233422_niveles', 4),
	(8, '2022_02_20_000859_metodologia', 4),
	(9, '2022_02_20_002610_facultad', 5),
	(10, '2022_02_20_002828_municipio', 6),
	(11, '2022_02_20_201157_programa', 7),
	(12, '2022_02_21_235050_plan_estudio', 8),
	(13, '2022_02_22_010626_programa_asignatura', 9),
	(14, '2022_02_22_045104_docente_asignatura', 10),
	(15, '2022_02_22_203840_docente_evaluacion', 11),
	(16, '2022_02_22_225609_docente_contrato', 12),
	(17, '2022_02_24_190409_estudiante', 13),
	(18, '2022_02_25_021021_trabajo_grado', 14),
	(19, '2022_02_25_023226_modalidad_grado', 15),
	(20, '2022_02_25_214923_tipo_prueba', 16),
	(21, '2022_02_25_215006_tipo_modulo', 16),
	(22, '2022_02_25_215231_saber_11', 16),
	(23, '2022_02_25_215427_estu_saber_once', 16);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.modalidad_grado
CREATE TABLE IF NOT EXISTS `modalidad_grado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.modalidad_grado: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `modalidad_grado` DISABLE KEYS */;
INSERT IGNORE INTO `modalidad_grado` (`id`, `mod_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Desarrollo tecnológico', '2022-02-25 02:42:55', '2022-02-25 02:45:14');
/*!40000 ALTER TABLE `modalidad_grado` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.municipio
CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mun_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mun_departamento` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_municipio_departamento` (`mun_departamento`),
  CONSTRAINT `FK_municipio_departamento` FOREIGN KEY (`mun_departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.municipio: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT IGNORE INTO `municipio` (`id`, `mun_nombre`, `mun_departamento`, `created_at`, `updated_at`) VALUES
	(2, 'Yopal', 1, '2022-02-21 06:03:56', '2022-02-21 06:03:56');
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.nivel_formacion
CREATE TABLE IF NOT EXISTS `nivel_formacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `niv_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.nivel_formacion: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `nivel_formacion` DISABLE KEYS */;
INSERT IGNORE INTO `nivel_formacion` (`id`, `niv_nombre`, `created_at`, `updated_at`) VALUES
	(2, 'Técnico', '2022-02-21 06:20:39', '2022-02-21 06:20:39'),
	(3, 'Tecnólogo', '2022-02-21 06:20:51', '2022-02-21 06:21:01'),
	(4, 'Pregrado', '2022-02-21 06:21:10', '2022-02-21 06:21:10'),
	(5, 'Especialización', '2022-02-21 06:21:22', '2022-02-21 06:21:22');
/*!40000 ALTER TABLE `nivel_formacion` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `per_tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_numero_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_departamento` int(11) NOT NULL DEFAULT 0,
  `per_ciudad` int(11) NOT NULL DEFAULT 0,
  `per_tipo_usuario` int(11) NOT NULL DEFAULT 0,
  `per_id_estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persona_per_correo_unique` (`per_correo`),
  KEY `FK_persona_departamento` (`per_departamento`),
  KEY `FK_persona_tipo_usuario` (`per_tipo_usuario`),
  CONSTRAINT `FK_persona_departamento` FOREIGN KEY (`per_departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_persona_tipo_usuario` FOREIGN KEY (`per_tipo_usuario`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.persona: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT IGNORE INTO `persona` (`id`, `per_tipo_documento`, `per_numero_documento`, `per_nombre`, `per_apellido`, `per_telefono`, `per_correo`, `password`, `per_departamento`, `per_ciudad`, `per_tipo_usuario`, `per_id_estado`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(27, 'Cédula de ciudadania', '1006450866', 'Michael', 'Rodriguez', '3223342408', 'michaelrodriguezhernandez@unisangil.edu.co', '$2y$10$G6v.CQS5gnw0xaW6KeXuguFOYq4MEhfjqvNMv6P0f0Lj1AxqpoDk6', 1, 2, 1, 'activo', NULL, NULL, '2022-02-26 15:57:04', '2022-02-26 15:57:04'),
	(28, 'Cédula de ciudadania', '74825033', 'Edwin', 'Rodriguez', '3108585194', 'eroher@hotmail.com', '$2y$10$xQBu.LN7Au4m15Ew34tm8.iMNMCrgQ9Ku3A98vEhZBafB4O30o20e', 1, 2, 2, 'activo', NULL, NULL, '2022-02-26 16:29:56', '2022-02-26 16:29:56'),
	(29, 'Cédula de ciudadania', '47426505', 'Yadira', 'Hernandez', '3108585194', 'yadira@gmail.com', '', 1, 2, 5, 'activo', NULL, NULL, NULL, NULL),
	(33, 'Cédula de ciudadania', '1006451234', 'michael', 'rodriguez', '3108585194', 'maicolh474@gmail.com', '$2y$10$1fIJ4ig9RK9m3zwh3zcrouAACIwk1ahdLl.HEBVq4iMQ9Wk.fjjDi', 1, 2, 2, 'activo', NULL, NULL, NULL, NULL),
	(34, 'Cédula de ciudadania', '1116662526', 'Kenny', 'Rodriguez', '3108585194', 'mateorodriguezhernandez04@gmail.com', NULL, 1, 2, 5, 'activo', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.programa
CREATE TABLE IF NOT EXISTS `programa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_departamento` int(11) NOT NULL,
  `pro_municipio` int(11) NOT NULL,
  `pro_facultad` int(11) NOT NULL,
  `pro_titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_codigosnies` int(11) NOT NULL,
  `pro_resolucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_fecha_ult` date NOT NULL,
  `pro_fecha_prox` date NOT NULL,
  `pro_nivel_formacion` int(11) NOT NULL,
  `pro_programa_ciclo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_metodologia` int(11) NOT NULL,
  `pro_duraccion` int(11) NOT NULL,
  `pro_periodo_admision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_tipo_norma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id_director` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_programa_persona` (`pro_id_director`),
  CONSTRAINT `FK_programa_persona` FOREIGN KEY (`pro_id_director`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.programa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `programa` DISABLE KEYS */;
INSERT IGNORE INTO `programa` (`id`, `pro_nombre`, `pro_estado`, `pro_departamento`, `pro_municipio`, `pro_facultad`, `pro_titulo`, `pro_codigosnies`, `pro_resolucion`, `pro_fecha_ult`, `pro_fecha_prox`, `pro_nivel_formacion`, `pro_programa_ciclo`, `pro_metodologia`, `pro_duraccion`, `pro_periodo_admision`, `pro_tipo_norma`, `pro_id_director`, `created_at`, `updated_at`) VALUES
	(6, 'Ingeniera de sistemas', 'Activo', 1, 2, 2, 'Ingeniero de sistemas', 7415, 'n/a', '2022-02-26', '2022-02-26', 4, 'Si', 2, 10, 'Semestral', 'xx', 28, '2022-02-26 16:51:02', '2022-02-27 03:07:27'),
	(7, 'Ingeniería electrónica', 'Activo', 1, 2, 2, 'Ingeniero electrónico', 1412, 'n/a', '2022-02-26', '2022-02-26', 4, 'Si', 2, 10, 'Semestral', 'n/a', 29, '2022-02-27 01:22:30', '2022-02-27 01:22:30');
/*!40000 ALTER TABLE `programa` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.programa_asignatura_horario
CREATE TABLE IF NOT EXISTS `programa_asignatura_horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pph_year` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pph_semestre` int(11) NOT NULL,
  `pph_id_asignatura` int(11) NOT NULL,
  `pph_grupo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pph_id_docente` int(11) NOT NULL,
  `pph_horario` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pph_aula` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_programa_plan_asignatura_hor` (`pph_id_asignatura`),
  KEY `FK_programa_plan_asignatura_horario_persona` (`pph_id_docente`),
  CONSTRAINT `FK_programa_plan_asignatura_hor` FOREIGN KEY (`pph_id_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_asignatura_horario_persona` FOREIGN KEY (`pph_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_asignatura_horario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_asignatura_horario` DISABLE KEYS */;
INSERT IGNORE INTO `programa_asignatura_horario` (`id`, `pph_year`, `pph_semestre`, `pph_id_asignatura`, `pph_grupo`, `pph_id_docente`, `pph_horario`, `pph_aula`, `created_at`, `updated_at`) VALUES
	(2, '2022', 1, 2, 'Y-Sistemas', 28, 'Lunes 9-10:40 p.m\r\nJueves 9-10:40p.m', 'Lab. C-201, Lab. C-202', '2022-02-26 23:08:34', '2022-02-26 23:08:34');
/*!40000 ALTER TABLE `programa_asignatura_horario` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.programa_plan_estudio
CREATE TABLE IF NOT EXISTS `programa_plan_estudio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_id_sede` int(11) NOT NULL DEFAULT 0,
  `pp_id_programa` int(11) NOT NULL DEFAULT 0,
  `pp_plan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pp_creditos` int(11) NOT NULL DEFAULT 0,
  `pp_no_asignaturas` int(11) NOT NULL DEFAULT 0,
  `pp_estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_programa_plan_estudio_programa` (`pp_id_programa`),
  KEY `FK_programa_plan_estudio_municipio` (`pp_id_sede`),
  CONSTRAINT `FK_programa_plan_estudio_municipio` FOREIGN KEY (`pp_id_sede`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_programa` FOREIGN KEY (`pp_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_plan_estudio: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_plan_estudio` DISABLE KEYS */;
INSERT IGNORE INTO `programa_plan_estudio` (`id`, `pp_id_sede`, `pp_id_programa`, `pp_plan`, `pp_creditos`, `pp_no_asignaturas`, `pp_estado`, `created_at`, `updated_at`) VALUES
	(4, 2, 6, '2016', 164, 28, 'activo', '2022-02-26 16:54:17', '2022-02-26 17:28:19'),
	(5, 2, 6, '909', 160, 25, 'activo', '2022-02-26 17:39:05', '2022-02-26 17:39:05'),
	(6, 2, 7, '2015', 164, 24, 'activo', '2022-02-27 01:30:50', '2022-02-27 01:30:50');
/*!40000 ALTER TABLE `programa_plan_estudio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.programa_plan_estudio_asignatura
CREATE TABLE IF NOT EXISTS `programa_plan_estudio_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asig_id_sede` int(11) NOT NULL,
  `asig_id_programa` int(11) NOT NULL,
  `asig_id_plan_estudio` int(11) NOT NULL,
  `asig_codigo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
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
  CONSTRAINT `FK_programa_plan_estudio_asignatura_municipio` FOREIGN KEY (`asig_id_sede`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_programa` FOREIGN KEY (`asig_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_programa_plan_estudio` FOREIGN KEY (`asig_id_plan_estudio`) REFERENCES `programa_plan_estudio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_plan_estudio_asignatura: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_plan_estudio_asignatura` DISABLE KEYS */;
INSERT IGNORE INTO `programa_plan_estudio_asignatura` (`id`, `asig_id_sede`, `asig_id_programa`, `asig_id_plan_estudio`, `asig_codigo`, `asig_nombre`, `asig_no_creditos`, `asig_no_semanales`, `asig_no_semestre`, `asig_estado`, `created_at`, `updated_at`) VALUES
	(2, 2, 6, 4, '5203', 'Estructura de datos', 4, 4, 64, 'activo', '2022-02-26 19:04:42', '2022-02-26 19:04:42');
/*!40000 ALTER TABLE `programa_plan_estudio_asignatura` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.software
CREATE TABLE IF NOT EXISTS `software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sof_tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_desarrollador` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_version` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_no_licencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_year_ad_licencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_year_ve_licencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_asignatura` int(11) NOT NULL DEFAULT 0,
  `sof_cantidad` int(11) NOT NULL DEFAULT 0,
  `sof_id_programa` int(11) NOT NULL DEFAULT 0,
  `sof_valor_unitario` double NOT NULL DEFAULT 0,
  `sof_valor_total` double NOT NULL DEFAULT 0,
  `sof_fecha_actualizar` date DEFAULT NULL,
  `sof_fecha_instalacion` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_software_programa_plan_estudio_asignatura` (`sof_asignatura`),
  KEY `FK_software_programa` (`sof_id_programa`),
  CONSTRAINT `FK_software_programa` FOREIGN KEY (`sof_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_software_programa_plan_estudio_asignatura` FOREIGN KEY (`sof_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.software: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `software` DISABLE KEYS */;
/*!40000 ALTER TABLE `software` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipo_usuario
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.tipo_usuario: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_usuario` (`id`, `tip_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', '2022-02-19 16:29:40', '2022-02-19 16:29:40'),
	(2, 'Director programa / docente', '2022-02-19 16:30:09', '2022-02-19 16:30:10'),
	(3, 'Auxiliar', '2022-02-19 16:30:06', '2022-02-19 16:30:07'),
	(4, 'Director programa', '2022-02-19 16:30:27', '2022-02-19 16:30:27'),
	(5, 'Docente', '2022-02-21 01:00:19', '2022-02-21 01:00:21');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.trabajo_grado
CREATE TABLE IF NOT EXISTS `trabajo_grado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tra_codigo_proyecto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_titulo_proyecto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tra_id_estudiante` int(11) NOT NULL DEFAULT 0,
  `tra_fecha_inicio` date NOT NULL,
  `tra_modalidad_grado` int(11) NOT NULL,
  `tra_id_director` int(11) NOT NULL,
  `tra_id_codirector` int(11) NOT NULL,
  `tra_id_externo` int(11) DEFAULT NULL,
  `tra_estado_propuesta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_estado_proyecto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_id_jurado1` int(11) DEFAULT NULL,
  `tra_id_jurado2` int(11) DEFAULT NULL,
  `tra_numero_acta_sustentacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_acta_sustentacion_soporte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_numero_acta_grado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_acta_grado_soporte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_fecha_finalizacion` date DEFAULT NULL,
  `tra_observacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_id_proceso` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_trabajo_grado_estudiante` (`tra_id_estudiante`),
  KEY `FK_trabajo_grado_modalidad_grado` (`tra_modalidad_grado`),
  KEY `FK_trabajo_grado_persona` (`tra_id_director`),
  KEY `FK_trabajo_grado_persona_2` (`tra_id_codirector`),
  KEY `FK_trabajo_grado_persona_3` (`tra_id_externo`),
  KEY `FK_trabajo_grado_persona_4` (`tra_id_jurado1`),
  KEY `FK_trabajo_grado_persona_5` (`tra_id_jurado2`),
  CONSTRAINT `FK_trabajo_grado_estudiante` FOREIGN KEY (`tra_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_modalidad_grado` FOREIGN KEY (`tra_modalidad_grado`) REFERENCES `modalidad_grado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona` FOREIGN KEY (`tra_id_director`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona_2` FOREIGN KEY (`tra_id_codirector`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona_3` FOREIGN KEY (`tra_id_externo`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona_4` FOREIGN KEY (`tra_id_jurado1`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona_5` FOREIGN KEY (`tra_id_jurado2`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.trabajo_grado: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajo_grado` DISABLE KEYS */;
INSERT IGNORE INTO `trabajo_grado` (`id`, `tra_codigo_proyecto`, `tra_titulo_proyecto`, `tra_id_estudiante`, `tra_fecha_inicio`, `tra_modalidad_grado`, `tra_id_director`, `tra_id_codirector`, `tra_id_externo`, `tra_estado_propuesta`, `tra_estado_proyecto`, `tra_id_jurado1`, `tra_id_jurado2`, `tra_numero_acta_sustentacion`, `tra_acta_sustentacion_soporte`, `tra_numero_acta_grado`, `tra_acta_grado_soporte`, `tra_fecha_finalizacion`, `tra_observacion`, `tra_id_proceso`, `created_at`, `updated_at`) VALUES
	(8, '8638-2021', 'La Nueva Realidad', 3, '2021-02-26', 1, 29, 28, NULL, 'aprobada', 'aprobado-director', 33, 34, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2022-02-27 02:27:10', '2022-02-27 02:35:55');
/*!40000 ALTER TABLE `trabajo_grado` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
