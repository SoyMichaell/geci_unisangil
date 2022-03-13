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
/*!40000 ALTER TABLE `compl_area_extension` DISABLE KEYS */;
INSERT IGNORE INTO `compl_area_extension` (`id`, `coarex_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Servicio social', '2022-03-09 15:36:24', NULL),
	(2, 'Gestión tecnológica', '2022-03-09 15:36:38', NULL),
	(3, 'Programas interdisciplinarios', '2022-03-09 15:36:55', NULL);
/*!40000 ALTER TABLE `compl_area_extension` ENABLE KEYS */;

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

-- Volcando estructura para tabla proyecto.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.departamento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT IGNORE INTO `departamento` (`id`, `dep_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Casanare', '2022-02-19 19:47:47', '2022-02-21 06:04:13'),
	(2, 'Boyacá', '2022-02-19 19:52:06', '2022-02-19 19:52:06');
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.docente: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT IGNORE INTO `docente` (`id`, `id_persona_docente`, `ciudad_procedencia`, `correo_personal`, `dedicacion`, `tipo_contratacion`, `fecha_vinculacion`, `eps`, `institucion_esp`, `certificado_esp`, `institucion_dip`, `certificado_dip`, `titulo_pregrado`, `institucion_pre`, `titulo_especializacion`, `institucion_espe`, `titulo_maestria`, `institucion_mae`, `titulo_doctorado`, `institucion_doc`, `area_conocimiento`, `maximo_nivel_formacion`, `titulo_maximo_nivel`, `institucion_maximo_nivel`, `modalidad_programa`, `riesgo`, `caja_compensacion`, `banco`, `no_cuenta`, `pension`, `estado`, `soporte_hoja_vida`, `documentos_compl`, `id_proceso`, `created_at`, `updated_at`) VALUES
	(21, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);
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
  CONSTRAINT `FK_docente_asignatura_persona` FOREIGN KEY (`docasi_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_docente_asignatura_programa_plan_estudio_asignatura` FOREIGN KEY (`docasi_id_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  CONSTRAINT `FK_docente_contrato_persona` FOREIGN KEY (`doco_persona_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  CONSTRAINT `FK_docente_evaluacion_persona` FOREIGN KEY (`doe_persona_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `estu_periodo_ingreso` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_ult_matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_semestre` int(11) NOT NULL,
  `estu_financiamiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_entidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_tipo_matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_pga` double DEFAULT NULL,
  `estu_reconocimiento` int(11) DEFAULT NULL,
  `estu_egresado` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.estudiante: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.estudiante_egresado
CREATE TABLE IF NOT EXISTS `estudiante_egresado` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  KEY `FK_estudiante_egresado_estudiante` (`este_id_estudiante`),
  CONSTRAINT `FK_estudiante_egresado_estudiante` FOREIGN KEY (`este_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  KEY `FK_estudiante_reporte_general_programa` (`esture_id_programa`),
  CONSTRAINT `FK_estudiante_reporte_general_programa` FOREIGN KEY (`esture_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_actividad_cultural_compl_fuente_nacional` (`extcul_fuente_nacional`),
  KEY `FK_ext_actividad_cultural_compl_fuente_internacional` (`extcul_fuente_internacional`),
  CONSTRAINT `FK_ext_actividad_cultural_compl_fuente_internacional` FOREIGN KEY (`extcul_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_actividad_cultural_compl_fuente_nacional` FOREIGN KEY (`extcul_fuente_nacional`) REFERENCES `compl_fuente_nacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_actividad_cultural: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_actividad_cultural` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_actividad_cultural` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_actividad_cultural_recurso_humano
CREATE TABLE IF NOT EXISTS `ext_actividad_cultural_recurso_humano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extculre_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extculre_codigo_organizacional` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extculre_codigo_actividad` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extculre_tipo_documento` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extculre_numero_documento` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extculre_dedicacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_actividad_cultural_recurso_humano: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_actividad_cultural_recurso_humano` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_actividad_cultural_recurso_humano` ENABLE KEYS */;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ext_consultoria_compl_cine_detallado` (`extcon_id_cine_campo`),
  KEY `FK_ext_consultoria_compl_sector` (`ext_sector_consultoria`),
  KEY `FK_ext_consultoria_compl_fuente_nacional` (`extcon_fuente_nacional`),
  KEY `FK_ext_consultoria_compl_fuente_internacional` (`extcon_fuente_internacional`),
  CONSTRAINT `FK_ext_consultoria_compl_cine_detallado` FOREIGN KEY (`extcon_id_cine_campo`) REFERENCES `compl_cine_detallado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_consultoria_compl_fuente_internacional` FOREIGN KEY (`extcon_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_consultoria_compl_fuente_nacional` FOREIGN KEY (`extcon_fuente_nacional`) REFERENCES `compl_fuente_nacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_consultoria_compl_sector` FOREIGN KEY (`ext_sector_consultoria`) REFERENCES `compl_sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_consultoria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_consultoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_consultoria` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.ext_consultoria_recurso_humano
CREATE TABLE IF NOT EXISTS `ext_consultoria_recurso_humano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extcor_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcor_semestre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcor_codigo_consultoria` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcor_tipo_documento` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcor_numero_documento` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcor_id_nivel_estudio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_consultoria_recurso_humano: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_consultoria_recurso_humano` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_consultoria_recurso_humano` ENABLE KEYS */;

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
  KEY `FK_ext_curso_compl_cine_detallado` (`extcurso_id_cine`),
  CONSTRAINT `FK_ext_curso_compl_cine_detallado` FOREIGN KEY (`extcurso_id_cine`) REFERENCES `compl_cine_detallado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_curso_persona` FOREIGN KEY (`extcurso_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_educacion_continua: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_educacion_continua` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_educacion_continua` ENABLE KEYS */;

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
  KEY `FK_ext_internacionalizacion_curriculo_persona` (`exincu_id_docente`),
  CONSTRAINT `FK_ext_internacionalizacion_curriculo_persona` FOREIGN KEY (`exincu_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_internacionalizacion_curriculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_internacionalizacion_curriculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_internacionalizacion_curriculo` ENABLE KEYS */;

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
  KEY `FK_docente_participante_persona` (`dop_id_docente`),
  CONSTRAINT `FK_docente_participante_persona` FOREIGN KEY (`dop_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  KEY `FK_ext_proyecto_extension_compl_fuente_internacional` (`extprex_id_fuente_internacional`),
  CONSTRAINT `FK_ext_proyecto_extension_compl_area_extension` FOREIGN KEY (`extprex_id_area_extension`) REFERENCES `compl_area_extension` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_proyecto_extension_compl_area_trabajo` FOREIGN KEY (`extprex_id_area_trabajo`) REFERENCES `compl_area_trabajo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_proyecto_extension_compl_entidad_nacional` FOREIGN KEY (`extprex_id_entidad_nacional`) REFERENCES `compl_entidad_nacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_proyecto_extension_compl_fuente_internacional` FOREIGN KEY (`extprex_id_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_proyecto_extension_compl_fuente_nacional` FOREIGN KEY (`extprex_id_fuente_nacional`) REFERENCES `compl_fuente_nacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_proyecto_extension_compl_poblacion_condicion` FOREIGN KEY (`extprex_id_poblacion_condicion`) REFERENCES `compl_poblacion_condicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_proyecto_extension_compl_poblacion_grupo` FOREIGN KEY (`extprex_id_poblacion_grupo`) REFERENCES `compl_poblacion_grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_proyecto_extension_compl_sector` FOREIGN KEY (`extprex_id_sector_otra_entidad`) REFERENCES `compl_sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_proyecto_extension: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_proyecto_extension` DISABLE KEYS */;
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

-- Volcando datos para la tabla proyecto.ext_registro_fotografico_inter: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_registro_fotografico_inter` DISABLE KEYS */;
INSERT IGNORE INTO `ext_registro_fotografico_inter` (`id`, `extrefoin_year`, `extrefoin_periodo`, `extrefoin_tipo_actividad`, `extrefoin_actividad`, `extrefoin_ente_organizador`, `extrefoin_fecha`, `extrefoin_tipo_evento`, `extrefoin_tipo_modalidad`, `extrefoin_soporte`, `created_at`, `updated_at`) VALUES
	(1, '2022', '2022-1', 'curso', 'Curso desarrollo web', 'unisangil', '2022-03-10', 'interno', 'investigacion', '2022_Curso desarrollo web.rar', '2022-03-08 22:11:37', '2022-03-08 22:22:23');
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
  KEY `FK_ext_sector_externo_organizaciones` (`exseorpar_id_organizacion`),
  CONSTRAINT `FK_ext_sector_externo_organizaciones` FOREIGN KEY (`exseorpar_id_organizacion`) REFERENCES `ext_sector_externo_organizaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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

-- Volcando datos para la tabla proyecto.ext_sector_externo_red_academia_convenio: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_sector_externo_red_academia_convenio` DISABLE KEYS */;
INSERT IGNORE INTO `ext_sector_externo_red_academia_convenio` (`id`, `exsered_year`, `exsered_periodo`, `exsered_ies`, `exsered_caracter`, `exsered_fecha`, `exsered_logros`, `exsered_resultados`, `exsered_productos`, `exsered_funcion`, `exsered_participantes`, `created_at`, `updated_at`) VALUES
	(3, 2022, '2022-1', 'SI', 'nacional', '2022-03-12', 'jsahdjkas djhdjkashdkj jkdhajk hkjashdkjashd', 'jdhaskj dhaskdhask hdkja hkjdhaskjdhask dka hdkjashdkjashd', 'jdhaskjdhasjkd hdkjahskjdhasjkd hdkjashdjkashdjkas kjhdjkashdkj sahdkjash kjshd kjashd', 'investigacion', 4, NULL, NULL);
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
  KEY `FK_ext_sector_externo_red_academia` (`exseredpar_id_red_academica`),
  CONSTRAINT `FK_ext_sector_externo_red_academia` FOREIGN KEY (`exseredpar_id_red_academica`) REFERENCES `ext_sector_externo_red_academia_convenio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_sector_externo_red_academia_convenio_participantes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_sector_externo_red_academia_convenio_participantes` DISABLE KEYS */;
INSERT IGNORE INTO `ext_sector_externo_red_academia_convenio_participantes` (`id`, `exseredpar_id_red_academica`, `exseredpar_numero_identificacion`, `exseredpar_nombre_participante`, `exseredpar_rol_participante`, `created_at`, `updated_at`) VALUES
	(5, 3, 1006450866, 'Michael Rodriguez', 'administrativo', NULL, NULL),
	(6, 3, 1116662526, 'Mateo Hernandez', 'docente', NULL, NULL),
	(7, 3, 74825033, 'Edwin Rodriguez', 'docente', NULL, NULL),
	(8, 3, 47426505, 'Yadira Hernandez', 'directivo', NULL, NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.ext_servicio_extension: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `ext_servicio_extension` DISABLE KEYS */;
INSERT IGNORE INTO `ext_servicio_extension` (`id`, `extseex_year`, `extseex_semestre`, `extseex_codigo_organizacional`, `extseex_codigo_ser`, `extseex_nombre_ser`, `extseex_descripcion_ser`, `extseex_valor_ser`, `extseex_id_area_extension`, `extseex_fecha_inicio`, `extseex_fecha_final`, `extseex_nombre_contacto`, `extseex_apellido_contacto`, `extseex_telefono_contacto`, `extseex_correo_contacto`, `extseex_costo`, `extseex_criterio_elegibilidad`, `extseex_id_area_trabajo`, `extseex_id_ciclo_vital`, `extseex_id_entidad_nacional`, `extseex_id_fuente_nacional`, `extseex_valor_financiacion_nac`, `extseex_id_fuente_internacional`, `extseex_id_pais`, `extseex_nombre_institucion_inter`, `extseex_valor_financiacion_inter`, `extseex_nombre_otra_entidad`, `extseex_id_sector_otra_entidad`, `extseex_id_pais_otra_entidad`, `extseex_id_poblacion_condicion`, `extseex_cantidad_condicion`, `extseex_id_poblacion_grupo`, `extseex_cantidad_grupo`, `extseex_soporte`, `created_at`, `updated_at`) VALUES
	(1, 2022, 2, '12453', '8638', 'mantenimiento', 'sin comentarios', 500000, 2, '2022-03-10', '2022-03-15', 'Luis', 'Boyaca', '3108585194', 'luis@gmail.com', 'Si', 'adasdasbdjkash asjdhasjkd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-10_mantenimiento.rar', '2022-03-10 03:14:56', '2022-03-10 03:55:26');
/*!40000 ALTER TABLE `ext_servicio_extension` ENABLE KEYS */;

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
  `lab_id_software` int(11) DEFAULT 0,
  `lab_material` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_laboratorio_facultad` (`lab_id_facultad`),
  KEY `FK_laboratorio_programa` (`lab_id_programa`),
  KEY `FK_laboratorio_software` (`lab_id_software`),
  KEY `FK_laboratorio_persona` (`lab_id_docente`),
  CONSTRAINT `FK_laboratorio_facultad` FOREIGN KEY (`lab_id_facultad`) REFERENCES `facultad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_laboratorio_persona` FOREIGN KEY (`lab_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_laboratorio_programa` FOREIGN KEY (`lab_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_laboratorio_software` FOREIGN KEY (`lab_id_software`) REFERENCES `software` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.laboratorio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.migrations: ~66 rows (aproximadamente)
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
	(23, '2022_02_25_215427_estu_saber_once', 16),
	(33, '2022_02_28_015853_unidad_organizadora', 17),
	(34, '2022_02_28_022324_actividad_cultural', 17),
	(35, '2022_02_28_024350_consultoria', 17),
	(36, '2022_02_28_025123_consultoria_recurso_humano', 17),
	(37, '2022_02_28_144843_cursos', 17),
	(41, '2022_02_28_150442_extension_participante', 17),
	(42, '2022_02_28_171406_fuentenacional', 18),
	(43, '2022_02_28_171456_fuenteninternacional', 18),
	(44, '2022_02_28_223510_compl_cine_detallado', 19),
	(45, '2022_02_28_225023_sector', 20),
	(47, '2022_03_01_012502_nivel_estudio', 21),
	(48, '2022_02_28_145215_educacion_continua', 22),
	(49, '2022_03_02_222218_docente_participantex', 23),
	(50, '2022_03_03_162600_redes', 24),
	(51, '2022_03_03_195310_practicas', 25),
	(52, '2022_03_04_004419_estudiante_egresado', 26),
	(53, '2022_03_04_033004_recursotecnologicos', 27),
	(54, '2022_03_04_133437_estudiante_reporte_generals', 28),
	(56, '2022_03_04_205154_docente_asignatura', 29),
	(57, '2022_03_05_151234_docente_visitante', 30),
	(58, '2022_03_05_172000_tipo_prueba', 31),
	(59, '2022_03_05_172014_tipo_modulo', 31),
	(60, '2022_03_05_172044_prueba_saber', 31),
	(61, '2022_03_05_172517_prueba_saber_modulo', 31),
	(62, '2022_03_06_021442_prueba_saber_pro', 32),
	(63, '2022_03_06_022010_prueba_saber_pro_modulo', 32),
	(65, '2022_03_08_013328_resultado_prueba', 33),
	(66, '2022_03_08_014241_resultado_prueba_modulo', 33),
	(67, '2022_03_08_143956_laboratorio', 34),
	(68, '2022_03_08_214905_registro_fotografico', 35),
	(69, '2022_03_09_151233_proyectoextension', 36),
	(70, '2022_03_09_152913_complareaextension', 36),
	(71, '2022_03_09_153017_complareatrabajo', 36),
	(72, '2022_03_09_153133_complsectorentidad', 36),
	(73, '2022_03_09_153232_complpoblacioncondicion', 36),
	(74, '2022_03_09_153256_complpoblaciongrupo', 36),
	(75, '2022_03_09_160717_complentidadnacional', 37),
	(76, '2022_03_09_213335_servicioextension', 38),
	(80, '2022_03_10_042421_sector_externo_red_academica_convenio', 39),
	(81, '2022_03_10_042712_sector_externo_red_academica_convenio_participantes', 39),
	(82, '2022_03_13_025154_sector_externo_organizaciones', 39),
	(83, '2022_03_13_025424_sector_externo_organizaciones_participante', 39),
	(84, '2022_03_13_042354_ext_internacionalizacion_curriculo', 40);
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.persona: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT IGNORE INTO `persona` (`id`, `per_tipo_documento`, `per_numero_documento`, `per_nombre`, `per_apellido`, `per_telefono`, `per_correo`, `password`, `per_departamento`, `per_ciudad`, `per_tipo_usuario`, `per_id_estado`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(42, 'Cédula de ciudadanía', '1006450866', 'Michael', 'Rodriguez', '3223342408', 'michaelrodriguezhernandez@unisangil.edu.co', '$2y$10$OoLMVOFANktexO6I/cYjXeQx.2SfZBtbvd7t8hQ7hNK9o6h9pcOtO', 1, 2, 1, 'activo', NULL, NULL, NULL, NULL),
	(43, 'Cédula de ciudadania', '74825033', 'Edwin Efrain', 'Rodriguez Hernandez', '3108585194', 'eroher@gmail.com', NULL, 1, 2, 5, 'activo', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.practica_laboral
CREATE TABLE IF NOT EXISTS `practica_laboral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prac_year` int(11) NOT NULL DEFAULT 0,
  `prac_razon_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_nit_empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_url_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prac_correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_area_practica` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_id_docente` int(11) DEFAULT NULL,
  `prac_id_estudiante` int(11) DEFAULT NULL,
  `prac_cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_practica_laboral_estudiante` (`prac_id_estudiante`),
  KEY `FK_practica_laboral_persona` (`prac_id_docente`),
  CONSTRAINT `FK_practica_laboral_estudiante` FOREIGN KEY (`prac_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_practica_laboral_persona` FOREIGN KEY (`prac_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.practica_laboral: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `practica_laboral` DISABLE KEYS */;
/*!40000 ALTER TABLE `practica_laboral` ENABLE KEYS */;

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
  `pro_grupo_referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_grupo_referencia_nbc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_tipo_norma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id_director` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_programa_persona` (`pro_id_director`),
  CONSTRAINT `FK_programa_persona` FOREIGN KEY (`pro_id_director`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.programa: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `programa` DISABLE KEYS */;
INSERT IGNORE INTO `programa` (`id`, `pro_nombre`, `pro_estado`, `pro_departamento`, `pro_municipio`, `pro_facultad`, `pro_titulo`, `pro_codigosnies`, `pro_resolucion`, `pro_fecha_ult`, `pro_fecha_prox`, `pro_nivel_formacion`, `pro_programa_ciclo`, `pro_metodologia`, `pro_duraccion`, `pro_periodo_admision`, `pro_grupo_referencia`, `pro_grupo_referencia_nbc`, `pro_tipo_norma`, `pro_id_director`, `created_at`, `updated_at`) VALUES
	(9, 'Ingeniería de sistemas', 'Activo', 1, 2, 2, 'Ingeniero de sistemas', 7415, 'n/a', '2022-03-12', '2022-03-12', 4, 'Si', 2, 10, 'Semestral', 'Ingeniería', 'Ingeniería de sistemas, electrónica y afines', 'n/a', 43, '2022-03-13 04:13:23', '2022-03-13 04:13:23');
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
  KEY `FK_programa_plan_asignatura_horario_persona` (`pph_id_docente`),
  CONSTRAINT `FK_programa_plan_asignatura_hor` FOREIGN KEY (`pph_id_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_asignatura_horario_persona` FOREIGN KEY (`pph_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_asignatura_horario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_asignatura_horario` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_plan_estudio: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_plan_estudio` DISABLE KEYS */;
INSERT IGNORE INTO `programa_plan_estudio` (`id`, `pp_id_sede`, `pp_id_programa`, `pp_plan`, `pp_creditos`, `pp_no_asignaturas`, `pp_estado`, `created_at`, `updated_at`) VALUES
	(8, 2, 9, '2016', 164, 28, 'activo', '2022-03-13 04:13:45', '2022-03-13 04:13:45');
/*!40000 ALTER TABLE `programa_plan_estudio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.programa_plan_estudio_asignatura
CREATE TABLE IF NOT EXISTS `programa_plan_estudio_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asig_id_sede` int(11) NOT NULL,
  `asig_id_programa` int(11) NOT NULL,
  `asig_id_plan_estudio` int(11) NOT NULL,
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
  CONSTRAINT `FK_programa_plan_estudio_asignatura_municipio` FOREIGN KEY (`asig_id_sede`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_programa` FOREIGN KEY (`asig_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_programa_plan_estudio` FOREIGN KEY (`asig_id_plan_estudio`) REFERENCES `programa_plan_estudio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.programa_plan_estudio_asignatura: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_plan_estudio_asignatura` DISABLE KEYS */;
INSERT IGNORE INTO `programa_plan_estudio_asignatura` (`id`, `asig_id_sede`, `asig_id_programa`, `asig_id_plan_estudio`, `asig_codigo`, `asig_nombre`, `asig_no_creditos`, `asig_no_semanales`, `asig_no_semestre`, `asig_estado`, `created_at`, `updated_at`) VALUES
	(5, 2, 9, 8, '5203', 'Estructura de datos', 4, 4, 64, 'activo', '2022-03-13 04:14:07', '2022-03-13 04:14:07');
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
  KEY `FK_prueba_resultado_programa_programa` (`prurepro_id_programa`),
  CONSTRAINT `FK_prueba_resultado_programa_programa` FOREIGN KEY (`prurepro_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_resultado_programa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_resultado_programa` DISABLE KEYS */;
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
  KEY `FK_prueba_resultado_programa_modulo_programa` (`prurepromo_id_prueba_programa`),
  CONSTRAINT `FK_prueba_resultado_programa_modulo_programa` FOREIGN KEY (`prurepromo_id_prueba_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_prueba_resultado_programa_modulo_tipo_modulo` FOREIGN KEY (`prureprono_id_modulo`) REFERENCES `tipo_modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_resultado_programa_modulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_resultado_programa_modulo` DISABLE KEYS */;
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
  KEY `FK_prueba_saber_estudiante` (`prueba_saber_id_estudiante`),
  CONSTRAINT `FK_prueba_saber_estudiante` FOREIGN KEY (`prueba_saber_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_saber: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_saber` DISABLE KEYS */;
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
  KEY `FK_prueba_saber_modulo_tipo_modulo` (`prsamo_id_modulo`),
  CONSTRAINT `FK_prueba_saber_modulo_estudiante` FOREIGN KEY (`prsamo_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_prueba_saber_modulo_tipo_modulo` FOREIGN KEY (`prsamo_id_modulo`) REFERENCES `tipo_modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_saber_modulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_saber_modulo` DISABLE KEYS */;
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
  KEY `FK_prueba_saber_pro_estudiante` (`prsapr_id_estudiante`),
  CONSTRAINT `FK_prueba_saber_pro_estudiante` FOREIGN KEY (`prsapr_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_saber_pro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_saber_pro` DISABLE KEYS */;
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
  KEY `FK_prueba_saber_pro_modulo_tipo_modulo` (`prsaprmo_id_modulo`),
  CONSTRAINT `FK_prueba_saber_pro_modulo_estudiante` FOREIGN KEY (`prsaprmo_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_prueba_saber_pro_modulo_tipo_modulo` FOREIGN KEY (`prsaprmo_id_modulo`) REFERENCES `tipo_modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.prueba_saber_pro_modulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prueba_saber_pro_modulo` DISABLE KEYS */;
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
  `red_id_programa` int(11) NOT NULL,
  `red_observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla proyecto.software: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `software` DISABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.software_recurso_tecnologico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `software_recurso_tecnologico` DISABLE KEYS */;
/*!40000 ALTER TABLE `software_recurso_tecnologico` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipo_modulo
CREATE TABLE IF NOT EXISTS `tipo_modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_modulo_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_modulo_id_prueba` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tipo_modulo_tipo_prueba` (`tipo_modulo_id_prueba`),
  CONSTRAINT `FK_tipo_modulo_tipo_prueba` FOREIGN KEY (`tipo_modulo_id_prueba`) REFERENCES `tipo_prueba` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.tipo_modulo: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_modulo` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_modulo` (`id`, `tipo_modulo_nombre`, `tipo_modulo_id_prueba`, `created_at`, `updated_at`) VALUES
	(2, 'Lectura critica', 1, '2022-03-05 19:21:58', '2022-03-05 19:21:58'),
	(3, 'Ingles', 1, '2022-03-05 21:02:07', '2022-03-05 21:02:07'),
	(4, 'Ciencias naturales', 1, '2022-03-05 21:05:49', '2022-03-05 21:05:49'),
	(5, 'Comunicación escrita', 3, '2022-03-06 02:44:59', '2022-03-06 02:44:59'),
	(7, 'Razonamiento cuantitativo', 3, '2022-03-06 02:45:29', '2022-03-06 02:45:29'),
	(8, 'Lectura critica', 3, '2022-03-06 02:45:36', '2022-03-06 02:45:36'),
	(9, 'Ingles', 3, '2022-03-06 02:45:45', '2022-03-06 02:45:45'),
	(10, 'Competencias ciudadanas', 3, '2022-03-06 02:45:55', '2022-03-06 02:45:55');
/*!40000 ALTER TABLE `tipo_modulo` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipo_prueba
CREATE TABLE IF NOT EXISTS `tipo_prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_prueba_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.tipo_prueba: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_prueba` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_prueba` (`id`, `tipo_prueba_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Pruebas saber 11', '2022-03-05 18:54:55', '2022-03-05 18:54:55'),
	(3, 'Prueba saber PRO', '2022-03-06 02:44:39', '2022-03-06 02:44:39');
/*!40000 ALTER TABLE `tipo_prueba` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipo_usuario
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.tipo_usuario: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_usuario` (`id`, `tip_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', '2022-02-19 16:29:40', '2022-02-19 16:29:40'),
	(2, 'Director programa / docente', '2022-02-19 16:30:09', '2022-02-19 16:30:10'),
	(3, 'Auxiliar', '2022-02-19 16:30:06', '2022-02-19 16:30:07'),
	(4, 'Director programa', '2022-02-19 16:30:27', '2022-02-19 16:30:27'),
	(5, 'Docente', '2022-02-21 01:00:19', '2022-02-21 01:00:21'),
	(6, 'Administrativo ', '2022-03-05 10:00:51', NULL),
	(7, 'Docente visitante', '2022-03-05 10:00:50', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyecto.trabajo_grado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajo_grado` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajo_grado` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
