<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Ruta</label>
                    <select class="form-control select2" name="" id="">
                        <option value="">Selecionar ruta</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) :
                        ?>
                            <option value="R<?= $i ?>">R<?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12"></div>
    <div class="col-md-6">
        <div class="card" style="height: 180px">
            <div class="card-header">
                Nombre del cobrador: Juán Alberto
            </div>
            <div class="card-body text-center">
                <h1 class="text-center">279</h1>
                <h6 class="text-center">Total de cuentas</h6>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height: 180px">
            <div class="card-header">
                Porcentaje de cobro:
            </div>
            <div class="card-body text-center">
                <h1 class="text-center">13%</h1>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height: 380px">
            <div class="card-header text-center">
                Cuentas por metodos de pago
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>120</h3>
                                <p class="card-text text-center">Semanasles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>16</h3>
                                <p class="card-text text-center">Catorcenales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>8</h3>
                                <p class="card-text text-center">Quincenales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>2</h3>
                                <p class="card-text text-center">Mensuales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height: 380px">
            <div class="card-header text-center">
                Objetivo: 100%
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>120</h3>
                                <p class="card-text text-center">Total de cuentas a cobro</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>16</h3>
                                <p class="card-text text-center">Cuentas cobradas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>120</h3>
                                <p class="card-text text-center">Cobranza</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>120</h3>
                                <p class="card-text text-center">Ganancía</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>