/* ---------------------------------------------------- */
/*  Generated by Enterprise Architect Version 17.0 		*/
/*  Created On : 07-Jul-2025 3:21:13 PM 				*/
/*  DBMS       : MySql 						*/
/* ---------------------------------------------------- */

SET FOREIGN_KEY_CHECKS=0
;
/* Drop Tables */

DROP TABLE IF EXISTS `Addresses` CASCADE
;

DROP TABLE IF EXISTS `Amount` CASCADE
;

DROP TABLE IF EXISTS `Artwork` CASCADE
;

DROP TABLE IF EXISTS `Clips` CASCADE
;

DROP TABLE IF EXISTS `Extras` CASCADE
;

DROP TABLE IF EXISTS `Image` CASCADE
;

DROP TABLE IF EXISTS `Jobs` CASCADE
;

DROP TABLE IF EXISTS `Lanyards` CASCADE
;

DROP TABLE IF EXISTS `LanyardTypes` CASCADE
;

DROP TABLE IF EXISTS `noColours` CASCADE
;

DROP TABLE IF EXISTS `Orders` CASCADE
;

DROP TABLE IF EXISTS `Orders_Users` CASCADE
;

DROP TABLE IF EXISTS `Password_Recovery_Tokens` CASCADE
;

DROP TABLE IF EXISTS `SidePrinted` CASCADE
;

DROP TABLE IF EXISTS `Text` CASCADE
;

DROP TABLE IF EXISTS `Users` CASCADE
;

DROP TABLE IF EXISTS `Width` CASCADE
;

/* Create Tables */

CREATE TABLE `Addresses`
(
	`idAddress` INT NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`company_name` VARCHAR(50) NULL,
	`phone` VARCHAR(50) NULL,
	`country` VARCHAR(50) NULL,
	`state` VARCHAR(50) NULL,
	`town_city` VARCHAR(50) NULL,
	`street_address_1` VARCHAR(200) NULL,
	`street_address_2` VARCHAR(200) NULL,
	`postcode` VARCHAR(50) NULL,
	`email_address` VARCHAR(50) NULL,
	`idUser` INT NULL,
	CONSTRAINT `PK_Addresses` PRIMARY KEY (`idAddress` ASC)
)

;

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
	`idJobs` INT NOT NULL,
	`linkRightImage` TEXT NULL,
	`linkLeftImage` TEXT NULL,
	CONSTRAINT `PK_Artwork` PRIMARY KEY (`idJobs` ASC)
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

CREATE TABLE `Image`
(
	`idJobs` INT NOT NULL,
	`timesImage` INT NULL,
	`imageSize` FLOAT(2,2) NULL,
	`spaceBetweenImage` FLOAT(2,2) NULL,
	`imageRotation` FLOAT(2,2) NULL,
	`spaceAlongLanyard` FLOAT(2,2) NULL,
	`linkImage` TEXT NULL,
	`imagePosition` FLOAT(2,2) NULL,
	CONSTRAINT `PK_Images` PRIMARY KEY (`idJobs` ASC)
)

;

CREATE TABLE `Jobs`
(
	`idJobs` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NULL,
	`description` TEXT NULL,
	`price_per_unit` FLOAT(0,0) NULL,
	`amount` INT NULL,
	`total` FLOAT(0,0) NULL,
	`link_pdf` TEXT NULL,
	`notes` TEXT NULL,
	`newColour` BLOB NULL DEFAULT 0,
	`idOrder` INT NULL,
	`idExtras` INT NULL,
	`idClip` INT NULL,
	`idPriceAmount` INT NULL,
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
	`date_time` DATETIME NULL,
	`shippingDays` INT NULL,
	`status` VARCHAR(50) NULL,
	`subtotal` FLOAT(7,3) NULL,
	`tax` FLOAT(7,3) NULL,
	`shipping_price` FLOAT(7,3) NULL,
	`total` FLOAT(7,3) NULL,
	`idUser` INT NULL,
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
	`token` VARCHAR(64) NULL,
	`creation_date` DATETIME NULL,
	`expiration_date` DATETIME NULL,
	`used` BOOL NULL DEFAULT 0,
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

CREATE TABLE `Text`
(
	`idJobs` INT NOT NULL,
	`contentText` VARCHAR(50) NULL,
	`timesText` INT NULL,
	`spaceBetweenText` FLOAT(2,2) NULL,
	`spaceAlongLanyard` FLOAT(2,2) NULL,
	`colourText` VARCHAR(50) NULL,
	`fontFamilyText` VARCHAR(50) NULL,
	`sizeText` FLOAT(2,2) NULL,
	`boldText` BOOL NULL,
	`italicText` BOOL NULL,
	`underlineText` BOOL NULL,
	`textPosition` FLOAT(2,2) NULL,
	CONSTRAINT `PK_Text` PRIMARY KEY (`idJobs` ASC)
)

;

CREATE TABLE `Users`
(
	`idUser` INT NOT NULL,
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

ALTER TABLE `Addresses`
 ADD INDEX `IXFK_Addresses_Users` (`idUser` ASC)
;

ALTER TABLE `Artwork`
 ADD INDEX `IXFK_Artwork_Jobs` (`idJobs` ASC)
;

ALTER TABLE `Image`
 ADD INDEX `IXFK_Image_Jobs` (`idJobs` ASC)
;

ALTER TABLE `Jobs`
 ADD INDEX `IXFK_Jobs_Amount` (`idPriceAmount` ASC)
;

ALTER TABLE `Jobs`
 ADD INDEX `IXFK_Jobs_Clips` (`idClip` ASC)
;

ALTER TABLE `Jobs`
 ADD INDEX `IXFK_Jobs_Extras` (`idExtras` ASC)
;

ALTER TABLE `Jobs`
 ADD INDEX `IXFK_Jobs_Orders` (`idOrder` ASC)
;

ALTER TABLE `LanyardTypes`
 ADD INDEX `IXFK_LanyardTypes_Lanyards` (`idLanyard` ASC)
;

ALTER TABLE `Orders`
 ADD INDEX `IXFK_Orders_Users` (`idUser` ASC)
;

ALTER TABLE `Password_Recovery_Tokens`
 ADD INDEX `IXFK_Password_Recovery_Tokens_Users` (`idUser` ASC)
;

ALTER TABLE `Text`
 ADD INDEX `IXFK_Text_Jobs` (`idJobs` ASC)
;

/* Create Foreign Key Constraints */

ALTER TABLE `Addresses`
 ADD CONSTRAINT `FK_Addresses_Users`
	FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Amount`
 ADD CONSTRAINT `FK_Price_Amount_noColours`
	FOREIGN KEY (`idNoColour`) REFERENCES `noColours` (`idNoColour`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Artwork`
 ADD CONSTRAINT `FK_Artwork_Jobs`
	FOREIGN KEY (`idJobs`) REFERENCES `Jobs` (`idJobs`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Clips`
 ADD CONSTRAINT `FK_Clips_Width`
	FOREIGN KEY (`idWidth`) REFERENCES `Width` (`idWidth`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Extras`
 ADD CONSTRAINT `FK_Extras_Lanyards`
	FOREIGN KEY (`idLanyard`) REFERENCES `Lanyards` (`idLanyard`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Image`
 ADD CONSTRAINT `FK_Image_Jobs`
	FOREIGN KEY (`idJobs`) REFERENCES `Jobs` (`idJobs`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Jobs`
 ADD CONSTRAINT `FK_Jobs_Amount`
	FOREIGN KEY (`idPriceAmount`) REFERENCES `Amount` (`idPriceAmount`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Jobs`
 ADD CONSTRAINT `FK_Jobs_Clips`
	FOREIGN KEY (`idClip`) REFERENCES `Clips` (`idClip`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Jobs`
 ADD CONSTRAINT `FK_Jobs_Extras`
	FOREIGN KEY (`idExtras`) REFERENCES `Extras` (`idExtras`) ON DELETE Restrict ON UPDATE Restrict
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

ALTER TABLE `Orders`
 ADD CONSTRAINT `FK_Orders_Users`
	FOREIGN KEY (`idUser`) REFERENCES `Users` (`idUser`) ON DELETE Restrict ON UPDATE Restrict
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

ALTER TABLE `Text`
 ADD CONSTRAINT `FK_Text_Jobs`
	FOREIGN KEY (`idJobs`) REFERENCES `Jobs` (`idJobs`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `Width`
 ADD CONSTRAINT `FK_Width_Lanyards`
	FOREIGN KEY (`idLanyard`) REFERENCES `Lanyards` (`idLanyard`) ON DELETE Restrict ON UPDATE Restrict
;

SET FOREIGN_KEY_CHECKS=1
;
