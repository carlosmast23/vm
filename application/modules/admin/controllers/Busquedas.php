<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Busquedas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("busquedas_model", "model");
    }

    public function index(){
    	$data=$this->model->pendientes_mdl();
    	$this->loadTemplates("admin/busquedas/pendientes",$data);
    }

    public function asignar(){
    	$this->model->asignar_mdl();
    	redirect("admin/busquedas","refresh");
    }

    

}
