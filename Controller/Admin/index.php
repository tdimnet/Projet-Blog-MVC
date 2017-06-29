<?php
use Modele\Article;
use Modele\Comment;

require_once 'Modele/ArticleRepository.php';
require_once 'Modele/CommentRepository.php';
require_once 'Services/isLogService.php';
require_once 'Modele/Article.php';
require_once 'Modele/Comment.php';

session_start();
isConnected($_SESSION);



if ($_GET['Controller'] === 'Admin' && isset($_GET['Action'])) {
  // Load this page and the comment when you want to show all the comments
  if ($_GET['Action'] === 'showAllComments') {
    // Load all the comments
    $allComments = findAllComments();
    // Then load the view
    require_once 'Vue/Admin/allComments.php';
  // If the given actions is deconnexion, disconnect the user
  } else if ($_GET['Action'] === 'deconnexion') {
    session_destroy();
    header('Location: index.php');
  }
// If you do not want to show all the comments, this is the regular admin panel
} else {
  // Then check the get requests
  if (isset($_GET['Controller']) && isset($_GET['Action'])) {
    // Delete function
    if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'deleteArticle') {
      $articleId = $_GET['id'];
      $Article = findOne($articleId);
      deleteArticle($Article);
      header('Location: index.php?Controller=Admin');
    }
    // Publish function
    else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'publishArticle') {
      $articleId = $_GET['id'];
      $Article = findOne($articleId);
      publishArticle($Article);
      header('Location: index.php?Controller=Admin');
    }
    // Moderate comment function
    else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'moderateComment') {
      $commentId = $_GET['id'];
      moderateComment($commentId);
      header('Location: index.php?Controller=Admin');
    }
    // Unsignal comment function
    else if ($_GET['Controller'] === 'Admin' && $_GET['Action'] === 'unsignalComment') {
      $commentId = $_GET['id'];
      unsignalComment($commentId);
      header('Location: index.php?Controller=Admin');
    }
  }

  // Then do all the comments from the database
  $articles = findAll();
  $comments = findLatestComments();
  $signaledComments = findAllAbusiveComments();

  // Then load the view
  require_once 'Vue/Admin/index.php';
}
