<?php
use Modele\Article;
use Modele\Comment;

require_once 'Services/flashMessagesService.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';
require_once 'Services/isLogService.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

session_start();
isConnected($_SESSION);

if (isset($_SESSION['flashbag'])) {
  $flashMessage = getFlash();
}

$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
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
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
    $articleId = $_GET['id'];
    $Article = findOne($articleId);
    if (!is_null($Article)) {
      deleteArticle($Article);
    }
    header('Location: index.php?Controller=Admin');

    // Publish function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'publishArticle') {
    $articleId = $_GET['id'];
    $Article = findOne($articleId);
    if (!is_null($Article)) {
      publishArticle($Article);
    }
    header('Location: index.php?Controller=Admin');

    // Moderate comment function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['id'];
    $comment = findOne($commentId);
    if (!is_null($comment)) {
      moderateComment($commentId);
    }
    header('Location: index.php?Controller=Admin');

    // Retrieve the original comment
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unmoderateComment') {
    $commentId = $_GET['id'];
    $comment = findOne($commentId);
    if (!is_null($comment)) {
      unmoderateComment($commentId);
    }
    header('Location: index.php?Controller=Admin');

    // Unsignal comment function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unsignalComment') {
    $commentId = $_GET['id'];
    $comment = findOne($commentId);
    if (!is_null($comment)) {
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
