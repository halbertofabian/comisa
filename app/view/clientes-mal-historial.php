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

    <div class="col-12">

        <?php

        $url_api = HTTP_HOST . 'api/public/clientes_control';

        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $clientes_mal = file_get_contents($url_api, false, stream_context_create($arrContextOptions));

        $clientes_mal = json_decode($clientes_mal, true);

        $clientes_mal = $clientes_mal['data'];


        ?>
        <div class="card">

            <div class="card-body">
                <table class="table table-striped table-bordered tablas dt-responsive">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Domicilio</th>
                            <th>Ubicación</th>
                            <th>Estado</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes_mal as $key => $cts_mal) : ?>
                            <tr>

                                <td><?= $cts_mal['clts_nombre'] ?></td>
                                <td><?= $cts_mal['clts_telefono'] ?></td>
                                <td><?= $cts_mal['clts_domicilio'] ?></td>
                                <td><?= $cts_mal['clts_ubicacion'] ?></td>
                                <td><?= '<strong class="text-danger">' . $cts_mal['clts_tipo_cliente'] . '</strong>' ?></td>
                                <td><?= $cts_mal['clts_observaciones'] ?></td>


                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>


</div>