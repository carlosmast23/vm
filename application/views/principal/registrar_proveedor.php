<link href="<?= base_url(); ?>assets/bootstrap-chosen-master/bootstrap-chosen.css" media="screen" rel="stylesheet" type="text/css">


<div class="container-fluid">

 <div class="panel panel-primary">
  <div class="panel-heading">Registro Proveedor</div>
  <div class="panel-body">
   <form action="<?=base_url()?>general/registrar_proveedor" method="POST" id="form_almacenar">
    <div class="form-group">
     <label title="Usuario o nick" data-toggle="popover" data-trigger="hover" data-content="Ejemplo: alcodejc / sin espacios" data-placement="bottom">Usuario o nick:</label>
     <input type="text" class="form-control" name="prv_usuario" id="prv_usuario" />
   </div>
   <div class="form-group">
     <label>Email:</label>
     <input type="email" class="form-control" name="prv_email" id="prv_email" placeholder="demo@dominio.com" />
   </div>
   <div class="form-group">
     <label>Celular:</label>
     <input type="number" class="form-control" name="prv_telefono" id="prv_telefono" placeholder="0983528439" />
   </div>	
   <div class="form-group">
     <label>Actividad:</label>
     <?=$cmb_actividades?>
   </div>
   <div class="form-group">
     <label class='with-square-checkbox'>
     <input type='checkbox' id="acepto">
       <span>He leído y acepto los términos y <a href="#"  data-toggle="modal" data-target="#terminos">condiciones de uso del servicio. </a></span>
     </label>
   </div>

   <button type="button" class="btn btn-primary" id="almacenar">ENVIAR</button>
   <input type="hidden" name="prv_id" id="prv_id" value="0" />
   <input type="hidden" name="deque" id="deque" value="c" />

 </form>
</div>
</div>


</div>


<div id="terminos" class="modal fade" role="dialog">
  <div class="modal-dialog-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Información</h4>
      </div>
      <div class="modal-body">

        <div class="container">
          <div class="row">

            <div class="col-md-12 text-justify">
              <h2 class="text-center"><strong>POLITICA DE PRIVACIDAD</strong></h2>
              <h3 class="text-center">
                La Política de privacidad de Virtual Mall se actualizó el 01 de Julio de 2017.
              </h3>
              <p class="text-center">
                Tu privacidad es importante para Virtual Mall. Por eso, desarrollamos una Política de privacidad que abarca cómo recolectamos, usamos, divulgamos, transferimos y almacenamos tu información.
                Dedica un momento a familiarizarte con nuestras prácticas de privacidad y, si tienes alguna pregunta, <a href="<?=base_url()?>general/registro">no dudes en ponerte en contacto con nosotros</a>.
              </p>
              <p>
                El presente Política de Privacidad establece los términos en que Virtual Mall usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
              </p>
              <h4>
                Información que es recogida
              </h4>
              <p>
                Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,  información de contacto como  su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación
              </p>
              <h4>
                Uso de la información recogida
              </h4>
              <p>
                Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios.  Es posible que sean enviados <b>correos electrónicos y mensajes texto (SMS) </b> periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento.
                <br><br> 
                Virtual Mall está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.
              </p>

              <h4>Enlaces a Terceros</h4>
              <p>
                Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas.
              </p>
              <h4>Control de su información personal</h4>
              <p>
                En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico.  En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.
                <br><br>
                Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.
                <br><br>
                Virtuall Mall se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.
                <br><br>
                Esta politica de privacidad se han generado en politicadeprivacidadplantilla.com.
              </p>

            </div>

          </div>
        </div>



      </div>

    </div>

  </div>
</div>


<script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>
<script src="<?= base_url() ?>js/reg_proveedor.js"></script>
