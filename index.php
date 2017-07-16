<?php
require_once 'Modele/config.php';
require_once 'Services/flashMessagesService.php';

session_start();
if (isset($_SESSION['flashbag'])) {
  $flashMessage = getFlash();
}

$controller = 'Blog';
if (!empty($_GET['Controller'])) {
  $controller = str_replace(['.', '/', '\\'], '', $_GET['Controller']);
}

$vue = 'index';
if (!empty($_GET['Vue'])) {
  $vue = str_replace(['.', '/', '\\'], '', $_GET['Vue']);
}

$path = 'Controller/'.$controller.'/'.$vue.'.php';

if (file_exists($path)) {
  require_once $path;
} else {
  header('Location: index.php');
}
