-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-08-2019 a las 21:04:31
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ebook`
--
DROP DATABASE IF EXISTS `ebook`;
CREATE DATABASE IF NOT EXISTS `ebook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ebook`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_actualizar_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_libro` (IN `titulo` VARCHAR(100), IN `autor` VARCHAR(100), IN `editorial` VARCHAR(100), IN `publicacion` VARCHAR(100), IN `materia` INT, IN `url` VARCHAR(100), IN `id` INT)  NO SQL
BEGIN

UPDATE tbl_libros SET tbl_libros.libro = titulo, tbl_libros.autor = autor, tbl_libros.editorial = editorial, tbl_libros.publicacion = publicacion, tbl_libros.cod_materia = materia, tbl_libros.url = url WHERE tbl_libros.cod_libro = id;

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_actualizar_pass`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_pass` (IN `pass` VARCHAR(10), IN `user` VARCHAR(10))  NO SQL
BEGIN

UPDATE tbl_users SET tbl_users.pass = pass, tbl_users.registro = 1  WHERE usuario = user;

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_actualizar_tdg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_tdg` (IN `titulo` VARCHAR(100), IN `autor` VARCHAR(100), IN `tutor` VARCHAR(100), IN `publicacion` VARCHAR(100), IN `url` VARCHAR(100), IN `id` INT)  NO SQL
BEGIN

UPDATE tbl_tdg SET tbl_tdg.tdg = titulo, tbl_tdg.alumno = autor, tbl_tdg.tutor = tutor, tbl_tdg.fecha = publicacion, tbl_tdg.url = url WHERE tbl_tdg.cod_tdg = id;

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_aprobar_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_aprobar_libro` (IN `id` INT)  NO SQL
BEGIN

UPDATE tbl_libros SET tbl_libros.aceptado = 1 WHERE tbl_libros.cod_libro = id;

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_consultar_full_tbl_materias`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_full_tbl_materias` ()  NO SQL
SELECT * FROM tbl_materias$$

DROP PROCEDURE IF EXISTS `sp_consultar_info_user`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_info_user` (IN `name` VARCHAR(100))  NO SQL
SELECT * FROM tbl_users WHERE name = tbl_users.usuario$$

DROP PROCEDURE IF EXISTS `sp_consultar_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_libro` (IN `id` INT)  NO SQL
SELECT * FROM tbl_libros WHERE tbl_libros.cod_libro = id$$

DROP PROCEDURE IF EXISTS `sp_consultar_libros_materias`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_libros_materias` (IN `materia` INT)  NO SQL
SELECT * FROM tbl_libros
INNER JOIN tbl_materias ON tbl_libros.cod_materia = tbl_materias.cod_materia
INNER JOIN tbl_semestres ON tbl_materias.cod_semestre = tbl_semestres.cod_semestre
WHERE materia = tbl_libros.cod_materia$$

DROP PROCEDURE IF EXISTS `sp_consultar_libros_semestres`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_libros_semestres` (IN `semestre` INT)  NO SQL
SELECT * FROM tbl_libros
INNER JOIN tbl_materias ON tbl_libros.cod_materia = tbl_materias.cod_materia
INNER JOIN tbl_semestres ON tbl_materias.cod_semestre = tbl_semestres.cod_semestre
WHERE semestre = tbl_semestres.cod_semestre$$

DROP PROCEDURE IF EXISTS `sp_consultar_libros_total`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_libros_total` ()  NO SQL
SELECT * FROM tbl_libros
INNER JOIN tbl_materias ON tbl_libros.cod_materia = tbl_materias.cod_materia
INNER JOIN tbl_semestres ON tbl_materias.cod_semestre = tbl_semestres.cod_semestre$$

DROP PROCEDURE IF EXISTS `sp_consultar_num_libros`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_num_libros` ()  NO SQL
SELECT COUNT(*) FROM tbl_libros$$

DROP PROCEDURE IF EXISTS `sp_consultar_num_libros_pendientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_num_libros_pendientes` ()  NO SQL
SELECT COUNT(*) FROM tbl_libros WHERE tbl_libros.aceptado = 0$$

DROP PROCEDURE IF EXISTS `sp_consultar_num_tdg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_num_tdg` ()  NO SQL
SELECT COUNT(*) FROM tbl_tdg$$

DROP PROCEDURE IF EXISTS `sp_consultar_tbl_semestres`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_tbl_semestres` ()  NO SQL
SELECT * FROM tbl_semestres$$

DROP PROCEDURE IF EXISTS `sp_consultar_tdg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_tdg` (IN `id` INT)  NO SQL
SELECT * FROM tbl_tdg WHERE tbl_tdg.cod_tdg = id$$

DROP PROCEDURE IF EXISTS `sp_consultar_tdg_total`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_tdg_total` ()  NO SQL
SELECT * FROM tbl_tdg$$

DROP PROCEDURE IF EXISTS `sp_eliminar_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_libro` (IN `id` INT)  NO SQL
BEGIN

DELETE FROM tbl_libros WHERE id = tbl_libros.cod_libro;

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_eliminar_tdg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_tdg` (IN `id` INT)  NO SQL
BEGIN

DELETE FROM tbl_tdg WHERE id = tbl_tdg.cod_tdg;

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_iniciar_ses_adm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_iniciar_ses_adm` (IN `name` VARCHAR(100), IN `pass` VARCHAR(100))  NO SQL
SELECT * FROM tbl_adms WHERE name = tbl_adms.admin AND pass = tbl_adms.pass$$

DROP PROCEDURE IF EXISTS `sp_iniciar_ses_user`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_iniciar_ses_user` (IN `name` VARCHAR(100), IN `pass` VARCHAR(100))  NO SQL
SELECT * FROM tbl_users WHERE name = tbl_users.usuario AND pass = tbl_users.pass$$

DROP PROCEDURE IF EXISTS `sp_procesar_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_procesar_libro` (IN `titulo` VARCHAR(100), IN `autor` VARCHAR(100), IN `editorial` VARCHAR(100), IN `publicacion` VARCHAR(100), IN `materia` INT, IN `url` VARCHAR(100), IN `user` VARCHAR(100))  NO SQL
BEGIN

INSERT INTO tbl_libros (libro, autor, editorial, publicacion, cod_materia, url) VALUES (titulo, autor, editorial, publicacion, materia, url);

UPDATE tbl_users SET libro = 1 WHERE usuario = user;

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_procesar_tdg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_procesar_tdg` (IN `titulo` VARCHAR(100), IN `autor` VARCHAR(100), IN `publicacion` VARCHAR(100), IN `tutor` VARCHAR(100), IN `url` VARCHAR(100))  NO SQL
BEGIN

INSERT INTO tbl_tdg (tdg, alumno, fecha, tutor, url) VALUES (titulo, autor, publicacion, tutor, url);

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_rechazar_libro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_rechazar_libro` (IN `id` INT)  NO SQL
BEGIN

UPDATE tbl_libros SET tbl_libros.aceptado = 0 WHERE tbl_libros.cod_libro = id;

SELECT 1;

END$$

DROP PROCEDURE IF EXISTS `sp_sonsultar_tbl_materias`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sonsultar_tbl_materias` (IN `semestre` INT)  NO SQL
SELECT * FROM tbl_materias WHERE semestre = tbl_materias.cod_semestre$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_adm`
--

DROP TABLE IF EXISTS `tbl_adm`;
CREATE TABLE IF NOT EXISTS `tbl_adm` (
  `cod_adm` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`cod_adm`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tbl_adm`
--

TRUNCATE TABLE `tbl_adm`;
--
-- Volcado de datos para la tabla `tbl_adm`
--

INSERT INTO `tbl_adm` (`cod_adm`, `admin`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_adms`
--

DROP TABLE IF EXISTS `tbl_adms`;
CREATE TABLE IF NOT EXISTS `tbl_adms` (
  `cod_usr` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_usr`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tbl_adms`
--

TRUNCATE TABLE `tbl_adms`;
--
-- Volcado de datos para la tabla `tbl_adms`
--

INSERT INTO `tbl_adms` (`cod_usr`, `admin`, `pass`) VALUES
(1, 'adm1', 'adm1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_libros`
--

DROP TABLE IF EXISTS `tbl_libros`;
CREATE TABLE IF NOT EXISTS `tbl_libros` (
  `usr_crea` int(11) NOT NULL DEFAULT '-1',
  `cod_materia` int(11) NOT NULL,
  `cod_libro` int(11) NOT NULL AUTO_INCREMENT,
  `libro` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `editorial` varchar(100) NOT NULL,
  `publicacion` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `aceptado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_libro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tbl_libros`
--

TRUNCATE TABLE `tbl_libros`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_materias`
--

DROP TABLE IF EXISTS `tbl_materias`;
CREATE TABLE IF NOT EXISTS `tbl_materias` (
  `cod_semestre` int(11) NOT NULL,
  `cod_materia` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_materia`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tbl_materias`
--

TRUNCATE TABLE `tbl_materias`;
--
-- Volcado de datos para la tabla `tbl_materias`
--

INSERT INTO `tbl_materias` (`cod_semestre`, `cod_materia`, `materia`) VALUES
(1, 1, 'FORMACIÓN CULTURAL'),
(1, 2, 'LENGUAJE Y COMUNICACIÓN'),
(1, 3, 'MATEMÁTICA I'),
(1, 4, 'LÓGICA'),
(1, 5, 'COMPUTACIÓN I'),
(1, 6, 'AMBIENTE Y DESARROLLO SOSTENIBLE'),
(1, 7, 'INGLÉS I'),
(1, 8, 'METODOLOGÍA DE LA INVESTIGACIÓN I'),
(2, 9, 'EDUCACIÓN PARA LA SALUD'),
(2, 10, 'REDACCIÓN DE INFORMES TÉCNICOS'),
(2, 11, 'ÁLGEBRA LINEAL'),
(2, 12, 'MATEMÁTICA II'),
(2, 13, 'COMPUTACIÓN II'),
(2, 14, 'CONTABILIDAD GENERAL '),
(2, 15, 'INGLÉS II'),
(2, 16, 'METODOLOGÍA DE LA INVESTIGACIÓN II'),
(3, 17, 'MATEMÁTICA DISCRETA'),
(3, 18, 'FÍSICA I'),
(3, 19, 'MATEMÁTICA III'),
(3, 20, 'ALGORITMOS Y ESTRUCTURAS'),
(3, 21, 'TEORÍA DE SISTEMAS'),
(3, 22, 'ESTADÍSTICA I'),
(3, 23, 'INGLÉS III'),
(4, 24, 'DIBUJO Y GEOMETRÍA DESCRIPTIVA'),
(4, 25, 'FÍSICA II'),
(4, 26, 'MATEMÁTICA IV'),
(4, 27, 'SISTEMAS OPERATIVOS I'),
(4, 28, 'ANÁLISIS DE SISTEMAS'),
(4, 29, 'ESTADÍSTICA II'),
(4, 30, 'LENGUAJE DE PROGRAMACIÓN I'),
(5, 31, 'INVESTIGACIÓN DE OPERACIONES'),
(5, 32, 'CIRCUITOS ELÉCTRICOS'),
(5, 33, 'PROGRAMACIÓN NUMÉRICA Y NO NUMÉRICA'),
(5, 34, 'DISEÑO DE SISTEMAS DE INFORMACIÓN '),
(5, 35, 'ESTRUCTURA DE BASE DE DATOS'),
(5, 36, 'LENGUAJE DE PROGRAMACIÓN II'),
(5, 37, 'ADMINISTRACÍON DE EMPRESAS'),
(6, 38, 'ADMINISTRACIÓN DE OPERACIONES'),
(6, 39, 'TEORÌA DE CONTROL'),
(6, 40, 'CIRCUITOS ELECTRÓNICOS'),
(6, 41, 'ANÁLISIS NUMÉRICO'),
(6, 42, 'SISTEMAS OPERATIVOS II'),
(6, 43, 'INGENIERÍA DE SOFTWARE'),
(7, 44, 'ARQUITECTURA DEL COMPUTADOR'),
(7, 45, 'SISTEMAS DIGITALES'),
(7, 46, 'ADMINISTRACIÓN DE SISTEMAS DE INFORMACIÓN '),
(7, 47, 'COMPUTACIÓN GRÁFICA'),
(7, 48, 'DESARROLLO DE SOFTWARE'),
(7, 49, 'GERENCIA LOGÍSTICA'),
(8, 50, 'MICROPROCESADORES'),
(8, 51, 'TEORÌA DE LA COMUNICACIÓN DIGITAL'),
(8, 52, 'REDES I'),
(8, 53, 'ELECTIVA'),
(8, 54, 'AUDITORÌA DE SISTEMAS'),
(8, 55, 'GERENCIA DE PROYECTOS'),
(9, 56, 'ROBÒTICA Y SISTEMAS EXPERTOS'),
(9, 57, 'SISTEMAS MULTIMEDIA'),
(9, 58, 'REDES II'),
(9, 59, 'ELECTIVA '),
(9, 60, 'ELECTIVA '),
(9, 61, 'SEMINARIO DE TRABAJO DE GRADO'),
(10, 62, 'ÉTICA PROFESIONAL'),
(10, 63, 'TELEPRÓCESOS Y TELEINFORMÁTICA'),
(10, 64, 'ELECTIVA'),
(10, 65, 'ELECTIVA'),
(10, 66, 'TRABAJO DE GRADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_semestres`
--

DROP TABLE IF EXISTS `tbl_semestres`;
CREATE TABLE IF NOT EXISTS `tbl_semestres` (
  `cod_semestre` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_semestre`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tbl_semestres`
--

TRUNCATE TABLE `tbl_semestres`;
--
-- Volcado de datos para la tabla `tbl_semestres`
--

INSERT INTO `tbl_semestres` (`cod_semestre`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tdg`
--

DROP TABLE IF EXISTS `tbl_tdg`;
CREATE TABLE IF NOT EXISTS `tbl_tdg` (
  `cod_tdg` int(11) NOT NULL AUTO_INCREMENT,
  `tdg` varchar(100) NOT NULL,
  `alumno` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `tutor` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  PRIMARY KEY (`cod_tdg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tbl_tdg`
--

TRUNCATE TABLE `tbl_tdg`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `cod_usr` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `libro` tinyint(1) NOT NULL DEFAULT '0',
  `registro` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_usr`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tbl_users`
--

TRUNCATE TABLE `tbl_users`;
--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`cod_usr`, `usuario`, `pass`, `libro`, `registro`) VALUES
(1, 'user1', 'user1', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
