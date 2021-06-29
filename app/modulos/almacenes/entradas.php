<form id="formConsultarTraspasoRegreso" method="post">
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

    </div>

    <div class="row">
        <div class="form-group col-md-5 col-12">
            <input type="submit" name="btnConsultarNumeroTraspaso" id="btnConsultarNumeroTraspaso" class="btn btn-primary float-right " value="Consultar">
        </div>
    </div>
    <?php

    $tps = AlmacenesControlador::ctrConsultarMerncanciaDevuelta();

    ?>
</form>

<?php

if (isset($_POST['btnConsultarNumeroTraspaso'])) :
    $pds_json = json_decode($tps['tps_lista_productos_devueltos'], true);
    $productos =  $pds_json[0]['productos'];
   
    if ($productos == NULL) :
        
?>

        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary" role="alert">
                    <strong>Número de traspaso no encontrado, intente de nuevo</strong>
                </div>

            </div>

        </div>

    <?php else: 
    
        ?>

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Número de traspaso</label>
                <input type="text" name="tps_num_traspaso_1" id="tps_num_traspaso_1" readonly class="form-control" value="<?= $tps['tps_num_traspaso'] ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Vendedor</label>
                <input type="text" name="usr_nombre" id="usr_nombre" readonly class="form-control" value="<?= $tps['usr_nombre'] ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">CAMIONETA</label>
                <input type="text" name="ams_nombre_origiegn" id="ams_nombre_origiegn" readonly class="form-control" value="<?= $tps[11] ?>">
            </div>
        </div>

        <div class="col-12">
            <table class="table text-center " style="width: 100%;">
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Check</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($productos  as $key => $pds) :
                    ?>
                        <tr>

                            <td><?= $pds['id'] ?></td>
                            <td><?= $pds['nombre'] ?></td>
                            <td><?= $pds['cantidad'] ?></td>
                            <td><input type="checkbox" name="" id=""></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>



        </div>

        <div class="col-12">

            <button type="button" class=" btn btn-primary float-right btn-load btnSincronizarInventario">Sincronizar inventario</button>

        </div>

    </div>



<?php endif; endif; ?>