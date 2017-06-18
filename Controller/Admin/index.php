<?php
require_once 'Services/isLogService.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';


session_start();
isConnected($_SESSION);


function findAll() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM articles');
  $request->execute();
  $articles = $request->fetchAll();
  return $articles;
}


// On admet que $db est un objet PDO.
$request = $bdd->query('SELECT * FROM articles');

while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
{
  $article = new Article($donnees);
  var_dump($article);
}



// $Article = new Article();
$Comment = new Comment();
$Article = new Article();
$articles = findAll();
$comments = $Comment->findAllComments();
$signaledComments = $Comment->retrieveSignaledComments();


if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  // Delete function
  if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
    $articleId = $_GET['id'];
    $Article->deleteArticle($articleId);
    header('Location: index.php?Controller=Admin');
  }
  // Publish function
  else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'publishArticle') {
    $articleId = $_GET['id'];
    $status = 1;
    $Article->publishArticle($articleId, $status);
    header('Location: index.php?Controller=Admin');
  }
  else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['id'];
    $text = 'Ce commentaire a été modéré';
    $Comment->moderateComment($commentId, $text);
    header('Location: index.php?Controller=Admin');
  }
  else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unsignalComment') {
    $commentId = $_GET['id'];
    $abusive = 0;
    $Comment->unsignalComment($commentId, $abusive);
    header('Location: index.php?Controller=Admin');
  }
}


require_once 'Vue/Admin/index.php';
