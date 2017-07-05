<?php
use Modele\Article;
use Modele\Comment;

// Enlever les majuscules des repositoryrs

require_once 'Services/flashMessagesService.php';
require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';
require_once 'Services/isLogService.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

session_start();
isConnected($_SESSION);

if (isset($_GET['Controller']) && isset($_GET['Action'])) {

  // Show all comments function
  if ($_GET['Action'] === 'showAllComments') {
    // Load all the comments
    $allComments = findAllComments();

  // Deconnexion function
  } else if ($_GET['Action'] === 'deconnexion') {
    // We remove the user identifier
    unset($_SESSION['identifier']);
    // We add the flash message and go to the home page
    addFlash('Vous êtes bien deconnecté !');
    header('Location: index.php');
    // Delete function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
    $articleId = $_GET['id'];
    $Article = findOne($articleId);
    deleteArticle($Article);
    header('Location: index.php?Controller=Admin');

    // Publish function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'publishArticle') {
    $articleId = $_GET['id'];
    $Article = findOne($articleId);
    publishArticle($Article);
    header('Location: index.php?Controller=Admin');

    // Moderate comment function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'moderateComment') {
    $commentId = $_GET['id'];
    moderateComment($commentId);
    header('Location: index.php?Controller=Admin');

    // Retrieve the original comment
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unmoderateComment') {
    $commentId = $_GET['id'];
    unmoderateComment($commentId);
    header('Location: index.php?Controller=Admin');

    // Unsignal comment function
  } else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unsignalComment') {
    $commentId = $_GET['id'];
    unsignalComment($commentId);
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
