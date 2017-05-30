<?php

// Return the list of all the articles
function findAll() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM articles');
  $request->execute();
  $articles = $request->fetchAll();
  return $articles;
}


// Return the article of match the id
function findOne($articleId) {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM articles WHERE id=:id');
  $request->bindParam(':id', $articleId, PDO::PARAM_INT);
  $request->execute();
  $article = $request->fetch();
  return $article;
}


// Write a new episode into the bdd
function addArticle($title, $episode, $created_at) {
  global $bdd;
  $request = $bdd->prepare('INSERT INTO articles(titre, episode, date_creation) VALUES (:titre, :episode, :date_creation)');
  $request->bindParam(':titre', $title, PDO::PARAM_STR);
  $request->bindParam(':episode', $episode, PDO::PARAM_STR);
  $request->bindParam(':date_creation', $created_at);
  $request->execute();
}
