<form class="search-form" action="/product/search" method="POST">
    <div>
        <label for="pattern">Buscar</label>
        <input type="search" name="pattern" value="<?= $pattern ?>" required autofocus>
    </div>
    <input class="btn black" type="submit" name="submi_search" value="IR">
</form>