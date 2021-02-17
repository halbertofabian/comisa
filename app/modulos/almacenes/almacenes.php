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
                <label for="">¿A que sucursal le asignaras este almacén?</label>
                <select class="form-control" name="ams_id_sucursal" id="ams_id_sucursal">
                    <?php
                    $sucursal = SucursalesModelo::mdlMostrarSucursales();
                    foreach ($sucursal as $key => $scl) :
                    ?>
                        <option value="<?php echo $scl['scl_id']; ?>"><?php echo $scl['scl_nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary float-right btn-load" name="btnAgrearAlmacen">Crear alamacén</button>
        </div>
        <?php
        $craarAlmacen = new AlmacenesControlador();
        $craarAlmacen->ctrAgregarAlmacenes();
        ?>
</form>

<div class="row">

</div>