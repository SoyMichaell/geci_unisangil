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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_estudiante_persona` (`estu_id_estudiante`),
  CONSTRAINT `FK_estudiante_persona` FOREIGN KEY (`estu_id_estudiante`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_estudiante_programa` FOREIGN KEY (`estu_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_estudiante_programa_plan_estudio` FOREIGN KEY (`estu_programa_plan`) REFERENCES `programa_plan_estudio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  CONSTRAINT `FK_estudiante_egresado_persona` FOREIGN KEY (`este_id_estudiante`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_ext_actividad_cultural_persona` (`extcul_persona`),
  CONSTRAINT `FK_ext_actividad_cultural_compl_fuente_internacional` FOREIGN KEY (`extcul_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_actividad_cultural_compl_fuente_nacional` FOREIGN KEY (`extcul_fuente_nacional`) REFERENCES `compl_fuente_nacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_actividad_cultural_persona` FOREIGN KEY (`extcul_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_ext_consultoria_compl_fuente_internacional` (`extcon_fuente_internacional`),
  CONSTRAINT `FK_ext_consultoria_compl_cine_detallado` FOREIGN KEY (`extcon_id_cine_campo`) REFERENCES `compl_cine_detallado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_consultoria_compl_fuente_internacional` FOREIGN KEY (`extcon_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_consultoria_compl_fuente_nacional` FOREIGN KEY (`extcon_fuente_nacional`) REFERENCES `compl_fuente_nacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_consultoria_compl_sector` FOREIGN KEY (`ext_sector_consultoria`) REFERENCES `compl_sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_ext_educacion_continua_compl_area_extension` (`extedu_tipo_extension`),
  CONSTRAINT `FK_ext_educacion_continua_compl_area_extension` FOREIGN KEY (`extedu_tipo_extension`) REFERENCES `compl_area_extension` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_educacion_continua_persona` FOREIGN KEY (`extedu_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  CONSTRAINT `FK_ext_internacionalizacion_curriculo__asignatura` FOREIGN KEY (`exincu_id_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_internacionalizacion_curriculo_persona` FOREIGN KEY (`exincu_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_ext_movilidad_internacional_persona` (`exmointer_id_persona`),
  CONSTRAINT `FK_ext_movilidad_internacional_facultad` FOREIGN KEY (`exmointer_id_facultad_or`) REFERENCES `facultad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_internacional_municipio` FOREIGN KEY (`exmointer_id_sede_or`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_internacional_persona` FOREIGN KEY (`exmointer_id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_internacional_programa` FOREIGN KEY (`exmointer_id_programa_or`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_ext_movilidad_intersede_persona` (`exmoin_id_persona`),
  CONSTRAINT `FK_ext_movilidad_intersede_facultad` FOREIGN KEY (`exmoin_id_facultad_or`) REFERENCES `facultad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_intersede_facultad_2` FOREIGN KEY (`exmoin_id_facultad_des`) REFERENCES `facultad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_intersede_municipio` FOREIGN KEY (`exmoin_id_sede_or`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_intersede_municipio_2` FOREIGN KEY (`exmoin_id_sede_des`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_intersede_persona` FOREIGN KEY (`exmoin_id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_intersede_programa` FOREIGN KEY (`exmoin_id_programa_or`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_intersede_programa_2` FOREIGN KEY (`exmoin_id_programa_des`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_ext_movilidad_nacional_persona` (`exmona_id_persona`),
  CONSTRAINT `FK_ext_movilidad_nacional_facultad` FOREIGN KEY (`exmona_id_facultad`) REFERENCES `facultad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_nacional_municipio` FOREIGN KEY (`exmona_id_sede`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_nacional_persona` FOREIGN KEY (`exmona_id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_movilidad_nacional_programa` FOREIGN KEY (`exmona_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_ext_participacion_eventos_persona` (`expaev_id_persona`),
  CONSTRAINT `FK_ext_participacion_eventos_persona` FOREIGN KEY (`expaev_id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_ext_servicio_extension_compl_poblacion_grupo` (`extseex_id_poblacion_grupo`),
  CONSTRAINT `FK_ext_servicio_extension_compl_area_extension` FOREIGN KEY (`extseex_id_area_extension`) REFERENCES `compl_area_extension` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_servicio_extension_compl_area_trabajo` FOREIGN KEY (`extseex_id_area_trabajo`) REFERENCES `compl_area_trabajo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_servicio_extension_compl_entidad_nacional` FOREIGN KEY (`extseex_id_fuente_nacional`) REFERENCES `compl_entidad_nacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_servicio_extension_compl_entidad_nacional_2` FOREIGN KEY (`extseex_id_entidad_nacional`) REFERENCES `compl_entidad_nacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_servicio_extension_compl_fuente_internacional` FOREIGN KEY (`extseex_id_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_servicio_extension_compl_poblacion_condicion` FOREIGN KEY (`extseex_id_poblacion_condicion`) REFERENCES `compl_poblacion_condicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_servicio_extension_compl_poblacion_grupo` FOREIGN KEY (`extseex_id_poblacion_grupo`) REFERENCES `compl_poblacion_grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ext_servicio_extension_compl_sector` FOREIGN KEY (`extseex_id_sector_otra_entidad`) REFERENCES `compl_sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_inv_grupo_investigacion_facultad` (`inv_facultad`),
  CONSTRAINT `FK_inv_grupo_investigacion_facultad` FOREIGN KEY (`inv_facultad`) REFERENCES `facultad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_inv_grupo_investigacion_municipio` FOREIGN KEY (`inv_sede`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_inv_grupo_investigacion_persona` FOREIGN KEY (`inv_id_coordinador`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_inv_investigador_persona` (`inves_id_persona`),
  CONSTRAINT `FK_inv_investigador_inv_grupo_investigacion` FOREIGN KEY (`inves_id_grupo`) REFERENCES `inv_grupo_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_inv_investigador_persona` FOREIGN KEY (`inves_id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_inv_proyecto_inv_grupo_investigacion` (`invpro_id_grupo`),
  CONSTRAINT `FK_inv_proyecto_inv_grupo_investigacion` FOREIGN KEY (`invpro_id_grupo`) REFERENCES `inv_grupo_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_laboratorio_persona` (`lab_id_docente`),
  CONSTRAINT `FK_laboratorio_facultad` FOREIGN KEY (`lab_id_facultad`) REFERENCES `facultad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_laboratorio_persona` FOREIGN KEY (`lab_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_laboratorio_programa` FOREIGN KEY (`lab_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_laboratorio_software` FOREIGN KEY (`lab_id_software`) REFERENCES `software` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_movilidad_persona` (`movi_id_persona`),
  CONSTRAINT `FK_movilidad_persona` FOREIGN KEY (`movi_id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_persona_tipo_usuario` (`per_tipo_usuario`),
  CONSTRAINT `FK_persona_departamento` FOREIGN KEY (`per_departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_persona_tipo_usuario` FOREIGN KEY (`per_tipo_usuario`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  `prac_id_persona` int(11) NOT NULL,
  `prac_rol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prac_cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_practica_laboral_persona` (`prac_id_persona`) USING BTREE,
  CONSTRAINT `FK_practica_laboral_persona` FOREIGN KEY (`prac_id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_programa_persona` (`pro_id_director`),
  CONSTRAINT `FK_programa_persona` FOREIGN KEY (`pro_id_director`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_programa_plan_estudio_asignatura_compl_area_plan` (`asig_id_area`),
  CONSTRAINT `FK_programa_plan_estudio_asignatura_compl_area_plan` FOREIGN KEY (`asig_id_area`) REFERENCES `compl_area_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_compl_componente_plan` FOREIGN KEY (`asig_id_componente`) REFERENCES `compl_componente_plan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_municipio` FOREIGN KEY (`asig_id_sede`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_programa` FOREIGN KEY (`asig_id_programa`) REFERENCES `programa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_programa_plan_estudio_asignatura_programa_plan_estudio` FOREIGN KEY (`asig_id_plan_estudio`) REFERENCES `programa_plan_estudio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  CONSTRAINT `FK_prueba_saber_pro_estudiante` FOREIGN KEY (`prsapr_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  CONSTRAINT `FK_prueba_saber_pro_modulo_estudiante` FOREIGN KEY (`prsaprmo_id_estudiante`) REFERENCES `estudiante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_prueba_saber_pro_modulo_tipo_modulo` FOREIGN KEY (`prsaprmo_id_modulo`) REFERENCES `tipo_modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
  KEY `FK_software_recurso_tecnologico_persona` (`sofrete_id_docente`),
  CONSTRAINT `FK_software_recurso_tecnologico_persona` FOREIGN KEY (`sofrete_id_docente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proyecto.tipo_prueba
CREATE TABLE IF NOT EXISTS `tipo_prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_prueba_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proyecto.tipo_usuario
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proyecto.trabajo_grado
CREATE TABLE IF NOT EXISTS `trabajo_grado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tra_codigo_proyecto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_titulo_proyecto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tra_id_estudiante` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  KEY `FK_trabajo_grado_modalidad_grado` (`tra_modalidad_grado`),
  KEY `FK_trabajo_grado_persona` (`tra_id_director`),
  KEY `FK_trabajo_grado_persona_2` (`tra_id_codirector`),
  KEY `FK_trabajo_grado_persona_3` (`tra_id_externo`),
  KEY `FK_trabajo_grado_persona_4` (`tra_id_jurado1`),
  KEY `FK_trabajo_grado_persona_5` (`tra_id_jurado2`),
  CONSTRAINT `FK_trabajo_grado_modalidad_grado` FOREIGN KEY (`tra_modalidad_grado`) REFERENCES `modalidad_grado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona` FOREIGN KEY (`tra_id_director`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona_2` FOREIGN KEY (`tra_id_codirector`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona_3` FOREIGN KEY (`tra_id_externo`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona_4` FOREIGN KEY (`tra_id_jurado1`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_trabajo_grado_persona_5` FOREIGN KEY (`tra_id_jurado2`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
