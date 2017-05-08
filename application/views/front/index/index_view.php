<?php if (!empty($category_id)): ?>
    <h1 class="page-header">
        <?= $category_title ?>
    </h1>
<?php endif; ?>

<?php foreach ($posts_list as $post): ?>
    <h2>
        <a href="<?= base_url('post/id/' . $post->post_id) ?>"><?= $post->title ?></a>
    </h2>
    <p class="lead">
        Autor: <a href="#"><?= $post->user_name ?> <?= $post->last_name ?></a>
    <?php if (empty($category_id)): ?>
        | Categoría: <a href="<?= base_url('category/id/'.$post->category_id) ?>"><?= $post->category_name ?></a>
    <?php endif; ?>

    </p>
    <p><span class="glyphicon glyphicon-time"></span> Publicado: <?= date("d/m/Y", strtotime($post->date)) ?></p>
    <hr>
    <!--    <img class="img-responsive" src="http://placehold.it/900x300" alt="">-->
    <img class="img-responsive" src="<?= base_url('assets/img/posts/') . $post->image ?>" alt="">
    <hr>
    <p><?= substr($post->text, 0, 400) ?>...</p>
    <a class="btn btn-primary" href="<?= base_url('post/id/' . $post->post_id) ?>">Seguir leyendo <span
                class="glyphicon glyphicon-chevron-right"></span></a>
    <hr>
<?php endforeach; ?>


<ul class="pager">
    <?php if ($page > 1): ?>
        <li class="previous">
            <?php if (empty($category_id)): ?>
                <a href="<?= base_url('home/page/' . ($page - 1)) ?>">&larr; Mas nuevos</a>
            <?php else: ?>
                <a href="<?= base_url('category/id/' . $category_id . '/' . ($page - 1)) ?>">&larr; Mas nuevos</a>
            <?php endif; ?>
        </li>
    <?php endif; ?>

    <?php if ($show_next): ?>
        <li class="next">
            <?php if (empty($category_id)): ?>
                <a href="<?= base_url('home/page/' . ($page + 1)) ?>">Anteriores &rarr;</a>
            <?php else: ?>
                <a href="<?= base_url('category/id/' . $category_id . '/' . ($page + 1)) ?>">Anteriores &rarr;</a>
            <?php endif; ?>
        </li>
    <?php endif; ?>
</ul>