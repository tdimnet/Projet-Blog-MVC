<?php

use Modele\User;

require_once 'Modele/User.php';
require_once 'Modele/UserRepository.php';
require_once 'Vue/Blog/connexion.php';

if (isset($_POST) && !empty($_POST)) {
  $identifier = htmlspecialchars($_POST['identifier']);
  $password = htmlspecialchars($_POST['password']);
  if (isset($identifier) && isset($password)) {
    $user = findUser($identifier);
    if (!$user || (sha1($password) !== $user->getPassword())) {
      header('Location: index.php?Controller=Blog&&Vue=connexion');
    } else {
      session_start();
      $_SESSION['identifier'] = $identifier;
      header('Location: index.php?Controller=Admin');
    }
  }
}
