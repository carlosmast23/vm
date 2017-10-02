<div>    
    <a href="<?= base_url() ?>admin/actividades/crear" class="btn btn-primary btn-md"> <span class="glyphicon glyphicon-plus" ></span>Nuevo</a>
    <form action="" class="navbar-form navbar-right"  role="search">
        <div class="input-group">
            <input type="text" name="buscar" id="buscar" placeholder="Search..." class="form-control" /> 
            <div class="input-group-btn">
                <button class="btn btn-info">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </div>
    </form>
</div>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCIÓN</th>
        <th width="2%">Opciones</th>
    </tr>
    <?= $html ?>
</table>