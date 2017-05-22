<?php

include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';


foreach ($articles as $article) { ?>

  <a href="<?php echo $article['id'] ?>">
    <?php echo $article['titre']; ?> - <?php echo $article['date_creation']; ?>
  </a>

  <br>

<?php }


include_once 'Vue/Templates/footer.php';
