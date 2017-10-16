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




}
