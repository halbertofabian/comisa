<div class="row">
    <div class="col-12">
        <table class="table table-striped tablas">
            <thead class="thead-light">
                <tr>
                    <th>MODELO</th>
                    <th>PRODUCTO</th>
                    <th>SERIE</th>
                    <th>ALMACEN</th>
                    <th>FECHA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $series = AlmacenesModelo::mdlMostrarSeries();
                foreach ($series as $key => $spds) :
                ?>
                    <tr>
                        <td><?= $spds['mpds_modelo'] ?></td>
                        <td><?= $spds['mpds_descripcion'] ?></td>
                        <td><?= $spds['spds_serie'] ?></td>
                        <td><?= $spds['ams_nombre'] ?></td>
                        <td><?= $spds['spds_ultima_mod'] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <button type="button" class="btn btn-dark btnGenerarEtiqueta" spds_id="<?= $spds['spds_id'] ?>"><i class="fa fa-barcode"></i></button>
                                <button type="button" class="btn btn-danger btnEliminarSerie" spds_id="<?= $spds['spds_id'] ?>" spds_serie_completa="<?= $spds['spds_serie_completa'] ?>" mpds_descripcion="<?= $spds['mpds_descripcion'] ?>" spds_modelo="<?= $spds['spds_modelo'] ?>"><i class=" fa fa-trash-o"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<script>
    $(document).on('click', '.btnGenerarEtiqueta', function() {
        var spds_id = $(this).attr("spds_id");
        window.open(urlApp + "app/report/generar-etiqueta-mercancia.php?spds_id=" + spds_id, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=100,right=100,width=400,height=700");
    });

    $(document).on('click', '.btnEliminarSerie', function() {
        var spds_id = $(this).attr('spds_id');
        var mpds_descripcion = $(this).attr('mpds_descripcion');
        var spds_serie_completa = $(this).attr('spds_serie_completa');
        var spds_modelo = $(this).attr('spds_modelo');

        swal({
            title: '¿Esta seguro de eliminar el modelo ' + mpds_descripcion + ' con numero de serie ' + spds_serie_completa + '?',
            text: 'Esta accion no es reversible',
            icon: 'warning',
            buttons: ['No', 'Si, eliminar serie'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var datos = new FormData()
                datos.append('spds_id', spds_id);
                datos.append('spds_modelo', spds_modelo);
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
            } else {}
        });

    });
</script>