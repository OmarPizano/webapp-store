<h1>Registrarse</h1>
<div class="content-form">
    <form action="<?=BASE_URL?>/user/save" method="POST">
        <input type="text" name="user_name" placeholder="Nombre de usuario" autofocus required>
        <input type="email" name="user_email" placeholder="Correo electrónico" autofocus required>
        <input type="text" name="user_address" placeholder="Dirección" autofocus required>
        <input type="password" name="user_password" placeholder="Contraseña" required>
        <input type="password" name="user_password2" placeholder="Repita la contraseña" required>
        <input type="submit" class="btn btn-black" value="Registrar">
    </form>
</div>