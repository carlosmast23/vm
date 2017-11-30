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
        $sql = "SELECT * FROM `proveedores` WHERE `prv_estado`='i' AND `contacto`='v'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $html = "";
            foreach ($query->result() as $fila) {
                $url_cli= $this->google->codificar_parametro("general/modificar_proveedor/",$fila->prv_id);

                if($fila->prv_telefono!=""){
                    $data3= array(
                        "bus_id"=>0,
                        'ser_id' => 1, 
                        "usu_id"=>$fila->prv_id,
                        "tel_destinatario"=>$fila->prv_telefono,
                        "mensaje"=>"Virtual Mal, le informa que debe actualizar sus datos para mantener activa su cuenta. Enlace ".$url_cli,
                        "fecha"=>hoy('c'),
                        "deque"=>"pm",
                        );
                    $this->db->insert("envio_sms",$data3);

                    echo "<pre>";
                    var_dump($data3);
                    echo "<hr>";
                }
                if($fila->prv_email!=""){
                    $data3e= array(
                        "bus_id"=>0,
                        'ser_id' => 1, 
                        "usu_id"=>$fila->prv_id,
                        "asunto"=>"Cuenta Virtual Mall",
                        "email_destinatario"=>$fila->prv_email,
                        "mensaje"=>"Actualiza tus datos y manten activa tu cuenta Virtual Mall. Gracias por formar parte de nuestra cadena de clientes, proveedores y negocios locales. Enlace ".$url_cli,
                        "fecha"=>hoy('c'),
                        "deque"=>"pm",
                        );
                    $this->db->insert("envio_email",$data3e);

                    echo "<pre>";
                    var_dump($data3e);
                }

            }
        }
    }


    public function lista_proveedores_codesoft(){
        echo "<h2>CLIENTES CODESOFT</h2>";
        $sql = "SELECT * FROM `proveedores` WHERE `prv_estado`='i' AND `contacto`='c'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $html = "";
            foreach ($query->result() as $fila) {
                $url_cli= base_url()."general/registro";

                if($fila->prv_telefono!=""){
                    $data3= array(
                        "bus_id"=>0,
                        'ser_id' => 1, 
                        "usu_id"=>$fila->prv_id,
                        "tel_destinatario"=>$fila->prv_telefono,
                        "mensaje"=>"Virtual Mall te invita a formar parte de una cadena de clientes, proveedores y negocios locales en Quito. Registrate aqui".$url_cli,
                        "fecha"=>hoy('c'),
                        "deque"=>"pm",
                        );
                    $this->db->insert("envio_sms",$data3);

                    echo "<pre>";
                    var_dump($data3);
                    echo "<hr>";
                }
                if($fila->prv_email!=""){
                    $data3e= array(
                        "bus_id"=>0,
                        'ser_id' => 1, 
                        "usu_id"=>$fila->prv_id,
                        "asunto"=>"Invitación Virtual Mall",
                        "email_destinatario"=>$fila->prv_email,
                        "mensaje"=>"Virtual Mall te invita a formar parte de una cadena de clientes, proveedores y negocios locales en Quito. Registrate aqui".$url_cli,
                        "fecha"=>hoy('c'),
                        "deque"=>"pm",
                        );
                    $this->db->insert("envio_email",$data3e);

                    echo "<pre>";
                    var_dump($data3e);
                }

            }
        }
    }


}
