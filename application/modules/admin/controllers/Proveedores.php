<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Proveedores extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("proveedores_model", "model");
	}
//
	public function solicitar_actualizacion(){
		$this->model->lista_proveedores();
		$this->model->lista_proveedores_codesoft();
		
	}

	public function sol_act_prov(){
		$this->model->sol_act_prov();
		redirect("general/success_act","refresh");
	}

}
