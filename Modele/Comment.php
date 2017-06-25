<?php

namespace Modele;

class Comment
{
  private $id;
  private $fullName;
  private $comment;
  private $articleId;
  private $answerId;


  // Construct
  public function __construct(array $donnees = NULL)
  {
      if (!empty($donnees)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
      {
        $this->hydrate($donnees);
      }
  }

  // Hydratation
  public function hydrate(array $donnees = NULL)
  {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);

        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  public function getFullName() {
    return $this->fullName;
  }

  public function setFullName($fullName) {
    $this->fullName = $fullName;
    return $this;
  }


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
  function addComment($name, $comment, $articleId, $abusive) {
    global $bdd;
    $request = $bdd->prepare('INSERT INTO comments(full_name, comment, article_id, abusive) VALUES (:full_name, :comment, :article_id, :abusive_status)');
    $request->bindParam(':full_name', $name, PDO::PARAM_STR);
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

  // Signal the comment within the blog article view
  function unsignalComment($commentId, $abusive) {
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
