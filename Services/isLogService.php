<?php
require_once 'Modele/User.php';

function isConnected($session) {
  var_dump($session);

  if (!isset($session['identifier']) || !isset($session['password'])) {
    header('Location: index.php?Controller=Blog');
  } else {
    $identifier = $session['identifier'];
    $password = $session['password'];
    $User = new User();
    $user = $User->findUser($identifier);
    if (!$user || (sha1($password) !== $user['password'])) {
      header('Location: index.php?Controller=Blog');
    }
  }
}
