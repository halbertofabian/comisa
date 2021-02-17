<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo TITULO_APP ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo HTTP_HOST . 'app/' ?>assets/images/favicon.ico">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo HTTP_HOST . 'app/' ?>plugins/morris/morris.css">

    <!-- Basic Css files -->
    <link href="<?php echo HTTP_HOST . 'app/' ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo HTTP_HOST . 'app/' ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo HTTP_HOST . 'app/' ?>assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo HTTP_HOST . 'app/' ?>assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="<?php echo HTTP_HOST . 'app/' ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo HTTP_HOST . 'app/' ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo HTTP_HOST . 'app/' ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo HTTP_HOST . 'app/' ?>plugins/toastr/build/toastr.min.css" rel="stylesheet" />

    <link href="<?php echo HTTP_HOST . 'app/' ?>plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo HTTP_HOST . 'app/' ?>plugins/summernote/summernote-bs4.css" rel="stylesheet" />





    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/sweet-alert2/sweetalert2.min.js"></script>


    <!-- jQuery  -->
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/modernizr.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/waves.js"></script>

    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/peity-chart/jquery.peity.min.js"></script>

    <!--Morris Chart-->
    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/morris/morris.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/raphael/raphael-min.js"></script>




    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>


    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/datatables/responsive.bootstrap4.min.js"></script>


    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/summernote/summernote-bs4.min.js"></script>

    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/select2/js/select2.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>plugins/jquery-number/jquery.number.js"></script>


</head>


<body class="fixed-left">
    <div class="urlApp" urlApp="<?php echo HTTP_HOST ?>"></div>

    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div> -->
    <?php if (isset($_SESSION['session']) && $_SESSION['session']) : ?>


<?php
  
    ?>        <!-- Begin page -->
        <div id="wrapper">


            <!-- Top Bar Start -->
            <?php cargarComponente('topbar') ?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php cargarComponente('sidebar') ?>

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <?php


                ?>
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

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

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <?php cargarComponente('footer') ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
    <?php else :
        cargarPagina('login');
    ?>

    <?php endif; ?>


    <!-- scripts -->
    <?php cargarComponente('scripts') ?>

    <!-- end scripts -->

</body>

</html>