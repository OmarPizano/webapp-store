<?
use tienda\core\ui\layout\Layout;

Layout::create(
   BASE_URL.'/public/assets/css/styles.css',
   'Tienda LOGO',
   $header,
   $sidebar,
   $content,
   $footer
);