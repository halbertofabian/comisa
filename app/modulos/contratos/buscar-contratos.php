<?php
 cargarComponente('breadcrumb', '', 'Buscar contrato');
?>
 <div class="container">
        <form>

            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="">Buscar cliente</label>
                        <input type="text" name="ctrs_cliente_aux" id="ctrs_cliente_aux" class="form-control" placeholder="INTRODUCE UN NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12 ">
                    <div class="form-group mt-4">
                        <button type="button" id="btn_Mostar_ctrs" class="btn btn-primary btn-sm-block  btn-load">BUSCAR</button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>CUENTA</th>
                                        <th>CLIENTE</th>
                                        <th>FECHA DE REGISTRO</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="TbFiltroNombre">
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>


        </form>
    </div>