<?php
include_once 'Vue/Templates/header.php';
include_once 'Vue/Templates/navigation.php';
?>

<div class="container">
  <h2>
    Ecrire un nouvel article
  </h2>
  <hr>

  <form class="" method="post">
    <div class="form-group">
      <label for="titre">Titre de l'épisode</label>
      <input id="titre" class="form-control" type="text" name="titre" placeholder="Titre de l'épisode">
    </div>
    <div class="form-group">
      <label for="episode">Texte de l'épisode</label>
      <textarea id="episode" class="form-control" name="episode"></textarea>
    </div>
    <div class="form-group">
      <label for="status">Souhaitez-vous publier l'article ?</label>
      <select id="status" class="form-control" name="status">
        <option value="0">Mettre l'article en attente</option>
        <option value="1">Publier l'article</option>
      </select>
    </div>
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
    <button type="submit" class="btn btn-default" name="button">
      Sauvegarder/Publier votre épisoe
    </button>
  </form>
</div>


<?php
include_once 'Vue/Templates/footer.php';
?>
