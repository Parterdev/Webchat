CREATE DATABASE Webchat DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE Webchat;

CREATE TABLE Gender(
genderId INT NOT NULL AUTO_INCREMENT,
genderPerson VARCHAR(10) not null,
PRIMARY KEY(genderId)
);

CREATE TABLE UserAccount(
userAccountId INT NOT NULL AUTO_INCREMENT,
namesUser VARCHAR(50) NOT NULL,
surnames VARCHAR(50) NOT NULL,
nameUser VARCHAR(50) NOT NULL,
passwordUserId VARCHAR(50) NOT NULL,
emailUser VARCHAR(50) NOT NULL,
genderId VARCHAR(10) NOT NULL,
PRIMARY KEY(userAccountId)
);


CREATE TABLE TypeLounge(
typeLoungeId INT NOT NULL AUTO_INCREMENT,
useType VARCHAR(15) NOT NULL,
PRIMARY KEY(typeLoungeId)
);

CREATE TABLE Lounge(
loungeId INT NOT NULL AUTO_INCREMENT,
nameLounge VARCHAR(20) NOT NULL,
passwordLounge VARCHAR(20) NOT NULL,
typeLoungeId INT NOT NULL,
PRIMARY KEY(loungeId)
);

CREATE TABLE Message(
messageId INT NOT NULL AUTO_INCREMENT,
userAccountId INT,
loungeId INT,
messageText VARCHAR(500) NOT NULL,
dateMessage DATETIME,
PRIMARY KEY(messageId)
);

CREATE TABLE Membership(
membershipId INT NOT NULL AUTO_INCREMENT,
userAccountId INT,
loungeId INT,  
dateInitial DATETIME,
dateFinal DATETIME,
PRIMARY KEY(membershipId)
);

CREATE TABLE PasswordUser(
passwordUserId INT NOT NULL AUTO_INCREMENT,
passwordAccountUser BLOB NULL,
PRIMARY KEY (passwordUserId)
);

ALTER TABLE Message ADD CONSTRAINT MessageUserAccount FOREIGN KEY(userAccountId) REFERENCES UserAccount(userAccountId);
ALTER TABLE Message ADD CONSTRAINT MessageLounge FOREIGN KEY(loungeId) REFERENCES Lounge(loungeId);
ALTER TABLE Membership ADD CONSTRAINT MembershipUserAccount FOREIGN KEY(userAccountId) REFERENCES UserAccount(userAccountId);
ALTER TABLE Membership ADD CONSTRAINT MembershipLounge FOREIGN KEY(loungeId) REFERENCES Lounge(loungeId);
ALTER TABLE UserAccount ADD CONSTRAINT UserAccountGender FOREIGN KEY(genderId) REFERENCES Gender(genderId);
ALTER TABLE Lounge ADD CONSTRAINT LoungeTypeLounge FOREIGN KEY(typeLoungeId) REFERENCES TypeLounge(typeLoungeId);

ALTER TABLE UserAccount ADD CONSTRAINT UserAccountPassword FOREIGN KEY(passwordUserId) REFERENCES PasswordUser(passwordUserId);