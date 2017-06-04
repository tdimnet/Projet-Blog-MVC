<?php
require_once 'Modele/Article.php';

$articleId = $_GET['id'];

$Article = new Article();
$article = $Article->findOne($articleId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['titre'];
  $episode = $_POST['episode'];
  $status = $_POST['status'];

  $Article->updateArticle($title, $episode, $status, $articleId);

  header('Location: index.php');
}

require_once 'Vue\Admin\modifyArticle.php';
