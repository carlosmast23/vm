<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Validaciones extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model("general_model", "model");
  }


  public function prov(){
    $id=$this->uri->segment(3); //id
    $tipo=$this->uri->segment(4); //campo
    $deque=$this->uri->segment(5); //registrar o actualizar
    if($tipo=="e")
      $campo="prv_email";
    else if($tipo=='t'){
      $campo="prv_telefono";
    }
   echo $this->model->buscar_dato($id,$campo,$deque);

  }






}
