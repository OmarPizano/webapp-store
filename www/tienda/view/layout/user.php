<? $id = tienda\core\Session::get('user_id') ?>
<? if ($id) : ?>
    <? $user = $model->getUserByID($id) ?>
    <a href="/logout" class="btn black">Salir</a>
    <a class="user-profile" href="/profile">
        <img src="<?= ASSET_URL . $user->user_image?>" alt="profile">
        <p><?=$user->user_name?></p>
    </a>
<? else :?>
    <a href="/login" class="btn normal">Iniciar Sesión</a>
    <a href="/signup" class="btn black">Registrarse</a>
<? endif ?>