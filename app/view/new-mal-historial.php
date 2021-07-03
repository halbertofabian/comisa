<?php

cargarComponente('breadcrumb_nivel_1', '', 'Agregar cliente con mal historial', array(['ruta' => 'clientes-mal-historial', 'label' => 'Listar clientes con mal historial'])); ?>

<form id="formRegistrarClienteMal" method="post">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <label for="clts_ruta">RUTA</label>
                    <select class="form-control" name="clts_ruta" id="clts_ruta">
                        <?php

                        for ($i = 1; $i <= 20; $i++) :

                            $ruta = $i <= 9 ? "0" . $i : $i;

                        ?>
                            <option value="R-<?= $i ?>"><?= $ruta ?></option>
                        <?php endfor; ?>

                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="clts_nombre">Nombre del cliente *</label>
                    <input type="text" name="clts_nombre" id="clts_nombre" class="form-control" placeholder="Ingresa el nombre del cliente" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="clts_curp">CURP</label>
                    <input type="text" name="clts_curp" id="clts_curp" class="form-control" placeholder="Ingresa la curp del cliente">
                </div>

                <div class="form-group col-md-3">
                    <label for="clts_telefono">Número de telefono</label>
                    <input type="text" name="clts_telefono" id="clts_telefono" class="form-control phone_mx" placeholder="Ingresa el número del cliente">
                </div>

                <div class="form-group col-md-4">
                    <label for="clts_domicilio">Domicilio *</label>
                    <input type="text" name="clts_domicilio" id="clts_domicilio" class="form-control" placeholder="Ingrese el domicilio" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="clts_col">Colonia</label>
                    <input type="text" name="clts_col" id="clts_col" class="form-control" placeholder="Ingrese la colonia">
                </div>

                <div class="form-group col-md-4">
                    <label for="clts_ubicacion">Ubicación</label>
                    <input type="text" name="clts_ubicacion" id="clts_ubicacion" class="form-control" placeholder="Ingrese la ubicación">
                </div>

                <div class="form-group col-md-6">
                    <label for="clts_tipo_cliente">Status *</label>
                    <input type="text" name="clts_tipo_cliente" id="clts_tipo_cliente" class="form-control" placeholder="Ingrese la situación actual del cliente" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="clts_cuenta">Cuenta</label>
                    <input type="text" name="clts_cuenta" id="clts_cuenta" class="form-control" placeholder="Ingrese la cuenta del cliente">
                </div>

                <div class="form-group col-12">
                  <label for="clts_observaciones"></label>
                    <textarea name="clts_observaciones" id="clts_observaciones" cols="30" rows="5" class="form-control" placeholder="Escriba aquí las observaciones"></textarea>
                </div>

                <div class="form-group col-12">
                    <button type="submit" class="btn-primary float-right btn">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>