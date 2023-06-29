
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
            $_POST['ams_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['ams_vendedor'] = empty($_POST['ams_vendedor']) ? 0 : $_POST['ams_vendedor'];
            if (isset($_POST['ams_id']) && $_POST['ams_id'] != "") {
                $updateAlmacen = AlmacenesModelo::mdlActualizarAlmacenes($_POST);
                if ($updateAlmacen) {
                    AppControlador::msj('success', '¡Muy bien!', 'Almacén se actualizó con éxito', HTTP_HOST . 'almacenes');
                } else {
                    AppControlador::msj('error', '¡Error!', 'Parece que hubo un problema, intenta de nuevo');
                }
            } else {
                $crearAlamacen = AlmacenesModelo::mdlAgregarAlmacenes($_POST);
                if ($crearAlamacen) {
                    AppControlador::msj('success', '¡Muy bien!', 'Almacén creado con éxito', HTTP_HOST . 'almacenes');
                } else {
                    AppControlador::msj('error', '¡Error!', 'Parece que hubo un problema, intenta de nuevo');
                }
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
        $prm_tipo = $_POST['prm_tipo'];

        $datos = array(
            'prm_folio' => $prm_folio,
            'prm_id_proveedor' => $prm_id_proveedor,
            'prm_fecha_registro' => $prm_fecha_registro,
            'prm_codigo' => $prm_codigo,
            'prm_usuario_registro' => $prm_usuario_registro,
            'prm_id_detalle' => $prm_id_detalle,
            'prm_tipo' => $prm_tipo,
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
                    if ($prm['prm_tipo'] == 'COMPRA' || $prm['prm_tipo'] == "") {
                        $itr = AlmacenesModelo::mdlActualizarInventarioProveedor($datos_itr);
                    } else {
                        $itr = AlmacenesModelo::mdlActualizarInventario3('itr_devoluciones', $value['dprm_cantidad'], $pvs['mpds_id']);
                    }
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
        $spds_status = AlmacenesModelo::mdlMostrarSeriesById2($pds['spds_id']);
        if ($spds_status['spds_situacion'] == 'SALIDA' || $spds_status['spds_situacion'] == '-') {
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
                        'bcra_spds_id' => $pds['spds_id'],
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
        } else {
            return array(
                'status' => false,
                'mensaje' => 'El producto que intenta mover se encuentra en otra situación.',
            );
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
                    <button type="button" class="btn btn-warning btnEditarAlmacen" ams_id="' . $ams['ams_id'] . '"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btnEliminarAlmacen" ams_id="' . $ams['ams_id'] . '"><i class="fa fa-trash"></i></button>
                </div>',
            );
            array_push($array_ams, $data_a);
        }
        return $array_ams;
    }
    public static function ctrAsignarAlmacenesContrato()
    {
        $ctr_fecha_contrato = $_POST['ctr_fecha_contrato'];
        $fcbz = CobranzaModelo::mdlFichaActual();
        $validar = AppControlador::validarFechaEnRango($fcbz['fcbz_fecha_inicio'], $fcbz['fcbz_fecha_termino'], $ctr_fecha_contrato);
        if ($validar) {
            $itr = AlmacenesControlador::ctrActualizarInventario("itr_ventas", $_POST['spds_id']);
        } else {
            $itr = AlmacenesControlador::ctrActualizarInventario("itr_traslado_2", $_POST['spds_id']);
        }
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
        $ctr = ContratosModelo::mdlMostrarContratosById($pds['ctr_id']);
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
                $itr = AlmacenesControlador::ctrActualizarInventario("itr_devoluciones", $pds['spds_id']);

                $producto = AlmacenesModelo::mdlMostrarSeriesById($pds['spds_id']);

                $obs_usuario = $_SESSION['session_usr']['usr_nombre'];
                $obs_fecha = FECHA;
                $obs_status = 'COMPLETADA';
                $obs_ctr_id = $ctr['ctr_id'];
                $obs_observaciones = 'SE CANCELO EL PRODUCTO ' . $producto['mpds_descripcion'] . ' CON #SERIE ' . $producto['spds_serie_completa'];

                $datos_obs = array(
                    'obs_usuario' => $obs_usuario,
                    'obs_fecha' => $obs_fecha,
                    'obs_status' => $obs_status,
                    'obs_ctr_id' => $obs_ctr_id,
                    'obs_observaciones' => $obs_observaciones,
                );

                $res_obs = ContratosModelo::mdlAgregarObservaciones($datos_obs);
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
            $nombre_producto = "";
            $productos = json_decode($pds['products'], true);
            for ($i = count($productos) - 1; $i >= 0; $i--) {
                if ($productos[$i]['nombreProducto'] === $pds['nombreProducto']) {
                    $nombre_producto = $productos[$i]['nombreProducto'];
                }
            }

            $obs_usuario = $_SESSION['session_usr']['usr_nombre'];
            $obs_fecha = FECHA;
            $obs_status = 'COMPLETADA';
            $obs_ctr_id = $ctr['ctr_id'];
            $obs_observaciones = 'SE CANCELO EL PRODUCTO ' . $nombre_producto .  ' SIN SERIE';

            $datos_obs = array(
                'obs_usuario' => $obs_usuario,
                'obs_fecha' => $obs_fecha,
                'obs_status' => $obs_status,
                'obs_ctr_id' => $obs_ctr_id,
                'obs_observaciones' => $obs_observaciones,
            );
            $res_obs = ContratosModelo::mdlAgregarObservaciones($datos_obs);
            if ($res_obs) {
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
        $ams_id = $data[0]['ams_id'];

        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        $serie = AlmacenesModelo::mdlMostrarSerieByModelo($spds['spds_modelo']);
        // $mpds = ProductosModelo::mdlMostrarModelosById($spds['spds_modelo']);
        if ($serie) {
            $datos = array(
                'spds_modelo' => $spds['spds_modelo'],
                'spds_serie' => (intval($serie['spds_serie']) + 1),
                'spds_almacen' => $ams_id,
                'spds_situacion' => $ams['ams_id'] == $ams_id ? "-" : 'SALIDA',
                'spds_ultima_mod' => $spds['spds_ultima_mod'],
                'spds_prm_id' => 0,
                'spds_serie_completa' => $spds['spds_serie_completa'],
            );
        } else {
            $datos = array(
                'spds_modelo' => $spds['spds_modelo'],
                'spds_serie' => 1,
                'spds_almacen' => $ams_id,
                'spds_situacion' => $ams['ams_id'] == $ams_id ? "-" : 'SALIDA',
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
    public static function ctrActualizarInventario2($campo, $spds_id)
    {
        $spds = AlmacenesModelo::mdlMostrarSeriesById($spds_id);
        $itr_id = AlmacenesModelo::mdlActualizarInventario2($campo, $spds['spds_modelo']);
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
            $itr_if = $itr['itr_ii'] + $campo['clave'] + $itr['itr_devoluciones'] + $itr['itr_traslado_1'] - $itr['itr_ventas'] - $itr['itr_traslado_2'] - $itr['itr_borrado'];
            $res = AlmacenesModelo::mdlActualizarInventarioFinal($itr_if, $itr['itr_id']);
        }
        return array(
            'status' => true,
            'mensaje' => 'El inventario finalizo correctamente.'
        );
    }

    public static function ctrGenerarCodigoSerie()
    {
        $spds_id = $_POST['spds_id'];
        $spds_modelo = $_POST['spds_modelo'];
        $spds = AlmacenesModelo::mdlObtenerUltimaSerie($spds_modelo);
        if ($spds['spds_id'] != $spds_id) {
            return array(
                'status' => false,
                'mensaje' => 'Asegurate que esta serie que intenta eliminar es la ultima del modelo.'
            );
        } else {
            if ($spds['spds_codigo'] == "" || $spds['spds_codigo'] == NULL) {
                $spds_codigo = rand(10000, 99999);
                $res = AlmacenesModelo::mdlGenerarCodigoSerie($spds_codigo, $spds_id);
                if ($res) {
                    return array(
                        'status' => true,
                        'mensaje' => 'El codigo se genero correctamente.'
                    );
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'Hubo un error al eliminar la serie.'
                    );
                }
            } else {
                return array(
                    'status' => true,
                    'mensaje' => 'El codigo se genero correctamente.'
                );
            }
        }
    }

    public static function ctrEliminarSerie()
    {
        $spds_id = $_POST['spds_id'];
        $spds_modelo = $_POST['spds_modelo'];
        $spds_codigo = $_POST['spds_codigo'];
        $spds = AlmacenesModelo::mdlObtenerUltimaSerie($spds_modelo);
        if ($spds['spds_id'] != $spds_id) {
            return array(
                'status' => false,
                'mensaje' => 'Asegurate que esta serie que intenta eliminar es la ultima del modelo.'
            );
        } else {
            if ($spds_codigo == $spds['spds_codigo']) {
                AlmacenesControlador::ctrActualizarInventario('itr_borrado', $spds_id);
                $res = AlmacenesModelo::mdlEliminarSerie($spds_id);
                if ($res) {
                    return array(
                        'status' => true,
                        'mensaje' => 'La serie se elimino correctamente.'
                    );
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'Hubo un error al eliminar la serie.'
                    );
                }
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'El codigo ingresado es incorrecto.'
                );
            }
        }
    }

    public static function ctrCambiarProductosContrato($pds)
    {
        $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipo();
        if (isset($pds['spds_id'])) {
            $ctr_fecha_contrato = $pds['ctr_fecha_contrato'];
            $fcbz = CobranzaModelo::mdlFichaActual();
            $validar = AppControlador::validarFechaEnRango($fcbz['fcbz_fecha_inicio'], $fcbz['fcbz_fecha_termino'], $ctr_fecha_contrato);
            if ($validar) {
                $itr = AlmacenesControlador::ctrActualizarInventario2("itr_ventas", $pds['spds_id']);
            } else {
                $itr = AlmacenesControlador::ctrActualizarInventario("itr_traslado_1", $pds['spds_id']);
            }
            $datos = array(
                'spds_almacen' => $pds['ams_id'],
                'spds_situacion' => $ams['ams_id'] == $pds['ams_id'] ? '-' : 'SALIDA',
                'spds_ultima_mod' => FECHA,
                'spds_id' => $pds['spds_id'],
            );

            $res = AlmacenesModelo::mdlAsignarAlmacen($datos);

            if ($res) {
                $array_bcra = array(
                    'bcra_movimiento' => 'Cambio de articulo',
                    'bcra_fecha' => FECHA,
                    'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                    'bcra_nota' => 'CAMBIO DE ARTICULO DEL CONTRATO ' . $pds['ctr_id'] . ' POR MOTIVO DE ' . strtoupper($pds['motivo_cambio']),
                    'bcra_spds_id' => $pds['spds_id'],
                );
                $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
                return array(
                    'status' => true,
                    'mensaje' => 'El cambio del producto se hizo correctamente.',
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo cambiar el producto correctamente',
                );
            }
        } else {
            return array(
                'status' => true,
                'mensaje' => 'Se cambio el producto correctamente.',
            );
        }
    }

    public static function ctrGenerarTrasladoExterno()
    {
        $usr = UsuariosModelo::mdlObtenerUsuarioMaster();
        if (!password_verify($_POST['usr_contraseña'], $usr['usr_clave'])) {
            return array(
                'status' => false,
                'mensaje' => 'Contraseña incorrecta, intenta de nuevo.'
            );
        } else {
            $ams_id = $_POST['ams_id'];
            $mercancia = AlmacenesModelo::mdlMostrarProductosByAlmacenID($ams_id);
            $ams = AlmacenesModelo::mdlMostrarAlmacenesByTipoTrasladoExterno();
            foreach ($mercancia as $key => $spds) {
                $datos = array(
                    'spds_almacen' => $ams['ams_id'],
                    'spds_situacion' => 'TRASPASO',
                    'spds_ultima_mod' => FECHA,
                    'spds_id' => $spds['spds_id'],
                );

                $res = AlmacenesModelo::mdlAsignarAlmacen($datos);
                if ($res) {
                    $array_bcra = array(
                        'bcra_movimiento' => 'Traslado externo',
                        'bcra_fecha' => FECHA,
                        'bcra_usuario' => $_SESSION['session_usr']['usr_nombre'],
                        'bcra_nota' => 'SE REALIZO EL TRASLADO EXTERNO',
                        'bcra_spds_id' => $spds['spds_id'],
                    );
                    $bcra = AlmacenesModelo::mdlRegistrarBitacora($array_bcra);
                    $itr = AlmacenesControlador::ctrActualizarInventario("itr_traslado_2", $spds['spds_id']);
                }
            }
            return array(
                'status' => true,
                'mensaje' => 'Se realizo el traslado externo correctamente.',
            );
        }
    }

    public static function ctrMostrarBitacora()
    {
        $bitacoras = AlmacenesModelo::mdlMostrarBitacora($_POST['spds_id']);
        $array_bcra = array();
        foreach ($bitacoras as $bcra) {
            $data_a = array(
                'mpds_descripcion' => $bcra['mpds_descripcion'] . "-" . $bcra['mpds_modelo'],
                'spds_serie_completa' => $bcra['spds_serie_completa'],
                'bcra_movimiento' => $bcra['bcra_movimiento'],
                'bcra_fecha' => $bcra['bcra_fecha'],
                'bcra_usuario' => $bcra['bcra_usuario'],
                'bcra_nota' => $bcra['bcra_nota'],
            );
            array_push($array_bcra, $data_a);
        }
        return $array_bcra;
    }


    // Funciones para reparar el inventario
    public static function ctrActualizarInventario4()
    {

        // SACAR LISTA DE MODELOS 

        $listaProductos = AlmacenesModelo::mdlMostrarSeriesModelos();

        foreach ($listaProductos as  $spds) {
            # code...
            $issetModelo = AlmacenesModelo::mdlMostrarInventarioByModeloFicha($spds['mpds_id'], 25);

            if (!$issetModelo) {

                // INSERTAR
                $actualizar = AlmacenesModelo::mdlSumarInventarioInsert($spds['pvs_clave'], array(
                    'itr_id_modelo' => $spds['mpds_id'],
                    'itr_value' => 1,
                    'itr_ficha' => 25,
                ));
            } else {
                // ACTUALIZAR
                $actualizar = AlmacenesModelo::mdlSumarInventarioUpdate($spds['pvs_clave'], $spds['mpds_id'], 25);
            }
        }
    }
    public static function ctrActualizarCantidades(){

        $inventario = AlmacenesModelo::mdlMostrarInventarioByModeloFichaAll(25); 

        foreach ($inventario as $ivs) {
            # code...
            $suma =  $ivs['A'] + $ivs['B'] + $ivs['C'] + $ivs['D']  + $ivs['itr_devoluciones'] + $ivs['itr_traslado_1'];
            $resta = $ivs['itr_ventas'] + $ivs['itr_traslado_2'] + $ivs['itr_borrado'];

            $total = $suma - $resta;

             AlmacenesModelo::mdlSumarFinalInventarioUpdate($ivs['itr_id_modelo'],25,$total);


        }
    }

    public static function ctrActualizarCantidadesII(){

        $inventario = AlmacenesModelo::mdlMostrarInventarioByModeloFichaAll(25); 

        foreach ($inventario as $ivs) {
            # code...
            
             AlmacenesModelo::mdlSumarInicialInventarioUpdate($ivs['itr_id_modelo'],26,$ivs['itr_if']);


        }
    }
}
