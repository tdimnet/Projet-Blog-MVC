<?php
require_once 'Modele/articles.php';

$articleId = $_GET['id'];

$article = findOne($articleId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  var_dump($_POST, $articleId);
  $title = $_POST['titre'];
  $episode = $_POST['episode'];
  $status = $_POST['status'];

  updateArticle($title, $episode, $status, $articleId);

  header('Location: index.php');
}

require_once 'Vue\Admin\modifyArticle.php';
