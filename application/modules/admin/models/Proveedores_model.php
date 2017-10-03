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



}
