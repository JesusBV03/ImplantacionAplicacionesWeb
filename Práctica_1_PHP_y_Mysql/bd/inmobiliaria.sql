create database inmobiliaria;
use inmobiliaria;
CREATE TABLE usuario (
    usuario_id int(5) AUTO_INCREMENT PRIMARY KEY,
    nombres varchar(35) NOT NULL,
    correo varchar(100) NOT NULL,
    clave varchar(80) NOT NULL
);
CREATE TABLE pisos (
    Codigo_piso int primary key,
    calle VARCHAR(40) NOT NULL,
    numero INT NOT NULL,
    piso INT NOT NULL,
    puerta VARCHAR(5) NOT NULL,
    cp INT NOT NULL,
    metros INT NOT NULL,
    zona VARCHAR (15),
    precio float NOT NULL,
    imagen varchar(100) NOT NULL,
    usuario_id int(5)references usuario
);
exit;