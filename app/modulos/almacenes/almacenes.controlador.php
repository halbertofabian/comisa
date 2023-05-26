
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
            $_POST['ams_nombre'] = trim(strtoupper($_POST['ams_nombre']));
            $almacen = AlmacenesModelo::mdlMostrarAlmacenesByNombre($_POST['ams_nombre']);
            if ($almacen) {
                return AppControlador::msj('error', '¡Error!', 'El nombre ' . $_POST['ams_nombre'] . ' ya existe, intenta de nuevo');
            }
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
    public static function ctrEliminarAlmacenes()
    {
        $res = AlmacenesModelo::mdlEliminarAlmacenes($_POST['ams_id']);
        if ($res) {
            return array(
                'status' => true,
                'mensaje' => 'El almacen se elimino correctamente.'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'hubo un error al eliminar el almacen.'
            );
        }
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

    public static function ctrGuardarPreRegistro()
    {
        $prm_folio = $_POST['prm_folio'];
        $prm_id_proveedor = $_POST['prm_id_proveedor'];
        $prm_fecha_registro = $_POST['prm_fecha_registro'];
        $prm_codigo = rand(10000, 99999);
        $prm_usuario_registro = $_SESSION['session_usr']['usr_nombre'];
        $prm_id_detalle = $_POST['dprm_id_prm'];

        $datos = array(
            'prm_folio' => $prm_folio,
            'prm_id_proveedor' => $prm_id_proveedor,
            'prm_fecha_registro' => $prm_fecha_registro,
            'prm_codigo' => $prm_codigo,
            'prm_usuario_registro' => $prm_usuario_registro,
            'prm_id_detalle' => $prm_id_detalle,
        );

        $res = AlmacenesModelo::mdlGuardarPreRegistro($datos);
        if ($res) {
            return array(
                'status' => true,
                'mensaje' => 'El pre-registro se guardo correctamente.'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Hubo un error al guardar el pre-registro.'
            );
        }
    }
    public static function ctrAprobarPreRegistro()
    {
        $prm_codigo = $_POST['prm_codigo'];
        $prm_id = $_POST['prm_id'];
        $prm = AlmacenesModelo::mdlMostrarPreRegistrosByID($prm_id);
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        if ($prm_codigo == $prm['prm_codigo']) {
            $dprm = AlmacenesModelo::mdlMostrarDetallePreRegistro($prm['prm_id_detalle']);

            $res = AlmacenesModelo::mdlActualizarStatusPreRegistro($prm_id);
            if ($res) {
                AlmacenesModelo::mdlActualizarCodigoPreRegistro($prm_id);
                foreach ($dprm as $key => $value) {
                    $pvs = ProductosModelo::mdlMostrarModelosById($value['dprm_mpds_id']);
                    $datos_itr = array(
                        'itr_id_modelo' => $pvs['mpds_id'],
                        'pvs_clave' => $pvs['pvs_clave'],
                        'cantidad' => $value['dprm_cantidad'],
                    );
                    $itr = AlmacenesModelo::mdlActualizarInventarioProveedor($datos_itr);
                    for ($i = 1; $i <= $value['dprm_cantidad']; $i++) {
                        $mpds = ProductosModelo::mdlMostrarModelosById($value['dprm_mpds_id']);

                        $spds = AlmacenesModelo::mdlMostrarSerieByModelo($mpds['mpds_id']);


                        if ($spds) {
                            $spds_serie_completa = $mpds["mpds_suc"] . $mpds['mpds_modelo'] . (intval($spds['spds_serie']) + 1);
                            $datos = array(
                                'spds_modelo' => $mpds['mpds_id'],
                                'spds_serie' => intval($spds['spds_serie']) + 1,
                                'spds_almacen' => $ams['ams_id'],
                                'spds_situacion' => "-",
                                'spds_ultima_mod' => FECHA,
                                'spds_prm_id' => $prm_id,
                                'spds_serie_completa' => $spds_serie_completa,
                            );
                        } else {
                            $spds_serie_completa = $mpds["mpds_suc"]  . $mpds['mpds_modelo']  . "1";
                            $datos = array(
                                'spds_modelo' => $mpds['mpds_id'],
                                'spds_serie' => 1,
                                'spds_almacen' => $ams['ams_id'],
                                'spds_situacion' => "-",
                                'spds_ultima_mod' => FECHA,
                                'spds_prm_id' => $prm_id,
                                'spds_serie_completa' => $spds_serie_completa,
                            );
                        }
                        $res = AlmacenesModelo::mdlAgregarSeries($datos);
                        $array_bcra = array(
                            'bcra_movimiento' => 'Entrada',
                            'bcra_fecha' => FECHA,
                            'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                            'bcra_nota' => '',
                            'bcra_spds_id' => $res,
                        );
                        $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
                    }
                }
                return array(
                    'status' => true,
                    'mensaje' => 'El pre-registro se aprobo correctamente.'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Hubo un error al aprobar el pre-registro.'
                );
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'El codigo no es correcto.'
            );
        }
    }

    public static function ctrAsignarAlmacenes($pds)
    {
        if (isset($pds['spds_almacen'])) {
            $datos = array(
                'spds_almacen' => $pds['spds_almacen'],
                'spds_situacion' => $pds['spds_situacion'],
                'spds_ultima_mod' => FECHA,
                'spds_id' => $pds['spds_id'],
            );

            $res = AlmacenesModelo::mdlAsignarAlmacen($datos);
            if ($res) {
                $array_bcra = array(
                    'bcra_movimiento' => 'Carga',
                    'bcra_fecha' => FECHA,
                    'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                    'bcra_nota' => 'SE REALIZÓ UN CARGAMENTO AL ALMACÉN ' . $pds['ams_nombre'],
                    'bcra_spds_id' => $_POST['spds_id'],
                );
                $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
                return array(
                    'status' => true,
                    'mensaje' => 'Se agrego el producto correctamente a ' . $pds['ams_nombre'],
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se agrego el producto correctamente',
                );
            }
        } else {
            $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
            $datos = array(
                'spds_almacen' => $ams['ams_id'],
                'spds_situacion' => '-',
                'spds_ultima_mod' => FECHA,
                'spds_id' => $pds['spds_id'],
            );

            $res = AlmacenesModelo::mdlAsignarAlmacen($datos);
            if ($res) {
                $array_bcra = array(
                    'bcra_movimiento' => 'Entrada',
                    'bcra_fecha' => FECHA,
                    'bcra_usuario' => isset($pds['usr_nombre']) ? $pds['usr_nombre'] : $_SESSION['session_usr']['usr_nombre'],
                    'bcra_nota' => strtoupper($pds['bcra_nota']),
                    'bcra_spds_id' => $pds['spds_id'],
                );
                $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
                return array(
                    'status' => true,
                    'mensaje' => 'Se quito el producto correctamente para ' . $pds['ams_nombre'],
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo quitar el producto correctamente',
                );
            }
        }
    }
    public static function ctrAsignarAlmacenesTraspaso()
    {
        if (isset($_POST['spds_almacen'])) {
            $datos = array(
                'spds_almacen' => $_POST['spds_almacen'],
                'spds_situacion' => $_POST['spds_situacion'],
                'spds_ultima_mod' => FECHA,
                'spds_id' => $_POST['spds_id'],
            );

            $res = AlmacenesModelo::mdlAsignarAlmacen($datos);
            if ($res) {
                $array_bcra = array(
                    'bcra_movimiento' => 'Traspaso',
                    'bcra_fecha' => FECHA,
                    'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                    'bcra_nota' => 'SE TRASPASÓ A LA SUCURSAL ' . $_POST['ams_nombre'],
                    'bcra_spds_id' => $_POST['spds_id'],
                );
                $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
                $itr = AlmacenesControlador::ctrActualizarInventario("itr_traslado_2", $_POST['spds_id']);
                return array(
                    'status' => true,
                    'mensaje' => 'Se agrego el producto correctamente a ' . $_POST['ams_nombre'],
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se agrego el producto correctamente',
                );
            }
        } else {
            $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
            $datos = array(
                'spds_almacen' => $ams['ams_id'],
                'spds_situacion' => '-',
                'spds_ultima_mod' => FECHA,
                'spds_id' => $_POST['spds_id'],
            );

            $res = AlmacenesModelo::mdlAsignarAlmacen($datos);
            if ($res) {
                $array_bcra = array(
                    'bcra_movimiento' => 'Entrada',
                    'bcra_fecha' => FECHA,
                    'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                    'bcra_nota' => strtoupper($_POST['bcra_nota']),
                    'bcra_spds_id' => $_POST['spds_id'],
                );
                $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
                return array(
                    'status' => true,
                    'mensaje' => 'Se quito el producto correctamente para ' . $_POST['ams_nombre'],
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo quitar el producto correctamente',
                );
            }
        }
    }

    public static function ctrMostrarAlmacenes()
    {
        $almacenes = AlmacenesModelo::mdlMostrarAlmacenes($_SESSION['session_suc']['scl_id']);
        $vendedores = UsuariosModelo::mdlObtenerVendedoresActivos();

        $array_ams = array();
        foreach ($almacenes as $ams) {
            $ams_vendedores = "";

            foreach ($vendedores as $usr) {
                if ($usr['usr_id'] == $ams['ams_vendedor']) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $ams_vendedores .= '<option ' . $selected . ' value="' . $usr['usr_id'] . '">' . $usr['usr_nombre'] . '</option>';
            }
            $data_a = array(
                'ams_nombre' => $ams['ams_nombre'],
                'ams_vendedor' => '<select class="form-control select2 ams_vendedor" name="" id="ams_vendedor" ams_id="' . $ams['ams_id'] . '">
                <option value="">-Seleccionar-</option>
                ' . $ams_vendedores . '
                </select>',
                'ams_fecha_registro' => $ams['ams_fecha_registro'],
                'ams_usuario_registro' => $ams['ams_usuario_registro'],
                'acciones' =>  '<div class="btn-group" role="group" aria-label="">
                    <button type="button" class="btn btn-danger btnEliminarAlmacen" ams_id="' . $ams['ams_id'] . '"><i class="fa fa-trash"></i> Eliminar</button>
                </div>',
            );
            array_push($array_ams, $data_a);
        }
        return $array_ams;
    }
    public static function ctrAsignarAlmacenesContrato()
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipoContrato();
        $datos = array(
            'spds_almacen' => $ams['ams_id'],
            'spds_situacion' => $_POST['ctrs_id'],
            'spds_ultima_mod' => FECHA,
            'spds_id' => $_POST['spds_id'],
        );

        $res = AlmacenesModelo::mdlAsignarAlmacen($datos);
        if ($res) {
            $array_bcra = array(
                'bcra_movimiento' => 'Venta',
                'bcra_fecha' => FECHA,
                'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                'bcra_nota' => 'SE AGREGÓ MANUAL AL NÚMERO DE CONTRATO ' . $_POST['ctrs_id'],
                'bcra_spds_id' => $_POST['spds_id'],
            );
            $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
            $itr = AlmacenesControlador::ctrActualizarInventario("itr_ventas", $_POST['spds_id']);
            return array(
                'status' => true,
                'mensaje' => 'Se agrego el producto correctamente.',
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'No se agrego el producto correctamente',
            );
        }
    }

    public static function ctrQuitarProductosContrato($pds)
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        if (isset($pds['spds_id'])) {
            $datos = array(
                'spds_almacen' => $ams['ams_id'],
                'spds_situacion' => '-',
                'spds_ultima_mod' => FECHA,
                'spds_id' => $pds['spds_id'],
            );

            $res = AlmacenesModelo::mdlAsignarAlmacen($datos);

            if ($res) {
                $array_bcra = array(
                    'bcra_movimiento' => 'Cancelación',
                    'bcra_fecha' => FECHA,
                    'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                    'bcra_nota' => strtoupper($pds['bcra_nota']),
                    'bcra_spds_id' => $pds['spds_id'],
                );
                $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
                $itr = AlmacenesControlador::ctrActualizarInventario("itr_devoluciones", $_POST['spds_id']);
                return array(
                    'status' => true,
                    'mensaje' => 'Se quito el producto correctamente.',
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo quitar el producto correctamente',
                );
            }
        } else {
            return array(
                'status' => true,
                'mensaje' => 'Se quito el producto correctamente.',
            );
        }
    }
    public static function ctrMostrarAlmacenesByTipo()
    {
        if ($_POST['tipo'] == "CV") {
            $almacenes = AlmacenesModelo::mdlMostrarAlmacenesByTipoVendedor();
        } else {
            $almacenes = AppControlador::listarAlmacenesTux();
        }
        return $almacenes;
    }
    public static function ctrTraspasoDeMercanciaSucursal($data)
    {
        $spds = json_decode($data[0]['producto'], true);
        $ams_nombre = $data[0]['ams_nombre'];

        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        $serie = AlmacenesModelo::mdlMostrarSerieByModelo($spds['spds_modelo']);
        if ($serie) {
            $datos = array(
                'spds_modelo' => $spds['spds_modelo'],
                'spds_serie' => (intval($serie['spds_serie']) + 1),
                'spds_almacen' => $ams['ams_id'],
                'spds_situacion' => "-",
                'spds_ultima_mod' => $spds['spds_ultima_mod'],
                'spds_prm_id' => 0,
                'spds_serie_completa' => $spds['spds_serie_completa'],
            );
        } else {
            $datos = array(
                'spds_modelo' => $spds['spds_modelo'],
                'spds_serie' => 1,
                'spds_almacen' => $ams['ams_id'],
                'spds_situacion' => "-",
                'spds_ultima_mod' => $spds['spds_ultima_mod'],
                'spds_prm_id' => 0,
                'spds_serie_completa' => $spds['spds_serie_completa'],
            );
        }
        $res = AlmacenesModelo::mdlAgregarSeries($datos);
        if ($res) {
            $array_bcra = array(
                'bcra_movimiento' => 'Traspaso',
                'bcra_fecha' => FECHA,
                'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                'bcra_nota' => 'SE TRASPASÓ DE LA SUCURSAL ' . $ams_nombre,
                'bcra_spds_id' => $res,
            );
            $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
            $itr = AlmacenesControlador::ctrActualizarInventario("itr_traslado_1", $res);
            return array(
                'status' => true,
                'mensaje' => 'El traspaso se hizo correctamente.',
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Hubo un error al hacer el traspaso.',
            );
        }
    }
    public static function ctrAsignarAlmacenesContratoApiApp($ctr)
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipoContrato();
        $datos = array(
            'spds_almacen' => $ams['ams_id'],
            'spds_situacion' => $ctr['ctr_id'],
            'spds_ultima_mod' => FECHA,
            'spds_id' => $ctr['spds_id'],
        );

        $res = AlmacenesModelo::mdlAsignarAlmacen($datos);
        if ($res) {
            $array_bcra = array(
                'bcra_movimiento' => 'Venta',
                'bcra_fecha' => FECHA,
                'bcra_usuario' => $ctr['nombre_vendedor'],
                'bcra_nota' => 'EL NÚMERO DE CONTRATO ES ' . $ctr['ctr_id'],
                'bcra_spds_id' => $ctr['spds_id'],
            );
            $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
            return array(
                'status' => true,
                'mensaje' => 'Se agrego el producto correctamente.',
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'No se agrego el producto correctamente',
            );
        }
    }

    public static function ctrActualizarInventario($campo, $spds_id)
    {
        $spds = AlmacenesModelo::mdlMostrarSeriesById($spds_id);
        $itr_id = AlmacenesModelo::mdlActualizarInventario($campo, $spds['spds_modelo']);
    }

    public static function ctrCerrarInventario()
    {
        $fcbz = CobranzaModelo::mdlFichaActual();
        $itr = AlmacenesModelo::mdlFichaActualInventario();
        if ($itr['itr_ficha'] == $fcbz['fcbz_numero']) {
            return array(
                'status' => false,
                'mensaje' => 'No se puede cerrar el invetario hasta terminar la ficha #' . $fcbz['fcbz_numero'],
            );
        } else {
            $inventario = AlmacenesModelo::mdlMostrarInventario();
            foreach ($inventario as $key => $itr) {
                # code...
                $datos_itr = array(
                    'itr_ii' => $itr['itr_if'],
                    'itr_id_modelo' => $itr['itr_id_modelo'],
                    'itr_if' => 0,
                    'itr_ficha' => $fcbz['fcbz_numero'],
                );
                $itr_res = AlmacenesModelo::mdlRegistrarInventario($datos_itr);
                $itr_estado = AlmacenesModelo::mdlActualizarEstadoInventario($itr['itr_id']);
            }

            return array(
                'status' => true,
                'mensaje' => 'El inventario se cerro correctamente.'
            );
        }
    }
    public static function ctrEmpezarInventario()
    {
        $inventario = AlmacenesModelo::mdlMostrarInventario();
        foreach ($inventario as $key => $itr) {
            $pvs = ProductosModelo::mdlMostrarModelosById($itr['itr_id_modelo']);
            $campo = AlmacenesModelo::mdlMostrarInventarioByProveedor($pvs['pvs_clave'], $itr['itr_id_modelo']);
            $itr_if = $itr['itr_ii'] + $campo['clave'] + $itr['itr_devoluciones'] + $itr['itr_traslado_1'] - $itr['itr_ventas'] - $itr['itr_traslado_2'];
            $res = AlmacenesModelo::mdlActualizarInventarioFinal($itr_if, $itr['itr_id']);
        }
        return array(
            'status' => true,
            'mensaje' => 'El inventario finalizo correctamente.'
        );
    }
}
