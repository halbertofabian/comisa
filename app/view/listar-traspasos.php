<script>
    var pagina = ""
</script>
<?php
// if ($_SESSION['session_usr']['usr_rol'] != "Administrador") :
//     cargarComponente ('acceso-restringido', '', '');
//     return;
// endif;
cargarComponente('breadcrumb', '', 'Listar traspasos'); ?>
<div class="container">
    <div class="row">
        <div class="form-group col-12">
            <table class="table tablas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Entrega</th>
                        <th>Tipo</th>
                        <th>Almacen Origen</th>
                        <th>Almacen Destino</th>
                        <th>Recibe</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodylistarcompras">
                    <?php
                    $traspaso = TraspasosModelo::mdlConsultarTraspasoAll();
                    //preArray($traspaso);
                    //die();

                    foreach ($traspaso as $key => $ptps) :
                    ?>
                        <tr>
                            <th scope="row"><?php echo $ptps['tps_num_traspaso'] ?></th>

                            <td><?php echo $ptps['registro'] ?></td>
                            <td><?php echo $ptps['tps_tipo'] ?></td>
                            <td><?php echo $ptps['origen'] ?></td>
                            <td><?php echo $ptps['destino'] ?></td>
                            <td><?php echo $ptps['receptor'] ?></td>
                            <td><?php echo $ptps['tps_fecha'] ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $ptps['tps_num_traspaso'] ?>">
                                    ver
                                </button>
                                <!-- Modal -->
                                <div class="modal " id="exampleModal<?php echo $ptps['tps_num_traspaso'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">TRASPASO <strong><?php echo $ptps['tps_num_traspaso'] ?></strong></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">

                                                    <div class="row">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nombre</th>
                                                                    <th>Categoria</th>
                                                                    <th>Cantidad</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php $productos = json_decode($ptps['tps_lista_productos'], true);
                                                                // preArray($productos);

                                                                foreach ($productos as $key => $p) :
                                                                ?>
                                                                    <tr>

                                                                        <td scope="row"><?php echo $p['id'] ?></td>
                                                                        <td><?php $array = explode("/", $p['nombre']);
                                                                            $namep = $array[0];
                                                                            echo $namep ?></td>
                                                                        <td><?php echo $p['categoria'] ?></td>
                                                                        <td><?php echo $p['cantidad'] ?></td>

                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach;
                    ?>

                </tbody>
            </table>
        </div>

    </div>
</div>