<?php
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "actualizar-saldos") :
    cargarComponente('breadcrumb', '', 'Actualizar saldos');
    include_once 'app/modulos/cobranza/actualizar-saldos.php';

endif;
?>