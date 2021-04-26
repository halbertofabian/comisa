<?php
cargarComponente('breadcrumb', '', 'Abonos');

?>
<div class="container">
    <form method="post" id="formCalculoComisiones">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="form-group">
                    <label for="absemp_id_usuario">Usuario: </label>
                    <select class="form-control select2" name="absemp_id_usuario" id="absemp_id_usuario">
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
            <div class="col-12 col-md-5">
                <div class="form-group">
                    <label for="absemp_tipo_prestamo">Tipo de deuda</label>
                    <select class="form-control " name="absemp_tipo_prestamo" id="absemp_tipo_prestamo">
                        <option value="">Seleccione un tipo</option>
                        <option value="Interno">INTERNA</option>
                        <option value="Externo">EXTERNA</option>

                    </select>
                </div>
            </div>


            <div class="col-12 col-md-2">
                <div class="form-group mt-4">
                    <button type="button" class="btn btn-primary btn-load" id="btnMostrarDeuda">Buscar</button>
                </div>
            </div>

        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Cantidad</th>
                        <th>Fecha de prestamo</th>
                        <th>Usuario Registro</th>
                    </tr>
                </thead>
                <tbody id="tblDatosprestamo">
                   
                </tbody>
            </table>


        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">Deuda:</label>
                    <input class="form-control" type="text" name="totaldeuda" id="totaldeuda" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="absemp_abono">Abono:</label>
                    <input class="form-control" type="text" name="absemp_abono" id="absemp_abono" >
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group mt-4">
                    <button type="button" class="btn btn-primary btn-load" id="btnAbonoDeuda">Abonar</button>
                </div>
            </div>
        </div>

    </form>
</div>