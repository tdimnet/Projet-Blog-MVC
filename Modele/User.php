<?php
class User
{
  private $pseudo;
  private $password;

  function findUser($pseudo) {
    global $bdd;
    $request = $bdd->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
    $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $request->execute();
    $user = $request->fetch();
    return $user;
  }
}
