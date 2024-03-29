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
  `prieksmets_id` INT NOT NULL AUTO_INCREMENT,
  `prieksmets` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`prieksmets_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`skolnieks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`skolnieks` (
  `skolnieks_id` INT NOT NULL AUTO_INCREMENT,
  `vards` VARCHAR(45) NOT NULL,
  `uzvards` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`skolnieks_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`skolotajs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`skolotajs` (
  `skolotajs_id` INT NOT NULL AUTO_INCREMENT,
  `vards` VARCHAR(45) NOT NULL,
  `uzvards` VARCHAR(45) NOT NULL,
  `epasts` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`skolotajs_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`login` (
  `login_id` INT NOT NULL AUTO_INCREMENT,
  `epasts` VARCHAR(45) NOT NULL,
  `parole` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`login_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Konsultācija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Konsultācija` (
  `konsultācija_id` INT NOT NULL AUTO_INCREMENT,
  `iela` ENUM("Vānes iela", "Ventspils iela") NOT NULL,
  `kabinets` VARCHAR(45) NOT NULL,
  `laiks` DATE NOT NULL,
  `sākums` TIME NULL,
  `beigas` TIME NULL,
  `skolotajs_id_fk` INT NOT NULL,
  `prieksmets_id_fk` INT NOT NULL,
  PRIMARY KEY (`konsultācija_id`),
  INDEX `fk_Konsultācija_skolotajs_idx` (`skolotajs_id_fk`),
  INDEX `fk_Konsultācijas_prieksmets_idx`(`prieksmets_id_fk`),
  CONSTRAINT `fk_Konsultācija_skolotajs`
    FOREIGN KEY (`skolotajs_id_fk`)
    REFERENCES `mydb`.`skolotajs` (`skolotajs_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Konsultācija_prieksmets`
    FOREIGN KEY (`prieksmets_id_fk`)
    REFERENCES `mydb`.`prieksmets` (`prieksmets_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `mydb`.`pieteikums`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pieteikums` (
  `pieteikums_id` INT NOT NULL AUTO_INCREMENT,
  `id_skolotajs` INT NOT NULL,
  `id_skolnieks` INT NOT NULL,
  `id_konsultacijas` INT NOT NULL,
  PRIMARY KEY (`pieteikums_id`, `id_skolotajs`, `id_skolnieks`, `id_konsultacijas`),
  INDEX `fk_pieteikums_skolotajs_idx` (`id_skolotajs`),
  INDEX `fk_pieteikums_skolnieks_idx` (`id_skolnieks`),
  INDEX `fk_pieteikums_Konsultācija_idx` (`id_konsultacijas`),
  CONSTRAINT `fk_pieteikums_skolotajs`
    FOREIGN KEY (`id_skolotajs`)
    REFERENCES `mydb`.`skolotajs` (`skolotajs_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pieteikums_skolnieks`
    FOREIGN KEY (`id_skolnieks`)
    REFERENCES `mydb`.`skolnieks` (`skolnieks_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pieteikums_Konsultācija`
    FOREIGN KEY (`id_konsultacijas`)
    REFERENCES `mydb`.`Konsultācija` (`konsultācija_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



INSERT INTO `skolnieks` (`skolnieks_id`, `vards`, `uzvards`) VALUES
(1, 'Daniels', 'Vidopskis');
INSERT INTO `skolotajs` (`skolotajs_id`, `vards`, `uzvards`, `epasts`) VALUES
(1, 'Skolotajs', 'Uzvards', 'skolotajs.uzvards@lvt.lv'),
(2, '', '', '');