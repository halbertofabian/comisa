<?php cargarComponente('breadcrumb', '', 'Gestión de caja'); ?>
<div class="container">

    <div class="row">
        <div class="col-md-4 col-12">
            <form method="post">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="cja_nombre">Nombre de la caja </label>
                        <input type="text" name="cja_nombre" id="cja_nombre" class="form-control" placeholder="" required autofocus>
                    </div>

                    <input type="hidden" value="<?php echo $_SESSION['session_suc']['scl_id'] ?>" name="cja_id_sucursal">

                    <!-- <div class="form-group col-12">

                        <label for="cja_id_sucursal">Sucursal a la que se le asignará está caja</label>
                        <select class="form-control" name="cja_id_sucursal" id="cja_id_sucursal">
                            <option value="<?php echo $_SESSION['session_suc']['scl_id'] ?>"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></option>
                            <?php
                            $sucursal = SucursalesModelo::mdlMostrarSucursales();
                            foreach ($sucursal as $key => $scl) :
                            ?>
                                <option value="<?php echo $scl['scl_id']  ?>"><?php echo $scl['scl_nombre']  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="col-12">
                        <button class="btn btn-primary float-right" name="btnRegistrarCaja"> Registrar caja </button>
                    </div>
                </div>
                <?php
                $caja = new CajasControlador();
                $caja->ctrAgregarCajas();
                ?>
            </form>
        </div>

        <div class="col-md-8 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lista de cajas</h4>

                            <hr>
                            <div class="row ">
                                <?php

                                $cajas = CajasModelo::mdlMostrarCajas();
                                foreach ($cajas as $key => $cja) :
                                    $checked = $cja['cja_cobrador_check'] == 1 ? 'checked' : '';
                                ?>
                                    <div class="col-md-6">
                                        <div class="card">

                                            <div class="card-body">
                                                <P> <strong class="text-primary"> <?php echo $cja['cja_nombre'] ?></strong> </P>
                                                <span><?php echo 'Creada por: ' . $cja['cja_usuario_registro'] ?></span> <br>
                                                <span><?php echo 'Fecha registro: ' . $cja['cja_fecha_registro'] ?></span>
                                                <br>
                                                <hr>
                                                <?php if ($cja['cja_uso'] == 0) : ?>
                                                    <strong class="text-danger">Cerrada</strong>
                                                <?php else :
                                                    $usuario_abrio = CajasModelo::mdlMostrarUsuarioCajaUso($cja['cja_copn_id']);
                                                ?>
                                                    <!-- <a href="<?php echo HTTP_HOST . 'cortes/view-r/' . $cja['cja_copn_id'] ?>" class="btn btn-success">Abierta</a> -->
                                                    <div class=" alert bg-success text-white" role="alert">
                                                        <strong>CAJA EN USO POR:</strong>
                                                        <p><?php echo  strtoupper($usuario_abrio['usr_nombre']) ?></p>
                                                        <p>Fecha apertuta:</p>
                                                        <p><?php echo  fechaCastellano($usuario_abrio['copn_fecha_abrio']) ?></p>
                                                    </div>
                                                    <div class="alert bg-warning" role="alert">
                                                        <strong>Nota:</strong>
                                                        <p>No olvides cerrar su caja si ya le recibiste.</p>
                                                    </div>

                                                <?php endif; ?>
                                                <div class="card">

                                                    <div class="card-body">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input checkedCajaCobrador" name="" cja_id_caja="<?= $cja['cja_id_caja'] ?>" id="check_<?= $cja['cja_id_caja'] ?>" value="<?= $cja['cja_cobrador_check'] ?>" <?= $checked ?> >
                                                                Caja cobrador
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                          <button class="btn btn-danger  float-right btnDeleteCaja" cja_id_caja="<?= $cja['cja_id_caja'] ?>" ><i class="fa fa-trash""></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php endforeach; ?>


                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(".checkedCajaCobrador").on("click", function(){
        var cja_id_caja = $(this).attr("cja_id_caja");
        var cja_cobrador_check = $(this).val();
        // alert(cja_cobrador_check)
        var valor_check = 0;
        if(cja_cobrador_check == 1){
            valor_check = 0;
        }
        if(cja_cobrador_check == 0){
            valor_check = 1;
        }
        // return;
        var datos = new FormData();
        datos.append("cja_id_caja", cja_id_caja);
        datos.append("cja_cobrador_check", valor_check);
        datos.append("btncheckedCajaCobrador", true);
        $.ajax({
            url: urlApp + 'app/modulos/cajas/cajas.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if(res){
                    toastr.success('¡Muy bien!', 'Dato registrado')
                }else{
                    window.location.reload();
                }

            }
        });

    })

    $(".btnDeleteCaja").on("click", function(){

        var cja_id_caja = $(this).attr("cja_id_caja");
        swal({
        title: `¿Esta seguro de eliminar la caja?`,
        icon: "warning",
        buttons: ['No', 'Si, eliminar'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("cja_id_caja", cja_id_caja);
                datos.append("btnDeleteCaja", true);
                $.ajax({
                    url: urlApp + 'app/modulos/cajas/cajas.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (res) {
                        if (res) {
                            swal({
                                title: "¡Bien!", text: 'Caja eliminada', type: "success", icon: "success"
                            }).then(function () {
                                window.location.reload();
                            });

                        } else {
                            swal("¡Error!", 'Intente de nuevo', "error");
                        }
                    }
                })
            }
        });
    })
</script>