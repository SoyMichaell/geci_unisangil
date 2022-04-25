-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-04-2022 a las 04:12:51
-- Versión del servidor: 8.0.28-cll-lve
-- Versión de PHP: 7.4.29

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
-- Estructura de tabla para la tabla `compl_area_plan`
--

CREATE TABLE `compl_area_plan` (
  `id` int NOT NULL,
  `coarpl_nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `coarpl_id_componente` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compl_area_plan`
--

INSERT INTO `compl_area_plan` (`id`, `coarpl_nombre`, `coarpl_id_componente`, `updated_at`) VALUES
(1, 'Ingeniería Aplicada', 1, '2022-04-08 01:21:07'),
(2, 'Básicas de Ingeniería', 1, '2022-04-08 01:21:28'),
(3, 'Ciencias Básicas', 2, '2022-04-08 01:21:54'),
(4, 'Formación Complementaria', 3, '2022-04-08 01:22:12');

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
-- Estructura de tabla para la tabla `compl_componente_plan`
--

CREATE TABLE `compl_componente_plan` (
  `id` int NOT NULL,
  `cocopa_nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compl_componente_plan`
--

INSERT INTO `compl_componente_plan` (`id`, `cocopa_nombre`, `updated_at`) VALUES
(1, 'Disciplinar', '2022-04-08 01:19:37'),
(2, 'Básico', '2022-04-08 01:19:50'),
(3, 'Genérico', '2022-04-08 01:20:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compl_empresa`
--

CREATE TABLE `compl_empresa` (
  `id` int NOT NULL,
  `razon_social` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nit` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compl_empresa`
--

INSERT INTO `compl_empresa` (`id`, `razon_social`, `nit`, `pais`, `departamento`, `ciudad`, `direccion`, `telefono`, `url`, `correo`, `area`, `updated_at`) VALUES
(2, 'Fundación Universitaria de San Gil Unisangil', '8001528404', 'Colombia', 'Casanare', 'Yopal', 'Km 2 vía Matepantano', '3106281503', 'https://www.unisangil.edu.co/', 'atencionciudadano@unisangil.edu.co', 'Educación', '2022-04-22 11:29:57'),
(3, 'Alcaldía del Municipio de Yopal', '8918550177', 'Colombia', 'Casanare', 'Yopal', 'Diagonal 15 # 15-21', '6345913', 'http://www.yopal-casanare.gov.co/', 'direcciontic@yopal-casanare.gov.co', 'nn', '2022-04-22 11:32:43'),
(4, 'Gobernación de Casanare', '8920992166', 'Colombia', 'Casanare', 'Yopal', 'Cra. 20 No. 08- 02', '6086336339', 'https://www.casanare.gov.co/Paginas/default.aspx', 'correspondencia@casanare.gov.co', 'nn', '2022-04-22 11:34:20'),
(5, 'Servicio Nacional de Aprendizaje SENA', '8999990341', 'Colombia', 'Casanare', 'Yopal', 'Cra. 19 No. 36 - 68 Yopal', '6356017', 'https://www.sena.edu.co/', 'atencionciudadano@sena.edu.co', 'Educación', '2022-04-22 11:35:52'),
(6, 'ACT TELEMATICA S.A', '8300234042', 'COLOMBIA', 'CASANARE', 'YOPAL', 'Calle 19 N° 10a – 62 - Barrio Esteritos', '3164685966', 'http://acttelematica.com.co/', 'yopal@acttelematica.com.co', 'nn', '2022-04-24 14:05:51'),
(7, 'ALCALDIA DE TAURAMENA', '800012873-7', 'COLOMBIA', 'CASANARE', 'Tauramena', 'Calle 5 No. 14 - 34- Palacio Municipal', '86247113', 'https://www.tauramena-casanare.gov.co/', 'contactenos@tauramena-casanare.gov.co', 'nn', '2022-04-24 14:12:25'),
(8, 'AMA TU ARTE S.A.S', '9009965547', 'COLOMBIA', 'CASANARE', 'YOPAL', 'Calle 26A No. 15-45', '3142550153', 'www.amatuarte.com', 'amatuartemusic@gmail.com', 'nn', '0000-00-00 00:00:00'),
(9, 'ASERTI S.A.S', '900407950-5', 'COLOMBIA', 'CASANARE', 'YOPAL', 'Carrera 14 # 38a-45', '', 'https://www.asertisas.com/', '', 'nn', '0000-00-00 00:00:00'),
(10, 'DURANGAR S.A.S SERVICIOS INTEGRALES', '9000969129', 'COLOMBIA', 'CASANARE', 'YOPAL', 'CARRERA 24 N 12 72 OFCINA 201', '6086334298', 'https://www.durangar.com.co', '', 'nn', '0000-00-00 00:00:00'),
(11, 'FIBERBET TELECOMUNICACIONES S.A', '8300532090', 'COLOMBIA', 'CUNDINAMARCA', 'BOGOTA', 'CALLE 116 71D 05', '6016130060', 'https://www.facebook.com/FibernetTelecomunicacionessa/', '', 'nn', '0000-00-00 00:00:00'),
(12, 'FUNDESARROLLO', '8440045785', 'COLOMBIA', 'CASANARE', 'YOPAL', 'CALLE 17 25 44', '3102015773', 'http://www.fundesarrollo.org.co/', '?fundesarrollo@fundesarrollo.org.co', 'nn', '0000-00-00 00:00:00'),
(13, 'HOSPITAL DE AGUAZUL- JUAN HERNANDO URREGO ESE ', '?844001355-6', 'COLOMBIA', 'CASANARE', 'AGUAZUL', 'Calle 11 No. 15 - 40', '3108871337', 'http://www.hospitaldeaguazul.gov.co/', 'esejhu@hospitaldeaguazul.gov.co', 'nn', '0000-00-00 00:00:00'),
(14, 'TELEORINOQUIA S.A. ESP', '844.002.048-4', 'COLOMBIA', 'CASANARE', 'YOPAL', 'Calle 10 No.21- 36', '311 445229', 'www.teleorinoquia.com', 'info@teleorinoquia.com', 'nn', '0000-00-00 00:00:00');

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
(6, 'Casanare', NULL, NULL),
(8, 'Santander', '2022-04-22 01:44:27', '2022-04-22 01:44:27');

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
(5, 23, 'Yopal', 'bibiana.ortegon@hotmail.com', 'tiemplo-completo', 'contrato-a-termino-fijo', '2015-02-02', 'Sanitas', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sura', 'Confacasanare', 'Caja Social', '1234556789', 'Positiva', 'activo', NULL, NULL, 2, NULL, NULL),
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
(17, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(20, 147, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(21, 148, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(22, 149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(23, 150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(24, 151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(25, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(26, 153, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(27, 154, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(28, 155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(29, 156, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(30, 157, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(31, 158, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(32, 189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

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

--
-- Volcado de datos para la tabla `docente_contrato`
--

INSERT INTO `docente_contrato` (`id`, `doco_persona_docente`, `doco_numero_contrato`, `doco_objeto_contrato`, `doco_tipo_contrato`, `doco_fecha_inicio`, `doco_fecha_fin`, `doco_rol`, `doco_url_soporte`, `doco_estado`, `created_at`, `updated_at`) VALUES
(3, 23, '011', 'kasjdasjhdjk', 'ops', '2021-10-20', '2022-10-20', 'jurado-tesis', '2021-10-20_011_Angela Bibiana_Ortegón Fuentescontrato.pdf', 'no-cancelado', '2022-04-24 08:30:46', '2022-04-24 10:10:52');

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
  `estu_id_estudiante` int NOT NULL,
  `estu_programa` int DEFAULT NULL,
  `estu_programa_plan` int DEFAULT NULL,
  `estu_telefono2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_correo_personal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_colegio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_estrato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_fecha_nacimiento` date DEFAULT NULL,
  `estu_fecha_expedicion` date DEFAULT NULL,
  `estu_sexo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_estado_civil` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_ingreso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_periodo_ingreso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_ult_matricula` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_semestre` int DEFAULT NULL,
  `estu_financiamiento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_entidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_tipo_matricula` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_matricula` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_pga` double DEFAULT NULL,
  `estu_reconocimiento` int DEFAULT NULL,
  `estu_egresado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_administrativo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `estu_cargo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_dependencia` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_fecha_ingreso` date DEFAULT NULL,
  `estu_no_contrato` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estu_fecha_final` date DEFAULT NULL,
  `estu_estado_cargo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `estu_id_estudiante`, `estu_programa`, `estu_programa_plan`, `estu_telefono2`, `estu_direccion`, `estu_correo_personal`, `estu_colegio`, `estu_estrato`, `estu_fecha_nacimiento`, `estu_fecha_expedicion`, `estu_sexo`, `estu_estado_civil`, `estu_ingreso`, `estu_periodo_ingreso`, `estu_ult_matricula`, `estu_semestre`, `estu_financiamiento`, `estu_entidad`, `estu_estado`, `estu_tipo_matricula`, `estu_matricula`, `estu_pga`, `estu_reconocimiento`, `estu_egresado`, `estu_administrativo`, `estu_cargo`, `estu_dependencia`, `estu_fecha_ingreso`, `estu_no_contrato`, `estu_fecha_final`, `estu_estado_cargo`, `created_at`, `updated_at`) VALUES
(15, 22, 3, 2, '3223342408', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017', '2017-1', NULL, 10, NULL, NULL, 'egresado-no-graduado', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 25, 3, 2, '3224026959', 'Calle 24 No. 28-109', NULL, NULL, '4', '1999-03-21', '2017-06-09', 'M', 'soltero(a)', '2019', '2019-2', '2022-1', 8, 'de-contado', NULL, 'activo', 'antiguo', 'pagado', 4.12, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 26, 3, 2, '3204723615', 'Vereda la Vega', NULL, NULL, '2', '1997-05-14', '2015-06-09', 'F', 'soltero(a)', '2018', '2018-1', '2022-1', 9, 'beca', 'Talento TI', 'activo', 'antiguo', 'pagado', 3.94, 1, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 27, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 41, 3, 2, '3124656896', NULL, 'danielacero@unisangil.edu.co', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-1', 10, NULL, NULL, 'activo', NULL, NULL, 0, 0, NULL, 'Si', 'Practicante laboratorio', 'Sistemas', '2022-02-21', '12345', '2022-10-21', 'activo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 42, 3, 2, '', '', 'julianacevedo122@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-2', 0, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 43, 3, 2, '', '', 'lauraaguilar219@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-3', 5, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 44, 3, 2, '3227295181', NULL, 'luisaguilar@unisangil.edu.co', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-4', 6, NULL, NULL, 'activo', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
(121, 143, 3, 2, '', '', 'hugozuluaga@unisangil.edu.co', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '2022-103', 6, '', '', 'activo', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 159, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 160, 3, 2, '0000', NULL, NULL, NULL, NULL, '1992-09-20', NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'egresado', NULL, NULL, NULL, NULL, 'Si', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 161, 3, 2, '0000', NULL, NULL, NULL, NULL, '1995-07-31', NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'egresado', NULL, NULL, NULL, NULL, 'Si', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 162, 3, 2, '0000', NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'egresado', NULL, NULL, NULL, NULL, 'Si', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 163, 3, 2, '000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, 'egresado-no-graduado', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 164, 3, 2, '0000', NULL, NULL, NULL, NULL, NULL, NULL, 'F', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'egresado-no-graduado', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 165, 3, 2, '000', NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'no-aplica', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 166, 3, 2, '00000', NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'no-aplica', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 167, 3, 2, '000', NULL, NULL, NULL, NULL, NULL, NULL, 'F', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'egresado', NULL, NULL, NULL, NULL, 'Si', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 168, 3, 2, '00000', NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'no-aplica', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 169, 3, 2, '0000', NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'no-aplica', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 170, 3, 2, '000000', NULL, NULL, NULL, NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'no-aplica', NULL, NULL, NULL, NULL, 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 171, 3, 2, '0', NULL, '', '', NULL, NULL, NULL, 'F', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'egresado', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 172, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'F', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 173, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 174, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'F', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 175, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'F', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 176, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 177, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'F', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 178, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 179, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 180, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 181, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 182, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'F', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 183, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 184, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 185, 3, 2, '0', NULL, '', '', NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'no-aplica', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 186, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 187, 3, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 'M', '', '', '', '', 10, '', '', 'no-aplica', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Volcado de datos para la tabla `estudiante_egresado`
--

INSERT INTO `estudiante_egresado` (`id`, `este_id_estudiante`, `este_fecha_finalizacion`, `este_promedio_acumulado`, `este_nombre_empresa`, `este_area`, `este_cargo`, `este_sitio_trabajo`, `este_tipo_contrato`, `este_pais_residencia`, `este_ciudad_residencia`, `created_at`, `updated_at`) VALUES
(1, 160, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 161, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 162, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 167, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Volcado de datos para la tabla `ext_actividad_cultural`
--

INSERT INTO `ext_actividad_cultural` (`id`, `extcul_year`, `extcul_semestre`, `extcul_codigo_unidad_org`, `extcul_codigo_actividad`, `extcul_descripcion_actividad`, `extcul_tipo_actividad`, `extcul_fecha_inicio`, `extcul_fecha_fin`, `extcul_fuente_nacional`, `extcul_valor_financiacion_nac`, `extcul_nombre_institucion`, `extcul_fuente_internacional`, `extcul_pais_financiador`, `extcul_valor_internacional`, `extcul_persona`, `extcul_dedicacion`, `created_at`, `updated_at`) VALUES
(1, '2022', '2', '15', '8638-2021', 'Actividad cultural', 2, '2022-08-22', '2022-08-26', 8, 0, 'UNISANGIL', NULL, NULL, NULL, NULL, NULL, '2022-04-22 11:25:23', '2022-04-22 11:25:23');

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
  `extcurso_nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_id_cine` int NOT NULL,
  `extcurso_extension` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_estado` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extcurso_fecha` date NOT NULL,
  `extcurso_id_docente` int NOT NULL DEFAULT '0',
  `extcurso_url_soporte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ext_curso`
--

INSERT INTO `ext_curso` (`id`, `extcurso_year`, `extcurso_semestre`, `extcurso_codigo`, `extcurso_nombre`, `extcurso_id_cine`, `extcurso_extension`, `extcurso_estado`, `extcurso_fecha`, `extcurso_id_docente`, `extcurso_url_soporte`, `created_at`, `updated_at`) VALUES
(1, '2021', '0', 'CUR-Y-IS-01-21', 'Taller Innovaci', 111, 'S', 'N', '2021-01-01', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2021', '0', 'CUR-Y-IS-02-21', 'Clase espejo con la asignatura Programaci', 111, 'S', 'N', '2021-01-02', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '2021', '0', 'CUR-Y-IS-03-21', 'Clase espejo con la asignatura Programaci', 111, 'S', 'N', '2021-01-03', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '2021', '0', 'CUR-Y-IS-04-21', 'Taller Radial - Revolucion 4.0-  Al aire profe ', 111, 'S', 'N', '2021-01-04', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '2021', '0', 'CUR-Y-IS-05-21', 'Taller Emprendimiento Digital', 111, 'S', 'N', '2021-01-05', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '2021', '0', 'CUR-Y-CNI-01-21', 'Congreso International Engineering Seminar ', 111, 'S', 'N', '2021-01-06', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '2021', '0', 'CUR-Y-CNI-02-21', 'Taller Clasificaci', 111, 'S', 'N', '2021-01-07', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '2021', '0', 'CUR-Y-CNI-03-21', 'Taller Micro frontends', 111, 'S', 'N', '2021-01-08', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '2021', '0', 'CUR-Y-CNI-04-21', 'La evoluci', 111, 'S', 'N', '2021-01-09', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '2021', '0', 'CUR-Y-CNI-05-21', 'Salud mental y agotamiento postpandemia como efecto del uso de las tecnolog', 111, 'S', 'N', '2021-01-10', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '2021', '0', 'CUR-Y-CNI-06-21', 'Prototipado pr', 111, 'S', 'N', '2021-01-11', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '2021', '0', 'CUR-Y-CNI-07-21', 'El papel de la bioinform', 111, 'S', 'N', '2021-01-12', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '2021', '0', 'CUR-Y-CNI-08-21', 'Taller: PWA (progressive web app)', 111, 'S', 'N', '2021-01-13', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '2021', '0', 'CUR-Y-CNI-09-21', 'Taller: Prototipado de pr', 111, 'S', 'N', '2021-01-14', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '2021', '0', 'CUR-Y-CNI-10-21', 'Forensia Digital aplicada a la Ciencia de Datos', 211, 'S', 'N', '2021-01-15', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '2021', '0', 'CUR-Y-CNI-11-21', 'Conversatorio \"El apoyo de la ciencia en el desarrollo de la Vacuna Sputnik V\"', 111, 'S', 'N', '2021-01-16', 189, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Volcado de datos para la tabla `ext_educacion_continua`
--

INSERT INTO `ext_educacion_continua` (`id`, `extedu_semestre`, `extedu_codigo_curso`, `extedu_numero_horas`, `extedu_tipo_curso`, `extedu_valor_curso`, `extedu_id_docente`, `extedu_tipo_extension`, `extedu_cantidad`, `extedu_url_soporte`, `created_at`, `updated_at`) VALUES
(1, '2', 'EDC-Y-IS-01-21', 8, 1, 0, 23, 1, 150, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2', 'EDC-Y-IS-01-21', 8, 1, 0, 23, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '2', 'EDC-Y-IS-01-21', 8, 1, 0, 23, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '2', 'EDC-Y-IS-01-21', 8, 1, 0, 23, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '2', 'EDC-Y-IS-01-21', 8, 1, 0, 23, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '2', 'EDC-Y-IS-02-21', 5, 2, 0, 23, 2, 277, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '2', 'EDC-Y-IS-02-21', 5, 2, 0, 23, 2, 30, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '2', 'EDC-Y-IS-02-21', 5, 2, 0, 23, 2, 5, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '2', 'EDC-Y-IS-03-21', 5, 2, 0, 23, 2, 222, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '2', 'EDC-Y-IS-03-21', 5, 2, 0, 23, 2, 30, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '2', 'EDC-Y-IS-03-21', 5, 2, 0, 23, 2, 5, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '2', 'EDC-Y-IS-04-21', 4, 2, 0, 23, 2, 200, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '2', 'EDC-Y-IS-04-21', 4, 2, 0, 23, 2, 200, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '2', 'EDC-Y-IS-04-21', 4, 2, 0, 23, 2, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '2', 'EDC-Y-IS-04-21', 4, 2, 0, 23, 2, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '2', 'EDC-Y-IS-04-21', 4, 2, 0, 23, 2, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '2', 'EDC-Y-IS-05-21', 8, 2, 0, 23, 2, 200, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '2', 'EDC-Y-IS-05-21', 8, 2, 0, 23, 2, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '2', 'EDC-Y-IS-05-21', 8, 2, 0, 23, 2, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '2', 'EDC-Y-IS-05-21', 8, 2, 0, 23, 2, 40, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '2', 'EDC-Y-CNI-02-21', 1, 2, 0, 40, 2, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '2', 'EDC-Y-CNI-02-21', 1, 2, 0, 40, 2, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '2', 'EDC-Y-CNI-02-21', 1, 2, 0, 40, 2, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '2', 'EDC-Y-CNI-02-21', 1, 2, 0, 40, 2, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '2', 'EDC-Y-CNI-02-21', 1, 2, 0, 40, 2, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '2', 'EDC-Y-CNI-04-21', 1, 1, 0, 40, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '2', 'EDC-Y-CNI-04-21', 1, 1, 0, 40, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '2', 'EDC-Y-CNI-04-21', 1, 1, 0, 40, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '2', 'EDC-Y-CNI-04-21', 1, 1, 0, 40, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '2', 'EDC-Y-CNI-04-21', 1, 1, 0, 40, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '2', 'EDC-Y-CNI-05-21', 1, 1, 0, 40, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '2', 'EDC-Y-CNI-05-21', 1, 1, 0, 40, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '2', 'EDC-Y-CNI-05-21', 1, 1, 0, 40, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '2', 'EDC-Y-CNI-05-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '2', 'EDC-Y-CNI-05-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '2', 'EDC-Y-CNI-06-21', 1, 1, 0, 36, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '2', 'EDC-Y-CNI-06-21', 1, 1, 0, 36, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '2', 'EDC-Y-CNI-06-21', 1, 1, 0, 36, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '2', 'EDC-Y-CNI-06-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '2', 'EDC-Y-CNI-06-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '2', 'EDC-Y-CNI-07-21', 1, 1, 0, 36, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '2', 'EDC-Y-CNI-07-21', 1, 1, 0, 36, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '2', 'EDC-Y-CNI-07-21', 1, 1, 0, 36, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '2', 'EDC-Y-CNI-07-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '2', 'EDC-Y-CNI-07-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '2', 'EDC-Y-CNI-08-21', 1, 2, 0, 36, 2, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '2', 'EDC-Y-CNI-08-21', 1, 2, 0, 36, 2, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '2', 'EDC-Y-CNI-08-21', 1, 2, 0, 36, 2, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '2', 'EDC-Y-CNI-08-21', 1, 2, 0, 36, 2, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '2', 'EDC-Y-CNI-08-21', 1, 2, 0, 36, 2, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '2', 'EDC-Y-CNI-09-21', 1, 2, 0, 36, 2, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '2', 'EDC-Y-CNI-09-21', 1, 2, 0, 36, 2, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '2', 'EDC-Y-CNI-09-21', 1, 2, 0, 36, 2, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '2', 'EDC-Y-CNI-09-21', 1, 2, 0, 36, 2, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '2', 'EDC-Y-CNI-09-21', 1, 2, 0, 36, 2, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '2', 'EDC-Y-CNI-10-21', 1, 1, 0, 36, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '2', 'EDC-Y-CNI-10-21', 1, 1, 0, 36, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '2', 'EDC-Y-CNI-10-21', 1, 1, 0, 36, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '2', 'EDC-Y-CNI-10-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '2', 'EDC-Y-CNI-10-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, '2', 'EDC-Y-CNI-11-21', 1, 1, 0, 36, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, '2', 'EDC-Y-CNI-11-21', 1, 1, 0, 36, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, '2', 'EDC-Y-CNI-11-21', 1, 1, 0, 36, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, '2', 'EDC-Y-CNI-11-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, '2', 'EDC-Y-CNI-11-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '2', 'EDC-Y-CNI-12-21', 1, 1, 0, 36, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '2', 'EDC-Y-CNI-12-21', 1, 1, 0, 36, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '2', 'EDC-Y-CNI-12-21', 1, 1, 0, 36, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '2', 'EDC-Y-CNI-12-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '2', 'EDC-Y-CNI-12-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, '2', 'EDC-Y-CNI-13-21', 1, 2, 0, 36, 2, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, '2', 'EDC-Y-CNI-13-21', 1, 2, 0, 36, 2, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '2', 'EDC-Y-CNI-13-21', 1, 2, 0, 36, 2, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '2', 'EDC-Y-CNI-13-21', 1, 2, 0, 36, 2, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, '2', 'EDC-Y-CNI-13-21', 1, 2, 0, 36, 2, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '2', 'EDC-Y-CNI-14-21', 1, 1, 0, 36, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '2', 'EDC-Y-CNI-14-21', 1, 1, 0, 36, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '2', 'EDC-Y-CNI-14-21', 1, 1, 0, 36, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '2', 'EDC-Y-CNI-14-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '2', 'EDC-Y-CNI-14-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '2', 'EDC-Y-CNI-15-21', 1, 1, 0, 36, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '2', 'EDC-Y-CNI-15-21', 1, 1, 0, 36, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '2', 'EDC-Y-CNI-15-21', 1, 1, 0, 36, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, '2', 'EDC-Y-CNI-15-21', 1, 1, 0, 36, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '2', 'EDC-Y-CNI-15-21', 1, 1, 0, 149, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '2', 'EDC-Y-CNI-16-21', 3, 1, 0, 149, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, '2', 'EDC-Y-CNI-16-21', 3, 1, 0, 149, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '2', 'EDC-Y-CNI-16-21', 3, 1, 0, 149, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, '2', 'EDC-Y-CNI-16-21', 3, 1, 0, 149, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '2', 'EDC-Y-CNI-16-21', 3, 1, 0, 149, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '2', 'EDC-Y-CNI-17-21', 1, 1, 0, 149, 1, 100, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '2', 'EDC-Y-CNI-17-21', 1, 1, 0, 149, 1, 10, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, '2', 'EDC-Y-CNI-17-21', 1, 1, 0, 149, 1, 20, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, '2', 'EDC-Y-CNI-17-21', 1, 1, 0, 149, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, '2', 'EDC-Y-CNI-17-21', 1, 1, 0, 149, 1, 7, 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Volcado de datos para la tabla `ext_eventos_nac_inter`
--

INSERT INTO `ext_eventos_nac_inter` (`id`, `exevin_tipo`, `exevin_year`, `exevin_periodo`, `exevin_nombre_evento`, `exevin_fecha_inicio`, `exevin_fecha_final`, `exevin_lugar`, `exevin_sede`, `exevin_ponentes`, `exevin_institucion`, `exevin_pais`, `exevin_nombre_ponencia`, `created_at`, `updated_at`) VALUES
(1, 'nacional', '2021', '2021-2', 'GALA DE PROYECTOS DE INGENIERÍA 2021-2', '2021-11-23', '2021-11-23', 'REMOTO', 'YOPAL', 'Categoría proyecto integrador \r\n1. Pedro David Aguilar La Rotta - Wagner Nicolás Ramírez Páez;\r\n2. Briham Farid Galan Parra - Jaime Alberto Pacheco Corredor - Marlon Alexis Lazaro Romero - Cristian Camilo Moreno Perez; 3. Jessica Yinet Rincón Pinilla Sandra Yulieth Cortes Ramírez;\r\nCategoría proyecto de aula\r\n1. Andrés Felipe Pardo Campos; 2. Brayan Arturo Castro Pinzón Ángela María Salazar López; Juan Diego García Albornoz David Ricardo Sierra Niño Jaheld Davith Espejo Morales Nicolás David Muircia Malagón; \r\nCategoría trabajos de grado\r\n1. Juan Guillermo Naveros Jimenez; 2. Ifran Andres Plazas Sierra Juan David Aguayo Pidiache; 3. Daniela García Rodríguez;', 'FUNDACIÓN UNIVERSITARIA DE SAN GIL UNISANGIL', 'COLOMBIA', 'Categoría proyecto integrador\r\n1. Pulverización de miel producida por abejas africanizadas (San Gil); 2. POAC (Yopal); 3. Aplicación Móvil Para La Administración Durante El Proceso De Siembra Y Producción Del Cultivo De Aguacate Hass En El Municipio De Buenavista Boyacá (Chiquinquirá); \r\nCategoría proyecto aula\r\n1. Smarth Health Prediction (San Gil); 2. ECO PLASTIC (Yopal); 3. Aplicación web para el control de actividades del comité de modalidades de trabajo de grado de UNISANGIL.( Chiquinquirá )\r\nCategoría trabajos de grado\r\n1. Sistema de adquisición de datos para registro de magnitudes asociadas a calidad de agua; 2. Diseño e implementación de un banco de pruebas electro-neumático utilizando control PLC; 3. Prototipo funcional iot de bajo costo para determinar la viabilidad de instalación del modelo atrapanieblas tipo chileno en zona rural del municipio de Chiquinquirá Boyacá. (Chiquinquirá)', '2022-04-24 12:58:16', '2022-04-24 12:58:16'),
(2, 'nacional', '2021', '2021-2', 'PRE-GALA DE PROYECTOS DE INGENIERÍA 2021-2', '2021-11-23', '2021-11-23', 'REMOTO', 'YOPAL', 'Categoría – Proyecto Integrador\r\n1. Pedro David Aguilar La Rotta Wagner Nicolás Ramírez Páez; 2. Briham Farid Galan Parra Jaime Alberto Pacheco Corredor Marlon Alexis Lazaro Romero Cristian Camilo Moreno Perez; 3. Jessica Yinet Rincón Pinilla Sandra Yulieth Cortes Ramírez;\r\nCategoría – Proyecto de Aula\r\n1. Andrés Felipe Pardo Campos; 2. Brayan Arturo Castro Pinzón Ángela María Salazar López; 3. Juan Diego García Albornoz David Ricardo Sierra Niño Jaheld Davith Espejo Morales Nicolás David Muircia Malagón; \r\nCategoría – Trabajos de grado\r\n1. Juan Guillermo Naveros Jimenez; Ifran Andres Plazas Sierra Juan David Aguayo Pidiache; Daniela García Rodríguez', 'FUNDACIÓN UNIVERSITARIOA DE SAN GIL UNISANGIL', 'COLOMBIA', 'Categoría – Proyecto Integrador\r\n1. Pulverización de miel producida por abejas africanizadas (San Gil); 2. POAC (Yopal); 3. Aplicación Móvil Para La Administración Durante El Proceso De Siembra Y Producción Del Cultivo De Aguacate Hass En El Municipio De Buenavista Boyacá (Chiquinquirá);\r\nCategoría – Proyecto de Aula\r\n1. Smarth Health Prediction (San Gil); 2. ECO PLASTIC (Yopal); 3. Aplicación web para el control de actividades del comité de modalidades de trabajo de grado de UNISANGIL.( Chiquinquirá );\r\nCategoría – Trabajos de grado\r\n1. Sistema de adquisición de datos para registro de magnitudes asociadas a calidad de agua; 2. Diseño e implementación de un banco de pruebas electro-neumático utilizando control PLC; 3. Prototipo funcional iot de bajo costo para determinar la viabilidad de instalación del modelo atrapanieblas tipo chileno en zona rural del municipio de Chiquinquirá Boyacá. (Chiquinquirá)', '2022-04-24 13:04:13', '2022-04-24 13:04:13');

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

--
-- Volcado de datos para la tabla `ext_eventos_virtuales`
--

INSERT INTO `ext_eventos_virtuales` (`id`, `exevir_nombre_evento`, `exevir_fecha_inicio`, `exevir_fecha_fin`, `exevir_enlace_ingreso`, `exevir_enlace_imagen`, `exevir_nombre_ponente`, `exevir_institucion_origen`, `exevir_pais`, `exevir_nombre_ponencia`, `created_at`, `updated_at`) VALUES
(1, 'IES SEMINARIO INTERNACIONAL DE INGENIERIA', '2021-06-15', '2021-06-18', 'https://unisangil.edu.co/index.php?option=com_content&view=article&id=1682&Itemid=964', NULL, 'Ponente 1; Ponente 2;', 'Unisangil; UniBoyaca', 'Colombia', 'nn', '2022-04-22 12:11:48', '2022-04-22 12:12:29');

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

--
-- Volcado de datos para la tabla `ext_internacionalizacion_curriculo`
--

INSERT INTO `ext_internacionalizacion_curriculo` (`id`, `exincu_year`, `exincu_periodo`, `exincu_id_asignatura`, `exincu_id_docente`, `ext_uso_idioma`, `ext_uso_tic`, `ext_competencia_global`, `ext_movilidad_estudiante`, `ext_otra_actividad`, `created_at`, `updated_at`) VALUES
(1, 2022, '2', 40, 34, NULL, 'Metodologías medidadas por tic: clase espejo, coil, clases invertidas;Uso de recurso en linea de libre acceso: mooc, coursera, merlot, rie, upm, etc.', NULL, '10', 'no aplica', '2022-04-22 12:08:47', '2022-04-22 12:08:47');

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

--
-- Volcado de datos para la tabla `ext_movilidad_nacional`
--

INSERT INTO `ext_movilidad_nacional` (`id`, `exmona_tipo`, `exmona_rol`, `exmona_id_sede`, `exmona_id_facultad`, `exmona_id_programa`, `exmona_id_persona`, `exmona_institucion_proviene`, `exmona_tipo_movilidad`, `exmona_descripcion`, `exmona_fecha_inicio`, `exmona_fecha_final`, `created_at`, `updated_at`) VALUES
(2, 'entrante', 'estudiante', 6, 6, 3, 22, 'UNISANGIL', 'Curso corto', 'Movilidad por curso de 50 horas', '2022-04-25', '2022-05-06', '2022-04-22 12:10:35', '2022-04-22 12:10:35');

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

--
-- Volcado de datos para la tabla `ext_proyecto_extension`
--

INSERT INTO `ext_proyecto_extension` (`id`, `extprex_year`, `extprex_semestre`, `extprex_codigo_organizacional`, `extprex_codigo_pr`, `extprex_nombre_pr`, `extprex_descripcion_pr`, `extprex_valor_pr`, `extprex_id_area_extension`, `extprex_fecha_inicio`, `extprex_fecha_final`, `extprex_nombre_contacto`, `extprex_apellido_contacto`, `extprex_telefono_contacto`, `extprex_correo_contacto`, `extprex_id_area_trabajo`, `extprex_id_ciclo_vital`, `extprex_id_entidad_nacional`, `extprex_id_fuente_nacional`, `extprex_valor_financiacion_nac`, `extprex_id_fuente_internacional`, `extprex_id_pais`, `extprex_nombre_institucion_inter`, `extprex_valor_financiacion_inter`, `extprex_nombre_otra_entidad`, `extprex_id_sector_otra_entidad`, `extprex_id_pais_otra_entidad`, `extprex_id_poblacion_condicion`, `extprex_cantidad_condicion`, `extprex_id_poblacion_grupo`, `extprex_cantidad_grupo`, `extprex_soporte`, `created_at`, `updated_at`) VALUES
(1, 2022, 10, '15', '001', 'Plataforma Web para la gestión de información en el control de procesos académicos – administrativos del programa Ingeniería de Sistemas Unisangil sede Yopal', 'Plataforma Web para la gestión de información en el control de procesos académicos – administrativos del programa Ingeniería de Sistemas Unisangil sede Yopal', 0, 2, '2022-04-21', '2022-04-22', 'Michael', 'Rodriguez', '3223342408', 'maicolr62@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-22 12:05:47', '2022-04-22 12:05:47');

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

--
-- Volcado de datos para la tabla `ext_registro_fotografico_inter`
--

INSERT INTO `ext_registro_fotografico_inter` (`id`, `extrefoin_year`, `extrefoin_periodo`, `extrefoin_tipo_actividad`, `extrefoin_actividad`, `extrefoin_ente_organizador`, `extrefoin_fecha`, `extrefoin_tipo_evento`, `extrefoin_tipo_modalidad`, `extrefoin_soporte`, `created_at`, `updated_at`) VALUES
(2, '2021', '2', 'internacionalizacion-curriculo', 'Encuentro Nacional REDIS 2021', 'REDIS 2021', '2021-09-21', 'externo', 'investigacion', '2021_Encuentro Nacional REDIS 2021.zip', '2022-04-24 12:44:21', '2022-04-24 12:44:21'),
(3, '2021', '2', 'curso', 'Geodatos', 'https://acis.org.co/geodatos/', '2021-10-23', 'externo', 'investigacion', '2021_Geodatos.zip', '2022-04-24 12:46:10', '2022-04-24 12:46:10'),
(4, '2021', '2', 'curso', 'Reduc@te 2021', 'https://acis.org.co/reducate/', '2021-10-11', 'externo', 'investigacion', '2021_Reduc@te 2021.zip', '2022-04-24 12:47:37', '2022-04-24 12:47:37');

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
(5, 'Ciencias Económicas y Administrativas', '2022-04-21 09:40:06', '2022-04-21 09:40:06'),
(6, 'Ciencias Naturales e Ingeniería', '2022-04-21 09:40:15', '2022-04-21 09:40:15'),
(7, 'Ciencias Jurídicas y Políticas', '2022-04-21 09:40:22', '2022-04-21 09:40:22'),
(8, 'Ciencias de la Educación y de la Salud', '2022-04-21 09:40:29', '2022-04-21 09:40:29');

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

--
-- Volcado de datos para la tabla `inv_grupo_investigacion`
--

INSERT INTO `inv_grupo_investigacion` (`id`, `inv_id_coordinador`, `inv_nombre_grupo`, `inv_correo_institucional_grupo`, `inv_codigo_minciencias`, `inv_mision`, `inv_vision`, `inv_url_grupo`, `inv_url_gruplac`, `inv_area_conocimiento_principal`, `inv_nucleo_conocimiento_nbc`, `inv_sede`, `inv_facultad`, `inv_categoria_grupo`, `inv_aval_minciencias`, `inv_lineas_investigacion`, `created_at`, `updated_at`) VALUES
(1, 36, 'COMUNITIC', 'agomez@unisangil.edu.co', '000000', 'El grupo de investigación COMUNITIC, promueve la generación de una dinámica de trabajo basada en el trabajo de equipo y por medio de alianzas estratégicas con otros grupos de investigación, instituciones y empresas, con el fin de establecer transferencia de conocimiento y tecnología y generar valor agregado. A partir de 2013 el grupo de investigación empieza a apoyar y asesorar grupos de investigación de semilleros ondas, con la convicción de que el gusto por la investigación debe ser inculcado desde etapas tempranas. El grupo COMUNITIC se articula a nivel Departamental por medio del plan de gobierno de Casanare con el programa Fortalecimiento en Ciencia, Tecnología e Innovación para un crecimiento sostenible y competitivo que plantea implementar las tecnologías de información y comunicación como una nueva fuerza capaz de impulsar cambios socioeconómicos, que se articulan con los ecosistemas digitales, ecosistemas gobierno en línea, para estimular e inspeccionar espacios de formación, de una comunidad más activa, teniendo acceso a la conectividad digital, conexión a internet que permita desarrollar acciones destinadas a fortalecer la infraestructura tecnológica en sus principales componentes como son hardware, software, redes, conectividad y comunicaciones. Al grupo de investigación COMuniTIC se encuentran adscritos Los semilleros, DINAMUS - MAXWEL- IGEANT y COMUNITIC. Los cuales cuentan con participantes vinculados desde los programas de pregrado de Ingeniería de Sistemas y electrónica. COMUNITIC en 2019, tiene grandes objetivos de aporte a las cadenas de producción presentes en la región Casanareña, como respuesta a las problemática que hoy son visibles.', 'En el 2024, COMuniTIC será un grupo líder en Investigación, categoría A de Colciencias, articulado a semilleros contribuirá con el planteamiento, planificación, diseño y desarrollo de proyectos tecnológicos de información y comunicaciones en el Departamento de Casanare, siendo reconocidos como emprendedores con habilidades humanas y profesionales y con amplia trayectoria en el proceso de gestión y aplicación de las TIC para el desarrollo empresarial, educativo y social del departamento.', NULL, 'https://scienti.minciencias.gov.co/gruplac/jsp/visualiza/visualizagr.jsp?nro=00000000010652', 'Ciencias Naturales -- Computación y Ciencias de la Información -- Ciencias de la Computación', 'Ingeniería de sistemas, electrónica y afines', 6, 6, 'B con vigencia hasta la publicación de los resultados de la siguiente convocatoria', NULL, 'Automatización de procesos; Enseñanza de las ciencias en ingeniería; Robótica fija y movil; TIC; Telecomunicaciones', '2022-04-22 10:42:45', '2022-04-22 10:45:47');

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

--
-- Volcado de datos para la tabla `inv_investigador`
--

INSERT INTO `inv_investigador` (`id`, `inves_id_persona`, `inves_enlace_cvlac`, `inves_tipo_vinculacion`, `inves_categoria`, `inves_id_grupo`, `created_at`, `updated_at`) VALUES
(1, 23, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0000697613', 'Interno', 'n/a', 1, '2022-04-22 10:46:57', '2022-04-22 10:46:57'),
(2, 40, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001557741', 'Interno', 'n/a', 1, '2022-04-22 10:47:26', '2022-04-22 10:47:26'),
(3, 39, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001339506', 'Interno', 'n/a', 1, '2022-04-22 10:48:20', '2022-04-22 10:48:20'),
(4, 153, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001421040', 'Interno', 'nn', 1, '2022-04-24 13:56:51', '2022-04-24 13:56:51'),
(5, 149, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0000641995', 'Interno', 'nn', 1, '2022-04-24 13:57:37', '2022-04-24 13:57:37'),
(6, 147, 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001379925', 'Interno', 'nn', 1, '2022-04-24 13:58:05', '2022-04-24 13:58:05');

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

--
-- Volcado de datos para la tabla `inv_proyecto`
--

INSERT INTO `inv_proyecto` (`id`, `invpro_id_grupo`, `invpro_titulo`, `invpro_resumen`, `invpro_impacto`, `invpro_lugar`, `invpro_resultados`, `invpro_fecha_inicio`, `invpro_id_integrantes`, `invpro_palabras_clave`, `invpro_estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Plataforma Web para la gestión de información en el control de procesos académicos – administrativos del programa Ingeniería de Sistemas Unisangil sede Yopal', 'Dentro de los procesos del que hacer de una institución de Educación superior está la obtención de sus registros calificados llevando a cabo las condiciones según el decreto 1330, posteriormente con el fin de sustentar la calidad en sus procesos opta por presentar acreditación en alta calidad. Ante esta situación un proceso acreditación espera la disposición y actitud de cada una de las áreas que la conforman para obtener la información y los datos de forma confiable y segura; la correcta captura, seguridad y gestión de la información permite agilización dichos procesos. \r\n\r\nEn vista de esto, actualmente la mayoría de instituciones no cuenta con un espacio para la centralización de la información de cada uno de sus programas académicos que oferta, dicha información es de vital importancia para la gestión en los procesos de acreditación de alta calidad, renovación de registros calificados, gestión de grupos de investigación, entre otros datos que brindan prestigio dentro de las instituciones de educación superior del país. Para la gestión de los procesos anteriormente mencionados es necesaria una gran cantidad de documentación, la cual, se torna dispendiosa su recolección y en algunas ocasiones imposible de generar trazabilidad de la misma.', 'A partir de esta necesidad, se planteó el desarrollo de proyecto “plataforma web para la gestión y control de información de procesos académicos y administrativos del programa ingeniería de sistemas Unisangil sede Yopal” con el fin de abordar esta problemática y brindarle una solución teniendo en cuenta cada uno los aspectos necesarios dentro de los procesos que impulsan la mejora de la universidad, enfocándose en una solución óptima, direccionada en la visualización por módulos teniendo en cuenta cada una de las que conforman UNISANGIL.', 'Yopal', 'Sitio web que permita la centralización de la formación del programa de ingeniería de sistemas', '2021-04-21', 'Angela Bibiana Ortegón Fuentes;Briham Farid Galan Parra', 'Larave; Php; Mysql; Centralizar', 'en-curso', '2022-04-22 10:53:49', '2022-04-22 22:20:47');

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

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id`, `lab_fecha`, `lab_nombre`, `lab_ubicacion`, `lab_id_docente`, `lab_finalidad`, `lab_id_facultad`, `lab_id_programa`, `lab_id_practicante`, `lab_nombre_practica`, `lab_cantidad_estudiante`, `lab_id_software`, `lab_material`, `lab_observaciones`, `created_at`, `updated_at`) VALUES
(1, '2022-04-28', 'DISEÑO ASISTIDO POR COMPUTADOR PRACTICA ESPECIAL', 'LABORATORIO C-201', 32, 'FORMACIÓN', 6, 3, 41, 'Diseño asistido uso de herramientas en 3D', 10, 2, 'No aplica', 'No aplica', '2022-04-22 11:18:24', '2022-04-22 11:18:24'),
(2, '2022-04-25', 'Programación orientadas a objetos con JAVA', 'LAB. C-202', 31, 'FORMACIÓN', 6, 3, 41, 'Pro y contras de la programación orientada a objetos en el siglo XXI', 10, 4, 'No aplica', 'No aplica', '2022-04-22 11:20:12', '2022-04-22 11:20:12');

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
(3, 'Presencial', NULL, NULL),
(4, 'Virtual', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 'Practica laboral', NULL, NULL),
(11, 'Investigación formulación', '2022-04-21 21:47:48', '2022-04-21 21:47:48'),
(12, 'Investigación ejecución', '2022-04-21 21:47:59', '2022-04-21 21:47:59'),
(13, 'Desarrollo tecnológico curricular', '2022-04-21 21:48:17', '2022-04-21 21:48:17'),
(14, 'Desarrollo tecnológico dirigido', '2022-04-21 21:48:31', '2022-04-21 21:48:31'),
(15, 'Desarrollo Tecnológico para una empresa', '2022-04-21 21:48:41', '2022-04-21 21:48:41'),
(16, 'Autogestión empresarial', '2022-04-21 21:48:48', '2022-04-21 21:48:48'),
(17, 'Desarrollo tecnológico', '2022-04-21 21:47:36', '2022-04-21 21:47:36');

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
(6, 'Yopal', 6, NULL, NULL);

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
(3, 'Pregrado', '2022-04-21 09:40:41', '2022-04-21 09:40:41'),
(4, 'Especialización', '2022-04-21 09:40:48', '2022-04-21 09:40:48');

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
  `per_departamento` int DEFAULT '0',
  `per_ciudad` int DEFAULT '0',
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
(22, 'Cédula de ciudadania', '1006450866', 'Michael', 'Rodríguez', '3223342408', 'michaelrodriguezhernandez@unisangil.edu.co', '$2y$10$lwmItupVmphtVN8Moosw8.83Dt/mXjVKa3308i4xE8RgXu3rmRcVa', 6, 6, 9, 'activo', NULL, NULL, NULL, '2022-04-22 11:11:30'),
(23, 'Cédula de ciudadania', '23914069', 'Angela Bibiana', 'Ortegón Fuentes', '3107994000', 'abortegon@unisangil.edu.co', '$2y$10$d71nzJe4AHyY3xiOcuXFleQ4JVSgmEp7EwdL2n4o9BEmpfiXULMI2', 6, 6, 2, 'activo', NULL, NULL, NULL, '2022-04-22 01:08:19'),
(25, 'Cédula de ciudadania', '1118574356', 'Briham Farid', 'Galan Parra', '3224026959', 'brihamgalan219@unisangil.edu.co', '$2y$10$t/KaG/14aoe7Y0OfJfixhugZOGToJfLm/Tve3T7QkmonpHKldYijS', 6, 6, 6, 'activo', NULL, NULL, NULL, NULL),
(26, 'Cédula de ciudadania', '1118568249', 'Natalia', 'Rojas Segua', '3204723615', 'nataliarojassegue@unisangil.edu.co', '$2y$10$ViVgAt6R3BbmWZzdFfh9V.s2ItRuG2saUSvENIqxxRxsFCrC.aG9W', 6, 6, 6, 'activo', NULL, NULL, NULL, NULL),
(30, 'Cédula de ciudadania', '9430456', 'Quevin Yohan', 'Barrera', '3103315501', 'Qbarrera@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-23 08:15:34'),
(31, 'Cedula de ciudadania', '79138955', 'Simon Edgar', ' Gomez Gomez', '3102798710', 'sgomez@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(32, 'Cedula de ciudadania', '9433724', 'juan pablo', ' avila moreno', '3118546602', 'jpavila@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(33, 'Cedula de ciudadania', '33368581', 'ALDA YOLANDA', ' CARO MORENO', '3103599717', 'acaro@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(34, 'Cedula de ciudadania', '18263657', 'oscar Javier', ' Olivos', '3114689645', 'oolivos@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(35, 'Cedula de ciudadania', '34326249', 'PATRICIA EUGENIA', ' ESCOBAR MARTINEZ', '3214539093', 'pescobar@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(36, 'Cédula de ciudadania', '74859167', 'ABDIAS GÓMEZ', 'DUARTE', '3143752523', 'agomez@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 08:30:09'),
(37, 'Cedula de ciudadania', '1016055925', 'Liliana Carolina', ' Luis Rincon ', '3143710309', 'lluis@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(38, 'Cedula de ciudadania', '52033575', 'YADIRA CLEMENCIA', ' MARTINEZ RODRIGUEZ', '3103481723', 'ymartinez1@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(39, 'Cedula de ciudadania', '63369149', 'Martha Judith', ' Lopez Pinzon ', '3124789956', 'Mlopez@gmail.com', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(40, 'Cedula de ciudadania', '5478348', 'ALEXIS OLVANY', ' TORRES CHAPETA', '3128782210', 'atorres@unisangil.edu.co', '', 6, 6, 3, 'activo', '0000-00-00 00:00:00', 'null', '2022-04-22 03:12:00', '2022-04-22 03:12:00'),
(41, 'Cédula de ciudadania', '1001280760', 'DANIEL ALEJANDRO', 'ACERO ALMANZA', '3124656896', 'danielacero@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '2022-04-22 11:15:37'),
(42, 'Tarjeta de identidad', '1058352100', 'JULIAN MAURICIO', 'ACEVEDO MORA', '3227459284', 'julianacevedo122@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Cedula de ciudadania', '1002756648', 'LAURA TATIANA', 'AGUILAR CASTA', '3004530070', 'lauraaguilar219@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
(122, 'Cedula de ciudadania', '1116554457', 'JUAN SEBASTIAN ', 'RODRIGUEZ ', '3202579137', 'sebastianrodriguez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Cedula de ciudadania', '1003765321', 'SERGIO ALEJANDRO', 'RODRIGUEZ PEDRAZA', '3227437306', 'damianrodriguez121@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Cedula de ciudadania', '1116554457', 'KENER ARVEY', 'RODRIGUEZ SANDOVAL', '3012823509', 'kenerrodriguez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
(143, 'Cedula de ciudadania', '1006558667', 'HUGO ANDRES', 'ZULUAGA HERNANDEZ', '3118699519', 'hugozuluaga@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Cédula de ciudadania', '1118534394', 'JUAN DAVID', 'CASTELLOM', '3208882058', 'jcastellom@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, '2022-04-23 03:06:26'),
(148, 'Cédula de ciudadania', '9526947', 'LUIS FERNANDO', 'GALVIS BARRERA', '3134623774', 'lgalvis@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, '2022-04-23 02:58:15'),
(149, 'Cédula de ciudadania', '74370304', 'WILSON ARTURO', 'GOMEZ BECERRA', '3102479171', 'wgomez@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(150, 'Cédula de ciudadania', '1049622709', 'JOHAN HERNAN', 'PEREZ BENITES', '1', '1@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(151, 'Cédula de ciudadania', '1052383445', 'MICHAEL  DANILO', 'GONZALEZ SOLANO', '1', 'mgonzalez@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(152, 'Cédula de ciudadania', '74381422', 'DIEGO ALEXANDER', 'PITA PEDRAZA', '3173866746', 'dpita@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(153, 'Cédula de ciudadania', '104903952', 'EDWIN ALEXIS', 'PINEDA MUÑOZ', '3124962074', 'epineda2@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(154, 'Cédula de ciudadania', '9396785', 'FRANCISCO JAVIER', 'VARGAS TEJEDOR', '3102852694', 'fvargas2@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(155, 'Cédula de ciudadania', '79718298', 'JUAN CARLOS', 'FONSECA', '3223041816', 'jfonseca@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(156, 'Cédula de ciudadania', '37894725', 'LUZ YAMILE', 'CAICEDO CHACON', '1', 'lcaicedo@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(157, 'Cédula de ciudadania', '1111', 'BEATRIZ HERMINA', 'GALLO', '1111', '111@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(158, 'Cédula de extranjeria', '27155156', 'JUAN HUMBERTO', 'SOSSA AZUELA', '1', 'jsossa@unisangil.edu.co', NULL, 6, 6, 3, 'activo', NULL, NULL, NULL, NULL),
(159, 'Cédula de ciudadania', '1116551350', 'Juan Daniel', 'Dueñas Castiblanco', '3185456697', 'juanduenas@unisangil.edu.co', '$2y$10$pfMk.6x.1yDpKff7z8ykU.pcvxST/i08wsH0H17fyxmYh.xRfJOX.', 6, 6, 9, 'activo', NULL, NULL, NULL, NULL),
(160, 'Cédula de ciudadania', '1116665536', 'José Luis', 'Madrid Angel', '0000', 'josemadrid@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(161, 'Cédula de ciudadania', '1118562120', 'Camilo Alberto', 'Chaparro González', '0000', 'calbertochaparro@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(162, 'Cédula de ciudadania', '1118571810', 'Gerson', 'Castillo Hernandez', '0000', 'gcastilloh@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(163, 'Cédula de ciudadania', '1116546784', 'Jhon leonardo', 'Luna Sanabria', '000', 'jhonluna@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(164, 'Cédula de ciudadania', '1118563534', 'Jessica Paola', 'Camacho Sierra', '0000', 'jessicacamacho@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(165, 'Cédula de ciudadania', '1118571167', 'JHULBRINER NOLBERTO', 'RIASCOS AGAMEZ', '000', 'jhulbriner98@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(166, 'Cédula de ciudadania', '1118565363', 'DAVID ESTEBAN', 'CORTES VALDERRAMA', '00000', 'davidcortes@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(167, 'Cédula de ciudadania', '1118570392', 'SILVIA FERNANDA', 'ABRIL ABRIL', '000', 'silviafernandez@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(168, 'Cédula de ciudadania', '1118570833', 'LUIS MIGUEL', 'RODRIGUEZ CABULO', '00000', 'lmiguelrodriguez@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(169, 'Cédula de ciudadania', '1118569722', 'GILDER FABIAN', 'SILVA ESCOBAR', '0000', 'gildersilva@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(170, 'Cédula de ciudadania', '1118573554', 'JEISON STIVEN', 'DIAZ ROJAS', '000000', 'jeisondiaz@unisangil.edu.co', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(171, 'Cedula de ciudadania', '1118572432', 'JOHANA ANDREA', 'CASTILLO GOMEZ', '0', 'johanacastillo@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'Cedula de ciudadania', '1007417066', 'KARENS YULIETH', 'AYALA CHAPARRO', '0', 'kayala@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'Cedula de ciudadania', '1118567887', 'EDDISON CAMILO', 'MANCIPE DIAZ', '0', 'eddisonmancipe@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Cedula de ciudadania', '1115865803', 'LEIDY NATALIA', 'ORJUELA PARRA', '0', 'leidyorjuela1@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'Cedula de ciudadania', '1120560732', 'MARINEL MARTINEZ', 'RODRIGUEZ ', '0', 'mmartinezr@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Cedula de ciudadania', '1118573028', 'JHON ALEX', 'ORTIZ SUAREZ', '0', 'jhoanortiz@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Cedula de ciudadania', '1118564257', 'MERSIS ANDREA', 'PEREZ FONSECA', '0', 'mersisperez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Cedula de ciudadania', '1118542847', 'LUIS EDUARDO', 'TORRES ALARCON', '0', 'luiseduardorodriguez@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Cedula de ciudadania', '1118570938', 'CAMILO ANDRES', 'ROSERO RINCON', '0', 'camilo@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Cedula de ciudadania', '1049645683', 'BRAYAN ANDRES', 'HERNANDEZ GAMBOA', '0', 'brayanhernandez1@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Cedula de ciudadania', '1115918673', 'KEVIN DAVID', 'ESCOBAR VILLEGAS', '0', 'kevinescobar@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Cedula de ciudadania', '1118574718', 'ANA LIZBETH', 'MEDINA NEITA', '0', 'analizbeth@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'Cedula de ciudadania', '1118650696', 'DIOMEDES DIAZ', 'HURTADO ', '0', 'diomedesdiaz@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'Cedula de ciudadania', '1118572826', 'DAVID SANTIAGO', 'CANO GARCIA', '0', 'davidcano@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'Cedula de ciudadania', '1118573275', 'GIANCARLO GARCIA', 'MARI', '0', 'giancarlogarcia@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'Cedula de ciudadania', '1118571996', 'JUAN SEBASTIAN', 'OCHOA ', '0', 'juansebastian@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Cedula de ciudadania', '1118571218', 'REINALDO VILLAMIZAR', 'RAMIREZ ', '0', 'reinaldovillamizar@unisangil.edu.co', '', 6, 6, 6, 'activo', '0000-00-00 00:00:00', 'null', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'Cédula de ciudadania', '1111111', 'UNISANGIL', 'YOPAL', '111111', 'unisangilyopal@unisangil.edu.co', '$2y$10$VP8hA0Mxaa2i2H.7.LMLOOkUj66ZaUm7C6Cr/cxKTb/OcfJ2vmTey', 6, 6, 10, 'activo', NULL, NULL, NULL, NULL);

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
(3, 'Ingeniería de Sistemas', 'Activo', 6, 6, 6, 'Ingeniero de Sistemas', '7915', 'Resolución No. 002485 del 2 de marzo de 2022. Con una vigencia de (7) siete años.', '2022-04-20', '2022-04-20', 3, 'Si', 3, 10, 'Semestral', 'Ingeniería', 'Ingeniería de sistemas, electrónica y afines', '1234', 23, '2022-04-21 09:44:00', '2022-04-21 09:44:00');

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

--
-- Volcado de datos para la tabla `programa_asignatura_horario`
--

INSERT INTO `programa_asignatura_horario` (`id`, `pph_year`, `pph_semestre`, `pph_id_asignatura`, `pph_grupo`, `pph_id_docente`, `pph_horario`, `pph_aula`, `pph_nro_horas_semana_docencia`, `pph_nro_horas_semana_investigacion`, `pph_nro_horas_semana_extension`, `pph_nro_horas_semana_administrativas`, `created_at`, `updated_at`) VALUES
(2, '2022', 1, 7, 'Y-FCNI A / Y-FCNI B', 32, 'JUEVES 18:20 - 20:10\r\nVIERNES 18:20 - 20:10', 'LABORATORIO C-201', 2, 2, 2, 2, '2022-04-22 09:58:23', '2022-04-22 09:58:23'),
(3, '2022', 2, 11, 'Y-SIST ELECTR', 31, 'LUNES 18:20 - 20:00\r\nMIERCOLES 20:10 - 21:50', 'LAB. C-202', 4, 0, 0, 0, '2022-04-22 09:59:54', '2022-04-22 09:59:54'),
(4, '2022', 2, 15, 'Y-FCNI', 33, 'LUNES 21:00 - 22:40\r\nJUEVES 21:00 - 22:40', 'C-203 / REMOTO', 4, 4, 4, 4, '2022-04-22 10:01:16', '2022-04-22 10:01:16'),
(5, '2022', 3, 16, 'Y-SISTEMAS', 40, 'LUNES 21:00 - 22:40\r\nJUEVES 20:00 - 21:50', 'REMOTO / LAB. C-202', 5, 5, 5, 5, '2022-04-22 10:02:41', '2022-04-22 10:02:41'),
(6, '2022', 4, 22, 'Y-FCNI', 36, 'MIERCOLES 18:20 - 20:00', 'REMOTO 3 SEDES', 2, 2, 2, 2, '2022-04-22 10:03:46', '2022-04-22 10:03:46'),
(7, '2022', 4, 26, 'Y-FCNI', 33, 'VIERNES 21:00 - 22:40', 'C-302', 2, 2, 2, 2, '2022-04-22 10:04:31', '2022-04-22 10:04:31'),
(8, '2022', 5, 30, 'Y-FCNI', 30, 'LUNES 18:20 - 20:00 \r\nJUEVES 20:10  - 21:50', 'D-201 / B-305', 4, 4, 4, 4, '2022-04-22 10:05:38', '2022-04-23 02:01:09'),
(9, '2022', 5, 27, 'Y-SISTEMAS', 34, 'LUNES 20:10 - 22:40', 'LAB. C-202', 2, 2, 2, 2, '2022-04-22 10:06:51', '2022-04-22 10:06:51'),
(10, '2022', 5, 32, 'ASA', 33, 'MARTES 21:00 22:40', 'C-301', 2, 2, 2, 2, '2022-04-22 10:07:32', '2022-04-23 02:04:17'),
(11, '2022', 5, 28, 'Y-SISTEMAS', 39, 'MIERCOLES 18:20 - 20:00\r\nJUEVE 18:20 - 20:00', 'LAB. C-202 / B-306', 2, 2, 2, 2, '2022-04-22 10:08:14', '2022-04-22 10:09:32'),
(12, '2022', 5, 31, 'Y-SIST AMB', 32, 'MIERCOLES 20:00 - 21:50', 'B-202', 2, 2, 2, 2, '2022-04-22 10:08:57', '2022-04-23 02:07:18'),
(13, '2022', 6, 40, 'Y-SISTEMAS', 34, 'MARTES 18:20 - 21:00', 'LAB. C-201', 3, 3, 3, 3, '2022-04-22 10:10:28', '2022-04-22 10:10:28'),
(14, '2022', 6, 39, 'Y-SISTEMAS', 30, 'MIERCOLES 18:20 - 21:00', 'LAB. C-201', 3, 3, 3, 3, '2022-04-22 10:11:14', '2022-04-22 10:11:14'),
(15, '2022', 6, 42, 'Y-SISTEMAS', 35, 'JUEVES 21:00 - 22:40', 'B-205', 2, 2, 2, 2, '2022-04-22 10:12:04', '2022-04-22 10:12:04'),
(16, '2022', 6, 38, 'Y-ASA', 31, 'VIERNES 18:20 - 21:00', 'C-304', 3, 3, 3, 3, '2022-04-22 10:12:39', '2022-04-22 10:12:39'),
(17, '2022', 7, 45, 'Y-SISTEMAS A', 40, 'LUNES 18:20 - 21:00', 'LAB. C-202', 3, 3, 3, 3, '2022-04-22 10:13:21', '2022-04-22 10:13:21'),
(18, '2022', 7, 47, 'Y-SISTEMAS', 35, 'MIERCOLES 18:20 - 21:00', 'D-101', 3, 3, 3, 3, '2022-04-22 10:14:05', '2022-04-22 10:14:05'),
(19, '2022', 7, 44, 'Y-SISTEMAS', 36, 'VIERNES 20:10 - 22:40', 'REMOTO', 3, 3, 3, 3, '2022-04-22 10:14:46', '2022-04-22 10:14:46'),
(20, '2022', 10, 63, 'Y-ESA', 38, 'MARTES\r\n18:20 - 20:00', 'B-105', 0, 0, 0, 0, '2022-04-23 02:19:48', '2022-04-23 02:19:48');

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
(2, 6, 3, '2016', 164, 54, 'activo', '2022-04-21 09:44:50', '2022-04-21 09:44:50'),
(3, 6, 3, '909', 163, 60, 'inactivo', '2022-04-21 09:45:06', '2022-04-21 09:45:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_plan_estudio_asignatura`
--

CREATE TABLE `programa_plan_estudio_asignatura` (
  `id` int NOT NULL,
  `asig_id_sede` int NOT NULL,
  `asig_id_programa` int NOT NULL,
  `asig_id_plan_estudio` int NOT NULL,
  `asig_id_componente` int NOT NULL DEFAULT '0',
  `asig_id_area` int NOT NULL DEFAULT '0',
  `asig_codigo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `asig_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asig_semestre` int NOT NULL DEFAULT '0',
  `asig_no_creditos` int NOT NULL,
  `asig_no_semanales` int NOT NULL,
  `asig_no_semestre` int NOT NULL,
  `asig_estado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `programa_plan_estudio_asignatura`
--

INSERT INTO `programa_plan_estudio_asignatura` (`id`, `asig_id_sede`, `asig_id_programa`, `asig_id_plan_estudio`, `asig_id_componente`, `asig_id_area`, `asig_codigo`, `asig_nombre`, `asig_semestre`, `asig_no_creditos`, `asig_no_semanales`, `asig_no_semestre`, `asig_estado`, `created_at`, `updated_at`) VALUES
(6, 6, 3, 2, 1, 2, '5201', 'FUNDAMENTOS DE PROGRAMACIÓN', 1, 4, 4, 64, 'activo', '2022-04-21 09:51:31', '2022-04-21 09:51:31'),
(7, 6, 3, 2, 1, 2, '5801', 'DISEÑO ASISTIDO POR COMPUTADOR', 1, 3, 3, 48, 'activo', '2022-04-21 09:52:22', '2022-04-21 09:52:22'),
(8, 6, 3, 2, 2, 3, '5001', 'CALCULO DIFERENCIAL', 1, 4, 4, 64, 'activo', '2022-04-21 09:53:04', '2022-04-21 09:53:04'),
(10, 6, 3, 2, 3, 4, '9001', 'INTRODUCCIÓN A LA INGENIERIA', 1, 2, 2, 32, 'activo', '2022-04-21 09:54:05', '2022-04-21 09:54:05'),
(11, 6, 3, 2, 1, 2, '5202', 'PROGRAMACIÓN I', 2, 4, 4, 64, 'activo', '2022-04-21 09:54:40', '2022-04-21 09:54:40'),
(14, 6, 3, 2, 3, 4, '6101', 'PROYECTO INTEGRADOR I', 2, 2, 2, 32, 'activo', '2022-04-21 09:56:25', '2022-04-21 09:56:25'),
(15, 6, 3, 3, 3, 4, '9101', 'EXPRESIÓN I', 2, 4, 4, 64, 'activo', '2022-04-21 09:56:59', '2022-04-21 09:56:59'),
(16, 6, 3, 2, 1, 2, '5203', 'ESTRUCTURA DE DATOS', 3, 4, 4, 64, 'activo', '2022-04-21 09:57:48', '2022-04-21 09:57:48'),
(18, 6, 3, 2, 2, 3, '5101', 'QUIMICA GENERAL', 3, 3, 3, 48, 'activo', '2022-04-21 09:59:03', '2022-04-21 09:59:03'),
(19, 6, 3, 2, 2, 3, '5105', 'MECANICA', 3, 4, 4, 64, 'activo', '2022-04-21 09:59:49', '2022-04-21 10:00:01'),
(20, 6, 3, 2, 3, 4, '6102', 'PROYECTO INTEGRADOR II', 3, 1, 1, 16, 'activo', '2022-04-21 10:00:37', '2022-04-21 10:00:37'),
(21, 6, 3, 2, 1, 2, '5204', 'BASE DE DATOS', 4, 4, 4, 64, 'activo', '2022-04-21 10:01:37', '2022-04-21 10:04:02'),
(22, 6, 3, 2, 1, 2, '5301', 'MATEMATICAS DISCRETAS', 4, 4, 4, 64, 'activo', '2022-04-21 10:02:28', '2022-04-21 10:03:51'),
(23, 6, 3, 2, 2, 3, '5004', 'ECUCACIONES DIFERENCIALES', 4, 3, 3, 48, 'activo', '2022-04-21 10:03:06', '2022-04-21 10:03:06'),
(24, 6, 3, 2, 2, 3, '5106', 'ELECTROMAGNESTIMO', 4, 4, 4, 64, 'activo', '2022-04-21 10:04:35', '2022-04-21 10:04:35'),
(25, 6, 3, 2, 3, 4, '6103', 'PROYECTO INTEGRADOR III', 4, 1, 1, 16, 'activo', '2022-04-21 10:05:09', '2022-04-21 10:05:09'),
(26, 6, 3, 2, 3, 4, '9002', 'IDENTIDAD CULTURAL Y CIUDADANA', 4, 2, 2, 32, 'activo', '2022-04-21 10:05:40', '2022-04-21 10:05:40'),
(27, 6, 3, 2, 1, 1, '2401', 'ADMINISTRACIÓN Y GESTIÓN DE BASE DE DATOS', 5, 3, 3, 48, 'activo', '2022-04-21 10:06:15', '2022-04-21 10:06:15'),
(28, 6, 3, 2, 1, 2, '5205', 'ANÁLISIS DE ALGORITMOS', 5, 4, 4, 64, 'activo', '2022-04-21 10:06:54', '2022-04-21 10:06:54'),
(29, 6, 3, 2, 2, 3, '5102', 'BIOLOGÍA GENERAL', 5, 3, 3, 48, 'activo', '2022-04-21 10:07:30', '2022-04-21 10:07:30'),
(30, 6, 3, 2, 2, 3, '5107', 'ONDAS Y PARTICULAS', 5, 4, 4, 64, 'activo', '2022-04-21 10:07:57', '2022-04-21 10:07:57'),
(31, 6, 3, 2, 3, 4, '6104', 'PROYECTO INTEGRADOR IV', 5, 1, 1, 16, 'activo', '2022-04-21 10:08:38', '2022-04-21 10:08:38'),
(32, 6, 3, 2, 3, 4, '9102', 'EXPRESIÓN II', 5, 2, 2, 32, 'activo', '2022-04-21 10:09:05', '2022-04-21 10:09:05'),
(33, 6, 3, 2, 2, 3, '5005', 'Algebra Superior', 1, 2, 2, 32, 'activo', '2022-04-22 01:42:48', '2022-04-22 01:42:48'),
(34, 6, 3, 2, 2, 3, '5002', 'CALCULO INTEGRAL', 2, 4, 4, 64, 'activo', '2022-04-22 02:03:32', '2022-04-22 02:03:32'),
(35, 6, 3, 2, 2, 3, '5006', 'ALGEBRA LINEAL', 2, 2, 2, 32, 'activo', '2022-04-22 02:05:10', '2022-04-22 02:05:10'),
(36, 6, 3, 2, 2, 3, '5003', 'CALCULO EN VARIAS VARIABLES', 3, 3, 3, 48, 'activo', '2022-04-22 02:08:11', '2022-04-22 02:08:11'),
(37, 6, 3, 2, 1, 1, '2402', 'MODELADO DE SISTEMAS DE INFORMACION', 6, 2, 2, 32, 'activo', '2022-04-22 02:21:43', '2022-04-23 00:38:10'),
(38, 6, 3, 2, 1, 1, '2501', 'TEORIA DE SISTEMAS', 6, 2, 2, 32, 'activo', '2022-04-22 02:23:11', '2022-04-22 02:23:11'),
(39, 6, 3, 2, 1, 1, '2601', 'ARQUITECTURA DE COMPUTADORES', 6, 3, 3, 48, 'activo', '2022-04-22 02:24:35', '2022-04-22 02:24:35'),
(40, 6, 3, 2, 1, 2, '5206', 'PROGRAMACION ii', 6, 3, 3, 48, 'activo', '2022-04-22 02:26:03', '2022-04-22 02:26:44'),
(41, 6, 3, 2, 1, 2, '5302', 'MODELADO Y ANALISIS NUMERICO', 6, 4, 4, 64, 'activo', '2022-04-22 02:28:10', '2022-04-22 02:28:10'),
(42, 6, 3, 2, 3, 4, '6105', 'FORMULACION DE PROYECTOS', 6, 3, 3, 48, 'activo', '2022-04-22 02:29:47', '2022-04-22 02:29:47'),
(43, 6, 3, 2, 1, 1, '2403', 'INGENIERIA DE SOFTWARE', 7, 4, 4, 64, 'activo', '2022-04-22 02:35:33', '2022-04-22 02:35:33'),
(44, 6, 3, 2, 1, 1, '2502', 'SISTEMAS DINAMICOS', 7, 3, 3, 48, 'activo', '2022-04-22 02:40:10', '2022-04-22 02:40:10'),
(45, 6, 3, 2, 1, 1, '2602', 'SISTEMAS OPERATIVOS', 7, 3, 3, 48, 'activo', '2022-04-22 02:43:28', '2022-04-22 02:43:28'),
(46, 6, 3, 2, 1, 2, '5303', 'PROBABILIDAD Y ESTADISTICA', 7, 3, 3, 48, 'activo', '2022-04-22 02:49:23', '2022-04-22 02:49:23'),
(47, 6, 3, 2, 3, 4, '6106', 'EVALUACION DE PROYECTOS', 7, 3, 3, 48, 'activo', '2022-04-22 02:50:43', '2022-04-22 02:50:43'),
(48, 6, 3, 2, 1, 1, '2404', 'ARQUITECTURA DE SOFTWARE', 8, 3, 3, 48, 'activo', '2022-04-22 02:52:11', '2022-04-22 02:52:11'),
(49, 6, 3, 2, 1, 1, '2701', 'COMUNICACION DE DATOS', 8, 4, 4, 64, 'activo', '2022-04-22 02:54:13', '2022-04-22 02:54:13'),
(50, 6, 3, 2, 1, 1, '2901', 'ELECTIVA PROFESIONAL I', 8, 3, 3, 48, 'activo', '2022-04-22 02:55:22', '2022-04-22 02:55:37'),
(51, 6, 3, 2, 1, 2, '4', 'INVESTIGACION DE OPERACIONES I', 8, 4, 4, 64, 'activo', '2022-04-22 02:58:38', '2022-04-22 02:58:38'),
(52, 6, 3, 2, 3, 4, '6201', 'ELECTIVA COMPLEMENTARIA I', 8, 3, 3, 48, 'activo', '2022-04-22 02:59:50', '2022-04-22 02:59:50'),
(53, 6, 3, 2, 1, 1, '2405', 'GESTION DE PROYECTOS T.I', 9, 2, 2, 32, 'activo', '2022-04-22 03:01:54', '2022-04-22 03:01:54'),
(54, 6, 3, 2, 1, 1, '2702', 'REDES DE  COMUNICACIONES', 9, 4, 4, 64, 'activo', '2022-04-22 03:03:10', '2022-04-22 03:03:10'),
(55, 6, 3, 2, 1, 1, '2802', 'TRABAJO DE GRADO I', 9, 2, 2, 32, 'activo', '2022-04-22 03:04:14', '2022-04-22 03:04:14'),
(56, 6, 3, 2, 1, 1, '2902', 'ELECTIVA PROFESIONAL II', 9, 3, 3, 48, 'activo', '2022-04-22 03:05:46', '2022-04-22 03:05:46'),
(57, 6, 3, 2, 1, 2, '5305', 'INVESTIGACION DE OPERACIONES II', 9, 3, 3, 48, 'activo', '2022-04-22 03:06:54', '2022-04-22 03:06:54'),
(58, 6, 3, 2, 1, 2, '5901', 'ELECTIVA DE INGENIERIA I', 9, 3, 3, 48, 'activo', '2022-04-22 03:08:03', '2022-04-22 03:08:03'),
(59, 6, 3, 2, 1, 1, '2803', 'TRABAJO DE GRADO II', 10, 6, 6, 0, 'activo', '2022-04-22 03:09:07', '2022-04-22 03:09:07'),
(60, 6, 3, 2, 1, 1, '2903', 'ELECTIVA PROFESIONAL III', 10, 3, 3, 48, 'activo', '2022-04-22 03:10:20', '2022-04-22 03:10:20'),
(61, 6, 3, 2, 1, 2, '5902', 'ELECTIVA DE INGENIERIA II', 10, 3, 3, 48, 'activo', '2022-04-22 03:11:15', '2022-04-22 03:11:15'),
(62, 6, 3, 2, 3, 4, '6202', 'ELECTIVA COMPLEMENTARIA II', 10, 2, 2, 32, 'activo', '2022-04-22 03:12:28', '2022-04-22 03:12:28'),
(63, 6, 3, 2, 3, 4, '9003', 'ETICA Y COMPROMISO PROFESIONAL', 10, 2, 2, 32, 'activo', '2022-04-22 03:14:49', '2022-04-22 03:14:49');

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

--
-- Volcado de datos para la tabla `prueba_resultado_programa`
--

INSERT INTO `prueba_resultado_programa` (`id`, `prurepro_year`, `prurepro_id_programa`, `prurepro_global_programa`, `prurepro_global_institucion`, `prurepro_global_sede`, `prurepro_global_grupo_referencia`, `created_at`, `updated_at`) VALUES
(4, 2021, 3, 151, 146, 146, 153, NULL, NULL);

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

--
-- Volcado de datos para la tabla `prueba_resultado_programa_modulo`
--

INSERT INTO `prueba_resultado_programa_modulo` (`id`, `prurepromo_id_prueba_programa`, `prureprono_id_modulo`, `prureprono_puntaje_programa`, `prureprono_puntaje_institucion`, `prureprono_puntaje_sede`, `prureprono_puntaje_grupo_referencia`, `created_at`, `updated_at`) VALUES
(16, 3, 3, 141, 139, 139, 134, NULL, NULL),
(17, 3, 4, 159, 148, 148, 161, NULL, NULL),
(18, 3, 5, 150, 147, 147, 153, NULL, NULL),
(19, 3, 6, 147, 149, 149, 154, NULL, NULL),
(20, 3, 7, 157, 149, 149, 164, NULL, NULL);

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

--
-- Volcado de datos para la tabla `prueba_saber`
--

INSERT INTO `prueba_saber` (`id`, `prueba_saber_year`, `prueba_saber_periodo`, `prueba_saber_id_estudiante`, `prueba_saber_puntaje_global`, `created_at`, `updated_at`) VALUES
(3, '2016', '2', 22, 59.5, NULL, NULL),
(4, '2016', '2', 41, 54, NULL, NULL);

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

--
-- Volcado de datos para la tabla `prueba_saber_modulo`
--

INSERT INTO `prueba_saber_modulo` (`id`, `prsamo_id_estudiante`, `prsamo_id_modulo`, `prsamo_puntaje`, `created_at`, `updated_at`) VALUES
(3, 22, 2, 61, NULL, NULL),
(4, 22, 8, 58, NULL, NULL),
(5, 41, 2, 56, NULL, NULL),
(6, 41, 8, 52, NULL, NULL);

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

--
-- Volcado de datos para la tabla `prueba_saber_pro`
--

INSERT INTO `prueba_saber_pro` (`id`, `prsapr_year`, `prsapr_periodo`, `prsapr_id_estudiante`, `prsapr_numero_registro`, `prsapr_grupo_referencia`, `prsapr_puntaje_global`, `prsapr_percentil_nacional`, `prsapr_percentil_grupo`, `prsapr_novedad`, `created_at`, `updated_at`) VALUES
(2, 2020, '2', 171, 'EK202030349522', 'Ingenieria y carreras a fines', 152, 56, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2020, '2', 172, 'EK202032327641', 'Ingenieria y carreras a fines', 153, 56, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2020, '2', 173, 'EK202030092262', 'Ingenieria y carreras a fines', 128, 21, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2020, '2', 174, 'EK202031844968', 'Ingenieria y carreras a fines', 147, 48, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2020, '2', 175, 'EK202032384154', 'Ingenieria y carreras a fines', 127, 20, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2020, '2', 176, 'EK202032428191', 'Ingenieria y carreras a fines', 136, 32, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2020, '2', 177, 'EK202032351658', 'Ingenieria y carreras a fines', 95, 2, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2020, '2', 178, 'EK202031392588', 'Ingenieria y carreras a fines', 189, 94, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2020, '2', 179, 'EK202031787084', 'Ingenieria y carreras a fines', 157, 63, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2020, '2', 180, 'EK202031620483', 'Ingenieria y carreras a fines', 152, 54, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2020, '2', 181, 'EK202032952810', 'Ingenieria y carreras a fines', 147, 47, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2020, '2', 182, 'EK202032360915', 'Ingenieria y carreras a fines', 137, 32, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2020, '2', 183, 'EK202032768737', 'Ingenieria y carreras a fines', 139, 36, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2020, '2', 184, 'EK202032264372', 'Ingenieria y carreras a fines', 148, 49, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2020, '2', 185, 'EK202032973824', 'Ingenieria y carreras a fines', 151, 53, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2020, '2', 186, 'EK202030279539', 'Ingenieria y carreras a fines', 160, 67, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2020, '2', 187, 'EK202031289040', 'Ingenieria y carreras a fines', 179, 88, 0, 'sin novedades', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_saber_pro_modulo`
--

CREATE TABLE `prueba_saber_pro_modulo` (
  `id` int NOT NULL,
  `prsaprmo_id_estudiante` int NOT NULL,
  `prsaprmo_id_modulo` int NOT NULL,
  `prsaprmo_puntaje` int NOT NULL,
  `prsaprmo_nivel_desempeno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prsaprmo_percentil_nacional` int NOT NULL,
  `prsaprmo_percentil_grupo` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prueba_saber_pro_modulo`
--

INSERT INTO `prueba_saber_pro_modulo` (`id`, `prsaprmo_id_estudiante`, `prsaprmo_id_modulo`, `prsaprmo_puntaje`, `prsaprmo_nivel_desempeno`, `prsaprmo_percentil_nacional`, `prsaprmo_percentil_grupo`, `created_at`, `updated_at`) VALUES
(11, 171, 3, 157, '3', 45, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 171, 4, 145, '2', 47, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 171, 5, 156, '2', 55, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 171, 6, 141, '2', 34, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 171, 7, 163, 'A2', 61, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 172, 3, 182, '3', 90, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 172, 4, 168, '3', 73, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 172, 5, 147, '2', 44, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 172, 6, 126, '2', 20, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 172, 7, 140, 'A1', 35, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 173, 3, 89, '1', 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 173, 4, 142, '2', 43, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 173, 5, 139, '2', 35, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 173, 6, 133, '2', 27, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 173, 7, 136, 'A1', 30, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 174, 3, 181, '3', 90, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 174, 4, 120, '1', 21, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 174, 5, 153, '2', 52, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 174, 6, 136, '2', 29, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 174, 7, 146, 'A2', 42, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 175, 3, 159, '3', 69, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 175, 4, 124, '1', 24, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 175, 5, 129, '2', 24, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 175, 6, 92, '1', 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 175, 7, 132, 'A1', 24, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 176, 3, 135, '2', 48, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 176, 4, 140, '2', 40, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 176, 5, 141, '2', 38, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 176, 6, 125, '2', 20, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 176, 7, 140, 'A1', 35, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 177, 3, 0, '0', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 177, 4, 111, '1', 14, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 177, 5, 126, '2', 21, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 177, 6, 119, '1', 15, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 177, 7, 117, 'A1', 10, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 178, 3, 176, '3', 85, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 178, 4, 199, '3', 94, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 178, 5, 174, '3', 77, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 178, 6, 192, '3', 91, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 178, 7, 202, 'B2', 92, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 179, 3, 163, '3', 73, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 179, 4, 184, '3', 87, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 179, 5, 145, '2', 42, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 179, 6, 136, '2', 29, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 179, 7, 159, 'A2', 57, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 180, 3, 153, '3', 64, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 180, 4, 174, '3', 79, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 180, 5, 155, '2', 55, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 180, 6, 100, '1', 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 180, 7, 176, 'B1', 79, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 181, 3, 159, '3', 69, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 181, 4, 156, '3', 60, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 181, 5, 107, '1', 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 181, 6, 151, '2', 46, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 181, 7, 161, 'A2', 59, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 182, 3, 120, '2', 19, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 182, 4, 143, '2', 45, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 182, 5, 126, '2', 21, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 182, 6, 133, '2', 27, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 182, 7, 161, 'A2', 58, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 183, 3, 95, '1', 8, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 183, 4, 130, '2', 30, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 183, 5, 137, '3', 63, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 183, 6, 164, '2', 33, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 183, 7, 161, 'B1', 73, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 184, 3, 135, '2', 48, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 184, 4, 137, '2', 37, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 184, 5, 140, '2', 36, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 184, 6, 154, '2', 50, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 184, 7, 175, 'B1', 73, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 185, 3, 92, '1', 6, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 185, 4, 197, '3', 88, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 185, 5, 143, '2', 39, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 185, 6, 149, '2', 44, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 185, 7, 174, 'B1', 72, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 186, 3, 162, '3', 72, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 186, 4, 143, '2', 44, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 186, 5, 156, '2', 55, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 186, 6, 167, '3', 67, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 186, 7, 174, 'B1', 73, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 187, 3, 188, '4', 94, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 187, 4, 180, '3', 84, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 187, 5, 181, '3', 84, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 187, 6, 174, '3', 75, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 187, 7, 171, '', 0, 70, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Volcado de datos para la tabla `software`
--

INSERT INTO `software` (`id`, `sof_tipo`, `sof_nombre`, `sof_desarrollador`, `sof_version`, `sof_no_licencia`, `sof_year_ad_licencia`, `sof_year_ve_licencia`, `sof_asignatura`, `sof_cantidad`, `sof_id_programa`, `sof_valor_unitario`, `sof_valor_total`, `sof_fecha_actualizar`, `sof_fecha_instalacion`, `created_at`, `updated_at`) VALUES
(1, 'libre', 'VS CODE / VIRTUAL BOX / X CODE - ULTIMA VERSIÓN', 'NN', 'ULTIMA', 'NN', '2022', '2024', 'PROGRAMACION ii', 3, 'Ingeniería de Sistemas', 0, 0, '2022-04-22', '2022-04-22', '2022-04-22 10:16:53', '2022-04-22 10:16:53'),
(2, 'libre', 'tinkercard / freecad 0.18 / inskcape', 'nn', 'ultima versión', 'nn', '2022', '2024', 'DISEÑO ASISTIDO POR COMPUTADOR', 3, 'Ingeniería de Sistemas', 0, 0, '2022-04-22', '2022-04-22', '2022-04-22 10:18:09', '2022-04-22 10:18:09'),
(3, 'pago', 'excel con complementos de solver - paquete office', 'microsoft', 'ultima', 'nn', '2022', '2023', 'ANÁLISIS DE ALGORITMOS;INVESTIGACION DE OPERACIONES II', 10, 'Ingeniería de Sistemas', 0, 0, '2022-04-22', '2022-04-22', '2022-04-22 10:19:43', '2022-04-22 10:19:43'),
(4, 'libre', 'dfd / wam server/ xamp server / mysql / apache / argo uml / vs code / workbench / php', 'nn', 'ultima', 'nn', '2022', '2023', 'FUNDAMENTOS DE PROGRAMACIÓN', 10, 'Ingeniería de Sistemas', 0, 0, '2022-04-22', '2022-04-22', '2022-04-22 10:21:18', '2022-04-22 10:21:18');

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

--
-- Volcado de datos para la tabla `software_recurso_tecnologico`
--

INSERT INTO `software_recurso_tecnologico` (`id`, `sofrete_year`, `sofrete_periodo`, `sofrete_tipo_recurso`, `sofrete_id_docente`, `sofrete_id_asignatura`, `created_at`, `updated_at`) VALUES
(1, 2022, '2022-1', 'plataforma-agora', 39, 28, '2022-04-22 11:21:20', '2022-04-22 11:21:20'),
(2, 2022, '2022-1', 'software', 34, 40, '2022-04-22 11:21:44', '2022-04-22 11:21:44'),
(3, 2022, '2022-1', 'software', 32, 7, '2022-04-22 11:22:01', '2022-04-22 11:22:01'),
(4, 2022, '1', 'plataforma-agora', 30, 39, '2022-04-22 22:09:03', '2022-04-22 22:09:03');

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

--
-- Volcado de datos para la tabla `tipo_modulo`
--

INSERT INTO `tipo_modulo` (`id`, `tipo_modulo_nombre`, `tipo_modulo_id_prueba`, `created_at`, `updated_at`) VALUES
(2, 'Lectura crítica', 1, '2022-04-22 03:31:59', '2022-04-22 03:31:59'),
(3, 'Comunicación escrita', 2, '2022-04-22 10:23:24', '2022-04-22 10:23:24'),
(4, 'Razonamiento cuantitativo', 2, '2022-04-22 10:23:32', '2022-04-22 10:23:32'),
(5, 'Lectura critica', 2, '2022-04-22 10:23:37', '2022-04-22 10:23:37'),
(6, 'Competencias ciudadanas', 2, '2022-04-22 10:23:43', '2022-04-22 10:23:43'),
(7, 'Ingles', 2, '2022-04-22 10:23:50', '2022-04-22 10:23:50'),
(8, 'Ingles', 1, '2022-04-22 19:50:47', '2022-04-22 19:50:47');

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

--
-- Volcado de datos para la tabla `tipo_prueba`
--

INSERT INTO `tipo_prueba` (`id`, `tipo_prueba_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Prueba 11', NULL, NULL),
(2, 'Prueba saber PRO', NULL, NULL);

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
(4, 'Auxiliar o Administrativo', '2022-03-17 15:41:37', NULL),
(6, 'Estudiante', '2022-03-17 15:41:54', NULL),
(9, 'Administrador estudiante', NULL, NULL),
(10, 'Administrador docente', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo_grado`
--

CREATE TABLE `trabajo_grado` (
  `id` int NOT NULL,
  `tra_codigo_proyecto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_titulo_proyecto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_id_estudiante` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_fecha_inicio` date NOT NULL,
  `tra_modalidad_grado` int NOT NULL,
  `tra_id_empresa` int DEFAULT NULL,
  `tra_cargo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Volcado de datos para la tabla `trabajo_grado`
--

INSERT INTO `trabajo_grado` (`id`, `tra_codigo_proyecto`, `tra_titulo_proyecto`, `tra_id_estudiante`, `tra_fecha_inicio`, `tra_modalidad_grado`, `tra_id_empresa`, `tra_cargo`, `tra_id_director`, `tra_id_codirector`, `tra_id_externo`, `tra_estado_propuesta`, `tra_estado_proyecto`, `tra_id_jurado1`, `tra_id_jurado2`, `tra_numero_acta_sustentacion`, `tra_acta_sustentacion_soporte`, `tra_numero_acta_grado`, `tra_acta_grado_soporte`, `tra_fecha_finalizacion`, `tra_observacion`, `tra_id_proceso`, `created_at`, `updated_at`) VALUES
(9, '01010101', 'Plataforma web para la gestión de la información y control de gestión de proceso administrativos del programa ingenieria de sistemas Unisangil Sede Yopal', 'Michael Rodríguez;ANDRES CAMILO SANTOS OCHOA;Juan Daniel Dueñas Castiblanco', '2021-03-03', 17, NULL, NULL, 23, 40, NULL, 'aprobada', 'aprobado-jurados', 36, 40, '011', NULL, '011', NULL, '2022-04-26', NULL, 6, '2022-04-24 08:11:24', '2022-04-24 08:12:35'),
(10, '30', 'DISEÑO E IMPLEMENTACIÓN DE UN SITIO WEB PARA LA EMPRESA MIKONSTRUCCIONES SAS', 'José Luis Madrid Angel', '2019-02-02', 17, NULL, NULL, 36, 152, NULL, 'aprobada', 'sustentado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2022-04-24 10:31:15', '2022-04-24 10:36:01'),
(11, '32', 'PRÁCTICA EMPRESARIAL ALCALDÍA YOPAL', 'Camilo Alberto Chaparro González', '2020-02-02', 10, 3, 'nn', 23, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-04-24 10:32:28', '2022-04-24 10:32:28'),
(12, '46', 'DISEÑO E IMPLEMENTACIÓN DE MÓDULOS PARA LA RECOLECCIÓN DE VARIABLES DE FLUJO VEHICULAR, MÉDICAS Y FORENSES RELACIONADAS CON LOS ACCIDENTES DE TRÁNSITO EN EL MARCO DEL PROYECTO DE INVESTIGACIÓN “MODELO DE ANÁLISIS CORRELACIONAL PARA LA IDENTIFICACIÓN DE PATRONES ASOCIADOS A LOS ACCIDENTES DE TRÁNSITO DE YOPAL.', 'Gerson Castillo Hernandez', '2019-02-02', 17, NULL, NULL, 23, 40, NULL, 'aprobada', 'sustentado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2022-04-24 10:35:21', '2022-04-24 10:36:21'),
(13, '18', 'PRACTICA DESARROLLO PROFESIONAL', 'OSCAR DANILO SANABRIA SOGAMOSO', '2022-02-02', 10, 4, 'PROGRAMA CASANARE JOVEN', 23, 189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-04-24 14:02:44', '2022-04-24 14:02:44'),
(14, '19', 'PRACTICA DESARROLLO PROFESIONAL', 'CRISTIAN HERNEY SANCHEZ SALAMANCA', '2022-02-02', 10, 4, 'PROGRAMA CASANARE JOVEN', 23, 189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-04-24 14:03:36', '2022-04-24 14:03:36'),
(15, '20', 'PRACTICA DESARROLLO PROFESIONAL', 'KAREN YINETH SANCHEZ PEREZ', '2022-02-02', 10, 3, 'PROGRAMA ESTADO JOVEN', 23, 189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-04-24 14:04:15', '2022-04-24 14:04:15');

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
-- Indices de la tabla `compl_area_plan`
--
ALTER TABLE `compl_area_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_compl_area_plan_compl_componente_plan` (`coarpl_id_componente`);

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
-- Indices de la tabla `compl_componente_plan`
--
ALTER TABLE `compl_componente_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compl_empresa`
--
ALTER TABLE `compl_empresa`
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
  ADD KEY `FK_programa_plan_estudio_asignatura_municipio` (`asig_id_sede`),
  ADD KEY `FK_programa_plan_estudio_asignatura_compl_componente_plan` (`asig_id_componente`),
  ADD KEY `FK_programa_plan_estudio_asignatura_compl_area_plan` (`asig_id_area`);

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
  ADD KEY `FK_trabajo_grado_persona_5` (`tra_id_jurado2`),
  ADD KEY `FK_trabajo_grado_compl_empresa` (`tra_id_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bienestar_institucional`
--
ALTER TABLE `bienestar_institucional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compl_area_extension`
--
ALTER TABLE `compl_area_extension`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compl_area_plan`
--
ALTER TABLE `compl_area_plan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compl_area_trabajo`
--
ALTER TABLE `compl_area_trabajo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compl_componente_plan`
--
ALTER TABLE `compl_componente_plan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compl_empresa`
--
ALTER TABLE `compl_empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `docente_asignatura`
--
ALTER TABLE `docente_asignatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente_contrato`
--
ALTER TABLE `docente_contrato`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docente_evaluacion`
--
ALTER TABLE `docente_evaluacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `docente_visitante`
--
ALTER TABLE `docente_visitante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `estudiante_egresado`
--
ALTER TABLE `estudiante_egresado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante_reporte_general`
--
ALTER TABLE `estudiante_reporte_general`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_actividad_cultural`
--
ALTER TABLE `ext_actividad_cultural`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ext_consultoria`
--
ALTER TABLE `ext_consultoria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_curso`
--
ALTER TABLE `ext_curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ext_educacion_continua`
--
ALTER TABLE `ext_educacion_continua`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `ext_eventos_nac_inter`
--
ALTER TABLE `ext_eventos_nac_inter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ext_eventos_virtuales`
--
ALTER TABLE `ext_eventos_virtuales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ext_internacionalizacion_curriculo`
--
ALTER TABLE `ext_internacionalizacion_curriculo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ext_movilidad_internacional`
--
ALTER TABLE `ext_movilidad_internacional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ext_movilidad_intersede`
--
ALTER TABLE `ext_movilidad_intersede`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ext_movilidad_nacional`
--
ALTER TABLE `ext_movilidad_nacional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ext_participacion_eventos`
--
ALTER TABLE `ext_participacion_eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ext_participante`
--
ALTER TABLE `ext_participante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ext_proyecto_extension`
--
ALTER TABLE `ext_proyecto_extension`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ext_registro_fotografico_inter`
--
ALTER TABLE `ext_registro_fotografico_inter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_grupo_investigacion`
--
ALTER TABLE `inv_grupo_investigacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inv_investigador`
--
ALTER TABLE `inv_investigador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inv_proyecto`
--
ALTER TABLE `inv_proyecto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `modalidad_grado`
--
ALTER TABLE `modalidad_grado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `programa_asignatura_horario`
--
ALTER TABLE `programa_asignatura_horario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `programa_plan_estudio`
--
ALTER TABLE `programa_plan_estudio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `programa_plan_estudio_asignatura`
--
ALTER TABLE `programa_plan_estudio_asignatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `prueba_resultado_programa`
--
ALTER TABLE `prueba_resultado_programa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prueba_resultado_programa_modulo`
--
ALTER TABLE `prueba_resultado_programa_modulo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `prueba_saber`
--
ALTER TABLE `prueba_saber`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prueba_saber_modulo`
--
ALTER TABLE `prueba_saber_modulo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prueba_saber_pro`
--
ALTER TABLE `prueba_saber_pro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `prueba_saber_pro_modulo`
--
ALTER TABLE `prueba_saber_pro_modulo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `red_academica`
--
ALTER TABLE `red_academica`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `software_recurso_tecnologico`
--
ALTER TABLE `software_recurso_tecnologico`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_modulo`
--
ALTER TABLE `tipo_modulo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_prueba`
--
ALTER TABLE `tipo_prueba`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trabajo_grado`
--
ALTER TABLE `trabajo_grado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compl_area_plan`
--
ALTER TABLE `compl_area_plan`
  ADD CONSTRAINT `FK_compl_area_plan_compl_componente_plan` FOREIGN KEY (`coarpl_id_componente`) REFERENCES `compl_componente_plan` (`id`);

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
  ADD CONSTRAINT `FK_programa_plan_estudio_asignatura_compl_area_plan` FOREIGN KEY (`asig_id_area`) REFERENCES `compl_area_plan` (`id`),
  ADD CONSTRAINT `FK_programa_plan_estudio_asignatura_compl_componente_plan` FOREIGN KEY (`asig_id_componente`) REFERENCES `compl_componente_plan` (`id`),
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
  ADD CONSTRAINT `FK_prueba_saber_pro_persona` FOREIGN KEY (`prsapr_id_estudiante`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `prueba_saber_pro_modulo`
--
ALTER TABLE `prueba_saber_pro_modulo`
  ADD CONSTRAINT `FK_prueba_saber_pro_modulo_persona` FOREIGN KEY (`prsaprmo_id_estudiante`) REFERENCES `persona` (`id`),
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
  ADD CONSTRAINT `FK_trabajo_grado_compl_empresa` FOREIGN KEY (`tra_id_empresa`) REFERENCES `compl_empresa` (`id`),
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
