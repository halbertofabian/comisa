<form id="formConsultarContratosLevantados" method="post">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="usr_id">Nombre del vendedor</label>
            <select class="form-control select2" name="usr_id" id="usr_id">
                <option value="">Seleccione un vendedor</option>
                <?php
                $vendedores = UsuariosModelo::mdlMostrarVendedoresConCajaAbierta();
                foreach ($vendedores as $key => $vds) :
                ?>
                    <option value="<?= $vds['usr_id'] ?>"><?= $vds['usr_nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-2">

            <input type="submit" name="btnConsultarNumeroTraspaso" id="btnConsultarNumeroTraspaso" value="Buscar" class="btn btn-primary btn-block mt-4">

        </div>

    </div>


    <?php
    $info_venta = ContratosControlador::ctrConsultarContratos();
    ?>
</form>

<?php
if (isset($_POST['btnConsultarNumeroTraspaso'])) :
    if (!$info_venta['datos_contrato']) :
?>
        <div class="row">


            <div class=" card col-12 alert alert-primary" role="alert">
                <strong>Este vendedor aún no sube contratos</strong>
            </div>

        </div>

    <?php else :

        //preArray($info_venta['datos_contrato']);

        $vdr = $info_venta['datos_vendedor'];
        $ctr_venta = $info_venta['datos_contrato'];


    ?>
        <form method="POST" id="formRegistarVentas">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title"><?= $vdr['usr_nombre'] ?></h4>
                            <p class="card-text">Contratos / Ventas</p>
                            <p>Número de caja: <strong class="text-primary"> <?= $vdr['usr_caja'] ?> </strong> </p>
                            <input type="hidden" name="igs_usuario_responsable" value="<?= $vdr['usr_id'] ?>">

                        </div>
                    </div>

                </div>
                <div class="col-12">


                    <?php

                    ///Recorrer todas las subidas el servidor por numero de caja abierta

                    foreach ($ctr_venta as $key => $ctr_vendedor) :
                        //preArray($ctr_vendedor['cts_todo']);

                        $ventas_json = json_decode($ctr_vendedor['cts_todo'], true);

                        $contratosSize = sizeof($ventas_json);






                        for ($i = 1; $i < $contratosSize; $i++) :

                            $vtr_contratos = $ventas_json[$i]['contrato'];


                    ?>

                            <div class="row">

                                <div class="col-md-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <h4>#<?= $key+1 ?></h4>
                                                    <div class="form-group">
                                                        <label for="">Nombre del cliente * </label>
                                                        <input type="text" name="vts_nombre_cliente[]" id="" class="form-control" required value="<?= strtoupper($vtr_contratos[0]['nombre']) ?>">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-12">
                                                    <h6 class="text-primary">REFERENCIA</h6>
                                                </div>
                                                <div class="form-group col-md-4">

                                                    <label for="">Nombre *</label>
                                                    <input type="text" name="vts_nombre_ref_1[]" id="" class="form-control" required value="<?= strtoupper($vtr_contratos[0]['nombreRef']) ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">Parentesco *</label>
                                                    <input type="text" name="vts_parentesco_ref_1[]" id="" class="form-control" required value="<?= strtoupper($vtr_contratos[0]['parentescoRef']) ?>">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">Dirección *</label>
                                                    <input type="text" name="vts_direccion_ref_1[]" id="" class="form-control" required value="<?= strtoupper($vtr_contratos[0]['direccionRef']) ?>">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">Colonia *</label>
                                                    <input type="text" name="vts_colonia_ref_1[]" id="" class="form-control" required value="<?= strtoupper($vtr_contratos[0]['coloniaRef']) ?>">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="">Teléfono *</label>
                                                    <input type="text" name="vts_telefono_ref_1[]" id="" class="form-control phone_mx" required value="<?= $vtr_contratos[0]['telefonoRef'] ?>">
                                                </div>
                                                <div class="form-group col-md-2 mt-4">
                                                    <a href="tel:<?= $vtr_contratos[0]['telefonoRef'] ?>" class="btn btn-primary btn-block"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label for="">Número de folio *</label>
                                                    <input type="text" name="vts_n_contrato[]" id="" class="form-control" required value="<?= $vtr_contratos[0]['no'] ?>">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="">Total de venta *</label>
                                                    <input type="text" name="vts_total[]" id="" class="form-control inputN" required value="<?= $vtr_contratos[0]['total_venta'] ?>">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="">Enganche *</label>
                                                    <input type="text" name="vts_enganche[]" id="" class="form-control inputN" required value="<?= $vtr_contratos[0]['enganche'] ?>">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="">S/E CONTADO *</label>
                                                    <input type="text" name="vts_se[]" id="" class="form-control inputN" required value="<?= $vtr_contratos[0]['sobre_enganche'] ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">Fecha de venta</label>
                                                    <input type="text" name="vts_fecha[]" id="" class="form-control" readonly value="<?= $vtr_contratos[0]['fecha'] ?>">
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="">Nota</label>
                                                    <textarea name="ctr_nota[]" id="" cols="30" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4"> <strong>Productos.</strong> </div>
                                                <div class="col-md-3"> <strong>Cant.</strong> </div>
                                            </div>
                                            <?php


                                            $productos_json = json_encode($vtr_contratos[0]['productos']);


                                            ?>
                                            <input type="hidden" name="vdr_productos[]" value='<?= $productos_json ?>' id="">
                                            <?php
                                            $cont = 0;

                                            foreach ($vtr_contratos[0]['productos'] as $key => $pds_venta) : ?>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <select class="form-control select2" disabled name="vts_producto[]" id="">

                                                                <option value="<?= $pds_venta['sku'] . '/' . $pds_venta['nombreProducto'] ?>" selected><?= $pds_venta['nombreProducto'] ?></option>

                                                                <?php

                                                                $producto = ProductosModelo::mdlMostrarProductosAlamacen(1);
                                                                foreach ($producto as $key => $pds) :
                                                                ?>

                                                                    <option value="<?= $pds['pds_sku'] . '/' . $pds['pds_nombre'] ?>"><?= $pds['pds_nombre'] ?></option>

                                                                <?php $cont++;
                                                                endforeach; ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" class="form-control" readonly name="vts_cantidad[]" value="<?= $pds_venta['cantidad'] ?>">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>





                                        </div>
                                        <div class="card-footer">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <?php if (isset($vtr_contratos[0]['fotoCliente']) && $vtr_contratos[0]['fotoCliente'] != "") : ?>
                                                        <input type="hidden" name="fotoCliente[]" value="<?= $vtr_contratos[0]['fotoCliente']; ?>">

                                                        <img class="img-thumbnail btnMostrarImg" width="100%" height="auto" src="<?= $vtr_contratos[0]['fotoCliente']; ?>" alt="">

                                                        <h5 class="text-dark text-center">Foto cliente / producto</h5>


                                                    <?php else : ?>
                                                        <input type="hidden" name="fotoCliente[]" value="">


                                                        <img class="img-thumbnail img-fluid" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">

                                                        <h5 class="text-dark">Foto cliente/producto</h5>

                                                    <?php endif; ?>


                                                </div>
                                                <div class="col-md-4">
                                                    <?php if (isset($vtr_contratos[0]['fotoCredencialFrontal']) && $vtr_contratos[0]['fotoCredencialFrontal'] != "") : ?>
                                                        <input type="hidden" name="fotoCredencialFrontal[]" value="<?= $vtr_contratos[0]['fotoCredencialFrontal']; ?>">


                                                        <img class="img-thumbnail btnMostrarImg" height="auto" width="100%" src="<?= $vtr_contratos[0]['fotoCredencialFrontal']; ?>" alt="">

                                                        <h5 class="text-dark text-center">Foto credencial frontal</h5>


                                                    <?php else : ?>
                                                        <input type="hidden" name="fotoCredencialFrontal[]" value="">


                                                        <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">

                                                        <h5 class="text-dark text-center">Foto credencial frontal</h5>

                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-4">

                                                    <?php if (isset($vtr_contratos[0]['fotoCredencialTrasera']) && $vtr_contratos[0]['fotoCredencialTrasera'] != "") : ?>
                                                        <input type="hidden" name="fotoCredencialTrasera[]" value="<?= $vtr_contratos[0]['fotoCredencialTrasera']; ?>">


                                                        <img class="img-thumbnail btnMostrarImg" height="auto" width="100%" src="<?= $vtr_contratos[0]['fotoCredencialTrasera']; ?>" alt="First slide">

                                                        <h5 class="text-dark text-center">Foto credencial trasera</h5>

                                                    <?php else : ?>
                                                        <input type="hidden" name="fotoCredencialTrasera[]" value="">


                                                        <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">

                                                        <h5 class="text-dark text-center">Foto credencial trasera</h5>

                                                    <?php endif; ?>

                                                </div>
                                                <div class="col-md-4">
                                                    <?php if (isset($vtr_contratos[0]['fotoPagare']) && $vtr_contratos[0]['fotoPagare'] != "") : ?>
                                                        <input type="hidden" name="fotoPagare[]" value="<?= $vtr_contratos[0]['fotoPagare']; ?>">


                                                        <img class="img-thumbnail img-fluid btnMostrarImg" height="auto" width="100%" src="<?= $vtr_contratos[0]['fotoPagare']; ?>" alt="First slide">

                                                        <h5 class="text-dark text-center">Foto pagaré</h5>

                                                    <?php else : ?>
                                                        <input type="hidden" name="fotoPagare[]" value="">


                                                        <img class="img-thumbnail img-fluid" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">

                                                        <h5 class="text-dark text-center">Foto pagaré</h5>

                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-4">

                                                    <?php if (isset($vtr_contratos[0]['fotoFachada']) && $vtr_contratos[0]['fotoFachada'] != "") : ?>
                                                        <input type="hidden" name="fotoFachada[]" value="<?= $vtr_contratos[0]['fotoFachada']; ?>">


                                                        <img class="img-thumbnail btnMostrarImg" height="auto" width="100%" src="<?= $vtr_contratos[0]['fotoFachada']; ?>" alt="First slide">

                                                        <h5 class="text-dark text-center">Foto fachada</h5>

                                                    <?php else : ?>
                                                        <input type="hidden" name="fotoFachada[]" value="">


                                                        <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">

                                                        <h5 class="text-dark text-center">Foto fachada</h5>

                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-4">

                                                    <?php if (isset($vtr_contratos[0]['comprobanteDomicilio']) && $vtr_contratos[0]['comprobanteDomicilio'] != "") : ?>

                                                        <input type="hidden" name="comprobanteDomicilio[]" value="<?= $vtr_contratos[0]['comprobanteDomicilio']; ?>">

                                                        <img class="img-thumbnail btnMostrarImg" height="auto" width="100%" src="<?= $vtr_contratos[0]['comprobanteDomicilio']; ?>" alt="First slide">

                                                        <h5 class="text-dark text-center">Foto comprobante domicilio</h5>

                                                    <?php else : ?>

                                                        <input type="hidden" name="comprobanteDomicilio[]" value="">
                                                        <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">

                                                        <h5 class="text-dark text-center">Foto comprobante domicilio</h5>

                                                    <?php endif; ?>
                                                </div>
                                                <!-- </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="crs_<?= $vtr_contratos[0]['no']  ?>" class="carousel slide" data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-target="#crs_<?= $vtr_contratos[0]['no']  ?>" data-slide-to="0" class="active"></li>
                                                            <li data-target="#crs_<?= $vtr_contratos[0]['no']  ?>" data-slide-to="1"></li>
                                                            <li data-target="#crs_<?= $vtr_contratos[0]['no']  ?>" data-slide-to="2"></li>
                                                        </ol>
                                                        <div class="carousel-inner border shadow">

                                                            <div class="carousel-item active">
                                                                <div class="row">
                                                                    <?php if (isset($vtr_contratos[0]['fotoCliente']) && $vtr_contratos[0]['fotoCliente'] != "") : ?>
                                                                        <input type="hidden" name="vdr_foto_cliente[]" value="<?= $vtr_contratos[0]['fotoCliente']; ?>">
                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail img-fluid btnMostrarImg" height="150" width="200" src="<?= $vtr_contratos[0]['fotoCliente']; ?>" alt="First slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto cliente/producto</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <input type="hidden" name="vdr_foto_cliente[]" value="">

                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail img-fluid" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto cliente/producto</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <?php if (isset($vtr_contratos[0]['fotoCredencialFrontal']) && $vtr_contratos[0]['fotoCredencialFrontal'] != "") : ?>
                                                                        <input type="hidden" name="fotoCredencialFrontal[]" value="<?= $vtr_contratos[0]['fotoCredencialFrontal']; ?>">

                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail btnMostrarImg" height="150" width="200" src="<?= $vtr_contratos[0]['fotoCredencialFrontal']; ?>" alt="First slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto credencial frontal</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <input type="hidden" name="fotoCredencialFrontal[]" value="">

                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto credencial frontal</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>


                                                                </div>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <div class="row">
                                                                    <?php if (isset($vtr_contratos[0]['fotoPagare']) && $vtr_contratos[0]['fotoPagare'] != "") : ?>
                                                                        <input type="hidden" name="fotoPagare[]" value="<?= $vtr_contratos[0]['fotoPagare']; ?>">

                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail img-fluid btnMostrarImg" height="150" width="200" src="<?= $vtr_contratos[0]['fotoPagare']; ?>" alt="First slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto pagaré</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <input type="hidden" name="fotoPagare[]" value="">

                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail img-fluid" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto pagaré</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <?php if (isset($vtr_contratos[0]['fotoFachada']) && $vtr_contratos[0]['fotoFachada'] != "") : ?>
                                                                        <input type="hidden" name="fotoFachada[]" value="<?= $vtr_contratos[0]['fotoFachada']; ?>">

                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail btnMostrarImg" height="150" width="200" src="<?= $vtr_contratos[0]['fotoFachada']; ?>" alt="First slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto fachada</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <input type="hidden" name="fotoFachada[]" value="">

                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto fachada</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <?php if (isset($vtr_contratos[0]['comprobanteDomicilio']) && $vtr_contratos[0]['comprobanteDomicilio'] != "") : ?>
                                                                        <input type="hidden" name="comprobanteDomicilio[]" value="<?= $vtr_contratos[0]['comprobanteDomicilio']; ?>">
                                                                        <div class="col-xl-4 text-center">
                                                                            <img class="img-thumbnail btnMostrarImg" height="150" width="200" src="<?= $vtr_contratos[0]['comprobanteDomicilio']; ?>" alt="First slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto comprobante domicilio</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php else : ?>
                                                                        <div class="col-xl-4 text-center">
                                                                            <input type="hidden" name="comprobanteDomicilio[]" value="">
                                                                            <img class="img-thumbnail" style="height: 260px;" src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a56598b94%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a56598b94%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.45%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Second slide">
                                                                            <div class="carousel-caption d-none d-md-block">
                                                                                <h5 class="text-dark">Foto comprobante domicilio</h5>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#crs_<?= $vtr_contratos[0]['no']  ?>" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon text-primary" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#crs_<?= $vtr_contratos[0]['no']  ?>" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div> -->
                                            </div>
                                        </div>
                                    </div>



                                </div>
                        <?php endfor;
                    endforeach; ?>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="btnRegistrarVentasContrato" class="btn btn-primary float-right">Registrar ventas</button>
                            </div>
                </div>
        </form>
<?php endif;
endif; ?>

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