<?php

namespace Modele;

class Article
{
  private $id;
  private $titre;
  private $episode;
  private $date_creation;
  private $status;

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

  public function setTitre($titre) {
    $this->titre = $titre;
    return $this;
  }

  public function getTitre() {
    return $this->titre;
  }

  public function setEpisode($episode) {
    $this->episode = $episode;
    return $this;
  }

  public function getEpisode() {
    return $this->episode;
  }

  public function getCreatedDate() {
    return $this->date_creation;
  }

  public function setCreatedDate($date_creation) {
    $this->date_creation = $date_creation;
    return $this;
  }

  public function setStatus($status) {
    $this->status = $status;
    return $this;
  }

  public function getStatus() {
    return $this->status;
  }
}
