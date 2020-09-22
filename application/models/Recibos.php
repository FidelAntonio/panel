<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Recibos extends CI_Model{

function getRecibos($idEmpleado){
    $this->db->select("ProdRecibos.*,empleado.rfc");
    $this->db->from('ProdRecibos');
    $this->db->join('empleado','ProdRecibos.idEmpleado=empleado.idEmpleado');
    if ($idEmpleado){
    $this->db->where ('ProdRecibos.idEmpleado',$idEmpleado);
}
    return $this->db->get()->result_array();
}

function obtenerRecibo($idRecibo){
    return $this->db->get_where('ProdRecibos',['idProdRecibo' => $idRecibo])->row_array();
}

function insertRecibo($data){
    $this->db->insert('ProdRecibos',$data);
    return $this->db->insert_id();
}
function updateRecibo($idRecibo,$data){
    $this->db->where('ProdRecibo.idProdRecibo',$idRecibo);
    $this->db->update('ProdRecibo',$data);
}
function deleteRecibo($idRecibo)
{
    $this->db->where("idProdRecibo",$idRecibo);
    $this->db->delete("ProdRecibo");
}

function obtenerEmpleado($rfc){
    $this->db->select("empleado.idEmpleado");
    $this->db->from('empleado');
    $this->db->where ('empleado.rfc',$rfc);
    return $this->db->get()->row_array();
}

}
