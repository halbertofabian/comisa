<form id="formConsultarContratosLevantados" method="post">
    <div class="row">

        <div class="form-group col-md-1 col-2">
            <label for="">Número</label>
            <input type="text" name="tps_prefijo" id="tps_prefijo" class="form-control" readonly value="T-" placeholder="">
        </div>
        <div class="form-group col-md-4 col-10">
            <label for="">de salida</label>
            <?php if (isset($_POST['btnConsultarNumeroTraspaso'])) : ?>
                <input type="number" name="tps_num_traspaso" id="tps_num_traspaso" class="form-control" value="<?= $_POST['tps_num_traspaso'] ?>" autofocus>
            <?php else : ?>
                <input type="number" name="tps_num_traspaso" id="tps_num_traspaso" class="form-control" placeholder="" autofocus>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-2 col-12 mt-4">
            <input type="submit" name="btnConsultarNumeroTraspaso" id="btnConsultarNumeroTraspaso" class="btn btn-primary" value="Consultar">
        </div>

    </div>

    <div class="row">

    </div>
    <?php

    $ctr_cliente = ContratosControlador::ctrConsultarContratos();



    ?>
</form>




<?php if (isset($_POST['btnConsultarNumeroTraspaso'])) :
    $ctr = json_decode($ctr_cliente['cts_todo'], true);


    $infoVendedor =  $ctr[0]['vendedor'];




    if ($ctr == NULL) :

?>

        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary" role="alert">
                    <strong>Número de traspaso no encontrado, intente de nuevo</strong>
                </div>

            </div>

        </div>

    <?php else :

    ?>

        <form method="POST" id="formRegistarVentas">

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Número de traspaso</label>
                        <input type="text" name="tps_num_traspaso_1" id="tps_num_traspaso_1" readonly class="form-control" value="<?= $infoVendedor['tps_num'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Vendedor</label>
                        <input type="text" name="usr_nombre" id="usr_nombre" readonly class="form-control" value="<?= $infoVendedor['nombre'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">CAMIONETA</label>
                        <input type="text" name="ams_nombre_origiegn" id="ams_nombre_origiegn" readonly class="form-control" value="<?= $infoVendedor['camioneta'] ?>">
                        <input type="hidden" name="igs_usuario_responsable" value="<?= $ctr[0]['vendedor']['id'] ?>">

                    </div>
                </div>
            </div>


            <div class="row">


                <?php
                $arraysize = sizeof($ctr);

                //preArray($ctr);

                for ($i = 1; $i < $arraysize; $i++) :
                    $contratos = $ctr[$i];
                    //
                ?>

                    <div class="col-md-12">


                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="">Número de folio</label>

                                        <input type="text" name="vts_n_contrato[]" class="form-control mb-2" value="<?= $contratos['contrato'][0]['no']  ?>">

                                    </div>
                                    <div class="col-12">


                                        <label for="">Nombre del cliente</label>
                                        <input type="text" name="vts_nombre_cliente[]" class="form-control mb-2" value="<?= $contratos['contrato'][0]['nombre']  ?>">

                                    </div>

                                    <div class="col-md-2">




                                        <!-- <p class="card-text"><?= $contratos['contrato'][0]['nombre']  ?></p> -->
                                        <p class="card-text"><?= isset($contratos['contrato'][0]['ubicacion'])   ? $contratos['contrato'][0]['ubicacion'] : "";  ?></p>
                                        <p class="card-text text-primary"><?= $contratos['contrato'][0]['productos'][0]['nombreProducto']  ?></p>
                                        <p class="card-text text-primary">CANTIDAD: <?= $contratos['contrato'][0]['productos'][0]['cantidad']  ?></p>
                                        <p class="card-text text-danger">FECHA: <?= $ctr_cliente['fecha']  ?></p>


                                    </div>

                                    <div class="col-md-2">

                                        <div class="form-group">
                                            <label for="">Total de la venta</label>
                                            <input type="text" name="vts_total[]" id="" class="form-control inputN " value="<?= $contratos['contrato'][0]['total_venta']  ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Enganche</label>
                                            <input type="text" name="vts_enganche[]" id="" class="form-control inputN " value="<?= $contratos['contrato'][0]['enganche']  ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sobre enganche / Contado </label>
                                            <input type="text" name="vts_se[]" id="" class="form-control inputN " value="<?= $contratos['contrato'][0]['sobre_enganche']  ?>">
                                        </div>


                                    </div>

                                    <div class="col-md-8">
                                        <div id="crs_<?= $contratos['contrato'][0]['no']  ?>" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#crs_<?= $contratos['contrato'][0]['no']  ?>" data-slide-to="0" class="active"></li>
                                                <li data-target="#crs_<?= $contratos['contrato'][0]['no']  ?>" data-slide-to="1"></li>
                                                <li data-target="#crs_<?= $contratos['contrato'][0]['no']  ?>" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner border shadow">

                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <?php if (isset($contratos['contrato'][0]['fotoCliente']) && $contratos['contrato'][0]['fotoCliente'] != "") : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail img-fluid btnMostrarImg" height="150" width="200" src="<?= $contratos['contrato'][0]['fotoCliente']; ?>" alt="First slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto cliente/producto</h5>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail img-fluid" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto cliente/producto</h5>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (isset($contratos['contrato'][0]['fotoCredencialFrontal']) && $contratos['contrato'][0]['fotoCredencialFrontal'] != "") : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail btnMostrarImg" height="150" width="200" src="<?= $contratos['contrato'][0]['fotoCredencialFrontal']; ?>" alt="First slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto credencial frontal</h5>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto credencial frontal</h5>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (isset($contratos['contrato'][0]['fotoCredencialTrasera']) && $contratos['contrato'][0]['fotoCredencialTrasera'] != "") : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail btnMostrarImg" height="150" width="200" src="<?= $contratos['contrato'][0]['fotoCredencialTrasera']; ?>" alt="First slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto credencial trasera</h5>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto credencial trasera</h5>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <?php if (isset($contratos['contrato'][0]['fotoPagare']) && $contratos['contrato'][0]['fotoPagare'] != "") : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail img-fluid btnMostrarImg" height="150" width="200" src="<?= $contratos['contrato'][0]['fotoPagare']; ?>" alt="First slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto pagaré</h5>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail img-fluid" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto pagaré</h5>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (isset($contratos['contrato'][0]['fotoFachada']) && $contratos['contrato'][0]['fotoFachada'] != "") : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail btnMostrarImg" height="150" width="200" src="<?= $contratos['contrato'][0]['fotoFachada']; ?>" alt="First slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto fachada</h5>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto fachada</h5>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (isset($contratos['contrato'][0]['comprobanteDomicilio']) && $contratos['contrato'][0]['comprobanteDomicilio'] != "") : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail btnMostrarImg" height="150" width="200" src="<?= $contratos['contrato'][0]['comprobanteDomicilio']; ?>" alt="First slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto comprobante domicilio</h5>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="col-xl-4 text-center">
                                                                <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                    <h5>Foto comprobante domicilio</h5>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#crs_<?= $contratos['contrato'][0]['no']  ?>" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#crs_<?= $contratos['contrato'][0]['no']  ?>" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>


                <?php endfor; ?>

                <div class="col-12">
                    <button type="submit" name="btnRegistrarVentasContrato" class="btn btn-primary float-right">Registrar ventas</button>
                </div>

            </div>
            <?php

            // $registrarContraro = new ContratosControlador();
            // $registrarContraro->ctrRegistrarVentasContrato();

            ?>
        </form>
<?php endif;
endif; ?>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <img src="" class="img-fluid w-100 imagenURL" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>