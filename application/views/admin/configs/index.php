
<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Posts</a> <a href="#" class="current">Tables</a> </div>
    <h1>Listado</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Listado de Configs</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Config</th>
                                <th>Valor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($configs_list as $row): ?>
                                <tr class="gradeX">
                                    <td><?= $row->name ?></td>
                                    <td><?= $row->value ?></td>
                                    <td><a href="<?= panel_url("configs/add/" . $row->config_id) ?>" class="btn btn-success btn-mini"><i class="icon-pencil"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
