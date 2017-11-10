<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores_model extends CI_Model {


    public function __construct() {
        parent::__construct();
    }


    public function index_mdl(){
        $html="";
        $w_buscar = $this->input->post('buscar');

        $sql = "SELECT * FROM `actividad_empresa` WHERE 1";


        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $html = "";
            foreach ($query->result() as $fila) {
                $html.= $this->parser->parse('admin/actividad/index_tpl', $fila, true);
            }
        } else {
            $html.="<tr><td colspan='6'>No hay actividades o sectores (<strong>$w_buscar</strong>)</td></tr>";
        }
        $arreglo["html"] = $html;
        return $arreglo;
    }



    public function lista_mdl($estado=''){
        $html="";

        $sql = "SELECT * FROM `proveedores` WHERE `prv_estado`='$estado' ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $html = "";
            foreach ($query->result() as $fila) {
                if($estado=='i')
                    $html.= $this->parser->parse('admin/pruebas/lista_tpl', $fila, true);
                else
                    $html.= $this->parser->parse('admin/pruebas/lista2_tpl', $fila, true);
            }
        } else {
            $html.="<tr><td colspan='3'>No hay información </td></tr>";
        }
        $arreglo["html"] = $html;
        return $arreglo;
    }


    public function activar_mdl($id,$estado){
        $arr=array('prv_estado' =>  $estado);
        $this->db->where("prv_id",$id);
        $this->db->update("proveedores",$arr);
    }


    public function lista_proveedores(){
        $this->load->model("GoogleURL_model","google");
        $sql = "SELECT * FROM `proveedores` WHERE `prv_estado`='a'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $html = "";
            foreach ($query->result() as $fila) {
                $url_cli= $this->google->codificar_parametro("general/modificar_proveedor/",$fila->prv_id);

                $data3= array(
                    "bus_id"=>0,
                    'ser_id' => 1, 
                    "usu_id"=>$fila->prv_id,
                    "tel_destinatario"=>$fila->prv_telefono,
                    "mensaje"=>"Actualiza tus datos y manten activa tu cuenta en Virtual Mall.Enlace ".$url_cli,
                    "fecha"=>hoy('c'),
                    "deque"=>"pm",
                    );
                $this->db->insert("envio_sms",$data3);

                $data3e= array(
                    "bus_id"=>0,
                    'ser_id' => 1, 
                    "usu_id"=>$fila->prv_id,
                    "asunto"=>"Cuenta Virtual Mall",
                    "email_destinatario"=>$fila->prv_email,
                    "mensaje"=>"Actualiza tus datos y manten activa tu cuenta.Enlace ".$url_cli,
                    "fecha"=>hoy('c'),
                    "deque"=>"pm",
                    );
                $this->db->insert("envio_email",$data3e);


            }
        }
    }


}
