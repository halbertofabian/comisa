<?php
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "actualizar-saldos") :
    cargarComponente('breadcrumb', '', 'Actualizar saldos');
    include_once 'app/modulos/cobranza/actualizar-saldos.php';
endif;
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "ruta") :
    cargarComponente('breadcrumb', '', 'Bajar Ruta');
    include_once 'app/modulos/cobranza/bajar-ruta.php';
endif;
