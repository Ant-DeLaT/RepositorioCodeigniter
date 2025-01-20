CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único para cada usuario
name VARCHAR(100) NOT NULL, -- Nombre del usuario, obligatorio
email VARCHAR(150) NOT NULL UNIQUE, -- Email del usuario, obligatorio y único
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación del
registro
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE
CURRENT_TIMESTAMP -- Fecha de última actualización
);