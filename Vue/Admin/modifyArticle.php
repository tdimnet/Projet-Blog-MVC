<?php
include_once 'Vue\Templates\header.php';
include_once 'Vue\Templates\navigation.php';
?>

<div class="container">
  <h2>Modifier votre article existant</h2>
  <hr>
  <form class="" method="post">
    <div class="form-group">
      <label for="titre">Titre de l'episode</label>
      <input id="titre" class="form-control" type="text" name="titre" placeholder="Titre de l'episode" value="<?php echo $article->getTitre(); ?>">
    </div>
    <div class="form-group">
      <label for="episode">Contenu de l'episode</label>
      <textarea id="episode" class="form-control" name="episode"><?php echo $article->getEpisode(); ?></textarea>
    </div>
    <div class="form-group">
      <label for="status">Status de l'episode</label>
      <select id="status" class="form-control" name="status">
        <option value="0">Mettre l'article en attente</option>
        <option value="1">Publier l'article</option>
      </select>
    </div>
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
    <button class="btn btn-default" type="submit" name="button">
      Modifier votre article
    </button>
  </form>
</div>

<?php
include_once 'Vue\Templates\footer.php';
?>
