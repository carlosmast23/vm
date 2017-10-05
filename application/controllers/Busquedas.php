<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Busquedas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("busquedas_model", "model");
    }

    public function index() {
       die("Busquedas");
   }


   public function buscar(){
    $this->model->buscar_mdl();
}

public function recibir_sms(){
    $numero=$this->input->get("numero",true);
    $mensaje=$this->input->get("mensaje",true);

    $m= "<br> numero :".$numero;
    $m.="<br> mensaje :".$mensaje;

    log_message("info",$m);

    $this->model->buscar_mdl($numero,$mensaje);
}





}
