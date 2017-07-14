<?php
use Modele\Article;


require_once 'Modele/Article.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Services/isLogService.php';
require_once 'Services/flashMessagesService.php';

session_start();
isConnected($_SESSION);
$token = $_SESSION['token'];

if (isset($_SESSION['flashbag'])) {
  $flashMessage = getFlash();
}

// If a new article has been posted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token']))) {
  $title = trim(htmlspecialchars($_POST['title']));
  $episode = trim(htmlspecialchars($_POST['episode']));
  $created_at = new \DateTime();
  $created_at = $created_at->format('Y-m-d H:i:s');
  $status = $_POST['status'];
  if (strlen($title) === 0 || strlen($episode) === 0) {
    addFlash('Votre article doit ne comporte pas tous les éléments nécessaires !');
    header('Location: index.php?Controller=Admin&&Vue=newArticle');
  } else {
    $Article = new Article();
    $Article->setTitre($title);
    $Article->setEpisode($episode);
    $Article->setCreatedDate($created_at);
    $Article->setStatus($status);

    // We add the article into the data base
    addArticle($Article);
    // We inform the user that the article has been posted
    addFlash('Votre article a bien été soumis !');
    // Then we redirect the user
    header('Location: index.php?Controller=Admin');
  }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  require_once 'Vue\Admin\newArticle.php';
} else {
  addFlash('Vous n\'avez pas vous accès à votre espace personnalisé !');
  header('Location: index.php');
}
