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


// Retrieve all the articles
function findLatestComments() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM comments LIMIT 0, 5');
  $request->execute();
  $commentsArray = [];
  while($donnees = $request->fetch()) {
    $Comment = new Comment($donnees);
    $commentsArray[] = $Comment;
  }
  return $commentsArray;
}


// Retrieve all the signal comments
function findAllAbusiveComments() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM comments WHERE abusive = 1');
  $request->execute();

  $abusiveCommentsArray = [];
  while($donnees = $request->fetch()) {
    $Comment = new Comment($donnees);
    $abusiveCommentsArray[] = $Comment;
  }

  return $abusiveCommentsArray;
}

function findOneComment($commentId) {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM comments WHERE id = :id');
  $request->bindParam(':id', $commentId, PDO::PARAM_INT);
  $request->execute();
  while ($donnees = $request->fetch()) {
    $comment = new Comment($donnees);
  }
  return $comment;
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


// Moderate the comment by adding a default text
function moderateComment($commentId) {
  global $bdd;
  $comment = findOneComment($commentId);
  $comment->setComment('Ce commentaire a été modéré');
  $request = $bdd->prepare('UPDATE comments SET comment = :new_comment WHERE id = :comment_id');
  $request->bindValue(':new_comment', $comment->getComment(), PDO::PARAM_STR);
  $request->bindValue(':comment_id', $comment->getId(), PDO::PARAM_INT);
  $request->execute();
}


// Signal the comment within the blog article view
function signalComment($commentId) {
  global $bdd;
  $comment = findOneComment($commentId);
  $comment->setAbusive(1);
  $request = $bdd->prepare('UPDATE comments SET abusive = :new_status WHERE id = :comment_id');
  $request->bindValue(':new_status', $comment->getAbusive(), PDO::PARAM_BOOL);
  $request->bindValue('comment_id', $comment->getId(), PDO::PARAM_INT);
  $request->execute();
}


// Signal the comment within the blog article view
function unsignalComment($commentId) {
  global $bdd;

  $comment = findOneComment($commentId);
  $comment->setAbusive(0);

  $request = $bdd->prepare('UPDATE comments SET abusive = :new_status WHERE id = :comment_id');
  $request->bindValue(':new_status', $comment->getAbusive(), PDO::PARAM_BOOL);
  $request->bindValue('comment_id', $comment->getId(), PDO::PARAM_INT);
  $request->execute();
}
