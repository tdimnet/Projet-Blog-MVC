<?php
use Modele\Article;

require_once 'Modele/Article.php';
require_once 'Modele/ArticleRepository.php';

$articleId = $_GET['id'];
$article = findOne($articleId);

if (isset($articleId) && !is_null($article)) {
  require_once 'Vue\Admin\modifyArticle.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (strlen($title) === 0 || strlen($episode) === 0) {
      header('Location: index.php?Controller=Admin');
    }

    $title = $_POST['titre'];
    $episode = $_POST['episode'];
    $status = $_POST['status'];

    $title = trim(htmlspecialchars($_POST['title']));
    $episode = trim(htmlspecialchars($_POST['episode']));

    if (strlen($title) === 0 || strlen($episode) === 0) {
      header('Location: index.php?Controller=Admin');
    } else {
      $Article = new Article();

      $Article->setId($articleId);
      $Article->setTitre($title);
      $Article->setEpisode($episode);
      $Article->setStatus($status);

      updateArticle($Article);

      header('Location: index.php?Controller=Admin');
    }
  }
} else {
  header('Location: index.php?Controller=Admin');
}
