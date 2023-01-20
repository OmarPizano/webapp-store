<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/styles.css">
        <title>{TITLE}</title>
    </head>
    <body>
        <div id="site-container">
            <header>
                <div id="logo">
                    <a href="/"><img src="assets/logo.png" alt="logo"></a>
                </div>
                <nav id="menu">
                    {MENU}
                </nav>
            </header>
            <main>
                <aside>
                    <div id="user">
                        <h1>{USER-TITLE}</h1>
                        {USER}
                    </div>
                </aside>
                <section id="content">
                    <h1>{CONTENT-TITLE}</h1>
                    {CONTENT}
                </section>
            </main>
            <footer>
                {FOOTER}
            </footer>
        </div>
    </body>
</html>