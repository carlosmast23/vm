<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cronos_model extends CI_Model {


  public function __construct() {
    parent::__construct();

  }

//madar a correr cada segundo
  public function procesar_sms_pendientes(){
   $sql0="SELECT * FROM `busquedas` WHERE `act_id` = '0'  AND `bus_estado`='r'";
   $query0=$this->db->query($sql0);
   if($query0->num_rows()>0){
    foreach ($query0->result() as $fila) {
      $this->enviar_mensaje($fila->bus_id,$fila->act_id,$fila->bus_texto);
    }
  }


  require_once('./nusoap.php');
  $cliente = new nusoap_client(base_url()."resources/vmserversms/web-service/server-sms.php");
  $error = $cliente->getError();
  if ($error){
    log_message('error', 'ERROR WEBSERVICE.');
  }

  $sql="SELECT * FROM `envio_sms` WHERE `estado`='p' AND (`deque`='pr' OR `deque`='cn' OR `deque`='cf' OR `deque`='cg')";
  $query=$this->db->query($sql);
  if($query->num_rows()>0){
    foreach ($query->result() as $fila) {
      $result = $cliente->call("enviarSMS",array($fila->tel_destinatario,$fila->mensaje));
      if($result=="success"){
       $this->db->where("id",$fila->id);
       $this->db->update("envio_sms",array("estado"=>'e'));
     }else
     log_message('error', 'ERROR DE CONEXION CELULAR - PROCESAR SMS CLI. ERROR'.$result);
   }
 }


}

public function procesar_sms_prov(){
  require_once('./nusoap.php');

  $cliente = new nusoap_client(base_url()."resources/vmserversms/web-service/server-sms.php");
  $error = $cliente->getError();
  if ($error){
    log_message('error', 'ERROR WEBSERVICE.');
  }
  $sql="SELECT * FROM `envio_sms` WHERE `estado`='p' AND (`deque`='p' OR `deque` LIKE 'cp') ";
  $query=$this->db->query($sql);
  if($query->num_rows()>0){
    foreach ($query->result() as $fila) {
      $result = $cliente->call("enviarSMS",array($fila->tel_destinatario,$fila->mensaje));
      if($result=="success"){
        $this->db->where("id",$fila->id);
        $this->db->update("envio_sms",array("estado"=>'e'));
      }else
      log_message('error', 'ERROR DE CONEXION CELULAR - PROVEEDOR.ERROR'.$result);    
    }
  }

}


public function enviar_mensaje($bus_id, $act_id,$buscar){
  $bandera=false;
  $this->load->model("GoogleURL_model","google");
  $url_cli= $this->google->codificar_parametro("propuestas/revisar/",$bus_id);

  $sql0="SELECT * FROM `rel_bus_act` WHERE `bus_id` ='$bus_id' AND `estado`='p' ";
  $query0=$this->db->query($sql0);
  if($query0->num_rows()>0){
    foreach ($query0->result() as $fila0) {   
      $sql="SELECT * FROM `proveedores` WHERE `act_id` ='$fila0->act_id' AND `prv_estado`='a'";
      $query=$this->db->query($sql);
      if($query->num_rows()>0){
        $bandera=true;
        foreach ($query->result() as $fila) {
          $url= $this->google->codificar_parametro("propuestas/recibir/",$bus_id."&".$fila->prv_id);
          $data=array(
            "bus_id"=>$bus_id,
            "ser_id"=>1,
            "usu_id"=>$fila->prv_id,
            "email_destinatario"=>$fila->prv_email,
            "asunto"=>"Solicitud Producto VirtuallMall",
            "mensaje"=>"$buscar. Genere su propuesta ".$url,
            "fecha"=>hoy('c'),
            "deque"=>"p",
            );
          $this->db->insert("envio_email",$data);

          $data2= array(
            "bus_id"=>$bus_id,
            'ser_id' => 1, 
            "usu_id"=>$fila->prv_id,
            "tel_destinatario"=>$fila->prv_telefono,
            "mensaje"=>"$buscar. Genere su propuesta ".$url,
            "fecha"=>hoy('c'),
            "deque"=>"p",
            );
          $this->db->insert("envio_sms",$data2);
        }
      }

      $a= array('estado' =>  "r");
      $this->db->where("id",$fila0->id);
      $this->db->update("rel_bus_act",$a); 
    }
  }


  if($bandera==true){
    $bus_celular=datoDeTablaCampo("busquedas","bus_id","bus_celular",$bus_id);
    if($bus_celular!=false){
      $data3= array(
        "bus_id"=>$bus_id,
        'ser_id' => 1, 
        "usu_id"=>0,
        "tel_destinatario"=>$bus_celular,
        "mensaje"=>"Revise sus resultados. Link ".$url_cli,
        "fecha"=>hoy('c'),
        "deque"=>"c",
        );
      $this->db->insert("envio_sms",$data3);
    }
    $a= array('bus_estado' =>  "e");
    $this->db->where("bus_id",$bus_id);
    $this->db->update("busquedas",$a);
  }


}


public function procesar_sms_cli(){
  require_once('./nusoap.php');

  $cliente = new nusoap_client(base_url()."resources/vmserversms/web-service/server-sms.php");
  $error = $cliente->getError();
  if ($error){
    log_message('error', 'ERROR WEBSERVICE.');
  }

  $sql="SELECT * FROM `envio_sms` WHERE `estado`='p' AND `deque`='c' AND `bus_id` IN(SELECT `bus_id` FROM propuestas WHERE `pro_estado`='p') ";

  $query=$this->db->query($sql);
  if($query->num_rows()>0){
    foreach ($query->result() as $fila) {
      $result = $cliente->call("enviarSMS",array($fila->tel_destinatario,$fila->mensaje));
      if($result=="success"){
       $this->db->where("id",$fila->id);
       $this->db->update("envio_sms",array("estado"=>'e'));
     }else
     log_message('error', 'ERROR DE CONEXION CELULAR - PROCESAR SMS CLI. ERROR'.$result);
   }
 }

}


public function procesar_sms_clipendientes(){
  $sql="SELECT * FROM `busquedas` WHERE `bus_estado`='p' AND `bus_estado`='r' ";

  $query=$this->db->query($sql);
  if($query->num_rows()>0){
    foreach ($query->result() as $fila) {
      $pro_id=datoDeTablaCampo("propuestas","bus_id","pro_id",$fila->bus_id);

      if($pro_id == false  &&  hoy('c') > $fila->bus_fechafin ){
        $sms="Su busqueda no obtuvo resultados, genere una nueva solictud (amplie su tiempo de respuesta)";
        $this->insertar_sms($fila->bus_id,$fila->bus_celular,$sms,"cn");

        $arr= array('bus_estado' => 'a');
        $this->db->where("bus_id",$fila->bus_id);
        $this->db->update("busquedas",$arr);

      }else if($pro_id > 0 &&  hoy('c') >= $fila->bus_fechafin){
        $sms="Se ha finalizado la busqueda de resultados, esperamos que alguna propuesta haya sido de tu agrado";
        $this->insertar_sms($fila->bus_id,$bus_celular,$sms,"cf");

        $arr= array('bus_estado' => 'e');
        $this->db->where("bus_id",$fila->bus_id);
        $this->db->update("busquedas",$arr);
      }


    }
  }

}


public function insertar_sms($bus_id,$tel_destinatario,$sms,$deque){
  /*require_once('./nusoap.php');

  $cliente = new nusoap_client(base_url()."resources/vmserversms/web-service/server-sms.php");
  $error = $cliente->getError();
  if ($error){
    log_message('error', 'ERROR WEBSERVICE.');
  }*/

  $d1=array(
    "bus_id"=>$bus_id,
    'ser_id' => 1, 
    "usu_id"=>0,
    "tel_destinatario"=>$tel_destinatario,
    "mensaje"=>$sms,
    "fecha"=>hoy('c'),
    "deque"=>$deque,
    //"estado"=>"e",
    );
  $this->db->insert("envio_sms",$d1);

  /*$result = $cliente->call("enviarSMS",array($tel_destinatario,$sms));
  if($result!="success")
    log_message('error', 'ERROR DE CONEXION CELULAR INSERTAR SMS. ERROR'.$result);
*/

}


public function procesar_email_prov(){
  $this->load->library('My_PHPMailer');


  $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug  =2; 
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
        $mail->SMTPOptions = array(
          'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
          );
        $mail->Host = "smtp.gmail.com";
        $mail->Port       = 587;                   // SMTP port to connect to GMail
        $mail->Username   = "virtualmallecu@gmail.com";  // user email address
        $mail->Password   = "code17bwbtj";            // password in GMail
        $mail->SetFrom('virtualmallecu@gmail.com', 'Servidor Correos VM');  //Who is sen

        $sql="SELECT * FROM `envio_email` WHERE `estado`='p' AND (`deque`='p' OR `deque` LIKE 'cp') ";
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
          foreach ($query->result() as $fila) {
            $mail->Subject    = $fila->asunto;
            $mail->Body      = $fila->mensaje;
            $mail->AltBody    = "VirtuallMall";
            $usuario=datoDeTablaCampo("proveedores","prv_id","prv_usuario",$fila->usu_id);
            $mail->AddAddress($fila->email_destinatario, $usuario);
            //$mail->AddAttachment("img/logo.png");   
            if(!$mail->Send()) {
              echo "Error: " . $mail->ErrorInfo; 
              log_message("error",$mail->ErrorInfo);
            } else {
             echo "Message sent correctly!";  
             $this->db->where("id",$fila->id);
             $this->db->update("envio_email",array("estado"=>'e',"fecha_envio"=>hoy('c')));    
           }

           $mail->clearAddresses();


         }

       }

     }


     public function prueba(){
      $this->load->library('My_PHPMailer');

      $mail = new PHPMailer();
      $mail->IsSMTP(); // we are going to use SMTP
      $mail->CharSet = 'UTF-8';
      $mail->SMTPDebug  =3; 
      $mail->SMTPAuth   = true; // enabled SMTP authentication
      $mail->SMTPSecure = "tls";  // prefix for secure protocol to connect to the server
      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
        );
      $mail->Host = "smtp.gmail.com";
      $mail->Port       = 587;                   // SMTP port to connect to GMail
      $mail->Username   = "virtualmallecu@gmail.com";  // user email address
      $mail->Password   = "code17bwbtj";            // password in GMail
      $mail->SetFrom('virtualmallecu@gmail.com', 'Servidor Correos VM');  //Who is sen

      $mail->Subject    = "Prueba";
      $mail->Body      = "cuerpo";
      $mail->AltBody    = "VirtuallMall";
      $mail->AddAddress("juancarlos100pl@gmail.com", "Juan");
        //$mail->AddAttachment("img/logo.png");   
      if(!$mail->Send()) {
        echo "Error: " . $mail->ErrorInfo; 
        log_message("error",$mail->ErrorInfo);
      } else {
       echo "Message sent correctly!";  
     }

     $mail->clearAddresses();



   }






 }
