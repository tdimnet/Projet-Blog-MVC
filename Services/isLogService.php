<?php
use Modele\User;
require_once 'Modele/User.php';
require_once 'Modele/UserRepository.php';

// Check if the user is connected or not within the admin panel
function isConnected($session) {
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
