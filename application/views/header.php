
<!DOCTYPE html>

<html lang="es">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-tap-highlight" content="no">

    <!-- <meta name="description" content="Constructora antar."> -->

    <title>Sistema de gestión DLP</title>

    <!-- Favicons-->

    <link rel="icon" href="<?=base_url('assets/images/favicon/favicon.ico')?>">

    <!-- Favicons-->

    <!-- <link rel="apple-touch-icon-precomposed" href="<=base_url('assets/')?>images/favicon/apple-touch-icon-152x152.png"> -->

    <!-- For iPhone -->

    <meta name="msapplication-TileColor" content="#00bcd4">

    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">


   

    <!-- CORE CSS-->
    
    <link href="<?=base_url('assets/')?>css/themes/collapsible-menu/materialize.css" type="text/css" rel="stylesheet">

    <link href="<?=base_url('assets/')?>css/themes/collapsible-menu/style.css" type="text/css" rel="stylesheet">

    <!--Videos-->
    <link href="<?=base_url('assets/')?>css/modal-video.min.css" type="text/css" rel="stylesheet">

    <link href="<?=base_url('assets/')?>css/custom/custom.css" type="text/css" rel="stylesheet">
    
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->

    <link href="<?=base_url('assets/')?>vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">

    <link href="<?=base_url('assets/')?>vendors/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet">

    <link href="<?=base_url('assets/')?>vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>fonts/fontawesome/css/all.css" type="text/css" rel="stylesheet">

    <!-- <link href="<=base_url('assets/')?>vendors/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet"> -->

    

    <link href="<?=base_url('assets/')?>vendors/dropify/css/dropify.min.css" type="text/css" rel="stylesheet">
    <!--Se agregó dropzone para la carga de folders-->
    <link href="<?=base_url('assets/css/dropzone.css')?>"  type="text/css" rel="stylesheet" />
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css">
    <!--Se agrego los estilos de jquery-ui -->
    <link href="<?=base_url('assets/css/jquery-ui.css')?>"  type="text/css" rel="stylesheet" />


	<!--Se agregó dropzone para la carga de folders-->

    <input type="hidden" id="fechaCompar" name="fechaCompar" value="<?php $hoybase=date('Y-m-d'); echo $hoybase; ?>">
	
    <script type="text/javascript">
	
    </script>

    <style>
        a{
            cursor: pointer;
        }
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
		.swal2-container {
			z-index: 2000 !important;
		}
    </style>
</head>
<body>

<!-- Start Page Loading -->

<div id="loader-wrapper">

    <div id="loader"></div>

    <div class="loader-section section-left"></div>

    <div class="loader-section section-right"></div>

</div>

<!-- End Page Loading -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START HEADER -->

<header id="header" class="page-topbar">

    <!-- start header nav-->

    <div class="navbar-fixed">

        <nav class="navbar-color gradient-45deg-purple-deep-orange gradient-shadow">

            <div class="nav-wrapper">

                
                <ul class="right hide-on-med-and-down">
					<!-- <li>
                        <a class="waves-effect waves-block waves-light notification-button">
                            <i class="material-icons">email
								<small class="notification-badge red" id='numNotificacion'>10</small>			
                            </i>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a class="waves-effect waves-block waves-light notification-button">
                            <i class="material-icons">notifications_none
                                <small class="notification-badge red">10</small>
                            </i>
                        </a>

                    </li> -->
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">

                      <span class="avatar-status avatar-online">
                      <?php
					if($fotoUsuario=='')
					{	
					?>
                        <img src="<?=base_url('assets/')?>images/fotoPerfilUsuarios/avatar-0.jpg" alt="avatar">
					<?php
					}
					else{
					?>	
						<img src="<?=base_url('assets/')?>images/fotoPerfilUsuarios/<?=$fotoUsuario?>" alt="avatar">
					<?php
					}
					?>	

                        <!-- <img src="<=base_url('assets/')?>images/avatar/avatar-0.jpg" alt="avatar"> -->

                        <i></i>

                      </span>

                        </a>

                    </li> 

                    <!-- <li>

                        <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">

                            <i class="material-icons">format_indent_increase</i>

                        </a>

                    </li> -->

                </ul>

            

              

                <!-- profile-dropdown -->

                <ul id="profile-dropdown" class="dropdown-content">

                    <!--  <li>

                         <a href="#" class="grey-text text-darken-1">

                             <i class="material-icons">face</i> Profile</a>

                     </li>

                     <li>

                         <a href="#" class="grey-text text-darken-1">

                             <i class="material-icons">settings</i> Settings</a>

                     </li>

                     <li>

                         <a href="#" class="grey-text text-darken-1">

                             <i class="material-icons">live_help</i> Help</a>

                     </li>

                     <li class="divider"></li>

                     <li>

                         <a href="#" class="grey-text text-darken-1">

                             <i class="material-icons">lock_outline</i> Lock</a>

                     </li>-->

                    <li>

                        <a href="<?=base_url()?>" class="grey-text text-darken-1">

                            <i class="material-icons">keyboard_tab</i> Salir</a>

                    </li>

                </ul>

            </div>

        </nav>

    </div>

</header>
<!-- END HEADER -->
<main>
