<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-wysihtml5.css" />



<div id="content-header">
    <div id="breadcrumb"> 
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Posts</a> 
        <?php if (empty($row)): ?>
            <a href="#" class="current">Agregar Post</a> 
        <?php else: ?>
            <a href="#" class="current">Editar Post</a> 
        <?php endif; ?>
    </div>
    <?php if (empty($row)): ?>
        <h1>Agregar Post</h1>
    <?php else: ?>
        <h1>Editar Post</h1>
    <?php endif; ?>

</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <?php if (empty($row)): ?>
                        <h5>Agregar Post</h5>
                    <?php else: ?>
                        <h5>Editar Post</h5>
                    <?php endif; ?>
                </div>

                <div class="widget-content nopadding">
                    <form action="<?= panel_url("posts/insert") ?>" method="post" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Fecha :</label>
                            <div class="controls">
                                <div  data-date="12-02-2012" class="input-append date datepicker">
                                    <input type="text" name="date" value="<?= (empty($row->date)) ? date("d-m-Y") : spanish_date($row->date) ?>"  data-date-format="mm-dd-yyyy" class="span11" >
                                    <span class="add-on"><i class="icon-calendar"></i></span> </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Título :</label>
                            <div class="controls">
                                <input type="text" name="title" class="span11" value="<?= (empty($row->title)) ? "" : $row->title ?>" placeholder="Título" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Contenido :</label>
                            <div class="controls">
                                <textarea name="text"><?= (empty($row->text)) ? "" : $row->text ?></textarea>
                            </div>
                        </div>

                        <?php if (!empty($row)): ?>
                            <input type="hidden" name="post_id" value="<?= $row->post_id ?>"
                        <?php endif; ?>

                               <div class="form-actions">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/bootstrap-wysihtml5.js"></script> 
<script>
    $('.textarea_editor').wysihtml5();
</script>