SET SQL_MODE = "STRICT_ALL_TABLES";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `PHPWebsite`;

CREATE DATABASE PHPWebsite;

USE PHPWebsite;
CREATE TABLE `Users`
		(
			`UserID` int (10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`FirstName` varchar(50) NOT NULL,
			`LastName` varchar(50) NOT NULL,
			`UserName` varchar(50) NOT NULL,
			`UserPassword` Varbinary(50) NOT NULL,
			`EmailAddress` varchar(60) NOT NULL,
			`UserType` ENUM ('M', 'A') DEFAULT 'M',
			`DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`JoiningReason` Varchar(500) NULL,
			`HeardAboutUs` varchar(50) NULL
         );
			
CREATE TABLE `Posts` (
		`PostID` INT (10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`UserID` INT (10) UNSIGNED NOT NULL,
		`Title` varchar(60) NOT NULL,
		`Problem` varchar (500),
		`PostedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		`PostStatus` ENUM('Unanswered', 'Answered') DEFAULT 'Unanswered'
     );
		

CREATE TABLE `Comments`
	(
		`CommentID` int (10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`UserID` int (10) UNSIGNED NOT NULL,
		`PostID` INT (10) UNSIGNED NOT NULL,
		`Comment` varchar (500),
		`CommentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
      );



ALTER TABLE `Posts`
		ADD CONSTRAINT `fk_posts_users` FOREIGN KEY (`UserID`) 
			REFERENCES `Users`(`UserID`);

ALTER TABLE `Comments`
		ADD CONSTRAINT `FK_Comments_Posts` FOREIGN KEY (`PostID`)
			REFERENCES `Posts`(`PostID`);

ALTER TABLE `Comments`
		ADD CONSTRAINT `FK_Comments_Users` FOREIGN KEY (`UserID`)
			REFERENCES `Users`(`UserID`);



INSERT INTO `Users` (UserID, FirstName, LastName, UserName, UserPassword, 
						UserType, EmailAddress, JoiningReason, HeardAboutUs) 
VALUES 
(1, 'Lindsay', 'Campbell', 'LindsayAlice', 'Vooga3.0', 'A', 'lindsay_a_c@hotmail.com', 'ADMIN', 'Creator'),
(2, 'Cody', 'Dupuis','CBDupuisNB', 'password', 'A', 'CBDupuisNB@gmail.com' ,'ADMIN', 'Creator'),
(3, 'Samuel', 'Leger', 'samleg0220', 'bernard9', 'A', 'samuelleger18@gmail.com', 'ADMIN', 'Creator');