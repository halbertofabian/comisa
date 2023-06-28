<?php


if (isset($rutas[1]) && $rutas[1] == 'entradas') :
    cargarComponente('breadcrumb', '', 'Entrada a almacen ');
    cargarview2('almacenes/entradas', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'preregistro-mercancia') :
    cargarComponente('breadcrumb', '', 'Pre-registro de mercancia');
    cargarview2('almacenes/preregistro-mercancia', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'listar-pre-registros') :
    cargarComponente('breadcrumb', '', 'Lista de pre-registros');
    cargarview2('almacenes/listar-preregistros', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'listar-mercancia') :
    cargarComponente('breadcrumb', '', 'Lista de mercancia');
    cargarview2('almacenes/listar-mercancia', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'total-mercancia') :
    cargarComponente('breadcrumb', '', 'Lista de inventario');
    cargarview2('almacenes/listar-all-mercancia', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'registrar-almacenes') :
    cargarComponente('breadcrumb', '', 'Registro de almacenes');
    cargarview2('almacenes/registrar-almacenes', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'listar-inventario') :
    cargarComponente('breadcrumb', '', 'Lista de inventario');
    cargarview2('almacenes/listar-inventario', $rutas);
elseif (isset($rutas[1]) && $rutas[1] == 'listar-bitacora') :
    cargarComponente('breadcrumb', '', 'Lista de bitacora');
    cargarview2('almacenes/listar-bitacora', $rutas);
else :
    cargarComponente('breadcrumb', '', 'Gestión de almacenes');
?>
    <form method="post">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Nombre del almacén</label>
                    <input type="hidden" id="ams_id" name="ams_id">
                    <input type="text" name="ams_nombre" id="ams_nombre" class="form-control text-uppercase" placeholder="Escribe el nombre del alamacen" required>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Vendedor</label>
                    <select class="form-control select2" name="ams_vendedor" id="ams_vendedor">
                        <option value="">-Seleccionar-</option>
                        <?php
                        $vendedores = UsuariosModelo::mdlObtenerVendedoresActivos();
                        foreach ($vendedores as $key => $usr) :
                        ?>
                            <option value="<?= $usr['usr_id'] ?>"><?= $usr['usr_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
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

            <table class="table" id="datatable_almacenes">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Vendedor</th>
                        <th>Fechas registro</th>
                        <th>Usuario registro</th>
                        <th></th>
                    </tr>
                </thead>

            </table>

        </div>
    </div>
<?php endif; ?>

<script>
    $(document).ready(function() {
        mostrarAlmacenes();
    });

    function mostrarAlmacenes() {
        datatable_almacenes = $('#datatable_almacenes').DataTable({
            responsive: true,
            'ajax': {
                'url': urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                'method': 'POST', //usamos el metodo POST
                'data': {
                    btnMostrarAlmacenes: true,
                }, //enviamos opcion 4 para que haga un SELECT
                'dataSrc': ''
            },
            'ordering': false,
            'bDestroy': true,
            'columns': [{
                    'data': 'ams_nombre'
                },
                {
                    'data': 'ams_vendedor'
                },
                {
                    'data': 'ams_fecha_registro'
                },
                {
                    'data': 'ams_usuario_registro'
                },
                {
                    'data': 'acciones'
                },
            ]
        });

        datatable_almacenes.on('draw.dt', function() {
            $('.select2').select2(); //Inicializas los select2
        });

    }
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
                                        mostrarAlmacenes();
                                    } else {
                                        mostrarAlmacenes();
                                    }
                                });
                        }
                    }
                });
            } else {}
        });

    });
    $(document).on('click', '.btnEditarAlmacen', function() {
        var ams_id = $(this).attr("ams_id");
        var datos = new FormData()
        datos.append('ams_id', ams_id);
        datos.append('btnObtenerAlmacenByID', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if(res){
                    $("#ams_id").val(res.ams_id);
                    $("#ams_nombre").val(res.ams_nombre);
                    $("#ams_vendedor").val(res.ams_vendedor).trigger('change');
                }
            }
        });

    });

    $(document).on('change', '.ams_vendedor', function() {
        var ams_id = $(this).attr('ams_id');
        var ams_vendedor = $(this).val();
        var datos = new FormData()
        datos.append('ams_id', ams_id);
        datos.append('ams_vendedor', ams_vendedor);
        datos.append('btnAsignarVendedor', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    swal({
                        title: '¡Bien!',
                        text: 'EL vendedor se asigno correctamente.',
                        type: 'success',
                        icon: 'success'
                    }).then(function() {
                        mostrarAlmacenes();
                    });
                } else {
                    toastr.error('Hubo un error', '¡ERROR!');
                }
            }
        });
    });
</script>