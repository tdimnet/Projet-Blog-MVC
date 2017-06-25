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
  $request = $bdd->prepare('SELECT * from comments WHERE article_id = :article_id');

  $request->bindParam(':article_id', $articleId, PDO::PARAM_INT);
  $request->execute();

  $commentsArray = [];
  while($donnees = $request->fetch()) {
    $Comments = new Comment($donnees);
    $commentsArray[] = $Comments;
  }
  return $commentsArray;
}


// Add a comment in relationship with the article_id
function addComment(Comment $Comment) {
  global $bdd;

  var_dump($Comment);

  $request = $bdd->prepare('INSERT INTO comments(full_name, comment, article_id, abusive) VALUES (:full_name, :comment, :article_id, :abusive_status)');

  $request->bindValue(':full_name', $Comment->getFull_name(), PDO::PARAM_STR);
  $request->bindValue(':comment', $Comment->getComment(), PDO::PARAM_STR);
  $request->bindValue(':article_id', $Comment->getArticle_id(), PDO::PARAM_INT);
  $request->bindValue(':abusive_status', $Comment->getAbusive(), PDO::PARAM_BOOL);
  $request->execute();
}
