<?php
require('../tienda/config/app_config.php');
require(BASE_DIR . '/tienda/config/db.php');
require(BASE_DIR . '/vendor/autoload.php');

$name = $_GET['name'] ?? 'World';

echo 'Hello ' . $name . '!<br>';