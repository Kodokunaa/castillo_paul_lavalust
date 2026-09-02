CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    username VARCHAR(100) NOT NULL
);

INSERT INTO users (firstname, lastname, email, username)
VALUES
    ('Paul', 'Castillo', 'castillo.paulgerson@gmail.com', 'paulcastillo'),
    ('Patrick', 'Sola', 'patrick.sola@gmail.com', 'patricksola'),
    ('Bernie', 'Laerin', 'bernie.laerin@gmail.com', 'bernielaerin'),
    ('Hajji', 'Pascual', 'hajji.pascual@gmail.com', 'hajjipascual'),
    ('Rhendel', 'Agosto', 'rhendel.agosto@gmail.com', 'rhendelagosto');
