<?php
use Modele\Article;

require_once 'Modele/Article.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Services/isLogService.php';
require_once 'Services/flashMessagesService.php';

session_start();
isConnected($_SESSION);

unset($_SESSION['token']);
$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$_SESSION['token'] = $token;

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
      addFlash('Votre article a bien été modifié !');
      header('Location: index.php?Controller=Admin');
    }
  }
} else {
  addFlash('Vous ne pouve pas modifier cet article !');
  header('Location: index.php');
}
