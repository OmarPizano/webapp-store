<div class="crud">
    <div class="crud-ops">
        <a class="btn black" href="/product/new">Agregar</a>
        <form action="/product/admin" method="POST">
            <input class="btn black" type="submit" value="Buscar">
            <input type="text" name="search" value="<?=$search?>" required/>
        </form>
    </div>
    <table>
        <tr>
            <?php foreach ($crud_names as $key => $name) : ?>
            <th><?=$name?></th>
            <?php endforeach; ?>
            <th>Operaciones</th>
        </tr>
        <?php foreach ($products as $p): ?>
        <tr>
            <?php foreach ($crud_names as $key => $name) : ?>
                <?php if (str_contains(strtolower($name), 'image'))  :?>
                    <td>
                        <img src="<?=ASSET_URL . $p->{$key} ?>" alt="product">
                    </td>
                <?php else :?>
                    <td><?=$p->{$key}?></th>
                <?php endif?>
            <?php endforeach; ?>
            <td>
                <div class="item-ops">
                    <a class="btn black" href="/product/edit/<?= $p->id ?>">Editar</a>
                    <a class='btn red' href="/product/delete/<?= $p->id ?>">Eliminar</a>
                </div>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
