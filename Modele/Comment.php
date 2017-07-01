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
  private $answers;


  // Construct
  public function __construct(array $donnees = NULL, $alias = NULL, $numAlias = NULL)
  {
      $this->answers = [];
      if (!empty($donnees)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
      {
        $this->hydrate($donnees, $alias, $numAlias);
      }
  }

  // Hydratation
  public function hydrate(array $donnees = NULL, $alias = NULL, $numAlias = NULL)
  {
      foreach ($donnees as $key => $value)
      {
        $prefix = '';
        if ($alias !== NULL) {
          $prefix .= $alias;
          if ($numAlias !== NULL) {
            $prefix .= $numAlias;
          }
          $prefix .= '_';
          $key = str_replace($prefix, '', $key);
        }

        $method = 'set'.ucfirst($key);

        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
      if ($alias !== NULL && $numAlias !== NULL) {
        if ($donnees[$alias.($numAlias+1).'_id'] !== NULL) {
          $comment = new Comment($donnees, 'c', $numAlias+1);
          if (isset($this->answers[$comment->getId()])) {
            $this->answers[$comment->getId()]->fusion($comment);
          } else {
            $this->addAnswer(new Comment($donnees, 'c', $numAlias+1));
          }
        }
      }
  }


    public function fusion(Comment $comment) {
      foreach ($comment->getAnswers() as $key => $value) {
        if (isset($this->getAnswers()[$key])) {
          $this->getAnswers()[$key]->fusion($value);
        } else {
          $this->addAnswer($value);
        }
      }
    }

    public function getAnswers() {
      return $this->answers;
    }

    public function addAnswer($answer) {
      $this->answers[$answer->getId()] = $answer;
      return $this;
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

  public function getFullName() {
    return $this->fullName;
  }

  public function setFullName($fullName) {
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
}
