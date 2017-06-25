<?php
use Modele\Comment;

// Return all the comments of all articles
function findAllComments() {
  global $bdd;
  $request = $bdd->prepare('SELECT * FROM comments');
  $request->execute();
  $commentsArray = [];
  while($donnees = $request->fetch()) {
    $Comment = new Comment($donnees);
    $commentsArray[] = $Comment;
  }
  return $commentsArray;
}
