<?php

// Return all the comments of all articles
function findAllComments() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM comments');
  $request->execute();
  $comments = $request->fetchAll();
  return $comments;
}


// Return only the comments which match the articleId
function findCommentByArticle($articleId) {
  global $bdd;
  $request = $bdd->prepare('SELECT * from comments WHERE article_id=:article_id');
  $request->bindParam(':article_id', $articleId, PDO::PARAM_INT);
  $request->execute();
  $comments = $request->fetchAll();
  return $comments;
}


// Return the answers to a comments
function findAnsweringComment($commentId) {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM comments WHERE answer_id=:answer_id');
  $request->bindParam(':answer_id', $commentId, PDO::PARAM_INT);
  $request->execute();
  $answers = $request->fetchAll();
  return $answers;
}
