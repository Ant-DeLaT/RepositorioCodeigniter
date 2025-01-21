-- IF NOT EXISTS CREATE DATABASE baseusuarios
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único para cada usuario
name VARCHAR(100) NOT NULL, -- Nombre del usuario, obligatorio
email VARCHAR(150) NOT NULL UNIQUE, -- Email del usuario, obligatorio y único
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación del registro
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE
CURRENT_TIMESTAMP -- Fecha de última actualización
);
/*
id  name        email                       created_at              updated_at

1 	FirstTime 	testingwaters@first.com 	2025-01-21 09:19:38 	2025-01-21 09:19:38
*/