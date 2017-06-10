<?php
require_once 'Vue/Blog/connexion.php';

if (isset($_POST)) {
  $identifier = htmlspecialchars($_POST['identifier']);
  $password = htmlspecialchars($_POST['password']);
  if (isset($identifier) && isset($password)) {
    header('Location: index.php?Controller=Admin');
  }
}
