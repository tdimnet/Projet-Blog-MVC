<?php

namespace Modele;

class Comment
{
  private $id;
  private $fullName;
  private $comment;
  private $articleId;
  private $answerId;
  private $abusive;


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

  public function getFull_name() {
    return $this->fullName;
  }

  public function setFull_name($fullName) {
    $this->fullName = $fullName;
    return $this;
  }

  public function getComment() {
    return $this->comment;
  }

  public function setComment($comment) {
    $this->comment = $comment;
    return $this;
  }

  public function getArticle_id() {
    return $this->article_id;
  }

  public function setArticle_id($article_id) {
    $this->article_id = $article_id;
    return $this;
  }

  public function getAnswer_id() {
    return $this->answer_id;
  }

  public function setAnswer_id($answer_id) {
    $this->answer_id = $answer_id;
    return $this;
  }

  public function getAbusive() {
    return $this->abusive;
  }

  public function setAbusive($abusive) {
    $this->abusive = $abusive;
    return $this;
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
}
