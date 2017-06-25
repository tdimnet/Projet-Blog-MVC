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


// Write a new episode into the bdd
function addArticle(Article $Article) {
  global $bdd;

  $request = $bdd->prepare('INSERT INTO articles(titre, episode, date_creation, status) VALUES (:titre, :episode, :date_creation, :status)');
  $request->bindValue(':titre', $Article->getTitre(), PDO::PARAM_STR);
  $request->bindValue(':episode', $Article->getEpisode(), PDO::PARAM_STR);
  $request->bindValue(':date_creation', $Article->getCreatedDate(), PDO::PARAM_STR);
  $request->bindValue(':status', $Article->getStatus(), PDO::PARAM_STR);

  $request->execute();
}
