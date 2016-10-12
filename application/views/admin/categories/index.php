
<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Posts</a> <a href="#" class="current">Tables</a> </div>
    <h1>Listado</h1>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Listado de Categorías</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories_list as $row): ?>
                                <tr class="gradeX">
                                    <td><?= $row->title ?></td>
                                    <td><a href="<?= panel_url("categories/add/" . $row->category_id) ?>" class="btn btn-success btn-mini"><i class="icon-pencil"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                <hr>
                <div class="widget-content">
                    <a class="btn btn-primary" href="<?= panel_url('categories/add') ?>">Agregar Categoría</a>
                </div>
            </div>
        </div>
    </div>
</div>
