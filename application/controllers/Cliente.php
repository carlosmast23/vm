<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Cliente extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  function index() {
        require_once('./nusoap.php');

   $cliente = new nusoap_client(base_url()."server.php");

   $error = $cliente->getError();
   if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
  }
  echo "antes del metdoo";
    //$result = $cliente->call("getProd", array("categoria" => "libros"));
  $resp=array("1","2","3");
  $result = $cliente->call("enviarSMS",array("+593994905332","esta es una ultima prueba de que esta funcionando bien"));
  //$result = $cliente->call("ejemplo",array("que tal ve"));
  print_r ($result);
  echo "despues del metodo";

}

//variables numero - mensaje---> enviar link



}
