<?php

use Modele\Article;

// Retrieve all the articles
function findAll() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM articles');
  $request->execute();
  $articlesArray = [];

  while($donnees = $request->fetch()) {
    $article = new Article($donnees);
    $articlesArray[] = $article;
  }
  return $articlesArray;
}
