-- Active: 1700211668325@@127.0.0.1@3306@brief8
CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(50),
    last_name varchar(50),
    email varchar(255),
    password VARCHAR(255),
    profile varchar(255),
    isAdmin BOOLEAN DEFAULT 0
)