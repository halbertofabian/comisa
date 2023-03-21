<div class="row">
    <div class="col-12">
        <div class="card table-responsive">
            <div class="card-body">
                <table class="table table-striped table-bordered" style="width: 100%;" id="datatable_clientes_lista_blanca">
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
                        </tr>
                    </thead>

                </table>
            </div>
        </div>


    </div>


</div>

<script>
    $(document).ready(function() {
        mostrarClientesListaBlanca();
    });

    function mostrarClientesListaBlanca() {
        datatable_clientes_lista_blanca = $('#datatable_clientes_lista_blanca').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            'ajax': {
                'url': urlApp + 'app/modulos/clientes/clientes.ajax.php',
                'method': 'POST', //usamos el metodo POST
                'data': {
                    btnMostrarClientesListaBlanca: true,
                }, //enviamos opcion 4 para que haga un SELECT
                'dataSrc': ''
            },
            'bDestroy': true,
            'columns': [{
                    'data': 'ctr_ruta'
                },
                {
                    'data': 'ctr_cliente'
                },
                {
                    'data': 'clts_telefono'
                },
                {
                    'data': 'clts_domicilio'
                },
                {
                    'data': 'clts_coordenadas'
                },
                {
                    'data': 'ctr_status_cuenta'
                },
                {
                    'data': 'clts_curp'
                },
                {
                    'data': 'ctr_nota'
                },
                {
                    'data': 'ctr_numero_cuenta'
                },
                {
                    'data': 'ctr_productos'
                },
                {
                    'data': 'ctr_fecha_contrato'
                },
            ]
        });
    }
</script>