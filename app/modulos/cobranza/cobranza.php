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
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "ingresos") :
    cargarComponente('breadcrumb', '', 'Ingresos');
    include_once 'app/modulos/cobranza/ingresos.php';
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "gastos") :
    cargarComponente('breadcrumb', '', 'Gatos');
    include_once 'app/modulos/cobranza/gastos.php';
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "status") :
    cargarComponente('breadcrumb', '', 'Cartera');
    include_once 'app/modulos/cobranza/estado-cartera.php';
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "rendimiento") :
    cargarComponente('breadcrumb', '', 'Rendimiento');
    include_once 'app/modulos/cobranza/rendimiento.php';
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "depositos") :
    cargarComponente('breadcrumb', '', 'Reporte de depositos');
    include_once 'app/modulos/cobranza/depositos.php';
endif;
