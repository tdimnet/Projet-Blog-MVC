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
  // var_dump($articlesArray);
  return $articlesArray;
}

// Return the list of articles of have been published
function findAllPublished() {
  global $bdd;

  $request = $bdd->prepare('SELECT * FROM articles WHERE status = 1');
  $request->execute();

  $articlesArray = [];
  while($donnees = $request->fetch()) {
    $article = new Article($donnees);
    $articlesArray[] = $article;
  }
  // var_dump($articlesArray);
  return $articlesArray;
}

// Return the article which matchs the id
function findOne($articleId) {
  global $bdd;

  $request = $bdd->prepare('SELECT * FROM articles WHERE id=:id');
  $request->bindParam(':id', $articleId, PDO::PARAM_INT);
  $request->execute();

  while ($donnees = $request->fetch()) {
    $article = new Article($donnees);
  }

  return $article;
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


// Update the article
function updateArticle(Article $Article) {
  global $bdd;
  $request = $bdd->prepare('UPDATE articles SET titre = :new_titre, episode = :new_episode, status = :new_status WHERE id = :article_id');

  $request->bindValue(':new_titre', $Article->getTitre(), PDO::PARAM_STR);
  $request->bindValue(':new_episode', $Article->getEpisode(), PDO::PARAM_STR);
  $request->bindValue(':new_status', $Article->getStatus(), PDO::PARAM_BOOL);
  $request->bindValue(':article_id', $Article->getId(), PDO::PARAM_INT);

  $request->execute();
}


// Publish the article
function publishArticle(Article $Article) {
  global $bdd;
  $Article->setStatus(1);

  $request = $bdd->prepare('UPDATE articles SET status = :new_status WHERE id = :article_id');

  $request->bindValue(':new_status', $Article->getStatus(), PDO::PARAM_BOOL);
  $request->bindValue(':article_id', $Article->getId(), PDO::PARAM_INT);
  $request->execute();
}


// Delete an existing article
function deleteArticle(Article $Article) {
  global $bdd;
  var_dump($Article);

  $request = $bdd->prepare('DELETE FROM articles WHERE id= :article_id');

  $request->bindValue(':article_id', $Article->getId(), PDO::PARAM_INT);
  $request->execute();
}
