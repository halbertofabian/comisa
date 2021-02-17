<script>
    var pagina = ""
</script>
<?php
cargarComponente('breadcrumb', '', 'Gestión de categorías');
?>
<div class="container">
<div class="row">
    <div class="col-12">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#mdlCategoria">
            Nueva categoría
        </button>

    </div>

    <div class="col-12 mt-3">
        <div class="table-responsive">
            <table class="table tablaCategorias tablas">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nombre</th>
                        <th>Presupuesto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $categorias = GastosModelo::mdlConsultarCategorias();

                    foreach ($categorias as $key => $cgst) :

                    ?>
                        <tr>
                            <td><?php echo $cgst['gts_id'] ?></td>
                            <td><?php echo $cgst['gts_nombre'] ?></td>
                            <td><?php echo number_format($cgst['gts_presupuesto'], 2) ?></td>
                            <td>
                            <?php if ($cgst['gts_id'] != 2) : ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        
                                            <button class="dropdown-item text-dark btnEliminarCategoria" gts_id="<?php echo $cgst['gts_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar categoría </button>
                                        
                                    </div>
                                </div>
                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>

</div>
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