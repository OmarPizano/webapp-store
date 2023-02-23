<div class="crud">
    <div class="crud-ops">
        <div class="crud-btns">
            <a class="btn black" href="/product/new">Nuevo</a>
            <a class="btn black" href="/product/export_all">Exportar</a>
            <a class="btn red" href="/product/delete_all">Borrar Todo</a>
        </div>
        <form class="crud-search" action="/product/main" method="POST">
            <input class="btn black" type="submit" value="Buscar" name="search_submit" form="search_form">
            <input type="text" name="search" placeholder="Buscar" required autofocus/>
        </form>
    </div>
    <?
    $products = $model->getProductList();
    ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Descuento</th>
            <th>Operaciones</th>
        </tr>
        <? foreach ($products as $p): ?>
        <tr>
            <td>
                <img src="<?=ASSET_URL . $p->getImage() ?>" alt="product">
            </td>
            <td><?= $p->getName() ?></td>
            <td><?= $p->getCategoryID() ?></td>
            <td><?= $p->getStock() ?></td>
            <td><?= $p->getPrice() ?></td>
            <td><?= $p->getDiscount() ?></td>
            <td>
                <div class="item-ops">
                    <a class="btn black" href="/product/edit/<?= $p->getID() ?>">Editar</a>
                    <a class='btn red' href="/product/delete/<?= $p->getID() ?>">Eliminar</a>
                </div>
            </td>
        </tr>
        <? endforeach; ?>
    </table>
</div>
