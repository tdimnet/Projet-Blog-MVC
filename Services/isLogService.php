<?php
use Modele\User;
require_once 'Modele/User.php';
require_once 'Modele/UserRepository.php';

function isConnected($session) {
  // var_dump($session);

  // Pas besoin de stocker le mot de passe en session
  if (!isset($session['identifier'])) {
    header('Location: index.php?Controller=Blog');
  } else {
    $identifier = $session['identifier'];
    $user = findUser($identifier);
    if (!$user) {
      header('Location: index.php?Controller=Blog');
    }
  }
}
