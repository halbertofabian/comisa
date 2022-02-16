<?php
if ($_SESSION['session_usr']['usr_rol'] == 'Jefe de cobranza' || $_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') :
    cargarPagina('mi-caja', $rutas);
elseif ($_SESSION['session_usr']['usr_rol'] == 'Cobrador') :
    header('Location:' . HTTP_HOST . "contratos/enrutar-cuentas");
elseif ($_SESSION['session_usr']['usr_rol'] == 'Agente de llamadas') :
    header('Location:' . HTTP_HOST . "contratos/listar");
?>

<?php else : ?>

   
<?php endif; ?>