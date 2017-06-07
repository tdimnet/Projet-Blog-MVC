<h3 class="text-center">Here is the list of all your articles</h3>
<?php
foreach ($articles as $article) {
?>

<h4>Titre de l'article : <?php echo $article['titre']; ?></h4>
<h5>Status : <?php if ($article['status']) { echo 'published'; } else { echo 'waiting'; } ?></h5>
<ul>
  <li>
    <a href="#">Publish an article</a>
  </li>
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
