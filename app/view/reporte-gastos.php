<?php
cargarComponente('breadcrumb', '', 'Reporte de gastos');

?>
<div class="container">
    <form method="post" id="formCalculoComisiones">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="gts_usuario">Usuario: </label>
                    <select class="form-control select2" name="gts_usuario" id="gts_usuario">
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
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="">Categorias</label>
                    <select name="tgts_categoria" id="tgts_categoria" class="form-control select2">
                        <option value="">Elija una categoría</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="gts_fecha_inicio">Fecha inicio</label>
                    <input type="date" name="gts_fecha_inicio" id="gts_fecha_inicio" class="form-control " placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="gts_fecha_fin">Fecha fin</label>
                    <input type="date" name="gts_fecha_fin" id="gts_fecha_fin" class="form-control theDate" placeholder="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-load" id="btnMostrarGastosUsr">Buscar</button>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="alert alert-dark col-12" role="alert">
                <strong>Resumen de gastos de usuarios</strong>
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Tipo de gasto</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>

                    </tr>
                </thead>
                <tbody id="tblDatosGastosUsr">


                </tbody>
            </table>


        </div>

    </form>
</div>