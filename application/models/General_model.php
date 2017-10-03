<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
    }

    public function buscar_mdl() {
     $buscar=$this->input->post("txt_buscar");
     $celular=$this->input->post("celular");
     $act_id=$this->input->post("act_id");
     $tiempo=$this->input->post("tiempo");

     $ncel="+593".substr($celular, 1);
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
 $data=array(
    "prv_usuario"=>$this->input->post("prv_usuario"),
    "prv_telefono"=>$ncel,
    "prv_email"=>$this->input->post("prv_email"),
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

}



public function datos_mdl($id) {
    $this->db->where("bus_id", $id);
    $query = $this->db->get("busquedas");
    if ($query->num_rows() > 0) {
        return $query->row_array();
    }
}


public function registrar_propuesta_mdl(){
    $data=array(
        "prv_id"=>$this->input->post("prv_id"),
        "bus_id"=>$this->input->post("bus_id"),
        "pro_desc"=>$this->input->post("pro_desc"),
        "pro_cantidad"=>$this->input->post("pro_cantidad"),
        "pro_precio"=>$this->input->post("pro_precio"),
        "pro_tipo"=>$this->input->post("pro_tipo"),
        "pro_entrega"=>$this->input->post("pro_entrega"),
        "pro_obs"=>$this->input->post("pro_obs"),
        "pro_fecha"=>hoy('c')
        );
    $this->db->insert("propuestas",$data); 
}

public function ver_propuestas_mdl(){
    $enc_username=$this->uri->segment(3);
    $bus_id=str_replace(array('-', '_', '~'), array('+', '/', '='), $enc_username);
    $bus_id=$this->encrypt->decode($bus_id);

    $html="";
    //$bus_id=$this->uri->segment(3);
    $arr=array();
    $sql="SELECT * FROM `propuestas` WHERE `bus_id` ='$bus_id' AND `pro_estado`='p'";
    $query=$this->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $fila) {

            $html.= $this->parser->parse('principal/propuestas_tpl', $fila, true);
        }
    } else {
        $html.="<tr><td colspan='5'>No se han registrado propuestas</td></tr>";
    }
    $arr['html']=$html;
    $arr['bus_id']=$bus_id;
    return $arr;
}


public function aprobar_mdl(){
    $bus_id=$this->input->post("bus_id");
    $pro_id=$this->input->post("pro_id");
    $prv_id=$this->input->post("prv_id");

    $data=array(
        "pro_estado"=>'a'
        );

    $this->db->where("pro_id", $id);
    $this->db->update("propuestas", $data);


    $bus_celular=datoDeTablaCampo("busquedas","bus_id","bus_celular",$bus_id);
    $prv_celular=datoDeTablaCampo("proveedores","prv_id","prv_telefono",$prv_id);

    if($bus_celular!=false){
        $data3= array(
            "bus_id"=>$bus_id,
            'ser_id' => 1, 
            "usu_id"=>$prv_id,
            "tel_destinatario"=>$prv_celular,
            "mensaje"=>"Contacte pronto con $bus_celular, le interesa tu producto.",
            "fecha"=>hoy('c'),
            "deque"=>"cp",
            );
        $this->db->insert("envio_sms",$data3);

    }
}


public function rechazar_mdl(){
    $pro_id=$this->input->post('pro_id');
    $arr=array(
        "pro_estado"=>'r'
        );
    $this->db->where("pro_id",$pro_id);
    $this->db->update("propuestas",$arr);
}

public function nproveedores_mdl(){
   $sql="SELECT COUNT(`prv_id`) as total FROM `proveedores`";
   $query=$this->db->query($sql);
   return $query->row()->total;   
}


}
