<?php
require_once 'Vue/Blog/connexion.php';

if (isset($_POST) && !empty($_POST)) {
  $identifier = htmlspecialchars($_POST['identifier']);
  $password = htmlspecialchars($_POST['password']);
  if (isset($identifier) && isset($password)) {
    var_dump($_POST);
  }
}
