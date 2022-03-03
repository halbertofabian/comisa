<br>
<div class="container-fluid mt-5">

    <table class="table table-bordered table-strip tablas">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>RUTA</th>
                <th>ACCIÓN</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $usuarios = UsuariosModelo::mdlMostrarUsuarios("",'Cobrador');
            foreach ($usuarios as $key => $usr) :
            ?>
                <tr>
                    <td><?php echo $usr['usr_nombre'] ?></td>
                    <td><?php echo $usr['usr_ruta'] ?></td>
                    <td>
                        <?php if ($usr['usr_autorizar_cobranza']) : ?>
                            <button class="btn btn-danger btnDenegarCobro" usr_autorizar_cobranza="0" usr_id="<?= $usr['usr_id'] ?>">Denegar</button>
                        <?php else : ?>
                            <button class="btn btn-success btnDenegarCobro" usr_autorizar_cobranza="1" usr_id="<?= $usr['usr_id'] ?>">Autorizar</button>

                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
</div>

<script>
    $(".btnDenegarCobro").on("click", function() {

        var datos = new FormData();
        var usr_autorizar_cobranza = $(this).attr('usr_autorizar_cobranza');
        var usr_id = $(this).attr('usr_id');

        datos.append("btnDenegarCobro", true);
        datos.append("usr_autorizar_cobranza", usr_autorizar_cobranza);
        datos.append("usr_id", usr_id);
        // alert(usr_autorizar_cobranza)
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            data: datos,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {

            },
            success: function(res) {
                toastr.success(res, '¡Muy bien, cobranza autorizada!');
                setTimeout(function() {
                    window.location.reload();
                }, 200)
            }
        });

    })
</script>