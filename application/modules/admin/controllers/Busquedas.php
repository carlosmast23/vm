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

    /*public function asignar(){
    	$this->model->asignar_mdl();
    	redirect("admin/busquedas","refresh");
    }*/

    public function asignar_prov() {
        $this->load->model('admin/actividades_model');
        $id = $this->uri->segment(4);
        $data=$this->model->datos_mdl($id);
        $data['id'] = $id;
        $data['combo'] = $this->model->rel_prv_actividades_mdl($id);
        echo $this->loadTemplates('busquedas/rel_bus_act', $data,TRUE);
    }
    
    public function alm_rel_bus_act(){
        $this->model->asignar_mdl();
        $this->model->alm_rel_prv_actividades_mdl();
        redirect("admin/busquedas","refresh");
    }

    public function eliminar(){
        $this->model->eliminar_mdl();
        redirect("admin/busquedas","refresh");

    }



}
