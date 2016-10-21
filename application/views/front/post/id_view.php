<h2>
    <?= $post->title ?>
</h2>
<p class="lead">
    Autor: <a href="index.php"><?= $post->user_name ?> <?= $post->last_name ?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span> Publicado: <?= date("d/m/Y", strtotime($post->date)) ?></p>
<hr>
<!--    <img class="img-responsive" src="http://placehold.it/900x300" alt="">-->
<img class="img-responsive" src="<?= base_url('assets/img/posts/') . $post->image ?>" alt="">
<hr>
<p><?= $post->text ?></p>

<a class="btn btn-primary" href="javascript:history.back()">Volver</a>
