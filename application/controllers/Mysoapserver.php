<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mysoapserver extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here
        $ns=base_url()."mysoapserver";
        $this->load->library("Nusoap_lib"); //load the library here
        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("SOAPServer", $ns,false,"document");
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns;

        //registrando funciones

        $input_array2 = array ('celular' => "xsd:string", 'buscar' => "xsd:string",'time' => "xsd:string");
        $return_array2= array ("return" => "xsd:string");
        $this->nusoap_server->register('buscarvm', $input_array2, $return_array2, "urn:SOAPServerWSDL", "urn:".$ns."/buscarvm", "document", "literal", "Buscar en Virtual Mall");

    }

    function index(){

       function buscarvm($celular,$buscar,$time){
        $ci = &get_instance();
        $ci->load->model('busquedas_model');
        $ci->busquedas_model->buscar_mdl($celular,$buscar,$time);
        return "success";
    }

    $this->nusoap_server->service(file_get_contents("php://input"));
}


}