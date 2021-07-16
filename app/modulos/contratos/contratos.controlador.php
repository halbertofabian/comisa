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
            $contadorContratos = 0;
            $contadorProductos = 0;
            $folios = "";


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


                // Ajuste de imagenes
                $img = array(
                    'img_cliente' =>  $_POST['fotoCliente'][$i],
                    'img_cred_fro' =>  $_POST['fotoCredencialFrontal'][$i],
                    'img_cred_tra' =>  $_POST['fotoCredencialTrasera'][$i],
                    'img_pagare' =>  $_POST['fotoPagare'][$i],
                    'img_fachada' =>  $_POST['fotoFachada'][$i],
                    'img_comprobante' =>  $_POST['comprobanteDomicilio'][$i],
                );

                // Ajuste de productos

                $datos = array(
                    'ctr_folio' => $_POST['vts_n_contrato'][$i],
                    'ctr_fecha_contrato' => $_POST['vts_fecha'][$i],
                    'ctr_id_vendedor' => $igs_id_corte['usr_id'],
                    'ctr_cliente' => $_POST['vts_nombre_cliente'][$i],
                    'ctr_productos' => $_POST['vdr_productos'][$i],
                    'ctr_total' => $vts_total_venta,
                    'ctr_enganche' => $vts_enganche,
                    'ctr_pago_adicional' => $vts_se,
                    'ctr_saldo' => $ctr_saldo,
                    'ctr_elaboro' => 'VENDEDOR/' . $igs_id_corte['usr_nombre'],
                    'ctr_nota' => $_POST['ctr_nota'][$i],
                    'ctr_fotos' => json_encode($img, true),

                    // Referencias
                    'ctr_nombre_ref_1' => $_POST['vts_nombre_ref_1'][$i],
                    'ctr_parentesco_ref_1' => $_POST['vts_parentesco_ref_1'][$i],
                    'ctr_direccion_ref_1' => $_POST['vts_direccion_ref_1'][$i],
                    'ctr_colonia_ref_1' => $_POST['vts_colonia_ref_1'][$i],
                    'ctr_telefono_ref_1' => $_POST['vts_telefono_ref_1'][$i],


                );






                $preRegistrarContratos = ContratosModelo::mdlPreregistrarContrato($datos);

                if ($preRegistrarContratos != 0) {

                    $contadorContratos++;
                    $folios .= $datos['ctr_folio'] . '-';

                    $crearIngreso = IngresosModelo::mdlAgregarIngresos($_POST);

                    if ($crearIngreso) {

                        $contadorVentas++;
                    }

                    // REGISTAR PRODUCTOS VENDIDOS
                    $productosVenta = json_decode($_POST['vdr_productos'][$i], true);
                    $productosArray = array();

                    foreach ($productosVenta as $key => $vpds) {


                        $pds_id_producto = ProductosModelo::mdlMostrarProductoBySKUFast($vpds['sku'] . '/' . $_SESSION['session_suc']['scl_id'] . '/1');

                        $auxProductos = array(
                            'vpds_sku' => $pds_id_producto['pds_id_producto'],
                            'vpds_cantidad' => $vpds['cantidad']
                        );


                        array_push($productosArray, $auxProductos);
                    }

                    foreach ($productosArray as $key => $pds_venta) {


                        $datos_productos = array(
                            'vpds_contrato' => $preRegistrarContratos,
                            'vpds_sku' => $pds_venta['vpds_sku'],
                            'vpds_cantidad' => $pds_venta['vpds_cantidad'],
                            'vpds_fecha_venta' => $_POST['vts_fecha'][$i]
                        );

                        $registroProducto = ProductosModelo::ctrRegistrarVentasproductos($datos_productos);

                        if ($registroProducto) {
                            $contadorProductos++;
                        }
                    }
                } else {
                }
            }
            $folios = trim($folios, '-');
            return array(
                'status' => true,
                'mensaje' => 'Se registraron ' . $contadorVentas . ' ventas , ' . $contadorContratos . ' contratos ' . ' ' . $folios . ' y se descontarón ' . $contadorProductos . ' productos del  inventario',
                'pagina' => HTTP_HOST . 'flujo-caja'
            );
        }
    }

    public static function ctrObtenerFolioNuevo()
    {
        $ctr_id = ContratosModelo::mdObtenerFolioNuevo();
        if (!$ctr_id) {
            $ctr_id['ctr_id'] = "000001";
        } else {
            $ctr_id['ctr_id'] = $ctr_id['ctr_id'] + 1;

            $ctr_id['ctr_id'] = strlen($ctr_id['ctr_id']) == 0 ? "000001" : $ctr_id['ctr_id'];
            $ctr_id['ctr_id'] = strlen($ctr_id['ctr_id']) == 1 ? "00000" . $ctr_id['ctr_id'] : $ctr_id['ctr_id'];
            $ctr_id['ctr_id'] = strlen($ctr_id['ctr_id']) == 2 ? "0000" . $ctr_id['ctr_id'] : $ctr_id['ctr_id'];
            $ctr_id['ctr_id'] = strlen($ctr_id['ctr_id']) == 3 ? "000" . $ctr_id['ctr_id'] : $ctr_id['ctr_id'];
            $ctr_id['ctr_id'] = strlen($ctr_id['ctr_id']) == 4 ? "00" . $ctr_id['ctr_id'] : $ctr_id['ctr_id'];
            $ctr_id['ctr_id'] = strlen($ctr_id['ctr_id']) == 5 ? "0" . $ctr_id['ctr_id'] : $ctr_id['ctr_id'];
        }
        return $ctr_id['ctr_id'];
    }

    public static function ctrSetearDatos($data)
    {


        $countArray = sizeof($data);

        $contratos_validos = array();

        $ultimoDato = end($data);

        if (isset($data[0]['vendedor']['caja_abierta'])) {
            $caja_abierta = $data[0]['vendedor']['caja_abierta'];
            $countArray = $countArray;
        } else {
            $caja_abierta = $ultimoDato['caja_abierta'];
            $countArray = $countArray - 1;
        }



        for ($i = 1; $i < $countArray; $i++) {


            $cts = $data[$i]['contrato'][0];


            $contratos_aux = array(

                'ctr_id' => NULL,
                'ctr_folio' =>  $cts["ctr_folio"],
                'ctr_fecha_contrato' =>  $cts["fecha"],
                'ctr_id_vendedor' => $data[0]['vendedor']['id'],
                'ctr_cliente' =>  dstring($cts["clts_nombre"]),
                'ctr_numero_cuenta' => "-",
                'ctr_ruta' => "-",
                'ctr_forma_pago' =>  dstring($cts["ctrs_forma_pago"]),
                'ctr_dia_pago' =>  dstring($cts["ctrs_dia_pago"]),
                'ctr_proximo_pago' =>  $cts["ctrs_fecha_pp"],

                // Número 
                'ctr_plazo_credito' =>  $cts["ctrs_plazo_credito"],

                // No sé de que es esto
                'ctr_tipo_pago' => '',

                'ctr_productos' => json_encode($cts["productos"], 2),
                'ctr_total' =>  dnum($cts["total_venta"]),
                'ctr_enganche' => dnum($cts["enganche"]),
                'ctr_pago_adicional' => dnum($cts["sobre_enganche"]),

                // Pendiente 
                'ctr_saldo' => $cts["ctr_saldo"],


                'ctr_elaboro' => dstring('Vendedor/' . $data[0]['vendedor']['nombre']),
                'ctr_nota' => "",
                'ctr_fotos' => json_encode(array(
                    // Fotos  cliente
                    'img_cliente' =>  $cts["fotoCliente"],
                    'img_cred_fro' =>  $cts["fotoCredencialFrontal"],
                    'img_cred_tra' =>  $cts["fotoCredencialTrasera"],
                    'img_pagare' =>  $cts["fotoPagare"],
                    'img_fachada' =>  $cts["fotoFachada"],
                    'img_comprobante' =>  $cts["comprobanteDomicilio"]
                ), true),

                'ctr_nombre_ref_1' =>  dstring($cts["clts_nom_ref1"]),
                'ctr_parentesco_ref_1' =>  dstring($cts["clts_parentesco_ref1"]),
                'ctr_direccion_ref_1' =>  dstring($cts["clts_dir_ref1"]),
                'ctr_colonia_ref_1' =>  dstring($cts["clts_col_ref1"]),
                'ctr_telefono_ref_1' =>  dstring($cts["clts_tel_ref1"]),

                'clts_curp' =>  dstring($cts["clts_curp"]),
                'clts_telefono' =>  dstring($cts["clts_telefono"]),
                'clts_domicilio' =>  dstring($cts["clts_domicilio"]),
                'clts_col' =>  dstring($cts["clts_col"]),
                'clts_entre_calles' =>  dstring($cts["clts_entre_calles"]),
                'clts_trabajo' =>  dstring($cts["clts_trabajo"]),
                'clts_puesto' =>  dstring($cts["clts_puesto"]),
                'clts_direccion_tbj' =>  dstring($cts["clts_direccion_tbj"]),
                'clts_col_tbj' =>  dstring($cts["clts_col_tbj"]),
                'clts_tel_tbj' =>  dstring($cts["clts_tel_tbj"]),
                'clts_antiguedad_tbj' =>  dstring($cts["clts_antiguedad_tbj"]),
                'clts_igs_mensual_tbj' =>  dnum($cts["clts_igs_mensual_tbj"]),
                'clts_tipo_vivienda' =>  dstring($cts["clts_tipo_vivienda"]),
                'clts_vivienda_anomde' =>  dstring($cts["clts_vivienda_anomde"]),
                'clts_antiguedad_viviendo' =>  dstring($cts["clts_antiguedad_viviendo"]),
                'clts_coordenadas' =>  $cts["clts_coordenadas"],

                'clts_nom_conyuge' =>  dstring($cts["clts_nom_conyuge"]),
                'clts_tbj_conyuge' =>  dstring($cts["clts_tbj_conyuge"]),
                'clts_tbj_puesto_conyuge' =>  dstring($cts["clts_tbj_puesto_conyuge"]),
                'clts_tbj_dir_conyuge' =>  dstring($cts["clts_tbj_dir_conyuge"]),
                'clts_tbj_col_conyuge' =>  dstring($cts["clts_tbj_col_conyuge"]),
                'clts_tbj_tel_conyuge' =>  dstring($cts["clts_tbj_tel_conyuge"]),
                'clts_tbj_ant_conyuge' =>  dstring($cts["clts_tbj_ant_conyuge"]),
                'clts_tbj_ing_conyuge' =>  dnum($cts["clts_tbj_ing_conyuge"]),
                'clts_nom_fiador' =>  dstring($cts["clts_nom_fiador"]),
                'clts_parentesco_fiador' =>  dstring($cts["clts_parentesco_fiador"]),
                'clts_tel_fiador' =>  dstring($cts["clts_tel_fiador"]),
                'clts_dir_fiador' =>  dstring($cts["clts_dir_fiador"]),
                'clts_col_fiador' =>  dstring($cts["clts_col_fiador"]),
                'clts_tbj_fiador' =>  dstring($cts["clts_tbj_fiador"]),
                'clts_tbj_dir_fiador' =>  dstring($cts["clts_tbj_dir_fiador"]),
                'clts_tbj_tel_fiador' =>  dstring($cts["clts_tbj_tel_fiador"]),
                'clts_tbj_col_fiador' =>  dstring($cts["clts_tbj_col_fiador"]),
                'clts_tbj_ant_fiador' =>  dstring($cts["clts_tbj_ant_fiador"]),

                //fotos fiador
                'clts_fotos_fiador' => json_encode(array(
                    'img_cred_fro' =>  dstring($cts["clts_fc_elector_fiador"]),
                    'img_cred_tra' =>  dstring($cts["clts_tc_elector_fiador"]),
                    'img_comprobante' =>  dstring($cts["clts_comprobante_fiador"]),
                    'img_pagare' =>  dstring($cts["clts_pagare_fiador"])
                ), true),

                'clts_nom_ref2' =>  dstring($cts["clts_nom_ref2"]),
                'clts_parentesco_ref2' =>  dstring($cts["clts_parentesco_ref2"]),
                'clts_dir_ref2' =>  dstring($cts["clts_dir_ref2"]),
                'clts_col_ref2' =>  dstring($cts["clts_col_ref2"]),
                'clts_tel_ref2' =>  dstring($cts["clts_tel_ref2"]),
                'clts_nom_ref3' =>  dstring($cts["clts_nom_ref3"]),
                'clts_parentesco_ref3' =>  dstring($cts["clts_parentesco_ref3"]),
                'clts_dir_ref3' =>  dstring($cts["clts_dir_ref3"]),
                'clts_col_ref3' =>  dstring($cts["clts_col_ref3"]),
                'clts_tel_ref3' =>  dstring($cts["clts_tel_ref3"]),
                'sobre_enganche_pendiente' =>  $cts["sobre_enganche_pendiente"],

                //Nuevos atributos 
                'clts_registro_venta' => '0',
                'clts_caja' => $caja_abierta,
                'clts_folio_nuevo' => ContratosControlador::ctrObtenerFolioNuevo(),
                'ctr_pago_credito' => dnum($cts["ctr_pago_credito"]),
                'ctr_aprovado_ventas' => 0

            );


            array_push($contratos_validos, $contratos_aux);
        }

        return $contratos_validos;
    }

    public static function ctrSubirPreContrato($data)
    {
        $contratos = ContratosControlador::ctrSetearDatos($data);
        $contSubir = 0;

        foreach ($contratos as $key => $cts) {

            // Guardar en base de datos contratos

            $subir = ContratosModelo::mdlSubirPreContratos($cts);
            if ($subir) {
                $contSubir++;
            }
        }

        return  array(
            'status' => true,
            'mensaje' => $contSubir . ' contratos se subieron'
        );

        // preArray($contratos);
    }
    public  function ctrActualizarContrato()
    {
        if (isset($_POST['btnGuadarDatosContrato'])) {
            startLoadButton();

            $aprovado_ventas = 0;
            if (isset($_POST['ctr_aprovado_ventas'])) {
                $aprovado_ventas = 1;
            }
            $datos = array(
                'ctr_id' => $_POST['ctr_id'],
                // 'ctr_folio' => $_POST['ctr_folio'],
                'ctr_fecha_contrato' => $_POST['ctr_fecha_contrato'],
                // 'ctr_id_vendedor' => $_POST['ctr_id_vendedor'],
                'ctr_cliente' => dstring($_POST['ctr_cliente']),
                'ctr_numero_cuenta' => $_POST['ctr_numero_cuenta'],
                'ctr_ruta' => $_POST['ctr_ruta'],
                'ctr_forma_pago' => $_POST['ctr_forma_pago'],
                'ctr_dia_pago' => dstring($_POST['ctr_dia_pago']),
                'ctr_proximo_pago' => $_POST['ctr_proximo_pago'],

                'ctr_plazo_credito' => $_POST['ctr_plazo_credito'],
                //  'ctr_tipo_pago' => $_POST['ctr_tipo_pago'],
                //  'ctr_productos' => $_POST['ctr_productos'],
                'ctr_total' => dnum($_POST['ctr_total']),
                'ctr_enganche' => dnum($_POST['ctr_enganche']),
                'ctr_pago_adicional' => dnum($_POST['ctr_pago_adicional']),
                'ctr_saldo' => dnum($_POST['ctr_saldo']),
                //  'ctr_elaboro' => $_POST['ctr_elaboro'],
                'ctr_nota' => dstring($_POST['ctr_nota']),
                //  'ctr_fotos' => $_POST['ctr_fotos'],

                'ctr_nombre_ref_1' => dstring($_POST['ctr_nombre_ref_1']),
                'ctr_parentesco_ref_1' => dstring($_POST['ctr_parentesco_ref_1']),
                'ctr_direccion_ref_1' => dstring($_POST['ctr_direccion_ref_1']),
                'ctr_colonia_ref_1' => dstring($_POST['ctr_colonia_ref_1']),
                'ctr_telefono_ref_1' => $_POST['ctr_telefono_ref_1'],
                'clts_curp' => dstring($_POST['clts_curp']),
                'clts_telefono' => $_POST['clts_telefono'],
                'clts_domicilio' => dstring($_POST['clts_domicilio']),
                'clts_col' => dstring($_POST['clts_col']),
                'clts_entre_calles' => dstring($_POST['clts_entre_calles']),

                'clts_trabajo' => dstring($_POST['clts_trabajo']),
                'clts_puesto' => dstring($_POST['clts_puesto']),
                'clts_direccion_tbj' => dstring($_POST['clts_direccion_tbj']),
                'clts_col_tbj' => dstring($_POST['clts_col_tbj']),
                'clts_tel_tbj' => $_POST['clts_tel_tbj'],
                'clts_antiguedad_tbj' => dstring($_POST['clts_antiguedad_tbj']),
                'clts_igs_mensual_tbj' => dnum($_POST['clts_igs_mensual_tbj']),
                'clts_tipo_vivienda' => dstring($_POST['clts_tipo_vivienda']),
                'clts_vivienda_anomde' => dstring($_POST['clts_vivienda_anomde']),
                'clts_antiguedad_viviendo' => dstring($_POST['clts_antiguedad_viviendo']),

                'clts_coordenadas' => $_POST['clts_coordenadas'],
                'clts_nom_conyuge' => dstring($_POST['clts_nom_conyuge']),
                'clts_tbj_conyuge' => dstring($_POST['clts_tbj_conyuge']),
                'clts_tbj_puesto_conyuge' => dstring($_POST['clts_tbj_puesto_conyuge']),
                'clts_tbj_dir_conyuge' => dstring($_POST['clts_tbj_dir_conyuge']),
                'clts_tbj_col_conyuge' => dstring($_POST['clts_tbj_col_conyuge']),
                'clts_tbj_tel_conyuge' => $_POST['clts_tbj_tel_conyuge'],
                'clts_tbj_ant_conyuge' => dstring($_POST['clts_tbj_ant_conyuge']),
                'clts_tbj_ing_conyuge' => dnum($_POST['clts_tbj_ing_conyuge']),
                'clts_nom_fiador' => dstring($_POST['clts_nom_fiador']),

                'clts_parentesco_fiador' => dstring($_POST['clts_parentesco_fiador']),
                'clts_tel_fiador' => $_POST['clts_tel_fiador'],
                'clts_dir_fiador' => dstring($_POST['clts_dir_fiador']),
                'clts_col_fiador' => dstring($_POST['clts_col_fiador']),
                'clts_tbj_fiador' => dstring($_POST['clts_tbj_fiador']),
                'clts_tbj_dir_fiador' => dstring($_POST['clts_tbj_dir_fiador']),
                'clts_tbj_tel_fiador' => $_POST['clts_tbj_tel_fiador'],
                'clts_tbj_col_fiador' => dstring($_POST['clts_tbj_col_fiador']),
                'clts_tbj_ant_fiador' => dstring($_POST['clts_tbj_ant_fiador']),
                //  'clts_fotos_fiador' => $_POST['clts_fotos_fiador'],

                'clts_nom_ref2' => dstring($_POST['clts_nom_ref2']),
                'clts_parentesco_ref2' => dstring($_POST['clts_parentesco_ref2']),
                'clts_dir_ref2' => dstring($_POST['clts_dir_ref2']),
                'clts_col_ref2' => dstring($_POST['clts_col_ref2']),
                'clts_tel_ref2' => $_POST['clts_tel_ref2'],
                'clts_nom_ref3' => dstring($_POST['clts_nom_ref3']),
                'clts_parentesco_ref3' => dstring($_POST['clts_parentesco_ref3']),
                'clts_dir_ref3' => dstring($_POST['clts_dir_ref3']),
                'clts_col_ref3' => dstring($_POST['clts_col_ref3']),
                'clts_tel_ref3' => dstring($_POST['clts_tel_ref3']),

                'sobre_enganche_pendiente' => dnum($_POST['sobre_enganche_pendiente']),
                // 'clts_registro_venta' => $_POST['clts_registro_venta'],
                // 'clts_caja' => $_POST['clts_caja'],
                'clts_folio_nuevo' => $_POST['clts_folio_nuevo'],
                'ctr_pago_credito' => dnum($_POST['ctr_pago_credito']),
                'ctr_aprovado_ventas' =>  $aprovado_ventas
            );
            $actualizarContrato = ContratosModelo::mdlActualizarPreContratos($datos);
            if ($actualizarContrato) {
                AppControlador::msj('success', 'Muy bien', 'Contrato guardado', HTTP_HOST . 'contratos/buscar/' . $_POST['ctr_id']);
            }
        }
    }

    public static function ctrListarContrato()
    {


        $year_actual = getdate();

        if ($_POST['ctr_folio'] != "") {
            // Buscar contratos por numero de folio o numero de contrato
            return ContratosModelo::mdlMostrarContratosFolio($_POST['ctr_folio']);
        } elseif ($_POST['ctr_fecha_inicio'] != "" or $_POST['ctr_fecha_fin'] != "" or $_POST['ctr_vendedor'] != "") {
            // Buscar contratos por vendedor
            $_POST['ctr_fecha_inicio'] = $_POST['ctr_fecha_inicio'] == "" ? $year_actual['year'] . '-01-01' . 'T00:00'  : $_POST['ctr_fecha_inicio'] . 'T00:00';
            $_POST['ctr_fecha_fin'] = $_POST['ctr_fecha_fin'] == "" ? substr(FECHA, 0, 10) . 'T23:59'  : $_POST['ctr_fecha_fin'] . 'T23:59';

            return ContratosModelo::mdlMostrarContratosFecha(
                $_POST['ctr_vendedor'],
                $_POST['ctr_fecha_inicio'],
                $_POST['ctr_fecha_fin']
            );
        } else {
            // Listar los ultimos 10 contratos
            return ContratosModelo::mdlMostrarContratosLimit();
        }
    }
}
