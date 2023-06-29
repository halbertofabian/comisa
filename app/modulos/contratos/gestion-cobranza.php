<div class="container-fluid">
    <table class="table table-bordered table-strip tablas">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>RUTA</th>
                <th>CÓDIGO DESCARGA</th>
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
                    <td><?php echo $usr['usr_codigo_descarga'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>