CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  clave VARCHAR(255) NOT NULL,
  rol ENUM('admin', 'maestro') DEFAULT 'maestro'
);

CREATE TABLE espacios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  tipo VARCHAR(50) NOT NULL
);

INSERT INTO espacios (nombre, tipo) VALUES 
('Biblioteca', 'sala'),
('Sala Didactica', 'salon'),
('Laboratorio de Redes', 'laboratorio'),
('Sala de Cómputo 1', 'laboratorio'),
('Sala de Cómputo 2', 'laboratorio'),
('Sala de Cómputo 3', 'laboratorio'),
('Sala de Conferencias', 'sala'),
('Laboratorio IDI', 'laboratorio');

CREATE TABLE reservas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  espacio_id INT NOT NULL,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
  FOREIGN KEY (espacio_id) REFERENCES espacios(id),
  UNIQUE (espacio_id, fecha, hora) -- Previene reservas duplicadas en el mismo horario
);