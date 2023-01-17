<?
use tienda\core\ui\layout\Header;

Header::logo(BASE_URL . '/public/assets/logo.png');
Header::nav_start();
Header::nav_item(BASE_URL . '/', 'Inicio');
Header::nav_item(BASE_URL . '#', 'Categoría 1');
Header::nav_item(BASE_URL . '#', 'Categoría 2');
Header::nav_item(BASE_URL . '#', 'Categoría 3');
Header::nav_item(BASE_URL . '#', 'Categoría 4');
Header::nav_end();