<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

<!--  plugins -->
<script src="<?=base_url()?>js/menu.js"></script>
<script src="<?=base_url()?>js/animated-headline.js"></script>
<script src="<?=base_url()?>js/isotope.pkgd.min.js"></script>
<script src="<?=base_url()?>js/custom.js"></script>


<input type="hidden" name="base_url" id="base_url" value="<?= base_url() ?>"/>
</div>
<footer class="footer">	
	<!--<div class="container-fluid">
		<img 
		src="<?=base_url()?>img/pie-sd.png" 
		width="100%" 
		height="100%"
		srcset="<?=base_url()?>img/pie-hd.png 1024w , 
		<?=base_url()?>img/pie-md.png 700w , 
		<?=base_url()?>img/pie-sd.png 360w" 
		/>
	</div>

-->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container-fluid">
	<div class="row">
		<!-- Button trigger modal -->

		

		<div class="col-md-4 col-md-offset-4">

			<p class="text-center">
				<span class="badge pull-center"><?=$this->session->visitas;?></span> <b>Visitas </b> 

				<a title="Facebook" href="https://www.facebook.com/vmquito/"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a> <a title="Twitter" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a> <a title="Google+" href="https://plus.google.com/u/0/108614474425964538449"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x"></i></span></a>      <a title="E-mail" href="mailto:virtualmallecu@gmail.com"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-envelope fa-stack-1x"></i></span></a>  <a title="Catálogo" href="<?=base_url()?>general/catalogo"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-print fa-stack-1x"></i></span></a>

			</p>
<!--
			<h4 class="text-center"><i class="fa fa-envelope"></i> Noticias</h4>

			<p class="text-center">Suscribete con nosotros y mantente informado de nuestras ofertas y promociones</p>

			<form action="" method="post">
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="email" class="form-control " placeholder="your@email.com">
					</div>

				</div>

				<div class="col-md-4">
					<button type="submit" value="sub" name="sub" class="btn btn-primary"><i class="fa fa-share"></i> Suscribete!</button>
				</div>				


			</form>
			-->
			<p class="text-center">
				© Elaborado por Codesoft | <a href="<?=base_url()?>general/politica">Política de Privacidad</a>
			</p>
		</div>


	</div>


</footer>

<!-- #site-footer -->

<!-- js -->




</body>
</html>