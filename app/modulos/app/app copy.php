<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?php echo TITULO_APP ?></title>
    <link rel="apple-touch-icon" href="<?php echo HTTP_HOST . 'app/assets/' ?>images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo HTTP_HOST . 'app/assets/' ?>images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_HOST . 'app/assets/' ?>css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- DataTables -->
    <link href="<?php echo HTTP_HOST ?>app/assets/plugin/datatables-1/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo HTTP_HOST ?>app/assets/plugin/datatables-1/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo HTTP_HOST ?>app/assets/plugin/datatables-1/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/summernote-2/summernote-lite.min.css" rel="stylesheet">


    <!-- BEGIN: Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css"> -->
    <!-- END: Custom CSS-->

    <!-- Toastr-->
    <!-- <link href="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/toastr/build/toastr.min.css" rel="stylesheet" /> -->

    <link href="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/select2-c/css/select2.min.css" rel="stylesheet" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<?php if (isset($_SESSION['session']) && $_SESSION['session']) : ?>

    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <div class="urlApp" urlApp="<?php echo HTTP_HOST ?>"></div>

        <!-- BEGIN: Header-->
        <?php cargarComponente('navbar') ?>
        <!-- END: Header-->


        <!-- BEGIN: Main Menu-->
        <?php cargarComponente('sidebar') ?>

        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- Dashboard Ecommerce Starts -->

                    <?php


                    if (isset($_GET['ruta'])) {
                        //Traer la lista blanca de paginas adminitas
                        $listaBlanca = AppControlador::obtenerListaBlanca();

                        //Guardad en la variable la ruta que venga de GET

                        //Crea un arreglo vacio
                        $rutas = array();

                        // Crea los elementos del arreglo a partir de caracter /
                        $rutas = explode("/", $_GET['ruta']);

                        // Asigna a la variable el primer item del arreglo que será la página
                        $ruta_get = $rutas[0];
                        //Inicializamos una bandera en true para ver si hay pagina admitida
                        $_404 = true;
                        //Recorremos la lista de paginas admitidas
                        foreach ($listaBlanca as $item) {
                            //Si hay una conincidencia con lo que venga por GET y un elemento de mi lista
                            if ($ruta_get == $item) {
                                //Marcar la bandera en false indicando que si existe la pagina
                                $_404 =  false;
                            }
                        }
                        //Guardar la pagina mostrar dependiendo la bandera
                        $page = $_404 ? '404' : $ruta_get;

                        //Cargar la pagina solicitada

                        cargarPagina($page, $rutas);
                    } else {
                        cargarPagina('bienvenido');
                    }

                    ?>
                    <!-- Dashboard Ecommerce ends -->

                </div>
            </div>
        </div>
        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        <div class="mb-5"></div>

        <!-- BEGIN: Footer-->
        <?php cargarComponente('footer') ?>

        <!-- END: Footer-->



    </body>
    <!-- END: Body-->
<?php else :
    cargarPagina('login');
?>
<?php endif; ?>

</html>