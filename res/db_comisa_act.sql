ALTER TABLE `tbl_abonos_empleados_absemp` DROP FOREIGN KEY `abs_usr_id_fk`; ALTER TABLE `tbl_abonos_empleados_absemp` ADD CONSTRAINT `abs_usr_id_fk` FOREIGN KEY (`absemp_id_usuario`) REFERENCES `tbl_usuarios_usr`(`usr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `tbl_abonos_empleados_absemp` ADD `absemp_usuario_registro` VARCHAR(100) NOT NULL AFTER `absemp_tipo_prestamo`;

//

CREATE TABLE `db_comisa`.`tbl_traspasos_tps` ( `tps_id` INT NOT NULL AUTO_INCREMENT , `tps_num_traspaso` VARCHAR(10) NOT NULL , `tps_user_registro` INT NOT NULL , `tps_tipo` VARCHAR(35) NOT NULL , `tps_ams_id_origen` INT NOT NULL , `tps_ams_id_destino` INT NOT NULL , `tps_user_id_receptor` INT NOT NULL , `tps_lista_productos` TEXT NOT NULL , `tps_fecha` DATETIME NOT NULL , PRIMARY KEY (`tps_id`)) ENGINE = InnoDB;

ALTER TABLE `tbl_traspasos_tps` ADD CONSTRAINT `usr_traspasos_fk` FOREIGN KEY (`tps_user_registroa`) REFERENCES `tbl_usuarios_usr`(`usr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_traspasos_tps` ADD CONSTRAINT `usr_traspasos2_fk` FOREIGN KEY (`tps_user_id_receptor`) REFERENCES `tbl_usuarios_usr`(`usr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_traspasos_tps` ADD CONSTRAINT `ams_traspasos_fk` FOREIGN KEY (`tps_ams_id_origen`) REFERENCES `tbl_almacenes_ams`(`ams_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tbl_traspasos_tps` ADD CONSTRAINT `ams_traspasos2_fk` FOREIGN KEY (`tps_ams_id_destino`) REFERENCES `tbl_almacenes_ams`(`ams_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;