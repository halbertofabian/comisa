<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="auto_complete_bitacora">Buscar producto</label>
                            <input type="text" class="form-control" name="" id="auto_complete_bitacora" placeholder="Escriba el número de serie y seleccione...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table" id="datatable_bitacora">
                    <thead>
                        <tr>
                            <th>PRODUCTO</th>
                            <th>SERIE</th>
                            <th>MOVIMIENTO</th>
                            <th>FECHA</th>
                            <th>USUARIO REGISTRO</th>
                            <th>DESCRIPCIÓN</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('#auto_complete_bitacora').autocomplete({
        // appendTo: "#modelAddProductos",
        source: function(request, response) {
            $.ajax({
                url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                method: "POST",
                dataType: "json",
                data: {
                    auto_complete_bitacora: request.term
                },
                success: function(data) {
                    response(data);
                }

            });
        },
        minLength: 2,
        select: function(event, ui) {
            var res = ui.item;
            mostrarBitacora(res.spds_id);

        }
    });


    function mostrarBitacora(spds_id) {
        datatable_bitacora = $('#datatable_bitacora').DataTable({
            responsive: true,
            'ajax': {
                'url': urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                'method': 'POST', //usamos el metodo POST
                'data': {
                    spds_id: spds_id,
                    btnMostrarBitacora: true,
                }, //enviamos opcion 4 para que haga un SELECT
                'dataSrc': ''
            },
            'ordering': false,
            'bDestroy': true,
            'columns': [{
                    'data': 'mpds_descripcion'
                },
                {
                    'data': 'spds_serie_completa'
                },
                {
                    'data': 'bcra_movimiento'
                },
                {
                    'data': 'bcra_fecha'
                },
                {
                    'data': 'bcra_usuario'
                },
                {
                    'data': 'bcra_nota'
                },
            ]
        });
    }
</script>