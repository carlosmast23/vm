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
        $data['numprov']=$this->model->nproveedores_mdl()*100;
        $this->loadTemplates("principal/index",$data);
    }

    public function alm_alto_ventana() {
        $h = $this->uri->segment(3);
        $arreglo = array(
            'ses_ven_alto' => $h
            );
        $this->session->set_userdata($arreglo);
    }

    public function buscar(){
        $this->model->buscar_mdl();
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

public function success(){
    $this->loadTemplates("principal/success");
}

public function registrar_propuesta(){
    $this->model->registrar_propuesta_mdl();
    redirect("general/successp","refresh");
}

public function successp(){
    $this->loadTemplates("principal/successp");
}

public function revisar(){
    $data=$this->model->ver_propuestas_mdl();
    $this->loadTemplates("principal/rev_propuestas",$data);
}

public function rechazar(){
    $this->model->rechazar_mdl();
}

public function aprobar(){
   $this->model->aprobar_mdl();
}


//enlaces externos
public function conocenos(){
    $this->loadTemplates("principal/conocenos");
}
public function servicios(){
    $this->loadTemplates("principal/servicios");
}


public function recibir(){
    $this->load->library('encrypt');

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


}
