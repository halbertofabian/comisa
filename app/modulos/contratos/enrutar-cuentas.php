<div class="container-fluid">
    <form action="formBuscarEnrute" method="post">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="ctr_ruta">RUTA</label>
                    <select name="ctr_ruta" id="ctr_ruta" class="form-control select2">
                        <?php
                        for ($i = 1; $i <= 100; $i++) :
                        ?>
                            <option value="R<?= $i ?>">R<?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="ctr_cuenta"># CUENTA </label>
                    <input type="text" name="ctr_cuenta" id="ctr_cuenta" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ctr_cliente">NOMBRE </label>
                    <input type="text" name="ctr_cliente" id="ctr_cliente" class="form-control" placeholder="" readonly>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Nº ORDEN</label>
                        <input type="text" name="" id="" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="">FORMA DE PAGO</label>
                    <select name="" id="" class="form-control forma_pago">
                        <option value=""></option>
                        <option value="SEMANALES">SEMANALES</option>
                        <option value="CATORCENALES">CATORCENALES</option>
                        <option value="QUINCENALES">QUINCENALES</option>
                        <option value="MENSUALES">MENSUALES</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">DIA PAGO</label>
                    <div class="d-dia_1 d-none">
                        <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="LUNES">LUNES</option>
                            <option value="MARTES">MARTES</option>
                            <option value="MIERCOLES">MIERCOLES</option>
                            <option value="JUEVES">JUEVES</option>
                            <option value="VIERNES">VIERNES</option>
                            <option value="SABADO">SABADO</option>
                            <option value="DOMINGO">DOMINGO</option>
                        </select>
                    </div>
                    <div class="d-dia_2 d-none">
                        <div class="form-group">
                            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="d-dia_P d-none">
                        <div class="form-group">
                            <label for="">PROXIMO DIA DE PAGO</label>
                            <input type="date" name="" id="" class="form-control" placeholder="">
                        </div>
                    </div>

                </div>
                <div class="form-group col-md-4">
                    <label for="">PAGO</label>
                    <input type="text" class="form-control inputN" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">FECHA INICIO PAGO</label>
                    <input type="date" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-4">
                    <label for="">TOTAL</label>
                    <input type="text" class="form-control inputN" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">ENG</label>
                    <input type="text" class="form-control inputN" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">PAGO ADICIONAL</label>
                    <input type="text" class="form-control inputN" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">SALDO</label>
                    <input type="text" class="form-control inputN" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">SALDO ACUAL</label>
                    <input type="text" class="form-control inputN" placeholder="">
                </div>


                <div class="form-group col-md-4">
                    <label for="">FECHA ULTIMO PAGO</label>
                    <input type="date" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="">TOTAL PAGADO</label>
                    <input type="text" class="form-control inputN" placeholder="" readonly>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">STATUS</label>
                        <input type="text" name="" id="" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="">FECHA REAGENDA</label>
                    <input type="date" class="form-control" placeholder="">
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label mt-4">
                            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                            POR LOCALIZAR
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-right">GUARDAR ENRUTAMIENTO</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>RUTA</th>
                        <th># CUENTA</th>
                        <th>FECHA PROXIMO COBRO</th>
                        <th>FECHA REAGENDA</th>
                        <th>ORDEN</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</div>