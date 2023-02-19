<h1>Administración de Productos</h1>

<div id="crud_ops">
    <div id="crud_buttons">
        <a href="/product/new">Nuevo</a>
        <a href="/product/export">Exportar</a>
        <a href="/product/delete">Borrar</a>
    </div>
    <div id="crud_search">
        <form action="/product/admin", method="POST">
            <div class="input_wrapper">
                <input type="text" name="search" placeholder="Buscar" required autofocus/>
            </div>
            <input type="submit" value="Buscar" name="search_submit">
        </form>
    </div>
</div>
<div id="crud_items">
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
            <td><?= $p->getImage() ?></td>
            <td><?= $p->getName() ?></td>
            <td><?= $p->getCategoryID() ?></td>
            <td><?= $p->getStock() ?></td>
            <td><?= $p->getPrice() ?></td>
            <td><?= $p->getDiscount() ?></td>
            <td>
                Modificar
                Borrar
            </td>
        </tr>
        <? endforeach; ?>
    </table>
</div>