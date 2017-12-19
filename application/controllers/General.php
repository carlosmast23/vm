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
    $this->load->model("archivos_model");
    $data['cmb_actividades']=$this->actividades_model->cmb_actividades();
    $data['numprov']=$this->model->nproveedores_mdl();
    $data['transacciones']=$this->model->transacciones_mdl();
    $data['anuncios']=$this->archivos_model->ver_anuncios();
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

   if(datoDeTablaCampo("proveedores","prv_id","prv_latitud",$dec_username)==''){
    $this->load->model("admin/actividades_model");
    $data=$this->model->datos_proveedor_mdl($dec_username);
    $data['cmb_actividades']=$this->actividades_model->cmb_actividades($data['act_id']);
    $data['prv_telefono']=format_celular($data['prv_telefono'],"i");
    $this->loadTemplates("principal/actualizar_proveedor",$data);
  }else
  redirect("general/erroract","refresh");


}

public function actualizar_prov(){
  $this->model->actualizar_proveedor_mdl();
  redirect("general/success","refresh");
}

public function success(){
  $this->loadTemplates("principal/success");
}
public function success_act(){
  $this->loadTemplates("principal/success_act");
}

public function errorprov(){
  $this->loadTemplates("principal/errorprov");
}
public function erroract(){
  $this->loadTemplates("principal/erroract");
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
  $this->load->model("archivos_model");
  $data['anuncios']=$this->archivos_model->ver_anuncios();
  $this->load->view("principal/publicidad",$data);
}




}
