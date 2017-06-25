<?php
require_once 'Modele/User.php';

function isConnected($session) {
  // var_dump($session);

  // Pas besoin de stocker le mot de passe en session
  if (!isset($session['identifier'])) {
    header('Location: index.php?Controller=Blog');
  } else {
    $identifier = $session['identifier'];
    $User = new User();
    $user = $User->findUser($identifier);
    if (!$user) {
      header('Location: index.php?Controller=Blog');
    }
  }
}
