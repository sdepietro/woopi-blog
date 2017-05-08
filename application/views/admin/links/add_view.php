<link rel="stylesheet" href="<?= base_url() ?>assets/admin//css/bootstrap-wysihtml5.css" />



<div id="content-header">
    <div id="breadcrumb"> 
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Links</a>
        <?php if (empty($row)): ?>
            <a href="#" class="current">Agregar Link</a>
        <?php else: ?>
            <a href="#" class="current">Editar Link</a>
        <?php endif; ?>
    </div>
    <?php if (empty($row)): ?>
        <h1>Agregar Link</h1>
    <?php else: ?>
        <h1>Editar Link</h1>
    <?php endif; ?>

</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <?php if (empty($row)): ?>
                        <h5>Agregar Link</h5>
                    <?php else: ?>
                        <h5>Editar Link</h5>
                    <?php endif; ?>
                </div>

                <div class="widget-content nopadding">
                    <form action="<?= panel_url("links/insert") ?>" method="post" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Título :</label>
                            <div class="controls">
                                <input type="text" name="title" class="span11" value="<?= (empty($row->title)) ? "" : $row->title ?>" placeholder="Título" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">URL :</label>
                            <div class="controls">
                                <input type="text" name="url" class="span11" value="<?= (empty($row->url)) ? "" : $row->url ?>" placeholder="http://www.test.com/contacto" />
                            </div>
                        </div>
                        <?php if (!empty($row)): ?>
                            <input type="hidden" name="link_id" value="<?= $row->link_id ?>"
                        <?php endif; ?>

                               <div class="form-actions">
                            <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/admin/js/bootstrap-wysihtml5.js"></script> 
<script>
    $('.textarea_editor').wysihtml5();
</script>