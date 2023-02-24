<?php if ($id) : ?>
    <a href="/logout" class="btn black">Salir</a>
    <a class="user-profile" href="/profile">
        <img src="<?= ASSET_URL . $user_image?>" alt="profile">
        <p><?=$user_name?></p>
    </a>
<?php else :?>
    <a href="/login" class="btn normal">Iniciar Sesión</a>
    <a href="/signup" class="btn black">Registrarse</a>
<?php endif ?>