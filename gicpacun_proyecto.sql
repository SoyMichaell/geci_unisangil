-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.20-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para proyecto
CREATE DATABASE IF NOT EXISTS `proyecto` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `proyecto`;

-- Volcando estructura para tabla proyecto.bienestar_institucional
CREATE TABLE IF NOT EXISTS `bienestar_institucional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bie_fecha` date NOT NULL,
  `bie_nombre_actividad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bie_total_participantes` int(11) NOT NULL DEFAULT 0,
  `bie_estudiantes` int(11) NOT NULL DEFAULT 0,
  `bie_docentes` int(11) NOT NULL DEFAULT 0,
  `bie_administrativos` int(11) NOT NULL DEFAULT 0,
  `bie_egresados` int(11) NOT NULL DEFAULT 0,
  `bie_particulares` int(11) NOT NULL DEFAULT 0,
  `bie_codigo_snies` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bie_soporte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bie_observacion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.bienestar_institucional: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `bienestar_institucional` DISABLE KEYS */;
/*!40000 ALTER TABLE `bienestar_institucional` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_area_extension
CREATE TABLE IF NOT EXISTS `compl_area_extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coarex_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_area_extension: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `compl_area_extension` DISABLE KEYS */;
INSERT IGNORE INTO `compl_area_extension` (`id`, `coarex_nombre`, `created_at`, `updated_at`) VALUES
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
  CONSTRAINT `FK_compl_area_plan_compl_componente_plan` FOREIGN KEY (`coarpl_id_componente`) REFERENCES `compl_componente_plan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_area_plan: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `compl_area_plan` DISABLE KEYS */;
INSERT IGNORE INTO `compl_area_plan` (`id`, `coarpl_nombre`, `coarpl_id_componente`, `created_at`, `updated_at`) VALUES
	(1, 'Ingeniería Aplicada', 1, '2022-04-22 15:44:33', '2022-04-07 20:21:07'),
	(2, 'Básicas de Ingeniería', 1, '2022-04-22 15:44:33', '2022-04-07 20:21:28'),
	(3, 'Ciencias Básicas', 2, '2022-04-22 15:44:33', '2022-04-07 20:21:54'),
	(4, 'Formación Complementaria', 3, '2022-04-22 15:44:33', '2022-04-07 20:22:12');
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
/*!40000 ALTER TABLE `compl_area_trabajo` DISABLE KEYS */;
INSERT IGNORE INTO `compl_area_trabajo` (`id`, `coartra_nombre`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `compl_cine_detallado` DISABLE KEYS */;
INSERT IGNORE INTO `compl_cine_detallado` (`id`, `cocide_nombre`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `compl_componente_plan` DISABLE KEYS */;
INSERT IGNORE INTO `compl_componente_plan` (`id`, `cocopa_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Disciplinar', '2022-04-22 15:44:33', '2022-04-07 20:19:37'),
	(2, 'Básico', '2022-04-22 15:44:33', '2022-04-07 20:19:50'),
	(3, 'Genérico', '2022-04-22 15:44:33', '2022-04-07 20:20:02');
/*!40000 ALTER TABLE `compl_componente_plan` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_empresa
CREATE TABLE IF NOT EXISTS `compl_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nit` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_empresa: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `compl_empresa` DISABLE KEYS */;
INSERT IGNORE INTO `compl_empresa` (`id`, `razon_social`, `nit`, `pais`, `departamento`, `ciudad`, `direccion`, `telefono`, `url`, `correo`, `area`, `created_at`, `updated_at`) VALUES
	(2, 'Fundación Universitaria de San Gil Unisangil', '8001528404', 'Colombia', 'Casanare', 'Yopal', 'Km 2 vía Matepantano', '3106281503', 'https://www.unisangil.edu.co/', 'atencionciudadano@unisangil.edu.co', 'Educación', '2022-04-22 15:44:33', '2022-04-22 06:29:57'),
	(3, 'Alcaldía del Municipio de Yopal', '8918550177', 'Colombia', 'Casanare', 'Yopal', 'Diagonal 15 # 15-21', '6345913', 'http://www.yopal-casanare.gov.co/', 'direcciontic@yopal-casanare.gov.co', 'nn', '2022-04-22 15:44:33', '2022-04-22 06:32:43'),
	(4, 'Gobernación de Casanare', '8920992166', 'Colombia', 'Casanare', 'Yopal', 'Cra. 20 No. 08- 02', '6086336339', 'https://www.casanare.gov.co/Paginas/default.aspx', 'correspondencia@casanare.gov.co', 'nn', '2022-04-22 15:44:33', '2022-04-22 06:34:20'),
	(5, 'Servicio Nacional de Aprendizaje SENA', '8999990341', 'Colombia', 'Casanare', 'Yopal', 'Cra. 19 No. 36 - 68 Yopal', '6356017', 'https://www.sena.edu.co/', 'atencionciudadano@sena.edu.co', 'Educación', '2022-04-22 15:44:33', '2022-04-22 06:35:52');
/*!40000 ALTER TABLE `compl_empresa` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.compl_entidad_nacional
CREATE TABLE IF NOT EXISTS `compl_entidad_nacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coenna_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.compl_entidad_nacional: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `compl_entidad_nacional` DISABLE KEYS */;
INSERT IGNORE INTO `compl_entidad_nacional` (`id`, `coenna_nombre`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `compl_fuente_internacional` DISABLE KEYS */;
INSERT IGNORE INTO `compl_fuente_internacional` (`id`, `cofuin_nombre`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `compl_fuente_nacional` DISABLE KEYS */;
INSERT IGNORE INTO `compl_fuente_nacional` (`id`, `cofuna_nombre`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `compl_nivel_estudio` DISABLE KEYS */;
INSERT IGNORE INTO `compl_nivel_estudio` (`id`, `conies_nombre`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `compl_poblacion_condicion` DISABLE KEYS */;
INSERT IGNORE INTO `compl_poblacion_condicion` (`id`, `copoco_nombre`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `compl_poblacion_grupo` DISABLE KEYS */;
INSERT IGNORE INTO `compl_poblacion_grupo` (`id`, `copogr_nombre`, `created_at`, `updated_at`) VALUES
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
/*!40000 ALTER TABLE `compl_sector` DISABLE KEYS */;
INSERT IGNORE INTO `compl_sector` (`id`, `cose_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Sector empresarial', '2022-02-28 17:51:47', NULL),
	(2, 'Sector administración pública', '2022-02-28 17:52:05', NULL),
	(3, 'Centros de investigación y desarrollo tecnológico', '2022-02-28 17:52:23', NULL),
	(4, 'Hospitales y clinicas', '2022-02-28 17:52:36', '2022-02-28 17:52:36'),
	(5, 'Instituciones privadas sin ánimo de lucro', '2022-02-28 17:52:57', NULL),
	(6, 'Instituciones de educación', '2022-02-28 17:53:10', NULL),
	(7, 'Comunidad', '2022-02-28 17:53:17', NULL),
	(8, 'Otro', '2022-02-28 17:53:21', NULL);
/*!40000 ALTER TABLE `compl_sector` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.convenio
CREATE TABLE IF NOT EXISTS `convenio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `con_numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_alcance` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_institucion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_nit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_direccion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `con_ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_contacto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `con_correo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `con_telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `con_objeto` text COLLATE utf8_unicode_ci NOT NULL,
  `con_logro_resultado` text COLLATE utf8_unicode_ci NOT NULL,
  `con_vigencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `con_programa_beneficiado` text COLLATE utf8_unicode_ci NOT NULL,
  `con_actividad_year_programa` text COLLATE utf8_unicode_ci NOT NULL,
  `con_fecha_inicio` date NOT NULL,
  `con_fecha_final` date NOT NULL,
  `con_observacion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.convenio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `convenio` DISABLE KEYS */;
/*!40000 ALTER TABLE `convenio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.departamento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT IGNORE INTO `departamento` (`id`, `dep_nombre`, `created_at`, `updated_at`) VALUES
	(6, 'Casanare', NULL, NULL),
	(8, 'Santander', '2022-04-21 20:44:27', '2022-04-21 20:44:27');
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
  CONSTRAINT `FK_docente_persona` FOREIGN KEY (`id_persona_docente`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT IGNORE INTO `docente` (`id`, `id_persona_docente`, `ciudad_procedencia`, `correo_personal`, `dedicacion`, `tipo_contratacion`, `fecha_vinculacion`, `eps`, `institucion_esp`, `certificado_esp`, `institucion_dip`, `certificado_dip`, `titulo_pregrado`, `institucion_pre`, `titulo_especializacion`, `institucion_espe`, `titulo_maestria`, `institucion_mae`, `titulo_doctorado`, `institucion_doc`, `area_conocimiento`, `maximo_nivel_formacion`, `titulo_maximo_nivel`, `institucion_maximo_nivel`, `modalidad_programa`, `riesgo`, `caja_compensacion`, `banco`, `no_cuenta`, `pension`, `estado`, `soporte_hoja_vida`, `documentos_compl`, `id_proceso`, `created_at`, `updated_at`) VALUES
	(5, 23, 'Yopal', 'bibiana.ortegon@hotmail.com', 'tiemplo-completo', 'contrato-a-termino-fijo', '2015-02-02', 'Sanitas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sura', 'Confacasanare', 'Caja Social', '1234556789', 'Positiva', 'activo', NULL, NULL, 2, NULL, NULL),
	(7, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(8, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(9, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(10, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(11, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(12, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(13, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(14, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(15, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(16, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(17, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.docente_asignatura
CREATE TABLE IF NOT EXISTS `docente_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docasi_id_docente` int(11) NOT NULL,
  `docasi_id_asignatura` int(11) NOT NULL,
  `docasi_numero_hora_docencia` int(11) NOT NULL,
  `docasi_numero_hora_investigacion` int(11) NOT NULL,
  `docasi_numero_hora_extension` int(11) NOT NULL,
  `docasi_numero_hora_administrativas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docente_asignatura_persona` (`docasi_id_docente`),
  KEY `FK_docente_asignatura_programa_plan_estudio_asignatura` (`docasi_id_asignatura`),
  CONSTRAINT `FK_docente_asignatura_persona` FOREIGN KEY (`docasi_id_docente`) REFERENCES `persona` (`id`),
  CONSTRAINT `FK_docente_asignatura_programa_plan_estudio_asignatura` FOREIGN KEY (`docasi_id_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  CONSTRAINT `FK_docente_contrato_persona` FOREIGN KEY (`doco_persona_docente`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente_contrato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `docente_contrato` DISABLE KEYS */;
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
  CONSTRAINT `FK_docente_evaluacion_persona` FOREIGN KEY (`doe_persona_docente`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente_evaluacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `docente_evaluacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente_evaluacion` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.docente_visitante
CREATE TABLE IF NOT EXISTS `docente_visitante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docvi_tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_numero_documento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_entidad_origen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_fecha_estadia` date NOT NULL,
  `docvi_cantidad_hora` double NOT NULL,
  `docvi_cantidad_dia` double NOT NULL,
  `docvi_cantidad_semana` double NOT NULL,
  `docvi_cantidad_mes` double NOT NULL,
  `docvi_cantidad_year` double NOT NULL,
  `docvi_objeto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_actividad_desarrolladas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_year` int(11) NOT NULL,
  `docvi_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_url_soporte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_tipo_usuario` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente_visitante: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `docente_visitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente_visitante` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estu_id_estudiante` int(11) NOT NULL,
  `estu_programa` int(11) DEFAULT NULL,
  `estu_programa_plan` int(11) DEFAULT NULL,
  `estu_telefono2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_correo_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_colegio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_estrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_fecha_nacimiento` date DEFAULT NULL,
  `estu_fecha_expedicion` date DEFAULT NULL,
  `estu_sexo` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_estado_civil` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_ingreso` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_periodo_ingreso` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_ult_matricula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_semestre` int(11) DEFAULT NULL,
  `estu_financiamiento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_entidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_tipo_matricula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_matricula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_pga` double DEFAULT NULL,
  `estu_reconocimiento` int(11) DEFAULT NULL,
  `estu_egresado` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_administrativo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_cargo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_dependencia` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_fecha_ingreso` date DEFAULT NULL,
  `estu_no_contrato` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_fecha_final` date DEFAULT NULL,
  `estu_estado_cargo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estudiante_programa` (`estu_programa`),
  KEY `FK_estudiante_programa_plan_estudio` (`estu_programa_plan`),
  KEY `FK_estudiante_persona` (`estu_id_estudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.estudiante: ~105 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT IGNORE INTO `estudiante` (`id`, `estu_id_estudiante`, `estu_programa`, `estu_programa_plan`, `estu_telefono2`, `estu_direccion`, `estu_correo_personal`, `estu_colegio`, `estu_estrato`, `estu_fecha_nacimiento`, `estu_fecha_expedicion`, `estu_sexo`, `estu_estado_civil`, `estu_ingreso`, `estu_periodo_ingreso`, `estu_ult_matricula`, `estu_semestre`, `estu_financiamiento`, `estu_entidad`, `estu_estado`, `estu_tipo_matricula`, `estu_matricula`, `estu_pga`, `estu_reconocimiento`, `estu_egresado`, `estu_administrativo`, `estu_cargo`, `estu_dependencia`, `estu_fecha_ingreso`, `estu_no_contrato`, `estu_fecha_final`, `estu_estado_cargo`, `created_at`, `updated_at`) VALUES
	(15, 22, 3, 2, '3223342408', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017', '2017-1', NULL, 10, NULL, NULL, 'egresado-no-graduado', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 25, 3, 2, '3224026959', 'Calle 24 No. 28-109', NULL, NULL, '4', '1999-03-21', '2017-06-09', 'M', 'soltero(a)', '2019', '2019-2', '2022-1', 8, 'de-contado', NULL, 'activo', 'antiguo', 'pagado', 4.12, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, 26, 3, 2, '3204723615', 'Vereda la Vega', NULL, NULL, '2', '1997-05-14', '2015-06-09', 'F', 'soltero(a)', '2018', '2018-1', '2022-1', 9, 'beca', 'Talento TI', 'activo', 'antiguo', 'pagado', 3.94, 1, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 27, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 41, 3, 2, '3124656896', NULL, 'danielacero@unisangil.edu.co', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-1', 10, NULL, NULL, 'activo', NULL, NULL, 0, 0, NULL, 'Si', 'Practicante laboratorio', 'Sistemas', '2022-02-21', '12345', '2022-10-21', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(21, 42, 3, 2, '', '', 'julianacevedo122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-2', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, 43, 3, 2, '', '', 'lauraaguilar219@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-3', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 44, 3, 2, '', '', 'luisaguilar@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-4', 6, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, 45, 3, 2, '', '', 'efrenalarcon@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-5', 7, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(25, 46, 3, 2, '', '', 'leonelaalfaro@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-6', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(26, 47, 3, 2, '', '', 'elianaalvarado1@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-7', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(27, 48, 3, 2, '', '', 'samuelalvarez122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-8', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(28, 49, 3, 2, '', '', 'faridamaya@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-9', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(29, 50, 3, 2, '', '', 'jhonatanamezquita121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-10', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(30, 51, 3, 2, '', '', 'angelicaamezquita@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-11', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(31, 52, 3, 2, '', '', 'brayanaponte120@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-12', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(32, 53, 3, 2, '', '', 'carlosarango121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-13', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(33, 54, 3, 2, '', '', 'adrianaardila@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-14', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(34, 55, 3, 2, '', '', 'geinerdarevalo@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-15', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(35, 56, 3, 2, '', '', 'sebasbaron@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-16', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(36, 57, 3, 2, '', '', 'maironbaron@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-17', 6, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(37, 58, 3, 2, '', '', 'juanjosebohorquez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-18', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(38, 59, 3, 2, '', '', 'juanborda@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-19', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(39, 60, 3, 2, '', '', 'santiagochagueza122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-20', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(40, 61, 3, 2, '', '', 'andreschaparro@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-21', 3, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(41, 62, 3, 2, '', '', 'johancipagauta121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-22', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(42, 63, 3, 2, '', '', 'edinsoncorredor@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-23', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(43, 64, 3, 2, '', '', 'andersondaza@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-24', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(44, 65, 3, 2, '', '', 'yethtizdiaz121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-25', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(45, 66, 3, 2, '', '', 'jhondominguez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-26', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(46, 67, 3, 2, '', '', 'michaelseb2609@gmail.com', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-27', 7, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(47, 68, 3, 2, '', '', 'thainalyenriquez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-28', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(48, 69, 3, 2, '', '', 'lizethespinel@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-29', 4, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(49, 70, 3, 2, '', '', 'heracliofuentes@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-30', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(50, 71, 3, 2, '', '', 'yilmergaitan219@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-31', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(51, 73, 3, 2, '', '', 'juangalindo122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-33', 1, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(52, 74, 3, 2, '', '', 'auragarcia@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-34', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(53, 75, 3, 2, '', '', 'mariagarcia121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-35', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(54, 76, 3, 2, '', '', 'davidgarcia@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-36', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(55, 77, 3, 2, '', '', 'joanorjuela@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-37', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(56, 78, 3, 2, '', '', 'omaryesid@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-38', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(57, 79, 3, 2, '', '', 'camilogarzon122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-39', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(58, 80, 3, 2, '', '', 'edwingaviria@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-40', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(59, 81, 3, 2, '', '', 'alexisgonzalez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-41', 7, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(60, 82, 3, 2, '', '', 'angelagonzalezprieto@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-42', 7, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(61, 83, 3, 2, '', '', 'yeinergonzalez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-43', 7, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(62, 84, 3, 2, '', '', 'joseguais@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-44', 7, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(63, 85, 3, 2, '', '', 'diegoguerrero121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-45', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(64, 86, 3, 2, '', '', 'marianancygutierrez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-46', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(65, 87, 3, 2, '', '', 'jhonatanhernandez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-47', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(66, 88, 3, 2, '', '', 'cristianhernandezzambrano@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-48', 6, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(67, 89, 3, 2, '', '', 'juanhillon@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-49', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(68, 90, 3, 2, '', '', 'jeanndryibica@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-50', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(69, 91, 3, 2, '', '', 'luisdiegoladino@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-51', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(70, 92, 3, 2, '', '', 'andreslancheros221@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-52', 1, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(71, 93, 3, 2, '', '', 'mayerlilargo220@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-53', 3, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(72, 94, 3, 2, '', '', 'adrianlatriglia122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-54', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(73, 95, 3, 2, '', '', 'jeissonlaverde@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-55', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(74, 96, 3, 2, '', '', 'marlonlazaro@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-56', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(75, 97, 3, 2, '', '', 'luislinares221@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-57', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(76, 98, 3, 2, '', '', 'marialinares@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-58', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(77, 99, 3, 2, '', '', 'edwinlinan122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-59', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(78, 100, 3, 2, '', '', 'mateolombana122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-60', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(79, 101, 3, 2, '', '', 'laurakatherinemartinez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-61', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(80, 102, 3, 2, '', '', 'danielmartinez221@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-62', 1, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(81, 103, 3, 2, '', '', 'anyipaola96@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-63', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(82, 104, 3, 2, '', '', 'cristianmoreno219@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-64', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(83, 105, 3, 2, '', '', 'sneyderordonez122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-65', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(84, 106, 3, 2, '', '', 'andresortega@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-66', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(85, 107, 3, 2, '', '', 'jaimepacheco@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-67', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(86, 108, 3, 2, '', '', 'wilfredopaez201@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-68', 4, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(87, 109, 3, 2, '', '', 'miguelpatino@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-69', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(88, 110, 3, 2, '', '', 'durianperea201@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-70', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(89, 111, 3, 2, '', '', 'elinperez1@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-71', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(90, 112, 3, 2, '', '', 'lorenaperezvargas@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-72', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(91, 113, 3, 2, '', '', 'juannicolaspineda@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-73', 6, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(92, 114, 3, 2, '', '', 'juanpintocarrillo@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-74', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(93, 115, 3, 2, '', '', 'dariopulgarin122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-75', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(94, 116, 3, 2, '', '', 'julioquintero@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-76', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(95, 117, 3, 2, '', '', 'jhonatanrincon221@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-77', 7, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(96, 118, 3, 2, '', '', 'mariarivera201@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-78', 4, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(97, 119, 3, 2, '', '', 'mateorobayo121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-79', 1, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(98, 120, 3, 2, '', '', 'juanrodriguez122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-80', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(99, 121, 3, 2, '', '', 'henryrodriguez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-81', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(100, 122, 3, 2, '', '', 'kenerrodriguez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-82', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(101, 123, 3, 2, '', '', 'damianrodriguez121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-83', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(102, 124, 3, 2, '', '', 'sergiorodriguezpedraza@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-84', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(104, 126, 3, 2, '', '', 'pedroromero@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-86', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(105, 127, 3, 2, '', '', 'oscarsanabria@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-87', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(106, 128, 3, 2, '', '', 'sneidersanchez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-88', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(107, 129, 3, 2, '', '', 'karensanchezperez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-89', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(108, 130, 3, 2, '', '', 'cristiansanchez@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-90', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(109, 131, 3, 2, '', '', 'yenylemus@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-91', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(110, 132, 3, 2, '', '', 'andressantos@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-92', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(111, 133, 3, 2, '', '', 'oscarsilva@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-93', 7, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(112, 134, 3, 2, '', '', 'juansuarez122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-94', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(113, 135, 3, 2, '', '', 'daniloandres@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-95', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(114, 136, 3, 2, '', '', 'oscartello201@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-96', 4, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(115, 137, 3, 2, '', '', 'jorgetinjaca@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-97', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(116, 138, 3, 2, '', '', 'jennifervalderrama@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-98', 9, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(117, 139, 3, 2, '', '', 'jesusvallecilla121@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-99', 2, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(118, 140, 3, 2, '', '', 'josevargas@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-100', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(119, 141, 3, 2, '', '', 'edwardvargas@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-101', 10, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(120, 142, 3, 2, '', '', 'brendavelandia@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-102', 8, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(121, 143, 3, 2, '', '', 'hugozuluaga@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-103', 6, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.estudiante_egresado
CREATE TABLE IF NOT EXISTS `estudiante_egresado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `este_id_estudiante` int(11) NOT NULL,
  `este_fecha_finalizacion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_promedio_acumulado` double DEFAULT NULL,
  `este_nombre_empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_sitio_trabajo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_tipo_contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_pais_residencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_ciudad_residencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estudiante_egresado_estudiante` (`este_id_estudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.estudiante_egresado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante_egresado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante_egresado` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.estudiante_reporte_general
CREATE TABLE IF NOT EXISTS `estudiante_reporte_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `esture_year` int(11) NOT NULL,
  `esture_id_programa` int(11) NOT NULL,
  `esture_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `esture_inscritos` int(11) NOT NULL,
  `esture_admitidos` int(11) NOT NULL,
  `esture_mat_antiguos` int(11) NOT NULL,
  `esture_mat_primer_semestre` int(11) NOT NULL,
  `esture_mat_total` int(11) NOT NULL,
  `esture_egresado_no_graduado` int(11) NOT NULL,
  `esture_graduados` int(11) NOT NULL,
  `esture_retirados` int(11) NOT NULL,
  `esture_tasa_desercion` int(11) NOT NULL,
  `esture_tasa_desercion_pro` int(11) NOT NULL,
  `esture_porcentaje_termina` int(11) NOT NULL,
  `esture_nro_estudiante_ies_nacional` int(11) NOT NULL,
  `esture_nro_estudiante_ies_internacional` int(11) NOT NULL,
  `esture_vis_nacional` int(11) NOT NULL,
  `esture_vis_internacional` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estudiante_reporte_general_programa` (`esture_id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.estudiante_reporte_general: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante_reporte_general` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante_reporte_general` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_actividad_cultural
CREATE TABLE IF NOT EXISTS `ext_actividad_cultural` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extcul_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_semestre` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_codigo_unidad_org` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_codigo_actividad` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_descripcion_actividad` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_tipo_actividad` int(11) NOT NULL,
  `extcul_fecha_inicio` date NOT NULL,
  `extcul_fecha_fin` date NOT NULL,
  `extcul_fuente_nacional` int(11) NOT NULL,
  `extcul_valor_financiacion_nac` int(11) NOT NULL,
  `extcul_nombre_institucion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_fuente_internacional` int(11) DEFAULT NULL,
  `extcul_pais_financiador` int(11) DEFAULT NULL,
  `extcul_valor_internacional` int(11) DEFAULT NULL,
  `extcul_persona` int(11) DEFAULT NULL,
  `extcul_dedicacion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_actividad_cultural_compl_fuente_nacional` (`extcul_fuente_nacional`),
  KEY `FK_ext_actividad_cultural_compl_fuente_internacional` (`extcul_fuente_internacional`),
  KEY `FK_ext_actividad_cultural_persona` (`extcul_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_actividad_cultural: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_actividad_cultural` DISABLE KEYS */;
INSERT IGNORE INTO `ext_actividad_cultural` (`id`, `extcul_year`, `extcul_semestre`, `extcul_codigo_unidad_org`, `extcul_codigo_actividad`, `extcul_descripcion_actividad`, `extcul_tipo_actividad`, `extcul_fecha_inicio`, `extcul_fecha_fin`, `extcul_fuente_nacional`, `extcul_valor_financiacion_nac`, `extcul_nombre_institucion`, `extcul_fuente_internacional`, `extcul_pais_financiador`, `extcul_valor_internacional`, `extcul_persona`, `extcul_dedicacion`, `created_at`, `updated_at`) VALUES
	(1, '2022', '2', '15', '8638-2021', 'Actividad cultural', 2, '2022-08-22', '2022-08-26', 8, 0, 'UNISANGIL', NULL, NULL, NULL, NULL, NULL, '2022-04-22 06:25:23', '2022-04-22 06:25:23');
/*!40000 ALTER TABLE `ext_actividad_cultural` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_consultoria
CREATE TABLE IF NOT EXISTS `ext_consultoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extcon_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcon_semestre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcon_codigo_consultoria` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcon_descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcon_id_cine_campo` int(11) NOT NULL,
  `extcon_nombre_entidad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_sector_consultoria` int(11) NOT NULL,
  `extcon_valor` int(11) NOT NULL,
  `extcon_fecha_inicio` date NOT NULL,
  `extcon_fecha_fin` date DEFAULT NULL,
  `extcon_fuente_nacional` int(11) DEFAULT NULL,
  `extcon_valor_nacional` int(11) DEFAULT NULL,
  `extcon_nombre_institucion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extcon_fuente_internacional` int(11) DEFAULT NULL,
  `extcon_pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extcon_valor_internacional` int(11) DEFAULT NULL,
  `extcon_id_persona` int(11) DEFAULT NULL,
  `extcon_id_nivel_estudio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_consultoria_compl_cine_detallado` (`extcon_id_cine_campo`),
  KEY `FK_ext_consultoria_compl_sector` (`ext_sector_consultoria`),
  KEY `FK_ext_consultoria_compl_fuente_nacional` (`extcon_fuente_nacional`),
  KEY `FK_ext_consultoria_compl_fuente_internacional` (`extcon_fuente_internacional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_consultoria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_consultoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_consultoria` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_curso
CREATE TABLE IF NOT EXISTS `ext_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extcurso_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_semestre` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_id_cine` int(11) NOT NULL,
  `extcurso_extension` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_estado` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_fecha` date NOT NULL,
  `extcurso_id_docente` int(11) NOT NULL DEFAULT 0,
  `extcurso_url_soporte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_curso_persona` (`extcurso_id_docente`),
  KEY `FK_ext_curso_compl_cine_detallado` (`extcurso_id_cine`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_curso: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_curso` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_educacion_continua
CREATE TABLE IF NOT EXISTS `ext_educacion_continua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extedu_semestre` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extedu_codigo_curso` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extedu_numero_horas` int(11) NOT NULL,
  `extedu_tipo_curso` int(11) NOT NULL,
  `extedu_valor_curso` int(11) NOT NULL,
  `extedu_id_docente` int(11) NOT NULL,
  `extedu_tipo_extension` int(11) NOT NULL,
  `extedu_cantidad` int(11) NOT NULL,
  `extedu_url_soporte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_educacion_continua_persona` (`extedu_id_docente`),
  KEY `FK_ext_educacion_continua_compl_area_extension` (`extedu_tipo_extension`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_educacion_continua: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_educacion_continua` DISABLE KEYS */;
INSERT IGNORE INTO `ext_educacion_continua` (`id`, `extedu_semestre`, `extedu_codigo_curso`, `extedu_numero_horas`, `extedu_tipo_curso`, `extedu_valor_curso`, `extedu_id_docente`, `extedu_tipo_extension`, `extedu_cantidad`, `extedu_url_soporte`, `created_at`, `updated_at`) VALUES
	(1, '2', 'EDC-Y-CNI-34-21', 4, 2, 0, 23, 1, 40, 'EDC-Y-CNI-34-21_2.zip', '2022-04-22 04:51:36', '2022-04-22 04:51:36');
/*!40000 ALTER TABLE `ext_educacion_continua` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_eventos_nac_inter
CREATE TABLE IF NOT EXISTS `ext_eventos_nac_inter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exevin_tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `exevin_year` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `exevin_periodo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `exevin_nombre_evento` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `exevin_fecha_inicio` date NOT NULL,
  `exevin_fecha_final` date NOT NULL,
  `exevin_lugar` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `exevin_sede` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `exevin_ponentes` text COLLATE utf8_unicode_ci NOT NULL,
  `exevin_institucion` text COLLATE utf8_unicode_ci NOT NULL,
  `exevin_pais` text COLLATE utf8_unicode_ci NOT NULL,
  `exevin_nombre_ponencia` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_eventos_nac_inter: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_eventos_nac_inter` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_eventos_nac_inter` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_eventos_virtuales
CREATE TABLE IF NOT EXISTS `ext_eventos_virtuales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exevir_nombre_evento` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `exevir_fecha_inicio` date NOT NULL,
  `exevir_fecha_fin` date NOT NULL,
  `exevir_enlace_ingreso` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `exevir_enlace_imagen` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exevir_nombre_ponente` text COLLATE utf8_unicode_ci NOT NULL,
  `exevir_institucion_origen` text COLLATE utf8_unicode_ci NOT NULL,
  `exevir_pais` text COLLATE utf8_unicode_ci NOT NULL,
  `exevir_nombre_ponencia` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_eventos_virtuales: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_eventos_virtuales` DISABLE KEYS */;
INSERT IGNORE INTO `ext_eventos_virtuales` (`id`, `exevir_nombre_evento`, `exevir_fecha_inicio`, `exevir_fecha_fin`, `exevir_enlace_ingreso`, `exevir_enlace_imagen`, `exevir_nombre_ponente`, `exevir_institucion_origen`, `exevir_pais`, `exevir_nombre_ponencia`, `created_at`, `updated_at`) VALUES
	(1, 'IES SEMINARIO INTERNACIONAL DE INGENIERIA', '2021-06-15', '2021-06-18', 'https://unisangil.edu.co/index.php?option=com_content&view=article&id=1682&Itemid=964', NULL, 'Ponente 1; Ponente 2;', 'Unisangil; UniBoyaca', 'Colombia', 'nn', '2022-04-22 07:11:48', '2022-04-22 07:12:29');
/*!40000 ALTER TABLE `ext_eventos_virtuales` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_internacionalizacion_curriculo
CREATE TABLE IF NOT EXISTS `ext_internacionalizacion_curriculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exincu_year` int(11) NOT NULL,
  `exincu_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exincu_id_asignatura` int(11) NOT NULL,
  `exincu_id_docente` int(11) NOT NULL,
  `ext_uso_idioma` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext_uso_tic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext_competencia_global` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext_movilidad_estudiante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext_otra_actividad` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_internacionalizacion_curriculo_programa_pa` (`exincu_id_asignatura`),
  KEY `FK_ext_internacionalizacion_curriculo_persona` (`exincu_id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_internacionalizacion_curriculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_internacionalizacion_curriculo` DISABLE KEYS */;
INSERT IGNORE INTO `ext_internacionalizacion_curriculo` (`id`, `exincu_year`, `exincu_periodo`, `exincu_id_asignatura`, `exincu_id_docente`, `ext_uso_idioma`, `ext_uso_tic`, `ext_competencia_global`, `ext_movilidad_estudiante`, `ext_otra_actividad`, `created_at`, `updated_at`) VALUES
	(1, 2022, '2', 40, 34, NULL, 'Metodologías medidadas por tic: clase espejo, coil, clases invertidas;Uso de recurso en linea de libre acceso: mooc, coursera, merlot, rie, upm, etc.', NULL, '10', 'no aplica', '2022-04-22 07:08:47', '2022-04-22 07:08:47');
/*!40000 ALTER TABLE `ext_internacionalizacion_curriculo` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_movilidad_internacional
CREATE TABLE IF NOT EXISTS `ext_movilidad_internacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exmointer_tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmointer_rol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmointer_id_sede_or` int(11) NOT NULL,
  `exmointer_id_facultad_or` int(11) NOT NULL,
  `exmointer_id_programa_or` int(11) NOT NULL,
  `exmointer_id_persona` int(11) NOT NULL,
  `exmointer_pais_des` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmointer_ciudad_des` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmointer_institucion_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmointer_tipo_movilidad` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmointer_descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmointer_fecha_inicio` date NOT NULL,
  `exmointer_fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_movilidad_internacional_municipio` (`exmointer_id_sede_or`),
  KEY `FK_ext_movilidad_internacional_facultad` (`exmointer_id_facultad_or`),
  KEY `FK_ext_movilidad_internacional_programa` (`exmointer_id_programa_or`),
  KEY `FK_ext_movilidad_internacional_persona` (`exmointer_id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_movilidad_internacional: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_movilidad_internacional` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_movilidad_internacional` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_movilidad_intersede
CREATE TABLE IF NOT EXISTS `ext_movilidad_intersede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exmoin_tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmoin_rol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmoin_id_sede_or` int(11) NOT NULL,
  `exmoin_id_facultad_or` int(11) NOT NULL,
  `exmoin_id_programa_or` int(11) NOT NULL,
  `exmoin_id_sede_des` int(11) NOT NULL,
  `exmoin_id_facultad_des` int(11) NOT NULL,
  `exmoin_id_programa_des` int(11) NOT NULL,
  `exmoin_id_persona` int(11) NOT NULL,
  `exmoin_tipo_movilidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmoin_descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmoin_fecha_inicio` date NOT NULL,
  `exmoin_fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_movilidad_intersede_programa` (`exmoin_id_programa_or`),
  KEY `FK_ext_movilidad_intersede_municipio_3` (`exmoin_id_sede_or`),
  KEY `FK_ext_movilidad_intersede_facultad` (`exmoin_id_facultad_or`),
  KEY `FK_ext_movilidad_intersede_municipio_2` (`exmoin_id_sede_des`),
  KEY `FK_ext_movilidad_intersede_facultad_2` (`exmoin_id_facultad_des`),
  KEY `FK_ext_movilidad_intersede_programa_2` (`exmoin_id_programa_des`),
  KEY `FK_ext_movilidad_intersede_persona` (`exmoin_id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_movilidad_intersede: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_movilidad_intersede` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_movilidad_intersede` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_movilidad_nacional
CREATE TABLE IF NOT EXISTS `ext_movilidad_nacional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exmona_tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmona_rol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmona_id_sede` int(11) NOT NULL,
  `exmona_id_facultad` int(11) NOT NULL,
  `exmona_id_programa` int(11) NOT NULL,
  `exmona_id_persona` int(11) NOT NULL,
  `exmona_institucion_proviene` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmona_tipo_movilidad` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmona_descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmona_fecha_inicio` date NOT NULL,
  `exmona_fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_movilidad_nacional_programa` (`exmona_id_programa`),
  KEY `FK_ext_movilidad_nacional_facultad` (`exmona_id_facultad`),
  KEY `FK_ext_movilidad_nacional_municipio` (`exmona_id_sede`),
  KEY `FK_ext_movilidad_nacional_persona` (`exmona_id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_movilidad_nacional: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_movilidad_nacional` DISABLE KEYS */;
INSERT IGNORE INTO `ext_movilidad_nacional` (`id`, `exmona_tipo`, `exmona_rol`, `exmona_id_sede`, `exmona_id_facultad`, `exmona_id_programa`, `exmona_id_persona`, `exmona_institucion_proviene`, `exmona_tipo_movilidad`, `exmona_descripcion`, `exmona_fecha_inicio`, `exmona_fecha_final`, `created_at`, `updated_at`) VALUES
	(2, 'entrante', 'estudiante', 6, 6, 3, 22, 'UNISANGIL', 'Curso corto', 'Movilidad por curso de 50 horas', '2022-04-25', '2022-05-06', '2022-04-22 07:10:35', '2022-04-22 07:10:35');
/*!40000 ALTER TABLE `ext_movilidad_nacional` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_participacion_eventos
CREATE TABLE IF NOT EXISTS `ext_participacion_eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expaev_year` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `expaev_periodo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `expaev_tipo_evento` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `expaev_nombre_evento` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `expaev_fecha` date NOT NULL,
  `expaev_organizador` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `expaev_id_persona` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_participacion_eventos_persona` (`expaev_id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_participacion_eventos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_participacion_eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_participacion_eventos` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_participante
CREATE TABLE IF NOT EXISTS `ext_participante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dop_id_docente` int(11) NOT NULL,
  `dop_fecha_expedicion` date NOT NULL,
  `dop_sexo_biologico` int(11) NOT NULL,
  `dop_estado_civil` int(11) NOT NULL,
  `dop_id_pais` int(11) NOT NULL,
  `dop_id_municipio` int(11) NOT NULL,
  `dop_correo_personal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dop_direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docente_participante_persona` (`dop_id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_participante: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_participante` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_participante` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_proyecto_extension
CREATE TABLE IF NOT EXISTS `ext_proyecto_extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extprex_year` int(11) NOT NULL,
  `extprex_semestre` int(11) NOT NULL,
  `extprex_codigo_organizacional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_codigo_pr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_nombre_pr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_descripcion_pr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_valor_pr` int(11) NOT NULL,
  `extprex_id_area_extension` int(11) NOT NULL,
  `extprex_fecha_inicio` date NOT NULL,
  `extprex_fecha_final` date NOT NULL,
  `extprex_nombre_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_apellido_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_correo_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_id_area_trabajo` int(11) DEFAULT NULL,
  `extprex_id_ciclo_vital` int(11) DEFAULT NULL,
  `extprex_id_entidad_nacional` int(11) DEFAULT NULL,
  `extprex_id_fuente_nacional` int(11) DEFAULT NULL,
  `extprex_valor_financiacion_nac` int(11) DEFAULT NULL,
  `extprex_id_fuente_internacional` int(11) DEFAULT NULL,
  `extprex_id_pais` int(11) DEFAULT NULL,
  `extprex_nombre_institucion_inter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extprex_valor_financiacion_inter` int(11) DEFAULT NULL,
  `extprex_nombre_otra_entidad` int(11) DEFAULT NULL,
  `extprex_id_sector_otra_entidad` int(11) DEFAULT NULL,
  `extprex_id_pais_otra_entidad` int(11) DEFAULT NULL,
  `extprex_id_poblacion_condicion` int(11) DEFAULT NULL,
  `extprex_cantidad_condicion` int(11) DEFAULT NULL,
  `extprex_id_poblacion_grupo` int(11) DEFAULT NULL,
  `extprex_cantidad_grupo` int(11) DEFAULT NULL,
  `extprex_soporte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_proyecto_extension_compl_area_extension` (`extprex_id_area_extension`),
  KEY `FK_ext_proyecto_extension_compl_area_trabajo` (`extprex_id_area_trabajo`),
  KEY `FK_ext_proyecto_extension_compl_sector` (`extprex_id_sector_otra_entidad`),
  KEY `FK_ext_proyecto_extension_compl_poblacion_condicion` (`extprex_id_poblacion_condicion`),
  KEY `FK_ext_proyecto_extension_compl_poblacion_grupo` (`extprex_id_poblacion_grupo`),
  KEY `FK_ext_proyecto_extension_compl_entidad_nacional` (`extprex_id_entidad_nacional`),
  KEY `FK_ext_proyecto_extension_compl_fuente_nacional` (`extprex_id_fuente_nacional`),
  KEY `FK_ext_proyecto_extension_compl_fuente_internacional` (`extprex_id_fuente_internacional`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_proyecto_extension: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_proyecto_extension` DISABLE KEYS */;
INSERT IGNORE INTO `ext_proyecto_extension` (`id`, `extprex_year`, `extprex_semestre`, `extprex_codigo_organizacional`, `extprex_codigo_pr`, `extprex_nombre_pr`, `extprex_descripcion_pr`, `extprex_valor_pr`, `extprex_id_area_extension`, `extprex_fecha_inicio`, `extprex_fecha_final`, `extprex_nombre_contacto`, `extprex_apellido_contacto`, `extprex_telefono_contacto`, `extprex_correo_contacto`, `extprex_id_area_trabajo`, `extprex_id_ciclo_vital`, `extprex_id_entidad_nacional`, `extprex_id_fuente_nacional`, `extprex_valor_financiacion_nac`, `extprex_id_fuente_internacional`, `extprex_id_pais`, `extprex_nombre_institucion_inter`, `extprex_valor_financiacion_inter`, `extprex_nombre_otra_entidad`, `extprex_id_sector_otra_entidad`, `extprex_id_pais_otra_entidad`, `extprex_id_poblacion_condicion`, `extprex_cantidad_condicion`, `extprex_id_poblacion_grupo`, `extprex_cantidad_grupo`, `extprex_soporte`, `created_at`, `updated_at`) VALUES
	(1, 2022, 10, '15', '001', 'Plataforma Web para la gestión de información en el control de procesos académicos – administrativos del programa Ingeniería de Sistemas Unisangil sede Yopal', 'Plataforma Web para la gestión de información en el control de procesos académicos – administrativos del programa Ingeniería de Sistemas Unisangil sede Yopal', 0, 2, '2022-04-21', '2022-04-22', 'Michael', 'Rodriguez', '3223342408', 'maicolr62@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-22 07:05:47', '2022-04-22 07:05:47');
/*!40000 ALTER TABLE `ext_proyecto_extension` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_registro_fotografico_inter
CREATE TABLE IF NOT EXISTS `ext_registro_fotografico_inter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extrefoin_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_tipo_actividad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_actividad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_ente_organizador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_fecha` date NOT NULL,
  `extrefoin_tipo_evento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_tipo_modalidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_soporte` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_registro_fotografico_inter: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_registro_fotografico_inter` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_registro_fotografico_inter` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_sector_externo_organizaciones
CREATE TABLE IF NOT EXISTS `ext_sector_externo_organizaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exseor_year` int(11) NOT NULL,
  `exseor_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_caracter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_fecha` date NOT NULL,
  `exseor_actividades` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_logros` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_resultados` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_productos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_funcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_participantes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_sector_externo_organizaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_sector_externo_organizaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_sector_externo_organizaciones` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_sector_externo_organizaciones_part
CREATE TABLE IF NOT EXISTS `ext_sector_externo_organizaciones_part` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exseorpar_id_organizacion` int(11) NOT NULL,
  `exseorpar_numero_identificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseorpar_nombre_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseorpar_rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_sector_externo_organizaciones` (`exseorpar_id_organizacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_sector_externo_organizaciones_part: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_sector_externo_organizaciones_part` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_sector_externo_organizaciones_part` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_sector_externo_red_academia_convenio
CREATE TABLE IF NOT EXISTS `ext_sector_externo_red_academia_convenio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exsered_year` int(11) NOT NULL,
  `exsered_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_ies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_caracter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_fecha` date NOT NULL,
  `exsered_logros` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_resultados` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_productos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_funcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_participantes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_sector_externo_red_academia_convenio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_sector_externo_red_academia_convenio` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_sector_externo_red_academia_convenio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_sector_externo_red_academia_convenio_participantes
CREATE TABLE IF NOT EXISTS `ext_sector_externo_red_academia_convenio_participantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exseredpar_id_red_academica` int(11) NOT NULL,
  `exseredpar_numero_identificacion` int(11) NOT NULL,
  `exseredpar_nombre_participante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseredpar_rol_participante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_sector_externo_red_academia` (`exseredpar_id_red_academica`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_sector_externo_red_academia_convenio_participantes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_sector_externo_red_academia_convenio_participantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_sector_externo_red_academia_convenio_participantes` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_servicio_extension
CREATE TABLE IF NOT EXISTS `ext_servicio_extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extseex_year` int(11) NOT NULL,
  `extseex_semestre` int(11) NOT NULL,
  `extseex_codigo_organizacional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_codigo_ser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_nombre_ser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_descripcion_ser` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_valor_ser` int(11) NOT NULL,
  `extseex_id_area_extension` int(11) NOT NULL,
  `extseex_fecha_inicio` date NOT NULL,
  `extseex_fecha_final` date NOT NULL,
  `extseex_nombre_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_apellido_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_telefono_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_correo_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_costo` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_criterio_elegibilidad` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_id_area_trabajo` int(11) DEFAULT NULL,
  `extseex_id_ciclo_vital` int(11) DEFAULT NULL,
  `extseex_id_entidad_nacional` int(11) DEFAULT NULL,
  `extseex_id_fuente_nacional` int(11) DEFAULT NULL,
  `extseex_valor_financiacion_nac` int(11) DEFAULT NULL,
  `extseex_id_fuente_internacional` int(11) DEFAULT NULL,
  `extseex_id_pais` int(11) DEFAULT NULL,
  `extseex_nombre_institucion_inter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extseex_valor_financiacion_inter` int(11) DEFAULT NULL,
  `extseex_nombre_otra_entidad` int(11) DEFAULT NULL,
  `extseex_id_sector_otra_entidad` int(11) DEFAULT NULL,
  `extseex_id_pais_otra_entidad` int(11) DEFAULT NULL,
  `extseex_id_poblacion_condicion` int(11) DEFAULT NULL,
  `extseex_cantidad_condicion` int(11) DEFAULT NULL,
  `extseex_id_poblacion_grupo` int(11) DEFAULT NULL,
  `extseex_cantidad_grupo` int(11) DEFAULT NULL,
  `extseex_soporte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_servicio_extension_compl_area_extension` (`extseex_id_area_extension`),
  KEY `FK_ext_servicio_extension_compl_area_trabajo` (`extseex_id_area_trabajo`),
  KEY `FK_ext_servicio_extension_compl_entidad_nacional` (`extseex_id_fuente_nacional`),
  KEY `FK_ext_servicio_extension_compl_fuente_internacional` (`extseex_id_fuente_internacional`),
  KEY `FK_ext_servicio_extension_compl_entidad_nacional_2` (`extseex_id_entidad_nacional`),
  KEY `FK_ext_servicio_extension_compl_sector` (`extseex_id_sector_otra_entidad`),
  KEY `FK_ext_servicio_extension_compl_poblacion_condicion` (`extseex_id_poblacion_condicion`),
  KEY `FK_ext_servicio_extension_compl_poblacion_grupo` (`extseex_id_poblacion_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_servicio_extension: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_servicio_extension` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_servicio_extension` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.facultad
CREATE TABLE IF NOT EXISTS `facultad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.facultad: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT IGNORE INTO `facultad` (`id`, `fac_nombre`, `created_at`, `updated_at`) VALUES
	(5, 'Ciencias Económicas y Administrativas', '2022-04-21 04:40:06', '2022-04-21 04:40:06'),
	(6, 'Ciencias Naturales e Ingeniería', '2022-04-21 04:40:15', '2022-04-21 04:40:15'),
	(7, 'Ciencias Jurídicas y Políticas', '2022-04-21 04:40:22', '2022-04-21 04:40:22'),
	(8, 'Ciencias de la Educación y de la Salud', '2022-04-21 04:40:29', '2022-04-21 04:40:29');
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

-- Volcando estructura para tabla proyecto.inv_grupo_investigacion
CREATE TABLE IF NOT EXISTS `inv_grupo_investigacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id_coordinador` int(11) NOT NULL,
  `inv_nombre_grupo` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_correo_institucional_grupo` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_codigo_minciencias` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_mision` text COLLATE utf8_unicode_ci NOT NULL,
  `inv_vision` text COLLATE utf8_unicode_ci NOT NULL,
  `inv_url_grupo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `inv_url_gruplac` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_area_conocimiento_principal` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_nucleo_conocimiento_nbc` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_sede` int(11) NOT NULL DEFAULT 0,
  `inv_facultad` int(11) NOT NULL DEFAULT 0,
  `inv_categoria_grupo` varchar(150) COLLATE utf8_unicode_ci DEFAULT '0',
  `inv_aval_minciencias` varchar(150) COLLATE utf8_unicode_ci DEFAULT '0',
  `inv_lineas_investigacion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_inv_grupo_investigacion_persona` (`inv_id_coordinador`),
  KEY `FK_inv_grupo_investigacion_municipio` (`inv_sede`),
  KEY `FK_inv_grupo_investigacion_facultad` (`inv_facultad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.inv_grupo_investigacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inv_grupo_investigacion` DISABLE KEYS */;
INSERT IGNORE INTO `inv_grupo_investigacion` (`id`, `inv_id_coordinador`, `inv_nombre_grupo`, `inv_correo_institucional_grupo`, `inv_codigo_minciencias`, `inv_mision`, `inv_vision`, `inv_url_grupo`, `inv_url_gruplac`, `inv_area_conocimiento_principal`, `inv_nucleo_conocimiento_nbc`, `inv_sede`, `inv_facultad`, `inv_categoria_grupo`, `inv_aval_minciencias`, `inv_lineas_investigacion`, `created_at`, `updated_at`) VALUES
	(1, 36, 'COMUNITIC', 'agomez@unisangil.edu.co', '000000', 'El grupo de investigación COMUNITIC, promueve la generación de una dinámica de trabajo basada en el trabajo de equipo y por medio de alianzas estratégicas con otros grupos de investigación, instituciones y empresas, con el fin de establecer transferencia de conocimiento y tecnología y generar valor agregado. A partir de 2013 el grupo de investigación empieza a apoyar y asesorar grupos de investigación de semilleros ondas, con la convicción de que el gusto por la investigación debe ser inculcado desde etapas tempranas. El grupo COMUNITIC se articula a nivel Departamental por medio del plan de gobierno de Casanare con el programa Fortalecimiento en Ciencia, Tecnología e Innovación para un crecimiento sostenible y competitivo que plantea implementar las tecnologías de información y comunicación como una nueva fuerza capaz de impulsar cambios socioeconómicos, que se articulan con los ecosistemas digitales, ecosistemas gobierno en línea, para estimular e inspeccionar espacios de formación, de una comunidad más activa, teniendo acceso a la conectividad digital, conexión a internet que permita desarrollar acciones destinadas a fortalecer la infraestructura tecnológica en sus principales componentes como son hardware, software, redes, conectividad y comunicaciones. Al grupo de investigación COMuniTIC se encuentran adscritos Los semilleros, DINAMUS - MAXWEL- IGEANT y COMUNITIC. Los cuales cuentan con participantes vinculados desde los programas de pregrado de Ingeniería de Sistemas y electrónica. COMUNITIC en 2019, tiene grandes objetivos de aporte a las cadenas de producción presentes en la región Casanareña, como respuesta a las problemática que hoy son visibles.', 'En el 2024, COMuniTIC será un grupo líder en Investigación, categoría A de Colciencias, articulado a semilleros contribuirá con el planteamiento, planificación, diseño y desarrollo de proyectos tecnológicos de información y comunicaciones en el Departamento de Casanare, siendo reconocidos como emprendedores con habilidades humanas y profesionales y con amplia trayectoria en el proceso de gestión y aplicación de las TIC para el desarrollo empresarial, educativo y social del departamento.', NULL, 'https://scienti.minciencias.gov.co/gruplac/jsp/visualiza/visualizagr.jsp?nro=00000000010652', 'Ciencias Naturales -- Computación y Ciencias de la Información -- Ciencias de la Computación', 'Ingeniería de sistemas, electrónica y afines', 6, 6, 'B con vigencia hasta la publicación de los resultados de la siguiente convocatoria', NULL, 'Automatización de procesos; Enseñanza de las ciencias en ingeniería; Robótica fija y movil; TIC; Telecomunicaciones', '2022-04-22 05:42:45', '2022-04-22 05:45:47');
/*!40000 ALTER TABLE `inv_grupo_investigacion` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.inv_investigador
CREATE TABLE IF NOT EXISTS `inv_investigador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inves_id_persona` int(11) NOT NULL,
  `inves_enlace_cvlac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inves_tipo_vinculacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inves_categoria` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inves_id_grupo` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_inv_investigador_inv_grupo_investigacion` (`inves_id_grupo`),
  KEY `FK_inv_investigador_persona` (`inves_id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.inv_investigador: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `inv_investigador` DISABLE KEYS */;
INSERT IGNORE INTO `inv_investigador` (`id`, `inves_id_persona`, `inves_enlace_cvlac`, `inves_tipo_vinculacion`, `inves_categoria`, `inves_id_grupo`, `created_at`, `updated_at`) VALUES
	(1, 23, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0000697613', 'Interno', 'n/a', 1, '2022-04-22 05:46:57', '2022-04-22 05:46:57'),
	(2, 40, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001557741', 'Interno', 'n/a', 1, '2022-04-22 05:47:26', '2022-04-22 05:47:26'),
	(3, 39, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001339506', 'Interno', 'n/a', 1, '2022-04-22 05:48:20', '2022-04-22 05:48:20');
/*!40000 ALTER TABLE `inv_investigador` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.inv_proyecto
CREATE TABLE IF NOT EXISTS `inv_proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invpro_id_grupo` int(11) NOT NULL,
  `invpro_titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invpro_resumen` text COLLATE utf8_unicode_ci NOT NULL,
  `invpro_impacto` text COLLATE utf8_unicode_ci NOT NULL,
  `invpro_lugar` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `invpro_resultados` text COLLATE utf8_unicode_ci NOT NULL,
  `invpro_fecha_inicio` date NOT NULL,
  `invpro_id_integrantes` text COLLATE utf8_unicode_ci NOT NULL,
  `invpro_palabras_clave` text COLLATE utf8_unicode_ci NOT NULL,
  `invpro_estado` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_inv_proyecto_inv_grupo_investigacion` (`invpro_id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.inv_proyecto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inv_proyecto` DISABLE KEYS */;
INSERT IGNORE INTO `inv_proyecto` (`id`, `invpro_id_grupo`, `invpro_titulo`, `invpro_resumen`, `invpro_impacto`, `invpro_lugar`, `invpro_resultados`, `invpro_fecha_inicio`, `invpro_id_integrantes`, `invpro_palabras_clave`, `invpro_estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Plataforma Web para la gestión de información en el control de procesos académicos – administrativos del programa Ingeniería de Sistemas Unisangil sede Yopal', 'Dentro de los procesos del que hacer de una institución de Educación superior está la obtención de sus registros calificados llevando a cabo las condiciones según el decreto 1330, posteriormente con el fin de sustentar la calidad en sus procesos opta por presentar acreditación en alta calidad. Ante esta situación un proceso acreditación espera la disposición y actitud de cada una de las áreas que la conforman para obtener la información y los datos de forma confiable y segura; la correcta captura, seguridad y gestión de la información permite agilización dichos procesos. \r\n\r\nEn vista de esto, actualmente la mayoría de instituciones no cuenta con un espacio para la centralización de la información de cada uno de sus programas académicos que oferta, dicha información es de vital importancia para la gestión en los procesos de acreditación de alta calidad, renovación de registros calificados, gestión de grupos de investigación, entre otros datos que brindan prestigio dentro de las instituciones de educación superior del país. Para la gestión de los procesos anteriormente mencionados es necesaria una gran cantidad de documentación, la cual, se torna dispendiosa su recolección y en algunas ocasiones imposible de generar trazabilidad de la misma.', 'A partir de esta necesidad, se planteó el desarrollo de proyecto “plataforma web para la gestión y control de información de procesos académicos y administrativos del programa ingeniería de sistemas Unisangil sede Yopal” con el fin de abordar esta problemática y brindarle una solución teniendo en cuenta cada uno los aspectos necesarios dentro de los procesos que impulsan la mejora de la universidad, enfocándose en una solución óptima, direccionada en la visualización por módulos teniendo en cuenta cada una de las que conforman UNISANGIL.', 'Yopal', 'Sitio web que permita la centralización de la formación del programa de ingeniería de sistemas', '2021-04-21', 'Angela Bibiana Ortegón Fuentes;Briham Farid Galan Parra', 'Larave; Php; Mysql; Centralizar', 'en-curso', '2022-04-22 05:53:49', '2022-04-22 17:20:47');
/*!40000 ALTER TABLE `inv_proyecto` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.laboratorio
CREATE TABLE IF NOT EXISTS `laboratorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_id_docente` int(11) NOT NULL,
  `lab_finalidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_id_facultad` int(11) NOT NULL,
  `lab_id_programa` int(11) NOT NULL,
  `lab_id_practicante` int(11) NOT NULL,
  `lab_nombre_practica` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_cantidad_estudiante` int(11) NOT NULL,
  `lab_id_software` int(11) NOT NULL,
  `lab_material` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_laboratorio_facultad` (`lab_id_facultad`),
  KEY `FK_laboratorio_programa` (`lab_id_programa`),
  KEY `FK_laboratorio_software` (`lab_id_software`),
  KEY `FK_laboratorio_persona` (`lab_id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.laboratorio: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT IGNORE INTO `laboratorio` (`id`, `lab_fecha`, `lab_nombre`, `lab_ubicacion`, `lab_id_docente`, `lab_finalidad`, `lab_id_facultad`, `lab_id_programa`, `lab_id_practicante`, `lab_nombre_practica`, `lab_cantidad_estudiante`, `lab_id_software`, `lab_material`, `lab_observaciones`, `created_at`, `updated_at`) VALUES
	(1, '2022-04-28', 'DISEÑO ASISTIDO POR COMPUTADOR PRACTICA ESPECIAL', 'LABORATORIO C-201', 32, 'FORMACIÓN', 6, 3, 41, 'Diseño asistido uso de herramientas en 3D', 10, 2, 'No aplica', 'No aplica', '2022-04-22 06:18:24', '2022-04-22 06:18:24'),
	(2, '2022-04-25', 'Programación orientadas a objetos con JAVA', 'LAB. C-202', 31, 'FORMACIÓN', 6, 3, 41, 'Pro y contras de la programación orientada a objetos en el siglo XXI', 10, 4, 'No aplica', 'No aplica', '2022-04-22 06:20:12', '2022-04-22 06:20:12');
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.metodologia
CREATE TABLE IF NOT EXISTS `metodologia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `met_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.metodologia: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `metodologia` DISABLE KEYS */;
INSERT IGNORE INTO `metodologia` (`id`, `met_nombre`, `created_at`, `updated_at`) VALUES
	(3, 'Presencial', NULL, NULL),
	(4, 'Virtual', NULL, NULL);
/*!40000 ALTER TABLE `metodologia` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.modalidad_grado
CREATE TABLE IF NOT EXISTS `modalidad_grado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.modalidad_grado: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `modalidad_grado` DISABLE KEYS */;
INSERT IGNORE INTO `modalidad_grado` (`id`, `mod_nombre`, `created_at`, `updated_at`) VALUES
	(10, 'Practica laboral', NULL, NULL),
	(11, 'Investigación formulación', '2022-04-21 16:47:48', '2022-04-21 16:47:48'),
	(12, 'Investigación ejecución', '2022-04-21 16:47:59', '2022-04-21 16:47:59'),
	(13, 'Desarrollo tecnológico curricular', '2022-04-21 16:48:17', '2022-04-21 16:48:17'),
	(14, 'Desarrollo tecnológico dirigido', '2022-04-21 16:48:31', '2022-04-21 16:48:31'),
	(15, 'Desarrollo Tecnológico para una empresa', '2022-04-21 16:48:41', '2022-04-21 16:48:41'),
	(16, 'Autogestión empresarial', '2022-04-21 16:48:48', '2022-04-21 16:48:48'),
	(17, 'Desarrollo tecnológico', '2022-04-21 16:47:36', '2022-04-21 16:47:36');
/*!40000 ALTER TABLE `modalidad_grado` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.movilidad
CREATE TABLE IF NOT EXISTS `movilidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movi_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_tipo_persona` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `movi_id_persona` int(11) NOT NULL,
  `movi_tipo_movilidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_evento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_movilidad_persona` (`movi_id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.movilidad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `movilidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `movilidad` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.municipio
CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mun_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mun_departamento` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_municipio_departamento` (`mun_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.municipio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT IGNORE INTO `municipio` (`id`, `mun_nombre`, `mun_departamento`, `created_at`, `updated_at`) VALUES
	(6, 'Yopal', 6, NULL, NULL);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.nivel_formacion
CREATE TABLE IF NOT EXISTS `nivel_formacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `niv_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.nivel_formacion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `nivel_formacion` DISABLE KEYS */;
INSERT IGNORE INTO `nivel_formacion` (`id`, `niv_nombre`, `created_at`, `updated_at`) VALUES
	(3, 'Pregrado', '2022-04-21 04:40:41', '2022-04-21 04:40:41'),
	(4, 'Especialización', '2022-04-21 04:40:48', '2022-04-21 04:40:48');
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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_departamento` int(11) DEFAULT 0,
  `per_ciudad` int(11) DEFAULT 0,
  `per_tipo_usuario` int(11) NOT NULL DEFAULT 0,
  `per_id_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persona_per_correo_unique` (`per_correo`),
  KEY `FK_persona_departamento` (`per_departamento`),
  KEY `FK_persona_tipo_usuario` (`per_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.persona: ~116 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT IGNORE INTO `persona` (`id`, `per_tipo_documento`, `per_numero_documento`, `per_nombre`, `per_apellido`, `per_telefono`, `per_correo`, `password`, `per_departamento`, `per_ciudad`, `per_tipo_usuario`, `per_id_estado`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(22, 'Cédula de ciudadania', '1006450866', 'Michael', 'Rodríguez', '3223342408', 'michaelrodriguezhernandez@unisangil.edu.co', '$2y$10$hqPVdg9vBBPnHmX3r.M0MeHMjgUBPmzlyVY9OL3ek.7S.da4LGk0O', 6, 6, 9, 'activo', NULL, NULL, NULL, '2022-04-22 21:11:39'),
	(23, 'Cédula de ciudadania', '23914069', 'Angela Bibiana', 'Ortegón Fuentes', '3107994000', 'abortegon@unisangil.edu.co', '$2y$10$d71nzJe4AHyY3xiOcuXFleQ4JVSgmEp7EwdL2n4o9BEmpfiXULMI2', 6, 6, 2, 'activo', NULL, NULL, NULL, '2022-04-21 20:08:19'),
	(25, 'Cédula de ciudadania', '1118574356', 'Briham Farid', 'Galan Parra', '3224026959', 'brihamgalan219@unisangil.edu.co', '$2y$10$t/KaG/14aoe7Y0OfJfixhugZOGToJfLm/Tve3T7QkmonpHKldYijS', 6, 6, 6, 'activo', NULL, NULL, NULL, NULL),
	(26, 'Cédula de ciudadania', '1118568249', 'Natalia', 'Rojas Segua', '3204723615', 'nataliarojassegue@unisangil.edu.co', '$2y$10$ViVgAt6R3BbmWZzdFfh9V.s2ItRuG2saUSvENIqxxRxsFCrC.aG9W', 6, 6, 6, 'activo', NULL, NULL, NULL, NULL),
	(30, 'Cedula de ciudadania', '9430456', 'Quevin Yohan', ' Barrera', '3103315501', 'Qbarrera@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(31, 'Cedula de ciudadania', '79138955', 'Simon Edgar', ' Gomez Gomez', '3102798710', 'sgomez@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(32, 'Cedula de ciudadania', '9433724', 'juan pablo', ' avila moreno', '3118546602', 'jpavila@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(33, 'Cédula de ciudadania', '33368581', 'ALDA YOLANDA', 'CARO MORENO', '3103599717', 'acaro@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(34, 'Cedula de ciudadania', '18263657', 'oscar Javier', ' Olivos', '3114689645', 'oolivos@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(35, 'Cedula de ciudadania', '34326249', 'PATRICIA EUGENIA', ' ESCOBAR MARTINEZ', '3214539093', 'pescobar@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(36, 'Cédula de ciudadania', '74859167', 'ABDIAS GÓMEZ', 'DUARTE', '3143752523', 'agomez@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-22 03:30:09'),
	(37, 'Cedula de ciudadania', '1016055925', 'Liliana Carolina', ' Luis Rincon ', '3143710309', 'lluis@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(38, 'Cedula de ciudadania', '52033575', 'YADIRA CLEMENCIA', ' MARTINEZ RODRIGUEZ', '3103481723', 'ymartinez1@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(39, 'Cedula de ciudadania', '63369149', 'Martha Judith', ' Lopez Pinzon ', '3124789956', 'Mlopez@gmail.com', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(40, 'Cedula de ciudadania', '5478348', 'ALEXIS OLVANY', ' TORRES CHAPETA', '3128782210', 'atorres@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-21 22:12:00', '2022-04-21 22:12:00'),
	(41, 'Cédula de ciudadania', '1001280760', 'DANIEL ALEJANDRO', 'ACERO ALMANZA', '3124656896', 'danielacero@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '2022-04-22 06:15:37'),
	(42, 'Tarjeta de identidad', '1058352100', 'JULIAN MAURICIO', 'ACEVEDO MORA', '3227459284', 'julianacevedo122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(43, 'Cédula de ciudadania', '1002756648', 'LAURA TATIANA', 'AGUILAR CASTAÑO', '3004530070', 'lauraaguilar219@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '2022-04-22 21:36:48'),
	(44, 'Cedula de ciudadania', '1007464524', 'LUIS FERNANDO', 'AGUILAR GIL', '3227295181', 'luisaguilar@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(45, 'Cedula de ciudadania', '1118571799', 'EFREN ENRIQUE', 'ALARCON CARDENAS', '3005211092', 'efrenalarcon@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(46, 'Cedula de ciudadania', '1115867051', 'LEONELA ', 'ALFARO RODRIGUEZ', '3106245814', 'leonelaalfaro@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(47, 'Cedula de ciudadania', '1116553567', 'ELIANA ', 'ALVARADO LOPEZ', '311589911', 'elianaalvarado1@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(48, 'Cedula de ciudadania', '1118528612', 'SAMUEL ', 'ALVAREZ VELANDIA', '3125833356', 'samuelalvarez122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(49, 'Cedula de ciudadania', '1118572868', 'FARID ALEXANDER', 'AMAYA SANABRIA', '3219540109', 'faridamaya@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(50, 'Cedula de ciudadania', '1006442896', 'JHONATAN DAVID', 'AMEZQUITA LEON', '3144631444', 'jhonatanamezquita121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(51, 'Cedula de ciudadania', '1116554445', 'ANGELICA MARCELA', 'AMEZQUITA NARANJO', '3224567882', 'angelicaamezquita@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(52, 'Cedula de ciudadania', '1007559926', 'BRAYAN ESTIVEN', 'APONTE MARTINEZ', '3209379943', 'brayanaponte120@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(53, 'Cedula de ciudadania', '1002740364', 'CARLOS FELIPE', 'ARANGO PINEDA', '3114403449', 'carlosarango121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(54, 'Cedula de ciudadania', '1116554235', 'ADRIANA LISSETH', 'ARDILA GAMEZ', '3123592932', 'adrianaardila@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(55, 'Cedula de ciudadania', '1006441955', 'GEINERD EXLEIMAR', 'AREVALO TORRES', '3224129493', 'geinerdarevalo@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(56, 'Cedula de ciudadania', '1118560361', 'JORGE SEBASTIAN', 'BARON CORREA', '3183247008', 'sebasbaron@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(57, 'Cedula de ciudadania', '1118532271', 'MAIRON ALEXANDER', 'BARON MOJICA', '3213258777', 'maironbaron@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(58, 'Cedula de ciudadania', '1118573247', 'JUAN JOSE', 'BOHORQUEZ CABRERA', '3128828401', 'juanjosebohorquez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(59, 'Cedula de ciudadania', '7366008', 'JUAN CARLOS', 'BORDA GUERRERO', '3227300808', 'juanborda@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(60, 'Cedula de ciudadania', '1061691968', 'SANTIAGO ANDRES', 'CHAGUEZA ACEVEDO', '3182207387', 'santiagochagueza122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(61, 'Cedula de ciudadania', '1118569467', 'ANDRES FELIPE', 'CHAPARRO GUIO', '3123625494', 'andreschaparro@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(62, 'Tarjeta de identidad', '1053604410', 'JOHAN STEVEEN', 'CIPAGAUTA OQUENDO', '3178005636', 'johancipagauta121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(63, 'Cedula de ciudadania', '1002537529', 'EDINSON RODOLFO', 'CORREDOR SALCEDO', '3187681056', 'edinsoncorredor@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(64, 'Cedula de ciudadania', '1000577325', 'ANDERSON ', 'DAZA ZUBIETA', '3204515390', 'andersondaza@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(65, 'Cedula de ciudadania', '1075299432', 'YETHTIZ TATIANA', 'DIAZ CABULO', '3202288501', 'yethtizdiaz121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(66, 'Cedula de ciudadania', '1116852037', 'JAIRO ', 'DOMINGUEZ JHON', '3144724315', 'jhondominguez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(67, 'Cedula de ciudadania', '1006555736', 'MICHAEL STIVEN', 'EGUE BURGOS', '3135015372', 'michaelseb2609@gmail.com', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(68, 'Cedula de ciudadania', '1118570634', 'THAINALY ', 'ENRIQUEZ GUERRERO', '3228462171', 'thainalyenriquez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(69, 'Cedula de ciudadania', '1118571189', 'LIZETH DAYANNA', 'ESPINEL VACCA', '3208254020', 'lizethespinel@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(70, 'Cedula de ciudadania', '1115850210', 'HERACLIO ', 'FUENTES FUENTES', '3118229445', 'heracliofuentes@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(71, 'Cedula de ciudadania', '1118574348', 'YILMER YESID', 'GAITAN PEREZ', '3114695508', 'yilmergaitan219@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(73, 'Cedula de ciudadania', '1003953066', 'JUAN NICOLAS', 'GALINDO VARGAS', '3108673228', 'juangalindo122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(74, 'Cedula de ciudadania', '1007420414', 'AURA YANETH', 'GARCIA ALFONSO', '3102562742', 'auragarcia@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(75, 'Cedula de ciudadania', '1002551486', 'MARIA JOSE', 'GARCIA FRANCO', '3224192181', 'mariagarcia121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(76, 'Cedula de ciudadania', '1006552853', 'DAVID FELIPE', 'GARCIA GONZALEZ', '3213343115', 'davidgarcia@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(77, 'Cedula de ciudadania', '74860405', 'JOAN ', 'GARCIA ORJUELA', '3163679224', 'joanorjuela@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(78, 'Cedula de ciudadania', '1116551664', 'OMAR YESID', 'GARCIA SUAREZ', '3207345009', 'omaryesid@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(79, 'Cedula de ciudadania', '1006442161', 'CAMILO ALEXANDER', 'GARZON MU', '3023662563', 'camilogarzon122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(80, 'Cedula de ciudadania', '1118565268', 'EDWIN ANDREY', 'GAVIRIA OVEJERO', '3106731599', 'edwingaviria@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(81, 'Cedula de ciudadania', '1118776177', 'ALEXIS ', 'GONZALEZ FRANCO', '3108046297', 'alexisgonzalez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(82, 'Cedula de ciudadania', '1006655955', 'ANGELA JULIETH', 'GONZALEZ PRIETO', '32324418929', 'angelagonzalezprieto@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(83, 'Cedula de ciudadania', '1118572836', 'YEINER ANDRES', 'GONZALEZ RIVEROS', '3112458317', 'yeinergonzalez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(84, 'Cedula de ciudadania', '74770039', 'CAMILO ', 'GUAIS JOSE', '3105625106', 'joseguais@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(85, 'Tarjeta de identidad', '1118531642', 'DIEGO ALEJANDRO', 'GUERRERO BOHORQUEZ', '3105520985', 'diegoguerrero121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(86, 'Cedula de ciudadania', '23726256', 'MARIA NANCY', 'GUTIERREZ PARRA', '3125545376', 'marianancygutierrez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(87, 'Cedula de ciudadania', '1007196533', 'JHONATAN LEONARDO', 'HERNANDEZ BAUTISTA', '3134640185', 'jhonatanhernandez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(88, 'Cedula de ciudadania', '1118574453', 'CRISTIAN DAVID', 'HERNANDEZ ZAMBRANO', '3143539230', 'cristianhernandezzambrano@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(89, 'Cedula de ciudadania', '1118558229', 'JUAN CAMILO', 'HILLON BECERRA', '3114912129', 'juanhillon@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(90, 'Cedula de ciudadania', '1116549229', 'JEANNDRY EDUAR', 'IBICA GOMEZ', '3112328159', 'jeanndryibica@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(91, 'Cedula de ciudadania', '1118570553', 'LUIS DIEGO', 'LADINO GUTIERREZ', '3123055474', 'luisdiegoladino@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(92, 'Tarjeta de identidad', '1118529887', 'ANDRES ALEJANDRO', 'LANCHEROS LESMES', '3115149026', 'andreslancheros221@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(93, 'Cedula de ciudadania', '1006342894', 'MAYERLI ', 'LARGO SALCEDO', '3177982227', 'mayerlilargo220@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(94, 'Cedula de ciudadania', '1007703745', 'ADRIAN NICOLY', 'LATRIGLIA CIPAGAUTA', '3203203000', 'adrianlatriglia122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(95, 'Cedula de ciudadania', '1118567790', 'JEISSON SEBASTIAN', 'LAVERDE LAVERDE', '3123436840', 'jeissonlaverde@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(96, 'Cedula de ciudadania', '1006558458', 'MARLON ALEXIS', 'LAZARO ROMERO', '3204690431', 'marlonlazaro@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(97, 'Cedula de ciudadania', '1006556125', 'LUIS EDUARDO', 'LINARES BARRETO', '3174654730', 'luislinares221@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(98, 'Cedula de ciudadania', '1118569231', 'MARIA CAMILA', 'LINARES PEREZ', '3213961897', 'marialinares@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(99, 'Cedula de ciudadania', '1117132019', 'EDWIN ERNESTO', 'LI', '3152856644', 'edwinlinan122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(100, 'Cedula de ciudadania', '1117326360', 'MATEO LEONARDO', 'LOMBANA ROJAS', '3212157320', 'mateolombana122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(101, 'Cedula de ciudadania', '1118572327', 'LAURA KATHERINE', 'MARTINEZ RODRIGUEZ', '3125217488', 'laurakatherinemartinez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(102, 'Tarjeta de identidad', '1118528623', 'DANIEL FELIPE', 'MARTINEZ VALBUENA', '3123039537', 'danielmartinez221@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(103, 'Cedula de ciudadania', '1118776026', 'ANYI PAOLA', 'MEDINA SOLER', '3112333909', 'anyipaola96@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(104, 'Cedula de ciudadania', '1118532688', 'CRISTIAN CAMILO', 'MORENO PEREZ', '3132620024', 'cristianmoreno219@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(105, 'Tarjeta de identidad', '1118530526', 'SNEYDER CAMILO', 'ORDO', '3114368376', 'sneyderordonez122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(106, 'Cedula de ciudadania', '1118560578', 'ANDRES FELIPE', 'ORTEGA RESTREPO', '3224558598', 'andresortega@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(107, 'Cedula de ciudadania', '1118574424', 'JAIME ALBERTO', 'PACHECO CORREDOR', '3132495888', 'jaimepacheco@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(108, 'Cedula de ciudadania', '1006424071', 'WILFREDO ', 'PAEZ RODRIGUEZ', '3124000154', 'wilfredopaez201@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(109, 'Cedula de ciudadania', '1118203963', 'MIGUEL ANGEL', 'PATI', '3183979779', 'miguelpatino@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(110, 'Cedula de ciudadania', '1123160545', 'DURIAN FERNEY', 'PEREA LOPEZ', '3206817541', 'durianperea201@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(111, 'Cedula de ciudadania', '1118562490', 'ELIN CRISTIANSEN', 'PEREZ RINCON', '3104887548', 'elinperez1@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(112, 'Cedula de ciudadania', '1116554936', 'LORENA MILETH', 'PEREZ VARGAS', '3144924186', 'lorenaperezvargas@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(113, 'Cedula de ciudadania', '1053348399', 'JUAN NICOLAS', 'PINEDA LEAL', '3202317695', 'juannicolaspineda@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(114, 'Cedula de ciudadania', '1001113498', 'JUAN SEBASTIAN', 'PINTO CARRILLO', '3102518055', 'juanpintocarrillo@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(115, 'Cedula de ciudadania', '1115720776', 'DARIO ENRIQUE', 'PULGARIN RAMIREZ', '3217071863', 'dariopulgarin122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(116, 'Cedula de ciudadania', '1118570290', 'JULIO CESAR', 'QUINTERO LEAL', '3202442867', 'julioquintero@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(117, 'Cedula de ciudadania', '1118558030', 'JHONATAN ALEXANDER', 'RINCON ALVAREZ', '3212410874', 'jhonatanrincon221@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(118, 'Cedula de ciudadania', '1005451665', 'MARIA JOSE', 'RIVERA MARIN', '3223431375', 'mariarivera201@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(119, 'Cedula de ciudadania', '1015469107', 'MATEO ', 'ROBAYO MORENO', '3204848476', 'mateorobayo121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(120, 'Cedula de ciudadania', '1006553990', 'HENRY ALEXANDER', 'RODRIGUEZ CARRILLO', '3214672507', 'juanrodriguez122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(121, 'Cedula de ciudadania', '1118531108', 'DAMIAN FELIPE', 'RODRIGUEZ GAMBOA', '3123936741', 'henryrodriguez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(122, 'Cedula de ciudadania', '1116554457', 'SEBASTIAN ', 'RODRIGUEZ JUAN', '3202579137', 'kenerrodriguez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(123, 'Cedula de ciudadania', '1003765321', 'SERGIO ALEJANDRO', 'RODRIGUEZ PEDRAZA', '3227437306', 'damianrodriguez121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(124, 'Cedula de ciudadania', '1000048549', 'KENER ARVEY', 'RODRIGUEZ SANDOVAL', '3012823509', 'sergiorodriguezpedraza@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(126, 'Cedula de ciudadania', '1007703675', 'PEDRO MIGUEL', 'ROMERO GUAVAVE', '3223204446', 'pedroromero@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(127, 'Cedula de ciudadania', '1007599195', 'OSCAR DANILO', 'SANABRIA SOGAMOSO', '3125699080', 'oscarsanabria@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(128, 'Cedula de ciudadania', '1002278509', 'SNEIDER FABIAN', 'SANCHEZ GONZALEZ', '3232208099', 'sneidersanchez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(129, 'Cedula de ciudadania', '1007417156', 'KAREN YINETH', 'SANCHEZ PEREZ', '3105731867', 'karensanchezperez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(130, 'Cedula de ciudadania', '1006448728', 'CRISTIAN HERNEY', 'SANCHEZ SALAMANCA', '3208754110', 'cristiansanchez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(131, 'Cedula de ciudadania', '1116553198', 'YENY FERNANDA', 'SANDOVAL MANRIQUE', '3213176515', 'yenylemus@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(132, 'Cedula de ciudadania', '1115866811', 'ANDRES CAMILO', 'SANTOS OCHOA', '3143431623', 'andressantos@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(133, 'Cedula de ciudadania', '1115864181', 'OSCAR JAVIER', 'SILVA MESA', '3502239110', 'oscarsilva@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(134, 'Tarjeta de identidad', '1118528931', 'JUAN FELIPE', 'SUAREZ ESPEJO', '3197414888', 'juansuarez122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(135, 'Cedula de ciudadania', '1118563296', 'DANILO ANDRES', 'TALERO DIAZ', '3107619434', 'daniloandres@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(136, 'Cedula de ciudadania', '1006554691', 'OSCAR JULIAN', 'TELLO BELLIZIA', '3114877977', 'oscartello201@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(137, 'Cedula de ciudadania', '1118541581', 'JORGE LUIS', 'TINJACA BURGOS', '', 'jorgetinjaca@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(138, 'Cedula de ciudadania', '1006552492', 'JENNIFER SOFIA', 'VALDERRAMA DOMINGUEZ', '3112292853', 'jennifervalderrama@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(139, 'Tarjeta de identidad', '1118533348', 'JESUS CAMILO', 'VALLECILLA SOLANO', '3134049257', 'jesusvallecilla121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(140, 'Cedula de ciudadania', '1006441763', 'JOSE ANSELMO', 'VARGAS MAYORGA', '3104768724', 'josevargas@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(141, 'Cedula de ciudadania', '1118570989', 'EDWARD ALEJANDRO', 'VARGAS RODRIGUEZ', '3138007607', 'edwardvargas@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(142, 'Cedula de ciudadania', '1118570762', 'BRENDA JASMIN', 'VELANDIA ANGEL', '3125724378', 'brendavelandia@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(143, 'Cedula de ciudadania', '1006558667', 'HUGO ANDRES', 'ZULUAGA HERNANDEZ', '3118699519', 'hugozuluaga@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
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
  `pro_codigosnies` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pro_resolucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_fecha_ult` date NOT NULL,
  `pro_fecha_prox` date NOT NULL,
  `pro_nivel_formacion` int(11) NOT NULL,
  `pro_programa_ciclo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_metodologia` int(11) NOT NULL,
  `pro_duraccion` int(11) NOT NULL,
  `pro_periodo_admision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_grupo_referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_grupo_referencia_nbc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_tipo_norma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id_director` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_programa_persona` (`pro_id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.programa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `programa` DISABLE KEYS */;
INSERT IGNORE INTO `programa` (`id`, `pro_nombre`, `pro_estado`, `pro_departamento`, `pro_municipio`, `pro_facultad`, `pro_titulo`, `pro_codigosnies`, `pro_resolucion`, `pro_fecha_ult`, `pro_fecha_prox`, `pro_nivel_formacion`, `pro_programa_ciclo`, `pro_metodologia`, `pro_duraccion`, `pro_periodo_admision`, `pro_grupo_referencia`, `pro_grupo_referencia_nbc`, `pro_tipo_norma`, `pro_id_director`, `created_at`, `updated_at`) VALUES
	(3, 'Ingeniería de Sistemas', 'Activo', 6, 6, 6, 'Ingeniero de Sistemas', '7915', 'Resolución No. 002485 del 2 de marzo de 2022. Con una vigencia de (7) siete años.', '2022-04-20', '2022-04-20', 3, 'Si', 3, 10, 'Semestral', 'Ingeniería', 'Ingeniería de sistemas, electrónica y afines', '1234', 23, '2022-04-21 04:44:00', '2022-04-21 04:44:00');
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
  `pph_nro_horas_semana_docencia` int(11) DEFAULT NULL,
  `pph_nro_horas_semana_investigacion` int(11) DEFAULT NULL,
  `pph_nro_horas_semana_extension` int(11) DEFAULT NULL,
  `pph_nro_horas_semana_administrativas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_programa_plan_asignatura_hor` (`pph_id_asignatura`),
  KEY `FK_programa_plan_asignatura_horario_persona` (`pph_id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_asignatura_horario: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_asignatura_horario` DISABLE KEYS */;
INSERT IGNORE INTO `programa_asignatura_horario` (`id`, `pph_year`, `pph_semestre`, `pph_id_asignatura`, `pph_grupo`, `pph_id_docente`, `pph_horario`, `pph_aula`, `pph_nro_horas_semana_docencia`, `pph_nro_horas_semana_investigacion`, `pph_nro_horas_semana_extension`, `pph_nro_horas_semana_administrativas`, `created_at`, `updated_at`) VALUES
	(1, '2022', 1, 10, 'Y-Sistemas', 23, 'LUNES 8:00 PM A 10:00PM', 'A-201', 3, 3, 3, 3, '2022-04-21 05:10:07', '2022-04-21 05:10:07'),
	(2, '2022', 1, 7, 'Y-FCNI A / Y-FCNI B', 32, 'JUEVES 18:20 - 20:10\r\nVIERNES 18:20 - 20:10', 'LABORATORIO C-201', 2, 2, 2, 2, '2022-04-22 04:58:23', '2022-04-22 04:58:23'),
	(3, '2022', 2, 11, 'Y-SIST ELECTR', 31, 'LUNES 18:20 - 20:00\r\nMIERCOLES 20:10 - 21:50', 'LAB. C-202', 4, 0, 0, 0, '2022-04-22 04:59:54', '2022-04-22 04:59:54'),
	(4, '2022', 2, 15, 'Y-FCNI', 33, 'LUNES 21:00 - 22:40\r\nJUEVES 21:00 - 22:40', 'C-203 / REMOTO', 4, 4, 4, 4, '2022-04-22 05:01:16', '2022-04-22 05:01:16'),
	(5, '2022', 3, 16, 'Y-SISTEMAS', 40, 'LUNES 21:00 - 22:40\r\nJUEVES 20:00 - 21:50', 'REMOTO / LAB. C-202', 5, 5, 5, 5, '2022-04-22 05:02:41', '2022-04-22 05:02:41'),
	(6, '2022', 4, 22, 'Y-FCNI', 36, 'MIERCOLES 18:20 - 20:00', 'REMOTO 3 SEDES', 2, 2, 2, 2, '2022-04-22 05:03:46', '2022-04-22 05:03:46'),
	(7, '2022', 4, 26, 'Y-FCNI', 33, 'VIERNES 21:00 - 22:40', 'C-302', 2, 2, 2, 2, '2022-04-22 05:04:31', '2022-04-22 05:04:31'),
	(8, '2022', 5, 30, 'Y-SISTEMAS', 30, 'LUNES 18:20 - 20:00 \r\nJUEVES 20:10  - 21:50', 'D-201 / B-305', 4, 4, 4, 4, '2022-04-22 05:05:38', '2022-04-22 05:05:38'),
	(9, '2022', 5, 27, 'Y-SISTEMAS', 34, 'LUNES 20:10 - 22:40', 'LAB. C-202', 2, 2, 2, 2, '2022-04-22 05:06:51', '2022-04-22 05:06:51'),
	(10, '2022', 5, 32, 'ASA', 33, 'MARTES 20:10 - 21:50', 'C-301', 2, 2, 2, 2, '2022-04-22 05:07:32', '2022-04-22 05:07:32'),
	(11, '2022', 5, 28, 'Y-SISTEMAS', 39, 'MIERCOLES 18:20 - 20:00\r\nJUEVE 18:20 - 20:00', 'LAB. C-202 / B-306', 2, 2, 2, 2, '2022-04-22 05:08:14', '2022-04-22 05:09:32'),
	(12, '2022', 5, 31, 'SIST', 32, 'MIERCOLES 20:00 - 21:50', 'B-202', 2, 2, 2, 2, '2022-04-22 05:08:57', '2022-04-22 05:08:57'),
	(13, '2022', 6, 40, 'Y-SISTEMAS', 34, 'MARTES 18:20 - 21:00', 'LAB. C-201', 3, 3, 3, 3, '2022-04-22 05:10:28', '2022-04-22 05:10:28'),
	(14, '2022', 6, 39, 'Y-SISTEMAS', 30, 'MIERCOLES 18:20 - 21:00', 'LAB. C-201', 3, 3, 3, 3, '2022-04-22 05:11:14', '2022-04-22 05:11:14'),
	(15, '2022', 6, 42, 'Y-SISTEMAS', 35, 'JUEVES 21:00 - 22:40', 'B-205', 2, 2, 2, 2, '2022-04-22 05:12:04', '2022-04-22 05:12:04'),
	(16, '2022', 6, 38, 'Y-ASA', 31, 'VIERNES 18:20 - 21:00', 'C-304', 3, 3, 3, 3, '2022-04-22 05:12:39', '2022-04-22 05:12:39'),
	(17, '2022', 7, 45, 'Y-SISTEMAS A', 40, 'LUNES 18:20 - 21:00', 'LAB. C-202', 3, 3, 3, 3, '2022-04-22 05:13:21', '2022-04-22 05:13:21'),
	(18, '2022', 7, 47, 'Y-SISTEMAS', 35, 'MIERCOLES 18:20 - 21:00', 'D-101', 3, 3, 3, 3, '2022-04-22 05:14:05', '2022-04-22 05:14:05'),
	(19, '2022', 7, 44, 'Y-SISTEMAS', 36, 'VIERNES 20:10 - 22:40', 'REMOTO', 3, 3, 3, 3, '2022-04-22 05:14:46', '2022-04-22 05:14:46');
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
  KEY `FK_programa_plan_estudio_municipio` (`pp_id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_plan_estudio: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_plan_estudio` DISABLE KEYS */;
INSERT IGNORE INTO `programa_plan_estudio` (`id`, `pp_id_sede`, `pp_id_programa`, `pp_plan`, `pp_creditos`, `pp_no_asignaturas`, `pp_estado`, `created_at`, `updated_at`) VALUES
	(2, 6, 3, '2016', 164, 54, 'activo', '2022-04-21 04:44:50', '2022-04-21 04:44:50'),
	(3, 6, 3, '909', 163, 60, 'inactivo', '2022-04-21 04:45:06', '2022-04-21 04:45:06');
/*!40000 ALTER TABLE `programa_plan_estudio` ENABLE KEYS */;

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
  `asig_semestre` int(11) NOT NULL DEFAULT 0,
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
  KEY `FK_programa_plan_estudio_asignatura_compl_area_plan` (`asig_id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_plan_estudio_asignatura: ~54 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_plan_estudio_asignatura` DISABLE KEYS */;
INSERT IGNORE INTO `programa_plan_estudio_asignatura` (`id`, `asig_id_sede`, `asig_id_programa`, `asig_id_plan_estudio`, `asig_id_componente`, `asig_id_area`, `asig_codigo`, `asig_nombre`, `asig_semestre`, `asig_no_creditos`, `asig_no_semanales`, `asig_no_semestre`, `asig_estado`, `created_at`, `updated_at`) VALUES
	(6, 6, 3, 2, 1, 2, '5201', 'FUNDAMENTOS DE PROGRAMACIÓN', 1, 4, 4, 64, 'activo', '2022-04-21 04:51:31', '2022-04-21 04:51:31'),
	(7, 6, 3, 2, 1, 2, '5801', 'DISEÑO ASISTIDO POR COMPUTADOR', 1, 3, 3, 48, 'activo', '2022-04-21 04:52:22', '2022-04-21 04:52:22'),
	(8, 6, 3, 2, 2, 3, '5001', 'CALCULO DIFERENCIAL', 1, 4, 4, 64, 'activo', '2022-04-21 04:53:04', '2022-04-21 04:53:04'),
	(10, 6, 3, 2, 3, 4, '9001', 'INTRODUCCIÓN A LA INGENIERIA', 1, 2, 2, 32, 'activo', '2022-04-21 04:54:05', '2022-04-21 04:54:05'),
	(11, 6, 3, 2, 1, 2, '5202', 'PROGRAMACIÓN I', 2, 4, 4, 64, 'activo', '2022-04-21 04:54:40', '2022-04-21 04:54:40'),
	(14, 6, 3, 2, 3, 4, '6101', 'PROYECTO INTEGRADOR I', 2, 2, 2, 32, 'activo', '2022-04-21 04:56:25', '2022-04-21 04:56:25'),
	(15, 6, 3, 3, 3, 4, '9101', 'EXPRESIÓN I', 2, 4, 4, 64, 'activo', '2022-04-21 04:56:59', '2022-04-21 04:56:59'),
	(16, 6, 3, 2, 1, 2, '5203', 'ESTRUCTURA DE DATOS', 3, 4, 4, 64, 'activo', '2022-04-21 04:57:48', '2022-04-21 04:57:48'),
	(18, 6, 3, 2, 2, 3, '5101', 'QUIMICA GENERAL', 3, 3, 3, 48, 'activo', '2022-04-21 04:59:03', '2022-04-21 04:59:03'),
	(19, 6, 3, 2, 2, 3, '5105', 'MECANICA', 3, 4, 4, 64, 'activo', '2022-04-21 04:59:49', '2022-04-21 05:00:01'),
	(20, 6, 3, 2, 3, 4, '6102', 'PROYECTO INTEGRADOR II', 3, 1, 1, 16, 'activo', '2022-04-21 05:00:37', '2022-04-21 05:00:37'),
	(21, 6, 3, 2, 1, 2, '5204', 'BASE DE DATOS', 4, 4, 4, 64, 'activo', '2022-04-21 05:01:37', '2022-04-21 05:04:02'),
	(22, 6, 3, 2, 1, 2, '5301', 'MATEMATICAS DISCRETAS', 4, 4, 4, 64, 'activo', '2022-04-21 05:02:28', '2022-04-21 05:03:51'),
	(23, 6, 3, 2, 2, 3, '5004', 'ECUCACIONES DIFERENCIALES', 4, 3, 3, 48, 'activo', '2022-04-21 05:03:06', '2022-04-21 05:03:06'),
	(24, 6, 3, 2, 2, 3, '5106', 'ELECTROMAGNESTIMO', 4, 4, 4, 64, 'activo', '2022-04-21 05:04:35', '2022-04-21 05:04:35'),
	(25, 6, 3, 2, 3, 4, '6103', 'PROYECTO INTEGRADOR III', 4, 1, 1, 16, 'activo', '2022-04-21 05:05:09', '2022-04-21 05:05:09'),
	(26, 6, 3, 2, 3, 4, '9002', 'IDENTIDAD CULTURAL Y CIUDADANA', 4, 2, 2, 32, 'activo', '2022-04-21 05:05:40', '2022-04-21 05:05:40'),
	(27, 6, 3, 2, 1, 1, '2401', 'ADMINISTRACIÓN Y GESTIÓN DE BASE DE DATOS', 5, 3, 3, 48, 'activo', '2022-04-21 05:06:15', '2022-04-21 05:06:15'),
	(28, 6, 3, 2, 1, 2, '5205', 'ANÁLISIS DE ALGORITMOS', 5, 4, 4, 64, 'activo', '2022-04-21 05:06:54', '2022-04-21 05:06:54'),
	(29, 6, 3, 2, 2, 3, '5102', 'BIOLOGÍA GENERAL', 5, 3, 3, 48, 'activo', '2022-04-21 05:07:30', '2022-04-21 05:07:30'),
	(30, 6, 3, 2, 2, 3, '5107', 'ONDAS Y PARTICULAS', 5, 4, 4, 64, 'activo', '2022-04-21 05:07:57', '2022-04-21 05:07:57'),
	(31, 6, 3, 2, 3, 4, '6104', 'PROYECTO INTEGRADOR IV', 5, 1, 1, 16, 'activo', '2022-04-21 05:08:38', '2022-04-21 05:08:38'),
	(32, 6, 3, 2, 3, 4, '9102', 'EXPRESIÓN II', 5, 2, 2, 32, 'activo', '2022-04-21 05:09:05', '2022-04-21 05:09:05'),
	(33, 6, 3, 2, 2, 3, '5005', 'Algebra Superior', 1, 2, 2, 32, 'activo', '2022-04-21 20:42:48', '2022-04-21 20:42:48'),
	(34, 6, 3, 2, 2, 3, '5002', 'CALCULO INTEGRAL', 2, 4, 4, 64, 'activo', '2022-04-21 21:03:32', '2022-04-21 21:03:32'),
	(35, 6, 3, 2, 2, 3, '5006', 'ALGEBRA LINEAL', 2, 2, 2, 32, 'activo', '2022-04-21 21:05:10', '2022-04-21 21:05:10'),
	(36, 6, 3, 2, 2, 3, '5003', 'CALCULO EN VARIAS VARIABLES', 3, 3, 3, 48, 'activo', '2022-04-21 21:08:11', '2022-04-21 21:08:11'),
	(37, 6, 3, 2, 1, 1, '2402', 'MODELADO DE SISTEMAS DE INFORMACION', 6, 2, 2, 32, 'activo', '2022-04-21 21:21:43', '2022-04-22 19:38:10'),
	(38, 6, 3, 2, 1, 1, '2501', 'TEORIA DE SISTEMAS', 6, 2, 2, 32, 'activo', '2022-04-21 21:23:11', '2022-04-21 21:23:11'),
	(39, 6, 3, 2, 1, 1, '2601', 'ARQUITECTURA DE COMPUTADORES', 6, 3, 3, 48, 'activo', '2022-04-21 21:24:35', '2022-04-21 21:24:35'),
	(40, 6, 3, 2, 1, 2, '5206', 'PROGRAMACION ii', 6, 3, 3, 48, 'activo', '2022-04-21 21:26:03', '2022-04-21 21:26:44'),
	(41, 6, 3, 2, 1, 2, '5302', 'MODELADO Y ANALISIS NUMERICO', 6, 4, 4, 64, 'activo', '2022-04-21 21:28:10', '2022-04-21 21:28:10'),
	(42, 6, 3, 2, 3, 4, '6105', 'FORMULACION DE PROYECTOS', 6, 3, 3, 48, 'activo', '2022-04-21 21:29:47', '2022-04-21 21:29:47'),
	(43, 6, 3, 2, 1, 1, '2403', 'INGENIERIA DE SOFTWARE', 7, 4, 4, 64, 'activo', '2022-04-21 21:35:33', '2022-04-21 21:35:33'),
	(44, 6, 3, 2, 1, 1, '2502', 'SISTEMAS DINAMICOS', 7, 3, 3, 48, 'activo', '2022-04-21 21:40:10', '2022-04-21 21:40:10'),
	(45, 6, 3, 2, 1, 1, '2602', 'SISTEMAS OPERATIVOS', 7, 3, 3, 48, 'activo', '2022-04-21 21:43:28', '2022-04-21 21:43:28'),
	(46, 6, 3, 2, 1, 2, '5303', 'PROBABILIDAD Y ESTADISTICA', 7, 3, 3, 48, 'activo', '2022-04-21 21:49:23', '2022-04-21 21:49:23'),
	(47, 6, 3, 2, 3, 4, '6106', 'EVALUACION DE PROYECTOS', 7, 3, 3, 48, 'activo', '2022-04-21 21:50:43', '2022-04-21 21:50:43'),
	(48, 6, 3, 2, 1, 1, '2404', 'ARQUITECTURA DE SOFTWARE', 8, 3, 3, 48, 'activo', '2022-04-21 21:52:11', '2022-04-21 21:52:11'),
	(49, 6, 3, 2, 1, 1, '2701', 'COMUNICACION DE DATOS', 8, 4, 4, 64, 'activo', '2022-04-21 21:54:13', '2022-04-21 21:54:13'),
	(50, 6, 3, 2, 1, 1, '2901', 'ELECTIVA PROFESIONAL I', 8, 3, 3, 48, 'activo', '2022-04-21 21:55:22', '2022-04-21 21:55:37'),
	(51, 6, 3, 2, 1, 2, '4', 'INVESTIGACION DE OPERACIONES I', 8, 4, 4, 64, 'activo', '2022-04-21 21:58:38', '2022-04-21 21:58:38'),
	(52, 6, 3, 2, 3, 4, '6201', 'ELECTIVA COMPLEMENTARIA I', 8, 3, 3, 48, 'activo', '2022-04-21 21:59:50', '2022-04-21 21:59:50'),
	(53, 6, 3, 2, 1, 1, '2405', 'GESTION DE PROYECTOS T.I', 9, 2, 2, 32, 'activo', '2022-04-21 22:01:54', '2022-04-21 22:01:54'),
	(54, 6, 3, 2, 1, 1, '2702', 'REDES DE  COMUNICACIONES', 9, 4, 4, 64, 'activo', '2022-04-21 22:03:10', '2022-04-21 22:03:10'),
	(55, 6, 3, 2, 1, 1, '2802', 'TRABAJO DE GRADO I', 9, 2, 2, 32, 'activo', '2022-04-21 22:04:14', '2022-04-21 22:04:14'),
	(56, 6, 3, 2, 1, 1, '2902', 'ELECTIVA PROFESIONAL II', 9, 3, 3, 48, 'activo', '2022-04-21 22:05:46', '2022-04-21 22:05:46'),
	(57, 6, 3, 2, 1, 2, '5305', 'INVESTIGACION DE OPERACIONES II', 9, 3, 3, 48, 'activo', '2022-04-21 22:06:54', '2022-04-21 22:06:54'),
	(58, 6, 3, 2, 1, 2, '5901', 'ELECTIVA DE INGENIERIA I', 9, 3, 3, 48, 'activo', '2022-04-21 22:08:03', '2022-04-21 22:08:03'),
	(59, 6, 3, 2, 1, 1, '2803', 'TRABAJO DE GRADO II', 10, 6, 6, 0, 'activo', '2022-04-21 22:09:07', '2022-04-21 22:09:07'),
	(60, 6, 3, 2, 1, 1, '2903', 'ELECTIVA PROFESIONAL III', 10, 3, 3, 48, 'activo', '2022-04-21 22:10:20', '2022-04-21 22:10:20'),
	(61, 6, 3, 2, 1, 2, '5902', 'ELECTIVA DE INGENIERIA II', 10, 3, 3, 48, 'activo', '2022-04-21 22:11:15', '2022-04-21 22:11:15'),
	(62, 6, 3, 2, 3, 4, '6202', 'ELECTIVA COMPLEMENTARIA II', 10, 2, 2, 32, 'activo', '2022-04-21 22:12:28', '2022-04-21 22:12:28'),
	(63, 6, 3, 2, 3, 4, '9003', 'ETICA Y COMPROMISO PROFESIONAL', 10, 2, 2, 32, 'activo', '2022-04-21 22:14:49', '2022-04-21 22:14:49');
/*!40000 ALTER TABLE `programa_plan_estudio_asignatura` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.prueba_resultado_programa
CREATE TABLE IF NOT EXISTS `prueba_resultado_programa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prurepro_year` int(11) NOT NULL,
  `prurepro_id_programa` int(11) NOT NULL,
  `prurepro_global_programa` int(11) NOT NULL,
  `prurepro_global_institucion` int(11) NOT NULL,
  `prurepro_global_sede` int(11) NOT NULL,
  `prurepro_global_grupo_referencia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prueba_resultado_programa_programa` (`prurepro_id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_resultado_programa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_resultado_programa` DISABLE KEYS */;
INSERT IGNORE INTO `prueba_resultado_programa` (`id`, `prurepro_year`, `prurepro_id_programa`, `prurepro_global_programa`, `prurepro_global_institucion`, `prurepro_global_sede`, `prurepro_global_grupo_referencia`, `created_at`, `updated_at`) VALUES
	(4, 2021, 3, 151, 146, 146, 153, NULL, NULL);
/*!40000 ALTER TABLE `prueba_resultado_programa` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.prueba_resultado_programa_modulo
CREATE TABLE IF NOT EXISTS `prueba_resultado_programa_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prurepromo_id_prueba_programa` int(11) NOT NULL,
  `prureprono_id_modulo` int(11) NOT NULL,
  `prureprono_puntaje_programa` int(11) NOT NULL,
  `prureprono_puntaje_institucion` int(11) NOT NULL,
  `prureprono_puntaje_sede` int(11) NOT NULL,
  `prureprono_puntaje_grupo_referencia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prueba_resultado_programa_modulo_tipo_modulo` (`prureprono_id_modulo`),
  KEY `FK_prueba_resultado_programa_modulo_programa` (`prurepromo_id_prueba_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_resultado_programa_modulo: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_resultado_programa_modulo` DISABLE KEYS */;
INSERT IGNORE INTO `prueba_resultado_programa_modulo` (`id`, `prurepromo_id_prueba_programa`, `prureprono_id_modulo`, `prureprono_puntaje_programa`, `prureprono_puntaje_institucion`, `prureprono_puntaje_sede`, `prureprono_puntaje_grupo_referencia`, `created_at`, `updated_at`) VALUES
	(16, 3, 3, 141, 139, 139, 134, NULL, NULL),
	(17, 3, 4, 159, 148, 148, 161, NULL, NULL),
	(18, 3, 5, 150, 147, 147, 153, NULL, NULL),
	(19, 3, 6, 147, 149, 149, 154, NULL, NULL),
	(20, 3, 7, 157, 149, 149, 164, NULL, NULL);
/*!40000 ALTER TABLE `prueba_resultado_programa_modulo` ENABLE KEYS */;

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
  KEY `FK_prueba_saber_estudiante` (`prueba_saber_id_estudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_saber: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_saber` DISABLE KEYS */;
INSERT IGNORE INTO `prueba_saber` (`id`, `prueba_saber_year`, `prueba_saber_periodo`, `prueba_saber_id_estudiante`, `prueba_saber_puntaje_global`, `created_at`, `updated_at`) VALUES
	(3, '2016', '2', 22, 59.5, NULL, NULL),
	(4, '2016', '2', 41, 54, NULL, NULL);
/*!40000 ALTER TABLE `prueba_saber` ENABLE KEYS */;

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
  KEY `FK_prueba_saber_modulo_tipo_modulo` (`prsamo_id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_saber_modulo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_saber_modulo` DISABLE KEYS */;
INSERT IGNORE INTO `prueba_saber_modulo` (`id`, `prsamo_id_estudiante`, `prsamo_id_modulo`, `prsamo_puntaje`, `created_at`, `updated_at`) VALUES
	(3, 22, 2, 61, NULL, NULL),
	(4, 22, 8, 58, NULL, NULL),
	(5, 41, 2, 56, NULL, NULL),
	(6, 41, 8, 52, NULL, NULL);
/*!40000 ALTER TABLE `prueba_saber_modulo` ENABLE KEYS */;

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
  KEY `FK_prueba_saber_pro_estudiante` (`prsapr_id_estudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_saber_pro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_saber_pro` DISABLE KEYS */;
INSERT IGNORE INTO `prueba_saber_pro` (`id`, `prsapr_year`, `prsapr_periodo`, `prsapr_id_estudiante`, `prsapr_numero_registro`, `prsapr_grupo_referencia`, `prsapr_puntaje_global`, `prsapr_percentil_nacional`, `prsapr_percentil_grupo`, `prsapr_novedad`, `created_at`, `updated_at`) VALUES
	(1, 2022, '2', 22, 'EK202123106374', 'Ingeniería y carreras a fines', 163, 76, 73, 'sin novedades', NULL, NULL);
/*!40000 ALTER TABLE `prueba_saber_pro` ENABLE KEYS */;

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
  KEY `FK_prueba_saber_pro_modulo_tipo_modulo` (`prsaprmo_id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_saber_pro_modulo: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_saber_pro_modulo` DISABLE KEYS */;
INSERT IGNORE INTO `prueba_saber_pro_modulo` (`id`, `prsaprmo_id_estudiante`, `prsaprmo_id_modulo`, `prsaprmo_puntaje`, `prsaprmo_nivel_desempeno`, `prsaprmo_percentil_nacional`, `prsaprmo_percentil_grupo`, `created_at`, `updated_at`) VALUES
	(1, 22, 3, 116, 2, 19, 24, NULL, NULL),
	(2, 22, 4, 182, 3, 99, 79, NULL, NULL),
	(3, 22, 5, 182, 3, 87, 87, NULL, NULL),
	(4, 22, 6, 175, 3, 81, 81, NULL, NULL),
	(5, 22, 7, 161, 2, 62, 53, NULL, NULL),
	(6, 22, 3, 116, 2, 19, 24, NULL, NULL),
	(7, 22, 4, 182, 3, 99, 79, NULL, NULL),
	(8, 22, 5, 182, 3, 87, 87, NULL, NULL),
	(9, 22, 6, 175, 3, 81, 81, NULL, NULL),
	(10, 22, 7, 161, 2, 62, 53, NULL, NULL);
/*!40000 ALTER TABLE `prueba_saber_pro_modulo` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.red_academica
CREATE TABLE IF NOT EXISTS `red_academica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `red_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_nombre_contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_alcance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_accion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_id_programa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.red_academica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `red_academica` DISABLE KEYS */;
/*!40000 ALTER TABLE `red_academica` ENABLE KEYS */;

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
  `sof_asignatura` text COLLATE utf8_unicode_ci NOT NULL,
  `sof_cantidad` int(11) NOT NULL DEFAULT 0,
  `sof_id_programa` text COLLATE utf8_unicode_ci NOT NULL,
  `sof_valor_unitario` double NOT NULL DEFAULT 0,
  `sof_valor_total` double NOT NULL DEFAULT 0,
  `sof_fecha_actualizar` date DEFAULT NULL,
  `sof_fecha_instalacion` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.software: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `software` DISABLE KEYS */;
INSERT IGNORE INTO `software` (`id`, `sof_tipo`, `sof_nombre`, `sof_desarrollador`, `sof_version`, `sof_no_licencia`, `sof_year_ad_licencia`, `sof_year_ve_licencia`, `sof_asignatura`, `sof_cantidad`, `sof_id_programa`, `sof_valor_unitario`, `sof_valor_total`, `sof_fecha_actualizar`, `sof_fecha_instalacion`, `created_at`, `updated_at`) VALUES
	(1, 'libre', 'VS CODE / VIRTUAL BOX / X CODE - ULTIMA VERSIÓN', 'NN', 'ULTIMA', 'NN', '2022', '2024', 'PROGRAMACION ii', 3, 'Ingeniería de Sistemas', 0, 0, '2022-04-22', '2022-04-22', '2022-04-22 05:16:53', '2022-04-22 05:16:53'),
	(2, 'libre', 'tinkercard / freecad 0.18 / inskcape', 'nn', 'ultima versión', 'nn', '2022', '2024', 'DISEÑO ASISTIDO POR COMPUTADOR', 3, 'Ingeniería de Sistemas', 0, 0, '2022-04-22', '2022-04-22', '2022-04-22 05:18:09', '2022-04-22 05:18:09'),
	(3, 'pago', 'excel con complementos de solver - paquete office', 'microsoft', 'ultima', 'nn', '2022', '2023', 'ANÁLISIS DE ALGORITMOS;INVESTIGACION DE OPERACIONES II', 10, 'Ingeniería de Sistemas', 0, 0, '2022-04-22', '2022-04-22', '2022-04-22 05:19:43', '2022-04-22 05:19:43'),
	(4, 'libre', 'dfd / wam server/ xamp server / mysql / apache / argo uml / vs code / workbench / php', 'nn', 'ultima', 'nn', '2022', '2023', 'FUNDAMENTOS DE PROGRAMACIÓN', 10, 'Ingeniería de Sistemas', 0, 0, '2022-04-22', '2022-04-22', '2022-04-22 05:21:18', '2022-04-22 05:21:18');
/*!40000 ALTER TABLE `software` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.software_recurso_tecnologico
CREATE TABLE IF NOT EXISTS `software_recurso_tecnologico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sofrete_year` int(11) NOT NULL,
  `sofrete_periodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sofrete_tipo_recurso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sofrete_id_docente` int(11) NOT NULL,
  `sofrete_id_asignatura` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_software_recurso_tecnologico_persona` (`sofrete_id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.software_recurso_tecnologico: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `software_recurso_tecnologico` DISABLE KEYS */;
INSERT IGNORE INTO `software_recurso_tecnologico` (`id`, `sofrete_year`, `sofrete_periodo`, `sofrete_tipo_recurso`, `sofrete_id_docente`, `sofrete_id_asignatura`, `created_at`, `updated_at`) VALUES
	(1, 2022, '2022-1', 'plataforma-agora', 39, 28, '2022-04-22 06:21:20', '2022-04-22 06:21:20'),
	(2, 2022, '2022-1', 'software', 34, 40, '2022-04-22 06:21:44', '2022-04-22 06:21:44'),
	(3, 2022, '2022-1', 'software', 32, 7, '2022-04-22 06:22:01', '2022-04-22 06:22:01'),
	(4, 2022, '1', 'plataforma-agora', 30, 39, '2022-04-22 17:09:03', '2022-04-22 17:09:03');
/*!40000 ALTER TABLE `software_recurso_tecnologico` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipo_modulo
CREATE TABLE IF NOT EXISTS `tipo_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_modulo_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_modulo_id_prueba` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tipo_modulo_tipo_prueba` (`tipo_modulo_id_prueba`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.tipo_modulo: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_modulo` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_modulo` (`id`, `tipo_modulo_nombre`, `tipo_modulo_id_prueba`, `created_at`, `updated_at`) VALUES
	(2, 'Lectura crítica', 1, '2022-04-21 22:31:59', '2022-04-21 22:31:59'),
	(3, 'Comunicación escrita', 2, '2022-04-22 05:23:24', '2022-04-22 05:23:24'),
	(4, 'Razonamiento cuantitativo', 2, '2022-04-22 05:23:32', '2022-04-22 05:23:32'),
	(5, 'Lectura critica', 2, '2022-04-22 05:23:37', '2022-04-22 05:23:37'),
	(6, 'Competencias ciudadanas', 2, '2022-04-22 05:23:43', '2022-04-22 05:23:43'),
	(7, 'Ingles', 2, '2022-04-22 05:23:50', '2022-04-22 05:23:50'),
	(8, 'Ingles', 1, '2022-04-22 14:50:47', '2022-04-22 14:50:47');
/*!40000 ALTER TABLE `tipo_modulo` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipo_prueba
CREATE TABLE IF NOT EXISTS `tipo_prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_prueba_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.tipo_prueba: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_prueba` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_prueba` (`id`, `tipo_prueba_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Prueba 11', NULL, NULL),
	(2, 'Prueba saber PRO', NULL, NULL);
/*!40000 ALTER TABLE `tipo_prueba` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipo_usuario
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.tipo_usuario: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_usuario` (`id`, `tip_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', '2022-03-17 10:41:16', NULL),
	(2, 'Director programa - docente', '2022-03-17 10:41:23', NULL),
	(3, 'Docente', '2022-03-17 10:41:28', NULL),
	(4, 'Auxiliar o Administrativo', '2022-03-17 10:41:37', NULL),
	(6, 'Estudiante', '2022-03-17 10:41:54', NULL),
	(9, 'Administrador estudiante', NULL, NULL),
	(10, 'Administrador docente', NULL, NULL);
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.trabajo_grado
CREATE TABLE IF NOT EXISTS `trabajo_grado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tra_codigo_proyecto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_titulo_proyecto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tra_id_estudiante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_fecha_inicio` date NOT NULL,
  `tra_modalidad_grado` int(11) NOT NULL,
  `tra_id_empresa` int(11) DEFAULT NULL,
  `tra_cargo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  KEY `FK_trabajo_grado_modalidad_grado` (`tra_modalidad_grado`),
  KEY `FK_trabajo_grado_persona` (`tra_id_director`),
  KEY `FK_trabajo_grado_persona_2` (`tra_id_codirector`),
  KEY `FK_trabajo_grado_persona_3` (`tra_id_externo`),
  KEY `FK_trabajo_grado_persona_4` (`tra_id_jurado1`),
  KEY `FK_trabajo_grado_persona_5` (`tra_id_jurado2`),
  KEY `FK_trabajo_grado_compl_empresa` (`tra_id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.trabajo_grado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajo_grado` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajo_grado` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
