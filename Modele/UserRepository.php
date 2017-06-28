<?php
use Modele\User;

// Return the user from the database
function findUser($pseudo) {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
  $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
  $request->execute();

  while ($donnees = $request->fetch()) {
    $user = new User($donnees);
  }

  return $user;
}
