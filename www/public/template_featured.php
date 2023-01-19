<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/styles.css">
        <title>Tienda LOGO</title>
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
                        <li><a href="#">Buscar</a></li>
                        <li><a href="#">Categoría 1</a></li>
                        <li><a href="#">Categoría 2</a></li>
                        <li><a href="#">Categoría 3</a></li>
                        <li><a href="#">Acerca De</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <!-- barra lateral -->
                <aside>
                    <div id="user">
                        <h1>Iniciar Sesión</h1>
                        <form action="#" method="POST">
                            <input type="email" name="email" placeholder="Ingresa tu email">
                            <input type="password" name="password" placeholder="Ingresa tu contraseña">
                            <input type="submit" class="btn btn-black" value="Entrar">
                        </form>
                        <a href="#" class="btn btn-normal">Registrarse</a>
                    </div>
                </aside>
                <!-- contenido -->
                <section id="content">
                    <h1>Productos Destacados</h1>
                    <div class="product-list">
                        <div class="product">
                            <img src="assets/logo.png" alt="item">
                            <div class="product-details">
                                <div class="product-price">
                                    <p class="price-current">$1000.00</p>
                                    <p class="price-discount">-50%</p>
                                </div>
                                <p class="price-original">$2000.00</p>
                                <div class="product-btns">
                                    <a href="#" class="btn btn-black">Comprar</a>
                                    <a href="#" class="btn btn-normal">+</a>
                                </div>
                                <div class="product-desc">
                                    <p>Nombre Producto Con Un Texto Largo Larguísimo</p>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <img src="assets/logo.png" alt="item">
                            <div class="product-details">
                                <div class="product-price">
                                    <p class="price-current">$1000.00</p>
                                    <p class="price-discount">-50%</p>
                                </div>
                                <p class="price-original">$2000.00</p>
                                <div class="product-btns">
                                    <a href="#" class="btn btn-black">Comprar</a>
                                    <a href="#" class="btn btn-normal">+</a>
                                </div>
                                <div class="product-desc">
                                    <p>Nombre Producto Corto</p>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <img src="assets/logo.png" alt="item">
                            <div class="product-details">
                                <div class="product-price">
                                    <p class="price-current">$1000.00</p>
                                    <p class="price-discount">-50%</p>
                                </div>
                                <p class="price-original">$2000.00</p>
                                <div class="product-btns">
                                    <a href="#" class="btn btn-black">Comprar</a>
                                    <a href="#" class="btn btn-normal">+</a>
                                </div>
                                <div class="product-desc">
                                    <p>Nombre Producto Corto</p>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <img src="assets/logo.png" alt="item">
                            <div class="product-details">
                                <div class="product-price">
                                    <p class="price-current">$1000.00</p>
                                    <p class="price-discount">-50%</p>
                                </div>
                                <p class="price-original">$2000.00</p>
                                <div class="product-btns">
                                    <a href="#" class="btn btn-black">Comprar</a>
                                    <a href="#" class="btn btn-normal">+</a>
                                </div>
                                <div class="product-desc">
                                    <p>Nombre Producto Corto</p>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <img src="assets/logo.png" alt="item">
                            <div class="product-details">
                                <div class="product-price">
                                    <p class="price-current">$1000.00</p>
                                    <p class="price-discount">-50%</p>
                                </div>
                                <p class="price-original">$2000.00</p>
                                <div class="product-btns">
                                    <a href="#" class="btn btn-black">Comprar</a>
                                    <a href="#" class="btn btn-normal">+</a>
                                </div>
                                <div class="product-desc">
                                    <p>Nombre Producto Corto</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- footer -->
            </main>
            <footer>
                <p>LOGO Company &copy <?=date('Y')?></p>
            </footer>
        </div>
    </body>
</html>