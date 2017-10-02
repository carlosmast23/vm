<?php

function conectado() {
    $ci = &get_instance();
    if (!$ci->session->userdata('is_logued_in') == TRUE) {
        redirect(base_url() . "conexion", 'refresh');
    }
}

// aumentar una cantidad de dias 
function diamas($fecha,$deque) {
   $partes = explode(" ", $fecha);
   $parte1=$partes[0];
   $f = explode("-", $parte1);
   $ano = $f[0] + 0;
   $mes = $f[1] + 0;
   $dia = $f[2] + 0;

   $parte2=$partes[1];
   $t = explode(":", $parte2);
   $hor = $t[0] + 0;
   $min = $t[1] + 0;
   $seg = $t[2] + 0;


   switch ($deque) {
    case 'u': 
    $aumentada = mktime(date($hor), date($min)+15, date($seg), date($mes), date($dia), date($ano));
    break;
    case 'a': 
    $aumentada = mktime(date($hor)+1, date($min), date($seg), date($mes), date($dia), date($ano));
    break;   
    case 'm': 
    $aumentada = mktime(date($hor), date($min), date($seg), date($mes), date($dia)+1, date($ano));
    break; 
    case 'd': 
    $aumentada = mktime(date($hor), date($min), date($seg), date($mes), date($dia)+7, date($ano));
    break;
    default: 
    $aumentada = mktime(date($hor), date($min), date($seg), date($mes), date($dia), date($ano));
    break;
}



return date("Y-m-d H:i:s", $aumentada);

}

function hoy($tipo = '') {
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    switch ($tipo) {
        case "c":
        return "$fecha $hora";
        break;
        case "h":
        return $hora;
        break;
        default:
        return $fecha;
        break;
    }
}


function datoDeTabla($tabla, $regresa, $id) {
    $ci = &get_instance();
    $ci->db->select($regresa);
    $ci->db->where('id', $id);
    $query = $ci->db->get($tabla);
    if ($query->num_rows() > 0)
        return $query->row()->$regresa;
    else
        return false;
}

function datoDeTablaCampo($tabla, $campo, $regresa, $id) {
    $ci = &get_instance();
    $ci->db->select($regresa);
    $ci->db->where($campo, $id);
    $query = $ci->db->get($tabla);
    if ($query->num_rows() > 0)
        return $query->row()->$regresa;
    else
        return false;
}

function nomApeUsuario($usu_id) {
    $ci = &get_instance();
    $usu_apellidos = datoDeTablaCampo("usuarios", "usu_id", "usu_apellidos", $usu_id);
    $usu_nombres = datoDeTablaCampo("usuarios", "usu_id", "usu_nombres", $usu_id);
    if ($usu_nombres != false)
        return $usu_nombres . " " . $usu_apellidos;
    else
        return false;
}

function formatear_fecha($fecha) {
    $arr = explode(" ", $fecha);
    if (count($arr) > 0)
        return $arr[0];
}

function fecha_texto($fecha, $tipo = 'f') {
    setlocale(LC_ALL, "es_ES");
    if ($tipo == 'f')
        return addslashes(strftime("%d de %B de %Y", strtotime($fecha)));
    if ($tipo == 'c')
        return addslashes(strftime("%d de %B de %Y %X", strtotime($fecha)));
}

function cortar_texto($texto, $n = 75) {
    if (strlen($texto) > $n)
        return substr($texto, 0, $n) . "...";
    else
        return $texto;
}

?>