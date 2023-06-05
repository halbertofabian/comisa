<div class="row">
    <div class="col-12">
        <table class="table table-striped" id="listarMercancia">
            <thead class="thead-light">
                <tr>
                    <th>MODELO</th>
                    <th>PRODUCTO</th>
                    <th>TOTAL</th>
                    <!-- <th>ALMACEN</th> -->
                    <!-- <th>FECHA</th> -->
                    <!-- <th></th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $series = AlmacenesModelo::mdlMostrarSeries2();
                foreach ($series as $key => $spds) :
                ?>
                    <tr>
                        <td><?= $spds['mpds_modelo'] ?></td>
                        <td><?= $spds['mpds_descripcion'] ?></td>
                        <td><?= $spds['total_m'] ?></td>
                        <!-- <td><?= $spds['ams_nombre'] ?></td> -->
                        <!-- <td><?= $spds['spds_ultima_mod'] ?></td> -->
                        <!-- <td>
                            <div class="btn-group" role="group" aria-label="">
                                <button type="button" class="btn btn-dark btnGenerarEtiqueta" spds_id="<?= $spds['spds_id'] ?>"><i class="fa fa-barcode"></i></button>
                                <!-- <button type="button" class="btn btn-danger btnEliminarSerie" spds_id="<?= $spds['spds_id'] ?>" spds_serie_completa="<?= $spds['spds_serie_completa'] ?>" mpds_descripcion="<?= $spds['mpds_descripcion'] ?>" spds_modelo="<?= $spds['spds_modelo'] ?>"><i class=" fa fa-trash-o"></i></button> -->
                            </div>
                        </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlCodigoInventario" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Codigo de validación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCodigoInventario">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="spds_codigo">Codigo</label>
                                <input type="hidden" id="spds_id" name="spds_id">
                                <input type="hidden" id="spds_modelo" name="spds_modelo">
                                <input type="number" class="form-control" name="spds_codigo" id="spds_codigo" placeholder="Introduce el codigo" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Validar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#listarMercancia").DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            "ordering": false,

            "language": {

                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }

            }

        });
    })
    $(document).on('click', '.btnGenerarEtiqueta', function() {
        var spds_id = $(this).attr("spds_id");
        window.open(urlApp + "app/report/generar-etiqueta-mercancia.php?spds_id=" + spds_id, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=100,right=100,width=400,height=700");
    });

    $(document).on('click', '.btnEliminarSerie', function() {
        var spds_id = $(this).attr('spds_id');
        var spds_modelo = $(this).attr('spds_modelo');
        var datos = new FormData();
        datos.append('spds_id', spds_id);
        datos.append('spds_modelo', spds_modelo);
        datos.append('btnGenerarCodigoSerie', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    toastr.success(res.mensaje, 'Muy bien!');
                    $("#spds_id").val(spds_id);
                    $("#spds_modelo").val(spds_modelo);
                    $("#mdlCodigoInventario").modal("show");
                } else {
                    swal({
                        title: 'Error',
                        text: res.mensaje,
                        icon: 'error',
                        buttons: [false, 'Intentar de nuevo'],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {} else {}
                    })
                }
            }
        });

    });

    $("#formCodigoInventario").on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        datos.append('btnEliminarSerie', true);
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
                        title: '¡Bien!',
                        text: res.mensaje,
                        type: 'success',
                        icon: 'success'
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: res.mensaje,
                        icon: 'error',
                        buttons: [false, 'Intentar de nuevo'],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {} else {}
                    })
                }
            }
        });
    });
</script>