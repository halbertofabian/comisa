ALTER TABLE `tbl_prestamos_pms` ADD `pms_tipo` VARCHAR(40) NOT NULL DEFAULT 'Externo' AFTER `pms_usuario_registro`;
///////

ALTER TABLE `tbl_abonos_empleados_absemp` DROP `absemp_saldo`;
ALTER TABLE `tbl_abonos_empleados_absemp` ADD `absemp_id_usuario` INT NOT NULL AFTER `absemp_abono`, ADD `absemp_tipo_prestamo` VARCHAR(50) NOT NULL AFTER `absemp_id_usuario`;