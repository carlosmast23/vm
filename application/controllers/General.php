<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class General extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model("general_model", "model");
  }

  public function index() {
    $this->load->model("admin/actividades_model");
    $data['cmb_actividades']=$this->actividades_model->cmb_actividades();
    $data['numprov']=$this->model->nproveedores_mdl()*10;
    $data['transacciones']=$this->model->transacciones_mdl();
    $visitas=$this->model->contador_mdl();
    $this->session->set_userdata(array('visitas'=>$visitas));
    $this->loadTemplates("principal/index",$data);
  }

  public function cliente(){
    $this->loadTemplates("principal/registrar_cliente");
  }

  public function registro(){
    $this->load->model("admin/actividades_model");
    $data['cmb_actividades']=$this->actividades_model->cmb_actividades();
    $this->loadTemplates("principal/registrar_proveedor",$data);
  }

  public function registrar_cliente(){
    $this->model->registrar_cliente_mdl();
  }

  public function registrar_proveedor(){
    $this->model->registrar_proveedor_mdl();
    redirect("general/success","refresh");
  }

  public function modificar_proveedor(){
   $this->load->library('encrypt');

    $enc_username=$this->uri->segment(3);
    $dec_username=str_replace(array('-', '_', '~'), array('+', '/', '='), $enc_username);
    $dec_username=$this->encrypt->decode($dec_username);

    $this->load->model("admin/actividades_model");
    $data=$this->model->datos_proveedor_mdl($dec_username);
    $data['cmb_actividades']=$this->actividades_model->cmb_actividades($data['act_id']);
    $data['prv_telefono']=format_celular($data['prv_telefono'],"i");
    $this->loadTemplates("principal/actualizar_proveedor",$data);
  }

  public function actualizar_prov(){
    $this->model->actualizar_proveedor_mdl();
    redirect("general/success","refresh");
  }

  public function success(){
    $this->loadTemplates("principal/success");
  }

  public function errorprov(){
    $this->loadTemplates("principal/errorprov");
  }

//enlaces externos
  public function conocenos(){
    $this->loadTemplates("principal/conocenos");
  }


  public function servicios(){
    $this->loadTemplates("principal/servicios");
  }

  public function politica(){
    $this->loadTemplates("principal/politica");
  }

  public function publicidad(){
    $tipo=$this->uri->segment(3);
    if($tipo=="c")
      $data["columnas"]="col-xs-8 col-xs-offset-2";
    else if($tipo=="b")
      $data["columnas"]="col-xs-12";
    $data["tipo"]=$tipo;
    $this->load->view("principal/publicidad",$data);
  }





}
