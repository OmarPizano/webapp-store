<?
namespace tienda\core\ui\layout;

class Layout
{
    public static function create(
        string $css_path,
        string $title,
        string $header,
        string $sidebar,
        string $content,
        string $footer
    ){
        echo sprintf('
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="%s">
            <title>%s</title>
        </head>
        <body>
            <div id="site-container">
                <header>
                    %s
                </header>
                <main>
                    <aside>
                        %s
                    </aside>
                    <section id="content">
                        %s
                    </section>
                </main>
                <footer>
                    %s
                </footer>
            </div>
        </body>
        </html>
        ', $css_path, $title, $header, $sidebar, $content, $footer);
    }
}