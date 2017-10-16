<style>
    #userfile{
        width:90%;
        color:#92AAB0;
        padding:80px 50px;
        opacity: 0;
    }

    .borde_archivo{
        border:2px dotted #0B85A1;
        width:90%;
        margin: 0 auto;
    }
    .borde_archivo span{
        color: red;
        float: left;
        font-size: 30px;
        position: relative;
        text-align: center;
        width: 850px;
    }

    #tblArch span{
        text-align: center;
        width: 40px;
        font-size: 10px;
        float:left; 
    }
</style>
<div class="box-header with-border">
    <h3 class="box-title">Subir Archivos</h3>
</div>
<div class="panel-body box-body">
    <form id="form1" enctype="multipart/form-data" method="post" action="upload.php">
        <div class="borde_archivo">
            <table id="tblArch">
                <tr>
                    <th width="50%">Archivo</th>
                    <th width="10%">Tamaño</th>
                    <th width="15%">Estado</th>
                    <th width="5%">Opciones</th>
                </tr>
            </table>

            <span>Soltar archivos aqui</span>
            <div class="row" >
                <input type="file" name="userfile[]" id="userfile" multiple />
                <input type="hidden" name="arc_ref_id" id="arc_ref_id" value='<?= $arc_ref_id ?>' /><br>
                <input type="hidden" name="id_deque" id="id_deque" value='p' /><br>
            </div>
        </div>
    </form>
    <!--    <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img data-src="<?= base_url() ?>files/demo.jpg"  alt="...">
                    <img src='<?= base_url() ?>files/1' width='100' height='100'>
                    <div class="caption">
                        <h3>Título de la imagen</h3>
                        <p>Descripcion.</p>
                        <p>
                            <a href="#" class="btn btn-primary" role="button">Botón</a>
                            <a href="#" class="btn btn-default" role="button">Botón</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>-->

</div>

<!--<img src='<?= base_url() ?>files/1' width='250' height='250'>-->
<script src="<?= base_url() ?>js/archivos.js"></script>  
