
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

		$sql = "SELECT * FROM `busquedas` WHERE `bus_estado`='p'";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			$html = "";
			foreach ($query->result() as $fila) {
				$fila->cmb_actividades=$this->actividades_model->cmb_actividades();
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
				"act_id"=>$act_id,
				"bus_tiempo"=>$tiempo,
				);
		else
			$arr=array(
				"bus_estado"=>"r",
				"act_id"=>$act_id,
				);

		$this->db->where("bus_id",$bus_id);
		$this->db->update("busquedas",$arr);
	}



}
