<?php

$contratos = ContratosModelo::mdlConsultarContratosAll();
//preArray($contratos);

?>

<div class="row d-load">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered tablas">
            <thead>
                <tr>
                    <th>VER</th>
                    <th>#TICKET</th>
                    <th>CODIGO</th>
                   
                    <th>NOMBRE</th>
                    <th>CURP</th>
                    <th>DOMICILIO</th>
                    

                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>



<script>
    $(document).ready(function(){
        $(".d-load").addClass('d-none')
    })
</script>