<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Clientes extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getClientesLike($nombre)
	{
		return $this->db->query('SELECT idCliente,cliente.nombre AS clientenombre, cliente.apPaterno AS clientepaterno, cliente.apMaterno AS clientematerno from cliente where cliente.nombre like "%'.$nombre.'%"')->result_array();
	}
	function getClientes()
	{
		return $this->db->query("SELECT cliente.*,usuario.correo FROM `cliente` join usuario on usuario.idUsuario=cliente.Usuario_idUsuario")->result_array();
	}

	function getUsuarios()
	{
		return $this->db->query("SELECT * FROM `usuario`")->result_array();
	}

	function getAllcfdi(){
		return $this->db->query("SELECT * FROM `catUsocfdi`")->result_array();
	}

	function getEdos()
	{
		return $this->db->query("SELECT * FROM `estados`")->result_array();
	}
	function getMunicipios($idEd)
	{
		return $this->db->query("SELECT * FROM `municipios` WHERE `estado` =$idEd ")->result_array();
	}

	function getColo($idM)
	{
		return $this->db->query("SELECT * FROM `regiones` WHERE `municipio` =$idM ")->result_array();
	}

	function getCodigoP($idColo){
		return $this->db->query("SELECT * FROM `regiones` WHERE `idRegiones` =$idColo ")->result_array();
	}

	function insertarDatos($dtos)
	{
		$this->db->insert('cliente',$dtos);
		return $this->db->insert_id();
	}	

	function altaDatosFactura($datos){
		$this->db->insert('datosfacturacion',$datos);
		return  $this->db->insert_id();
	}
	function deleteDatoFiscal($idDatosFacturacion){
		$this->db->where("idDatosFacturacion", $idDatosFacturacion);
		$this->db->delete("datosfacturacion");
	}

	function insertarDatosUser($datos){
		$this->db->insert('usuario',$datos);
		return  $this->db->insert_id();
	}

	function getFacturacion($idCliente)
	{
		return $this->db->query("SELECT datosfacturacion.*,regiones.nombreRegion,municipios.nombreMunicipio, estados.nombreEstado from datosfacturacion join regiones on datosfacturacion.colonia=regiones.idRegiones join municipios on municipios.idMunicipio=datosfacturacion.municipio join estados on estados.id_Estado=municipios.estado where Cliente_idCliente=".$idCliente)->result_array();
	}

	function updateCliente($datos,$idC){
		$this->db->where('idCliente',$idC);
		$this->db->update('cliente',$datos);
	}

	function updateFacturacionDatos($Dat,$id){
		$this->db->where('idDatosFacturacion',$id);
		$this->db->update('datosfacturacion',$Dat);
	}

	function borrarCliente($idC)
	{
		$this->db->where("idCliente",$idC);
		$this->db->delete("cliente");
	}

	function eliminarCliente($idC)
	{
		$this->db->where("idUsuario",$idC);
		$this->db->delete("usuario");
	}

	function getDtosFiscales($idCL)
	{
		$this->db->select("datosfacturacion.*,estados.id_Estado");
        $this->db->from("datosfacturacion");
        $this->db->join("municipios","municipios.idMunicipio=datosfacturacion.municipio");
        $this->db->join("estados","estados.id_Estado=municipios.estado");
        $this->db->where("datosfacturacion.idDatosFacturacion", $idCL);
        return $this->db->get()->row_array();
	}

	function getClienteByIdUsuario($idUsuario){
		$this->db->select('cliente.*')
		->from('cliente')
		->where('Usuario_idUsuario',$idUsuario);
		return $this->db->get()->row_array();
	}
	function getClienteByIdCliente($idCliente){
		$this->db->select('cliente.*')
		->from('cliente')
		->where('idCliente',$idCliente);
		return $this->db->get()->row_array();
	}
	function getCliente($idCliente)
	{
		return $this->db->query('SELECT idCliente,cliente.nombre AS clientenombre, cliente.apPaterno AS clientepaterno, cliente.apMaterno AS clientematerno from cliente where cliente.idCliente='.$idCliente.'')->row_array();
	}
}
 ?>