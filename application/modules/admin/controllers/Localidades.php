<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Localidades extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("localidades_model", "model");
    }

    public function index() {
        $data = $this->model->index_mdl();
        $this->loadTemplates("admin/localidades/index", $data);
    }

    public function crear() {
        $data['pid'] = $this->uri->segment(4);
        $this->loadTemplates("admin/localidades/crear", $data);
    }

    public function almacenar() {
        $pid = $this->input->post('pid');
        $this->model->almacenar_mdl();
        if ($pid != 0)
            redirect("admin/localidades/ver_localidad/$pid", 'refresh');
        else
            redirect("admin/localidades", "refresh");
    }

    public function modificar() {
        $data = $this->model->datos_mdl();
        $this->loadTemplates("admin/localidades/modificar", $data);
    }

    public function actualizar() {
        $pid = $this->input->post('pid');
        $this->model->actualizar_mdl();
        if ($pid != 0)
            redirect("admin/localidades/ver_localidad/$pid", 'refresh');
        else
            redirect("admin/localidades", "refresh");
    }

    public function eliminar() {
        $this->model->eliminar_mdl();
        redirect("admin/localidades", "refresh");
    }
    public function eliminar2() {
        echo $this->model->eliminar2_mdl();
    }

    public function mapa() {
        $this->load->view("admin/localidades/mapa");
    }

    public function ver_localidad() {
        $arb_id = $this->uri->segment(4);
        $data['id'] = $arb_id;
        if ($arb_id != 0 || $arb_id != '')
            $ruta = $this->model->ruta_localidad_mdl($arb_id);
        else
            $ruta = "<a href='" . base_url() . "admin/localidades/ver_localidad/0'>Principal</a>";

        $arb_id_sel = $this->input->post('id');
        $data['ruta'] = $ruta;
        $data['ultimo_nivel'] = $this->model->que_nivel($arb_id);
        $data['combo_arbol'] = $this->model->cmb_localidades_mdl($arb_id, $arb_id_sel);
        $this->loadTemplates("admin/localidades/ver_localidad", $data);
    }

}
