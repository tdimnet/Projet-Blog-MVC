<?php
use Modele\Article;
use Modele\Comment;

require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';
require_once 'Services/isLogService.php';
require_once 'Services/tokenVerificationService.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

isConnected($_SESSION);

$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;

if (isset($_GET['Controller']) && isset($_GET['Action'])) {
  // Show all comments function
  if ($_GET['Action'] === 'showAllComments') {
    // Load all the comments
    $allComments = findAllComments();

  // Deconnexion function
  } else if ($_GET['Action'] === 'deconnexion') {
    // We remove the user identifier
    unset($_SESSION['identifier']);
    unset($_SESSION['token']);
    // We add the flash message and go to the home page
    addFlash('Vous êtes bien deconnecté !');
    header('Location: index.php');
    // Delete function

  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle' && verifyToken($_SESSION['token'], $_GET['token'])) {
    $articleId = $_GET['id'];
    $Article = findOne($articleId);
    if (!is_null($Article)) {
      deleteArticle($Article);
      addFlash('Votre article a bien été supprimé !');
      header('Location: index.php?Controller=Admin');
    } else {
      addFlash('Votre article n\'a pas pu être supprimé.. !');
      header('Location: index.php');
    }

    // Publish function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'publishArticle' && verifyToken($_SESSION['token'], $_GET['token'])) {
    $articleId = $_GET['id'];
    $Article = findOne($articleId);
    if (!is_null($Article)) {
      addFlash('Votre article a été publié !');
      publishArticle($Article);
    }
    header('Location: index.php?Controller=Admin');

    // Moderate comment function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'moderateComment' && verifyToken($_SESSION['token'], $_GET['token'])) {
    $commentId = $_GET['id'];
    $comment = findOneComment($commentId);
    if (!is_null($comment)) {
      moderateComment($commentId);
      addFlash('Ce commentaire a été modéré !');
    }
    header('Location: index.php?Controller=Admin');

    // Retrieve the original comment
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unmoderateComment' && verifyToken($_SESSION['token'], $_GET['token'])) {
    $commentId = $_GET['id'];
    $comment = findOneComment($commentId);
    if (!is_null($comment)) {
      addFlash('Ce commentaire est revenu à son état initial !');
      unmoderateComment($commentId);
    }
    header('Location: index.php?Controller=Admin');

    // Unsignal comment function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unsignalComment' && verifyToken($_SESSION['token'], $_GET['token'])) {
    $commentId = $_GET['id'];
    $comment = findOneComment($commentId);
    if (!is_null($comment)) {
      addFlash('Ce commentaire n\'est plus marqué comme signalé !');
      unsignalComment($commentId);
    }
    header('Location: index.php?Controller=Admin');
  }
} // /if()

// Show all the comments view
if (isset($_GET['Controller']) && isset($_GET['Action']) && ($_GET['Action'] === 'showAllComments')) {
  // Then load the view
  require_once 'Vue/Admin/allComments.php';

// Show the admin panel and its data within
} else {
  $articles = findAll();
  $comments = findLatestComments();
  $signaledComments = findAllAbusiveComments();
  require_once 'Vue/Admin/index.php';
}
