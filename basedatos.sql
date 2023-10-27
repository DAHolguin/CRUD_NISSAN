create database `bdlotedecarros`;

use `bdlotedecarros`;

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `cliente` (
  `id_cliente` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `curp` varchar(100) NOT NULL,
  `edad` int(2) NOT NULL,
  `metodo_de_pago` varchar(100) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
    PRIMARY KEY  (`id_cliente`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (id) REFERENCES usuarios(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;