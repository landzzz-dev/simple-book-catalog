CREATE TABLE book_catalogs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Title TEXT(255) NOT NULL,
    ISBN TEXT(255) NOT NULL,
    Author TEXT(255) NOT NULL,
    Publisher TEXT(255) NOT NULL,
    Year INT(4) NOT NULL,
    Category TEXT(255) NOT NULL
)

-- INSERT INTO book_catalogs (
--     Title,
--     ISBN,
--     Author,
--     Publisher,
--     Year,
--     Category
-- )

-- VALUES (
--     'test',
--     'test',
--     'test',
--     'test',
--     2025,
--     'test'
-- )