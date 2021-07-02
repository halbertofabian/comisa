
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

            //$_POST['clts_fecha_registro'] = FECHA;


            $agrgarClientes = ClientesModelo::mdlAgregarClientesByExcel($_POST);


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
            $dirPersonal = DOCUMENT_ROOT . "app/assets/images/imgclientes/" . $_POST['clts_id'] . "/docs";

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
                $msg2 = "Ya existe ";
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



            $editaClientes = ClientesModelo::actualizar2InfIdClient($_POST);

            if ($editaClientes) {
                return array(
                    'status' => true,
                    'mensaje' => 'Cliente actualizado',
                    'pagina' => HTTP_HOST . 'clientes/buscar',
                    'msg1' => $msg1,
                    'msg2' => $msg2,
                    'msg3' => $msg3,

                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se realizo ningun cambio',

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

            $objPHPExcel->setActiveSheetIndex(0);

            $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
            $countInsert = 0;
            $countUpdate = 0;
            //echo "NumRows => ",$objPHPExcel->getActiveSheet()->getCell('B' . 2)->getCalculatedValue();

            for ($i = 2; $i <= $numRows; $i++) {

                $clts_numero = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $clts_ruta = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();

                $dia = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                $mes = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                $ano = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                $fecha_concatenda = $ano . '-' . $mes . '-' . $dia;
                $clts_fecha_registro =  $fecha_concatenda; //date_format($fecha_concatenda,'Y/m/d');

                $clts_nombre = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                $clts_telefono = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                $clts_domicilio = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                $clts_col = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
                $clts_entre_calles = $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
                $clts_fachada_color = $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
                $clts_puerta_color = $objPHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
                $clts_trabajo = $objPHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();
                $clts_puesto = $objPHPExcel->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();
                $clts_direccion_tbj = $objPHPExcel->getActiveSheet()->getCell('O' . $i)->getCalculatedValue();
                $clts_col_tbj = $objPHPExcel->getActiveSheet()->getCell('P' . $i)->getCalculatedValue();
                $clts_tel_tbj = $objPHPExcel->getActiveSheet()->getCell('Q' . $i)->getCalculatedValue();
                $clts_antiguedad_tbj = $objPHPExcel->getActiveSheet()->getCell('R' . $i)->getCalculatedValue();
                $clts_igs_mensual_tbj = $objPHPExcel->getActiveSheet()->getCell('S' . $i)->getCalculatedValue();
                $clts_no_cred = $objPHPExcel->getActiveSheet()->getCell('T' . $i)->getCalculatedValue();


                $clts_tipo_vivienda_propia = $objPHPExcel->getActiveSheet()->getCell('U' . $i)->getCalculatedValue();
                $clts_tipo_vivienda_rentada = $objPHPExcel->getActiveSheet()->getCell('V' . $i)->getCalculatedValue();
                $clts_tipo_vivienda_prestada = $objPHPExcel->getActiveSheet()->getCell('W' . $i)->getCalculatedValue();

                $clts_tipo_vivienda_propia = str_replace("-", "", $clts_tipo_vivienda_propia);
                $clts_tipo_vivienda_rentada = str_replace("-", "", $clts_tipo_vivienda_rentada);
                $clts_tipo_vivienda_prestada = str_replace("-", "", $clts_tipo_vivienda_prestada);


                $clts_tipo_vivienda = $clts_tipo_vivienda_propia . '' . $clts_tipo_vivienda_rentada . '' . $clts_tipo_vivienda_prestada;



                $clts_antiguedad_viviendo = $objPHPExcel->getActiveSheet()->getCell('X' . $i)->getCalculatedValue();
                $clts_vivienda_anomde = $objPHPExcel->getActiveSheet()->getCell('Y' . $i)->getCalculatedValue();
                $clts_nreg_propiedad = $objPHPExcel->getActiveSheet()->getCell('Z' . $i)->getCalculatedValue();

                $clts_nom_conyuge = $objPHPExcel->getActiveSheet()->getCell('AA' . $i)->getCalculatedValue();
                $clts_tbj_conyuge = $objPHPExcel->getActiveSheet()->getCell('AB' . $i)->getCalculatedValue();
                $clts_tbj_puesto_conyuge = $objPHPExcel->getActiveSheet()->getCell('AC' . $i)->getCalculatedValue();
                $clts_tbj_dir_conyuge = $objPHPExcel->getActiveSheet()->getCell('AD' . $i)->getCalculatedValue();
                $clts_tbj_col_conyuge = $objPHPExcel->getActiveSheet()->getCell('AE' . $i)->getCalculatedValue();
                $clts_tbj_tel_conyuge = $objPHPExcel->getActiveSheet()->getCell('AF' . $i)->getCalculatedValue();

                $clts_tbj_ant_conyuge = $objPHPExcel->getActiveSheet()->getCell('AG' . $i)->getCalculatedValue();
                $clts_nom_fiador = $objPHPExcel->getActiveSheet()->getCell('AH' . $i)->getCalculatedValue();
                $clts_parentesco_fiador = $objPHPExcel->getActiveSheet()->getCell('AI' . $i)->getCalculatedValue();
                $clts_tel_fiador = $objPHPExcel->getActiveSheet()->getCell('AJ' . $i)->getCalculatedValue();
                $clts_dir_fiador = $objPHPExcel->getActiveSheet()->getCell('AK' . $i)->getCalculatedValue();
                $clts_col_fiador = $objPHPExcel->getActiveSheet()->getCell('AL' . $i)->getCalculatedValue();
                $clts_tbj_fiador = $objPHPExcel->getActiveSheet()->getCell('AM' . $i)->getCalculatedValue();
                $clts_tbj_dir_fiador = $objPHPExcel->getActiveSheet()->getCell('AN' . $i)->getCalculatedValue();
                $clts_tbj_tel_fiador = $objPHPExcel->getActiveSheet()->getCell('AO' . $i)->getCalculatedValue();
                $clts_tbj_col_fiador = $objPHPExcel->getActiveSheet()->getCell('AP' . $i)->getCalculatedValue();
                $clts_fc_elector_fiador = $objPHPExcel->getActiveSheet()->getCell('AQ' . $i)->getCalculatedValue();
                $clts_tbj_ant_fiador = $objPHPExcel->getActiveSheet()->getCell('AR' . $i)->getCalculatedValue();
                $clts_nom_ref1 = $objPHPExcel->getActiveSheet()->getCell('AS' . $i)->getCalculatedValue();
                $clts_parentesco_ref1 = $objPHPExcel->getActiveSheet()->getCell('AT' . $i)->getCalculatedValue();
                $clts_dir_ref1 = $objPHPExcel->getActiveSheet()->getCell('AU' . $i)->getCalculatedValue();
                $clts_col_ref1 = $objPHPExcel->getActiveSheet()->getCell('AV' . $i)->getCalculatedValue();
                $clts_tel_ref1 = $objPHPExcel->getActiveSheet()->getCell('AW' . $i)->getCalculatedValue();
                $clts_nom_ref2 = $objPHPExcel->getActiveSheet()->getCell('AX' . $i)->getCalculatedValue();
                $clts_parentesco_ref2 = $objPHPExcel->getActiveSheet()->getCell('AY' . $i)->getCalculatedValue();
                $clts_dir_ref2 = $objPHPExcel->getActiveSheet()->getCell('AZ' . $i)->getCalculatedValue();
                $clts_col_ref2 = $objPHPExcel->getActiveSheet()->getCell('BA' . $i)->getCalculatedValue();
                $clts_tel_ref2 = $objPHPExcel->getActiveSheet()->getCell('BB' . $i)->getCalculatedValue();
                $clts_ubicacion = $objPHPExcel->getActiveSheet()->getCell('BC' . $i)->getCalculatedValue();
                $ctls_tipo_cliente = $objPHPExcel->getActiveSheet()->getCell('BD' . $i)->getCalculatedValue();
                $ctls_curp = $objPHPExcel->getActiveSheet()->getCell('BE' . $i)->getCalculatedValue();
                $ctls_observaciones = $objPHPExcel->getActiveSheet()->getCell('BF' . $i)->getCalculatedValue();
                $ctls_cuentas = $objPHPExcel->getActiveSheet()->getCell('BG' . $i)->getCalculatedValue();



                $data = array(

                    'clts_id' => NULL,
                    'clts_numero' => $clts_numero,
                    'clts_ruta' => $clts_ruta,
                    'clts_usuario_registro' => $_SESSION['session_usr']['usr_nombre'],
                    'clts_fecha_registro' => $clts_fecha_registro,
                    'clts_nombre' => $clts_nombre,
                    'clts_telefono' => $clts_telefono,
                    'clts_domicilio' => $clts_domicilio,
                    'clts_col' => $clts_col,
                    'clts_entre_calles' => $clts_entre_calles,
                    'clts_fachada_color' => $clts_fachada_color,
                    'clts_puerta_color' => $clts_puerta_color,
                    'clts_trabajo' => $clts_trabajo,
                    'clts_puesto' => $clts_puesto,
                    'clts_direccion_tbj' => $clts_direccion_tbj,
                    'clts_col_tbj' => $clts_col_tbj,
                    'clts_tel_tbj' => $clts_tel_tbj,
                    'clts_antiguedad_tbj' => $clts_antiguedad_tbj,
                    'clts_igs_mensual_tbj' => $clts_igs_mensual_tbj,
                    'clts_no_cred' => $clts_no_cred,
                    'clts_tipo_vivienda' => $clts_tipo_vivienda,
                    'clts_antiguedad_viviendo' => $clts_antiguedad_viviendo,
                    'clts_vivienda_anomde' => $clts_vivienda_anomde,
                    'clts_nreg_propiedad' => $clts_nreg_propiedad,
                    'clts_nom_conyuge' => $clts_nom_conyuge,
                    'clts_tbj_conyuge' => $clts_tbj_conyuge,
                    'clts_tbj_puesto_conyuge' => $clts_tbj_puesto_conyuge,
                    'clts_tbj_dir_conyuge' => $clts_tbj_dir_conyuge,
                    'clts_tbj_col_conyuge' => $clts_tbj_col_conyuge,
                    'clts_tbj_tel_conyuge' => $clts_tbj_tel_conyuge,
                    'clts_tbj_ant_conyuge' => $clts_tbj_ant_conyuge,
                    'clts_nom_fiador' => $clts_nom_fiador,
                    'clts_parentesco_fiador' => $clts_parentesco_fiador,
                    'clts_tel_fiador' => $clts_tel_fiador,
                    'clts_dir_fiador' => $clts_dir_fiador,
                    'clts_col_fiador' => $clts_col_fiador,
                    'clts_tbj_fiador' => $clts_tbj_fiador,
                    'clts_tbj_dir_fiador' => $clts_tbj_dir_fiador,
                    'clts_tbj_tel_fiador' => $clts_tbj_tel_fiador,
                    'clts_tbj_col_fiador' => $clts_tbj_col_fiador,
                    'clts_fc_elector_fiador' => $clts_fc_elector_fiador,
                    'clts_tbj_ant_fiador' => $clts_tbj_ant_fiador,
                    'clts_nom_ref1' => $clts_nom_ref1,
                    'clts_parentesco_ref1' => $clts_parentesco_ref1,
                    'clts_dir_ref1' => $clts_dir_ref1,
                    'clts_col_ref1' => $clts_col_ref1,
                    'clts_tel_ref1' => $clts_tel_ref1,
                    'clts_nom_ref2' => $clts_nom_ref2,
                    'clts_parentesco_ref2' => $clts_parentesco_ref2,
                    'clts_dir_ref2' => $clts_dir_ref2,
                    'clts_col_ref2' => $clts_col_ref2,
                    'clts_tel_ref2' => $clts_tel_ref2,
                    'clts_ubicacion' => $clts_ubicacion,
                    'clts_foto_ine' => "",
                    'clts_foto_ineReverso' => "",
                    'clts_foto_cpdomicilio' => "",
                    'ctls_tipo_cliente' => $ctls_tipo_cliente,
                    'ctls_curp' => $ctls_curp,
                    'ctls_observaciones' => $ctls_observaciones,
                    'ctls_cuentas' => $ctls_cuentas,

                );





                // $insert = ClientesModelo::mdlAgregarClientesByExcel($data);
                // preArray($insert);
                
                if (ClientesModelo::mdlAgregarClientesByExcel($data)) {
                    $countInsert += 1;
                } else {
                    if (UsuariosModelo::mdlActualizarUsuarios($data)) {
                        $countUpdate += 1;
                    }
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
