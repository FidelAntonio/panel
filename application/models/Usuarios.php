<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function login($userName, $password)
    {
        $statu = 0;
        $this->load->library('encryption');
        $this->db->select('Usuario.*, cliente.idCliente');
        $this->db->from('Usuario');
        $this->db->join("cliente", "cliente.Usuario_idUsuario = Usuario.idUsuario",'left');
        $this->db->where('correo', $userName);
        $this->db->where('status', $statu);

        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            $datos = $query->row_array();
            $passDecrypt = $this->encryption->decrypt($datos['password']);
            if ($passDecrypt == $password) {
                return $query->row();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function traerdatoStatus($idU)
    {
        return $this->db->get_where("usuario", ['idUsuario' => $idU])->row();
    }

    function getDatos()
    {
        return $this->db->query("SELECT usuario.*,cliente.Usuario_idUsuario,empleado.Cliente_idCliente,empleado.Paquete_idPaquete FROM `usuario` LEFT join cliente on cliente.Usuario_idUsuario=usuario.idUsuario left join empleado on empleado.Cliente_idCliente=cliente.idCliente LEFT JOIN paquete on paquete.idPaquete=empleado.Paquete_idPaquete ORDER BY usuario.idUsuario ASC ")->result_array();
    }
    function validarCorreo($buscarCorreo){
        $this->db->select('correo')
        ->from('usuario')
        ->where('correo',$buscarCorreo);
        return $this->db->get()->row_array();
    }
    function insertaDatos($data)
    {
        $this->db->insert('usuario', $data);
        return $this->db->insert_id();
    }

    function borrarPaquete($idU)
	{
		$this->db->where("idUsuario",$idU);
        $this->db->delete("usuario");
    }
    function getUsuarioByEmail($email)
	{
		return $this->db->select("usuario.idUsuario, usuario.correo, usuario.tipo, usuario.fotoUsuario,usuario.status")->from("usuario")->where("usuario.correo", $email)->get()->row_array();
    }
    function update($idUsuario, $data)
	{
		$this->db->where("idUsuario", $idUsuario);
		$this->db->update("usuario", $data);
    }
    function getfoto($idUsuario){
        $this->db->select('fotoUsuario')
        ->from('usuario')
        ->where('idUsuario',$idUsuario);
        return $this->db->get()->row_array();
    }
}
