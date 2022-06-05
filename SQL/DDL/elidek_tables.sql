SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


CREATE SCHEMA IF NOT EXISTS `elidek` DEFAULT CHARACTER SET utf8 ;
USE `elidek` ;



--Tables

CREATE TABLE IF NOT EXISTS `elidek`.`stelehos` (
  `ID_stelehous` INT NOT NULL AUTO_INCREMENT,
  `Onoma_stelehous` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`ID_stelehous`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `elidek`.`epistimoniko_pedio` (
  `ID_epistimoniko_pediou` INT NOT NULL AUTO_INCREMENT,
  `Onoma_epistimoniko_pediou` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`ID_epistimoniko_pediou`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `elidek`.`organismos` (
  `ID_Organismou` INT NOT NULL AUTO_INCREMENT,
  `Onoma_organismou` VARCHAR(50) DEFAULT NULL,
  `Syntomografia_organismou` VARCHAR(15) DEFAULT NULL,
  `T_K_organismou` INT DEFAULT NULL,
  `Odos_organismou` VARCHAR(50) DEFAULT NULL,
  `Poli_organismou` VARCHAR(50) DEFAULT NULL,
  `Katigories_organismou` VARCHAR(200) DEFAULT NULL CHECK (Katigories_organismou in ('Etairies_Idia_Kefalaia','Panepistimio_proypologismos_apo_Ypoyrgeio',
    'Ereynitika_kentra_proypologismos_idiotikes_draseis','Ereynitika_kentra_proypologismos_Ypoyrgeio')),
  PRIMARY KEY (`ID_Organismou`))
ENGINE = InnoDB;

-- First table with foreign key constrain

CREATE TABLE IF NOT EXISTS `elidek`.`ereunitis` (
  `ID_ereuniti` INT NOT NULL AUTO_INCREMENT,
  `Onoma_ereuniti` VARCHAR(20) DEFAULT NULL,
  `Epitheto_ereuniti` VARCHAR(20) DEFAULT NULL,
  `Fyllo_ereuniti` VARCHAR(15) DEFAULT NULL,
  `Hmerominia_gennisis_ereuniti` DATE DEFAULT NULL  ,
  `Hlikia_ereuniti` INT DEFAULT NULL CHECK ( Hlikia_ereuniti  >= 18 AND Hlikia_ereuniti  <= 67 ),
  `Hmerominia_ypallikis_sxesis` DATE DEFAULT NULL,
  `ID_Organismou` INT NOT NULL,
  PRIMARY KEY (`ID_ereuniti`),
  CONSTRAINT `ID_Organismou`
    FOREIGN KEY (`ID_Organismou`)
    REFERENCES `elidek`.`organismos` (`ID_Organismou`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `elidek`.`aksiologisi` (
  `ID_aksiologisi` INT NOT NULL AUTO_INCREMENT,
  `Bathmos` INT DEFAULT NULL CHECK ( Bathmos >= 0 AND Bathmos <= 10),
  `Hmerominia_aksiologisi` DATE DEFAULT NULL,
  `ID_ereuniti` INT NOT NULL,
  PRIMARY KEY (`ID_aksiologisi`),
  CONSTRAINT `ID_ereuniti`
    FOREIGN KEY (`ID_ereuniti`)
    REFERENCES `elidek`.`ereunitis` (`ID_ereuniti`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `elidek`.`programma` (
  `ID_programma` INT NOT NULL AUTO_INCREMENT,
  `Onoma_programma` VARCHAR(50) DEFAULT NULL,
  `Dieuthinsi_programma` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`ID_programma`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `elidek`.`ergo` (
  `ID_ergou` INT NOT NULL AUTO_INCREMENT,
  `Titlos_ergou` VARCHAR(45) DEFAULT NULL,
  `Perilipsi_ergou` VARCHAR(400) DEFAULT  NULL,
  `Poso_ergou` INT DEFAULT NULL,
  `Hmerominia_enarksis_ergou` DATE DEFAULT NULL,
  `Hmerominia_liksis_ergou` DATE DEFAULT NULL,
  `Diarkeia_ergou` INT DEFAULT NULL CHECK ( Diarkeia_ergou >= 1 AND Diarkeia_ergou <= 4 ),
  `ID_stelehouss` INT NOT NULL,
  `ID_aksiologiti` INT NOT NULL,  
  `ID_aksiologisii` INT NOT NULL,
  `ID_programmaa` INT NOT NULL,
  `ID_Organismouu` INT NOT NULL,
  PRIMARY KEY (`ID_ergou`),
  CONSTRAINT `ID_stelehouss`
    FOREIGN KEY (`ID_stelehouss`)
    REFERENCES `elidek`.`stelehos` (`ID_stelehous`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ID_aksiologiti`
    FOREIGN KEY (`ID_aksiologiti`)
    REFERENCES `elidek`.`ereunitis` (`ID_ereuniti`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ID_aksiologisii`
    FOREIGN KEY (`ID_aksiologisii`)
    REFERENCES `elidek`.`aksiologisi` (`ID_aksiologisi`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ID_programmaa`
    FOREIGN KEY (`ID_programmaa`)
    REFERENCES `elidek`.`programma` (`ID_programma`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ID_Organismouu`
    FOREIGN KEY (`ID_Organismouu`)
    REFERENCES `elidek`.`organismos` (`ID_Organismou`)
    ON DELETE CASCADE
    ON UPDATE CASCADE )
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `elidek`.`paradoteo` (
  `ID_paradoteo` INT NOT NULL AUTO_INCREMENT
  `Titlos_paradoteou` VARCHAR(50) NOT NULL ,
  `ID_ergou` INT NOT NULL,
  `Perilipsi_paradoteou` VARCHAR(400) DEFAULT NULL,
  `Hmerominia_paradosis_paradoteou` DATE DEFAULT NULL,
  PRIMARY KEY (`ID_paradoteo`),
  CONSTRAINT `ID_ergou`
    FOREIGN KEY (`ID_ergou`)
    REFERENCES `elidek`.`ergo` (`ID_ergou`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `elidek`.`ergazetai_se_ergo` (
  `ID_ergazetai_se_ergo` INT NOT NULL AUTO_INCREMENT,
  `ID_ergouu` INT NOT NULL,
  `ID_ereunitiii` INT NULL,
    `ID_epist_ypeuthinou` INT  NULL,
  PRIMARY KEY (`ID_ergazetai_se_ergo`),
  CONSTRAINT `ID_ergouu`
    FOREIGN KEY (`ID_ergouu`)
    REFERENCES `elidek`.`ergo` (`ID_ergou`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ID_ereunitiii`
    FOREIGN KEY (`ID_ereunitiii`)
    REFERENCES `elidek`.`ereunitis` (`ID_ereuniti`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `elidek`.`phone_number_organismos` (
  `phone_number` DECIMAL(10,0) NOT NULL,
  `ID_Organismouuu` INT NOT NULL,
  PRIMARY KEY (`phone_number`),
  CONSTRAINT `ID_Organismouuu`
    FOREIGN KEY (`ID_Organismouuu`)
    REFERENCES `elidek`.`organismos` (`ID_Organismou`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `elidek`.`epistimoniko_pedio_ergou` (
  `ID_epistimoniko_pedio_ergou` INT NOT NULL AUTO_INCREMENT,
  `ID_epistimoniko_pediouu` INT NOT NULL,
  `ID_ergouuu` INT NOT NULL,
  PRIMARY KEY (`ID_epistimoniko_pedio_ergou`),
  CONSTRAINT `ID_epistimoniko_pediouu`
    FOREIGN KEY (`ID_epistimoniko_pediouu`)
    REFERENCES `elidek`.`epistimoniko_pedio` (`ID_epistimoniko_pediou`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ID_ergouuu`
    FOREIGN KEY (`ID_ergouuu`)
    REFERENCES `elidek`.`ergo` (`ID_ergou`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
