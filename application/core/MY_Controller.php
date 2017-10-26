<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

    public function loadTemplates($view, $data = array()) {
        $this->load->view("principal/header");
        $this->load->view($view, $data);
       $this->load->view("principal/footer");
    }

    public function loadTemplateClear($view, $data = array()) {
        $this->load->view("principal/header-simple");
        $this->load->view($view, $data);
       $this->load->view("principal/footer-simple");
    }

}
