	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	class Contra extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("usuarios");
			$this->load->model("archivos");
			$this->load->library('encryption');
		}
		function recuperarPassword()
		{
			$this->load->library('encryption');
			$this->form_validation->set_rules('correo', 'email', 'trim|required|valid_email');
			$email = $this->input->post("correo");
			$this->form_validation->set_rules('correo', 'email', 'trim|required|valid_email');
			if ($this->form_validation->run() == FALSE) {
				http_response_code(500);
				echo json_encode(array(
					'message' =>  validation_errors()
				));
				return;
			} else {
				$this->load->model("usuarios");
				$usuario = $this->usuarios->getUsuarioByEmail($email);
				if (!empty($usuario)) {
					$this->load->model("Correo");

					$datos = [
						'idUsuario' => $usuario['idUsuario'],
						'fecha' => date("Y-m-d H:i:s"),
						'salt' => md5(uniqid()) // para que nadie pueda descifrar estos tokens se le agrega salt. De esta manera el atacante necesitaria esta semilla única para descifrar el encriptado
					];
					$datos = json_encode($datos);
					$datos = $this->encryption->encrypt($datos);
					$datos = strtr($datos, array('+' => '.', '=' => '-', '/' => '~')); // esto es para poderlo colocar en la URL

					$url = base_url();
					$url .= "index.php/Contra/cargaRecuperacion/" . $datos."";

					$correo = $this->load->view("emailBasico", [
						'titulo' => "Recuperación de contraseña",
						'encabezado' => "Se ha solicitado un correo para recuperar su contraseña",
						'cuerpo' =>

						"
						Por favor, entra a la siguiente dirección para establecer una nueva contraseña.
						<p style='text-align: center'><a href='" . $url . "'>" . $url . "</a></p>
						Este enlace solo estará disponible durante 15 días.
						",
					], TRUE);
					$this->Correo->enviar("Recuperación de contraseña", $this->input->post("correo"), $correo);
					echo json_encode(array(
						'message' => "Se ha enviado un correo de recuperación al email proporcionado"
					));
				} else {
					http_response_code(500);
					echo json_encode(array(
						'message' =>  "La cuenta de correo proporcionada no esta registrada en el sistema."
					));
					return;
				}
			}
		}
		function resetPassword()
		{	
			$this->load->model("usuarios");
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('passConfirm', 'confirmación de password', 'trim|required|min_length[8]|matches[password]');
			$this->form_validation->set_rules('datos', 'encriptado', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				http_response_code(500);
				echo json_encode(array(
					'message' => validation_errors()
				));
				exit();
			} else {
				$this->load->library("encryption");
				// devuelve el valor original del encriptado
				$encriptado = strtr($this->input->post("datos"), array('.' => '+', '-' => '=', '~' => '/'));
				$encriptado = $this->encryption->decrypt($encriptado);
				if ($encriptado) {
					$encriptado = json_decode($encriptado, true); // { idUsuario: 1, fecha: '2020-01-20 10:19:00' }

					$fechaEmision = $encriptado['fecha'];
					$fechaHoy = date("Y-m-d H:i:s");
					$fechaLimite = date("Y-m-d H:i:s", strtotime($fechaEmision . " +15 days"));
					if (strtotime($fechaHoy) < strtotime($fechaLimite)) {
						// por el momento no toma en cuenta la fecha en la que fue emitido este encriptado.
						if ($encriptado['idUsuario']) {
							$this->usuarios->update($encriptado['idUsuario'], array(
								'password' => $this->encryption->encrypt($this->input->post("password"))
							));
							echo json_encode(array(
								'message' => "La contraseña ha sido reestablecida"
							));
						}
					} else {
						http_response_code(403);
						echo json_encode(array(
							'message' => "Han pasado más de 15 dias desde la generación de este token. Por seguridad, vuelve a generar un correo de recuperación de contraseña o contacta con el administrador."
						));
						exit();
					}
				} else {
					http_response_code(500);
					echo json_encode(array(
						'message' => "Los datos del usuario no son válidos"
					));
					exit();
				}
			}
		}
		function cargaRecuperacion($datos){
			$data=[ 
				'datos'=>$datos
			];	
			print $this->load->view('recuperarContrasena',$data,true);
			
		}
	}
	?>