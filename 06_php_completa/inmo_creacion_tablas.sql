create database inmo;

CREATE TABLE usuario (
usuario_id int(5) NOT NULL primary key AUTO_INCREMENT,
nombres varchar(35) NOT NULL,
correo varchar(100) NOT NULL,
clave varchar(80) NOT NULL,
tipo_usuario varchar(20)
);

CREATE TABLE pisos (
codigo_piso int primary key,
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

CREATE TABLE comprados (
usuario_comprador int(5) references usuario(usuario_id),
codigo_piso int references pisos,
precio_final float NOT NULL
);