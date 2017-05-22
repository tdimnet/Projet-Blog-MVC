<?php

include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';


// Display the list of articles
foreach ($articles as $article) { ?>
  <h4>
    <?php echo $article['titre']; ?> -
    <small>
      <?php echo $article['date_creation']; ?>
    </small>
  </h4>

  <a href="<?php echo $article['id'] ?>">
    Lire la suite
  </a>
  <br>
<?php }


include_once 'Vue/Templates/footer.php';
