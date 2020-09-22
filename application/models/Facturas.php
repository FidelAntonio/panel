<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Facturas extends CI_Model{

function getFacturas($idDatosFacturacion){
    $this->db->select("ProdFacturas.*,datosFacturacion.razonSocial");
    $this->db->from('ProdFacturas');
    $this->db->join('datosFacturacion','ProdFacturas.idDatosFacturacion=datosfacturacion.idDatosFacturacion');
  
    $this->db->where ('ProdFacturas.idDatosFacturacion',$idDatosFacturacion);

    return $this->db->get()->result_array();
}

function obtenerFactura($idFactura){
    return $this->db->get_where('ProdFacturas',['idProdFactura' => $idFactura])->row_array();
}

function insertFactura($data){
    $this->db->insert('ProdFacturas',$data);
    return $this->db->insert_id();
}
function updateFactura($idFactura,$data){
    $this->db->where('ProdFacturas.idProdFactura',$idFactura);
    $this->db->update('ProdFacturas',$data);
}
function deletefactura($idFactura){
    $this->db->where("idProdFactura",$idFactura);
    $this->db->delete("ProdFacturas");
}
function getDtosFiscales($idCL)
{
    $this->db->select("datosfacturacion.*,estados.id_Estado");
    $this->db->from("datosfacturacion");
    $this->db->join("municipios","municipios.idMunicipio=datosfacturacion.municipio");
    $this->db->join("estados","estados.id_Estado=municipios.estado");
    $this->db->where("datosfacturacion.Cliente_idCliente", $idCL);
    return $this->db->get()->result_array();
}

function obtenerDatoFiscal($rfc){
    $this->db->select("datosfacturacion.idDatosFacturacion");
    $this->db->from('datosfacturacion');
    $this->db->where ('datosfacturacion.rfc',$rfc);
    return $this->db->get()->row_array();
}

}
