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


// Add a comment in relationship with the article_id
function addComment($name, $email_address, $comment, $articleId) {
  global $bdd;
  $request = $bdd->prepare('INSERT INTO comments(full_name, email_address, comment, article_id) VALUES (:full_name, :email_address, :comment, :article_id)');
  $request->bindParam(':full_name', $name, PDO::PARAM_STR);
  $request->bindParam(':email_address', $email_address, PDO::PARAM_STR);
  $request->bindParam(':comment', $comment, PDO::PARAM_STR);
  $request->bindParam(':article_id', $articleId, PDO::PARAM_INT);
  $request->execute();
}
