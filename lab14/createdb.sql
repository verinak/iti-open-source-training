-- CREATE DATABASE lab14;
-- USE lab14;
-- SOURCE D:\xampp\htdocs\lab14\createdb.sql

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    userid INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    gender ENUM('M', 'F') NOT NULL,
    mail_status BOOLEAN NOT NULL
);