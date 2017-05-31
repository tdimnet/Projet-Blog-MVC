<?php

require_once 'Modele/articles.php';

// If a new article has been posted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  var_dump($_POST);
  $title = $_POST['titre'];
  $episode = $_POST['episode'];
  $created_at = new \DateTime();
  $status = $_POST['status'];
  $created_at = $created_at->format('Y-m-d H:i:s');

  // We add the article into the data base
  addArticle($title, $episode, $created_at, $status);

  // Then we redirect the user
  header('Location: index.php');
}


require_once 'Vue\Admin\newArticle.php';
