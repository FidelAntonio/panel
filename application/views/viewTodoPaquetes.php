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
							<h4 class="header">Paquetes registrados</h4>

						</div>
						<div class="col s1">
							<div class="col s8 offset-s2">
								<a class="tooltipped js-video-button" data-video-id='Z90WBJMrias' data-position="left" data-delay="30" data-tooltip="¿Necesitas ayuda?" style="padding: 0px !important;"><i class="medium material-icons">ondemand_video</i></a>
							</div>
						</div>
						<div align="center">
							<a style='background-color: #023764' class='dropdown-trigger btn' onclick="loadUrl('Crudpaquetes/altaPaquete')" data-target='dropdown1'>Nuevo paquete</a>
						</div>
						<div class="col s12">
							<table id="mainTablePaquete" class="display">
								<thead>
									<tr>
										<th style="display:none">id</th>
										<th>#</th>
										<th>Nombre</th>
										<th>Detalle</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$contador = 1;
									foreach ($Paquetes as $row) {
										$idPaquete = $row["idPaquete"];
										$nombre = $row["nombre"];


										echo "<tr>
										<td style='display:none;'>$idPaquete</td>
										<td>$contador</td>
										<td>$nombre</td>
										<td><a style='background-color: #023764' class='dropdown-trigger btn' onclick=\"loadUrl('Crudpaquetes/detallePaquete/$idPaquete');\">Ver detalles </a></td>
										<td><a style='background-color: #023764' class='dropdown-trigger btn' onclick=\"loadUrl('Crudpaquetes/editarPaquete/$idPaquete');\">Editar</a></td>
										<td><a class='btn waves-effect waves-light red'  style='cursor:pointer;' onclick='deletePaquete($idPaquete)'>Eliminar</td>
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
	</div>
	<!-- Modal Structure -->
	<div id="modalContra" class="modal">
		<div class="modal-content">
			<h4>Cambiar contraseña</h4>

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
		$("#mainTablePaquete").DataTable({
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
									title: 'Hecho!',
									html: 'La contraseña fue actualizada',
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


		function deletePaquete(idPq) {
			Swal.fire({
				title: '¿Desea eliminar el paquete?',
				//text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.value) {

					$.ajax({
						url: "http://localhost/panel/index.php/Crudpaquetes/eliminarPaquete/" + idPq,
						type: "post",
						dataType: "HTML",
						success: function(data) {
							loadUrl('Crudpaquetes')
						}, error: function (jqXHR, status, error) {
                            if(jqXHR['responseText']){
                                Swal.fire({
                                    'html':jqXHR['responseText'],
                                    'title':'Error',
                                    'icon':'error'
                                })
                            }
                        }
					})
				}
			})
		}
	</script>