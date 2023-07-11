SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `dbmultipol` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `dbmultipol` ;

-- -----------------------------------------------------
-- Table `dbmultipol`.`criterio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`criterio` (
  `idcriterios` INT NOT NULL AUTO_INCREMENT ,
  `titulo_corto` VARCHAR(45) NOT NULL ,
  `titulo_largo` VARCHAR(100) NOT NULL ,
  `peso` INT NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idcriterios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbmultipol`.`accion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`accion` (
  `idacciones` INT NOT NULL AUTO_INCREMENT ,
  `titulo_corto` VARCHAR(45) NOT NULL ,
  `titulo_largo` VARCHAR(100) NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idacciones`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbmultipol`.`politica`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`politica` (
  `idpoliticas` INT NOT NULL AUTO_INCREMENT ,
  `titulo_corto` VARCHAR(45) NOT NULL ,
  `titulo_largo` VARCHAR(100) NOT NULL ,
  `peso` INT NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idpoliticas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbmultipol`.`escenario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`escenario` (
  `idescenarios` INT NOT NULL AUTO_INCREMENT ,
  `titulo_corto` VARCHAR(45) NOT NULL ,
  `titulo_largo` VARCHAR(100) NOT NULL ,
  `peso` INT NOT NULL ,
  `probabilidad` DECIMAL(4,2) NOT NULL ,
  `descripcion` VARCHAR(100) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idescenarios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbmultipol`.`accion_criterio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`accion_criterio` (
  `idacciones_criterios` INT NOT NULL AUTO_INCREMENT ,
  `idcriterios` INT NOT NULL ,
  `idacciones` INT NOT NULL ,
  `peso` INT NOT NULL ,
  `promedio_ponderados` DECIMAL(4,2) NOT NULL ,
  `mayor` DECIMAL(4,2) NOT NULL ,
  `desviacion` DECIMAL(4,2) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idacciones_criterios`) ,
  INDEX `pk_acciones_criterios` (`idcriterios` ASC) ,
  INDEX `accionescriterios` (`idacciones` ASC) ,
  CONSTRAINT `pk_acciones_criterios`
    FOREIGN KEY (`idcriterios` )
    REFERENCES `dbmultipol`.`criterio` (`idcriterios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `accionescriterios`
    FOREIGN KEY (`idacciones` )
    REFERENCES `dbmultipol`.`accion` (`idacciones` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbmultipol`.`politica_criterio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`politica_criterio` (
  `idpoliticas_criterios` INT NOT NULL AUTO_INCREMENT ,
  `idpoliticas` INT NOT NULL ,
  `idcriterios` INT NOT NULL ,
  `promedio_ponderados` DECIMAL(4,2) NOT NULL ,
  `mayor` DECIMAL(4,2) NOT NULL ,
  `peso` INT NOT NULL ,
  `desviacion` DECIMAL(4,2) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idpoliticas_criterios`) ,
  INDEX `politicas_criterios` (`idcriterios` ASC) ,
  INDEX `politicascriterios` (`idpoliticas` ASC) ,
  CONSTRAINT `politicas_criterios`
    FOREIGN KEY (`idcriterios` )
    REFERENCES `dbmultipol`.`criterio` (`idcriterios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `politicascriterios`
    FOREIGN KEY (`idpoliticas` )
    REFERENCES `dbmultipol`.`politica` (`idpoliticas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbmultipol`.`escenario_criterio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`escenario_criterio` (
  `idescenario_criterios` INT NOT NULL AUTO_INCREMENT ,
  `idcriterios` INT NOT NULL ,
  `idescenario` INT NOT NULL ,
  `promedio_ponderados` DECIMAL(4,2) NOT NULL ,
  `mayor` DECIMAL(4,2) NOT NULL ,
  `peso` INT NOT NULL ,
  `desviacion` DECIMAL(4,2) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idescenario_criterios`) ,
  INDEX `pk_escenario_criterios` (`idcriterios` ASC) ,
  INDEX `escenariocriterios` (`idescenario` ASC) ,
  CONSTRAINT `pk_escenario_criterios`
    FOREIGN KEY (`idcriterios` )
    REFERENCES `dbmultipol`.`criterio` (`idcriterios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `escenariocriterios`
    FOREIGN KEY (`idescenario` )
    REFERENCES `dbmultipol`.`escenario` (`idescenarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbmultipol`.`politica_accion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`politica_accion` (
  `idpoliticas_acciones` INT NOT NULL AUTO_INCREMENT ,
  `idpoliticas` INT NOT NULL ,
  `idacciones` INT NOT NULL ,
  `promedio_ponderados` DECIMAL(4,2) NOT NULL ,
  `peso` INT NOT NULL ,
  `desviacion` DECIMAL(4,2) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idpoliticas_acciones`) ,
  INDEX `pk_politicas_acciones` (`idpoliticas` ASC) ,
  INDEX `politicasacciones` (`idacciones` ASC) ,
  CONSTRAINT `pk_politicas_acciones`
    FOREIGN KEY (`idpoliticas` )
    REFERENCES `dbmultipol`.`politica` (`idpoliticas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `politicasacciones`
    FOREIGN KEY (`idacciones` )
    REFERENCES `dbmultipol`.`accion` (`idacciones` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbmultipol`.`politica_escenario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dbmultipol`.`politica_escenario` (
  `idpoliticas_escenario` INT NOT NULL AUTO_INCREMENT ,
  `idpoliticas` INT NOT NULL ,
  `idescenario` INT NOT NULL ,
  `promedio_ponderados` DECIMAL(4,2) NOT NULL ,
  `peso` INT NOT NULL ,
  `desviacion` DECIMAL(4,2) NULL ,
  `condicion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idpoliticas_escenario`) ,
  INDEX `pk_politicas_escenario` (`idpoliticas` ASC) ,
  INDEX `politicasescenario` (`idescenario` ASC) ,
  CONSTRAINT `pk_politicas_escenario`
    FOREIGN KEY (`idpoliticas` )
    REFERENCES `dbmultipol`.`politica` (`idpoliticas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `politicasescenario`
    FOREIGN KEY (`idescenario` )
    REFERENCES `dbmultipol`.`escenario` (`idescenarios` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
