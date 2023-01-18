<?php
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

use tienda\core\Request;

$request = new Request;
$name = $request->query('name', 'World');

// Cambiar por Response
echo 'Hello ' . $name . '!<br>';