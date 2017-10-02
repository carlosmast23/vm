<?php
    require_once "nusoap.php";
    $cliente = new nusoap_client("http://localhost/vm/server.php");
      
    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
      
    //$result = $cliente->call("getProd", array("categoria" => "libros"));
	$resp=array("1","2","3");
	$result = $cliente->call("enviarSMS",array("+593994725020","Eres un proveedor página".date("H:i:s")));
    //sleep(0.75); 
    $result = $cliente->call("enviarSMS",array("+593983528439","Eres el admin".date("H:i:s")));
    //sleep(0.75);
    //$result = $cliente->call("enviarSMS",array("+593994905332","Eres el cliente".date("H:i:s")));
	//$result = $cliente->call("ejemplo",array("que tal ve"));
    print_r ($result);
	echo "ENVIADOR";
/*	
    if ($cliente->fault) {
        echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
    else {
        $error = $cliente->getError();
        if ($error) {
            echo "<h2>Error</h2><pre>" . $error . "</pre>";
        }
        else {
            echo "<h2>Libros</h2><pre>";
            echo $result;
            echo "</pre>";
        }
    }
	*/
?>