<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/styles.css">
        <title>Tienda Online</title>
    </head>
    <body>
        <!-- header -->
        <div id="site-container">
            <header>
                <div id="logo">
                    <a href="index.php"><img src="assets/logo.png" alt="logo"></a>
                </div>
                <!-- menu -->
                <nav id="menu">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Categoría 1</a></li>
                        <li><a href="#">Categoría 2</a></li>
                        <li><a href="#">Categoría 3</a></li>
                        <li><a href="#">Categoría 4</a></li>
                    </ul>
                </nav>
            </header>
            <div id="container">
                <!-- barra lateral -->
                <aside>
                    <div id="login">
                        <h3>Iniciar Sesión</h3>
                        <form action="#" method="POST">
                            <input type="email" name="email" placeholder="Ingresa tu email">
                            <input type="password" name="password" placeholder="Ingresa tu contraseña">
                            <input type="submit" value="Entrar">
                        </form>
                        <a href="#">Mis pedidos</a>
                        <a href="#">Mi perfil</a>
                        <a href="#">Cerrar sesión</a>
                    </div>
                </aside>
                <!-- contenido -->
                <div id="content">
                    <div class="product">
                        <img src="assets/logo.png" alt="item">
                        <h4>Nombre Producto</h4>
                        <p>$1323.33</p>
                        <a href="#">Comprar</a>
                        <a href="#">Carrito</a>
                    </div>
                    <div class="product">
                        <img src="assets/logo.png" alt="item">
                        <h4>Nombre Producto</h4>
                        <p>$1323.33</p>
                        <a href="#">Comprar</a>
                        <a href="#">Carrito</a>
                    </div>
                    <div class="product">
                        <img src="assets/logo.png" alt="item">
                        <h4>Nombre Producto</h4>
                        <p>$1323.33</p>
                        <a href="#">Comprar</a>
                        <a href="#">Carrito</a>
                    </div>
                </div>
                <!-- footer -->
                <footer>
                    <p>Omar Pizano &copy <?=date('Y')?></p>
                </footer>
            </div>
        </div>
    </body>
</html>