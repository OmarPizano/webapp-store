<form class="signup-form" action="/signup" method="POST">
    <div>
        <label for="username">Usuario</label>
        <input type="text" name="user_name" id="username" value="<?= $model->user_name ?>" required autofocus>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="user_email" id="email" value="<?= $model->user_email ?>" required>
    </div>
    <div>
        <label for="address">Address</label>
        <input type="text" name="user_address" id="address" value="<?= $model->user_address ?>" required>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="user_password" id="password" required>
    </div>
    <div>
        <label for="password2">Verificar contraseña</label>
        <input type="password" name="user_password2" id="password2" required>
    </div>
    <input class="btn black" type="submit" name="submit" value="Registrar">
</form>