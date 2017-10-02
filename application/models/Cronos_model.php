<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cronos_model extends CI_Model {


  public function __construct() {
    parent::__construct();

  }


  public function procesar_sms_prov(){
    require_once('./nusoap.php');

    $cliente = new nusoap_client(base_url()."server.php");

    $sql="SELECT * FROM `envio_sms` WHERE `estado`='p' AND (`deque`='p' OR `deque` LIKE 'cp') ";
    $query=$this->db->query($sql);
    if($query->num_rows()>0){
      foreach ($query->result() as $fila) {
        $error = $cliente->getError();
        if ($error) 
          log_message('error', 'ERROR WEBSERVICE.'.$error);
        else{
          $result = $cliente->call("enviarSMS",array($fila->tel_destinatario,$fila->mensaje));
          $this->db->where("id",$fila->id);
          $this->db->update("envio_sms",array("estado"=>'e'));
        }
      }
    }


  }

  public function procesar_sms_cli(){
    require_once('./nusoap.php');

    $cliente = new nusoap_client(base_url()."server.php");

    $sql="SELECT * FROM `envio_sms` WHERE `estado`='p' AND `deque`='c' AND `bus_id` IN(SELECT `bus_id` FROM propuestas WHERE `pro_estado`='p') ";

    $query=$this->db->query($sql);
    if($query->num_rows()>0){
      foreach ($query->result() as $fila) {
        $error = $cliente->getError();
        if ($error) 
          log_message('error', 'ERROR WEBSERVICE.'.$error);
        else{
          $result = $cliente->call("enviarSMS",array($fila->tel_destinatario,$fila->mensaje));
          $this->db->where("id",$fila->id);
          $this->db->update("envio_sms",array("estado"=>'e'));
        }
      }
    }

  }


  public function procesar_sms_clipendientes(){
    require_once('./nusoap.php');

    $cliente = new nusoap_client(base_url()."server.php");


    $sql="SELECT * FROM `envio_sms` WHERE `deque`='c' AND `estado`='p' ";

    $query=$this->db->query($sql);
    if($query->num_rows()>0){
      foreach ($query->result() as $fila) {
        $bus_fecha=datoDeTablaCampo("busquedas","bus_id","bus_fecha",$fila->bus_id);
        $bus_fechafin=datoDeTablaCampo("busquedas","bus_id","bus_fechafin",$fila->bus_id);
        $bus_tiempo=datoDeTablaCampo("busquedas","bus_id","bus_tiempo",$fila->bus_id);
        $bus_celular=datoDeTablaCampo("busquedas","bus_id","bus_celular",$fila->bus_id);

        $pro_id=datoDeTablaCampo("propuestas","bus_id","pro_id",$fila->bus_id);


        if($pro_id == false  && $bus_fechafin > hoy('c')){

          $sms="Su busqueda no obtuvo resultados, genere una nueva solictud (amplie su tiempo de respuesta)";
          $this->insertar_sms($fila->bus_id,$bus_celular,$sms,"cn");

          $this->db->where("id",$fila->id);
          $this->db->update("envio_sms",array("estado"=>'e'));

        }else if($pro_id > 0 && $bus_fechafin >= hoy('c')){
          $sms="Se ha finalizado la busqueda de resultados, esperamos que alguna propuesta haya sido de tu agrado";
          $this->insertar_sms($fila->bus_id,$bus_celular,$sms,"cf");

          $this->db->where("id",$fila->id);
          $this->db->update("envio_sms",array("estado"=>'e'));

        }


      }
    }

  }


  public function insertar_sms($bus_id,$tel_destinatario,$sms,$deque){
    $cliente = new nusoap_client(base_url()."server.php");

    $d1=array(
      "bus_id"=>$bus_id,
      'ser_id' => 1, 
      "usu_id"=>0,
      "tel_destinatario"=>$tel_destinatario,
      "mensaje"=>$sms,
      "fecha"=>hoy('c'),
      "deque"=>$deque,
      "estado"=>"e",
      );
    $this->db->insert("envio_sms",$d1);

    $error = $cliente->getError();
    if ($error) 
      log_message('error', 'ERROR WEBSERVICE.'.$error);
    else
      $result = $cliente->call("enviarSMS",array($tel_destinatario,$sms));
  }
  

/*
  public function procesar_sms_clipendientes(){
    $sql="SELECT * FROM `envio_sms` WHERE `deque`='c' AND `bus_id` NOT IN(SELECT `bus_id` FROM propuestas WHERE `pro_estado`='p') ";

    $query=$this->db->query($sql);
    if($query->num_rows()>0){
      foreach ($query->result() as $fila) {
        $bus_fecha=datoDeTablaCampo("busquedas","bus_id","bus_fecha",$fila->bus_id);
        $bus_tiempo=datoDeTablaCampo("busquedas","bus_id","bus_tiempo",$fila->bus_id);
        $bus_celular=datoDeTablaCampo("busquedas","bus_id","bus_celular",$fila->bus_id);

        if(diamas($bus_fecha,$bus_tiempo) > hoy('c')){


          $error = $cliente->getError();
          if ($error) 
            log_message('error', 'ERROR WEBSERVICE.'.$error);
          else{
            $sms="Su busqueda no obtuvo resultados, genere una nueva solictud (amplie su tiempo de respuesta)";
            $result = $cliente->call("enviarSMS",array($fila->tel_destinatario,$sms));
            //$this->db->where("id",$fila->id);
            //$this->db->update("envio_sms",array("estado"=>'r'));

            $d1=array(
              "bus_id"=>$fila->bus_id,
              'ser_id' => 1, 
              "usu_id"=>0,
              "tel_destinatario"=>$fila->tel_destinatario,
              "mensaje"=>$sms,
              "fecha"=>hoy('c'),
              "deque"=>"cp",
              "estado"=>"e",
              );
            $this->db->insert("envio_sms",$d1);

          }
        }


      }
    }

  }

  public function procesar_sms_cliterminados(){
    $sql="SELECT * FROM `envio_sms` WHERE `deque`='c' AND `bus_id` IN(SELECT `bus_id` FROM propuestas WHERE `pro_estado`='p') ";

    $query=$this->db->query($sql);
    if($query->num_rows()>0){
      foreach ($query->result() as $fila) {
        $bus_fecha=datoDeTablaCampo("busquedas","bus_id","bus_fecha",$fila->bus_id);
        $bus_tiempo=datoDeTablaCampo("busquedas","bus_id","bus_tiempo",$fila->bus_id);
        $bus_celular=datoDeTablaCampo("busquedas","bus_id","bus_celular",$fila->bus_id);

        if(diamas($bus_fecha,$bus_tiempo) == hoy('c')){

          $error = $cliente->getError();
          if ($error) 
            log_message('error', 'ERROR WEBSERVICE.'.$error);
          else{
            $sms="Se ha finalizado la busqueda de resultados, esperamos que alguna propuesta haya sido de tu agrado";
            $result = $cliente->call("enviarSMS",array($fila->tel_destinatario,$sms));

            $d1=array(
              "bus_id"=>$fila->bus_id,
              'ser_id' => 1, 
              "usu_id"=>0,
              "tel_destinatario"=>$fila->tel_destinatario,
              "mensaje"=>$sms,
              "fecha"=>hoy('c'),
              "deque"=>"ct",
              "estado"=>"e",
              );
            $this->db->insert("envio_sms",$d1);


          }
        }


      }
    }

  }
  */





}
