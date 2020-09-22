<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tablero extends CI_Controller
{

	public function index()
	{
        $this->load->library('session');
        $idSesion=$this->session->userdata('iduser');
        if(!empty($idSesion))
        {
            $this->load->model("Permisos");
            $this->load->model("TableroModel");
            $this->load->model('clientes');
            $this->load->model('usuarios');
            //$totales['totalContratos']=$this->TableroModel->getTotalContratosPorVencer();
            //$totales['totalFianzas']=$this->TableroModel->getTotalFianzasPorVencer();
			//$totales['numNotificaciones']=$this->TableroModel->getNumNotificaciones($idSesion);
			//$tipoUser=$this->TableroModel->getTipoUser($idSesion);
			//$areaUser=$this->TableroModel->getAreaUser($idSesion);
			//$totales['tipoUsuario']=$tipoUser['idTipo'];
			//$totales['areaUsuario']=$areaUser['idArea'];
			//$totales['idUsuarioSesion']=$idSesion;
			$fotoUsuario=$this->usuarios->getfoto($idSesion);
			//$totales['fotoUsuario'] =  $totales['fotoUsuario']['fotoUser'];
            $data['permisos']=$this->Permisos->getPermisosUsuario($this->session->userdata('iduser'));
            if($this->session->userdata('tipo')==2){
            
            $data['idClient']=$this->clientes->getClienteByIdUsuario($this->session->userdata('iduser'));
            }
            //$totales= $this->security->xss_clean($totales);
            $this->load->view('header',$fotoUsuario);
            //$data = $this->security->xss_clean($data);
            $this->load->view('sidebar',$data);
            $this->load->view('tableroPrincipal');
            $this->load->view('footer');

        }
        else
            redirect(base_url(''));


    }
}
