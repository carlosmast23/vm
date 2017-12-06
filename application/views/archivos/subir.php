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


</div>

<script src="<?= base_url() ?>js/archivos.js"></script>  
