<?php

include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';

?>

<main>
  <h1>
    Nom de l'episode : <?php echo $article['titre']; ?>
  </h1>
  <small>
    Date de l'episode : <?php echo $article['date_creation']; ?>
  </small>
  <section>
    <?php echo $article['episode']; ?>
  </section>
</main>

<?php
include_once 'Vue/Templates/footer.php';
?>
