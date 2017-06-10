<?php
require_once 'Modele/config.php';

$controller = 'Blog';
if (!empty($_GET['Controller'])) {
  $controller = $_GET['Controller'];
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
  echo '<h1>Foo</h1>';
}
