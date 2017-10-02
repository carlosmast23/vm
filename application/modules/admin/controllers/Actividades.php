<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actividades extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("actividades_model", "model");
    }

    public function index() {
        $data=$this->model->index_mdl();
        $this->loadTemplates("actividad/index",$data);
    }


    public function crear(){
        $this->loadTemplates("actividad/crear");
    }
    public function modificar(){
        $this->loadTemplates("actividad/modificar");
    }

    public function almacenar(){
        $this->model->almacenar_mdl();
        redirect("admin/actividades","refresh");
    }
    public function actualizar(){
        $this->model->actualizar_mdl();
        redirect("admin/actividades","refresh");
    }

    public function eliminar(){
        $this->model->eliminar_mdl();
    }

}
