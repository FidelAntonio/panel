	<!-- START WRAPPER -->
	<div class="wrapper">

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
							<?php if($this->session->userdata('tipo')==2){?>
							<h4 class="header">Datos Fiscales </h4>
							<?php }else{?>
							<h4 class="header">Datos Fiscales de: <?php echo $Nombre['clientenombre'].' '. $Nombre['clientepaterno'].' '.$Nombre['clientematerno'] ?>  </h4>
							<?php }?>
						</div>
						<div class="col s1">
							<div class="col s8 offset-s2">
								<a class="tooltipped js-video-button" data-video-id='Z90WBJMrias' data-position="left" data-delay="30" data-tooltip="¿Necesitas ayuda?" style="padding: 0px !important;"><i class="medium material-icons">ondemand_video</i></a>
							</div>
						</div>
						<div align="center">
								<a class='dropdown-trigger btn'  onclick="loadUrl('Crudclientes/altaFactura/<?php echo $idCliente; ?>')" data-target='dropdown1'>Nuevo Dato Fiscal</a>
								
								
								<?php if($this->session->userdata('tipo')==1)
                    			{?>
									<a class='dropdown-trigger btn right' href="#" onclick="loadUrl('Crudclientes/index')" data-target='dropdown1'>Regresar</a>
									<?php }?>
							</div>

							

      						  </div>

							<div class="col s12">
							<table id="mainTable" class="display">
								<thead>
								<tr>
									<th style="display:none;">id</th>
									<td>#</td>
									<th>RFC</th>
									<th>Razón Social</th>
									<th>Calle</th>
									<th>No. Exterior</th>
									<th>No. Interior</th>
									<th>Colonia</th>
									<th>Municipio</th>
									<th>Código Postal</th>
									<th>Estado</th>
									<th>Facturas</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
								</thead>
								<tbody>
									<?php 
									$contador=1;
									foreach ($Facturacion as $kay ) {
										$idDatosFacturacion=$kay["idDatosFacturacion"];
										$rfc=$kay["rfc"];
										$razonSocial=$kay["razonSocial"];
										$calle=$kay["calle"];
										$noExt=$kay["noExt"];
										$noInt=$kay["noInt"];
										$colonia=$kay["nombreRegion"];										
										$municipio=$kay["nombreMunicipio"];
										$cp=$kay["cp"];
										$estado=$kay["nombreEstado"];
										

										echo "<tr>
										<td style='display:none;'>$idDatosFacturacion</td>
										<td>$contador</td>
										<td>$rfc</td>
										<td>$razonSocial</td>
										<td>$calle</td>
										<td>$noExt</td>
										<td>$noInt</td>
										<td>$colonia</td>
										<td>$municipio</td>
										<td>$cp</td>
										<td>$estado</td>
										<td><a class='dropdown-trigger btn' onclick=\"loadUrl('CrudFacturas/getfacturas/$idDatosFacturacion/$idCliente');\">Facturas</a></td>
										<td><a class='dropdown-trigger btn' onclick=\"loadUrl('Crudclientes/datosFiscales/$idDatosFacturacion/$idCliente');\">Editar</a></td>
										<td><a class='btn waves-effect waves-light red' style='cursor:pointer;' onclick='deleteDatoFiscal($idDatosFacturacion)'>Eliminar</td>
										</tr>";
										$contador++;
									}
									//<div id='nombreUser$idCliente' onclick='traeUser($idCliente)'>$cooreoUser<td style='display:none;' id='muestraselectUser$idCliente'><input type='hidden' id='usuarioEd$idCliente' onchange='modificarUsuario($idCliente)'></td></div>	

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
	</div>
		<!-- Modal Structure -->


<script type="text/javascript">
$("#mainTable").DataTable({
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
	 

   function deleteDatoFiscal(idDf)
   {
   		Swal.fire({
			  title: 'AVISO',
			  text: "¿Realmente esta seguro de eliminar el dato?",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si, deseo eliminarlo',
			  cancelButtonText: 'Cancelar'
			}).then((result) => {
			  if (result.value) {

			  	$.ajax({
			  		url: "http://localhost/panel/index.php/Crudclientes/eliminarDatoFiscal/"+idDf,
			  		type:"post",
			  		dataType: "HTML",
			  		success:function(data){
						loadUrl('Crudclientes/datosFiscalesCliente/<?= $idCliente ?>')
			  		}
			  	})
			  }
			});
   }

   function traeUser(idC)
   {
   	$("#")
   	$.ajax({
		url: "http://localhost/panel/index.php/Crudclientes/getNombreUser/"+idC,
		type:"post",
		dataType: "HTML",
		success:function(data){
		
		}
	});

   }

   
</script>	
	

	

	

