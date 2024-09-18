CREATE DATABASE find_my_worker;

USE find_my_worker;

-- Table for Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_number VARCHAR(15) NOT NULL UNIQUE,
    location VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Table for Workers
CREATE TABLE workers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_number VARCHAR(15) NOT NULL UNIQUE,
    location VARCHAR(255) NOT NULL,
    occupation VARCHAR(100) NOT NULL,
    job_description TEXT,
    password VARCHAR(255) NOT NULL
);
