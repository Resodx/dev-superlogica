CREATE DATABASE IF NOT EXISTS superlogica;

CREATE TABLE IF NOT EXISTS superlogica.user
(
    name        VARCHAR(255)    NOT NULL,
    userName    VARCHAR(255)    NOT NULL,
    zipCode     VARCHAR(8)      NOT NULL,
    email       VARCHAR(255)    NOT NULL,
    password    VARCHAR(255)    NOT NULL,
    id          INT auto_increment
        PRIMARY KEY
);
