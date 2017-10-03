<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proveedores extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("proveedores_model", "model");
    }

    

}
