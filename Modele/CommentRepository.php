<?php
use Modele\Comment;

// Return all the comments of all articles
function findAllComments() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM comments');
  $request->execute();
  $commentsArray = [];
  while($donnees = $request->fetch()) {
    $Comment = new Comment($donnees);
    $commentsArray[] = $Comment;
  }
  return $commentsArray;
}

// Return only the comments which match the articleId
function findCommentByArticle($articleId) {
  global $bdd;

  $request = $bdd->prepare('SELECT * from comments WHERE article_id= :article_id');

  $request->bindParam(':article_id', $articleId, PDO::PARAM_INT);
  $request->execute();
  $comments = $request->fetchAll();
  
  return $comments;
}
