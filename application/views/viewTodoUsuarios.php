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
								<h4 class="header">Usuarios registrados</h4>

							</div>
							<div class="col s1">
								<div class="col s8 offset-s2">
									<a class="tooltipped js-video-button" data-video-id='Z90WBJMrias' data-position="left" data-delay="30" data-tooltip="¿Necesitas ayuda?" style="padding: 0px !important;"><i class="medium material-icons">ondemand_video</i></a>
								</div>
							</div>
							<div align="center">
								<a style="background-color:#023764" class='dropdown-trigger btn' onclick="loadUrl('Crudusuarios/altaUsuarios')" data-target='dropdown1'>Nuevo usuario</a>
							</div>
							<div class="col s12">
								<table id="mainTable" class="display">
									<thead>
										<tr>
											<th style="display: none">ID</th>
											<th>Correo</th>
											<!-- <th>Password</th> -->
											<th>Tipo</th>
											<th>Foto</th>
											<th>Cambiar contraseña</th>
											<th>Status</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>

										<?php
										$contador = 1;
										$contador2 = 0;
										foreach ($Usuario as $row) {
											$Paquete_idPaquete = $row["Paquete_idPaquete"];
											$Cliente_idCliente = $row["Cliente_idCliente"];
											$idUsuario = $row["idUsuario"];
											$correo = $row["correo"];
											$password = $row["password"];
											$tipo = $row["tipo"];
											$fotoPerfil = $row["fotoUsuario"];
											$status = $row["status"];
											if ($tipo == 1) {
												$tipoUser = "Administrador";
											}
											if ($tipo == 2) {
												$tipoUser = "Cliente";
											}
											if ($fotoPerfil) {
												$fotoPerfil = 'assets/images/fotoPerfilUsuarios/' . $fotoPerfil;
											} else {
												$fotoPerfil = ('assets/images/avatar/avatar-0.jpg');
											}
											if ($Paquete_idPaquete != "" || $Cliente_idCliente != "") {
												$boton = "";
											} else {
												$boton = "<a class='btn waves-effect waves-light red' onclick='deleteUsuario(" . $row['idUsuario'] . ", this)'>Eliminar</a>";
											}

											$status = ($status == 0) ? 'checked' : '';
											$clase = ($contador % 2 == 0) ? 'odd' : 'even';
											echo "<tr  class='$clase' role='row'>
											<td style='display:none' id='indice" . $row['idUsuario'] . "'>$idUsuario</td>
											<td>$correo</td>
											<!--<td>$password</td>-->
											<td>$tipoUser</td>
											";
											echo "<td><span style='cursor: pointer;' onclick='cambiarFotoPerfil(" . $row['idUsuario'] . ")' class=\"avatar-status avatar-online\"><img alt='avatar' src='" . base_url($fotoPerfil) . "' /></span></td>";

											echo "<td><a style='background-color:#023764' class='dropdown-trigger btn' onclick='editarContra(" . $row['idUsuario'] . ")'>Editar</a></td>";

											echo "<td>
                                            <div class=\"switch\">
                                                <label>
                                                  <input type=\"checkbox\" class=\"statusbox\" id='activado" . $row['idUsuario'] . "' " . $status . " onclick='activarUsuario(" . $row['idUsuario'] . ")'>
                                                  <span  class=\"lever\"></span>
                                                </label>
                                            </div>
                                            </td> ";
											echo "<td  id='btnEliminar" . $row['idUsuario'] . "' >$boton</td>";
											echo "</tr>";

											$contador++;
											$contador2++;
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
						<label for="passwordUs">Nueva contraseña</label>
					</div>
					<div class="input-field col s6">
						<input id="passwordConfirm" name="passwordConfirm" type="password" required>
						<label for="passwordConfirm">Confirmar contraseña</label>
					</div>
				</div>

				<div class="modal-footer">
					<a onclick="modPassword()" class="modal-action modal-close waves-effect waves-green btn-flat">Guardar</a>
					<a class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
				</div>
			</div>
		</div>

		<!-- Modal Structure -->
		<div id="cambiarFotoPerfil" class="modal">
			<div class="modal-content">
				<h4>Actualizar foto de perfil</h4>

				<div class="row">
					<form id="formularioActualizar">
					<div class="input-field col-md-9">
					<input type="hidden" id="userIdf" name="userIdf">
						<input accept="image.*" class="dropify" id="fotoPerfil" name="fotoPerfil" style="padding-top: 20px;" type="file">

						<label for="fotoPerfil" class="active">Foto de perfil</label>

					</div>
				</div>


				<div class="modal-footer">
					<button class="btn  waves-effect waves-light right" onclick="modfotoperfil()">Guardar

							<i class="material-icons right">send</i>

					</button>
				</div>
				</form>
			</div>
		</div>


		<script type="text/javascript">
		
			$(document).ready(function() {
				$('.modal').modal();
			});
			function cambiarFotoPerfil(idUser) {
				$('#cambiarFotoPerfil').modal("open");
				$("#userIdf").val(idUser);
				$("#fotoPerfil").val("");

			}
			$(".dropify").dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo o haz clic (<?= $tamanoMaximo ?>)',
                'replace': 'Arrastra y suelta un archivo o haz clic para reemplazar (<?= $tamanoMaximo ?>)',
                'remove': 'Remover',
                'error': 'Ooops, ocurrió un error.'
            }
        });
			function editarContra(idUser) {
				$('#modalContra').modal("open");
				$("#userId").val(idUser);
				$("#passwordUs").val("");
				$("#passwordConfirm").val("");
			}

			function modfotoperfil() {
				formData = new FormData(document.getElementById("formularioActualizar"));
				$.ajax({
								url: '<?= base_url('index.php/Crudusuarios/editaFotoPerfil') ?>',
								data: formData,
								type: 'POST',
								dataType: 'HTML',
								contentType: false,
                				processData: false,
								success: function(data) {
									Swal.fire({
										icon: 'success',
										title: 'Éxito',
										text: 'La foto ha sido actualizada'
									})
									loadUrl('Crudusuarios')
								}, error: function (jqXHR, status, error) {
									if(jqXHR['responseText']) {
										Swal.fire({
											title: 'Error',
											html: jqXHR['responseText'],
											icon: 'error'
										});
									}
								}
							});
							$('#cambiarFotoPerfil').modal("close");
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
										icon: 'success',
										title: 'Éxito',
										text: 'La contraseña ha sido actualizada'
									})
									loadUrl('Crudusuarios')
								}
							});
						} else {
							Swal.fire({
								icon: 'warning',
								title: 'Oops...',
								text: 'Las contraseñas deben tener 8 caracteres como mínimo'
							})
							return;
						}

					} else {
						Swal.fire({
							icon: 'warning',
							title: 'Oops...',
							text: 'Las contraseñas no coinciden!'
						})
						return;

					}
				} else {
					Swal.fire({
						icon: 'warning',
						title: 'Oops...',
						text: 'Por favor llene el formulario vacio!'
					})
					return;
				}

			}


			$('#mainTable').Tabledit({
				url: 'http://localhost/panel/index.php/Crudusuarios/editaPassword/',
				editButton: false,
				deleteButton: false,
				hideIdentifier: true,
				columns: {
					identifier: [0, 'idUser'],
					editable: [
						[1, 'nombreU'],
						[2, 'tipo', '{"0": "Seleccione una opción", "1": "Administrador", "2": "Cliente"}']
					]
				}
			});



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

			function activarUsuario(idU) {
				$.ajax({
					url: '<?= base_url('index.php/Crudusuarios/verificarStatus/') ?>' + idU,
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.status == 1) {
							var st = 0;
						} else {
							var st = 1;
						}
						//alert(st)
						$.ajax({
							url: '<?= base_url('index.php/Crudusuarios/editaPassword/') ?>',
							type: 'POST',
							data: {
								'idUser': idU,
								'st': st
							},
							dataType: 'html',
							success: function(data) {
								Swal.fire({
									title: 'Hecho!',
									html: 'El status ha sido actualizado',
									icon: 'success'
								});

							}
						});
					}
				});
			}

			function deleteUsuario(idUsuario) {
				Swal.fire({
					title: '¿Seguro que desea eliminar a este  usuario?',
					//text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Cancelar',
					confirmButtonText: 'Si, eliminar'
				}).then((result) => {
					if (result.value) {

						$.ajax({
							url: "http://localhost/panel/index.php/Crudusuarios/eliminarUsuario/" + idUsuario,
							type: "post",
							dataType: "HTML",
							success: function(data) {
								Swal.fire({
									icon: 'success',
									title: 'Éxito',
									text: 'El usuario ha sido eliminado'
								})
								loadUrl('Crudusuarios')
							}
						})
					}
				})
			}
		</script>