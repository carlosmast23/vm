<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Email extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model("email_model","model");
  }

  public function index() {
    //$this->model->enviar_mail();
    $this->model->enviar_mail2();
  }






}
