<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_Paquetes extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *'); // permite CORS desde un dominio. Cambiar el * por el dominio.
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

		header('Content-Type: application/json; charset=UTF-8'); // La API siempre responderá en JSON.
		$this->load->model("paquetes");
	}
	function getPaquetes()
	{
		$idPaquetes = $this->input->post("idPaquetes");
		echo json_encode($this->paquetes->getPaquetesApi($idPaquetes));
	}
	function getPaquete()
	{
		$idPaquete = $this->input->post("id");
		if (empty($idPaquete)) {
			http_response_code(500);
			echo "El ID del paquete no es válido";
		} else {
			$paquete = $this->paquetes->getDetallePaquete($idPaquete);
			echo json_encode($paquete);
		}
	}
}
