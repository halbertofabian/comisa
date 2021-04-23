<?php
cargarComponente('breadcrumb', '', 'Reporte de gasto de gasolina');

?>
<div class="container">
    <form method="post" id="formCalculoComisiones">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="gtsg_usuario_responsableGas">Usuario: </label>
                    <select class="form-control select2" name="gtsg_usuario_responsableGas" id="gtsg_usuario_responsableGas">
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
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="gtsg_fecha_inicio">Fecha inicio</label>
                    <input type="date" name="gtsg_fecha_inicio" id="gtsg_fecha_inicio" class="form-control " placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="gtsg_fecha_fin">Fecha fin</label>
                    <input type="date" name="gtsg_fecha_fin" id="gtsg_fecha_fin" class="form-control theDate" placeholder="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-load" id="btnMostrarResumenGas">Buscar</button>
                </div>
            </div>

        </div>

        <div class="row">
            
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Vehiculo</th>
                        <th>Kilometraje</th>
                        <th>Conductor</th>
                        <th>Gasolina/litros</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="tblDatosResumenGastos">
                   
                    
                </tbody>
            </table>


        </div>
       
    </form>
</div>