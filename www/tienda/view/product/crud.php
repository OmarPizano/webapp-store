<? $products = $model->getProductList() ?>
<div class="crud">
    <div class="crud-ops">
        <a class="btn black" href="/product/new">Agregar</a>
        <form action="/product/admin" method="POST">
            <input class="btn black" type="submit" value="Buscar">
            <input type="text" name="search" value="<?=$model->search?>" required autofocus/>
        </form>
    </div>
    <table>
        <tr>
            <? foreach ($model->crud_names as $key => $name) : ?>
            <th><?=$name?></th>
            <? endforeach; ?>
            <th>Operaciones</th>
        </tr>
        <? foreach ($products as $p): ?>
        <tr>
            <? foreach ($model->crud_names as $key => $name) : ?>
                <? if (str_contains(strtolower($name), 'image'))  :?>
                    <td>
                        <img src="<?=ASSET_URL . $p->{$key} ?>" alt="product">
                    </td>
                <? else :?>
                    <td><?=$p->{$key}?></th>
                <? endif?>
            <? endforeach; ?>
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
