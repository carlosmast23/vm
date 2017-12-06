<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archivos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /* archivos */

    public function ver_archivos_mdl($arc_ref_id, $w_archivos = '', $ver = '') {
        $usu_log = $this->session->userdata('log_usu_id');
        $html = "";
        if ($arc_ref_id != '') {
            $sql = "SELECT * FROM `archivos` WHERE `ref_id` = '$arc_ref_id'";
        } else {
            if ($w_archivos != '')
                $sql = "SELECT * FROM `archivos` WHERE `id` IN ($w_archivos)";
            else {
                $sql = "SELECT * FROM `archivos` WHERE 0"; /* 0 para que no salga el listado de archivos sin padre */
            }
        }
        $hoy = hoy('c');
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                if ($fila->arc_publico == 's')
                    $fila->arc_publico = "Si";
                else
                    $fila->arc_publico = "No";
                $fila->ver = false;
                $html.= $this->parser->parse('archivos/lista_archivos_tpl', $fila, TRUE);
            }
        }
        return $html;
    }

    public function almacenar_archivo_mdl($ref_id) {
        $this->load->library('upload');
        $carpeta = "./uploads/";//$this->config->item('archivos');
        $config['upload_path'] = $carpeta;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['remove_spaces'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            $datos = array('error' => $this->upload->display_errors());
            $this->load->view('archivos/erroralsubir', $datos);
        } else {
            $arr = $this->upload->data();
            $file_name = $arr["file_name"];
            $file_path = $arr["file_path"];
            $full_path = $arr["full_path"];
            $arreglo = array(
                "ref_id" => $ref_id,
                "arc_nombre" => $file_name,
                "arc_fecha" => hoy('c'),
                );
            $this->db->insert('archivos', $arreglo);
            $id = $this->db->insert_id();
            rename($full_path, $file_path . "$id");
            return $id;
        }
    }


    public function almacenar_anuncio_mdl() {
        $this->load->library('upload');
        $ref_id = $this->input->post('ref_id');
        $carpeta = "./uploads/";//$this->config->item('archivos');
        $config['upload_path'] = $carpeta;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['remove_spaces'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            $datos = array('error' => $this->upload->display_errors());
            $this->load->view('archivos/erroralsubir', $datos);
        } else {
            $arr = $this->upload->data();
            $file_name = $arr["file_name"];
            $file_path = $arr["file_path"];
            $full_path = $arr["full_path"];
            $arreglo = array(
                "ref_id" => $ref_id,
                "arc_nombre" => $file_name,
                "arc_fecha" => hoy('c'),
                "arc_deque" =>"a"
                );
            $this->db->insert('archivos', $arreglo);
            $id = $this->db->insert_id();
            rename($full_path, $file_path . "$id");
            return $id;
        }
    }

    public function descargar_mdl() {
        $id = $this->uri->segment(3);
        $carpeta = "./uploads/";//$this->config->item('archivos');
        $this->load->helper('download');
        $archivo = datoDeTablaCampo("archivos", "arc_id","arc_nombre", $id);
        if ($archivo != false) {
            $datos = file_get_contents("$carpeta/$id"); // Leer el contenido del archivo
            if ($datos == FALSE)
                force_download("lastima.txt", "Archivo eliminado, no existe :( la unica pista que tenemos es que el id era $id ");
            else
                force_download(trim($archivo), $datos);
        } else
        force_download("lastima.txt", "Archivo eliminado, no existe :( la unica pista que tenemos es que el id era $id ");
    }

    public function eliminar_archivo_mdl($id) {
        $this->db->where('arc_id', $id);
        $this->db->delete('archivos');
        $carpeta = "./uploads/";
        $carpeta_recycled = "./recycled/";
        if (file_exists("./$carpeta/$id"))
            rename("./$carpeta/$id", "./$carpeta_recycled/$id");
    }

    public function numero_archivos_mdl($ref_id) {
        $this->db->where('ref_id', $ref_id);
        $query = $this->db->get('archivos');
        if ($query->num_rows() > 0)
            return $query->num_rows();
        else
            return 0;
    }

    public function datos_mdl() {
        $id = $this->uri->segment(3);
        $this->db->where("arc_id", $id);
        $query = $this->db->get("archivos");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }
    
    public function actualizar_mdl() {
        $id = $this->input->post("id");
        $arr = array(
            "arc_publico" => $this->input->post("arc_publico"),
            );
        $this->db->where("arc_id", $id);
        $this->db->update("archivos", $arr);
        return true;
    }


    public function ver_anuncios(){
        $html="";
        $query= $this->db->query("SELECT * FROM `archivos` WHERE `arc_publico`='s' AND `ref_id`='0' ");
        $i=0;
        $arr=array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {

                if(file_exists("./uploads/".$fila->arc_id))
                    $arr[]= $fila->arc_id;

            }
        }

        shuffle($arr);
        foreach ($arr as $data => $value) {
            if($i==1)
                $dato['activo']="active";
            else
                $dato['activo']="";

            $dato['arc_id'] = $value;
            $html.= $this->parser->parse('archivos/anuncios_tpl', $dato, TRUE);
            $i++;

        }

        return $html;


    }


}
