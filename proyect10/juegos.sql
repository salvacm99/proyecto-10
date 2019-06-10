-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para juegos
CREATE DATABASE IF NOT EXISTS `juegos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `juegos`;

-- Volcando estructura para tabla juegos.juego
CREATE TABLE IF NOT EXISTS `juego` (
  `id` int(11) NOT NULL,
  `nombre` char(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla juegos.juego: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `juego` DISABLE KEYS */;
INSERT INTO `juego` (`id`, `nombre`) VALUES
	(1, 'microrobots');
/*!40000 ALTER TABLE `juego` ENABLE KEYS */;

-- Volcando estructura para tabla juegos.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `edad` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla juegos.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `edad`, `curso`, `puntuacion`, `password`) VALUES
	(5, 'Yomismo', 'Mismo Mismo', 10, 0, 0, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla juegos.usuario_juego
CREATE TABLE IF NOT EXISTS `usuario_juego` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `id_juego` int(11) NOT NULL DEFAULT '0',
  `puntuacion` int(11) DEFAULT '0',
  KEY `id_juego` (`id_juego`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla juegos.usuario_juego: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_juego` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_juego` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
