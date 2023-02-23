<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?=ASSET_URL?>/css/styles.css">
        <title>{TITLE}</title>
    </head>
    <body>
        <div class="site-container">
            <header>
                <div class="logo">
                    <a href="/"><img src="<?=ASSET_URL?>/logo.png" alt="logo"></a>
                </div>
                <nav>
                    {MENU}
                </nav>
                <div class="user">
                    {USER}
                </div>
            </header>
            <main>
                {CONTENT}
            </main>
            <footer>
                {FOOTER}
            </footer>
        </div>
    </body>
</html>