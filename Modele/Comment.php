<?php
class Comment
{
  private $id;
  private $fullName;
  private $emailAddress;
  private $comment;
  private $articleId;
  private $answerId;


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
  function addComment($name, $email_address, $comment, $articleId, $abusive) {
    global $bdd;
    $request = $bdd->prepare('INSERT INTO comments(full_name, email_address, comment, article_id, abusive) VALUES (:full_name, :email_address, :comment, :article_id, :abusive_status)');
    $request->bindParam(':full_name', $name, PDO::PARAM_STR);
    $request->bindParam(':email_address', $email_address, PDO::PARAM_STR);
    $request->bindParam(':comment', $comment, PDO::PARAM_STR);
    $request->bindParam(':article_id', $articleId, PDO::PARAM_INT);
    $request->bindParam(':abusive_status', $abusive, PDO::PARAM_BOOL);
    $request->execute();
  }

  // Moderate the comment by adding a default text
  function moderateComment($commentId, $text) {
    global $bdd;
    $request = $bdd->prepare('UPDATE comments SET comment = :new_comment WHERE id = :comment_id');
    $request->bindParam(':new_comment', $text, PDO::PARAM_STR);
    $request->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
    $request->execute();
  }

  // Signal the comment within the blog article view
  function signalComment($commentId, $abusive) {
    global $bdd;
    $request = $bdd->prepare('UPDATE comments SET abusive = :new_status WHERE id = :comment_id');
    $request->bindParam(':new_status', $abusive, PDO::PARAM_BOOL);
    $request->bindParam('comment_id', $commentId, PDO::PARAM_INT);
    $request->execute();
  }


  // Retrieve all the signal comments
  function retrieveSignaledComments() {
    global $bdd;
    $request = $bdd->prepare('SELECT * FROM comments WHERE abusive = 1');
    $request->execute();
    $signaledComments = $request->fetchAll();
    return $signaledComments;
  }
}
