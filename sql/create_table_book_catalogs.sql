-- 1. Create Database
CREATE DATABASE IF NOT EXISTS august_99_exam;

-- 2. Use the newly created database
USE august_99_exam;

-- 3. Create Table
CREATE TABLE IF NOT EXISTS book_catalogs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    ISBN VARCHAR(255) NOT NULL,
    Author VARCHAR(255) NOT NULL,
    Publisher VARCHAR(255) NOT NULL,
    Year INT(4) NOT NULL,
    Category VARCHAR(255) NOT NULL
);

-- 4. Insert Data
INSERT INTO book_catalogs (Title, ISBN, Author, Publisher, Year, Category)
VALUES ('test', 'test', 'test', 'test', 2025, 'test');