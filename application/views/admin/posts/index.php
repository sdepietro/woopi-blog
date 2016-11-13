<div id="content-header">
    <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Posts</a> <a
            href="#" class="current">Tables</a></div>
    <h1>Listado</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                    <h5>Listado de Posts</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Título</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($post_list as $row): ?>
                            <tr class="gradeX">
                                <td><?= spanish_date($row->created_date) ?></td>
                                <td><?= $row->title ?></td>
                                <td>
                                    <a href="<?= panel_url("posts/add/" . $row->post_id) ?>"
                                       class="btn btn-success btn-mini"><i class="icon-pencil"></i></a>
                                    <a href="#" onclick="eliminar_registro(<?= $row->post_id ?>)"
                                       class="btn btn-warning btn-mini"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                <hr>
                <div class="widget-content">
                    <a class="btn btn-primary" href="<?= panel_url('posts/add') ?>">Agregar Post</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function eliminar_registro(id) {
        $('#div-mail').addClass(' has-error ');
        $('#formulario-titulo').html('Eliminar Reghistro');
        $('#formulario-mensaje').html('¿Desea eliminar este registro?.');
        $("#btn-eliminar").attr("href", "<?= panel_url() ?>posts/del/" + id)
        $('#popup-eliminar').modal();
        $('#btn-submit').addClass('disabled');
    }

</script>
