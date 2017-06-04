<?php
require_once 'Modele/articles.php';
require_once 'Modele/comments.php';

$articles = findAll();

// Delete function
if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
    $articleId = $_GET['id'];
    deleteArticle($articleId);
    header('Location: index.php');
  }
}



require_once 'Vue/Admin/index.php';
