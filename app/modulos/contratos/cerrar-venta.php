<?php
cargarComponente('breadcrumb_nivel_1', '', 'Cerrar venta', array(['ruta' => 'contratos/listar', 'label' => 'Listar contratos']));
$ctr = ContratosModelo::mdlMostrarContratosById($rutas[2]);
// preArray();
$productos = json_decode($ctr['ctr_productos'], true);
// preArray($ctr);
?>

<div class="card">
    <div class="card-header text-center bg-primary">
        <strong style="color:aliceblue">MERCANCIA</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>DESCRIPCION</th>
                            <th>CANTIDAD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $key => $pds) : ?>
                            <tr>
                                <td><?= $pds['sku'] ?></td>
                                <td><?= $pds['nombreProducto'] ?></td>
                                <td><?= $pds['cantidad'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<div class="card">
    
    <div class="card-body">
        <h5 class="card-title"><?= $ctr['usr_nombre'] ?></h5>
        
    </div>
</div>