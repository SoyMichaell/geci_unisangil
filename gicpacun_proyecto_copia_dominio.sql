-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-04-2022 a las 22:02:17
-- Versión del servidor: 8.0.28-cll-lve
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gicpacun_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienestar_institucional`
--

CREATE TABLE `bienestar_institucional` (
  `id` int NOT NULL,
  `bie_fecha` date NOT NULL,
  `bie_nombre_actividad` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bie_total_participantes` int NOT NULL DEFAULT '0',
  `bie_estudiantes` int NOT NULL DEFAULT '0',
  `bie_docentes` int NOT NULL DEFAULT '0',
  `bie_administrativos` int NOT NULL DEFAULT '0',
  `bie_egresados` int NOT NULL DEFAULT '0',
  `bie_particulares` int NOT NULL DEFAULT '0',
  `bie_codigo_snies` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bie_soporte` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bie_observacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_area_extension`
--

CREATE TABLE `compl_area_extension` (
  `id` int NOT NULL,
  `coarex_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_area_extension`
--

INSERT INTO `compl_area_extension` (`id`, `coarex_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Servicio social', '2022-03-09 20:36:24', NULL),
(2, 'Gestión tecnológica', '2022-03-09 20:36:38', NULL),
(3, 'Programas interdisciplinarios', '2022-03-09 20:36:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_area_trabajo`
--

CREATE TABLE `compl_area_trabajo` (
  `id` int NOT NULL,
  `coartra_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_area_trabajo`
--

INSERT INTO `compl_area_trabajo` (`id`, `coartra_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Educación', '2022-03-09 20:32:14', '2022-03-09 20:32:14'),
(2, 'Salud', '2022-03-09 20:32:18', '2022-03-09 20:32:18'),
(3, 'Habitat', '2022-03-09 20:32:24', '2022-03-09 20:32:24'),
(4, 'Movilidad y espacio público', '2022-03-09 20:32:36', '2022-03-09 20:32:37'),
(5, 'Desarrollo productivo y generación de ingresos en microempresas', '2022-03-09 20:33:15', '2022-03-09 20:33:16'),
(6, 'Desarrollo productivo y generación de ingresos en pequeñas empresas', '2022-03-09 20:33:40', NULL),
(7, 'Desarrollo productivo y generación de ingresos en medianas empresas', '2022-03-09 20:33:54', NULL),
(8, 'Desarrollo productivo y generación de ingresos en famiempresas', '2022-03-09 20:34:07', NULL),
(9, 'Desarrollo productivo y generación de ingresos en otro tipo de empresas', '2022-03-09 20:34:21', NULL),
(10, 'Medio ambiente y recursos naturales', '2022-03-09 20:34:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_cine_detallado`
--

CREATE TABLE `compl_cine_detallado` (
  `id` int NOT NULL,
  `cocide_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_cine_detallado`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_entidad_nacional`
--

CREATE TABLE `compl_entidad_nacional` (
  `id` int NOT NULL,
  `coenna_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_entidad_nacional`
--

INSERT INTO `compl_entidad_nacional` (`id`, `coenna_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Consejería presidencial para la equidad de la mujer', '2022-03-09 20:52:23', NULL),
(2, 'Defenosoría del pueblo', '2022-03-09 20:52:35', NULL),
(3, 'ICBF - Instituto colombiano de bienestar familiar', '2022-03-09 20:53:04', NULL),
(4, 'SENA - Servicio nacional de aprendizaje', '2022-03-09 20:53:19', NULL),
(5, 'Superintendencia de notariado y registro público', '2022-03-09 20:53:43', NULL),
(6, 'Universidad nacional de colombia', '2022-03-09 20:53:57', NULL),
(7, 'Unidad ejecutiva de servicios públicos', '2022-03-09 20:54:54', NULL),
(8, 'Superintendencia de subsidio familiar', '2022-03-09 20:55:15', NULL),
(9, 'ACCI - Agenda colombiana de cooperación internacional', '2022-03-09 20:55:42', NULL),
(10, 'Colombia jóven', '2022-03-09 20:55:49', NULL),
(11, 'Colciencias', '2022-03-09 20:56:02', NULL),
(12, 'Ministerio de interior y justicia', '2022-03-09 20:56:18', NULL),
(13, 'Ministerio de relaciones exteriores', '2022-03-09 20:56:33', NULL),
(14, 'Ministerio de hacienda y crédito público', '2022-03-09 20:56:50', NULL),
(15, 'Ministerior de defensa nacional', '2022-03-09 20:57:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_fuente_internacional`
--

CREATE TABLE `compl_fuente_internacional` (
  `id` int NOT NULL,
  `cofuin_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_fuente_internacional`
--

INSERT INTO `compl_fuente_internacional` (`id`, `cofuin_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Sector empresarial', NULL, NULL),
(2, 'Sector administración pública', NULL, NULL),
(3, 'Centros de investigación y desarrollo tecnológico', NULL, NULL),
(4, 'Hospitales y clinicas', NULL, NULL),
(5, 'Instituciones privadas sin ánimo de lucro', NULL, NULL),
(6, 'Instituciones de educación superior', NULL, NULL),
(7, 'Organismo multilateral', NULL, NULL),
(8, 'Otra', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_fuente_nacional`
--

CREATE TABLE `compl_fuente_nacional` (
  `id` int NOT NULL,
  `cofuna_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_fuente_nacional`
--

INSERT INTO `compl_fuente_nacional` (`id`, `cofuna_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Recursos IES', NULL, NULL),
(2, 'Recursos públicos nacionales', NULL, NULL),
(3, 'Recursos públicos departamental', NULL, NULL),
(4, 'Recursos públicos municipales o distritales', NULL, NULL),
(5, 'Recursos privados', NULL, NULL),
(6, 'Recursos de organizaciones sin ánimo de lucro', NULL, NULL),
(7, 'Otras entidades', NULL, NULL),
(8, 'Recursos propios personales', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_nivel_estudio`
--

CREATE TABLE `compl_nivel_estudio` (
  `id` int NOT NULL,
  `conies_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_nivel_estudio`
--

INSERT INTO `compl_nivel_estudio` (`id`, `conies_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Postdoctorado', '2022-03-01 01:31:25', NULL),
(2, 'Doctorado', '2022-03-01 01:31:31', NULL),
(3, 'Maestría', '2022-03-01 01:31:40', NULL),
(4, 'Especialización universitaria', '2022-03-01 01:32:00', NULL),
(5, 'Especialización técnico profesional', '2022-03-01 01:32:14', NULL),
(6, 'Especialización tecnológica', '2022-03-01 01:32:31', NULL),
(7, 'Universitaria', '2022-03-01 01:32:43', NULL),
(8, 'Tecnológica', '2022-03-01 01:32:49', NULL),
(9, 'Formación técnica profesional', '2022-03-01 01:33:03', NULL),
(10, 'Estudiante pregrado', '2022-03-01 01:33:11', NULL),
(11, 'Especialización médico quirúrgica', '2022-03-01 01:33:26', NULL),
(12, 'Sin titulo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_poblacion_condicion`
--

CREATE TABLE `compl_poblacion_condicion` (
  `id` int NOT NULL,
  `copoco_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_poblacion_condicion`
--

INSERT INTO `compl_poblacion_condicion` (`id`, `copoco_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Vulnerabilidad social - Violencia intrafamiliar', '2022-03-09 20:59:06', NULL),
(2, 'Vulnerabilidad social - Violencia sexual', '2022-03-09 20:59:25', NULL),
(3, 'Vulnerabilidad social - Riesgo o abandono', '2022-03-09 20:59:42', NULL),
(4, 'Vulnerabilidad social - Habitante de calle', '2022-03-09 20:59:52', NULL),
(5, 'Vulnerabilidad social - Mujeres cabeza de familiar', '2022-03-09 21:00:07', NULL),
(6, 'Vulnerabilidad social - Otro', '2022-03-09 21:00:14', NULL),
(7, 'Vulnerabilidad económica - Desempleo', '2022-03-09 21:00:39', NULL),
(8, 'Vulnerabilidad económica - Explotación laboral', '2022-03-09 21:00:53', NULL),
(9, 'Vulnerabilidad económica - Trafico de personas', '2022-03-09 21:01:07', NULL),
(10, 'Vulnerabilidad económica - Prostitución', '2022-03-09 21:01:18', NULL),
(11, 'Vulnerabilidad económica - Otro', '2022-03-09 21:01:27', NULL),
(12, 'Reclusión', '2022-03-09 21:01:34', NULL),
(13, 'Consumo de sustancias psicoactivas', '2022-03-09 21:01:53', NULL),
(14, 'Necesidades educativas especiales - personas en condición de discapacidad', '2022-03-09 21:02:18', NULL),
(15, 'Necesidades educativas especiales - personas con talentos excepcionales ', NULL, NULL),
(16, 'Habitantes de frotera', '2022-03-09 21:02:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_poblacion_grupo`
--

CREATE TABLE `compl_poblacion_grupo` (
  `id` int NOT NULL,
  `copogr_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_poblacion_grupo`
--

INSERT INTO `compl_poblacion_grupo` (`id`, `copogr_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Familia', '2022-03-09 21:03:21', NULL),
(2, 'Géneros', '2022-03-09 21:03:28', NULL),
(3, 'Profesionales', '2022-03-09 21:03:37', NULL),
(4, 'Grupos étnicos', '2022-03-09 21:03:51', NULL),
(5, 'Campesinos', '2022-03-09 21:04:01', NULL),
(6, 'Mujeres', '2022-03-09 21:04:09', NULL),
(7, 'Empleados', '2022-03-09 21:04:09', NULL),
(8, 'Comunidades', '2022-03-09 21:04:47', NULL),
(9, 'Empresas, Mypimes', '2022-03-09 21:04:47', NULL),
(10, 'Entidades gubernamentales', '2022-03-09 21:04:46', NULL),
(11, 'Otro', '2022-03-09 21:04:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_sector`
--

CREATE TABLE `compl_sector` (
  `id` int NOT NULL,
  `cose_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compl_sector`
--

INSERT INTO `compl_sector` (`id`, `cose_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Sector empresarial', '2022-02-28 22:51:47', NULL),
(2, 'Sector administración pública', '2022-02-28 22:52:05', NULL),
(3, 'Centros de investigación y desarrollo tecnológico', '2022-02-28 22:52:23', NULL),
(4, 'Hospitales y clinicas', '2022-02-28 22:52:36', '2022-02-28 22:52:36'),
(5, 'Instituciones privadas sin ánimo de lucro', '2022-02-28 22:52:57', NULL),
(6, 'Instituciones de educación', '2022-02-28 22:53:10', NULL),
(7, 'Comunidad', '2022-02-28 22:53:17', NULL),
(8, 'Otro', '2022-02-28 22:53:21', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `id` int NOT NULL,
  `con_numero` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_alcance` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_institucion` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_nit` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_direccion` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_ciudad` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_pais` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_contacto` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_correo` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_telefono` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_objeto` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_logro_resultado` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_vigencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `con_programa_beneficiado` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_actividad_year_programa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `con_fecha_inicio` date NOT NULL,
  `con_fecha_final` date NOT NULL,
  `con_observacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int NOT NULL,
  `dep_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `dep_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Casanare', '2022-02-20 00:47:47', '2022-02-21 11:04:13'),
(6, 'Santander', '2022-04-05 21:00:00', '2022-04-05 21:00:00'),
(8, 'Boyacá', '2022-04-06 01:15:26', '2022-04-06 01:15:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` int NOT NULL,
  `id_persona_docente` int NOT NULL,
  `ciudad_procedencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_personal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dedicacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_contratacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vinculacion` date DEFAULT NULL,
  `eps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_esp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificado_esp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_dip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificado_dip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_pregrado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_pre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_especializacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_espe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_maestria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_mae` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_doctorado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_conocimiento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximo_nivel_formacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_maximo_nivel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institucion_maximo_nivel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modalidad_programa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riesgo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caja_compensacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_cuenta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soporte_hoja_vida` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentos_compl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_proceso` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `id_persona_docente`, `ciudad_procedencia`, `correo_personal`, `dedicacion`, `tipo_contratacion`, `fecha_vinculacion`, `eps`, `institucion_esp`, `certificado_esp`, `institucion_dip`, `certificado_dip`, `titulo_pregrado`, `institucion_pre`, `titulo_especializacion`, `institucion_espe`, `titulo_maestria`, `institucion_mae`, `titulo_doctorado`, `institucion_doc`, `area_conocimiento`, `maximo_nivel_formacion`, `titulo_maximo_nivel`, `institucion_maximo_nivel`, `modalidad_programa`, `riesgo`, `caja_compensacion`, `banco`, `no_cuenta`, `pension`, `estado`, `soporte_hoja_vida`, `documentos_compl`, `id_proceso`, `created_at`, `updated_at`) VALUES
(4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(5, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_asignatura`
--

CREATE TABLE `docente_asignatura` (
  `id` int NOT NULL,
  `docasi_id_docente` int NOT NULL,
  `docasi_id_asignatura` int NOT NULL,
  `docasi_numero_hora_docencia` int NOT NULL,
  `docasi_numero_hora_investigacion` int NOT NULL,
  `docasi_numero_hora_extension` int NOT NULL,
  `docasi_numero_hora_administrativas` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_contrato`
--

CREATE TABLE `docente_contrato` (
  `id` int NOT NULL,
  `doco_persona_docente` int NOT NULL,
  `doco_numero_contrato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_objeto_contrato` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_tipo_contrato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_fecha_inicio` date NOT NULL,
  `doco_fecha_fin` date NOT NULL,
  `doco_rol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_url_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doco_estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_evaluacion`
--

CREATE TABLE `docente_evaluacion` (
  `id` int NOT NULL,
  `doe_persona_docente` int NOT NULL,
  `doe_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doe_semestre` int NOT NULL,
  `doe_cal_auto` double NOT NULL,
  `doe_cal_hete` double NOT NULL,
  `doe_cal_coe` double NOT NULL,
  `doe_total_pro` double NOT NULL,
  `doe_observacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doe_url_evaluacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_visitante`
--

CREATE TABLE `docente_visitante` (
  `id` int NOT NULL,
  `docvi_tipo_documento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_numero_documento` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_entidad_origen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_pais` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_ciudad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_fecha_estadia` date NOT NULL,
  `docvi_cantidad_hora` double NOT NULL,
  `docvi_cantidad_dia` double NOT NULL,
  `docvi_cantidad_semana` double NOT NULL,
  `docvi_cantidad_mes` double NOT NULL,
  `docvi_cantidad_year` double NOT NULL,
  `docvi_objeto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_actividad_desarrolladas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_year` int NOT NULL,
  `docvi_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_url_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `docvi_tipo_usuario` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int NOT NULL,
  `estu_id_estudiante` int NOT NULL DEFAULT '0',
  `estu_programa` int NOT NULL DEFAULT '0',
  `estu_programa_plan` int DEFAULT '0',
  `estu_telefono2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_estrato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_fecha_nacimiento` date NOT NULL,
  `estu_fecha_expedicion` date NOT NULL,
  `estu_sexo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `estu_estado_civil` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `estu_ingreso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `estu_periodo_ingreso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_ult_matricula` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_semestre` int NOT NULL,
  `estu_financiamiento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_entidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_tipo_matricula` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_matricula` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estu_pga` double DEFAULT NULL,
  `estu_reconocimiento` int DEFAULT NULL,
  `estu_egresado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_administrativo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_cargo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_dependencia` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_fecha_ingreso` date DEFAULT NULL,
  `estu_no_contrato` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_egresado`
--

CREATE TABLE `estudiante_egresado` (
  `id` int NOT NULL,
  `este_id_estudiante` int NOT NULL,
  `este_fecha_finalizacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_promedio_acumulado` double DEFAULT NULL,
  `este_nombre_empresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_cargo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_sitio_trabajo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_tipo_contrato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_pais_residencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `este_ciudad_residencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_reporte_general`
--

CREATE TABLE `estudiante_reporte_general` (
  `id` int NOT NULL,
  `esture_year` int NOT NULL,
  `esture_id_programa` int NOT NULL,
  `esture_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `esture_inscritos` int NOT NULL,
  `esture_admitidos` int NOT NULL,
  `esture_mat_antiguos` int NOT NULL,
  `esture_mat_primer_semestre` int NOT NULL,
  `esture_mat_total` int NOT NULL,
  `esture_egresado_no_graduado` int NOT NULL,
  `esture_graduados` int NOT NULL,
  `esture_retirados` int NOT NULL,
  `esture_tasa_desercion` int NOT NULL,
  `esture_tasa_desercion_pro` int NOT NULL,
  `esture_porcentaje_termina` int NOT NULL,
  `esture_nro_estudiante_ies_nacional` int NOT NULL,
  `esture_nro_estudiante_ies_internacional` int NOT NULL,
  `esture_vis_nacional` int NOT NULL,
  `esture_vis_internacional` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_actividad_cultural`
--

CREATE TABLE `ext_actividad_cultural` (
  `id` int NOT NULL,
  `extcul_year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_semestre` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_codigo_unidad_org` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_codigo_actividad` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_descripcion_actividad` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_tipo_actividad` int NOT NULL,
  `extcul_fecha_inicio` date NOT NULL,
  `extcul_fecha_fin` date NOT NULL,
  `extcul_fuente_nacional` int NOT NULL,
  `extcul_valor_financiacion_nac` int NOT NULL,
  `extcul_nombre_institucion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcul_fuente_internacional` int DEFAULT NULL,
  `extcul_pais_financiador` int DEFAULT NULL,
  `extcul_valor_internacional` int DEFAULT NULL,
  `extcul_persona` int DEFAULT NULL,
  `extcul_dedicacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_consultoria`
--

CREATE TABLE `ext_consultoria` (
  `id` int NOT NULL,
  `extcon_year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcon_semestre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcon_codigo_consultoria` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcon_descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcon_id_cine_campo` int NOT NULL,
  `extcon_nombre_entidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_sector_consultoria` int NOT NULL,
  `extcon_valor` int NOT NULL,
  `extcon_fecha_inicio` date NOT NULL,
  `extcon_fecha_fin` date DEFAULT NULL,
  `extcon_fuente_nacional` int DEFAULT NULL,
  `extcon_valor_nacional` int DEFAULT NULL,
  `extcon_nombre_institucion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extcon_fuente_internacional` int DEFAULT NULL,
  `extcon_pais` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extcon_valor_internacional` int DEFAULT NULL,
  `extcon_id_persona` int DEFAULT NULL,
  `extcon_id_nivel_estudio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_curso`
--

CREATE TABLE `ext_curso` (
  `id` int NOT NULL,
  `extcurso_year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_semestre` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_codigo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_id_cine` int NOT NULL,
  `extcurso_extension` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_estado` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_fecha` date NOT NULL,
  `extcurso_id_docente` int NOT NULL DEFAULT '0',
  `extcurso_url_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_educacion_continua`
--

CREATE TABLE `ext_educacion_continua` (
  `id` int NOT NULL,
  `extedu_semestre` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extedu_codigo_curso` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extedu_numero_horas` int NOT NULL,
  `extedu_tipo_curso` int NOT NULL,
  `extedu_valor_curso` int NOT NULL,
  `extedu_id_docente` int NOT NULL,
  `extedu_tipo_extension` int NOT NULL,
  `extedu_cantidad` int NOT NULL,
  `extedu_url_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_eventos_nac_inter`
--

CREATE TABLE `ext_eventos_nac_inter` (
  `id` int NOT NULL,
  `exevin_tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevin_year` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevin_periodo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevin_nombre_evento` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevin_fecha_inicio` date NOT NULL,
  `exevin_fecha_final` date NOT NULL,
  `exevin_lugar` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `exevin_sede` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `exevin_ponentes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevin_institucion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevin_pais` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevin_nombre_ponencia` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_eventos_virtuales`
--

CREATE TABLE `ext_eventos_virtuales` (
  `id` int NOT NULL,
  `exevir_nombre_evento` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevir_fecha_inicio` date NOT NULL,
  `exevir_fecha_fin` date NOT NULL,
  `exevir_enlace_ingreso` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevir_enlace_imagen` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `exevir_nombre_ponente` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevir_institucion_origen` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevir_pais` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exevir_nombre_ponencia` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_internacionalizacion_curriculo`
--

CREATE TABLE `ext_internacionalizacion_curriculo` (
  `id` int NOT NULL,
  `exincu_year` int NOT NULL,
  `exincu_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exincu_id_asignatura` int NOT NULL,
  `exincu_id_docente` int NOT NULL,
  `ext_uso_idioma` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ext_uso_tic` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ext_competencia_global` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ext_movilidad_estudiante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext_otra_actividad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_movilidad_internacional`
--

CREATE TABLE `ext_movilidad_internacional` (
  `id` int NOT NULL,
  `exmointer_tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmointer_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmointer_id_sede_or` int NOT NULL,
  `exmointer_id_facultad_or` int NOT NULL,
  `exmointer_id_programa_or` int NOT NULL,
  `exmointer_id_persona` int NOT NULL,
  `exmointer_pais_des` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmointer_ciudad_des` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmointer_institucion_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmointer_tipo_movilidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmointer_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmointer_fecha_inicio` date NOT NULL,
  `exmointer_fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_movilidad_intersede`
--

CREATE TABLE `ext_movilidad_intersede` (
  `id` int NOT NULL,
  `exmoin_tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmoin_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmoin_id_sede_or` int NOT NULL,
  `exmoin_id_facultad_or` int NOT NULL,
  `exmoin_id_programa_or` int NOT NULL,
  `exmoin_id_sede_des` int NOT NULL,
  `exmoin_id_facultad_des` int NOT NULL,
  `exmoin_id_programa_des` int NOT NULL,
  `exmoin_id_persona` int NOT NULL,
  `exmoin_tipo_movilidad` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmoin_descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmoin_fecha_inicio` date NOT NULL,
  `exmoin_fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_movilidad_nacional`
--

CREATE TABLE `ext_movilidad_nacional` (
  `id` int NOT NULL,
  `exmona_tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmona_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exmona_id_sede` int NOT NULL,
  `exmona_id_facultad` int NOT NULL,
  `exmona_id_programa` int NOT NULL,
  `exmona_id_persona` int NOT NULL,
  `exmona_institucion_proviene` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmona_tipo_movilidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmona_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exmona_fecha_inicio` date NOT NULL,
  `exmona_fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_participacion_eventos`
--

CREATE TABLE `ext_participacion_eventos` (
  `id` int NOT NULL,
  `expaev_year` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expaev_periodo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expaev_tipo_evento` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expaev_nombre_evento` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expaev_fecha` date NOT NULL,
  `expaev_organizador` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expaev_id_persona` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_participante`
--

CREATE TABLE `ext_participante` (
  `id` int NOT NULL,
  `dop_id_docente` int NOT NULL,
  `dop_fecha_expedicion` date NOT NULL,
  `dop_sexo_biologico` int NOT NULL,
  `dop_estado_civil` int NOT NULL,
  `dop_id_pais` int NOT NULL,
  `dop_id_municipio` int NOT NULL,
  `dop_correo_personal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dop_direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_proyecto_extension`
--

CREATE TABLE `ext_proyecto_extension` (
  `id` int NOT NULL,
  `extprex_year` int NOT NULL,
  `extprex_semestre` int NOT NULL,
  `extprex_codigo_organizacional` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_codigo_pr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_nombre_pr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_descripcion_pr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_valor_pr` int NOT NULL,
  `extprex_id_area_extension` int NOT NULL,
  `extprex_fecha_inicio` date NOT NULL,
  `extprex_fecha_final` date NOT NULL,
  `extprex_nombre_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_apellido_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_telefono_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_correo_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extprex_id_area_trabajo` int DEFAULT NULL,
  `extprex_id_ciclo_vital` int DEFAULT NULL,
  `extprex_id_entidad_nacional` int DEFAULT NULL,
  `extprex_id_fuente_nacional` int DEFAULT NULL,
  `extprex_valor_financiacion_nac` int DEFAULT NULL,
  `extprex_id_fuente_internacional` int DEFAULT NULL,
  `extprex_id_pais` int DEFAULT NULL,
  `extprex_nombre_institucion_inter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extprex_valor_financiacion_inter` int DEFAULT NULL,
  `extprex_nombre_otra_entidad` int DEFAULT NULL,
  `extprex_id_sector_otra_entidad` int DEFAULT NULL,
  `extprex_id_pais_otra_entidad` int DEFAULT NULL,
  `extprex_id_poblacion_condicion` int DEFAULT NULL,
  `extprex_cantidad_condicion` int DEFAULT NULL,
  `extprex_id_poblacion_grupo` int DEFAULT NULL,
  `extprex_cantidad_grupo` int DEFAULT NULL,
  `extprex_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_registro_fotografico_inter`
--

CREATE TABLE `ext_registro_fotografico_inter` (
  `id` int NOT NULL,
  `extrefoin_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_tipo_actividad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_actividad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_ente_organizador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_fecha` date NOT NULL,
  `extrefoin_tipo_evento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_tipo_modalidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrefoin_soporte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_sector_externo_organizaciones`
--

CREATE TABLE `ext_sector_externo_organizaciones` (
  `id` int NOT NULL,
  `exseor_year` int NOT NULL,
  `exseor_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_caracter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_fecha` date NOT NULL,
  `exseor_actividades` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_logros` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_resultados` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_productos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_funcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseor_participantes` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_sector_externo_organizaciones_part`
--

CREATE TABLE `ext_sector_externo_organizaciones_part` (
  `id` int NOT NULL,
  `exseorpar_id_organizacion` int NOT NULL,
  `exseorpar_numero_identificacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseorpar_nombre_completo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseorpar_rol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_sector_externo_red_academia_convenio`
--

CREATE TABLE `ext_sector_externo_red_academia_convenio` (
  `id` int NOT NULL,
  `exsered_year` int NOT NULL,
  `exsered_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_ies` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_caracter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_fecha` date NOT NULL,
  `exsered_logros` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_resultados` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_productos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_funcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exsered_participantes` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_sector_externo_red_academia_convenio_participantes`
--

CREATE TABLE `ext_sector_externo_red_academia_convenio_participantes` (
  `id` int NOT NULL,
  `exseredpar_id_red_academica` int NOT NULL,
  `exseredpar_numero_identificacion` int NOT NULL,
  `exseredpar_nombre_participante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exseredpar_rol_participante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_servicio_extension`
--

CREATE TABLE `ext_servicio_extension` (
  `id` int NOT NULL,
  `extseex_year` int NOT NULL,
  `extseex_semestre` int NOT NULL,
  `extseex_codigo_organizacional` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_codigo_ser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_nombre_ser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_descripcion_ser` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_valor_ser` int NOT NULL,
  `extseex_id_area_extension` int NOT NULL,
  `extseex_fecha_inicio` date NOT NULL,
  `extseex_fecha_final` date NOT NULL,
  `extseex_nombre_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_apellido_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_telefono_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_correo_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_costo` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_criterio_elegibilidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extseex_id_area_trabajo` int DEFAULT NULL,
  `extseex_id_ciclo_vital` int DEFAULT NULL,
  `extseex_id_entidad_nacional` int DEFAULT NULL,
  `extseex_id_fuente_nacional` int DEFAULT NULL,
  `extseex_valor_financiacion_nac` int DEFAULT NULL,
  `extseex_id_fuente_internacional` int DEFAULT NULL,
  `extseex_id_pais` int DEFAULT NULL,
  `extseex_nombre_institucion_inter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extseex_valor_financiacion_inter` int DEFAULT NULL,
  `extseex_nombre_otra_entidad` int DEFAULT NULL,
  `extseex_id_sector_otra_entidad` int DEFAULT NULL,
  `extseex_id_pais_otra_entidad` int DEFAULT NULL,
  `extseex_id_poblacion_condicion` int DEFAULT NULL,
  `extseex_cantidad_condicion` int DEFAULT NULL,
  `extseex_id_poblacion_grupo` int DEFAULT NULL,
  `extseex_cantidad_grupo` int DEFAULT NULL,
  `extseex_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int NOT NULL,
  `fac_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `fac_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ciencias Económicas y Administrativas', '2022-03-16 08:15:32', '2022-03-16 08:15:32'),
(2, 'Ciencias Jurídicas y Políticas', '2022-03-16 08:15:58', '2022-03-16 08:15:58'),
(3, 'Ciencias de la Educación y de la Salud', '2022-03-16 08:16:21', '2022-03-16 08:16:21'),
(5, 'Ciencias Naturales e Ingeniería', '2022-04-05 08:13:06', '2022-04-05 08:13:06'),
(6, 'Programas UNAB', '2022-04-05 08:13:41', '2022-04-05 08:13:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_grupo_investigacion`
--

CREATE TABLE `inv_grupo_investigacion` (
  `id` int NOT NULL,
  `inv_id_coordinador` int NOT NULL,
  `inv_nombre_grupo` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_correo_institucional_grupo` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_codigo_minciencias` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_mision` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `inv_vision` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `inv_url_grupo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `inv_url_gruplac` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_area_conocimiento_principal` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_nucleo_conocimiento_nbc` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_sede` int NOT NULL DEFAULT '0',
  `inv_facultad` int NOT NULL DEFAULT '0',
  `inv_categoria_grupo` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `inv_aval_minciencias` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `inv_lineas_investigacion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_investigador`
--

CREATE TABLE `inv_investigador` (
  `id` int NOT NULL,
  `inves_id_persona` int NOT NULL,
  `inves_enlace_cvlac` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `inves_tipo_vinculacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `inves_categoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `inves_id_grupo` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_proyecto`
--

CREATE TABLE `inv_proyecto` (
  `id` int NOT NULL,
  `invpro_id_grupo` int NOT NULL,
  `invpro_titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invpro_resumen` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invpro_impacto` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invpro_lugar` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `invpro_resultados` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invpro_fecha_inicio` date NOT NULL,
  `invpro_id_integrantes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invpro_palabras_clave` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invpro_estado` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id` int NOT NULL,
  `lab_fecha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_ubicacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_id_docente` int NOT NULL,
  `lab_finalidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_id_facultad` int NOT NULL,
  `lab_id_programa` int NOT NULL,
  `lab_id_practicante` int NOT NULL,
  `lab_nombre_practica` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_cantidad_estudiante` int NOT NULL,
  `lab_id_software` int NOT NULL,
  `lab_material` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodologia`
--

CREATE TABLE `metodologia` (
  `id` bigint UNSIGNED NOT NULL,
  `met_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `metodologia`
--

INSERT INTO `metodologia` (`id`, `met_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Presencial', '2022-02-21 11:21:38', '2022-02-21 11:21:38'),
(2, 'Virtual', '2022-02-21 11:21:48', '2022-02-21 11:21:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
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
(84, '2022_03_13_042354_ext_internacionalizacion_curriculo', 40),
(85, '2022_03_14_143024_ext_movilidad_nacionals', 41),
(86, '2022_03_16_022630_ext_movilidad_intersedess', 42),
(87, '2022_03_16_192336_extmovilidadinternacionals', 43),
(88, '2022_03_17_035028_movilidads', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad_grado`
--

CREATE TABLE `modalidad_grado` (
  `id` int NOT NULL,
  `mod_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modalidad_grado`
--

INSERT INTO `modalidad_grado` (`id`, `mod_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Desarrollo tecnológico', '2022-02-25 07:42:55', '2022-02-25 07:45:14'),
(2, 'Investigación formulación', '2022-03-26 10:28:32', '2022-03-26 10:28:32'),
(3, 'Investigación ejecución', '2022-03-26 10:28:48', '2022-03-26 10:28:48'),
(4, 'Desarrollo Tecnológico curricular', '2022-03-26 10:29:01', '2022-03-26 10:29:01'),
(5, 'Desarrollo Tecnológico dirigido', '2022-03-26 10:29:11', '2022-03-26 10:29:11'),
(6, 'Desarrollo Tecnológico para una empresa', '2022-03-26 10:29:21', '2022-03-26 10:29:21'),
(7, 'Autogestión empresarial', '2022-03-26 10:29:38', '2022-03-26 10:29:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movilidad`
--

CREATE TABLE `movilidad` (
  `id` int NOT NULL,
  `movi_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_tipo_persona` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `movi_id_persona` int NOT NULL,
  `movi_tipo_movilidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_evento` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_pais` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_ciudad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `movi_observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int NOT NULL,
  `mun_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mun_departamento` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `mun_nombre`, `mun_departamento`, `created_at`, `updated_at`) VALUES
(5, 'Yopal', 1, '2022-04-02 09:08:16', '2022-04-02 09:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_formacion`
--

CREATE TABLE `nivel_formacion` (
  `id` int NOT NULL,
  `niv_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nivel_formacion`
--

INSERT INTO `nivel_formacion` (`id`, `niv_nombre`, `created_at`, `updated_at`) VALUES
(3, 'Técnico', '2022-04-05 07:44:17', '2022-04-05 07:44:17'),
(4, 'Tecnólogo', '2022-04-05 07:44:26', '2022-04-05 07:44:26'),
(5, 'Pregrado', '2022-04-05 07:44:34', '2022-04-05 07:44:34'),
(6, 'Especialización', '2022-04-05 07:44:41', '2022-04-05 07:44:41'),
(7, 'Maestría', '2022-04-05 21:00:32', '2022-04-05 21:00:32'),
(8, 'Doctorado', '2022-04-05 21:00:43', '2022-04-05 21:00:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int NOT NULL,
  `per_tipo_documento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_numero_documento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_departamento` int NOT NULL DEFAULT '0',
  `per_ciudad` int NOT NULL DEFAULT '0',
  `per_tipo_usuario` int NOT NULL DEFAULT '0',
  `per_id_estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `per_tipo_documento`, `per_numero_documento`, `per_nombre`, `per_apellido`, `per_telefono`, `per_correo`, `password`, `per_departamento`, `per_ciudad`, `per_tipo_usuario`, `per_id_estado`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cédula de ciudadanía', '1006450866', 'Michael', 'Rodriguez', '3223342408', 'michaelrodriguezhernandez@unisangil.edu.co', '$2y$10$Ih3YEf.BRiuIHS6sdbJdxeLHGqum6eoXf/8oybSv9VEt7GbhNl/Ky', 1, 5, 1, 'activo', NULL, NULL, NULL, NULL),
(3, 'Cédula de ciudadanía', '23914069', 'Angela Bibiana', 'Ortegón Fuentes', '3107994000', 'abortegon@unisangil.edu.co', '$2y$10$DQDTokDoP6UQMx633nt1xO3DNTNRa57zyBo4RojV1CKivyKGWLmUq', 1, 5, 2, 'activo', NULL, NULL, NULL, NULL),
(5, 'Cédula de ciudadanía', '1052916623', 'Miguel Ángel', 'Castillo Reina', '3103245006', 'mcastillo1@unisangil.edu.co', '$2y$10$KVe1cx1smYmXyPxFQzurne4xrro7pJSLZ.qQJSbgwsitbPF8N7BUS', 1, 5, 2, 'activo', NULL, NULL, NULL, NULL),
(6, 'Cédula de ciudadanía', '1118563834', 'Maritza', 'Alvarez Silva', '3106172998', 'malvarez@unisangil.edu.co', '$2y$10$y.7ny0s2LAsY1mYQyOeTcurR9jUfegY9O10GJQW2qNEwA.7CifEIG', 1, 5, 4, 'activo', NULL, NULL, NULL, NULL),
(7, 'Cédula de ciudadanía', '1118559031', 'Fabian David', 'Barreto Sanchez', '3173382506', 'fbarreto@unisangil.edu.co', '$2y$10$i3U/Lh3MRftYP74D3TXfre0cj5Fk0t3npajaBsgnBH1FHQ7pQWAJy', 1, 5, 2, 'activo', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_laboral`
--

CREATE TABLE `practica_laboral` (
  `id` int NOT NULL,
  `prac_year` int NOT NULL DEFAULT '0',
  `prac_razon_social` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_nit_empresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_pais` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_departamento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_ciudad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_url_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prac_correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_area_practica` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prac_id_persona` int NOT NULL,
  `prac_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prac_cargo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int NOT NULL,
  `pro_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_departamento` int NOT NULL,
  `pro_municipio` int NOT NULL,
  `pro_facultad` int NOT NULL,
  `pro_titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_codigosnies` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pro_resolucion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_fecha_ult` date NOT NULL,
  `pro_fecha_prox` date NOT NULL,
  `pro_nivel_formacion` int NOT NULL,
  `pro_programa_ciclo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_metodologia` int NOT NULL,
  `pro_duraccion` int NOT NULL,
  `pro_periodo_admision` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_grupo_referencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_grupo_referencia_nbc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_tipo_norma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id_director` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id`, `pro_nombre`, `pro_estado`, `pro_departamento`, `pro_municipio`, `pro_facultad`, `pro_titulo`, `pro_codigosnies`, `pro_resolucion`, `pro_fecha_ult`, `pro_fecha_prox`, `pro_nivel_formacion`, `pro_programa_ciclo`, `pro_metodologia`, `pro_duraccion`, `pro_periodo_admision`, `pro_grupo_referencia`, `pro_grupo_referencia_nbc`, `pro_tipo_norma`, `pro_id_director`, `created_at`, `updated_at`) VALUES
(1, 'Ingeniería de Sistemas', 'Activo', 1, 5, 5, 'Ingeniero de Sistemas', '7915', '002485', '2022-03-02', '2029-03-01', 5, 'No', 1, 10, 'Anual', 'Ingeniería', 'Ingeniería de sistemas, telemática y afines', '1234', 3, '2022-04-05 19:12:56', '2022-04-05 19:12:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_asignatura_horario`
--

CREATE TABLE `programa_asignatura_horario` (
  `id` int NOT NULL,
  `pph_year` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pph_semestre` int NOT NULL,
  `pph_id_asignatura` int NOT NULL,
  `pph_grupo` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pph_id_docente` int NOT NULL,
  `pph_horario` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `pph_aula` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pph_nro_horas_semana_docencia` int DEFAULT NULL,
  `pph_nro_horas_semana_investigacion` int DEFAULT NULL,
  `pph_nro_horas_semana_extension` int DEFAULT NULL,
  `pph_nro_horas_semana_administrativas` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_plan_estudio`
--

CREATE TABLE `programa_plan_estudio` (
  `id` int NOT NULL,
  `pp_id_sede` int NOT NULL DEFAULT '0',
  `pp_id_programa` int NOT NULL DEFAULT '0',
  `pp_plan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pp_creditos` int NOT NULL DEFAULT '0',
  `pp_no_asignaturas` int NOT NULL DEFAULT '0',
  `pp_estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programa_plan_estudio`
--

INSERT INTO `programa_plan_estudio` (`id`, `pp_id_sede`, `pp_id_programa`, `pp_plan`, `pp_creditos`, `pp_no_asignaturas`, `pp_estado`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2016', 164, 54, 'activo', '2022-04-05 20:42:59', '2022-04-05 20:42:59'),
(2, 5, 1, '909', 163, 60, 'inactivo', '2022-04-05 20:43:18', '2022-04-05 20:43:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_plan_estudio_asignatura`
--

CREATE TABLE `programa_plan_estudio_asignatura` (
  `id` int NOT NULL,
  `asig_id_sede` int NOT NULL,
  `asig_id_programa` int NOT NULL,
  `asig_id_plan_estudio` int NOT NULL,
  `asig_codigo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `asig_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asig_no_creditos` int NOT NULL,
  `asig_no_semanales` int NOT NULL,
  `asig_no_semestre` int NOT NULL,
  `asig_estado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_resultado_programa`
--

CREATE TABLE `prueba_resultado_programa` (
  `id` int NOT NULL,
  `prurepro_year` int NOT NULL,
  `prurepro_id_programa` int NOT NULL,
  `prurepro_global_programa` int NOT NULL,
  `prurepro_global_institucion` int NOT NULL,
  `prurepro_global_sede` int NOT NULL,
  `prurepro_global_grupo_referencia` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_resultado_programa_modulo`
--

CREATE TABLE `prueba_resultado_programa_modulo` (
  `id` int NOT NULL,
  `prurepromo_id_prueba_programa` int NOT NULL,
  `prureprono_id_modulo` int NOT NULL,
  `prureprono_puntaje_programa` int NOT NULL,
  `prureprono_puntaje_institucion` int NOT NULL,
  `prureprono_puntaje_sede` int NOT NULL,
  `prureprono_puntaje_grupo_referencia` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_saber`
--

CREATE TABLE `prueba_saber` (
  `id` int NOT NULL,
  `prueba_saber_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prueba_saber_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prueba_saber_id_estudiante` int NOT NULL,
  `prueba_saber_puntaje_global` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_saber_modulo`
--

CREATE TABLE `prueba_saber_modulo` (
  `id` int NOT NULL,
  `prsamo_id_estudiante` int NOT NULL,
  `prsamo_id_modulo` int NOT NULL,
  `prsamo_puntaje` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_saber_pro`
--

CREATE TABLE `prueba_saber_pro` (
  `id` int NOT NULL,
  `prsapr_year` int NOT NULL,
  `prsapr_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prsapr_id_estudiante` int NOT NULL,
  `prsapr_numero_registro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prsapr_grupo_referencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prsapr_puntaje_global` int DEFAULT NULL,
  `prsapr_percentil_nacional` int NOT NULL,
  `prsapr_percentil_grupo` int NOT NULL,
  `prsapr_novedad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_saber_pro_modulo`
--

CREATE TABLE `prueba_saber_pro_modulo` (
  `id` int NOT NULL,
  `prsaprmo_id_estudiante` int NOT NULL,
  `prsaprmo_id_modulo` int NOT NULL,
  `prsaprmo_puntaje` int NOT NULL,
  `prsaprmo_nivel_desempeno` int NOT NULL,
  `prsaprmo_percentil_nacional` int NOT NULL,
  `prsaprmo_percentil_grupo` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_academica`
--

CREATE TABLE `red_academica` (
  `id` int NOT NULL,
  `red_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_nombre_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_pais` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_ciudad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_alcance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_accion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_id_programa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `red_observacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `id` int NOT NULL,
  `sof_tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_desarrollador` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_version` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_no_licencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_year_ad_licencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_year_ve_licencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sof_asignatura` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sof_cantidad` int NOT NULL DEFAULT '0',
  `sof_id_programa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sof_valor_unitario` double NOT NULL DEFAULT '0',
  `sof_valor_total` double NOT NULL DEFAULT '0',
  `sof_fecha_actualizar` date DEFAULT NULL,
  `sof_fecha_instalacion` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_recurso_tecnologico`
--

CREATE TABLE `software_recurso_tecnologico` (
  `id` int NOT NULL,
  `sofrete_year` int NOT NULL,
  `sofrete_periodo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sofrete_tipo_recurso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sofrete_id_docente` int NOT NULL,
  `sofrete_id_asignatura` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_modulo`
--

CREATE TABLE `tipo_modulo` (
  `id` int NOT NULL,
  `tipo_modulo_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_modulo_id_prueba` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_prueba`
--

CREATE TABLE `tipo_prueba` (
  `id` int NOT NULL,
  `tipo_prueba_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int NOT NULL,
  `tip_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tip_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2022-03-17 15:41:16', NULL),
(2, 'Director programa - docente', '2022-03-17 15:41:23', NULL),
(3, 'Docente', '2022-03-17 15:41:28', NULL),
(4, 'Auxiliar', '2022-03-17 15:41:37', NULL),
(5, 'Administrativo', '2022-03-17 15:41:48', NULL),
(6, 'Estudiante', '2022-03-17 15:41:54', NULL),
(7, 'Doc visitante', '2022-03-17 15:42:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo_grado`
--

CREATE TABLE `trabajo_grado` (
  `id` int NOT NULL,
  `tra_codigo_proyecto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_titulo_proyecto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tra_id_estudiante` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_fecha_inicio` date NOT NULL,
  `tra_modalidad_grado` int NOT NULL,
  `tra_id_director` int NOT NULL,
  `tra_id_codirector` int NOT NULL,
  `tra_id_externo` int DEFAULT NULL,
  `tra_estado_propuesta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_estado_proyecto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_id_jurado1` int DEFAULT NULL,
  `tra_id_jurado2` int DEFAULT NULL,
  `tra_numero_acta_sustentacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_acta_sustentacion_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_numero_acta_grado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_acta_grado_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_fecha_finalizacion` date DEFAULT NULL,
  `tra_observacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tra_id_proceso` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bienestar_institucional`
--
ALTER TABLE `bienestar_institucional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_area_extension`
--
ALTER TABLE `compl_area_extension`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_area_trabajo`
--
ALTER TABLE `compl_area_trabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_cine_detallado`
--
ALTER TABLE `compl_cine_detallado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_entidad_nacional`
--
ALTER TABLE `compl_entidad_nacional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_fuente_internacional`
--
ALTER TABLE `compl_fuente_internacional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_fuente_nacional`
--
ALTER TABLE `compl_fuente_nacional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_nivel_estudio`
--
ALTER TABLE `compl_nivel_estudio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_poblacion_condicion`
--
ALTER TABLE `compl_poblacion_condicion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_poblacion_grupo`
--
ALTER TABLE `compl_poblacion_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_sector`
--
ALTER TABLE `compl_sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docente_persona` (`id_persona_docente`);

--
-- Indices de la tabla `docente_asignatura`
--
ALTER TABLE `docente_asignatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docente_asignatura_persona` (`docasi_id_docente`),
  ADD KEY `FK_docente_asignatura_programa_plan_estudio_asignatura` (`docasi_id_asignatura`);

--
-- Indices de la tabla `docente_contrato`
--
ALTER TABLE `docente_contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docente_contrato_persona` (`doco_persona_docente`);

--
-- Indices de la tabla `docente_evaluacion`
--
ALTER TABLE `docente_evaluacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docente_evaluacion_persona` (`doe_persona_docente`);

--
-- Indices de la tabla `docente_visitante`
--
ALTER TABLE `docente_visitante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_estudiante_programa` (`estu_programa`),
  ADD KEY `FK_estudiante_programa_plan_estudio` (`estu_programa_plan`),
  ADD KEY `FK_estudiante_persona` (`estu_id_estudiante`);

--
-- Indices de la tabla `estudiante_egresado`
--
ALTER TABLE `estudiante_egresado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_estudiante_egresado_estudiante` (`este_id_estudiante`);

--
-- Indices de la tabla `estudiante_reporte_general`
--
ALTER TABLE `estudiante_reporte_general`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_estudiante_reporte_general_programa` (`esture_id_programa`);

--
-- Indices de la tabla `ext_actividad_cultural`
--
ALTER TABLE `ext_actividad_cultural`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_actividad_cultural_compl_fuente_nacional` (`extcul_fuente_nacional`),
  ADD KEY `FK_ext_actividad_cultural_compl_fuente_internacional` (`extcul_fuente_internacional`),
  ADD KEY `FK_ext_actividad_cultural_persona` (`extcul_persona`);

--
-- Indices de la tabla `ext_consultoria`
--
ALTER TABLE `ext_consultoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_consultoria_compl_cine_detallado` (`extcon_id_cine_campo`),
  ADD KEY `FK_ext_consultoria_compl_sector` (`ext_sector_consultoria`),
  ADD KEY `FK_ext_consultoria_compl_fuente_nacional` (`extcon_fuente_nacional`),
  ADD KEY `FK_ext_consultoria_compl_fuente_internacional` (`extcon_fuente_internacional`);

--
-- Indices de la tabla `ext_curso`
--
ALTER TABLE `ext_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_curso_persona` (`extcurso_id_docente`),
  ADD KEY `FK_ext_curso_compl_cine_detallado` (`extcurso_id_cine`);

--
-- Indices de la tabla `ext_educacion_continua`
--
ALTER TABLE `ext_educacion_continua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_educacion_continua_persona` (`extedu_id_docente`),
  ADD KEY `FK_ext_educacion_continua_compl_area_extension` (`extedu_tipo_extension`);

--
-- Indices de la tabla `ext_eventos_nac_inter`
--
ALTER TABLE `ext_eventos_nac_inter`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ext_eventos_virtuales`
--
ALTER TABLE `ext_eventos_virtuales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ext_internacionalizacion_curriculo`
--
ALTER TABLE `ext_internacionalizacion_curriculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_internacionalizacion_curriculo_programa_pa` (`exincu_id_asignatura`),
  ADD KEY `FK_ext_internacionalizacion_curriculo_persona` (`exincu_id_docente`);

--
-- Indices de la tabla `ext_movilidad_internacional`
--
ALTER TABLE `ext_movilidad_internacional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_movilidad_internacional_municipio` (`exmointer_id_sede_or`),
  ADD KEY `FK_ext_movilidad_internacional_facultad` (`exmointer_id_facultad_or`),
  ADD KEY `FK_ext_movilidad_internacional_programa` (`exmointer_id_programa_or`),
  ADD KEY `FK_ext_movilidad_internacional_persona` (`exmointer_id_persona`);

--
-- Indices de la tabla `ext_movilidad_intersede`
--
ALTER TABLE `ext_movilidad_intersede`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_movilidad_intersede_programa` (`exmoin_id_programa_or`),
  ADD KEY `FK_ext_movilidad_intersede_municipio_3` (`exmoin_id_sede_or`),
  ADD KEY `FK_ext_movilidad_intersede_facultad` (`exmoin_id_facultad_or`),
  ADD KEY `FK_ext_movilidad_intersede_municipio_2` (`exmoin_id_sede_des`),
  ADD KEY `FK_ext_movilidad_intersede_facultad_2` (`exmoin_id_facultad_des`),
  ADD KEY `FK_ext_movilidad_intersede_programa_2` (`exmoin_id_programa_des`),
  ADD KEY `FK_ext_movilidad_intersede_persona` (`exmoin_id_persona`);

--
-- Indices de la tabla `ext_movilidad_nacional`
--
ALTER TABLE `ext_movilidad_nacional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_movilidad_nacional_programa` (`exmona_id_programa`),
  ADD KEY `FK_ext_movilidad_nacional_facultad` (`exmona_id_facultad`),
  ADD KEY `FK_ext_movilidad_nacional_municipio` (`exmona_id_sede`),
  ADD KEY `FK_ext_movilidad_nacional_persona` (`exmona_id_persona`);

--
-- Indices de la tabla `ext_participacion_eventos`
--
ALTER TABLE `ext_participacion_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_participacion_eventos_persona` (`expaev_id_persona`);

--
-- Indices de la tabla `ext_participante`
--
ALTER TABLE `ext_participante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docente_participante_persona` (`dop_id_docente`);

--
-- Indices de la tabla `ext_proyecto_extension`
--
ALTER TABLE `ext_proyecto_extension`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_proyecto_extension_compl_area_extension` (`extprex_id_area_extension`),
  ADD KEY `FK_ext_proyecto_extension_compl_area_trabajo` (`extprex_id_area_trabajo`),
  ADD KEY `FK_ext_proyecto_extension_compl_sector` (`extprex_id_sector_otra_entidad`),
  ADD KEY `FK_ext_proyecto_extension_compl_poblacion_condicion` (`extprex_id_poblacion_condicion`),
  ADD KEY `FK_ext_proyecto_extension_compl_poblacion_grupo` (`extprex_id_poblacion_grupo`),
  ADD KEY `FK_ext_proyecto_extension_compl_entidad_nacional` (`extprex_id_entidad_nacional`),
  ADD KEY `FK_ext_proyecto_extension_compl_fuente_nacional` (`extprex_id_fuente_nacional`),
  ADD KEY `FK_ext_proyecto_extension_compl_fuente_internacional` (`extprex_id_fuente_internacional`);

--
-- Indices de la tabla `ext_registro_fotografico_inter`
--
ALTER TABLE `ext_registro_fotografico_inter`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ext_sector_externo_organizaciones`
--
ALTER TABLE `ext_sector_externo_organizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ext_sector_externo_organizaciones_part`
--
ALTER TABLE `ext_sector_externo_organizaciones_part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_sector_externo_organizaciones` (`exseorpar_id_organizacion`);

--
-- Indices de la tabla `ext_sector_externo_red_academia_convenio`
--
ALTER TABLE `ext_sector_externo_red_academia_convenio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ext_sector_externo_red_academia_convenio_participantes`
--
ALTER TABLE `ext_sector_externo_red_academia_convenio_participantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_sector_externo_red_academia` (`exseredpar_id_red_academica`);

--
-- Indices de la tabla `ext_servicio_extension`
--
ALTER TABLE `ext_servicio_extension`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ext_servicio_extension_compl_area_extension` (`extseex_id_area_extension`),
  ADD KEY `FK_ext_servicio_extension_compl_area_trabajo` (`extseex_id_area_trabajo`),
  ADD KEY `FK_ext_servicio_extension_compl_entidad_nacional` (`extseex_id_fuente_nacional`),
  ADD KEY `FK_ext_servicio_extension_compl_fuente_internacional` (`extseex_id_fuente_internacional`),
  ADD KEY `FK_ext_servicio_extension_compl_entidad_nacional_2` (`extseex_id_entidad_nacional`),
  ADD KEY `FK_ext_servicio_extension_compl_sector` (`extseex_id_sector_otra_entidad`),
  ADD KEY `FK_ext_servicio_extension_compl_poblacion_condicion` (`extseex_id_poblacion_condicion`),
  ADD KEY `FK_ext_servicio_extension_compl_poblacion_grupo` (`extseex_id_poblacion_grupo`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `inv_grupo_investigacion`
--
ALTER TABLE `inv_grupo_investigacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_inv_grupo_investigacion_persona` (`inv_id_coordinador`),
  ADD KEY `FK_inv_grupo_investigacion_municipio` (`inv_sede`),
  ADD KEY `FK_inv_grupo_investigacion_facultad` (`inv_facultad`);

--
-- Indices de la tabla `inv_investigador`
--
ALTER TABLE `inv_investigador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_inv_investigador_inv_grupo_investigacion` (`inves_id_grupo`),
  ADD KEY `FK_inv_investigador_persona` (`inves_id_persona`);

--
-- Indices de la tabla `inv_proyecto`
--
ALTER TABLE `inv_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_inv_proyecto_inv_grupo_investigacion` (`invpro_id_grupo`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_laboratorio_facultad` (`lab_id_facultad`),
  ADD KEY `FK_laboratorio_programa` (`lab_id_programa`),
  ADD KEY `FK_laboratorio_software` (`lab_id_software`),
  ADD KEY `FK_laboratorio_persona` (`lab_id_docente`);

--
-- Indices de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidad_grado`
--
ALTER TABLE `modalidad_grado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_movilidad_persona` (`movi_id_persona`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_municipio_departamento` (`mun_departamento`);

--
-- Indices de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persona_per_correo_unique` (`per_correo`),
  ADD KEY `FK_persona_departamento` (`per_departamento`),
  ADD KEY `FK_persona_tipo_usuario` (`per_tipo_usuario`);

--
-- Indices de la tabla `practica_laboral`
--
ALTER TABLE `practica_laboral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_practica_laboral_persona` (`prac_id_persona`) USING BTREE;

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_programa_persona` (`pro_id_director`);

--
-- Indices de la tabla `programa_asignatura_horario`
--
ALTER TABLE `programa_asignatura_horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_programa_plan_asignatura_hor` (`pph_id_asignatura`),
  ADD KEY `FK_programa_plan_asignatura_horario_persona` (`pph_id_docente`);

--
-- Indices de la tabla `programa_plan_estudio`
--
ALTER TABLE `programa_plan_estudio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_programa_plan_estudio_programa` (`pp_id_programa`),
  ADD KEY `FK_programa_plan_estudio_municipio` (`pp_id_sede`);

--
-- Indices de la tabla `programa_plan_estudio_asignatura`
--
ALTER TABLE `programa_plan_estudio_asignatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_programa_plan_estudio_asignatura_programa_plan_estudio` (`asig_id_plan_estudio`),
  ADD KEY `FK_programa_plan_estudio_asignatura_programa` (`asig_id_programa`),
  ADD KEY `FK_programa_plan_estudio_asignatura_municipio` (`asig_id_sede`);

--
-- Indices de la tabla `prueba_resultado_programa`
--
ALTER TABLE `prueba_resultado_programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prueba_resultado_programa_programa` (`prurepro_id_programa`);

--
-- Indices de la tabla `prueba_resultado_programa_modulo`
--
ALTER TABLE `prueba_resultado_programa_modulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prueba_resultado_programa_modulo_tipo_modulo` (`prureprono_id_modulo`),
  ADD KEY `FK_prueba_resultado_programa_modulo_programa` (`prurepromo_id_prueba_programa`);

--
-- Indices de la tabla `prueba_saber`
--
ALTER TABLE `prueba_saber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prueba_saber_estudiante` (`prueba_saber_id_estudiante`);

--
-- Indices de la tabla `prueba_saber_modulo`
--
ALTER TABLE `prueba_saber_modulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prueba_saber_modulo_estudiante` (`prsamo_id_estudiante`),
  ADD KEY `FK_prueba_saber_modulo_tipo_modulo` (`prsamo_id_modulo`);

--
-- Indices de la tabla `prueba_saber_pro`
--
ALTER TABLE `prueba_saber_pro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prueba_saber_pro_estudiante` (`prsapr_id_estudiante`);

--
-- Indices de la tabla `prueba_saber_pro_modulo`
--
ALTER TABLE `prueba_saber_pro_modulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prueba_saber_pro_modulo_estudiante` (`prsaprmo_id_estudiante`),
  ADD KEY `FK_prueba_saber_pro_modulo_tipo_modulo` (`prsaprmo_id_modulo`);

--
-- Indices de la tabla `red_academica`
--
ALTER TABLE `red_academica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `software_recurso_tecnologico`
--
ALTER TABLE `software_recurso_tecnologico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_software_recurso_tecnologico_persona` (`sofrete_id_docente`);

--
-- Indices de la tabla `tipo_modulo`
--
ALTER TABLE `tipo_modulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tipo_modulo_tipo_prueba` (`tipo_modulo_id_prueba`);

--
-- Indices de la tabla `tipo_prueba`
--
ALTER TABLE `tipo_prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajo_grado`
--
ALTER TABLE `trabajo_grado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_trabajo_grado_modalidad_grado` (`tra_modalidad_grado`),
  ADD KEY `FK_trabajo_grado_persona` (`tra_id_director`),
  ADD KEY `FK_trabajo_grado_persona_2` (`tra_id_codirector`),
  ADD KEY `FK_trabajo_grado_persona_3` (`tra_id_externo`),
  ADD KEY `FK_trabajo_grado_persona_4` (`tra_id_jurado1`),
  ADD KEY `FK_trabajo_grado_persona_5` (`tra_id_jurado2`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bienestar_institucional`
--
ALTER TABLE `bienestar_institucional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compl_area_extension`
--
ALTER TABLE `compl_area_extension`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compl_area_trabajo`
--
ALTER TABLE `compl_area_trabajo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compl_entidad_nacional`
--
ALTER TABLE `compl_entidad_nacional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `compl_fuente_internacional`
--
ALTER TABLE `compl_fuente_internacional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compl_fuente_nacional`
--
ALTER TABLE `compl_fuente_nacional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compl_nivel_estudio`
--
ALTER TABLE `compl_nivel_estudio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `compl_poblacion_condicion`
--
ALTER TABLE `compl_poblacion_condicion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `compl_poblacion_grupo`
--
ALTER TABLE `compl_poblacion_grupo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `compl_sector`
--
ALTER TABLE `compl_sector`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `docente_asignatura`
--
ALTER TABLE `docente_asignatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente_contrato`
--
ALTER TABLE `docente_contrato`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente_evaluacion`
--
ALTER TABLE `docente_evaluacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente_visitante`
--
ALTER TABLE `docente_visitante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante_egresado`
--
ALTER TABLE `estudiante_egresado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante_reporte_general`
--
ALTER TABLE `estudiante_reporte_general`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_actividad_cultural`
--
ALTER TABLE `ext_actividad_cultural`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_consultoria`
--
ALTER TABLE `ext_consultoria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_curso`
--
ALTER TABLE `ext_curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_educacion_continua`
--
ALTER TABLE `ext_educacion_continua`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_eventos_nac_inter`
--
ALTER TABLE `ext_eventos_nac_inter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_eventos_virtuales`
--
ALTER TABLE `ext_eventos_virtuales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_internacionalizacion_curriculo`
--
ALTER TABLE `ext_internacionalizacion_curriculo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_movilidad_internacional`
--
ALTER TABLE `ext_movilidad_internacional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_movilidad_intersede`
--
ALTER TABLE `ext_movilidad_intersede`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_movilidad_nacional`
--
ALTER TABLE `ext_movilidad_nacional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_participacion_eventos`
--
ALTER TABLE `ext_participacion_eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_participante`
--
ALTER TABLE `ext_participante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_proyecto_extension`
--
ALTER TABLE `ext_proyecto_extension`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_registro_fotografico_inter`
--
ALTER TABLE `ext_registro_fotografico_inter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ext_sector_externo_organizaciones`
--
ALTER TABLE `ext_sector_externo_organizaciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ext_sector_externo_organizaciones_part`
--
ALTER TABLE `ext_sector_externo_organizaciones_part`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ext_sector_externo_red_academia_convenio`
--
ALTER TABLE `ext_sector_externo_red_academia_convenio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ext_sector_externo_red_academia_convenio_participantes`
--
ALTER TABLE `ext_sector_externo_red_academia_convenio_participantes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ext_servicio_extension`
--
ALTER TABLE `ext_servicio_extension`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_grupo_investigacion`
--
ALTER TABLE `inv_grupo_investigacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_investigador`
--
ALTER TABLE `inv_investigador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_proyecto`
--
ALTER TABLE `inv_proyecto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `modalidad_grado`
--
ALTER TABLE `modalidad_grado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `practica_laboral`
--
ALTER TABLE `practica_laboral`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `programa_asignatura_horario`
--
ALTER TABLE `programa_asignatura_horario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa_plan_estudio`
--
ALTER TABLE `programa_plan_estudio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programa_plan_estudio_asignatura`
--
ALTER TABLE `programa_plan_estudio_asignatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba_resultado_programa`
--
ALTER TABLE `prueba_resultado_programa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba_resultado_programa_modulo`
--
ALTER TABLE `prueba_resultado_programa_modulo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba_saber`
--
ALTER TABLE `prueba_saber`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba_saber_modulo`
--
ALTER TABLE `prueba_saber_modulo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba_saber_pro`
--
ALTER TABLE `prueba_saber_pro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba_saber_pro_modulo`
--
ALTER TABLE `prueba_saber_pro_modulo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `red_academica`
--
ALTER TABLE `red_academica`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `software_recurso_tecnologico`
--
ALTER TABLE `software_recurso_tecnologico`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_modulo`
--
ALTER TABLE `tipo_modulo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_prueba`
--
ALTER TABLE `tipo_prueba`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `trabajo_grado`
--
ALTER TABLE `trabajo_grado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `FK_docente_persona` FOREIGN KEY (`id_persona_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `docente_asignatura`
--
ALTER TABLE `docente_asignatura`
  ADD CONSTRAINT `FK_docente_asignatura_persona` FOREIGN KEY (`docasi_id_docente`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_docente_asignatura_programa_plan_estudio_asignatura` FOREIGN KEY (`docasi_id_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`);

--
-- Filtros para la tabla `docente_contrato`
--
ALTER TABLE `docente_contrato`
  ADD CONSTRAINT `FK_docente_contrato_persona` FOREIGN KEY (`doco_persona_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `docente_evaluacion`
--
ALTER TABLE `docente_evaluacion`
  ADD CONSTRAINT `FK_docente_evaluacion_persona` FOREIGN KEY (`doe_persona_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `FK_estudiante_persona` FOREIGN KEY (`estu_id_estudiante`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_estudiante_programa` FOREIGN KEY (`estu_programa`) REFERENCES `programa` (`id`),
  ADD CONSTRAINT `FK_estudiante_programa_plan_estudio` FOREIGN KEY (`estu_programa_plan`) REFERENCES `programa_plan_estudio` (`id`);

--
-- Filtros para la tabla `estudiante_egresado`
--
ALTER TABLE `estudiante_egresado`
  ADD CONSTRAINT `FK_estudiante_egresado_persona` FOREIGN KEY (`este_id_estudiante`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `estudiante_reporte_general`
--
ALTER TABLE `estudiante_reporte_general`
  ADD CONSTRAINT `FK_estudiante_reporte_general_programa` FOREIGN KEY (`esture_id_programa`) REFERENCES `programa` (`id`);

--
-- Filtros para la tabla `ext_actividad_cultural`
--
ALTER TABLE `ext_actividad_cultural`
  ADD CONSTRAINT `FK_ext_actividad_cultural_compl_fuente_internacional` FOREIGN KEY (`extcul_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`),
  ADD CONSTRAINT `FK_ext_actividad_cultural_compl_fuente_nacional` FOREIGN KEY (`extcul_fuente_nacional`) REFERENCES `compl_fuente_nacional` (`id`),
  ADD CONSTRAINT `FK_ext_actividad_cultural_persona` FOREIGN KEY (`extcul_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `ext_consultoria`
--
ALTER TABLE `ext_consultoria`
  ADD CONSTRAINT `FK_ext_consultoria_compl_cine_detallado` FOREIGN KEY (`extcon_id_cine_campo`) REFERENCES `compl_cine_detallado` (`id`),
  ADD CONSTRAINT `FK_ext_consultoria_compl_fuente_internacional` FOREIGN KEY (`extcon_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`),
  ADD CONSTRAINT `FK_ext_consultoria_compl_fuente_nacional` FOREIGN KEY (`extcon_fuente_nacional`) REFERENCES `compl_fuente_nacional` (`id`),
  ADD CONSTRAINT `FK_ext_consultoria_compl_sector` FOREIGN KEY (`ext_sector_consultoria`) REFERENCES `compl_sector` (`id`);

--
-- Filtros para la tabla `ext_curso`
--
ALTER TABLE `ext_curso`
  ADD CONSTRAINT `FK_ext_curso_compl_cine_detallado` FOREIGN KEY (`extcurso_id_cine`) REFERENCES `compl_cine_detallado` (`id`),
  ADD CONSTRAINT `FK_ext_curso_persona` FOREIGN KEY (`extcurso_id_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `ext_educacion_continua`
--
ALTER TABLE `ext_educacion_continua`
  ADD CONSTRAINT `FK_ext_educacion_continua_compl_area_extension` FOREIGN KEY (`extedu_tipo_extension`) REFERENCES `compl_area_extension` (`id`),
  ADD CONSTRAINT `FK_ext_educacion_continua_persona` FOREIGN KEY (`extedu_id_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `ext_internacionalizacion_curriculo`
--
ALTER TABLE `ext_internacionalizacion_curriculo`
  ADD CONSTRAINT `FK_ext_internacionalizacion_curriculo__asignatura` FOREIGN KEY (`exincu_id_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`),
  ADD CONSTRAINT `FK_ext_internacionalizacion_curriculo_persona` FOREIGN KEY (`exincu_id_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `ext_movilidad_internacional`
--
ALTER TABLE `ext_movilidad_internacional`
  ADD CONSTRAINT `FK_ext_movilidad_internacional_facultad` FOREIGN KEY (`exmointer_id_facultad_or`) REFERENCES `facultad` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_internacional_municipio` FOREIGN KEY (`exmointer_id_sede_or`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_internacional_persona` FOREIGN KEY (`exmointer_id_persona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_internacional_programa` FOREIGN KEY (`exmointer_id_programa_or`) REFERENCES `programa` (`id`);

--
-- Filtros para la tabla `ext_movilidad_intersede`
--
ALTER TABLE `ext_movilidad_intersede`
  ADD CONSTRAINT `FK_ext_movilidad_intersede_facultad` FOREIGN KEY (`exmoin_id_facultad_or`) REFERENCES `facultad` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_intersede_facultad_2` FOREIGN KEY (`exmoin_id_facultad_des`) REFERENCES `facultad` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_intersede_municipio` FOREIGN KEY (`exmoin_id_sede_or`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_intersede_municipio_2` FOREIGN KEY (`exmoin_id_sede_des`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_intersede_persona` FOREIGN KEY (`exmoin_id_persona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_intersede_programa` FOREIGN KEY (`exmoin_id_programa_or`) REFERENCES `programa` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_intersede_programa_2` FOREIGN KEY (`exmoin_id_programa_des`) REFERENCES `programa` (`id`);

--
-- Filtros para la tabla `ext_movilidad_nacional`
--
ALTER TABLE `ext_movilidad_nacional`
  ADD CONSTRAINT `FK_ext_movilidad_nacional_facultad` FOREIGN KEY (`exmona_id_facultad`) REFERENCES `facultad` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_nacional_municipio` FOREIGN KEY (`exmona_id_sede`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_nacional_persona` FOREIGN KEY (`exmona_id_persona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_ext_movilidad_nacional_programa` FOREIGN KEY (`exmona_id_programa`) REFERENCES `programa` (`id`);

--
-- Filtros para la tabla `ext_participacion_eventos`
--
ALTER TABLE `ext_participacion_eventos`
  ADD CONSTRAINT `FK_ext_participacion_eventos_persona` FOREIGN KEY (`expaev_id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `ext_participante`
--
ALTER TABLE `ext_participante`
  ADD CONSTRAINT `FK_docente_participante_persona` FOREIGN KEY (`dop_id_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `ext_proyecto_extension`
--
ALTER TABLE `ext_proyecto_extension`
  ADD CONSTRAINT `FK_ext_proyecto_extension_compl_area_extension` FOREIGN KEY (`extprex_id_area_extension`) REFERENCES `compl_area_extension` (`id`),
  ADD CONSTRAINT `FK_ext_proyecto_extension_compl_area_trabajo` FOREIGN KEY (`extprex_id_area_trabajo`) REFERENCES `compl_area_trabajo` (`id`),
  ADD CONSTRAINT `FK_ext_proyecto_extension_compl_entidad_nacional` FOREIGN KEY (`extprex_id_entidad_nacional`) REFERENCES `compl_entidad_nacional` (`id`),
  ADD CONSTRAINT `FK_ext_proyecto_extension_compl_fuente_internacional` FOREIGN KEY (`extprex_id_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`),
  ADD CONSTRAINT `FK_ext_proyecto_extension_compl_fuente_nacional` FOREIGN KEY (`extprex_id_fuente_nacional`) REFERENCES `compl_fuente_nacional` (`id`),
  ADD CONSTRAINT `FK_ext_proyecto_extension_compl_poblacion_condicion` FOREIGN KEY (`extprex_id_poblacion_condicion`) REFERENCES `compl_poblacion_condicion` (`id`),
  ADD CONSTRAINT `FK_ext_proyecto_extension_compl_poblacion_grupo` FOREIGN KEY (`extprex_id_poblacion_grupo`) REFERENCES `compl_poblacion_grupo` (`id`),
  ADD CONSTRAINT `FK_ext_proyecto_extension_compl_sector` FOREIGN KEY (`extprex_id_sector_otra_entidad`) REFERENCES `compl_sector` (`id`);

--
-- Filtros para la tabla `ext_sector_externo_organizaciones_part`
--
ALTER TABLE `ext_sector_externo_organizaciones_part`
  ADD CONSTRAINT `FK_ext_sector_externo_organizaciones` FOREIGN KEY (`exseorpar_id_organizacion`) REFERENCES `ext_sector_externo_organizaciones` (`id`);

--
-- Filtros para la tabla `ext_sector_externo_red_academia_convenio_participantes`
--
ALTER TABLE `ext_sector_externo_red_academia_convenio_participantes`
  ADD CONSTRAINT `FK_ext_sector_externo_red_academia` FOREIGN KEY (`exseredpar_id_red_academica`) REFERENCES `ext_sector_externo_red_academia_convenio` (`id`);

--
-- Filtros para la tabla `ext_servicio_extension`
--
ALTER TABLE `ext_servicio_extension`
  ADD CONSTRAINT `FK_ext_servicio_extension_compl_area_extension` FOREIGN KEY (`extseex_id_area_extension`) REFERENCES `compl_area_extension` (`id`),
  ADD CONSTRAINT `FK_ext_servicio_extension_compl_area_trabajo` FOREIGN KEY (`extseex_id_area_trabajo`) REFERENCES `compl_area_trabajo` (`id`),
  ADD CONSTRAINT `FK_ext_servicio_extension_compl_entidad_nacional` FOREIGN KEY (`extseex_id_fuente_nacional`) REFERENCES `compl_entidad_nacional` (`id`),
  ADD CONSTRAINT `FK_ext_servicio_extension_compl_entidad_nacional_2` FOREIGN KEY (`extseex_id_entidad_nacional`) REFERENCES `compl_entidad_nacional` (`id`),
  ADD CONSTRAINT `FK_ext_servicio_extension_compl_fuente_internacional` FOREIGN KEY (`extseex_id_fuente_internacional`) REFERENCES `compl_fuente_internacional` (`id`),
  ADD CONSTRAINT `FK_ext_servicio_extension_compl_poblacion_condicion` FOREIGN KEY (`extseex_id_poblacion_condicion`) REFERENCES `compl_poblacion_condicion` (`id`),
  ADD CONSTRAINT `FK_ext_servicio_extension_compl_poblacion_grupo` FOREIGN KEY (`extseex_id_poblacion_grupo`) REFERENCES `compl_poblacion_grupo` (`id`),
  ADD CONSTRAINT `FK_ext_servicio_extension_compl_sector` FOREIGN KEY (`extseex_id_sector_otra_entidad`) REFERENCES `compl_sector` (`id`);

--
-- Filtros para la tabla `inv_grupo_investigacion`
--
ALTER TABLE `inv_grupo_investigacion`
  ADD CONSTRAINT `FK_inv_grupo_investigacion_facultad` FOREIGN KEY (`inv_facultad`) REFERENCES `facultad` (`id`),
  ADD CONSTRAINT `FK_inv_grupo_investigacion_municipio` FOREIGN KEY (`inv_sede`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_inv_grupo_investigacion_persona` FOREIGN KEY (`inv_id_coordinador`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `inv_investigador`
--
ALTER TABLE `inv_investigador`
  ADD CONSTRAINT `FK_inv_investigador_inv_grupo_investigacion` FOREIGN KEY (`inves_id_grupo`) REFERENCES `inv_grupo_investigacion` (`id`),
  ADD CONSTRAINT `FK_inv_investigador_persona` FOREIGN KEY (`inves_id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `inv_proyecto`
--
ALTER TABLE `inv_proyecto`
  ADD CONSTRAINT `FK_inv_proyecto_inv_grupo_investigacion` FOREIGN KEY (`invpro_id_grupo`) REFERENCES `inv_grupo_investigacion` (`id`);

--
-- Filtros para la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD CONSTRAINT `FK_laboratorio_facultad` FOREIGN KEY (`lab_id_facultad`) REFERENCES `facultad` (`id`),
  ADD CONSTRAINT `FK_laboratorio_persona` FOREIGN KEY (`lab_id_docente`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_laboratorio_programa` FOREIGN KEY (`lab_id_programa`) REFERENCES `programa` (`id`),
  ADD CONSTRAINT `FK_laboratorio_software` FOREIGN KEY (`lab_id_software`) REFERENCES `software` (`id`);

--
-- Filtros para la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD CONSTRAINT `FK_movilidad_persona` FOREIGN KEY (`movi_id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `FK_municipio_departamento` FOREIGN KEY (`mun_departamento`) REFERENCES `departamento` (`id`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `FK_persona_departamento` FOREIGN KEY (`per_departamento`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `FK_persona_tipo_usuario` FOREIGN KEY (`per_tipo_usuario`) REFERENCES `tipo_usuario` (`id`);

--
-- Filtros para la tabla `practica_laboral`
--
ALTER TABLE `practica_laboral`
  ADD CONSTRAINT `FK_practica_laboral_persona` FOREIGN KEY (`prac_id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `FK_programa_persona` FOREIGN KEY (`pro_id_director`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `programa_asignatura_horario`
--
ALTER TABLE `programa_asignatura_horario`
  ADD CONSTRAINT `FK_programa_plan_asignatura_hor` FOREIGN KEY (`pph_id_asignatura`) REFERENCES `programa_plan_estudio_asignatura` (`id`),
  ADD CONSTRAINT `FK_programa_plan_asignatura_horario_persona` FOREIGN KEY (`pph_id_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `programa_plan_estudio`
--
ALTER TABLE `programa_plan_estudio`
  ADD CONSTRAINT `FK_programa_plan_estudio_municipio` FOREIGN KEY (`pp_id_sede`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_programa_plan_estudio_programa` FOREIGN KEY (`pp_id_programa`) REFERENCES `programa` (`id`);

--
-- Filtros para la tabla `programa_plan_estudio_asignatura`
--
ALTER TABLE `programa_plan_estudio_asignatura`
  ADD CONSTRAINT `FK_programa_plan_estudio_asignatura_municipio` FOREIGN KEY (`asig_id_sede`) REFERENCES `municipio` (`id`),
  ADD CONSTRAINT `FK_programa_plan_estudio_asignatura_programa` FOREIGN KEY (`asig_id_programa`) REFERENCES `programa` (`id`),
  ADD CONSTRAINT `FK_programa_plan_estudio_asignatura_programa_plan_estudio` FOREIGN KEY (`asig_id_plan_estudio`) REFERENCES `programa_plan_estudio` (`id`);

--
-- Filtros para la tabla `prueba_resultado_programa`
--
ALTER TABLE `prueba_resultado_programa`
  ADD CONSTRAINT `FK_prueba_resultado_programa_programa` FOREIGN KEY (`prurepro_id_programa`) REFERENCES `programa` (`id`);

--
-- Filtros para la tabla `prueba_resultado_programa_modulo`
--
ALTER TABLE `prueba_resultado_programa_modulo`
  ADD CONSTRAINT `FK_prueba_resultado_programa_modulo_programa` FOREIGN KEY (`prurepromo_id_prueba_programa`) REFERENCES `programa` (`id`),
  ADD CONSTRAINT `FK_prueba_resultado_programa_modulo_tipo_modulo` FOREIGN KEY (`prureprono_id_modulo`) REFERENCES `tipo_modulo` (`id`);

--
-- Filtros para la tabla `prueba_saber`
--
ALTER TABLE `prueba_saber`
  ADD CONSTRAINT `FK_prueba_saber_persona` FOREIGN KEY (`prueba_saber_id_estudiante`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `prueba_saber_modulo`
--
ALTER TABLE `prueba_saber_modulo`
  ADD CONSTRAINT `FK_prueba_saber_modulo_persona` FOREIGN KEY (`prsamo_id_estudiante`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_prueba_saber_modulo_tipo_modulo` FOREIGN KEY (`prsamo_id_modulo`) REFERENCES `tipo_modulo` (`id`);

--
-- Filtros para la tabla `prueba_saber_pro`
--
ALTER TABLE `prueba_saber_pro`
  ADD CONSTRAINT `FK_prueba_saber_pro_estudiante` FOREIGN KEY (`prsapr_id_estudiante`) REFERENCES `estudiante` (`id`);

--
-- Filtros para la tabla `prueba_saber_pro_modulo`
--
ALTER TABLE `prueba_saber_pro_modulo`
  ADD CONSTRAINT `FK_prueba_saber_pro_modulo_estudiante` FOREIGN KEY (`prsaprmo_id_estudiante`) REFERENCES `estudiante` (`id`),
  ADD CONSTRAINT `FK_prueba_saber_pro_modulo_tipo_modulo` FOREIGN KEY (`prsaprmo_id_modulo`) REFERENCES `tipo_modulo` (`id`);

--
-- Filtros para la tabla `software_recurso_tecnologico`
--
ALTER TABLE `software_recurso_tecnologico`
  ADD CONSTRAINT `FK_software_recurso_tecnologico_persona` FOREIGN KEY (`sofrete_id_docente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `tipo_modulo`
--
ALTER TABLE `tipo_modulo`
  ADD CONSTRAINT `FK_tipo_modulo_tipo_prueba` FOREIGN KEY (`tipo_modulo_id_prueba`) REFERENCES `tipo_prueba` (`id`);

--
-- Filtros para la tabla `trabajo_grado`
--
ALTER TABLE `trabajo_grado`
  ADD CONSTRAINT `FK_trabajo_grado_modalidad_grado` FOREIGN KEY (`tra_modalidad_grado`) REFERENCES `modalidad_grado` (`id`),
  ADD CONSTRAINT `FK_trabajo_grado_persona` FOREIGN KEY (`tra_id_director`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_trabajo_grado_persona_2` FOREIGN KEY (`tra_id_codirector`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_trabajo_grado_persona_3` FOREIGN KEY (`tra_id_externo`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_trabajo_grado_persona_4` FOREIGN KEY (`tra_id_jurado1`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `FK_trabajo_grado_persona_5` FOREIGN KEY (`tra_id_jurado2`) REFERENCES `persona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
