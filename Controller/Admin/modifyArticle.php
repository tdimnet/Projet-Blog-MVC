<?php
use Modele\Article;

require_once 'Modele/Article.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Services/isLogService.php';
require_once 'Services/flashMessagesService.php';

session_start();
isConnected($_SESSION);

$token = $_SESSION['token'];

$articleId = $_GET['id'];
$article = findOne($articleId);

if (isset($_SESSION['flashbag'])) {
  $flashMessage = getFlash();
}

if (isset($articleId) && !is_null($article)) {
  require_once 'Vue\Admin\modifyArticle.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token']) && $_SESSION['token'] === $_POST['token'])) {

    // Virer le htmlspecialchars
    $title = trim(htmlspecialchars($_POST['titre']));
    $episode = trim(htmlspecialchars($_POST['episode']));
    // Fin de virage
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
      addFlash('Votre article a bien été modifié !');
    }
  }
} else {
  addFlash('Vous ne pouve pas modifier cet article !');
  header('Location: index.php');
}
