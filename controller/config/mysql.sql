/* ---------------------------------------------------- */
/*  Generated by Enterprise Architect Version 15.2 		*/
/*  Created On : 21-Jan-2024 5:14:47 PM 				*/
/*  DBMS       : MySql 						*/
/* ---------------------------------------------------- */

SET FOREIGN_KEY_CHECKS=0
;
/* Drop Tables */


DROP TABLE IF EXISTS `Clips`
;

DROP TABLE IF EXISTS `Extras`
;

DROP TABLE IF EXISTS `Jobs`
;

DROP TABLE IF EXISTS `LanyardTypes`
;

DROP TABLE IF EXISTS `Orders_Users`
;

DROP TABLE IF EXISTS `Amount`
;

DROP TABLE IF EXISTS `Password_Recovery_Tokens` CASCADE
;

DROP TABLE IF EXISTS `Users`
;

DROP TABLE IF EXISTS `noColours`
;

DROP TABLE IF EXISTS `SidePrinted`
;

DROP TABLE IF EXISTS `Width`
;

DROP TABLE IF EXISTS `Artwork`
;

DROP TABLE IF EXISTS `Orders`
;

DROP TABLE IF EXISTS `Lanyards`
;


/* Create Tables */

CREATE TABLE `Amount`
(
	`idPriceAmount` INT NOT NULL AUTO_INCREMENT,
	`min-amount` INT NULL,
	`max-amount` INT NULL,
	`price` FLOAT(5,2) NULL,
	`idNoColour` INT NULL,
	CONSTRAINT `PK_Price_Amount` PRIMARY KEY (`idPriceAmount` ASC)
)

;

CREATE TABLE `Artwork`
(
	`idArtwork` INT NOT NULL,
	`idLanyard` INT NULL,
	CONSTRAINT `PK_Artwork` PRIMARY KEY (`idArtwork` ASC)
)

;

CREATE TABLE `Clips`
(
	`idClip` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`price` FLOAT(5,2) NOT NULL,
	`imgLinkOneEnd` TEXT NULL,
	`imgLinkTwoEnd` TEXT NULL,
	`idWidth` INT NULL,
	CONSTRAINT `PK_Clips` PRIMARY KEY (`idClip` ASC)
)

;

CREATE TABLE `Extras`
(
	`idExtras` INT NOT NULL AUTO_INCREMENT,
	`group` VARCHAR(50) NOT NULL,
	`type` VARCHAR(50) NOT NULL,
	`price` FLOAT(5,2) NOT NULL,
	`idLanyard` INT NULL,
	CONSTRAINT `PK_extras` PRIMARY KEY (`idExtras` ASC)
)

;

CREATE TABLE `Jobs`
(
	`idJobs` INT NOT NULL,
	`idOrder` INT NULL,
	CONSTRAINT `PK_Jobs` PRIMARY KEY (`idJobs` ASC)
)

;

CREATE TABLE `Lanyards`
(
	`idLanyard` INT NOT NULL AUTO_INCREMENT,
	`material` VARCHAR(50) NOT NULL,
	`linkImg` TEXT NULL,
	`description` TEXT NULL,
	CONSTRAINT `PK_Lanyards` PRIMARY KEY (`idLanyard` ASC)
)

;

CREATE TABLE `LanyardTypes`
(
	`idLanayardType` INT NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(50) NULL,
	`price` FLOAT(3,2) NULL,
	`imgLink` TEXT NULL,
	`idLanyard` INT NULL,
	CONSTRAINT `PK_LanyardTypes` PRIMARY KEY (`idLanayardType` ASC)
)

;

CREATE TABLE `noColours`
(
	`idNoColour` INT NOT NULL AUTO_INCREMENT,
	`option` VARCHAR(50) NOT NULL,
	`idSidePrinted` INT NULL,
	CONSTRAINT `PK_noColours` PRIMARY KEY (`idNoColour` ASC)
)

;

CREATE TABLE `Orders`
(
	`idOrder` INT NOT NULL AUTO_INCREMENT,
	CONSTRAINT `PK_Orders` PRIMARY KEY (`idOrder` ASC)
)

;

CREATE TABLE `Orders_Users`
(
	`idUsersOrders` INT NOT NULL AUTO_INCREMENT,
	`idUser` INT NULL,
	`idOrder` INT NULL,
	CONSTRAINT `PK_Orders_Users` PRIMARY KEY (`idUsersOrders` ASC)
)

;

CREATE TABLE `Password_Recovery_Tokens`
(
	`id` INT NOT NULL AUTO_INCREMENT,
	`token` VARCHAR(64) NOT NULL,
	`creation_date` DATETIME NOT NULL,
	`expiration_date` DATETIME NOT NULL,
	`used` BOOL NOT NULL DEFAULT 0,
	`idUser` INT NULL,
	CONSTRAINT `PK_Password_Recovery_Tokens` PRIMARY KEY (`id` ASC)
)

;

CREATE TABLE `SidePrinted`
(
	`idSidePrinted` INT NOT NULL AUTO_INCREMENT,
	`noSides` VARCHAR(50) NOT NULL,
	`idWidth` INT NULL,
	CONSTRAINT `PK_Side_printed` PRIMARY KEY (`idSidePrinted` ASC)
)

;

CREATE TABLE `Users`
(
	`idUser` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`email` VARCHAR(80) NOT NULL,
	`password` TEXT NULL,
	`signup_category` VARCHAR(50) NULL,
	CONSTRAINT `PK_Users` PRIMARY KEY (`idUser` ASC)
)

;

CREATE TABLE `Width`
(
	`idWidth` INT NOT NULL AUTO_INCREMENT,
	`width` VARCHAR(20) NOT NULL,
	`imgLink` TEXT NULL,
	`idLanyard` INT NOT NULL,
	CONSTRAINT `PK_Width` PRIMARY KEY (`idWidth` ASC)
)

;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE `Password_Recovery_Tokens`
 ADD INDEX `IXFK_Password_Recovery_Tokens_Users` (`idUser` ASC)
;

/* Create Foreign Key Constraints */

ALTER TABLE `Amount`
 ADD CONSTRAINT `FK_Price_Amount_noColours`
	FOREIGN KEY (`idNoColour`) REFERENCES `noColours` (`idNoColour`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Artwork`
 ADD CONSTRAINT `FK_Artwork_Lanyards`
	FOREIGN KEY (`idLanyard`) REFERENCES `Lanyards` (`idLanyard`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Clips`
 ADD CONSTRAINT `FK_Clips_Width`
	FOREIGN KEY (`idWidth`) REFERENCES `Width` (`idWidth`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Extras`
 ADD CONSTRAINT `FK_Extras_Lanyards`
	FOREIGN KEY (`idLanyard`) REFERENCES `Lanyards` (`idLanyard`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Jobs`
 ADD CONSTRAINT `FK_Jobs_Orders`
	FOREIGN KEY (`idOrder`) REFERENCES `Orders` (`idOrder`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `LanyardTypes`
 ADD CONSTRAINT `FK_LanyardTypes_Lanyards`
	FOREIGN KEY (`idLanyard`) REFERENCES `Lanyards` (`idLanyard`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `noColours`
 ADD CONSTRAINT `FK_noColours_SidePrinted`
	FOREIGN KEY (`idSidePrinted`) REFERENCES `SidePrinted` (`idSidePrinted`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Orders_Users`
 ADD CONSTRAINT `FK_Orders_Users_Orders`
	FOREIGN KEY (`idOrder`) REFERENCES `Orders` (`idOrder`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Orders_Users`
 ADD CONSTRAINT `FK_Orders_Users_Users`
	FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Password_Recovery_Tokens`
 ADD CONSTRAINT `FK_Password_Recovery_Tokens_Users`
	FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `SidePrinted`
 ADD CONSTRAINT `FK_SidePrinted_Width`
	FOREIGN KEY (`idWidth`) REFERENCES `Width` (`idWidth`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Width`
 ADD CONSTRAINT `FK_Width_Lanyards`
	FOREIGN KEY (`idLanyard`) REFERENCES `Lanyards` (`idLanyard`) ON DELETE Restrict ON UPDATE Restrict
;

SET FOREIGN_KEY_CHECKS=1
;
