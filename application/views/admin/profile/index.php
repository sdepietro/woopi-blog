<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap-wysihtml5.css"/>


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
        <h1>Agregar Datos</h1>
    <?php else: ?>
        <h1>Editar Datos</h1>
    <?php endif; ?>

</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                    <?php if (empty($row)): ?>
                        <h5>Agregar Post</h5>
                    <?php else: ?>
                        <h5>Editar Post</h5>
                    <?php endif; ?>
                </div>

                <div class="widget-content nopadding">

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-error alert-block"><a class="close" data-dismiss="alert" href="#">×</a>
                            <h4 class="alert-heading">Error!</h4>
                            <?= $errors ?>
                        </div>
                    <?php endif; ?>
                    <?= form_open_multipart(panel_url() . "profile/insert", 'class="form-horizontal" id="frmAddPost"') ?>
                    <div class="control-group">
                        <label class="control-label">Nombre :</label>
                        <div class="controls">
                            <input type="text" name="name" class="span11"
                                   value="<?= (empty($row->name)) ? "" : $row->name ?>" placeholder="Título"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Apellido :</label>
                        <div class="controls">
                            <input type="text" name="last_name" class="span11"
                                   value="<?= (empty($row->last_name)) ? "" : $row->last_name ?>" placeholder="Título"/>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">e-mail (Usuario) :</label>
                        <div class="controls">
                            <input type="text" name="email" class="span11"
                                   value="<?= (empty($row->email)) ? "" : $row->email ?>" placeholder=""/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password Nueva:</label>
                        <div class="controls">
                            <input type="password" name="password" class="span11"
                                   value="" placeholder=""/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Repetor Password :</label>
                        <div class="controls">
                            <input type="password" name="repassword" class="span11"
                                   value="" placeholder=""/>
                        </div>
                    </div>
                    *Completar la password solo si desea cambiarla
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Guardar Datos</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/admin/js/bootstrap-wysihtml5.js"></script>
