<br>
<br>
<br>
<link href="<?= base_url(); ?>assets/choseen/chosen.css" media="screen" rel="stylesheet" type="text/css">
<div class="container-fluid">

    <div class="panel panel-primary">
        <div class="panel-heading">Localidades</div>
        <div class="panel-body">
            <form action="#">
                <p>     
                    Visualizando información dentro de: <?= $ruta ?>
                    <p>
                        <?= $combo_arbol; ?>
                        <input type="hidden" value="<?= $id ?>" name="pid" id="pid" />
                        <input type="hidden" value="arboles" name="op" />
                        <?php if ($ultimo_nivel <= 2): ?>
                            <input type="button" name="agr" id="agr" value="Agregar" class='btn btn-primary'/>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>
        <script src="<?= base_url() ?>js/admin/localidades.js"></script>