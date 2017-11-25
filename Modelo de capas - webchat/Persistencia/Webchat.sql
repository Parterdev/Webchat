CREATE DATABASE web_chat DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE web_chat;

CREATE TABLE gender(
gender_id INT NOT NULL AUTO_INCREMENT,
gender_person varchar(7) not null,
PRIMARY KEY(gender_id)
);

CREATE TABLE user_account(
user_account_id INT NOT NULL AUTO_INCREMENT,
user_name VARCHAR(25) NOT NULL,
password_name VARCHAR(20) NOT NULL,
email_user VARCHAR(25) NOT NULL,
first_name VARCHAR(25) NOT NULL,
last_name VARCHAR(25) NOT NULL,
gender_id INT NOT NULL,
PRIMARY KEY(user_account_id)
);

ALTER TABLE user_account ADD CONSTRAINT user_account_gender FOREIGN KEY(gender_id) REFERENCES gender(gender_id);

CREATE TABLE type_lounge(
type_lounge_id INT NOT NULL AUTO_INCREMENT,
use_type VARCHAR(15) NOT NULL,
PRIMARY KEY(type_lounge_id)
);

CREATE TABLE lounge(
lounge_id INT NOT NULL AUTO_INCREMENT,
name_lounge VARCHAR(20) NOT NULL,
password_lounge VARCHAR(20) NOT NULL,
type_lounge_id INT NOT NULL,
PRIMARY KEY(lounge_id)
);

ALTER TABLE lounge ADD CONSTRAINT lounge_type_lounge FOREIGN KEY(type_lounge_id) REFERENCES type_lounge(type_lounge_id);

CREATE TABLE message(
message_id INT NOT NULL AUTO_INCREMENT,
user_account_id INT,
lounge_id INT,
mess_texage VARCHAR(500) NOT NULL,
fecha_message DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY(message_id)
);

ALTER TABLE message ADD CONSTRAINT message_user_account FOREIGN KEY(user_account_id) REFERENCES user_account(user_account_id);
ALTER TABLE message ADD CONSTRAINT message_lounge FOREIGN KEY(lounge_id) REFERENCES lounge(lounge_id);

CREATE TABLE membership(
membership_id INT NOT NULL AUTO_INCREMENT,
user_account_id INT,
lounge_id INT,  
date_initial DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
date_final DATETIME,
PRIMARY KEY(membership_id)
);

ALTER TABLE membership ADD CONSTRAINT membership_user_account FOREIGN KEY(user_account_id) REFERENCES user_account(user_account_id);
ALTER TABLE membership ADD CONSTRAINT membership_lounge FOREIGN KEY(lounge_id) REFERENCES lounge(lounge_id);

