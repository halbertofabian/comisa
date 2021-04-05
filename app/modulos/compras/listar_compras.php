<div class="container">
    <div class="row">
        <div class="form-group col-12">
            <table class="table tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Folio</th>
                        <th>Almacen</th>
                        <th>Proveedor</th>
                        <th>Fecha compra</th>
                        <th>Costo envio</th>
                        <th>Gran total</th>
                        <th>Tipo pago</th>
                        <th>Metodo pago</th>
                        <th>Monto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodylistarcompras">
                    <?php
                    $compras = ComprasModelo::mdlAllCompras();
                    foreach ($compras as $key => $pcps) :
                    ?>
                        <tr>
                            <th scope="row"><?php echo $pcps['cps_id'] ?></th>

                            <td><?php echo $pcps['cps_folio'] ?></td>
                            <td><?php echo $pcps['cps_id_almacen'] ?></td>
                            <td><?php echo $pcps['cps_id_proveedor'] ?></td>
                            <td><?php echo $pcps['cps_fecha_compra'] ?></td>
                            <td><?php echo number_format($pcps['cps_costo_envio'], 2) ?></td>
                            <td><?php echo number_format($pcps['cps_gran_total'], 2) ?></td>
                            <td><?php echo $pcps['cps_tipo_pago'] ?></td>
                            <td><?php echo $pcps['cps_metodo_pago'] ?></td>
                            <td><?php echo number_format($pcps['cps_monto'], 2) ?></td>
                            <th></th>
                        </tr>

                    <?php endforeach;
                    ?>

                </tbody>
            </table>
        </div>

    </div>
</div>