SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: `mei_dashboard`

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `marca` varchar(50) NULL,
  `codigo` varchar(50) NULL,
  `cantidad` int NOT NULL,
  `precio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Indices de la tabla `personas`
ALTER TABLE `productos` ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de la tabla `personas`
ALTER TABLE `productos` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
