<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Apiestados extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *'); // permite CORS desde un dominio. Cambiar el * por el dominio.
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
		
		header('Content-Type: application/json; charset=UTF-8'); // La API siempre responderá en JSON.
		$this->load->model("Clientes");
    }
    function getEstados(){
        echo json_encode($this->Clientes->getEdos()); 
	}
	// function getPaquete(){
	// 	$idPaquete = $this->input->post("id");
	// 	if (empty($idPaquete)) {
	// 		http_response_code(500);
	// 		echo "El ID del paquete no es válido";
	// 	}
	// 	else {
	// 	$paquete = $this->paquetes->getDetallePaquete($idPaquete);
	// 	echo json_encode($paquete);
	// 	}


	//}
}