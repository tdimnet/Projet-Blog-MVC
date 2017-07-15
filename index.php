<?php
require_once 'Modele/config.php';


// Inclure ici les flash message services plutôt que d'en chaque fichier
// Autrement dit :
  // => session_start()
  // flash_message
  // If (isset(session flashbag))


// If the url does not have a controller parameter
  // A virer
if (!empty($_GET) && !isset($_GET['Controller'])) {
  header('Location: index.php');
}
  // Fin à virer

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
