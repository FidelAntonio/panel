	<!-- START WRAPPER -->
	<script type="text/javascript">
		var listadoCliente = '{<?php for ($i = 0; $i < sizeof($clientes); $i++) {
									echo " \"" . $clientes[$i]['idCliente'] . "\": \" " . $clientes[$i]['nombre'] . " " . $clientes[$i]['apPaterno'] . " " . $clientes[$i]['apMaterno'] .  " \"";
									if ($i != sizeof($clientes) - 1) {
										echo ', ';
									}
								} ?>}'

		var listadoPaquete = '{<?php for ($i = 0; $i < sizeof($paquetes); $i++) {
									echo " \"" . $paquetes[$i]['idPaquete'] . "\": \" " . $paquetes[$i]['nombre'] . " \"";
									if ($i != sizeof($paquetes) - 1) {
										echo ', ';
									}
								} ?>}'
	</script>
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
							<h4 class="header">Empleados registrados</h4>

						</div>
						<div class="col s1">
							<div class="col s8 offset-s2">
								<a class="tooltipped js-video-button" data-video-id='Z90WBJMrias' data-position="left" data-delay="30" data-tooltip="¿Necesitas ayuda?" style="padding: 0px !important;"><i class="medium material-icons">ondemand_video</i></a>
							</div>
						</div>
						<div align="center">
							<?php if($this->session->userdata('tipo')==1) { ?>
							<a style="background-color: #023764" class='dropdown-trigger btn' onclick="loadUrl('Crudempleados/altaEmpleadoAdmin')" data-target='dropdown1'>Nuevo empleado</a>
							<?php } else {?>
							<a style="background-color: #023764" class='dropdown-trigger btn' onclick="loadUrl('Crudempleados/altaEmpleado')" data-target='dropdown1'>Nuevo empleado</a>
							<?php } ?>
						</div>
						<div class="col s12">
							<table id="mainTable" class="display">
								<thead>
									<tr>
										<th style="display: none;">#</th>
										<th>#</th>
										<th>Nombre</th>
										<th>A. Paterno</th>
										<th>A. Materno</th>
										<th>Recibos</th>
										<th>Detalle</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$contador = 1;
									foreach ($Empleados as $row) {
										$idEmpleado = $row["idEmpleado"];
										$nombreEmpleado = $row["nombre"];
										$apPaterno = $row["apPaterno"];
										$apMaterno = $row["apMaterno"];
										
										echo "<tr>
										<td style='display:none;'>$idEmpleado</td>
										<td>$contador</td>
										<td>$nombreEmpleado</td>
										<td>$apPaterno</td>
										<td>$apMaterno</td>
										<td><a style='background-color: #023764' class='dropdown-trigger btn' onclick=\"loadUrl('CrudRecibos/getRecibos/$idEmpleado');\">VER Recibos</a></td>
										<td><a style='background-color: #023764' class='dropdown-trigger btn' onclick=\"loadUrl('Crudempleados/detalleEmpleado/$idEmpleado');\">VER Detalle</a></td>
										<td><a style='background-color: #023764' class='dropdown-trigger btn' onclick=\"loadUrl('Crudempleados/editarEmpleado/$idEmpleado');\">Editar</a></td>
										<td><a class='btn waves-effect waves-light red' style='cursor:pointer;' onclick='deleteEmpleado($idEmpleado)'>Eliminar</td>
									</tr>";
										$contador++;
									}
									//<div id='nombreUser$idCliente' onclick='traeUser($idCliente)'>$correoUser<td style='display:none;' id='muestraselectUser$idCliente'><input type='hidden' id='usuarioEd$idCliente' onchange='modificarUsuario($idCliente)'></td></div>
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
	<div id="modalContra" class="modal">
		<div class="modal-content">
			<h4>Cargar método de pago</h4>

			<div class="row">
				<div class="input-field col s6">
					<input id="passwordUs" name="passwordUs" type="password" required>
					<input type="hidden" id="userId" name="userId">
					<label for="name">Nueva contraseña</label>
				</div>
				<div class="input-field col s6">
					<input id="passwordConfirm" name="passwordConfirm" type="password" required>
					<label for="name">Confirmar contraseña</label>
				</div>
			</div>

			<div class="modal-footer">
				<a onclick="modPassword()" class="modal-action modal-close waves-effect waves-green btn-flat">Guardar</a>
				<a class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.modal').modal();
		});

		function editarContra(idUser) {
			$('#modalContra').modal("open");
			$("#userId").val(idUser);
			$("#passwordUs").val("");
			$("#passwordConfirm").val("");
		}

		function modPassword() {
			var password = $("#passwordUs").val();
			var passConfirm = $("#passwordConfirm").val();
			var idUser = $('#userId').val();
			var parametros = {
				password: password,
				passConfirm: passConfirm,
				idUser: idUser
			};

			if (password != "" && passConfirm != "") {
				if (password == passConfirm) {
					if (password.length >= 8) {
						$.ajax({
							url: '<?= base_url('index.php/Crudusuarios/editaPassword') ?>',
							data: parametros,
							type: 'POST',
							dataType: 'HTML',
							success: function(data) {
								Swal.fire({
									title: 'Éxito',
									html: 'La contraseña ha sido actualizada',
									icon: 'success'
								});
							}
						});
					} else {
						Swal.fire({
							title: 'Alerta!',
							html: 'Las contraseñas deben tener 8 caracteres como mínimo',
							icon: 'warning'
						});
					}

				} else {
					Swal.fire({
						title: 'Alerta!',
						html: 'Las contraseñas no coinciden',
						icon: 'warning'
					});

				}
			} else {
				Swal.fire({
					title: 'Alerta!',
					html: 'Llene el formulario vacio',
					icon: 'warning'
				});

			}

		}

		//      $('#mainTable').Tabledit({
		//     url: 'http://localhost/panel/index.php/Crudempleados/modificarEmpleado/',
		//     editButton: false,
		//     deleteButton: false,
		//     hideIdentifier: true,
		//     columns: {
		//         identifier: [0, 'idEmpleado'],
		//         editable: [[2, 'nombreE'], [3, 'paterno'], [4, 'materno'], [5, 'nacimiento'], [6, 'seguro'], [7,'nomCliente',JSON.stringify(JSON.parse(listadoCliente))], [8,'nomPaquete',JSON.stringify(JSON.parse(listadoPaquete))]]
		//     }
		// });

		function deleteEmpleado(idEmp) {
			Swal.fire({
				title: '¿Seguro que desea eliminar el empleado?',
				//text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, eliminar'
			}).then((result) => {
				if (result.value) {

					$.ajax({
						url: "http://localhost/panel/index.php/Crudempleados/eliminarEmpleado/" + idEmp,
						type: "post",
						dataType: "HTML",
						success: function(data) {
							loadUrl('Crudempleados')
						}
					})
				}
			})
		}

		function traeUser(idC) {
			$.ajax({
				url: "http://localhost/panel/index.php/Crudclientes/getNombreUser/" + idC,
				type: "post",
				dataType: "HTML",
				success: function(data) {}
			})

		}

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
	</script>