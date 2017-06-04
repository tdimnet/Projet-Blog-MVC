<?php
require_once 'Modele/Article.php';
require_once 'Modele/comments.php';

$Article = new Article;
$articles = $Article->findAll();

// Delete function
if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
    $articleId = $_GET['id'];
    $Article->deleteArticle($articleId);
    header('Location: index.php');
  }
}



require_once 'Vue/Admin/index.php';
