CREATE DATABASE opinions_db;

USE opinions_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE opinions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    opinion TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
