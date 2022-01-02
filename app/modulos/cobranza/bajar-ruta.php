<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <form action="<?= HTTP_HOST ?>export/exportar-cuentas.php" method="get">
                <div class="form-group">
                    <label for="usr_ruta">Ruta</label>
                    <select name="usr_ruta" id="usr_ruta" class="form-control select2">
                        <option value="">Seleccione una ruta</option>
                        <?php

                        for ($i = 1; $i <= 20; $i++) : ?>
                            <option value="R<?= $i ?>">R<?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnRuta" class="btn btn-primary float-right" value="Descargar ruta">
                </div>
            </form>
        </div>
    </div>

</div>