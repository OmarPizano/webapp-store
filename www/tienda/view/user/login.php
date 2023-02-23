<form class="login-form" action="/login" method="POST">
    <div>
        <label for="username">Usuario</label>
        <input type="text" name="user_name" id="username" value="<?= $model->user_name ?>" required autofocus>
    </div>
    <div>
        <label for="username">Contraseña</label>
        <input type="password" name="user_password" id="username" required>
    </div>
    <input class="btn black" type="submit" name="submit" value="Entrar">
</form>