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
  $request = $bdd->prepare('SELECT * FROM comments ORDER BY id DESC LIMIT 0, 5');
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

function findCommentsWithAnsweringComments($articleId) {
  global $bdd;
  $request = $bdd->prepare('SELECT
    c0.id AS c0_id, c0.full_name AS c0_fullName, c0.comment AS c0_comment, c0.abusive AS c0_abusive,
    c1.id AS c1_id, c1.full_name AS c1_fullName, c1.comment AS c1_comment, c1.abusive AS c1_abusive,
    c2.id AS c2_id, c2.full_name AS c2_fullName, c2.comment AS c2_comment, c2.abusive AS c2_abusive,
    c3.id AS c3_id, c3.full_name AS c3_fullName, c3.comment AS c3_comment, c3.abusive AS c3_abusive
    FROM comments c0
    LEFT JOIN comments c1 ON c1.answer_id = c0.id
    LEFT JOIN comments c2 ON c2.answer_id = c1.id
    LEFT JOIN comments c3 ON c3.answer_id = c2.id
    WHERE c0.article_id = :article_id AND c0.answer_id IS NULL
  ');
  $request->bindParam(':article_id', $articleId, PDO::PARAM_INT);
  $request->execute();

  $commentsTable = [];
  while ($donnees = $request->fetch()) {
    $comment = new Comment($donnees, 'c', 0);
    if (isset($commentsTable[$comment->getId()])) {
      $commentsTable[$comment->getId()]->fusion($comment);
    } else {
      $commentsTable[$comment->getId()] = $comment;
    }
  }

  return $commentsTable;
}

// Add a comment in relationship with the article_id
function addComment(Comment $Comment) {
  global $bdd;

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
  $comment->setModerate(1);
  $request = $bdd->prepare('UPDATE comments SET moderate = :new_moderate WHERE id = :comment_id');
  $request->bindValue(':new_moderate', $comment->getModerate(), PDO::PARAM_BOOL);
  $request->bindValue(':comment_id', $comment->getId(), PDO::PARAM_INT);
  $request->execute();
}


// Retrieve the original state of the comment
function unmoderateComment($commentId) {
  global $bdd;
  $comment = findOneComment($commentId);
  $comment->setModerate(0);
  $request = $bdd->prepare('UPDATE comments SET moderate = :new_moderate WHERE id = :comment_id');
  $request->bindValue(':new_moderate', $comment->getModerate(), PDO::PARAM_BOOL);
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
