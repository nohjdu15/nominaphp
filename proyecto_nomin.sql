-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220427.b008cca95d
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2022 a las 20:55:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_nomin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apropiaciones`
--

CREATE TABLE `apropiaciones` (
  `IdApropiaciones` int(11) NOT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `Pension` int(7) DEFAULT NULL,
  `Salud` int(7) DEFAULT NULL,
  `ARL` int(7) DEFAULT NULL,
  `Sena` int(7) DEFAULT NULL,
  `ICBF` int(7) DEFAULT NULL,
  `Caja_Compen` int(7) DEFAULT NULL,
  `IdMes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_mes`
--

CREATE TABLE `aux_mes` (
  `IdMes` int(11) NOT NULL,
  `Mes` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `IdCargo` int(11) NOT NULL,
  `TipoCargo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `Idcontrato` int(11) NOT NULL,
  `IdCargo` int(11) DEFAULT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `IdCuenta` int(11) NOT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `Banco` varchar(30) DEFAULT NULL,
  `NumeroCuenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE `deducciones` (
  `IdDeducciones` int(11) NOT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `SaludEmpl` int(7) DEFAULT NULL,
  `PensionEmpl` int(7) DEFAULT NULL,
  `IdMes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devengado`
--

CREATE TABLE `devengado` (
  `IdDevengado` int(11) NOT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `IdContrato` int(11) DEFAULT NULL,
  `Salario` int(11) DEFAULT NULL,
  `AuxTrans` int(7) DEFAULT NULL,
  `IdMes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `IdEmpleado` int(11) NOT NULL,
  `Nombre1` varchar(30) DEFAULT NULL,
  `Nombre2` varchar(30) DEFAULT NULL,
  `Apellido1` varchar(30) DEFAULT NULL,
  `Apellido2` varchar(30) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `IdJornada` int(11) NOT NULL,
  `TipoJornada` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadatrabajada`
--

CREATE TABLE `jornadatrabajada` (
  `IdJornadaTrabajada` int(11) NOT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `IdJornada` int(11) DEFAULT NULL,
  `IdMes` int(11) DEFAULT NULL,
  `CantidadHoras` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `IdTelefono` int(11) NOT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `Telefono` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apropiaciones`
--
ALTER TABLE `apropiaciones`
  ADD PRIMARY KEY (`IdApropiaciones`),
  ADD UNIQUE KEY `IdApropiaciones` (`IdApropiaciones`),
  ADD KEY `IdEmpleado` (`IdEmpleado`),
  ADD KEY `IdMes` (`IdMes`);

--
-- Indices de la tabla `aux_mes`
--
ALTER TABLE `aux_mes`
  ADD PRIMARY KEY (`IdMes`),
  ADD UNIQUE KEY `IdMes` (`IdMes`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`IdCargo`),
  ADD UNIQUE KEY `IdCargo` (`IdCargo`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`Idcontrato`),
  ADD UNIQUE KEY `Idcontrato` (`Idcontrato`),
  ADD KEY `IdEmpleado` (`IdEmpleado`),
  ADD KEY `IdCargo` (`IdCargo`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`IdCuenta`),
  ADD UNIQUE KEY `IdCuenta` (`IdCuenta`),
  ADD KEY `IdEmpleado` (`IdEmpleado`);

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`IdDeducciones`),
  ADD UNIQUE KEY `IdDeducciones` (`IdDeducciones`),
  ADD KEY `IdEmpleado` (`IdEmpleado`),
  ADD KEY `IdMes` (`IdMes`);

--
-- Indices de la tabla `devengado`
--
ALTER TABLE `devengado`
  ADD PRIMARY KEY (`IdDevengado`),
  ADD UNIQUE KEY `IdDevengado` (`IdDevengado`),
  ADD KEY `IdEmpleado` (`IdEmpleado`),
  ADD KEY `IdContrato` (`IdContrato`),
  ADD KEY `IdMes` (`IdMes`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`IdEmpleado`),
  ADD UNIQUE KEY `IdEmpleado` (`IdEmpleado`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`IdJornada`),
  ADD UNIQUE KEY `IdJornada` (`IdJornada`);

--
-- Indices de la tabla `jornadatrabajada`
--
ALTER TABLE `jornadatrabajada`
  ADD PRIMARY KEY (`IdJornadaTrabajada`),
  ADD UNIQUE KEY `IdJornadaTrabajada` (`IdJornadaTrabajada`),
  ADD KEY `IdEmpleado` (`IdEmpleado`),
  ADD KEY `IdJornada` (`IdJornada`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`IdTelefono`),
  ADD UNIQUE KEY `IdTelefono` (`IdTelefono`),
  ADD KEY `IdEmpleado` (`IdEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apropiaciones`
--
ALTER TABLE `apropiaciones`
  MODIFY `IdApropiaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aux_mes`
--
ALTER TABLE `aux_mes`
  MODIFY `IdMes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `IdCargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `Idcontrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `IdCuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `IdDeducciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devengado`
--
ALTER TABLE `devengado`
  MODIFY `IdDevengado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `IdJornada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jornadatrabajada`
--
ALTER TABLE `jornadatrabajada`
  MODIFY `IdJornadaTrabajada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `IdTelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apropiaciones`
--
ALTER TABLE `apropiaciones`
  ADD CONSTRAINT `apropiaciones_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleado` (`IdEmpleado`),
  ADD CONSTRAINT `apropiaciones_ibfk_2` FOREIGN KEY (`IdMes`) REFERENCES `aux_mes` (`IdMes`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleado` (`IdEmpleado`),
  ADD CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`IdCargo`) REFERENCES `cargo` (`IdCargo`);

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleado` (`IdEmpleado`);

--
-- Filtros para la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD CONSTRAINT `deducciones_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleado` (`IdEmpleado`),
  ADD CONSTRAINT `deducciones_ibfk_2` FOREIGN KEY (`IdMes`) REFERENCES `aux_mes` (`IdMes`);

--
-- Filtros para la tabla `devengado`
--
ALTER TABLE `devengado`
  ADD CONSTRAINT `devengado_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleado` (`IdEmpleado`),
  ADD CONSTRAINT `devengado_ibfk_2` FOREIGN KEY (`IdContrato`) REFERENCES `contrato` (`Idcontrato`),
  ADD CONSTRAINT `devengado_ibfk_3` FOREIGN KEY (`IdMes`) REFERENCES `aux_mes` (`IdMes`);

--
-- Filtros para la tabla `jornadatrabajada`
--
ALTER TABLE `jornadatrabajada`
  ADD CONSTRAINT `jornadatrabajada_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleado` (`IdEmpleado`),
  ADD CONSTRAINT `jornadatrabajada_ibfk_2` FOREIGN KEY (`IdJornada`) REFERENCES `jornadas` (`IdJornada`);

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleado` (`IdEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



