<?php $id = tienda\core\Session::get('user_id') ?>
<?php if ($id) : ?>
    <?php $user = $model->getUserByID($id) ?>
    <a href="/logout" class="btn black">Salir</a>
    <a class="user-profile" href="/profile">
        <img src="<?= ASSET_URL . $user->user_image?>" alt="profile">
        <p><?=$user->user_name?></p>
    </a>
<?php else :?>
    <a href="/login" class="btn normal">Iniciar Sesión</a>
    <a href="/signup" class="btn black">Registrarse</a>
<?php endif ?>