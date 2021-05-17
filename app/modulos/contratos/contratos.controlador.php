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
    public function ctrAgregarContratos()
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

                if (file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_'.$_POST['ctrs_id'].'.jpg') || file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_'.$_POST['ctrs_id'].'.jpeg') || file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO_'.$_POST['ctrs_id'].'.png')) {
                    $msg1 = "Ya existe";
                    $tp1 = "1";
                } else {

                    if ($_FILES['ctrs_evidencia']['tmp_name'] != "") {
                        $MIME = explode("/", $_FILES['ctrs_evidencia']['type']);
                        $type1 = $MIME[1];
                        move_uploaded_file($_FILES['ctrs_evidencia']['tmp_name'], $dirPersonal . '/CLIENTE_CON_PRODUCTO_'.$_POST['ctrs_id'].'.' . $type1);
                        $_POST['ctrs_foto_evidencia'] = $dirPersonal . '/CLIENTE_CON_PRODUCTO_'.$_POST['ctrs_id'].'.' . $type1;
                        $msg1 = "Se subio correctamente";
                        $tp1 = "2";
                    } else {
                        $msg1 = "Aun no se sube";
                        $tp1 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/PAGARE_'.$_POST['ctrs_id'].'.jpg') || file_exists($dirPersonal . '/PAGARE_'.$_POST['ctrs_id'].'.jpeg') || file_exists($dirPersonal . '/PAGARE_'.$_POST['ctrs_id'].'.png')) {
                    $msg2 = "Ya existe ";
                    $tp2 = "1";
                } else {

                    if ($_FILES['ctrs_pagare']['tmp_name'] != "") {
                        $MIME2 = explode("/", $_FILES['ctrs_pagare']['type']);
                        $type2 = $MIME2[1];
                        move_uploaded_file($_FILES['ctrs_pagare']['tmp_name'], $dirPersonal . '/PAGARE_'.$_POST['ctrs_id'].'.' . $type2);
                        $_POST['ctrs_foto_pagare'] = $dirPersonal . '/PAGARE_'.$_POST['ctrs_id'].'.' . $type2;
                        $msg2 = "Se subio correctamente";
                        $tp2 = "2";
                    } else {
                        $msg2 = "Aun no se sube";
                        $tp2 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/FACHADA_DE_CASA_'.$_POST['ctrs_id'].'.jpg') || file_exists($dirPersonal . '/FACHADA_DE_CASA_'.$_POST['ctrs_id'].'.jpeg') || file_exists($dirPersonal . '/FACHADA_DE_CASA_'.$_POST['ctrs_id'].'.png')) {
                    $msg3 = "Ya existe ";
                    $tp3 = "1";
                } else {

                    if ($_FILES['ctrs_fachada']['tmp_name'] != "") {
                        $MIME3 = explode("/", $_FILES['ctrs_fachada']['type']);
                        $type3 = $MIME3[1];
                        move_uploaded_file($_FILES['ctrs_fachada']['tmp_name'], $dirPersonal . '/FACHADA_DE_CASA_'.$_POST['ctrs_id'].'.' . $type3);
                        $_POST['ctrs_foto_fachada'] = $dirPersonal . '/FACHADA_DE_CASA_'.$_POST['ctrs_id'].'.' . $type3;
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
            }else{

            }
        }
    }
    public function ctrActualizarContratos()
    {
    }
    public function ctrMostrarContratos()
    {
    }
    public function ctrEliminarContratos()
    {
    }
}
