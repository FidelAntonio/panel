<?php
if ($this->session->userdata('tipo') == 2) {
    $idCliente = $idClient['idCliente'];
}
if (!empty($permisos)) {
    $arregloPermisos = array();
    foreach ($permisos as $permiso) {
        $arregloPermisos[intval($permiso['idModulo'])] = $permiso;
    }
}
?>
<!-- START LEFT SIDEBAR NAV 2903-->
<aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">

    <div class="brand-sidebar" align="center">

        <h1 class="logo-wrapper">

            <a href="tablero" class="brand-logo darken-1">

                <!--<img src="http://www.constructora-antar.com.mx/wp-content/uploads/2018/10/antar-sitelogo.png"-->
                <img src="<?= base_url() ?>/assets/images/logo/dna2_logo.png" alt="materialize logo">

                <!-- <span class="logo-text hide-on-med-and-down">Antar</span> -->

            </a>

            <a href="#" class="navbar-toggler">

                <i class="material-icons">radio_button_checked</i>

            </a>

        </h1>

    </div>

    <ul id="slide-out" class="side-nav fixed leftside-navigation">

        <li class="no-padding">

            <ul class="collapsible" data-collapsible="accordion">

                <li class="bold" id="listItemAdministracion">

                    <a style="background-color: #002240" class="collapsible-header waves-effect waves-cyan active">

                        <i class="material-icons">dashboard</i>
                        <?php
                        if ($this->session->userdata('tipo') == 1) {
                        ?>
                            <span class="nav-text">Administración</span>
                        <?php } else {
                        ?>
                            <span class="nav-text">Panel del Cliente</span>
                    </a>


                <?php
                        }
                        if (isset($arregloPermisos[1])) {
                ?>
                    <div class="collapsible-body">
                        <ul>

                            <li onclick="loadUrl('Crudusuarios/');">

                                <a href="#">

                                    <i class="material-icons">keyboard_arrow_right people</i>

                                    <span>Usuarios</span>

                                </a>

                            </li>


                        </ul>

                    </div>
                   

                    <?php
                        }
                        if (isset($arregloPermisos[2])) {
                    ?>
                     <div class="collapsible-body">
                        <ul>

                            <li onclick="loadUrl('Crudclientes/');">

                                <a href="#">

                                    <i class="material-icons">keyboard_arrow_right list</i>

                                    <span>Clientes</span>

                                </a>

                            </li>


                        </ul>
                        </div>
                    <?php
                        }
                        if (isset($arregloPermisos[3])) {
                    ?>
                        
                    
                    <div class="collapsible-body">

                        <ul>

                            <li onclick="loadUrl('Crudpaquetes/');">

                                <a href="#">

                                    <i class="material-icons">keyboard_arrow_right markunread_mailbox</i>

                                    <span>Paquetes</span>

                                </a>

                            </li>


                        </ul>
                        
                       
                    </div>
                    <?php
                        }
                        if (isset($arregloPermisos[4])) {
                        ?>
                    <div class="collapsible-body">

                        <ul>
                     

                            <li onclick="loadUrl('Crudempleados/');">

                                <a href="#">

                                    <i class="material-icons">keyboard_arrow_right person_pin</i>

                                    <span>Empleados</span>

                                </a>

                            </li>


                        </ul>
                             
                    </div>
                    <?php
                        }
                        if (isset($arregloPermisos[5])) {
                    ?>
                   
                        <!-- A QUI EMPIEZA EL PANEL DEL CLIENTE -->
                        <div class="collapsible-body">

                        <ul>

                            <li onclick="loadUrl('Crudclientes/datosFiscalesCliente/<?= $idCliente ?>');">

                                <a href="#">

                                    <i class="material-icons">keyboard_arrow_right assignment</i>

                                    <span>Mis datos</span>

                                </a>

                            </li>


                        </ul>
                        </div>
                    <?php
                        }
                        if (isset($arregloPermisos[6])) {
                    ?>
                        
                    
                    <div class="collapsible-body">

                        <ul>

                            <li onclick="loadUrl('Crudempleados/');">

                                <a href="#">

                                    <i class="material-icons">keyboard_arrow_right supervisor_account</i>

                                    <span>Mis empleados</span>

                                </a>

                            </li>


                        </ul>
                        </div>
                    <?php
                        }
                        if (isset($arregloPermisos[8])) {
                    ?>


                    <div class="collapsible-body">
                        <ul>

                            <li onclick="loadUrl('CrudFacturas/');">

                                <a href="#">

                                    <i class="material-icons">keyboard_arrow_right description</i>

                                    <span>Mis facturas</span>

                                </a>

                            </li>


                        </ul>
                    </div>
                    <?php
                        }
                    ?>

                    

                </li>

            </ul>


        </li>

    </ul>

    <a data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">

        <i class="material-icons">menu</i>
    </a>
</aside>
<!-- END LEFT SIDEBAR NAV-->