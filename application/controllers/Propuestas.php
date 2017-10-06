<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Propuestas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("propuestas_model", "model");
    }


public function registrar_propuesta(){
    $this->model->registrar_propuesta_mdl();
    redirect("propuestas/successp","refresh");
}

public function successp(){
    $this->loadTemplates("propuestas/successp");
}

public function revisar(){
    $data=$this->model->ver_propuestas_mdl();
    $this->loadTemplates("propuestas/rev_propuestas",$data);
}

public function rechazar(){
    $this->model->rechazar_mdl();
}

public function aprobar(){
   $this->model->aprobar_mdl();
}


public function recibir(){
    $this->load->library('encrypt');

    $enc_username=$this->uri->segment(3);
    $dec_username=str_replace(array('-', '_', '~'), array('+', '/', '='), $enc_username);
    $dec_username=$this->encrypt->decode($dec_username);
    $datcod=explode("&", $dec_username);

    $bus_id= $datcod[0];
    $prv_id=$datcod[1];

    $this->load->model('busquedas_model');
    $data=$this->busquedas_model->datos_mdl($bus_id);
    switch ($data['bus_tiempo']) {
        case 'u':$data['bus_tiempo_txt']="Urgente (15 minutos)";break;
        case 'a':$data['bus_tiempo_txt']="Alta (1 hora)";break;
        case 'm':$data['bus_tiempo_txt']="Media (1 dia)";break;
        case 'd':$data['bus_tiempo_txt']="Moderada (1 semana)";break;
    }
    $data["prv_id"]=$prv_id;
    $this->loadTemplates("propuestas/reg_propuestas",$data);
}


}