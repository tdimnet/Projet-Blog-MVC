<?php
require_once 'Modele/config.php';

// If the url does not have a controller parameter
if (!empty($_GET) && !isset($_GET['Controller'])) {
  header('Location: index.php');
}

$controller = 'Blog';
if (!empty($_GET['Controller'])) {
  $controller = str_replace(['.', '/', '\\'], '', $_GET['Controller']);
}

$vue = 'index';
if (!empty($_GET['Vue'])) {
  $vue = $_GET['Vue'];
}

$path = 'Controller/'.$controller.'/'.$vue.'.php';
// var_dump($path);


if (file_exists($path)) {
  require_once $path;
} else {
  header('Location: index.php');
}
