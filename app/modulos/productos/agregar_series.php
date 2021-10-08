<div class="container">
    <div class="row">
        <div class="col-md-4">

            <form id="formAddSerie">
                <div class="form-group">
                    <label for="autocomplete_pdt_serie"><span class="text-danger">*</span> Busque el producto</label>
                    <input type="hidden" id="sr_id">
                    <input type="hidden" id="sr_codigo">
                    <input type="hidden" id="sr_producto">
                    <input type="text" name="autocomplete_pdt_serie" id="autocomplete_pdt_serie" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="pdt_serie"><span class="text-danger">*</span> Escriba aquí el número de serie</label>
                    <input type="hidden" id="productos_series">
                    <input type="text" name="pdt_serie" id="pdt_serie" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <input type="submit" name="" id="" class="btn btn-dark float-right" value="Generar serie">
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#SKU</th>
                        <th>Producto</th>
                        <th>#Serie</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody id="tbodySeries">

                </tbody>
            </table>
            <button type="button" class="btn btn-primary float-right btnGuardarSeries">Guardar series</button>
        </div>
    </div>

</div>