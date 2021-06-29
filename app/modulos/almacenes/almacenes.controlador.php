
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/02/2021 12:50
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class AlmacenesControlador
{
    public function ctrAgregarAlmacenes()
    {
        if (isset($_POST['btnAgrearAlmacen'])) {
            startLoadButton();
            $_POST['ams_fecha_registro'] = FECHA;
            // $_POST['ams_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['ams_usuario_registro'] = 'Alberto Fabian';
            $crearAlamacen = AlmacenesModelo::mdlAgregarAlmacenes($_POST);
            if ($crearAlamacen) {
                AppControlador::msj('success', '¡Muy bien!', 'Almacén creado con éxito', HTTP_HOST . 'almacenes');
            } else {

                AppControlador::msj('error', '¡Error!', 'Parece que hubo un problema, intenta de nuevo');
            }
        }
    }
    public function ctrActualizarAlmacenes()
    {
    }
    public function ctrMostrarAlmacenes()
    {
    }
    public function ctrEliminarAlmacenes()
    {
    }

    public static function ctrMerncanciaDevuelta($tps_num_traspaso)
    {
        if (isset($_POST['btnSincronizarInventario'])) {


            $tps =  AlmacenesModelo::mdlConsultarMerncanciaDevuelta($tps_num_traspaso);

            $ams_destino = $tps['tps_ams_id_origen'];
            $ams_origen = $tps['tps_ams_id_destino'];
            $scl_id = $_SESSION['session_suc']['scl_id'];

            //    $pds_sku = str_replace("/", "", $pds_sku);
            //    $pds_sku = $pds_sku . '/' . $_SESSION['session_suc']['scl_id'] . '/' . $_POST['pds_ams_id'];

            $pds_json = json_decode($tps['tps_lista_productos_devueltos'], true);
            $productos =  $pds_json[0]['productos'];

            foreach ($productos as $key => $pds) {
                $pds_sku_destino = $pds['id'] . '/' . $_SESSION['session_suc']['scl_id'] . '/' . $ams_destino;
                $pds_sku_origen = $pds['id'] . '/' . $_SESSION['session_suc']['scl_id'] . '/' . $ams_origen;
                $pds_stok = $pds['cantidad'];
                // Actualizar Inventario destino 
                AlmacenesModelo::mdlSumarCantidadesSku($pds_sku_destino, $pds_stok);
                // Actualizar inventario origen 
                AlmacenesModelo::mdlRestarCantidadesSku($pds_sku_origen);
            }

            return array(

                'status' => true,
                'mensaje' => 'Productos sincronizados correctamente'
            );
        }
    }

    public static function ctrConsultarMerncanciaDevuelta()
    {
        if (isset($_POST['btnConsultarNumeroTraspaso'])) {

            return AlmacenesModelo::mdlConsultarMerncanciaDevuelta($_POST['tps_prefijo'] . '' . $_POST['tps_num_traspaso']);
        }
    }
}
