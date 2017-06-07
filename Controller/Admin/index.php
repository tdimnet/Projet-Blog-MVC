<?php
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

$Article = new Article();
$articles = $Article->findAll();


if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  // Delete function
  if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
    $articleId = $_GET['id'];
    $Article->deleteArticle($articleId);
    header('Location: index.php');
  }
  // Publish function
  if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'publishArticle') {
    $articleId = $_GET['id'];
    $status = 1;
    $Article->publishArticle($articleId, $status);
    header('Location: index.php');
  }
}


require_once 'Vue/Admin/index.php';
