
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 29/10/2020 19:53
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class POSControlador
{
    public function ctrAgregarPOS()
    {
    }
    public function ctrActualizarPOS()
    {
    }
    public function ctrMostrarPOS()
    {
    }
    public function ctrEliminarPOS()
    {
    }

    public static function ctrEmpezarVenta()
    {
        if (isset($_POST['btnEmpezarVenta'])) {
            $vts_id_venta = POSModelo::mdlConsultarVentaSiguientePOS();

            $vts_id_venta['vts_id_venta'] =  strlen($vts_id_venta['vts_id_venta']) == 0 ? "0001"  : $vts_id_venta['vts_id_venta'];
            $vts_id_venta['vts_id_venta'] =  strlen($vts_id_venta['vts_id_venta']) == 1 ? "000" . $vts_id_venta['vts_id_venta'] : $vts_id_venta['vts_id_venta'];
            $vts_id_venta['vts_id_venta'] =  strlen($vts_id_venta['vts_id_venta']) == 2 ? "00" . $vts_id_venta['vts_id_venta'] : $vts_id_venta['vts_id_venta'];
            $vts_id_venta['vts_id_venta'] =  strlen($vts_id_venta['vts_id_venta']) == 3 ? "0" . $vts_id_venta['vts_id_venta'] : $vts_id_venta['vts_id_venta'];



            $_POST['vts_usuario_responsable'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['vts_estado_pagado'] = "PENDIENTE-CAJA";
            $_POST['vts_fecha_venta'] = FECHA;
            $_POST['vts_id_modulo'] = "MOD:GENERAL-VENTA:" . CLIENTE_ID . ':PRODUCTOS';
            $_POST['vts_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            $_POST['vts_id_suscriptor'] = CLIENTE_ID;
            $_POST['vts_id_venta'] = $vts_id_venta['vts_id_venta'];

            //preArray($_POST);

            $empzarVenta = POSModelo::mdlEmpezarVenta($_POST);

            if ($empzarVenta) {
                return array(
                    'status' => true,
                    'vts_id_venta' => $_POST['vts_id_venta'],
                    'mensaje' => ''
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Ocurrio un error, intenta de nuevo o si no recarga la página'
                );
            }
        }
    }

    public static function ctrMarcarProducto()
    {
        if (isset($_POST['btnMarcarProducto'])) {
            $producto = ProductosModelo::mdlMostrarProductosActivos('Activo', $_POST['pds_sku']);

            //var_dump($producto);

            // Vericar si existe el producto 
            if ($producto == false) {
                return array(
                    'status' => false,
                    'mensaje' => 'El producto con sku ' . $_POST['pds_sku'] . ' no existe, verifique el sku.'
                );
            }

            // Vericar si hay stok
            if ($producto['pds_stok'] <= 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'No hay stok de este producto'
                );
            }

            $precio = 0.0;

            // Calcular precio de producto
            if ($_POST['vts_tipo_venta'] == "Menudeo") {
                if ($producto['pds_precio_promocion'] > 0) {
                    if ((FECHA >= $producto['pds_fecha_inicio_promocion'] || $producto['pds_fecha_inicio_promocion'] == "0000-00-00 00:00:00") && ($producto['pds_fecha_fin_promocion'] == "0000-00-00 00:00:00" || FECHA <= $producto['pds_fecha_fin_promocion'])) {
                        $precio = $producto['pds_precio_promocion'];
                    } else {
                        $precio = $producto['pds_precio_publico'];
                    }
                } else {
                    $precio = $producto['pds_precio_publico'];
                }
            } elseif ($_POST[''] == "Mayoreo") {
                if ($producto['pds_precio_mayoreo'] <= 0) {
                    $precio = $producto['pds_precio_publico'];
                } else {
                    $precio = $producto['pds_precio_mayoreo'];
                }
            }

            $isExitDeatalle = POSModelo::mdlConsultarVentaDetalleProducto($producto['pds_id_producto'], $_POST['vts_id_venta']);



            if ($isExitDeatalle != false) {
                $dpds_cantidad = $isExitDeatalle['dpds_cantidad'] + 1;



                $datos =  array(
                    'status' => true,
                    'mensaje' => '',
                    'dpds_id_detalle' => $isExitDeatalle['dpds_id_detalle'],
                    'dpds_precio_compra' => $isExitDeatalle['dpds_precio_compra'],
                    'dpds_total_compra' => $isExitDeatalle['dpds_precio_compra'] * $dpds_cantidad,
                    'dpds_precio_venta' => $isExitDeatalle['dpds_precio_venta'],
                    'dpds_cantidad' => $dpds_cantidad,
                    'dpds_ganancia' => ($isExitDeatalle['dpds_precio_venta'] * $dpds_cantidad) - ($isExitDeatalle['dpds_precio_compra'] * $dpds_cantidad),
                    'dpds_total' => $isExitDeatalle['dpds_precio_venta'] * $dpds_cantidad,
                    'dpds_estado_detalle' => 'COMPLETADO',
                    'dpds_id_producto' => $isExitDeatalle['dpds_id_producto'],

                    'dpds_nombre' => $producto['pds_nombre'] . ' ' . $producto['pds_descripcion_corta'],
                    'dpds_sku' => $producto['pds_sku']
                );
                $actualizarDetalle = POSModelo::mdlActualizarVentaDetalleProducto($datos);
                var_dump($actualizarDetalle);
                return;
                if ($actualizarDetalle) {
                    return $datos;
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'Intenta de nuevo'
                    );
                }
            } else {

                $dpds_cantidad = $_POST['dpds_cantidad'];

                $datos =  array(
                    'status' => true,
                    'mensaje' => '',
                    'dpds_id_venta' => $_POST['vts_id_venta'],
                    'dpds_precio_compra' => $producto['pds_precio_compra'],
                    'dpds_total_compra' => $producto['pds_precio_compra'] * $dpds_cantidad,
                    'dpds_precio_venta' => $precio,
                    'dpds_cantidad' => $dpds_cantidad,
                    'dpds_ganancia' => ($precio * $dpds_cantidad) - ($producto['pds_precio_compra'] * $dpds_cantidad),
                    'dpds_total' => $precio * $dpds_cantidad,
                    'dpds_estado_detalle' => 'COMPLETADO',
                    'dpds_id_sucursal' => $_SESSION['session_suc']['scl_id'],
                    'dpds_id_suscriptor' => CLIENTE_ID,
                    'dpds_id_producto' => $producto['pds_id_producto'],

                    'dpds_nombre' => $producto['pds_nombre'] . ' ' . $producto['pds_descripcion_corta'],
                    'dpds_sku' => $producto['pds_sku']
                );

                $registroDetalle = POSModelo::mdlRegistroVentaDetalleProducto($datos);

                if ($registroDetalle) {
                    return $datos;
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'Intenta de nuevo, producto no registrado'
                    );
                }
            }
        }
    }
}
