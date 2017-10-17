<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @extends CI_Model
 */
class Localidades_model extends CI_Model {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index_mdl() {
        $pid = $this->uri->segment(4);
        $w_buscar = $this->input->post('buscar');
        $desde = $this->input->post('desde');
        if ($desde == "")
            $desde = 0;
        $paginado = $html = $where_extra = "";
        //$cuantos = cuantosResultados();
        if (strlen($w_buscar) > 3) {
            $where_extra = "AND `loc_nombre` LIKE '%$w_buscar%'";
            $sql = "SELECT * FROM `localidades` WHERE 1 $where_extra";
        } else
            $sql = "SELECT * FROM `localidades` WHERE pid=0 $where_extra";
        //$paginado = paginador_multiple($sql, $cuantos, $desde);
        //$desde*=$cuantos;
        //$sql_limit = $sql . " limit $desde,$cuantos";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $html.= $this->parser->parse('admin/localidades/index_tpl', $data, true);
            }
        } else
            $html.="<tr><td colspan='3'>No hay localidades(<strong>$w_buscar</strong>)</td></tr>";

        $arr["html"] = $html;
        $arr["pid"] = $pid;
        $arr["w_buscar"] = $w_buscar;
        return $arr;
    }

    public function almacenar_mdl() {
        $arr = array(
            "loc_nombre" => $this->input->post("loc_nombre"),
            "loc_latitud" => $this->input->post("loc_latitud"),
            "loc_longitud" => $this->input->post("loc_longitud"),
            "pid" => $this->input->post("pid"),
        );
        $this->db->insert("localidades", $arr);
    }

    public function datos_mdl() {
        $id = $this->uri->segment(4);
        $this->db->where("loc_id", $id);
        $query = $this->db->get("localidades");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    public function actualizar_mdl() {
        $id = $this->input->post("loc_id");
        $arr = array(
            "loc_nombre" => $this->input->post("loc_nombre"),
            "loc_latitud" => $this->input->post("loc_latitud"),
            "loc_longitud" => $this->input->post("loc_longitud"),
        );
        $this->db->where("loc_id", $id);
        $this->db->update("localidades", $arr);
        return true;
    }

    public function eliminar_mdl() {
        $id = $this->uri->segment(4);
        if ($this->tiene_hijos($id) == false /*&& $this->tiene_relacion($id)==false*/) {
            $this->db->where("loc_id", $id);
            $this->db->delete("localidades");
        }
    }

    public function eliminar2_mdl() {
        $id = $this->uri->segment(4);
        if ($this->tiene_hijos($id) == false /*&& $this->tiene_relacion($id)==false*/) {
            $this->db->where("loc_id", $id);
            $this->db->delete("localidades");
            return true;
        } else
            return false;
    }

    public function tiene_hijos($pid) {
        $this->db->where("pid", $pid);
        $query = $this->db->get('localidades');
        if ($query->num_rows() > 0)
            return true;
        else
            return false;
    }
    public function tiene_relacion($pid) {
        $this->db->where("loc_id", $pid);
        $query = $this->db->get('horarios_actividades_localidades');
        if ($query->num_rows() > 0)
            return true;
        else
            return false;
    }

    public function cmb_localidades_mdl($pid, $id_pk) {
        $combo = "";
        $this->db->where("pid", $pid);
        $this->db->order_by("loc_nombre");
        $query = $this->db->get('localidades');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $id = $fila->loc_id;
                $pid = $fila->pid;
                if ($id_pk == $id)
                    $selected = " selected";
                else
                    $selected = "";
                $combo.= "<option value='$id' pid='$pid' $selected>" . $fila->loc_nombre . "</option>";
            }
        } else
            return $combo.="No existe información";

        $cmb = "<select name='loc_id' id='loc_id' class='chosen-select'>$combo</select>  <input type='button' id='op2' value='Ver' class='btn btn-info'/>
        <input type='button' id='mod' value='Modificar' class='btn btn-success'/>
        <input type='button' id='eli' value='Eliminar' class='btn btn-danger'/>";
        return $cmb;
    }

    public function combo_localidades_mdl($id_pk = '') {
        $combo = "";
        //$this->db->where("pid", $pid);
        $this->db->order_by("loc_nombre");
        $query = $this->db->get('localidades');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $id = $fila->loc_id;
                $pid = $fila->pid;
                if ($id_pk == $id)
                    $selected = " selected";
                else
                    $selected = "";
                $combo.= "<option value='$id' pid='$pid' $selected>" . $fila->loc_nombre . "</option>";
            }
        } else
            return $combo.="No existe información";

        $cmb = "<select name='loc_id' id='loc_id' class='chosen-select'>$combo</select>";
        return $cmb;
    }

    public function combo_localidades_rel_mdl($id_pk = '', $act_id = 0) {
        $combo = "";
        $sql = "SELECT * FROM localidades WHERE loc_id NOT IN(SELECT loc_id FROM `horarios_actividades_localidades` WHERE act_id='$act_id')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $id = $fila->loc_id;
                $pid = $fila->pid;
                if ($id_pk == $id)
                    $selected = " selected";
                else
                    $selected = "";
                $combo.= "<option value='$id' pid='$pid' $selected>" . $fila->loc_nombre . "</option>";
            }
        } else
            return $combo.="No existe información";

        $cmb = "<select name='loc_id' id='loc_id' class='chosen-select'>$combo</select>";
        return $cmb;
    }

    public function crearRutaArbol_mdl($id) {
        $i = 0;
        do {
            $loc_nombre = datoDeTablaCampo("localidades", "loc_id", "loc_nombre", $id);
            $pid = datoDeTablaCampo("localidades", "loc_id", "pid", $id);
            $arreglo[] = array("id" => $id, "pid" => $pid, "nombre" => $loc_nombre);
            $id = $pid;
            $i++;
        } while ($id != 0);
        if (count($arreglo) > 0)
            return $arreglo;
        else
            return false;
    }

    public function ruta_localidad_mdl($id) {
        $txt = "";
        $arr = array();
        $arreglo = $this->crearRutaArbol_mdl($id);
        if ($arreglo != false) {
            foreach ($arreglo as $key => $a) {
                $id = $a['id'];
                $pid = $a['pid'];
                $loc_nombre = $a['nombre'];
                $url = base_url() . "admin/localidades/ver_localidad/$id/$pid";
                $arr[$id] = "<a href='$url'>$loc_nombre</a>";
            }
            $arr[] = "<a href='" . base_url() . "admin/localidades'>Principal</a>";
            $arr = array_reverse($arr);
            $txt = implode(" > ", $arr);
            return $txt;
        } else
            return "No existe información";
    }

    public function que_nivel($id) {
        $i = 0;
        do {
            $n = datoDeTablaCampo("localidades", "loc_id", "loc_nombre", $id);
            $arreglo[] = array("nombre" => $n); //$id . "-" . $n;
            $pid = datoDeTablaCampo("localidades", "loc_id", "pid", $id);
            $id = $pid;
            $i++;
        } while ($id != 0);
        unset($arreglo[$i - 1]);
        if (count($arreglo) > 0)
            return count($arreglo);
        else
            return 0;
    }

}
