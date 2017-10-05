<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
    }

    public function registrar_cliente_mdl(){
        $data=array(
            "cli_nombres"=>$this->input->post("cli_nombres"),
            "cli_apellidos"=>$this->input->post("cli_apellidos"),
            "cli_direccion"=>$this->input->post("cli_direccion"),
            "cli_telefono"=>$this->input->post("cli_telefono"),
            "cli_email"=>$this->input->post("cli_email"),
            "cli_fechan"=>$this->input->post("cli_fechan"),
            "cli_genero"=>$this->input->post("cli_genero"),
            );
        $this->db->insert("clientes",$data);
    }

    public function registrar_proveedor_mdl(){
     $ncel="+593".substr($this->input->post("prv_telefono"), 1);
     $email=$this->input->post("prv_email");

     if($this->existe_proveedor($ncel,$email)==0){
         $data=array(
            "prv_usuario"=>$this->input->post("prv_usuario"),
            "prv_telefono"=>$ncel,
            "prv_email"=>$email,
            "act_id"=>$this->input->post("act_id"),
            "prv_fecharegistro"=>hoy('c'),
            );
         $this->db->insert("proveedores",$data);


         require_once('./nusoap.php');
         $cliente = new nusoap_client(base_url()."server.php");
         $error = $cliente->getError();
         if ($error) 
          log_message('error', 'ERROR WEBSERVICE.'.$error);
      else
        $result = $cliente->call("enviarSMS",array($ncel,"Gracias por registrarte en Virtuall Mall, visita nuestra pagina y mantente informado de nuestra ofertas. ".base_url()));

}else{
    redirect("general/errorprov","refresh");
}

}

public function existe_proveedor($telefono,$email){
    $sql="SELECT count(`prv_id`) as total FROM `proveedores` WHERE `prv_telefono` LIKE '$telefono' OR `prv_email` LIKE '$email' ";
    $query=$this->db->query($sql);
    return $query->row()->total+0;
}

public function nproveedores_mdl(){
   $sql="SELECT COUNT(`prv_id`) as total FROM `proveedores`";
   $query=$this->db->query($sql);
   return $query->row()->total;   
}


}
