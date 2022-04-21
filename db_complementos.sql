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

-- Volcando estructura para tabla proyecto.compl_area_extension
CREATE TABLE IF NOT EXISTS `compl_area_extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coarex_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_area_extension: ~3 rows (aproximadamente)
DELETE FROM `compl_area_extension`;
/*!40000 ALTER TABLE `compl_area_extension` DISABLE KEYS */;
INSERT INTO `compl_area_extension` (`id`, `coarex_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Servicio social', '2022-03-09 15:36:24', NULL),
	(2, 'Gestión tecnológica', '2022-03-09 15:36:38', NULL),
	(3, 'Programas interdisciplinarios', '2022-03-09 15:36:55', NULL);
/*!40000 ALTER TABLE `compl_area_extension` ENABLE KEYS */;

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
DELETE FROM `compl_area_plan`;
/*!40000 ALTER TABLE `compl_area_plan` DISABLE KEYS */;
INSERT INTO `compl_area_plan` (`id`, `coarpl_nombre`, `coarpl_id_componente`, `created_at`, `updated_at`) VALUES
	(1, 'Ingeniería Aplicada', 1, '2022-04-07 20:21:32', '2022-04-07 20:21:07'),
	(2, 'Básicas de Ingeniería', 1, '2022-04-07 20:21:35', '2022-04-07 20:21:28'),
	(3, 'Ciencias Básicas', 2, '2022-04-07 20:21:58', '2022-04-07 20:21:54'),
	(4, 'Formación Complementaria', 3, '2022-04-07 20:22:18', '2022-04-07 20:22:12');
/*!40000 ALTER TABLE `compl_area_plan` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_area_trabajo
CREATE TABLE IF NOT EXISTS `compl_area_trabajo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coartra_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_area_trabajo: ~10 rows (aproximadamente)
DELETE FROM `compl_area_trabajo`;
/*!40000 ALTER TABLE `compl_area_trabajo` DISABLE KEYS */;
INSERT INTO `compl_area_trabajo` (`id`, `coartra_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Educación', '2022-03-09 15:32:14', '2022-03-09 15:32:14'),
	(2, 'Salud', '2022-03-09 15:32:18', '2022-03-09 15:32:18'),
	(3, 'Habitat', '2022-03-09 15:32:24', '2022-03-09 15:32:24'),
	(4, 'Movilidad y espacio público', '2022-03-09 15:32:36', '2022-03-09 15:32:37'),
	(5, 'Desarrollo productivo y generación de ingresos en microempresas', '2022-03-09 15:33:15', '2022-03-09 15:33:16'),
	(6, 'Desarrollo productivo y generación de ingresos en pequeñas empresas', '2022-03-09 15:33:40', NULL),
	(7, 'Desarrollo productivo y generación de ingresos en medianas empresas', '2022-03-09 15:33:54', NULL),
	(8, 'Desarrollo productivo y generación de ingresos en famiempresas', '2022-03-09 15:34:07', NULL),
	(9, 'Desarrollo productivo y generación de ingresos en otro tipo de empresas', '2022-03-09 15:34:21', NULL),
	(10, 'Medio ambiente y recursos naturales', '2022-03-09 15:34:34', NULL);
/*!40000 ALTER TABLE `compl_area_trabajo` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_cine_detallado
CREATE TABLE IF NOT EXISTS `compl_cine_detallado` (
  `id` int(11) NOT NULL,
  `cocide_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_cine_detallado: ~80 rows (aproximadamente)
DELETE FROM `compl_cine_detallado`;
/*!40000 ALTER TABLE `compl_cine_detallado` DISABLE KEYS */;
INSERT INTO `compl_cine_detallado` (`id`, `cocide_nombre`, `created_at`, `updated_at`) VALUES
	(11, 'Programas y certificaciones basicas', NULL, NULL),
	(21, 'Alfabetizacion y aritmetica elemental', NULL, NULL),
	(31, 'Competencias personales y desarrollo', NULL, NULL),
	(111, 'Ciencias de la educacion', NULL, NULL),
	(112, 'Formacion para docentes de educacion pre-primaria', NULL, NULL),
	(113, 'Formacion para docentes sin asignatura de especializacion', NULL, NULL),
	(114, 'Formacion para docentes con asignatura de especializacion', NULL, NULL),
	(211, 'Tecnicas audiovisuales y produccion para medios de comunicacion', NULL, NULL),
	(212, 'Dise?o industrial, de modas e interiores', NULL, NULL),
	(213, 'Bellas artes', NULL, NULL),
	(214, 'Artesanias', NULL, NULL),
	(215, 'Musica y artes escenicas', NULL, NULL),
	(221, 'Religion y Teologia', NULL, NULL),
	(222, 'Historia y arqueologia', NULL, NULL),
	(223, 'Filosofia y etica', NULL, NULL),
	(231, 'Adquisicion del lenguaje', NULL, NULL),
	(232, 'Literatura y ling?istica', NULL, NULL),
	(311, 'Economia', NULL, NULL),
	(312, 'Ciencias politicas y educacion civica', NULL, NULL),
	(313, 'Psicologia', NULL, NULL),
	(314, 'Sociologia y estudios culturales', NULL, NULL),
	(321, 'Periodismo y reportajes', NULL, NULL),
	(322, 'Bibliotecologia, informacion y archivologia', NULL, NULL),
	(411, 'Contabilidad e impuestos', NULL, NULL),
	(412, 'Gestion financiera, administracion bancaria y seguros', NULL, NULL),
	(413, 'Gestion y administracion', NULL, NULL),
	(414, 'Mercadotecnia y publicidad', NULL, NULL),
	(415, 'Secretariado y trabajo de oficina', NULL, NULL),
	(416, 'Ventas al por mayor y al por menor', NULL, NULL),
	(417, 'Competencias laborales', NULL, NULL),
	(421, 'Derecho', NULL, NULL),
	(511, 'Biologia', NULL, NULL),
	(512, 'Bioquimica', NULL, NULL),
	(521, 'Ciencias del medio ambiente', NULL, NULL),
	(522, 'Medio ambiente natural y vida silvestre', NULL, NULL),
	(531, 'Quimica', NULL, NULL),
	(532, 'Ciencias de la tierra', NULL, NULL),
	(533, 'Fisica', NULL, NULL),
	(541, 'Matematicas', NULL, NULL),
	(542, 'Estadistica', NULL, NULL),
	(611, 'Uso de computadores', NULL, NULL),
	(612, 'Dise?o y administracion de redes y bases de datos', NULL, NULL),
	(613, 'Desarrollo y analisis de software y aplicaciones', NULL, NULL),
	(711, 'Ingenieria y procesos quimicos', NULL, NULL),
	(712, 'Tecnologia de proteccion del medio ambiente', NULL, NULL),
	(713, 'Electricidad y energia', NULL, NULL),
	(714, 'Electronica y automatizacion', NULL, NULL),
	(715, 'Mecanica y profesiones afines a la metalisteria', NULL, NULL),
	(716, 'Vehiculos, barcos y aeronaves motorizadas', NULL, NULL),
	(721, 'Procesamiento de alimentos', NULL, NULL),
	(722, 'Materiales (vidrio, papel, plastico y madera)', NULL, NULL),
	(723, 'Produccion textiles (ropa, calzado y articulos de cuero)', NULL, NULL),
	(724, 'Mineria y extraccion', NULL, NULL),
	(731, 'Arquitectura y urbanismo', NULL, NULL),
	(732, 'Construccion e ingenieria civil', NULL, NULL),
	(811, 'Produccion agricola y ganadera', NULL, NULL),
	(812, 'Horticultura', NULL, NULL),
	(821, 'Silvicultura', NULL, NULL),
	(831, 'Pesca', NULL, NULL),
	(841, 'Veterinaria', NULL, NULL),
	(911, 'Odontologia', NULL, NULL),
	(912, 'Medicina', NULL, NULL),
	(913, 'Enfermeria y parteria', NULL, NULL),
	(914, 'Tecnologia de diagnostico y tratamiento medico', NULL, NULL),
	(915, 'Terapia y rehabilitacion', NULL, NULL),
	(916, 'Farmacia', NULL, NULL),
	(917, 'Medicina y terapia tradicional y complementaria', NULL, NULL),
	(921, 'Asistencia a adultos mayores y discapacitados', NULL, NULL),
	(922, 'Asistencia a la infancia y servicios para jovenes', NULL, NULL),
	(923, 'Trabajo social y orientacion', NULL, NULL),
	(1011, 'Servicios domesticos', NULL, NULL),
	(1012, 'Peluqueria y tratamientos de belleza', NULL, NULL),
	(1013, 'Hoteleria, restaurantes y servicios de banquetes', NULL, NULL),
	(1014, 'Deportes', NULL, NULL),
	(1015, 'Viajes, turismo y actividades recreativas', NULL, NULL),
	(1021, 'Saneamiento de la comunidad', NULL, NULL),
	(1022, 'Salud y proteccion laboral', NULL, NULL),
	(1031, 'Educacion militar y de defensa', NULL, NULL),
	(1032, 'Proteccion de las personas y de la propiedad', NULL, NULL),
	(1041, 'Servicios de transporte', NULL, NULL);
/*!40000 ALTER TABLE `compl_cine_detallado` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_componente_plan
CREATE TABLE IF NOT EXISTS `compl_componente_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cocopa_nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_componente_plan: ~3 rows (aproximadamente)
DELETE FROM `compl_componente_plan`;
/*!40000 ALTER TABLE `compl_componente_plan` DISABLE KEYS */;
INSERT INTO `compl_componente_plan` (`id`, `cocopa_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Disciplinar', '2022-04-07 20:19:37', '2022-04-07 20:19:37'),
	(2, 'Básico', '2022-04-07 20:19:50', '2022-04-07 20:19:50'),
	(3, 'Genérico', '2022-04-07 20:20:02', '2022-04-07 20:20:02');
/*!40000 ALTER TABLE `compl_componente_plan` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_entidad_nacional
CREATE TABLE IF NOT EXISTS `compl_entidad_nacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coenna_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_entidad_nacional: ~15 rows (aproximadamente)
DELETE FROM `compl_entidad_nacional`;
/*!40000 ALTER TABLE `compl_entidad_nacional` DISABLE KEYS */;
INSERT INTO `compl_entidad_nacional` (`id`, `coenna_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Consejería presidencial para la equidad de la mujer', '2022-03-09 15:52:23', NULL),
	(2, 'Defenosoría del pueblo', '2022-03-09 15:52:35', NULL),
	(3, 'ICBF - Instituto colombiano de bienestar familiar', '2022-03-09 15:53:04', NULL),
	(4, 'SENA - Servicio nacional de aprendizaje', '2022-03-09 15:53:19', NULL),
	(5, 'Superintendencia de notariado y registro público', '2022-03-09 15:53:43', NULL),
	(6, 'Universidad nacional de colombia', '2022-03-09 15:53:57', NULL),
	(7, 'Unidad ejecutiva de servicios públicos', '2022-03-09 15:54:54', NULL),
	(8, 'Superintendencia de subsidio familiar', '2022-03-09 15:55:15', NULL),
	(9, 'ACCI - Agenda colombiana de cooperación internacional', '2022-03-09 15:55:42', NULL),
	(10, 'Colombia jóven', '2022-03-09 15:55:49', NULL),
	(11, 'Colciencias', '2022-03-09 15:56:02', NULL),
	(12, 'Ministerio de interior y justicia', '2022-03-09 15:56:18', NULL),
	(13, 'Ministerio de relaciones exteriores', '2022-03-09 15:56:33', NULL),
	(14, 'Ministerio de hacienda y crédito público', '2022-03-09 15:56:50', NULL),
	(15, 'Ministerior de defensa nacional', '2022-03-09 15:57:05', NULL);
/*!40000 ALTER TABLE `compl_entidad_nacional` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_fuente_internacional
CREATE TABLE IF NOT EXISTS `compl_fuente_internacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cofuin_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_fuente_internacional: ~8 rows (aproximadamente)
DELETE FROM `compl_fuente_internacional`;
/*!40000 ALTER TABLE `compl_fuente_internacional` DISABLE KEYS */;
INSERT INTO `compl_fuente_internacional` (`id`, `cofuin_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Sector empresarial', NULL, NULL),
	(2, 'Sector administración pública', NULL, NULL),
	(3, 'Centros de investigación y desarrollo tecnológico', NULL, NULL),
	(4, 'Hospitales y clinicas', NULL, NULL),
	(5, 'Instituciones privadas sin ánimo de lucro', NULL, NULL),
	(6, 'Instituciones de educación superior', NULL, NULL),
	(7, 'Organismo multilateral', NULL, NULL),
	(8, 'Otra', NULL, NULL);
/*!40000 ALTER TABLE `compl_fuente_internacional` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_fuente_nacional
CREATE TABLE IF NOT EXISTS `compl_fuente_nacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cofuna_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_fuente_nacional: ~8 rows (aproximadamente)
DELETE FROM `compl_fuente_nacional`;
/*!40000 ALTER TABLE `compl_fuente_nacional` DISABLE KEYS */;
INSERT INTO `compl_fuente_nacional` (`id`, `cofuna_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Recursos IES', NULL, NULL),
	(2, 'Recursos públicos nacionales', NULL, NULL),
	(3, 'Recursos públicos departamental', NULL, NULL),
	(4, 'Recursos públicos municipales o distritales', NULL, NULL),
	(5, 'Recursos privados', NULL, NULL),
	(6, 'Recursos de organizaciones sin ánimo de lucro', NULL, NULL),
	(7, 'Otras entidades', NULL, NULL),
	(8, 'Recursos propios personales', NULL, NULL);
/*!40000 ALTER TABLE `compl_fuente_nacional` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_nivel_estudio
CREATE TABLE IF NOT EXISTS `compl_nivel_estudio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conies_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_nivel_estudio: ~12 rows (aproximadamente)
DELETE FROM `compl_nivel_estudio`;
/*!40000 ALTER TABLE `compl_nivel_estudio` DISABLE KEYS */;
INSERT INTO `compl_nivel_estudio` (`id`, `conies_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Postdoctorado', '2022-02-28 20:31:25', NULL),
	(2, 'Doctorado', '2022-02-28 20:31:31', NULL),
	(3, 'Maestría', '2022-02-28 20:31:40', NULL),
	(4, 'Especialización universitaria', '2022-02-28 20:32:00', NULL),
	(5, 'Especialización técnico profesional', '2022-02-28 20:32:14', NULL),
	(6, 'Especialización tecnológica', '2022-02-28 20:32:31', NULL),
	(7, 'Universitaria', '2022-02-28 20:32:43', NULL),
	(8, 'Tecnológica', '2022-02-28 20:32:49', NULL),
	(9, 'Formación técnica profesional', '2022-02-28 20:33:03', NULL),
	(10, 'Estudiante pregrado', '2022-02-28 20:33:11', NULL),
	(11, 'Especialización médico quirúrgica', '2022-02-28 20:33:26', NULL),
	(12, 'Sin titulo', NULL, NULL);
/*!40000 ALTER TABLE `compl_nivel_estudio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_poblacion_condicion
CREATE TABLE IF NOT EXISTS `compl_poblacion_condicion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `copoco_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_poblacion_condicion: ~16 rows (aproximadamente)
DELETE FROM `compl_poblacion_condicion`;
/*!40000 ALTER TABLE `compl_poblacion_condicion` DISABLE KEYS */;
INSERT INTO `compl_poblacion_condicion` (`id`, `copoco_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Vulnerabilidad social - Violencia intrafamiliar', '2022-03-09 15:59:06', NULL),
	(2, 'Vulnerabilidad social - Violencia sexual', '2022-03-09 15:59:25', NULL),
	(3, 'Vulnerabilidad social - Riesgo o abandono', '2022-03-09 15:59:42', NULL),
	(4, 'Vulnerabilidad social - Habitante de calle', '2022-03-09 15:59:52', NULL),
	(5, 'Vulnerabilidad social - Mujeres cabeza de familiar', '2022-03-09 16:00:07', NULL),
	(6, 'Vulnerabilidad social - Otro', '2022-03-09 16:00:14', NULL),
	(7, 'Vulnerabilidad económica - Desempleo', '2022-03-09 16:00:39', NULL),
	(8, 'Vulnerabilidad económica - Explotación laboral', '2022-03-09 16:00:53', NULL),
	(9, 'Vulnerabilidad económica - Trafico de personas', '2022-03-09 16:01:07', NULL),
	(10, 'Vulnerabilidad económica - Prostitución', '2022-03-09 16:01:18', NULL),
	(11, 'Vulnerabilidad económica - Otro', '2022-03-09 16:01:27', NULL),
	(12, 'Reclusión', '2022-03-09 16:01:34', NULL),
	(13, 'Consumo de sustancias psicoactivas', '2022-03-09 16:01:53', NULL),
	(14, 'Necesidades educativas especiales - personas en condición de discapacidad', '2022-03-09 16:02:18', NULL),
	(15, 'Necesidades educativas especiales - personas con talentos excepcionales ', NULL, NULL),
	(16, 'Habitantes de frotera', '2022-03-09 16:02:59', NULL);
/*!40000 ALTER TABLE `compl_poblacion_condicion` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_poblacion_grupo
CREATE TABLE IF NOT EXISTS `compl_poblacion_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `copogr_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_poblacion_grupo: ~11 rows (aproximadamente)
DELETE FROM `compl_poblacion_grupo`;
/*!40000 ALTER TABLE `compl_poblacion_grupo` DISABLE KEYS */;
INSERT INTO `compl_poblacion_grupo` (`id`, `copogr_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Familia', '2022-03-09 16:03:21', NULL),
	(2, 'Géneros', '2022-03-09 16:03:28', NULL),
	(3, 'Profesionales', '2022-03-09 16:03:37', NULL),
	(4, 'Grupos étnicos', '2022-03-09 16:03:51', NULL),
	(5, 'Campesinos', '2022-03-09 16:04:01', NULL),
	(6, 'Mujeres', '2022-03-09 16:04:09', NULL),
	(7, 'Empleados', '2022-03-09 16:04:09', NULL),
	(8, 'Comunidades', '2022-03-09 16:04:47', NULL),
	(9, 'Empresas, Mypimes', '2022-03-09 16:04:47', NULL),
	(10, 'Entidades gubernamentales', '2022-03-09 16:04:46', NULL),
	(11, 'Otro', '2022-03-09 16:04:53', NULL);
/*!40000 ALTER TABLE `compl_poblacion_grupo` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_sector
CREATE TABLE IF NOT EXISTS `compl_sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cose_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_sector: ~8 rows (aproximadamente)
DELETE FROM `compl_sector`;
/*!40000 ALTER TABLE `compl_sector` DISABLE KEYS */;
INSERT INTO `compl_sector` (`id`, `cose_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Sector empresarial', '2022-02-28 17:51:47', NULL),
	(2, 'Sector administración pública', '2022-02-28 17:52:05', NULL),
	(3, 'Centros de investigación y desarrollo tecnológico', '2022-02-28 17:52:23', NULL),
	(4, 'Hospitales y clinicas', '2022-02-28 17:52:36', '2022-02-28 17:52:36'),
	(5, 'Instituciones privadas sin ánimo de lucro', '2022-02-28 17:52:57', NULL),
	(6, 'Instituciones de educación', '2022-02-28 17:53:10', NULL),
	(7, 'Comunidad', '2022-02-28 17:53:17', NULL),
	(8, 'Otro', '2022-02-28 17:53:21', NULL);
/*!40000 ALTER TABLE `compl_sector` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
