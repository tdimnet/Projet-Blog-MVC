<?php

function findAll() {
  global $bdd;

  $request = $bdd->prepare('SELECT * FROM articles');
  $request->execute();

  $articles = $request->fetchAll();

  return $articles;
}
