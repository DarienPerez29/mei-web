SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: `mei_login`

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo_electronico` varchar(45) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Datos para tabla usuarios
INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `nombre_empresa`, `telefono`, `correo_electronico`, `usuario`, `password`) VALUES
(1, 'Karen', 'Gonzales Carvente', '', '2464649489', 'kg409788@gmail.com', 'karen29', 'karen29'),
(2, 'Stacey', 'Conde Corona', '', '2461238989', 'stacey_11@gmail.com', 'stacey', 'stacey'),
(3, 'Kevin Yair', 'Zecua Perez', '', '2460109999', 'kevin_01@gmail.com', 'kev', 'kev'),
(4, 'Darien', 'Perez Cano', '', '2460072929', 'dapec_117@gmail.com', 'dapec', 'dapec');

-- Indices de la tabla `usuarios`
ALTER TABLE `usuarios` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`);

-- AUTO_INCREMENT de la tabla `usuarios`
ALTER TABLE `usuarios` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;