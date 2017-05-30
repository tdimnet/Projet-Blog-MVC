<?php

include_once 'Vue\Templates\header.php';
?>

<h2>Please select an article you want to delete</h2>

<?php
foreach ($articles as $article) { ?>
  <h4>
    <?php echo $article['titre']; ?> -
    <small>
      <?php echo $article['date_creation']; ?>
    </small>
    -
    <a href="?Controller=Admin&&Vue=deleteArticle&&id=<?php echo $article['id'] ?>">
      Supprimer l'article
    </a>
  </h4>

<?php }


include_once 'Vue/Templates/footer.php';
