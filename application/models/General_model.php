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
     require_once('./nusoap.php');

     if($this->existe_proveedor($ncel,$email)==0){
         $data=array(
            "prv_usuario"=>$this->input->post("prv_usuario"),
            "prv_telefono"=>$ncel,
            "prv_email"=>$email,
            "act_id"=>$this->input->post("act_id"),
            "prv_fecharegistro"=>hoy('c'),
            );
         $this->db->insert("proveedores",$data);

         $cliente = new nusoap_client(base_url()."resources/vmserversms/web-service/server-sms.php");
         $error = $cliente->getError();
         if ($error){
            log_message('error', 'ERROR WEBSERVICE.');
        }
        $result = $cliente->call("enviarSMS",array($ncel,"Gracias por registrarte en Virtuall Mall, visita nuestra pagina y mantente informado de nuestra ofertas. ".base_url()));
        if(!$result)
            log_message('error', 'ERROR DE CONEXION CELULAR - PROVEEDOR.'.$error);

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

public function transacciones_mdl(){


    $html="";
    //$bus_id=$this->uri->segment(3);
    $arr=array();
    $sql="SELECT * FROM `envio_sms` WHERE  `estado`='e' ORDER BY `fecha` DESC LIMIT 0,8";
    $query=$this->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $fila) {
            $busqueda=datoDeTablaCampo("busquedas","bus_id","bus_texto",$fila->bus_id);

            if($fila->usu_id>0){
                $proveedor=datoDeTablaCampo("proveedores","prv_id","prv_usuario",$fila->usu_id);
                $fila->texto="El proveedor <b>'$proveedor'</b> ha generado una propuesta para <b>'$busqueda'</b>";
            }
            else{
                $fila->texto="Alguien esta buscando <b>$busqueda</b>";
            }
            $fila->fecha=fecha_texto($fila->fecha,'c');
            $html.= $this->parser->parse('principal/transacciones_tpl', $fila, true);
        }
    } else {
        $html.="<b>No hay transacciones</b>";
    }
    return $html;

}


}
