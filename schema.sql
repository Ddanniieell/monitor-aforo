CREATE DATABASE IF NOT EXISTS monitor_aforo;
USE monitor_aforo;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user'
);

CREATE TABLE IF NOT EXISTS accesos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('entrada','salida') NOT NULL,
    fecha_hora DATETIME NOT NULL
);

-- Insertar usuario admin por defecto con password "admin123"
INSERT INTO usuarios (username, password, role) VALUES ('admin', '$2y$10$K5ZsiFtGlVhkpaezTz13zeD1mM.Hj9XGJJ4mPEkHRq3MmQfV2yXqG', 'admin');
-- La contraseña es hash de "admin123" con password_hash en PHP
