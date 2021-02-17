<?php
if (isset($_GET['ruta']) && $_GET['ruta'] == 'salir') {
    session_destroy();
    echo '<script>window.location.href="./"</script>';
} ?>

<div class="container">
    <h4>Hola <strong class="text-primary"><?php echo $_SESSION['session_usr']['usr_nombre'] ?></strong> bienvenido(a) al sistema</h4>

    <div class="row">
        <div class="col-12 col-md-5">
            <form method="post">
                <div class="form-group">
                    <label for="">Para continuar elije el plantel al que quieres acceder</label>

                    <select class="form-control" name="scl_id" id="scl_id">
                        <?php
                        $sucursales = SucursalesModelo::mdlMostrarSucursales();
                        foreach ($sucursales as $key => $scl) : ?>
                            <option value="<?php echo $scl['scl_id'] ?>"><?php echo $scl['scl_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="btn btn-primary float-right mt-1" name="btnAccederSucursal">Acceder</button>
                </div>

                <?php

                $acceder = new SucursalesControlador();
                $acceder->ctrAccederSucursal();

                ?>
            </form>
        </div>
    </div>
</div>