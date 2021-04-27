ALTER TABLE `tbl_abonos_empleados_absemp` DROP FOREIGN KEY `abs_usr_id_fk`; ALTER TABLE `tbl_abonos_empleados_absemp` ADD CONSTRAINT `abs_usr_id_fk` FOREIGN KEY (`absemp_id_usuario`) REFERENCES `tbl_usuarios_usr`(`usr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

