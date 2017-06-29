<?php
session_start();
use Modele\User;

require_once 'Modele/User.php';
require_once 'Modele/UserRepository.php';

// If a session already exists, check the variables
if (isset($_SESSION) && isset($_SESSION['identifier'])) {
  $user = findUser($_SESSION['identifier']);
  // Then if the user exists, go directly to the admin panel
  if ($user) {
    header('Location: index.php?Controller=Admin');
  }
// This case is when the form is submitted
} else if (isset($_POST) && !empty($_POST)) {
  // Decode the variables
  $identifier = htmlspecialchars($_POST['identifier']);
  $password = htmlspecialchars($_POST['password']);
  if (isset($identifier) && isset($password)) {
    $user = findUser($identifier);
    // Then do the verifications
    if (!$user || (sha1($password) !== $user->getPassword())) {
      header('Location: index.php?Controller=Blog&&Vue=connexion');
    } else {
      // Then start the session by adding the variables within the session
      session_start();
      $_SESSION['identifier'] = $identifier;
      header('Location: index.php?Controller=Admin');
    }
  }
}

require_once 'Vue/Blog/connexion.php';
