<?php

require_once 'Modele/articles.php';

$articles = findAll();

if (isset($_GET['id'])) {
  $articleId = $_GET['id'];

  // Remove the existing article
  deleteArticle($articleId);

  // Go back to the index admin panel
  header('Location: index.php?Controller=Admin&&Vue=deleteArticle');
}

require_once 'Vue\Admin\deleteArticle.php';
