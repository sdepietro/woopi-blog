<!-- Blog Search Well -->
<!--<div class="well">-->
<!--    <h4>Buscar</h4>-->
<!--    <div class="input-group">-->
<!--        <input type="text" class="form-control">-->
<!--        <span class="input-group-btn">-->
<!--            <button class="btn btn-default" type="button">-->
<!--                <span class="glyphicon glyphicon-search"></span>-->
<!--            </button>-->
<!--        </span>-->
<!--    </div>-->
<!--    <!-- /.input-group -->
<!--</div>-->

<!-- Blog Categories Well -->
<div class="well">
    <h4>Categorías</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php foreach ($categories_list as $category): ?>
                    <li>
                        <a href="<?= base_url('category/id/' . $category->category_id) ?>"><?= $category->title ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<!--<div class="well">-->
<!--    <h4>Side Widget Well</h4>-->
<!--    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>-->
<!--</div>-->