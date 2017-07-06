<?php
use Modele\Article;

require_once 'Modele/Article.php';
require_once 'Services/isLogService.php';
require_once 'Modele/ArticleRepository.php';

session_start();
isConnected($_SESSION);

$token = $_SESSION['token'];



// If a new article has been posted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token']))) {

  $Article = new Article();

  $title = $_POST['titre'];
  $episode = $_POST['episode'];
  $created_at = new \DateTime();
  $created_at = $created_at->format('Y-m-d H:i:s');
  $status = $_POST['status'];

  $Article->setTitre($title);
  $Article->setEpisode($episode);
  $Article->setCreatedDate($created_at);
  $Article->setStatus($status);

  // We add the article into the data base
  addArticle($Article);

  // Then we redirect the user
  header('Location: index.php');
}


require_once 'Vue\Admin\newArticle.php';
