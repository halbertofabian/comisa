<?php
cargarComponente('breadcrumb', '', 'Listado de clientes con mal historial');

?>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo HTTP_HOST . 'importar-clientes-mal-historial' ?>" class="btn btn-success">Importar clientes</a>

                <a href="<?php echo HTTP_HOST . 'new-mal-historial' ?>" class="btn btn-primary float-right">Agregar nuevo</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card table-responsive">
            <div class="card-body">
                <table class="table table-striped table-bordered" style="width: 100%;" id="datatable_clientes_mal">
                    <thead>
                        <tr>
                            <th>Ruta</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Domicilio</th>
                            <th>Ubicación</th>
                            <th>Estado</th>
                            <th>Curp</th>
                            <th>Observaciones</th>
                            <th>Cuenta</th>
                            <th>Articulo</th>
                            <th>Fecha venta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>


    </div>


</div>

<script>
    $(document).ready(function() {
        mostrarClientesMalHistorial();
    });

    function mostrarClientesMalHistorial() {
        datatable_clientes_mal = $('#datatable_clientes_mal').DataTable({
            responsive: true,
            'ajax': {
                'url': urlApp + 'app/modulos/clientes/clientes.ajax.php',
                'method': 'POST', //usamos el metodo POST
                'data': {
                    btnMostrarClientesMalHistorial: true,
                }, //enviamos opcion 4 para que haga un SELECT
                'dataSrc': ''
            },
            'bDestroy': true,
            'columns': [{
                    'data': 'clts_ruta'
                },
                {
                    'data': 'clts_nombre'
                },
                {
                    'data': 'clts_telefono'
                },
                {
                    'data': 'clts_domicilio'
                },
                {
                    'data': 'clts_ubicacion'
                },
                {
                    'data': 'clts_tipo_cliente'
                },
                {
                    'data': 'clts_curp'
                },
                {
                    'data': 'clts_observaciones'
                },
                {
                    'data': 'clts_cuenta'
                },
                {
                    'data': 'clts_articulo'
                },
                {
                    'data': 'clts_fecha_venta'
                },
                {
                    'data': 'acciones'
                },
            ]
        });
    }
</script>