<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tablero extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model("Permisos");
        $idUsuario = $this->session->userdata('iduser');

        // if(empty($idUsuario))

    }
    function asignarPermisos($idNuevoUsuario,$idTipoUsuario){
        $this->Permisos->creaPermiso($idNuevoUsuario,$idTipoUsuario);
    }
    function obtenerPermisos(){
        $idUsuario=$this->session->userdata('iduser');
        $this->Permisos->getPermisosUsuario($idUsuario);
    }
}