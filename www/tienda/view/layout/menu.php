<?
$model->selectAll();
$top = $model->getTop();
?>
<ul>
    <? if (tienda\core\Session::get('admin')) : ?>
        <li><a class="btn normal" href="/product/admin">Productos</a></li>
    <? else : ?>
        <li><a class="btn normal" href="/product/search">Buscar</a></li>
        <? foreach ($top as $category) : ?>
            <li><a class="btn normal" href="/category/<?= $category->id ?>"><?= $category->category_name ?></a></li>
        <? endforeach ?>
    <? endif ?>
    <li><a class="btn normal" href="/about">Acerca De</a></li>
</ul>