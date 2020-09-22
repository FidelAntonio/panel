<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Permisos extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $idUser=$this->session->userdata("iduser");
        $this->db->query("SET @idUsuarioCambio=".$this->db->escape($idUser));
    }

    function creaPermiso($idUsuario,$idTipoUsuario)
    {
        $modulos= $this->db->select('idModulo')->from('Modulos')
        ->where('tipoUsuario',$idTipoUsuario)->get()->result_array();
            foreach($modulos as $mods){
            $this->db->insert("usuarioModulo", array('idUsuario' => $idUsuario, 'idModulo' => $mods['idModulo']));
        }

    }
    function validacionExistencia($idUsuario, $idModulo)
    {
        $this->db->select("*");
        $this->db->from("usuarioModulo");
        $this->db->where("idUsuario", $idUsuario);
        $this->db->where("idModulo", $idModulo);
        $existencia=$this->db->get()->row_array();
        if(empty($existencia))
        {
            $this->db->insert("usuarioModulo", array('idUsuario' => $idUsuario, 'idModulo' => $idModulo));
        }

    }

    function actualizarPermiso($idUsuario, $idModulo, $data)
    {
        $this->db->where("idUsuario", $idUsuario);
        $this->db->where("idModulo", $idModulo);
        $this->db->update("usuarioModulo", $data);
    }

    function getPermisosUsuario($idUsuario)
    {
        $this->db->select("*");
        $this->db->from("usuarioModulo");
        $this->db->where("idUsuario", $idUsuario);
        return $this->db->get()->result_array();


    }
// Saca permisos de un usuario en un modulo
    function getPermisosUsuarioModulo($idUsuario, $idModulo){
        $this->db->select("*");
        $this->db->from("usuarioModulo");
        $this->db->where("idUsuario", $idUsuario);
        $this->db->where("idModulo", $idModulo);
        return $this->db->get()->row_array();

    }
    function getNombreTipoUsuario($idTipoUsuario)
    {
        $this->db->select("nombreTipo");
        $this->db->from("tipoUser");
        $this->db->where("idTipo", $idTipoUsuario);
        $array=$this->db->get()->row_array();
        return $array['nombreTipo'];
    }
    // function tienePermisosUsuarioModulo($idUsuario, $idModulo)
    // {

    //     $this->db->select("*");
    //     $this->db->from("usuarioModulo");
    //     $this->db->join("tipoUser", "Permiso.idTipoUsuario=tipoUser.idTipo");
    //     $this->db->join("Usuarios", "Usuarios.idTipo=tipoUser.idTipo");
    //     $this->db->where("(Permiso.mostrar = 1 OR Permiso.alta = 1 OR Permiso.eliminar = 1 OR Permiso.detalle = 1 OR Permiso.editar = 1)");
    //     $this->db->where("Permiso.idModulo", $idModulo);
    //     $this->db->where("Usuarios.idUser", $idUsuario);
    //     return $this->db->get()->num_rows();

    // }

}