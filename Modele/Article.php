<?php
class Article
{
  private $id;
  private $title;
  private $episode;
  private $created_at;
  private $status;

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($newTitle) {
    $this->title = $newTitle;
  }

  public function getEpisode() {
    return $this->episode;
  }

  public function setEpisode($newEpisode) {
    $this->episode = $newEpisode;
  }

  public function getCreatedDate() {
    return $this->created_at;
  }

  public function getStatus() {
    return $this->status;
  }

  public function setStatus($newStatus) {
    $this->status = $newStatus;
  }

  // Return the list of all the articles
  public function findAll() {
    global $bdd;
    $request = $bdd->prepare('SELECT * FROM articles');
    $request->execute();
    $articles = $request->fetchAll();
    return $articles;
  }

  // Return the list of articles of have been published
  function findAllPublished() {
    global $bdd;
    $request = $bdd->prepare('SELECT * FROM articles WHERE status = 1');
    $request->execute();
    $articles = $request->fetchAll();
    return $articles;
  }

  // Return the article of match the id
  function findOne($articleId) {
    global $bdd;
    $request = $bdd->prepare('SELECT * FROM articles WHERE id=:id');
    $request->bindParam(':id', $articleId, PDO::PARAM_INT);
    $request->execute();
    $article = $request->fetch();
    return $article;
  }

  // Write a new episode into the bdd
  function addArticle($title, $episode, $created_at, $status) {
    global $bdd;
    $request = $bdd->prepare('INSERT INTO articles(titre, episode, date_creation, status) VALUES (:titre, :episode, :date_creation, :status)');
    $request->bindParam(':titre', $title, PDO::PARAM_STR);
    $request->bindParam(':episode', $episode, PDO::PARAM_STR);
    $request->bindParam(':date_creation', $created_at);
    $request->bindParam(':status', $status, PDO::PARAM_BOOL);
    $request->execute();
  }

  // Update the article
  function updateArticle($title, $episode, $status, $articleId) {
    global $bdd;
    $request = $bdd->prepare('UPDATE articles SET titre = :new_titre, episode = :new_episode, status = :new_status WHERE id = :article_id');
    $request->bindParam(':new_titre', $title, PDO::PARAM_STR);
    $request->bindParam(':new_episode', $episode, PDO::PARAM_STR);
    $request->bindParam(':new_status', $status, PDO::PARAM_BOOL);
    $request->bindParam(':article_id', $articleId, PDO::PARAM_INT);
    $request->execute();
  }

  // Delete an existing article
  function deleteArticle($articleId) {
    global $bdd;
    $request = $bdd->prepare('DELETE FROM articles WHERE id=:id');
    $request->bindParam(':id', $articleId, PDO::PARAM_INT);
    $request->execute();
  }
}
