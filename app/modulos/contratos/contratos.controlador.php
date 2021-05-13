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

                if (file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO.jpg') || file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO.jpeg') || file_exists($dirPersonal . '/CLIENTE_CON_PRODUCTO.png')) {
                    $msg1 = "La foto de cliente con el producto ya existe en el directorio";
                    $tp1 = "1";
                } else {

                    if ($_FILES['ctrs_evidencia']['tmp_name'] != "") {
                        $MIME = explode("/", $_FILES['ctrs_evidencia']['type']);
                        $type1 = $MIME[1];
                        move_uploaded_file($_FILES['ctrs_evidencia']['tmp_name'], $dirPersonal . '/CLIENTE_CON_PRODUCTO.' . $type1);
                        $_POST['ctrs_foto_evidencia'] = "$dirPersonal . '/CLIENTE_CON_PRODUCTO.' . $type1";
                        $msg1 = "La foto de cliente con el producto se subio correctamente";
                        $tp1 = "2";
                    } else {
                        $msg1 = "La foto del cliente con el producto aun no se sube";
                        $tp1 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/PAGARE.jpg') || file_exists($dirPersonal . '/PAGARE.jpeg') || file_exists($dirPersonal . '/PAGARE.png')) {
                    $msg1 = "La foto de cliente con el producto ya existe ";
                    $tp2 = "1";
                } else {

                    if ($_FILES['ctrs_pagare']['tmp_name'] != "") {
                        $MIME2 = explode("/", $_FILES['ctrs_pagare']['type']);
                        $type2 = $MIME2[1];
                        move_uploaded_file($_FILES['ctrs_pagare']['tmp_name'], $dirPersonal . '/PAGARE.' . $type2);
                        $_POST['ctrs_foto_pagare'] = "$dirPersonal . '/PAGARE.' . $type2";
                        $msg2 = "La foto del pagare se subio correctamente";
                        $tp2 = "2";
                    } else {
                        $msg2 = "La foto del pagare aun no se sube";
                        $tp2 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/FACHADA_DE_CASA.jpg') || file_exists($dirPersonal . '/FACHADA_DE_CASA.jpeg') || file_exists($dirPersonal . '/FACHADA_DE_CASA.png')) {
                    $msg3 = "La foto de cliente con el producto ya existe en el directorio";
                    $tp3 = "1";
                } else {

                    if ($_FILES['ctrs_fachada']['tmp_name'] != "") {
                        $MIME3 = explode("/", $_FILES['ctrs_fachada']['type']);
                        $type3 = $MIME3[1];
                        move_uploaded_file($_FILES['ctrs_fachada']['tmp_name'], $dirPersonal . '/FACHADA_DE_CASA.' . $type3);
                        $_POST['ctrs_foto_fachada'] = "$dirPersonal . '/FACHADA_DE_CASA.' . $type3";
                        $msg3 = "La foto de casa se subio correctamente";
                        $tp3 = "2";
                    } else {
                        $msg3 = "La foto de casa aun no se sube";
                        $tp3 = "3";
                    }
                }
            }

            //*-Actualiza informacion cliente
            $actualizarCliente = ClientesModelo::actualizarInfIdClient($_POST);
            //*-Insertar info de contrato a la BD
            $insertaContrato=ContratosModelo::mdlAgregarContratos($_POST);

            return array(
                'status' => true,
                'msg1' => $msg1,
                'tp1' => $tp1,
                'msg2' => $msg2,
                'tp2' => $tp2,
                'msg3' => $msg3,
                'tp3' => $tp3,

            );
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
