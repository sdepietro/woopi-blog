<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="<?= check_active('dashboard') ?>">
            <a href="<?= panel_url() ?>dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a>
        </li>
        
        <li class="<?= check_active('categories') ?>">
            <a href="<?= panel_url() ?>categories"><i class="icon icon-th-list"></i> <span>Categorías</span></a> 
        </li>
        
        <li class="<?= check_active('posts') ?>">
            <a href="<?= panel_url() ?>posts"><i class="icon icon-pencil"></i> <span>Posts</span></a> 
        </li>
        <hr>
        <li class="">
            <a href="<?= base_url('no_subir/matrix_template/') ?>" target="_blank"><i class="icon icon-circle"></i> <span>Template Backend</span></a> 
        </li>
    </ul>
</div>