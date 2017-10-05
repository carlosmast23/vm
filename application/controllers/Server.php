<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Server extends MY_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model("GoogleURL_model","google");
	}


	public function index(){
		$url="50";
		$enc_username=$this->encrypt->encode($url);
		echo "<hr>$enc_username";
		$enc_username=str_replace(array('+', '/', '='), array('-', '_', '~'), $enc_username);
		echo "<hr>";

		$ruta=base_url()."server/recibir/".$enc_username;
		
		echo "Codificado-". $this->google->encode($ruta);
		echo "<a href=' ".$this->google->encode($ruta)."'>Enlace</a>";

	}

	public function recibir(){
		$enc_username=$this->uri->segment(3);
		$dec_username=str_replace(array('-', '_', '~'), array('+', '/', '='), $enc_username);
		$dec_username=$this->encrypt->decode($dec_username);
		$datcod=explode("&", $dec_username);
		
		$bus_id= $datcod[0];
		$prv_id=$datcod[1];

		$this->load->model('general_model');
		$data=$this->general_model->datos_mdl($bus_id);
		switch ($data['bus_tiempo']) {
			case 'u':$data['bus_tiempo_txt']="Urgente (15 minutos)";break;
			case 'a':$data['bus_tiempo_txt']="Alta (1 hora)";break;
			case 'm':$data['bus_tiempo_txt']="Media (1 dia)";break;
			case 'd':$data['bus_tiempo_txt']="Moderada (1 semana)";break;
		}
		$data["prv_id"]=$prv_id;
		$this->loadTemplates("principal/reg_propuestas",$data);
	}

	public function acortar_url($url) {
    /*$usuario = "TU_USUARIO";
    $apikey = "TU_API_KEY";
    $temp = "http://api.bit.ly/v3/shorten?login=".$usuario."&apiKey=".$apikey."&uri=".$url."&format=txt";
    return file_get_contents($temp);*/

}


public function recibir_sms(){
	$numero=$this->input->get("numero",true);
	$mensaje=$this->input->get("mensaje",true);

	
}







}


