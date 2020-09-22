<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class ApiColonias extends CI_Controller
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

	function getColonias(){
		 $idMunicipio = $this->input->post("id");
		if (empty($idMunicipio)) {
			http_response_code(500);
			echo "El ID del Municipio no es válido";
		}
		else {
		$colonia = $this->Clientes->getColo($idMunicipio);
		echo json_encode($colonia);
		}
	}
}