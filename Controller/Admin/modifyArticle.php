<?php
use Modele\Article;

require_once 'Modele/Article.php';
require_once 'Modele/ArticleRepository.php';

$articleId = $_GET['id'];
$article = findOne($articleId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['titre'];
  $episode = $_POST['episode'];
  $status = $_POST['status'];

  $Article = new Article();

  $Article->setId($articleId);
  $Article->setTitre($title);
  $Article->setEpisode($episode);
  $Article->setStatus($status);

  updateArticle($Article);

  header('Location: index.php');
}

require_once 'Vue\Admin\modifyArticle.php';
