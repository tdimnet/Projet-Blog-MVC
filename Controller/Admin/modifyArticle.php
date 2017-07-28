<?php
use Modele\Article;

require_once 'Modele/Article.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Services/isLogService.php';
require_once 'Services/tokenVerificationService.php';

isConnected($_SESSION);

$token = $_SESSION['token'];

$articleId = $_GET['id'];
$article = findOne($articleId);

if (isset($articleId) && !is_null($article)) {
  require_once 'Vue/Admin/modifyArticle.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && verifyToken($_SESSION['token'], $_POST['token'])) {

    $title = $_POST['titre'];
    $episode = $_POST['episode'];
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
    }
  }
} else {
  addFlash('Vous ne pouve pas modifier cet article !');
  header('Location: index.php');
}
