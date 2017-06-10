<?php
require_once 'Vue/Blog/connexion.php';

if (isset($_POST) && !empty($_POST)) {
  $identifier = htmlspecialchars($_POST['identifier']);
  $password = htmlspecialchars($_POST['password']);
  if (isset($identifier) && isset($password)) {
    session_start();
    $_SESSION['identifier'] = $identifier;
    $_SESSION['password'] = $password;
    header('Location: index.php?Controller=Admin');
  }
}
