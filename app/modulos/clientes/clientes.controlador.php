
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 31/01/2021 16:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class ClientesControlador
{
    public static function ctrAgregarClientes()
    {
        if (isset($_POST['btnNewClientAdd'])) {
            $_POST['clts_ruta'] = '';
            $_POST['clts_usuario_registro'] = $_SESSION['session_usr']['usr_id'];

            $_POST['clts_antiguedad_tbj'] =  $_POST['clts_antiguedad_trabajo'] . '-' . $_POST['clts_antiguedad_trabajo_1'];
            $_POST['clts_antiguedad_viviendo'] =  $_POST['clts_tiempo_casa'] . '-' . $_POST['clts_tiempo_casa_1'];
            $_POST['clts_tbj_ant_conyuge'] =  $_POST['clts_anttrabajo_conyuge'] . '-' . $_POST['clts_tiempo_trabajo_conyuge'];
            $_POST['clts_tbj_ant_fiador'] =  $_POST['clts_anttrabajo_fiador'] . '-' . $_POST['clts_tiempo_trabajo_fiador'];
            $_POST['clts_ubicacion'] = '';
            $_POST['clts_foto_ine'] = '';
            $_POST['clts_foto_ineReverso'] = '';
            $_POST['clts_foto_cpdomicilio'] = '';

            //$_POST['cts_fecha_registro'] = FECHA;


            $agrgarClientes = ClientesModelo::mdlAgregarClientes($_POST);


            if ($agrgarClientes) {
                return array(
                    'status' => true,
                    'mensaje' => 'Cliente registrado con éxito',
                    'pagina' => HTTP_HOST . 'clientes/new'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => '¡Ups! Ocurrio un error, intenta de nuevo',
                    'pagina' => HTTP_HOST . 'clientes/new'
                );
            }
        }
    }
    public function ctrActualizarClientes()
    {
        if (isset($_POST['btnEditaClient'])) {


            $_POST['clts_antiguedad_tbj'] =  $_POST['clts_antiguedad_trabajo'] . '-' . $_POST['clts_antiguedad_trabajo_1'];
            $_POST['clts_antiguedad_viviendo'] =  $_POST['clts_tiempo_casa'] . '-' . $_POST['clts_tiempo_casa_1'];
            $_POST['clts_tbj_ant_conyuge'] =  $_POST['clts_anttrabajo_conyuge'] . '-' . $_POST['clts_tiempo_trabajo_conyuge'];
            $_POST['clts_tbj_ant_fiador'] =  $_POST['clts_anttrabajo_fiador'] . '-' . $_POST['clts_tiempo_trabajo_fiador'];

            $_POST['clts_foto_ine'] = "";
            $_POST['clts_foto_ineReverso'] = "";
            $_POST['clts_foto_cpdomicilio'] = "";

            //*- subir imagenes
            if (
                $_POST['clts_id'] &&
                ($_FILES['ineFrente']['tmp_name'] != "" || $_FILES['ineReverso']['tmp_name'] != "" || $_FILES['cdom']['tmp_name'] != "")
            ) {
                echo "entro xdd";

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
                $dirPersonal = DOCUMENT_ROOT . "app/assets/images/imgclientes/" . $_POST['clts_id']."/docs";

                if (!file_exists($dirGeneral)) {
                    mkdir($dirGeneral, 0777, true);
                }
                if (!file_exists($dirPersonal)) {
                    mkdir($dirPersonal, 0777, true);
                }

                if (file_exists($dirPersonal . '/INE.jpg') || file_exists($dirPersonal . '/INE.jpeg') || file_exists($dirPersonal . '/INE.png')) {
                    $msg1 = "Ya existe";
                    $tp1 = "1";
                } else {

                    if ($_FILES['ineFrente']['tmp_name'] != "") {
                        $MIME = explode("/", $_FILES['ineFrente']['type']);
                        $type1 = $MIME[1];
                        move_uploaded_file($_FILES['ineFrente']['tmp_name'], $dirPersonal . '/INE.' . $type1);
                        $_POST['clts_foto_ine'] = $dirPersonal . '/INE' . $type1;
                        $msg1 = "Se subio correctamente";
                        $tp1 = "2";
                    } else {
                        $msg1 = "Aun no se sube";
                        $tp1 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/INE_R.jpg') || file_exists($dirPersonal . '/INE_R.jpeg') || file_exists($dirPersonal . '/INE_R.png')) {
                    $msg1 = "Ya existe ";
                    $tp2 = "1";
                } else {

                    if ($_FILES['ineReverso']['tmp_name'] != "") {
                        $MIME2 = explode("/", $_FILES['ineReverso']['type']);
                        $type2 = $MIME2[1];
                        move_uploaded_file($_FILES['ineReverso']['tmp_name'], $dirPersonal . '/INE_R.' . $type2);
                        $_POST['clts_foto_ineReverso'] = $dirPersonal . '/INE_R' . $type2;
                        $msg2 = "Se subio correctamente";
                        $tp2 = "2";
                    } else {
                        $msg2 = "Aun no se sube";
                        $tp2 = "3";
                    }
                }

                if (file_exists($dirPersonal . '/CDOMICILIO.jpg') || file_exists($dirPersonal . '/CDOMICILIO.jpeg') || file_exists($dirPersonal . '/CDOMICILIO.png')) {
                    $msg3 = "Ya existe ";
                    $tp3 = "1";
                } else {

                    if ($_FILES['cdom']['tmp_name'] != "") {
                        $MIME3 = explode("/", $_FILES['cdom']['type']);
                        $type3 = $MIME3[1];
                        move_uploaded_file($_FILES['cdom']['tmp_name'], $dirPersonal . '/CDOMICILIO.' . $type3);
                        $_POST['clts_foto_cpdomicilio'] = $dirPersonal . '/CDOMICILIO.' . $type3;
                        $msg3 = "Se subio correctamente";
                        $tp3 = "2";
                    } else {
                        $msg3 = "Aun no se sube";
                        $tp3 = "3";
                    }
                }
            }

            echo "xddd";
            die();
            //$editaClientes = ClientesModelo::mdlAgregarClientes($_POST);
            $editaClientes = true;


            if ($editaClientes) {
                return array(
                    'status' => true,
                    'mensaje' => 'Cliente registrado con éxito',
                    'pagina' => HTTP_HOST . 'clientes/new'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => '¡Ups! Ocurrio un error, intenta de nuevo',
                    'pagina' => HTTP_HOST . 'clientes/new'
                );
            }
        }
    }
    public function ctrMostrarClientesByNombre()
    {
        $nombre = $_POST['clts_nombre'];
        $clientes = ClientesModelo::mdlMostrarClientesByNomb($nombre);
        return array(
            'status' => true,
            'clientes' => $clientes,
            'pagina' => HTTP_HOST
        );
    }
    public function ctrEliminarClientes()
    {
    }
    public static function ctrImportarcLIEExcel()
    {
        try {



            //$nombreArchivo = $_SERVER['DOCUMENT_ROOT'] . '/dupont/exportxlsx/tbl_productos_dupont.xls';

            $nombreArchivo = $_FILES['archivoExcel']['tmp_name'];




            //var_dump($nombreArchivo);

            // Cargar hoja de calculo
            $leerExcel = PHPExcel_IOFactory::createReaderForFile($nombreArchivo);

            $objPHPExcel = $leerExcel->load($nombreArchivo);

            //var_dump($objPHPExcel);

            $objPHPExcel->setActiveSheetIndex(13);

            $numRows = $objPHPExcel->setActiveSheetIndex(13)->getHighestRow();
            $countInsert = 0;
            $countUpdate = 0;
            //echo "NumRows => ",$objPHPExcel->getActiveSheet()->getCell('B' . 2)->getCalculatedValue();

            for ($i = 2; $i <= $numRows; $i++) {


                $cts_ruta = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                $cts_nombre = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                $cts_telefono_1 = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                $cts_domicilio = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
                $cts_colonia = $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
                $cts_calles = $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
                $cts_fachada_color = $objPHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
                $cts_puerta_color = $objPHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();
                $cts_trabajo = $objPHPExcel->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();
                $cts_puesto = $objPHPExcel->getActiveSheet()->getCell('O' . $i)->getCalculatedValue();
                $cts_direccion_trabajo = $objPHPExcel->getActiveSheet()->getCell('P' . $i)->getCalculatedValue();
                $cts_colonia_trabajo = $objPHPExcel->getActiveSheet()->getCell('Q' . $i)->getCalculatedValue();
                $cts_telefono_trabajo = $objPHPExcel->getActiveSheet()->getCell('R' . $i)->getCalculatedValue();
                $cts_antiguedad_trabajo = $objPHPExcel->getActiveSheet()->getCell('S' . $i)->getCalculatedValue();
                $cts_ingreso_mensual_trabajo = $objPHPExcel->getActiveSheet()->getCell('T' . $i)->getCalculatedValue();
                $cts_credencial_elector = $objPHPExcel->getActiveSheet()->getCell('U' . $i)->getCalculatedValue();
                $cts_tipo_casa_a = $objPHPExcel->getActiveSheet()->getCell('Y' . $i)->getCalculatedValue();
                $cts_tipo_casa_b = $objPHPExcel->getActiveSheet()->getCell('Z' . $i)->getCalculatedValue();
                $cts_tipo_casa_c = $objPHPExcel->getActiveSheet()->getCell('AA' . $i)->getCalculatedValue();
                $cts_tiempo_casa = $objPHPExcel->getActiveSheet()->getCell('AB' . $i)->getCalculatedValue();
                $cts_nombre_casa = $objPHPExcel->getActiveSheet()->getCell('AC' . $i)->getCalculatedValue();
                $cts_reg_propiedad = $objPHPExcel->getActiveSheet()->getCell('AD' . $i)->getCalculatedValue();

                $cts_fecha_registro = FECHA;
                $cts_usuario_registro = $_SESSION['session_usr']['usr_nombre'];

                $data = array(
                    'cts_ruta' => $cts_ruta,
                    'cts_nombre' => $cts_nombre,
                    'cts_telefono_1' => $cts_telefono_1,
                    'cts_domicilio' => $cts_domicilio,
                    'cts_colonia' => $cts_colonia,
                    'cts_calles' => $cts_calles,
                    'cts_fachada_color' => $cts_fachada_color,
                    'cts_puerta_color' => $cts_puerta_color,
                    'cts_trabajo' => $cts_trabajo,
                    'cts_puesto' => $cts_puesto,
                    'cts_direccion_trabajo' => $cts_direccion_trabajo,
                    'cts_colonia_trabajo' => $cts_colonia_trabajo,
                    'cts_telefono_trabajo' => $cts_telefono_trabajo,
                    'cts_antiguedad_trabajo' => $cts_antiguedad_trabajo,
                    'cts_ingreso_mensual_trabajo' => $cts_ingreso_mensual_trabajo,
                    'cts_credencial_elector' => $cts_credencial_elector,
                    'cts_tipo_casa' => str_replace('-', '', $cts_tipo_casa_a . '' . $cts_tipo_casa_b . '' . $cts_tipo_casa_c),
                    'cts_tiempo_casa' => $cts_tiempo_casa,
                    'cts_nombre_casa' => $cts_nombre_casa,
                    'cts_reg_propiedad' => $cts_reg_propiedad,
                    'cts_fecha_registro' => $cts_fecha_registro,
                    'cts_usuario_registro' => $cts_usuario_registro
                );

                //var_dump($data);

                if (ClientesModelo::mdlAgregarClientes($data)) {
                    $countInsert += 1;
                } else {
                    // if (UsuariosModelo::mdlActualizarUsuarios($data)) {
                    //     $countUpdate += 1;
                    // }
                }
            }

            return array(
                'status' => true,
                'mensaje' => "Carga de clientes con éxito",
                'insert' =>  $countInsert,
                'update' => $countUpdate
            );
        } catch (Exception $th) {
            $th->getMessage();
            return array(
                'status' => false,
                'mensaje' => "No se encuentra el archivo solicitado, por favor carga el archivo correcto",
                'insert' =>  "",
                'update' => ""
            );
        }
    }
}
