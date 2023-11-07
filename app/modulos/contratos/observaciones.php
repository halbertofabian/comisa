<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="">Ruta</label>
                                <select name="ctr_ruta" id="ctr_ruta" class="form-control select2">
                                    <option value="">Selecionar ruta</option>
                                    <?php
                                    for ($i = 1; $i <= 50; $i++) :
                                    ?>
                                        <option value="R<?= $i ?>">R<?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table text-center" id="datatable_observaciones">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="8">Listar de observaciones</th>
                            </tr>
                            <tr>
                                <th>Folio</th>
                                <th>Ruta</th>
                                <th>Cuenta</th>
                                <th>Cliente</th>
                                <th>Observación</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        mostrarObservaciones();
    });

    function mostrarObservaciones() {
        var ctr_ruta = $("#ctr_ruta").val();
        datatable_observaciones = $('#datatable_observaciones').DataTable({
            responsive: true,
            'ajax': {
                'url': urlApp + 'app/modulos/contratos/contratos.ajax.php',
                'method': 'POST', //usamos el metodo POST
                'data': {
                    btnMostrarObservacionesPendientes: true,
                    ctr_ruta: ctr_ruta,
                }, //enviamos opcion 4 para que haga un SELECT
                'dataSrc': ''
            },
            'bDestroy': true,
            'order': false,
            'columns': [{
                    'data': 'ctr_folio'
                },
                {
                    'data': 'ctr_ruta'
                },
                {
                    'data': 'ctr_numero_cuenta'
                },
                {
                    'data': 'ctr_cliente'
                },
                {
                    'data': 'obs_observaciones'
                },
                {
                    'data': 'obs_usuario'
                },
                {
                    'data': 'obs_fecha'
                },
                {
                    'data': 'btnCompletar'
                },
            ]
        });
    }

    $('#ctr_ruta').on('change', function() {
        mostrarObservaciones();
    });

    $(document).on("click", ".btnCompletar", function() {

        let obs_id = $(this).attr("obs_id");

        var datos = new FormData();
        datos.append("obs_id", obs_id)
        datos.append("btnCompletar", true);

        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                //startLoadButton()
            },
            success: function(res) {

                if (res) {
                    swal({
                            title: 'Observación completada',
                            icon: "success",
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            }
                        })
                } else {

                    swal({
                            title: 'Ocurrio un error, intenta de nuevo',
                            icon: "error",
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            }
                        })

                }
            }
        });

    });
</script>