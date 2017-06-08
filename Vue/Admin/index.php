<?php
include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>

<main>
  <div class="jumbotron">
    <div class="container">
      <h2>Bienvenue sur votre espace d'administration</h2>
      <p>
        Ut patrimonia patrimonia sua opposita gregariis opposita non virtute nullo Romana nullo multiplicantes quaerente superasse.
      </p>
      <p>
        <a class="btn btn-primary btn-lg" href="?Controller=Admin&&Vue=newArticle" role="button">
          Ecrire un nouvel article
        </a>
      </p>
    </div><!-- /.container -->
  </div><!-- /.jumbotron -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <?php
        include_once 'Vue/Admin/articles.php';
        ?>
      </div>
      <div class="col-md-4">
        <?php
        include_once 'Vue/Admin/comments.php';
        ?>
      </div>
      <div class="col-md-4">
        <?php
        include_once 'Vue/Admin/abusive.php';
        ?>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
</main>

<?php
include_once 'Vue/Templates/footer.php';
?>
