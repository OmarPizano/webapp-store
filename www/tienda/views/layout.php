<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/styles.css">
        <title>{TITLE}</title>
    </head>
    <body>
        <!-- header -->
        <div id="site-container">
            <header>
                <div id="logo">
                    {LOGO}
                </div>
                <!-- menu -->
                <nav id="menu">
                    {MENU}
                </nav>
            </header>
            <main>
                <!-- barra lateral -->
                <aside>
                    <div id="user">
                        <h1>{USER-TITLE}</h1>
                        {USER}
                    </div>
                </aside>
                <!-- contenido -->
                <section id="content">
                    <h1>{CONTENT-TITLE}</h1>
                    {CONTENT}
                </section>
                <!-- footer -->
            </main>
            <footer>
                <p>LOGO Company &copy <?=date('Y')?></p>
            </footer>
        </div>
    </body>
</html>