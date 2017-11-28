# Funcionalidad de Virtuall Mall
- 1. El cliente ingresa una busqueda
- 2. Se notifica al administrador  y asigna categoria a la busqueda
- 3. El sistema busca a los proveedores relacionados con la categoria
- 4. El sistema envia mensaje para que se genere propuesta
- 5. El proveedor recibe link de propuesta
- 6. El proveedor puede realizar preguntas al cliente en relacion a la busqueda
- 7. Si se genero una pregunta el cliente responde
- 8. El proveedor recibe la pregunta y procede a enviar la propuesta
- 9. El cliente recibe las propuestas (aprobar/rechazar)
- 10. Si es aprobada la propuesta se enlaza cliente con proveedor

## Modulo de pruebas
- Enlace: base_url() admin/pruebas

# Configuraciones
- Configuracion de config/config.php
- Configuracion de config/autoload.php
- Configuracion de config/database.php
- Crear directorio uploads en servidor (raiz)
-CONFIGURAR: /etc/sysconfig/selinux and specify SELINUX=disabled.

## Enlaces
- base_url( ) - Ruta del proyecto

- Asignar categorias a busquedas: base_url( ) admin/busquedas
- Solicitar actualizacion de datos: base_url( ) admin/proveedores/solicitar_actualizacion
- Alerta error Server SMS= base_url() /cronos/recibir_alert
## Acortador de enlaces
- Controller/GoogleUrl.php
- API URL=[https://www.googleapis.com/urlshortener/v1/url](https://www.googleapis.com/urlshortener/v1/url)
- API KEY = AIzaSyCziOymgdq7wgFW9tlO_8SnM9MKFt8gAuY

##Validaciones de formulario registro/actualizacion de proveedores
- Controller/Validaciones.php/prov

## Cronos "funciones por tiempo de ejecucion"
- procesar = cada minuto - mensajes enviados a proveddores para generar proppuestas y el enlace que tienen que revisar los clientes estado=p
- procesar1= cada minuto, envio de mensaje a proveedores -estado=e
- procesar2= cada 5 minutos - envio de mensaje a cliente, enlace para revisar propuestas estado=e
- procesar3= cada 10 minutos - envio de mensajes de acuerdo a intervalo de tiempo, obtuno o no resultados en el tiempo especificado
- procesar_email=cada 5 minutos - envio de emails a proveedores
- prueba=verificacion de funcionalidad de envio de email
-INSALAR LA ULTIMA VERSION DE CRONIE
## Catalogo
- base_url( ) /catalogo

## Email / Cronos_model.php/procesar_email_prov
- Host: smtp.gmail.com
- Port: 587
- Username: virtualmallecu@gmail.com
- Password: code17bwbtj

## Servidor de Socket
- Servidor: ( /var/www/vm/public_html/) resources/vmserversms/socket-service/servidor_socket.php
- Web: base_url() resources/vmserversms/socket-service/servidor_socket.php

-Revisar archivos de configuraciones excluidos

#SOAP
- configurar instalacion SOAP en PHP
- verificar dev/null