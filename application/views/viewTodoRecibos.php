	<!-- START WRAPPER -->
	<div class="wrapper">
	    <?php if (!empty($Recibos)) {
        ?>
	        <section id="content">
	            <!--breadcrumbs start-->
	            <div id="breadcrumbs-wrapper">
	                <!-- Search for small screen -->
	                <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
	                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="">
	                </div>

	            </div>
	            <!--breadcrumbs end-->
	            <!--start container-->
	            <div class="container">

	                <div class="divider"></div>
	                <!--editableTable-->
	                <div id="editableTable" class="section">
	                    <div class="row">
	                        <div class="col s11">
	                            <h4 class="header">Mis Recibos</h4>
								<div class="col s3 offset-s10">
	                                    <a class='dropdown-trigger btn' href="#" onclick="loadUrl('Crudempleados/')" data-target='dropdown1'>Regresar</a>
	                                </div>
	                        </div>
	                        <div class="col s1">
	                            <div class="col s8 offset-s2">
	                                <a class="tooltipped js-video-button" data-video-id='Z90WBJMrias' data-position="left" data-delay="30" data-tooltip="¿Necesitas ayuda?" style="padding: 0px !important;"><i class="medium material-icons">ondemand_video</i></a>
	                            </div>
	                        </div>

	                        <div class="col s12">
	                            <table id="mainTableFacturas" class="display">
	                                <thead>
	                                    <tr>
	                                        <th style="display:none">id</th>
											<th>Razón Social</th>
											<th>Periodo Fiscal</th>
	                                        <th>PDF</th>
	                                        <th>XML</th>
	                                    </tr>
	                                </thead>
	                                <tbody>

	                                    <?php
                                        $contador = 1;
                                        foreach ($Facturas as $row) {
                                            $idFactura = $row["idProdFactura"];
											$razonSocial = $row["razonSocial"];
											$pf=$row["periodoFiscal"];
											switch($pf){
												case 1:
													$PeriodoFiscal="Enero";
												break;
												case 2:
													$PeriodoFiscal="Febrero";
												break;
												case 3:
													$PeriodoFiscal="Marzo";
												break;
												case 4:
													$PeriodoFiscal="Abril";
												break;
												case 5:
													$PeriodoFiscal="Mayo";
												break;
												case 6:
													$PeriodoFiscal="Junio";
												break;
												case 7:
													$PeriodoFiscal="Julio";
												break;
												case 8:
													$PeriodoFiscal="Agosto";
												break;
												case 9:
													$PeriodoFiscal="Septiembre";
												break;
												case 10:
													$PeriodoFiscal="Octubre";
												break;
												case 11:
													$PeriodoFiscal="Noviembre";
												break;
												case 12:
													$PeriodoFiscal="Diciembre";
												break;
											}
											
                                            echo "<tr>
										<td style='display:none;'>$idFactura</td>
										<td>$razonSocial</td>
										<td>$PeriodoFiscal</td>
										<td><a style='background-color: #023764;' class='dropdown-trigger btn' href='" . base_url('index.php/CrudFacturas/descargaFactura/' . $idFactura . "/pdf") . "' download><i style='color:white' class=\"material-icons\">cloud_download</i></a></td>
										<td><a style='background-color: #023764;' class='dropdown-trigger btn' href='" . base_url('index.php/CrudFacturas/descargaFactura/' . $idFactura . "/xml") . "' download><i style='color:white' class=\"material-icons\">cloud_download</i></a></td>
									</tr>";

                                            $contador++;
                                        }
                                        ?>
	                                </tbody>

	                            </table>
	                        </div>
	                    </div>
	                    <div class="divider"></div>
	                </div>
	            </div>
	            <!--end container-->
	        </section>
	    <?php } else { ?>
	        <section id="content">
	            <!--breadcrumbs start-->
	            <div id="breadcrumbs-wrapper">
	                <!-- Search for small screen -->
	                <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
	                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="">
	                </div>

	            </div>
	            <!--breadcrumbs end-->
	            <!--start container-->
	            <div class="container">

	                <div class="divider"></div>
	                <!--editableTable-->
	                <div id="editableTable" class="section">
	                    <div class="row">
	                        <div class="col s11">
	                            <h4 class="header">Mis Recibos</h4>

	                                <div class="col s3 offset-s10">
	                                    <a class='dropdown-trigger btn' href="#" onclick="loadUrl('Crudempleados/')" data-target='dropdown1'>Regresar</a>
	                                </div>
	                        </div>
	                        <div class="col s1">
	                            <div class="col s8 offset-s2">
	                                <a class="tooltipped js-video-button" data-video-id='Z90WBJMrias' data-position="left" data-delay="30" data-tooltip="¿Necesitas ayuda?" style="padding: 0px !important;"><i class="medium material-icons">ondemand_video</i></a>
	                            </div>
	                        </div>

	                        <div class="col s12" align="center">
	                            <div class="card" style="width: 18rem;">
	                                <div class="card-body">
	                                    <h5 class="card-title">Vaya.. no hay recibos por aquí </h5>
	                                    <h6 class="card-subtitle mb-2 text-muted"></h6>
	                                    <p class="card-text">Parece que aun no tiene recibos asignados para este empleado.</p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="divider"></div>
	                </div>
	            </div>
	            <!--end container-->
	        </section>
	    <?php } ?>
	</div>
	<!-- Modal Structure -->
	<!-- <div id="modalContra" class="modal">
		<div class="modal-content">
			<h4>Cambiar contraseña</h4>

			<div class="row">

			</div>

			<div class="modal-footer">
				<a onclick="modPassword()" class="modal-action modal-close waves-effect waves-green btn-flat">Guardar</a>
				<a class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
			</div>
        </div>
        
	</div> -->

	<script type="text/javascript">
	    $("#mainTableFacturas").DataTable({
	        "language": {
	            "sProcessing": "Procesando...",
	            "sLengthMenu": "Mostrar _MENU_ registros",
	            "sZeroRecords": "No se encontraron resultados",
	            "sEmptyTable": "Ningún dato disponible en esta tabla",
	            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
	            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "sInfoPostFix": "",
	            "sSearch": "Buscar:",
	            "sUrl": "",
	            "sInfoThousands": ",",
	            "sLoadingRecords": "Cargando...",
	            "oPaginate": {
	                "sFirst": "Primero",
	                "sLast": "Último",
	                "sNext": "Siguiente",
	                "sPrevious": "Anterior"
	            },
	            "oAria": {
	                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
	                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	            }
	        },
	        "drawCallback": function(settings) {
	            $("select[name$='_length']").addClass("browser-default");
	        }


	    });

	    $(document).ready(function() {
	        $('.modal').modal();
	    });
	</script>