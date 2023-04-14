-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`prieksmets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`prieksmets` (
  `prieksmets_id` INT NOT NULL,
  `prieksmets` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`prieksmets_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`skolnieks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`skolnieks` (
  `skolnieks_id` INT NOT NULL,
  `vards` VARCHAR(45) NOT NULL,
  `uzvards` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`skolnieks_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`skolotajs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`skolotajs` (
  `skolotajs_id` INT NOT NULL,
  `vards` VARCHAR(45) NOT NULL,
  `uzvards` VARCHAR(45) NOT NULL,
  `epasts` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`skolotajs_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`login` (
  `login_id` INT NOT NULL,
  `epasts` VARCHAR(45) NOT NULL,
  `parole` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`login_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Konsultācija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Konsultācija` (
  `konsultācija_id` INT NOT NULL,
  `iela` ENUM("Vānes iela", "Ventspils iela") NOT NULL,
  `kabinets` VARCHAR(45) NOT NULL,
  `laiks` DATE NOT NULL,
  `sākums` DATETIME NULL,
  `beigas` DATETIME NULL,
  PRIMARY KEY (`konsultācija_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pieteikums`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pieteikums` (
  `pieteikums_id` INT NOT NULL,
  `skolotajs_skolotajs_id` INT NOT NULL,
  `skolotajs_skolotajs_id1` INT NOT NULL,
  `skolnieks_skolnieks_id` INT NOT NULL,
  `Konsultācija_konsultācija_id` INT NOT NULL,
  PRIMARY KEY (`pieteikums_id`, `skolotajs_skolotajs_id`, `skolotajs_skolotajs_id1`, `skolnieks_skolnieks_id`, `Konsultācija_konsultācija_id`),
  INDEX `fk_pieteikums_skolotajs_idx` (`skolotajs_skolotajs_id1`),
  INDEX `fk_pieteikums_skolnieks1_idx` (`skolnieks_skolnieks_id`),
  INDEX `fk_pieteikums_Konsultācija1_idx` (`Konsultācija_konsultācija_id`),
  CONSTRAINT `fk_pieteikums_skolotajs`
    FOREIGN KEY (`skolotajs_skolotajs_id1`)
    REFERENCES `mydb`.`skolotajs` (`skolotajs_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pieteikums_skolnieks1`
    FOREIGN KEY (`skolnieks_skolnieks_id`)
    REFERENCES `mydb`.`skolnieks` (`skolnieks_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pieteikums_Konsultācija1`
    FOREIGN KEY (`Konsultācija_konsultācija_id`)
    REFERENCES `mydb`.`Konsultācija` (`konsultācija_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
