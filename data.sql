CREATE DATABASE test;
-- Database Creation
CREATE TABLE users (
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    sex VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL PRIMARY KEY,
    birth_date DATE NOT NULL,
    pw VARCHAR(255) NOT NULL
);
-- table Creation