<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 04/02/2021 18:14
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class ContratosControlador
{
    public  static function ctrAgregarContratos()
    {
        if (isset($_POST)) {

            //* Creacion de variables compuestas para actulizar cliente
            $_POST['clts_id'] = $_POST['select_id_cliente'];
            $_POST['clts_antiguedad_tbj'] =  $_POST['clts_antiguedad_trabajo'] . '-' . $_POST['clts_antiguedad_trabajo_1'];
            $_POST['clts_antiguedad_viviendo'] =  $_POST['clts_tiempo_casa'] . '-' . $_POST['clts_tiempo_casa_1'];
            $_POST['clts_tbj_ant_conyuge'] =  $_POST['clts_anttrabajo_conyuge'] . '-' . $_POST['clts_tiempo_trabajo_conyuge'];
            $_POST['clts_tbj_ant_fiador'] =  $_POST['clts_anttrabajo_fiador'] . '-' . $_POST['clts_tiempo_trabajo_fiador'];

            //** */
            $_POST['ctrs_cuenta'] = "";
            $_POST['ctrs_cliente'] = $_POST['select_id_cliente'];
            $_POST['ctrs_vendedor'] = "";
            $_POST['ctrs_fecha_registro'] = FECHA;
            $_POST['ctrs_detalles_vt'] = "";

            $_POST['ctrs_foto_evidencia'] = "";
            $_POST['ctrs_foto_pagare'] = "";
            $_POST['ctrs_foto_fachada'] = "";


            //*- subir imagenes
            if ($_POST['select_id_cliente']) {
                $ft1 = false;
                $msg1 = "";
                $tp1 = "";

                $ft2 = false;
                $msg2 = "";
                $tp2 = "";

                $ft3 = false;
                $msg3 = "";
                $tp3 = "";


                $dirGeneral = DOCUMENT_ROOT . "app/assets/images/imgclientes";
                $dirPersonal = DOCUMENT_ROOT . "app/assets/images/imgclientes/" . $_POST['select_id_cliente'];

                if (!file_exists($dirGeneral)) {
                    mkdir($dirGeneral, 0777, true);
                }
                if (!file_exists($dirPersonal)) {
                    mkdir($dirPersonal, 0777, true);
                }

                if (file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.jpg') || file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.jpeg') || file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.png')) {
                    $msg1 = "Ya existe";
                    $tp1 = "1";
                } else {

                    if ($_FILES['ctrs_evidencia']['tmp_name'] != "") {
                        $MIME = explode("/", $_FILES['ctrs_evidencia']['type']);
                        $type1 = $MIME[1];
                        move_uploaded_file($_FILES['ctrs_evidencia']['tmp_name'], $dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.' . $type1);
                        $_POST['ctrs_foto_evidencia'] = $dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.' . $type1;
                        $msg1 = "Se subio correctamente";
                        $tp1 = "2";
                    } else {
                        $msg1 = "Aun no se sube";
                        $tp1 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.jpg') || file_exists($dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.jpeg') || file_exists($dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.png')) {
                    $msg2 = "Ya existe ";
                    $tp2 = "1";
                } else {

                    if ($_FILES['ctrs_pagare']['tmp_name'] != "") {
                        $MIME2 = explode("/", $_FILES['ctrs_pagare']['type']);
                        $type2 = $MIME2[1];
                        move_uploaded_file($_FILES['ctrs_pagare']['tmp_name'], $dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.' . $type2);
                        $_POST['ctrs_foto_pagare'] = $dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.' . $type2;
                        $msg2 = "Se subio correctamente";
                        $tp2 = "2";
                    } else {
                        $msg2 = "Aun no se sube";
                        $tp2 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.jpg') || file_exists($dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.jpeg') || file_exists($dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.png')) {
                    $msg3 = "Ya existe ";
                    $tp3 = "1";
                } else {

                    if ($_FILES['ctrs_fachada']['tmp_name'] != "") {
                        $MIME3 = explode("/", $_FILES['ctrs_fachada']['type']);
                        $type3 = $MIME3[1];
                        move_uploaded_file($_FILES['ctrs_fachada']['tmp_name'], $dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.' . $type3);
                        $_POST['ctrs_foto_fachada'] = $dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.' . $type3;
                        $msg3 = "Se subio correctamente";
                        $tp3 = "2";
                    } else {
                        $msg3 = "Aun no se sube";
                        $tp3 = "3";
                    }
                }
            }

            //*-Actualiza informacion cliente
            $actualizarCliente = ClientesModelo::actualizarInfIdClient($_POST);
            //*-Insertar info de contrato a la BD
            $insertaContrato = ContratosModelo::mdlAgregarContratos($_POST);

            if ($actualizarCliente || $insertaContrato) {
                return array(
                    'status' => true,
                    'msg1' => $msg1,
                    'tp1' => $tp1,
                    'msg2' => $msg2,
                    'tp2' => $tp2,
                    'msg3' => $msg3,
                    'tp3' => $tp3,
                    'pagina' => HTTP_HOST

                );
            } else {
            }
        }
    }
    public static function ctrActualizarContratos()
    {
        if (isset($_POST)) {

            //* Creacion de variables compuestas para actulizar cliente

            $_POST['clts_antiguedad_tbj'] =  $_POST['clts_antiguedad_trabajo'] . '-' . $_POST['clts_antiguedad_trabajo_1'];
            $_POST['clts_antiguedad_viviendo'] =  $_POST['clts_tiempo_casa'] . '-' . $_POST['clts_tiempo_casa_1'];
            $_POST['clts_tbj_ant_conyuge'] =  $_POST['clts_anttrabajo_conyuge'] . '-' . $_POST['clts_tiempo_trabajo_conyuge'];
            $_POST['clts_tbj_ant_fiador'] =  $_POST['clts_anttrabajo_fiador'] . '-' . $_POST['clts_tiempo_trabajo_fiador'];

            //** */


            $_POST['ctrs_foto_evidencia'] = "";
            $_POST['ctrs_foto_pagare'] = "";
            $_POST['ctrs_foto_fachada'] = "";


            //*- subir imagenes
            if ($_POST['clts_id']) {
                $ft1 = false;
                $msg1 = "";
                $tp1 = "";

                $ft2 = false;
                $msg2 = "";
                $tp2 = "";

                $ft3 = false;
                $msg3 = "";
                $tp3 = "";


                $dirGeneral = DOCUMENT_ROOT . "app/assets/images/imgclientes";
                $dirPersonal = DOCUMENT_ROOT . "app/assets/images/imgclientes/" . $_POST['clts_id'];

                if (!file_exists($dirGeneral)) {
                    mkdir($dirGeneral, 0777, true);
                }
                if (!file_exists($dirPersonal)) {
                    mkdir($dirPersonal, 0777, true);
                }

                if (file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.jpg') || file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.jpeg') || file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.png')) {
                    $msg1 = "Ya existe";
                    $tp1 = "1";
                } else {

                    if ($_FILES['ctrs_evidencia']['tmp_name'] != "") {
                        $MIME = explode("/", $_FILES['ctrs_evidencia']['type']);
                        $type1 = $MIME[1];
                        move_uploaded_file($_FILES['ctrs_evidencia']['tmp_name'], $dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.' . $type1);
                        $_POST['ctrs_foto_evidencia'] = $dirPersonal . '/CLIENTE_CON_PRODUCTO_' . $_POST['ctrs_id'] . '.' . $type1;
                        $msg1 = "Se subio correctamente";
                        $tp1 = "2";
                    } else {
                        $msg1 = "Aun no se sube";
                        $tp1 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.jpg') || file_exists($dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.jpeg') || file_exists($dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.png')) {
                    $msg2 = "Ya existe ";
                    $tp2 = "1";
                } else {

                    if ($_FILES['ctrs_pagare']['tmp_name'] != "") {
                        $MIME2 = explode("/", $_FILES['ctrs_pagare']['type']);
                        $type2 = $MIME2[1];
                        move_uploaded_file($_FILES['ctrs_pagare']['tmp_name'], $dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.' . $type2);
                        $_POST['ctrs_foto_pagare'] = $dirPersonal . '/PAGARE_' . $_POST['ctrs_id'] . '.' . $type2;
                        $msg2 = "Se subio correctamente";
                        $tp2 = "2";
                    } else {
                        $msg2 = "Aun no se sube";
                        $tp2 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.jpg') || file_exists($dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.jpeg') || file_exists($dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.png')) {
                    $msg3 = "Ya existe ";
                    $tp3 = "1";
                } else {

                    if ($_FILES['ctrs_fachada']['tmp_name'] != "") {
                        $MIME3 = explode("/", $_FILES['ctrs_fachada']['type']);
                        $type3 = $MIME3[1];
                        move_uploaded_file($_FILES['ctrs_fachada']['tmp_name'], $dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.' . $type3);
                        $_POST['ctrs_foto_fachada'] = $dirPersonal . '/FACHADA_DE_CASA_' . $_POST['ctrs_id'] . '.' . $type3;
                        $msg3 = "Se subio correctamente";
                        $tp3 = "2";
                    } else {
                        $msg3 = "Aun no se sube";
                        $tp3 = "3";
                    }
                }
            }

            //*-Actualiza informacion cliente
            $actualizarCliente = ClientesModelo::actualizarInfIdClient($_POST);
            //*-Insertar info de contrato a la BD
            $editarContrato = ContratosModelo::mdlActualizarContratos($_POST);

            if ($actualizarCliente || $editarContrato) {
                return array(
                    'status' => true,
                    'msg1' => $msg1,
                    'tp1' => $tp1,
                    'msg2' => $msg2,
                    'tp2' => $tp2,
                    'msg3' => $msg3,
                    'tp3' => $tp3,
                    'pagina' => HTTP_HOST

                );
            } else {
            }
        }
    }
    public static function ctrMostrarContratos()
    {
        $res = ContratosModelo::mdlMostrarContratos($_POST['nombre'], $_POST['id_ctr']);
        return array(
            'status' => true,
            'ctrs' => $res,
            'pagina' => HTTP_HOST

        );
    }
    public function ctrEliminarContratos()
    {
    }

    public static function ctrConsultarContratos()
    {
        if (isset($_POST['btnConsultarNumeroTraspaso'])) {
            $igs_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_POST['usr_id']);
           
            return array(
                'datos_contrato' => ContratosModelo::mdlConsultarContratos($igs_id_corte['usr_caja']),
                'datos_vendedor' => $igs_id_corte
            );
        }
    }

    public static function ctrRegistrarVentasContrato()
    {

        if (isset($_POST['btnRegistrarVentasContrato'])) {


            $arraySize = sizeof($_POST['vts_n_contrato']);

            $contadorVentas = 0;


            for ($i = 0; $i < $arraySize; $i++) {

                $igs_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                if ($igs_id_corte2['usr_caja'] == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo',
                        'pagina' => HTTP_HOST . 'mi-caja'
                    );
                }

                $igs_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_POST['igs_usuario_responsable']);
                if ($igs_id_corte['usr_caja'] == 0) {

                    return array(
                        'status' => false,
                        'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera',
                        'pagina' => HTTP_HOST . 'flujo-caja'
                    );
                }

                $_POST['igs_mp'] = "EFECTIVO";
                $_POST['igs_referencia'] = "";
                $_POST['igs_cuenta'] = "";
                $_POST['igs_ruta'] = "";

                $_POST['igs_id_corte'] = $igs_id_corte['usr_caja'];
                $_POST['igs_id_corte_2'] = $igs_id_corte2['usr_caja'];

                $_POST['igs_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
                $_POST['igs_id_sucursal'] = $_SESSION['session_suc']['scl_id'];




                $vts_total_venta =  str_replace(",", "", $_POST['vts_total'][$i]);
                $vts_enganche =  str_replace(",", "", $_POST['vts_enganche'][$i]);
                $vts_se =  str_replace(",", "", $_POST['vts_se'][$i]);

                

                $total_enganche = $vts_enganche  + $vts_se;

                $ctr_saldo = $vts_total_venta - $total_enganche;

                if ($total_enganche >= $vts_total_venta) {
                    $_POST['igs_tipo'] = 'CONTADO_VENTAS';
                } else {
                    $_POST['igs_tipo'] = 'S/E_VENTAS';
                }

                $_POST['igs_monto'] =  $vts_se;
                $_POST['igs_concepto'] =  $_POST['vts_nombre_cliente'][$i] . ' Nº ' . $_POST['vts_n_contrato'][$i];
                $_POST['igs_fecha_registro'] = FECHA;
                $_POST['igs_cuenta'] = 0;


                $preRegistrarContratos = ContratosModelo::mdlPreregistrarContrato(array(
                    'ctr_folio' => $_POST['vts_n_contrato'][$i],
                    'ctr_fecha_contrato	' => $_POST['vts_fecha'][$i],
                    'ctr_id_vendedor' => $igs_id_corte['usr_id'],
                    'ctr_cliente' => $_POST['vts_nombre_cliente'][$i],

                    'ctr_productos' => "",

                    'ctr_total' => $vts_total_venta,
                    'ctr_enganche' => $vts_total_venta,
                    'ctr_pago_adicional' => $vts_total_venta,
                    'ctr_saldo' => $ctr_saldo,

                    'ctr_nota' => $_POST['ctr_nota'][$i],
                    'ctr_fotos' => ""
                ));

                $crearIngreso = IngresosModelo::mdlAgregarIngresos($_POST);
                if ($crearIngreso) {

                    $contadorVentas++;
                }
            }

            return array(
                'status' => true,
                'mensaje' => 'Se registraron ' . $contadorVentas . ' ventas.',
                'pagina' => HTTP_HOST . 'flujo-caja'
            );
        }
    }
}
