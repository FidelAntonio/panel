<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

/** 
 * 
 */
class Empleados extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getEmpleados($idCliente)
	{
		$this->db->select("empleado.*")
		->from("empleado");

		if($idCliente) {
			if(!is_array($idCliente))
				$idCliente = explode(",", $idCliente);
			$this->db->where_in("empleado.Cliente_idCliente", $idCliente);
			
		}
		return $this->db->get()->result_array();
	}

	function getClientes()
	{
		return $this->db->query("SELECT * FROM cliente")->result_array();
	}

	function getPaquetes()
	{
		return $this->db->query("SELECT * FROM paquete")->result_array();
	}

	function getDetalleEmpleado($idE)
	{
		$this->db->select("empleado.*, cliente.nombre as nombreCliente, paquete.nombre as nombrePaquete");
        $this->db->from("empleado");
        $this->db->join("cliente", "empleado.Cliente_idCliente=cliente.idCliente");
        $this->db->join("paquete", "paquete.idPaquete=empleado.Paquete_idPaquete");
        $this->db->where("empleado.idEmpleado", $idE);
        return $this->db->get()->row_array();
	}

	function getDatosCl()
	{
		return $this->db->query("SELECT * FROM `cliente`")->result_array();
	}

	function updateEmpleado($data,$idEmpleado)
	{
		$this->db->where('idEmpleado',$idEmpleado);
		$this->db->update('empleado',$data);
        $datosEmpleado = $this->getDetalleEmpleado($idEmpleado);
		$empleado=[
			'name'=>$datosEmpleado['nombre']." ".$datosEmpleado['apPaterno']." ".$datosEmpleado['apMaterno'],
			'email'=>$datosEmpleado['correoEmpleado'],
			'phone'=>$datosEmpleado['telefonoEmpleado'],
		];
        $this->load->model("ConektaBridge");
        $this->ConektaBridge->actualizarCliente($datosEmpleado['idConekta'],$empleado);
	}

	function insertarDatos($empleado, $token)
	{
	    $this->load->model("Usuarios");
	    $this->load->model("Clientes");
	    $this->load->model("Paquetes");
        $usuario = $this->Usuarios->traerdatoStatus($empleado['idUsuario']);
        $clienteUsuario = $this->Clientes->getClienteByIdUsuario($empleado['idUsuario']);
        $paquete = $this->Paquetes->getDetallePaquete($empleado['idPaquete']);

        $customer = $this->ConektaBridge->crearCliente([
            'name' => trim($empleado['nombre'])." ".trim($empleado['apPaterno'])." ".trim($empleado['apMaterno']),
            'email' => $usuario->correo,
            'phone' => $clienteUsuario['telefono'],
            'token_id' => $token,
            'tipoPago' => 'card'
		]);
        /*$source = $this->ConektaBridge->crearMetodoPago(
            $customer->id,
            'card', // también puede ser "oxxo_recurrent"
            $token
        );*/
        $subscription = $this->ConektaBridge->crearSubscripcion(
            $customer, $paquete['idPaquete'], $customer->payment_sources[0]
        );
        $empleado['idConekta'] = $customer->id;
        $idPaquete = $empleado['idPaquete'];
        unset($empleado['idPaquete']);
        unset($empleado['idUsuario']);
        $empleado['Paquete_idPaquete'] = $idPaquete;
		$this->db->insert('empleado',$empleado);
		return $this->db->insert_id();
	}

	function borrarEmpleado($idEm)
	{
	    $datosEmpleado = $this->getDetalleEmpleado($idEm);
		$this->db->where("idEmpleado",$idEm);
		$this->db->delete("empleado");
		$this->load->model("ConektaBridge");
		$this->ConektaBridge->deleteCliente($datosEmpleado['idConekta']);
	}

	function getDtosEmpleado($idEpos)
	{
		$this->db->select("empleado.*, cliente.nombre AS clientenombre, cliente.apPaterno AS clientepaterno, cliente.apMaterno AS clientematerno, paquete.nombre as nombrePaquete");
        $this->db->from("empleado");
        $this->db->join("cliente", "empleado.Cliente_idCliente=cliente.idCliente");
        $this->db->join("paquete", "paquete.idPaquete=empleado.Paquete_idPaquete");
        $this->db->where("empleado.idEmpleado", $idEpos);
        return $this->db->get()->row_array();
	}

	function verificarClienteVacio($idCliente){
		$this->db->select('Cliente_idCliente');
		$this->db->where("empleado.Cliente_idCliente", $idCliente);
	}
}
 ?>