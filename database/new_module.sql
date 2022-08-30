-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema module
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema module
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `module` DEFAULT CHARACTER SET utf8 ;
USE `module` ;

-- -----------------------------------------------------
-- Table `module`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `module`.`usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `usertype` VARCHAR(45) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `module`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `module`.`productos` (
  `idProducto` INT NOT NULL AUTO_INCREMENT,
  `nombreProducto` VARCHAR(45) NOT NULL,
  `unidadMedida` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `module`.`entradas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `module`.`entradas` (
  `idEntrada` INT NOT NULL AUTO_INCREMENT,
  `totalEntrada` INT NOT NULL,
  `fechaEntrada` DATE NOT NULL,
  `fechaVencimiento` DATE NOT NULL,
  `suceso` VARCHAR(45) NULL DEFAULT 'Sin inconvenientes',
  `idProducto` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idEntrada`),
  INDEX `idUsuario_idx` (`idUsuario` ASC) VISIBLE,
  INDEX `idProducto_idx` (`idProducto` ASC) VISIBLE,
  CONSTRAINT `idUsuario`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `module`.`usuarios` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idProducto`
    FOREIGN KEY (`idProducto`)
    REFERENCES `module`.`productos` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `module`.`salidas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `module`.`salidas` (
  `idSalida` INT NOT NULL AUTO_INCREMENT,
  `totalSalida` INT NOT NULL,
  `fechaSalida` DATE NOT NULL,
  `idUsuario` INT NOT NULL,
  `idProducto` INT NOT NULL,
  `idEntrada` INT NOT NULL,
  PRIMARY KEY (`idSalida`),
  INDEX `idUsuario_idx` (`idUsuario` ASC) VISIBLE,
  INDEX `idProducto_idx` (`idProducto` ASC) VISIBLE,
  INDEX `idEntrada_idx` (`idEntrada` ASC) VISIBLE,
  CONSTRAINT `idUsuario_`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `module`.`usuarios` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idProducto_`
    FOREIGN KEY (`idProducto`)
    REFERENCES `module`.`productos` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idEntrada_`
    FOREIGN KEY (`idEntrada`)
    REFERENCES `module`.`entradas` (`idEntrada`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
