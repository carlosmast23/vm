<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('archivos_model', 'model');
    }

    public function vensubir() {
        $arc_ref_id = $this->uri->segment(4); // $this->input->post('arc_ref_id');
        $data['arc_ref_id'] = $arc_ref_id;
        $this->loadTemplates('archivos/subir', $data);
    }

    public function ver() {
        //$arc_ref_id = $this->input->post('arc_ref_id');
        $arc_ref_id = $this->uri->segment(4);
        $datos['arc_ref_id'] = $arc_ref_id;
        $datos["archivos"] = $this->model->ver_archivos_mdl($arc_ref_id, '', true);
        $this->loadTemplates('archivos/lista_archivos', $datos);
    }

    public function configurar() {
        $data = $this->model->datos_mdl();
        $this->loadTemplates("archivos/configurar", $data);
    }

    public function almacenar_archivo() {
        echo $this->model->almacenar_archivo_mdl();
    }

    public function descargar_archivo() {
        $this->model->descargar_mdl();
    }

    public function eliminar_archivo() {
        $id = $this->uri->segment(4);
        $this->model->eliminar_archivo_mdl($id);
    }

    public function actualizar() {
        $act_id = $this->input->post('act_id');
        $pro_id = datoDeTablaCampo("actividades", "act_id", "pro_id", $act_id);
        $this->model->actualizar_mdl();
        redirect("gestion/archivos/ver/$act_id/$pro_id", "refresh");
    }

}
