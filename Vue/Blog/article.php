<?php
include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>

<main>
    <div class="jumbotron text-center">
      <div class="container">
        <h1>
          <?php echo $article->getTitre(); ?>
        </h1>
        <!-- <p>
          Date de l'episode : <?php /* echo $article->getTitre(); */ ?>
        </p> -->
      </div>
    </div>

    <div class="container">
      <?php echo $article->getEpisode(); ?>
    </div>
</main>

<?php
// include_once 'Vue/Blog/commentsList.php';
?>

<hr>

<?php
include_once 'Vue/Blog/leaveComment.php';
?>

<?php
include_once 'Vue/Templates/footer.php';
?>
