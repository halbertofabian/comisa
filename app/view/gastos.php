<script>
    var pagina = ""
</script>
<?php cargarComponente('breadcrumb', '', 'Nueva gastos');
$usuarios = UsuariosModelo::mdlMostrarAlumnosBySuc();
?>
<div class="container">
    <form method="post">
        <div class="row">
            <div class="form-group col-md-4 col-12">
                <label for="tgts_usuario_responsable">Empreado, Cobrador o Vendedor </label>
                <select class="form-control" name="tgts_usuario_responsable" id="tgts_usuario_responsable">
                    <?php
                    foreach ($usuarios as $key => $usr) : ?>
                        <option value="<?php echo $usr['usr_id'] ?>"><?php echo $usr['usr_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-4 col-12">
                <label for="tgts_ruta">Ruta</label>
                <select class="form-control" name="tgts_ruta" id="tgts_ruta">
                    <?php
                    for ($i = 1; $i <= 14; $i++) :
                    ?>
                        <option value="<?php echo 'Ruta ' . $i ?>"><?php echo 'Ruta ' . $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group col-md-4 col-12">
                <label for="tgts_categoria">Categoría</label>
                <select name="tgts_categoria" id="tgts_categoria" class="form-control select2">
                    <option value="">Elija una categoría</option>
                </select>
                <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlCategoria">
                    Agregar nueva categoría
                </button>
            </div>
            <div class="form-group col-12 col-md-8">
                <label for="tgts_concepto">Concepto</label>
                <input type="text" name="tgts_concepto" id="tgts_concepto" class="form-control" placeholder="Escriba el concepto de este gasto">
            </div>
            <!-- <div class="form-group col-md-4 col-12">
                <label for="tgts_fecha_gasto">Fecha de gasto</label>
                <input type="date" name="tgts_fecha_gasto" id="tgts_fecha_gasto" class="form-control theDate">
            </div> -->
            <div class="form-group col-md-4 col-12">
                <label for="tgts_cantidad">Cantidad</label>
                <input type="text" name="tgts_cantidad" id="tgts_cantidad" class="form-control inputN" placeholder="0.00">
            </div>
            <div class="form-group col-md-4">
                <label for="tgts_mp">Método de pago</label>
                <select name="tgts_mp" id="tgts_mp" class="form-control">
                    <option value="EFECTIVO">EFECTIVO</option>
                    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                    <option value="DEPOSITO">DEPOSITO</option>
                    <option value="TARJETA">TARJETA DE CREDITO / DEBITO </option>
                </select>
            </div>
            <div class="form-group col-12 col-md-8">
                <label for="tgts_nota">Nota</label>
                <textarea class="form-control area_larga" name="tgts_nota" id="tgts_nota" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group col-12">
                <button type="submit" class="btn btn-primary float-right" name="btnGuardarGasto">Guardar gasto</button>
            </div>
        </div>

        <?php
        $crearGasto = new GastosControlador();
        $crearGasto->ctrCrearGasto();
        ?>
    </form>
</div>


<div class="modal fade" id="mdlCategoria" tabindex="-1" aria-labelledby="mdlCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlCategoriaLabel">Nueva categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formAddCategoria">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="gts_nombre">Nombre de la categoría</label>
                        <input type="text" name="gts_nombre" id="gts_nombre" class="form-control" placeholder="Introduzca el nombre de la categoría ">
                    </div>

                    <div class="form-group">
                        <label for="gts_presupuesto">Presupuesto mensual</label>
                        <input type="text" name="gts_presupuesto" id="gts_presupuesto" class="form-control inputN" value="0.00">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Agregar categoria</button>
                </div>
            </form>
        </div>
    </div>
</div>