<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
//
/**
 *
 */
class Crudpaquetes extends CI_Controller 
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("paquetes");
        $this->load->library('session');
        $idUsuario=$this->session->userdata("iduser");
        if (empty($idUsuario)){
            die($this->load->view("viewSesionCaducada", null, true));
        }
    }

    function index()
    {
        $data['Paquetes']=$this->paquetes->getPaquetes();
        print $string=$this->load->view('viewTodoPaquetes',$data, TRUE);
    }

    function altaPaquete()
    {
        $data['paquetes']=$this->paquetes->getPaquetes();
        print $string=$this->load->view('viewaltaPaquete', $data, true);
    }

    function newPaquetes()
    {


        $this->form_validation->set_rules('nombrePaquete', 'nombre del paquete', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('nombrecortoP', 'nombre corto del paquete', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('descripcion', 'descripción', 'trim|min_length[3]');
        $this->form_validation->set_rules('caracteristicas', 'características', 'trim|min_length[3]');
        $this->form_validation->set_rules('base', 'base', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('baseMes', 'base mes', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('costoGestion', 'costo gestión nómina', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('costoCobro', 'costo cobro tarjeta', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('cargaSocial', 'carga social', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('precioMes', 'precio servicio mes', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('iva', 'IVA','trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('totalFac', 'total facturado', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('deducciones', 'deducciones', 'trim|required|numeric');
        $this->form_validation->set_rules('netoR', 'neto a recibir', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('aforeM', 'afore mensual', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('aguinaldoA', 'aguinaldo anual', 'trim|required|numeric|greater_than_equal_to[0.01]');


        if ($this->form_validation->run() == FALSE) {
            http_response_code(500);
            echo (validation_errors());
            return;
        }

        $nombrePaquete =$this->input->post('nombrePaquete');
        $nombrecortoP =$this->input->post('nombrecortoP');
        $descripcion =$this->input->post('descripcion');
        $caracteristicas =$this->input->post('caracteristicas');
        $base =$this->input->post('base');
        $baseMes =$this->input->post('baseMes');
        $costoGestion =$this->input->post('costoGestion');
        $costoCobro =$this->input->post('costoCobro');
        $cargaSocial = $this->input->post('cargaSocial');
        $precioMes =$this->input->post('precioMes');
        $iva =$this->input->post('iva');
        $totalFac =$this->input->post('totalFac');
        $deducciones =$this->input->post('deducciones');
        $netoR =$this->input->post('netoR');
        $aforeM =$this->input->post('aforeM');
        $aguinaldoA =$this->input->post('aguinaldoA');



        $datos= array(
            'nombre'=>$nombrePaquete,
            'nombreCortopaquete'=>$nombrecortoP,
            'descripcion'=>$descripcion,
            'caracteristicas'=>$caracteristicas,
            'base'=>$base,
            'baseMes'=>$baseMes,
            'costoGestionNomina'=>$costoGestion,
            'costoCobroTarjeta'=>$costoCobro,
            'cargaSocial'=>$cargaSocial,
            'precioServMes'=>$precioMes,
            'iva'=>$iva,
            'totalFact'=>$totalFac,
            'deduccionesT'=>$deducciones,
            'netoRecibir'=>$netoR,
            'aforeMensual'=>$aforeM,
            'aguinaldoAnual'=>$aguinaldoA
        );

        $this->paquetes->insertarDatos($datos);
    }

    function detallePaquete($idPaquete)
    {
        $datos['idPaquete']=$idPaquete;
        print $string=$this->load->view('viewDetallePaquete',$datos, TRUE);
    }

    function obtenerDetallePaquete($idP)
    {
        print json_encode($this->paquetes->getDetallePaquete($idP));
    }

    function editarPaquete($idPaquete)
    {
        $datos['idPaquete']=$idPaquete;
        print $string=$this->load->view('viewEditarPaquete',$datos, TRUE);
    }

    function editaPaquete($idPa)
    {
        print json_encode($this->paquetes->getEditarPaquete($idPa));
    }

    function actualizarPaquete()
    {

        $this->form_validation->set_rules('paqueteId', 'id del paquete', 'trim|required|numeric');
        $this->form_validation->set_rules('nombrePaquete', 'nombre del paquete', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('nombrecortoP', 'nombre corto del paquete', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('descripcion', 'descripción', 'trim|min_length[3]');
        $this->form_validation->set_rules('caracteristicas', 'características', 'trim|min_length[3]');
        $this->form_validation->set_rules('base', 'base', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('baseMes', 'base mes', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('costoGestion', 'costo gestión nómina', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('costoCobro', 'costo cobro tarjeta', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('cargaSocial', 'Carga social', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('precioMes', 'precio servicio mes', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('iva', 'IVA','trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('totalFac', 'total facturado', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('deducciones', 'deducciones', 'trim|required|numeric');
        $this->form_validation->set_rules('netoR', 'neto a recibir', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('aforeM', 'afore mensual', 'trim|required|numeric|greater_than_equal_to[0.01]');
        $this->form_validation->set_rules('aguinaldoA', 'aguinaldo anual', 'trim|required|numeric|greater_than_equal_to[0.01]');


        if ($this->form_validation->run() == FALSE) {
            http_response_code(500);
            echo (validation_errors());
            return;
        }
        $idPaq =$this->input->post('paqueteId');
        $nombrePaquete =$this->input->post('nombrePaquete');
        $nombrecortoP =$this->input->post('nombrecortoP');
        $descripcion =$this->input->post('descripcion');
        $caracteristicas =$this->input->post('caracteristicas');
        $base =$this->input->post('base');
        $baseMes =$this->input->post('baseMes');
        $costoGestion =$this->input->post('costoGestion');
        $costoCobro =$this->input->post('costoCobro');
        $cargaSocial = $this->input->post('cargaSocial');
        $precioMes =$this->input->post('precioMes');
        $iva =$this->input->post('iva');
        $totalFac =$this->input->post('totalFac');
        $deducciones =$this->input->post('deducciones');
        $netoR =$this->input->post('netoR');
        $aforeM =$this->input->post('aforeM');
        $aguinaldoA =$this->input->post('aguinaldoA');

        $datos= array(
            'nombre'=>$nombrePaquete,
            'nombreCortopaquete'=>$nombrecortoP,
            'descripcion'=>$descripcion,
            'caracteristicas'=>$caracteristicas,
            'base'=>$base,
            'baseMes'=>$baseMes,
            'costoGestionNomina'=>$costoGestion,
            'costoCobroTarjeta'=>$costoCobro,
            'cargaSocial' => $cargaSocial,
            'precioServMes'=>$precioMes,
            'iva'=>$iva,
            'totalFact'=>$totalFac,
            'deduccionesT'=>$deducciones,
            'netoRecibir'=>$netoR,
            'aforeMensual'=>$aforeM,
            'aguinaldoAnual'=>$aguinaldoA
        );

        $this->paquetes->actualizarDatos($datos,$idPaq);
    }

    function eliminarPaquete($idPaquete)
    {
        $this->paquetes->borrarPaquete($idPaquete);
    }
}
?>