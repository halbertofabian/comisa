<script>
    var pagina = ""
</script>
<?php
// if ($_SESSION['session_usr']['usr_rol'] != "Administrador") :
//     cargarComponente ('acceso-restringido', '', '');
//     return;
// endif;
cargarComponente('breadcrumb', '', 'Listar Gastos'); ?>


<div class="container">



    <div class="row " id="lista-gastos">
        <!-- <div class="col-12">
            <a href="<?php echo HTTP_HOST . 'gastos' ?>" class="btn btn-primary float-right ml-1">Agregar gasto</a>

            <button class="btn btn-dark float-right mb-1 btnListarGastosCat "><i class="fa fa-th" aria-hidden="true"></i> Categoría</button>
        </div> -->
        <div class="col-12">

            <div class="table-responsive">
                <table id="tabla-listar-gastos" class="table tablaGastos table-light dt-responsive table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#Número de gasto</th>
                            <th>Categoría</th>
                            <th>Concepto</th>
                            <th>Fecha de gasto</th>
                            <th>Cantidad</th>
                            <th>Metodo de pago</th>
                            <th>Usuario registro</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlEditarNota" tabindex="-1" aria-labelledby="mdlEditarNotaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlEditarNotaLabel">Editar nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group col-12 col-md-12">
                        <label for="nota">Nota</label>
                        <textarea class="form-control" name="nota" id="nota" cols="30" rows="5"></textarea>
                        <input type="hidden" name="id" id="idNota">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="submit" name="btnEditarNota" class="btn btn-primary">Editar nota</button>
                </div>
                <?php
                $editarNota = new GastosControlador();
                $editarNota->ctrEditarNota('tbl_gastos_tgts', 'tgts_nota', 'tgts_id', 'listar-gastos');
                ?>
            </form>
        </div>
    </div>
</div>
