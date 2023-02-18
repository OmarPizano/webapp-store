<h1>Administración de Productos</h1>

<div id="crud_buttons">
    <a href="/product/new">Nuevo</a>
    <a href="/product/export">Exportar Todo</a>
    <a href="/product/delete">Borrar Todo</a>
</div>
<div id="crud_search">
    <?
    use tienda\core\ui\Form;
    Form::begin('/product/admin', 'POST', $model);
    Form::input('search', 'search', 'Buscar', 'required autofocus');
    Form::submit('Buscar', 'search_submit');
    Form::end();
    ?>
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