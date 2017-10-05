<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades_model extends CI_Model {


    public function __construct() {
        parent::__construct();
    }


    public function index_mdl(){
        $html="";
        $w_buscar = $this->input->post('buscar');
     /*  $desde = $this->input->post('desde');
       if ($desde == "")
        $desde = 0;
    $paginado = $html = "";
    $cuantos = cuantosResultados();
    if (strlen($w_buscar) > 3) {
        $campos = "`usu_cedula`, `usu_nombres`, `usu_apellidos`, `usu_email`";
        $where = "WHERE MATCH ($campos) AGAINST ('$w_buscar' IN BOOLEAN MODE)";
        $order_by = "ORDER BY `puntos` DESC";
        $sql = "SELECT *, MATCH($campos) AGAINST ('$w_buscar') AS 'puntos' from `usuarios` $where  $order_by";
    } else*/
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

public function almacenar_mdl(){
    $data=array(
        "act_nombre"=>$this->input->post("act_nombre"),
        "act_descripcion"=>$this->input->post("act_descripcion"),
        );
    $this->db->insert("actividad_empresa",$data);
}

public function actualizar_mdl(){
    $act_id=$this->input->post('act_id');
    $data=array(
        "act_nombre"=>$this->input->post("act_nombre"),
        "act_descripcion"=>$this->input->post("act_descripcion"),
        );
    $this->db->where("act_id",$act_id);
    $this->db->update("actividad_empresa",$data);
}


public function eliminar_mdl(){
    $id=$this->uri->segment(4);
    $this->db->where("act_id",$act_id);
    $this->db->delete("actividad_empresa");
}

public function cmb_actividades($act_id=""){
    $html = "<select class='form-control chosen-select' name='act_id' id='act_id' rel='combo_act'><option value=''>Seleccione actividad comercial</option>";
    $sql = "SELECT * FROM `actividad_empresa`";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $data) {
            if ($act_id == $data->act_id)
                $select = "selected";
            else
                $select = "";
            $html.="<option value='$data->act_id' $select>" . $data->act_nombre . "</option>";
        }
    }
    return $html . "</select>";
}

}
