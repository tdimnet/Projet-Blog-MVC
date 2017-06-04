<?php

include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>

<h1>Hello from the admin panel</h1>

<h2>What do you want to do?</h2>
<ul>
  <li>
    <a href="?Controller=Admin&&Vue=newArticle">Write a new article</a>
  </li>
</ul>

<hr>

<h2>Here is the list of all your articles</h2>
<?php
foreach ($articles as $article) {
?>

<h4>Titre de l'article : <?php echo $article['titre']; ?></h4>
<h5>Status : <?php if ($article['status']) { echo 'published'; } else { echo 'waiting'; } ?></h5>
<ul>

  <li>
    <a href="?Controller=Admin&&Vue=modifyArticle&&id=<?php echo $article['id'] ?>">Modify the article</a>
  </li>
  <li>
    <a href="?Controller=Admin&&Action=deleteArticle&&id=<?php echo $article['id'] ?>">Delete the article</a>
  </li>
</ul>

<?php
}
?>

<?php
include_once 'Vue/Admin/comments.php';
include_once 'Vue/Templates/footer.php';
?>
