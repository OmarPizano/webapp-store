<ul>
    <?php if ($admin) : ?>
        <li><a class="btn normal" href="/product/admin">Productos</a></li>
    <?php else : ?>
        <li><a class="btn normal" href="/product/search">Buscar</a></li>
        <?php foreach ($categories as $cat) : ?>
            <li><a class="btn normal" href="/category/<?= $cat->id ?>"><?= $cat->category_name ?></a></li>
        <?php endforeach ?>
    <?php endif ?>
    <li><a class="btn normal" href="/about">Acerca De</a></li>
</ul>