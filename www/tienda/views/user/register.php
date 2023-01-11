<h1>Registrarse</h1>
<div class="content-form">
    <form action="index.php?controller=user&action=save" method="POST">
        <input type="text" name="user_name" placeholder="Nombre de usuario" autofocus required>
        <input type="email" name="user_email" placeholder="Correo electrónico" autofocus required>
        <input type="text" name="user_address" placeholder="Dirección" autofocus required>
        <input type="password" name="user_password" placeholder="Contraseña" required>
        <input type="password" name="user_password_verify" placeholder="Repita la contraseña" required>
        <label for="user_role">Admin <input type="checkbox" name="user_role" value="admin" required></label>
        <label for="user_image">Imagen de perfil <input type="file" name="user_image" accept="image/png, image/jpeg"></label>
        <input type="submit" class="btn btn-black" value="Registrar">
    </form>
</div>