
<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cronos extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("cronos_model", "model");
	}

	public function procesar_sms() {
		$this->model->procesar_sms_prov();
		$this->model->procesar_sms_cli();
		$this->model->procesar_sms_clipendientes();	
	}


	public function procesar1(){
		$this->model->procesar_sms_prov();
	}

	public function procesar2(){
		$this->model->procesar_sms_cli();
	}
	public function procesar3(){
		$this->model->procesar_sms_clipendientes();	
	}

}
