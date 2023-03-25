-- MySQL Script generated by MySQL Workbench
-- Tue Mar 21 18:40:30 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema let
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `let` ;

-- -----------------------------------------------------
-- Schema let
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `let` DEFAULT CHARACTER SET utf8 ;
USE `let` ;

-- -----------------------------------------------------
-- Table `let`.`let`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `let`.`let` ;

CREATE TABLE IF NOT EXISTS `let`.`let` (
  `id` VARCHAR(10) NOT NULL,
  `terminal` TINYINT NOT NULL,
  `gate` INT UNSIGNED NOT NULL,
  `letadlo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`, `letadlo`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO let(id,terminal,gate,letadlo) VALUES('GG1111','3',5,'letadlo1');
INSERT INTO let(id,terminal,gate,letadlo) VALUES('KKT123','3',5,'ultrafastobamaletadlo');
INSERT INTO let(id,terminal,gate,letadlo) VALUES('YO5559','3',5,'padajiciletadlo');
INSERT INTO let(id,terminal,gate,letadlo) VALUES('PP2222','3',65,'letadlo2');