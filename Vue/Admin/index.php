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
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3 class="text-center">Here is the list of all your articles</h3>
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
      </div>
      <div class="col-md-6">
        <?php
        include_once 'Vue/Admin/comments.php';
        ?>
      </div>
    </div>
  </div>
</main>

<?php
include_once 'Vue/Templates/footer.php';
?>
