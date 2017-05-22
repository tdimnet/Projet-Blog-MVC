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
  $request->bindParam(':id', $id, PDO::PARAM_INT);
  $request->execute();

  $article = $request->fetch();

  return $article;
}
