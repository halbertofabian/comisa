<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title"><?php echo $_SESSION['session_usr']['usr_rol'] ?></li>
                <?php if ($_SESSION['session_usr']['usr_rol'] == "Jefe de cobranza") : ?>
                    <li>
                        <a href="<?php echo HTTP_HOST . 'mi-caja' ?>" class="waves-effect">
                            <i class="fa fa-home"></i> <span> MI CAJA COBRANZA </span>
                        </a>
                    </li>

                <?php elseif ($_SESSION['session_usr']['usr_rol'] == "Jefe de ventas") : ?>
                    <li>
                        <a href="<?php echo HTTP_HOST . 'mi-caja' ?>" class="waves-effect">
                            <i class="fa fa-home"></i> <span> MI CAJA VENTAS </span>
                        </a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?php echo HTTP_HOST ?>" class="waves-effect">
                            <i class="fa fa-home"></i> <span> HOME </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                $menu ="";
                if ($_SESSION['session_usr']['usr_rol'] == "Administrador") {
                    $menu = AppControlador::obtnerMenuAdmin();
                } elseif ($_SESSION['session_usr']['usr_rol'] == "Jefe de cobranza") {
                    $menu = AppControlador::obtnerMenuGefeCobranza();
                } elseif ($_SESSION['session_usr']['usr_rol'] == "Jefe de ventas") {
                    $menu = AppControlador::obtnerMenuGefeVentas();
                }
                elseif ($_SESSION['session_usr']['usr_rol'] == "Jefe administrativo") {
                    $menu = AppControlador::obtnerMenuGefeAdministracion();
                }

                //preArray($menu);
                foreach ($menu as $key => $mu) :
                ?>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <?php echo $mu[0]['icon']; ?>
                            <span> <?php echo $mu[0]['label']; ?>
                                <span class="float-right menu-arrow">
                                    <i class="mdi mdi-chevron-right"></i>
                                </span>
                            </span>
                        </a>
                        <?php foreach ($mu[0]['modulos'] as $key => $li) : ?>
                            <ul class="submenu">
                                <li><a href="<?php echo HTTP_HOST . $li['href'] ?>"><?php echo $li['icon'] . $li['label'] ?></a></li>
                            </ul>
                        <?php endforeach; ?>
                    </li>
                <?php endforeach; ?>


            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>