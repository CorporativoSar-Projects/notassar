-- MySQL Script generated by MySQL Workbench
-- Wed Feb  7 21:48:29 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema notasinnsolDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema notasinnsolDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `notasinnsolDB` DEFAULT CHARACTER SET utf8 ;
USE `notasinnsolDB` ;

-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Users` (
  `US_Id` INT NOT NULL AUTO_INCREMENT,
  `US_Email` VARCHAR(255) NOT NULL,
  `US_Password` VARCHAR(64) NOT NULL,
  `US_Name` VARCHAR(150) NOT NULL,
  `US_Pat_Sur` VARCHAR(100) NOT NULL,
  `US_Mat_Sur` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`US_Id`),
  UNIQUE INDEX `US_Email_UNIQUE` (`US_Email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Products` (
  `PR_Id` INT NOT NULL AUTO_INCREMENT,
  `PR_Name` VARCHAR(150) NOT NULL,
  `PR_Price` DOUBLE NOT NULL,
  `PR_Description` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`PR_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Packages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Packages` (
  `PC_Id` INT NOT NULL AUTO_INCREMENT,
  `PC_Name` VARCHAR(150) NOT NULL,
  `PC_Description` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`PC_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Themes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Themes` (
  `TH_Id` INT NOT NULL AUTO_INCREMENT,
  `TH_Name` VARCHAR(150) NOT NULL,
  `TH_File_Name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`TH_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Companies` (
  `CO_Id` INT NOT NULL AUTO_INCREMENT,
  `CO_Email` VARCHAR(255) NOT NULL,
  `CO_Password` VARCHAR(50) NOT NULL,
  `CO_Name` VARCHAR(150) NOT NULL,
  `CO_Code` VARCHAR(20) NOT NULL,
  `CO_Web` MEDIUMTEXT NOT NULL,
  `CO_Telephone` VARCHAR(20) NOT NULL,
  `CO_Direction` VARCHAR(512) NOT NULL,
  `CO_Logo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CO_Id`),
  UNIQUE INDEX `CO_Email_UNIQUE` (`CO_Email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Company_Theme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Company_Theme` (
  `CT_CO_Id` INT NOT NULL,
  `CT_TH_Id` INT NOT NULL,
  UNIQUE INDEX `CO_Id_UNIQUE` (`CT_CO_Id` ASC),
  INDEX `FK_CO_TH_Theme_Id_idx` (`CT_TH_Id` ASC),
  CONSTRAINT `FK_CT_Company_Id`
    FOREIGN KEY (`CT_CO_Id`)
    REFERENCES `notasinnsolDB`.`Companies` (`CO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_CT_Theme_Id`
    FOREIGN KEY (`CT_TH_Id`)
    REFERENCES `notasinnsolDB`.`Themes` (`TH_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`User_Packages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`User_Packages` (
  `UP_US_Id` INT NOT NULL,
  `UP_PC_Id` INT NOT NULL,
  UNIQUE INDEX `UP_US_Id_UNIQUE` (`UP_US_Id` ASC),
  INDEX `FK_UP_Package_Id_idx` (`UP_PC_Id` ASC),
  CONSTRAINT `FK_UP_User_Id`
    FOREIGN KEY (`UP_US_Id`)
    REFERENCES `notasinnsolDB`.`Users` (`US_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_UP_Package_Id`
    FOREIGN KEY (`UP_PC_Id`)
    REFERENCES `notasinnsolDB`.`Packages` (`PC_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Notes` (
  `NO_Id` INT NOT NULL AUTO_INCREMENT,
  `NO_Folio` VARCHAR(25) NOT NULL,
  `NO_Subtotal` DOUBLE NOT NULL,
  `NO_Register_Date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NO_Init_Date` DATE NOT NULL,
  `NO_End_Date` DATE NOT NULL,
  `NO_Iva` DOUBLE NOT NULL,
  `NO_Total` DOUBLE NOT NULL,
  PRIMARY KEY (`NO_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Company_Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Company_Users` (
  `CU_CO_Id` INT NOT NULL,
  `CU_US_Id` INT NOT NULL,
  INDEX `FK_CU_Company_Id_idx` (`CU_CO_Id` ASC),
  INDEX `FK_CU_User_Id_idx` (`CU_US_Id` ASC),
  CONSTRAINT `FK_CU_Company_Id`
    FOREIGN KEY (`CU_CO_Id`)
    REFERENCES `notasinnsolDB`.`Companies` (`CO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_CU_User_Id`
    FOREIGN KEY (`CU_US_Id`)
    REFERENCES `notasinnsolDB`.`Users` (`US_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`User_Notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`User_Notes` (
  `UN_US_Id` INT NOT NULL,
  `UN_NO_Id` INT NOT NULL,
  INDEX `FK_UN_User_Id_idx` (`UN_US_Id` ASC),
  INDEX `FK_UN_Note_Id_idx` (`UN_NO_Id` ASC),
  CONSTRAINT `FK_UN_User_Id`
    FOREIGN KEY (`UN_US_Id`)
    REFERENCES `notasinnsolDB`.`Users` (`US_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_UN_Note_Id`
    FOREIGN KEY (`UN_NO_Id`)
    REFERENCES `notasinnsolDB`.`Notes` (`NO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`TypesOfNotes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`TypesOfNotes` (
  `TN_Id` INT NOT NULL AUTO_INCREMENT,
  `TN_Name` VARCHAR(100) NOT NULL,
  `TN_Percentage` DOUBLE NOT NULL,
  PRIMARY KEY (`TN_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Note_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Note_Type` (
  `NT_NO_Id` INT NOT NULL,
  `NT_TY_Id` INT NOT NULL,
  UNIQUE INDEX `NT_NO_Id_UNIQUE` (`NT_NO_Id` ASC),
  INDEX `FK_NT_Type_Id_idx` (`NT_TY_Id` ASC),
  CONSTRAINT `FK_NT_Note_Id`
    FOREIGN KEY (`NT_NO_Id`)
    REFERENCES `notasinnsolDB`.`Notes` (`NO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_NT_Type_Id`
    FOREIGN KEY (`NT_TY_Id`)
    REFERENCES `notasinnsolDB`.`TypesOfNotes` (`TN_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Note_Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Note_Products` (
  `NP_NO_Id` INT NOT NULL,
  `NP_PR_Id` INT NOT NULL,
  `NP_Quantity` INT NOT NULL,
  `NP_Amount` DOUBLE NOT NULL,
  INDEX `FK_NP_Note_Id_idx` (`NP_NO_Id` ASC),
  INDEX `FK_NP_Product_Id_idx` (`NP_PR_Id` ASC),
  CONSTRAINT `FK_NP_Note_Id`
    FOREIGN KEY (`NP_NO_Id`)
    REFERENCES `notasinnsolDB`.`Notes` (`NO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_NP_Product_Id`
    FOREIGN KEY (`NP_PR_Id`)
    REFERENCES `notasinnsolDB`.`Products` (`PR_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`TypesOfUsers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`TypesOfUsers` (
  `TU_Id` INT NOT NULL AUTO_INCREMENT,
  `TU_Name` VARCHAR(150) NOT NULL,
  `TU_Description` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`TU_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`User_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`User_Type` (
  `UT_US_Id` INT NOT NULL,
  `UT_TY_Id` INT NOT NULL,
  UNIQUE INDEX `UT_US_Id_UNIQUE` (`UT_US_Id` ASC),
  INDEX `FK_UT_Type_User_Id_idx` (`UT_TY_Id` ASC),
  CONSTRAINT `FK_UT_User_Id`
    FOREIGN KEY (`UT_US_Id`)
    REFERENCES `notasinnsolDB`.`Users` (`US_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_UT_Type_User_Id`
    FOREIGN KEY (`UT_TY_Id`)
    REFERENCES `notasinnsolDB`.`TypesOfUsers` (`TU_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Labels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Labels` (
  `LA_CO_Id` INT NOT NULL,
  `LA_Date` VARCHAR(50) NOT NULL,
  `LA_Foil` VARCHAR(50) NOT NULL,
  `LA_Init_Date` VARCHAR(45) NOT NULL,
  `LA_End_Date` VARCHAR(45) NOT NULL,
  `LA_Name_Cl` VARCHAR(50) NOT NULL,
  `LA_Email_Cl` VARCHAR(45) NOT NULL,
  `LA_Telephone_Cl` VARCHAR(45) NOT NULL,
  `LA_Direction_Cl` VARCHAR(45) NOT NULL,
  `LA_Type_Note_Cl` VARCHAR(50) NOT NULL,
  `LA_Catalogue_Services` VARCHAR(45) NOT NULL,
  `LA_Id_Service` VARCHAR(45) NOT NULL,
  `LA_Service` VARCHAR(45) NOT NULL,
  `LA_Name_Service` VARCHAR(45) NOT NULL,
  `LA_Add_Service` VARCHAR(45) NOT NULL,
  `LA_Delete_Service` VARCHAR(45) NOT NULL,
  `LA_Consult` VARCHAR(45) NOT NULL,
  `LA_Description` VARCHAR(45) NOT NULL,
  `LA_Quantity` VARCHAR(45) NOT NULL,
  `LA_Unit_Price` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`LA_CO_Id`),
  CONSTRAINT `FK_LA_Company_Id`
    FOREIGN KEY (`LA_CO_Id`)
    REFERENCES `notasinnsolDB`.`Companies` (`CO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Company_Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Company_Products` (
  `CP_CO_Id` INT NOT NULL,
  `CP_PR_Id` INT NOT NULL,
  INDEX `FK_CP_Company_Id_idx` (`CP_CO_Id` ASC),
  INDEX `FK_CP_Product_Id_idx` (`CP_PR_Id` ASC),
  CONSTRAINT `FK_CP_Company_Id`
    FOREIGN KEY (`CP_CO_Id`)
    REFERENCES `notasinnsolDB`.`Companies` (`CO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_CP_Product_Id`
    FOREIGN KEY (`CP_PR_Id`)
    REFERENCES `notasinnsolDB`.`Products` (`PR_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Clients` (
  `CL_Id` INT NOT NULL AUTO_INCREMENT,
  `CL_Name` VARCHAR(150) NOT NULL,
  `CL_Email` VARCHAR(250) NOT NULL,
  `CL_Address` VARCHAR(512) NOT NULL,
  `CL_Number` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`CL_Id`),
  UNIQUE INDEX `CL_Email_UNIQUE` (`CL_Email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Client_Notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Client_Notes` (
  `CN_CL_Id` INT NOT NULL,
  `CN_NO_Id` INT NOT NULL,
  INDEX `FK_CN_CL_Id_idx` (`CN_CL_Id` ASC),
  INDEX `FK_CN_NO_Id_idx` (`CN_NO_Id` ASC),
  CONSTRAINT `FK_CN_CL_Id`
    FOREIGN KEY (`CN_CL_Id`)
    REFERENCES `notasinnsolDB`.`Clients` (`CL_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_CN_NO_Id`
    FOREIGN KEY (`CN_NO_Id`)
    REFERENCES `notasinnsolDB`.`Notes` (`NO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`TypesOfClients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`TypesOfClients` (
  `TC_Id` INT NOT NULL AUTO_INCREMENT,
  `TC_Name` VARCHAR(150) NOT NULL,
  `TC_Description` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`TC_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Client_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Client_Type` (
  `CT_CL_Id` INT NOT NULL,
  `CT_TC_Id` INT NOT NULL,
  INDEX `FK_CT_CL_Id_idx` (`CT_CL_Id` ASC),
  INDEX `FK_CT_TC_Id_idx` (`CT_TC_Id` ASC),
  UNIQUE INDEX `CT_CL_Id_UNIQUE` (`CT_CL_Id` ASC),
  CONSTRAINT `FK_CT_CL_Id`
    FOREIGN KEY (`CT_CL_Id`)
    REFERENCES `notasinnsolDB`.`Clients` (`CL_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_CT_TC_Id`
    FOREIGN KEY (`CT_TC_Id`)
    REFERENCES `notasinnsolDB`.`TypesOfClients` (`TC_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `notasinnsolDB`.`Company_Clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notasinnsolDB`.`Company_Clients` (
  `CC_CO_Id` INT NOT NULL,
  `CC_CL_Id` INT NOT NULL,
  INDEX `FK_CC_CO_Id_idx` (`CC_CO_Id` ASC),
  INDEX `FK_CC_CL_Id_idx` (`CC_CL_Id` ASC),
  CONSTRAINT `FK_CC_CO_Id`
    FOREIGN KEY (`CC_CO_Id`)
    REFERENCES `notasinnsolDB`.`Companies` (`CO_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_CC_CL_Id`
    FOREIGN KEY (`CC_CL_Id`)
    REFERENCES `notasinnsolDB`.`Clients` (`CL_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
