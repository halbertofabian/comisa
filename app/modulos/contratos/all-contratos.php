<!-- <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cargar archivo</h4>
                <form method="post" enctype="multipart/form-data" id="formActualizarStatus">
                    <div class="row">
                        <div class="col-xl-5">
                            <input type="file" class="form-control" name="input_file" id="input_file" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="col-xl-5">
                            <button type="submit" class="btn btn-success btn-load">Actualizar status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered tablas" id="datatable_contratos">
            <thead>
                <tr>
                    <th>VER</th>
                    <th>#TICKET</th>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>CURP</th>
                    <th>DOMICILIO</th>
                    <th>STATUS</th>
                </tr>
            </thead>

        </table>
    </div>
</div>



<script>
    $(document).ready(function() {
        mostrarContratos()
    });

    function mostrarContratos() {
        datatable_contratos = $('#datatable_contratos').DataTable({
            // dom: 'Bfrtip',
            responsive: true,
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ],
            'ajax': {
                'url': urlApp + 'app/modulos/contratos/contratos.ajax.php',
                'method': 'POST', //usamos el metodo POST
                'data': {
                    btnMostrarContratosAll: true,
                }, //enviamos opcion 4 para que haga un SELECT
                'dataSrc': ''
            },
            'bDestroy': true,
            'columns': [{
                    'data': 'acciones'
                },
                {
                    'data': 'ctr_folio'
                },
                {
                    'data': 'ctr_numero_cuenta'
                },
                {
                    'data': 'ctr_cliente'
                },
                {
                    'data': 'clts_curp'
                },
                {
                    'data': 'clts_domicilio'
                },
                {
                    'data': 'ctr_status_cuenta'
                },
            ]
        });
    }
</script>