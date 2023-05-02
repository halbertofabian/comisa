<?php

header('Content-Encoding: UTF-8');

header('Content-type: text/csv; charset=UTF-8');

header("Content-Disposition: attachment; filename=exportar_cuentas.csv");

header("Pragma: no-cache");

header("Expires: 0");

header('Content-Transfer-Encoding: binary');

echo "\xEF\xBB\xBF";

include_once '../config.php';
require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.controlador.php';


$contratos_set = ContratosControlador::ctrListarContratoExcel($_GET);



$contratos = array();


foreach ($contratos_set as $key => $ctr) {

    $ctls_propia = "";
    $ctls_rentada = "";
    $ctls_prestada = "";

    if ($ctr['clts_tipo_vivienda'] == "PROPIA") {
        $ctls_propia = "PROPIA";
        $ctls_rentada = "-";
        $ctls_prestada = "-";
    } elseif ($ctr['clts_tipo_vivienda'] == "RENTADA") {
        $ctls_propia = "-";
        $ctls_rentada = "RENTADA";
        $ctls_prestada = "-";
    } elseif ($ctr['clts_tipo_vivienda'] == "PRESTADA") {
        $ctls_propia = "-";
        $ctls_rentada = "-";
        $ctls_prestada = "PRESTADA";
    } else {
        $ctls_propia = $ctr['clts_tipo_vivienda'];
        $ctls_rentada = "-";
        $ctls_prestada = "PRESTADA";
    }
    // preArray($ctr);
    // Fecha trabajada contrato
    $fecha_contrato = substr($ctr['ctr_fecha_contrato'], 0, 10);
    $fecha_contrato = explode('-', $fecha_contrato);
    $dia_c = $fecha_contrato[2];
    $mes_c = $fecha_contrato[1];
    $ano_c = $fecha_contrato[0];

    // Fecha de pago
    $fecha_pago = $ctr['ctr_proximo_pago'];
    // $fecha_pago = date_format($fecha_pago, 'd/m/y');

    $clts_telefono = "";
    $telefono = is_array(json_decode($ctr['clts_telefono'], true));
    if ($telefono) {
        foreach (json_decode($ctr['clts_telefono'], true) as $tel) {
            $clts_telefono = $tel['telefono'];
        }
    } else {
        if (empty($ctr['clts_telefono'])) {
            $clts_telefono = "-";
        } else {
            $clts_telefono = $ctr['clts_telefono'];
        }
    }

    $clts_coordenadas = "";
    $coordenada = is_array(json_decode($ctr['clts_coordenadas'], true));
    if ($coordenada) {
        foreach (json_decode($ctr['clts_coordenadas'], true) as $coor) {
            $clts_coordenadas = $coor['coordenada'];
        }
    } else {
        if (empty($ctr['clts_coordenadas'])) {
            $clts_coordenadas = "-";
        } else {
            $clts_coordenadas = $ctr['clts_coordenadas'];
        }
    }

    // Productos 
    $productos = json_decode($ctr['ctr_productos'], true);
    $cadena_productos = "";
    $cantidad_productos = 0;
    foreach ($productos as $key => $pds) {
        # code...
        $cadena_productos .= $pds['nombreProducto'];
        $cantidad_productos += intval($pds['cantidad']);
    }

    // Tipo de casa de



    $datos = array(
        'ctr_codigo' => $ctr['ctr_numero_cuenta'] . '' . $ctr['ctr_ruta'],
        'ctr_dia' => $dia_c,
        'ctr_mes' => $mes_c,
        'ctr_ano' => $ano_c,

        'ctr_id' => $ctr['ctr_id'],
        'ctr_folio' => $ctr['ctr_folio'],
        'ctr_fecha_contrato' => $ctr['ctr_fecha_contrato'],
        'ctr_id_vendedor' => $ctr['ctr_id_vendedor'],
        'ctr_cliente' => $ctr['ctr_cliente'],
        'ctr_numero_cuenta' => $ctr['ctr_numero_cuenta'],
        'ctr_ruta' => $ctr['ctr_ruta'],
        'ctr_forma_pago' => $ctr['ctr_forma_pago'],
        'ctr_dia_pago' => $ctr['ctr_dia_pago'],
        'ctr_proximo_pago' => $fecha_pago,
        'ctr_plazo_credito' => $ctr['ctr_plazo_credito'],
        'ctr_tipo_pago' => $ctr['ctr_tipo_pago'],
        'ctr_productos' => $cadena_productos,
        'ctr_cantidad_productos' => $cantidad_productos,
        'ctr_total' => $ctr['ctr_total'],
        'ctr_enganche' => $ctr['ctr_enganche'],
        'ctr_pago_adicional' => $ctr['ctr_pago_adicional'],
        'ctr_saldo' => $ctr['ctr_saldo'],
        'ctr_elaboro' => $ctr['ctr_elaboro'],
        'ctr_status_c' => $ctr['ctr_status_cuenta'],
        'ctr_nota' => $ctr['ctr_nota'],
        // 'ctr_fotos' => $ctr['ctr_fotos'],
        'ctr_nombre_ref_1' => $ctr['ctr_nombre_ref_1'],
        'ctr_parentesco_ref_1' => $ctr['ctr_parentesco_ref_1'],
        'ctr_direccion_ref_1' => $ctr['ctr_direccion_ref_1'],
        'ctr_colonia_ref_1' => $ctr['ctr_colonia_ref_1'],
        'ctr_telefono_ref_1' => $ctr['ctr_telefono_ref_1'],
        'clts_curp' => $ctr['clts_curp'],
        'clts_telefono' => $clts_telefono,
        'clts_domicilio' => $ctr['clts_domicilio'],
        'clts_col' => $ctr['clts_col'],
        'clts_entre_calles' => $ctr['clts_entre_calles'],
        'clts_trabajo' => $ctr['clts_trabajo'],
        'clts_puesto' => $ctr['clts_puesto'],
        'clts_direccion_tbj' => $ctr['clts_direccion_tbj'],
        'clts_col_tbj' => $ctr['clts_col_tbj'],
        'clts_tel_tbj' => $ctr['clts_tel_tbj'],
        'clts_antiguedad_tbj' => $ctr['clts_antiguedad_tbj'],
        'clts_igs_mensual_tbj' => $ctr['clts_igs_mensual_tbj'],

        'clts_tipo_vivienda' => $ctr['clts_tipo_vivienda'],
        'clts_propia' => $ctls_propia,
        'clts_rentada' => $ctls_rentada,
        'clts_prestada' => $ctls_prestada,


        'clts_vivienda_anomde' => $ctr['clts_vivienda_anomde'],
        'clts_antiguedad_viviendo' => $ctr['clts_antiguedad_viviendo'],
        'clts_coordenadas' => $clts_coordenadas,
        'clts_nom_conyuge' => $ctr['clts_nom_conyuge'],
        'clts_tbj_conyuge' => $ctr['clts_tbj_conyuge'],
        'clts_tbj_puesto_conyuge' => $ctr['clts_tbj_puesto_conyuge'],
        'clts_tbj_dir_conyuge' => $ctr['clts_tbj_dir_conyuge'],
        'clts_tbj_col_conyuge' => $ctr['clts_tbj_col_conyuge'],
        'clts_tbj_tel_conyuge' => $ctr['clts_tbj_tel_conyuge'],
        'clts_tbj_ant_conyuge' => $ctr['clts_tbj_ant_conyuge'],
        'clts_tbj_ing_conyuge' => $ctr['clts_tbj_ing_conyuge'],
        'clts_nom_fiador' => $ctr['clts_nom_fiador'],
        'clts_parentesco_fiador' => $ctr['clts_parentesco_fiador'],
        'clts_tel_fiador' => $ctr['clts_tel_fiador'],
        'clts_dir_fiador' => $ctr['clts_dir_fiador'],
        'clts_col_fiador' => $ctr['clts_col_fiador'],
        'clts_tbj_fiador' => $ctr['clts_tbj_fiador'],
        'clts_tbj_dir_fiador' => $ctr['clts_tbj_dir_fiador'],
        'clts_tbj_tel_fiador' => $ctr['clts_tbj_tel_fiador'],
        'clts_tbj_col_fiador' => $ctr['clts_tbj_col_fiador'],
        'clts_tbj_ant_fiador' => $ctr['clts_tbj_ant_fiador'],
        // 'clts_fotos_fiador' => $ctr['A'],
        'clts_nom_ref2' => $ctr['clts_nom_ref2'],
        'clts_parentesco_ref2' => $ctr['clts_parentesco_ref2'],
        'clts_dir_ref2' => $ctr['clts_dir_ref2'],
        'clts_col_ref2' => $ctr['clts_col_ref2'],
        'clts_tel_ref2' => $ctr['clts_tel_ref2'],
        'clts_nom_ref3' => $ctr['clts_nom_ref3'],
        'clts_parentesco_ref3' => $ctr['clts_parentesco_ref3'],
        'clts_dir_ref3' => $ctr['clts_dir_ref3'],
        'clts_col_ref3' => $ctr['clts_col_ref3'],
        'clts_tel_ref3' => $ctr['clts_tel_ref3'],
        'sobre_enganche_pendiente' => $ctr['sobre_enganche_pendiente'],
        'clts_registro_venta' => $ctr['clts_registro_venta'],
        'clts_caja' => $ctr['clts_caja'],
        'clts_folio_nuevo' => $ctr['clts_folio_nuevo'],
        'ctr_forma_pago' => $ctr['ctr_pago_credito'] . ' ' . $ctr['ctr_forma_pago'],
        'ctr_aprovado_ventas' => $ctr['ctr_aprovado_ventas'],
        'usr_nombre' => $ctr['usr_nombre'],
        'clts_puerta_color' => $ctr['clts_puerta_color'],
        'clts_fachada_color' => $ctr['clts_fachada_color'],
        'ctr_ultima_fecha_abono' => $ctr['ctr_ultima_fecha_abono']

    );

    array_push($contratos, $datos);
}

echo "CONTROL DE CONTRATOS \n";
echo "CODIGO,";
echo "NUMERO,";
echo "RUTA,";
echo "DIA,";
echo "MES,";
echo "AÑO,";
echo "NOMBRE,";
echo "TELEFONO,";
echo "DOMICILIO,";
echo "COLONIA,";
echo "ENTRE CALLES,";
echo "FACHADA COLOR,";
echo "PUERTA COLOR,";
echo "TRABAJA EN,";
echo "PUESTO,";
echo "DIRECCION,";
echo "COLONIA,";
echo "TELEFONO,";
echo "ANTIGÜEDAD,";
echo "INGRESO MENSUAL,";
echo "CRED ELECT No.,";
echo "DOC COMP DOM TIPO,";
echo "NO.,";
echo "FECHA,";
echo "LA CASA ES: PROPIA,";
echo "RENTADA,";
echo "PRESTADA,";
echo "TIEMPO VIVIENDO AQUÍ,";
echo "A NOMBRE DE,";
echo "No REG. PROPIEDAD,";
echo "NOMBRE,";
echo "TRABAJA EN,";
echo "PUESTO,";
echo "DIRECCION,";
echo "COLONIA,";
echo "TELEFONO,";
echo "TIEMPO TRAB ALLI,";
echo "NOMBRE,";
echo "PARENTESCO,";
echo "TELEFONO,";
echo "DIRECCION,";
echo "COLONIA,";
echo "TRABAJA EN,";
echo "DIRECCION,";
echo "TELEFONO,";
echo "COLONIA,";
echo "FOL CRED ELECTOR,";
echo "ANTIGÜEDAD,";
echo "NOMBRE,";
echo "PARENTESCO,";
echo "DIRECCION,";
echo "COLONIA,";
echo "TELEFONO,";
echo "NOMBRE,";
echo "PARENTESCO,";
echo "DIRECCION,";
echo "COLONIA,";
echo "TELEFONO,";
echo "FORMA DE PAGO,";
echo "FECHA PROX PAG,";
echo "DIA Y HORA DE PAGO,";
echo "PLAZO DE CREDITO,";
echo "CANTIDAD,";
echo "DESCRIPCION,";
echo "PRECIO,";
echo "ENGANCHE,";
echo "PAGO ADICIONAL,";
echo "VENDEDOR,";
echo "PROMOTOR,";
echo "STATUS CUENTA,";
echo "SALDO,";
echo "TRASPASO A,";
echo "TRASPASO DE,";
echo "OBSERVACIONES,";
echo "COORDENADAS,";
echo "CURP,";
echo "SALDO ACTUAL,";
echo "INGRESO CONYUGUE,";
echo " \n";




foreach ($contratos as $key => $ctr) {
    echo dnum($ctr['ctr_codigo']) . ",";
    echo dnum($ctr['ctr_numero_cuenta']) . ",";
    echo dnum($ctr['ctr_ruta']) . ",";
    echo dnum($ctr['ctr_dia']) . ",";
    echo dnum($ctr['ctr_mes']) . ",";
    echo dnum($ctr['ctr_ano']) . ",";
    echo dnum($ctr['ctr_cliente']) . ",";
    echo dnum($ctr['clts_telefono']) . ",";
    echo dnum($ctr['clts_domicilio']) . ",";
    echo dnum($ctr['clts_col']) . ",";
    echo dnum($ctr['clts_entre_calles']) . ",";
    echo dnum($ctr['clts_fachada_color']) . ",";
    echo dnum($ctr['clts_puerta_color']) . ",";
    echo dnum($ctr['clts_trabajo']) . ",";
    echo dnum($ctr['clts_puesto']) . ",";
    echo dnum($ctr['clts_direccion_tbj']) . ",";
    echo dnum($ctr['clts_col_tbj']) . ",";
    echo dnum($ctr['clts_tel_tbj']) . ",";
    echo dnum($ctr['clts_antiguedad_tbj']) . ",";
    echo dnum($ctr['clts_igs_mensual_tbj']) . ",";
    echo "-,";
    echo "-,";
    echo "-,";
    echo "-,";
    echo dnum($ctr['clts_propia']) . ",";
    echo dnum($ctr['clts_rentada']) . ",";
    echo dnum($ctr['clts_prestada']) . ",";
    echo dnum($ctr['clts_antiguedad_viviendo']) . ",";
    echo dnum($ctr['clts_vivienda_anomde']) . ",";
    echo "-,";
    echo dnum($ctr['clts_nom_conyuge']) . ",";
    echo dnum($ctr['clts_tbj_conyuge']) . ",";
    echo dnum($ctr['clts_tbj_puesto_conyuge']) . ",";
    echo dnum($ctr['clts_tbj_dir_conyuge']) . ",";
    echo dnum($ctr['clts_tbj_col_conyuge']) . ",";
    echo dnum($ctr['clts_tbj_tel_conyuge']) . ",";
    echo dnum($ctr['clts_tbj_ant_conyuge']) . ",";
    echo dnum($ctr['clts_nom_fiador']) . ",";
    echo dnum($ctr['clts_parentesco_fiador']) . ",";
    echo dnum($ctr['clts_tel_fiador']) . ",";
    echo dnum($ctr['clts_dir_fiador']) . ",";
    echo dnum($ctr['clts_col_fiador']) . ",";
    echo dnum($ctr['clts_tbj_fiador']) . ",";
    echo dnum($ctr['clts_tbj_dir_fiador']) . ",";
    echo dnum($ctr['clts_tbj_tel_fiador']) . ",";
    echo dnum($ctr['clts_tbj_col_fiador']) . ",";
    echo "-,";
    echo dnum($ctr['clts_tbj_ant_fiador']) . ",";
    echo dnum($ctr['ctr_nombre_ref_1']) . ",";
    echo dnum($ctr['ctr_parentesco_ref_1']) . ",";
    echo dnum($ctr['ctr_direccion_ref_1']) . ",";
    echo dnum($ctr['ctr_colonia_ref_1']) . ",";
    echo dnum($ctr['ctr_telefono_ref_1']) . ",";
    echo dnum($ctr['clts_nom_ref2']) . ",";
    echo dnum($ctr['clts_parentesco_ref2']) . ",";
    echo dnum($ctr['clts_dir_ref2']) . ",";
    echo dnum($ctr['clts_col_ref2']) . ",";
    echo dnum($ctr['clts_tel_ref2']) . ",";
    echo dnum($ctr['ctr_forma_pago']) . ",";
    echo dnum($ctr['ctr_proximo_pago']) . ",";
    echo dnum($ctr['ctr_dia_pago']) . ",";
    echo dnum($ctr['ctr_plazo_credito']) . ",";
    echo dnum($ctr['ctr_cantidad_productos']) . ",";
    echo dnum($ctr['ctr_productos']) . ",";
    echo dnum($ctr['ctr_total']) . ",";
    echo dnum($ctr['ctr_enganche']) . ",";
    echo dnum($ctr['ctr_pago_adicional']) . ",";
    echo dnum($ctr['usr_nombre']) . ",";
    echo dnum($ctr['usr_nombre']) . ",";
    echo dnum($ctr['ctr_status_c']) . ",";
    echo dnum($ctr['ctr_saldo']) . ",";
    echo  "-,";
    echo  "-,";
    echo dnum($ctr['ctr_nota']) . ",";
    echo dnum($ctr['clts_coordenadas']) . ",";
    echo dnum($ctr['clts_curp']) . ",";
    echo dnum($ctr['ctr_saldo']) . ",";
    echo dnum($ctr['clts_tbj_ing_conyuge']) . "\n";
}

echo "\n";
echo "\n";
echo "\n";
echo "CONTROL DE VENTAS \n";
echo ",";
echo "No.,";
echo "FECHA,";
echo "FOLIO,";
echo "CLIENTE,";
echo "ARTICULO,";
echo "DOMICILIO,";
echo "POBLADO,";
echo "RUTA,";
echo "ENG.,";
echo "S/E.,";
echo "PEND. ENGANCHE ,";
echo "VENDEDOR \n";

foreach ($contratos as $key => $ctr) {
    echo ",";
    echo $key . ",";
    echo $ctr['ctr_dia'] . '/' . $ctr['ctr_mes'] . '/' . $ctr['ctr_ano'] . ",";
    echo dnum($ctr['ctr_folio']) . ",";
    echo dnum($ctr['ctr_cliente']) . ",";
    echo dnum($ctr['ctr_productos']) . ",";
    echo dnum($ctr['clts_domicilio']) . ",";
    echo dnum($ctr['clts_col']) . ",";
    echo dnum($ctr['ctr_ruta']) . ",";
    echo dnum($ctr['ctr_enganche']) . ",";
    echo dnum($ctr['ctr_pago_adicional']) . ",";
    echo dnum($ctr['sobre_enganche_pendiente']) . ",";
    echo dnum($ctr['usr_nombre']) . "\n";
}


function isArray($array)
{
    try {
        json_decode($array, true);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}
