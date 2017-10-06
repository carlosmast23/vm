<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Busquedas_model extends CI_Model {


  public function __construct() {
    parent::__construct();
  }


  public function buscar_mdl($txt_celular="",$tx_buscar="") {

    if(strlen($txt_celular) >0 && strlen($tx_buscar) > 0){
      $ncel=$txt_celular;
      $buscar=$tx_buscar;
      $tiempo="n";
    }else{
     $celular=$this->input->post("celular");
     $buscar=$this->input->post("txt_buscar");
     $tiempo=$this->input->post("tiempo");
     $ncel="+593".substr($celular, 1);
   }

   $hoy=hoy('c');
   $data=array(
    "act_id"=>0,
    "bus_celular"=>$ncel,
    "bus_texto"=>$buscar,
    "bus_fecha"=>$hoy,
    "bus_fechafin"=>diamas($hoy,$tiempo),
    "bus_tiempo"=>$tiempo,
    );
   $this->db->insert("busquedas",$data);

   require_once('./nusoap.php');
   $cliente = new nusoap_client(base_url()."server.php");
   $error = $cliente->getError();
   if ($error) 
    log_message('error', 'ERROR WEBSERVICE.'.$error);
  else
    $result = $cliente->call("enviarSMS",array("+593994725020","Busqueda registrada ".base_url()."admin/busquedas"));

}


public function datos_mdl($id) {
  $this->db->where("bus_id", $id);
  $query = $this->db->get("busquedas");
  if ($query->num_rows() > 0) {
    return $query->row_array();
  }
}



}