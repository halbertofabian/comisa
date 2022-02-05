<?php
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "actualizar-saldos") :
    cargarComponente('breadcrumb', '', 'Actualizar saldos');
    include_once 'app/modulos/cobranza/actualizar-saldos.php';
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "ruta") :
    cargarComponente('breadcrumb', '', 'Bajar Ruta');
    include_once 'app/modulos/cobranza/bajar-ruta.php';
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "estado-cuenta") :
    cargarComponente('breadcrumb', '', 'Estado de cuenta');
    include_once 'app/modulos/cobranza/estado-cuenta.php';
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "autorizar-pagos") :
    cargarComponente('breadcrumb', '', 'Autorizar pagos');
    include_once 'app/modulos/cobranza/autorizar-pagos.php';
endif;
