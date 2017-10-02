﻿<?php
    require_once "nusoap.php";
      
        function getProd($categoria) {
        if ($categoria == "libros") {
            return join(",", array(
                "El señor de los anillos",
                "Los límites de la Fundación",
                "The Rails Way"));
        }
        else {
                return "No hay productos de esta categoria";
        }
		}
		
		function enviarSMS($numero,$mensaje)
		{
			$host = "127.0.0.1";
			$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
			$puerto = 65500;			
			if (socket_connect($socket, $host, $puerto))
			{	
				socket_write($socket,$numero."\n");
				//socket_read($socket, 2048);
				socket_write($socket,$mensaje."\n");
				//socket_read($socket, 2048);
				//socket_write($socket,"hola");
				//return "ok";
				//secho "\nConexion Exitosa, puerto: " . $puerto;
				socket_close($socket);
				return "true";
			}
			else
			{
				//echo "\nLa conexion TCP no se pudo realizar, puerto: ".$puerto;
				socket_close($socket);
			}
			
			return "false";
		}
      
		

    $server = new soap_server();
    $server->register("getProd");
	$server->register("enviarSMS");
	//$server->register("ejemplo");
	//$server->service(php://input);
    $server->service($HTTP_RAW_POST_DATA);
?>