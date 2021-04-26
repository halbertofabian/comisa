DROP TABLE `tbl_abonos_empleados_absemp`


CREATE TABLE `tbl_abonos_empleados_absemp` (
  `absemp_id` int(11) NOT NULL,
  `absemp_fecha` datetime NOT NULL,
  `absemp_abono` double(10,2) NOT NULL,
  `absemp_id_usuario` int(20) NOT NULL,
  `absemp_tipo_prestamo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_abonos_empleados_absemp`
--
ALTER TABLE `tbl_abonos_empleados_absemp`
  ADD PRIMARY KEY (`absemp_id`),
  ADD KEY `abs_usr_id_fk` (`absemp_id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_abonos_empleados_absemp`
--
ALTER TABLE `tbl_abonos_empleados_absemp`
  MODIFY `absemp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_abonos_empleados_absemp`
--
ALTER TABLE `tbl_abonos_empleados_absemp`
  ADD CONSTRAINT `abs_usr_id_fk` FOREIGN KEY (`absemp_id_usuario`) REFERENCES `tbl_abonos_empleados_absemp` (`absemp_id`);





