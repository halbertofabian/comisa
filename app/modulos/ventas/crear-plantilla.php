<?php
cargarComponente('breadcrumb', '', 'Crear plantilla de ventas');

?>
<div class="container">
    <form method="post" id="formCalculoComisiones">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="gts_usuario">Semana: </label>
                    <select class="form-control select2" name="pvts_num_semana" id="pvts_num_semana">
                        <option value="">Seleccione una semana</option>
                        <?php

                        $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                        // $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('E');
                        for ($i=1; $i<=35; $i++) :
                        ?>
                            <option value="<?php echo $i?>">SEMANA <?php echo $i ?></option>
                        <?php endfor; ?>
                    </select>
  
                </div>
            </div>
            
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="gts_fecha_inicio">Fecha inicio</label>
                    <input type="date" name="pvts_fecha_inicio" id="pvts_fecha_inicio" class="form-control " placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="gts_fecha_fin">Fecha fin</label>
                    <input type="date" name="pvts_fecha_fin" id="pvts_fecha_fin" class="form-control " placeholder="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group mt-4 float-right">
                    <button type="button" class="btn btn-primary btn-load" id="">Crear</button>
                </div>
            </div>

        </div>

        

    </form>
</div>