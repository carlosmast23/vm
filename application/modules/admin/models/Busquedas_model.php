
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Busquedas_model extends CI_Model {


	public function __construct() {
		parent::__construct();
	}


	public function pendientes_mdl(){
		$this->load->model("actividades_model");
		$html="";
		$w_buscar = $this->input->post('buscar');

		$sql = "SELECT * FROM `busquedas` WHERE `bus_estado`='p' ORDER BY `bus_fechafin` ASC";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			$html = "";
			foreach ($query->result() as $fila) {
				if(hoy('c') > $fila->bus_fechafin)
				$fila->color="#fc7b5f";
			else
				$fila->color="none";
				$html.= $this->parser->parse('admin/busquedas/pendientes_tpl', $fila, true);
			}
		} else {
			$html.="<tr><td colspan='6'>No hay pendientes (<strong>$w_buscar</strong>)</td></tr>";
		}
		$arreglo["html"] = $html;
		//$arreglo["cmb_actividades"]="hola";
		return $arreglo;
	}

	public function asignar_mdl(){
		$bus_id=$this->input->post("bus_id");
		$act_id=$this->input->post("act_id");
		$tiempo=$this->input->post("tiempo");
		if($tiempo!="")
			$arr=array(
				"bus_estado"=>"r",
				//"act_id"=>$act_id,
				"bus_tiempo"=>$tiempo,
				);
		else
			$arr=array(
				"bus_estado"=>"r",
				//"act_id"=>$act_id,
				);

		$this->db->where("bus_id",$bus_id);
		$this->db->update("busquedas",$arr);
	}


	//la actividad es la categoria en la BBDDD
	public function rel_prv_actividades_mdl($bus_id) {
		$html = "<select name='rel_prv_act[]' id='rel_multiple' multiple='multiple' class='searchable'>";
		$query = $this->db->get('actividad_empresa');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $fila) {
				$act_id = $fila->act_id;
				$this->db->where("act_id", $act_id);
				$this->db->where('bus_id', $bus_id);
				$query1 = $this->db->get('rel_bus_act');
				if ($query1->num_rows() > 0)
					$fila->selected = "selected";
				else
					$fila->selected = "";
				$html .= $this->parser->parse('busquedas/cmb_bus_act', $fila, TRUE);
			}
		}
		return $html . "</select>";
	}

	public function alm_rel_prv_actividades_mdl() {
		$rel_prv_act = $this->input->post('rel_prv_act');
		$bus_id = $this->input->post('bus_id');
		$this->db->where('bus_id', $bus_id);
		$this->db->delete('rel_bus_act');
		if ($rel_prv_act != "") {
			foreach ($rel_prv_act as $act_id) {
				$arr = array("act_id" => $act_id, "bus_id" => $bus_id);
				$this->db->insert('rel_bus_act', $arr);
			}
		}
	}


	public function datos_mdl($id) {
		$this->db->where("bus_id", $id);
		$query = $this->db->get("busquedas");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
	}


public function eliminar_mdl(){
	$id=$this->uri->segment(4);
	$this->db->where("bus_id",$id);
	$this->db->delete("busquedas");
}





}
