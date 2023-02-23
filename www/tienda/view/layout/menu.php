<?php
$model->selectAll();
$top = $model->getTop();
?>
<ul>
    <?php if (tienda\core\Session::get('admin')) : ?>
        <li><a class="btn normal" href="/product/admin">Productos</a></li>
    <?php else : ?>
        <li><a class="btn normal" href="/product/search">Buscar</a></li>
        <?php foreach ($top as $category) : ?>
            <li><a class="btn normal" href="/category/<?= $category->id ?>"><?= $category->category_name ?></a></li>
        <?php endforeach ?>
    <?php endif ?>
    <li><a class="btn normal" href="/about">Acerca De</a></li>
</ul>