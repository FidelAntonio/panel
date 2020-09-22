<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

/**
 * 
 */
class Paquetes extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getPaquetes()
	{
		return $this->db->query("SELECT paquete.idPaquete, nombre FROM paquete")->result_array();
	}
	function getPaquetesApi($idPaquetes)
	{
		$this->db->select("paquete.*")
		->from("paquete");
		if($idPaquetes) {
			if(!is_array($idPaquetes))
				$idPaquetes = explode(",", $idPaquetes);
			$this->db->where_in("paquete.idPaquete", $idPaquetes);
			
		}
		return $this->db->get()->result_array();
	}
	function insertarDatos($datos)
	{
		$this->db->insert('paquete',$datos);
		$idPaquete = $this->db->insert_id();
        $this->load->model("ConektaBridge");
		//$granTotal = (float) $datos['base'] + (float) $datos['costoGestionNomina'] + (float) $datos['iva'];
		$granTotal = (float) $datos['totalFact'];
        $granTotal *= 100; // se multiplica porque conekta necesita la cantidad de centavos.
        $this->ConektaBridge->crearPlan([
            'id' => $idPaquete,
            'name' => $datos['nombre'],
            'amount' => $granTotal,
            'currency' => "MXN",
            'interval' => "month",
            'frequency' => "1",
            'trial_period_days' => 0,
            'expiry_count' => 1
        ]);
        return $idPaquete;

    }

	function getDetallePaquete($idPa)
	{
		$this->db->select("*");
		$this->db->from("paquete");
		$this->db->where("paquete.idPaquete",$idPa);
		return $this->db->get()->row_array();
	}

	function getEditarPaquete($idPaq)
	{
		$this->db->select("*");
		$this->db->from("paquete");
		$this->db->where("idPaquete",$idPaq);
		return $this->db->get()->row_array();
	}

	function actualizarDatos($data,$idPaq)
	{
		$this->db->where('idPaquete',$idPaq);
		$this->db->update('paquete',$data);

        $this->load->model("ConektaBridge");
        $datos = $this->getDetallePaquete($idPaq);
		// $granTotal = (float) $datos['base'] + (float) $datos['costoGestionNomina'] + (float) $datos['iva'];
		$granTotal = (float) $datos['totalFact'];
        $granTotal *= 100; // se multiplica porque conekta necesita la cantidad de centavos.
        $this->ConektaBridge->actualizarPlan($idPaq, [
            'name' => $datos['nombre'],
            'amount' => $granTotal,
        ]);
	}

	function borrarPaquete($idP)
	{
		$this->db->where("idPaquete",$idP);
		$this->db->delete("paquete");
        $this->load->model("ConektaBridge");
        $this->ConektaBridge->deletePlan($idP);
	}
}
?>