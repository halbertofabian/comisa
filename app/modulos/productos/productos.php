<?php
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "update") :
    cargarComponente('breadcrumb_nivel_1', '', 'Editar producto #' . $rutas[2], array(['ruta' => 'productos', 'label' => 'Listar productos']));
    include_once 'app/modulos/productos/editar-productos.php';

    //$pds = ProductosModelo::mdlMostrarProductos($rutas[2]); ?>


<?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "new") :
    cargarComponente('breadcrumb_nivel_1', '', 'Nuevo producto', array(['ruta' => 'productos', 'label' => 'Listar mercancía']));

    include_once 'app/modulos/productos/nuevo-producto.php';

?>
   
<?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "exportar") :
    cargarComponente('breadcrumb_nivel_1', '', 'Exportar', array(['ruta' => 'productos', 'label' => 'Listar productos']));



?>

<?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "importar") :
    cargarComponente('breadcrumb_nivel_1', '', 'Importar', array(['ruta' => 'productos', 'label' => 'Listar productos']));

    include_once 'app/modulos/productos/importar.php';



?>
<?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "agregar_series") :
    cargarComponente('breadcrumb', '', 'Agregar Series');

    include_once 'app/modulos/productos/agregar_series.php';



?>
<?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "registrar-modelos") :
    cargarComponente('breadcrumb', '', 'Registrar modelos');

    include_once 'app/modulos/productos/registrar-modelos.php';



?>

  


<?php else :
    cargarComponente('breadcrumb', '', 'Lista de productos');
    include_once 'app/modulos/productos/listar-productos.php';


?>



<?php endif; ?>