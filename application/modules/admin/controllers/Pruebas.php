<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pruebas extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //$data=$this->model->index_mdl();
        $this->loadTemplates("pruebas/index");
    }
    public function lproveedores(){
        $this->load->model("proveedores_model");
        $data=$this->proveedores_model->lista_mdl("i");
        $this->loadTemplates("pruebas/lista",$data);
    }

    public function lproveedores2(){
        $this->load->model("proveedores_model");
        $data=$this->proveedores_model->lista_mdl("a");
        $this->loadTemplates("pruebas/lista",$data);
    }

    public function activar(){
        $id=$this->uri->segment(4);
        $this->load->model("proveedores_model");
        $this->proveedores_model->activar_mdl($id,"a");
        redirect("admin/pruebas","refresh");
    }   

    public function desactivar(){
        $id=$this->uri->segment(4);
        $this->load->model("proveedores_model");
        $this->proveedores_model->activar_mdl($id,"i");
        redirect("admin/pruebas","refresh");
    }

}
