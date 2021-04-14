<?php
cargarComponente('breadcrumb', '', 'Sueldo de empleados');

?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="id__usr_sueldo">Usuario: </label>
                <select class="form-control select2" name="id__usr_sueldo" id="id__usr_sueldo">
                    <option value="">Seleccione un usuario</option>
                    <?php

                    $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                    // $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('E');
                    foreach ($usuarios as $key => $usr) :
                    ?>
                        <option value="<?php echo $usr['usr_id'] ?>"><?php echo $usr['usr_nombre']; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="">Sueldo:</label>
                <input type="text" name="" id="" class="form-control " placeholder="" >
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="">Deuda:</label>
                <input type="text" name="" id="" class="form-control " placeholder="" readonly>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="">Abono:</label>
                <input type="text" name="" id="" class="form-control " placeholder="">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="">Nueva deuda:</label>
                <input type="text" name="" id="" class="form-control " placeholder="" readonly>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="">Total a pagar:</label>
                <input type="text" name="" id="" class="form-control " placeholder="" readonly>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group mt-4">
                <button class="btn btn-primary  float-right btn-load" id=" " name="">GUARDAR</button>
            </div>
        </div>


    </div>
</div>