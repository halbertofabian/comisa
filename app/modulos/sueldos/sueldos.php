<?php
cargarComponente('breadcrumb', '', 'Sueldo de empleados');

?>
<div class="container">
    <form id="formsueldo">
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
                    <input type="text" name="igs_sueldo_base" id="igs_sueldo_base" class="form-control inputN" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Deuda:</label>
                    <input type="text" name="igs_deuda_ext" id="igs_deuda_ext" class="form-control inputN" placeholder="" readonly>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Abono:</label>
                    <input type="text" name="igs_abono_deuda" id="igs_abono_deuda" value="0" class="form-control inputN" placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="">Nueva deuda:</label>
                    <input type="text" name="igs_nueva_deuda" id="igs_nueva_deuda" class="form-control inputN" placeholder="" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">Total a pagar:</label>
                    <input type="text" name="igs_pago" id="igs_pago" class="form-control inputN" placeholder="" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary  float-right btn-load" id=" " name="">GUARDAR</button>
                </div>
            </div>


        </div>
    </form>
</div>