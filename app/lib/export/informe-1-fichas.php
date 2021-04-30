<?php
header('Content-Encoding: UTF-8');

header('Content-type: text/csv; charset=UTF-8');

header("Content-Disposition: attachment; filename=alumnos_export.csv");

header("Pragma: no-cache");

header("Expires: 0");

header('Content-Transfer-Encoding: binary');
echo "\xEF\xBB\xBF";
include_once '../../../config.php';
require_once DOCUMENT_ROOT . 'app/modulos/informes/informes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/informes/informes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.modelo.php';
$res = InformesControlador::ctrInforme_1(array(
    'ifs_sucursal' => $_SESSION['session_suc']['scl_id'],
    'ifs_fecha_inicio' => $_GET['ifs_fecha_inicio'],
    'ifs_fecha_fin' => $_GET['ifs_fecha_fin'],
    'ifs_concepto' => $_GET['ifs_concepto'],
));
echo "# Número de transacción,";
echo "# Inscripción,";
echo "# Ficha de pago,";
echo "Sub monto,";
echo "Monto total,";
echo "Descuento,";
echo "Concepto,";
echo "Adeudo,";
echo "Fecha registro,";
echo "Usuario registro\n";
foreach ($res as $key => $ifs) {
    echo $ifs['ppg_id'] . ",";
    echo $ifs['ppg_ficha_pago'] . ",";
    echo $ifs['ppg_ficha_venta'] . ",";
    echo $ifs['ppg_monto'] . ",";
    echo $ifs['ppg_total'] . ",";
    echo $ifs['ppg_descuento'] . ",";
    echo $ifs['ppg_concepto'] . ",";
    echo $ifs['ppg_adeudo'] . ",";
    echo $ifs['ppg_fecha_registro'] . ",";
    echo $ifs['ppg_usuario_registro'] . "\n";
}
