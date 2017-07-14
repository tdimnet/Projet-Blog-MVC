<?php
use Modele\Article;

require_once 'Modele/Article.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Services/isLogService.php';

session_start();
isConnected($_SESSION);

$token = $_SESSION['token'];

$articleId = $_GET['id'];
$article = findOne($articleId);

if (isset($articleId) && !is_null($article)) {
  require_once 'Vue\Admin\modifyArticle.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token']))) {

    $title = trim(htmlspecialchars($_POST['titre']));
    $episode = trim(htmlspecialchars($_POST['episode']));
    $status = $_POST['status'];

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
