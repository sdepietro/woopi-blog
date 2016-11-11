<link rel="stylesheet" href="<?= base_url() ?>assets/admin//css/bootstrap-wysihtml5.css" />

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Configs</a> 
        <a href="#" class="current">Editar Categoría</a> 
    </div>

    <h1>Editar Config</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Editar Config</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="<?= panel_url("configs/insert") ?>" method="post" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Nombre :</label>
                            <div class="controls">
                                <?= $row->name ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Valor :</label>
                            <div class="controls">
                                <input type="text" name="value" class="span11" value="<?= (empty($row->value)) ? "" : $row->value ?>" placeholder="Complete con un valor" />
                            </div>
                        </div>
                        <input type="hidden" name="config_id" value="<?= $row->config_id ?>"
                               <div class="form-actions">
                            <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>