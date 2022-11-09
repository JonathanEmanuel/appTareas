SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `usuarios`;
DROP TABLE IF EXISTS `tareas`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `usuarios` (
    `id_usuario` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(64) NOT NULL,
    `email` VARCHAR(128) NOT NULL,
    `password` VARCHAR(256) NOT NULL,
    PRIMARY KEY (`id_usuario`)
);

CREATE TABLE `tareas` (
    `id_tarea` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(512) NOT NULL,
    `fecha` DATE NOT NULL,
    `completada` DATE NOT NULL,
    `id_usuario` INTEGER NOT NULL,
    PRIMARY KEY (`id_tarea`)
);

ALTER TABLE `tareas` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios`(`id_usuario`);