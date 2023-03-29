<?php


if (isset($rutas[1]) && $rutas[1] == 'entradas') :
    cargarComponente('breadcrumb', '', 'Entrada a almacen ');
    cargarview2('almacenes/entradas', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'preregistro-mercancia') :
    cargarComponente('breadcrumb', '', 'Pre-regitro de mercancia');
    cargarview2('almacenes/preregistro-mercancia', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'listar-pre-registros') :
    cargarComponente('breadcrumb', '', 'Lista de pre-registros');
    cargarview2('almacenes/listar-preregistros', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'listar-mercancia') :
    cargarComponente('breadcrumb', '', 'Lista de mercancia');
    cargarview2('almacenes/listar-mercancia', $rutas);
else :
    cargarComponente('breadcrumb', '', 'Gestión de almacenes');
?>
    <form method="post">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="form-group">
                    <label for="">Nombre del almacén</label>
                    <input type="text" name="ams_nombre" id="ams_nombre" class="form-control text-uppercase" placeholder="Escribe el nombre del alamacen" required>
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
                        <th></th>
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
                            <td>
                                <div class="btn-group" role="group" aria-label="">
                                    <button type="button" class="btn btn-danger btnEliminarAlmacen" ams_id="<?= $ams['ams_id'] ?>"><i class="fa fa-trash"></i> Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
<?php endif; ?>

<script>
    $(document).on('click', '.btnEliminarAlmacen', function() {
        var ams_id = $(this).attr("ams_id");
        swal({
            title: '¿Esta seguro de eliminar el alamcen?',
            text: 'Esta accion no es reversible',
            icon: 'warning',
            buttons: ['No', 'Si, eliminar'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var datos = new FormData()
                datos.append('ams_id', ams_id);
                datos.append('btnEliminarAlmacen', true);
                $.ajax({
                    type: 'POST',
                    url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                    data: datos,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status) {
                            swal({
                                    title: "¡Bien!",
                                    text: res.mensaje,
                                    icon: "success",
                                    buttons: [false, "Continuar"],
                                    dangerMode: true,
                                    closeOnClickOutside: false,

                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.reload();
                                    } else {
                                        window.location.reload();
                                    }
                                });
                        }
                    }
                });
            } else {}
        });

    });
</script>