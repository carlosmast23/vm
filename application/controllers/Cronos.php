
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
//casa minuto - mensajes enviados a proveddores para generar proppuestas y el enlace que tienen que revisar los clientes estado=p
	public function procesar(){
		$this->model->procesar_sms_pendientes();
	}
//cada minuto, envio de mensaje a proveedores -estado=e
	public function procesar1(){
		$this->model->procesar_sms_prov();
	}

//cada 5 minutos - envio de mensaje a cliente, enlace para revisar propuestas estado=e
	public function procesar2(){
		$this->model->procesar_sms_cli();
	}
	//cada 10 minutos - envio de mensajes de acuerdo a intervalo de tiempo, obtuno o no resultados en el tiempo especificado
	public function procesar3(){
		$this->model->procesar_sms_clipendientes();	
	}

//cada 5 minutos - envio de emails a proveedores
	public function procesar_email(){
		$this->model->procesar_email_prov();
	}
//verificacion de funcionalidad de envio de email
	public function prueba(){
		$this->model->prueba();
	}

	public function recibir_alert(){
		$mensaje=$this->input->get("mensaje",TRUE);
		log_message("error","MENSAJE:".$mensaje);
	}

}
