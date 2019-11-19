-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 13:30:09
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `idPublicacion` int(11) NOT NULL,
  `nombreMascota` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipoMascota` varchar(150) NOT NULL,
  `razaMascota` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idPublicacion`, `nombreMascota`, `descripcion`, `idUsuario`, `fecha`, `tipoMascota`, `razaMascota`) VALUES
(1, 'Pepe Grillo', 'Es un perrito bonito y feliz, se la pasa jugando todo el tiempo. Le gusta dormir entre nosotros con su propia cobijita. Es adorable.', 1, '0000-00-00', 'Adopción', 'Pitbull'),
(2, 'Toby', ' sdfsdgveSGbbbsv sdfsdgveSGbbbsv sdfsdgveSGbbbsv sdfsdgveSGbbbsvsdfsdgveSGbbbsvsdfsdgveSGbbbsv sdfsdgveSGbbbsv sdfsdgveSGbbbsv sdfsdgveSGbbbsvsdfsdgveSGbbbsvsdfsdgveSGbbbsvsdfsdgveSGbbbsv sdfsdgveSGbbbsv sdfsdgveSGbbbsv sdfsdgveSGbbbsvsdfsdgveSGbbbsv.', 1, '2019-11-11', 'Perdido', 'Pitbull'),
(3, 'Helena', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2019-11-08', 'Perdido', 'Pincher'),
(4, 'sadas', 'sadasdas', 9, '2019-10-30', 'Adopción', 'sadsadasdas'),
(5, 'Tipet de ptueb', 'asodjasdsa', 9, '2019-11-21', 'Pareja', 'Pincher'),
(6, 'Prueba mascota', 'ajdhiasd asdasphdusagfuidsf gds fdsfgodasgfpids fds', 9, '2019-11-02', 'Pareja', 'Pitbull'),
(7, 'Prueba de masctota benito', 'hghfgdsfhludgfuibeI UHFPIEG FIUE P FEGFIUWEG PIUEGP F', 11, '2019-08-15', 'Adopción', 'Pincher'),
(8, 'Bartolomeo', 'Es un perrito bonito y feliz, se la pasa jugando todo el tiempo. Le gusta dormir entre nosotros con su propia cobijita. Es adorable.', 12, '2019-09-19', 'Pareja', 'Pincher');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `privilegio` int(2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `password`, `privilegio`, `fecha_registro`) VALUES
(1, 'Cesar Mejia', 'ucesar', 'cesar@eytoo.com', '1234', 2, '2016-08-18 03:59:20'),
(2, 'Alan Mejia', 'ualan', 'cesar@eytoo.com', '1234', 2, '2016-08-18 03:59:20'),
(5, 'Delectus fugit', 'uadmin', 'dyxisev@yahoo.com', 'Pa$$w0rd!', 2, '2016-10-06 06:30:53'),
(6, 'alan', 'asdasd', 'alan@web.co', '12345', 2, '2016-10-06 06:33:37'),
(7, 'Vsadsad', 'asdad', 'qusy@gmail.com', 'Pa$$w0rd!', 2, '2016-10-06 06:34:30'),
(8, 'Alan Vidales', 'udev', 'avidal@dev.com', '1234', 2, '2016-10-06 06:35:32'),
(9, 'Alfonso', 'Alfonsocortez', 'gxfsdf@gmail.com', '12345', 2, '2019-11-10 13:07:02'),
(10, 'Alfonso Jose Chavarro', 'Alfonsocortez16', 'alfonsojose16@outlook.es', '12345', 2, '2019-11-10 16:40:08'),
(11, 'Benito Camelas', 'BenitoCamelas', '12434535@gmail.com', '12345', 2, '2019-11-12 11:12:00'),
(12, 'Daniel Mauricio', 'DanielMauricio2019', 'asdasdsa@doashuidas.com', '12345', 2, '2019-11-12 11:32:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`idPublicacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `idPublicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
