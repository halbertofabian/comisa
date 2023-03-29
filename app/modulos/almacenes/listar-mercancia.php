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
                            <button type="button" class="btn btn-dark btnGenerarEtiqueta" spds_id="<?= $spds['spds_id'] ?>"><i class="fa fa-barcode"></i></button>
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
</script>