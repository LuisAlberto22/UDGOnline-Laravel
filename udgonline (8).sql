-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2021 at 11:06 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udgonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
CREATE TABLE IF NOT EXISTS `clases` (
  `NRC` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cupo_minimo` tinyint(2) NOT NULL,
  `cupo_maximo` tinyint(2) NOT NULL,
  `maestro` int(11) NOT NULL,
  `materia` varchar(10) NOT NULL,
  `link` varchar(120) NOT NULL,
  `imagen` json DEFAULT NULL,
  PRIMARY KEY (`NRC`),
  KEY `materia` (`materia`),
  KEY `maestro` (`maestro`),
  KEY `link` (`link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clases_registradas`
--

DROP TABLE IF EXISTS `clases_registradas`;
CREATE TABLE IF NOT EXISTS `clases_registradas` (
  `NRC` int(6) NOT NULL,
  `calificacion` float DEFAULT '0',
  `codigo` int(11) NOT NULL,
  UNIQUE KEY `NRC` (`NRC`,`codigo`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comentario_tareas`
--

DROP TABLE IF EXISTS `comentario_tareas`;
CREATE TABLE IF NOT EXISTS `comentario_tareas` (
  `cod_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_respuesta` int(11) NOT NULL,
  `texto` varchar(240) NOT NULL,
  `dia` tinyint(2) NOT NULL,
  `mes` tinyint(2) NOT NULL,
  `ano` smallint(4) NOT NULL,
  `hora` time NOT NULL,
  `usuario` int(11) NOT NULL,
  `cod_tarea` int(11) NOT NULL,
  PRIMARY KEY (`cod_comentario`),
  KEY `cod_respuesta` (`cod_respuesta`),
  KEY `usuario` (`usuario`),
  KEY `cod_tarea` (`cod_tarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comentario_video`
--

DROP TABLE IF EXISTS `comentario_video`;
CREATE TABLE IF NOT EXISTS `comentario_video` (
  `cod_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_respuesta` int(11) NOT NULL,
  `texto` varchar(240) NOT NULL,
  `dia` tinyint(2) NOT NULL,
  `mes` tinyint(2) NOT NULL,
  `ano` smallint(4) NOT NULL,
  `hora` time NOT NULL,
  `usuario` int(11) NOT NULL,
  `cod_video` int(11) NOT NULL,
  `tiempo` time NOT NULL,
  PRIMARY KEY (`cod_comentario`),
  KEY `cod_respuesta` (`cod_respuesta`),
  KEY `cod_tarea` (`cod_video`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `link` char(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tamano` int(10) NOT NULL,
  `post` int(11) NOT NULL,
  `tareas` int(11) NOT NULL,
  `tareas_asignadas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post` (`post`),
  KEY `tareas_asignadas` (`tareas_asignadas`),
  KEY `tareas` (`tareas`),
  KEY `tareas_asignadas_2` (`tareas_asignadas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `dia` varchar(20) NOT NULL,
  `hora` time NOT NULL,
  `NRC` int(6) NOT NULL,
  KEY `NRC` (`NRC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lista_de_reproducion`
--

DROP TABLE IF EXISTS `lista_de_reproducion`;
CREATE TABLE IF NOT EXISTS `lista_de_reproducion` (
  `codigo_lista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(240) NOT NULL,
  `cantidad_de_videos` int(11) NOT NULL,
  `visibilidad` int(11) NOT NULL,
  `id_clase` int(6) NOT NULL,
  PRIMARY KEY (`codigo_lista`),
  KEY `visibilidad` (`visibilidad`),
  KEY `id_clase` (`id_clase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destinatario` int(11) NOT NULL,
  `propietario` int(11) NOT NULL,
  `texto` varchar(240) NOT NULL,
  `fecha` date NOT NULL,
  `visto` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `destinatario` (`destinatario`),
  KEY `propietario` (`propietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto` text NOT NULL,
  `comentarios` int(10) DEFAULT NULL,
  `propietario` int(11) NOT NULL,
  `clase` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `comentarios` (`comentarios`),
  KEY `clase` (`clase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
CREATE TABLE IF NOT EXISTS `tareas` (
  `cod_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `NRC` int(6) NOT NULL,
  `fecha_asignacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_de_entrega` timestamp NULL DEFAULT NULL,
  `fecha_de_la_ultima_modificacion` timestamp NULL DEFAULT NULL,
  `calificacion_maxima` smallint(3) NOT NULL DEFAULT '100',
  `titulo` varchar(120) NOT NULL,
  `descripcion_de_la_tarea` varchar(10000) NOT NULL,
  `TodosLosAlumnos` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cod_tarea`),
  KEY `NRC` (`NRC`),
  KEY `TodosLosAlumnos` (`TodosLosAlumnos`),
  KEY `asingnar` (`NRC`,`TodosLosAlumnos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tareas_asignadas`
--

DROP TABLE IF EXISTS `tareas_asignadas`;
CREATE TABLE IF NOT EXISTS `tareas_asignadas` (
  `cod_tarea` int(11) NOT NULL,
  `clave` int(11) NOT NULL,
  `calificacion` float DEFAULT '0',
  `anotaciones` varchar(120) DEFAULT NULL,
  `id_tareas_subidas` int(11) NOT NULL AUTO_INCREMENT,
  `estado` enum('entregada','atrasada','noEntregada','regresada') DEFAULT 'noEntregada',
  `fecha_de_entrega` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tareas_subidas`),
  KEY `cod_tarea` (`cod_tarea`),
  KEY `clave` (`clave`),
  KEY `estado` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id`, `tipo`) VALUES
(1, 'Alumno'),
(2, 'Maestro');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidop` varchar(40) DEFAULT NULL,
  `apellidom` varchar(40) DEFAULT NULL,
  `carrera` enum('Abogado','Adimistración','Agrobiotecnología','Agronegocios','Contaduría Pública','Enfermería (Nivelacion)','Ingeniería en Computación','Ingeniería Industrial','Ingeniería Informática','Ingeniería Química','Mercadotecnia','Negocios Internacionales','Periodismo','Psicología','Químico Farmacéutico Biólogo','Recursos Humanos','Docente','LICENCIATURA EN INGENIERIA EN COMPUTACION') DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `imagen` json DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidop`, `apellidom`, `carrera`, `tipo`, `imagen`, `updated_at`, `created_at`, `NIP`, `remember_token`) VALUES
(217763768, 'Luis Alberto', 'Garcia', 'Orozco', 'Ingeniería en Computación', 1, NULL, '2021-04-19', '2021-04-19', 'Supergabo12', 'Ld8eaBROuGEIlJuE9NlorP4lWCMDwldhFvMtdmLx85dssnJH7jsRnKCjweCQ');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `link` varchar(240) NOT NULL,
  `fecha` date NOT NULL,
  `duracion` time NOT NULL,
  `descripcion` varchar(360) NOT NULL,
  `lista_de_reproduccion` int(11) NOT NULL,
  `visibilidad` int(11) NOT NULL,
  `resolucion` varchar(9) NOT NULL,
  `NRC` int(11) NOT NULL,
  `Imagen` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`),
  KEY `lista_de_reproduccion` (`lista_de_reproduccion`),
  KEY `visibilidad` (`visibilidad`),
  KEY `NRC` (`NRC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visibilidad`
--

DROP TABLE IF EXISTS `visibilidad`;
CREATE TABLE IF NOT EXISTS `visibilidad` (
  `id` int(11) NOT NULL,
  `nombre` enum('Privado','Publico') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visibilidad`
--

INSERT INTO `visibilidad` (`id`, `nombre`) VALUES
(1, 'Publico');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `maestro` FOREIGN KEY (`maestro`) REFERENCES `users` (`id`);

--
-- Constraints for table `clases_registradas`
--
ALTER TABLE `clases_registradas`
  ADD CONSTRAINT `NRCF` FOREIGN KEY (`NRC`) REFERENCES `clases` (`NRC`),
  ADD CONSTRAINT `codigo` FOREIGN KEY (`codigo`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comentario_tareas`
--
ALTER TABLE `comentario_tareas`
  ADD CONSTRAINT `comentario_tareas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_tareas_ibfk_2` FOREIGN KEY (`cod_tarea`) REFERENCES `tareas` (`cod_tarea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_tareas_ibfk_3` FOREIGN KEY (`cod_respuesta`) REFERENCES `comentario_tareas` (`cod_comentario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comentario_video`
--
ALTER TABLE `comentario_video`
  ADD CONSTRAINT `comentario_video_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_video_ibfk_2` FOREIGN KEY (`cod_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_video_ibfk_3` FOREIGN KEY (`cod_respuesta`) REFERENCES `comentario_video` (`cod_comentario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`tareas`) REFERENCES `tareas` (`cod_tarea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_ibfk_3` FOREIGN KEY (`tareas_asignadas`) REFERENCES `tareas_asignadas` (`id_tareas_subidas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`NRC`) REFERENCES `clases` (`NRC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lista_de_reproducion`
--
ALTER TABLE `lista_de_reproducion`
  ADD CONSTRAINT `ClaseL` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`NRC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_de_reproducion_ibfk_2` FOREIGN KEY (`visibilidad`) REFERENCES `visibilidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`destinatario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`propietario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `clase` FOREIGN KEY (`clase`) REFERENCES `clases` (`NRC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`comentarios`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `NRC` FOREIGN KEY (`NRC`) REFERENCES `clases` (`NRC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tareas_asignadas`
--
ALTER TABLE `tareas_asignadas`
  ADD CONSTRAINT `tareas_asignadas_ibfk_1` FOREIGN KEY (`clave`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tareas_asignadas_ibfk_2` FOREIGN KEY (`cod_tarea`) REFERENCES `tareas` (`cod_tarea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`lista_de_reproduccion`) REFERENCES `lista_de_reproducion` (`codigo_lista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_ibfk_2` FOREIGN KEY (`visibilidad`) REFERENCES `visibilidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
