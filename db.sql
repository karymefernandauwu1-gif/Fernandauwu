
CREATE TABLE IF NOT EXISTS respuestas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    experiencia VARCHAR(40) NOT NULL,
    profesores VARCHAR(40) NOT NULL,
    instalaciones VARCHAR(60) NOT NULL,
    servicio VARCHAR(80) NOT NULL,
    comentario VARCHAR(500) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0
);