<?php
use Firebase\JWT\JWT;
class WebToken extends CI_Model
{
	private $key;
	public function __construct()
	{
		parent::__construct();
		$this->key = "/Sd/w1/s9x/8@@";
	}
	// genera un JWT para la autenticación de usuarios
	function generarJWT($data) {
		$time = time();
		$token = array(
			'iat' => $time, // Tiempo que inició el token
			'exp' => $time + (60*60)*80, // Tiempo que expirará el token (+80 hora)
			'data' => $data);

		$jwt = JWT::encode($token, $this->key);
		return $jwt;

	}
	function decodificarJWT($jwt) {
		try {
			$jwt = JWT::decode($jwt, $this->key, array('HS256'));
			if(!empty($jwt->data))
			{
				return $jwt->data;
			}
			else {
				return [];
			}
		}
		catch (Exception $x) {
			http_response_code(500);
			echo json_encode(array(
				'message' => 'Error de autenticación. Por favor, vuelve a iniciar sesión.',
				'error' => $x->getMessage()
			));
			exit();
		}
	}
}
