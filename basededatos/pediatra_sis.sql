-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-07-2023 a las 12:58:09
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pediatra_sis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

DROP TABLE IF EXISTS `antecedentes`;
CREATE TABLE IF NOT EXISTS `antecedentes` (
  `id_antecedentes` int NOT NULL,
  `Identificador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  PRIMARY KEY (`id_antecedentes`),
  KEY `Identificador` (`Identificador`(250)),
  KEY `FK_Antecedentes_Datos_Padres_de_Pacientes` (`Identificador`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado_medico`
--

DROP TABLE IF EXISTS `certificado_medico`;
CREATE TABLE IF NOT EXISTS `certificado_medico` (
  `id_certificado_M` int NOT NULL AUTO_INCREMENT,
  `id_medico` int DEFAULT NULL,
  `id_paciente` int DEFAULT NULL,
  `id_centro` int DEFAULT NULL,
  `diagnostico` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Recomendacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_certificado_M`),
  KEY `FK_Certificado_Medico_Paciente` (`id_paciente`),
  KEY `FK_Certificado_Medico_Medicos` (`id_medico`),
  KEY `FK_Certificado_Medico_Institucion_de_Salud` (`id_centro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `id_cita` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_paciente` int DEFAULT NULL,
  `id_medico` int DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Estado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_cita`),
  KEY `FK_Citas_Paciente` (`id_paciente`),
  KEY `FK_Citas_Medicos` (`id_medico`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

DROP TABLE IF EXISTS `consultas`;
CREATE TABLE IF NOT EXISTS `consultas` (
  `id_consulta` int NOT NULL,
  `id_paciente` int DEFAULT NULL,
  `id_medico` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `diagnostico` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `tratamiento` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_consulta`),
  KEY `FK_Consultas_Paciente` (`id_paciente`),
  KEY `FK_Consultas_Medicos` (`id_medico`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_padres_de_pacientes`
--

DROP TABLE IF EXISTS `datos_padres_de_pacientes`;
CREATE TABLE IF NOT EXISTS `datos_padres_de_pacientes` (
  `Identificador` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Tipo_Identificador` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `ID_Paciente` int DEFAULT NULL,
  `Nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Apellido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Parentesco` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Nacionalidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Sexo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Dirección` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Ocupación` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  KEY `ID_Paciente` (`ID_Paciente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_antecedentes`
--

DROP TABLE IF EXISTS `detalle_antecedentes`;
CREATE TABLE IF NOT EXISTS `detalle_antecedentes` (
  `IDdetalle_ant` int NOT NULL AUTO_INCREMENT,
  `ID_antecedentes` int DEFAULT NULL,
  `id_padecimiento` int DEFAULT NULL,
  PRIMARY KEY (`IDdetalle_ant`),
  KEY `FK_Detalle_Antecedentes_Antecedentes` (`ID_antecedentes`),
  KEY `FK_Detalle_Antecedentes_Padecimientos_Comunes` (`id_padecimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_consulta`
--

DROP TABLE IF EXISTS `detalle_consulta`;
CREATE TABLE IF NOT EXISTS `detalle_consulta` (
  `id_detalle_consulta` int NOT NULL AUTO_INCREMENT,
  `ID_Consulta` int DEFAULT NULL,
  `id_trabajo_medico` int DEFAULT NULL,
  `Observacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_detalle_consulta`),
  KEY `FK_Detalle_Consulta_Consultas` (`ID_Consulta`),
  KEY `FK_Detalle_Consulta_Trabajos_Medicos` (`id_trabajo_medico`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_historia_clinica`
--

DROP TABLE IF EXISTS `detalle_historia_clinica`;
CREATE TABLE IF NOT EXISTS `detalle_historia_clinica` (
  `IDdetalle_HC` int NOT NULL AUTO_INCREMENT,
  `ID_Hist_Clic` int DEFAULT NULL,
  `id_padecimiento` int DEFAULT NULL,
  `notas` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `desde_cuando` date NOT NULL,
  PRIMARY KEY (`IDdetalle_HC`),
  KEY `FK_Detalle_Historia_Clinica_Historia_Clinica` (`ID_Hist_Clic`),
  KEY `FK_Detalle_Historia_Clinica_Padecimientos_Comunes` (`id_padecimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_prescripcion`
--

DROP TABLE IF EXISTS `detalle_prescripcion`;
CREATE TABLE IF NOT EXISTS `detalle_prescripcion` (
  `ID_det_receta` int NOT NULL,
  `id_receta` int DEFAULT NULL,
  `id_medicamento` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `unidad_de_medida` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `frecuencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Tiempo_de_uso` int DEFAULT NULL,
  PRIMARY KEY (`ID_det_receta`),
  KEY `FK_Detalle_Prescripcion_Prescripcion_Medica` (`id_receta`),
  KEY `FK_Detalle_Prescripcion_Medicamento` (`id_medicamento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE IF NOT EXISTS `especialidad` (
  `id_especialidad` int NOT NULL,
  `especialidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_nutricional`
--

DROP TABLE IF EXISTS `estado_nutricional`;
CREATE TABLE IF NOT EXISTS `estado_nutricional` (
  `id_EN` int NOT NULL,
  `id_consulta` int DEFAULT NULL,
  `Estatura` int DEFAULT NULL,
  `Edad` int DEFAULT NULL,
  `peso` int DEFAULT NULL,
  `Estado_nutricional` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_EN`),
  KEY `FK_Estado_nutricional_Consultas` (`id_consulta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

DROP TABLE IF EXISTS `historia_clinica`;
CREATE TABLE IF NOT EXISTS `historia_clinica` (
  `ID_Hist_Clic` int NOT NULL,
  `ID_Paciente` int DEFAULT NULL,
  PRIMARY KEY (`ID_Hist_Clic`),
  KEY `ID_Paciente` (`ID_Paciente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int NOT NULL,
  `id_medico` int DEFAULT NULL,
  `dias` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `etiqueta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `Estado` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_horario`),
  KEY `FK_Horario_Medicos` (`id_medico`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_de_salud`
--

DROP TABLE IF EXISTS `institucion_de_salud`;
CREATE TABLE IF NOT EXISTS `institucion_de_salud` (
  `id_centro` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `telefono` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_centro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE IF NOT EXISTS `laboratorio` (
  `id_laboratorio` int NOT NULL,
  `nombre_laboratorio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_laboratorio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizador_medico`
--

DROP TABLE IF EXISTS `localizador_medico`;
CREATE TABLE IF NOT EXISTS `localizador_medico` (
  `ID_Localizador_M` int NOT NULL,
  `id_medico` int DEFAULT NULL,
  `Valor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Etiqueta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`ID_Localizador_M`),
  KEY `FK_Localizador_Medico_Medicos` (`id_medico`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizador_padres_de_pacientes`
--

DROP TABLE IF EXISTS `localizador_padres_de_pacientes`;
CREATE TABLE IF NOT EXISTS `localizador_padres_de_pacientes` (
  `ID_Localizador` int NOT NULL,
  `Identificador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Valor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Etiqueta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Localizador`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
CREATE TABLE IF NOT EXISTS `medicamento` (
  `Id_medicamento` int NOT NULL,
  `nombre_medicamento` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `formato` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `Cantidad_total` int DEFAULT NULL,
  PRIMARY KEY (`Id_medicamento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `id_medico` int NOT NULL,
  `cédula` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `exequátur` int DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `apellido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `id_especialidad` int DEFAULT NULL,
  PRIMARY KEY (`id_medico`),
  KEY `FK_Medicos_Especialidad` (`id_especialidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `apellido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `sexo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_adicionales` int DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_vacunas`
--

DROP TABLE IF EXISTS `pacientes_vacunas`;
CREATE TABLE IF NOT EXISTS `pacientes_vacunas` (
  `id_vacuna_p` int NOT NULL,
  `id_paciente` int DEFAULT NULL,
  `id_vacuna` int DEFAULT NULL,
  `dosis` int DEFAULT NULL,
  `refuerzo` int DEFAULT NULL,
  PRIMARY KEY (`id_vacuna_p`),
  KEY `FK_Pacientes_Vacunas_Paciente` (`id_paciente`),
  KEY `FK_Pacientes_Vacunas_Tipo_Vacunas` (`id_vacuna`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_analitica`
--

DROP TABLE IF EXISTS `paciente_analitica`;
CREATE TABLE IF NOT EXISTS `paciente_analitica` (
  `id_estudio_analitica` int NOT NULL,
  `id_laboratorio` int DEFAULT NULL,
  `nombre_estudio_analitica` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_consulta` int DEFAULT NULL,
  `id_centro` int DEFAULT NULL,
  PRIMARY KEY (`id_estudio_analitica`),
  KEY `FK_Paciente_Analitica_Laboratorio` (`id_laboratorio`),
  KEY `FK_Paciente_Analitica_Consultas` (`id_consulta`),
  KEY `FK_Paciente_Analitica_Institucion_de_Salud` (`id_centro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padecimientos_comunes`
--

DROP TABLE IF EXISTS `padecimientos_comunes`;
CREATE TABLE IF NOT EXISTS `padecimientos_comunes` (
  `id_padecimiento` int NOT NULL AUTO_INCREMENT,
  `nombre_padecimiento` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `descripción` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_padecimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perinatal`
--

DROP TABLE IF EXISTS `perinatal`;
CREATE TABLE IF NOT EXISTS `perinatal` (
  `id_perinatal` int NOT NULL,
  `Identificador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Lugar_parto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `peso_nacer` int DEFAULT NULL,
  `id_padecimiento` int DEFAULT NULL,
  PRIMARY KEY (`id_perinatal`),
  KEY `FK_Perinatal_Datos_Padres_de_Pacientes` (`Identificador`(250)),
  KEY `FK_Perinatal_Padecimientos_Comunes` (`id_padecimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prescripcion_medica`
--

DROP TABLE IF EXISTS `prescripcion_medica`;
CREATE TABLE IF NOT EXISTS `prescripcion_medica` (
  `id_receta` int NOT NULL AUTO_INCREMENT,
  `id_consulta` int DEFAULT NULL,
  `id_centro` int DEFAULT NULL,
  PRIMARY KEY (`id_receta`),
  KEY `FK_Prescripcion_Medica_Consultas` (`id_consulta`),
  KEY `FK_Prescripcion_Medica_Institucion_de_Salud` (`id_centro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referimientos`
--

DROP TABLE IF EXISTS `referimientos`;
CREATE TABLE IF NOT EXISTS `referimientos` (
  `ID_Referimiento` int NOT NULL,
  `id_consulta` int DEFAULT NULL,
  `medico_referido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Fecha_Referimiento` date DEFAULT NULL,
  `Motivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `id_centro` int DEFAULT NULL,
  PRIMARY KEY (`ID_Referimiento`),
  KEY `FK_Referimientos_Consultas` (`id_consulta`),
  KEY `FK_Referimientos_Institucion_de_Salud` (`id_centro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro`
--

DROP TABLE IF EXISTS `seguro`;
CREATE TABLE IF NOT EXISTS `seguro` (
  `Id_seguro_salud` int NOT NULL,
  `Nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`Id_seguro_salud`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro_paciente`
--

DROP TABLE IF EXISTS `seguro_paciente`;
CREATE TABLE IF NOT EXISTS `seguro_paciente` (
  `NSS` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `id_paciente` int DEFAULT NULL,
  `Id_seguro_salud` int DEFAULT NULL,
  KEY `FK_Seguro_Paciente_Paciente` (`id_paciente`),
  KEY `FK_Seguro_Paciente_Seguro` (`Id_seguro_salud`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vacunas`
--

DROP TABLE IF EXISTS `tipo_vacunas`;
CREATE TABLE IF NOT EXISTS `tipo_vacunas` (
  `id_vacuna` int NOT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `total_dosis` int DEFAULT NULL,
  PRIMARY KEY (`id_vacuna`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos_medicos`
--

DROP TABLE IF EXISTS `trabajos_medicos`;
CREATE TABLE IF NOT EXISTS `trabajos_medicos` (
  `id_trabajo_medico` int NOT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `id_medico` int DEFAULT NULL,
  `descripcion_trabajo_medico` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  PRIMARY KEY (`id_trabajo_medico`),
  KEY `FK_Trabajos_Medicos_Medicos` (`id_medico`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `Pass1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Confirm_pass` varchar(50) CHARACTER SET utf32 COLLATE utf32_spanish2_ci NOT NULL,
  `estado` varchar(9) NOT NULL,
  `nombre_completo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `Pass1`, `Confirm_pass`, `estado`, `nombre_completo`, `rol`) VALUES
(1, 'Admin', '123', '123', 'activo', 'Joel Rosario', 'Administrador'),
(2, 'Admin2', '1234', '1234', 'activo', 'Luis Sanchez', 'Administrador'),
(3, 'usuario1', '123', '123', 'activo', 'Nombre Usuario 1', 'Secretaría'),
(4, 'usuario2', '12345', '12345', 'activo', 'Nombre Usuario 2', 'Doctor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
