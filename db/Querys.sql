-- Active: 1673388960407@@127.0.0.1@3306@adventas

-- crear base de datos ADVentas
CREATE DATABASE IF NOT EXISTS ADVentas DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use ADVentas;

-- tabla rol
CREATE TABLE rol (
    idrol INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    PRIMARY KEY (idrol)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insertar datos en tabla rol
INSERT INTO rol (nombre) VALUES ('Admin'),
('Usuario');

-- tabla usuario
CREATE TABLE usuarios (
    idusuario INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cargo VARCHAR(20) NOT NULL,
    usuario VARCHAR(20) NOT NULL,
    password VARCHAR(64) NOT NULL,
    condicion INT(11) NOT NULL,
    idrol INT(11) NOT NULL,
    PRIMARY KEY (idusuario),
    UNIQUE KEY usuario (usuario),
    KEY fk_usuario_rol (idrol),
    CONSTRAINT fk_usuario_rol FOREIGN KEY (idrol) REFERENCES rol (idrol) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insertar datos en tabla usuario
INSERT INTO usuarios (nombre,email,cargo,usuario,password,condicion,idrol) 
VALUES ('Administrador','admin@localhost','Administrador','admin','$2y$04$bpe8pzjxmNB.rdHryppcoeYHW9c.e5F8AwIL/fotWyWBWKDhNdqq.',1,1);

SELECT * FROM usuarios WHERE usuario = 'admin' LIMIT 1;

-- tabla permiso
CREATE TABLE permiso (
    idpermiso INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    PRIMARY KEY (idpermiso)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insertar datos en tabla permiso
INSERT INTO permiso (nombre) 
VALUES ('Administrador'),
       ('Almacen'),
       ('Compras'),
       ('Ventas'),
       ('Acceso'),
       ('Consulta'),
       ('Reporte');

-- tabla rol_permisos
CREATE TABLE rol_permisos (
    idrol INT(11) NOT NULL,
    idpermiso INT(11) NOT NULL,
    PRIMARY KEY (idrol,idpermiso),
    KEY fk_rol_permisos_permiso (idpermiso),
    CONSTRAINT fk_rol_permisos_permiso FOREIGN KEY (idpermiso) REFERENCES permiso (idpermiso) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_rol_permisos_rol FOREIGN KEY (idrol) REFERENCES rol (idrol) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insertar datos en tabla rol_permisos
INSERT INTO rol_permisos (idrol,idpermiso)
VALUES (1,1),
       (1,2),
       (1,3),
       (1,4),
       (1,5),
       (1,6),
       (1,7),
       (2,5),
       (2,6);

SELECT idrol,idpermiso FROM rol_permisos;

SELECT * FROM usuarios;