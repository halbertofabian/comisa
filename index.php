<?php ob_start();

include_once 'config.php';

require_once 'app/modulos/app/app.controlador.php';
require_once 'app/modulos/login/login.controlador.php';
require_once 'app/modulos/usuarios/usuarios.controlador.php';
require_once 'app/modulos/productos/productos.controlador.php';
require_once 'app/modulos/medios/medios.controlador.php';
require_once 'app/modulos/categorias/categorias.controlador.php';
require_once 'app/modulos/configuracion/configuracion.controlador.php';
require_once 'app/modulos/paquetes/paquetes.controlador.php';
require_once 'app/modulos/cupones/cupones.controlador.php';
require_once 'app/modulos/pagos/pagos.controlador.php';
require_once 'app/modulos/inscripciones/inscripciones.controlador.php';
require_once 'app/modulos/gastos/gastos.controlador.php';
require_once 'app/modulos/ingresos/ingresos.controlador.php';
require_once 'app/modulos/sucursales/sucursales.controlador.php';
require_once 'app/modulos/cortes/cortes.controlador.php';
require_once 'app/modulos/cajas/cajas.controlador.php';
require_once 'app/modulos/informes/informes.controlador.php';
require_once 'app/modulos/almacenes/almacenes.controlador.php';
require_once 'app/modulos/compras/compras.controlador.php';
require_once 'app/modulos/cuentas/cuentas.controlador.php';
require_once 'app/modulos/fichas/fichas.controlador.php';
require_once 'app/modulos/proveedores/proveedores.controlador.php';
require_once 'app/modulos/comisiones/comisiones.controlador.php';
require_once 'app/modulos/traspasos/traspasos.controlador.php';
require_once 'app/modulos/ventas/ventas.controlador.php';
require_once 'app/modulos/clientes/clientes.controlador.php';
require_once 'app/modulos/contratos/contratos.controlador.php';


require_once 'app/modulos/login/login.modelo.php';
require_once 'app/modulos/usuarios/usuarios.modelo.php';
require_once 'app/modulos/productos/productos.modelo.php';
require_once 'app/modulos/medios/medios.modelo.php';
require_once 'app/modulos/categorias/categorias.modelo.php';
require_once 'app/modulos/configuracion/configuracion.modelo.php';
require_once 'app/modulos/paquetes/paquetes.modelo.php';
require_once 'app/modulos/cupones/cupones.modelo.php';
require_once 'app/modulos/pagos/pagos.modelo.php';
require_once 'app/modulos/inscripciones/inscripciones.modelo.php';
require_once 'app/modulos/gastos/gastos.modelo.php';
require_once 'app/modulos/ingresos/ingresos.modelo.php';
require_once 'app/modulos/sucursales/sucursales.modelo.php';
require_once 'app/modulos/cortes/cortes.modelo.php';
require_once 'app/modulos/cajas/cajas.modelo.php';
require_once 'app/modulos/informes/informes.modelo.php';
require_once 'app/modulos/almacenes/almacenes.modelo.php';
require_once 'app/modulos/compras/compras.modelo.php';
require_once 'app/modulos/cuentas/cuentas.modelo.php';
require_once 'app/modulos/fichas/fichas.modelo.php';
require_once 'app/modulos/comisiones/comisiones.modelo.php';
require_once 'app/modulos/proveedores/proveedores.modelo.php';
require_once 'app/modulos/traspasos/traspasos.modelo.php';
require_once 'app/modulos/ventas/ventas.modelo.php';
require_once 'app/modulos/clientes/clientes.modelo.php';
require_once 'app/modulos/contratos/contratos.modelo.php';

require_once DOCUMENT_ROOT . 'app/lib/phpMailer/Exception.php';
require_once DOCUMENT_ROOT . 'app/lib/phpMailer/PHPMailer.php';
require_once DOCUMENT_ROOT . 'app/lib/phpMailer/SMTP.php';


//QR CODE
require_once DOCUMENT_ROOT . 'app/lib/phpqrcode/qrlib.php';

//Iniciar aplicacion
iniciarApp();


ob_end_flush();
