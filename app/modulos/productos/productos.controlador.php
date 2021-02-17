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
            $_POST['pds_sku'] = $_POST['pds_sku'] . '/' . $_SESSION['session_suc']['scl_id'].'/'.$_POST['pds_ams_id'];


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

            $agregarProductos = ProductosModelo::mdlAgregarProductos($_POST);

            // preArray($agregarProductos);
            // return;
            if ($agregarProductos) {
                AppControlador::msj('success', 'Muy bien', 'Producto registrado con éxito', HTTP_HOST . 'productos/new');
            } else {
                AppControlador::msj('error', 'Error', 'Ocurrio un error, inetnte de nuevo, es probable que este producto ya exista, verifique e intente de nuevo');
            }
        }
    }
    public function ctrActualizarProductos()
    {
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


                $pds_id_producto = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $pds_nombre = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                $pds_descripcion_corta = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                $pds_precio_publico = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                $pds_precio_compra = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                $pds_stok = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                $pds_categoria = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                $pds_sku = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();

                $pds_sku = str_replace("/", "", $pds_sku);
                $pds_sku = $pds_sku . '/' . $_SESSION['session_suc']['scl_id'].'/'.$_POST['pds_ams_id'];



                $data = array(
                    "pds_id_producto" => $pds_id_producto,
                    "pds_nombre" => $pds_nombre,
                    "pds_descripcion_corta" => $pds_descripcion_corta,
                    "pds_precio_publico" => $pds_precio_publico,
                    "pds_precio_compra" => $pds_precio_compra,
                    "pds_stok" => $pds_stok,
                    "pds_categoria" => $pds_categoria,
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
                    'pds_stok_min' => 0,
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
}
