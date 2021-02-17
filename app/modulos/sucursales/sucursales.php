<?php

if (isset($rutas[1]) && $rutas[1] == "new") :
    cargarComponente('breadcrumb', '', 'Nueva sucursal');
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <form method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="scl_nombre">Nombre de la sucursal</label>
                                <input type="text" name="scl_nombre" id="scl_nombre" class="form-control" required placeholder="Nombre de la sucursal">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="scl_direccion">Dirección de la sucursal</label>
                                <input type="text" name="scl_direccion" id="scl_direccion" class="form-control" placeholder="Dirección de la sucursal">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="scl_rfc">RFC</label>
                                <input type="text" name="scl_rfc" id="scl_rfc" class="form-control" placeholder="RFC">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="scl_telefono">Teléfono</label>
                                <input type="text" name="scl_telefono" id="scl_telefono" class="form-control" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="scl_sub_fijo">SUB FIJO</label>
                                <input type="text" name="scl_sub_fijo" id="scl_sub_fijo" class="form-control" required placeholder="SUB FIJO">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-right" name="btnGuardarSucursal">Guardar sucursal</button>
                        </div>
                    </div>
                    <?php

                    $crearSuc = new SucursalesControlador();
                    $crearSuc->ctrAgregarSucursales();
                    ?>
                </form>
            </div>
        </div>
    </div>


<?php else :
    cargarComponente('breadcrumb', '', 'Listar sucursales'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo HTTP_HOST . 'sucursales/new' ?>" class="btn btn-primary float-right mb-4">Nueva sucursal</a>
            </div>
            <div class="col-12">
                <table class="table tablas">
                    <thead>
                        <tr>
                            <th>#ID SUC</th>
                            <th>Nombre</th>
                            <th>SUB FIJO</th>
                            <th>RFC</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Usuario registro</th>
                            <th>Fecha registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sucursales =  SucursalesModelo::mdlMostrarSucursales();
                        foreach ($sucursales as $key => $scl) :
                        ?>
                            <tr>
                                <td><?php echo $scl['scl_id'] ?></td>
                                <td><?php echo $scl['scl_nombre'] ?></td>
                                <td><?php echo $scl['scl_sub_fijo'] ?></td>
                                <td><?php echo $scl['scl_rfc'] ?></td>
                                <td><?php echo $scl['scl_direccion'] ?></td>
                                <td><?php echo $scl['scl_telefono'] ?></td>
                                <td><?php echo $scl['scl_usuario_registro'] ?></td>
                                <td><?php echo $scl['scl_fecha_registro'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<?php endif; ?>