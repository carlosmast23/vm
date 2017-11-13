<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

<!--  plugins -->
<!--<script src="<?=base_url()?>js/menu.js"></script>-->

<script src="<?=base_url()?>js/animated-headline.js"></script>

<script src="<?=base_url()?>js/isotope.pkgd.min.js"></script>


<script src="<?=base_url()?>js/custom.js"></script>


<input type="hidden" name="base_url" id="base_url" value="<?= base_url() ?>"/>
</div>
<footer class="footer">	
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<p class="text-center">
					<span class="badge pull-center"><?=$this->session->visitas;?></span> <b>Visitas </b> 
					<a title="Facebook" href="https://www.facebook.com/vmquito/"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a> <a title="Twitter" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a> <a title="Google+" href="https://plus.google.com/u/0/108614474425964538449"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x"></i></span></a>      <a title="E-mail" href="mailto:virtualmallecu@gmail.com"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-envelope fa-stack-1x"></i></span></a>  <a title="Catálogo" href="<?=base_url()?>general/catalogo"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-print fa-stack-1x"></i></span></a>
				</p>
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