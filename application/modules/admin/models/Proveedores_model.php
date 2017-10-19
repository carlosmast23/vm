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


}
