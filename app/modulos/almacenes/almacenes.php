<?php
cargarComponente('breadcrumb', '', 'Gestión de almacenes');
?>
<form method="post">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="form-group">
                <label for="">Nombre del almacén</label>
                <input type="text" name="ams_nombre" id="ams_nombre" class="form-control" placeholder="Escribe el nombre del alamacen">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="ams_id_sucursal">¿A que sucursal le asignaras este almacén?</label>
                <select class="form-control" readonly name="ams_id_sucursal" id="ams_id_sucursal">
                    <option value="<?php echo $_SESSION['session_suc']['scl_id'] ?>"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></option>
                    <!-- <?php
                            // $sucursal = SucursalesModelo::mdlMostrarSucursales();
                            // foreach ($sucursal as $key => $scl) :
                            ?> -->
                    <!-- <option value="<?php echo $scl['scl_id']; ?>"><?php echo $scl['scl_nombre']; ?></option> -->
                    <!-- <?php // endforeach; 
                            ?> -->
                </select>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary float-right btn-load mb-5" name="btnAgrearAlmacen">Crear alamacén</button>
        </div>
        <?php
        $craarAlmacen = new AlmacenesControlador();
        $craarAlmacen->ctrAgregarAlmacenes();
        ?>
    </div>
</form>

<div class="row">
    <div class="col-12">

        <table class="table tablas">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fechas registro</th>
                    <th>Usuario registro</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $almacenes = AlmacenesModelo::mdlMostrarAlmacenes($_SESSION['session_suc']['scl_id']);
                foreach ($almacenes as $key => $ams) :
                ?>
                    <tr>
                        <td><?php echo $ams['ams_nombre'] ?></td>
                        <td><?php echo $ams['ams_fecha_registro'] ?></td>
                        <td><?php echo $ams['ams_usuario_registro'] ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>