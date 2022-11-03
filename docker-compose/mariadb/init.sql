CREATE DATABASE IF NOT EXISTS superlogica;

CREATE TABLE IF NOT EXISTS superlogica.account
(
    name        VARCHAR(255)    NOT NULL,
    userName    VARCHAR(255)    NOT NULL,
    zipCode     VARCHAR(8)      NOT NULL,
    email       VARCHAR(255)    NOT NULL,
    password    VARCHAR(255)    NOT NULL,
    id          INT auto_increment
        PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS superlogica.usuario
(
    cpf        VARCHAR(11)    NOT NULL,
    nome    VARCHAR(255)    NOT NULL,
    id          INT auto_increment
        PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS superlogica.info
(
    cpf        VARCHAR(11)    NOT NULL,
    genero    VARCHAR(1)    NOT NULL,
    ano_nascimento     YEAR(4)    NOT NULL,
    id          INT auto_increment
        PRIMARY KEY
);

INSERT INTO superlogica.usuario (cpf, nome) 
VALUES 
('16798125050', 'Luke Skywalker'),
('59875804045', 'Bruce Wayne'),
('04707649025', 'Diane Prince'),
('21142450040', 'Bruce Banner'),
('83257946074', 'Harley Quinn'),
('07583509025', 'Peter Parker');

INSERT INTO superlogica.info (cpf, genero, ano_nascimento)
VALUES 
('16798125050', 'M', '1976'),
('59875804045', 'M', '1960'),
('04707649025', 'F', '1988'),
('21142450040', 'M', '1954'),
('83257946074', 'F', '1970'),
('07583509025', 'M', '1972');