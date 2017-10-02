<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        /*if ($this->session->userdata('tipo_usuario') == FALSE || $this->session->userdata('tipo_usuario') != 's') {
            redirect(base_url() . 'conexion/login');
        }*/
        $this->loadTemplates("admin/index");
    }

}
