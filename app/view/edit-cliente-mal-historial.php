<?php
cargarComponente('breadcrumb', '', 'Editar cliente con mal historial');
$clts_id = 0;
if ($rutas[1] > 0) {
    $clts_id = $rutas[1];
}
$cts_mal = ClientesModelo::mdlMostrarClientesMaloPorID($clts_id);
?>

<form id="formEditClienteMal" method="post">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="clts_ruta">RUTA</label>
                    <select class="form-control" name="clts_ruta" id="clts_ruta">
                        <?php

                        for ($i = 1; $i <= 20; $i++) :

                            $ruta = $i <= 9 ? "0" . $i : $i;
                            if($cts_mal['clts_ruta'] == "R".$i){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }

                        ?>
                            <option <?= $selected ?> value="R<?= $i ?>"><?= $ruta ?></option>
                        <?php endfor; ?>

                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="clts_cuenta">Cuenta</label>
                    <input type="hidden" name="clts_id" value="<?= $cts_mal['clts_id'] ?>">
                    <input type="text" name="clts_cuenta" id="clts_cuenta" class="form-control" value="<?= $cts_mal['clts_cuenta'] ?>" placeholder="Ingrese la cuenta del cliente">
                </div>
                <div class="form-group col-md-3">
                    <label for="clts_fecha_venta">Fecha de venta</label>
                    <input type="date" name="clts_fecha_venta" id="clts_fecha_venta" value="<?= $cts_mal['clts_fecha_venta'] ?>" class="form-control">
                </div>

                <div class="form-group col-md-4">
                    <label for="clts_nombre">Nombre del cliente *</label>
                    <input type="text" name="clts_nombre" id="clts_nombre" class="form-control" value="<?= $cts_mal['clts_nombre'] ?>" placeholder="Ingresa el nombre del cliente" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="clts_curp">CURP</label>
                    <input type="text" name="clts_curp" id="clts_curp" class="form-control" value="<?= $cts_mal['clts_curp'] ?>" placeholder="Ingresa la curp del cliente">
                </div>

                <div class="form-group col-md-3">
                    <label for="clts_telefono">Número de telefono</label>
                    <input type="text" name="clts_telefono" id="clts_telefono" class="form-control phone_mx" value="<?= $cts_mal['clts_telefono'] ?>" placeholder="Ingresa el número del cliente">
                </div>

                <div class="form-group col-md-3">
                    <label for="clts_domicilio">Domicilio *</label>
                    <input type="text" name="clts_domicilio" id="clts_domicilio" class="form-control" value="<?= $cts_mal['clts_domicilio'] ?>" placeholder="Ingrese el domicilio" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="clts_col">Colonia</label>
                    <input type="text" name="clts_col" id="clts_col" class="form-control" value="<?= $cts_mal['clts_col'] ?>" placeholder="Ingrese la colonia">
                </div>

                <div class="form-group col-md-4">
                    <label for="clts_ubicacion">Ubicación</label>
                    <input type="text" name="clts_ubicacion" id="clts_ubicacion" class="form-control" value="<?= $cts_mal['clts_ubicacion'] ?>" placeholder="Ingrese la ubicación">
                </div>

                <div class="form-group col-md-6">
                    <label for="clts_tipo_cliente">Status *</label>
                    <input type="text" name="clts_tipo_cliente" id="clts_tipo_cliente" class="form-control" value="<?= $cts_mal['clts_tipo_cliente'] ?>" placeholder="Ingrese la situación actual del cliente" required>
                </div>


                <div class="form-group col-12">
                    <label for="clts_observaciones"></label>
                    <textarea name="clts_observaciones" id="clts_observaciones" cols="30" rows="5" class="form-control" placeholder="Escriba aquí las observaciones"><?= $cts_mal['clts_observaciones'] ?></textarea>
                </div>

                <div class="form-group col-12">
                    <button type="submit" class="btn-primary float-right btn">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>