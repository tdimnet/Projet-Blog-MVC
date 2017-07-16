<?php
include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>


<div class="jumbotron text-center">
  <h3>Vos cinq derniers commentaires</h3>
  <small>
    <a href="?Controller=Admin">
      Retourner à l'accueil
    </a>
  </small>
</div>


<div class="container">
  <div class="comment-list row">
  <?php
  foreach ($allComments as $comment) { ?>

      <div class="col-xs-8 comment-items">
        <h4>
          Auteur : <?php echo $comment->getFull_name() ?>
          <br>
        </h4>
        <p>
          Commnentaire :
          <br>
          <?php echo $comment->getComment() ?>
        </p>
        <p>
          <a
          class="btn btn-primary"
          href="?Controller=Admin&&Action=unmoderateComment&&id=<?php echo $comment->getId(); ?>&&token=<?= $token ?>"
          >
            Retablir le commentaire
          </a>
          <a
          class="btn btn-danger"
          href="?Controller=Admin&&Action=moderateComment&&id=<?php echo $comment->getId(); ?>&&token=<?= $token ?>"
          >
            Modérer le commentaire
          </a>
        </p>
        <?php
         if ($comment->getModerate()) {
         ?>
           <div class="alert alert-info">
             Ce commentaire a été moderé.
           </div>
        <?php
         }
        ?>
      </div>
  <?php
  }
  ?>
  </div>
</div>



<?php
include_once 'Vue/Templates/footer.php';
?>
