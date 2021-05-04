<?php
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "crear-plantilla") {
  

    include_once 'app/modulos/ventas/crear-plantilla.php';
} elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "cargar-plantilla") {
    

    include_once 'app/modulos/ventas/cargar-plantilla.php';
}
