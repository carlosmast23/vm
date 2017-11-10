<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Propuestas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
    }


    public function registrar_propuesta_mdl(){
        $data=array(
            "prv_id"=>$this->input->post("prv_id",true),
            "bus_id"=>$this->input->post("bus_id",true),
            "pro_desc"=>$this->input->post("pro_desc",true),
            "pro_cantidad"=>$this->input->post("pro_cantidad",true),
            "pro_precio"=>$this->input->post("pro_precio",true),
            "pro_tipo"=>$this->input->post("pro_tipo",true),
            "pro_entrega"=>$this->input->post("pro_entrega",true),
            "pro_obs"=>$this->input->post("pro_obs",true),
            "pro_fecha"=>hoy('c')
            );
        $this->db->insert("propuestas",$data); 

        $id = $this->db->insert_id();
        $this->load->model('archivos_model');
        $this->archivos_model->almacenar_archivo_mdl($id);
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
                $fila->imagen=datoDeTablaCampo("archivos","ref_id", "arc_id", $fila->pro_id);
                $html.= $this->parser->parse('propuestas/propuestas_tpl', $fila, true);
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
        $this->db->where("pro_id", $pro_id);
        $this->db->update("propuestas", $data);

        $bus_celular=datoDeTablaCampo("busquedas","bus_id","bus_celular",$bus_id);
        $prv_celular=datoDeTablaCampo("proveedores","prv_id","prv_telefono",$prv_id);
        $prv_email=datoDeTablaCampo("proveedores","prv_id","prv_email",$prv_id);

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

            $data3e= array(
                "bus_id"=>$bus_id,
                'ser_id' => 1, 
                "usu_id"=>$prv_id,
                "asunto"=>"Contacto VirtuallMall",
                "email_destinatario"=>$prv_email,
                "mensaje"=>"Contacte pronto con $bus_celular, le interesa tu producto.",
                "fecha"=>hoy('c'),
                "deque"=>"cp",
                );
            $this->db->insert("envio_email",$data3e);

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


//LISTADO DE PREGUNTAS
    public function lista_preguntas($bus_id=0,$prv_id=0){
       $html="";
       $arr=array();
       $sql="SELECT * FROM `preguntas_pro` WHERE `bus_id` ='$bus_id' AND `prv_id`='$prv_id'";
       $query=$this->db->query($sql);
       if ($query->num_rows() > 0) {
        foreach ($query->result() as $fila) {
            $html.= $this->parser->parse('propuestas/preguntas_tpl', $fila, true);
        }
    } else {
        $html.="<tr><td colspan='2'>No existe preguntas registradas</td></tr>";
    }
    return $html;
}


public function registrar_pregunta_mdl(){
      //require_once('./nusoap.php');

    $bus_id=$this->input->post("bus_id");
    $prv_id=$this->input->post("prv_id");
    $pregunta=$this->input->post("prg_pregunta");

    $data=array(
        "bus_id"=>$bus_id,
        "prv_id"=>$prv_id,
        "prg_pregunta"=>$pregunta,
        );
    $this->db->insert("preguntas_pro",$data); 

    $id = $this->db->insert_id();
    $bus_celular=datoDeTablaCampo("busquedas","bus_id","bus_celular",$bus_id);
    //$prv_usuario=datoDeTablaCampo("busquedas","prv_id","prv_usuario",$prv_id);

    $this->load->model("GoogleURL_model","google");
    $url_cli= $this->google->codificar_parametro("propuestas/revisar_pregunta/",$id);

    if($bus_celular!=false){
        $data3= array(
            "bus_id"=>$bus_id,
            'ser_id' => 1, 
            "usu_id"=>0,
            "tel_destinatario"=>$bus_celular,
            "mensaje"=>"El proveedor genero una pregunta. Ver $url_cli",
            "fecha"=>hoy('c'),
            "deque"=>"cg",
            );
        $this->db->insert("envio_sms",$data3);
    }


}

public function ver_pregunta_mdl(){
    $enc_username=$this->uri->segment(3);
    $prg_id=str_replace(array('-', '_', '~'), array('+', '/', '='), $enc_username);
    $prg_id=$this->encrypt->decode($prg_id);

    $this->db->where("prg_id", $prg_id);
    $query = $this->db->get("preguntas_pro");
    if ($query->num_rows() > 0) {
        return $query->row_array();
    }
}

public function registrar_respuesta_mdl(){
  $this->load->model("GoogleURL_model","google");

  $prg_id=$this->input->post('prg_id');
  $arr=array(
    "prg_respuesta"=>$this->input->post('prg_respuesta')
    );
  $this->db->where("prg_id",$prg_id);
  $this->db->update("preguntas_pro",$arr);
  
  $prv_id=datoDeTablaCampo("preguntas_pro","prg_id","prv_id",$prg_id);
  $bus_id=datoDeTablaCampo("preguntas_pro","prg_id","bus_id",$prg_id);

  $prv_celular=datoDeTablaCampo("proveedores","prv_id","prv_telefono",$prv_id);
  $prv_email=datoDeTablaCampo("proveedores","prv_id","prv_email",$prv_id);


  $url= $this->google->codificar_parametro("propuestas/recibir/",$bus_id."&".$prv_id);

  $data=array(
    "bus_id"=>$bus_id,
    "ser_id"=>1,
    "usu_id"=>$prv_id,
    "email_destinatario"=>$prv_email,
    "asunto"=>"Pregunta Cliente Producto VirtuallMall",
    "mensaje"=>"Ha sido respondido su pregunta. Genere su propuesta ".$url,
    "fecha"=>hoy('c'),
    "deque"=>"p",
    );
  $this->db->insert("envio_email",$data);

  $data2= array(
    "bus_id"=>$bus_id,
    'ser_id' => 1, 
    "usu_id"=>$prv_id,
    "tel_destinatario"=>$prv_celular,
    "mensaje"=>"Ha sido respondido su pregunta. Genere su propuesta ".$url,
    "fecha"=>hoy('c'),
    "deque"=>"p",
    );
  $this->db->insert("envio_sms",$data2);

}

public function tiene_propuestas_mdl($bus_id=0,$prv_id=0){
    $sql="SELECT COUNT(`pro_id`) as numero FROM `propuestas` WHERE `bus_id`='$bus_id' AND `prv_id` ='$prv_id'";
    $query=$this->db->query($sql);
    return $query->row()->numero+0;
}

public function datos_mapa_mdl($bus_id){
    $txt="";
    $sql="SELECT * FROM `proveedores` WHERE `prv_estado`='a' AND `prv_id` IN (SELECT `prv_id` FROM `propuestas` WHERE `bus_id`='$bus_id')";
    $query=$this->db->query($sql);
    if($query->num_rows()>0){
        foreach ($query->result() as $fila) {
            $txt.="['".$fila->prv_usuario."',".$fila->prv_latitud.", ".$fila->prv_longitud."],";
        }
    }
    return $txt;
}


}
