<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 20/10/2020 21:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class ProductosControlador
{
    public function ctrAgregarProductos()
    {
        if (isset($_POST['btnAgregarProductos'])) {

            $_POST['pds_etiquetas'] = "SOFTMOR";
            $_POST['pds_precio_especial'] = 0.00;
            $_POST['pds_fecha_creacion'] = FECHA;
            $_POST['pds_fecha_modificacion'] = "0000-00-00 00:00:00";
            $_POST['pds_usaurio_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['pds_usuario_modifico'] = "";
            $_POST['pds_imagenes'] = "";
            $_POST['pds_estado'] = 'Activo';
            $_POST['pds_stok_max'] = 0;
            $_POST['pds_sucursal_id'] = $_SESSION['session_suc']['scl_id'];
            $_POST['pds_suscriptor_id'] = $_SESSION['session_sus']['sus_id'];


            $_POST['pds_sku'] = str_replace("/", "", $_POST['pds_sku']);
            $_POST['pds_sku'] = $_POST['pds_sku'] . '/' . $_SESSION['session_suc']['scl_id'] . '/' . $_POST['pds_ams_id'];


            // Validaciones 

            $ctg_text = "";
            if (isset($_POST['pds_categoria'])) {
                for ($i = 0; $i < sizeof($_POST['pds_categoria']); $i++) {
                    $ctg_text .=  $_POST['pds_categoria'][$i] . ',';
                }
                $ctg_text = substr($ctg_text, 0, -1);
            }
            $_POST['pds_categoria'] = $ctg_text;

            if (empty($_POST['pds_stok_min'])) {
                $_POST['pds_stok_min'] = 0.00;
            }
            if (empty($_POST['pds_precio_mayoreo'])) {
                $_POST['pds_precio_mayoreo'] = 0.00;
            }
            if (empty($_POST['pds_precio_mayoreo'])) {
                $_POST['pds_precio_mayoreo'] = 0.00;
            }
            if (empty($_POST['pds_precio_promocion'])) {
                $_POST['pds_precio_promocion'] = 0.00;
            }

            if (empty($_POST['pds_fecha_inicio_promocion'])) {
                $_POST['pds_fecha_inicio_promocion'] = "0000-00-00 00:00:00";
            }
            if (empty($_POST['pds_fecha_fin_promocion'])) {
                $_POST['pds_fecha_fin_promocion'] = "0000-00-00 00:00:00";
            }

            $_POST['pds_precio_credito'] = str_replace(",", "", $_POST['pds_precio_credito']);
            $_POST['pds_enganche'] = str_replace(",", "", $_POST['pds_enganche']);
            $_POST['pds_pago_semanal'] = str_replace(",", "", $_POST['pds_pago_semanal']);
            $_POST['pds_precio_contado'] = str_replace(",", "", $_POST['pds_precio_contado']);
            $_POST['pds_precio_compra_mes_1'] = str_replace(",", "", $_POST['pds_precio_compra_mes_1']);
            $_POST['pds_precio_compra_mes_2'] = str_replace(",", "", $_POST['pds_precio_compra_mes_2']);


            $agregarProductos = ProductosModelo::mdlAgregarProductos($_POST);

            if (!empty($_POST['pds_series_array'])) {
                $pds_series = $_POST['pds_series_array'];
                $series = json_decode($pds_series, true);
                foreach ($series as $serie) {
                    $res = ProductosModelo::mdlAgregarSeries($agregarProductos, $serie['pds_serie']);
                }
            }

            // preArray($agregarProductos);
            // return;
            if ($agregarProductos) {
                AppControlador::msj('success', 'Muy bien', 'Producto registrado con éxito', HTTP_HOST . 'productos/listar-productos');
            } else {
                AppControlador::msj('error', 'Error', 'Ocurrio un error, inetnte de nuevo, es probable que este producto ya exista, verifique e intente de nuevo');
            }
        }
    }
    public static function ctrActualizarProductos()
    {

        if (isset($_POST['btnEditarProductos'])) {
            $_POST['pds_etiquetas'] = "SOFTMOR";
            $_POST['pds_fecha_modificacion'] = FECHA;
            $_POST['pds_usuario_modifico'] = $_SESSION['session_usr']['usr_nombre'];

            // Validaciones 

            $ctg_text = "";
            if (isset($_POST['pds_categoria'])) {
                for ($i = 0; $i < sizeof($_POST['pds_categoria']); $i++) {
                    $ctg_text .=  $_POST['pds_categoria'][$i] . ',';
                }
                $ctg_text = substr($ctg_text, 0, -1);
            }
            $_POST['pds_categoria'] = $ctg_text;

            if (empty($_POST['pds_stok_min'])) {
                $_POST['pds_stok_min'] = 0.00;
            }
            if (empty($_POST['pds_precio_mayoreo'])) {
                $_POST['pds_precio_mayoreo'] = 0.00;
            }
            if (empty($_POST['pds_precio_mayoreo'])) {
                $_POST['pds_precio_mayoreo'] = 0.00;
            }
            if (empty($_POST['pds_precio_promocion'])) {
                $_POST['pds_precio_promocion'] = 0.00;
            }

            if (empty($_POST['pds_fecha_inicio_promocion'])) {
                $_POST['pds_fecha_inicio_promocion'] = "0000-00-00 00:00:00";
            }
            if (empty($_POST['pds_fecha_fin_promocion'])) {
                $_POST['pds_fecha_fin_promocion'] = "0000-00-00 00:00:00";
            }

            $_POST['pds_precio_credito'] = str_replace(",", "", $_POST['pds_precio_credito']);
            $_POST['pds_enganche'] = str_replace(",", "", $_POST['pds_enganche']);
            $_POST['pds_pago_semanal'] = str_replace(",", "", $_POST['pds_pago_semanal']);
            $_POST['pds_precio_contado'] = str_replace(",", "", $_POST['pds_precio_contado']);
            $_POST['pds_precio_compra_mes_1'] = str_replace(",", "", $_POST['pds_precio_compra_mes_1']);
            $_POST['pds_precio_compra_mes_2'] = str_replace(",", "", $_POST['pds_precio_compra_mes_2']);


            $editarProductos = ProductosModelo::mdlEditarProductos($_POST);

            // preArray($editarProductos);
            // return;
            if ($editarProductos) {
                AppControlador::msj('success', 'Muy bien', 'El producto se a actualizado con éxito', HTTP_HOST . 'productos/listar-productos');
            } else {
                AppControlador::msj('error', 'Error', 'Ocurrio un error, inetnte de nuevo, es probable que este producto ya exista, verifique e intente de nuevo');
            }
        }
    }
    public function ctrMostrarProductos()
    {
    }
    public function ctrEliminarProductos()
    {
    }

    public static function ctrImportarProductosExcel()
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


                //$pds_id_producto = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $pds_sku = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $pds_nombre = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                $pds_categoria = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                $pds_stok = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                $pds_stok_min = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();

                $pds_precio_credito = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                $pds_enganche = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                $pds_pago_semanal = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                $pds_precio_contado = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
                $pds_precio_compra_mes_1 = $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
                $pds_precio_compra_mes_2 = $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();


                $pds_precio_credito = str_replace(",", "", $pds_precio_credito);
                $pds_enganche = str_replace(",", "", $pds_enganche);
                $pds_pago_semanal = str_replace(",", "", $pds_pago_semanal);
                $pds_precio_contado = str_replace(",", "", $pds_precio_contado);
                $pds_precio_compra_mes_1 = str_replace(",", "", $pds_precio_compra_mes_1);
                $pds_precio_compra_mes_2 = str_replace(",", "", $pds_precio_compra_mes_2);

                if ($pds_stok < 0 || $pds_stok == "" || $pds_stok == NULL) {
                    $pds_stok = 0;
                }
                if ($pds_stok_min < 0 || $pds_stok_min == "" || $pds_stok_min == NULL) {
                    $pds_stok_min = 0;
                }

                $pds_sku = str_replace("/", "", $pds_sku);
                $pds_sku = $pds_sku . '/' . $_SESSION['session_suc']['scl_id'] . '/' . $_POST['pds_ams_id'];



                $data = array(
                    'pds_sku' => $pds_sku,
                    'pds_nombre' => $pds_nombre,
                    'pds_categoria' => $pds_categoria,
                    'pds_stok' => $pds_stok,
                    'pds_stok_min' => $pds_stok_min,
                    'pds_precio_credito' => $pds_precio_credito,
                    'pds_enganche' => $pds_enganche,
                    'pds_pago_semanal' => $pds_pago_semanal,
                    'pds_precio_contado' => $pds_precio_contado,
                    'pds_precio_compra_mes_1' => $pds_precio_compra_mes_1,
                    'pds_precio_compra_mes_2' => $pds_precio_compra_mes_2,
                    'pds_imagen_portada' =>  HTTP_HOST . 'app/assets/images/sistema/logo-productos-sm.jpeg',
                    'pds_fecha_creacion' => FECHA,
                    'pds_fecha_modificacion' => "",
                    'pds_usaurio_registro' => $_SESSION['session_usr']['usr_nombre'],
                    'pds_usuario_modifico' => "",
                    'pds_estado' => "Activo",
                    "pds_sucursal_id" => $_SESSION['session_suc']['scl_id'],
                    "pds_suscriptor_id" => $_SESSION['session_sus']['sus_id'],
                    'pds_ams_id' => $_POST['pds_ams_id']
                );


                if (ProductosModelo::mdlAgregarProductos($data)) {
                    $countInsert += 1;
                } else {
                    if (
                        ProductosModelo::mdlActualizarProductosExcelInventario(array(
                            'pds_stok' => $pds_stok,
                            'pds_sku' => $pds_sku

                        ))
                    ) {
                        $countUpdate += 1;
                    }
                }
            }

            return array(
                'status' => true,
                'mensaje' => "Carga de productos con éxito x",
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


    public static function ctrImportarProductosExcelZ()
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


                //$pds_id_producto = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $pds_sku = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $pds_nombre = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                $pds_stok = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();

                if ($pds_stok < 0 || $pds_stok == "" || $pds_stok == NULL) {
                    $pds_stok = 0;
                }

                $pds_sku = str_replace("/", "", $pds_sku);
                $pds_sku = $pds_sku . '/' . $_SESSION['session_suc']['scl_id'] . '/' . $_POST['pds_ams_id'];



                $data = array(
                    "pds_id_producto" => "",
                    "pds_nombre" => $pds_nombre,
                    "pds_descripcion_corta" => "",
                    "pds_precio_publico" => "",
                    "pds_precio_compra" => "",
                    "pds_stok" => $pds_stok,
                    "pds_categoria" => "",
                    "pds_sku" => $pds_sku,
                    "pds_etiquetas" => 'SOFTMOR',
                    "pds_imagen_portada" => HTTP_HOST . 'app/assets/images/sistema/logo-productos-sm.jpeg',
                    "pds_fecha_creacion" => FECHA,
                    "pds_usaurio_registro" => $_SESSION['session_usr']['usr_nombre'],
                    "pds_estado" => 'Activo',
                    "pds_sucursal_id" => $_SESSION['session_suc']['scl_id'],
                    "pds_suscriptor_id" => $_SESSION['session_sus']['sus_id'],
                    "usr_rol" => 'Alumno',
                    "usr_usuario_registro" => $_SESSION['session_usr']['usr_nombre'],
                    "usr_fecha_registro" => FECHA,
                    "usr_id_sucursal" => SUCURSAL_ID,
                    'pds_precio_especial' => 0.00,
                    'pds_fecha_modificacion' => "0000-00-00 00:00:00",
                    'pds_usuario_modifico' => "",
                    'pds_imagenes' => "",
                    'pds_stok_max' => 0,
                    'pds_stok_min' => "",
                    'pds_precio_mayoreo' => 0.00,
                    'pds_precio_promocion' => 0.00,
                    'pds_fecha_inicio_promocion' => "0000-00-00 00:00:00",
                    'pds_fecha_fin_promocion' => "0000-00-00 00:00:00",
                    'pds_visivilidad' => 'POS',
                    'pds_descripcion_larga' => '',
                    'pds_marca' => '',
                    'pds_modelo' => '',
                    'pds_caracteristicas' => '',
                    'pds_marca' => '',
                    'pds_marca' => '',
                    'pds_marca' => '',
                    'pds_marca' => '',
                    'pds_ams_id' => $_POST['pds_ams_id']

                );  //var_dump($data);

                if (ProductosModelo::mdlAgregarProductos($data)) {
                    $countInsert += 1;
                } else {
                    if (
                        ProductosModelo::mdlActualizarProductosExcelInventario(array(
                            'pds_stok' => $pds_stok,
                            'pds_sku' => $pds_sku

                        ))
                    ) {
                        $countUpdate += 1;
                    }
                }
            }

            return array(
                'status' => true,
                'mensaje' => "Carga de productos con éxito",
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
    public static function ctrAgregarSeries()
    {
        if (isset($_POST['btnGuardarSeries'])) {
            $spds_producto = $_POST['spds_producto'];

            $productos = json_decode($spds_producto, true);

            foreach ($productos as $producto) {
                $res = ProductosModelo::mdlAgregarSeries($producto['id'], $producto['serie']);
            }

            return array(
                'status' => true,
                'mensaje' => 'Las series se guardarón correctamente!',
            );
        }
    }
    public static function ctrRegistrarModelos()
    {
        $mpds_suc = $_POST['mpds_suc'];
        $mpds_modelo = trim($_POST['mpds_modelo']);
        $mpds_descripcion = mb_strtoupper(trim($_POST['mpds_descripcion']));
        $mpds_proveedor = $_POST['mpds_proveedor'];
        $mpds_credito = dnum($_POST['mpds_credito']);
        $mpds_enganche = dnum($_POST['mpds_enganche']);
        $mpds_pago_semanal = dnum($_POST['mpds_pago_semanal']);
        $mpds_contado = dnum($_POST['mpds_contado']);
        $mpds_un_mes = dnum($_POST['mpds_un_mes']);
        $mpds_dos_meses = dnum($_POST['mpds_dos_meses']);

        $modelo = ProductosModelo::mdlMostrarModelosByModelo($mpds_modelo);
        $descripcion = ProductosModelo::mdlMostrarModelosByDescripcion($mpds_descripcion);
        if ($modelo) {
            return array(
                'status' => false,
                'mensaje' => 'El modelo ' . $mpds_modelo . ' ya existe. Intente con otro.',
            );
        }
        if ($descripcion) {
            return array(
                'status' => false,
                'mensaje' => 'El nombre ' . $mpds_descripcion . ' ya existe. Intente con otro nombre.',
            );
        }


        $datos = array(
            'mpds_suc' => $mpds_suc,
            'mpds_modelo' => $mpds_modelo,
            'mpds_descripcion' => $mpds_descripcion,
            'mpds_proveedor' => $mpds_proveedor,
            'mpds_credito' => $mpds_credito,
            'mpds_enganche' => $mpds_enganche,
            'mpds_pago_semanal' => $mpds_pago_semanal,
            'mpds_contado' => $mpds_contado,
            'mpds_un_mes' => $mpds_un_mes,
            'mpds_dos_meses' => $mpds_dos_meses,
        );

        $res = ProductosModelo::mdlRegistrarModelos($datos);
        // preArray($res);
        // return;
        if ($res) {
            return array(
                'status' => true,
                'mensaje' => 'El modelos se registro correctamente.',
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Hubo un error al registrar el modelo.',
            );
        }
    }
    public static function ctrActualizarModelos()
    {
        $mpds_id = $_POST['mpds_id'];
        $mpds_suc = $_POST['mpds_suc'];
        $mpds_modelo_copy = trim($_POST['mpds_modelo_copy']);
        $mpds_modelo = trim($_POST['mpds_modelo']);
        $mpds_descripcion_copy = mb_strtoupper(trim($_POST['mpds_descripcion_copy']));
        $mpds_descripcion = mb_strtoupper(trim($_POST['mpds_descripcion']));
        $mpds_proveedor = $_POST['mpds_proveedor'];
        $mpds_credito = dnum($_POST['mpds_credito']);
        $mpds_enganche = dnum($_POST['mpds_enganche']);
        $mpds_pago_semanal = dnum($_POST['mpds_pago_semanal']);
        $mpds_contado = dnum($_POST['mpds_contado']);
        $mpds_un_mes = dnum($_POST['mpds_un_mes']);
        $mpds_dos_meses = dnum($_POST['mpds_dos_meses']);

        if ($mpds_modelo_copy != $mpds_modelo) {
            $modelo = ProductosModelo::mdlMostrarModelosByModelo($mpds_modelo);
            if ($modelo) {
                return array(
                    'status' => false,
                    'mensaje' => 'El modelo ' . $mpds_modelo . ' ya existe. Intente con otro.',
                );
            }
        }
        if ($mpds_descripcion_copy != $mpds_descripcion) {
            $descripcion = ProductosModelo::mdlMostrarModelosByDescripcion($mpds_descripcion);
            if ($descripcion) {
                return array(
                    'status' => false,
                    'mensaje' => 'El nombre ' . $mpds_descripcion . ' ya existe. Intente con otro nombre.',
                );
            }
        }



        $datos = array(
            'mpds_id' => $mpds_id,
            'mpds_suc' => $mpds_suc,
            'mpds_modelo' => $mpds_modelo,
            'mpds_descripcion' => $mpds_descripcion,
            'mpds_proveedor' => $mpds_proveedor,
            'mpds_credito' => $mpds_credito,
            'mpds_enganche' => $mpds_enganche,
            'mpds_pago_semanal' => $mpds_pago_semanal,
            'mpds_contado' => $mpds_contado,
            'mpds_un_mes' => $mpds_un_mes,
            'mpds_dos_meses' => $mpds_dos_meses,
        );

        $res = ProductosModelo::mdlActualizarModelos($datos);
        // preArray($res);
        // return;
        if ($res) {
            return array(
                'status' => true,
                'mensaje' => 'El modelo se actualizo correctamente.',
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Hubo un error al actualizar el modelo.',
            );
        }
    }

    public static function ctrEliminarModelos()
    {
        $res = ProductosModelo::mdlEliminarModelos($_POST['mpds_id']);
        if ($res) {
            return array(
                'status' => true,
                'mensaje' => 'El modelo se elimino correctamente.',
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Hubo un error al eliminar el modelo.',
            );
        }
    }

    public static function ctrImportarModelosExcel()
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
            $countRepetidos = 0;

            for ($i = 2; $i <= $numRows; $i++) {
                $mpds_modelo = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $mpds_descripcion = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                $pvs_nombre = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                $mpds_credito = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                $mpds_enganche = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                $mpds_pago_semanal = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                $mpds_contado = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                $mpds_un_mes = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                $mpds_dos_meses = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();

                //Buscar si existe el registro
                $modelo = ProductosModelo::mdlMostrarModelosByModelo($mpds_modelo);
                $descripcion = ProductosModelo::mdlMostrarModelosByDescripcion($mpds_descripcion);
                $proveedor = ProveedoresModelo::mdlMostrarProveedoresByNombre($pvs_nombre);
                //En caso de que producto exista
                if ($modelo || $descripcion) {
                    $countRepetidos += 1;
                    continue;
                }
                if ($proveedor) {
                    $mpds_proveedor = $proveedor['pvs_id'];
                } else {
                    $datos = array(
                        'pvs_nombre' => strtoupper($pvs_nombre),
                        'pvs_telefono' => '',
                    );
                    $pvs_id = ProveedoresModelo::mdlAgregarProveedores($datos);
                    if ($pvs_id) {
                        $pvs = ProveedoresModelo::mdlMostrarProveedoresByID($pvs_id);
                        $mpds_proveedor = $pvs['pvs_id'];
                    }
                }

                $data = array(
                    'mpds_suc' => SUCURSAL,
                    "mpds_modelo" => $mpds_modelo,
                    "mpds_descripcion" => strtoupper($mpds_descripcion),
                    "mpds_proveedor" => $mpds_proveedor,
                    "mpds_credito" => $mpds_credito == "" ? 0 : $mpds_credito,
                    "mpds_enganche" => $mpds_enganche == "" ? 0 : $mpds_enganche,
                    "mpds_pago_semanal" => $mpds_pago_semanal == "" ? 0 : $mpds_pago_semanal,
                    "mpds_contado" => $mpds_contado == "" ? 0 : $mpds_contado,
                    "mpds_un_mes" => $mpds_un_mes == "" ? 0 : $mpds_un_mes,
                    "mpds_dos_meses" => $mpds_dos_meses == "" ? 0 : $mpds_dos_meses,
                );

                //insertar
                $insert = ProductosModelo::mdlRegistrarModelos($data);

                if ($insert) {
                    $countInsert += 1;
                }
            }
            return array(
                'status' => true,
                'mensaje' => "Carga de modelos con éxito",
                'countInsert' =>  $countInsert,
                'countRepetidos' => $countRepetidos,
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
