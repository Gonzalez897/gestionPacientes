-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 08:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionpacientes`
--
CREATE DATABASE IF NOT EXISTS `gestionpacientes` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `gestionpacientes`;

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `idCitas` int(11) NOT NULL,
  `nombre_cita` varchar(225) NOT NULL,
  `motivo` varchar(225) NOT NULL,
  `fecha_cita` date NOT NULL,
  `idPacientes` int(11) NOT NULL,
  `idDoctores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `idConsultas` int(11) NOT NULL,
  `nombre_consulta` varchar(225) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_consulta` int(11) NOT NULL,
  `idPacientes` int(11) NOT NULL,
  `idDoctores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultas_recetas`
--

CREATE TABLE `consultas_recetas` (
  `idConsultRecetas` int(11) NOT NULL,
  `idConsultas` int(11) NOT NULL,
  `idRecetas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctores`
--

CREATE TABLE `doctores` (
  `idDoctores` int(11) NOT NULL,
  `idEmpleados` int(11) NOT NULL,
  `especializacion` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleados` int(11) NOT NULL,
  `nombre` varchar(225) NOT NULL,
  `apellido` varchar(225) NOT NULL,
  `dui` varchar(225) NOT NULL,
  `cargo` varchar(225) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `idPacientes` int(11) NOT NULL,
  `nombre_paciente` varchar(225) NOT NULL,
  `apellido_paciente` varchar(225) NOT NULL,
  `dui_paciente` varchar(225) NOT NULL,
  `edad_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recetas`
--

CREATE TABLE `recetas` (
  `idRecetas` int(11) NOT NULL,
  `nombre_receta` varchar(225) NOT NULL,
  `tipo_receta` varchar(225) NOT NULL,
  `tratamiento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `usuario` varchar(225) NOT NULL,
  `clave` varchar(225) NOT NULL,
  `estado` varchar(225) NOT NULL,
  `idEmpleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCitas`),
  ADD KEY `citas_pacientes` (`idPacientes`),
  ADD KEY `citas_doctores` (`idDoctores`);

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`idConsultas`),
  ADD KEY `consultas_pacientes` (`idPacientes`),
  ADD KEY `consultas_doctores` (`idDoctores`);

--
-- Indexes for table `consultas_recetas`
--
ALTER TABLE `consultas_recetas`
  ADD PRIMARY KEY (`idConsultRecetas`),
  ADD KEY `consultRecetas_consulta` (`idConsultas`),
  ADD KEY `consultRecetas_recetas` (`idRecetas`);

--
-- Indexes for table `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`idDoctores`),
  ADD KEY `doctores_empleados` (`idEmpleados`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleados`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPacientes`);

--
-- Indexes for table `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`idRecetas`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `usuarios_empleados` (`idEmpleados`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citas`
--
ALTER TABLE `citas`
  MODIFY `idCitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `idConsultas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultas_recetas`
--
ALTER TABLE `consultas_recetas`
  MODIFY `idConsultRecetas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctores`
--
ALTER TABLE `doctores`
  MODIFY `idDoctores` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPacientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recetas`
--
ALTER TABLE `recetas`
  MODIFY `idRecetas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_doctores` FOREIGN KEY (`idDoctores`) REFERENCES `doctores` (`idDoctores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_pacientes` FOREIGN KEY (`idPacientes`) REFERENCES `pacientes` (`idPacientes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_doctores` FOREIGN KEY (`idDoctores`) REFERENCES `doctores` (`idDoctores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultas_pacientes` FOREIGN KEY (`idPacientes`) REFERENCES `pacientes` (`idPacientes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultas_recetas`
--
ALTER TABLE `consultas_recetas`
  ADD CONSTRAINT `consultRecetas_consulta` FOREIGN KEY (`idConsultas`) REFERENCES `consultas` (`idConsultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultRecetas_recetas` FOREIGN KEY (`idRecetas`) REFERENCES `recetas` (`idRecetas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_empleados` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_empleados` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
