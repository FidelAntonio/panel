<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function index()
	{
		$this->session->sess_destroy();
		$this->load->helper('captcha');
		if (isset($_POST['password'])) //si la variable contiene algún valor
		{
			$this->verificarCaptcha();
			$this->load->model("Usuarios"); //cargamos el controlador de User
			$result = $this->Usuarios->login($this->input->post('username'), $this->input->post('password'));
			
			if ($result) //si es verdadero el dato ver el modelo User
			{
				$correo = $result->correo;
				$tipo = $result->tipo;
				$iduser = $result->idUsuario;
				$array = array(
					'iduser' => $iduser, //generamos la variable idUsuario
					'correo' => $correo, //Generamos la variable de usuario
					'tipo' => $tipo //Generamos la variable de tipo de usuario

				);
				session_start();
				$this->session->set_userdata($array);
				
			} else {
				http_response_code(500);
				echo "Credenciales no válidas";
				die();
			}
		} else {
			$this->load->view('login_view');
		}
	}
	function verificarCaptcha()
	{
		$captcha = $this->input->post('token');

		$ch = curl_init();

		// definimos la URL a la que hacemos la petición
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		// indicamos el tipo de petición: POST
		curl_setopt($ch, CURLOPT_POST, TRUE);
		// definimos cada uno de los parámetros
		curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=6LdpHNEUAAAAAL3MfoR6LJ6p9oF7d0yTCuJS6_B4&response=" . $captcha);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		// recibimos la respuesta y la guardamos en una variable
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$respuesta = curl_exec($ch);
		$respuesta = json_decode($respuesta, true);
		// cerramos la sesión cURL
		curl_close($ch);
		if (!$respuesta['success']) {
			http_response_code(500);
			echo "Captcha no válido";
			die();
		}
		return $respuesta;
	}
}
