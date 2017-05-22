<?php
require_once 'Modele/config.php';

$controller = 'Blog';
if (!empty($_GET['controller'])) {
  $controller = $_GET['controller'];
}

$vue = 'index';
if (!empty($_GET['vue'])) {
  $vue = $_GET['vue'];
}

$path = 'Controller/'.$controller.'/'.$vue.'.php';

if (file_exists($path)) {
  require_once $path;
} else {
  echo '<h1>Foo</h1>';
}

// include_once 'Controller/Blog/index.php';
