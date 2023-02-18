<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?=ASSET_URL?>/css/styles.css">
        <title>{TITLE}</title>
    </head>
    <body>
        <div id="site-container">
            <header>
                <div id="logo">
                    <a href="/"><img src="<?=ASSET_URL?>/logo.png" alt="logo"></a>
                </div>
                <nav id="menu">
                    {MENU}
                </nav>
                <div id="user">
                    <div id="user-actions">
                        <a href="#">Carrito</a>
                        <a href="#">Salir</a>
                    </div>
                    <div id="user-img">
                        <a href="#"><img src="<?=ASSET_URL?>/logo.png" alt="profile"></a>
                        <p>Username</p>
                    </div>
                </div>
            </header>
            <main>
                <section id="content">
                    {CONTENT}
                </section>
            </main>
            <footer>
                {FOOTER}
            </footer>
        </div>
    </body>
</html>