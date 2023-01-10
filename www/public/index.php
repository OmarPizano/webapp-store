<?php

require '../vendor/autoload.php';

// Controlador frontal
if (isset($_GET['controller'])) {
    $controller_name = $_GET['controller'] . 'Controller';
} else {
    echo 'ERROR: no se indica el controlador<br>';
    exit();
}
if (class_exists($controller_name)) {
    $controller = new $controller_name;
    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    } else { 
        echo 'ERROR: El método no existe en la clase del controlador<br>';
    }
} else {
    echo 'ERROR: La clase del controlador no existe<br>';
}