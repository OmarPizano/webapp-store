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
                <div class="page-title">
                    <h1>{VIEW_TITLE}</h1>
                </div>
                <div class="page-alert">
                    <? tienda\core\ui\UiHelper::checkAlert() ?>
                </div>
                <div class="page-content">
                    {CONTENT}
                </div>
            </main>
            <footer>
                {FOOTER}
            </footer>
        </div>
    </body>
</html>