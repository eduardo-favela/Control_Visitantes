-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema control
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `control` ;

-- -----------------------------------------------------
-- Schema control
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `control` DEFAULT CHARACTER SET utf8 ;
USE `control` ;

-- -----------------------------------------------------
-- Table `control`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control`.`usuarios` (
  `idusuario` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control`.`colonos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control`.`colonos` (
  `idcolono` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido_p` VARCHAR(45) NULL,
  `apellido_m` VARCHAR(45) NULL,
  `calle` VARCHAR(45) NULL,
  `numero_casa` VARCHAR(45) NULL,
  PRIMARY KEY (`idcolono`),
  UNIQUE INDEX `idcolono_UNIQUE` (`idcolono` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control`.`visitantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control`.`visitantes` (
  `placa` VARCHAR(10) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido_p` VARCHAR(45) NULL,
  `apellido_m` VARCHAR(45) NULL,
  `color_auto` VARCHAR(45) NULL,
  `marca_auto` VARCHAR(45) NULL,
  PRIMARY KEY (`placa`),
  UNIQUE INDEX `placa_UNIQUE` (`placa` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control`.`visitas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control`.`visitas` (
  `idvisita` INT NOT NULL AUTO_INCREMENT,
  `fecha_hora` DATETIME NULL,
  `id_colono` INT NULL,
  `id_visitante` VARCHAR(10) NULL,
  PRIMARY KEY (`idvisita`),
  UNIQUE INDEX `idvisita_UNIQUE` (`idvisita` ASC),
  INDEX `fk_visitante_idx` (`id_visitante` ASC),
  INDEX `fk_colono_idx` (`id_colono` ASC),
  CONSTRAINT `fk_visitante`
    FOREIGN KEY (`id_visitante`)
    REFERENCES `control`.`visitantes` (`placa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_colono`
    FOREIGN KEY (`id_colono`)
    REFERENCES `control`.`colonos` (`idcolono`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

ALTER TABLE `control`.`colonos` 
DROP COLUMN `apellido_m`,
CHANGE COLUMN `apellido_p` `apellido` VARCHAR(45) NULL DEFAULT NULL ;

ALTER TABLE `control`.`visitantes` 
DROP COLUMN `apellido_m`,
CHANGE COLUMN `apellido_p` `apellido` VARCHAR(45) NULL DEFAULT NULL ;

ALTER TABLE `control`.`usuarios` 
ADD COLUMN `tipo` INT NULL AFTER `pass`;

INSERT INTO `control`.`usuarios` (`idusuario`, `pass`, `tipo`) VALUES ('3554', '1010', '2');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
