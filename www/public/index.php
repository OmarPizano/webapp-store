<?php
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Request;

// Controlador frontal
$mvc = Request::getMvcArray();
if ($mvc) {
    $controller_name = 'tienda\controllers\\' . ucfirst($mvc['controller']) . 'Controller';
    if (class_exists($controller_name)) {
        $controller = new $controller_name;
        if (isset($mvc['action']) && method_exists($controller, $mvc['action'])) {
            $controller->{$mvc['action']}();
        } else { 
            // echo 'ERROR: El método no existe en la clase del controlador o no
            // fué indicado<br>';
            // TODO: cargar un método 'index()' por defecto?
            $error = new tienda\controllers\ErrorController();
            $error->notFound();
        }
    } else {
        // echo 'ERROR: La clase del controlador no existe<br>';
        $error = new tienda\controllers\ErrorController();
        $error->notFound();
    }
} else {
    // mostrar por defecto los productos destacados
    // TODO: usar las constantes de app_config
    $controller = new tienda\controllers\ProductController();
    $controller->featured();
}
